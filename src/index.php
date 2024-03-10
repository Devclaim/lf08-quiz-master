<?php

use classes\DBController;

require "classes/DBController.php";

$dbcontroller = new DBController();
$dbcontroller->initiateTable();

if (!empty($_SESSION["id"])) {
    $user = $dbcontroller->selectUserById($_SESSION["id"]);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php include "components/header.php"?>
    <body class="background-polka">
        <?php include "components/navbar.php"?>
        <div class="wrapper">
            <div class="container">
                <h1 class="headline">Quiz Master</h1>
                <div class="buttonContainer">
                    <a class="buttonTeal" href="/play.php">Play Game</a>
                    <a class="button" href="/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>
