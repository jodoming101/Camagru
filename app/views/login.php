<html>
<?php include_once 'header.php'; ?>
<body>
<div class="login-box">
    <h1>Se connecter</h1>

    <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Nom d'utilisateur" name="" value="">
    </div>

    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Mot de passe" name="" value="">
    </div>

    <button onclick="signin()" class="btn">Se connecter</button>
</div>
</body>
<?php include_once 'footer.php'; ?>
</html>