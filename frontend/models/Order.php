<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:08 PM
 */
require_once "models/Model.php";
class Order extends Model{
    public $fullname;
    public $address;
    public $email;
    public $mobile;
    public $note;
    public $user_id;
    public $price_total;
    public $payment_status;
    public function insert(){
        $obj_select=$this->con->prepare("INSERT INTO orders(`fullname`,`user_id`,`address`,`mobile`,`email`,`note`,`price_total`,`payment_status`) 
        VALUES(:fullname,:user_id,:address,:mobile,:email,:note,:price_total,:payment_status)");
        $insert_arr=[
            ':fullname'=>$this->fullname,
            ':user_id'=>$this->user_id,
            ':address'=>$this->address,
            ':mobile'=>$this->mobile,
            ':email'=>$this->email,
            ':note'=>$this->note,
            ':price_total'=>$this->price_total,
            ':payment_status'=>$this->payment_status
        ];
        $obj_select->execute($insert_arr);
        $order_id=$this->con->lastInsertId();
        return $order_id;
    }
    public function getAll(){
        $obj_select=$this->con->prepare("SELECT * FROM orders ");
        $obj_select->execute();
        $orders=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

}