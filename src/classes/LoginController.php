<?php

namespace classes;

// phpcs:disable
require "Connection.php";
// phpcs:enable

class LoginController extends Connection
{
    public $id;
    public $username;

    public function login($usernameemail, $password)
    {
        $result = mysqli_query(
            $this->conn,
            "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'"
        );
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $this->id = $row["id"];
                $this->username = $row["username"];
                return 1;
                // Login successful
            } else {
                return 10;
                // Wrong password
            }
        } else {
            return 100;
            // User not registered
        }
    }

    public function getID()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
}
