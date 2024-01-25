<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        #contacts-container {
            max-width: 600px;
            margin-top: 20px;
        }

        #contacts-list {
            list-style-type: none;
            padding: 0;
        }

        #contacts-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>View Contacts</h2>
    <div id="contacts-container">
        <h3>Existing Contacts</h3>
        <ul id="contacts-list">
            <?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'eepic';

            $connection = mysqli_connect($host, $username, $password, $database);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT name, email, text FROM contact";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>Name: " . $row['name'] . " - Email: " . $row['email'] . " - Text: " . $row['text'] . "</li>";
                }
            } else {
                echo "<li>No contacts found.</li>";
            }

            mysqli_close($connection);
            ?>
        </ul>
    </div>
</body>
</html>
