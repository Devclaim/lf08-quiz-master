<?php

namespace classes;

// phpcs:disable
require "Connection.php";
// phpcs:enable

class RegisterController extends Connection
{
    public function registration($name, $username, $email, $password, $confirmpassword)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
            // Username or email has already taken
        } else {
            if ($password == $confirmpassword) {
                $query = "INSERT INTO user (name,username,email,password,is_admin)
                VALUES('$name', '$username', '$email', '$password',0)";
                mysqli_query($this->conn, $query);
                return 1;
                // Registration successful
            } else {
                return 100;
                // Password does not match
            }
        }
    }
}
