<html lang="fr">
<?php include_once 'header2.php'; ?>

<body>
<div class="login-box">
    <h1>Mot de passe oublié</h1>
    <form method="POST" action="../controllers/forgotCo.php">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="username" id="username">
        </div>

        <a href="login.php" id="logp">Retour à la page de connexion</a>

        <button type="submit" class="btn">Envoyer</button>
    </form>
</div>
</body>
<?php include_once 'footer.php'; ?>
</html>