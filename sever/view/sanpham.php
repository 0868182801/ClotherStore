<?php
    $pageTitleAmin = "Trang sản phẩm";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    $show_sanpham = $sanpham_class -> show_sanpham();


?>
<div class="main--content">
    <div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí sản phẩm</h2>
        </div>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themsanpham.php">Thêm sản phẩm</a></button>
        </div>
    </div>
    <div class="sanpham_bottom">
        <div class="sanpham_table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Size sản phẩm</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($show_sanpham){
                            $num =0;
                            while($kq = $show_sanpham -> fetch_assoc()){
                                $num ++;
                    ?>
                    <tr>
                    <td scope="row"><?php echo $num?></td>
                    <td><?php echo $kq['sanpham_name']  ?></td>
                    <td><img style="width:75%; height:205px;" src="../uploading/<?php echo $kq['sanpham_img'] ?>" alt=""></td>
                    <td><?=number_format($kq['sanpham_gia'] , 0 , "," , ".")?>.000đ</td>
                    <td><?php echo $kq['sanpham_size']  ?></td>
                    <td><?php echo $kq['sanpham_ma']  ?></td>
                    <td><a class="a_btn" href="./xoasp.php?sanpham_id=<?php echo $kq['sanpham_id']?>"><i class="ri-delete-bin-line delete"></i></a></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
        </table>
        </div>
    </div>



</div>