<?php

$sql_pro = "SELECT * FROM danhmuc, sanpham 
            WHERE sanpham.MaDanhMucSP = danhmuc.MaDanhMucSP 
            AND sanpham.MaDanhMucSP = '$_GET[id]' 
            ORDER BY sanpham.MaSanPham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);


$num_pro = mysqli_num_rows($query_pro);

$row_title = mysqli_fetch_array($query_pro);
?>

<div class="container mt-5">
    <h3 class="text-center mb-4">
        Danh sách sản phẩm: <?php echo isset($row_title['TenDanhMucSP']) ? $row_title['TenDanhMucSP'] : 'Sản phẩm đã hết'; ?>
    </h3>
    <div class="row text-center">
        <?php
        if ($num_pro > 0) {
       
            mysqli_data_seek($query_pro, 0); 
            while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
         
                <div class="col-md-3 mb-4">
                    <div class="product-item">
                        <img src="../admin/modules/quanlysanpham/uploads/<?php echo $row_pro['HinhAnh']; ?>" alt="<?php echo $row_pro['TenSanPham']; ?>"  style="height:250px;">
                        <div></div>
                        <h5><?php echo $row_pro['TenSanPham']; ?></h5>
                        <p><?php echo number_format($row_pro['GiaBan'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['MaSanPham']; ?>" class="btn btn-outline-primary">Mua ngay</a>
                    </div>
                </div>
        <?php
            }
        } else {
           
            echo '<div class="col-12 text-center"><p>Không có sản phẩm nào trong danh mục này.</p></div>';
        }
        ?>
    </div>
</div>
