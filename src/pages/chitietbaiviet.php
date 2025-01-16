<?php

include("../admin/config/config.php");
// Lấy ID bài viết từ URL
$mabaiviet = isset($_GET['mabaiviet']) ? intval($_GET['mabaiviet']) : 0;

// Truy vấn bài viết từ cơ sở dữ liệu
$sql = "SELECT * FROM baiviet WHERE MaBaiViet = $mabaiviet LIMIT 1";
$result = mysqli_query($mysqli, $sql);

// Kiểm tra nếu bài viết tồn tại
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<p class='text-center mt-5'>Bài viết không tồn tại.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Chi tiết bài viết</title>
    <style>
        .post-thumbnail img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .post-content {
            white-space: pre-line; /* Giữ nguyên định dạng dòng của nội dung */
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .container {
            max-width: 800px;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .post-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .post-info p strong {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo htmlspecialchars($row['TieuDe']); ?></h1>

        <div class="post-thumbnail mb-4">
            <?php if ($row['HinhAnh'] != ''): ?>
                <img src="../admin/modules/quanlybaiviet/uploads/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh bài viết">
            <?php else: ?>
                <img src="default.jpg" alt="Hình ảnh mặc định">
            <?php endif; ?>
        </div>

        <div class="post-info mb-4 text-center">
            <p><strong>Ngày đăng:</strong> <?php echo date('d/m/Y H:i:s', strtotime($row['NgayDang'])); ?></p>
            <p><strong>Trạng thái:</strong> <?php echo $row['TrangThai'] == 1 ? 'Hiển thị' : 'Ẩn'; ?></p>
        </div>

        <div class="post-content border p-3 bg-light">
            <?php echo nl2br(htmlspecialchars($row['NoiDung'])); ?>
        </div>

        <div class="back-button">
            <a href="index.php" class="btn btn-primary mt-4">Quay lại danh sách bài viết</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
