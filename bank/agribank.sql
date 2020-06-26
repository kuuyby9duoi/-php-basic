-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2020 lúc 10:35 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `agribank`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id` int(15) NOT NULL,
  `tk_goc` int(13) NOT NULL,
  `tk_nhan` int(13) NOT NULL,
  `so_tien` int(18) NOT NULL,
  `ngay_gio` datetime NOT NULL,
  `noi_dung` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodu_cuoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id`, `tk_goc`, `tk_nhan`, `so_tien`, `ngay_gio`, `noi_dung`, `act`, `sodu_cuoi`) VALUES
(7, 369918375, 363427106, 100000, '2020-06-17 01:08:01', '', 'CK', 0),
(8, 369918375, 0, 200000, '2020-06-16 21:37:51', '', 'RT', 1122900000),
(9, 369918375, 0, 200000, '2020-06-16 21:38:45', '', 'RT', 1122700000),
(10, 369918375, 0, 200000, '2020-06-16 21:50:48', '', 'RT', 1122500000),
(11, 369918375, 0, 200000, '2020-06-16 21:56:28', '', 'RT', 1122300000),
(12, 369918375, 0, 200000, '2020-06-16 21:56:58', '', 'RT', 1122100000),
(13, 369918375, 0, 200000, '2020-06-16 21:57:29', '', 'RT', 1121900000),
(14, 369918375, 0, 200000, '2020-06-16 21:58:54', '', 'RT', 1121700000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `stk` int(13) NOT NULL,
  `password` int(8) NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chinhanh` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(13) NOT NULL,
  `diachi` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodu` int(18) NOT NULL,
  `ngaysinh` date NOT NULL,
  `loaitk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`stk`, `password`, `ten`, `chinhanh`, `sdt`, `diachi`, `sodu`, `ngaysinh`, `loaitk`) VALUES
(363427106, 12345, 'Nguyễn Thị Cúc', 'Agribank Thanh Hóa', 363427106, 'Chương Dương, Phố 4, Phường Quảng Hưng, tp Thanh Hóa', 4200000, '1974-08-04', 'credit'),
(369918375, 12345, 'Trịnh Sỹ Dự', 'Agribank Hà Thành 1', 369918375, 'Ngách 99, Ngõ Gỗ Đề, phường Hoàng Văn Thụ, quận Hoàng Mai, Hà Nội, Việt Nam', 1121700000, '2000-05-03', 'vip');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`stk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `stk` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369918376;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
