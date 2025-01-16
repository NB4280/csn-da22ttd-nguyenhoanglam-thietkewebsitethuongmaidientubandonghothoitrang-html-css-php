
<?php


// Xử lý tìm kiếm
$search = isset($_POST['search']) ? trim($_POST['search']) : '';
$search_query = '';
if ($search !== '') {
    // Tạo câu lệnh truy vấn tìm kiếm
    $search_query = "WHERE dh.MaDonHang LIKE '%$search%' OR kh.HoTenKhachHang LIKE '%$search%' OR dh.NgayDatHang LIKE '%$search%'";
}

// Truy vấn danh sách đơn hàng
$sql = "SELECT dh.MaDonHang, dh.NgayDatHang, dh.TongTien, dh.TrangThai, kh.HoTenKhachHang, kh.SoDienThoai 
        FROM donhang dh
        JOIN khachhang kh ON dh.MaKhachHang = kh.MaKhachHang
        $search_query
        ORDER BY dh.NgayDatHang DESC";
$result = mysqli_query($mysqli, $sql);



// Xử lý xóa đơn hàng khi submit form
if (isset($_POST['delete'])) {
    $madonhang = intval($_POST['delete']);
    $delete_sql = "DELETE FROM donhang WHERE MaDonHang = $madonhang";
    mysqli_query($mysqli, $delete_sql);
     
}



?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Quản Lý Đơn Hàng</h1>

    <!-- Tìm kiếm -->
    <form method="POST" action="index.php?action=quanlydonhang&query=timkiem" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo mã đơn hàng, tên khách hàng, ngày đặt hàng" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Bảng quản lý đơn hàng -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="text-center">
                        <td><?php echo $row['MaDonHang']; ?></td>
                        <td><?php echo htmlspecialchars($row['HoTenKhachHang']); ?></td>
                        <td><?php echo htmlspecialchars($row['SoDienThoai']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['NgayDatHang'])); ?></td>
                        <td><?php echo number_format($row['TongTien'], 0, ',', '.'); ?> VNĐ</td>
                        <td>
                            <?php echo $row['TrangThai'] == 1 ? '<span class="badge bg-success">Đã Duyệt</span>' : '<span class="badge bg-warning">Chưa Duyệt</span>'; ?>
                        </td>
                        <td>
                            <!-- Form để xóa đơn hàng -->
                            <form method="POST" action="index.php?action=quanlydonhang&query=timkiem" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                <input type="hidden" name="delete" value="<?php echo $row['MaDonHang']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Không có đơn hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


