<?php
$con =mysqli_connect("localhost","root","");
if(mysqli_errno($con)){
    echo "kết nối không thành công " .mysqli_error($con);
}else{
    echo "Kết nối thành công";
}
$sql ="CREATE DATABASE IF NOT EXISTS gdt_store";
if(mysqli_query($con,$sql)){
    echo "Tao thanh cong CSDL gdt_store";
}else{
    echo "co loi xay ra " .mysqli_error($con);
}
mysqli_close($con);
unset($sql);

$con =mysqli_connect('localhost',"root","","gdt_store");
if(mysqli_errno($con)){
    echo "ket noi khong thanh cong".mysqli_error($con);
}else{
    echo "ket noi thanh cong";
}
$sql = "CREATE TABLE IF NOT EXISTS gdt(
id int(20) primary key not null auto_increment, 
store_menu varchar(50),
description varchar(100),
price decimal(10,2),
)";
$sql = "CREATE TABLE IF NOT EXISTS images(
id int(20) primary key not null auto_increment, 
product_img int(20),
image text
)";

if(mysqli_query($con,$sql)){
    echo "tao thanh cong bang gdt";
}else{
    echo "co loi xay ra ".mysqli_error($con);
    mysqli_close($con);
    unset($sql);
}

