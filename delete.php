<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if book ID was provided
// if (!isset($_GET["id"])) {
//   header("Location: view_books.php");
//   exit();
// }

// Get book ID from URL parameter
// $id = $_GET["id"];

// Prepare and execute SQL statement
$stmt = $conn->prepare("DELETE FROM books WHERE id = '4'");
// $stmt->bind_param("i", $id);
$stmt->execute();

// Redirect to view_books.php
// header("Location: view_books.php");
exit();

// Close MySQL connection
$conn->close();
?>