<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);


// $sql("insert into value(name,email,password)values('$name','$email','$password')");

// Check connection

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// $name = "Azad";
// $subject = "Maths";
// $author = "Azad Book";
// $price = "10000";

$name = $_GET["name"];
$subject = $_GET["subject"];
$author = $_GET["author"];
$price = $_GET["price"];

echo "Connected successfully";

$stmt = $conn->prepare("INSERT INTO books (name, subject, author, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $name, $subject, $author, $price);

$stmt->execute()
?>