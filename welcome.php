<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Session username not set. Redirecting to login...";
    header("Location: login.html");
    exit();
}
header('Content-Type: text/html; charset=utf-8');
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eepic</title>
    
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="navbarlog.css">
    
    
    <link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<body>
     <!-- ketu vendoset header    -->
<header>
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
</header>
    <div class="main">
        <div class="banerBG">
        <img class="Baneri"src="Images/HomePage-YourFavoritePc 2.png" alt="">
    </div>
    </div>
    <br>
    <h2>Welcome, <?php echo $username; ?></h2>
    
    <div id="productList"></div>
    
    <script>
         fetch('display_products.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('productList').innerHTML = data;
            })
            .catch(error => console.error('Error fetching products:', error));
            
    let openHam = document.querySelector('#openHam');
    let closeHam = document.querySelector('#closeHam');
    let navigationItems = document.querySelector('#navigation-items');

    const hamburgerEvent = (navigation, close, open) => {
        navigationItems.style.display = navigation;
        closeHam.style.display = close;
        openHam.style.display = open;
    };

    openHam.addEventListener('click', () => hamburgerEvent("flex", "block", "none"));
    closeHam.addEventListener('click', () => hamburgerEvent("none", "none", "block"));
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>
