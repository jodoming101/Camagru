<?php include_once 'header.php';
include('../controllers/pictureCo.php');

if (!isset($_SESSION['username']))
    header('Location: gallery.php');
if (isset($_GET['page'])) {
    $count = GetCount();
    $page =  ceil($count / 6);
    if ($_GET['page'] > $page)
        header('location: photogallery.php?page=1');
    if ($_GET['page'] < 1)
        header('location: snap.php');
}
if (!isset($_GET['page']))
    header('location: photogallery.php?page=1');
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
                $author = $_SESSION['username'];
                $like = IsLike($pic);
                if ($like == '0'){
                    $hiddenlike = "<input type='hidden' name='like' value='$pic'>";
                    $btnlike = "<button type='submit' class=\"waves-light btn2 btn_del\"><i class=\"fas fa-heart\"></i>J'aime</button>";
                }
                else {
                    $hiddenlike = "<input type='hidden' name='dislike' value='$pic'>";
                    $btnlike = "<button type='submit' class=\"waves-light btn2 btn_del\"><i class=\"fas fa-heart-broken\"></i>Je n'aime pas</button>";
                }
                echo "
            <div style='margin-bottom: 50px;' class='col s12 m4 l4 gallerycard'>
                <div class=\"card_image\">
                    <div style=\"background-image: url('$pic')\" class=\"card_photo\"></div>
                    <form method='post' action='../controllers/pictureCo.php'>
                        $hiddenlike
                        $btnlike
                    </form>
                    <div class='comment'>
                        <form method='post' id='comment' action='../controllers/pictureCo.php'>
                            <textarea rows='4' cols='30' name='comment' placeholder='Votre commentaire'></textarea>
                            <input type='hidden' name='picture' value='$pic'>
                            <button type='submit' class='btn2'><i class=\"fas fa-comment\">  Commenter</i></button>
                        </form>
                    </div>
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
            $page =  ceil($count / 6);
            $i = 1;
            while ($i <= $page){
                if (isset($_GET['page'])){
                    if ($_GET['page'] == $i)
                        $active = 'active';
                    else
                        $active = 'waves-effect';
                }
                echo "
            <li class=\"$active\"><a href=\"photogallery.php?page=$i\">$i</a></li>
            ";
                $i++;
            }
            ?>
        </ul>
    </div>
    </body>


<?php include_once 'footer.php'; ?>