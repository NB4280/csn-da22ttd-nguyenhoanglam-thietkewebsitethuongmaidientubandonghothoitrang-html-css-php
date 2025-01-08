<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .register-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-form">
        <h2>Đăng ký tài khoản</h2>
        <form action="xulydangky.php" method="POST">
            <div class="mb-3">
                <label for="hoten" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Nhập họ và tên" required>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ" required>
            </div>
            <div class="mb-3">
                <label for="gioitinh" class="form-label">Giới tính</label>
                <select class="form-select" id="gioitinh" name="gioitinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="register">Đăng ký</button>
        </form>
    </div>
</body>
</html>
