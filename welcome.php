<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Session username not set. Redirecting to login...";
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    <h2>Welcome, User <?php echo $username; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>
