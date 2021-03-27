-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 10:07 PM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alixaidi_ahmadfyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` text NOT NULL,
  `rating` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `image` text NOT NULL,
  `discount` int(11) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `name`, `rating`, `lat`, `lng`, `image`, `discount`, `createdate`) VALUES
(1, 1, 'AP FAst Food', 2, 31.509535434356007, 74.30658015693359, 'upload_images/ali.jpg', 10, '2019-10-16'),
(3, 0, 'Naqi Cinema', 0, 0, 0, 'upload_images/companylogo.png', 50, '2019-10-16'),
(4, 0, 'hjk', 0, 31.504852102450194, 74.35035380805664, 'upload_images/ali.jpg', 3, '2019-10-16'),
(5, 1, 'mcdonalds', 4, 31.527626532855194, 74.34969860158992, 'upload_images/alid.jpg', 15, '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `image` text NOT NULL,
  `moviedate` date NOT NULL,
  `movietime` text NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `type`, `categoryid`, `name`, `description`, `price`, `rating`, `image`, `moviedate`, `movietime`, `createdate`) VALUES
(1, 1, 1, '0dd', 'none', 250, 3, 'upload_images/ali.jpg', '0000-00-00', '00:00:00', '2019-10-16'),
(3, 0, 3, 'Joker', 'none', 1000, 4, 'upload_images/ali.jpg', '2019-12-31', '12:59:00', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `detailid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `type`, `categoryid`, `detailid`, `quantity`, `createdate`) VALUES
(1, 10, 1, 1, 3, 4, '0000-00-00'),
(2, 18, 0, 1, 3, 4, '2019-10-19'),
(4, 18, 1, 5, 0, 3, '2019-10-19'),
(5, 18, 1, 5, 0, 12, '2019-10-19'),
(6, 18, 0, 0, 0, 25, '2019-10-19'),
(7, 18, 1, 1, 0, 12, '2019-10-19'),
(8, 18, 0, 0, 0, 24, '2019-10-19'),
(9, 18, 0, 0, 0, 26, '2019-10-19'),
(10, 18, 0, 3, 3, 36, '2019-10-19'),
(11, 19, 1, 0, 5, 5, '2019-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `detailid` int(11) NOT NULL,
  `message` text NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `type`, `userid`, `categoryid`, `detailid`, `message`, `createdate`) VALUES
(1, 1, 3, 1, 1, 'hello', '2019-10-16'),
(2, 0, 3, 3, 3, 'hello', '2019-10-16'),
(3, 0, 0, 0, 18, 'Checking category resturant', '2019-10-19'),
(4, 0, 0, 0, 18, 'Checking category cinimas', '2019-10-19'),
(5, 1, 18, 1, 0, 'Testing review for resturants', '2019-10-19'),
(6, 0, 18, 3, 3, 'Testing review for cinema', '2019-10-19'),
(7, 1, 19, 0, 1, 'test review 1', '2019-10-21'),
(8, 1, 19, 1, 1, 'test review 2', '2019-10-21'),
(9, 0, 19, 3, 3, 'movie test 1', '2019-10-21'),
(10, 1, 19, 0, 5, 'final check', '2019-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `address`, `image`, `createdate`) VALUES
(2, 'Admin2', 'admin@admin.com', 'admin', 1, '', '', '', '0000-00-00'),
(3, 'ali abbas', 'alixaidi.syed@gmail.com', 'zamar', 0, '', '', '', '2019-10-16'),
(9, 'zamar', 'zamar@gmail.com', 'zamar', 0, '', '', '', '2019-10-16'),
(10, 'saboor', 'saboor@gmail.com', 'saboorf', 0, '', '', '', '2019-10-16'),
(14, 'saboor', 'hassan@gmail.com', 'saboorf', 0, '', '', '', '2019-10-17'),
(15, 'Abdul Saboor', 'Saboor1@gmail.com', '123456', 0, '', '', '', '2019-10-17'),
(16, 'Abdul Saboor', 'abdul@gmail.com', '123456', 0, '', '', '', '2019-10-17'),
(17, 'AbdulSaboor@gmail.com', 'abdulsaboor@gmail.com', '123456', 0, '', '', '', '2019-10-18'),
(18, 'Abdul Saboor', 'saboorkhan469@gmail.com', '12345678', 0, '', '', '', '2019-10-18'),
(19, 'Zamar hasan', 'zamar.hasan@gmail.com', '112233', 0, '123456', '', 'upload_profile/1571664857325.jpg', '2019-10-20'),
(20, 'abdulsaboor', 'abdul928@gmail.com', '123456', 0, 'qwer', 'wedgg', 'upload_profile/20.jpg', '2019-10-21'),
(21, 'abdul saboor', 'im.saboor928@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(23, 'saboor', '123@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(25, 'saboor', '1234@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(26, 'naqvi', 'naqvi12@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(27, 'hassan', 'hassan12@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(28, 'xaidi', 'xaidi1@gmail.com', '123456', 0, '', '', '', '2019-10-21'),
(29, 'imran', 'imran@gmail.com', '12345678', 0, ' 443234183866', 'model town', 'upload_profile/1571677529031.jpg', '2019-10-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
