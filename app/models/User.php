<?php

require ("Database.php");
include('../../config/database.php');

class User extends Model
{

    private $login;
    private $password;
    private $email;
    private $db_con;
    public $error;

    public function add()
    {
        try {
            $stmt = $this->db_con->prepare("INSERT INTO users(usr_username, usr_email, usr_pwd) VALUES (:login, :email, :password)");
            $val = $stmt->execute(array(
                ":login" => $this->login,
                ":email" => $this->email,
                ":password" => $this->password
            ));
            if ($val) {
                $_SESSION['logged_but_not_valid'] = $this->login;
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

    public function register($username, $email, $password) {
        $this->_database->insertData("INSERT INTO users(usr_username, usr_email, usr_pwd) VALUES(:username, :email, :password)",
            array(":username" => $username, ":email" => $email, ":password" =>$password)
            );
    }

    public function password_verify () {

    }

    public function login () {

    }

}