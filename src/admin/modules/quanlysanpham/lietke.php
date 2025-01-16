<?php
    $sql_lietke_sanpham = "SELECT * FROM SanPham ORDER BY MaSanPham DESC";
    $query_lietke_sanpham =  mysqli_query($mysqli, $sql_lietke_sanpham);
?>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-header text-white fw-bold" style="background-color: #007bff;">
        Liệt kê sản phẩm
    </div>
    <div class="card-body" style="background-color: #f8f9fa;">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số lượng</th>                    
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Quản lý</th>
                </tr>
            </thead>
            <tbody id="categoryTableBody">
                <?php
                    $i = 0;
                    while($row = mysqli_fetch_array($query_lietke_sanpham)){
                        $i++;
                ?>
                <tr>
                    <td class="text-center align-middle"><?php echo $i; ?></td>
                    <td class="align-middle"><?php echo $row['TenSanPham']; ?></td>
                    <td class="text-center align-middle"><?php echo $row['MaSanPham']; ?></td>
                    
                    <?php
                    $sql_danhmuc= "SELECT * FROM danhmuc ORDER BY MaDanhMucSP DESC";
                    $query_danhmuc =  mysqli_query($mysqli, $sql_danhmuc);
                    $row_danhmuc = mysqli_fetch_array($query_danhmuc)
                    ?>
                    <td class="text-center align-middle"><?php echo $row_danhmuc['TenDanhMucSP']; ?></td>   
                    
                    <td class="text-center align-middle"><img src="../modules/quanlysanpham/uploads/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh" style="width: 70px; height: auto; border-radius: 5px;"></td>
                    <td class="text-center align-middle"><?php echo number_format($row['GiaBan'], 2); ?> đ</td>
                    <td class="text-center align-middle"><?php echo $row['SoLuongSP']; ?></td>
                    <td class="text-center align-middle">
                        <?php if($row['TrangThai'] == 1){
                            echo "<span class='badge bg-success'>Kích hoạt</span>";
                        }else{
                            echo "<span class='badge bg-secondary'>Ẩn</span>";
                        } ?>
                    </td>
                    <td class="text-center align-middle">
                        <a href="index.php?action=quanlysanpham&query=sua&masanpham=<?php echo $row['MaSanPham']; ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a href="../modules/quanlysanpham/xuly.php?masanpham=<?php echo $row['MaSanPham']; ?>" class="btn btn-danger btn-sm mx-1">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
