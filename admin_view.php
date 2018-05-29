<?php
session_start();
if (isset($_SESSION['user_id']) && ($_SESSION['user_id']=='admin')) {
	include 'nav_admin.php';
}else{
    header("Location: index.php");
  }

require('db.php');
$sqlb = "SELECT * FROM books";
$results = $conn->query($sqlb);

echo "<div class='container'>";
echo "<table class='table table-hover'>";
echo " <thead><tr class='info'><th>Image</th><th>Name</th><th>Author</th><th>Language</th><th>Publisher</th><th>Category</th><th>Price</th><th>Edit</th><th>Delete</th></tr> </thead>";
while($row = $results->fetch_assoc()) {
	#echo "<tbody><tr><td><img src='http://192.168.2.126/onlinebookstore/book_img/{$row['book_img']}' width='150px' height='200px'></td>";
	echo "<tbody><tr><td><img src='http://localhost/onlinebookstore/book_img/{$row['book_img']}' width='150px' height='200px'></td>";
	echo "<td>".$row['book_name']."</td>";
	echo "<td>".$row['book_author']."</td>";
	echo "<td>".$row['book_language']."</td>";
	echo "<td>".$row['book_publisher']."</td>";
	echo "<td>".$row['book_category']."</td>";
	$id = $row['book_id'];
	echo "<td>".$row['book_price']."</td><td><a href='edit_book.php?bid=$id'role='button'>Edit</a></td><td><a href='delete_book.php?bid=$id'>Delete</a></td></tr></tbody>";
}
echo "</table>";
echo "</div>";
include 'footer.php';

?>
