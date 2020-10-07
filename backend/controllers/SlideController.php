<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 11:30 PM
 */
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Slide.php";
class SlideController extends Controller{
    public function create(){
        if(!is_numeric($_GET['id'])&&!isset($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=slide');
            exit();
        }
        $id=$_GET['id'];
        if(isset($_POST['submit'])){
            $position=$_POST['position'];
            $location=$_POST['location'];
            $status=$_POST['status'];
            $avatar_file=$_FILES['avatar'];
            if($avatar_file['error']==0){
                $extension_arr=['gif','jpg','png','jpeg'];
                $extension=pathinfo($avatar_file['name'],PATHINFO_EXTENSION);
                $extension=strtolower($extension);
                $file_size_mb=$avatar_file['size']/1024/1024;
                $file_size_mb=round($file_size_mb,2);
                if(!in_array($extension,$extension_arr)){
                    $this->error='Cần upload file định dạng ảnh';
                }
                else if($file_size_mb>2){
                    $this->error='File upload không được quá 2MB';
                }
            }
            if(empty($this->error)){
                $filename='';
                if($avatar_file['error']==0){
                    $dir_upload=__DIR__.'/../assets/uploads';
                    if (!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $filename=time().'-slide-'.$avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_upload.'/'.$filename);
                }
                $slide_model=new Slide();
                $slide_model->position=$position;
                $slide_model->location=$location;
                $slide_model->avatar=$filename;
                $slide_model->status=$status;
                $slide_model->product_id=$id;
                $is_insert=$slide_model->insert();
                if($is_insert){
                    $_SESSION['success']="Insert dữ liệu thành công";
                }else{
                    $_SESSION['error']="Insert dữ liệu thất bại";
                }
                header('Location: index.php?controller=slide');
                exit();
            }
        }
        $product_model=new Product();
        $product=$product_model->getById($id);
        $this->content=$this->render('views/products/slides/create.php',['product'=>$product]);
        require_once "views/layouts/main.php";
    }
    public function index(){
        $slide_model=new Slide();
        $slides=$slide_model->getAll();
        $this->content=$this->render('views/products/slides/index.php',['slides'=>$slides]);
        require_once "views/layouts/main.php";
    }
    public function detail(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không hợp lệ";
            header('Location: index.php?controller=slide&action=index');
        }
        $id=$_GET['id'];
        $slide_model=new Slide();
        $slide=$slide_model->getById($id);
        $this->content=$this->render('views/products/slides/detail.php',['slide'=>$slide]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=slide');
            exit();
        }
        $id=$_GET['id'];
        $product_model=new Slide();
        $is_delete=$product_model->delete($id);
        if($is_delete){
            $_SESSION['success']="Xóa dữ liệu thành công";
        }
        else{
            $_SESSION['error']='Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=slide');
        exit();

    }
}