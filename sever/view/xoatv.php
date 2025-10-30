<?php 
    include '../mode/sanpham_class.php';
?>
<?php
$sanpham_class = new Sanpham_class();
if(!isset($_GET['admin_id']) || ( $_GET['admin_id'])==NULL ){
    echo "<script>window.location = 'admin.php'</script>";
}
else{
    $admin_id = $_GET['admin_id'];

}
    $xoa_admin = $sanpham_class -> xoa_admin($admin_id);

?>