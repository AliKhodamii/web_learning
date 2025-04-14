<?php
require 'db.php';

if ($_POST) {
    $title = $_POST['title'];

    $stmt = $pdo->prepare("INSERT INTO todos (title) values (:title)");
    $stmt->execute(["title" => $title]);
}

header("location: index.php");
exit();
