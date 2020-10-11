<?php
require_once "helpers/Helper.php";
echo "<pre>";
//print_r($category);
//print_r($_SESSION);
print_r($_GET);
echo "</pre>";

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="" method="post" id="myform">
                <div class="filter">
                    <div class="group-filter">
                        <h2 class="filter-title">Clothing</h2>
                        <div class="filter-option">
                            <ul>
                                <?php foreach ($categories as $cate):
                                    $category_name=$cate['name'];
                                    $categry_slug=Helper::getSlug($category_name);
                                    $category_id=$cate['id'];
                                    $url_category="showList/$categry_slug/$category_id";
                                    $checked='';
                                    if(isset($_POST['category'])){
                                        if(in_array($cate['id'],$_POST['category'])){
                                            $checked='checked';
                                        }
                                    }
                                    ?>
                                    <?php if($cate['type_product']==0 &&$cate['type']==0):?>
                                    <?php if ($cate['parent_id']!=0):?>
                                        <li>
                                            <a href="<?php echo $url_category?>"><?php echo $cate['name']?></a>
                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <!--                    --><?php //else:?>
                    <div class="group-filter">
                        <h2 class="filter-title">Accessories</h2>
                        <div class="filter-option">
                            <ul>
                                <?php foreach ($categories as $cate):
                                    $category_name=$cate['name'];
                                    $categry_slug=Helper::getSlug($category_name);
                                    $category_id=$cate['id'];
                                    $url_category="showList/$categry_slug/$category_id";?>
                                    <?php if($cate['type_product']==1&&$cate['type']==0):?>
                                    <?php if ($cate['parent_id']!=0):?>
                                        <li>
                                            <a href="<?php echo $url_category?>"><?php echo $cate['name']?></a>
                                        </li>
                                    <?php endif;?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>

<!--                    <div class="group-filter">-->
<!--                        <h2 class="filter-title">Color </h2>-->
<!--                        <div class="filter-option">-->
<!--                            <ul>-->
<!--                                <li id="clBlack"><span class="choose-color black"></span>Đen <span class="counter"></span></li>-->
<!--                                <li id="clBeige"><span class="choose-color beige"></span> Be <span class="counter"></span></li>-->
<!--                                <li id="clBlue"><span class="choose-color blue"></span> Xanh <span class="counter"></span></li>-->
<!--                                <li id="clWhite"><span class="choose-color white"></span> Trắng <span class="counter"></span></li>-->
<!--                                <li id="clOrange"><span class="choose-color orange"></span> Cam <span class="counter"></span></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="group-filter">
<!--                        <h2 class="filter-title">Size</h2>-->
<!--                        <div class="filter-option">-->
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    <input type="checkbox" id="size S" name="size[]">-->
<!--                                    <label for="size S" class="check-content">size S <span class="counter"></span></label>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <input type="checkbox" id="size M" name="size[]">-->
<!--                                    <label for="size M" class="check-content">size M <span class="counter"></span></label>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <input type="checkbox" id="size L" name="size[]">-->
<!--                                    <label for="size L" class="check-content">size L <span class="counter"></span></label>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
                    </div>
                    <div class="group-filter">
                        <h2 class="filter-title">Price</h2>
                        <div class="filter-option">
                            <ul>
                                <?php
                                $checked_price1='';
                                $checked_price2='';
                                $checked_price3='';
                                if(isset($_POST['price'])){
                                    switch ($_POST['price']){
                                        case 1:$checked_price1='checked';break;
                                        case 2:$checked_price2='checked';break;
                                        case 3:$checked_price3='checked';break;
                                    }

                                }
                                ?>
                                <li>
                                    <input type="radio" name="price"  id="price 200" value="1" <?php echo $checked_price1?>>
                                    <label class="radio-content" for="price 200">0-200.000đ <span class="counter"></span> </label>
                                </li>
                                <li>
                                    <input type="radio" name="price" id="price 500" value="2" <?php echo $checked_price2?>>
                                    <label class="radio-content" for="price 500">200.000đ-500.000đ<span class="counter"></span></label>
                                </li>
                                <li>
                                    <input type="radio" name="price" id="price more" value="3" <?php echo $checked_price2?>>
                                    <label class="radio-content" for="price more"> >500.000đ<span class="counter"></span></label>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="filter" value="filter" class="btn btn-info">
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="col-md-9 order-1 order-lg-2">
            <div class="product-list">
                <div class="row">
                    <?php
                    echo "<pre>";
                    //                    print_r($category);
                    echo "</pre>";
                    foreach ($products as $product):
                        echo "<pre>";
//                    print_r($product);
                        echo "</pre>";
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
                                                <a href="login" title="giỏ hàng"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-md-12">
                <nav class="blog-pagination justify-content-center d-flex">
                    <?php
                    echo $pages;
                    ?>
                </nav>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        function filter_data(){
            $('.filter_data').html('<div id="loading" style=""></div>');
            var action='fetch_data';
            var minimum_price=$('#hidden_minimum_price').val();
            var maximum_price=$('#hidden_maximum_price').val();
            var brand=get_filter('brand');
            var ram=get_filter('ram');
            var storage=get_filter('storage');
            $.ajax({
                url:"fetch_data.php";
                method="POST";
                data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,brand:brand,
                ram:ram,storage:storage},
            success:function(data){
                    $('.filter_data').html(data);
            }
            });

        }
        function get_filter(class_name){
            var filter=[];
            $('.'+#class_name+':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }
    })
</script>