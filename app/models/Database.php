<?php

class Database
{
    // $query is the sql request
    // $data is the array where to look for the required data
    public $_connection;


    public function __construct()
    {
        $this->_connection = new PDO('mysql:host=mysql:3306;dbname=Camagru;charset=utf8',
            'root', 'rootpass',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    function insertData ($query, $data) {
        $request = $this->_connection->prepare($query);
        $request->execute($data);
        $request->closeCursor();
    }

    public function getData($query, $dataQuery)
    {
        $request = $this->_connection->prepare($query);
        $request->execute($dataQuery);
        $data = $request->fetch();
        $request->closeCursor();
        return ($data);
    }
}

abstract class Model
{
    public $_database;

    public function __construct(Database $db)
    {
        $this->_database = $db;
    }
}