<?php
require_once "helpers/Helper.php";
echo "<pre>";
//print_r($colors);
echo "</pre>";
?>
<div class="row">
    <div class="col-md-12 ">
        <h2 class="title-1 m-b-25">List Colors</h2>
        <div style="overflow-x:scroll ">
            <table class="table table-border " cellpadding="10px 20px">

                <tr>
                    <th>ID</th>
                    <th>product_name</th>
                    <th>avatar</th>
                    <th>Color</th>
                    <th>images</th>
                    <th>images_color</th>
                    <th>status</th>
                    <th>#</th>
                </tr>
                <?php if (!empty($colors)): ?>
                <?php foreach ($colors as $color):?>
                <tr>
                    <td><?php echo $color['id']?></td>
                    <td><?php echo $color['product_name']?></td>
                    <td><img src="assets/uploads/<?php echo $color['product_avatar']?>" alt="" width="60px"></td>
                    <td><?php echo $color['name']?></td>
                    <td><img src="assets/uploads/<?php echo $color['avatar']?>" alt=""width="60px"></td>
                    <td>
                        <?php foreach ($images as $image):?>
                        <?php if($image['color_id']==$color['id']):?>
                        <img src="assets/uploads/<?php echo $image['images']?>" alt=""width="60px">
                        <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td><?php echo Helper::getStatusText($color['status']) ?></td>
                    <td>
                        <?php
                        $id=$color['id'];
                        $url_detail = "index.php?controller=color&action=detail&id=$id" ;
                        $url_update = "index.php?controller=color&action=update&id=$id" ;
                        $url_delete = "index.php?controller=color&action=delete&id=$id";
                        $more_color="index.php?controller=image&action=create&id={$color['product_id']}";
                        ?>
                        <a title="Chi tiết" href="<?php echo $url_detail ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a title="Update" href="<?php echo $url_update ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                        <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        <a href="<?php echo $more_color?>" class="btn btn-default border-dark color-gray"><i class="zmdi zmdi-plus"></i> image</a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>


            </table>
        </div>
    </div>
    <div class="col-md-12">
        <nav class="blog-pagination justify-content-center d-flex">
<!--            --><?php
//            echo $page;
//            ?>
        </nav>
    </div>
</div>