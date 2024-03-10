<?php

namespace classes;

// phpcs:disable
require "Connection.php";
// phpcs:enable

class DBController extends Connection
{
    public function initiateTable()
    {
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

    public function resetDatabase()
    {
        $query = "DROP TABLE user";
        $this->conn->query($query);
    }

    public function selectUserById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }
}
