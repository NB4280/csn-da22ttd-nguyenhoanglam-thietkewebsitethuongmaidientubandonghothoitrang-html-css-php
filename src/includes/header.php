<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/images/logo.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=danhmuc">Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bài viết</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liên Hệ</a></li>
                </ul>
                <form class="d-flex me-2" action="index.php?quanly=timkiem" method="POST">
                    <input class="form-control search-bar" type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm..." required>
                    <button class="btn btn-outline-dark ms-1" type="submit">
                        <i class="bi bi-search" style="font-size: 20px;"></i>
                    </button>
                </form>

                <a class="d-flex btn btn-outline-dark ms-1" href="GioHang.php">
                    <i class="bi bi-cart-fill" style="font-size: 20px; color: #000;"></i> 
                    <span class="ms-2">Giỏ hàng</span> 
                </a>
               
                <a href="dangky.php" class="btn btn-success ms-2">Đăng ký</a>
            </div>
        </div>
    </nav>
</header>
