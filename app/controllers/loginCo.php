<?php
require("../models/User.php");

function login()
{
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = $_POST["password"];
    $msg = array();
    $errMsg = array();

    if (isset($_POST["password"])) {
        if (!empty($username) && !empty($password)) {
            $db = new Database();
            $user = new User($db);
            $return = $user->getIdInfo($username);
            if (password_verify($password, $return["password"]) == true) {
                echo 'ok';
            }
        }
    }
}

login();
