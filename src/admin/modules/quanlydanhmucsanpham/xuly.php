<?php
    include("../../config/config.php");
    $tenloaisp = $_POST['tendanhmuc'];

    if (isset($_POST['themdanhmuc']))
    {
        $sql_them = "INSERT INTO danhmuc(TenDanhMucSP) VALUE ('$tenloaisp')";
        mysqli_query($mysqli,$sql_them);
        header("Location:../../pages/index.php?action=quanlydanhmucsanpham&query=them");
    }elseif(isset($_POST['suadanhmuc'])){
        $iddanhmuc = $_GET['iddanhmuc'];
        $sql_sua = "UPDATE danhmuc SET TenDanhMucSP='$tenloaisp' WHERE MaDanhMucSP='$iddanhmuc'";
        mysqli_query($mysqli,$sql_sua);
        header("Location:../../pages/index.php?action=quanlydanhmucsanpham&query=them");
    }else{
        $id = $_GET['iddanhmuc'];      
        $sql_xoa = "DELETE FROM danhmuc WHERE MaDanhMucSP = '$id'";
        mysqli_query($mysqli,$sql_xoa);
        header("Location:../../pages/index.php?action=quanlydanhmucsanpham&query=them");
    }
?>