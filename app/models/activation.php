<?php

require("../models/User.php");

function activateAccount()
{
    $username = $_GET["username"];
    $key = $_GET["key"];
    $msg = array();
    if (!empty($username) && !empty($key)) {
        $db = new Database();
        $user = new User($db);
        $databaseKey = $user->getConfirmationKey($username);
        if ($databaseKey === $key) {
            $user->confirmAccount($username);
            array_push($msg, "Votre compte est maintenant activé.");
            echo "<script> alert('$msg');
                       window.location.replace('../views/login.php');
                  </script>";
        } else {
            array_push($msg, "La clé d'activation est inconnue.");
            echo "<script> alert('$msg');
                       window.location.replace('../views/login.php');
                  </script>";
        }
    }
}

activateAccount();

header("Location: ../views/gallery.php");