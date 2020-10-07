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
                <div class="detail-color">
                    <div class="detail-title">Màu sắc:
<!--                        <span class="color-product color-gray"> --><?php //echo $color['name']?><!--</span>-->
                        <?php
                        foreach ($colors as $color):
                            if($color['product_id']==$product['id']&&$product['id']==$_GET['id']):
                                ?>
                                <div class="img-option">
                                    <div class="color-intro">
                                        <div class="color-inner">
                                            <img src="../backend/assets/uploads/<?php echo $color['avatar']?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>

                </div>
                <div class="detail-size">
                    <h2 class="detail-title">Kích thước <span class="message-red">Xin vui lòng chọn kích thước</span></h2>
                    <div class="size-option">
                        <?php
                        foreach ($sizes as  $size):
                            if($size['product_id']==$product['id']&& $product['id']==$_GET['id']):
                                ?>
                                <div class="size-intro">
<!--                                    <a href="--><?php //echo $size['id']?><!--" class="title-size">--><?php //echo $size['size_name']?><!--</a>-->
<!--                                    <button class="title-size" type="submit" name="--><?php //echo $size['id']?><!--">--><?php //echo $size['size_name']?><!--</button>-->
                                    <span class="title-size"><?php echo $size['name']?></span>
                                    <div class="size-intro-hover">
                                        <h3 class="sizeContent-title">Kích thước sản phẩm</h3>
                                        <ul class="product-intro-list">
                                            <?php if($product['type']==0):?>
                                                <?php if($size['size_1']>0 && $size['size_1']!=$null):?>
                                                    <li>Ngực: <span class="color-number"><?php echo $size['size_1'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['size_2']>0 && $size['size_2']!=$null):?>
                                                    <li>Kích thước vòng eo: <span class="color-number"><?php echo $size['size_2'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['size_3']>0 && $size['size_3']!=$null):?>
                                                    <li>Kích thước mông: <span class="color-number"><?php echo $size['size_3'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['lengths']>0 && $size['lengths']!=$null):?>
                                                    <li>Chiều dài: <span class="color-number"><?php echo $size['lengths'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['hand_length']>0 && $size['hand_length']!=$null):?>
                                                    <li>Chiều dài tay: <span class="color-number"><?php echo $size['hand_length'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['waist_length']>0 &&$size['waist_length']!=$null):?>
                                                    <li>Chiều dài thắt lưng: <span class="color-number"><?php echo $size['waist_length'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['bice_length']>0 && $size['bice_length']!=$null):?>
                                                    <li>Chiều dài bắp tay: <span class="color-number"><?php echo $size['bice_length'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['shoulder']>0 && $size['shoulder']!=$null):?>
                                                    <li>Vai: <span class="color-number"><?php echo $size['shoulder'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['cuff']>0 &&$size['cuff']!=$null):?>
                                                    <li>Cổ tay áo: <span class="color-number"><?php echo $size['cuff'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['femoral']>0 &&$size['femoral']!=$null):?>
                                                    <li>Đùi: <span class="color-number"><?php echo $size['femoral'] ?>cm</span></li>
                                                <?php endif;?>
                                            <?php elseif ($product['type']==1):?>
                                                <?php if($size['lengths']>0 &&$size['lengths']!=$null):?>
                                                    <li>Chiều dài chân: <span class="color-number"><?php echo $size['lengths'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['base_height']>0 &&$size['base_height']!=$null):?>
                                                    <li>Chiều cao gót: <span class="color-number"><?php echo $size['base_height'] ?>cm</span></li>
                                                <?php endif;?>
                                                <?php if($size['axle_height']>0 &&$size['axle_height']!=$null):?>
                                                    <li>Chiều cao của giày: <span class="color-number"><?php echo $size['axle_height'] ?>cm</span></li>
                                                <?php endif;?>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="size-guideline">
                        <span class="size-title">Hướng dẫn kích thước</span>
                        <div class="sizeGuideline-detail" id="sizeGuideline">
                            <div class="model-content">
                                <div class="model-main">
                                    <div class="size-header">
                                        <span class="close">&times;</span>
                                        <h2 class="title-size">Biểu đồ kích thước</h2>
                                    </div>
                                    <div class="size-content">
                                        <button type="button" class="btnsize btnsize1" onclick="OpenSizeMini(event,'cm')" id="defaultOpen">CM</button>
                                        <button type="button" class="btnsize btnsize1" onclick="OpenSizeMini(event, 'inch')">INCH</button>
                                        <div class="size-table">
                                            <table id="cm" class="myTable1">
                                                <tr class="table-tr">
                                                    <td>Kích thước</td>
                                                    <?php foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):?>
                                                            <td><?php echo $size['name']?></td>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size7=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['shoulder']>0&&$size['shoulder']!=$null):
                                                            $count_size7++;
                                                            ?>
                                                            <?php if ($count_size7==1):?>
                                                            <td>Vai</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['shoulder']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size1=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_1']>0&&$size['size_1']!=$null):
                                                            $count_size1++;
                                                            ?>
                                                            <?php if ($count_size1==1):?>
                                                            <td>Ngực</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['size_1']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size2=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_2']>0&&$size['size_2']!=$null):
                                                            $count_size2++;
                                                            ?>
                                                            <?php if ($count_size2==1):?>
                                                            <td>Kích thước vòng eo</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['size_2']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size3=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_3']>0&&$size['size_3']!=$null):
                                                            $count_size3++;
                                                            ?>
                                                            <?php if ($count_size3==1):?>
                                                            <td>Kích thước mông</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['size_3']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size4=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['hand_length']>0&&$size['hand_length']!=$null):
                                                            $count_size4++;
                                                            ?>
                                                            <?php if ($count_size4==1):?>
                                                            <td>Chiều dài tay </td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['hand_length']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size6=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['bice_length']>0&&$size['bice_length']!=$null):
                                                            $count_size6++;
                                                            ?>
                                                            <?php if ($count_size6==1):?>
                                                            <td>Chiều dài bắp tay</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['bice_length']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size8=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['cuff']>0&&$size['cuff']!=$null):
                                                            $count_size8++;
                                                            ?>
                                                            <?php if ($count_size8==1):?>
                                                            <td>Cổ tay áo</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['cuff']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size10=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['waist_length']>0&&$size['waist_length']!=$null):
                                                            $count_size10++;
                                                            ?>
                                                            <?php if ($count_size10==1):?>
                                                            <td>Chiều dài thắt lưng</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['waist_length']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size9=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['femoral']>0&&$size['femoral']!=$null):
                                                            $count_size9++;
                                                            ?>
                                                            <?php if ($count_size9==1):?>
                                                            <td>Đùi</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['femoral']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size11=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['base_height']>0&&$size['base_height']!=$null):
                                                            $count_size11++;
                                                            ?>
                                                            <?php if ($count_size11==1):?>
                                                            <td>Chiều cao gót</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['base_height']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size12=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['axle_height']>0&&$size['axle_height']!=$null):
                                                            $count_size12++;
                                                            ?>
                                                            <?php if ($count_size12==1):?>
                                                            <td>Chiều cao của giày</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['axle_height']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size5=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['lengths']>0&&$size['lengths']!=$null):
                                                            $count_size5++;
                                                            ?>
                                                            <?php if ($count_size5==1):?>
                                                            <td>Chiều dài</td>
                                                        <?php endif;?>
                                                            <td><?php echo $size['lengths']?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>

                                            </table>
                                            <table id="inch" class="myTable1">
                                                <tr class="table-tr">
                                                    <td>Kích thước</td>
                                                    <?php foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):?>
                                                            <td><?php echo $size['name']?></td>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size7=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['shoulder']>0&&$size['shoulder']!=$null):
                                                            $count_size7++;
                                                            ?>
                                                            <?php if ($count_size7==1):?>
                                                            <td>Vai</td>
                                                        <?php endif;?>
                                                            <td><?php
                                                                $size= $size['shoulder']/2.54;
                                                                $size=round($size,1);
                                                                echo $size;
                                                                ?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size1=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_1']>0&&$size['size_1']!=$null):
                                                            $count_size1++;
                                                            ?>
                                                            <?php if ($count_size1==1):?>
                                                            <td>Ngực</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['size_1']/2.54, 1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size2=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_2']>0&&$size['size_2']!=$null):
                                                            $count_size2++;
                                                            ?>
                                                            <?php if ($count_size2==1):?>
                                                            <td>Kích thước vòng eo</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['size_2']/2.54, 1);?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size3=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['size_3']>0&&$size['size_3']!=$null):
                                                            $count_size3++;
                                                            ?>
                                                            <?php if ($count_size3==1):?>
                                                            <td>Kích thước mông</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['size_3']/2.54, 1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size4=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['hand_length']>0&&$size['hand_length']!=$null):
                                                            $count_size4++;
                                                            ?>
                                                            <?php if ($count_size4==1):?>
                                                            <td>Chiều dài tay </td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['hand_length']/2.54, 1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size6=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['bice_length']>0&&$size['bice_length']!=$null):
                                                            $count_size6++;
                                                            ?>
                                                            <?php if ($count_size6==1):?>
                                                            <td>Chiều dài bắp tay</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['bice_length']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size8=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['cuff']>0&&$size['cuff']!=$null):
                                                            $count_size8++;
                                                            ?>
                                                            <?php if ($count_size8==1):?>
                                                            <td>Cổ tay áo</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['cuff']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size10=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['waist_length']>0&&$size['waist_length']!=$null):
                                                            $count_size10++;
                                                            ?>
                                                            <?php if ($count_size10==1):?>
                                                            <td>Chiều dài thắt lưng</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['waist_length']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size9=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['femoral']>0&&$size['femoral']!=$null):
                                                            $count_size9++;
                                                            ?>
                                                            <?php if ($count_size9==1):?>
                                                            <td>Đùi</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['femoral']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size11=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['base_height']>0&&$size['base_height']!=$null):
                                                            $count_size11++;
                                                            ?>
                                                            <?php if ($count_size11==1):?>
                                                            <td>Chiều cao gót</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['base_height']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size12=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['axle_height']>0&&$size['axle_height']!=$null):
                                                            $count_size12++;
                                                            ?>
                                                            <?php if ($count_size12==1):?>
                                                            <td>Chiều cao của giày</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['axle_height']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>
                                                <tr class="table-tr">
                                                    <?php $count_size5=0; foreach ($sizes as $size):?>
                                                        <?php if($size['product_id']==$product['id']):
                                                            ?>
                                                            <?php if ($size['lengths']>0&&$size['lengths']!=$null):
                                                            $count_size5++;
                                                            ?>
                                                            <?php if ($count_size5==1):?>
                                                            <td>Chiều dài</td>
                                                        <?php endif;?>
                                                            <td><?php echo round($size['lengths']/2.54,1)?></td>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="size-normal">
                                            <h3 >Cách đo</h3>
                                            <p class="description">Biểu đồ kích thước này dành cho mục đích tham khảo. Lưu ý rắng kích thước sẽ
                                                khác nhau giữa các thương hiệu</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="../images/size.png" alt="">
                                            </div>
                                            <div class="col-md-7 margin">
                                                <div class="group-2">
                                                    <h3><span class="circle">1</span> Vòng eo</h3>
                                                    <p class="description">Đảm bảo băng đo phù hợp khi bạn thoải mái đo khoảng phần hẹp nhất của vòng eo trong tình hình tự nhiên.</p>
                                                </div>
                                                <div class="group-2">
                                                    <h3><span class="circle">2</span> Vòng mông</h3>
                                                    <p class="description">Đứng với đôi chân của bạn với nhau, và đo quanh phần rộng nhất của hông của bạn.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                <div class="sizebody">
                    <h2 class="detail-title filter-title">Kích Thước & Phù hợp </h2>
                    <div class="size-content">
                        <button type="button" class="btnsize btnsize2" onclick="OpenSize(event,'cm2')" id="defaultOpen2">CM</button>
                        <button type="button" class="btnsize btnsize2" onclick="OpenSize(event,'inch2')">INCH</button>
                        <!-- <table>
                             <tr>
                                 <th>Kích thước</th>
                                 <th>XS</th>
                                 <th>S</th>
                                 <th>M</th>
                                 <th>L</th>
                                 <th>XL</th>
                             </tr>
                             <tr>
                                 <th>Vai</th>
                                 <td>57</td>
                                 <td>59</td>
                                 <td>61</td>
                                 <td>64</td>
                                 <td>67</td>
                             </tr>
                             <tr>
                                 <th>Ngực</th>
                                 <td>102</td>
                                 <td>106</td>
                                 <td>110</td>
                                 <td>116</td>
                                 <td>122</td>
                             </tr>
                             <tr>
                                 <th>Kích thước vòng eo</th>
                                 <td>99</td>
                                 <td>103</td>
                                 <td>107</td>
                                 <td>113</td>
                                 <td>119</td>
                             </tr>
                             <tr>
                                 <th>Kích thước vòng mông</th>
                                 <td>99</td>
                                 <td>103</td>
                                 <td>107</td>
                                 <td>113</td>
                                 <td>119</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài tay</th>
                                 <td>50</td>
                                 <td>50.5</td>
                                 <td>51</td>
                                 <td>51.7</td>
                                 <td>52.4</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài</th>
                                 <td>83.5</td>
                                 <td>85</td>
                                 <td>86.5</td>
                                 <td>88.7</td>
                                 <td>90.9</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài bắp tay</th>
                                 <td>41</td>
                                 <td>42</td>
                                 <td>43</td>
                                 <td>44.5</td>
                                 <td>46</td>
                             </tr>
                             <tr>
                                 <th>Cổ tay áo</th>
                                 <td>18</td>
                                 <td>19</td>
                                 <td>20</td>
                                 <td>21.5</td>
                                 <td>23</td>
                             </tr>
                         </table>
                         <table>
                             <tr>
                                 <th>Kích thước</th>
                                 <th>XS</th>
                                 <th>S</th>
                                 <th>M</th>
                                 <th>L</th>
                                 <th>XL</th>
                             </tr>
                             <tr>
                                 <th>Vai</th>
                                 <td>22.4</td>
                                 <td>23.2</td>
                                 <td>24</td>
                                 <td>25.2</td>
                                 <td>66.4</td>
                             </tr>
                             <tr>
                                 <th>Ngực</th>
                                 <td>40.2</td>
                                 <td>41.7</td>
                                 <td>43.3</td>
                                 <td>45.7</td>
                                 <td>48</td>
                             </tr>
                             <tr>
                                 <th>Kích thước vòng eo</th>
                                 <td>39</td>
                                 <td>40.6</td>
                                 <td>42.1</td>
                                 <td>44.5</td>
                                 <td>46.9</td>
                             </tr>
                             <tr>
                                 <th>Kích thước vòng mông</th>
                                 <td>39</td>
                                 <td>40.6</td>
                                 <td>42.1</td>
                                 <td>44.5</td>
                                 <td>46.9</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài tay</th>
                                 <td>19.7</td>
                                 <td>19.9</td>
                                 <td>20.1</td>
                                 <td>20.4</td>
                                 <td>20.6</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài</th>
                                 <td>32.9</td>
                                 <td>33.5</td>
                                 <td>34.1</td>
                                 <td>34.9</td>
                                 <td>35.8</td>
                             </tr>
                             <tr>
                                 <th>Chiều dài bắp tay</th>
                                 <td>16.1</td>
                                 <td>16.5</td>
                                 <td>16.9</td>
                                 <td>17.5</td>
                                 <td>18.1</td>
                             </tr>
                             <tr>
                                 <th>Cổ tay áo</th>
                                 <td>7.1</td>
                                 <td>7.5</td>
                                 <td>7.9</td>
                                 <td>8.5</td>
                                 <td>9.1</td>
                             </tr>
                         </table>-->
                        <div class="size-table">
                            <table id="cm2" class="myTable2">
                                    <tr class="table-tr">
                                        <td>Kích thước</td>
                                        <?php foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):?>
                                                <td><?php echo $size['name']?></td>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size7=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['shoulder']>0&&$size['shoulder']!=$null):
                                                $count_size7++;
                                                ?>
                                                <?php if ($count_size7==1):?>
                                                <td>Vai</td>
                                            <?php endif;?>
                                                <td><?php echo $size['shoulder']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size1=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['size_1']>0&&$size['size_1']!=$null):
                                                $count_size1++;
                                                ?>
                                                <?php if ($count_size1==1):?>
                                                <td>Ngực</td>
                                            <?php endif;?>
                                                <td><?php echo $size['size_1']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size2=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['size_2']>0&&$size['size_2']!=$null):
                                                $count_size2++;
                                                ?>
                                                <?php if ($count_size2==1):?>
                                                <td>Kích thước vòng eo</td>
                                            <?php endif;?>
                                                <td><?php echo $size['size_2']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size3=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['size_3']>0&&$size['size_3']!=$null):
                                                $count_size3++;
                                                ?>
                                                <?php if ($count_size3==1):?>
                                                <td>Kích thước mông</td>
                                            <?php endif;?>
                                                <td><?php echo $size['size_3']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size4=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['hand_length']>0&&$size['hand_length']!=$null):
                                                $count_size4++;
                                                ?>
                                                <?php if ($count_size4==1):?>
                                                <td>Chiều dài tay </td>
                                            <?php endif;?>
                                                <td><?php echo $size['hand_length']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size6=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['bice_length']>0&&$size['bice_length']!=$null):
                                                $count_size6++;
                                                ?>
                                                <?php if ($count_size6==1):?>
                                                <td>Chiều dài bắp tay</td>
                                            <?php endif;?>
                                                <td><?php echo $size['bice_length']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size8=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['cuff']>0&&$size['cuff']!=$null):
                                                $count_size8++;
                                                ?>
                                                <?php if ($count_size8==1):?>
                                                <td>Cổ tay áo</td>
                                            <?php endif;?>
                                                <td><?php echo $size['cuff']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size10=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['waist_length']>0&&$size['waist_length']!=$null):
                                                $count_size10++;
                                                ?>
                                                <?php if ($count_size10==1):?>
                                                <td>Chiều dài thắt lưng</td>
                                            <?php endif;?>
                                                <td><?php echo $size['waist_length']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size9=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['femoral']>0&&$size['femoral']!=$null):
                                                $count_size9++;
                                                ?>
                                                <?php if ($count_size9==1):?>
                                                <td>Đùi</td>
                                            <?php endif;?>
                                                <td><?php echo $size['femoral']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size11=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['base_height']>0&&$size['base_height']!=$null):
                                                $count_size11++;
                                                ?>
                                                <?php if ($count_size11==1):?>
                                                <td>Chiều cao gót</td>
                                            <?php endif;?>
                                                <td><?php echo $size['base_height']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size12=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['axle_height']>0&&$size['axle_height']!=$null):
                                                $count_size12++;
                                                ?>
                                                <?php if ($count_size12==1):?>
                                                <td>Chiều cao của giày</td>
                                            <?php endif;?>
                                                <td><?php echo $size['axle_height']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr class="table-tr">
                                        <?php $count_size5=0; foreach ($sizes as $size):?>
                                            <?php if($size['product_id']==$product['id']):
                                                ?>
                                                <?php if ($size['lengths']>0&&$size['lengths']!=$null):
                                                $count_size5++;
                                                ?>
                                                <?php if ($count_size5==1):?>
                                                <td>Chiều dài</td>
                                            <?php endif;?>
                                                <td><?php echo $size['lengths']?></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </tr>

                            </table>
                            <table id="inch2" class="myTable2">
                                <tr class="table-tr">
                                    <td>Kích thước</td>
                                    <?php foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):?>
                                            <td><?php echo $size['name']?></td>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size7=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['shoulder']>0&&$size['shoulder']!=$null):
                                            $count_size7++;
                                            ?>
                                            <?php if ($count_size7==1):?>
                                            <td>Vai</td>
                                        <?php endif;?>
                                            <td><?php
                                                $size= $size['shoulder']/2.54;
                                                $size=round($size,1);
                                                echo $size;
                                            ?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size1=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['size_1']>0&&$size['size_1']!=$null):
                                            $count_size1++;
                                            ?>
                                            <?php if ($count_size1==1):?>
                                            <td>Ngực</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['size_1']/2.54, 1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size2=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['size_2']>0&&$size['size_2']!=$null):
                                            $count_size2++;
                                            ?>
                                            <?php if ($count_size2==1):?>
                                            <td>Kích thước vòng eo</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['size_2']/2.54, 1);?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size3=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['size_3']>0&&$size['size_3']!=$null):
                                            $count_size3++;
                                            ?>
                                            <?php if ($count_size3==1):?>
                                            <td>Kích thước mông</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['size_3']/2.54, 1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size4=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['hand_length']>0&&$size['hand_length']!=$null):
                                            $count_size4++;
                                            ?>
                                            <?php if ($count_size4==1):?>
                                            <td>Chiều dài tay </td>
                                        <?php endif;?>
                                            <td><?php echo round($size['hand_length']/2.54, 1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size6=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['bice_length']>0&&$size['bice_length']!=$null):
                                            $count_size6++;
                                            ?>
                                            <?php if ($count_size6==1):?>
                                            <td>Chiều dài bắp tay</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['bice_length']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size8=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['cuff']>0&&$size['cuff']!=$null):
                                            $count_size8++;
                                            ?>
                                            <?php if ($count_size8==1):?>
                                            <td>Cổ tay áo</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['cuff']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size10=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['waist_length']>0&&$size['waist_length']!=$null):
                                            $count_size10++;
                                            ?>
                                            <?php if ($count_size10==1):?>
                                            <td>Chiều dài thắt lưng</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['waist_length']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size9=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['femoral']>0&&$size['femoral']!=$null):
                                            $count_size9++;
                                            ?>
                                            <?php if ($count_size9==1):?>
                                            <td>Đùi</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['femoral']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size11=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['base_height']>0&&$size['base_height']!=$null):
                                            $count_size11++;
                                            ?>
                                            <?php if ($count_size11==1):?>
                                            <td>Chiều cao gót</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['base_height']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size12=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['axle_height']>0&&$size['axle_height']!=$null):
                                            $count_size12++;
                                            ?>
                                            <?php if ($count_size12==1):?>
                                            <td>Chiều cao của giày</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['axle_height']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>
                                <tr class="table-tr">
                                    <?php $count_size5=0; foreach ($sizes as $size):?>
                                        <?php if($size['product_id']==$product['id']):
                                            ?>
                                            <?php if ($size['lengths']>0&&$size['lengths']!=$null):
                                            $count_size5++;
                                            ?>
                                            <?php if ($count_size5==1):?>
                                            <td>Chiều dài</td>
                                        <?php endif;?>
                                            <td><?php echo round($size['lengths']/2.54,1)?></td>
                                        <?php endif;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tr>

                            </table>
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
