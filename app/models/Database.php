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

    public function insertData ($query, $data) {
        $request = $this->_connection->prepare($query);
        $request->execute($data);
        $request->closeCursor();
    }

    public function getData($query, $data)
    {
        $request = $this->_connection->prepare($query);
        $request->execute($data);
        $data = $request->fetch();
        $request->closeCursor();
        return ($data);
    }

    public function getManyData($query, $data)
    {
        $array = [];
        $request = $this->_connection->prepare($query);
        $request->execute($data);
        while ($data = $request->fetch()) {
            array_push($array, $data);
        }
        $request->closeCursor();
        return ($array);
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