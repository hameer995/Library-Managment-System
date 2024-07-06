<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $genre = $_POST['genre'];

    $stmt = $pdo->prepare('INSERT INTO books (title, author, published_year, genre) VALUES (?, ?, ?, ?)');
    $stmt->execute([$title, $author, $published_year, $genre]);

    echo "Book added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="adstyle.css">
</head>
<body>
          <h2 id="h2" >Add Book</h2>
    <div class="container">
   
      <div class="form">
    <form method="post" action="add_book.php">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Write title here" name="title">
    
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="author" class="form-control" id="author"  placeholder="Write author name "  name="author">
  </div>
  
  <div class="form-group">
    <label for="published_year">Published</label>
    <input type="number" class="form-control" id="published_year" placeholder="Write year of published "  name="published_year">
  </div>
  <div class="form-group">
    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" placeholder="Write genre of book "  name="genre">
  </div>
  


  <button id="addbtn" type="submit" class="btn btn-primary">Add Book</button>
</form>
</div>
    </div>
</body>
</html>
