<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 10/9/2020
 * Time: 11:07 PM
 */?>
<div class="contact" id="Contact">
    <img src="assets/images/images/Contact.jpg" width="100%" height="100%">
    <div class="myFormContact ">
        <form action="" method="post">
            <p class="text">Send Us a Message</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label><i class="fa fa-user" aria-hidden="true"></i></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST['name'])?$_POST['name']:''?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label><i class="fa fa-envelope-o" aria-hidden="true"></i></label>
                            </div>
                            <div class="col-md-10">
                                <input type="email" name="email" placeholder="e-mail" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>"  required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label><i class="fa fa-link" aria-hidden="true"></i></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" placeholder="website" name="website" value="<?php echo isset($_POST['website'])?$_POST['website']:''?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="message" placeholder="Message" cols="30" rows="6" required class="form-control"><?php echo isset($_POST['message'])?$_POST['message']:''?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit"  name="submit" class=" btn form-btn" value="SEND NOW!">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>