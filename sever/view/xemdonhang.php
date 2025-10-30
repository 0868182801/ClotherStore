<?php
    $pageTitleAmin = "Trang đơn hàng";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';
    include '../mode/config2.php';

    $orders = mysqli_query($conn, "SELECT orders.order_name, orders.order_address, orders.order_phone, orders.order_note,orders.order_total, order_detail.*, sanpham.sanpham_name as sanpham_name FROM orders INNER JOIN order_detail ON orders.order_id = order_detail.order_id 
            INNER JOIN sanpham 
            ON sanpham.sanpham_id = order_detail.sanpham_id 
            WHERE orders.order_id = "  . $_GET['order_id']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
?>
<div style="    padding-top: 60px;" class="main--content">
        <button class="btn_them" style="margin:20px 0;"><a href="javascript:history.back()">Quay lại</a></button>
            <div style="    width: 30%;border: 1px solid;padding: 36px;position: absolute;    left: 32%;" class="content-left-cartelogy_add">
               <div class="inhoadon">
               <h1>Hóa đơn chi tiết<span style="color:red;">*</span></h1>
                    <div id="order-detail-wrapper">
                    <div id="order-detail">
                        <label>Người nhận: </label><span> <?=$orders[0]['order_name'] ?></span><br/>    
                        <label>Điện thoại: </label><span><?= $orders[0]['order_phone'] ?></span><br/>
                        <label>Địa chỉ: </label><span>  <?= $orders[0]['order_address'] ?></span><br/>
                        <hr/>
                        <h3>Danh sách sản phẩm</h3>
                        <ul>
                            <?php
                            $totalQuantity = 0;
                            foreach ($orders as $row) {
                                ?>
                                <li>
                                    <span class="item-name"><?= $row['sanpham_name'] ?></span>
                                    <span class="item-quantity"> - SL:  /*<?=$row['order_detai_quantity'] ?> */sản phẩm</span>
                                </li>
                                <?php
                                $totalQuantity += $row['order_detai_quantity'];
                            }
                            ?>
                        </ul>
                        <hr/>
                        <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?=number_format($orders[0]['order_total'] , 0 , "," , ".")?>.000đ
                        <p><label>Ghi chú: </label><?= $orders[0]['order_note'] ?></p>
                    </div>
                </div>
            </div>
</div>