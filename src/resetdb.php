<?php
require 'function.php';

$dbcontroller = new DBController();
$dbcontroller->resetDatabase();

header("Location: index.php");
