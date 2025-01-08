<?php
    $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY MaDanhMucSP DESC";
    $query_lietke_danhmucsp =  mysqli_query($mysqli,$sql_lietke_danhmucsp);

?>

<div class="card">
            <div class="card-header">
                Liệt kê danh mục
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên danh mục</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                        <?php
                            $i = 0;
                            while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['TenDanhMucSP']?></td>
                            <td>
                                <a href="index.php?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['MaDanhMucSP'];?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>
                                <a href="../modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $row['MaDanhMucSP'];?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Xóa</button></a>
                            </td>
                        </tr>
                        
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
</div>