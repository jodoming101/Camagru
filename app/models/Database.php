<?php

class Database
{
    // $query is the sql request
    // $data is the array where to look for the required data
    protected $_connection;


    public function __construct()
    {
        $this->_connection = new PDO('mysql:host=localhost:3306;dbname=Camagru;charset=utf8',
            'root', 'rootpass',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    function insert_data ($query, $data) {
        $request = $this->_connection->prepare($query);
        $request->execute($data);
        $request->closeCursor();
    }
}

abstract class Model
{
    protected $_database;

    public function __construct(Database $db)
    {
        $this->_database = $db;
    }
}