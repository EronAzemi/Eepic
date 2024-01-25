<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $text = mysqli_real_escape_string($connection, $_POST['text']);

    $query = "INSERT INTO contact (name, email, text) VALUES ('$name', '$email' , '$text')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Contact added successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
