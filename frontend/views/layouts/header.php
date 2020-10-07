<?php
require_once "helpers/Helper.php";
echo "<pre>";
//print_r($_GET);
echo "</pre>";
?>
<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="row">
                <div class="col-md-3 col-4">
                    <div class="logo">
                        <a href="index.php"><img src="assets/images/logo-1.png" alt=""></a>
                        <!--<p class="logo-text"><span class="logo-title">GDT</span>Store</p>-->
                    </div>
                </div>
                <div class="col-md-4 col-4">
                    <form action="" method="get">
                        <div class="search">
                            <input type="hidden" name="controller" value="product" />
                            <input type="hidden" name="action" value="showAll" />
                            <input type="text" id="mySearch" name="search" placeholder="Search..." value="<?php echo isset($_GET['search'])?$_GET['search']:'' ?>">
                            <button type="submit" class="icon-search" ><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-4">
                    <div class="header-right row">
                        <div class="cart col-md-4">
                            <ul class="nav-right">
                                <li class="heart-icon">
                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i><span>1</span></a>
                                </li>
                                <li class="cart-icon">
                                    <?php if (!empty($_SESSION['cart'])):
                                        ?>
                                        <a href="gio-hang-cua-ban" ><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="cart-number"><?php echo count($_SESSION['cart']);?></span></a>
                                        <div class="cart-hover">
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                    <?php
                                                    foreach ($_SESSION['cart'] as $product_id =>$cart):?>
                                                    <?php if (strlen($product_id) <=3):?>
                                                            <tr>
                                                                <td class="si-pic"><img src="../backend/assets/uploads/<?php echo $cart['avatar']?>" alt="<?php echo $cart['name']?>"></td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <?php if($cart['sale'] > 0):?>
                                                                            <p><?php
                                                                                $sale=($cart['price']/100)*$cart['sale'];
                                                                                $sale= ceil($sale);
                                                                                $price_sale=$cart['price']-$sale;
                                                                                echo number_format($price_sale);
                                                                                ?> x <?php echo $cart['quality']?>
                                                                            </p>
                                                                        <?php else:?>
                                                                            <p><?php echo $cart['price']?> x <?php echo $cart['quality']?></p>
                                                                        <?php endif;?>
                                                                        <h6><?php echo $cart['name']?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <a href="xoa-san-pham/<?php echo $product_id?>" onclick="return confirm('Bạn có chắc bỏ <?php echo $cart['name']?> này')"><i>&times;</i></a>
                                                                </td>
                                                            </tr>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
<!--                                            <div class="select-total">-->
<!--                                                <span>total:</span>-->
<!--                                                <h5>920.000đ</h5>-->
<!--                                            </div>-->
                                            <div class="select-button">
                                                <a href="gio-hang-cua-ban" class="primary-btn view-card">VIEW CART</a>
                                                <a href="thanh-toan" class="primary-btn checkout-btn">CHECK OUT</a>
                                            </div>
                                        </div>
                                    <?php else:?>
                                         <a href="gio-hang-cua-ban" ><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                    <?php endif;?>

                                </li>
                            </ul>
                        </div>
                        <div class="log-in col-md-8 ">
                            <?php
                            if(empty($_SESSION['user'])):
                            ?>
                            <button class="dropdown Login"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Tài khoản</button>
                            <div class="btn-content">
                                <ul>
                                    <li class="Login"><a href="login">Đăng nhập</a></li>
                                    <li><a href="signup">Tạo tài khoản</a></li>
                                </ul>
                            </div>
                            <?php else:
                                $user=$_SESSION['user'];
                                $fullname='';
                                $fullname =$user['last_name'];
                                $fullname .= ' '. $user['first_name'];
                                ?>
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown user user-menu">
                                        <a href="" class="dropdown-toggle dropbtn" data-toggle="dropdown">
                                            <img src="../backend/assets/uploads/<?php echo $user['avatar']?>" alt="<?php echo $fullname?>" class="user-image"/>
<!--                                            <span class="hidden-xs">-->
                                            <?php echo $fullname?>
                                        </span>
                                        </a>
                                        <ul  class="dropdown-menu" >
                                            <li><a href="">Tài khoản của tôi</a></li>
                                            <li><a href="">Đơn mua</a></li>
                                            <li><a href="dang-xuat">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="myMenu" class="menu">
        <div class="container">
            <ul>
                <li><a href="home">Home</a></li>
                <?php
                function recursive($categories, $parent, &$newString){
                    if (count($categories) >0){
                        foreach ($categories as $key=>$category){
                            $category_name=$category['name'];
                            $categry_slug=Helper::getSlug($category_name);
                            $category_id=$category['id'];
                            $url_category="showList/$categry_slug/$category_id";
                            if ($category['parent_id']==$parent){
                                $category['name']='<a href='.$url_category.'>'.$category['name'].'</a>';
                                $newString .='<li>'.$category['name'];
                                $newString .='<ul class="menu-child">';
                                unset($categories[$key]);
                                $newParent=$category['id'];
                                recursive($categories, $newParent,$newString);
                                $newString .='</ul>';
                                $newString .='</li>';
                            }
                        }
                    }
                }
                recursive($categories,0,$newString);
                $newString =str_replace('<ul class="menu-child"></ul>','',$newString);
//                $newString =str_replace('</a><ul>','</a><ul class="menu-child">',$newString);
                echo $newString;
                ?>
                <li><a href="#">Contact</a></li>
            </ul>

        </div>
    </div>
    <!--<hr>-->
</div>