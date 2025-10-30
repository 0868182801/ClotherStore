<?php
    $pageTitleAmin = "Trang danh mục";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';

    $sanpham_class = new Sanpham_class();
    $show_danhmuc = $sanpham_class -> show_danhmuc();

?>
<div class="main--content">
    <div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí danh mục</h2>
        </div>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themdanhmuc.php">Thêm danh mục</a></button>
        </div>
    </div>
    <div class="sanpham_bottom">
        <div class="sanpham_table">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($show_danhmuc){
                            $num =0;
                            while($kq = $show_danhmuc -> fetch_assoc()){
                                $num ++;
                    ?>
                    <tr>
                    <td scope="row"><?php echo $num?></td>
                    <td><?php echo $kq['danhmuc_name']  ?></td>
                    <td><a style="padding: 0 10px;" class="a_btn" href="./suadm.php?danhmuc_id=<?php echo $kq['danhmuc_id']?>"><i class="ri-edit-line edit"></i></a>|<a style="padding: 0 10px;"  class="a_btn" href="./xoadm.php?danhmuc_id=<?php echo $kq['danhmuc_id']?>"><i class="ri-delete-bin-line delete"></i></a></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
        </table>
        </div>
    </div>



</div>