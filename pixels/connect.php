<?php

$host = "localhost"; 
$username = "root";
$password = ""; 
$database = "pixels"; 


$conn = new mysqli('localhost', 'root', '', 'pixels');


if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $desired_photographer = $_POST["desired-photographer"];
    $photography_type = $_POST["photography-type"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];

    
    $sql = "INSERT INTO contactus (name, phone, email, desired_photographer, photography_type, location, date, time, message) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $name, $phone, $email, $desired_photographer, $photography_type, $location, $date, $time, $message);
    $stmt->execute();

    
    if ($stmt->affected_rows == 1) {
        echo "Thank you for submitting the form!";
    } else {
        echo "Error submitting the form: ". $conn->error;
    }

   
    $stmt->close();
    $conn->close();
}
?>
