<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Session username not set. Redirecting to login...";
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
$loginTime = isset($_SESSION['login_time']) ? $_SESSION['login_time'] : 'N/A';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
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
    
    <div class="container">
        <h2>Welcome, <?php echo $username; ?></h2>

        <div class="profile-info">
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Last Login Time:</strong> <?php echo $loginTime; ?></p>
        </div>

        <a href="welcome.php" class="btn">Go back</a>
        <a href="update_profile.php" class="btn2">Edit profile</a>
    </div>
    <script>
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
   
</body>
</html>
