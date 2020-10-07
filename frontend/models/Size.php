<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 8/1/2020
 * Time: 4:13 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Size extends Model{
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT sizes.*,products.name AS product_name,products.avatar AS product_avatar, categories.name AS category_name  FROM 
((products INNER JOIN categories ON products.category_id=categories.id) INNER JOIN sizes ON products.id=sizes.product_id)");
        $obj_select->execute();
        $sizes = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $sizes;
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT sizes.*,products.name AS product_name,products.avatar AS product_avatar, categories.name AS category_name  FROM 
((products INNER JOIN categories ON products.category_id=categories.id) INNER JOIN sizes ON products.id=sizes.product_id) WHERE sizes.id =$id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}