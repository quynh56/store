<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:07 PM
 */
class Controller{
    public $error;
    public $content;
    public function render($file,$variable=[]){
        extract($variable);
        ob_start();
        require_once $file;
        $views=ob_get_clean();
        return $views;
    }
}