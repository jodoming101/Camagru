<?php include_once 'header.php';

include('../controllers/pictureCo.php');
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
    <aside id="filters">
        <img src="../assets/img/filters/dallabill.png" class="cam_filters" alt="filtre" onclick="draw1(this.src)">
        <img src="../assets/img/filters/easterbunny.png" class="cam_filters" alt="filtre" onclick="draw1(this.src)">
        <img src="../assets/img/filters/kitten.png" class="cam_filters" alt="filtre" onclick="draw1(this.src)">
    </aside>
    <div class="main_snap">
        <div class="montage" id="montage">

            <div id="video-div">
                <video autoplay id="video">La webcam n'est pas activée</video>
                <canvas id="bg" class="filter_canvas"></canvas>
                <canvas id="filter" class="filter_canvas"></canvas>
            </div>
                <h2 class="title-form">Choisir le fond</h2>
                <input type="file" id="upload" name="fichier" size="30000" accept="image">
            <button style="cursor: not-allowed" type="submit" class="btn2" id="snap" onclick="take()" disabled>Prendre la photo</button>

        </div>

        <div class="right-container">
            <div id="photos">
                <canvas id="canvas_montage" class=""></canvas>
            </div>
            <button style="cursor: not-allowed" type="submit" class="btn2" id="save" onclick="UploadPic()" disabled>Sauvegarde</button>
        </div>
        <div id="button-div">

            <form method="post" accept-charset="utf-8" name="form1">
                <input name="hidden_data" id='hidden_data' type="hidden"/>
            </form>

        </div>
    </div>
    <div class="gallery_snap">
        <?php
        $res = GetPic();
        foreach ($res as $k => $v) {
            $pic = $v['picture'];
            echo "
            <div class=\"card_image\">
                <div style=\"background-image: url('$pic')\" class=\"card_photo\"></div>
            </div>
            ";
        }
        ?>

    </div>

    <script src="../js/webcam.js"></script>
    </body>
    </html>

<?php include_once 'footer.php'; ?>