<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/19/2020
 * Time: 3:16 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Image extends Model{
    public $product_id;
    public $color_id;
    public $new_id;
    public $images;
    public function insert(){
        $sql_insert="INSERT INTO images(`product_id`,`color_id`,`new_id`,`images`) VALUES (:product_id,:color_id,:new_id,:images)";
        $obj_insert=$this->con->prepare($sql_insert);
        $insert_arr=[
            ':product_id'=>$this->product_id,
            ':color_id'=>$this->color_id,
            ':new_id'=>$this->new_id,
            ':images'=>$this->images
        ];
        return $obj_insert->execute($insert_arr);
    }
    public function getAll(){
        $sql_select="SELECT images.*, products.name AS product_name, color.name AS color FROM ((images INNER JOIN products ON images.product_id = products.id) INNER JOIN color ON images.color_id = color.id) ";
        $obj_select=$this->con->prepare($sql_select);
        $obj_select->execute();
        $colors= $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }
}