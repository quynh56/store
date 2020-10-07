<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:11 AM
 */
class Pagination{
    public $params=[
        'total'=>0,
        'limit'=>0,
        'controller'=>'',
        'action'=>'',
        'full_mode'=>true
    ];
    public function __construct($params)
    {
        $this->params=$params;
    }
    public function getTotalPage(){
        $total=$this->params['total']/$this->params['limit'];
        $total=ceil($total);
        return $total;
    }
    public function getCurrentPage(){
        $page=1;
        if(isset($_GET['page'])&&is_numeric($_GET['page'])){
            $page =$_GET['page'];
            $total_page=$this->getTotalPage();
            if($page >=$total_page){
                $page=$total_page;
            }
        }
        return $page;
    }
    public function getPevPage(){
        $prev_page='';
        $current_page=$this->getCurrentPage();
        if($current_page>=2){
            $controller=$this->params['controller'];
            $action=$this->params['action'];
            $page=$current_page-1;
            $prev_url="index.php?controller=$controller&action=$action&page=$page";
            $prev_page ="<li class='page-item'><a href='$prev_url' class='page-link'><i class='fa fa-angle-left'></i></a></li>";
        }
        return $prev_page;
    }
    public function getNextPage(){
        $next_page='';
        $current_page=$this->getCurrentPage();
        $total_page=$this->getTotalPage();
        if($current_page < $total_page){
            $controller=$this->params['controller'];
            $action=$this->params['action'];
            $page=$current_page+1;
            $next_url="index.php?controller=$controller&action=$action&page=$page";
            $next_page="<li class='page-item'><a href='$next_url' class='page-link'><i class='fa fa-angle-right'></i></a></li>";
        }
        return $next_page;
    }
    public function getPagination(){
        $data='';
        $total_page=$this->getTotalPage();
        if($total_page ==1){
            return '';
        }
        $data .="<ul class='pagination'>";
        $prev_link=$this->getPevPage();
        $data .=$prev_link;
        $controller=$this->params['controller'];
        $action=$this->params['action'];
        $full_mode=$this->params['full_mode'];
        if($full_mode==false){
            for($page=1;$page<=$total_page;$page++){
                $current_page=$this->getCurrentPage();
                if(in_array($page,[1,$total_page,$current_page-1,$current_page+1])){
                    $link="index.php?controller=$controller&action=$action&page=$page";
                    $data .="<li class='page-item'><a href='$link' class='page-link'>$page</a></li>";
                }
                else if($page==$current_page){
                    $data .="<li class='active page-item'><a href='#' class='page-link'>$current_page</a></li>";
                }
                else if(in_array($page,[2,3,$total_page-1,$total_page-2])){
                    $data.="<li class='page-item'><a href='' class='page-link'>...</a></li>";
                }
            }
        }
        else{
            for ($page=1;$page<=$total_page;$page++){
                $current_page=$this->getCurrentPage();
                if($page==$current_page){
                    $data.="<li class='active page-item'><a href='#' class='page-link'>$page</a></li>";
                }else{
                    $link="index.php?controller=$controller&action=$action&page=$page";
                    $data .="<li class='page-item'><a href='$link' class='page-link'>$page</a></li>";
                }
            }
        }
        $next_link=$this->getNextPage();
        $data .=$next_link;
        $data .="</ul>";
        return $data;
    }
}