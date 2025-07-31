<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "basic";
// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// $data = json_decode(file_get_contents("php://input"), true);

$name = $_GET["name"];
$subject = $_GET["mobile"];
$author = $_GET["email"];
$price = $_GET["password"];

echo "Connected successfully";

$stmt = $conn->prepare("INSERT INTO detail(name, mobile, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $name, $mobile, $email, $password);

$stmt->execute()

?>