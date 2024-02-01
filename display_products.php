<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($product = mysqli_fetch_assoc($result)) {
        echo '<div class="box box1 product-box">';
        echo '<img src="' . $product['image_path'] . '" alt="' . $product['name'] . '">';
        echo '<div class="modeli">';
        echo '<p>' . $product['name'] . '</p>';
        echo '<p>Price: $' . $product['price'] . '</p>';
       
        echo '<form action="view_product.php" method="get">';
        echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
        echo '<button class="butoni" type="submit">Buy Now</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No products found.";
}

mysqli_close($connection);
?>
