<?php
require_once "helpers/Helper.php";?>
<div>
    <h2 class="title-1">Form tìm kiếm</h2>
    <form action="" method="GET">
        <!--
          Nếu form sử dụng phương thức GET, cần chú ý phải thêm
          2 input có thuộc tính name tương ứng là controller và action,
          vì phương thức GET sẽ đổ dữ liệu của thuộc tính name của input
          trong form lên URL, dẫn đến mất 2 tham số controller và action
          mặc định của URL
          -->
        <input type="hidden" name="controller" value="category" />
        <input type="hidden" name="action" value="index" />
        <div class="form-group">
            <!--    Thẻ label dùng để kết hợp với input để tạo ra hiệu ứng
                click vào label -> trỏ chuột input
                -->
            <label for="name">Nhập name:</label>
            <input type="text" id="name" name="name"
                   value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
                   class="form-control" />
        </div>
        <div class="form-group">
            <?php
            $selected_disabled = '';
            $selected_active = '';
            if (isset($_GET['status'])) {
                switch ($_GET['status']) {
                    case 0: $selected_disabled = 'selected';break;
                    case 1: $selected_active = 'selected';break;
                }
            }
            ?>
            <label for="status">Chọn trạng thái</label>
            <select id="status" name="status" class="form-control">
                <option value="0" <?php echo $selected_disabled?> >
                    Disabled
                </option>
                <option value="1" <?php echo $selected_active?> >
                    Active
                </option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Search"
                   class="btn btn-info" />
            <a class="btn color-gray btn-default border-dark"
               href="index.php?controller=category&action=index">
                Xóa filter
            </a>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
            <a href="index.php?controller=category&action=create" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="title-1 m-b-25">List Category</h2>
        <?php
        echo "<pre>";
        //print_r($category);
//        print_r($_SESSION);
        echo "</pre>";
        ?>
        <table class="table table-border ">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>menu</th>
                <th>Type</th>
                <th>Number menu</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>#</th>
            </tr>
            <?php if(!empty($categories)): ?>
                <?php
                foreach ($categories as $category):
                    ?>
                    <tr>
                        <td><?php echo $category['id']?></td>
                        <td><?php echo $category['name']?></td>
                        <td>
                            <?php echo $category['parent_id']?>
                        </td>
                        <td>
                            <?php echo Helper::getTypeTextCategory($category['type'])?>
                        </td>
                        <td><?php
                            if ($category['number']>0){
                                echo  $category['number'];
                            }else if ($category['number']==0){
                                echo null;
                            }
                            ?></td>
                        <td>
                            <?php echo Helper::getStatusText($category['status'])?>
                        </td>

                        <td>
                            <?php
                            $created_at =date('d-m-Y',strtotime($category['created_at']));
                            echo $created_at;
                            ?>
                        </td>
                        <td><?php
                            if(!empty($category['updated_at'])){
                                echo date('d-m-Y', strtotime($category['updated_at']));
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $id =$category['id'];
                            $link_update ="index.php?controller=category&action=update&id=$id";
                            $link_detail="index.php?controller=category&action=detail&id=$id";
                            $link_delete="index.php?controller=category&action=delete&id=$id";
                            ?>
                            <a title="Chi tiết" href="<?php echo $link_detail ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a title="Update" href="<?php echo $link_update?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                            <a title="Xóa" href="<?php echo $link_delete ?>" onclick="return confirm('Are you delete?')" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            <?php
            else:
                ?>
                <tr>
                    <td colspan="7">Không có bản ghi nào</td>
                </tr>
            <?php
            endif;
            ?>
        </table>
    </div>
    <div class="col-md-12">
        <nav class="blog-pagination justify-content-center d-flex">
            <?php
            echo $page;
            ?>
        </nav>
    </div>
</div>
