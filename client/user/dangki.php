<?php
session_start();
$title = "ShopVT - Mua thỏa thích , Mặc cả ngày";

if (isset($_POST['register'])) {
    // Kết nối đến cơ sở dữ liệu
    $db = new mysqli('localhost', 'root', '', 'webquanao');

    // Kiểm tra kết nối
    if ($db->connect_error) {
        die("Kết nối thất bại: " . $db->connect_error);
    }

    // Lấy dữ liệu từ form đăng ký
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $role = 'user'; // Mặc định, bạn có thể thay đổi tùy theo yêu cầu của bạn

    // Kiểm tra xem tên người dùng đã tồn tại hay chưa
    $checkQuery = "SELECT * FROM user WHERE user_name = '$userName'";
    $checkResult = $db->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        $error = "Tên đăng nhập đã tồn tại.";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $insertQuery = "INSERT INTO user (user_name,user_email,user_phone, user_pass, role,created_time) 
        VALUES ('$userName',
        '$userEmail', 
        '$userPhone',
        '$password',
         '$role','" . time() . "')";
        if ($db->query($insertQuery) === TRUE) {
            $_SESSION['user_id'] = $db->insert_id;
            $_SESSION['role'] = $role;
            header('Location:./login.php'); // Chuyển hướng đến trang dashboard sau khi đăng ký thành công
        } else {
            $error = "Đã xảy ra lỗi trong quá trình đăng ký: " . $db->error;
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
        <h1>Đăng kí</h1>
        <?php if (isset($error)){ echo $error  ?> <?php }?>
        <form action="#" method="post" >
             <label>Nhập tên</label>
            <input type="text"name="userName">
            <label>Nhập số điện thoại</label>
            <input type="text" name="userPhone">
            <label>Nhập email đăng kí</label>
            <input type="text" name="userEmail">
            <label>Mật khẩu</label>
            <input type="password" name="password">
            <button type="submit" name="register">Đăng kí</button>
            <div class="link">Bạn đã có tài khoản ShopVT ? <a href="./login.php">Đăng nhập tại đây</a></div>
        </form>
    </div>