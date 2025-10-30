<?php 
include './header.php';
$result = mysqli_query($conn ,"SELECT * FROM `sanpham` WHERE `sanpham_id` = ".$_GET['sanpham_id'] );
$product=mysqli_fetch_array($result);
$size = mysqli_query($conn ,"SELECT * FROM size ORDER BY size_id DESC" );
?>
<section style="padding-top: 80px;" class="product">
    <div class="container__2">
        <div class="container-top ">
            <p>Trang chủ</p>
            <span>&#8594;</span>
            <p><?php echo $product['sanpham_name'] ?></p>
        </div>
        <div class="product__content row">
            <div class="product__content-left row">
                <div class="product__content-left--smallimg">
                    <!-- <img src="../public/img/apm3299-dml-6.webp" alt="">
                    <img src="../public/img/apm3299-dml-6.webp" alt="">
                    <img src="../public/img/apm3299-dml-6.webp" alt="">
                    <img src="../public/img/apm3299-dml-6.webp" alt=""> -->
                </div>
                <div class="product__content-left--bigimg">
                    <img src="../../sever/uploading/<?php echo $product['sanpham_img'] ?>" alt="">
                </div>
            </div>
            <div class="product__content-right">
                <h1><?php echo $product['sanpham_name'] ?></h1>
                <div class="product__content-right--info">
                    <p><?php echo $product['sanpham_ma'] ?>></p>
                    <!-- <div><span>(0 đánh giá)</span></div> -->
                </div>

                <div class="product__content-right--price">
                    <b style="color:red;"><?=number_format($product['sanpham_gia'] , 0 , "," , ".")?>.000đ</b>
                    <!-- <del>740.000đ</del> -->
                    <!-- <div class="product__content-right--price-sale">30 <span>%</span></div> -->
                </div>
                <div class="product__content-right--color">
                    <p>Màu sắc: <?php echo $product['sanpham_mau'] ?></p>
                    <div></div>
                </div>
                <div class="product__content-right--size">
                <form action="giohang.php?action=add" method="POST" style="width:100%;">
                                                        <div class=" ">
                                                            <div class="options-title">
                                                                <p id="selectedSizeLabel">Kích thước: </p>
                                                                <p id="error" style="opacity: 0.5;"  >Vui lòng nhập kích thước sản phẩm</p>
                                                            </div>
                                                            <div style="display: flow-root;padding: 18px 0px;">
                                                                    <?php
                                                                        while( $sizes = mysqli_fetch_array($size)){
                                                                     ?>
                                                                    <input type="radio" id="sizeXS" class="size" name="size" value="<?=$sizes['size_name'] ?>">
                                                                    <label for="sizeXS"><?=$sizes['size_name'] ?></label>
                                                                    <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div id="from-action-addcart" class="clearfix from-action-addcart">
                                                            <div class="qty-ant clearfix custom-btn-number" style="display: flex;">
                                                                <label class="" for="">Số lượng : </label>
                                                                <input style="outline: none;padding: 0 15px;width: 45px;" type="text" value="1" name="quantity[<?=$product['sanpham_id']?>]">
                                                            </div>
                                                            <div class="product__content-right--actions">
                                                                <button  disabled  id="proceedButton" class="submit1__buton btn__largen btn btn__click"  type="submit">Thêm vào giỏ</button>
                                                                <!-- <a href="">
                                                                    <button  class=" btn_out btn__largen btn submit1__buton btn__click1">Mua hàng</button>
                                                                </a> -->
                                                                <button class="fa fa-heart btn__largen btn_out btn__click1 " style="display: flex; width: 48px; align-items: center; justify-content: center; text-align: center ;"></button>
                                                                <!-- <div class="product__content-right--actions-find"> Tìm tại cửa hàng
                                                                    <div class="divider"></div>
                                                                </div> -->
                                                        </div>
                                                        </div>
                                                        <script>
                                                                    const sizeLabels = document.querySelectorAll("input[name='size']");
                                                                    const selectedSizeLabel = document.getElementById("selectedSizeLabel");
                                                                    const proceedButton = document.getElementById("proceedButton");
                                                                    const error = document.getElementById("error");
                                                                    // Lắng nghe sự kiện khi người dùng chọn một kích thước mới.
                                                                    sizeLabels.forEach(sizeLabel => {
                                                                        sizeLabel.addEventListener("change", function() {
                                                                            // Lấy giá trị đã chọn từ radio button được chọn.
                                                                            const selectedSize = document.querySelector("input[name='size']:checked").value;
                                                                            if(selectedSize){
                                                                                proceedButton.disabled =false;
                                                                                error.style.display = "none";
                                                                            }else{
                                                                                proceedButton.disabled =true;
                                                                                error.style.display = "block";

                                                                            }
                                                                            // Cập nhật nội dung của label để hiển thị kích thước đã chọn.
                                                                            selectedSizeLabel.textContent = "Kích thước: " + selectedSize;
                                                                        });
                                                                    });
                                                                </script>
                                                    </form>
                    </div>
                    <a href="" class="check-size">
                        <span class="fa fa-rule-1"> Kiểm tra size của bạn</span></a>
                        <div class="table-size-product"></div>
                    
                    <div class="product__content-right--tab">
                        <div class="product__content-right--tab-bottom">
                            <div class="v">
                                &#8744;
                            </div>
                        </div>
                        <div class="product__content-right--tab-header">
                            <div class="tab-item active baoquan ">
                                <span>GIỚI THIỆU</span>
                            </div>
                            <div class="tab-item result chitiet ">
                                <span>CHI TIẾT SẢN PHẨM</span>
                            </div>
                            <div class="tab-item  ">
                                <span>BẢO QUẢN</span>
                            </div>
                        </div>
                        <div class="product__content-right--tab-body">
                            <div class="product__content-right--tab-body">
                                <p>Set đồ&nbsp;gồm áo khoác dáng suông&nbsp;và chân váy chữ A. Thiết kế áo khoác cổ điển với&nbsp;chi tiết cổ tròn phối viền trắng, ngực trái phối nơ tạo điểm nhấn. Chân váy chữ A độ dài trên đầu gối giúp khoe dáng nàng.</p>
                                <p>Đặc biệt, chất vải được sử dụng là các sợi tuysi nhiều màu sắc, cùng công nghệ dệt may độc đáo đã tạo nên chất liệu vải mang vẻ sang trọng của Tweed nhưng lại mềm mát như Tuysi. Bởi vậy nàng có thể diện set đồ nhiều mùa trong năm hơn.</p>
                                <p>Đặc biệt, chất vải được sử dụng là các sợi tuysi nhiều màu sắc, cùng công nghệ dệt may độc đáo đã tạo nên chất liệu vải mang vẻ sang trọng của Tweed nhưng lại mềm mát như Tuysi. Bởi vậy nàng có thể diện set đồ nhiều mùa trong năm hơn.</p>
                                <p>Đặc biệt, chất vải được sử dụng là các sợi tuysi nhiều màu sắc, cùng công nghệ dệt may độc đáo đã tạo nên chất liệu vải mang vẻ sang trọng của Tweed nhưng lại mềm mát như Tuysi. Bởi vậy nàng có thể diện set đồ nhiều mùa trong năm hơn.</p>
                                <p>Đặc biệt, chất vải được sử dụng là các sợi tuysi nhiều màu sắc, cùng công nghệ dệt may độc đáo đã tạo nên chất liệu vải mang vẻ sang trọng của Tweed nhưng lại mềm mát như Tuysi. Bởi vậy nàng có thể diện set đồ nhiều mùa trong năm hơn.</p>
                                <p>Đặc biệt, chất vải được sử dụng là các sợi tuysi nhiều màu sắc, cùng công nghệ dệt may độc đáo đã tạo nên chất liệu vải mang vẻ sang trọng của Tweed nhưng lại mềm mát như Tuysi. Bởi vậy nàng có thể diện set đồ nhiều mùa trong năm hơn.</p>
                            </div>
                            <!-- <div class="product__content-right--tab-body---b">
                                <h1>Hưng</h1>
                            </div>
                            <div class="product__content-right--tab-body---c">
                                <h1>hưng</h1>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include './sessionnu.php' ?>
    </div>
</section>
<script>
    const bigImg = document.querySelector(".product__content-left--bigimg img")
    const smallImg = document.querySelectorAll(".product__content-left--smallimg img")
    smallImg.forEach(function(imgTem , X){
        imgTem.addEventListener("click" , function(){
            bigImg.src = imgTem.src
        })
    })
     
    // const baoquan = document.querySelector(".baoquan")
    // const chitiet = document.querySelector(".chitiet")
    // if(baoquan){
    //     baoquan.addEventListener("click" , function(){
    //         document.querySelector(".product__content-right--tab-body---b").style.display= "block"
    //         document.querySelector(".product__content-right--tab-body---c").style.display= "none"
    //     })
    // }
    // if(chitiet){
    //     chitiet.addEventListener("click" , function(){
    //         document.querySelector(".product__content-right--tab-body---b").style.display= "none"
    //         document.querySelector(".product__content-right--tab-body---c").style.display= "block"
    //     })
    // }
    // const result = document.querySelector(".result")
    // result.addEventListener("click" , function(){
    //     document.querySelector(".ct").classList.add("active")
    //     document.querySelector(".gt").classList.remove("active")
    // })

    const butTon = document.querySelector(".product__content-right--tab-bottom")
    if(butTon){
        butTon.addEventListener("click" , function(){
            document.querySelector(".product__content-right--tab-body").classList.toggle("activeB")
        })}
    
    
</script>
<?php include './footer.php' ?>