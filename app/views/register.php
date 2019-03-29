<html>
    <?php include_once 'header.php'; ?>
        <body>
        <div class="login-box">
            <h1>S'inscrire</h1>

            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nom d'utilisateur" name="username" id="username">
            </div>

            <div class="textbox">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Adresse email" name="email" id="email">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Mot de passe" name="usrpwd" id="usrpwd">
            </div>

            <div class="textbox">
                <i class="fas fa-check-square"></i>
                <input type="password" placeholder="Confirmation mot de passe" name="pwdconfirm"  id="pwdconfirm">
            </div>

            <button onclick="" class="btn">S'inscrire</button>
        </div>
    </body>
    <?php include_once 'footer.php'; ?>
</html>