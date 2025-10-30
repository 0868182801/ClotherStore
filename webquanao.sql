-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 10:28 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_img` varchar(255) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `role` varchar(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_img`, `admin_pass`, `role`, `created_time`, `last_update`) VALUES
(6, 'Hưng', 'hungdev1807@gmail.com', '1701132631_73279050_655125098349354_1583613656749309952_n', 'hung123', 'admin', 1984, 0),
(9, 'Toàn', 'toan@gmail.com', '1701137704_z4861004787984_e4e557ae62d75d0deed61fb593995c08.jpg', 'toan123', 'writer', 1984, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` int(11) NOT NULL,
  `danhmuc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_name`) VALUES
(3, 'Nam'),
(4, 'Nữ'),
(5, 'Bộ sưu tập'),
(6, 'Trẻ Em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_sotien` int(11) NOT NULL,
  `discount_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_sotien`, `discount_code`) VALUES
(2, 20, 'YFPIH'),
(4, 30, 'IDQIR');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_phone` int(11) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_note` varchar(255) NOT NULL,
  `order_total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_phone`, `order_address`, `order_note`, `order_total`, `created_time`) VALUES
(10, 'Minh Phương', 585016892, 'Bắc giang', 'giao nhanh lên', 1947, 1701192194);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `order_detai_quantity` int(11) NOT NULL,
  `order_detai_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `sanpham_id`, `order_detai_quantity`, `order_detai_price`) VALUES
(12, 10, 25, 3, 649);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege`
--

