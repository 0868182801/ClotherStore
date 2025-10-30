<?php
    session_start();
    $pageTitleAmin = "Trang phân quyền";
    include './header.php';
    include './menu.php';
    include '../mode/sanpham_class.php';
    include '../mode/config2.php';

    $sanpham_class = new Sanpham_class();


?>
<?php
if (!empty($_SESSION['user'])) {
    ?>
<div class="main--content">
<div class="sanpham_top">
        <div class="sanpham_top__left">
            <h2>Trang quản lí thành viên</h2>
        </div>
        <div class="sanpham_top__right">
            <button class="btn_them"><a href="./themtv.php">Thêm thành viên</a></button>
        </div>
    </div>
    <?php 
                        if(!empty($_GET['action']) && $_GET['action'] == 'save') {
                            $data = $_POST;
                            $insertString = "";
                            $deleteOldPrivileges = mysqli_query($conn, "DELETE FROM `user_privilege` WHERE `admin_id` = ".$data['admin_id']);
                            foreach ($data['privileges'] as $insertPrivilege) {
                                $insertString .= !empty($insertString) ? "," : "";
                                $insertString .= "(NULL,  '" . $insertPrivilege . "', '" . time() . "',' " . $data['admin_id'] . "')";
                            }
                            $insertPrivilege = mysqli_query($conn, "INSERT INTO `user_privilege` (`user_privilege_id`, `privilege_id`, `created_time`, `admin_id`) VALUES " . $insertString);
                            if(!$insertPrivilege){
                                $error = "Phân quyền không thành công. Xin thử lại";
                            }?>
                    <?php if(!empty($error)){ ?>

                    <?php } else { ?>
                         Phân quyền thành công.
                    <?php } ?>
                    <?php } else {?>
    <div class="sanpham_bottom">
            <div id="content-box">
                        <?php
                            $privileges = mysqli_query($conn,'SELECT * FROM privilege ' );
                            $privileges = mysqli_fetch_all($privileges , MYSQLI_ASSOC);

                            $privilegesGroup = mysqli_query($conn,'SELECT * FROM `privileges_group` ORDER BY privileges_group.privileges_group_position ASC' );
                            $privilegesGroup = mysqli_fetch_all($privilegesGroup,MYSQLI_ASSOC);

                            $currentPrivileges = mysqli_query($conn, "SELECT * FROM `user_privilege` WHERE `admin_id` = ".$_GET['admin_id']);
                            $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                            $currentPrivilegeList = array();
                            if(!empty($currentPrivileges)){
                                foreach($currentPrivileges as $currentPrivilege){
                                    $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                                }
                            }
                            ?>
                                <form id="editing-form" method="POST" action="?action=save" enctype="multipart/form-data">
                                    <input type="submit" title="Lưu thành viên" value="Lưu thành viên" style="position: absolute;right:35px;" />
                                    <input type="hidden" name="admin_id" value="<?=$_GET['admin_id']?>" />
                                    <div class="clear-both"></div>
                                    <?php foreach($privilegesGroup as $group) {?>
                                        <div class="privilege-group">
                                            <h3 class="group-name"><?= $group['privileges_group_name'] ?></h3>
                                            <ul style="display: flex;gap: 14%;padding:15px 45px;">
                                                <?php  foreach($privileges as $privilege) { ?>
                                                <?php if($privilege['privileges_group_id'] == $group['privileges_group_id']){ ?>
                                                <li>
                                                        <input type="checkbox"
                                                        <?php if(in_array($privilege['privilege_id'], $currentPrivilegeList)){ ?> 
                                                                checked
                                                                <?php } ?>
                                                                name="privileges[]"
                                                                value="<?php echo $privilege['privilege_id']?>" id="privilege_<?php echo $privilege['privilege_id']?>" 
                                                                 />
                                                        <label for="privilege__<?php echo $privilege['privilege_id']?>"><?php echo $privilege['privilege_name']?></label>
                                                </li>
                                                <?php }?>
                                                <?php }?>
                                                <div class="clear-both"></div>
                                            </ul>
                                        </div>
                                        <?php } ?>
                                </form>
                                <?php }?>
    </div>
</div>
<?php } ?>