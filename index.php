
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./client/public/main.css">
    <link rel="stylesheet" href="./client/public/sanpham.css">
    <link rel="stylesheet" href="./client/public/footer.css">
    <link rel="stylesheet" href="./client/public/giohang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header id="header" class="site-header" ">
        <div class="container d-flex">
            <nav class="main-menu" role="navigation"">
                <ul class="menu">
                    <li>Nam</li>
                    <li>Nữ</li>
                    <li>Trẻ em</li>
                </ul>
            </nav>
            <div class="site-brand">
                <a href="#">
                    <img src="./client/public/img/logo.png" alt="ShopVT">
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
                    <a href="./client/user/login.php">Đăng nhập</a>
                </div>
            </div>
        </div>
    </header>
    <main id="main" class="site-main">
        <div class="container">
            <section id="Slider">
                <div class="aspect-ratio-169">
                    <img src="./client/public/img/f9c8ca52372b942278437c2b2564c7f9.jpg" alt="">
                    <img src="./client/public/img/logologin.jpg" alt="">
                    <img src="./client/public/img/f9c8ca52372b942278437c2b2564c7f9.jpg" alt="">
                    <img src="./client/public/img/logologin.jpg" alt="">
                </div>
                <div class="dot-container">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <!-- <div class="slider-1"></div> -->
            </section>
            <script>
                const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
                const imgContainer = document.querySelector(".aspect-ratio-169")
                const dotItem = document.querySelectorAll(".dot")
            
            
                let index = 0
                let imgNumber = imgPosition.length
                // console.log(imgPosition)
            
            
                // 
                imgPosition.forEach(function(image,index){
                    image.style.left = index*100 + "%"
                    dotItem[index].addEventListener("click",function(){
                        slider(index)
                    })
                })
                function imgSlider(){
                    index++;
                    if(index >= imgNumber){
                        index = 0
                    }
                    slider(index)
                    // function slider(index){
                    // }
            
                }
                function slider(index){
                    imgContainer.style.left = "-" +index*100+ "%"
                    const dotActive = document.querySelector(".active")
                    dotActive.classList.remove("active")
                    dotItem[index].classList.add("active")
                }
                setInterval(imgSlider,2000)
            </script>
        </div>
        
        <div class="container-fluid">
                <section class="home-new-prod">
                    <div class="title-section">CYBER MONDAY</div>
                    <div class="exclusive-tabs">
                        <div class="exclusive-content">
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                            <div class="exclusive-inner active" id="tab-women">
                                <div class="list-products new-prod-slider owl-carousel owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; ">
                                            <div class="owl-item active" style="width: 330px; margin-right: 30px;">
                                                <div class="item-new-prod">
                                                    <div class="product">
                                                        <div class="thumb-product">
                                                            <a href="#" class="iframe-7">
                                                                <img src="./client/public/img/apm3299-dml-6.webp" alt="" class="lazy">
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <h3 class="title-product">
                                                                <a href="#">Áo sơ mi phối viền màu</a>
                                                            </h3>
                                                            <div class="price-product">
                                                                <ins>
                                                                    <span>595.000đ</span>
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
                        </div>
                        <div class="link-product">
                            <a href="#" class="all-product">Xem tất cả</a>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
    <div class="main-footer">
        <div class="footer-left">
            <div class="image">
                <div class="top-left">
                    <img src="/picture/logo.png" alt="">
                    <img src="/picture/img-congthuong.png" alt="">
                    <img src="/picture/dmca_protected_16_120.png" alt="">
                </div>
            </div>
            <div class="bottom-left">
                <p>Trường đại học Mỏ Địa chất</p>
                <p>Địa chỉ đăng ký:Trường đại học Mỏ Địa chất</p> 
                <p>Số điện thoại: 0585016xxx</p>
            </div>
            <div class="hotline">
                <a href="">Hotline: 0585 016 892</a>
            </div>
        </div>
        <div class="footer-center">
            <ul>Giới thiệu
                <li>Về ShopVT</li>
                <li>Tuyển dụng</li>
                <li>Hệ thống cửa hàng</li>
            </ul>
            <ul>Dịch vụ khách hànng
                <li>Chính sách điều khoản</li>
                <li>Hướng dẫn mua hàng</li>
                <li>Chính sách thanh toán</li>
                <li>Chính sách đổi trả</li>
                <li>Chính sách bảo hành</li>
                <li>Chính sách giao nhận vận chuyển</li>
            </ul>
            <ul>Liên hệ
                <li>Hotline</li>
                <li>Email</li>
                <li>Live Chat</li>
                <li>Messenger</li>
            </ul>
        </div>
        <div class="footer-right">
            <div class="form-footer">
                <p>Nhận thông tin các chương trình của IVY moda</p>
                <div class="submit1">
                    <input type="text" class="submit1__email" placeholder="Nhập địa chỉ email">
                    <div class="submit">
                        <input type="text" class="submit1__đk" placeholder="Đăng ký">
                    </div>
                </div>
            </div>
            <div class="image__2">
                <P style="font-weight: 600;
                font-size: 24px;
                line-height: 32px;
                color: #221F20;
                margin-bottom: 20px;">DOWLOAD APP</P>
                <img src="./client/public/img/appstore.png" alt="">
                <img src="./client/public/img/googleplay.png" alt="">
            </div>
        </div>
    </div>
    <div class="end"><p>© Design by HungDev</p></div>
</footer>