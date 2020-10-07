<?php
require_once "helpers/Helper.php";
?>

<div class="m-t-25 m-b-25">
    <h2 class="title-1 m-b-25">Chi tiết sản phẩm</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $size['id']?></td>
        </tr>
        <tr>
            <th>size</th>
            <td><?php echo $size['size_name'] ?></td>
        </tr>
        <tr>
            <th>Ngực</th>
            <td><?php echo $size['size_1']?>
            </td>
        </tr>
        <tr>
            <th>Vai </th>
            <td><?php echo $size['shoulder'] ?></td>
        </tr>
        <tr>
            <th>chiều dài bắp tay</th>
            <td><?php echo $size['bice_length']?></td>
        </tr>
        <tr>
            <th>Chiều dài tay</th>
            <td><?php echo $size['hand_length']; ?></td>
        </tr>
        <tr>
            <th>Cổ tay áo</th>
            <td><?php echo $size['cuff']?></td>
        </tr>
        <tr>
            <th>chiều dài thắt lưng</th>
            <td><?php echo $size['waist_length']?></td>
        </tr>
        <tr>
            <th>chiều dài</th>
            <td><?php echo $size['lengths']?></td>
        </tr>
        <tr>
            <th>kích thước eo</th>
            <td><?php echo $size['size_2']; ?></td>
        </tr>
        <tr>
            <th>kích thước mông</th>
            <td><?php echo $size['size_3']?></td>
        </tr>
        <tr>
            <th>đùi</th>
            <td><?php echo $size['femoral']?></td>
        </tr>
        <tr>
            <th>Chiều cao giày</th>
            <td><?php echo $size['axle_height']; ?></td>
        </tr>
        <tr>
            <th>Chiều cao của gót giày</th>
            <td><?php echo $size['base_height']?></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><?php echo $size['quality'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo Helper::getStatusText($size['status']) ?></td>
        </tr>

        <tr>
            <th>Created_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($size['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Updated_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($size['updated_at'])); ?>
            </td>
        </tr>
    </table>
    <a href="index.php?controller=size" class="btn btn-primary">Back</a>
</div>