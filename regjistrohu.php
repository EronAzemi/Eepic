<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eepic';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
    } else {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email format.';
        } else {
            
            if ($password !== $confirm_password) {
                $response['status'] = 'error';
                $response['message'] = 'Passwords do not match.';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    $response['status'] = 'success';
                    $response['message'] = 'Registration successful!';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error: ' . mysqli_error($connection);
                }
            }
        }
    }

    mysqli_close($connection);
    header('Content-Type: application/json');
    echo json_encode($response);
    

    if ($response['status'] === 'success') {
        header('Location: login.html');
        exit();
    }
}
?>
