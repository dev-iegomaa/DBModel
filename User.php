<?php

require_once 'env.php';
class User 
{
    private $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect(SERVER, USER, PASSWORD, DBNAME);
    }

    public function insert(string $name, string $email, string $password): int
    {
        $query = mysqli_query($this->connection, "INSERT INTO `users` SET `name`='$name',`email`='$email',`password`='$password'");
        return mysqli_affected_rows($this->connection);
    }

    public function select(): array
    {
        $query = mysqli_query($this->connection, "SELECT * FROM `users`");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function delete(int $id): int
    {
        $query = mysqli_query($this->connection, "DELETE FROM `users` WHERE `id`=$id");
        return mysqli_affected_rows($this->connection);
    }

    public function update(int $id, string $name, string $email, string $password): int
    {
        $query = mysqli_query($this->connection, "SELECT * FROM `users` WHERE `id`=$id");
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            $query = mysqli_query($this->connection, "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`=$id");
            return mysqli_affected_rows($this->connection);
        }
        return -1;
    }
}