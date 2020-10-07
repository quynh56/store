<?php
/**
 * Created by PhpStorm.
 * User: Quynh Dang
 * Date: 7/31/2020
 * Time: 10:10 PM
 */
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
echo "<pre>";
//print_r($_SESSION);
echo "</pre>";
require_once 'helpers/Helper.php';
?>
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="home"><i class="fa fa-home"></i> Home</a>
                    <a href="danh-sach-san-pham">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($_SESSION['cart'])):?>
                    <form action="" method="post">
                        <div class="cart-table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th class="close-th"><i class="ti-close">&times;</i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total_cart=0;
                                foreach ($_SESSION['cart'] as $product_id => $cart):
                                $slug=Helper::getSlug($cart['name']);
                                $url_detail="chi-tiet-san-pham/$slug/$product_id";
                                ?>
                                <tr>
                                    <td class="cart-pic first-row">
                                        <a href="<?php echo $url_detail?>">
                                            <img src="../backend/assets/uploads/<?php echo $cart['avatar']?>" alt="<?php echo $cart['name']?>" >
                                        </a>
                                    </td>
                                    <td class="cart-title first-row">
                                        <a href="<?php echo  $url_detail?>" class="text-dark"><?php echo $cart['name']?></a>
                                    </td>
                                    <td class="p-price first-row">
                                        <div class="product-price">
                                            <?php if($cart['sale'] >0):?>
                                                <span class="text-dark font-weight-normal">
                                                    <?php
                                                    $sale=($cart['price']/100)*$cart['sale'];
                                                    $sale= ceil($sale);
                                                    $price_sale=$cart['price']-$sale;
                                                    echo number_format($price_sale);
                                                    ?>đ
                                                </span>
                                                <span class="discount"> <?php echo number_format($cart['price'])?>đ</span>
                                            <?php else:?>
                                                <span class="text-dark font-weight-normal"><?php echo number_format($cart['price'])?>đ</span>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="<?php echo $product_id?>" value="<?php echo $cart['quality']?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">
                                        <?php
                                        if($cart['sale']>0){
                                            $sale=($cart['price']/100)*$cart['sale'];
                                            $sale= ceil($sale);
                                            $price_sale=$cart['price']-$sale;
                                            $total_item =$price_sale*$cart['quality'];
                                        }
                                        else{

                                            $total_item=$cart['price']*$cart['quality'];
                                        }
                                        $total_cart +=$total_item;
                                        ?>
                                        <span><?php  echo number_format($total_item);?></span>
                                    </td>
                                    <td class="close-td first-row"><a href="xoa-san-pham/<?php echo $product_id?>" onclick="return confirm('Bạn có chắc bỏ <?php echo $cart['name']?> này')"><i class="ti-close">&times;</i></a></td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <a href="danh-sach-san-pham" class="primary-btn continue-shop">Continue shopping</a>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" name="submit" class="primary-btn up-cart" value="Update cart">
                                        </div>
                                    </div>


                                </div>
                                <div class="discount-coupon">
                                    <h6>Discount Codes</h6>
                                    <div class="coupon-form">
                                        <input type="text" placeholder="Enter your codes">
                                        <button  class="site-btn coupon-btn">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Subtotal <span><?php echo number_format($total_cart)?></span></li>
                                        <li class="cart-total">Total <span><?php echo number_format($total_cart)?></span></li>
                                    </ul>
                                    <a href="thanh-toan" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else:?>
                <h3>Giỏ hàng trống</h3>
                <?php endif;?>

            </form>
        </div>
    </div>
</section>