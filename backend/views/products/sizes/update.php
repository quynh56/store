<?php
require_once 'helpers/Helper.php';
?>
<?php
    echo "<pre>";
    print_r($POST);
    echo "</pre>";
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-4">
            <h5>Tên sản phẩm</h5>
            <img src="assets/uploads/<?php echo $size['product_avatar']?>" alt="<?php echo $size['product_name']?>" width="60px">
            <span><?php echo $size['product_name']?></span>
        </div>
        <div class="form-group col-md-4">
            <label for="lengths">Chiều dài clothings/shoes</label>
            <input type="type" pattern="[0-9.]+" name="lengths" id="lengths" class="form-control" value="<?php
            echo isset($_POST['lengths'])?$_POST['lengths']:$size['lengths'];
            ?>">
        </div>
        <div class="col-4">
            <label for="size_name">Size</label>
            <input type="text" name="size_name" id="size_name" class="form-control" value="<?php echo isset($_POST['size_name'])?$_POST['size_name']:$size['size_name']?>" >
        </div>
    </div>
 <div>
<!--     --><?php
//     $product_slug=Helper::getSlug($size['category_name']);
//     $string=$product_slug;
//     $null=NUll;
//     function initials($str){
//         $rets='';
//         foreach (explode('-',$str) as $word){
//             $rets .=$word[0];
//             $rets =strtoupper($rets);
//         }
//         return $rets;
//     }
//     $dress=['A','V','D','S'];
//     $trouser=['Q','C'];
//     $initials =initials($string)[0];
//
//     //    echo $initials;
//     ?>
<!--     --><?php
//     if(in_array($initials,$dress)):
//         ?>
<!--         <div id="dress" class="row form=group tab-content">-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="shoulder">Vai</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="shoulder" id="shoulder" class="form-control" value="--><?php
//                 echo isset($_POST['shoulder'])?$_POST['shoulder']:$size['shoulder'];
//                 ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="size_1">Ngực</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="size_1" class="form-control" id="size_1" value="--><?php
//                 echo isset($_POST['size_1'])?$_POST['size_1']:$size['size_1'];
//                 ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="lengths">Chiều dài</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="lengths" id="lengths" class="form-control" value="--><?php
//                 echo isset($_POST['lengths'])?$_POST['lengths']:$size['lengths'];
//                 ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="hand_length">Chiều dài tay</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="hand_length" class="form-control" id="hand_length" value="--><?php
//                 echo isset($_POST['hand_length'])?$_POST['hand_length']:$size['hand_length'];
//                 ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="bice_length">Chiều dài bắp tay</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="bice_length" id="bice_length" class="form-control" value="--><?php
//                 echo isset($_POST['bice_length'])?$_POST['bice_length']:$size['bice_length']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="waist_length">Chiều dài thắt lưng</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="waist_length" id="waist_length" class="form-control" value="--><?php
//                 echo isset($_POST['waist_length'])?$_POST['waist_length']:$size['waist_length']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="cuff">Cổ tay áo</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="cuff" id="cuff" class="form-control" value="--><?php //echo isset($_POST['cuff'])?$_POST['cuff']:$size['cuff']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="size_2">Kích thước vòng eo</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="size_2" class="form-control" id="size_2" value="--><?php //echo isset($_POST['size_2'])?$_POST['size_2']:$size['size_2']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="size_3">Kích thước mông</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="size_3" class="form-control" id="size_3" value="--><?php //echo isset($_POST['size_3'])?$_POST['size_3']:$size['size_3']; ?><!--">-->
<!--             </div>-->
<!---->
<!--         </div>-->
<!--     --><?php
//     elseif (in_array($initials,$trouser)):
//         ?>
<!--         <div id="trouser" class="form-group row tab-content">-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="size_2">Kích thước vòng eo</label>-->
<!--                 <input type="type" name="size_2" pattern="[0-9.]+" class="form-control" id="size_2" value="--><?php //echo isset($_POST['size_2'])?$_POST['size_2']:$size['size_2']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="size_3">Kích thước mông</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="size_3" class="form-control" id="size_3" value="--><?php //echo isset($_POST['size_3'])?$_POST['size_3']:$size['size_3']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="lengths">Chiều dài</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="lengths" id="lengths" class="form-control" value="--><?php
//                 echo isset($_POST['lengths'])?$_POST['lengths']:$size['lengths'];
//                 ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="femoral">Đùi</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="femoral" class="form-control" id="femoral"  value="--><?php //echo isset($_POST['femoral'])?$_POST['femoral']:$size['femoral']; ?><!--">-->
<!--             </div>-->
<!--         </div>-->
<!--     --><?php
//     else:
//         ?>
<!--         <div id="shoes" class="form-group row tab-content">-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="axle_height">Chiều cao của giày</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="axle_height" class="form-control" id="axle_height"  value="--><?php //echo isset($_POST['axle_height'])?$_POST['axle_height']:$size['axle_height']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="lengths">Chiều dài trong giày</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="lengths" id="lengths" class="form-control"  value="--><?php //echo isset($_POST['lengths'])?$_POST['lengths']:$size['lengths']; ?><!--">-->
<!--             </div>-->
<!--             <div class="form-group col-md-3">-->
<!--                 <label for="base_height">Chiều cao của gót giày</label>-->
<!--                 <input type="type" pattern="[0-9.]+" name="base_height" class="form-control" id="base_height"  value="--><?php //echo isset($_POST['base_height'])?$_POST['base_height']:$size['base_height']; ?><!--">-->
<!--             </div>-->
<!--         </div>-->
<!--     --><?php
//     endif;
     ?>
 </div>
    <div id="dress" class="row form=group tab-content">
        <div class="form-group col-md-3">
            <label for="shoulder">Vai</label>
            <input type="type" pattern="[0-9.]+" name="shoulder" id="shoulder" class="form-control" value="<?php
            echo isset($_POST['shoulder'])?$_POST['shoulder']:$size['shoulder'];
            ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="size_1">Ngực</label>
            <input type="type" pattern="[0-9.]+" name="size_1" class="form-control" id="size_1" value="<?php
            echo isset($_POST['size_1'])?$_POST['size_1']:$size['size_1'];
            ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="hand_length">Chiều dài tay</label>
            <input type="type" pattern="[0-9.]+" name="hand_length" class="form-control" id="hand_length" value="<?php
            echo isset($_POST['hand_length'])?$_POST['hand_length']:$size['hand_length'];
            ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="bice_length">Chiều dài bắp tay</label>
            <input type="type" pattern="[0-9.]+" name="bice_length" id="bice_length" class="form-control" value="<?php
            echo isset($_POST['bice_length'])?$_POST['bice_length']:$size['bice_length']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="waist_length">Chiều dài thắt lưng</label>
            <input type="type" pattern="[0-9.]+" name="waist_length" id="waist_length" class="form-control" value="<?php
            echo isset($_POST['waist_length'])?$_POST['waist_length']:$size['waist_length']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="cuff">Cổ tay áo</label>
            <input type="type" pattern="[0-9.]+" name="cuff" id="cuff" class="form-control" value="<?php echo isset($_POST['cuff'])?$_POST['cuff']:$size['cuff']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="size_2">Kích thước vòng eo</label>
            <input type="type" pattern="[0-9.]+" name="size_2" class="form-control" id="size_2" value="<?php echo isset($_POST['size_2'])?$_POST['size_2']:$size['size_2']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="size_3">Kích thước mông</label>
            <input type="type" pattern="[0-9.]+" name="size_3" class="form-control" id="size_3" value="<?php echo isset($_POST['size_3'])?$_POST['size_3']:$size['size_3']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="femoral">Đùi</label>
            <input type="type" pattern="[0-9.]+" name="femoral" class="form-control" id="femoral"  value="<?php echo isset($_POST['femoral'])?$_POST['femoral']:$size['femoral']; ?>">
        </div>
    </div>
    <h5>SHOES</h5>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="axle_height">Chiều cao từ cổ chân lên</label>
            <input type="type" pattern="[0-9.]+" name="axle_height" id="axle_height" class="form-control"  value="<?php echo isset($_POST['axle_height'])?$_POST['axle_height']:$size['axle_height']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="base_height">Chiều cao của gót giày</label>
            <input type="type" pattern="[0-9.]+" name="base_height" class="form-control" id="base_height"  value="<?php echo isset($_POST['base_height'])?$_POST['base_height']:$size['base_height']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-6">
            <label for="quality">Số lượng</label>
            <input type="number" name="quality" class="form-control" id="quality" value="<?php echo isset($_POST['quality'])?$_POST['quality']:$size['quality']?>" >
        </div>
        <div class="col-6">
            <?php
            $select_disable='';
            $select_active='';
            if($size['status']==0){
                $select_disable='selected';
            }else{
                $select_active='selected';
            }
            if(isset($_POST['status'])){
                switch ($_POST['status']){
                    case 0: $select_disable='selected';break;
                    case 1:$select_active='selected';break;
                }
            }
            ?>
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" <?php echo $select_disable?>>Disable</option>
                <option value="1" <?php echo $select_active?>>Active</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <a href="index.php?controller=size&action=index" class="btn btn-default">Back</a>
        <input type="submit" name="submit" class="btn btn-info" value="Save">

    </div>

</form>
