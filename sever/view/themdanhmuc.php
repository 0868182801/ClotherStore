<?php
    $pageTitleAmin = "Trang danh mục";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $themsanpham = $sanpham_class -> them_danhmuc($_POST);
    }
// ảnh


?>

<div class="main--content">
    <form action="" class="post_sanpham" method = "POST">
        <label for="">Tên danh mục</label><br>
        <input required type="text" name="danhmuc_name" placeholder="Thêm sản phẩm"><br>
        <input  type="submit" class="btn_them" placeholder="Thêm danh mục">
    </form>


</div>