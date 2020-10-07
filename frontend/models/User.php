<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 8/27/2020
 * Time: 6:28 PM
 */
require_once "models/Model.php";
class User extends Model{
    public function getUserLogin($username, $password){
        $obj_select_one=$this->con->prepare("SELECT * FROM users WHERE `username`=:username and `password`=:password");
        $arr_select=[
            ':username'=>$username,
            ':password'=>$password
        ];
        $obj_select_one->execute($arr_select);
        $user=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}