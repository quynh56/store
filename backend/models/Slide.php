<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 11:30 PM
 */
require_once "models/Model.php";
class Slide extends Model{
    public $product_id;
    public $avatar;
    public $position;
    public $location;
    public $status;
    public function insert(){
        $obj_insert=$this->con->prepare("INSERT INTO slides(`product_id`,`avatar`,`position`,`location`,`status`) 
VALUES (:product_id,:avatar,:position,:location,:status)");
        $arr_insert=[
            ':product_id'=>$this->product_id,
            ':avatar'=>$this->avatar,
            ':position'=>$this->position,
            ':location'=>$this->location,
            ':status'=>$this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT slides.*,products.name AS product_name FROM slides INNER JOIN products ON slides.product_id=products.id ORDER BY slides.location ASC,slides.position ASC  ");
        $obj_select->execute();
        $slides=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $slides;
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT slides.*,products.name AS product_name FROM slides INNER JOIN products ON slides.product_id=products.id WHERE sizes.id =$id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $obj_delete=$this->con->prepare("DELETE FROM slides WHERE id=$id");
        return $obj_delete->execute();
    }
}