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

    public function GetPicture($id)
    {
        $data = $this->_database->getManyData("SELECT picture, id 
            FROM pictures WHERE login = :id", array(":id" => $id));
        return ($data);
    }

    public function GetLike($id)
    {
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures WHERE picture = :id AND likes = :usr", array(":id" => $id, ":usr" => $_SESSION['id']));
        return ($data);
    }

    public function GetUserPicture($username)
    {
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures WHERE login = :username", array(":username" => $username));
        return ($data);
    }

    public function GetAllPicture($offset)
    {
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures WHERE login != 0 LIMIT 6 OFFSET $offset", array());
        return ($data);
    }

    public function DelPicture($id_pic)
    {
        $this->_database->insertData("DELETE FROM pictures WHERE picture = :id_pic", array(":id_pic" => $id_pic));
    }

    public function DelLikePicture($login, $picture, $likes)
    {
        $this->_database->insertData("DELETE FROM pictures WHERE login = :login AND picture = :id_pic AND likes = :id_usr", array(":login" => $login, ":id_pic" => $picture, ":id_usr" => $likes));
    }

    public function CountPage(){
        $data = $this->_database->getManyData("SELECT picture 
            FROM pictures", array());
        $count = count($data);
        return ($count);
    }

    public function AddComment($author, $picture, $com)
    {
        $this->_database->insertData("INSERT INTO pictures(author, picture, comments)
            VALUES(:author, :picture, :comments)", array(":author" => $author, ":picture" => $picture,
                ":comments" => $com)
        );
    }

}