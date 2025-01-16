<?php

    // Lấy dữ liệu sản phẩm dựa trên id được truyền qua URL
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($mysqli, $_GET['id']);
        $sql_chitiet = "SELECT * FROM danhmuc, sanpham 
                        WHERE sanpham.MaDanhMucSP = danhmuc.MaDanhMucSP 
                        AND sanpham.MaSanPham = '$id' LIMIT 1";
        $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
        $product = mysqli_fetch_assoc($query_chitiet);
    } else {
        echo "<script>alert('Không tìm thấy sản phẩm!'); window.location='index.php';</script>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm - WatchShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Tổng thể */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header */
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            max-height: 70px;
        }
        .navbar-nav .nav-link {
            font-weight: bold;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        /* Chi tiết sản phẩm */
        .product-detail {
            margin-top: 30px;
        }
        .product-detail img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-info h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        .product-info p {
            margin-bottom: 10px;
        }
        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .btn-buy {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.1rem;
        }
        .description {
            margin-top: 30px;
        }
        .rating {
            color: #ffc107;
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
        /* Mô tả sản phẩm */
/* Mô tả sản phẩm */
.description {
    margin-top: 30px;
    background-color: #ffffff;
    padding: 15px; 
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.description h4 {
    font-size: 1.3rem; 
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.description p {
    font-size: 0.95rem; /* Giảm kích thước chữ cho nội dung mô tả */
    line-height: 1.2; /* Giảm khoảng cách dòng để giống văn bản thông thường */
    color: #555;
    margin-bottom: 10px;
}

/* Các thẻ <p> trong mô tả được căn chỉnh đẹp hơn */
.description p:first-of-type {
    font-weight: bold;
    color: #007bff;
}

/* Cải thiện độ tương phản cho các đoạn văn */
.description p:nth-of-type(odd) {
    background-color: #f8f9fa;
    padding: 8px;
    border-radius: 5px;
}

/* Tạo khoảng cách giữa các đoạn văn */
.description p {
    margin-bottom: 10px;
}

/* Thêm hiệu ứng khi di chuột vào các liên kết trong mô tả */
.description a {
    color: #007bff;
    text-decoration: none;
}

.description a:hover {
    text-decoration: underline;
    color: #0056b3;
}


/* Mô tả sản phẩm với kích thước cố định */
.product-description-container {
    width: 600px;       /* Chiều rộng 600px */
    height: 500px;      /* Chiều cao 500px */
    overflow: auto;     /* Thêm thanh cuộn nếu nội dung vượt quá */
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề mô tả */
.product-description-container h4 {
    font-size: 1.3rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Nội dung mô tả */
.product-description-container p {
    font-size: 0.95rem;
    line-height: 1.2;
    color: #555;
}


    </style>
</head>
<body>

    <!-- Chi tiết sản phẩm -->
    <div class="container product-detail">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="../admin/modules/quanlysanpham/uploads/<?php echo $product['HinhAnh']; ?>" alt="<?php echo $product['TenSanPham']; ?>">
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 product-info">
                <h3><?php echo $product['TenSanPham']; ?></h3>
                
                <div class="product-description-container">
    <h4>Mô tả sản phẩm</h4>
    <p><?php echo nl2br($product['MoTa']); ?></p>
</div>
                    
               

                <p class="price"><?php echo number_format($product['GiaBan'], 0, ',', '.'); ?> VNĐ</p>
                <p class="text-muted">
                    <?php echo ($product['SoLuongSP'] > 0) ? 'Còn hàng' : 'Hết hàng'; ?>
                </p>

                <form method="POST" action="themgiohang.php">
                    <input type="hidden" name="idsanpham" value="<?php echo $product['MaSanPham'];?>">
                    <button type="submit" class="btn btn-primary btn-buy">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>

        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
