<?php
$pageTitleAmin = "Trang quản trị";
include './header.php';
include './menu.php';
include '../mode/config2.php';
$user = mysqli_query($conn, "SELECT * FROM `user` ORDER BY user_id DESC" );

?>

<div class="main--content">
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Trang quản trị</h2>
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <img style="width: 155px;" src="../public/img/ShopVT.png" alt="">
                    </div>
                    <div class="card card-2">
                        <a href="./thanhvien.php" style="text-decoration: none;color:black;" >
                            <div class="card--data">
                                <div class="card--content">
                                    <h5 class="card--title">Thành viên</h5>
                                    <h1>1145</h1>
                                </div>
                                <i class="ri-user-line card--icon--lg"></i>
                            </div>
                            <div class="card--stats">
                                <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>82%</span>
                                <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>230</span>
                                <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>45</span>
                            </div>
                        </a>
                    </div>
                    <div class="card card-3">
                        <a style="text-decoration: none;color:black;" href="./magiamgia.php">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Mã giảm giá</h5>
                            </div>
                            <i class="ri-calendar-2-line card--icon--lg"></i>
                        </div>
                        <!-- <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>27%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>31</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>23</span>
                        </div> -->
                        </a>
                    </div>
                    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Beds Available</h5>
                                <h1>15</h1>
                            </div>
                            <i class="ri-hotel-bed-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>8%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>11</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Danh sách người dùng</h2>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên người dùng</th>
                                <th>Ngày tạo</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($user){
                                    while($result = mysqli_fetch_array($user) ){
                            ?>
                            <tr>
                                <td><?php echo $result['user_name'] ?></td>
                                <td><?php echo $result['created_time'] ?></td>
                                <td><?php echo $result['user_phone'] ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>