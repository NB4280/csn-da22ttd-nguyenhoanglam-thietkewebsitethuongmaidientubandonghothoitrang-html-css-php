<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quanly.css">
    <title>Quản Lý Danh Mục Sản Phẩm</title>
</head>
<body>
<div class="container">
    <h1 class="header-title">Quản lý danh mục</h1>

    <div class="card">
        <div class="card-header">
            Thêm danh mục
        </div>
        <div class="card-body">
            <form method="POST" action="../modules/quanlydanhmucsanpham/xuly.php">
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="tendanhmuc" required>
                    
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn bg-primary" name="themdanhmuc">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
