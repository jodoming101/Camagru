<!DOCTYPE html>

<html lang="fr">
    <?php include_once 'header.php'; ?>

    <div class="profile-box">
        <h2><?php echo "Profile de " .$_SESSION['username']; ?></h2>
    <form method="POST" action="../controllers/profileCo.php">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <label for="username" class="profile-label">Nom d'utilisateur</label>
            <input type="text" placeholder="Nouveau nom d'utilisateur" name="nw_username">
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <label for="email" class="profile-label">Email</label>
            <input type="email" placeholder="Nouvelle adresse email" name="nw_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <label for="newpass" class="profile-label">Mot de passe</label>
            <input type="password" placeholder="Nouveau mot de passe" name="nw_pwd">
        </div>

        <div class="textbox">
            <i class="fas fa-bell"></i>
            <label for="notifications" class="profile-label">Activer les notifications?
                <input type="checkbox" name="notifs" value="Yes" checked>
            </label>
        </div>
        <button type="submit" class="btn">Changer</button>
    </form>
    </div>
    <?php include_once 'footer.php'; ?>
</html>