<?php include_once 'header.php';
if (!isset($_SESSION['username'])) {
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
                <img src="../assets/img/filters/beard.png" class="cam_filters" alt="filtre">
                <img src="../assets/img/filters/dalladallabill.png" class="cam_filters" alt="filtre">
                <img src="../assets/img/filters/blunt.png" class="cam_filters" alt="filtre">
                <img src="../assets/img/filters/geisha.png" class="cam_filters" alt="filtre">
            </aside>

            <div class="montage" id="montage">

                <div id="video-div">
                    <video autoplay id="video">La webcam n'est pas activée</video>
<!--                    <canvas class="canvas-vid" id="canvas-vid"></canvas>-->
                </div>


                <div id="filter"></div>
            </div>

            <div id="button-div">
                <button type="submit" class="btn2" id="snap">Prendre la photo</button>
                <button type="submit" class="btn2" id="upload">Upload d'image</button>
                <button type="submit" class="btn2" id="save">Sauvegarde</button>
            </div>

            <div class="right-container">
                <div id="photos">

                </div>
            </div>
            <div hidden id="hidden"></div>
        </div>

    </section>
    <script src="../js/webcam.js"></script>
    </body>
    </html>

<?php include_once 'footer.php'; ?>