<?php
session_start();
include '../admin/config/config.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Lấy thông tin giỏ hàng
    $query = "SELECT c.MaChiTietGioHang, c.MaSanPham, s.TenSanPham, c.soluongSP, c.TongGia, s.HinhAnh, s.GiaBan 
              FROM chitietgiohang c
              JOIN sanpham s ON c.MaSanPham = s.MaSanPham
              WHERE c.MaGioHang = (SELECT MaGioHang FROM giohang WHERE MaKhachHang = ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Hàm tính tổng tiền giỏ hàng
    function tinhTongTien($cart_items) {
        $tongtien = 0;
        foreach ($cart_items as $item) {
            $tongtien += $item['GiaBan'] * $item['soluongSP'];
        }
        return $tongtien;
    }

    // Kiểm tra nếu giỏ hàng rỗng
    $cart_empty = $result->num_rows === 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý xóa sản phẩm khỏi giỏ hàng
        if (isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $delete_query = "DELETE FROM chitietgiohang WHERE MaChiTietGioHang = ?";
            $delete_stmt = $mysqli->prepare($delete_query);
            $delete_stmt->bind_param("i", $delete_id);
            $delete_stmt->execute();
            header("Location: giohang.php");
            exit();
        }

        // Xử lý cập nhật giỏ hàng
        if (isset($_POST['capnhat'])) {
            foreach ($_POST['soluong'] as $id => $soluong) {
                // Lấy giá sản phẩm từ bảng 'sanpham'
                if($soluong != 0){
                    $product_query = "SELECT GiaBan FROM sanpham WHERE MaSanPham = (SELECT MaSanPham FROM chitietgiohang WHERE MaChiTietGioHang = ?)";
                $product_stmt = $mysqli->prepare($product_query);
                $product_stmt->bind_param("i", $id);
                $product_stmt->execute();
                $product_result = $product_stmt->get_result();
                $product = $product_result->fetch_assoc();

                // Cập nhật số lượng và giá tổng trong giỏ hàng
                $update_query = "UPDATE chitietgiohang SET soluongSP = ?, TongGia = soluongSP * ? WHERE MaChiTietGioHang = ?";
                $update_stmt = $mysqli->prepare($update_query);
                $update_stmt->bind_param("idi", $soluong, $product['GiaBan'], $id);
                $update_stmt->execute();
                }
                else{
                    $delete_query = "DELETE FROM chitietgiohang WHERE MaChiTietGioHang = ?";
                    $delete_stmt = $mysqli->prepare($delete_query);
                    $delete_stmt->bind_param("i", $id);
                    $delete_stmt->execute();
                    // header("Location: giohang.php");
                }
                
            }
            header("Location: giohang.php");
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
    <title>Giỏ Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Arial', sans-serif; }
        .card { border-radius: 15px; }
        .card-header { background-color: #007bff; color: white; font-size: 1.25rem; }
        table th, table td { text-align: center; }
        .btn-danger { font-size: 1rem; padding: 5px 10px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">Giỏ hàng của bạn</div>
        <div class="card-body">
            <form method="POST" action="giohang.php">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><img src="../admin/modules/quanlysanpham/uploads/<?php echo $row['HinhAnh']; ?>" alt="<?php echo $row['TenSanPham']; ?>" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                    <td><?php echo $row['TenSanPham']; ?></td>
                                    <td><?php echo number_format($row['GiaBan'], 0, ',', '.'); ?> VNĐ</td>
                                    <td>
                                        <input type="number" name="soluong[<?php echo $row['MaChiTietGioHang']; ?>]" value="<?php echo $row['soluongSP']; ?>" min="0" class="form-control" style="max-width: 100px; margin: 0 auto;">
                                    </td>
                                    <td><?php echo number_format($row['TongGia'], 0, ',', '.'); ?> VNĐ</td>
                                    
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Giỏ hàng của bạn hiện tại chưa có sản phẩm.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="index.php" class="btn btn-primary">Trở lại mua sắm</a>
                    <h4>Tổng tiền: <?php echo isset($result) ? number_format(tinhTongTien($result), 0, ',', '.') : 0; ?> VNĐ</h4>
                    <button type="submit" name="capnhat" class="btn btn-success" <?php echo $cart_empty ? 'disabled' : ''; ?>>Cập nhật giỏ hàng</button>
                </div>
                <div class="text-center mt-3">
                    <a href="<?php echo $cart_empty ? '#' : 'thanhtoan.php'; ?>" class="btn btn-warning <?php echo $cart_empty ? 'disabled' : ''; ?>" <?php echo $cart_empty ? 'onclick="return false;"' : ''; ?>>Thanh toán</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
