-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 10:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_tell` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_tell`) VALUES
(1, 'admin', '11111111', 'Prayut', '6150110019'),
(2, 'admin2', '11111111', 'tan@gmail.com', '0984538893');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `booking_type` varchar(50) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `booking_start_date` date DEFAULT NULL,
  `action` enum('accept','reject') DEFAULT NULL,
  `status` enum('รอดำเนินการ','ปฏิเสธ','ยืนยัน') DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `problem` varchar(200) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_type`, `purpose`, `booking_start_date`, `action`, `status`, `user_id`, `problem`, `admin_id`) VALUES
(34, 'พบ', 'เพ้อฝัน คิดสั้้น', '2021-10-08', NULL, 'ปฏิเสธ', 68, 'การเรียน', NULL),
(35, 'พบ', 'เพ้อฝัน คิดสั้้น', '2021-10-09', NULL, 'ปฏิเสธ', 69, 'การเรียน', NULL),
(36, 'พบ', 'มีความเครียดระดับสูง มีความไม่เป็นตัวเอง', '2021-10-06', NULL, 'ยืนยัน', 68, 'ครอบครัว', NULL),
(37, 'ไม่พบ', 'การเรียนกดดันมีความคิดที่อยากฆ่าตัวตายอยู่บ่อยครั้ง', '2021-10-15', NULL, 'ยืนยัน', 69, 'ครอบครัว', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(70) NOT NULL,
  `user_no` varchar(10) NOT NULL,
  `major` varchar(70) NOT NULL,
  `class` varchar(30) NOT NULL,
  `user_tell` varchar(10) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `lne_id` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_name`, `user_no`, `major`, `class`, `user_tell`, `facebook`, `lne_id`, `user_email`) VALUES
(68, 'User1', '11111111', ' ธนิญา จันทราทิพย์', '6150110019', 'search', 'search', '0965242628', 'Thaniya Junthatip', '075225401', 'thanijun53@gmail.com'),
(69, '11111111', '11111111', 'อุมาพร  ชุมจันทร์', '6150110048', 'search', 'search', '0901234949', 'sadas', 'xcs12', 'umaporn@gmail.com'),
(76, 'User1', '11111111', 'มัลลิกา จริงจิตร', '6150110047', 'สาขาวิชาระบบสารสนเทศทางการบัญชี', 'ชั้นปีที่2', '0901234949', 'มัลลิกา จริงจิตร', 'Prafjr1122', 'umaporn@gmail.com'),
(77, 'User2', '11111111', 'มัลลิกา จริงจิตร', '6150110047', 'สาขาวิชาระบบสารสนเทศทางการบัญชี', 'ชั้นปีที่2', '0901234949', 'มัลลิกา จริงจิตร', 'Prafjr1122', 'umaporn@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
