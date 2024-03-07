<?php
    require 'function.php';

    $dbcontroller = new DBController();
    $dbcontroller->initiateDatabase();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LF08 QuizMaster</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body class="background-polka">
        <div class="wrapper">
            <div class="container">
                <h1 class="headline">Quiz Master</h1>
                <div class="buttonContainer">
                    <a class="buttonTeal href="/play.php">Play Game</a>
                    <a class="button" href="/login.php">Login</a>
                    <a class="button" href="/registration.php">Register</a>
                    <a class="button" href="/leaderboard.php">Leaderboard</a>
                </div>
            </div>
        </div>
    </body>
</html>
