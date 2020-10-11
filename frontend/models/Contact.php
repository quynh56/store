<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 10/11/2020
 * Time: 5:18 PM
 */
require_once "models/Model.php";
class Contact extends Model{
    public $id;
    public $user_id;
    public $name;
    public $email;
    public $website;
    public $message;
    public function insert(){
        $obj_insert=$this->con->prepare("INSERT INTO contact(`user_id`,`name`,`email`,`website`,`message`) VALUES (:user_id,:name,:email,:website,:message)");
        $arr_insert=[
            ':user_id'=>$this->user_id,
            ':name'=>$this->name,
            ':email'=>$this->email,
            ':website'=>$this->website,
            ':message'=>$this->message
        ];
        return $obj_insert->execute($arr_insert);
    }
}