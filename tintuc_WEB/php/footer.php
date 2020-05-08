<div class="banner-right">
    <a href="#"><img src="../image/cuchoami.jpg" alt="Quảng cáo"></a>
</div>
</div>
<div id="footer">
    <div class="contact">
        <div class="footer-child row">
            <div class="col">
                <i class="fa fa-home fa-3x" aria-hidden="true"></i><p>Công Ty....</p>
            </div>
            <div class=" child-sub col">
                <i class="fa fa-mobile fa-5x" aria-hidden="true"></i><p>(+1)234567890 <br> (+1)987654321</p>
            </div>
            <div class="col">
                <i class="fa fa-envelope-open-o fa-3x " aria-hidden="true"></i> <p>GDT@gmail.com</p>
            </div>
        </div>

    </div>
    <div class="custom">

        <button id="hien"><i class="fa fa-comments fa-2x" aria-hidden="true"></i>Đóng góp ý kiến</button>
        <div class="form">
            <form action="" method="POST">
                <label>Nhập thông tin của bạn</label>
                <input type="text" name="name" placeholder="Nhập tên của bạn">
                <input type="email" name="email" placeholder="Nhập email của bạn">
                <input type="tel" name="usrtel" placeholder="Nhập số điện thoại của bạn">
                <label>Tin nhắn</label>
                <textarea name="message"  cols="30" rows="7"></textarea>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#hien").click(function() {

            $(".form").toggle();
        });
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            /*                navText:["<i class='fa fa-arrow-right fa-2x' aria-hidden='true'></i>,<i class='fa fa-arrow-right fa-2x' aria-hidden='true'></i>"],*/
            nav:true,
            responsive:{
                0:{
                    item:1
                },
                600:{
                    item:3
                },
                1000:{
                    item:5
                }
            }
        });
    });

</script>