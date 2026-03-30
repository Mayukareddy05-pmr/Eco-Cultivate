

<?php
session_start();
include 'db_connection.php'; // Ensure this file connects to your database

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // Validate inputs
    if (empty($email) || empty($password) || empty($userType)) {
        $error = "All fields are required!";
    } else {
        // Prepare and execute SQL query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND user_type = ?");
        $stmt->bind_param("sss", $email, $password, $userType);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['user'] = $email;
            // Redirect based on user type
            if ($userType === 'farmer') {
                header("Location: farmer.html");
            } elseif ($userType === 'landlord') {
                header("Location: landlord.html");
            } elseif ($userType === 'customer') {
                header("Location: customer.html");
            }
            exit();
        } else {
            $error = "Invalid credentials!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <header>
        <img src="eco_cultivate.jpg.jpg" alt="EcoCultivate Logo">
        <h1>Login to Your Account</h1>
    </header>

    <main>
        <!-- Show error message if login fails -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <select name="userType" required>
                <option value="">Select User Type</option>
                <option value="farmer">Farmer</option>
                <option value="customer">Customer</option>
                <option value="landlord">Landlord</option>
            </select>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
    </main>

    <footer>
        <p>&copy; 2024 EcoCultivate</p>
    </footer>
</body>
</html>
