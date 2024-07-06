<?php

require 'includes/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header('Location: ' . ($user['role'] == 'admin' ? 'admin/index.php' : 'user/index.php'));
        exit;
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <link rel="stylesheet" href="parts/style.css">
</head>
<body>
  <div class="container">
    
    <div class="login form">
      <header>Login</header>
      <form action="index.php" method="post">
      <label>Enter Username:</label>
      <input type="text" name="username" required><br>

      <label>Password:</label>
      <input type="password" name="password" required><br>
      
        
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
      <span >Don't have an account? <a href="signup.php">Signup</a></span>

       
      </div>


</body>
</html>
