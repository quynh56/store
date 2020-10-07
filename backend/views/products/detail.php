<?php
require_once "helpers/Helper.php";
?>
<style>
    .tab-content{
        display:none;
        opacity: 0;
    }
</style>
<div class="m-t-25 m-b-25">
    <h2 class="title-1 m-b-25">Chi tiết sản phẩm</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $product['id']?></td>
        </tr>
        <tr>
            <th>Category name</th>
            <td><?php echo $product['category_name']?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $product['name'] ?></td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td><?php
                if(!empty($product['avatar'])):?>
                    <img src="assets/uploads/<?php  echo $product['avatar']?>" alt="" width="70px" >
                <?php  endif;?>
            </td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?php echo number_format($product['price'])?>đ</td>
        </tr>
        <tr>
            <th>Sale</th>
            <td><?php echo $product['sale']?></td>
        </tr>
        <tr>
            <th>size</th>
            <td>
                <?php foreach ($sizes as $size):?>
               <?php if($product['id']==$size['product_id']): ?>
                    <button class="btn btn-info product_detail" title=""><?php echo $size['name']?></button>
                    <div class="tab-content">
                        <div class="m-t-25 m-b-25">
                            <h2 class="title-1 m-b-25">Chi tiết Size sản phẩm</h2>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo $size['id']?></td>
                                </tr>
                                <tr>
                                    <th>size</th>
                                    <td><?php echo $size['name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Ngực</th>
                                    <td><?php echo $size['size_1']?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Vai </th>
                                    <td><?php echo $size['shoulder'] ?></td>
                                </tr>
                                <tr>
                                    <th>chiều dài bắp tay</th>
                                    <td><?php echo $size['bice_length']?></td>
                                </tr>
                                <tr>
                                    <th>Chiều dài tay</th>
                                    <td><?php echo $size['hand_length']; ?></td>
                                </tr>
                                <tr>
                                    <th>Cổ tay áo</th>
                                    <td><?php echo $size['cuff']?></td>
                                </tr>
                                <tr>
                                    <th>chiều dài thắt lưng</th>
                                    <td><?php echo $size['waist_length']?></td>
                                </tr>
                                <tr>
                                    <th>chiều dài</th>
                                    <td><?php echo $size['lengths']?></td>
                                </tr>
                                <tr>
                                    <th>kích thước eo</th>
                                    <td><?php echo $size['size_2']; ?></td>
                                </tr>
                                <tr>
                                    <th>kích thước mông</th>
                                    <td><?php echo $size['size_3']?></td>
                                </tr>
                                <tr>
                                    <th>đùi</th>
                                    <td><?php echo $size['femoral']?></td>
                                </tr>
                                <tr>
                                    <th>Chiều cao giày</th>
                                    <td><?php echo $size['axle_height']; ?></td>
                                </tr>
                                <tr>
                                    <th>Chiều cao của gót giày</th>
                                    <td><?php echo $size['base_height']?></td>
                                </tr>
                                <tr>
                                    <th>Số lượng</th>
                                    <td><?php echo $size['quality'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?php echo Helper::getStatusText($size['status']) ?></td>
                                </tr>

                                <tr>
                                    <th>Created_at</th>
                                    <td>
                                        <?php echo date('d-m-Y H:i:s', strtotime($size['created_at'])); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Updated_at</th>
                                    <td>
                                        <?php echo date('d-m-Y H:i:s', strtotime($size['updated_at'])); ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endif;?>
                <?php endforeach;?>

            </td>
        </tr>
        <tr>
            <th>Color</th>
            <td>
<!--                --><?php //if(!empty($colors)):?>
                <?php foreach ($colors as $color):?>
                    <?php if($color['product_id']==$product['id']):?>
                        <button class="btn btn-info" onclick="showColor()"><?php echo $color['name']?></button>
                        <?php foreach ($images as $image):?>
                            <?php if ($color['id']==$image['color_id'] && $image['product_id']==$product['id']):?>
                                <div class="tab-content">
                                    <img src="assets/uploads/<?php echo $image['images']?>" alt="" width="60px">
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                <?php endforeach;?>
<!--                --><?php //else:?>
<!--                --><?php //endif;?>
            </td>
        </tr>
        <tr>
            <th>Images</th>
            <td>
                <?php foreach ($images as $image):?>
                    <?php if($image['product_id']==$product['id']):?>
                        <img src="assets/uploads/<?php echo $image['images']?>" alt="" width="60px">
                    <?php endif;?>
                <?php endforeach;?>
            </td>
        </tr>
        <tr>
            <th>Slide</th>
            <td>
               <table style="text-align: center">
                   <?php foreach ($slides as $slide):?>
                       <?php if($slide['product_id']==$product['id']):?>
                           <tr>
                               <th>Vị trí hiển thị trong slide</th>
                               <th>Vị trí slide trên trang</th>

                           </tr>
                           <tr>
                               <td><?php echo $slide['position']+1 ?></td>
                               <td>
                                   <?php
                                   if(isset($slide['location'])){
                                       switch ($slide['location']){
                                           case 0: echo "Top";break;
                                           case 1: echo "center";break;
                                           case 2:echo "bottom";break;
                                       }
                                   }
                                   ?>
                               </td>
                           </tr>
                       <?php endif;?>
                   <?php endforeach;?>
               </table>
            </td>
        </tr>
        <tr>
            <th>Content</th>
            <td><?php echo $product['content']; ?></td>
        </tr>
        <tr>
            <th>Type</th>
            <td><?php echo Helper::getTypeText($product['type'])?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo Helper::getStatusText($product['status'])?></td>
        </tr>
        <tr>
            <th>Created_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Updated_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($product['updated_at'])); ?>
            </td>
        </tr>
    </table>
    <a href="index.php?controller=product" class="btn btn-primary">Back</a>
</div>
<!--<script type="text/javascript">-->
<!--    var productDetail,i;-->
<!--    productDetail=document.getElementsByClassName("product_detail");-->
<!--    for(i=0;i<productDetail.length;i++){-->
<!--        productDetail[i].addEventListener("click",function () {-->
<!---->
<!--            this.classList.toggle("active");-->
<!--            var productOption = this.nextElementSibling;-->
<!--            if(productOption.style.display =="block"){-->
<!--                productOption.style.display ="none";-->
<!--                productOption.style.opacity ="0";-->
<!--            }else{-->
<!--                // filterOption.style.maxHeight += filterOption.scrollHeight+ "px";-->
<!--                productOption.style.display ="block";-->
<!--                productOption.style.opacity = "1";-->
<!--            }-->
<!--        })-->
<!--    }-->
<!--</script>-->