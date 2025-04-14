<?php

$host = "localhost:3306";
$dbname = "jjqioyps_web_learning";
$username = "jjqioyps_learning";
$password = "123456";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
