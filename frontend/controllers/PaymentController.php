<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:07 PM
 */
require_once "controllers/Controller.php";
require_once "models/Order.php";
require_once "models/Category.php";
require_once "models/OrderDetail.php";
require_once "configs/PHPMailer/src/PHPMailer.php";
require_once "configs/PHPMailer/src/SMTP.php";
require_once "configs/PHPMailer/src/Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class PaymentController extends Controller{
    public function index(){
        if(isset($_POST['submit'])){
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $address=$_POST['address'];
            $note=$_POST['note'];
            $user_id=$_SESSION['user']['id'];
            $method=$_POST['method'];
            if(empty($fullname)){
                $this->error='Không được để trống trường name';
            }
            else if(empty($mobile)){
                $this->error="không được để trống số điện thoại";
            }
            else if(strlen($mobile)!=10){
                $this->error="Nhập đúng SĐT";
            }
            else if(empty($address)){
                $this->error="Phải điền trường address";
            }
            if(empty($this->error)){
                $order_model=new Order();
                $order_model->fullname=$fullname;
                $order_model->email=$email;
                $order_model->mobile=$mobile;
                $order_model->user_id=$user_id;
                $order_model->address=$address;
                $order_model->note=$note;
                $price_total=0;
                foreach ($_SESSION['cart'] as $cart){
                    if($cart['sale'] >0){
                        $sale=($cart['price']/100)*$cart['sale'];
                        $sale= ceil($sale);
                        $price_sale=$cart['price']-$sale;
                        $price_item =$price_sale*$cart['quality'];
                        $price_total +=$price_item;
                    }else{
                        $price_item = $cart['price']*$cart['quality'];
                        $price_total +=$price_item;
                    }
                }
                $order_model->price_total= $price_total;
                $order_model->payment_status=$method;
                $order_id=$order_model->insert();
//                var_dump($order_id);
                if($order_id >0){
                    $order_detail_model=new OrderDetail();
                    $order_detail_model->order_id=$order_id;
                    foreach ($_SESSION['cart'] as $product_id =>$cart){
                        $order_detail_model->product_id=$product_id;
                        $order_detail_model->quality=$cart['quality'];
                        $is_insert=$order_detail_model->insert();
                        var_dump($is_insert);

                    }
                    if($method==0){
                        $_SESSION['order']=[
                            'price_total'=>$price_total,
                            'fullname'=>$fullname,
                            'email'=>$email,
                            'mobile'=>$mobile
                        ];
                        $url_direct=$_SERVER['SCRIPT_NAME'].'/thanh-toan-truc-tuyen';
                        header("Location: $url_direct");
                        exit();
                    }else{

                        $this->sendMail($email,$fullname,$mobile,$note);
                        unset($_SESSION['cart']);
                        $url_direct=$_SERVER['SCRIPT_NAME'].'/thank';
                        header("Location: $url_direct");
                        exit();
                    }
                }
            }
        }
        $order_model=new Order();
        $orders=$order_model->getAll();
        $category_model=new Category();
        $categories=$category_model->getAll();
        $this->content=$this->render('views/payments/index.php',['orders'=>$orders,'categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function sendMail($email,$fullname,$mobile,$note){
        $mail=new PHPMailer(true);
        try {
            //Server settings
            //thêm dong sau để hiển thị được ký tự có dấu
            $mail->CharSet='UTF-8';
            //thực tế sẽ sử dụng DEBUG_OFF để bỏ việc debug gửi email
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            // sử dụng server gmail để gửi mail
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            //nhập tài khoản gmail cho username
            $mail->Username   = 'quyynhdaang@gmail.com';                     // SMTP username
            //password không phải là password gmail, mà gmail có 1 cơ chế tạo password cho các ứng dụng, password này độc lập với password gmail của bạn
            $mail->Password   = 'gqokbsplknyxognj';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //gửi từ ai
            $mail->setFrom('MoTi@gmail.com', 'Gui tu GDT.store');
            //gửi tới ai
            $mail->addAddress($email);     // Add a recipient
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
//
//            // Attachments
//            //đính kèm file muốn gửi cùng mail
//            $mail->addAttachment('avatar-10.jpg');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'GDT.Store- SẢN PHẨM ĐÃ ĐẶT HÀNG';
            $mail->Body    .= '
<h4>Thông tin người mua hàng</h4>
        <table border="1" cellpadding="10 18px" cellspacing="0">
            <tr>
                <th>Họ tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Note</th>
                <th>Đ/C</th>
           
            </tr>
            <tr>
                <td> '.$fullname.' </td>
                <td>'.$mobile.'</td>
                <td>'.$email.'</td>
                <td>'.$note.'</td>
                <td>N/A</td>
            </tr>
        </table>
<h4>Thông tin đơn hàng</h4>
';

            $mail->Body .='<table border="1" cellpadding="10px 18px" cellspacing="0" style="text-align: center"> 
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>';
            $total=0;
            foreach ($_SESSION['cart'] as $cart){
                $mail->Body .="<tr>
                <td>";
                $mail->Body .='<img src="../../backend/assets/uploads/"'.$cart['avatar'].' width=60px>';
                $mail->Body.="<br>".$cart['name']."</td>
                <td>".$cart['quality']."</td>
                <td>".number_format($cart['price'],0,'.','.')."</td>
                <td>".
                $sale=($cart['price']/100)*$cart['sale'];
                $sale= ceil($sale);
                $price_sale=$cart['price']-$sale;
                $total_item =$price_sale*$cart['quality'];
                $total += $total_item ;
                number_format($total_item,2)."
</td>
";
            }
            $mail->Body.='<tr>
                            <th colspan="3">Total</th>
                            <td>'.number_format($total,0,'.','.').'</td>
                         </tr> 
                    </table>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function thank(){
        $category_model=new Category();
        $categories=$category_model->getAll();
        $this->content=$this->render("views/payments/thank.php",['categories'=>$categories]);
        require_once 'views/layouts/main.php';
    }
    public function online(){
        $this->content=$this->render('configs/nganluong/index.php');
        echo $this->content;
    }
}