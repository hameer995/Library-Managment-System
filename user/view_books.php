<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: ../index.php');
    exit;
}

$stmt = $pdo->query('SELECT * FROM books');
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

    <title>View Books</title>
</head>
<link rel="stylesheet" href="style3.css">
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
<body>
    <h2 id="h2">View Books</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Published Year</th>
            <th>Genre</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['published_year']; ?></td>
                <td><?php echo $book['genre']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<div class="btn1">
    <button id="btn1" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"  onclick="location.href='index.php'; ">Back To User Panel</button>
    </div>
    
   
</body>
</html>
