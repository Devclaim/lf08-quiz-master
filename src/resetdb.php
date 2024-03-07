<?php
    require 'classes/session.php';

    $dbcontroller = new DBController();
    $dbcontroller->resetDatabase();
    
    header("Location: index.php");
