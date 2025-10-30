<?php
    $pageTitleAmin = "Trang thành viên";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $role = $_POST['role'];
        $admin_pass = $_POST['admin_pass'];
        $admin_img = $_FILES['user_img']['name'];
        $admin_img_tmp = $_FILES['user_img']['tmp_name'];
        $admin_img = time().'_'.$admin_img;
        move_uploaded_file($admin_img_tmp,"../uploading/".$admin_img);
        $them_thanhvien = $sanpham_class -> them_thanhvien($admin_name,$admin_email,$role,$admin_pass,$admin_img);
    }
// ảnh


?>

<div class="main--content">
    <form action="" class="post_sanpham" enctype="multipart/form-data" method = "POST">
        <label for="">Tên thành viên</label><br>
        <input required type="text" name="admin_name" placeholder="Thêm thành viên"><br>
        <label for="">Email thành viên</label><br>
        <input required type="text" name="admin_email" placeholder="Email thành viên"><br>
        <label for="">Ảnh thành viên</label><br>
        <input required type="file" name="user_img"><br>
        <label for="">Mật khẩu thành viên</label><br>
        <input required type="text" name="admin_pass" placeholder="Mật khẩu thành viên"><br>
        <label for="">Chức năng thành viên</label><br>
        <input required type="text"  name="role" value="writer" placeholder="Chức năng thành viên"><br>
        <input  type="submit" class="btn_them" placeholder="Thêm thành viên">
    </form>


</div>