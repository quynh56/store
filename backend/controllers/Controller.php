<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:08 AM
 */
class Controller{
    public function __construct()
    {
        if (!isset($_SESSION['user'])&&$_GET['controller'] !='login'){
            $_SESSION['error']='Bạn chưa đăng nhập';
            header("Location: index.php?controller=login&action=login");
            exit();
        }

    }
    public $content;
   public $error;
    public function render($file,$variables=[]){
        extract($variables);
        ob_start();
        require_once "$file";
        $view =ob_get_clean();
        return$view;
    }
}