<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/19/2020
 * Time: 3:15 PM
 */
require_once "models/Model.php";
require_once "models/Product.php";
class Size extends Model {
    public $product_id;
    public $size_name;
    public $size_1;
    public $size_2;
    public $size_3;
    public $hand_length;
    public $lengths;
    public $waist_length;
    public $bice_length;
    public $shoulder;
    public $cuff;
    public $femoral;
    public $base_height;
    public $axle_height;
    public $quality;
    public $updated_at;
    public $status;
    public function insert(){
        $sql_insert="INSERT INTO sizes(`product_id`,`name`,`size_1`,`size_2`,`size_3`,`hand_length`,`lengths`,`waist_length`,`bice_length`,`shoulder`,`cuff`,`femoral`,
`base_height`,`axle_height`,`quality`,`status`) VALUES (:product_id,:size_name,:size_1,:size_2,:size_3,:hand_length,:lengths,:waist_length,:bice_length,:shoulder,
:cuff,:femoral,:base_height,:axle_height,:quality,:status)";
        $obj_insert= $this->con->prepare($sql_insert);
        $insert_arr=[
            ':product_id'=>$this->product_id,
            ':size_name'=>$this->size_name,
            ':size_1'=>$this->size_1,
            ':size_2'=>$this->size_2,
            ':size_3'=>$this->size_3,
            ':hand_length'=>$this->hand_length,
            ':lengths'=>$this->lengths,
            ':waist_length'=>$this->waist_length,
            ':bice_length'=>$this->bice_length,
            ':shoulder'=>$this->shoulder,
            ':cuff'=>$this->cuff,
            ':femoral'=>$this->femoral,
            ':base_height'=>$this->base_height,
            ':axle_height'=>$this->axle_height,
            ':quality'=>$this->quality,
            ':status'=>$this->status
        ];
        return $obj_insert->execute($insert_arr);
    }
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT sizes.*,products.name AS product_name,products.avatar AS product_avatar, categories.name AS category_name  FROM 
((products INNER JOIN categories ON products.category_id=categories.id) INNER JOIN sizes ON products.id=sizes.product_id)");
        $obj_select->execute();
        $sizes = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $sizes;
    }
    public function getAllPagination($params){
        $page=$params['page'];
        $limit=$params['limit'];
        $start=($page-1)*$limit;
        $obj_select=$this->con->prepare("SELECT sizes.*,products.name AS product_name,products.avatar AS product_avatar, categories.name AS category_name  FROM 
((products INNER JOIN categories ON products.category_id=categories.id) INNER JOIN sizes ON products.id=sizes.product_id) LIMIT $start, $limit");
        $arr_select=[];
        $obj_select->execute($arr_select);
        $sizes = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $sizes;

    }
    public function getTotal(){
        $obj_select=$this->con->prepare("SELECT COUNT(id) AS count_id FROM sizes");
        $obj_select->execute();
        $count=$obj_select->fetchColumn();
        return $count;
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT sizes.*,products.name AS product_name,products.avatar AS product_avatar, categories.name AS category_name  FROM 
((products INNER JOIN categories ON products.category_id=categories.id) INNER JOIN sizes ON products.id=sizes.product_id) WHERE sizes.id =$id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id){
        $obj_update=$this->con->prepare("UPDATE sizes SET name=:size_name,size_1=:size_1,size_2=:size_2,size_3=:size_3,hand_length=:hand_length,
lengths=:lengths,waist_length=:waist_length,bice_length=:bice_length,shoulder=:shoulder,cuff=:cuff,femoral=:femoral,base_height=:base_height,axle_height=:axle_height,quality=:quality,status=:status,updated_at=:updated_at where id=$id");
        $arr_update=[
            ':size_name'=>$this->size_name,
            ':size_1'=>$this->size_1,
            ':size_2'=>$this->size_2,
            ':size_3'=>$this->size_3,
            ':hand_length'=>$this->hand_length,
            ':lengths'=>$this->lengths,
            ':waist_length'=>$this->waist_length,
            ':bice_length'=>$this->bice_length,
            ':shoulder'=>$this->shoulder,
            ':cuff'=>$this->cuff,
            ':femoral'=>$this->femoral,
            ':base_height'=>$this->base_height,
            ':axle_height'=>$this->axle_height,
            ':quality'=>$this->quality,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete($id){
        $obj_delete=$this->con->prepare("DELETE FROM sizes WHERE id=$id");
        return $obj_delete->execute();
    }
}
