<?php
/**
 * Created by PhpStorm.
 * User: jodoming
 * Date: 2019-04-30
 * Time: 08:51
 */

if (!isset($_SESSION)) {
    session_start();
}

include("../models/Picture.php");

if (isset($_POST['hidden_data'])) {

    $upload_dir = "../assets/img/snap/";
    $img = $_POST['hidden_data'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = $upload_dir . date('Y-m-d_g:i:s') . ".png";
    $collage = date('Y-m-d_g:i:s');;
    $success = file_put_contents($file, $data);
    $db = new Database();
    $user = new Picture($db);
    $login = $_SESSION['id'];
    $picture = $file;
    $likes = '0';
    $user->AddPicture($login, $picture, $likes);
    unset($_POST['hidden_data']);
}

function GetPic(){
    $db = new Database();
    $Picture = new Picture($db);
    $res = $Picture->GetPicture($_SESSION['id']);
    return $res;
}

if (isset($_POST['id_pic'])){
    $db = new Database();
    $Picture = new Picture($db);
    $id_usr = $_SESSION['id'];
    $id_pic = $_POST['id_pic'];
    $Picture->DelPicture($id_pic);
    header('Location: ../views/snap.php');
}

if (isset($_POST['like'])){
    $db = new Database();
    $Picture = new Picture($db);
    $id_usr = $_SESSION['id'];
    $login = 0;
    $picture = $_POST['like'];
    $likes = $_SESSION['id'];
    $Picture->AddPicture($login, $picture, $likes);
    header('Location: ../views/photogallery.php');
}

if (isset($_POST['dislike'])){
    $db = new Database();
    $Picture = new Picture($db);
    $id_usr = $_SESSION['id'];
    $login = 0;
    $picture = $_POST['dislike'];
    $likes = $_SESSION['id'];
    $Picture->DelLikePicture($login, $picture, $likes);
    header('Location: ../views/photogallery.php');
}

function IsLike($pic){
    $db = new Database();
    $Picture = new Picture($db);
    $res = $Picture->GetLike($pic);
    $ret = count($res);
    return $ret;
}

function GetAllPic($offset){
    $db = new Database();
    $Picture = new Picture($db);
    $res = $Picture->GetAllPicture($offset);
    return $res;
}

function GetCount(){
    $db = new Database();
    $Picture = new Picture($db);
    $res = $Picture->CountPage();
    return $res;
}

if (isset($_POST['comment'])){
    $db = new Database();
    $pic = new Picture($db);
    $picture = $_POST['picture'];
    $com = htmlspecialchars($_POST["comment"],ENT_QUOTES, 'UTF-8');
    $author = $_SESSION["username"];
    $pic->AddComment($author, $picture, $com);
    $res = $pic->GetId($picture);
    $res2 = $pic->getIdInfo($res[0]['login']);
    if ($res2['usr_notif'] == 1){
        SendComment($res2['usr_email'], $res2['usr_username'], $author, $picture, $com);
    }
    header('Location: ../views/photogallery.php');

}

function SendComment ($email, $username, $author, $picture, $com)
{
    $subject = "Camagru | Nouveau Commentaire";
    $header = "From: no_reply@camagru.com";
    $message = 'Bonjour ' . $username . '!
    Votre photo ('. $picture . ') a été commentée par ' . $author . ' : ' . $com .'
    
    ---------------
    Ce mail est généré automatiquement. Merci de ne pas y répondre.';
    mail($email, $subject, $message, $header);
}