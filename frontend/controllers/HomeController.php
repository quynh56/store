<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:07 PM
 */
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Slide.php";
require_once "models/Category.php";
require_once "helpers/Helper.php";
require_once "../backend/models/Pagination.php";
class HomeController extends Controller{
    public function index(){
        $params=[];
        $product_model=new Product();
        $count_total=$product_model->countTotalHome();
        $page = 1;
//        if (isset($_GET['page'])) {
//            $page = $_GET['page'];
//        }
        $limit = 6;
        $start = ($page - 1) * $limit;
        $arr_params=[
            'total'=>$count_total,
            'limit'=>$limit,
            'start'=>$start,
            'controller'=>'home',
            'action'=>'index',
            'full_mode'=>false,
        ];
        $params['limit']=$limit;
        $params['start']=$start;
        $products=$product_model->getAll($params);
        $pagination=new Pagination($arr_params);
        $pages=$pagination->getPagination();
        $slide_model=new Slide();
        $slides=$slide_model->getAll();
        $category_model=new Category();
        $categories=$category_model->getMenuAll();

        $output=[
            'categories'=>$categories,
            'products'=>$products,
            'slides'=>$slides,
            'pages'=>$pages,
        ];
        $this->content=$this->render('views/homes/index.php',$output);
        require_once 'views/layouts/main.php';
    }


}