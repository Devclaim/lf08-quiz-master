<?php

namespace classes;

use mysqli;

class Connection
{
    public $host = "db";
    public $user = "root";
    public $password = "root";
    public $db_name = "quizmaster";
    public $port = 3306;
    public $conn;

    public function __construct()
    {
        session_start();
        //create quizmaster DB if it doesnt exist
        $temp_conn = new mysqli("db", $this->user, $this->password, '', $this->port);
        $query = "CREATE DATABASE IF NOT EXISTS quizmaster";
        $temp_conn->query($query);
        mysqli_close($temp_conn);

        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}
