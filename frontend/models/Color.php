<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 8/1/2020
 * Time: 4:13 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Color extends Model{
    public function getAll(){
        $sql_select="SELECT color.*,products.name AS product_name,products.avatar AS product_avatar FROM color INNER JOIN products ON products.id=color.product_id ";
        $obj_select=$this->con->prepare($sql_select);
        $obj_select->execute();
        $colors= $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT color.*, products.name AS product_name,products.avatar AS product_avatar FROM color INNER JOIN products ON products.id=color.product_id WHERE color.id =$id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}