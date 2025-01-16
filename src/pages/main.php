<?php 
  
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }

    if ($tam == 'danhmucsp') {
        // Giao diện danh mục sản phẩm cụ thể
        include("../includes/menu.php");
        include("../pages/SanPham.php");
    } elseif ($tam == 'danhmuc') {
        // Giao diện danh mục chung nếu không có ID
        include("../includes/menu.php");
        include("../pages/SanPhamMoi.php");
  
    } elseif ($tam == 'lienhe') {
        // Trang liên hệ
        include("../pages/LienHe.php");
    } elseif ($tam == 'sanpham') {
        // Trang chi tiết sản phẩm
        include("../includes/menu.php");
        include("../pages/chitiet.php");
    } elseif ($tam == 'timkiem') {
        // tìm kiếm sản phẩm
        include("../includes/menu.php");
        include("../pages/timkiem.php");
    } elseif ($tam == 'baiviet') {
        include("../pages/baiviet.php");
    } elseif ($tam == 'chitietbaiviet') {
        include("../pages/baiviet.php");
    } else {
        // Trang mặc định (trang chủ)
        include("../includes/slider.php");
        include("../pages/SanPhamMoi.php");
    }
?>
