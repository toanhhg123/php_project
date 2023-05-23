-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 08:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
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
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `product_id`, `qty`, `isOrder`) VALUES
(16, 11, '2023-04-15 14:14:42', '2023-04-15 14:14:42', 2, 2, 1),
(17, 11, '2023-04-15 14:18:17', '2023-04-15 14:18:17', 4, 1, 1),
(18, 11, '2023-04-15 15:12:12', '2023-04-15 15:12:12', 3, 1, 1),
(19, 11, '2023-04-15 15:14:59', '2023-04-15 15:14:59', 2, 1, 0),
(21, 15, '2023-05-23 13:00:47', '2023-05-23 13:00:47', 2, 1, 1),
(22, 15, '2023-05-23 13:01:01', '2023-05-23 13:01:01', 3, 1, 1),
(23, 15, '2023-05-23 13:02:28', '2023-05-23 13:02:28', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fresh', 'This category can include a list of all the fresh vegetables available at the shop. It can be further divided into subcategories based on the type of vegetable, such as leafy greens, root vegetables, or exotic vegetables.', '2023-03-23 04:47:13', '2023-03-23 04:47:13'),
(2, 'Organic', 'This category can include all the organic vegetables that the shop sells. It can be further divided into subcategories based on the type of vegetable', '2023-03-23 04:47:54', '2023-03-23 04:47:54'),
(3, 'Juice', 'ádasdadasdad', '2023-05-21 15:45:12', '2023-05-21 15:48:31'),
(4, 'Dried', 'ádasdasd', '2023-05-21 15:45:30', '2023-05-21 15:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `image`, `metaTitle`, `slug`, `summary`, `sku`, `price`, `discount`, `quantity`, `createdAt`, `updatedAt`, `content`, `category_id`) VALUES
(1, 'BELL PEPPER', 'product-1.jpg', 'The book will be open to the public in Dubai', 'BELL-PEPPER', 'Bell pepper, also known as sweet pepper or capsicum, is a type of fruit that is widely used in many cuisines around the world.', '19001989', 90, 10, 200, '2023-03-23 13:44:49', '2023-03-23 13:44:49', '                                                                                                                                            Bell pepper, also known as sweet pepper or capsicum, is a type of fruit that is widely used in many cuisines around the world. It belongs to the same family as chili peppers, tomatoes, and potatoes, and it is native to Central and South America.\r\n\r\nBell peppers come in different colors, including green, yellow, orange, and red. The color of the bell pepper depends on its level of ripeness, with green being the least ripe and red being the most ripe.\r\n\r\nBell peppers are low in calories and are a good source of nutrients such as vitamin C, vitamin A, and dietary fiber. They also contain antioxidants that can help protect against various diseases.\r\n\r\nBell peppers can be eaten raw or cooked and are commonly used in salads, stir-fries, soups, stews, and many other dishes. They can be roasted, grilled, baked, or sautéed, and their sweet, mild flavor makes them a versatile ingredient in many recipes.\r\n\r\nOverall, bell peppers are a nutritious and tasty addition to any diet, and their vibrant colors and unique shape make them a popular choice for both cooking and garnishing.                                                                                                                                            ', 1),
(2, 'STRAWBERRY', 'product-2.jpg', 'Packaged products, fresh imported from China', 'STRAWBERRY', 'STRAWBERRY', 'STRAWBERRY', 50, 10, 100, '2023-04-10 18:33:42', '2023-04-10 18:33:42', 'Packaged products, fresh imported from China', 1),
(3, 'CARROTS', '643417e8a514fproduct7.jpg', 'packaged product, fresh and import in china', 'carrots', 'packaged product, fresh and import in china', 'packaged product, fresh and import in china', 100, 20, 200, '2023-04-10 21:06:32', '2023-04-10 21:06:32', '                    packaged product, fresh and import in china123          ', 1),
(4, 'GREEN BEANS', '64341893b0a20product3.jpg', 'product package and fresh in china', 'GREEN_BEANS', 'product package and fresh in china', 'product package and fresh in china', 300, 20, 300, '2023-04-10 21:09:23', '2023-04-10 21:09:23', 'product package and fresh in china', 2),
(7, 'Netherland\'s bean\r\n', 'product-3.jpg', 'Google Dịch là một công cụ dịch thuật trực tuyến do Google phát triển', 'product-3', 'Google Dịch là một công cụ dịch thuật trực tuyến do Google phát triển. Nó cung cấp giao diện trang web, ứng dụng trên thiết bị di động cho hệ điều hành Android và iOS và giao diện lập trình ứng dụng giúp nhà phát triển xây dựng tiện ích mở rộng trình duyệt web và ứng dụng phần mềm', '12312', 30, 5, 20, '2023-05-21 22:10:10', '2023-05-31 22:06:14', 'Google Dịch là một công cụ dịch thuật trực tuyến do Google phát triển. Nó cung cấp giao diện trang web, ứng dụng trên thiết bị di động cho hệ điều hành Android và iOS và giao diện lập trình ứng dụng giúp nhà phát triển xây dựng tiện ích mở rộng trình duyệt web và ứng dụng phần mềm', 4),
(8, 'Green Salad', 'product-4.jpg', 'Green Salad new import in merica', 'Salad', 'Green Salad new import in merica', 'Green Salad new import in merica', 10, 10, 100, '2023-05-21 22:29:18', '2023-05-21 22:29:18', 'Packaged products, fresh imported from China', 1),
(9, 'TOMATOE', 'product-5.jpg', 'TOMATOE _ Product new', 'TOMATOE', 'product new import america', 'TOMATOE', 100, 10, 200, '2023-05-21 22:32:47', '2023-05-21 22:32:47', 'product new import america', 2),
(10, 'BROCOLLI', 'product-7.jpg', 'BROCOLLI _ Product new', 'BROCOLLI', 'product new import america', 'BROCOLLI', 100, 10, 200, '2023-05-21 22:33:44', '2023-05-21 22:33:44', 'product new import america', 2),
(11, 'FRUIT JUICE', 'product-8.jpg', 'FRUIT JUICE _ Product new', 'FRUIT_JUICE', 'product new import america', 'FRUIT_JUICE', 100, 10, 200, '2023-05-21 22:35:04', '2023-05-21 22:35:04', 'product new import america', 3),
(12, 'ONION', 'product-9.jpg', 'ONION', 'ONION', 'ONION', 'ONION', 10, 10, 100, '2023-05-21 22:41:31', '2023-05-21 22:41:31', 'product import from americal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `productImage`
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
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `middleName`, `lastName`, `mobile`, `email`, `passwordHash`, `admin`, `registeredAt`, `lastLogin`, `intro`, `profile`, `country`, `zip`, `province`) VALUES
(11, 'admin', 'admin', 'admin', '090909090', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2023-04-13 11:54:47', '2023-04-13 11:54:47', '', '                                                                                                                                                                                ', 'VN', '5500', 'HCM City'),
(15, '', '', 'phuqui', '1234567890', 'phuqui@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2023-05-23 13:00:19', '2023-05-23 13:00:19', '', '', 'HCM Tan Phú', '12345', '30000'),
(16, 'MR one', 'two', 'three', '989866723', 'test@gmail.com', '4297f44b13955235245b2497399d7a93', 1, '2023-05-23 13:04:04', '2023-05-23 13:04:04', '123123', '                                                1231231                                        ', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_prfk_1` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_slug` (`slug`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Indexes for table `productImage`
--
ALTER TABLE `productImage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_mobile` (`mobile`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `productImage`
--
ALTER TABLE `productImage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_prfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productImage`
--
ALTER TABLE `productImage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
