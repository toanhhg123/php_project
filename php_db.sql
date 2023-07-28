-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 28, 2023 lúc 05:20 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `image`, `created_at`, `updated_at`, `title`, `content`) VALUES
(1, '64c3cdd8ce4b6images.jpeg', '2023-07-28 14:16:56', '2023-07-28 15:18:11', 'Posts about us\n', 'This is a name that is no stranger to many pet lovers in Ho Chi Minh City, SC Dog Shop offers all kinds of pet dogs, including famous ones such as Chow Chow, Alaska, Poodle, Pom, etc. If there are dog breeds that the shop does not sell, the staff is also willing to contact you to find the dogs you require from reputable sources that they know are all warranted. In addition, the shop also provides care, breeding, spa, hair trimming, etc. Although the price is a bit high, but with the guaranteed quality plus the dedication of the shop will definitely bring to you. give you satisfaction.\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `isOrder` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `product_id`, `qty`, `isOrder`) VALUES
(39, 18, '2023-07-28 21:28:44', '2023-07-28 21:28:44', 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Dog Alaka', '', '2023-07-27 13:07:58', '2023-07-28 15:16:53'),
(12, 'King Cat', '', '2023-07-27 13:08:19', '2023-07-28 15:16:59'),
(13, 'Short Cat', '', '2023-07-27 13:08:26', '2023-07-28 15:17:07'),
(14, 'Japan Dog', '', '2023-07-27 13:08:31', '2023-07-28 15:17:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `title` varchar(75) NOT NULL,
  `image` varchar(250) NOT NULL,
  `metaTitle` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `summary` text DEFAULT NULL,
  `sku` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` smallint(6) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp(),
  `content` text DEFAULT NULL,
  `category_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `image`, `metaTitle`, `slug`, `summary`, `sku`, `price`, `discount`, `quantity`, `createdAt`, `updatedAt`, `content`, `category_id`) VALUES
(1, 'yellow Dog(JPA)', 'pro_1.jpeg', 'yellow Dog(JPA)', 'Cho_Nhat', 'yellow Dog(JPA)', '1230901', 500, 20, 200, '2023-07-27 20:19:00', '2023-07-27 20:19:00', 'yellow Dog(JPA)', 11),
(2, 'Dog white', 'pro_2.jpeg', 'Dog white', 'Cho_Tuyet', 'Dog white', '1230911', 700, 20, 200, '2023-07-27 20:21:55', '2023-07-27 20:21:55', 'Dog white', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productimage`
--

CREATE TABLE `productimage` (
  `id` bigint(20) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwordHash` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `registeredAt` datetime DEFAULT current_timestamp(),
  `lastLogin` datetime DEFAULT current_timestamp(),
  `intro` tinytext DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip` varchar(250) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `firstName`, `middleName`, `lastName`, `mobile`, `email`, `passwordHash`, `admin`, `registeredAt`, `lastLogin`, `intro`, `profile`, `country`, `zip`, `province`) VALUES
(11, 'admin', 'admin', 'admin', '123456789', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-04-13 11:54:47', '2023-04-13 11:54:47', '', '                                                                                                                                                                                                                                                                                                                    ', 'VN', '5500', 'HCM City'),
(17, 'Truc', 'Xuan', 'Nguyen', '0374282377', 'nguyenxuantruc6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2023-05-27 23:10:46', '2023-05-27 23:10:46', 'fafeaf', 'faseasfsa', 'Vietnam', '65000', 'Khanh Hoa'),
(18, '', '', 'Rolle', '0987654321', 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', 0, '2023-07-28 21:21:44', '2023-07-28 21:21:44', '', '', 'VN', '5000', 'Q1, HCM, Duong Abc');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_prfk_1` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_slug` (`slug`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_mobile` (`mobile`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_prfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
