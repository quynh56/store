<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:09 PM
 */
require_once "models/Model.php";
class OrderDetail extends Model{
    public $order_id;
    public $product_id;
    public $quality;
    public function insert(){
        $obj_insert=$this->con->prepare("INSERT INTO order_detail(`order_id`,`product_id`,`quality`) VALUES (:order_id,:product_id,:quality)");
        $insert_arr=[
            ':order_id'=>$this->order_id,
            ':product_id'=>$this->product_id,
            ':quality'=>$this->quality
        ];
        $is_insert=$obj_insert->execute($insert_arr);
        return $is_insert;
    }
}