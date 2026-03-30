<?php
include 'db.php'; // Include database connection

// Check if the order form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get order data from the form
    $customer_name = $_POST['customer_name'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $order_date = date("Y-m-d H:i:s");

    // Insert order data into the orders table
    $sql = "INSERT INTO orders (customer_name, product_id, quantity, order_date) VALUES ('$customer_name', '$product_id', '$quantity', '$order_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
