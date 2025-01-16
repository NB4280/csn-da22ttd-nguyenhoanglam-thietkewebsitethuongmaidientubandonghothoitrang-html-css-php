<?php
session_start();
include '../admin/config/config.php'; 

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: dangnhap.php");
    exit;
}

$user_id = $_SESSION['user_id']; // Lấy ID người dùng từ session
$product_id = $_POST['idsanpham']; // Lấy ID sản phẩm từ URL
$soluong = 1; // Mặc định số lượng là 1

// Lấy thông tin sản phẩm từ bảng sanpham
$sql = "SELECT * FROM sanpham WHERE MaSanPham = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product_result = $stmt->get_result();

if ($product_result->num_rows > 0) {
    $product = $product_result->fetch_assoc();

    // Kiểm tra xem người dùng đã có giỏ hàng hay chưa
    $sql_check_cart = "SELECT * FROM giohang WHERE MaKhachHang = ?";
    $stmt = $mysqli->prepare($sql_check_cart);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_result = $stmt->get_result();

    if ($cart_result->num_rows > 0) {
        // Nếu giỏ hàng đã tồn tại, lấy MaGioHang
        $cart = $cart_result->fetch_assoc();
        $cart_id = $cart['MaGioHang'];
    } else {
        // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới
        $sql_create_cart = "INSERT INTO giohang (MaKhachHang) VALUES (?)";
        $stmt = $mysqli->prepare($sql_create_cart);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $cart_id = $stmt->insert_id; // Lấy MaGioHang mới được tạo
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql_check_product_in_cart = "SELECT * FROM chitietgiohang WHERE MaGioHang = ? AND MaSanPham = ?";
    $stmt = $mysqli->prepare($sql_check_product_in_cart);
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
    $product_in_cart_result = $stmt->get_result();



    if ($product_in_cart_result->num_rows > 0) {
        // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
        $sql_update_quantity = "UPDATE chitietgiohang SET soluongSP = soluongSP + 1, TongGia = (soluongSP + 1) * ? WHERE MaGioHang = ? AND MaSanPham = ?";
        $stmt = $mysqli->prepare($sql_update_quantity);
        $stmt->bind_param("dii",$product['GiaBan'], $cart_id, $product_id);
        $stmt->execute();
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới sản phẩm vào giỏ hàng
        $Tong = $product['GiaBan'];
        $sql_add_to_cart = "INSERT INTO chitietgiohang (MaGioHang, MaSanPham, soluongSP, TongGia) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql_add_to_cart);
        $stmt->bind_param("iiid", $cart_id, $product_id, $soluong,$Tong);
        $stmt->execute();
    }

    // Quay lại trang giỏ hàng
    header("Location: giohang.php");
    exit;
} else {
    // Nếu không tìm thấy sản phẩm, chuyển hướng về trang chủ
    header("Location: index.php");
    exit;
}
?>