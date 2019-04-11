<?php
require("../models/User.php");

$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
$password = $_POST["password"];

if ((isset($username) && !empty($username)) &&
    (isset($password) && !empty($password))) {

    $db = new Database();
    $user = new User($db);
    $data = $user->getIdInfo($username);
    if (empty($data))
        echo "Le nom d'utilisateur est inconnu.";
    else if ($password === $data["usr_pwd"]) {
        $username = $data["usr_username"];
        echo "Bienvenue " . $data["usr_username"] . " !";
    } else
        echo 'Le mot de passe incorrect.';
    } else {
    if (!isset($username) || empty($username)) {
        echo "Le nom d'utilisateur est inconnu ou absent.";
    }
    if (!isset($password) || empty($password)) {
        echo "Le mot de passe est absent.";
    }
}

