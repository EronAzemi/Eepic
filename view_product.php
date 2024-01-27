<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['product_id'])) {
    $product_id = mysqli_real_escape_string($connection, $_GET['product_id']);

    
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $product['name']; ?></title>
            <link rel="stylesheet" href="kompjuteri.css">
            <link rel="stylesheet" href="navbar.css">
            <link rel="icon" type="image/x-icon" href="favicon.png">
        </head>
        <body>
        <header class="navigation-header">
        <nav>
            <div class="logo-container">
                <a href="welcome.php"><img src="Images/LOGO PNG 1.png" alt=""></a>
            </div>
            <div class="navigation-items" id="navigation-items">
                <a href="logout.php">Logout</a>
                <a href="profile.php">Profili</a>
                
                
            </div>
            <div class="hamburger">
                <span id="openHam">&#9776;</span>
                <span id="closeHam">&#x2716;</span>
            </div>
        </nav>
       </header>
            <div class="box">
            <img src="<?php echo $product['image_path']; ?>" alt="Product Image" style="max-width: 100%; height: auto;">
                <h2><?php echo $product['name']; ?></h2>
                <br>
                <p>Price: <?php echo $product['price']; ?></p>
                <p>Description: <?php echo $product['description']; ?></p>
                
                <input type="hidden" name="product_id" value="1"> 
            <button type="submit">Buy Now</button>
            </div>
            
            
            

            
        </body>
        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}

mysqli_close($connection);
?>

