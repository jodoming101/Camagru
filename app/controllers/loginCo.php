<?php
require("../models/User.php");

$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
$password = $_POST["password"];
$message = [];

if ((isset($username) && !empty($username)) &&
    (isset($password) && !empty($password))) {

    $db = new Database();
    $user = new User($db);
    $data = $user->getIdInfo($username);
    if (empty($data))
        echo "Le nom d'utilisateur est inconnu.";
    else if (password_verify($password, $data['usr_pwd']) == true) {
        if ($data['usr_vfd'] == 1)
        {
            $username = $data["usr_username"];
            $message = "Bienvenue " . $data["usr_username"] . " !";
            echo $message;
        }
        else {
            echo "Votre compte n\'a pas encore été activé. Merci de vérifier votre boîte mail.";
        }
    } else
        echo 'Le mot de passe est incorrect.';
    } else {
    if (!isset($username) || empty($username)) {
        echo "Le nom d'utilisateur est inconnu ou absent.";
    }
    if (!isset($password) || empty($password)) {
        echo "Merci de remplir le champ correspondant avec votre Mot de passe.";
    }
}

