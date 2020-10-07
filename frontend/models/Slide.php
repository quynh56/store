<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 8/1/2020
 * Time: 8:44 AM
 */
require_once "models/Model.php";
class Slide extends Model{
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT slides.*,products.name AS product_name,products.type AS product_type, categories.name AS category_name, products.price AS price, products.sale AS sale FROM products
                                                  INNER JOIN slides ON slides.product_id=products.id 
                                                  INNER JOIN categories ON products.category_id =categories.id
                                                  WHERE products.status=1 AND slides.status=1 ORDER BY slides.location ASC,slides.position ASC");
        $obj_select->execute();
        $slides=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $slides;
    }
}