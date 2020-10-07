<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:11 AM
 */
require_once 'configs/Database.php';
class Model{
    public $con;
    public function __construct()
    {
        $this->con= $this->getConnection();
    }
    public function getConnection(){
        $con =new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
        return $con;
    }
}