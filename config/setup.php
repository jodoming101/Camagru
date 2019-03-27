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
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (25) COLLATE utf8_general_ci NOT NULL UNIQUE KEY,
    email VARCHAR (50) NOT NULL,
    password VARCHAR (50) COLLATE utf8_general_ci NOT NULL,
    verified BOOLEAN NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);

}

catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>