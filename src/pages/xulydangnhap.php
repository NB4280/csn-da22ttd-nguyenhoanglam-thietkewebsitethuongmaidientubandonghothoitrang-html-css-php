<?php
session_start();

include("../admin/config/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nhận dữ liệu từ form
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $result = $mysqli->query("SELECT * FROM KhachHang WHERE SoDienThoai='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if (password_verify($password, $user['MatKhau'])) {
            $_SESSION['user_id'] = $user['MaKhachHang'];
            $_SESSION['username'] = $user['HoTenKhachHang'];
            echo "<script>alert('Đăng nhập thành công!'); window.location.href='index.php';</script>";
            
            
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Người dùng không tồn tại!";
    }
    $mysqli->close();
}
?>
