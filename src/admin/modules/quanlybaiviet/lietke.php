<?php
    $sql_lietke_sanpham = "SELECT * FROM BaiViet ORDER BY MaBaiViet DESC";
    $query_lietke_sanpham =  mysqli_query($mysqli, $sql_lietke_sanpham);
?>

<div class="card shadow-sm border-0 mt-4">
    <div class="card-header text-white fw-bold" style="background-color: #007bff;">
        Liệt kê bài viết
    </div>
    <div class="card-body" style="background-color: #f8f9fa;">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-center">STT</th>
                    <th>Tiêu đề bài viết</th>
                    <th>Mã bài viết</th>
                    <th>Hình ảnh</th>                 
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
                    <td class="align-middle"><?php echo $row['TieuDe']; ?></td>
                    <td class="text-center align-middle"><?php echo $row['MaBaiViet']; ?></td>

                    
                    <td class="text-center align-middle"><img src="../modules/quanlybaiviet/uploads/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh" style="width: 70px; height: auto; border-radius: 5px;"></td>

                    <td class="text-center align-middle">
                        <?php if($row['TrangThai'] == 1){
                            echo "<span class='badge bg-success'>Kích hoạt</span>";
                        }else{
                            echo "<span class='badge bg-secondary'>Ẩn</span>";
                        } ?>
                    </td>
                        
                    <td class="text-center align-middle">
                        <a href="index.php?action=quanlybaiviet&query=sua&mabaiviet=<?php echo $row['MaBaiViet']; ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a href="../modules/quanlybaiviet/xuly.php?mabaiviet=<?php echo $row['MaBaiViet']; ?>" class="btn btn-danger btn-sm mx-1">
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
