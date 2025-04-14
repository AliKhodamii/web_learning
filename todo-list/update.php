<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $is_done = isset($_POST['is_done']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE todos SET is_done = :is_done WHERE id = :id");
    $stmt->execute([
        'is_done' => $is_done,
        'id' => $id
    ]);
}

header("Location: index.php");
exit;
