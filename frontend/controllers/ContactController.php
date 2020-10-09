<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 10/9/2020
 * Time: 11:10 PM
 */
require_once "controllers/Controller.php";
//require_once "models/Product.php";
require_once "models/Category.php";
//require_once "models/Size.php";
//require_once "models/Color.php";
//require_once "models/Pagination.php";
//require_once "models/Image.php";
require_once "helpers/Helper.php";
class ContactController extends Controller{
    public function index(){
        $category_model=new Category();
        $categories=$category_model->getAll();
        $this->content=$this->render("views/products/contact.php",['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
}