<?php

if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['username']))
    header('Location: snap.php');

?>

<head>
    <meta charset="utf-8">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" type="image/png" href="../assets/img/logo_camagru.png">
</head>

<nav>
    <div class="nav-wrapper">
        <a href="login.php" class="brand-logo">Camagru</a>
        <a href="#" id="myBtn" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <?php
            if (isset($_SESSION["username"])) {
                echo "
                <li><a href=\"snap.php\"><i class=\"material-icons left\">add_a_photo</i>Snap</a></li>
                <li><a href=\"profile.php\"><i class=\"material-icons left\">account_circle</i>Profile</a></li>
                <li><a href=\"photogallery.php\"><i class=\"material-icons left\">collections</i>Gallerie</a></li>
                <li><a href=\"../controllers/logoutCo.php\"><i class=\"material-icons left\">power_settings_new</i>Déconnexion</a></li>
                ";
            }
            else
                echo "
                <li><a href=\"gallery.php\"><i class=\"material-icons left\">collections</i>Gallerie</a></li>
                <li><a href=\"login.php\"><i class=\"material-icons left\">person</i>Connexion</a></li>
                <li><a href=\"register.php\"><i class=\"material-icons left\">person_add</i>Inscription</a></li>
                ";

            ?>
        </ul>
    </div>
</nav>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
            <?php
            if (isset($_SESSION["username"])) {
                echo "
                <a href=\"snap.php\"><i class=\"material-icons left\">add_a_photo</i>Snap</a>
                <a href=\"profile.php\"><i class=\"material-icons left\">account_circle</i>Profile</a>
                <a href=\"photogallery.php\"><i class=\"material-icons left\">collections</i>Gallerie</a>
                <a href=\"../controllers/logoutCo.php\"><i class=\"material-icons left\">power_settings_new</i>Déconnexion</a>
                ";
            }
            else
                echo "
                <a href=\"gallery.php\"><i class=\"material-icons left\">collections</i>Gallerie</a>
                <a href=\"login.php\"><i class=\"material-icons left\">person</i>Connexion</a>
                <a href=\"register.php\"><i class=\"material-icons left\">person_add</i>Inscription</a>
                ";

            ?>
    </div>

</div>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
