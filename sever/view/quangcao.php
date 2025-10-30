<?php
    $pageTitleAmin = "Trang quảng cáo";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    $show_slide = $sanpham_class ->show_slide();

?>
<div class="main--content">
    <div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí slide</h2>
        </div>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themslide.php">Thêm slide</a></button>
        </div>
    </div>
    <div class="sanpham_bottom">
        <div class="sanpham_table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh Slide</th>
                    <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($show_slide){
                            $num =0;
                            while($kq = $show_slide -> fetch_assoc()){
                                $num ++;
                    ?>
                    <tr>
                    <td scope="row"><?php echo $num?></td>
                    <td><img style="width:50%; height:200px;" src="../uploading/<?php echo $kq['slide_img'] ?>" alt=""></td>
                    <td><a class="a_btn" href="./xoaslide.php?slide_id=<?php echo $kq['slide_id']?>"><i class="ri-delete-bin-line delete"></i></a></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
        </table>
        </div>
    </div>



</div>