<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:10 AM
 */
require_once "controllers/Controller.php";
require_once "models/Pagination.php";
require_once "models/Product.php";
require_once "models/Category.php";
require_once "models/Size.php";
require_once "models/Color.php";
require_once "models/Slide.php";
require_once "models/Image.php";
class ProductController extends Controller{
    public function index(){
        $product_model = new Product();

        //lấy tổng số bản ghi đang có trong bảng products
        $count_total = $product_model->countTotal();
        //        xử lý phân trang
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total'=>$count_total,
            'limit'=>5,
            'query_string'=>'page',
            'controller'=>'product',
            'action'=>'index',
            'full_mode'=> false,
            'query_additional'=>$query_additional,
            'page'=>isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $products = $product_model->getAllPagination($arr_params);
        $category_model=new Category();
        $categories=$category_model->getAll();
        $size_model=new Size();
        $sizes=$size_model->getAll();
        $output_arr=[
            'products'=>$products,
            'sizes'=>$sizes,
            'categories'=>$categories,
            'pages'=>$pages
        ];
        $this->content=$this->render('views/products/index.php',$output_arr);
        require_once "views/layouts/main.php";
    }
    public function create(){
        if(isset($_POST['submit'])){
            $category_id=$_POST['category_id'];
//            $product_code=$_POST['product_code'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $avatar_file=$_FILES['avatar'];
            $sale=$_POST['sale'];
            $content=$_POST['description'];
            $type=$_POST['type'];
            $status=$_POST['status'];
            if(empty($name)){
                $this->error="Không được để trống tên sản phẩm";

            }
//            else if(empty($product_code)){
//                $this->error="không được để trống mã sản phẩm";
//            }
            else if($avatar_file['error']==0){
                $extension_arr=['jpg','png','gif','jpeg'];
                $extension=pathinfo($avatar_file['name'],PATHINFO_EXTENSION);
                $extension=strtolower($extension);
                $file_size_mb=$avatar_file['size']/1024/1024;
                $file_size_mb=round($file_size_mb,2);
                if(!in_array($extension,$extension_arr)){
                    $this->error = 'Cần upload file định dạng ảnh';
                }else if($file_size_mb>2){
                    $this->error='File upload không được quá 2MB';
                }
            }
            if(empty($this->error)){
                $filename='';
                if($avatar_file['error']==0){
                    $dir_uploads=__DIR__.'/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $filename=time().'-product-'.$avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$filename);
                }
                $product_model=new Product();
                $product_model->name=$name;
                $product_model->category_id=$category_id;
                $product_model->avatar=$filename;
                $product_model->price=$price;
                $product_model->sale=$sale;
                $product_model->content=$content;
                $product_model->type=$type;
                $product_model->status=$status;
                $product_id=$product_model->insert();
               if($product_id>0){
                   echo "<pre>";
                   print_r($product_id);
                   echo"</pre>";
//                   $size_model=new Size();
//                   $size_model->product_id=$product_id;
//                   $is_insert=$size_model->insert();
//                   var_dump($is_insert);
                   header("Location: index.php?controller=size&action=create&id=$product_id");
                   exit();
               }
            }

        }
        $category_model=new Category();
        $categories=$category_model->getAll();
        $this->content=$this->render('views/products/create.php',['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id=$_GET['id'];
        $product_model=new Product();
        $is_delete=$product_model->delete($id);
        if($is_delete){
            $_SESSION['success']="Xóa dữ liệu thành công";
        }
        else{
            $_SESSION['error']='Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();

    }
    public function detail(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id=$_GET['id'];
        $product_model= new Product();
        $product =$product_model->getById($id);
        $size_model=new Size();
        $slide_model=new Slide();
        $color_model=new Color();
        $image_model=new Image();
        $sizes=$size_model->getAll();
        $colors=$color_model->getAll();
        $slides=$slide_model->getAll();
        $images=$image_model->getAll();
        $output=[
            'product'=>$product,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'slides'=>$slides,
            'images'=>$images
        ];
        $this->content=$this->render('views/products/detail.php',$output);
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error="ID không hợp lệ";
            header('Location: index.php?controller=product');
            exit();
        }
        $id=$_GET['id'];
        $product_model=new Product();
        $product =$product_model->getById($id);
        if(isset($_POST['submit'])){
            $category_id=$_POST['category_id'];
            $name=$_POST['name'];
            $avatar_file=$_FILES['avatar'];
            $price=$_POST['price'];
            $sale=$_POST['sale'];
            $content=$_POST['description'];
            $type=$_POST['type'];
            $status=$_POST['status'];
            if(empty($name)){
                $this->error='Không được để trống tên sản phẩm';
            }
            else if($avatar_file['error']==0){
                $extension_arr=['png','jpg','gif','jpeg'];
                $extension=pathinfo($avatar_file['name'],PATHINFO_EXTENSION);
                $extension=strtolower($extension);
                $file_mb_size=$avatar_file['size']/1024/1024;
                $file_mb_size=round($file_mb_size,2);
                if(!in_array($extension,$extension_arr)){
                    $this->error='Cần uploads file có định dạng ảnh';
                }else if($file_mb_size >2){
                    $this->error='File upload không được lớn hơn 2MB';
                }
            }
            if(empty($this->error)){
                $filename=$product['avatar'];
                if($avatar_file['error']==0){
                    $dir_upload=__DIR__ .'/../assets/uploads';
                    @unlink($dir_upload .'/'.$filename);
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $filename=time().'-product-'.$avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_upload .'/'.$filename);
                }
                $product_model->category_id=$category_id;
                $product_model->name=$name;
                $product_model->avatar=$filename;
                $product_model->price=$price;
                $product_model->sale=$sale;
                $product_model->type=$type;
                $product_model->content=$content;
                $product_model->status=$status;
                $product_model->updated_at=date('Y-m-d H:i:s');
                $is_update=$product_model->update($id);
                if($is_update){
                    $_SESSION['success']='Update product thành công';
                }else{
                    $_SESSION['error']="Update product thất bại";
                }
                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
        $category_model=new Category();
        $categories=$category_model->getAll();
        $output=[
            'product'=>$product,
            'categories'=>$categories
        ];
        $this->content=$this->render('views/products/update.php',$output);
        require_once 'views/layouts/main.php';
    }
}