<?php 
include '../../../../includes/config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($email == "" || $pass == "") {
        echo 'error'; // empty fields
    } else {
        // check if user exists
        $userExit = $conn->prepare("SELECT * FROM register WHERE email = :email LIMIT 1");
        $userExit->execute([":email" => $email]);
        $user = $userExit->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // check password
            if (password_verify($pass, $user['pass'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['adminName'] = $user['adminName'];
                echo 'success';
                header("Location: ../../admin.php");
            } else {
                echo 'invalid password';
            }
        } else {
            echo 'user not found';
        }
    }
}
?>
