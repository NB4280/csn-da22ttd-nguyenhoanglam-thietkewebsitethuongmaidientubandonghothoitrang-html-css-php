<?php

// Truy vấn lấy danh sách bài viết từ cơ sở dữ liệu
$sql = "SELECT * FROM baiviet";
$result = mysqli_query($mysqli, $sql);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách bài viết</title>
    <style>
        .post-thumbnail img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-item {
            margin-bottom: 20px;
        }

        .excerpt {
            font-size: 14px;
            color: #555;
        }

        .post-details h2 a {
            color: #007bff;
            text-decoration: none;
        }

        .post-details h2 a:hover {
            color: #0056b3;
        }

        .post-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .post-item:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="header-title text-center mb-4">Danh sách bài viết</h1>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4">
                        <a href="chitietbaiviet.php?mabaiviet=<?php echo $row['MaBaiViet']; ?>">

                        <div class="post-item">
                            <div class="post-thumbnail">
                                <?php if ($row['HinhAnh'] != ''): ?>
                                    <img src="../admin/modules/quanlybaiviet/uploads/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh bài viết" />
                                <?php else: ?>
                                    <img src="default.jpg" alt="Hình ảnh mặc định" />
                                <?php endif; ?>
                            </div>
                            <div class="post-details p-3">
                                <h2><a><?php echo $row['TieuDe']; ?></a></h2>
                                <p><strong>Ngày đăng:</strong> <?php echo date('d/m/Y H:i:s', strtotime($row['NgayDang'])); ?></p>
                            </div>
                        </a>
                        
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Không có bài viết nào.</p>
        <?php endif; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
