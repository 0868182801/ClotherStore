<?php 
    include '../mode/sanpham_class.php';
?>
<?php
$sanpham_class = new Sanpham_class();
if(!isset($_GET['sanpham_id']) || ( $_GET['sanpham_id'])==NULL ){
    echo "<script>window.location = 'sanpham.php'</script>";
}
else{
    $sanpham_id = $_GET['sanpham_id'];

}
    $xoa_sanpham = $sanpham_class -> xoa_sanpham($sanpham_id);

?>