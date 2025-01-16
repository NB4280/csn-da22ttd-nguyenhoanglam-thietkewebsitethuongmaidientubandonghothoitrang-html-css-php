<?php
    $sql_sua_baiviet = "SELECT * FROM baiviet WHERE MaBaiViet = '$_GET[mabaiviet]' LIMIT 1";
    $query_sua_baiviet =  mysqli_query($mysqli, $sql_sua_baiviet);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quanly.css">
    <title>Quản Lý Bài Viết</title>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Quản lý bài viết</h1>

        <div class="card">
            <div class="card-header">
                Sửa bài viết
            </div>
            <div class="card-body">
                <form method="POST" action="../modules/quanlybaiviet/xuly.php?mabaiviet=<?php echo $_GET['mabaiviet'] ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                    <?php
                    while ($row = mysqli_fetch_array($query_sua_baiviet)) {
                ?>
                 
                    <label for="TenBaiViet" class="form-label">Tên bài viết</label>
                    <input type="text" id="TenBaiViet" class="form-control" name="TenBaiViet" value="<?php echo $row['TieuDe']; ?>" placeholder="Nhập tiêu đề bài viết" required>

                  
                    <label for="NoiDung" class="form-label">Nội dung</label>
                    <textarea id="NoiDung" class="form-control" name="NoiDung" rows="4" placeholder="Nhập nội dung bài viết" required><?php echo $row['NoiDung']; ?></textarea>

                  
                    <label for="HinhAnh" class="form-label">Hình ảnh</label>
                        <?php if (!empty($row['HinhAnh'])): ?>
                            <div>
                                <img src="../modules/quanlybaiviet/uploads/<?php echo $row['HinhAnh'];?>" alt="Hình ảnh bài viết" style="max-width: 200px; margin-bottom: 10px; border-radius: 5px;">
                                <p>Hình ảnh hiện tại</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" id="HinhAnh" class="form-control" name="HinhAnh">

                 
                    <label for="TrangThai" class="form-label">Trạng thái</label>
                    <select id="TrangThai" class="form-select" name="TrangThai">
                        <option value="1" <?php echo ($row['TrangThai'] == 1) ? 'selected' : ''; ?>>Kích hoạt</option>
                        <option value="0" <?php echo ($row['TrangThai'] == 0) ? 'selected' : ''; ?>>Ẩn</option>
                    </select>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary" name="suabaiviet">Sửa</button>
                    </div>
                <?php
                    }
                ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
