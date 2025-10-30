<?php
    $pageTitleAmin = "Trang sản phẩm";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $themsanpham = $sanpham_class -> them_sanpham($_POST,$_FILES);
    }
// ảnh


?>

<div class="main--content">
    <form action="" class="post_sanpham" enctype="multipart/form-data" method = "POST">
        <label for="">Tên sản phẩm</label><br>
        <input required type="text" name="sanpham_name" placeholder="Thêm sản phẩm"><br>
        <label for="">Giá sản phẩm</label><br>
        <input required type="text" name="sanpham_gia" placeholder="Giá sản phẩm"><br>
        <label for="">Size sản phẩm</label><br>
        <input required type="text" name="sanpham_size" placeholder="Size sản phẩm"><br>
        <label for="">Ảnh sản phẩm</label><br>
        <input required type="file" name="sanpham_img" placeholder="Ảnh sản phẩm"><br>
        <label for="">Mã sản phẩm</label><br>
        <input required type="text"  name="sanpham_ma" placeholder="Mã sản phẩm"><br>
        <select required style="margin: 15px 0; width:50%;height:40px;"  name="sale_id" id="">
            <option value="">--Chọn danh sách danh mục--</option>
                <?php
                $show_danhmuc = $sanpham_class ->show_danhmuc();
                if($show_danhmuc){
                    while($result = $show_danhmuc ->fetch_assoc()){?>
                    <option value="<?php echo $result['danhmuc_id'] ?>"> <?php echo $result['danhmuc_name'] ?></option>
                    <?php  }}?>
        </select><br>
        <select required style="margin: 15px 0; width:50%;height:40px;"  name="sale_id" id="">
            <option value="">--Chọn danh sách sale--</option>
                <?php
                $show_sale = $sanpham_class ->show_sale();
                if($show_sale){
                    while($result = $show_sale ->fetch_assoc()){?>
                    <option value="<?php echo $result['sale_id'] ?>"> <?php echo $result['sale_name'] ?></option>
                    <?php  }}?>
        </select><br>
        <input  type="submit" class="btn_them" placeholder="Thêm sản phẩm">
    </form>


</div>