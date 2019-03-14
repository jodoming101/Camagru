<?php
    session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
</head>

<body>
    <div class="homepage">
        <img src="img/logo_camagru.png" class="logo">
        <button type="submit" class="loginbutton" onclick="location.href='views/Login.php'">Connection</button>
        <button type="submit" class="registerbutton" onclick="location.href='views/Register.php'">Inscription</button>
    </div>
</body>
</html>

