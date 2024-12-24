-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2024 lúc 04:26 AM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthucung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh_sp`
--

CREATE TABLE `anh_sp` (
  `id_anh` int NOT NULL,
  `anh_sp` varchar(255) DEFAULT NULL,
  `id_sanpham` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `anh_sp`
--

INSERT INTO `anh_sp` (`id_anh`, `anh_sp`, `id_sanpham`) VALUES
(1, 'frontend/upload/iF5hX96s9OcKEjTMWRAy1sSjUXUY6IkGHeH7ImRN.jpg', 1),
(2, 'frontend/upload/YyUwoFMjJXWGztRuOMQ6AFswhO5opEBt7FfSwqRc.jpg', 2),
(3, 'frontend/upload/RdaSDOi2mKtJ9tXEvdcU9h2L8JPcHXw6A9f8syxW.jpg', 3),
(4, 'frontend/upload/1uNIVMXgXzrThbeFPtFv1HhLRGjof2XFXJtyqgRj.jpg', 3),
(5, 'frontend/upload/CNuRsUAKA9nvFX8ofliLK8QxmH4VHe4KwcAcdBTk.jpg', 3),
(6, 'frontend/upload/TzGXw9jVLvx9xkRVVE3Bc7j3LUJTiyetiIzvcmRl.jpg', 3),
(7, 'frontend/upload/331pf5OWwdRdgNwnB1M7jRb71mY3gYPSNZ0Lp3ob.jpg', 4),
(8, 'frontend/upload/zRWE1U1QCQa5mEHJW5CHLyFM0sRe4BvIo4RXl7fQ.jpg', 5),
(9, 'frontend/upload/d5yaYGxEYn2PFTIOW6FNXgP6fEQZLm9TY4sQ2J20.jpg', 5),
(10, 'frontend/upload/SDVW7XrgbW0uXs2jiK2ViyF3vbccy2vG7tohSoge.jpg', 6),
(12, 'frontend/upload/a2zEC5CoB1ah5zspi7Jl56rJaUv4DkZU0UllUCL4.jpg', 7),
(13, 'frontend/upload/vT2KN7GNKV2fXSvWg0pJk9tTAUoRrDuT8Z5wzOyW.jpg', 7),
(14, 'frontend/upload/1ekJPUBVGuycA0wDuiWVItycJxBtzaUHIG8JXrif.jpg', 7),
(15, 'frontend/upload/wRPBxUsP3S2pNTJD7f5xdQBuYQQ8sSEz8VsiJjud.jpg', 8),
(16, 'frontend/upload/TROPdySHh7bu767Y5liiwHW30ui5UbcRtQBupgSr.jpg', 8),
(17, 'frontend/upload/yBM3HNZ3iGZMDgvlq2UOOl5FwxXKEZWmwSPtiwly.jpg', 9),
(18, 'frontend/upload/7TkhqoFB7msDfN6KacInnaaAaPhtzoXBOOH13diy.jpg', 9),
(19, 'frontend/upload/7EAjrzeZtrk7G4r2eDp3RupLEMnSIkHAfTmHM9wq.jpg', 10),
(20, 'frontend/upload/EFCzcQhuDnQ4CgSIQ5bY5v7ZvadwMPwRj1rVv70r.jpg', 10),
(21, 'frontend/upload/vb2RrEMwVYDJVYqnWcQz5G0DjfzHxyXS4kWSn2EU.jpg', 10),
(22, 'frontend/upload/zeVT4SUBw8W9kQlyEzzJpEIIwOLa4O8osFsRKaR6.jpg', 11),
(23, 'frontend/upload/mL0DXdeXlZInmaxNoot0mskHwRngAtut8bBRj74I.jpg', 11),
(24, 'frontend/upload/fLiivlkmT8c1EytwnODfys3G0My4JI5EIvUNwjNk.jpg', 11),
(25, 'frontend/upload/OTo9JJYK41yy5RooU9MY0n4F774xwMOw1qDZhyph.webp', 12),
(26, 'frontend/upload/tyZvYEdB2Ogtwirk6AnkwiQmbr48eLlzNf95jjRV.jpg', 14),
(27, 'frontend/upload/n96sy0jsR6ruaMf9PH2d1UOPqtKl41v90RfsgCfH.jpg', 14),
(28, 'frontend/upload/JIDsBi8qvgFpz2cPRQdECf3K5JnamGTWK2JRpdlI.jpg', 14),
(29, 'frontend/upload/WzPLJzROoY48wpsfDIsGBqrOo9fke6LRPUwsW1uE.jpg', 15),
(30, 'frontend/upload/0HtTpIuZw2YYqDzxfZUyB0unIN1qSNw6f4U5s62l.jpg', 16),
(31, 'frontend/upload/F6CoFABWstR9iJsfuVP2kRA0MAm3uvlmJPWC1jVn.webp', 17),
(32, 'frontend/upload/HriItBbUEx0c1ziqpSlDi0ReIP3HnIfndqWxPQsA.webp', 18),
(33, 'frontend/upload/ikAGjqtuj44gWoqC3biVsROAePc3Q3JVeEE3LNuQ.webp', 18),
(34, 'frontend/upload/7HUDGsuKDH4Kogkyqr1bvAXO16EMMH7Z2ukHLVMi.jpg', 20),
(35, 'frontend/upload/tCAeVYiifAi7uKqrrtrqazonJDHZyzY7xRBiIwJu.jpg', 20),
(36, 'frontend/upload/sagm0J4aDBZDsIwg3M9C0yYtnA6MWKhfrUekCWyu.jpg', 21),
(37, 'frontend/upload/ZmR768so3I0RARYL1L3sSrU8gpbADbRD73Rfi0US.jpg', 22),
(38, 'frontend/upload/hN3DeIdTEV3HaioK1VbFH2RaxOgL8LfVFj52W3cA.webp', 23),
(39, 'frontend/upload/RIvM8lQlbfNupV3rLCO3gySAr5zScsV7ENpt8yC4.webp', 24),
(40, 'frontend/upload/zPre7vxJpjpvq6MJ17wu8mCrQQ0yVRNtlePZ0bL0.png', 25),
(41, 'frontend/upload/o5ZEJwYBBQ6vjYUTF6aSKQF6FJPDKPYuyxCGXtRZ.png', 25),
(42, 'frontend/upload/vTtROKHpCEqhPbpOUsVmfp1qIAdNBtqZfQRhg5JS.jpg', 35),
(43, 'frontend/upload/sDPUolbaqIzOMY1ExqnOYq74OIUGS3rwN8ZJvIDg.jpg', 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `anhbanner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `anhbanner`) VALUES
(2, 'frontend/upload/banner/1732078320_Banner-Web-02-scaled.jpg'),
(3, 'frontend/upload/banner/1732078353_Banner-Web-01-scaled.jpg'),
(4, 'frontend/upload/banner/1732078365_Banner-Web-03-scaled.jpg'),
(5, 'frontend/upload/banner/1732080392_Banner3-1.jpg'),
(10, 'frontend/upload/banner/1732802059_R.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ctdonhang` int UNSIGNED NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` tinyint DEFAULT NULL,
  `giamgia` int DEFAULT NULL,
  `giatien` int DEFAULT NULL,
  `giakhuyenmai` int DEFAULT NULL,
  `id_sanpham` int NOT NULL,
  `id_dathang` int UNSIGNED NOT NULL,
  `id_kh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_ctdonhang`, `tensp`, `soluong`, `giamgia`, `giatien`, `giakhuyenmai`, `id_sanpham`, `id_dathang`, `id_kh`) VALUES
