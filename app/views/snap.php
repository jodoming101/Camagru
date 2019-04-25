<?php include_once 'header.php';
    if(!isset($_SESSION['username'])){
    header("Location: ../views/login.php");
    }
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Camagru - Snap</title>
</head>



<body>
<section>

    <div class="main_snap">

        <aside id="filters">
            <img src="../assets/img/filters/beard.png" class="cam_filters" alt="filtre" onclick="addIcon(this)">
            <img src="../assets/img/filters/dalladallabill.png" class="cam_filters" alt="filtre" onclick="addIcon(this)">
            <img src="../assets/img/filters/blunt.png" class="cam_filters" alt="filtre" onclick="addIcon(this)">
            <img src="../assets/img/filters/geisha.png" class="cam_filters" alt="filtre" onclick="addIcon(this)">
        </aside>

        <div class="montage" id="montage">

            <div id="video-div">
                <video autoplay id="video"></video>
                <button type="submit" class="btn2" id="snap">Prendre la photo</button>
            </div>
            <div class="save-div">
                <canvas class="canvas" id="image"></canvas>
                <button type="submit" class="btn2" id="save">Sauvegarde</button>
            </div>
        </div>

        <aside class="thumbnails" id="thumbnails">

        </aside>
        <div hidden id="hidden"></div>
    </div>

</section>
<script src="../js/webcam.js"></script>
</body>
</html>

<?php include_once 'footer.php'; ?>