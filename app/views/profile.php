<!DOCTYPE html>

<html>
    <?php include_once 'header.php'; ?>

    <div class="profile-box">
        <h2>Profile</h2>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <label for="username" class="profile-label">Nom d'utilisateur</label>
            <input type="text" placeholder="Nom d'utilisateur" name="" required="required">
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <label for="email" class="profile-label">Email</label>
            <input type="email" placeholder="Email" name="" required="required">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label for="newpass" class="profile-label">Nouveau mot de passe</label>
            <input type="text" placeholder="Nouveau mot de passe" name="">
        </div>

        <div class="textbox">
            <i class="fas fa-check-square"></i>
            <label for="newpass" class="profile-label">Confirmer le mot de passe</label>
            <input type="text" placeholder="Confirmer le mot de passe" type="text">
        </div>

        <button onclick="changeinfo()" class="btn">Changer</button>
    </div>
    <?php include_once 'footer.php'; ?>
</html>