(1, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 1, NULL, 345000, 345000, 23, 1, 2),
(2, 'Mũ cho chó.', 1, NULL, 100000, 100000, 24, 2, 2),
(3, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 2, 0, 300000, 300000, 21, 3, 2),
(4, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 1, NULL, 345000, 345000, 23, 4, 2),
(5, 'Phốc sóc mini', 1, 0, 1000000, 1000000, 20, 5, 2),
(6, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 6, 1),
(7, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 7, 3),
(8, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 8, 3),
(9, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 9, 3),
(10, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 10, 1),
(11, 'Mèo Munchkin Ragdoll màu nâu trắng', 1, 2, 31000000, 30380000, 25, 11, 2),
(12, 'Mũ cho chó.', 1, NULL, 100000, 100000, 24, 11, 2),
(13, 'Mũ cho chó.', 1, NULL, 100000, 100000, 24, 12, 2),
(14, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 1, NULL, 345000, 345000, 23, 13, 2),
(15, 'Mèo Munchkin Ragdoll màu nâu trắng', 1, 2, 31000000, 30380000, 25, 14, 2),
(16, 'Mũ cho chó.', 1, NULL, 100000, 100000, 24, 15, 2),
(17, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 1, 0, 300000, 300000, 21, 16, 1),
(18, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 1, NULL, 345000, 345000, 23, 17, 1),
(19, 'Mũ cho chó.', 1, NULL, 100000, 100000, 24, 18, 1),
(20, 'Phốc sóc mini', 1, 0, 1000000, 1000000, 20, 19, 1),
(21, 'Chó Poodle', 1, 2, 1200000, 1176000, 7, 20, 1),
(22, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 1, NULL, 345000, 345000, 23, 21, 3),
(23, 'Chó Corgi', 20, 5, 4500000, 4275000, 18, 22, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `iddanhgia` int NOT NULL,
  `noidung` varchar(45) NOT NULL,
  `rating` int NOT NULL,
  `id_sanpham` int DEFAULT NULL,
  `id_kh` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`iddanhgia`, `noidung`, `rating`, `id_sanpham`, `id_kh`) VALUES
