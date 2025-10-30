<?php
    include '../mode/xuly.php';
    include '../mode/config2.php';

?>
<?php

$products = mysqli_query($conn, "SELECT * FROM `admin` WHERE `role` = 'admin' OR `role` = 'writer' ");
$row=mysqli_fetch_array($products);
mysqli_close($conn);
$regexResult = checkPrivilege();


?>
<section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <?php if(checkPrivilege('view/quantri.php')){ 
                    ?>
                <li>
                    <a href="./quantri.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('view/sanpham.php')){ ?>
                <li>
                    <a href="./sanpham.php">
                        <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Sản phẩm</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('view/thanhvien.php')){ ?>
                <li>
                    <a href="./thanhvien.php">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Thành viên</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('view/danhmuc.php')){ ?>
                <li>
                    <a href="./danhmuc.php">
                    <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Danh mục</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('view/quangcao.php')){ ?>
                <li>
                    <a href="./quangcao.php">
                        <span class="icon icon-6"><i class="ri-customer-service-line"></i></span>
                        <span class="sidebar--item">Quảng cáo</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('view/donhang.php')){ ?>
                <li>
                    <a href="./donhang.php">
                    <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
<span class="sidebar--item">Đơn hàng</span>
                    </a>
                </li>
                <?php } ?>

            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="#">
                        <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="./logout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>