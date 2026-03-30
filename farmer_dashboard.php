<?php
session_start();
// Check if the user is logged in and is a farmer
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'farmer') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="eco_cultivate.jpg.jpg" alt="EcoCultivate Logo">
        <h1>Welcome to Farmer Dashboard</h1>
    </header>
    <main>
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
        <h3>Your Actions:</h3>
        <ul>
            <li><a href="upload_product.php">Upload Your Products</a></li>
            <li><a href="browse_land.php">Browse Available Land Listings</a></li>
            <li><a href="view_product_listings.php">View Your Product Listings</a></li>
        </ul>
    </main>
    <footer>
        <p>&copy; 2024 EcoCultivate. All Rights Reserved.</p>
    </footer>
</body>
</html>
