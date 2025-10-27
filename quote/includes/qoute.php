<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $heading = $_POST['heading'];
    $cate = $_POST['cate'];
    $content = $_POST['content'];
    $imageName = $_FILES['imageUrl']['name'];

    // ================== check empty inputs
    if (empty($heading) || empty($cate) || empty($content) || empty($imageName)) {
        echo "Inputs are empty!";
    } else {
        // ================== upload image
        $tmpName = $_FILES['imageUrl']['tmp_name'];
        $folder = __DIR__ . "/upload/" . $imageName;
        $savePath = "../includes/upload/" . $imageName;
        move_uploaded_file($tmpName, $folder);

        // ================== check if category exists
        $stmt = $conn->prepare("SELECT id FROM categories WHERE name = :cate");
        $stmt->execute([':cate' => $cate]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $category_id = $row['id'];
        } else {
            // insert new category
            $insertCate = $conn->prepare("INSERT INTO categories (name) VALUES (:cate)");
            $insertCate->execute([':cate' => $cate]);
            $category_id = $conn->lastInsertId();
        }

        // ================== insert into quotes
        $insertQuote = $conn->prepare("INSERT INTO quotes (heading, content, image_url, category_id) 
                                       VALUES (:heading, :content, :image_url, :category_id)");

        $done = $insertQuote->execute([
            ':heading' => $heading,
            ':content' => $content,
            ':image_url' => $savePath,
            ':category_id' => $category_id
        ]);

        if ($done) {
            echo "Quote added successfully";
        } else {
            echo "Error inserting quote";
        }
    }
}

?>