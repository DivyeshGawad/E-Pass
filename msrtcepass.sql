-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 05:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msrtcepass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `depot` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `depot`, `password`, `contact`, `status`) VALUES
(1, 'Divyesh Avdhoot Gawad', 'virar@admin', 'Virar', '8ecc77320a92015904be84d6f9993f00', '8007831930', 1),
(2, 'Tanmay Bhoye', 'palghar@admin', 'Palghar', '7df6d19ca80830ad8c7c3babb50992e3', '7896541239', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(255) NOT NULL,
  `badge_number` varchar(15) DEFAULT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `depot` varchar(25) DEFAULT NULL,
  `emp_contact` varchar(10) DEFAULT NULL,
  `emp_password` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `badge_number`, `emp_name`, `email`, `depot`, `emp_contact`, `emp_password`, `status`) VALUES
(1, '8520', 'YASH BHOSALE', 'yb25@gmail.com', 'Virar', '7896541239', 'f4576845668fb1d3950fc68383898548', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pass_cards`
--

CREATE TABLE `pass_cards` (
  `id` int(255) NOT NULL,
  `permit_id` varchar(30) DEFAULT NULL,
  `source` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `service_type` varchar(15) DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `qr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass_cards`
--

INSERT INTO `pass_cards` (`id`, `permit_id`, `source`, `destination`, `service_type`, `expiry`, `qr`) VALUES
(1, '1696994450', 'Virar', 'Shirdi', 'ORDINARY', '2023-11-10', '1696994450.png');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(255) NOT NULL,
  `source` varchar(30) DEFAULT NULL,
  `via` varchar(300) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `distance` int(3) DEFAULT NULL,
  `service_number` varchar(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_traffic`
--

CREATE TABLE `trans_traffic` (
  `id` int(255) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `route` varchar(50) DEFAULT NULL,
  `bus` varchar(10) DEFAULT NULL,
  `service_type` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `footfall` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `permit_id` varchar(15) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `gender`, `dob`, `mobile_no`, `email`, `aadhar_no`, `address`, `password`, `permit_id`, `image`, `status`) VALUES
(1, 'DIVYESH', 'GAWAD', 'Male', '2001-01-02', '8007831930', 'divyeshgawad72@gmail.com', '545845852388', 'virar', 'Divyesh@02', '1696994450', '1696994397.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `pass_cards`
--
ALTER TABLE `pass_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_traffic`
--
ALTER TABLE `trans_traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pass_cards`
--
ALTER TABLE `pass_cards`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_traffic`
--
ALTER TABLE `trans_traffic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
