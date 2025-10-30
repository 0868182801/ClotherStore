<?php session_start(); 
include '../mode/config2.php';



$nguoidung = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_name` LIKE '".$_SESSION['admin_name']."'" );
mysqli_close($conn);
$result = mysqli_fetch_array($nguoidung);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/quantri.css">
    <link rel="stylesheet" href="../public/sanpham.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title><?php echo $pageTitleAmin; ?></title>
    <link rel="icon" href="../public/img/ShopVT.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<script src="../public/quantri.js"></script>
<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>SHOP<span>VT</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div style="padding: 0;" class="picon profile">
                    <img style="width: 40px;height: 40px;background-size: cover;" src="../uploading/<?php echo $result['admin_img'] ?>" alt="">
                </div>
            </div>
        </div>
    </section>