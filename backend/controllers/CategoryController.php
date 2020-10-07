<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:08 AM
 */
require_once "controllers/Controller.php";
require_once "models/Category.php";
require_once "models/Pagination.php";
class CategoryController extends Controller {
    public function index(){
//        $params=[];
////        echo "<pre>";
////        print_r($_GET);
////        echo "</pre>";
//        if(isset($_GET['submit'])){
//            $params['name']=$_GET['name'];
//            $params['status']=$_GET['status'];
//        }
//        $category_model =new Category();
//        $total=$category_model->getTotal();
//        $page=1;
//        if(isset($_GET['page'])){
//            $page=$_GET['page'];
//        }
//        $limit=1;
//        $start=($page-1)*$limit;
//        $params_pagination=[
//            'total'=>$total,
//            'limit'=>$limit,
//            'controller'=>'category',
//            'action'=>'index',
//            'full_mode'=>true
//        ];
//        $params['limit']=$limit;
//        $params['start']=$start;
//        $categories = $category_model->getAll($params);
//        $pagination_model=new Pagination($params_pagination);
//        $pagination =$pagination_model->getPagination();
        $category_model=new Category();
        $total=$category_model->getTotal();
        $query_additional='';
        if(isset($_GET['name'])){
            $query_additional .='&title='.$_GET['name'];
        }
        if(isset($_GET['status'])){
            $query_additional .='&status='.$_GET['status'];
        }
        $arr_params=[
            'total'=>$total,
            'limit'=>5,
            'query_string'=>'page',
            'controller'=>'category',
            'action'=>'index',
            'full_mode'=>false,
            'query_additional'=>$query_additional,
            'page'=>isset($_GET['page'])?$_GET['page']:1
        ];
        $pagination=new Pagination($arr_params);
        $page=$pagination->getPagination();
        $categories=$category_model->getAllPagination($arr_params);
        $arr_output=[
            'categories'=>$categories,
            'page'=>$page
        ];
        $this->content=$this->render('views/categories/index.php',$arr_output);
        require_once "views/layouts/main.php";
    }
    public function create(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        $category_model=new Category();
        $categories =$category_model->getAll();
        if(isset($_POST['submit'])){
            $name =$_POST['name'];
            $parent_id=$_POST['parent_id'];
            $number=$_POST['number'];
            $type_product=$_POST['type_product'];
            $type =isset($_POST['type'])?$_POST['type']:'';
            $status =isset($_POST['status'])?$_POST['status']:'';
            if(empty($name)){
                $this->error='Không được để trống tên danh mục';
            }

            if (empty($this->error)){
                $category_model=new Category();
                $category_model->name=$name;
                $category_model->type=$type;
                $category_model->number=$number;
                $category_model->parent_id=$parent_id;
                $category_model->type_product=$type_product;
                $category_model->status=$status;
                $is_insert =$category_model->insert();
                if($is_insert){
                    $_SESSION['success']='Thêm mới thành công';
                }else{
                    $_SESSION['error']='Thêm mới thất bại';
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }

        }
        $this->content=$this->render('views/categories/create.php',['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function update(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $this->error="ID Category không hợp lệ";
            header("Location: index.php?controller=category&action=index");
            exit();
        }
        $id=$_GET['id'];
        $category_model=new Category();
        $category=$category_model->getCategoryById($id);
        $categories =$category_model->getAll();
        if(isset($_POST['submit'])){
            $name =$_POST['name'];
            $status=$_POST['status'];
            $parent_id=$_POST['parent_id'];
            $number=$_POST['number'];
            if(empty($name)){
                $this->error="không được để trống trường name";
            }
            if(empty($this->error)){
                $category_model =new Category();
                $category_model->name=$name;
                $category_model->parent_id=$parent_id;
                if (empty($number)){
                    $category_model->number=null;
                }else{
                    $category_model->number=$number;
                }

                $category_model->status=$status;
                $category_model->updated_at=date('Y-m-d H:i:s');
                $is_update=$category_model->update($id);
                if($is_update){
                    $_SESSION['success']="Update thành công";
                }else{
                    $_SESSION['error']="Update thất bại";
                }
                header("Location: index.php?controller=category&action=index");
                exit();

            }
        }
        $this->content=$this->render("views/categories/update.php",['category'=>$category,'categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function detail(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $this->error="ID không hợp lệ";
            header("Location: index.php?controller=category&action=index");
            exit();
        }
        $id=$_GET['id'];
        $category_model =new Category();
        $category =$category_model->getCategoryById($id);
        $this->content=$this->render("views/categories/detail.php",['category'=>$category]);
        require_once "views/layouts/main.php";
    }
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $is_delete = $category_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: index.php?controller=category&action=index');
        exit();
    }

}