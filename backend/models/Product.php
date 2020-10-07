<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:11 AM
 */
require_once "models/Model.php";
class Product extends Model{
    public $id;
    public $category_id;
    public $new_id;
    public $user_id;
    public $name;
    public $avatar;
    public $price;
    public $sale;
    public $content;
    public $type;
    public $status;
    public $created_at;
    public $product_code;
    public $updated_at;
    public $str_search='';
    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['title'])&&!empty($_GET['title'])){
            $this->str_search .=" AND products.name LIKE '%{$_GET['title']}%'";
        }
        if(isset($_GET['category_id'])&&!empty($_GET['category_id'])){
            $this->str_search .=" AND products.category_id ={$_GET['category_id']}";
        }
    }

    public function getAll(){
//        $sql_select="SELECT products.*,categories.name AS category_name FROM products INNER JOIN categories ON categories.id=products.category_id
//                       ORDER BY products.updated_at DESC ,products.created_at DESC";
//        $obj_select = $this->con->prepare($sql_select);
//        $srr_select=[];
//        $obj_select->execute($srr_select);
//        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
//        return $products;
//        $sql_select="SELECT products.*, categories.name AS category_name,sizes.name AS size_name,color.name AS color_name,
//        images.images AS images_content FROM ((products INNER JOIN categories ON products.category_id =categories.id)
//        (INNER JOIN sizes ON products.id =sizes.product_id)(INNER JOIN color ON products.id =color.product_id)(
//        INNER JOIN images ON products.id =images.product_id
//        )) ORDER BY products.created_at DESC, products.updated_at DESC ";
        $sql_select="SELECT products.*, categories.name AS category_name  
FROM ((products INNER JOIN categories ON products.category_id=categories.id) WHERE TRUE $this->str_search  ORDER BY products.created_at DESC, products.updated_at DESC";
        $obj_select =$this->con->prepare($sql_select);
        $arr_select=[];
        $obj_select->execute($arr_select);
        $products =$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function insert(){
        $obj_insert=$this->con->prepare("INSERT INTO products(category_id,`name`,`new_id`,
`avatar`,`price`,`sale`,`content`,`type`,`status`) VALUES (:category_id,:name,:new_id,:avatar,:price,:sale,:content,:type,:status) ");
        $insert_arr=[
            ':category_id'=>$this->category_id,
            ':name'=>$this->name,
            ':new_id'=>$this->new_id,
            ':avatar'=>$this->avatar,
            ':price'=>$this->price,
            ':sale'=>$this->sale,
            ':content'=>$this->content,
            ':type'=>$this->type,
            ':status'=>$this->status,
        ];
        $obj_insert->execute($insert_arr);
        $product_id=$this->con->lastInsertId();
        return $product_id;
    }
    public function getById($id){
        $obj_select=$this->con->prepare("SELECT products.*, categories.name AS category_name FROM products
INNER JOIN categories ON products.category_id =categories.id WHERE products.id =$id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id){
        $obj_update=$this->con->prepare("UPDATE products SET category_id=:category_id,name=:name,new_id=:new_id,
avatar=:avatar,price=:price,sale=:sale,content=:content,type=:type,status=:status,updated_at=:updated_at WHERE id=$id");
        $arr_update=[
            ':category_id'=>$this->category_id,
            ':name'=>$this->name,
            ':new_id'=>$this->new_id,
            ':avatar'=>$this->avatar,
            ':price'=>$this->price,
            ':sale'=>$this->sale,
            ':content'=>$this->content,
            ':type'=>$this->type,
            ':status'=>$this->status,
            ':updated_at'=>$this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete($id){
        $obj_delete=$this->con->prepare("DELETE FROM products WHERE id=$id");
        $is_delete= $obj_delete->execute();
        $obj_delete_size=$this->con->prepare("DELETE FROM sizes WHERE product_id=$id");
        $obj_delete_size->execute();
        $obj_delete_color=$this->con->prepare("DELETE FROM color WHERE product_id=$id");
        $obj_delete_color->execute();
        $obj_delete_image=$this->con->prepare("DELETE FROM images WHERE product_id=$id");
        $obj_delete_image->execute();
        $obj_delete_slide=$this->con->prepare("DELETE FROM slides WHERE product_id=$id");
        $obj_delete_slide->execute();
        return $is_delete;
    }
    public function getAllPagination($arr_params){
        $limit=$arr_params['limit'];
        $page=$arr_params['page'];
        $start=($page-1)*$limit;
        $obj_select=$this->con->prepare("SELECT products.*, categories.name AS category_name FROM products 
        INNER JOIN categories ON categories.id=products.category_id WHERE TRUE $this->str_search
        ORDER BY products.updated_at DESC, products.created_at DESC LIMIT $start, $limit");
        $arr_select=[];
        $obj_select->execute($arr_select);
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function countTotal(){
        $obj_select=$this->con->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
}