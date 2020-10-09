<?php
require_once "helpers/Helper.php";
echo "<pre>";
//print_r($_SESSION);
//print_r($product);
echo "</pre>";
?><?php
$product_slug=Helper::getSlug($product['category_name']);
$string=$product_slug;
$null=NUll;
function initials($str){
    $rets='';
    foreach (explode('-',$str) as $word){
        $rets .=$word[0];
        $rets =strtoupper($rets);
    }
    return $rets;
}
//$shoes=['G'];
//$dress=['V','D','S','A'];
//$trouser=['Q','C'];
$initials =initials($string);
?>
<div class="main mydetail">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
<!--                    //nếu click vào màu thì image chuyển sang image color-->
                    <div class="col-md-1 borderimg">
                        <div class="row">
                            <?php
                            $count=0;
                            foreach ($images as $image):
                                ?>
                                <?php if($product['id']==$image['product_id']):
                                $count++;
                                    ?>
                                    <?php if($count==1):?>
                                            <div class="column">
                                                <img src="../backend/assets/uploads/<?php echo $image['images']?>" alt="" class="opacityImg active" onclick="currentFunction(<?php echo $count?>)" onmousemove="currentFunction(<?php echo $count?>)">
                                            </div>
                                    <?php else:?>
                                            <div class="column">
                                                <img src="../backend/assets/uploads/<?php echo $image['images']?>" alt="" class="opacityImg" onclick="currentFunction(<?php echo $count?>)" onmousemove="currentFunction(<?php echo $count?>)">
                                            </div>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="mySlide">
                            <?php
                            $key=0;
                            foreach ($images as $image):?>
                                <?php if ($product['id']==$image['product_id']):
                                $key++;
                                ?>
                                   <?php if($key==1):?>
                                        <div class="slideImg" style="display: block">
                                            <div class="numbertext"><?php echo $key.'/'.$count?></div>
                                            <img src="../backend/assets/uploads/<?php echo $image['images']?>" alt="<?php echo $key?>" class="myImg">
                                        </div>
                                   <?php else:?>
                                        <div class="slideImg">
                                            <div class="numbertext"><?php echo $key.'/'.$count?></div>
                                            <img src="../backend/assets/uploads/<?php echo $image['images']?>" alt="<?php echo $key?>" class="myImg">
                                        </div>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach;?>
                            <span class="prev slideIcon" onclick="plusSlide(-1)">❮</span>
                            <span class="next slideIcon" onclick="plusSlide(1)">❯</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="detail-header">
                    <h2 class="titler"><?php echo $product['name']?></h2>
                    <p class="code-product">Mã SP: <?php echo $initials .'00'.$product['id'] ?> </p>
                    <div class="product-price">
                        <ul>
                            <?php if($product['sale'] >0):?>
                                <li>
                                    <?php
                                    $sale=($product['price']/100)*$product['sale'];
                                    $sale= ceil($sale);
                                    $price_sale=$product['price']-$sale;
                                    echo number_format($price_sale);
                                    ?>đ
                                </li>
                                <li class="discount"><?php echo number_format($product['price'])?>đ</li>
                            <?php else:?>
                                <li><?php echo number_format($product['price'])?>đ</li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
                <div class="detail-size">
                    <div class="size-guideline">
                        <a href="#" class="size-title">Hướng dẫn kích thước</a>

                    </div>
                    <a href="#">Kiểm tra kích thước của tôi</a>
                </div>
                <div class="addcart">
                    <?php if(isset($_SESSION['user'])):?>
                        <a href="them-vao-gio-hang/<?php echo $product['id']?>" title="giỏ hàng" class="detail-addcart">Thêm vào giỏ hàng</a>
                    <?php else:?>
                        <a href="login" title="giỏ hàng" class="detail-addcart">Thêm vào giỏ hàng</a>
                    <?php endif;?>
                </div>
                <div class="shipper">
                    <div class="shipper-content">
                        <div class="row product-intro-free">
                            <div class="col-md-1">
                                <p class="icon-text"><i class="fa fa-truck" aria-hidden="true"></i></p>
                            </div>
                            <div class="col-md-11">
                                <h2 class="detail-title">Miễn phí vận chuyển <span class="circle">?</span></h2>
                                <p class="description">Giao hàng miễn phí với mức giá cố định cho các đơn hàng trên 499.000 <sup>đ</sup></p>
                                <p class="time-ship">10-12 Business Days</p>
                            </div>
                        </div>
                        <div class="wrap-ship" id="priceShip">
                            <div class="model-content">
                                <div class="model-main">
                                    <div class="product-ship-title">
                                        <span class="close">&times;</span>
                                        <h2 class="detail-title">Phí vận chuyển</h2>
                                    </div>
                                    <div class="product-ship-content">
                                        <div class="product-ship_ship-to">
                                            <span>Vận chuyển đến:</span>
                                            <div class="address-component">
                                                <div class="address-content">
                                                    <div class="address-name">
                                                        <span class="title-country">Việt Nam</span>
                                                        <div class="provide-select">
                                                            Tỉnh
                                                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-ship-free">
                                            Giao hàng miễn phí tiêu chuẩn cho các đơn hàng trên 1.159.000₫
                                        </div>
                                        <div class="ship-table">
                                            <table>
                                                <tr>
                                                    <td>Phương pháp vận chuyển</td>
                                                    <td>Tùy chọn giao hàng</td>
                                                    <td>Chi phí vận chuyển</td>
                                                </tr>
                                                <tr>
                                                    <td>Giao Hàng Tiết Kiệm</td>
                                                    <td>10-12 ngày</td>
                                                    <td>0 <sup>đ</sup></td>
                                                </tr>
                                                <tr>
                                                    <td>Giao Hàng tiêu chuẩn</td>
                                                    <td>5-7 ngày</td>
                                                    <td>50.000 <sup>đ</sup></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="product-ship-more">
                                            <p>Thời Gian Nhận Hàng = Thời Gian Xử Lý + Thời Gian Vận Chuyển</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-intro-free">
                            <div class="col-md-1">
                                <p class="icon-text"><i class="fa fa-shield" aria-hidden="true"></i></p>
                            </div>
                            <div class="col-md-11">
                                <h2 class="detail-title">Chính sách hoàn trả <span class="circle">?</span></h2>
                                <p class="description">Tìm hiểu thêm</p>
                            </div>
                        </div>
                        <div class="wrap-ship" id="rule">
                            <div class="model-content">
                                <div class="model-main">
                                    <div class="product-ship-title">
                                        <span class="close">&times;</span>
                                        <h2 class="detail-title">Chính sách hoàn trả </h2>
                                    </div>
                                    <div class="product-ship-content">
                                        <p><strong>Đảm bảo của chúng tôi</strong> <br>
                                            Trả lại hoặc trao đổi trong vòng 30 ngày kể từ khi giao hàng</p>
                                        <div class="requirement">
                                            <p>Yêu cầu:</p>
                                            <p>1. Các mặt hàng nhận được trong vòng 30 ngày kể từ ngày giao hàng.</p>
                                            <p>2. Các mặt hàng nhận được không sử dụng, không bị hư hỏng và trong gói ban đầu.</p>
                                            <p>3. Phí vận chuyển trở lại được trả bởi người mua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-description">
                    <h2 class="detail-title filter-title">Miêu Tả</h2>
                    <div class="size-content">
                        <div class="row">
                            <div class="col-md-3">Phong cách:</div>
                            <div class="col-md-9">Boho</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Màu sắc:</div>
                            <div class="col-md-9">Trắng và hồng</div>
                        </div>
                        <div class="row" >
                            <div class="col-md-3">Kiểu mẫu:</div>
                            <div class="col-md-9">Họa tiết hoa</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Chiều dài:</div>
                            <div class="col-md-9">Long/ Chiều dài đầy đủ</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Kiểu:</div>
                            <div class="col-md-9">Một Line</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Chi tiết:</div>
                            <div class="col-md-9">Dây kéo</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Mùa:</div>
                            <div class="col-md-9">Mùa Xuân/ Mùa Hè/ Mùa Thu</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Vật liệu:</div>
                            <div class="col-md-9">Polyester</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Mỏng:</div>
                            <div class="col-md-9">Không</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Loại eo:</div>
                            <div class="col-md-9">Vòng eo cao</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-comment container">
        <h1 class="post-list-title">
            <a href="#" class="link-category-item">Bình luận</a>
        </h1>
