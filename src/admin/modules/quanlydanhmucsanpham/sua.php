<?php
    $sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE MaDanhMucSP = '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp =  mysqli_query($mysqli,$sql_sua_danhmucsp);

?>
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
            Sửa danh mục
        </div>
        <div class="card-body">
            <form method="POST" action="../modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
                <div class="mb-3">
                    <?php
                        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
                    ?>
                    <label for="categoryName" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="tendanhmuc" value="<?php echo $dong['TenDanhMucSP']?>" required>
                            
                    <label for="HinhAnh" class="form-label">Hình ảnh</label>
                        <?php if (!empty($dong['HinhAnh'])): ?>
                            <div>
                                <img src="../modules/quanlybaiviet/uploads/<?php echo $dong['HinhAnh'] ?>" alt="Hình ảnh sản phẩm" style="max-width: 200px; margin-bottom: 10px; border-radius: 5px;">
                                <p>Hình ảnh hiện tại</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" id="HinhAnh" class="form-control" name="HinhAnh">

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn bg-primary" name="suadanhmuc">Sửa</button>
                    </div>
                    </div>

                    <?php
                    }
                    ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>