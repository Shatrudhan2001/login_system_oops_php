-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2023 at 02:47 PM
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
(1, 'Kajal', 'kajal@123789.org', '9978987897', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'yuuuuuu', '7', 'India', 'assets/uploads/202302211676986217.jpeg', '2023-02-21 18:54:30'),
(2, 'Sanjeev', 'sanjeev.kumar@123789.org', '9315599853', 'def4a64a84a18ec384c6b82c5eff49b8', 'sjsjsj\'djhhd', NULL, NULL, NULL, NULL, '2023-02-21 18:55:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
