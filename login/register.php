<?php
session_start();
require 'db.php';

if($_POST){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user){
        echo "this username is already taken!";
    }
    else{
        $hashedPassword = password_hash($password , PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO login (username , password ) VALUES (? , ?)");
        
        if($stmt->execute([$username , $hashedPassword])){
            echo "register succeed. <a href='index.php'>Login now!</a>";
        }
        else{
            echo "insertion failed.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username" required><br>
        <input type="password" placeholder="password" name="password" required><br>
        <button type="submit">Sign up</button>
    </form>
</body>
</html>