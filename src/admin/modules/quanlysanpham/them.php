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
        <h1 class="header-title">Quản Lý Sản Phẩm</h1>
        <div class="card">
            <div class="card-header">
                Thêm Sản Phẩm
            </div>
            <div class="card-body">
                <form method="POST" action="../modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="TenSanPham" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" id="TenSanPham" class="form-control" name="TenSanPham" placeholder="Nhập tên sản phẩm" required>

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
                        <input type="text" id="GiaBan" class="form-control" name="GiaBan" placeholder="Nhập giá sản phẩm" required>

                        <label for="SoLuongSP" class="form-label">Số lượng</label>
                        <input type="text" id="SoLuongSP" class="form-control" name="SoLuongSP" placeholder="Nhập số lượng sản phẩm" required>

                        <label for="HinhAnh" class="form-label">Hình ảnh</label>
                        <input type="file" id="HinhAnh" class="form-control" name="HinhAnh" required>

                        <label for="TomTat" class="form-label">Tóm tắt</label>
                        <textarea id="TomTat" class="form-control" name="TomTat" rows="4" placeholder="Nhập tóm tắt sản phẩm"></textarea>

                        <label for="MoTa" class="form-label">Mô tả</label>
                        <textarea id="MoTa" class="form-control" name="MoTa" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>

                        <label for="TrangThai" class="form-label">Trạng thái</label>
                        <select id="TrangThai" class="form-select" name="TrangThai">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn bg-primary text-white" name="ThemSP">Thêm Sản Phẩm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
