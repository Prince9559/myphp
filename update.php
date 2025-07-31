 <?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newName = "Kishan";
$oldName = "Mayank";

$stmt = $conn->prepare("UPDATE books SET name = ? WHERE name = ?");
$stmt->bind_param("ss", $newName, $oldName);

if ($stmt->execute()) 
{    
echo "Record updated successfully";
} 
else 
{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
