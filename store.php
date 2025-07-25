<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve books from database
$result = $conn->query("SELECT * FROM books");

// Check if any books were found
if ($result->num_rows > 0) {
  // Display books in a table
  echo "<table>";
  echo "<tr><th>Name</th><th>Subject</th><th>Author</th><th>Price</th></tr>";
  while ($row = $result->fetch_assoc()) 
    {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["subject"] . "</td>";
    echo "<td>" . $row["author"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

} 
else 
{
  // No books found
  echo "No books found.";
}

// Close MySQL connection
$conn->close();


?>