<?php
require_once "helpers/Helper.php";
?>
<?php
echo "<pre>";
//print_r($products);
echo "</pre>";
?>
<div>
    <h2 class="title-1">Tìm kiếm sản phẩm</h2>
    <form action="" method="get">
        <input type="hidden" name="controller" value="product" />
        <input type="hidden" name="action" value="index" />
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo isset($_GET['title'])?$_GET['title']:'' ?>">
        </div>
        <div class="form-group">
            <label for="category_id">Chọn danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <?php
                foreach ($categories as $category):
                $selected='';
                if(isset($_GET['category_id'])&&$category['id']==$_GET['category_id']){
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
            <button type="submit" value="Search" name="search" class="btn btn-primary">search</button>
            <a href="index.php?controller=product&action=index" class="btn color-gray btn-default border-dark">Cancel</a>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
            <a href="index.php?controller=product&action=create" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</a>
        </div>
    </div>
</div>
<?php
//echo "<pre>";
//print_r($products);
//echo "</pre>";
//
//echo "<pre>";
//print_r($sizes);
//echo "</pre>";
//?>
<div class="row">
    <div class="col-md-12 ">
        <h2 class="title-1 m-b-25">List Products</h2>
        <div style="overflow-x:scroll ">
            <table class="table table-border ">
                <tr>
                    <th>ID</th>
                    <th>Category name</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>price</th>
                    <th>sale %</th>

<!--                    <th>type</th>-->
                    <th>Status</th>
<!--                    <th>Created_at</th>-->
<!--                    <th>Updated_at</th>-->
                    <th>#</th>
                </tr>

                <?php if (!empty($products)):
                    ?>
                    <?php foreach ($products as $product):
                    $id=$product['id'];
                    $url_detail="index.php?controller=product&action=detail&id=$id";
                    $url_updated="index.php?controller=product&action=update&id=$id";
                    $url_delete="index.php?controller=product&action=delete&id=$id";
                    $url_size="index.php?controller=size&action=create&id=$id";
                    $url_color="index.php?controller=color&action=create&id=$id";
                    $url_image="index.php?controller=image&action=create&id=$id";
                    $url_slide="index.php?controller=slide&action=create&id=$id";
                    ?>
                    <tr>
                        <td><?php echo $product['id']?></td>
                        <td><?php echo $product['category_name']?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php
                            if(!empty($product['avatar'])):?>
                                <img src="assets/uploads/<?php echo $product['avatar']?>" alt="<?php echo $product['name']?>" height="50px" width="50px">
                            <?php
                            endif;
                            ?>
                        </td>
                        <td><?php echo number_format($product['price']) ?></td>
                        <?php if($product['sale'] >0):?>
                        <td><?php echo $product['sale']?>%</td>
                        <?php else:?>
                        <td></td>
                        <?php endif;?>

<!--                        <td>--><?php //echo Helper::getTypeText($product['type']) ?><!--</td>-->
                        <td><?php echo Helper::getStatusText($product['status']) ?></td>
<!--                        <td>--><?php
//                            $created_at =date('d-m-Y H:i:s',strtotime($product['created_at']));
//                            echo $created_at;
//                            ?><!--</td>-->
<!--                        <td>--><?php //echo !empty($product['updated_at'])?date('d-m-Y H:i:s',strtotime($product['updated_at'])):'--' ?><!--</td>-->
                        <td>

                            <a title="Chi tiết" href="<?php echo $url_detail ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a title="Update" href="<?php echo $url_updated ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                            <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a> <br>
                            <a href="<?php echo $url_size ?>" title="Thêm size" class="btn btn-default color-gray border-dark"><i class="zmdi zmdi-plus"></i>size</a>
                            <a href="<?php echo $url_color ?>" title="Thêm color" class="btn btn-default color-gray border-dark"><i class="zmdi zmdi-plus"></i>Color</a>
                            <a href="<?php echo $url_slide?>" title="Thêm slide" class="btn btn-default color-gray border-dark"><i class="zmdi zmdi-plus"></i>slide</a>
                            <a href="<?php echo $url_image ?>" title="Thêm ảnh" class="btn btn-default color-gray border-dark"><i class="zmdi zmdi-plus"></i>Image</a>

                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="9">No data found</td>
                    </tr>
                <?php endif; ?>


            </table>
        </div>
    </div>
    <div class="col-md-12">
        <nav class="blog-pagination justify-content-center d-flex">
            <?php
            echo $pages;
            ?>
        </nav>
    </div>
</div>
