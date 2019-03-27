<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/register.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
</head>
<body>
<div class="loginbox">
    <img src="../assets/img/logo_camagru.png" class="logocam">
    <h1>Inscrivez-vous</h1>
    <form>
        <p>Nom d'utilisateur</p>
        <input type="text" name="" placeholder="Choisissez un nom d'utilisateur">
        <p>Adresse email</p>
        <input type="email" name="" placeholder="Entrez votre adresse email">
        <p>Mot de Passe</p>
        <input type="password" name="" placeholder="Entrez votre mot de passe">
        <p>Confirmez le mot de passe</p>
        <input type="password" name="" placeholder="Confirmez votre mot de passe">
        <button type="button" onclick="register()">S'inscrire</button><br>
        <a href="#">Mot de passe perdu?</a><br>
        <a href="login.php">Deja inscrit(e)?</a>
    </form>
</div>
</body>

</html>