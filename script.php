<?php
// Establish MySQL connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get form data
$name = $_GET["name"];
$subject = $_GET["subject"];
$author = $_GET["author"];
$price = $_GET["price"];

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO books (name, subject, author, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $name, $subject, $author, $price);
$stmt->execute();

// Redirect to view_books.php
header("Location: view_books.php");
exit();
?>