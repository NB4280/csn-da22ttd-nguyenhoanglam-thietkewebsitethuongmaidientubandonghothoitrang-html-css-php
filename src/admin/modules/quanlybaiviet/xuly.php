<?php
include("../../config/config.php");

    // Lấy dữ liệu từ form
    $tenbaiviet = $_POST['TenBaiViet'];

    $noidung = $_POST['NoiDung'];
    
    $tinhtrangsp = $_POST['TrangThai'];
    
    $ngay_dang = date("Y-m-d H:i:s");
    // Xử lý hình ảnh
    $hinhanhsp = $_FILES['HinhAnh']['name'];
    $hinhanhsp_tmp = $_FILES['HinhAnh']['tmp_name'];
    $hinhanhsp_new_name = time() . '_' . $hinhanhsp; // Đổi tên file ảnh


if (isset($_POST['ThemBaiViet'])) {
   // Tải lên hình ảnh mới nếu có
    if ($hinhanhsp != '' && move_uploaded_file($hinhanhsp_tmp, 'uploads/' . $hinhanhsp_new_name)) {
        $sql_them = "INSERT INTO baiviet (TieuDe, NoiDung, HinhAnh, TrangThai,NgayDang) 
                     VALUES ('$tenbaiviet', '$noidung','$hinhanhsp_new_name','$tinhtrangsp','$ngay_dang')";
        mysqli_query($mysqli, $sql_them);
    }
    header("Location:../../pages/index.php?action=quanlybaiviet&query=them");
} elseif (isset($_POST['suabaiviet'])) {
    $idsanpham = $_GET['mabaiviet'];
    if ($hinhanhsp == '') {
        // Cập nhật không thay đổi hình ảnh
        $sql_sua = "UPDATE baiviet SET 
                    TieuDe='$tenbaiviet', 
                    NoiDung='$noidung', 
                    TrangThai='$tinhtrangsp' 
                    WHERE MaBaiViet='$idsanpham'";
    } else {
        // Lấy tên ảnh hiện tại để xóa
        $sql_get_image = "SELECT HinhAnh FROM baiviet WHERE MaBaiViet='$idsanpham'";
        $query_get_image = mysqli_query($mysqli, $sql_get_image);
        $row = mysqli_fetch_assoc($query_get_image);
        $current_image = 'uploads/' . $row['HinhAnh'];

        // Cập nhật sản phẩm với hình ảnh mới
        $sql_sua = "UPDATE baiviet SET 
                    TieuDe='$tenbaiviet', 
                    NoiDung='$noidung', 
                    TrangThai='$tinhtrangsp',
                    HinhAnh='$hinhanhsp_new_name'
                    WHERE MaBaiViet='$idsanpham'";

        if (move_uploaded_file($hinhanhsp_tmp, 'uploads/' . $hinhanhsp_new_name)) {
            // Xóa hình ảnh cũ nếu tồn tại
            if (file_exists($current_image)) {
                unlink($current_image);
            }
        }
    }
    mysqli_query($mysqli, $sql_sua);
     header("Location:../../pages/index.php?action=quanlybaiviet&query=them");
} else {
    // Xóa sản phẩm
    $idsanpham = $_GET['mabaiviet'];
    $sql_get_image = "SELECT HinhAnh FROM baiviet WHERE MaBaiViet='$idsanpham'";
    $query_get_image = mysqli_query($mysqli, $sql_get_image);
    $row = mysqli_fetch_assoc($query_get_image);
    $image_path = 'uploads/' . $row['HinhAnh'];

    $sql_xoa = "DELETE FROM baiviet WHERE MaBaiViet='$idsanpham'";
    if (mysqli_query($mysqli, $sql_xoa)) {
        if (file_exists($image_path)) {
            unlink($image_path); // Xóa ảnh cũ
        }
         header("Location:../../pages/index.php?action=quanlybaiviet&query=them");
    } else {
        echo "Lỗi khi xóa sản phẩm.";
    }
}
?>
