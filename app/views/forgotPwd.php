<html>
<?php include_once 'header.php'; ?>

<body>
<div class="login-box">
    <h1>Mot de passe oublié</h1>
    <form method="POST" action="../controllers/forgotCo.php">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nom d'utilisateur" name="username" id="username">
        </div>

<!--        <div class="textbox">-->
<!--            <i class="fas fa-envelope"></i>-->
<!--            <input type="email" placeholder="Adresse email" name="email" id="email">-->
<!--        </div>-->

        <button type="submit" class="btn">Envoyer</button>
    </form>
</div>
</body>
<?php include_once 'footer.php'; ?>
</html>