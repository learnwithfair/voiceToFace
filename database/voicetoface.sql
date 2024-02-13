-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 08:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voicetoface`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(255) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_img`) VALUES
(14, 'MD RAHATUL RABBI', 'voicetoface@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'rahatul_admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `btn_info`
--

CREATE TABLE `btn_info` (
  `btn_id` int(255) NOT NULL,
  `btn_name` text NOT NULL,
  `btn_voice` varchar(255) NOT NULL,
  `btn_img` varchar(255) NOT NULL,
  `btn_gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `btn_info`
--

INSERT INTO `btn_info` (`btn_id`, `btn_name`, `btn_voice`, `btn_img`, `btn_gender`) VALUES
(9, 'Alice', 'Alice.mp3', 'one.jpg', 'Ladies'),
(11, 'Allan', 'Allan.mp3', 'three.jpg', 'Men'),
(12, 'John', 'Jhon.mp3', 'four.png', 'Men'),
(13, 'Mike', 'five.mp3', 'five.jpg', 'Men'),
(14, 'Nick', 'Nick.mp3', 'six.jpg', 'Men'),
(15, 'Ted', 'Ted.mp3', 'seven.jpg', 'Men'),
(16, 'Amy', 'Amy.mp3', 'eight.jpg', 'Ladies'),
(17, 'Denise', 'Denise.mp3', 'nine.jpg', 'Ladies'),
(18, 'Hope', 'Hope.mp3', 'ten.jpg', 'Ladies'),
(19, 'Kathy', 'Kathy.mp3', 'kathy.jpg', 'Ladies'),
(20, 'Bill', 'Bill.mp3', 'bill.jpg', 'Men'),
(21, 'Jill', 'Jill.mp3', 'Jill.jpg', 'Ladies');

-- --------------------------------------------------------

--
-- Table structure for table `ratting_info`
--

CREATE TABLE `ratting_info` (
  `ratting_id` int(255) NOT NULL,
  `ratting` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratting_info`
--

INSERT INTO `ratting_info` (`ratting_id`, `ratting`) VALUES
(1, 3),
(2, 5),
(3, 3),
(4, 4),
(5, 4),
(6, 1),
(7, 3),
(8, 5),
(9, 5),
(10, 3),
(11, 3),
(12, 5),
(13, 3),
(14, 2),
(15, 4),
(16, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `visitors_info`
--

CREATE TABLE `visitors_info` (
  `visitors_id` int(225) NOT NULL,
  `visitors` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors_info`
--

INSERT INTO `visitors_info` (`visitors_id`, `visitors`) VALUES
(1, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `btn_info`
--
ALTER TABLE `btn_info`
  ADD PRIMARY KEY (`btn_id`);

--
-- Indexes for table `ratting_info`
--
ALTER TABLE `ratting_info`
  ADD PRIMARY KEY (`ratting_id`);

--
-- Indexes for table `visitors_info`
--
ALTER TABLE `visitors_info`
  ADD PRIMARY KEY (`visitors_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `btn_info`
--
ALTER TABLE `btn_info`
  MODIFY `btn_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ratting_info`
--
ALTER TABLE `ratting_info`
  MODIFY `ratting_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `visitors_info`
--
ALTER TABLE `visitors_info`
  MODIFY `visitors_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
