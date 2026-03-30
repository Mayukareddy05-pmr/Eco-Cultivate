<?php
include 'db.php'; // Include database connection

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Product Name: " . $row["name"] . "<br>";
        echo "Price: " . $row["price"] . "<br>";
        echo "Description: " . $row["description"] . "<br><br>";
    }
} else {
    echo "No products available";
}

$conn->close();
?>
