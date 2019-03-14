<?php
$servername = "localhost:3306";
$db_user = "root";
$db_pwd = "rootpass";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Camagru", $db_user, $db_pwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>