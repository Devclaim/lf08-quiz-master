<?php

use classes\DBController;

require "classes/DBController.php";

$dbcontroller = new DBController();
$dbcontroller->resetDatabase();

header("Location: index.php");
