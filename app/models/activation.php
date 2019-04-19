<?php

require("../models/User.php");

function activateAccount()
{
    $username = $_GET["username"];
    $key = $_GET["key"];
    if (!empty($username) && !empty($key)) {
        $db = new Database();
        $user = new User($db);
        $databaseKey = $user->getConfirmationKey($username);
        if ($databaseKey === $key) {
            $user->confirmAccount($username);
            echo "<script type='text/javascript'>alert('Votre compte est maintenant activé.');
                       window.location.replace('../views/login.php');
                  </script>";
        } else {
            echo "<script>alert('La clé d\'activation est inconnue.');
                       window.location.replace('../views/login.php');
                  </script>";
        }
    }
}

activateAccount();