<?php
include '../../includes/config.php';
include '../../includes/qoute.php';


session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: ./auth/login/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="input">
                <label for="">Header</label>
                <input type="text" placeholder="Heading........" name="heading">
            </div>
            <div class="input">
                <label for="">Categories</label>
                <input type="text" placeholder="Category........." name="cate">
            </div>
            <div class="input">
                <label for="">Content</label>
                <textarea name="content" placeholder="Enter content..."></textarea>
            </div>
            <div class="input">
                <label for="">Upload Image</label>
                <input type="file" name="imageUrl">
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>

        <a href="../../includes/logout.php">logout</a>
    </div>

</body>

</html>