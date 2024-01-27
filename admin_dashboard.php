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
<link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body>
    <h2>Welcome, Admin <?php echo $username; ?></h2>
    <p>Email: <?php echo $email; ?></p>

    <button><a href="get_contacts.php">Kontaktet</a></button>
    <button><a href="add_product_form.html">Shto Produktet</a></button>
    <button><a href="view_products.html">Shiko Produktet</a></button>

    
    
    
    <a href="logout.php">Logout</a>
</body>
</html>
