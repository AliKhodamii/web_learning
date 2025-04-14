<?php
require 'db.php';

if ($_GET) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->execute([$id]);
}
header("location: index.php");
exit();
