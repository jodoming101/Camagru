<?php

require("Database.php");
include('../../config/database.php');

class User extends Model
{

    private $username = NULL;
    private $password = NULL;
    private $email = NULL;
    private $db_con;
    public $active = NULL;
    public $key = NULL;
    public $error;

    public function add()
    {
        try {
            $stmt = $this->db_con->prepare("INSERT INTO users(usr_username, usr_email, usr_pwd) 
            VALUES (:username, :email, :password)");
            $val = $stmt->execute(array(
                ":username" => $this->username,
                ":email" => $this->email,
                ":password" => $this->password
            ));
            if ($val) {
                $_SESSION['logged_but_not_valid'] = $this->username;
                return 0;
            } else
                echo "ERROR EXECUTE ADD";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


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

    public function register($username, $email, $password)
    {
        $this->_database->insertData("INSERT INTO users(usr_username, usr_email, usr_pwd/*, usr_key*/) 
            VALUES(:username, :email, :password, :key)", array(":username" => $username, ":email" => $email,
                ":password" => $password/*, ":key" => $key*/)
        );
    }

    public function getIdInfo($username)
    {
        $data = $this->_database->getData("SELECT usr_id, usr_username, usr_email, usr_vfd, usr_pwd FROM users WHERE usr_username = :username", array(":username" => $username));
        return ($data);
    }


}