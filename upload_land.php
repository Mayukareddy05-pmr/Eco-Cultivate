<?php
include 'db.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get land data from the form
    $land_name = $_POST['land_name'];
    $location = $_POST['location'];
    $size = $_POST['size'];

    // Insert land data into the database
    $sql = "INSERT INTO land (land_name, location, size) VALUES ('$land_name', '$location', '$size')";

    if ($conn->query($sql) === TRUE) {
        echo "Land uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
