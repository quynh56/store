<?php
require_once "helpers/Helper.php";
?>

<div class="row">
    <div class="col-md-12 ">
        <h2 class="title-1 m-b-25">List Size</h2>
        <div style="overflow-x:scroll ">
            <table class="table table-border " cellpadding="10px 20px">

                <tr>
                    <th>ID</th>
                    <th>Product name</th>
                    <th>Avatar</th>
                    <th>size</th>
                    <th>Ngực</th>
                    <th>Vai</th>
                    <th>Chiều dài bắp tay</th>
                    <th>Chiều dài tay</th>
                    <th>Cổ tay</th>
                    <th>chiều dài thắt lưng</th>
                    <th>chiều dài</th>
                    <th>eo</th>
                    <th>mông</th>
                    <th>đùi</th>
                    <th>chiều cao giày</th>
                    <th>chiều cao của gót giày</th>
                    <th>số lượng</th>
                    <th>status</th>
                    <th>#</th>
                </tr>
                <?php if (!empty($sizes)):
                    ?>
                    <?php
                        foreach ($sizes as $size):
                    ?>
                <tr>
                    <td><?php echo $size['id']?></td>
                    <td><?php echo $size['product_name']?></td>
                    <td><img src="assets/uploads/<?php echo $size['product_avatar']?>" alt=""></td>
                    <td><?php echo $size['size_name']?></td>
                    <td><?php echo $size['size_1']?></td>
                    <td><?php echo $size['shoulder']?></td>
                    <td><?php echo $size['bice_length']?></td>
                    <td><?php echo $size['hand_length']?></td>
                    <td><?php echo $size['cuff']?></td>
                    <td><?php echo $size['waist_length']?></td>
                    <td><?php echo $size['lengths']?></td>
                    <td><?php echo $size['size_2']?></td>
                    <td><?php echo $size['size_3']?></td>
                    <td><?php echo $size['femoral']?></td>
                    <td><?php echo $size['axle_height']?></td>
                    <td><?php echo $size['base_height']?></td>
                    <td><?php echo $size['quality']?></td>
                    <td><?php echo Helper::getStatusText($size['status']) ?></td>
                    <td>
                        <?php
                        $url_detail = "index.php?controller=size&action=detail&id=" . $size['id'];
                        $url_update = "index.php?controller=size&action=update&id=" . $size['id'];
                        $url_delete = "index.php?controller=size&action=delete&id=" . $size['id'];
                        ?>
                        <a title="Chi tiết" href="<?php echo $url_detail ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a title="Update" href="<?php echo $url_update ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                        <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                        endforeach;
                ?>
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
                        echo $page;
                        ?>
                    </nav>
    </div>
</div>
