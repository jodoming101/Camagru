<?php
require("../models/User.php");

function check_username($username)
{
    $errors = array();
    if (empty($username)) {
        array_push($errors, 'username is empty.');
    } elseif (strlen($username) < 5 || strlen($username) > 20) {
        array_push($errors, 'username must be between 5 and 20 characters long.');
    }
    $db = new Database();
    $user = new User($db);
    $return = $user->checkUsername($username);
    if ($return)
        array_push($errors, 'username is already taken.');
    return ($errors);
}

function check_email($email)
{
    $errors = array();
    if (empty($email)) {
        array_push($errors, 'email is empty.');
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        array_push($errors, 'invalid email format.');
    }
    $db = new Database();
    $user = new User($db);
    $return = $user->checkMail($email);
    if ($return)
        array_push($errors, 'email is already registered.');
    return ($errors);
}

function check_password($usrpwd, $confirmpwd)
{
    $errors = array();
    if (empty($usrpwd)) {
        array_push($errors, 'password is empty.');
    } else {
        if (strlen($usrpwd) < 8) {
            array_push($errors, 'Password too short!');
        }
        if (!preg_match("#[a-zA-Z][0-9]+#", $usrpwd)) {
            array_push($errors, 'Password must include at least one letter and one digit!');
        }
    }
    if ($usrpwd !== $confirmpwd) {
        array_push($errors, "passwords don't match");
    }
    return ($errors);
}

function register()
{
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $usrpwd = $_POST["usrpwd"];
    $confirmpwd = $_POST["pwdconfirm"];
    $msg = array();
    $errMsg = array();

    if ($errMsg = check_username($username)) {
        array_push($msg, $errMsg);
    }
    if ($errMsg = check_email($email)) {
        array_push($msg, $errMsg);
    }
    if ($errMsg = check_password($usrpwd, $confirmpwd)) {
        array_push($msg, $errMsg);
    }
    if (empty($msg)) {
        $db = new Database();
        $user = new User($db);
        $user->register($username, $email, $usrpwd);
        array_push($msg, 'User successfully created.');
   } else {
        var_dump($msg);
   }
}

register();
