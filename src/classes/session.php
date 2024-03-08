<?php
session_start();

class Connection{
    public $host = "db";
    public $user = "root";
    public $password = "root";
    public $db_name = "quizmaster";
    public $port = 3306;
    public $conn;

    public function __construct(){
        //create quizmaster DB if it doesnt exist
        $temp_conn = new mysqli("db", $this->user, $this->password, '', $this->port);
        $query = "CREATE DATABASE IF NOT EXISTS quizmaster";
        $temp_conn->query($query);
        mysqli_close($temp_conn);

        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}

class Register extends Connection{
    public function registration($name, $username, $email, $password, $confirmpassword){
        $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            return 10;
            // Username or email has already taken
        }
        else{
            if($password == $confirmpassword){
                $query = "INSERT INTO user (name,username,email,password,is_admin) VALUES('$name', '$username', '$email', '$password',0)";
                mysqli_query($this->conn, $query);
                return 1;
                // Registration successful
            }
            else{
                return 100;
                // Password does not match
            }
        }
    }
}

class Login extends Connection{
    public $id;
    public $username;
    public function login($usernameemail, $password){
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $this->id = $row["id"];
                $this->username = $row["username"];
                return 1;
                // Login successful
            }
            else{
                return 10;
                // Wrong password
            }
        }
        else{
            return 100;
            // User not registered
        }
    }

    public function getID(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
}

class DBController extends Connection{
    public function initiateTable() {
        $query = "CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        is_admin BOOLEAN NOT NULL DEFAULT 0
    )";

        $this->conn->query($query);
    }

    public function resetDatabase() {
        $query = "DROP TABLE user";
        $this->conn->query($query);
    }

    public function selectUserById($id){
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }
}
