<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if book ID and form data were submitted
if (isset($_GET["id"]) && isset($_POST["name"]) && isset($_POST["subject"]) && isset($_POST["author"]) && isset($_POST["price"])) {
  // Get book ID from URL parameter
  $id = $_GET["id"];

  // Get form data
  $name = $_GET["name"];
  $subject = $_GET["subject"];
  $author = $_GET["author"];
  $price = $_GET["price"];

  // Prepare and execute SQL statement
  $stmt = $conn->prepare("UPDATE books SET name = ?, subject = ?, author = ?, price = ? WHERE id = '16'");
  $stmt->bind_param("ssssi", $name, $subject, $author, $price, $id);
  $stmt->execute();

  // Redirect to view_books.php
//   header("Location: view_books.php");
//   exit();
} elseif (isset($_GET["id"])) {
  // Get book ID from URL parameter
  $id = $_GET["id"];

  // Retrieve book from database
  $stmt = $conn->prepare("SELECT * FROM books WHERE id = '16'");
//   $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if book was found
  if ($result->num_rows == 1) {
    // Display book details in a form for editing
    $row = $result->fetch_assoc();
    ?>
    <form method="post">
      <label>Name:</label><br>
      <input type="text" name="name" value="<?php echo $row["name"]; ?>"><br>
      <label>Subject:</label><br>
      <input type="text" name="subject" value="<?php echo $row["subject"]; ?>"><br>
      <label>Author:</label><br>
      <input type="text" name="author" value="<?php echo $row["author"]; ?>"><br>
      <label>Price:</label><br>
      <input type="number" name="price" value="<?php echo $row["price"]; ?>"><br>
      <input type="submit" value="Save">
    </form>
    <?php
  } else {
    // Book not found
    echo "Book not found.";
  }
} else {
  // No book ID provided
//   header("Location: view_books.php");
  exit();
}

// Close MySQL connection
$conn->close();

?>