<!--        <div class = "fb-comments" data-href = "https://www.facebook.com/GDTstore-100182508379392" data-numposts = "5" data-width = "" > </div>-->
<!--        <div id = "fb-root" > </ div> <script async Hoãn crossorigin = "nặc danh" src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce = "5MA1DgDN" > </script>-->
<!--        <div id="fb-root"></div>-->
<!--        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="cZgpxrKO"></script>-->
<!--        <div class="fb-comments" data-href="http://localhost/Front-End/GDTstore/frontend/index.php" data-numposts="" data-width="" width="100%"></div>-->

        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop " data-href="http://localhost/Front-End/GDTstore/frontend/index.php"
           width="100%" data-posts="5" data-width fb-xfbml-state="rendered" style="width: 100%;"  fb-iframe-plugin-query="app_id=&container_width=1270&height=100&href=http%3A%2F%2Flocalhost%2FFront-End%2FGDTstore%2Ffrontend%2Findex.php&locale=vi_VN&numposts=&sdk=joey&version=v8.0&width=">
            <span  style="vertical-align: bottom; width: 100%; height: 628px;">
                 <iframe name="f13a8d4776e7f38" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin"
                         title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true"
                                             allowfullscreen="true" scrolling="no" allow="encrypted-media"
                         src="https://www.facebook.com/v8.0/plugins/comments.php?app_id=&channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df27b8e7f17f735%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Fffa7181cf0605c%26relation%3Dparent.parent&container_width=1270&height=100&href=http%3A%2F%2Flocalhost%2FFront-End%2FGDTstore%2Ffrontend%2Findex.php&locale=vi_VN&numposts=&sdk=joey&version=v8.0&width="
                         style="border: none; visibility: visible; width: 100%; height: 628px;" class="">

                 </iframe>
            </span>
        </div>


                     <!--        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="https://sukien.net" data-width="100%"-->
