<?php
    ob_start();
?>
<?php
include '../mode/database.php';
class Sanpham_class{


    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    #------------------san pham --------------------------
    public function them_sanpham(){
        $sanpham_name = $_POST['sanpham_name'];
        $sanpham_gia = $_POST['sanpham_gia'];
        $sanpham_ma = $_POST['sanpham_ma'];
        $sanpham_size =  $_POST['sanpham_size'];
        $sanpham_img = $_FILES['sanpham_img']['name'];
        $sanpham_img_tmp = $_FILES['sanpham_img']['tmp_name'];
        move_uploaded_file($sanpham_img_tmp,"../uploading/".$sanpham_img);
        $query = "INSERT INTO sanpham
         (sanpham_name,
         sanpham_gia,
         sanpham_size,
         sanpham_img,
         sanpham_ma)
         VALUES 
         ('$sanpham_name',
         '$sanpham_gia',
         '$sanpham_size',
         '$sanpham_img',
         '$sanpham_ma')";
       $result = $this -> db -> insert($query);
       echo "<script>window.location = 'sanpham.php'</script>";
       return $result;
    }
    public function show_sanpham(){
        $query = "SELECT * FROM sanpham ORDER BY sanpham_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    public function xoa_sanpham($sanpham_id){
        $query = "DELETE FROM sanpham WHERE sanpham_id = '$sanpham_id'";
        $result = $this->db->delete($query);
        header("Location:sanpham.php");
        return $result;
    }
    // ----------danh muc-----------------
    public function them_danhmuc(){
        $danhmuc_name = $_POST['danhmuc_name'];
        $query = "INSERT INTO danhmuc
         (danhmuc_name)
         VALUES 
         ('$danhmuc_name')";
       $result = $this -> db -> insert($query);
       echo "<script>window.location = 'danhmuc.php'</script>";
       return $result;
    }
    public function show_danhmuc(){
        $query = "SELECT * FROM danhmuc ORDER BY danhmuc_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    public function xoa_danhmuc($danhmuc_id){
        $query = "DELETE FROM danhmuc WHERE danhmuc_id = '$danhmuc_id'";
        $result = $this->db->delete($query);
        header("Location:danhmuc.php");
        return $result;
    }
    public function get_danhmuc($danhmuc_id){
        $query = "SELECT * FROM danhmuc WHERE danhmuc_id = '$danhmuc_id' ";
        $result = $this ->db-> select($query);
        return $result;
    }
    public function update_danhmuc($danhmuc_name,$danhmuc_id){
        $query = "UPDATE danhmuc SET
         danhmuc_name = '$danhmuc_name'
         where danhmuc_id = '$danhmuc_id'";
        $result  = $this -> db -> update($query);
        echo "<script>window.location = 'danhmuc.php'</script>";

        return $result;
    }
    // -------------thanh vien---------------
    public function them_thanhvien($admin_name,$admin_email,$role,$admin_pass,$admin_img){
        $query = "INSERT INTO `admin`
         (`admin_name`,
           `admin_email`,
            `admin_pass`,
              `role`, 
              `admin_img`, 
              `created_time`) VALUES ( 
                '$admin_name',
                 '$admin_email',
                   '$admin_pass', 
                    '$role',
                      '$admin_img',
                       ".date('Y-m-d').")";
        $result = $this ->db-> insert($query);
        echo "<script>window.location = 'danhmuc.php'</script>";
        return $result;
    }
    public function show_admin(){
        $query = "SELECT * FROM admin ORDER BY admin_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    public function xoa_admin($admin_id){
        $query = "DELETE FROM admin WHERE admin_id = '$admin_id'";
        $result = $this->db->delete($query);
        header("Location:thanhvien.php");
        return $result;
    }
    public function show_thanhvien(){
        $query = "SELECT * FROM user ORDER BY user_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    // ------------------slide--------------
    public function them_slide($slide_img){
        $query = "INSERT INTO `slide`
         ( `slide_img`, `created_time`) VALUES ( 
                '$slide_img',".date('Y-m-d').")";
        $result = $this ->db-> insert($query);
        echo "<script>window.location = 'quangcao.php'</script>";
        return $result;
    }
    public function show_slide(){
        $query = "SELECT * FROM slide ORDER BY slide_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    public function xoa_slide($slide_id){
        $query = "DELETE FROM slide WHERE slide_id = '$slide_id'";
        $result = $this->db->delete($query);
        header("Location:quangcao.php");
        return $result;
    }
    // -------------------sale---------------------
    public function show_sale(){
        $query = "SELECT * FROM sale ORDER BY sale_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    // -------------------ma giam gia---------------
    public function show_discount(){
        $query = "SELECT * FROM discount ORDER BY discount_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
    public function xoa_discount($discount_id){
        $query = "DELETE FROM discount WHERE discount_id = '$discount_id'";
        $result = $this->db->delete($query);
        header("Location:magiamgia.php");
        return $result;
    }
    public function them_discount(){
        $discount_name = $_POST['discount_name'];
        $discount = $_POST['discount'];
        $query = "INSERT INTO discount
         (discount_code,
         discount_sotien)
         VALUES 
         ('$discount_name',
         '$discount')";
       $result = $this -> db -> insert($query);
       echo "<script>window.location = 'magiamgia.php'</script>";
       return $result;
    }
    // --------------------don hang------------------
    public function show_donhang(){
        $query = "SELECT * FROM orders ORDER BY order_id DESC";
       $result = $this -> db -> select($query);
       return $result;
    }
}


?>