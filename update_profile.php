<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $newUsername = isset($_POST['new_username']) ? trim($_POST['new_username']) : '';
    $newPassword = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';

 
    if (!empty($newUsername) && !empty($newPassword)) {
        
        
     
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'eepic';
   

        $connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        if ($connection) {
            $username = $_SESSION['username'];

            $updateUsernameQuery = "UPDATE users SET username = '$newUsername' WHERE username = '$username'";
            mysqli_query($connection, $updateUsernameQuery);

           
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username'";
            mysqli_query($connection, $updatePasswordQuery);

            $_SESSION['username'] = $newUsername; 

            mysqli_close($connection);

            header("Location: profile.php");
            exit();
        } else {
            $errorMessage = "Error connecting to the database.";
        }
    } else {
        $errorMessage = "Please enter both a new username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
        <h2>Update Profile</h2>

        <form action="" method="post">
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <button type="submit" class="btn">Update Profile</button>
        </form>

        <?php if (!empty($errorMessage)) : ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
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
