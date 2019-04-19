<?php
session_start();
require("../models/User.php");
$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
$password = $_POST["password"];
$msg = [];

if ((isset($username) && !empty($username)) &&
    (isset($password) && !empty($password))) {

    $db = new Database();
    $user = new User($db);
    $data = $user->getIdInfo($username);
    if (empty($data))
        echo "<script type='text/javascript'> confirm('Le nom d\'utilisateur est inconnu.');
                       window.location.replace('../views/login.php')</script>";
    else if (password_verify($password, $data['usr_pwd']) == true) {
        if ($data['usr_vfd'] == 1)
        {
            $username = $data["usr_username"];
            $_SESSION["username"] = $username;
            $msg = "Bienvenue " . $_SESSION["username"] . " !";
            echo "<script type='text/javascript'> confirm('$msg');
                       window.location.replace('../views/snap.php')</script>";
        }
        else {
            echo "<script type='text/javascript'> confirm('Votre compte n\'a pas encore été activé.' +
                 '\\r\\nMerci de vérifier votre boîte mail.');
                       window.location.replace('../views/login.php')</script>";
        }
    } else
        echo "<script type='text/javascript'> confirm('Le mot de passe est incorrect.');
                       window.location.replace('../views/login.php')</script>";
    } else {
    if (!isset($username) || empty($username)) {
        echo "<script type='text/javascript'> confirm('Le nom d\'utilisateur est inconnu ou absent.');
                       window.location.replace('../views/login.php')</script>";
    }
    if (!isset($password) || empty($password)) {
        echo "<script type='text/javascript'> confirm('Merci de compléter le champ correspondant au Mot de passe.');
                       window.location.replace('../views/login.php')</script>";
    }
}