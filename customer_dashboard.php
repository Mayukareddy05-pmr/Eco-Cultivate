<?php
session_start();
// Check if the user is logged in and is a customer
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'customer') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="eco_cultivate.jpg.jpg" alt="EcoCultivate Logo">
        <h1>Welcome to Customer Dashboard</h1>
    </header>
    <main>
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
        <h3>Your Actions:</h3>
        <ul>
            <li><a href="browse_products.php">Browse Products from Farmers</a></li>
            <li><a href="view_orders.php">View Your Orders</a></li>
            <li><a href="contact_farmers.php">Contact Farmers</a></li>
        </ul>
    </main>
    <footer>
        <p>&copy; 2024 EcoCultivate. All Rights Reserved.</p>
    </footer>
</body>
</html>
