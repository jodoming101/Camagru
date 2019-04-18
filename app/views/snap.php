<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../js/webcam.js"></script>
    <title>Camagru - Snap</title>
</head>

<?php include_once 'header.php'; ?>

<body>
<section>
    <div class="main_snap">
    <aside id="filters">
        <img src="../assets/img/beard.png" class="cam_filters" alt="filtre">
        <img src="../assets/img/blunt.png" class="cam_filters" alt="filtre">
        <img src="../assets/img/dalladallabill.png" class="cam_filters" alt="filtre">
        <img src="../assets/img/easterbunny.png" class="cam_filters" alt="filtre">
<!--        <img src="../assets/img/geisha.png" class="cam_filters" alt="filtre">-->
    </aside>

        <div class="montage" id="montage">

            <div id="montage">
                <video autoplay id="video"></video>
            </div>

            <canvas class="canvas" id="image"></canvas>
            <input type="button" id="snap" value="Prendre une photo">
            <input type="button" id="save" value="Sauvegarder la photo">
        </div>

    <aside class="thumbnails" id="thumbnails">

    </aside>
    </div>
</section>
</body>
</html>

<?php include_once 'footer.php'; ?>