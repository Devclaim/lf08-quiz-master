<?php
    require 'classes/session.php';

    if(!empty($_SESSION["id"])){
        header("Location: index.php");
    }

    $login = new Login();

    if(isset($_POST["submit"])){
        $result = $login->login($_POST["usernameemail"], $_POST["password"]);

        if($result == 1){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $login->getID();
            $_SESSION["username"] = $login->getUsername();
            header("Location: index.php");
        }
        elseif($result == 10){
            echo
            "<script> alert('Wrong Password'); </script>";
        }
        elseif($result == 100){
            echo
            "<script> alert('User Not Registered'); </script>";
        }
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
                <h2 class="subheadline">Login</h2>
                <form class="flex flex-col items-center justify-center" action="" method="post" autocomplete="off">
                    <label for="">Username or Email : </label>
                    <input type="text" name="usernameemail" required value=""> <br>
                    <label for="">Password</label>
                    <input type="password" name="password" required value=""> <br>
                    <button class="button" type="submit" name="submit">Login</button>
                </form>
                <a class="button" href="registration.php">Create Account</a>
            </div>
        </div>
    </body>
</html>
