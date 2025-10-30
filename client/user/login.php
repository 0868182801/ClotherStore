
<?php
session_start();
$title = "ShopVT - Mua thỏa thích , Mặc cả ngày";

include '../../sever/mode/config2.php';
if (isset($_POST['login'])) {
    // Kết nối đến cơ sở dữ liệu
    $db = new mysqli('localhost', 'root', '', 'webquanao');

    // Kiểm tra kết nối
    if ($db->connect_error) {
        die("Kết nối thất bại: " . $db->connect_error);
    }

    // Lấy dữ liệu từ form đăng nhập
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM user WHERE user_email = '$useremail' AND user_pass = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows == 1 ) {
        $error = array();
        // Đăng nhập thành công, lưu thông tin người dùng vào session
        $user = $result->fetch_assoc();
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        if($user['role'] === 'user'){
        $error['success'] = 'Đăng nhập thành công !';
            header('Location:../view'); // Chuyển hướng đến trang dashboard sau khi đăng nhập
        }
        else {
            $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
           
        }
        

   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/sanpham.css">
    <link rel="stylesheet" href="../public/footer.css">
    <link rel="stylesheet" href="../public/giohang.css">
    <link rel="stylesheet" href="../public/login1.css">
    <link rel="icon" href="../public/img/ShopVT.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-image:url(../public/img/bg.jpeg);background-size: cover;">
    <header style="border-bottom:1px solid black" id="header" class="site-header" ">
        <div class="container d-flex">
            <nav class="main-menu" role="navigation"">
                <ul class="menu">
                    <li>Nam</li>
                    <li>Nữ</li>
                    <li>Trẻ em</li>
                    <li>Bộ sưu tập</li>
                </ul>
            </nav>
            <div class="site-brand">
                <a href="../../index.php">
                    <img src="../public/img/logo.png" alt="ShopVT">
                </a>
            </div>
            <div class="right-header">
                <form class="search-form active" enctype="application/x-www-form-urlencoded" method="get" >
                    <button style="padding: 13px;" class="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <input id="search-quick" type="text"  placeholder="TÌM KIẾM SẢN PHẨM" >
                </form>
                <div style="display: flex; justify-content: center; align-items: center;" class="login">
                    <a href="../user/login.php">Đăng nhập</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container123">
        <h1>Đăng Nhập</h1>
        <?php if (!empty($error)){?>
            <p><?php  echo $error   ?></p>
            <?php }?>
        <form action="../view/index.php" method="POST">
            <label>Email đăng nhập </label>
            <input type="text" name="useremail" >
            <label>Mật khẩu</label>
            <input type="password" name="password">
            <button type="submit" name="login">Submit</button>
            <div class="link">Bạn chưa có tài khoản ? <a href="./dangki.php">Đăng kí ở đây</a></div>
        </form>
    </div>