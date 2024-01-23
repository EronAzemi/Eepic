<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['user_id'] !== 'admin') {
    header("Location: login.html"); // Redirect to login page if not logged in or not an admin
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- your head content here -->
</head>
<body>
    <h2>Welcome, Admin <?php echo $username; ?></h2>
    <p>Email: <?php echo $email; ?></p>

    <!-- Admin-specific content here -->

    <a href="logout.php">Logout</a>
</body>
</html>
