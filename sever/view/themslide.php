<?php
    $pageTitleAmin = "Trang quảng cáo";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $slide_img = $_FILES['slide_img']['name'];
        $slide_img_tmp = $_FILES['slide_img']['tmp_name'];
        $slide_img = time().'_'.$slide_img;
        move_uploaded_file($slide_img_tmp,"../uploading/".$slide_img);
        $them_slide = $sanpham_class -> them_slide($slide_img);
    }
// ảnh


?>

<div class="main--content">
    <form action="" class="post_sanpham" enctype="multipart/form-data" method = "POST">
        <label for="">Ảnh slide</label><br>
        <input required type="file" name="slide_img"><br>
        <button type="submit" style="padding: 0 10px;" class="btn_them">Thêm slide</button>
    </form>


</div>