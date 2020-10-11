<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 10/9/2020
 * Time: 11:10 PM
 */
require_once "controllers/Controller.php";
//require_once "models/Product.php";
require_once "models/Category.php";
require_once "models/Contact.php";
//require_once "models/Size.php";
//require_once "models/Color.php";
//require_once "models/Pagination.php";
//require_once "models/Image.php";
require_once "helpers/Helper.php";
class ContactController extends Controller{
    public function index(){
        if (isset($_POST['submit'])){
            $fullname=$_POST['name'];
            $email=$_POST['email'];
            $message=$_POST['message'];
            $website=$_POST['website'];
            if (empty($email)){
                $this->error="Không được để trống trường email";
            }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error="Trường email phải có định dạng email";
            }else if (empty($fullname)){
                $this->error="Không được để trống trường name";
            }else if (empty($message)){
                $this->error="Không được để trống trường message";
            }
            if (empty($this->error)){
               if (isset($_SESSION['user'])){
                   $contact_model=new Contact();
                   $contact_model->name=$fullname;
                   $contact_model->email=$email;
                   $contact_model->website=$website;
                   $contact_model->message=$message;
                   $is_insert=$contact_model->insert();
                   if ($is_insert){
                       $_SESSION['success']="Liên lạc thành công";
                       $this->sendMail($fullname, $email, $message, $website);
                   }else{
                       $_SESSION['error']="Lỗi không thể gửi tin nhắn";
                   }
               }else{
                   $_SESSION['error']="Cần đăng nhập tài khoản để gửi tin nhắn";
                   $direct_url=$_SERVER['SCRIPT_NAME'].'/login';
                   header("Location: $direct_url");
                   exit();
               }

            }

        }
        $category_model=new Category();
        $categories=$category_model->getAll();
        $this->content=$this->render("views/products/contact.php",['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    public function sendMail($fullname, $email, $message, $website){

//comment lại đoạn này, vì đoạn này dùng cho framefork
// Load Composer's autoloader
//require 'vendor/autoload.php';

//nhúng các file yêu cầu

// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

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
            $mail->Username   = $email;                     // SMTP username
            //password không phải là password gmail, mà gmail có 1 cơ chế tạo password cho các ứng dụng, password này độc lập với password gmail của bạn
            $mail->Password   = 'gqokbsplknyxognj';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //gửi từ ai
            $mail->setFrom('Moti@gmail.com', 'Gui tu GDT.store');
            //gửi tới ai
            $mail->addAddress('quyynhdaang@gmail.com');     // Add a recipient
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
//
//            // Attachments
//            //đính kèm file muốn gửi cùng mail
            $mail->addAttachment($website);         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject ="User:". $fullname." liên hệ GDT.store";
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}