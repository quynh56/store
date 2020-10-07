<div class="m-t-25 m-b-25">
    <h2 class="title-1 m-b-25">Chi tiết category</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $category['id']?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $category['name'] ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                <?php
                $status_text='Active';
                if($category['status']==0){
                    $status_text='Disable';
                }
                echo $status_text;
                ?>
            </td>
        </tr>
        <tr>
            <th>Created_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Updated_at</th>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($category['updated_at'])); ?>
            </td>
        </tr>
    </table>
    <a href="index.php?controller=category" class="btn btn-primary">Back</a>
</div>