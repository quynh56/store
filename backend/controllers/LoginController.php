<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
class LoginController extends Controller{
    public function signup(){
        if(isset($_POST['submit'])){
            $last_name=$_POST['lname'];
            $first_name=$_POST['fname'];
            $username=$_POST['username'];
            $avatar=$_FILES['avatar'];
            $password=$_POST['pwd'];
            $confirm_password=$_POST['repassword'];
            $birthday=date($_POST['birthday']);
            if(empty($last_name)||empty($first_name)){
                $this->error='Không được để trống trường name';
            }
            else if(empty($username)){
                $this->error="Không được để trống trường email";
            }
//            else if (!filter_var($username, FILTER_VALIDATE_EMAIL)){
//                $this->error='trường email phải có định dạng email';
//            }
//            else if(!empty($username)){
//                 if (!filter_var($username, FILTER_VALIDATE_EMAIL)){
//                    $this->error='trường email phải có định dạng email';
//
//                 }
//                 else if(!is_numeric($username) && strlen($username)!=11){
//                     $this->error="Phải điền đúng SĐT";
//                 }
//            }
            else if ($avatar['error']==0){
                $extension_arr=['gif','jpg','png','jpeg'];
                $extension=pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension=strtolower($extension);
                $file_size_mb=$avatar['size']/1024/1024;
                $file_size_mb=round($file_size_mb,2);
                if(!in_array($extension,$extension_arr)){
                    $this->error="Cần upload file định dạng ảnh";
                }
                else if ($file_size_mb >2){
                    $this->error="File upload không được quá 2MB";
                }
            }
            else if(empty($password) &&empty($confirm_password)){
                $this->error="Không được để trống trường password";
            }
            else if(strlen($password) <6){
                $this->error="password phải có ít nhất 6 ký tự";
            }
            else if($password !=$confirm_password){
                $this->error="Password và confirm_password phải giống nhau";
            }
            if (empty($this->error)){
                $filename='';
                if ($avatar['error']==0){
                    $dir_upload=__DIR__.'/../assets/uploads';
                    if (!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $filename=time().'-avatar-'.$avatar['name'];
                    move_uploaded_file($avatar['tmp_name'],$dir_upload.'/'.$filename);
                }
                $user_model=new User();
                $user=$user_model->getUser($username);
                if(!empty($user)){
                    $this->error="Username đã tồn tại";
                }else{
                    $user_model->username=$username;
                    $user_model->last_name=$last_name;
                    $user_model->first_name=$first_name;
                    $user_model->password=md5($password);
                    $user_model->avatar=$filename;
                    $user_model->birthday=$birthday;
                    $is_register =$user_model->register();
                    if ($is_register){
                        $_SESSION['success']="Đăng ký thành công";
                    }else{
                        $_SESSION['error']="Đăng ký thất bại";
                    }
                    header('Location: ../backend/index.php?controller=login&action=login');
                    exit();
                }

            }
        }
        $this->content=$this->render('views/users/signup.php');
        require_once "views/layouts/main_login.php";
    }
    public function login(){
        if (isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=$_POST['pwd'];
            if(empty($username)){
                $this->error='Không được để trống trường username';
            }
            else if(empty($password)){
                $this->error='Không được để trống trường password';
            }
            if(empty($this->error)){
                $user_model=new User();
                $password=md5($password);
                $user=$user_model->getUserLogin($username, $password);
                if(empty($user)){
                    $_SESSION['error']="sai username hoặc password";
                    header('Location: index.php?controller=login&action=login');
                    exit();
                }else{
                    $_SESSION['user']=$user;
                    if ($user['username'] == "quyynhdaang@gmail.com"){
                        $_SESSION['success']="Đăng nhập tài khoản admin thành công";
                        header("Location: ../backend/index.php?controller=category&action=index");
                        exit();
                    }else{
                        header("Location: ../frontend/index.php?controller=home");
                        exit();
                    }
                }
            }
        }
        $this->content=$this->render('views/users/login.php');
        require_once "views/layouts/main_login.php";
    }
    public function logout(){
        unset($_SESSION['user']);
        if (empty($_SESSION['user'])){
            unset($_SESSION['cart']);
        }
        header('Location:../backend/index.php?controller=login&action=login');
        exit();
    }
}