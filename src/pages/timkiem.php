<?php

if (isset($_POST['tukhoa']) && !empty($_POST['tukhoa'])) {
    $tukhoa = mysqli_real_escape_string($mysqli, $_POST['tukhoa']); 
   
    $sql_search = "SELECT * FROM sanpham 
                   WHERE TenSanPham LIKE '%$tukhoa%' 
                   ORDER BY MaSanPham DESC";
    $query_search = mysqli_query($mysqli, $sql_search);

    $num_search = mysqli_num_rows($query_search);
} else {
    $tukhoa = "";
    $num_search = 0;
}
?>

<div class="container mt-5">
    <h3 class="text-center mb-4">
        Kết quả tìm kiếm: "<?php echo htmlspecialchars($tukhoa); ?>"
    </h3>
    <div class="row text-center">
        <?php
        if ($num_search > 0) {
        
            while ($row_search = mysqli_fetch_array($query_search)) {
        ?>
                
                <div class="col-md-3 mb-4">
                    <div class="product-item">
                        <img src="../admin/modules/quanlysanpham/uploads/<?php echo $row_search['HinhAnh']; ?>" alt="<?php echo $row_search['TenSanPham']; ?>" style="height:200px;">
                        <h5><?php echo $row_search['TenSanPham']; ?></h5>
                        <p><?php echo number_format($row_search['GiaBan'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="TrangChu.php?quanly=sanpham&id=<?php echo $row_search['MaSanPham']; ?>" class="btn btn-outline-primary">Mua ngay</a>
                    </div>
                </div>
        <?php
            }
        } else {
          
            echo '<div class="col-12 text-center"><p>Không tìm thấy sản phẩm nào.</p></div>';
        }
        ?>
    </div>
</div>
