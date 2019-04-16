<?php
    include_once '../views/header.php';
    unset($_SESSION);
    session_destroy();
    header("Location: ../views/gallery.php");