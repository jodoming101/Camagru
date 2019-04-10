<?php
require("../models/User.php");

function password_verify($usrpwd)
{

}

function login()
{
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $usrpwd = $_POST["usrpwd"];
    $msg = array();
    $errMsg = array();


}

login();