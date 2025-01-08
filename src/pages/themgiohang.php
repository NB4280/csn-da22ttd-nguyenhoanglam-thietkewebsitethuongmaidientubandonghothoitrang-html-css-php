<?php
session_start();
include '../admin/config/config.php'; 


if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
    // Xóa sản phẩm khỏi giỏ hàng
    unset($_SESSION['cart'][$_GET['id']]);
    // Quay lại trang giỏ hàng
    header("Location: giohang.php");
    exit;
}

if (isset($_POST['idsanpham'])) {
    $idsanpham = intval($_POST['idsanpham']);

    // Kiểm tra sản phẩm có tồn tại trong cơ sở dữ liệu không
    $sql = "SELECT * FROM sanpham WHERE MaSanPham = $idsanpham LIMIT 1";
    $query = mysqli_query($mysqli, $sql);


 
    
    
    

    if (mysqli_num_rows($query) > 0) {
        $product = mysqli_fetch_assoc($query);

        // Thêm sản phẩm vào giỏ hàng trong session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$idsanpham])) {
            // Nếu sản phẩm đã có trong giỏ, tăng số lượng
            $_SESSION['cart'][$idsanpham]['soluong'] += 1;
        } else {
            // Nếu sản phẩm chưa có trong giỏ, thêm mới
            $_SESSION['cart'][$idsanpham] = [
                'TenSanPham' => $product['TenSanPham'],
                'GiaBan' => $product['GiaBan'],
                'HinhAnh' => $product['HinhAnh'],
                'soluong' => 1
            ];
        }

       
        header("Location:GioHang.php");
    } else {
        
        echo "<script>alert('Sản phẩm không tồn tại!');</script>";
    }
} else {
    
    echo "<script>alert('Không có sản phẩm nào được chọn!');</script>";
}
?>
