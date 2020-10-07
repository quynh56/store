<div class="container">
    <div class="signup">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-header">
                <h4 class="form-title">Đăng kí tài khoản</h4>
                <div class="form-content">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Họ:</label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Họ" value="<?php echo isset($_POST['lname'])?$_POST['lname']:'' ?>">
                                <span class="thongbao" id="signupLname"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Tên:</label>
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="Tên" value="<?php echo isset($_POST['fname'])?$_POST['fname']:'' ?>">
                                <span class="thongbao" id="signupFname"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ email:</label>
                        <input type="text" name="username" class="form-control" id="myEmail" placeholder="Email hoặc SĐT" value="<?php echo isset($_POST['username'])?$_POST['username']:'' ?>">
                        <span class="thongbao" id="signupEmail"></span>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu:</label>
                        <input type="password" class="form-control" name="pwd" id="myPwd"  placeholder="Mật khẩu" value="<?php echo isset($_POST['pwd'])?$_POST['pwd']:'' ?>">
                        <span class="thongbao" id="signupPwd"></span>
                    </div>
                    <div class="form-group">
                        <label>Xác thực mật khẩu:</label>
                        <input type="password" class="form-control" name="repassword" id="rePwd"  placeholder=" Xác thực tật khẩu" value="<?php echo isset($_POST['repassword'])?$_POST['repassword']:'' ?>">
                        <span class="thongbao" id="signupRepwd"></span>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="avatar">Avatar</label>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                        </div>
                        <div class="form-group col">
                            <label>Sinh ngày:</label>
                            <input type="date" name="birthday" class="form-control" id="birthday" value="<?php echo isset($_POST['birthday'])?$_POST['birthday']:'' ?>">
                            <span class="thongbao" id="signupBirthcday"></span>
                        </div>
                    </div>

                    <div class="form-group form-check clearfix">
                        <div class="checkbox ">
                            <label class="form-check-label check-content">
                                <input type="checkbox" class="form-check-input" name="check">
                                <span class="checkafter" id="request"></span>
                                Tôi đồng ý các điều khoản trên
                            </label>
                            <span class="thongbao" id="signupRequest"></span>
                        </div>
                    </div>
                    <div class="form-group form-center">
                        <input type="submit" value="Đăng ký" class="btn btn-outline-primary" id="SignupForm" name="submit">
                    </div>
                    <div class="form-group text-center">
                        <a href="#" class="text-black-50">Tại sao đăng ký?</a>
                        <a href="dang-nhap" class="next-login ">Sign in</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>