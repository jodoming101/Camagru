<?php include_once 'header2.php';
include('../controllers/pictureCo.php');

if (isset($_SESSION['username']))
    header('Location: photogallery.php');
if (isset($_GET['page'])) {
    $count = GetCount();
    $page = round($count / 6 + 1);
    if ($_GET['page'] > $page)
        header('location: gallery.php?page=1');
    }
if (!isset($_GET['page']))
    header('location: gallery.php?page=1');
?>


    <body>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['page']) && $_GET['page'] > 1){
                $page = ($_GET['page'] - 1) * 6;

            }
            else
                $page = 0;
            $res = GetAllPic($page);
            foreach ($res as $k => $v) {
                $pic = $v['picture'];
                echo "
            <div class='col s12 m4 l4'>
                <div class=\"card_image\">
                    <div style=\"background-image: url('$pic')\" class=\"card_photo\"></div>
                </div>
            </div>
            ";
            }
            ?>
        </div>
        <ul class="pagination">
        <?php
        $active = 'waves-effect';
        $count = GetCount();
        $page = round ($count / 6 + 1);
        $i = 1;
        while ($i <= $page){
            if (isset($_GET['page'])){
                if ($_GET['page'] == $i)
                    $active = 'active';
                else
                    $active = 'waves-effect';
            }
            echo "
            <li class=\"$active\"><a href=\"gallery.php?page=$i\">$i</a></li>
            ";
            $i++;
        }
        ?>
        </ul>
    </div>
    </body>


<?php include_once 'footer.php'; ?>