<!--             data-numposts="5" fb-xfbml-state="rendered"-->
<!--             fb-iframe-plugin-query="app_id=462973804185893&amp;container_width=782&amp;height=100&amp;href=https%3A%2F%2Fsukien.net%2F&amp;locale=en_GB&amp;-->
<!--             numposts=5&amp;sdk=joey&amp;version=v3.3" style="width: 100%;">-->
<!--            <span style="vertical-align: bottom; width: 100%; height: 628px;">-->
<!--                <iframe name="f10eba2bdb4ca6" width="1000px" height="100px" data-testid="fb:comments Facebook Social Plugin"-->
<!--                        title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true"-->
<!--                        allowfullscreen="true" scrolling="no" allow="encrypted-media"-->
<!--                        src="https://www.facebook.com/v3.3/plugins/comments.php?app_id=462973804185893&amp;-->
<!--                        channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df23163aacdd2754%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A63342%252Ff2d27fa308fe5a4%26relation%3Dparent.parent&amp;-->
<!--                        container_width=782&amp;height=100&amp;href=https%3A%2F%2Fsukien.net%2F&amp;locale=en_GB&amp;numposts=5&amp;sdk=joey&amp;version=v3.3" style="border: none; visibility: visible; width: 100%; height: 628px;" class="">-->
<!---->
<!--                </iframe></span></div>-->
    </div>
</div>
