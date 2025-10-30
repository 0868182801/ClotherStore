<?php include './header.php';
if(empty($_SESSION["cart"])){
    $_SESSION["cart"] = array("");
}
if (isset($_GET['action']) && isset($_SESSION['cart'])) {
    $error = false;
    function update_cart($add = false) {
        foreach ($_POST['quantity'] as $sanpham_id => $quantity) {
            if($quantity == 0){
                unset($_SESSION["cart"][$sanpham_id]);
            }else{
                if ($add) {
                    $_SESSION["cart"][$sanpham_id] += $quantity;
                }else{
                    $_SESSION["cart"][$sanpham_id] = $quantity;
                }
            }
            
           
        }
       
    }
    
    switch ($_GET['action']) {
        case 'add':
            update_cart(true);
            echo '<script>
                    // Mã JavaScript ở đây
                   
                    window.location.href = "giohang.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                </script>';
            break;
        case 'delete':
            if (isset($_GET['sanpham_id'])) {   
                unset($_SESSION['cart'][$_GET['sanpham_id']]);
            }
            echo '<script>
                    // Mã JavaScript ở đây
                    window.location.href = "giohang.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                </script>';
            break;
        case 'submit':
            if (isset($_POST['update_subimit'])) {
                update_cart();
                echo '<script>
                    // Mã JavaScript ở đây
                    window.location.href = "giohang.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                </script>';
            }elseif ($_POST['order_submit']) {
                if(empty($_POST['Name'])){
                    $error = 'Bạn chưa nhập đủ thông tin';
                   }elseif(empty($_POST['Phone'])){
                    $error = 'Bạn chưa nhập số điện thoại';
                   }elseif(empty($_POST['Address'])){
                    $error = 'Bạn chưa nhập địa chỉ giao hàng';
                   }
                if($error == false && !empty($_POST['quantity'])) {
                    $product = mysqli_query($conn , "SELECT * FROM `sanpham` WHERE `sanpham_id` IN (".implode(",", array_keys($_POST["quantity"])).")");
                    $total =0;
                    $orderProduct = array();
                    while($row= mysqli_fetch_assoc($product)){
                        $orderProduct[] = $row;
                       
                    }
                    $total = $_POST['totleCuoi'];
                    $inserOrder = mysqli_query($conn ," 
                    INSERT INTO `orders` (`order_id`, `order_name`, `order_phone`, `order_address`, `order_note`, `order_total`,`created_time`)
                     VALUES (NULL, '".$_POST['Name']."', '".$_POST['Phone']."', '".$_POST['Address']."', '".$_POST['note']."', '".$total."', '".time()."')
                    ");
                    $orderId= $conn->insert_id;
                    $insertString = "";
                    foreach($orderProduct as $key => $product){
                        $insertString .= "( NULL, '".$orderId."', '".$product['sanpham_id']."', '".$_POST['quantity'][$product['sanpham_id']]."', '".$product['sanpham_gia']."')" ;
                        if($key != count($orderProduct) -1 ){
                            $insertString .= ",";
                        }
                    }
                    $insertOrderId = mysqli_query($conn ," 
                    INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `sanpham_id`, `order_detai_quantity`, `order_detai_price`)
                     VALUES ".$insertString."
                    ");
                    unset($_SESSION["cart"]);
                    echo '<script>
                    // Mã JavaScript ở đây
                        window.location.href = "index.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';
                }
            }
            break;
        default:
            // Xử lý mặc định (nếu cần)
            break;
    }
}
if(!empty($_SESSION["cart"])){
    $product = mysqli_query($conn , "SELECT * FROM `sanpham` WHERE `sanpham_id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
    $cartItemCount = count( $_SESSION["cart"]) - 1;
}else {
    // Nếu không có giỏ hàng, số lượng mục là 0
    $cartItemCount = 0;
}

?>
<form action="giohang.php?action=submit"  style="padding-top: 80px;margin-bottom: 240px;height: auto;"  method="post"  novalidate class="cart_container">
    <div class="cart_container-left">
        <div class="checkout">
            <ul>
                <li class="activec">
                    <span>Giỏ hàng</span>
                </li>
                <li class="">
                    <span>Thanh toán</span>
                </li>
            </ul>
        </div>
        <div class="left--cat">
            <div class="cart-list">
                <h2 class="cart-title">Giỏ hàng của bạn 
                    <b>
                        <span class="cart-total"><?php echo $cartItemCount ?></span>
                        Sản phẩm</b>
                </h2>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th >Tên Sản phẩm</th>
                            <th >Chiết khấu</th>
                            <th >Số lượng</th>
                            <th >Tổng tiền</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                         if(!empty($product)){
                             $total = 0;
                             $Tong = 0;
                             $freeShip = 0;
                            while($row= mysqli_fetch_array($product)){
                                $total = $_SESSION["cart"][$row["sanpham_id"]] *  $row['sanpham_gia'] ;
                                $Tong += $total;
                                $freeShip = 2000 - $total;
                             ?>
                        <tr>
                            <td>
                                <div class="product-item">
                                    <div class="item-img">
                                        <a href="">
                                            <img src="../../sever/uploading/<?php echo $row['sanpham_img'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <a href="">
                                            <h3 class="content-title"><?php echo $row['sanpham_name'] ?></h3>
                                        </a>
                                        <div class="content__properties">
                                            <p>Màu sắc <span><?php echo $row['sanpham_mau'] ?></span></p>
                                            <p>Size <span style="text-transform: uppercase">L</span></p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-sale-price">
                                <!-- <p>-750.000đ</p> -->
                                <p class="cart-sale_item">0%</p>
                            </td>
                            <td>
                                <div class="product-detail__quantity-input">
                                    <input  type="text" value="<?=$_SESSION["cart"][$row["sanpham_id"]] ?>" name="quantity[<?=$row['sanpham_id']?>]">
                                    <div class="product-detail__quantity--increase">+</div>
                                    <div class="product-detail__quantity--decrease">-</div>
                                </div>
                            </td>
                            <td>
                                <div class="cart__product-item__price"><?=number_format($total , 0 , "," , ".")?>.000đ</div>
                            </td>
                            <td>
                                <a href="">
                                    <span class=" trashbin fa  fa-trash-o"></span>
                                </a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div style="display:flex;gap: 20px;"> 
                <a href="./index.php" class="cart-page btn-cart-continue">
                    <span style="margin-right: 8px; font-weight: 500; font-size: 13px;" class=" fa fa-angle-left">Tiếp tục để mua hàng</span>
                </a>
                <a href="#" class="cart-page btn-cart-continue">
                    <input style="margin-right: 8px; font-weight: 500; font-size: 13px;border: none; background: transparent;" type="submit" name="update_subimit" value="Cập nhật"></input>
                </a>
            </div>
        </div>
    </div>
    <div class="cart_container-right">
        <div class="cart-page__col-summary">
            <div class="cart-summary">
                <div class="cart-summary__overview">
                    <h3>Tổng tiền giỏ hàng</h3>
                    <div style="padding:15px 0;" class="cart-summary__overview__item">
                        <p>Tổng sản phẩm</p>
                        <p class="total-product"><?php echo $cartItemCount ?></p>
                    </div>
                    <div style="padding:15px 0;" class="cart-summary__overview__item">
                        <p>Tạm tính</p>
                        <p><b class="order-price-total"><?=number_format($Tong , 0 , "," , ".")?>.000đ</b></p>
                    </div>
                    <?php 
                    if(isset($_POST["applyDiscount"]) && $discountTotal = true){
                        $discount_code = $_POST["discountCode"];
                        if(!empty($discount_code)){
                    $discountTotal = mysqli_query($conn , "SELECT discount_sotien FROM discount WHERE discount_code = '$discount_code'");
                    if ($discountTotal && mysqli_num_rows($discountTotal) > 0) {
                        $row = mysqli_fetch_assoc($discountTotal);
                        $sotiengiam = $row["discount_sotien"];
                        $discountMa = $Tong * $sotiengiam / 100;
                        $totalS =  $Tong - $discountMa;}
                    if ($discountTotal && (mysqli_num_rows($discountTotal) > 0))  { ?>
                                        <div class="total-line__name" style="font-size: 14px;">Số tiền được giảm <input style="border: none;padding-left: 97px; background:transparent;text-align: end;" class="payment-due__price" value="<?=number_format($discountMa , 0 , "," , ".")?>.000đ" name="totleCuoi" readonly></div>
                    <div style="padding: 15px 0;"  class="cart-summary__overview__item">
                        <p>Tiền thanh toán</p>
                            <input style="border: none; background:transparent;text-align: end;" class="payment-due__price" value="<?=number_format($totalS , 0 , "," , ".")?>.000đ" name="totleCuoi" readonly>
                            <?php } }}else { ?>
                                <div class="cart-summary__overview__item">
                                    <p>Tiền thanh toán</p>
                                    <?php if(isset($totalS)) {?>
                                        <p><input readonly name="totleCuoi" style="text-align: end;border: none;" class="order-price-total" value="<?=number_format($totalS , 0 , "," , ".")?>.000đ">
                                    <?php } else{?>
                                        <p><input readonly name="totleCuoi" style="text-align: end;border: none;" class="order-price-total" value="<?=number_format($Tong , 0 , "," , ".")?>.000đ">
                                    <?php } ?>
                                </div>
                            <?php } ?>
                    </div>  
                    
                    <!-- <div class="cart-summary__overview__item">
                        <p>Thành tiền</p>
                        <p><b class="order-price-total"><?=number_format($Tong , 0 , "," , ".")?>.000đ</b></p>
                    </div> -->
                </div>
                <div class="cart-summary__note">
                    <div class="inner-note d-flex">
                        <div class="left-inner-note">
                            <span class="fa fa-exclamation-circle"></span>
                        </div>
                        <div class="content-inner-note">
                            <p>Miễn <b>đổi trả</b>  đối với sản phẩm đồng giá / sale trên 50%</p>
                        </div>
                        <div class="left-inner-note left-inner-note-shipping">
                            <span class="fa fa-exclamation-circle"></span>
                        </div>
                        <div class="content-inner-note content-inner-note-shipping">
                            <p>Miễn phí ship đơn hàng có tổng gía trị trên 2.000.000đ</p>
                            <?php if($Tong > 2000) { ?>
                                <div class="sub">Bạn được miễn phí ship cho đơn hàng này</div>
                            <?php }else{ ?>
                            <div class="sub">Mua thêm <b><?=number_format($freeShip , 0 , "," , ".")?>.000đ</b> để được miễn phí SHIP</div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form-group " method="POST" action="">
                        <?php if(isset($discount)) {  ?>
                                            <p style="color:red;"><?=$discount?></p>
                                        <?php } ?>
                                <div class="order-summary__section order-summary__section--discount-code"  id="discountCode">
                                <div class=" form-group" style="display: flex; gap:40px;">
                                    <div class="field__input-btn-wrapper">
                                        <input style="height: 100%;" oninput="checkInput()" name="discountCode" placeholder="Nhập mã giảm giá" type="text" id="userInput" class="form-control">
                                    </div>
                                    <input type="submit" class="btn btn--large btn--outline" name="applyDiscount" id="submitButton" value="Áp dụng" disabled>
                                    <!-- <button class="field__input-btn btn spinner" id="submitButton" disabled >
                                        <span class="spinner-label">Áp dụng</span>
                                    </button> -->
                                </div>
                                <script>
                                    function checkInput() {
                                            var userInput = document.getElementById("userInput");
                                            var submitButton = document.getElementById("submitButton");

                                            if (userInput.value.trim() !== "") {
                                                submitButton.removeAttribute("disabled");
                                            } else {
                                                submitButton.setAttribute("disabled", "disabled");
                                            }
                                            }
                                </script>                         
                                </div>
                    </form>
                        <div class="col-6">
                            <h3 class="checkout-title">Địa chỉ giao hàng</h3>
                            <?php if(!empty($error)){ ?>
                                <p style="color:red;"><?=$error?>!</p>
                            <?php } ?>
                        </div>
                        <div class="ds__item__contact-info">
                                <?php
                                if(isset($_SESSION["user_name"])){
                                    ?>
                                    <div class="row">
                                        <input required class="form-control col-6 form-group" type="text" value="<?=$_SESSION['user_name']?>" name="Name" placeholder="Họ tên">
                                        <input required class="form-control col-6 form-group" type="text" value name="Phone" placeholder="Nhập số điện thoại">
                                        <input required class="form-control col-6 form-group" type="text" value name="Address" placeholder="Nhập địa chỉ cụ thể">
                                        <div style="padding: 0;" class="col-12 form-group">
                                            <textarea style="width:70%;" name="note" id="note" placeholder="Ghi chú" class="field__input" data-bind="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
            <div class="cart-summary_button">
                <input class=" btn" style="width:100%;" type="submit" name="order_submit" value="Đặt hàng">
            </div>
        </div>
    </div>
</div>
</form>
<?php include './footer.php' ?>