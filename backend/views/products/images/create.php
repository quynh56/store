<?php
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="color">Color</label>
        <select name="color_id" id="color_id" class="form-control">
            <?php
            foreach ($colors as $color):
                if($_GET['id']==$color['product_id'] && !empty($color['name'])):
                    $selected = '';
                    if (isset($_POST['color_id']) && $color['id'] == $_POST['color_id']) {
                        $selected = 'selected';
                    }
                ?>
                <option value="<?php echo $color['id']?>" <?php echo $selected?>><?php echo $color['name']?></option>
            <?php
                endif;
            ?>
            <?php
            endforeach;
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="images">Images</label>
        <input type="file" class="form-control" name="avatar">
    </div>
    <div class="form-group">
        <a href="index.php?controller=color&action=create">Back</a>
        <input type="submit" name="submit" value="save" class="btn btn-info">
    </div>
</form>