<?php
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';
?>

<?php
$sanpham_class = new Sanpham_class();
if(isset($_GET['danhmuc_id']) || ( $_GET['danhmuc_id'])==NULL ){
    $danhmuc_id = $_GET['danhmuc_id'];

}
$get_danhmuc = $sanpham_class -> get_danhmuc($danhmuc_id);
if($get_danhmuc){$result = $get_danhmuc->fetch_assoc();}
?>
<?php
$sanpham_class = new Sanpham_class();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $danhmuc_name = $_POST['danhmuc_name'];
    $update_sanphambanchay = $sanpham_class ->update_danhmuc($danhmuc_name,$danhmuc_id);
}
?>

<div class="main--content">
    <form action="" class="post_sanpham" method = "POST">
        <label for="">Tên danh mục</label><br>
        <input required type="text" value="<?php echo $result['danhmuc_name'] ?>" name="danhmuc_name" placeholder="Thêm sản phẩm"><br>
        <input  type="submit" class="btn_them" placeholder="Thêm danh mục">
    </form>


</div>