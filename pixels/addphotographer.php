<?php
require("connection.php");
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);
    
    $photo = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoError = $_FILES['photo']['error'];
    
    if ($photoError === UPLOAD_ERR_OK) {
        $photoDestination = 'uploads/' . basename($photo);
        if (move_uploaded_file($photoTmpName, $photoDestination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        $photoDestination = null;
    }


    $query = "SELECT * FROM photographers WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
       
        if ($photoDestination) {
            $updateQuery = "UPDATE photographers SET name = '$name', bio = '$bio', 
            photo = '$photoDestination', tags = '$tags' WHERE email = '$email'";
        } else {
            $updateQuery = "UPDATE photographers SET name = '$name', bio = '$bio', 
            tags = '$tags' WHERE email = '$email'";
        }
        if (mysqli_query($conn, $updateQuery)) {
            echo "Photographer updated successfully.";
        } else {
            echo "Error updating photographer: " . mysqli_error($conn);
        }
    } else {
       
        $insertQuery = "INSERT INTO photographers (name, email, bio, photo, tags) 
        VALUES ('$name', '$email', '$bio', '$photoDestination', '$tags')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Photographer added successfully.";
        } else {
            echo "Error adding photographer: " . mysqli_error($conn);
        }
    }

    // Close the connection
    mysqli_close($conn);
}
?>
