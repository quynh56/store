<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 8/1/2020
 * Time: 4:13 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Image extends Model{
    public function getAll(){
        $sql_select="SELECT images.*, products.name AS product_name FROM (images INNER JOIN products ON images.product_id = products.id)  ";
        $obj_select=$this->con->prepare($sql_select);
        $obj_select->execute();
        $colors= $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }
}