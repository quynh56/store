<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:11 AM
 */
require_once 'models/Model.php';
class Category extends Model{
    public $name;
    public $id;
    public $type;
    public $status;
    public $created_at;
    public $updated_at;
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
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT * FROM categories ");
//        $arr_select=[];
        $obj_select->execute();
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
    public function getCategoryById($id){
        $obj_select= $this->con->prepare("SELECT * FROM categories WHERE id=$id");
        $obj_select->execute();
        $category =$obj_select->fetch(PDO::FETCH_ASSOC);
//
        return $category;

    }
    public function getMenuAll(){
        $obj_select=$this->con->prepare("SELECT * FROM categories ORDER BY `categories`.`number` ASC ");
        $obj_select->execute();
        $menuList=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $menuList;
    }
}