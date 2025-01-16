<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quanly.css">
    <title>Quản Lý bài viết</title>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Quản Lý Bài Viết</h1>
        <div class="card">
            <div class="card-header">
                Thêm Bài Viết
            </div>
            <div class="card-body">
                <form method="POST" action="../modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="TenBaiViet" class="form-label">Tiêu đề bài viết</label>
                        <input type="text" id="TenBaiViet" class="form-control" name="TenBaiViet" placeholder="Nhập tiêu đề bài viết" required>

                        <label for="NoiDung" class="form-label">Nội dung</label>
                        <textarea id="NoiDung" class="form-control" name="NoiDung" rows="4" placeholder="Nhập nội dung bài viết"></textarea>

                        <label for="HinhAnh" class="form-label">Hình ảnh</label>
                        <input type="file" id="HinhAnh" class="form-control" name="HinhAnh" required>

                        <label for="TrangThai" class="form-label">Trạng thái</label>
                        <select id="TrangThai" class="form-select" name="TrangThai">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn bg-primary text-white" name="ThemBaiViet">Thêm bài viết</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
