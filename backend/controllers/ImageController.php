<?php
require_once "controllers/Controller.php";
require_once "models/Pagination.php";
require_once "models/Product.php";
require_once "models/Category.php";
require_once "models/Color.php";
require_once "models/Image.php";
class ImageController extends Controller{
    public function create(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=color');
            exit();
        }
        $id=$_GET['id'];
        if(isset($_POST['submit'])){
            $color_id=$_POST['color_id'];
            $avatar_file=$_FILES['avatar'];
            if($avatar_file['error']==0){
                $extension_arr=['jpg','png','gif','jpeg'];
                $extension=pathinfo($avatar_file['name'],PATHINFO_EXTENSION);
                $extension=strtolower($extension);
                if(!in_array($extension,$extension_arr)){
                    $this->error = 'Cần upload file định dạng ảnh';
                }
            }
            if(empty($this->error)){
                $filename='';
                if($avatar_file['error']==0){
                    $dir_uploads=__DIR__.'/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $filename=time().'-images-'.$avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$filename);
                }
                $image_model=new Image();
                $image_model->color_id=$color_id;
                $image_model->product_id=$id;
                $image_model->images=$filename;
                $is_insert=$image_model->insert();
                if($is_insert){
                    $_SESSION['success']="Insert dữ liệu thành công";
                }else{
                    $_SESSION['error']="Insert dữ liệu thất bại";
                }
                header('Location: index.php?controller=color');
                exit();

            }
        }
        $color_model=new Color();
        $colors=$color_model->getAll();
        $product_model=new Product();
        $product=$product_model->getById($id);
        $output=[
            'colors'=>$colors,
            'product'=>$product
        ];
        $this->content=$this->render('views/products/images/create.php',$output);
        require_once 'views/layouts/main.php';
    }
}