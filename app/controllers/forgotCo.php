<?php
/**
 * Created by PhpStorm.
 * User: jodoming
 * Date: 2019-04-23
 * Time: 15:11
 */

require("../models/User.php");


$username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
$db = new Database();
$user = new User($db);
if (!empty($username)) {
    $checkUsername = $user->checkUsername($username);
    if (!empty($checkUsername)) {
        $newpwd = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        $hash = password_hash($newpwd, PASSWORD_BCRYPT);
        $email = $user->checkMailforpwd($username);
        $user->updatePwd($username, $hash);
        $subject = "Camagru | Nouveau Mot de Passe";
        $header = "From: no_reply@camagru.com";
        $message = 'Voici votre nouveau mot de passe : ' . $newpwd . '. N\'oubliez pas de le modifier une fois connecté.
    
                    ---------------
                    Ce mail est généré automatiquement. Merci de ne pas y répondre.';
        mail($email, $subject, $message, $header);

        echo "<script type='text/javascript'> confirm('Votre nouveau mot de passe vient de vous être envoyé par email.');
                       window.location.replace('../views/login.php')</script>";
    } else {
        echo "<script type='text/javascript'> confirm('Le nom d\'utilisateur est inconnu.');
                       window.location.replace('../views/forgotPwd.php')</script>";
    }

} else {
    echo "<script type='text/javascript'> confirm('Le champ correspondant au nom d\'utilisateur est vide.');
                       window.location.replace('../views/forgotPwd.php')</script>";
}
