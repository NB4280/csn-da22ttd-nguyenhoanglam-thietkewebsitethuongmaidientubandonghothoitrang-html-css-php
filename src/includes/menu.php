<?php
// Truy vấn danh sách danh mục
$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY MaDanhMucSP ASC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<div class=" custom-border-bottom d-flex justify-content-center">

        <ul class="nav">

            <!-- Danh Mục từ cơ sở dữ liệu -->
            <?php
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            ?>
                <li class="nav-item ">
                    <a class="nav-link text-secondary " href="index.php?quanly=danhmucsp&id=<?php echo $row_danhmuc['MaDanhMucSP']; ?>">
                        <?php echo $row_danhmuc['TenDanhMucSP']; ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
</div>
