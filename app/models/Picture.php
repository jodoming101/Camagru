<?php
/**
 * Created by PhpStorm.
 * User: jodoming
 * Date: 2019-04-30
 * Time: 06:57
 */

require("Database.php");
include('../../config/database.php');

class Picture extends Model
{    

    public $login = NULL;
    public $picture = NULL;
    public $likes = NULL;

    public function AddPicture($login, $picture, $likes)
    {
        $this->_database->insertData("INSERT INTO pictures(login, picture, likes)
            VALUES(:login, :picture, :likes)", array(":login" => $login, ":picture" => $picture,
                ":likes" => $likes)
        );
    }

    public function GetPicture($username)
    {
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures WHERE login = :username", array(":username" => $username));
        return ($data);
    }

    public function GetAllPicture($offset)
    {
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures LIMIT 6 OFFSET $offset", array());
        return ($data);
    }

    public function CountPage(){
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures", array());
        $count = count($data);
        return ($count);
    }

}