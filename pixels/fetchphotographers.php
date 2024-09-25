<?php
require("connection.php");

$query = "SELECT * FROM photographers";
$result = mysqli_query($conn, $query);

$photographers = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $photographers[] = $row;
    }
} else {
    echo "Error fetching photographers: " . mysqli_error($conn);
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($photographers);
?>
