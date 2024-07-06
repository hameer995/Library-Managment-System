<?php


$showAlert=false;
require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $borrowed_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+14 days'));

    $stmt = $pdo->prepare('INSERT INTO borrowed_books (user_id, book_id, borrowed_date, return_date) VALUES (?, ?, ?, ?)');
    $stmt->execute([$_SESSION['user_id'], $book_id, $borrowed_date, $return_date]);

   $showAlert=true;
}

$stmt = $pdo->query('SELECT * FROM books');
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow Book</title>
    <link rel="stylesheet" href="style4.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>

    <h2 id="h2">Borrow Book</h2>

    <?php   if($showAlert){

echo '<div class="alert alert-dark" role="alert">
  A simple dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>';

}?>

    <div class="container">
    <form method="post" action="borrow_book.php">
        <label id="book">Book:</label>
        <select id="book_id"name="book_id" required>
            <?php foreach ($books as $book): ?>
                <option value="<?php echo $book['id']; ?>"><?php echo $book['title']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button id="btn1" type="submit">Borrow</button>
    </form>
    </div>
    <div class="btn2">
    <button id="btn1" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"  onclick="location.href='index.php'; ">Back To User Panel</button>
    </div>

  
</body>
</html>
