<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}
// Function to delete a book
if (isset($_POST['delete_book'])) {
    $book_id = $_POST['book_id'];

    $stmt = $pdo->prepare('DELETE FROM books WHERE id = ?');
    if ($stmt->execute([$book_id])) {
        header('Location: manage_books.php');
        exit;
    } else {
        echo "Error deleting book.";
    }
}

// Fetch all books from the database
$stmt = $pdo->query('SELECT * FROM books');
$books = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
</head>
 <link rel="stylesheet" href="manstyle.css">
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
<body>
    <div class="container">
<table border="1">
        
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Published Year</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['published_year']; ?></td>
                <td><?php echo $book['genre']; ?></td>
                <td>
                    <form id="del" method="post" action="">
                        <input  type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                        <input type="submit" name="delete_book" value="Delete" onclick="return confirm('Are you sure you want to delete this book?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="btnclass">
    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"  onclick="location.href='index.php'; ">Back To User Panel</button>
    </div></div>
   
    
</body>
</html>
