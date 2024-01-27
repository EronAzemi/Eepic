<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    // File upload
    $target_directory = 'image/';

    // Create the directory if it doesn't exist
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

    $target_path = $target_directory . basename($_FILES['image']['name']);

    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        // File upload successful, proceed with database insertion
        $query = "INSERT INTO products (name, price, description, image_path) VALUES ('$name', '$price', '$description', '$target_path')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        // File upload failed
        echo "Sorry, there was an error uploading your file.";
    }
}

mysqli_close($connection);
?>
