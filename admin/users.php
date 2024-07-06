<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

// Fetch all users from the database
$stmt = $pdo->query('SELECT id, username, status FROM users');
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manage Users</title>
    <link rel="stylesheet" href="userstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h2 id="h2">Admin Panel - Manage Users</h2>
    <div class="container">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserName</th>
      
    </tr>
  </thead>
  <tbody>
    
 
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
               
            </tr>
        <?php endforeach; ?>
        </tbody>

        </table>
    

    <div class="btnclass">
    <button id="btnclass" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"  onclick="location.href='index.php'; ">Back To User Panel</button> 
</div></div>
   
</body>
</html>
