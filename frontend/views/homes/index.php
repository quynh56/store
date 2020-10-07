<?php
require_once 'helpers/Helper.php';
        echo"<pre>";
//        print_r($slides);
        echo"</pre>";
echo"<pre>";
//print_r($_SESSION);
echo"</pre>";
?>

<div class="container-slide">
    <div class="carousel slide" data-ride="carousel" id="myCarousel">
        <div class="carousel-inner">
            <?php
            foreach ($slides as $slide):
                $product_title=$slide['product_name'];
                $product_slug=Helper::getSlug($product_title);
                $product_id=$slide['product_id'];
                $product_link="chi-tiet-san-pham/$product_slug/$product_id";
                ?>
                <?php if($slide['location']==0):?>
                <?php if ($slide['position']==0):?>
                    <div class="carousel-item active">
                        <a href="<?php echo $product_link?>"><img src="../backend/assets/uploads/<?php echo $slide['avatar']?>" alt="" ></a>
                    </div>
                <?php else:?>
                    <div class="carousel-item">
                        <a href="<?php echo $product_link?>"><img src="../backend/assets/uploads/<?php echo $slide['avatar']?>" alt="" ></a>
                    </div>
                <?php endif;?>
            <?php endif;?>
            <?php endforeach;?>
            <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#myCarousel" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <ol class="carousel-indicators" >
            <?php
            foreach ($slides as $slide):
                ?>
                <?php if($slide['location']==0):?>
                <li data-slide-to="<?php echo $slide['position']?>" data-target="#myCarousel" class="dot"></li>
            <?php endif;?>
            <?php endforeach;?>
        </ol>
    </div>
    <div class="container">
        <div class="new-item">
            <h2 class="title">New Item</h2>
            <div class="product-list">
                <div class="row">
                    <?php
                    foreach ($products as $product):
                        $product_title=$product['name'];
                        $product_slug=Helper::getSlug($product_title);
                        $product_id=$product['id'];
                        $product_link="chi-tiet-san-pham/$product_slug/$product_id";
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="<?php echo $product_link?>"><img src="../backend/assets/uploads/<?php echo $product['avatar']?>" alt=""></a>
                                    <?php if($product['sale'] >0):?>
                                        <div class="sale pp-sale">Sale <?php echo $product['sale']?>%</div>
                                    <?php endif;?>
                                    <div class="icon">
                                        <i class="fa fa-heart-o"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active">
                                            <?php if(isset($_SESSION['user'])):?>
                                            <a href="them-vao-gio-hang/<?php echo $product['id']?>" title="giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                            <?php else:?>
                                            <a href="login"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                            <?php endif;?>
                                        </li>
                                        <li class="quick-view"><a href="<?php echo $product_link?>" title="chi tiết sản phẩm">+ Quick View</a></li>
                                        <li class="w-icon"><a href="gio-hang-cua-ban" title="Mua ngay"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name"><?php echo $product['category_name']?></div>
                                    <h5><a href="<?php echo $product_link?>"><?php echo $product['name']?></a></h5>
                                    <div class="product-price">
                                        <a href="#">
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
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="assets/images/vay33.1.png">
                            <h2>Women’s</h2>
                            <a href="#">Discover More</a>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="filter-control">
                            <ul>
                                <li class="active">Clothings</li>
                                <li>Accessories</li>
                            </ul>
                        </div>
                        <div class="product-slider owl-carousel">
                            <?php foreach ($slides as $slide):
                                $product_title=$slide['product_name'];
                                $product_slug=Helper::getSlug($product_title);
                                $product_id=$slide['product_id'];
                                $product_detail_link="chi-tiet-san-pham/$product_slug/$product_id";
                                ?>
                                <?php if($slide['location']==1):
//                                echo"<pre>";
//                                print_r($slide);
//                                echo"</pre>";
                                ?>
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="<?php echo $product_detail_link?>"><img src="../backend/assets/uploads/<?php echo $slide['avatar']?>" alt=""></a>
                                        <?php if($slide['sale'] >0):?>
                                            <div class="sale">Sale <?php echo $slide['sale']?>%</div>
                                        <?php endif;?>
                                        <div class="icon">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active">
                                                <?php if(isset($_SESSION['user'])):?>
                                                    <a href="them-vao-gio-hang/<?php echo $product['id']?>" title="giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                <?php else:?>
                                                    <a href="login" title="giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                <?php endif;?>
                                            </li>
                                            <li class="quick-view"><a href="<?php echo $product_detail_link?>">+ Quick View</a></li>
                                            <li class="w-icon"><a href="gio-hang-cua-ban" title="payment"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $slide['category_name']?></div>
                                        <a href="#">
                                            <h5><?php echo $slide['product_name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <a href="#">
                                                <ul>
                                                    <?php if($slide['sale'] >0):?>
                                                        <li>
                                                            <?php
                                                            $sale=($slide['price']/100)*$slide['sale'];
                                                            $sale= ceil($sale);
                                                            $price_sale=$slide['price']-$sale;
                                                            echo number_format($price_sale);
                                                            ?>đ
                                                        </li>
                                                        <li class="discount"><?php echo number_format($slide['price'])?>đ</li>
                                                    <?php else:?>
                                                        <li><?php echo number_format($slide['price'])?>đ</li>
                                                    <?php endif;?>
                                                </ul>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="deal-of-week set-bg spad" data-setbg="assets/images/time-bg.jpg" >
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="assets/images/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="assets/images/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="assets/images/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
