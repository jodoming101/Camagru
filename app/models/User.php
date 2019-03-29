<?php

require ("Database.php");

class User extends Model
{
    public $username = "";
    public $email = "";
    public $password = "";


    public function checkUsername($username)
    {
        $username = $this->_database->getData("SELECT usr_username from users WHERE usr_username = :username",
            array(":username" => $username))["usr_username"];
        return ($username);
    }

    public function checkMail($email)
    {
        $email = $this->_database->getData("SELECT usr_email from users WHERE usr_email = :email",
            array(":email" => $email))["usr_email"];
        return ($email);
    }

    public function register($username, $email, $password) {
        $this->_database->insertData("INSERT INTO users(usr_username, usr_email, usr_pwd) VALUES(:username, :email, :password)",
            array(":username" => $username, ":email" => $email, ":password" =>$password)
            );
    }

}