<html>
<?php include_once 'header.php'; ?>
<body>
<div class="login-box">
    <h1>Se connecter</h1>
    <form method="POST" action="../controllers/loginCo.php">
    <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Nom d'utilisateur" name="username" value="">
    </div>

    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Mot de passe" name="password" value="">
    </div>

    <button type="submit" class="btn">Se connecter</button>
    </form>
</div>
</body>
<?php include_once 'footer.php'; ?>