<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['user_id'] !== 'admin') {
    header("Location: login.html"); 
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <h2>Welcome, Admin <?php echo $username; ?></h2>
    <p>Email: <?php echo $email; ?></p>

    

    <a href="logout.php">Logout</a>
</body>
</html>
