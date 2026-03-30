<?php
include 'db.php'; // Include database connection

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row["id"] . "<br>";
        echo "Customer: " . $row["customer_name"] . "<br>";
        echo "Product ID: " . $row["product_id"] . "<br>";
        echo "Quantity: " . $row["quantity"] . "<br>";
        echo "Order Date: " . $row["order_date"] . "<br><br>";
    }
} else {
    echo "No orders found";
}

$conn->close();
?>
