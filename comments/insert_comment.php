<?php

$pdo = new PDO("mysql:host=localhost:3306;dbname=jjqioyps_learning","jjqioyps_learning","123456");

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare("INSERT INTO comments (name,email,comment) VALUES (? , ? ,?)");
    if($stmt ->execute([$name , $email , $comment])){
        echo "insertion succeed.";
    }
    else{
        echo "insertion failed.";
        echo json_encode($stmt->errorInfo());
    }
}