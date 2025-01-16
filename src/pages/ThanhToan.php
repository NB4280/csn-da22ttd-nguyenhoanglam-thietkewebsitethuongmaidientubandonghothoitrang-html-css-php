<?php
session_start();
include '../admin/config/config.php'; 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Truy vấn giỏ hàng của người dùng
    $query = "SELECT c.MaChiTietGioHang, c.MaSanPham, s.TenSanPham, c.soluongSP, c.TongGia, s.HinhAnh, s.GiaBan 
              FROM chitietgiohang c
              JOIN sanpham s ON c.MaSanPham = s.MaSanPham
              WHERE c.MaGioHang = (SELECT MaGioHang FROM giohang WHERE MaKhachHang = ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Lấy thông tin khách hàng
    $customer_query = "SELECT HoTenKhachHang, DiaChi, SoDienThoai FROM khachhang WHERE MaKhachHang = ?";
    $customer_stmt = $mysqli->prepare($customer_query);
    $customer_stmt->bind_param("i", $user_id);
    $customer_stmt->execute();
    $customer_result = $customer_stmt->get_result();
    $customer = $customer_result->fetch_assoc();

    function tinhTongTien($cart_items) {
        $tongtien = 0;
        foreach ($cart_items as $item) {
            $tongtien += $item['GiaBan'] * $item['soluongSP'];
        }
        return $tongtien;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['thanh_toan'])) {
            // Lấy thông tin thanh toán từ form
            $ho_ten = $_POST['ho_ten'];
            $dia_chi = $_POST['dia_chi'];
            $sdt = $_POST['sdt'];

            // Tiến hành tạo đơn hàng và cập nhật trạng thái giỏ hàng
            $insert_order_query = "INSERT INTO donhang (MaKhachHang,TongTien,NgayDatHang) 
                                   VALUES (?, ?, NOW())";
            $stmt_order = $mysqli->prepare($insert_order_query);
            $stmt_order->bind_param("ii", $user_id,tinhTongTien($result));
            $stmt_order->execute();

            // Lấy ID đơn hàng vừa tạo
            $order_id = $stmt_order->insert_id;

            // Thêm các sản phẩm vào bảng chi tiết đơn hàng
            while ($row = $result->fetch_assoc()) {
                $insert_order_detail_query = "INSERT INTO chitietdonhang (MaDonHang, MaSanPham, SoLuong, GiaBan, TongGia) 
                                              VALUES (?, ?, ?, ?, ?)";
                $stmt_order_detail = $mysqli->prepare($insert_order_detail_query);
                $stmt_order_detail->bind_param("iiidd", $order_id, $row['MaSanPham'], $row['soluongSP'], $row['GiaBan'], $row['TongGia']);
                $stmt_order_detail->execute();
            }

            // Xóa giỏ hàng sau khi thanh toán
            $delete_cart_query = "DELETE FROM chitietgiohang WHERE MaGioHang = (SELECT MaGioHang FROM giohang WHERE MaKhachHang = ?)";
            $stmt_delete_cart = $mysqli->prepare($delete_cart_query);
            $stmt_delete_cart->bind_param("i", $user_id);
            $stmt_delete_cart->execute();

            // Điều hướng tới trang cảm ơn hoặc trang xác nhận thanh toán
            header("Location: camon.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Arial', sans-serif; }
        .card { border-radius: 15px; }
        .card-header { background-color: #007bff; color: white; font-size: 1.25rem; }
        .btn-danger { font-size: 1rem; padding: 5px 10px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">Thông tin thanh toán</div>
        <div class="card-body">
            <form method="POST" action="thanhtoan.php">
                <div class="mb-3">
                    <label for="ho_ten" class="form-label">Họ và Tên</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $customer['HoTenKhachHang']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?php echo $customer['DiaChi']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $customer['SoDienThoai']; ?>" required>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="" name="" value="Thanh toán khi nhận hàng" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h4>Tổng tiền: <?php echo number_format(tinhTongTien($result), 0, ',', '.'); ?> VNĐ</h4>
                    <button type="submit" name="thanh_toan" class="btn btn-success">Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
