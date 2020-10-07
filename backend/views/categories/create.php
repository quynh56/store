<div class="m-t-25 m-b-25">
    <h2 class="title-1 m-b-25">Tạo danh mục</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($_POST['name'])?$_POST['name']:''?>">

        </div>
<!--        <div class="form-group">-->
<!--            <label for="avatar">Upload Images</label>-->
<!--            <input type="file" name="avatar" id="avatar" class="form-control" >-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="description">Description</label>-->
<!--            <textarea name="description" id="description" class="form-control">--><?php //echo isset($_POST['description'])?$_POST['description']:''?><!--</textarea>-->
<!--        </div>-->
        <div class="row">
            <div class="form-group col-md-6">
                <label for="parent_id">Menu</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="0">menu parent</option>
                    <?php foreach ($categories as $category):?>
                        <?php if($category['parent_id']==0):
                            $selected='selected';
                            ?>
                            <option value="<?php echo $category['id']?>" <?php echo $selected?>>child <?php echo $category['name'] ?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="number">Thứ tự menu</label>
                <input type="number" name="number" id="number" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <?php
            $checked_product='';
            $checked_blog='';
            if (isset($_POST['type'])){
                switch ($_POST['type']){
                    case 0: $checked_product='checked';break;
                    case 1:$checked_blog='checked';break;
                }
            }
            ?>
            <label for="">Type</label> <br>
            <input type="radio" name="type" value="0" <?php echo $checked_product?>>Products <br>
            <input type="radio" name="type" value="1" <?php echo $checked_blog?>>Blogs <br>
        </div>
        <div class="form-group">
            <?php
            $checked_clothing='';
            $checked_accessories='';
            if (isset($_POST['type_product'])){
                switch ($_POST['type_product']){
                    case 0: $checked_clothing='checked';break;
                    case 1:$checked_accessories='checked';break;
                }
            }
            ?>
            <label for="">Type Product</label> <br>
            <input type="radio" name="type_product" value="0" <?php echo $checked_clothing?>>Clothing <br>
            <input type="radio" name="type_product" value="1" <?php echo $checked_accessories?>>Accessories <br>
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
            <input type="submit" name="submit" class="btn btn-info" value="Save">
            <a href="index.php?controller=category" class="btn btn-dark">Back</a>
        </div>
    </form>
</div>
