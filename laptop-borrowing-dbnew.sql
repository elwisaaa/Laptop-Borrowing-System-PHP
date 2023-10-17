-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 11:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop-borrowing-dbnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(5) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_name`, `admin_password`) VALUES
('1', 'aku@mail.com', 'aku', 'akupass');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `laptop_id` varchar(20) NOT NULL,
  `borrow_start` varchar(20) NOT NULL,
  `borrow_end` varchar(20) NOT NULL,
  `borrow_purpose` varchar(50) NOT NULL,
  `borrow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`user_id`, `user_name`, `laptop_id`, `borrow_start`, `borrow_end`, `borrow_purpose`, `borrow_id`) VALUES
('020305030605', 'Shafiq', 'L1', '0000-00-00', '13-10-2023', 'This is a test borrow', 1),
('33', 'ee', 'L2', '14-10-2023', '13-10-2023', 'testt', 2),
('kk', 'oo', '1', '14-10-2023', '13-10-2023', 'okpojm', 3),
('0203034', 'akutest', '2', '14-10-2023', '14-10-2023', 'guna je la', 4);

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `laptop_id` varchar(5) NOT NULL,
  `laptop_name` varchar(50) NOT NULL,
  `isAvailable` char(2) NOT NULL,
  `imgPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`laptop_id`, `laptop_name`, `isAvailable`, `imgPath`) VALUES
('1', 'Acer Aspire R14', 'Y', ''),
('2', 'Acer Aspire V 15 Nitro', 'Y', 'C:\\xampp\\htdocs\\laptopborrowsystem\\assets\\acernitro.png'),
('3', 'Acer Aspire V 15 Nitro', 'Y', ''),
('4', 'HP Pavilion 14', 'Y', ''),
('L1', 'Lenovo Thinkpad L15 ', 'Y', ''),
('L2', 'Lenovo Thinkpad L15 ', 'Y', ''),
('L3', 'Lenovo Thinkpad L15 ', 'Y', ''),
('L4', 'Lenovo Thinkpad L15 ', 'Y', ''),
('L5', 'Lenovo Thinkpad L15 ', 'Y', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD UNIQUE KEY `laptop_id` (`laptop_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`laptop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
