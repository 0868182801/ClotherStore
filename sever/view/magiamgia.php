<?php
    $pageTitleAmin = "Mã giảm giá";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    $show_discount = $sanpham_class -> show_discount();


?>
<div class="main--content">
    <div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí mã giảm giá</h2>
        </div>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themdiscount.php">Thêm mã giảm giá</a></button>
        </div>
    </div>
    <div class="sanpham_bottom">
        <div class="sanpham_table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã giảm giá</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($show_discount){
                            $num =0;
                            while($kq = $show_discount -> fetch_assoc()){
                                $num ++;
                    ?>
                    <tr>
                    <td scope="row"><?php echo $num?></td>
                    <td><?php echo $kq['discount_code']  ?></td>
                    <td><?php echo $kq['discount_sotien']  ?>%</td>
                    <td><a class="a_btn" href="./xoadiscount.php?discount_id=<?php echo $kq['discount_id']?>"><i class="ri-delete-bin-line delete"></i></a></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
        </table>
        </div>
    </div>



</div>