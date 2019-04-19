<?php
    include_once '../views/header.php';
    unset($_SESSION);
    session_destroy();
    echo "<script type='text/javascript'> alert('Vous etes deconnecte.\\r\\nMerci de votre visite!');
                           window.location.replace('../views/login.php')</script>";