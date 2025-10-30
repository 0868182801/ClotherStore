<?php
$sanpham = mysqli_query($conn , "SELECT * FROM `sanpham` WHERE `sale_id` = 1");
$sale = mysqli_query($conn , "SELECT * FROM `sale` WHERE `sale_id` = 1");

?>
            <div class="container-fluid">
                <section class="home-new-prod">
                    <div class="title-section">BÁN CHẠY NHẤT NĂM</div>
                    <div class="exclusive-tabs">
                        
                        <div class="exclusive-content">
                        <?php
                            while($kq = mysqli_fetch_array($sanpham)){
                        ?>
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="./sanpham.php?sanpham_id=<?php echo $kq['sanpham_id'] ?>" class="iframe-7">
                                                                <img src="../../sever/uploading/<?php echo $kq['sanpham_img'] ?>" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="./sanpham.php?sanpham_id=<?php echo $kq['sanpham_id'] ?>"><?php echo $kq['sanpham_name'] ?></a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span><?=number_format($kq['sanpham_gia'] , 0 , "," , ".")?>.000đ</span>
                                                                </ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <?php $row = mysqli_fetch_array($sale) ?>
                        </div>
                        <div class="link-product">
                            <a href="./name.php?sale_id=<?php echo $row['sale_id'] ?>" class="all-product">Xem tất cả</a>
                        </div>
                    </div>
                </section>
            </div>