CREATE TABLE `privilege` (
  `privilege_id` int(11) NOT NULL,
  `privileges_group_id` int(11) NOT NULL,
  `privilege_name` varchar(255) NOT NULL,
  `privilege_url_match` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `privilege`
--

INSERT INTO `privilege` (`privilege_id`, `privileges_group_id`, `privilege_name`, `privilege_url_match`, `created_time`) VALUES
(1, 2, 'Danh sÃ¡ch sáº£n pháº©m', 'view\\/sanpham\\.php$', 1698988909),
(2, 2, 'Quản trị', 'quantri\\.php$', 0),
(3, 2, 'XÃ³a sáº£n pháº©m', 'view\\/xoasp\\.php\\?sanpham_id=\\d+$', 0),
(4, 1, 'Danh má»¥c', 'view\\/danhmuc\\.php$', 1698988909),
(5, 1, 'Sá»­a danh má»¥c', 'view\\/suadm\\.php\\?danhmuc_id=\\d+$', 1698988909),
(6, 1, 'XÃ³a danh má»¥c', 'view\\/xoadm\\.php\\?danhmuc_id=\\d+$', 1698988909),
(7, 3, 'ÄÆ¡n hÃ ng', 'view\\/donhang\\.php$', 1596502615),
(8, 4, 'Danh sÃ¡ch sile', 'view\\/quangcao\\.php$', 1698988909),
(9, 4, 'Chá»©c nÄƒng xÃ³a', 'view\\/xoaslide\\.php\\?slide_id=\\d+$', 1698988909),
(10, 5, 'Danh sÃ¡c thÃ nh viÃªn', 'view\\/thanhvien\\.php$', 1698988909),
(11, 5, 'XÃ³a thÃ nh viÃªn', 'view\\/xoatv\\.php\\?admin_id=\\d+$', 1596502615),
(12, 5, 'PhÃ¢n quyá»n', 'view\\/privilege\\.php\\?admin_id=\\d+$', 1698988909),
(13, 5, 'LÆ°u phÃ¢n quyá»n', 'view\\/privilege\\.php\\?action\\=save+$', 1698988909);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privileges_group`
--

CREATE TABLE `privileges_group` (
  `privileges_group_id` int(11) NOT NULL,
  `privileges_group_name` varchar(255) NOT NULL,
  `privileges_group_position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `privileges_group`
--

INSERT INTO `privileges_group` (`privileges_group_id`, `privileges_group_name`, `privileges_group_position`, `created_time`) VALUES
(1, 'Danh má»¥c', 1, 1596502615),
(2, 'Sáº£n pháº©m', 2, 1596502615),
(3, 'ÄÆ¡n hÃ ng', 3, 1698988909),
(4, 'Quáº£ng cÃ¡o', 4, 1698988909),
(5, 'ThÃ nh viÃªn', 5, 1698988694);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `sale_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_name`) VALUES
(1, 'banchay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_gia` int(11) NOT NULL,
  `sanpham_size` varchar(11) NOT NULL,
  `sanpham_img` varchar(255) NOT NULL,
  `sanpham_ma` varchar(255) NOT NULL,
  `sanpham_mau` varchar(255) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanpham_id`, `sanpham_name`, `sanpham_gia`, `sanpham_size`, `sanpham_img`, `sanpham_ma`, `sanpham_mau`, `sale_id`, `size_id`, `danhmuc_id`) VALUES
(21, 'Áo Polo Nam Pique Mắt Chim Basic Co Giãn Thoáng Khí', 263, 'm', 'apm3299-dml-6.webp', 'APM3299-DML', 'xám', 1, 3, 3),
(22, 'Áo Polo Nữ Tay Ngắn Pique Mắt Chim Phối Bo Thoáng Khí', 254, 'M', 'apn3340-xu1-1.webp', 'APN3340-XU1', '', 1, 4, 4),
(23, 'Áo Gió Nam 3C Pro Có Mũ Siêu Ấm', 499, 'M', 'ao-khoac-nam-akm6017-tit-3 (1).webp', 'AKM6017-TIT', '', 1, 5, 3),
(24, 'Áo Phao Nữ 3S Siêu Nhẹ Tay Raglan', 599, 'L', 'ao-khoac-nu-phn6014-dod-2.webp', 'PHN6014-DOD', '', 1, 6, 4),
(25, 'Áo Phao Nữ Trần Trám', 649, 'M', 'phn6040-vac-qjn5056-den-4.webp', 'PHN6040-VAC', '', 1, 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(3, 'S'),
(4, 'M'),
(5, 'L'),
(6, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_img` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_img`, `created_time`) VALUES
(2, '1701133679_slider_1.webp', 1984),
(3, '1701192361_17006386661155641.webp', 1984),
(4, '1701192367_17007055477842195.webp', 1984),
(5, '1701192371_1700670691812960.webp', 1984);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_pass`, `role`, `created_time`) VALUES
(1, 'Hưng', 'tranhung6829@gmail.com', 585016892, 'hung123', 'user', 1701153389),
(2, 'Minh Phương', 'nguyenminhp135@gmail.com', 364023640, 'phuong123', 'user', 1701191734);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_privilege`
--

CREATE TABLE `user_privilege` (
  `user_privilege_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_privilege`
--

INSERT INTO `user_privilege` (`user_privilege_id`, `privilege_id`, `admin_id`, `created_time`) VALUES
(1, 1, 6, 1698988909),
(2, 2, 6, 1698988909),
(3, 3, 6, 1698988694),
(4, 4, 6, 1698988909),
(5, 5, 6, 1698988909),
(6, 6, 6, 1698988909),
(7, 7, 6, 1698988909),
(8, 8, 6, 1698988909),
(9, 9, 6, 1698988909),
(10, 10, 6, 1698988909),
(11, 11, 6, 1596502615),
(12, 12, 6, 1698988909),
(13, 13, 6, 1596502615),
(14, 1, 9, 1701138668),
(15, 2, 9, 1701138668),
(16, 3, 9, 1701138668);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `spbanchay_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`privilege_id`),
  ADD KEY `privileges_group_id` (`privileges_group_id`);

--
-- Chỉ mục cho bảng `privileges_group`
--
ALTER TABLE `privileges_group`
  ADD PRIMARY KEY (`privileges_group_id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`user_privilege_id`),
  ADD KEY `privilege_id` (`privilege_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `danhmuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `privilege`
--
ALTER TABLE `privilege`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `privileges_group`
--
ALTER TABLE `privileges_group`
  MODIFY `privileges_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `user_privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`sanpham_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`privileges_group_id`) REFERENCES `privileges_group` (`privileges_group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`privilege_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
