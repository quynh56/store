<?php
require_once "helpers/Helper.php";
        echo"<pre>";
        print_r($_SESSION);

//print_r($orders);
        echo "</pre>";
?>
<?php
if (!empty($_SESSION['user'])):
    $user=$_SESSION['user'];
    $fullname='';
    $fullname =$user['last_name'];
    $fullname .= ' '. $user['first_name'];
    ?>
<div class="container">
    <div class="row proceed-checkout ">
        <div class="col-6">
            <div class="container">
                <form action="" method="post">
                    <h3>Billing Address</h3>
                    <div class="form-group">
                        <label for="fullname"><i class="fa fa-user"></i> Full name</label>
                        <input type="text" id="fullname" name="fullname" value="<?php echo isset($_POST['name'])?$_POST['name']: $fullname ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']: '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adr"><i class="fa fa-address-card-o" aria-hidden="true"></i> Address</label>
                        <input type="text" id="adr" name="address" value="<?php echo isset($_POST['address'])? $_POST['address']:''?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mobile"><i class="fa fa-phone-square" aria-hidden="true"></i> Mobile</label>
                        <input type="number" id="city" name="mobile" value="<?php echo isset($_POST['mobile'])?$_POST['mobile']:'' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="note">Lời nhắn</label>
                        <textarea name="note" id="note" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <?php
                        $check_code='';
                        $check_ol='';
                        if(isset($_POST['method'])){
                            switch ($_POST['method']){
                                case 0:$check_ol='checked';break;
                                case 1:$check_code='checked';break;
                            }
                        }
                        ?>
                        <label>Chọn phương thức thanh toán</label>
                        <input type="radio" name="method" value="0" <?php echo $check_ol ?>/> Thanh toán trực tuyến <br />
                        <input type="radio" name="method" checked value="1" <?php echo $check_code?>/> COD (dựa vào địa chỉ của bạn) <br />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Continue to checkout" class="btn btn-info" name="submit">
                        <a href="gio-hang-cua-ban" class=" btn btn-dark">Cart</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="container">
                <h4>Cart </h4>
                <?php if (isset($_SESSION['cart'])):
                    ?>
                    <table class="table table-bordered">
                        <tbody>

                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $total=0;
                            foreach ($_SESSION['cart'] AS $product_id => $cart):
                            $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                            ?>
                            <tr>
                                <td>
                                    <?php if (!empty($cart['avatar'])): ?>
                                        <img class="product-avatar img-responsive"
                                             src="../backend/assets/uploads/<?php echo $cart['avatar']; ?>" width="60px"/>
                                    <?php endif; ?>
                                    <div class="content-product">
                                        <a href="<?php echo $product_link; ?>" class="content-product-a text-dark">
                                            <?php echo $cart['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                      <span class="product-amount">
                                          <?php echo $cart['quality']; ?>
                                      </span>
                                </td>
                                <td>
                                    <?php if($cart['sale'] >0):?>
                                        <span class="text-dark font-weight-normal">
                                            <?php
                                                $sale=($cart['price']/100)*$cart['sale'];
                                                $sale= ceil($sale);
                                                $price_sale=$cart['price']-$sale;
                                                echo number_format($price_sale,0,'.','.');
                                            ?>đ
                                        </span>
                                        <?php else:?>
                                            <span class="text-dark font-weight-normal"><?php echo number_format($cart['price'],0,'.','.')?>đ</span>
                                        <?php endif;?>
                                </td>
                                <td>
                                      <span class="product-price-payment">
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
                                           $total +=$total_item;
                                           ?>
                                          <?php echo number_format($total_item, 0, '.', '.') ?> đ
                                      </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr >
                            <td colspan="3" class="product-total">
                                <p class="font-weight-bold">Total:</p>
                            </td>
                            <td>
                                <span class="price text-yellow">
                                    <?php echo number_format($total, 0, '.', '.') ?> vnđ
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
