<?php
include_once 'database.php';

try {
    // connect to DB
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql delete users table if exists
    $sql = "DROP TABLE IF EXISTS users";
    $conn->exec($sql);


    // sql create users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    usr_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usr_username TEXT (25) NOT NULL,
    usr_email TEXT (50) NOT NULL,
    usr_vfd INT (1) NOT NULL,
    usr_pwd TEXT (25) NOT NULL,
    usr_key TEXT NOT NULL 
    )";

    // use exec() because no results are returned
    $conn->exec($sql);


    $sql = "CREATE TABLE IF NOT EXISTS pictures (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login TEXT (25) NOT NULL,
    picture TEXT (50) NOT NULL,
    likes TEXT (25) NOT NULL,
    liker TEXT(25) COLLATE utf8_unicode_ci,
    comments TEXT COLLATE utf8_unicode_ci,
    author TEXT COLLATE utf8_unicode_ci
    )";

    $conn->exec($sql);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>