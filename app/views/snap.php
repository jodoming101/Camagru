<?php include_once 'header.php';
    if(!isset($_SESSION['username'])){
    header("Location: ../views/login.php");
    }
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../js/webcam.js"></script>
    <title>Camagru - Snap</title>
</head>



<body>
<section>

    <div class="main_snap">

        <aside id="filters">
            <img src="../assets/img/beard.png" class="cam_filters" alt="filtre">
            <img src="../assets/img/dalladallabill.png" class="cam_filters" alt="filtre">
            <img src="../assets/img/easterbunny.png" class="cam_filters" alt="filtre">
            <img src="../assets/img/geisha.png" class="cam_filters" alt="filtre">
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

    </div>

</section>
</body>
</html>

<?php include_once 'footer.php'; ?>