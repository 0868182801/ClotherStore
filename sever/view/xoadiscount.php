<?php 
    include '../mode/sanpham_class.php';
?>
<?php
$sanpham_class = new Sanpham_class();
if(!isset($_GET['discount_id']) || ( $_GET['discount_id'])==NULL ){
    echo "<script>window.location = 'magiamgia.php'</script>";
}
else{
    $discount_id = $_GET['discount_id'];

}
    $xoa_discount = $sanpham_class -> xoa_discount($discount_id);

?>