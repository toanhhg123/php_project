-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 03, 2023 lúc 05:27 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id20609119_shoprol`
--

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
(16, 11, '2023-04-15 14:14:42', '2023-04-15 14:14:42', 2, 2, 1),
(17, 11, '2023-04-15 14:18:17', '2023-04-15 14:18:17', 4, 1, 1),
(18, 11, '2023-04-15 15:12:12', '2023-04-15 15:12:12', 3, 1, 1),
(19, 11, '2023-04-15 15:14:59', '2023-04-15 15:14:59', 2, 1, 0),
(20, 14, '2023-04-15 15:17:34', '2023-04-15 15:17:34', 1, 1, 1);

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
(1, 'Fresh', 'This category can include a list of all the fresh vegetables available at the shop. It can be further divided into subcategories based on the type of vegetable, such as leafy greens, root vegetables, or exotic vegetables.', '2023-03-23 04:47:13', '2023-03-23 04:47:13'),
(2, 'Organic', 'This category can include all the organic vegetables that the shop sells. It can be further divided into subcategories based on the type of vegetable', '2023-03-23 04:47:54', '2023-03-23 04:47:54');

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
(1, 'BELL PEPPER', 'product-1.jpg', 'The book will be open to the public in Dubai', 'BELL-PEPPER', 'Bell pepper, also known as sweet pepper or capsicum, is a type of fruit that is widely used in many cuisines around the world.', '19001989', 100, 20, 200, '2023-03-23 13:44:49', '2023-03-23 13:44:49', '                                                                                                    Bell pepper, also known as sweet pepper or capsicum, is a type of fruit that is widely used in many cuisines around the world. It belongs to the same family as chili peppers, tomatoes, and potatoes, and it is native to Central and South America.\r\n\r\nBell peppers come in different colors, including green, yellow, orange, and red. The color of the bell pepper depends on its level of ripeness, with green being the least ripe and red being the most ripe.\r\n\r\nBell peppers are low in calories and are a good source of nutrients such as vitamin C, vitamin A, and dietary fiber. They also contain antioxidants that can help protect against various diseases.\r\n\r\nBell peppers can be eaten raw or cooked and are commonly used in salads, stir-fries, soups, stews, and many other dishes. They can be roasted, grilled, baked, or sautéed, and their sweet, mild flavor makes them a versatile ingredient in many recipes.\r\n\r\nOverall, bell peppers are a nutritious and tasty addition to any diet, and their vibrant colors and unique shape make them a popular choice for both cooking and garnishing.                                                                                                    ', 1),
(2, 'STRAWBERRY', 'product-2.jpg', 'Packaged products, fresh imported from China', 'STRAWBERRY', 'STRAWBERRY', 'STRAWBERRY', 50, 10, 100, '2023-04-10 18:33:42', '2023-04-10 18:33:42', 'Packaged products, fresh imported from China', 1),
(3, 'CARROTS', '643417e8a514fproduct7.jpg', 'packaged product, fresh and import in china', 'carrots', 'packaged product, fresh and import in china', 'packaged product, fresh and import in china', 100, 20, 200, '2023-04-10 21:06:32', '2023-04-10 21:06:32', 'packaged product, fresh and import in china', 1),
(4, 'GREEN BEANS', '64341893b0a20product3.jpg', 'product package and fresh in china', 'GREEN_BEANS', 'product package and fresh in china', 'product package and fresh in china', 300, 20, 300, '2023-04-10 21:09:23', '2023-04-10 21:09:23', 'product package and fresh in china', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productImage`
--

CREATE TABLE `productImage` (
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
(11, 'admin', 'admin', 'admin', '090909090', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-04-13 11:54:47', '2023-04-13 11:54:47', '', '                                                                                                                                                                                ', 'VN', '5500', 'HCM City'),
(14, 'rol', 'le', 'le', '098989765', 'user@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2023-04-15 15:16:45', '2023-04-15 15:16:45', '', '', 'VietNam', '55000', 'HCM city');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `productImage`
--
ALTER TABLE `productImage`
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
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `productImage`
--
ALTER TABLE `productImage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Các ràng buộc cho bảng `productImage`
--
ALTER TABLE `productImage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
