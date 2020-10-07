<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 9/28/2020
 * Time: 4:44 PM
 */
require_once "models/Model.php";
class MenuTree extends Model{
   public  function recursive($categories, $parent, &$newString){
       if (count($categories) >0){
           foreach ($categories as $key=>$category){
               $category_name=$category['name'];
               $categry_slug=Helper::getSlug($category_name);
               $category_id=$category['id'];
               $url_category="showList/$categry_slug/$category_id";
               if ($category['parent_id']==$parent){
                   $category['name']='<a href='.$url_category.'>'.$category['name'].'</a>';
                   $newString .='<li>'.$category['name'];
                   $newString .='<ul class="menu-child">';
                   unset($categories[$key]);
                   $newParent=$category['id'];
                   recursive($categories, $newParent,$newString);
                   $newString .='</ul>';
                   $newString .='</li>';
               }
           }
       }
   }
   public function menuParent(){
       $parent_id=0;
       $sql_select=$this->con->prepare("SELECT products.*, FROM products inner join categories ON products.category_id=categories.id where categories.parent_id=$parent_id");
       $sql_select->execute();
       $menuparent= $sql_select->fetchAll(PDO::FETCH_ASSOC);
       return $menuparent;
   }
}