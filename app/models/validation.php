<?php
require("../models/User.php");

// Account activation email - needs activation key

function confirmRegistration ()
{
$username = $_POST["username"];
$key = md5(microtime(TRUE)*100000);

$stmt = $this->db_con->prepare("UPDATE users SET usr_key=:key WHERE usr_username=:username");
$stmt->execute(array(
":key" => $key,
":username" => $this->username
));
$subject = "Camagru | Activer votre compte";
$header = "From: no_reply@camagru.com";
$message = 'Bienvenue sur Camagru ' . $this->username . '!
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
http://localhost:8008/models/activation.php?login=' . urlencode($this->username) . '&key=' . urlencode($key) . '
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
mail($this->email, $subject, $message, $header);

}