<?php
    require 'classes/session.php';

    $dbcontroller = new DBController();
    $dbcontroller->initiateTable();

    if(!empty($_SESSION["id"])){
        $user = $dbcontroller->selectUserById($_SESSION["id"]);
    }
    else{
        header("Location: login.php");
    }
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
                    <a class="button" href="/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>
