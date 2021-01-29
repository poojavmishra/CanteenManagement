-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 08:42 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mob` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `admin_id`, `password`, `mob`) VALUES
('Mr. Admin', 1029, 'qwerty', '8691880133');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `f_id` int(5) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `price` int(3) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`f_id`, `f_name`, `price`, `category`) VALUES
(1, 'Idli', 14, 'Breakfast'),
(2, 'Medu Vada', 20, 'Breakfast'),
(3, 'Sabudana Vada', 15, 'Breakfast'),
(4, 'Upma', 10, 'Breakfast'),
(5, 'Sheera', 10, 'Breakfast'),
(6, 'Sabudana Khichdi', 16, 'Breakfast'),
(7, 'Kande Pohe', 10, 'Breakfast'),
(8, 'Punjabi Samosa', 16, 'Snacks'),
(9, 'Batata Vada', 15, 'Snacks'),
(10, 'Bread Roll', 8, 'Snacks'),
(11, 'Veg Bread Pattice', 10, 'Snacks'),
(12, 'Dhokla', 15, 'Snacks'),
(13, 'Batata Bhajiya', 16, 'Snacks'),
(14, 'Kanda Bhajiya', 16, 'Snacks'),
(15, 'Plain Rice', 20, 'Rice'),
(16, 'Jeera Rice', 30, 'Rice'),
(17, 'Dal Khichdi', 40, 'Rice'),
(18, 'Veg Chinese Rice', 30, 'Rice'),
(19, 'Egg Chinese Rice', 40, 'Rice'),
(20, 'Dal Rice', 18, 'Main Course'),
(21, 'Dal Fry', 30, 'Main Course'),
(22, 'Dal Tadka', 35, 'Main Course'),
(23, 'Misal Pav', 16, 'Main Course'),
(24, 'Tea', 5, 'Drinks'),
(25, 'Special Tea', 7, 'Drinks'),
(26, 'Coffee', 8, 'Drinks'),
(27, 'Soft Drink(100ml)', 18, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(4) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `mob` decimal(10,0) NOT NULL,
  `s_userid` int(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `mob`, `s_userid`, `password`) VALUES
(1, 'Agatha Christie', '8691880133', 1001, '1234'),
(2, 'Maya Angelou', '0', 1002, 'abcd'),
(3, 'Sandra Oh', '0', 1003, '12ab'),
(4, 'Derek Shepherd', '0', 1004, 'qwerty'),
(5, 'Sara Ramirez', '0', 1005, '1234'),
(6, 'Patrick Dempsey', '0', 1006, '1566'),
(7, 'Alex Karev', '0', 1007, '1470'),
(8, 'Jessica Capshaw', '0', 1008, '1997'),
(9, 'Sarah Drew', '0', 1009, '0904'),
(10, 'Mark Sloan', '0', 1010, '091997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
