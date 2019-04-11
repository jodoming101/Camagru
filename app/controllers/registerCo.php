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
        if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $usrpwd)) {
            array_push($errors, 'Password must include at least a digit and a special character!');
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
    $confirmpwd = $_POST["confirmpwd"];
    $msg = array();
    $errMsg = NULL;
    $key = NULL;
    $hash = NULL;


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
        $key = md5(microtime(TRUE)*100000);
        var_dump($key);
        $hash = password_hash($usrpwd, PASSWORD_BCRYPT);
        $db = new Database();
        $user = new User($db);
        $user->register($username, $email, $hash, $key);
        confirmRegistration($username, $email, $key);
        array_push($msg, 'User successfully created.');
        var_dump($msg);
    } else {
        var_dump($msg);
    }
}

register();

// Account activation email - needs activation key

function confirmRegistration ($username, $email, $key)
{
    $subject = "Camagru | Activer votre compte";
    $header = "From: no_reply@camagru.com";
    $message = 'Bienvenue sur Camagru ' . $username . '!
    Pour activer votre compte, veuillez cliquer sur le lien ci dessous
    ou le copier puis le coller dans la barre d\'addresse de votre navigateur.
    http://localhost:8008/models/index.php?login=' . urlencode($username) . '&key=' . urlencode($key) . '
    ---------------
    Ce mail est généré automatiquement. Merci de ne pas y répondre.';
    mail($email, $subject, $message, $header);

}