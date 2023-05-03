<?php
$username = "root";
$password = "";
$dsn = "mysql:host=127.0.0.1;dbname=id20609119_shoprol;charset=utf8";

try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    header("Location: page404.php?message=" . $e->getMessage());
}