(1, '3', 3, 24, 2),
(2, 'sản phẩm dùng okee', 5, 21, 2),
(3, 'sản phẩm tốt', 4, 21, 1),
(4, 'sản phẩm tạm được', 3, 21, 3),
(5, 'sản phẩm siêu tệ', 1, 21, 3),
(6, 'sản phẩm uki', 4, 21, 1),
(7, 'sản phẩm tốt!!!', 4, 21, 1),
(9, 'oke', 5, 25, 2),
(10, 'mèo gì đắt dữ', 4, 25, 2),
(11, 'sản phẩm dùng tốt !!!', 5, 24, 2),
(12, 'oke!!!', 4, 21, 3),
(13, 'okeê', 5, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int NOT NULL,
  `ten_danhmuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'Chó'),
(2, 'Mèo'),
(3, 'Sản phẩm cho chó'),
(4, 'Sản phẩm cho mèo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `id_dathang` int UNSIGNED NOT NULL,
  `ngaydathang` datetime DEFAULT CURRENT_TIMESTAMP,
  `ngaygiaohang` datetime DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int NOT NULL,
  `phuongthucthanhtoan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachigiaohang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`id_dathang`, `ngaydathang`, `ngaygiaohang`, `tongtien`, `phuongthucthanhtoan`, `diachigiaohang`, `trangthai`, `id_kh`) VALUES
