<?php

require("Database.php");
include('../../config/database.php');

class User extends Model
{

    public $username = NULL;
    public $password = NULL;
    public $email = NULL;
    public $data = NULL;
    public $hash = NULL;
    public $key = NULL;

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

    public function checkMailforpwd($email)
    {
        $email = $this->_database->getData("SELECT usr_email from users WHERE usr_username = :email",
            array(":email" => $email))["usr_email"];
        return ($email);
    }

    public function register($username, $email, $hash, $key)
    {
        $this->_database->insertData("INSERT INTO users(usr_username, usr_email, usr_pwd, usr_key)
            VALUES(:username, :email, :password, :key)", array(":username" => $username, ":email" => $email,
                ":password" => $hash, ":key" => $key)
        );
    }

    public function getIdInfo($username)
    {
        $data = $this->_database->getData("SELECT usr_id, usr_username, usr_email, usr_vfd, usr_pwd, usr_key 
            FROM users WHERE usr_username = :username", array(":username" => $username));
        return ($data);
    }

    public function getConfirmationKey($username)
    {
        $confirmationKey = $this->_database->getData("SELECT usr_key FROM users WHERE usr_username = :username",
            array(":username" => $username))["usr_key"];
        return ($confirmationKey);
    }

    public function confirmAccount($username)
    {
        $this->_database->insertData("UPDATE users SET usr_vfd = 2 WHERE usr_username = :username",
            array(":username" => $username));
    }

    public function updatePwd($username, $hash)
    {
        $this->_database->insertData("UPDATE users SET usr_pwd = :hash WHERE usr_username = :username",
            array(":hash" => $hash, ":username" => $username));
    }

    public function updateEmail($username, $email)
    {
        $this->_database->insertData("UPDATE users SET usr_email = :email WHERE usr_username = :username",
            array(":email" => $email, ":username" => $username));
    }

    public function updateUsername($username, $oldUsername)
    {
        $this->_database->insertData("UPDATE users SET usr_username = :new WHERE usr_username = :old",
            array(":old" => $oldUsername, ":new" => $username));
        $_SESSION["username"] = $username;
    }

//    public function AcceptNotif() {
//        $this->
//    }
}