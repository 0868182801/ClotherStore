<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/login1.css">
    <link rel="icon" href="./public/img/ShopVT.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Đăng nhập vào trang quản </title>
</head>
<?php
session_start();
if (isset($_POST['login'])) {
    // Kết nối đến cơ sở dữ liệu
    $db = new mysqli('localhost', 'root', '', 'webquanao');

    // Kiểm tra kết nối
    if ($db->connect_error) {
        die("Kết nối thất bại: " . $db->connect_error);
    }

    // Lấy dữ liệu từ form đăng nhập
    $admin_email = $_POST['admin_email'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM admin WHERE admin_email= '$admin_email' AND admin_pass = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows == 1 ) {
        $error = array();
        // Đăng nhập thành công, lưu thông tin người dùng vào session
        $user = $result->fetch_assoc();
        $_SESSION['admin_name'] = $user['admin_name'];
        $_SESSION['admin_id'] = $user['admin_id'];
        $_SESSION['admin_img'] = $user['admin_img'];
        $_SESSION['role'] = $user['role'];
        if($user['role'] === 'admin' || $user['role'] === 'writer') {
            $userPrivileges = mysqli_query($db,'SELECT * FROM `user_privilege` 
            INNER JOIN `privilege`
             ON `user_privilege`.`privilege_id` = `privilege`.`privilege_id` 
             WHERE `user_privilege`.`admin_id` = '.$user['admin_id']);
             $userPrivileges = mysqli_fetch_all($userPrivileges , MYSQLI_ASSOC);
             
             if(isset($userPrivileges)){
                $user['privileges'] = array();
                foreach($userPrivileges as $privilege){
                    $user['privileges'][] = $privilege['privilege_url_match'];
                }
               
            }
            $_SESSION['user']['privileges'] = $user['privileges'];

            header('Location: ./view/quantri.php'); // Chuyển hướng đến trang dành cho quản trị viên
        }
        else {
            $error['nopass'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
           
        }
}
?>
<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Đăng nhập vào trang quản trị</span>
                <?php if(isset($error['nopass'] )){ ?>
                    <p><?php echo $error['nopass'] ?></p>
                <?php } ?>
                <header>Login</header>
            </div>
            <form method="post" class="">
            <div class="input-field">
                <input type="text" name="admin_email" class="input" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" class="input" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" name="login" value="Login">
            </div>
            </form>
            <div class="bottom">
                <!-- <div class="left">
                    <input type="checkbox"  id="check">
                    <label for="check"> Remember Me</label>
                </div> -->
                <div class="right">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>