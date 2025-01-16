<?php


// Xử lý đăng xuất
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['dangnhap']); // Xóa session đăng nhập
    header('Location: ../pages/login.php'); // Chuyển hướng về trang đăng nhập
    exit(); // Kết thúc script
}
?>

<div class="sidebar d-flex flex-column p-3">
    <h2 class="text-center">ADMIN</h2>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them"><i class=""></i> Quản lý danh mục sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlysanpham&query=them"><i class=""></i> Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlybaiviet&query=them"><i class=""></i> Quản lý bài viết</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlydonhang&query=duyet"><i class=""></i> Quản lý đơn hàng</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=dangxuat">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất: 
                <?php 
                if (isset($_SESSION['dangnhap'])) {
                    echo htmlspecialchars($_SESSION['dangnhap']);
                } 
                ?>
            </a>
        </li>
    </ul>
</div>
