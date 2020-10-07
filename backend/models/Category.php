<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:11 AM
 */
require_once 'models/Model.php';
class Category extends Model{
    public $id;
    public $name;
    public $number;
//    public $description;
    public $type;
    public $type_product;
    public $status;
    public $created_at;
    public $updated_at;
    public $parent_id;
    public $str_search='';
    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['name'])&&!empty($_GET['name'])){
            $this->str_search .=" AND name LIKE '%{$_GET['name']}%'";
        }
        if(isset($_GET['status'])){
            $this->str_search .=" AND status ={$_GET['status']}";
        }
    }
    public function insert(){
        $sql_insert="INSERT INTO categories(`name`,`parent_id`,`number`, `type`,`type_product`, `status`) VALUES (:name,:parent_id,:number, :type,:type_product, :status)";
        $obj_insert= $this->con->prepare($sql_insert);
        $insert_arr=[
            ':name'=>$this->name,
            ':parent_id'=>$this->parent_id,
            ':number'=>$this->number,
//            ':avatar'=>$this->avatar,
//            ':description'=>$this->description,
            ':type'=>$this->type,
            ':type_product'=>$this->type_product,
            ':status'=>$this->status
        ];
        return $obj_insert->execute($insert_arr);
    }
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT * FROM categories WHERE TRUE $this->str_search");
        $arr_select=[];
        $obj_select->execute($arr_select);
        $categories=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getAllPagination($arr_params){
        $limit=$arr_params['limit'];
        $page=$arr_params['page'];
        $start=($page-1)*$limit;
        $obj_select=$this->con->prepare("SELECT * FROM categories WHERE TRUE $this->str_search LIMIT $start, $limit");
        $arr_select=[];
        $obj_select->execute($arr_select);
        $categories=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
//    public function getAll($params=[]){
//        echo "<pre>";
//        print_r($params);
//        echo "</pre>";
//        $str_search='WHERE TRUE';
//        if(isset($params['name'])&& !empty($params['name'])){
//            $name=$params['name'];
//            $str_search .=" AND `name` LIKE '%$name%'";
//        }
//        if(isset($params['status'])){
//            $status=$params['status'];
//            $str_search .=" AND `status` =$status";
//        }
//        $start=isset($params['start'])?$params['start'] :0;
//        $limit=isset($params['limit'])?$params['limit'] : 1000;
//        $sql_select_all="SELECT * FROM categories $str_search LIMIT $start,$limit";
//        $obj_select_all=$this->con->prepare($sql_select_all);
//        $obj_select_all->execute();
//        $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
//        return $categories;
//    }
    public function getCategoryById($id){
//        $obj_select= $this->con->prepare("SELECT products.*, categories.name AS category_name FROM products
//INNER JOIN categories ON products.category_id =categories.id WHERE categories.id =$id");
        $obj_select= $this->con->prepare("SELECT * FROM  categories  WHERE id =$id");
        $obj_select->execute();
        $category =$obj_select->fetch(PDO::FETCH_ASSOC);
        return $category;

    }
    public function delete($id){
        $obj_delete =$this->con->prepare("DELETE FROM categories WHERE id=$id");
        $is_detele = $obj_delete->execute();
        $obj_delete_product =$this->con->prepare("DELETE FROM products WHERE category_id=$id");
        $obj_delete_product->execute();
        return $is_detele;
    }
    public function update($id){
        $sql_update="UPDATE categories SET `name`=:name,`parent_id`=:parent_id,`number`=:number,`status`=:status,`updated_at`=:updated_at WHERE id=$id";
        $obj_update= $this->con->prepare($sql_update);
        $update_arr=[
            ':name'=>$this->name,
            ':parent_id'=>$this->parent_id,
            ':number'=>$this->number,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ];
        return $obj_update->execute($update_arr);
    }
    public function getTotal(){
        $sql_select_count="SELECT COUNT(id) AS count_id FROM categories";
        $obj_select_count=$this->con->prepare($sql_select_count);
        $obj_select_count->execute();
        $count =$obj_select_count->fetchColumn();
        return $count;
    }

}