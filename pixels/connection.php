
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixel";

// Create connection
$conn = mysqli_connect("localhost", "root", "", "pixel");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

