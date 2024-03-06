<?php
    $username = "root";
    $password = "root";
    $dbname = "quizmaster";
    $servername = "db"; //docker-compose.yml database name
    $port = 3306;
    $conn = new mysqli($servername, $username, $password, '', $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully.<br>";

    $query = "CREATE DATABASE IF NOT EXISTS quizmaster";
    if ($conn->query($query) === TRUE) {
        echo "Database 'quizmaster' created successfully.<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }

    $conn->select_db($dbname);

    $query = "CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    if ($conn->query($query) === TRUE) {
        echo "Table 'user' created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $insertData = [
        ['username1', 'password1'],
        ['username2', 'password2'],
        ['username3', 'password3']
    ];

    foreach ($insertData as $data) {
        $username = $data[0];
        $password = $data[1];

        $query = "INSERT INTO user (username, password) VALUES ('$username','$password')";
        if ($conn->query($query) === TRUE) {
            echo "Data inserted successfully.<br>";
        } else {
            echo "Error inserting data: " . $conn->error . "<br>";
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LF08 QuizMaster</title>
        <link rel="stylesheet" href="css/output.css">
    </head>

    <body class="bg-[green] text-white">
        <h1>Quiz Master</h1>
    </body>
</html>
