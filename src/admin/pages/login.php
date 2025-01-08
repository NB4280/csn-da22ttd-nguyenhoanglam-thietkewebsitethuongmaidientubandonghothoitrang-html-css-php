<?php
    session_start();
    include("../config/config.php");

   
    if (isset($_POST['dangnhap'])) {
        $taikhoan = mysqli_real_escape_string($mysqli, $_POST['username']);
        $matkhau = $_POST['password'];  
        $matkhau = md5($matkhau); 

     
        $sql = "SELECT * FROM admin WHERE username='$taikhoan' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        
        
        if ($row && mysqli_num_rows($row) > 0) {
            $user = mysqli_fetch_assoc($row);
            
           
            if ($matkhau == $user['password']) {
                $_SESSION['dangnhap'] = $taikhoan;
                header("Location: index.php");
                exit();
            } else {
                
                $error = "Tài khoản hoặc mật khẩu không đúng";
            }
        } else {
            
            $error = "Tài khoản hoặc mật khẩu không đúng";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f7;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .card-header {
            background: linear-gradient(135deg, #6c63ff, #6f42c1);
            color: white;
            padding: 20px;
            text-align: center;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }
        .btn-primary {
            background-color: #6c63ff;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5a54d1;
        }
        .alert {
            font-size: 14px;
            padding: 10px;
            background-color: #f8d7da;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        Đăng Nhập Admin
    </div>
    <div class="card-body">
        <form action="" autocomplete="off" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            
    
            <?php if (isset($error)) { ?>
                <div class="alert"><?php echo $error; ?></div>
            <?php } ?>
            
            <button type="submit" class="btn btn-primary w-100" name="dangnhap">Đăng Nhập</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>
</html> 
