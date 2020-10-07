<?php require_once "helpers/Helper.php"?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-6">
            <h5>Tên sản phẩm</h5>
            <img src="assets/uploads/<?php echo $product['avatar']?>" alt="<?php echo $product['name']?>" width="60px">
            <span><?php echo $product['name']?></span>

        </div>
        <div class="col-6">
            <label for="name">Color</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_POST['name'])?$_POST['name']:'' ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar">
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