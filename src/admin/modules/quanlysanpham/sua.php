

<?php
    $sql_sua_sanpham = "SELECT * FROM sanpham WHERE MaSanPham = '$_GET[masanpham]' LIMIT 1";
    $query_sua_sanpham =  mysqli_query($mysqli,$sql_sua_sanpham);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quanly.css">
    <title>Quản Lý Sản Phẩm</title>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Quản lý sản phẩm</h1>

        <div class="card">
            <div class="card-header">
                Sửa sản phẩm
            </div>
            <div class="card-body">
                <form method="POST" action="../modules/quanlysanpham/xuly.php?idsanpham=<?php echo $_GET['masanpham'] ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <?php
                        while ($dong = mysqli_fetch_array($query_sua_sanpham)) {
                        ?>
                        <label for="TenSanPham" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" id="TenSanPham" class="form-control" name="TenSanPham" value="<?php echo $dong['TenSanPham'] ?>" required>


                        <label for="MaDanhMucSP" class="form-label">Danh Mục</label>
                        <select id="MaDanhMucSP" class="form-select" name="MaDanhMucSP">
                           <?php
                                $sql_danhmuc= "SELECT * FROM danhmuc ORDER BY MaDanhMucSP DESC";
                                $query_danhmuc =  mysqli_query($mysqli, $sql_danhmuc);
                            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                           ?>
                           <option value = "<?php echo $row_danhmuc['MaDanhMucSP']?>"><?php echo $row_danhmuc['TenDanhMucSP']?></option>
                           <?php
                            }
                           ?>
                        </select>

                        <label for="GiaBan" class="form-label">Giá</label>
                        <input type="text" id="GiaBan" class="form-control" name="GiaBan" value="<?php echo $dong['GiaBan'] ?>" required>

                        <label for="SoLuongSP" class="form-label">Số lượng</label>
                        <input type="text" id="SoLuongSP" class="form-control" name="SoLuongSP" value="<?php echo $dong['SoLuongSP'] ?>" required>

                        <label for="HinhAnh" class="form-label">Hình ảnh</label>
                        <?php if (!empty($dong['HinhAnh'])): ?>
                            <div>
                                <img src="../modules/quanlysanpham/uploads/<?php echo $dong['HinhAnh'] ?>" alt="Hình ảnh sản phẩm" style="max-width: 200px; margin-bottom: 10px; border-radius: 5px;">
                                <p>Hình ảnh hiện tại</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" id="HinhAnh" class="form-control" name="HinhAnh">

                        <label for="TomTat" class="form-label">Tóm tắt</label>
                        <textarea id="TomTat" class="form-control" name="TomTat" rows="4"><?php echo $dong['TomTat'] ?></textarea>

                        <label for="MoTa" class="form-label">Mô tả</label>
                        <textarea id="MoTa" class="form-control" name="MoTa" rows="4"><?php echo $dong['MoTa'] ?></textarea>

                        <label for="TrangThai" class="form-label">Trạng thái</label>
                        <select id="TrangThai" class="form-select" name="TrangThai">
                            <option value="1" <?php echo ($dong['TrangThai'] == 1) ? 'selected' : ''; ?>>Kích hoạt</option>
                            <option value="0" <?php echo ($dong['TrangThai'] == 0) ? 'selected' : ''; ?>>Ẩn</option>
                        </select>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" name="suasanpham">Sửa</button>
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