(2, '2024-11-21 15:06:10', '2024-11-26 00:00:00', 100000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 2),
(3, '2024-11-21 15:07:13', '2024-11-25 00:00:00', 600000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 2),
(4, '2024-11-25 07:51:35', '2024-12-21 00:00:00', 345000, 'VNPAY', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang giao hàng', 2),
(5, '2024-11-25 07:54:20', '2024-11-26 00:00:00', 1000000, 'VNPAY', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 2),
(6, '2024-11-25 21:02:46', '2024-11-25 00:00:00', 300000, 'COD', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 1),
(7, '2024-11-25 21:52:23', '2024-11-25 00:00:00', 300000, 'COD', 'Phan Van Dinh, Lien Chieu, Da Nang', 'giao thành công', 3),
(8, '2024-11-25 21:55:06', '2024-11-25 00:00:00', 300000, 'VNPAY', 'Phan Van Dinh, Lien Chieu, Da Nang', 'giao thành công', 3),
(9, '2024-11-25 22:58:54', '2024-11-25 00:00:00', 300000, 'COD', 'Phan Van Dinh, Lien Chieu, Da Nang', 'giao thành công', 3),
(10, '2024-11-25 22:59:07', '2024-11-25 00:00:00', 300000, 'COD', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 1),
(12, '2024-11-27 10:34:34', '2024-12-24 00:00:00', 445000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 2),
(13, '2024-11-27 10:34:34', NULL, 445000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đã hủy', 2),
(14, '2024-11-30 09:19:31', '2024-12-01 00:00:00', 30380000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 2),
(15, '2024-12-21 19:18:11', NULL, 100000, 'COD', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang xử lý', 2),
(16, '2024-12-21 19:42:07', NULL, 300000, 'VNPAY', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang xử lý', 1),
(17, '2024-12-21 19:43:36', NULL, 345000, 'VNPAY', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang xử lý', 1),
(18, '2024-12-21 19:58:20', '2024-12-24 00:00:00', 100000, 'COD', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang giao hàng', 1),
(19, '2024-12-21 21:03:43', NULL, 1000000, 'COD', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'đang xử lý', 1),
(20, '2024-12-21 21:04:26', '2024-12-24 00:00:00', 1176000, 'VNPAY', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', 'giao thành công', 1),
(21, '2024-12-22 09:43:26', '2024-12-24 00:00:00', 345000, 'VNPAY', 'Phan Van Dinh, Lien Chieu, Da Nang', 'đang giao hàng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `anhgallery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `anhgallery`) VALUES
(1, 'frontend/upload/gallery/1732721293_tải xuống (4).jpg'),
(2, 'frontend/upload/gallery/1732721299_tải xuống (2).jpg'),
(3, 'frontend/upload/gallery/1732721305_anh-cho-meo.jpg'),
(4, 'frontend/upload/gallery/1732721312_tải xuống (5).jpg'),
(5, 'frontend/upload/gallery/1732721317_tải xuống (3).jpg'),
(6, 'frontend/upload/gallery/1732763068_hinh-anh-cho-shiba-cuoi-hai-huoc_011111806.jpg'),
(7, 'frontend/upload/gallery/1732763105_R.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` bigint UNSIGNED NOT NULL,
  `khachhang_id` bigint UNSIGNED NOT NULL,
  `sanpham_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `khachhang_id`, `sanpham_id`, `quantity`, `created_at`, `updated_at`) VALUES
(111, 1, 7, 1, '2024-12-21 12:58:34', '2024-12-21 12:58:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idtaikhoan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `hoten`, `diachi`, `sdt`, `idtaikhoan`) VALUES
(1, 'Lê Minh Nhật', '1, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', '0779533775', 1),
(2, 'Nguyễn Minh Nhật', 'K86/53, đường Phan Văn Định, phường Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng.', '0779533775', 3),
(3, 'Đỗ Phú Minh Nhật', 'Phan Van Dinh, Lien Chieu, Da Nang', '0779533775', 4),
(6, 'Vũ Đại', 'Phan Van Dinh', '0779533775', 5),
(12, 'Nguyen Minh Nhat', 'Phan Van Dinh', '0779533775', 14),
(13, 'Nguyen Minh Nhat', 'Phan Van Dinh', '0779533775', 15),
(14, 'Nguyen Minh Nhat', 'Phan Van Dinh', '0779533775', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id_phanquyen` int NOT NULL,
  `tenquyen` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id_phanquyen`, `tenquyen`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giasp` int DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `giamgia` int DEFAULT NULL,
  `giakhuyenmai` int DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `id_danhmuc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensp`, `giasp`, `mota`, `giamgia`, `giakhuyenmai`, `soluong`, `id_danhmuc`) VALUES
(1, 'Thức Ăn Cho Chó Trưởng Thành Giống Lớn – Eminent Adult Large Breed – 500g', 72000, NULL, 0, 72000, 20, 3),
(2, 'Pate Cho Mèo – Pate Fit4 Cats -Cá Ngừ Và Thanh Cua 160g', 20000, NULL, 5, 19000, 5, 4),
(3, 'Chó Bull', 2000000, NULL, 10, 1800000, 9, 1),
(4, 'Chó Husky', 3000000, NULL, 0, 3000000, 10, 1),
(5, 'Chó chihuahua', 2000000, NULL, 8, 1840000, 9, 1),
(6, 'Bánh Gặm Cho Chó – Smoked Beefy Dental Bone -14g', 20000, NULL, 0, 20000, 5, 3),
(7, 'Chó Poodle', 1200000, 'Chó siêu dễ thương', 2, 1176000, 12, 1),
(8, 'Mèo anh lông ngắn', 1799000, 'Mèo dễ thương, dễ chăm sóc', 5, 1709050, 19, 2),
(9, 'Mèo Bengal', 1000000, 'Mèo dễ tính, dễ ăn', 2, 980000, 28, 2),
(10, 'Mèo Cymric', 1499000, NULL, 3, 1454030, 20, 2),
(11, 'Mèo Ragamuffin', 3000000, 'Mèo siêu đẹp', 5, 2850000, 30, 2),
(12, 'Thức ăn chó Pedigree vị thịt bò & rau củ 500g', 34999, 'Đồ ăn siêu béo!!!', NULL, 34999, 100, 3),
(14, 'Thau cát vệ sinh mèo vuông to kèm xẻng múc', 115000, 'Khô thoáng, dễ vệ sinh, không mùi.', 10, 103500, 100, 4),
(15, 'Pate Aatas Cat vị cá ngừ và cá mòi cho mèo lon 80g', 20000, 'Đồ ăn ngon, siêu béo.', 5, 19000, 100, 4),
(16, 'Hạt Catsrang mix topping cho mèo mọi lứa tuổi túi chiết 1kg', 95000, NULL, 3, 92150, 100, 4),
(17, 'Ăn vặt khô ăn vặt cho chó mèo hũ 100g', 49000, NULL, 5, 46550, 100, 4),
(18, 'Chó Corgi', 4500000, '-Dễ nuôi dễ chăm sóc, ăn cơm cháo hoặc hạt khô ngon lành.\r\n-Đã tiêm phòng mũi 5 trong 1 và tẩy giun định kì cho bé.', 5, 4275000, 15, 1),
(20, 'Phốc sóc mini', 1000000, '-Ăn cơm tốt, nghịch ngợm quấn chủ\r\n-Đã tiêm phòng mũi 5 bệnh vs sổ giun định kì', 0, 1000000, 6, 1),
(21, 'Túi đựng chó mèo ANIME hình họa tiết White Cats', 300000, 'Size S cho chó mèo < 3kg: Dài 33cm – Rộng 18cm – Cao 22cm.\r\nSize M cho chó mèo < 5kg : Dài 39cm – Rộng 22cm – Cao 26cm.\r\nSize L cho chó mèo < 8kg : Dài 46cm – Rộng 24cm – Cao 28cm.', 0, 300000, 5, 4),
(22, 'Lồng vận chuyển chó mèo AUPET BP27 Pet Kennel', 599999, 'Size SS – Mã sản phẩm 0922 (BP270) : 29 x 41 x 31 (cm)\r\nSize S – Mã sản phẩm 0925 (BP274) : 34 x 50 x 32 (cm)\r\nSize M – Mã sản phẩm 0923 (BP275) : 39 x 59 x 41 (cm)', 0, 599999, 14, 3),
(23, 'Máy lọc nước cho chó mèo tự động tuần hoàn PAW Pet Radius Water Dispenser', 345000, 'Tự động cung cấp nước cho chó', NULL, 345000, 12, 3),
(24, 'Mũ cho chó.', 100000, NULL, NULL, 100000, 9, 3),
(25, 'Mèo Munchkin Ragdoll', 31000000, 'Ngoại hình nổi bật với đôi chân ngắn dễ thương, bộ lông mềm mượt, phối màu nâu trắng độc đáo. Khuôn mặt tròn với đôi mắt xanh to, biểu cảm dễ thương và hiền hòa.', 2, 30380000, 0, 2),
(35, 'Mèo Maine Coon', 16800000, NULL, 4, 16128000, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtaikhoan` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_phanquyen` int NOT NULL,
  `trangthai` varchar(45) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idtaikhoan`, `email`, `password`, `id_phanquyen`, `trangthai`, `remember_token`) VALUES
(1, 'nhatdeptrai0175@gmail.com', '$2y$12$c0wWM6nWuiVIpLW0Dg8w9OG7aqNNK2uCsqHvbaWqAxFL0slLWh0VO', 2, 'unlock', 'ItlWFAgJueJpYSWVrFjb8VJe9xIqgBulpa7UlaoF00GfWQkR5lcqX2vacgMi'),
(2, 'admin@gmail.com', '$2y$12$0CLiNTpworzZA82m8aL1Z./O8DsNbZLcjI4LZ1Y3i00SinxB1meAm', 1, 'unlock', NULL),
(3, 'nhatnguyen4369@gmail.com', '$2y$12$L3oWPc.fmw9qOZFYftOrAeFmUJjyOOhq11rNJcQTgD1eIZhou3Kly', 2, 'unlock', 'fjlrH5sLxCK0Muhon26yJ8tEnmuMlfripmAAkHFdmTUblIUgY1TqcGQnHbTj'),
(4, 'nhathacker123@gmail.com', '$2y$12$ebo1Raw5ln2dPJF9FrgWYemVAXgCxO4nIaUDfeHYTevI5B20ySlrq', 2, 'unlock', 'TfpqMW59n0v22yhgurGdZmMbJXGEGxtRvqFSi5sv7oUFwdDRNO8C1G45JCKC'),
(5, 'vudai123@gmail.com', '$2y$12$KBkKa5ww0qWki/x5JXBT4OTqegUGgMP.sMkQVreG7ChdIn5CaeuoC', 2, 'unlock', NULL),
(14, 'nhat12345@gmail.com', '$2y$12$oJ1Fq3wFd9hu9a.aNAHS/.Ao8WKnIn8LY4qWx92U3b4N2tP32k4E2', 2, 'unlock', NULL),
(15, 'nhat1607@gmail.com', '$2y$12$hXqbi/uMx4MMSdS09jv7Ne4zxWac8lyAXqtTRxYV3LAKhguAv3X3e', 2, 'lock', NULL),
(16, 'nhatnguyen123@gmail.com', '$2y$12$9IDphwC1nvALmRziA27e6.G5LkNPg7UugAAB7OBT2mD7knVSPb6MO', 2, 'unlock', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh_sp`
--
ALTER TABLE `anh_sp`
  ADD PRIMARY KEY (`id_anh`),
  ADD KEY `fk_id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_ctdonhang`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`iddanhgia`),
  ADD KEY `fk_danhgiasanpham_dathang` (`id_sanpham`),
  ADD KEY `fk_danhgiasanpham_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`id_dathang`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`),
  ADD KEY `fk_idtaikhoan` (`idtaikhoan`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id_phanquyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `fk_customer` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtaikhoan`),
  ADD KEY `fk_id_phanquyen` (`id_phanquyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh_sp`
--
ALTER TABLE `anh_sp`
  MODIFY `id_anh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_ctdonhang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `iddanhgia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `id_dathang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtaikhoan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anh_sp`
--
ALTER TABLE `anh_sp`
  ADD CONSTRAINT `fk_id_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `fk_danhgiasanpham_dathang` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_danhgiasanpham_kh` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_idtaikhoan` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`idtaikhoan`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_id_phanquyen` FOREIGN KEY (`id_phanquyen`) REFERENCES `phanquyen` (`id_phanquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
