<html lang="fr">
<?php include_once 'header2.php';
if (isset($_SESSION['username']))
    header('Location: snap.php');

?>
<body>
<div class="login-box">
    <h1>Inscription</h1>
    <form method="POST" action="../controllers/registerCo.php">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="username" id="username" pattern=".{5,20}$" required>
        </div>

        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Adresse email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Mot de passe" name="usrpwd" id="usrpwd" required>
        </div>

        <div class="textbox">
            <i class="fas fa-check-square"></i>
            <input type="password" placeholder="Confirmation mot de passe" name="confirmpwd"  id="confirmpwd" required>
        </div>
        <a href="login.php" id="login">Déjà inscrit ?</a>
        <button type="submit" class="btn">S'inscrire</button>
    </form>
</div>
</body>
<?php include_once 'footer.php'; ?>
</html>