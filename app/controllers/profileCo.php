<?php
/**
 * Created by PhpStorm.
 * User: jodoming
 * Date: 2019-04-23
 * Time: 11:07
 */
session_start();
require("../models/User.php");


$db = new Database();
$user = new User($db);

if (isset($_SESSION["username"])) {
    if (!empty($_POST["nw_username"])) {
        $username = htmlspecialchars($_POST["nw_username"], ENT_QUOTES, 'UTF-8');
        if (strlen($username) < 5 || strlen($username) > 20) {
            echo "<script>alert('Le nom d\'utilisateur doit contenir entre 5 and 20 caractères.')</script>";
            echo "<script>window.location.replace('../views/profile.php')</script>";
        } else {
            $checkUsername = $user->checkUsername($username);
            if (!empty($checkUsername)) {
                echo "<script>alert('Ce nom d\'utilisateur n\'est pas disponible.')</script>";
                echo "<script>window.location.replace('../views/profile.php')</script>";
            } else {
                $user->updateUsername($username, $_SESSION["username"]);
                $_SESSION["username"] = $username;
                echo "<script>alert('Le nom d\'utilisateur a bien été remplacé.')</script>";
            }
        }
    }
    if (!empty($_POST["nw_email"])) {
        $nw_email = htmlspecialchars($_POST["nw_email"], ENT_QUOTES, 'UTF-8');
        $verifMail = $user->checkMailforpwd($nw_email);
        if (!empty($verifMail)) {
            echo "<script>alert('Cet email est déjà utilisé.')</script>";
            echo "<script>window.location.replace('../views/profile.php')</script>";
        } else {
            $user->updateEmail($_SESSION["username"], $nw_email);
            $_SESSION["nw_email"] = $nw_email;
            echo "<script>alert('Votre email a été mis à jour.')</script>";
        }
    }
    if (!empty($_POST["nw_pwd"])) {
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST["nw_pwd"])
            && strlen($_POST["nw_pwd"]) >= 8) {
            $hash = password_hash($_POST["nw_pwd"], PASSWORD_BCRYPT);
            $user->updatePwd($_SESSION["username"], $hash);
            echo "<script>alert('Votre mot de passe a été mis à jour.')</script>";
        } else {
            echo "<script>alert('Le mot de passe doit comporter au moins 8 caractères, une majuscule, un caractère spécial et un chiffre.')</script>";
            echo "<script>window.location.replace('../views/profile.php')</script>";
        }
    }
    //if (!isset($_POST[]))
    echo "<script>window.location.replace('../controllers/logoutCo.php')</script>";
}