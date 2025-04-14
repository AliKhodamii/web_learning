<?php 
session_start();

require 'db.php';

if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($password , $user['password'])){
        $_SESSION['user'] = $user['username'];
        header("location: index.php");
        exit();
    }
    else{
        echo "Invalid login";
    }
}