<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:08 PM
 *
 */
require_once 'configs/Database.php';
class Model{
     public function __construct()
     {
         $this->con=$this->getConnection();
     }

    public function getConnection(){
         try{
             $con=new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
         }catch (PDOException $e){
             die("Kết nối CSDL theo PDO thất bại: " .$e->getMessage());
         }
         return $con;
     }
     public function closeConnection(){
         $this->con=null;
     }
}