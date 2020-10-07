<?php
require_once "helpers/Helper.php";
echo "<pre>";
//print_r($colors);
echo "</pre>";
?>
<div class="row">
    <div class="col-md-12 ">
        <h2 class="title-1 m-b-25">List Slides</h2>
        <div style="overflow-x:scroll ">
            <table class="table table-border " cellpadding="10px 20px">

                <tr>
                    <th>ID</th>
                    <th>product_name</th>
                    <th>avatar</th>
                    <th>vị trí hiển trị trong slide</th>
                    <th>vị trí slide trên trang</th>
                    <th>status</th>
                    <th>#</th>
                </tr>
                <?php if (!empty($slides)): ?>
                    <?php foreach ($slides as $slide):?>
                        <tr>
                            <td><?php echo $slide['id']?></td>
                            <td><?php echo $slide['product_name']?></td>
                            <td><img src="assets/uploads/<?php echo $slide['avatar']?>" alt="" width="60px"></td>
                            <td>
                                <?php
                                switch ($slide['position']){
                                    case 0: echo 1;break;
                                    case 1:echo 2;break;
                                    case 2:echo 3;break;
                                    case 3:echo 4;break;
                                    case 4;echo 5;break;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                switch ($slide['location']){
                                    case 0: echo 'Top';break;
                                    case 1:echo 'Center';break;
                                }
                                ?>
                            </td>
                            <td><?php echo Helper::getStatusText($slide['status']) ?></td>
                            <td>
                                <?php
                                $id=$slide['id'];
                                $url_detail = "index.php?controller=slide&action=detail&id=$id" ;
                                $url_update = "index.php?controller=slide&action=update&id=$id" ;
                                $url_delete = "index.php?controller=slide&action=delete&id=$id";
                                $more_color="index.php?controller=image&action=create&id={$slide['product_id']}";
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