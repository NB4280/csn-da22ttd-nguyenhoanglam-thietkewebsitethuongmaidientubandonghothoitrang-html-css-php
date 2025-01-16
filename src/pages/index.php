<?php
    include("../admin/config/config.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 
</head>


<style>
   
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        
  
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

     
        .slider {
            margin: 20px 0;
        }
        .slider img {
            width: 100%;
            border-radius: 10px;
        }

      
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
            height: 70px;
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .product-item p {
            color: #007bff;
        }

        
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

<body>
   
    <?php 
        include("../includes/header.php");
    ?>
    <main class="ms-5 me-5">

     
        <div class="row">
            <?php 
                include("../includes/banner_trai.php");
            ?>
            

            <?php
                include("../pages/main.php");  
            ?>    
            
        </div>
    </main>
    
    <?php 
        include("../includes/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

