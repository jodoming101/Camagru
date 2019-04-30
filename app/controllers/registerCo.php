<?php
require("../models/User.php");

function check_username($username)
{
    $errors = array();
    if (empty($username) || strlen($username) < 5 || strlen($username) > 20) {
        array_push($errors, 1);
        echo "<script>alert('Le nom d\'utilisateur doit contenir entre 5 and 20 caractères.')</script>";
        echo "<script>window.location.replace('../views/register.php')</script>";
    }
    $db = new Database();
    $user = new User($db);
    $return = $user->checkUsername($username);
    if ($return) {
        array_push($errors, 1);
        echo "<script>alert('Ce nom d\'utilisateur n\'est pas disponible.')</script>";
        echo "<script>window.location.replace('../views/register.php')</script>";
    }
    return ($errors);
}

function check_email($email)
{
    $errors = array();
    $db = new Database();
    $user = new User($db);
    $return = $user->checkMail($email);
    if ($return) {
        echo "<script>alert('Cet email est déjà utilisé.')</script>";
        echo "<script>window.location.replace('../views/register.php')</script>";
        array_push($errors, 1);
    }
    return ($errors);
}

function check_password($usrpwd, $confirmpwd)
{
    $errors = array();
    if (empty($usrpwd) || (strlen($usrpwd) < 8 && !preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $usrpwd))) {
            array_push($errors, 1);
            echo "<script> alert('Le mot de passe doit inclure au moins 8 caractères, une majuscule, un caractère spécial et un chiffre.')</script>";
            echo "<script>window.location.replace('../views/register.php')</script>";
    }
    if ($usrpwd !== $confirmpwd) {
        array_push($errors, 1);
        $errors =  "Les mots de passe ne correspondent pas.";
        echo "<script> alert('Les mots de passe ne correspondent pas.')</script>";
        echo "<script>window.location.replace('../views/register.php')</script>";
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
        $hash = password_hash($usrpwd, PASSWORD_BCRYPT);
        $db = new Database();
        $user = new User($db);
        $user->register($username, $email, $hash, $key);
        emailActivation($username, $email, $key);
        echo "<script>alert('Votre compte a été créé avec succès. ' +
               'Un lien d\'activation vient de vous être envoyé.');
               window.location.replace('../views/login.php')</script>";
    }
}

register();

// Account activation email - needs activation key

function emailActivation ($username, $email, $key)
{
    $subject = "Camagru | Activer votre compte";
    $header = "From: no_reply@camagru.com";
    $message = 'Bienvenue sur Camagru ' . $username . '!
    Pour activer votre compte, veuillez cliquer sur le lien ci dessous
    ou le copier puis le coller dans la barre d\'addresse de votre navigateur.
    http://localhost:8008/Camagru/app/controllers/activation.php?username=' . urlencode($username) . '&key=' . urlencode($key) . '
    ---------------
    Ce mail est généré automatiquement. Merci de ne pas y répondre.';
    mail($email, $subject, $message, $header);
}
