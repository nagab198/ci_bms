-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 05:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `meta_name` varchar(256) DEFAULT NULL,
  `meta_desc` varchar(1024) DEFAULT NULL,
  `meta_keyword` varchar(512) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `desc` varchar(1024) DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `meta_name` varchar(256) DEFAULT NULL,
  `meta_desc` varchar(1024) DEFAULT NULL,
  `meta_keyword` varchar(1024) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `home_priority` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `meta_name`, `meta_desc`, `meta_keyword`, `img_url`, `status`, `created_at`, `updated_at`, `deleted_at`, `home_priority`) VALUES
(103, '5rtyh', 'tdcygybh', 'ycrtvgbh', '5rtyhui', 'uploads/images/categories/47953716635ff39e14726.png', 1, '2022-10-31 15:50:48', NULL, NULL, 0),
(104, 'tcuvgyb', 'tycgb', 'hutcyfgb', 'utfvub', 'uploads/images/default/default_avatar.png', 1, '2022-10-31 15:53:15', NULL, NULL, 0),
(105, 'tcfgbhu', 'tcfvbhu', 'tcfvhu', 'tcfgbhji', 'uploads/images/default/default_avatar.png', 1, '2022-10-31 15:58:06', NULL, NULL, 0),
(106, 'gybh', 'ygv', 'bhunji', 'bh', 'uploads/images/default/default_avatar.png', 1, '2022-10-31 16:01:50', NULL, NULL, 1),
(107, 'ygvbhunjikm', 'gv j hb j', 'gyuhbnjmk', 'ygvbuhnji', 'IMG_20221019_122020-removebg-preview.png', 1, '2022-10-31 21:37:56', NULL, NULL, 0),
(108, 'v6byhuji', 'cyftgbyh', 'vgybhujio', 'fvgybhujmi', '719d57aacb3bbd138408be52353e3c97.png', 1, '2022-10-31 21:42:42', NULL, NULL, 1),
(109, 'tfvgybhujmi', 'tfvgbyhuji', 'ygbhunjmi', 'tvgybhjimo', '35e3b3726dc743cd24a94548142a7f03.png', 1, '2022-10-31 21:55:46', NULL, NULL, 0),
(110, 'yukhjlkl', 'ytugkhijkl', 'cyukghijo', 'yugykhil', '3f37cc727086c131c77f1bd093df7fbe.png', 1, '2022-10-31 22:10:21', NULL, NULL, 0),
(111, 'yukhjlkl', 'ytugkhijkl', 'cyukghijo', 'yugykhil', 'dc2300d51e381da622dc0f3a2d1078c5.png', 1, '2022-10-31 22:10:56', NULL, NULL, 0),
(112, 'gvkhjbknl', 'yjuh', 'jkgvkbjk', 'cgkuvbjkl', '2e5f8043b9bc9d793ff8a18fc6c88536.png', 1, '2022-10-31 22:13:36', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `meta_name` varchar(256) DEFAULT NULL,
  `meta_desc` varchar(1024) DEFAULT NULL,
  `meta_keyword` varchar(512) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL,
  `desc` varchar(1024) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `home_priority` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `meta_name`, `meta_desc`, `meta_keyword`, `img_url`, `desc`, `status`, `home_priority`, `category_id`, `sub_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'gybhunjim', 'fgvjn', 'tfvbhji', 'tfvugbj', 'uploads/images/default/default_avatar.png', 'ygbhjnm', 1, 0, 104, 18, '2022-10-31 18:41:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `meta_name` varchar(256) DEFAULT NULL,
  `meta_desc` varchar(1024) DEFAULT NULL,
  `meta_keyword` varchar(1024) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `meta_name`, `meta_desc`, `meta_keyword`, `img_url`, `category_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'ivubhnijmko', 'tfcvgbh', 'yvgubhnj', 'ygvjni', 'uploads/images/default/default_avatar.png', 104, 1, '2022-10-31 18:08:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_id` (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD KEY `sub_category_id` (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
