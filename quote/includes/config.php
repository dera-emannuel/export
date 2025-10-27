<?php
$host = "localhost";
$dbName = "quote";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbName; charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("data base connection error" . $ex->getMessage());
}
?>