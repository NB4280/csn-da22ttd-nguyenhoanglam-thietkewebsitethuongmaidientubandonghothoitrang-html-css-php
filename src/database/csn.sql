-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2025 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin`, `username`, `password`, `admin_status`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `MaChiTietGH` int(11) NOT NULL,
  `MaGioHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `DiemDanhGia` int(11) NOT NULL,
  `BinhLuan` text NOT NULL,
  `NgayDanhGia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMucSP` int(11) NOT NULL,
  `TenDanhMucSP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMucSP`, `TenDanhMucSP`) VALUES
(5, 'Đồng hồ nam'),
(6, 'Đồng hồ nữ'),
(7, 'Đồng hồ Nhật'),
(8, 'Đồng hồ Nhật Bản'),
(9, 'Đồng hồ Thụy Sĩ'),
(10, 'Đồng hồ Nhật Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `NgayDatHang` date NOT NULL,
  `TongTien` decimal(10,2) NOT NULL,
  `TrangThai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `HoTenKhachHang` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `Mật khẩu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTenKhachHang`, `DiaChi`, `GioiTinh`, `SoDienThoai`, `Mật khẩu`) VALUES
(3, 'Nguyễn Hoàng Lăm', 'Trà Vinh Cầu Ngang', 'Nam', '03423343455', '$2y$10$I30gBLnjst8Nfw1Xi9AJC.3087H0yK5J9qWWmhicUNluStZe06PUO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `MaDanhMucSP` int(11) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `SoLuongSP` int(11) NOT NULL,
  `GiaBan` decimal(10,2) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `TomTat` varchar(100) NOT NULL,
  `MoTa` text NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `MaDanhMucSP`, `TenSanPham`, `SoLuongSP`, `GiaBan`, `HinhAnh`, `TomTat`, `MoTa`, `TrangThai`) VALUES
(19, 10, 'Casio Casio MTP-1381L-1AVDF – Nam – Quartz (Pin) ', 5, 1572000.00, '1736349480_dongho1.png', 'Đồng hồ Casio MTP-1381L-1AVDF có vỏ kim loại bằng chất liệu thép không gỉ, nền số màu đen mạnh mẽ, k', 'Thông tin sản phẩm\r\nThương hiệu: Casio\r\n\r\nSố hiệu sản phẩm: MTP-1381L-1AVDF\r\n\r\nBộ sưu tập: Casio MTP\r\n\r\nXuất xứ: Nhật Bản\r\n\r\nGiới tính: Nam\r\n\r\nKính: Mineral Crystal (Kính cứng)\r\n\r\nMáy: Quartz (Pin)\r\n\r\nBảo hành quốc tế: 1 năm\r\n\r\nBảo hành tại Hải Triều:\r\n\r\nĐường kính mặt số: 39.9mm\r\n\r\nBề dày mặt số: 8.9 mm\r\n\r\nNiềng:\r\n\r\nDây đeo: Dây da chính hãng\r\n\r\nMàu mặt số: Đen\r\n\r\nChống nước: 5 ATM\r\n\r\nChức năng: Lịch ngày – Lịch thứ', 1),
(20, 10, ' Fossil Fossil TOWNSMAN ME3265 ', 5, 7350000.00, '1736349672_dongho2.png', 'Fossil TOWNSMAN ME3265 mang đến nghệ thuật chế tác đồng hồ cơ học và phong cách đương đại. Bộ máy Au', 'Thông tin sản phẩm\r\nThương hiệu: Fossil\r\n\r\nSố hiệu sản phẩm: ME3265\r\n\r\nBộ sưu tập: Fossil TOWNSMAN\r\n\r\nXuất xứ: Mỹ\r\n\r\nGiới tính: Nam\r\n\r\nKính: Mineral Crystal (Kính cứng)\r\n\r\nMáy: Automatic (Tự động)\r\n\r\nBảo hành quốc tế: 2 năm\r\n\r\nBảo hành tại Hải Triều: 5 năm\r\n\r\nĐường kính mặt số: 44 mm\r\n\r\nBề dày mặt số: 11.2 mm\r\n\r\nNiềng: Thép không gỉ\r\n\r\nDây đeo: Dây da\r\n\r\nMàu mặt số: Xanh lá\r\n\r\nChống nước: 5 ATM', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`MaChiTietGH`),
  ADD KEY `MaGioHang` (`MaGioHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMucSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMucSP` (`MaDanhMucSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `MaChiTietGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMucSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`MaGioHang`) REFERENCES `giohang` (`MaGioHang`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMucSP`) REFERENCES `danhmuc` (`MaDanhMucSP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
