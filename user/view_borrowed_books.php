<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: ../index.php');
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT b.title, b.author, b.published_year, b.genre, bb.borrowed_date, bb.return_date 
                          FROM borrowed_books bb 
                          INNER JOIN books b ON bb.book_id = b.id 
                          WHERE bb.user_id = ?');
    if ($stmt->execute([$_SESSION['user_id']])) {
        $borrowed_books = $stmt->fetchAll();
    } else {
        throw new Exception("Error executing query: " . $stmt->errorInfo()[2]);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Borrowed Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style5.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <h2 id="h2">View Borrowed Books</h2>
   
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Published Year</th>
      <th scope="col">Genre</th>
      <th scope="col">Borrowed Date</th>
      <th scope="col">Return Date</th>
    </tr>
  </thead>
        <?php foreach ($borrowed_books as $book): ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['published_year']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td><?php echo $book['borrowed_date']; ?></td>
                <td><?php echo $book['return_date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    
    <button id="btn4" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="location.href='index.php'; ">Back to User Panel</button>
   
</body>
</html>
