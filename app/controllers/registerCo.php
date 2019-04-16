<?php
require("../models/User.php");

function check_username($username)
{
    $errors = array();
    if (empty($username)) {
        array_push($errors, 'Le champ Utilisateur est vide.');
    } elseif (strlen($username) < 3 || strlen($username) > 20) {
        array_push($errors, 'Le nom d\'utilisateur doit contenir entre 5 and 20 caractères.');
    }
    $db = new Database();
    $user = new User($db);
    $return = $user->checkUsername($username);
    if ($return)
        array_push($errors, 'Ce nom d\'utilisateur est pris.');
    return ($errors);
}

function check_email($email)
{
    $errors = array();
    if (empty($email)) {
        array_push($errors, 'Le champ email est vide.');
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        array_push($errors, 'Format d\'email invalide');
    }
    $db = new Database();
    $user = new User($db);
    $return = $user->checkMail($email);
    if ($return)
        array_push($errors, 'Cet email est déjà enregistré.');
    return ($errors);
}

function check_password($usrpwd, $confirmpwd)
{
    $errors = array();
    if (empty($usrpwd)) {
        array_push($errors, 'Le champ mot de passe est vide.');
    } else {
        if (strlen($usrpwd) < 8) {
            array_push($errors, 'Le mot de passe choisi est trop court.');
        }
        if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $usrpwd)) {
            array_push($errors, 'Le mot de passe doit inclure au moins une majuscule, un caractère spécial et un chiffre.');
        }
    }
    if ($usrpwd !== $confirmpwd) {
        array_push($errors, "Les mots de passe ne correspondent pas.");
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
        emailActivation($username, $email, $key);
        array_push($msg, 'Compte créé avec succès.');
        var_dump($msg);
    } else {
        var_dump($msg);
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
    http://localhost:8008/models/activation.php?login=' . urlencode($username) . '&key=' . urlencode($key) . '
    ---------------
    Ce mail est généré automatiquement. Merci de ne pas y répondre.';
    mail($email, $subject, $message, $header);
}

function accountActivation()
{
    $username = $_POST["username"];
    $key = $_POST["key"];
    $msg = array();
    if (!empty($username) && !empty($key)) {
        $db = new Database();
        $user = new User($db);
        $databaseKey = $user->getConfirmationKey($username);
        if ($databaseKey === $key) {
            $user->confirmAccount($username);
            array_push($messages, "Your account has been activated.");
            var_dump($msg);
        } else {
            array_push($messages, "Your activation key is not the one that we sent you.");
            var_dump($msg);
        }
    }
}