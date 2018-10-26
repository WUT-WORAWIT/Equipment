-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 07:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attractions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `admin_user` char(50) DEFAULT NULL,
  `admin_password` char(50) DEFAULT NULL,
  `admin_name` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_password`, `admin_name`) VALUES
(00001, 'admin', 'password', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `data_name` varchar(250) DEFAULT NULL,
  `data_detail` longtext,
  `data_pic` char(50) DEFAULT NULL,
  `data_category` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `data_name`, `data_detail`, `data_pic`, `data_category`) VALUES
(00002, 'à¸§à¸±à¸”à¸›à¹ˆà¸²à¸ªà¸¸à¸˜à¸²à¸§à¸²à¸ª ', 'à¸§à¸±à¸”à¸›à¹ˆà¸²à¸ªà¸¸à¸˜à¸²à¸§à¸²à¸ª 2313346466797661231', '1.PNG', 'dhamm'),
(00003, 'à¸™à¹‰à¸³à¸•à¸à¸„à¸³à¸«à¸­à¸¡', 'à¸™à¹‰à¸³à¸•à¸à¸„à¸³à¸«à¸­à¸¡', '2.PNG', 'nature'),
(00004, 'à¸Šà¸™à¹€à¸œà¹ˆà¸²à¸ à¸¹à¹„à¸—', 'à¸Šà¸™à¹€à¸œà¹ˆà¸²à¸ à¸¹à¹„à¸—', 'VIO-S218-Rear.jpg', 'culture'),
(00005, 'à¸§à¸±à¸”à¸›à¹ˆà¸²à¸ªà¸±à¸™à¸•à¸´à¸˜à¸£à¸£à¸¡', 'à¸§à¸±à¸”à¸›à¹ˆà¸²à¸ªà¸±à¸™à¸•à¸´à¸˜à¸£à¸£à¸¡', '2.PNG', 'dhamm');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `slide_pic` char(50) DEFAULT NULL,
  `slide_active` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_pic`, `slide_active`) VALUES
(002, 'slide1.jpg', 'active'),
(003, 'slide2.jpg', NULL),
(004, 'slide3.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
