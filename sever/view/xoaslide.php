<?php 
    include '../mode/sanpham_class.php';
?>
<?php
$sanpham_class = new Sanpham_class();
if(!isset($_GET['slide_id']) || ( $_GET['slide_id'])==NULL ){
    echo "<script>window.location = 'quangcao.php'</script>";
}
else{
    $slide_id = $_GET['slide_id'];

}
    $xoa_slide = $sanpham_class -> xoa_slide($slide_id);

?>