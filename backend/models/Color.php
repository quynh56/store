<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/19/2020
 * Time: 3:16 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Color extends Model{
    public $product_id;
    public $name;
    public $avatar;
    public $status;
    public $updated_at;
    public function insert(){
        $sql_insert="INSERT INTO color(`product_id`,`name`,`avatar`,`status`) VALUES (:product_id,:name,:avatar,:status)";
        $obj_insert=$this->con->prepare($sql_insert);
        $insert_arr=[
            ':product_id'=>$this->product_id,
            ':name'=>$this->name,
            ':avatar'=>$this->avatar,
            ':status'=>$this->status
        ];
        $obj_insert->execute($insert_arr);
        $color_id=$this->con->lastInsertId();
        return $color_id;
    }
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
    public function update($id){
        $obj_update=$this->con->prepare("UPDATE color SET product_id=:product_id,name=:name,avatar=:avatar,status=:status,updated_at=:updated_at where id=$id");
        $arr_update=[
            ':product_id'=>$this->product_id,
            ':name'=>$this->name,
            ':avatar'=>$this->avatar,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete($id){
        $obj_delete=$this->con->prepare("DELETE FROM color WHERE id=$id");
        $is_delete=$obj_delete->execute();
        $obj_delete_image=$this->con->prepare("DELETE FROM images WHERE color_id=$id");
        $obj_delete_image->execute();
        return $is_delete;

    }
}