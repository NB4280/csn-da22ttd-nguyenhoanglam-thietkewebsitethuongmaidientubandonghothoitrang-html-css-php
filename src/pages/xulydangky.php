<?php
session_start();
include("../admin/config/config.php");

if (isset($_POST['register'])) {
    $hoten = mysqli_real_escape_string($mysqli, $_POST['hoten']);
    $diachi = mysqli_real_escape_string($mysqli, $_POST['diachi']);
    $gioitinh = mysqli_real_escape_string($mysqli, $_POST['gioitinh']);
    $sodienthoai = mysqli_real_escape_string($mysqli, $_POST['sodienthoai']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($mysqli, $_POST['confirm_password']);


    if ($password !== $confirm_password) {
        echo "<script>alert('Mật khẩu không khớp!');</script>";
    } else {
      
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check_phone_query = "SELECT * FROM khachhang WHERE SoDienThoai = '$sodienthoai'";
        $result = mysqli_query($mysqli, $check_phone_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Số điện thoại đã được sử dụng!');</script>";
        } else {
            
            $sql_insert = "INSERT INTO khachhang (HoTenKhachHang, DiaChi, GioiTinh, SoDienThoai, `MatKhau`) 
                           VALUES ('$hoten', '$diachi', '$gioitinh', '$sodienthoai', '$hashed_password')";
            if (mysqli_query($mysqli, $sql_insert)) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href='dangnhap.php';</script>";
                $_SESSION['dangky'] = $hoten;

            } else {
                echo "<script>alert('Lỗi khi đăng ký!');</script>";
            }
        }
    }
}
?>
