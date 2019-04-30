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
    $login = $_SESSION['username'];
    $picture = $file;
    $likes = '0';
    $user->AddPicture($login, $picture, $likes);
    unset($_POST['hidden_data']);
}

function GetPic(){
    $db = new Database();
    $Picture = new Picture($db);
    $res = $Picture->GetPicture($_SESSION['username']);
    return $res;
}