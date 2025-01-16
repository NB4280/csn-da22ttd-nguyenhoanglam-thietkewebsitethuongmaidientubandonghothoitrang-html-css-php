<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Đăng nhập</h2>
        <form action="xulydangnhap.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nhập số điện thoại</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Số điện thoại" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">Đăng nhập</button>
        </form>
        <div class="mt-3 text-center">
            <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
        </div>
    </div>
</body>
</html>
