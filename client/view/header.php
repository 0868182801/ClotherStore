
<?php
session_start();
$title = "ShopVT - Mua thỏa thích , Mặc cả ngày";
include '../../sever/mode/config2.php';

    $show_danhmuc = mysqli_query($conn , "SELECT * FROM danhmuc ORDER BY danhmuc_id DESC");
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
    <link rel="icon" href="../public/img/ShopVT.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header style="border-bottom:1px solid black;" id="header" class="site-header" ">
        <div class="container d-flex">
            <nav class="main-menu" role="navigation"">
                <ul class="menu">
                    <?php 
                            while($kq = mysqli_fetch_array($show_danhmuc)){?>
                    <li><a href="./name.php?danhmuc_id=<?php echo $kq['danhmuc_id'] ?>"><?php echo $kq['danhmuc_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="site-brand">
                <a href="./index.php">
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
                <div class="login">
                        <!-- <a href="#"><?php echo $_SESSION['user_name'] ?></a> -->
                        <a href="../user/logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </header>