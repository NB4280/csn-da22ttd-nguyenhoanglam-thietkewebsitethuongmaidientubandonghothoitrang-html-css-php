<?php
session_start();


function tinhTongTien($cart) {
    $tongtien = 0;
    foreach ($cart as $item) {
        $tongtien += $item['GiaBan'] * $item['soluong'];
    }
    return $tongtien;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['soluong'] as $id => $soluong) {
            if (isset($_SESSION['cart'][$id]) && $soluong > 0) {
                $_SESSION['cart'][$id]['soluong'] = $soluong;
            } elseif ($soluong == 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
    }
    header("Location: giohang.php");
    exit;
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
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .cart-header {
            background-color: #6c63ff;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .cart-table img {
            width: 100px;
            border-radius: 10px;
        }
        .cart-table th {
            text-align: center;
            background-color: #007bff;
            color: white;
        }
        .total {
            font-size: 1.8rem;
            font-weight: bold;
            color: #28a745;
        }
        .btn-custom {
            background-color: #6c63ff;
            color: white;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: #5a54d1;
        }
        .btn-danger {
            transition: all 0.3s;
        }
        .btn-danger:hover {
            background-color: #ff4d4d;
        }
        .btn-primary, .btn-warning {
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="cart-header text-center">
        <h2>Giỏ hàng của bạn</h2>
    </div>

    <form method="POST" action="giohang.php">
        <table class="table table-bordered cart-table mt-3">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item) { ?>
                <tr>
                    <td><img src="../admin/modules/quanlysanpham/uploads/<?php echo $item['HinhAnh']; ?>" alt="<?php echo $item['TenSanPham']; ?>" class="product-image"></td>
                    <td><?php echo $item['TenSanPham']; ?></td>
                    <td class="price" data-price="<?php echo $item['GiaBan']; ?>"><?php echo number_format($item['GiaBan'], 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <input type="number" name="soluong[<?php echo $id; ?>]" value="<?php echo $item['soluong']; ?>" min="1" class="form-control quantity" data-id="<?php echo $id; ?>" style="max-width: 80px;">
                    </td>
                    <td class="total-price"><?php echo number_format($item['GiaBan'] * $item['soluong'], 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <a href="themgiohang.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="TrangChu.php?quanly=danhmuc" class="btn btn-primary btn-lg">Tiếp tục mua sắm</a>
            <h4>Tổng tiền: <span id="grand-total" class="total"><?php echo number_format(tinhTongTien($_SESSION['cart']), 0, ',', '.'); ?> VNĐ</span></h4>
            
            <a href="thanhtoan.php" class="btn btn-warning btn-lg">Thanh toán</a>
        </div>

        
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

    const quantities = document.querySelectorAll('.quantity');
    const grandTotalElement = document.getElementById('grand-total');

    quantities.forEach(quantity => {
        quantity.addEventListener('input', function () {
            const id = this.dataset.id;
            const priceElement = this.closest('tr').querySelector('.price');
            const totalPriceElement = this.closest('tr').querySelector('.total-price');
            const unitPrice = parseFloat(priceElement.getAttribute('data-price'));
            const newQuantity = parseInt(this.value) || 1;
            const newTotal = unitPrice * newQuantity;

          
            totalPriceElement.textContent = newTotal.toLocaleString('vi-VN') + ' VNĐ';

           
            let grandTotal = 0;
            document.querySelectorAll('.total-price').forEach(item => {
                const price = parseFloat(item.textContent.replace(/\D/g, ''));
                grandTotal += price;
            });
            grandTotalElement.textContent = grandTotal.toLocaleString('vi-VN');
        });
    });
</script>
</body>
</html>
