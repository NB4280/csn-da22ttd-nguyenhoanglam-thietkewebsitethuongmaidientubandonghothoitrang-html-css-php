<?php


// Truy vấn để lấy 10 sản phẩm mới nhất
$sql = "SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT 10"; 
$query = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm Mới Nhất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Sản phẩm mới nhất -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Sản Phẩm Mới Nhất</h3>
        <div class="row">
            <?php
            // Kiểm tra nếu có sản phẩm
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
            ?>
                <!-- Hiển thị từng sản phẩm -->
                <div class="col-md-3 mb-4  text-center">
                    <div class="product-item">
                        <img src="../admin/modules/quanlysanpham/uploads/<?php echo $row['HinhAnh']; ?>" alt="<?php echo $row['TenSanPham']; ?>" style="height:250px;">
                        <h5><?php echo $row['TenSanPham']; ?></h5>
                        <p><?php echo number_format($row['GiaBan'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['MaSanPham']; ?>" class="btn btn-outline-primary">Chi tiết</a>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>Không có sản phẩm nào để hiển thị.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
