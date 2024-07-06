<?php

require '../includes/config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container"></div>  
    <h1 id="Welcome_h1">Welcome <?php echo $_SESSION['username'] ?></h1>

<div class="buttons">

    <button id="btn1" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"  onclick="location.href='view_books.php'; ">View Books</button>
    
    <button id="btn2" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"  onclick="location.href='borrow_book.php'; ">Borrow book</button>

    <button id="btn3" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" onclick="location.href='view_borrowed_books.php'; " >View Borrowed Book</button>

    <button id="btn4" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="location.href='../logout.php'; ">Logout</button>


    </div>

    </div>
</body>
</html>
