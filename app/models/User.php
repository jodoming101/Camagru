<?php

//require ("Database.php");

class User extends Model
{
    public $username = "";
    public $email = "";
    public $password = "";

    function register() {
        $data = [":username" => $this->username,
            ":email" => $this->email,
            ":password" => $this->password];
        $query = "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)";
    }
}