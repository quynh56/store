<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/1/2020
 * Time: 12:12 AM
 */
require_once "models/Model.php";
class User extends Model{
    public $last_name;
    public $first_name;
    public $username;
    public $password;
    public $birthday;
    public $avatar;
    public function register(){
        $obj_insert=$this->con->prepare("INSERT INTO users(`last_name`,`first_name`,`username`,`password`,`avatar`,`birthday`) VALUES (:lname,:fname,:username,:password,:avatar,:birthday) ");
        $arr_insert=[
            ':lname'=>$this->last_name,
            ':fname'=>$this->first_name,
            ':username'=>$this->username,
            ':password'=>$this->password,
            ":avatar"=>$this->avatar,
            ':birthday'=>$this->birthday
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getUser($username){
        $sql_select_one="SELECT * FROM users WHERE `username`=:username";
        $obj_select_one =$this->con->prepare($sql_select_one);
        $select_arr=[
            ':username'=>$username
        ];
        $obj_select_one->execute($select_arr);
        $user=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
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