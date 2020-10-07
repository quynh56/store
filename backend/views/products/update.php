<?php
require_once "helpers/Helper.php";
?>
<div class="m-t-25 m-b-25">
    <h2 class="title-1 m-b-25">Update sản phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="tab">
            <div class="form-group">
                <label for="category_id">Chọn danh mục</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php
                    foreach ($categories as $category):
                        $category_slug=Helper::getSlug($category['name']);
                        $selected='';
                        if($category['id']==$product['category_id']){
                            $selected='selected';
                        }
                        if(isset($_POST['category_id'])&& $category['id']==$_POST['category_id']){
                            $selected='selected';
                        }
                        ?>
                        <option value="<?php echo $category['id']?>" <?php echo $selected?>><?php echo $category['name']?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nhập tên sản phẩm</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($_POST['name'])?$_POST['name']:$product['name']?>">

            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label> <br>
                <img width="100px" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                <input type="file" name="avatar" id="avatar" >


            </div>
            <div class="form-row form-group">
                <!--           <div class="col-4">-->
                <!--               <label for="product_code">Mã sản phẩm</label>-->
                <!--               <input type="text" id="product_code" name="product_code" class="form-control" value="-->
                <!--            --><?php
                //               $string=$category_slug;
                //               function initials($str){
                //                   $ret='';
                //                   foreach (explode('-',$str) as $word){
                //                       $ret .=$word[0];
                //                       $ret =strtoupper($ret);
                //                   }
                //                   return $ret;
                //               }
                //               echo initials($string)
                //               ?><!--">-->
                <!--           </div>-->
                <div class="col">
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>">
                </div>
                <div class="col">
                    <label for="sale">Sale</label>
                    <input type="number" name="sale" class="form-control" id="sale" value="<?php echo isset($_POST['sale']) ? $_POST['sale'] : $product['sale'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="description">nội dung sản phẩm</label>
                <textarea name="description" id="description" class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $product['content'] ?></textarea>
            </div>
            <!--           <div class="form-group">-->
            <!--               <label for="season">Mùa:</label> <br>-->
            <!--               <input type="checkbox" name="season[]" value="0"> Mùa xuân <br>-->
            <!--               <input type="checkbox" name="season[]" value="1"> Mùa hạ <br>-->
            <!--               <input type="checkbox" name="season[]" value="2"> Mùa thu <br>-->
            <!--               <input type="checkbox" name="season[]" value="3"> Mùa đông <br>-->
            <!--           </div>-->
            <div class="form-group">
                <?php
                $check_clothing='';
                $check_accessories='';
                if($product['type']==0){
                    $check_clothing='checked';
                }else{
                    $check_accessories='checked';
                }
                if(isset($_POST['type'])){
                    switch ($_POST['type']){
                        case 0: $check_clothing='checked';break;
                        case 1:$check_accessories='checked';break;
                    }
                }

                ?>
                <label for="">Type: </label>
                <input type="radio" name="type" value="0" <?php echo $check_clothing?>> Clothing
                <input type="radio" name="type" value="1" <?php echo $check_accessories?>> Accessories
            </div>
            <div class="form-group">
                <?php
                $select_disable='';
                $select_active='';
                if($product['status']==0){
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
            <div class="form-group">
                <a href="index.php?controller=product" class="btn btn-dark">Back</a>
                <input type="submit" name="submit" class="btn btn-info" value="Save">
            </div>
        </div>
    </form>

</div>
