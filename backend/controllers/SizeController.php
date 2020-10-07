<?php
require_once "controllers/Controller.php";
require_once "models/Pagination.php";
require_once "models/Product.php";
require_once "models/Size.php";
class SizeController extends Controller{
    public function create(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $this->error='ID không hợp lệ';
            header('Location: index.php?controller=size');
            exit();
        }
        $id=$_GET['id'];
       if(isset($_POST['submit'])){
           $size_name=$_POST['size_name'];
           $size_1=$_POST['size_1'];
           $size_2=$_POST['size_2'];
           $size_3=$_POST['size_3'];
           $hand_length=$_POST['hand_length'];
           $lengths=$_POST['lengths'];
           $waist_length=$_POST['waist_length'];
           $bice_length=$_POST['bice_length'];
           $shoulder=$_POST['shoulder'];
           $cuff=$_POST['cuff'];
           $femoral=$_POST['femoral'];
           $base_height=$_POST['base_height'];
           $axle_height=$_POST['axle_height'];
           $quality=$_POST['quality'];
           $status=isset($_POST['status'])?$_POST['status']:'';
           if(empty($size_name)){
               $this->error='Không được để trống tên size';
           }
           else if(empty($quality)){
               $this->error="nhập số lượng cho size";
           }
           if(empty($this->error)){
               $size_model=new Size();
               $size_model->size_name=$size_name;
               $size_model->product_id=$id;
               $size_model->size_1=$size_1;
               $size_model->size_2=$size_2;
               $size_model->size_3=$size_3;
               $size_model->hand_length=$hand_length;
               $size_model->lengths=$lengths;
               $size_model->waist_length=$waist_length;
               $size_model->bice_length=$bice_length;
               $size_model->shoulder=$shoulder;
               $size_model->cuff=$cuff;
               $size_model->femoral=$femoral;
               $size_model->base_height=$base_height;
               $size_model->axle_height=$axle_height;
               $size_model->quality=$quality;
               $size_model->status=$status;
               $is_insert=$size_model->insert();
//               die($is_insert);
               if($is_insert){
                   $_SESSION['success']="Insert dữ liệu thành công";
               }else{
                   $_SESSION['error']="Insert dữ liệu thất bại";
               }
               header("Location: index.php?controller=product");
               exit();
           }
       }
        $product_model=new Product();
        $product=$product_model->getById($id);
       $this->content=$this->render('views/products/sizes/create.php',['product'=>$product]);
       require_once "views/layouts/main.php";
    }
    public function index(){
        $size_model=new Size();
        $total=$size_model->getTotal();
        $params=[
            'total'=>$total,
            'limit'=>5,
            'query_string'=>'page',
            'controller'=>'size',
            'action'=>'index',
            'full_mode'=>false,
            'page'=>isset($_GET['page'])?$_GET['page']:1
        ];

        $sizes =$size_model->getAllPagination($params);
        $pagination=new Pagination($params);
        $page=$pagination->getPagination();
        $this->content=$this->render('views/products/sizes/index.php',['sizes'=>$sizes,'page'=>$page]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không hợp lệ";
            header('Location: index.php?controller=size&action=index');
            exit();
        }
        $id=$_GET['id'];
        $size_model=new Size();
        $is_delete=$size_model->delete($id);
        if($is_delete){
            $_SESSION['success']="Xóa dữ liệu thành công";
        }else{
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=size&action=index');
        exit();
    }
    public function detail(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không hợp lệ";
            header('Location: index.php?controller=size&action=index');
        }
        $id=$_GET['id'];
        $size_model=new Size();
        $size=$size_model->getById($id);
        $this->content=$this->render('views/products/sizes/detail.php',['size'=>$size]);
        require_once "views/layouts/main.php";
    }
    public function update(){
        if(!isset($_GET['id'])&&!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không hợp lệ";
            header('Location: index.php?controller=size&action=index');
            exit();
        }
        $id=$_GET['id'];
        $size_model=new Size();
        $size=$size_model->getById($id);
        if(isset($_POST['submit'])){
            $size_name=$_POST['size_name'];
            $size_1=$_POST['size_1'];
            $size_2=$_POST['size_2'];
            $size_3=$_POST['size_3'];
            $hand_length=$_POST['hand_length'];
            $lengths=$_POST['lengths'];
            $waist_length=$_POST['waist_length'];
            $bice_length=$_POST['bice_length'];
            $shoulder=$_POST['shoulder'];
            $cuff=$_POST['cuff'];
            $femoral=$_POST['femoral'];
            $base_height=$_POST['base_height'];
            $axle_height=$_POST['axle_height'];
            $quality=$_POST['quality'];
//            $type=$_POST['type'];
            $status=isset($_POST['status']);
            if(empty($size_name)){
                $this->error='Không được để trống tên size';
            }
            else if(empty($quality)){
                $this->error="nhập số lượng cho size";
            }
            if(empty($this->error)){
                $size_model->size_name=$size_name;
                $size_model->size_1=$size_1;
                $size_model->size_2=$size_2;
                $size_model->size_3=$size_3;
                $size_model->hand_length=$hand_length;
                $size_model->lengths=$lengths;
                $size_model->waist_length=$waist_length;
                $size_model->bice_length=$bice_length;
                $size_model->shoulder=$shoulder;
                $size_model->cuff=$cuff;
                $size_model->femoral=$femoral;
                $size_model->base_height=$base_height;
                $size_model->axle_height=$axle_height;
//                $size_model->type=$type;
                $size_model->quality=$quality;
                $size_model->status=$status;
                $size_model->updated_at=date('Y-m-d H:i:s');
                $is_insert=$size_model->update($id);
                if($is_insert){
                    $_SESSION['success']="Update dữ liệu thành công";
                }else{
                    $_SESSION['error']="Update dữ liệu thất bại";
                }
                header("Location: index.php?controller=size&action=index");
                exit();
            }
        }
        $this->content=$this->render('views/products/sizes/update.php',['size'=>$size]);
        require_once "views/layouts/main.php";
    }
}