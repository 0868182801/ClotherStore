<?php
    $pageTitleAmin = "Trang thành viên";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';
    include '../mode/config2.php';

    $sanpham_class = new Sanpham_class();
    $show_admin = $sanpham_class -> show_admin();
    // var_dump($_SESSION['user']);exit;
    // $admin = mysqli_query($conn, "SELECT * FROM `tbl_admin` ORDER BY `admin_id` DESC LIMIT ");
    mysqli_close($conn);
?>
<div class="main--content">
    <div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí thành viên</h2>
        </div>
        <?php if(checkPrivilege('view/privilege.php?admin_id=0')){ ?>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themtv.php">Thêm thành viên</a></button>
        </div>
        <?php } ?>
    </div>
    <div class="sanpham_bottom">
        <div class="sanpham_table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên thành viên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ngày tạo</th>
                    <?php if(checkPrivilege('view/privilege.php?admin_id=0')){ ?>
                    <th scope="col">Phân quyền</th>
                    <?php } ?>    
                    <?php if(checkPrivilege('view/xoasp.php?admin_id=0')){ ?>
                    <th scope="col">Chức năng</th>
                    <?php } ?>    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($show_admin){
                            $num =0;
                            while($kq = $show_admin -> fetch_assoc()){
                                $num ++;
                    ?>
                    <tr>
                    <td scope="row"><?php echo $num?></td>
                    <td><?php echo $kq['admin_name']  ?></td>
                    <td><?php echo $kq['admin_email']  ?></td>
                    <td><?=date('d/m/Y' ,   $kq['created_time'])?></td>
                    <?php if(checkPrivilege('view/privilege.php?admin_id=0')){ ?>
                    <td><a href="./privilege.php?admin_id=<?=$kq['admin_id']?>">Phân quyền</a></td>
                    <?php } ?>    
                    <?php if(checkPrivilege('view/xoasp.php?admin_id=0')){ ?>
                    <td><a class="a_btn" href="./xoatv.php?admin_id=<?php echo $kq['admin_id']?>">Xóa</a></td>
                    <th scope="col">Chức năng</th>
                    <?php } ?>    
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
        </table>
        </div>
    </div>



</div>