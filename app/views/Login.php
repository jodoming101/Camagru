<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/login.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
</head>
<body>
<div class="loginbox">
    <img src="../img/logo_camagru.png" class="logocam">
    <h1>Connectez-vous</h1>
    <form>
        <p>Nom d'utilisateur</p>
        <input type="text" name="" placeholder="Entrez votre nom d'utilisateur">
        <p>Mot de Passe</p>
        <input type="password" name="" placeholder="Entrez votre mot de passe">
        <input type="submit" name="" value="Se connecter" onclick="window.location.href'loggedin.php'"><br>
        <a href="#">Mot de passe perdu?</a><br>
        <a href="Register.php">Pas encore inscrit(e)?</a>
    </form>
</div>
</body>

</html>