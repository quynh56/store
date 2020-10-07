<div class="m-t-25 m-b-25">
    <?php
    echo "<pre>";
//    print_r($categories);
    print_r($category);
    echo "</pre>";
    if(empty($category)):
        ?>
    <h2 class="title-1 m-b-25">Không tồn tại category</h2>
    <?php
    else:
    ?>
    <h2 class="title-1 m-b-25">CHỉnh sửa danh mục #<?php echo $category['id']?></h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($_POST['name'])?$_POST['name']:$category['name'] ?>">

        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="parent_id">Menu</label>
                <?php
                function menuSelect($categories, $parent, $level, &$newArray){
                    if(count($categories)>0){
                        foreach($categories as $key=>$value){
                            if ($value['parent_id']==$parent){
                                $value['level']=$level;
                                $newArray[]=$value;
                                unset($categories[$key]);
                                $newParent=$value['id'];
                                menuSelect($categories, $newParent, $level+1,$newArray);
                            }
                        }
                    }
                }
                menuSelect($categories,0,1,$newArray);
                function cmsSelectbox($categories, $selected=0, $name){
                    $xhtml='<select name="'.$name.'" id="'.$name.'" class="form-control">';
                    foreach($categories as $key=>$value){
                        $str_selected='';
                        if($value['id']==$selected){
                            $str_selected='selected="selected"';
                        }if ($value['parent_id']==0){
                            $xhtml .='<option value="0" '.$str_selected.'>'.$value['name'].'</option>';
                        }else{
                            $name=str_repeat('&nbsp;',($value['level']-1)*5) .'-'.$value['name'];
                            $xhtml .='<option value="'.$value['parent_id'].'" '.$str_selected.'>'.$name.'</option>';
                        }
                    }
                    $xhtml .='</select>';
                    return $xhtml;
                }
                echo cmsSelectbox($newArray,$category['id'],'parent_id');
                ?>
            </div>
            <div class="col-md-6 form-group">
                <label for="number">Thứ tự menu</label>
                <input type="number" name="number" id="number" class="form-control" value="<?php echo isset($_POST['number'])?$_POST['number']:$category['number'] ?>">
            </div>
        </div>
        <div class="form-group">
            <?php
            $select_disable='selected';
            $select_active='';
            if($category['status']==1){
                $select_active="selected";
            }
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
            <input type="submit" name="submit" class="btn btn-info" value="Update">
            <a href="index.php?controller=category" class="btn btn-dark">Cancel</a>
        </div>
    </form>
    <?php
    endif;
    ?>
</div>
