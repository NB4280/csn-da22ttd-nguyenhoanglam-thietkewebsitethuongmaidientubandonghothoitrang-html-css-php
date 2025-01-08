<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchShop - Giao diện mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Tổng thể */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        
        /* Header */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            max-height: 70px;
        }
        .navbar {
            padding: 1rem;
        }
        .navbar-nav .nav-link {
            color: #333;
            font-weight: bold;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .search-bar {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px 15px;
        }

        /* Slider */
        .slider {
            margin: 20px 0;
        }
        .slider img {
            width: 100%;
            border-radius: 10px;
        }

        /* Danh mục sản phẩm */
        .product-item {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .product-item img {
            width: 100%;
            border-radius: 10px;
        }
        .product-item h5 {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .product-item p {
            color: #007bff;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }
        footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
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
                        <li class="nav-item"><a class="nav-link" href="#">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Sản Phẩm</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tin Tức</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Liên Hệ</a></li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control search-bar" type="search" placeholder="Tìm kiếm sản phẩm...">
                        <button class="btn btn-outline-dark ms-1">
                            <i class="bi bi-search" style="font-size: 20px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Slider -->
    <div class="container slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Sản phẩm nổi bật -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Sản Phẩm Nổi Bật</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="product-item">
                    <img src="https://bizweb.dktcdn.net/thumb/1024x1024/100/116/615/products/mp7f3ref-vw-34fr-plus-watch-44-alum-silver-nc-se-vw-34fr-wf-co-jpeg.jpg" alt="Đồng hồ 1">
                    <h5>Đồng hồ Thụy Sĩ</h5>
                    <p>2.999.000 VNĐ</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <img src="https://via.placeholder.com/300" alt="Đồng hồ 2">
                    <h5>Đồng hồ Hublot</h5>
                    <p>3.499.000 VNĐ</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <img src="https://via.placeholder.com/300" alt="Đồng hồ 3">
                    <h5>Đồng hồ Rolex</h5>
                    <p>5.999.000 VNĐ</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <img src="https://via.placeholder.com/300" alt="Đồng hồ 4">
                    <h5>Đồng hồ Omega</h5>
                    <p>4.199.000 VNĐ</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024 WatchShop. All Rights Reserved.</p>
            <p>Email: watchshop@gmail.com | Phone: +84 912 345 678</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
