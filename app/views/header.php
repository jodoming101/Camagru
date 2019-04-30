<?php session_start();

?>

<head>
    <meta charset="utf-8">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" type="image/png" href="../assets/img/logo_camagru.png">
</head>
<div class="header">
    <h2 class="logo">Camagru</h2>
<!--    <input type="checkbox" id="chk">-->
<!--    <label for="chk" class="show-menu-btn">-->
<!--        <i class="fas fa-ellipsis-h"></i>-->
<!--    </label>-->

    <ul class="menu">
        <li class="h_gallery">
            <i class="far fa-images"></i>
            <a href="gallery.php">Galerie</a>
        </li>
        <?php if (isset($_SESSION["username"])) {
        echo '<li class="h_snap">
                <i class="fas fa-camera-retro"></i>
                <a href="snap.php">Snap</a>
              </li>
              <li class="h_profile">
                <i class="fas fa-user"></i>
                <a href="profile.php">Profile</a>
              </li>
              <li class=\"h_signout\">
                <i class="fas fa-sign-out-alt"></i>
                <a href="../controllers/logoutCo.php">Déconnexion</a>
              </li>';
        }
        else {
            echo '<li class="h_signin">
                <i class="fas fa-sign-in-alt"></i>
                <a href="login.php">Connexion</a>
            </li>
            <li class="h_signup">
                <i class="fas fa-user-plus"></i>
                <a href="register.php">Inscription</a>
            </li>';
        }
        ?>
    </ul>
<!--    <label for="chk" class="hide-menu-btn">-->
<!--        <i class="fas fa-times"></i>-->
<!--    </label>-->
</div>
