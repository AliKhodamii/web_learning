<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-App</title>
</head>
<body>
    <?php if (isset($_SESSION['user'])):?>
    
        <h2>Welcome <?php echo htmlspecialchars($_SESSION['user']) ?>!</h2>
        <a href="logout.php">Logout</a>
    
    <?php else: ?>
        
        <form action="login.php" method="POST">
            <input type="text" placeholder="Username" name="username" ><br>
            <input type="password" placeholder="password" name="password" ><br>
            <button type="submit">Login</button>
        </form>
        <button><a href="register.php">Sing up</a></button>

    <?php endif ?>
</body>
</html>