<?php
    $pageTitleAmin = "Mã giảm giá";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $them_discount = $sanpham_class -> them_discount($_POST);
    }
// ảnh
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
$length = 5; // Độ dài của chuỗi ngẫu nhiên (tùy chỉnh theo nhu cầu của bạn)

for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

?>

<div class="main--content">
    <form action="" class="post_sanpham" method = "POST">
        <label for="">Mã giảm giá</label><br>
        <input required type="text" name="discount_name" value="<?php echo $randomString; ?>"  placeholder="Thêm mã giảm giá"><br>
        <label for="">Discount</label><br>
        <input required type="text" name="discount" placeholder="Discount"><br>
        <input  type="submit" class="btn_them" placeholder="Thêm mã giảm giá">
    </form>


</div>