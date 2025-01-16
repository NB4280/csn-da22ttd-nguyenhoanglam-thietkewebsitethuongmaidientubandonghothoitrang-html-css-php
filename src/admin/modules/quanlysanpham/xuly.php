<?php
include("../../config/config.php");

$tensp = $_POST['TenSanPham'];
$madanhmuc = $_POST['MaDanhMucSP'];
$giasp = $_POST['GiaBan'];
$soluongsp = $_POST['SoLuongSP'];
$tomtatsp = $_POST['TomTat'];
$mota = $_POST['MoTa'];
$tinhtrangsp = $_POST['TrangThai'];

// Xử lý hình ảnh
$hinhanhsp = $_FILES['HinhAnh']['name'];
$hinhanhsp_tmp = $_FILES['HinhAnh']['tmp_name'];
$hinhanhsp_new_name = time() . '_' . $hinhanhsp; // Đổi tên file ảnh


if (isset($_POST['ThemSP'])) {

    // Lấy dữ liệu từ form

    // Tải lên hình ảnh mới nếu có
    if ($hinhanhsp != '' && move_uploaded_file($hinhanhsp_tmp, 'uploads/' . $hinhanhsp_new_name)) {
        $sql_them = "INSERT INTO sanpham (MaDanhMucSP, TenSanPham, SoLuongSP, GiaBan, HinhAnh, TomTat, MoTa, TrangThai) 
                     VALUES ('$madanhmuc', '$tensp', '$soluongsp', '$giasp', '$hinhanhsp_new_name', '$tomtatsp', '$mota', '$tinhtrangsp')";
        mysqli_query($mysqli, $sql_them);
    }
    header("Location:../../pages/index.php?action=quanlysanpham&query=them");
} elseif (isset($_POST['suasanpham'])) {
    $idsanpham = $_GET['idsanpham'];
    if ($hinhanhsp == '') {
        // Cập nhật không thay đổi hình ảnh
        $sql_sua = "UPDATE sanpham SET 
                    MaDanhMucSP='$madanhmuc', 
                    TenSanPham='$tensp', 
                    SoLuongSP='$soluongsp', 
                    GiaBan='$giasp', 
                    TomTat='$tomtatsp', 
                    MoTa='$mota', 
                    TrangThai='$tinhtrangsp' 
                    WHERE MaSanPham='$idsanpham'";
    } else {
        // Lấy tên ảnh hiện tại để xóa
        $sql_get_image = "SELECT HinhAnh FROM sanpham WHERE MaSanPham='$idsanpham'";
        $query_get_image = mysqli_query($mysqli, $sql_get_image);
        $row = mysqli_fetch_assoc($query_get_image);
        $current_image = 'uploads/' . $row['HinhAnh'];

        // Cập nhật sản phẩm với hình ảnh mới
        $sql_sua = "UPDATE sanpham SET 
                    MaDanhMucSP='$madanhmuc', 
                    TenSanPham='$tensp', 
                    SoLuongSP='$soluongsp', 
                    GiaBan='$giasp', 
                    HinhAnh='$hinhanhsp_new_name', 
                    TomTat='$tomtatsp', 
                    MoTa='$mota', 
                    TrangThai='$tinhtrangsp' 
                    WHERE MaSanPham='$idsanpham'";

        if (move_uploaded_file($hinhanhsp_tmp, 'uploads/' . $hinhanhsp_new_name)) {
            // Xóa hình ảnh cũ nếu tồn tại
            if (file_exists($current_image)) {
                unlink($current_image);
            }
        }
    }
    mysqli_query($mysqli, $sql_sua);
    header("Location:../../pages/index.php?action=quanlysanpham&query=them");
} else {
    // Xóa sản phẩm
    $idsanpham = $_GET['masanpham'];
    $sql_get_image = "SELECT HinhAnh FROM sanpham WHERE MaSanPham='$idsanpham'";
    $query_get_image = mysqli_query($mysqli, $sql_get_image);
    $row = mysqli_fetch_assoc($query_get_image);
    $image_path = 'uploads/' . $row['HinhAnh'];

    $sql_xoa = "DELETE FROM sanpham WHERE MaSanPham='$idsanpham'";
    if (mysqli_query($mysqli, $sql_xoa)) {
        if (file_exists($image_path)) {
            unlink($image_path); // Xóa ảnh cũ
        }
        header("Location:../../pages/index.php?action=quanlysanpham&query=them");
    } else {
        echo "Lỗi khi xóa sản phẩm.";
    }
}
?>
