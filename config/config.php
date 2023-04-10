<?php
$servername = "127.0.0.1";
$username = "root";
$dbname = "shop";
$password = "";
$dsn = "mysql:host=127.0.0.1;dbname=shop";

try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    header('Location: 404.php?message=' . "Connection failed: " . $e->getMessage());
}
