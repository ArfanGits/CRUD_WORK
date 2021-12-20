-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2021 at 01:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `modified_at`) VALUES
(1, 'rohan', 'rohan77@gmail.com', '123456', '', '2021-12-20 11:02:42', '2021-12-20 11:02:42'),
(3, 'ozil', 'ozil10@gmail.com', '786123', '', '2021-12-20 11:02:42', '2021-12-20 11:02:42'),
(4, 'asd', 'dfg@gmail.com', '123', '', '2021-12-20 11:02:42', '2021-12-20 11:02:42'),
(5, 'newisti', 'ryan8@yahoo.com', '123456', '', '2021-12-20 11:09:04', '2021-12-20 11:09:29'),
(6, 'test', 'cd@gmail.com', '123456', '01822266448', '2021-12-20 01:02:40', '2021-12-20 13:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `promotional_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `html_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `link`, `promotional_message`, `html_banner`, `is_draft`, `picture`, `created_at`, `modified_at`, `is_active`) VALUES
(14, 'sfs', 'sef', 'fgf', '', 0, 'custom-img4.jpg', '2021-12-20 10:54:42', '2021-12-20 10:54:42', 0),
(16, 'uyyi', 'uy.com', 'Editing Done', '', 0, 'custom-img2.jpg', '2021-12-20 10:54:42', '2021-12-20 10:54:42', 0),
(17, 'new', 's.ocm', 'jjja', '', 0, 'menu-shoes.png', '2021-12-20 10:54:42', '2021-12-20 10:54:42', 0),
(18, 'Title changed', 'new.com', 'image changed', '', 0, 'product1-700x850.jpg', '2021-12-20 10:54:42', '2021-12-20 10:54:42', 0),
(19, 'Isti GG', 'istisqr.com', 'hdhhdhd', '', 0, 'custom-img1.jpg', '2021-12-20 10:54:42', '2021-12-20 10:54:42', 0),
(20, 'test1', 'dsgfadf', 'fef', '', 0, 'custom-img3.jpg', '2021-12-20 11:00:34', '2021-12-20 12:51:09', 1),
(21, 'jhjhjh', 'dsfgf.com', 'Editing Donebbvbvcbb', '', 0, 'list.svg', '2021-12-20 12:11:19', '2021-12-20 12:11:47', 0),
(22, 'new test edit', 'test22.com', 'newfrom', 'new html', 0, 'custom-img2.jpg', '2021-12-20 12:36:11', '2021-12-20 12:51:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unite_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_title`, `qty`, `picture`, `unite_price`, `total_price`) VALUES
(2, 1564, 'Computer', 2, NULL, 0, 0),
(4, 412, 'Shoes', 100, 'menu-shoes.png', 0, 0),
(5, 123563, 'laptop', 1236, 'bottom-banner.jpg', 0, 0),
(7, 1234, 'Computer1', 5, 'b-logo1-130x50.png', 0, 0),
(8, 156, 'Just chair', 10, 'custom-img2.jpg', 0, 0),
(9, 156423, 'Computer', 12, 'product6-700x850.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `link`, `created_at`, `modified_at`) VALUES
(3, 'sarfan', 'sarfan.com', '2021-12-20 11:10:27', '2021-12-20 11:10:27'),
(4, 'sumon', 'sumon.com', '2021-12-20 11:10:27', '2021-12-20 11:10:27'),
(5, 'Arfan', 'html.com', '2021-12-20 11:12:41', '2021-12-20 11:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`) VALUES
(2, 'sarfan', 'khan.safan027@gmail.com', 'Computer Science'),
(3, 'Istiaq', 'istiaq60@hotmail.com', 'Laravel'),
(4, 'sumon', 'sumon456@gmail.com', 'web deign');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `qty`) VALUES
(1, 0, 118),
(2, 1564, 52156),
(3, 857, 633);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `created_at`, `modified_at`, `picture`, `is_active`) VALUES
(30, 'Test1', '2021-12-20 09:49:49', '2021-12-20 10:11:31', NULL, 0),
(31, 'Test2', '2021-12-20 09:49:49', '2021-12-20 10:11:31', 'payment-2.png', 0),
(32, 'TestApproot', '2021-12-20 09:49:49', '2021-12-20 10:11:31', 'custom-img4.jpg', 0),
(33, 'lamp', '2021-12-20 09:49:49', '2021-12-20 10:11:31', 'product5-700x850.jpg', 0),
(34, 'farija', '2021-12-20 09:49:49', '2021-12-20 10:11:31', 'b-logo2-130x50.png', 0),
(35, 'Istiaq GG', '2021-12-20 09:49:49', '2021-12-20 10:11:31', 'product24-700x850.jpg', 1),
(36, 'Watch Time', '2021-12-20 03:59:14', '2021-12-20 10:11:31', 'custom-img4.jpg', 0),
(37, 'newOne', '2021-12-20 10:04:10', '2021-12-20 10:15:29', 'newsletter-img.jpg', 1),
(38, '22new', '2021-12-20 10:23:53', '2021-12-20 10:24:16', 'product2-700x850.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
