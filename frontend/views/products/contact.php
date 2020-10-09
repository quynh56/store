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
        <form action="">
            <p class="text">Send us a message</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fa fa-user" aria-hidden="true"></i></label>
                        <input type="text" name="Name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-envelope-o" aria-hidden="true"></i></label>
                        <input type="email" name="email" placeholder="e-mail"  required>
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-link" aria-hidden="true"></i></label>
                        <input type="text" placeholder="website" name="website">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="message" placeholder="Message" cols="30" rows="5" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SEND NOW!" name="submit" class="form-btn form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>