<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:07 PM
 */
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Size.php";
require_once "models/Category.php";
require_once "models/Color.php";
require_once "models/User.php";
require_once "../backend/controllers/LoginController.php";
class CartController extends Controller{
    public function add(){
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
        $id=$_GET['id'];
        $product_model=new Product();
        $product=$product_model->getById($id);
//        $size_model=new Size();
//        $sizes=$size_model->getAll();
//        $color_model=new Color();
//        $color=$color_model->getAll();
//        echo "<pre>";
//        print_r($product);
//        echo "</pre>";

        $cart=[
            'name'=>$product['name'],
            'avatar'=>$product['avatar'],
            'price'=>$product['price'],
            'sale'=>$product['sale'],
            'options'=>[
                'size'=>$product['size'],
                'color'=>$product['color']
            ],

            'quality'=>1
        ];
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'][$id]=$cart;
        }else{
            if (!array_key_exists(($id), $_SESSION['cart'])){
                $_SESSION['cart'][$id]=$cart;
            }else{
                $_SESSION['cart'][$id]['quality']++;
            }
        }
        $url_redirect=$_SERVER['SCRIPT_NAME'].'/gio-hang-cua-ban';
        header("Location: $url_redirect");
        exit();

    }
    public function index(){
        if (isset($_POST['submit'])){
            foreach ($_SESSION['cart'] as $product_id => $cart){
                $_SESSION['cart'][$product_id]['quality']=$_POST[$product_id];
            }
//            $_SESSION['success']="cập hập giỏ hàng thành công";
        }
        $category_model=new Category();
        $categories=$category_model->getMenuAll();
        $this->content=$this->render("views/carts/index.php",['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        $product_id=$_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        if(empty($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
//        else if (empty($_SESSION['user'])){
//            unset($_SESSION['cart']);
//        }

//        $_SESSION['success']="Xóa sản phẩm khỏi giỏ hàng thành công";
        $url_redireact=$_SERVER['SCRIPT_NAME'].'/gio-hang-cua-ban';
        header("Location: $url_redireact");
        exit();
    }
}