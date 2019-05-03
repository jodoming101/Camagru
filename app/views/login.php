<?php require 'header2.php';


?>
    <body>
    <div class="login-box">
        <h1>Connexion</h1>
        <form method="POST" action="../controllers/loginCo.php">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nom d'utilisateur" name="username" id="username">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mot de passe" name="password" id="password">
            </div>

            <a href="forgotPwd.php" id="forgot">Mot de passe oublié ?</a>
            <a href="register.php" id="register">Pas encore inscrit ?</a>

            <button type="submit" class="btn">Se connecter</button>
        </form>
    </div>
    </body>
<?php include_once 'footer.php'; ?>