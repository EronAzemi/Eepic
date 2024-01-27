<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_username = mysqli_real_escape_string($connection, $_POST['username']);
    $entered_password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$entered_username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (isset($user['password']) && password_verify($entered_password, $user['password'])) {
            echo "Password verification successful!";

            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['login_time'] = time();

            if ($user['user_id'] === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: welcome.php");
            }
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

mysqli_close($connection);
?>