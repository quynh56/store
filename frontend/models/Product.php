<?php
require_once "models/Model.php";
class Product extends Model{
//    public $str_search='';
    public $id='';
    public function __construct()
    {
        parent::__construct();
//        if (isset($_GET['search']) &&!$_GET['search']){
//            $search=$_GET['search'];
//            $this->str_search =" AND products.`name` LIKE '%$search%' OR (categories.`name` LIKE '%$search%')";
//        }
        if (isset($_SESSION['menu']['id'])){
            $this->id=" AND products.`category_id`=".$_SESSION['menu']['id'] ;
        }
    }
    public function getAll($params=[]){
        $str_search='';
//        $str_category_id='';
//        $str_price='';
        $start=isset($params['start'] )?$params['start']:0;
        $limit=isset($params['limit']) ? $params['limit'] : 1000;
//        if(isset($params['str_category_id'])){
//            $str_category_id=" AND ".$params['str_category_id'];
//        }
//        if(isset($params['str_price'])){
//            $str_price=" AND ".$params['str_price'];
//        }
//        if (isset($params['id'])){
//            $id=" AND products.`category_id` = ".$params['id'];
//        }
        if(isset($params['search'])&&!empty($params['search'])){
            $search=$params['search'];
            $str_search =" AND products.`name` LIKE '%$search%' OR (categories.`name` LIKE '%$search%')";
        }
        $obj_select = $this->con
            ->prepare("SELECT products.*, categories.name AS category_name FROM products
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE categories.status =1 AND products.status=1 $str_search
                        ORDER BY products.created_at DESC LIMIT $start, $limit
                        ");
        $obj_select->execute();
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
//
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $str_parent='';
        if (isset($arr_params['newString'])){
            $str_parent =" AND categories.parent_id IN ". $arr_params['str_parent'];
        }
        $obj_select = $this->con
            ->prepare("SELECT products.*, categories.name AS category_name,categories.parent_id as menu_parent FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE categories.status =1 AND products.status=1 $this->id 
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
    public function countTotal()
    {
        $obj_select = $this->con->prepare("SELECT COUNT(id) FROM products where true $this->id");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
    public function countTotalHome()
    {
        $obj_select = $this->con->prepare("SELECT COUNT(id) FROM products ");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON 
products.category_id =categories.id WHERE products.id=$id");
        $obj_select->execute();
        $product=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    public function choose($id){
        $obj_select=$this->con->prepare("SELECT products.*, categories.name AS category_name, color.name AS color, sizes.size_name AS size FROM products 
                                                  INNER JOIN categories ON products.category_id =categories.id
                                                  INNER JOIN color ON products.id = color.product_id
                                                  INNER JOIN sizes ON products.id=sizes.product_id WHERE products.id=$id");
        $obj_select->execute();
        $product=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

//    public $cate_id=$_SESSION['menu']['id'];
//    public function sub_cids($cate_id,$cids=0){
//        global $cids;
//        $obj_select=$this->con->prepare("select * from categories where parent_id=$cate_id");
//        $obj_select->execute();
//        $row=$obj_select->fetchAll(PDO::FETCH_ASSOC);
//        $cids[]=
//
//    }
}