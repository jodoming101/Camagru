<?php

require ("../models/Database.php");
require ("../models/User.php");

function register () {
    $db = new Database();
    $user = new User($db);

}

function signin () {

}

register();