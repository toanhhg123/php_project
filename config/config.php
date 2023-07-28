<?php
$username = "root";
$password = "";
$dsn = "mysql:host=127.0.0.1:3308;dbname=php_db;charset=utf8";

try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    header("Location: page404.php?message=" . $e->getMessage());
}