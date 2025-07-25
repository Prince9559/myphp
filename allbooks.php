<!DOCTYPE html>
<html>
<head>
  <title>View Books</title>
</head>
<body>
  <h1>View Books</h1>
  <table border="1">
    <tr>
      <th>Name</th>
      <th>Subject</th>
      <th>Author</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
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

    // Retrieve books from database
    $result = $conn->query("SELECT * FROM books");

    // Check if any books were found
    if ($result->num_rows > 0) {
      // Display books in a table
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td><a href='delete_book.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
      }
    } else {
      // No books found
      echo "<tr><td colspan='5'>No books found.</td></tr>";
    }

    // Close MySQL connection
    $conn->close();
    ?>
  </table>
</body>
</html>
