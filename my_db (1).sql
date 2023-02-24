-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2023 at 07:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `status`) VALUES
(1, 'Andhra Pradesh', 'Active'),
(2, 'Arunachal Pradesh', 'Active'),
(3, 'Assam', 'Active'),
(4, 'Bihar', 'Active'),
(5, 'Chandigarh', 'Active'),
(6, 'Chhattisgarh', 'Active'),
(7, 'Delhi', 'Active'),
(8, 'Goa', 'Active'),
(9, 'Gujarat', 'Active'),
(10, 'Haryana', 'Active'),
(11, 'Himachal Pradesh', 'Active'),
(12, 'Jharkhand', 'Active'),
(13, 'Karnataka', 'Active'),
(14, 'Madhya Pradesh', 'Active'),
(15, 'Maharashtra', 'Active'),
(16, 'Manipur', 'Active'),
(17, 'Meghalaya', 'Active'),
(18, 'Mizoram', 'Active'),
(19, 'Nagaland', 'Active'),
(20, 'Odisha', 'Active'),
(21, 'Punjab', 'Active'),
(22, 'Rajasthan', 'Active'),
(23, 'Sikkim', 'Active'),
(24, 'Tamil Nadu', 'Active'),
(25, 'Tripura', 'Active'),
(26, 'Uttar Pradesh', 'Active'),
(27, 'Uttarakhand', 'Active'),
(28, 'West Bengal', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `slug`, `name`, `status`, `created_on`) VALUES
(1, 'mobile', 'Mobile', 1, '2023-02-23 17:32:29'),
(3, 'bike', 'Bike', 1, '2023-02-23 18:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `craeted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `category`, `slug`, `price`, `description`, `status`, `image`, `craeted_on`) VALUES
(1, 'samsung galaxy s23', 1, 'samsung_galaxy_s23', '80000.00', 'Android 13, Samsung One UI 5.1\r\n6.1inch(15.39cm) Dynamic AMOLED 2X Infinity-O Display\r\nSnapdragon® 8 Gen 2 Mobile Platform for Galaxy\r\nAdreno 740 GPU\r\n8 GB RAM, 256 GB ROM\r\n3900mAh Battery\r\n1 Year Manufacturer Warranty', 1, 'assets/uploads/202302231677160928.jpg', '2023-02-23 19:25:33'),
(2, 'KTM RC 390', NULL, 'ktm_rc_390', '340000.00', 'Super bike', 1, 'assets/uploads/202302241677217220.jpg', '2023-02-24 11:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_view` varchar(50) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `password_view`, `address`, `state`, `country`, `image`, `created`) VALUES
(1, 'Shatrudhan kumar', 'shatrudhan.kumar@123789.org', '9282828929', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Rohini', 'Delhi', NULL, 'assets/uploads/202302231677149001.jpeg', '2023-02-23 16:13:21'),
(2, 'Rahul', 'rahul122@gmail.com', '9879878979', '42dae262b8531b3df48cde9cc018c512', '123345', 'Mumbai', 'Maharashtra', NULL, NULL, '2023-02-23 16:14:35'),
(3, 'Kailash Yadav', 'kailash1212@gmail.com', '8567657867', '6537e99af2c2223642df9f70a0b5afca', '1234556', 'Faizabad, Aayodhya', 'Utter Pradesh', NULL, NULL, '2023-02-23 18:07:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
