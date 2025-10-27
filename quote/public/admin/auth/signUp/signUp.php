<?php include '../../../../includes/config.php';
session_start();

$upperCase = "/[A-Z]/";
$number = "/[0-9]/";

if (isset($_POST['submit'])) {
    $adminName = $_POST['adminName'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($adminName == "" || $email == "" || $pass == "") {
        echo 'error';
    } else {
        if (!preg_match($upperCase, $pass) || !preg_match($number, $pass)) {
            echo 'week password';
        }else{
            $insertUser = $conn->prepare("INSERT INTO register (adminName, email, pass) VALUE (:adminName, :email, :pass)");
            $insertUser->execute([
                ":adminName" => $adminName,
                ":email" => $email,
                ":pass" => password_hash($pass, PASSWORD_DEFAULT)
            ]);

            echo 'registered successfully';
        }
    }
}

?>