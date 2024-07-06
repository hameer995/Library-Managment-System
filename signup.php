<?php

require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $password]);

    echo "User registered successfully!";
    
    header('Location: index.php');
     exit;
}

   

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="parts/style.css">
</head>
<body>

<div class="container">
    
    <div class="login form">
      <header>SignUP</header>
      <form action="signup.php" method="post">
      <label>Enter Username:</label>
      <input type="text" name="username" required><br>

      <label>Password:</label>
      <input type="password" name="password" required><br>
      
        
        <input type="submit" class="button" value="SignUP">
        <div class="signup">
      <span >Already have an account? <a href="index.php">Login</a></span>
      </form>
   
    
</body>
</html>
