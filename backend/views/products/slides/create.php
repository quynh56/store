<?php require_once "helpers/Helper.php"?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-6">
            <h5>Tên sản phẩm</h5>
            <img src="assets/uploads/<?php echo $product['avatar']?>" alt="<?php echo $product['name']?>" width="60px">
            <span><?php echo $product['name']?></span>

        </div>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar">
    </div>
    <div class="form-group">
        <label for="position">Vị trí hiển thị slide</label>
        <?php
        $select_0='';
        $select_1='';
        $select_2='';
        $select_3='';
        $select_4='';
        if(isset($_POST['position'])){
            switch ($_POST['position']){
                case 0: $select_0='selected';break;
                case 1: $select_1='selected';break;
                case 2: $select_2='selected';break;
                case 3: $select_3='selected';break;
                case 4: $select_4='selected';break;
            }
        }
        ?>
        <select name="position" id="">
            <option value="0" <?php echo $select_0?>>1</option>
            <option value="1" <?php echo $select_1?>>2</option>
            <option value="2" <?php echo $select_2?>>3</option>
            <option value="3" <?php echo $select_3?>>4</option>
            <option value="4" <?php echo $select_4?>>5</option>
        </select>
    </div>
    <div class="form-group">
        <?php
        $select_top='';
        $select_center='';
        if(isset($_POST['status'])){
            switch ($_POST['status']){
                case 0: $select_top='selected';break;
                case 1:$select_center='selected';break;
            }
        }
        ?>
        <label for="location">Ví trí slide</label>
        <select name="location" id="location">
            <option value="0" <?php echo $select_top?>>Top</option>
            <option value="1" <?php echo $select_center?>>Center</option>
        </select>
    </div>
    <div class="form-group">
        <?php
        $select_disable='';
        $select_active='';
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
        <a href="index.php?controller=product" class="btn btn-default">Back</a>
        <input type="submit" name="submit" value="Save" class="btn btn-info">
    </div>
</form>