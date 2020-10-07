<?php
require_once "controllers/Controller.php";
require_once "models/Pagination.php";
require_once "models/Product.php";
require_once "models/Color.php";
require_once "models/Image.php";
class ColorController extends Controller{
    public function create(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=color');
            exit();
        }
        $id=$_GET['id'];
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $status=$_POST['status'];
            $avatar_file=$_FILES['avatar'];
            if(empty($name)){
                $this->error="Không được để trống tên màu";
            }
            else if($avatar_file['error']==0){
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
                    $filename=time().'-color-'.$avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_upload.'/'.$filename);
                }
                $color_model=new Color();
                $color_model->product_id=$id;
                $color_model->name=$name;
                $color_model->avatar=$filename;
                $color_model->status=$status;
                $color_id=$color_model->insert();
                if($color_id>0){
//                    $image_model=new Image();
//                   $image_model->color_id=$color_id;
//                   $image_model->product_id=$id;
//                   $is_insert=$image_model->insert();
                 header("Location: index.php?controller=image&action=create&id=$id");
                 exit();
                }

            }
        }
        $product_model=new Product();
        $product=$product_model->getById($id);
        $this->content=$this->render('views/products/colors/create.php',['product'=>$product]);
        require_once "views/layouts/main.php";
    }
    public function index(){
        $color_model=new Color();
        $colors=$color_model->getAll();
        $image_model=new Image();
        $images=$image_model->getAll();
        $this->content=$this->render("views/products/colors/index.php",['colors'=>$colors,'images'=>$images]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=color');
            exit();
        }
        $id=$_GET['id'];
        $product_model=new Color();
        $is_delete=$product_model->delete($id);
        if($is_delete){
            $_SESSION['success']="Xóa dữ liệu thành công";
        }
        else{
            $_SESSION['error']='Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=color');
        exit();

    }
    public function detail(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id=$_GET['id'];
        $product_model= new Color();
        $color =$product_model->getById($id);
        $this->content=$this->render('views/products/colors/detail.php',['color'=>$color]);
        require_once 'views/layouts/main.php';
    }
}