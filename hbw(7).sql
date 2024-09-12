-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(130) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `user_name` varchar(130) NOT NULL,
  `phonenumber` varchar(130) NOT NULL,
  `address` varchar(130) NOT NULL,
  `no_of_rooms` int(100) NOT NULL,
  `adult` int(13) NOT NULL,
  `children` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenumber`, `address`, `no_of_rooms`, `adult`, `children`) VALUES
(2, 5, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(3, 6, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(4, 7, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(5, 8, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(6, 9, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(7, 10, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(8, 11, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(9, 12, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(10, 13, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(11, 14, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(12, 15, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(13, 16, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(14, 17, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(15, 18, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(16, 19, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(17, 20, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(18, 21, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(19, 22, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(20, 23, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(21, 24, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(22, 25, 'Simple Room', 12000, 24000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(26, 29, 'Simple Room', 12000, 12000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(27, 30, 'Delux Room 1', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(28, 31, 'Delux Room 1', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(29, 32, 'Delux Room 1', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(30, 33, 'Delux Room 1', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(31, 34, 'Delux Room 1', 15000, 30000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(32, 35, 'Delux Room 1', 15000, 30000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(33, 36, 'Delux Room 1', 15000, 30000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(34, 37, 'Delux Room 1', 15000, 30000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(35, 38, 'Delux Room', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(36, 39, 'Delux Room', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(37, 40, 'Delux Room', 15000, 45000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(38, 41, 'Family room', 12, 60, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(39, 42, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(40, 43, 'Family room', 12, 12, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(41, 44, 'Simple Room', 231, 231, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(42, 45, 'Delux Room', 15000, 120000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(43, 46, 'Delux Room', 15000, 30000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(44, 47, 'Delux Room', 15000, 15000, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(45, 48, 'Simple Room', 231, 462, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(46, 49, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(47, 50, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(48, 51, 'Simple Room', 231, 462, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(49, 52, 'Simple Room', 231, 1386, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(50, 53, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(51, 54, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(52, 55, 'Simple Room', 231, 462, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(53, 56, 'Family room', 12, 24, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(54, 57, 'Family room', 12, 12, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(55, 58, 'Simple Room', 231, 231, NULL, 'charchit', '981000000', 'test', 0, 0, 0),
(56, 63, 'Simple Room', 231, 462, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(57, 65, 'Simple Room', 12000, 84000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(58, 66, 'Delux Room 1', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(59, 67, 'Delux Room', 15000, 90000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(60, 68, 'Simple Room', 231, 924, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(61, 69, 'Simple Room', 231, 924, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(62, 70, 'Family room', 12, 24, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(63, 71, 'Simple Room', 231, 693, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(64, 72, 'Simple Room', 12000, 12000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(65, 73, 'Simple Room', 12000, 24000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(66, 74, 'Delux Room 1', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(67, 75, 'Delux Room 1', 15000, 45000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(68, 76, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(69, 77, 'Simple Room', 231, 231, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(70, 78, 'Family room', 12, 24, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(71, 79, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(72, 80, 'Simple Room', 231, 462, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(73, 81, 'Simple Room', 231, 231, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(74, 82, 'Simple Room', 231, 462, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(75, 83, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(76, 84, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(77, 85, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(78, 86, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(79, 87, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(80, 88, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(81, 89, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(82, 90, 'Simple Room', 231, 924, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(83, 91, 'Simple Room', 12000, 12000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(84, 92, 'Simple Room', 12000, 24000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(85, 93, 'Simple Room', 12000, 24000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(86, 94, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(87, 95, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(88, 96, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(89, 97, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(90, 98, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(91, 99, 'Delux Room 1', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(92, 100, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(93, 101, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(94, 104, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(95, 105, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(96, 106, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(97, 107, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(98, 108, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(99, 109, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(100, 110, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(101, 111, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(102, 112, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(103, 113, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(104, 114, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(105, 115, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(106, 116, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(107, 117, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(108, 118, 'Simple Room', 231, 1386, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(109, 119, 'Simple Room', 231, 1386, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(110, 120, 'Simple Room', 231, 1386, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(111, 121, 'Simple Room', 231, 1386, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(112, 122, 'Delux Room', 15000, 45000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(113, 123, 'Delux Room', 15000, 45000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(114, 124, 'Delux Room', 15000, 45000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(115, 125, 'Delux Room 1', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(116, 126, 'Delux Room 1', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(117, 127, 'Delux Room 1', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(118, 128, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(119, 129, 'Delux Room', 15000, 15000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(120, 130, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(121, 131, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(122, 132, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(123, 133, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(124, 134, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(125, 135, 'Delux Room', 15000, 30000, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(126, 136, 'Simple Room', 10, 30, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(127, 137, 'Family room', 12, 12, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(128, 138, 'Delux Room', 9, 18, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(129, 139, 'Simple Room', 10, 10, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(130, 140, 'Delux Room 1', 15, 15, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(131, 141, 'Delux Room 1', 15, 30, NULL, 'charchit', '9818477481', 'sanepa', 0, 0, 0),
(132, 142, 'Lux room', 21, 42, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(133, 143, 'Delux Room', 9, 18, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(134, 144, 'Simple Room', 10, 20, NULL, 'infamous', '981000000', 'sanepa', 0, 0, 0),
(135, 148, 'Delux Room', 9, 18, NULL, 'infamous', '981000000', 'sanepa', 2, 2, 2),
(136, 149, 'Simple Room', 100, 200, NULL, 'infamous', '981000000', 'sanepa', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `payment` varchar(250) NOT NULL,
  `arival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(200) NOT NULL,
  `rate_review` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `payment`, `arival`, `refund`, `booking_status`, `order_id`, `rate_review`) VALUES
(5, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 1),
(6, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(7, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(8, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(9, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(10, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(11, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(12, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(13, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(14, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(15, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(16, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(17, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(18, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(19, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(20, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(21, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(22, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(23, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(24, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(25, 10, 1, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(29, 10, 1, '2024-05-21', '2024-05-22', '', 0, 1, 'cancelled', '', 0),
(30, 10, 2, '2024-05-14', '2024-05-17', '', 0, 1, 'cancelled', '', 1),
(31, 10, 2, '2024-05-14', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(32, 10, 2, '2024-05-14', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(33, 10, 2, '2024-05-14', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(34, 10, 2, '2024-05-14', '2024-05-16', '', 0, 1, 'cancelled', '', 0),
(35, 10, 2, '2024-05-14', '2024-05-16', '', 0, 1, 'cancelled', '', 0),
(36, 10, 2, '2024-05-14', '2024-05-16', '', 0, 1, 'cancelled', '', 0),
(37, 10, 2, '2024-05-14', '2024-05-16', '', 0, 1, 'cancelled', '', 0),
(38, 10, 3, '2024-05-15', '2024-05-18', '', 0, 1, 'cancelled', '', 1),
(39, 10, 3, '2024-05-15', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(40, 10, 3, '2024-05-15', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(41, 10, 10, '2024-05-15', '2024-05-20', '', 0, 1, 'cancelled', '', 1),
(42, 10, 10, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(43, 10, 10, '2024-05-15', '2024-05-16', '', 0, 1, 'cancelled', '', 0),
(44, 10, 4, '2024-05-16', '2024-05-17', '', 0, 1, 'cancelled', '', 1),
(45, 10, 3, '2024-05-16', '2024-05-24', '', 0, 1, 'cancelled', '', 0),
(46, 10, 3, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(47, 10, 3, '2024-05-16', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(48, 10, 4, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(49, 10, 10, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(50, 10, 10, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(51, 10, 4, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(52, 10, 4, '2024-05-16', '2024-05-22', '', 0, 1, 'cancelled', '', 0),
(53, 10, 10, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(54, 10, 10, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(55, 10, 4, '2024-05-15', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(56, 10, 10, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(57, 10, 10, '2024-05-16', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(58, 10, 4, '2024-05-16', '2024-05-17', '', 0, 1, 'cancelled', '', 0),
(59, 10, 3, '2024-05-16', '2024-05-18', '', 0, NULL, 'cancelled', '', 0),
(60, 10, 3, '2024-05-16', '2024-05-18', '', 0, NULL, 'cancelled', '', 0),
(61, 10, 4, '2024-05-15', '2024-05-18', '', 0, NULL, 'cancelled', '', 0),
(62, 10, 4, '2024-05-15', '2024-05-18', '', 0, NULL, 'cancelled', '', 0),
(63, 10, 4, '2024-05-16', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(64, 10, 4, '2024-05-16', '2024-05-20', '', 0, NULL, 'cancelled', '', 0),
(65, 10, 1, '2024-05-17', '2024-05-24', '', 0, 1, 'cancelled', '', 0),
(66, 10, 2, '2024-05-22', '2024-05-24', '', 0, 1, 'cancelled', '', 0),
(67, 10, 3, '2024-05-22', '2024-05-28', '', 0, 1, 'cancelled', '', 0),
(68, 10, 4, '2024-05-18', '2024-05-22', '', 0, 1, 'cancelled', '', 0),
(69, 10, 4, '2024-05-22', '2024-05-26', '', 0, 1, 'cancelled', '', 0),
(70, 10, 10, '2024-05-17', '2024-05-19', '', 0, 1, 'cancelled', '', 0),
(71, 10, 4, '2024-05-17', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(72, 10, 1, '2024-05-17', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(73, 10, 1, '2024-05-17', '2024-05-19', '', 0, 1, 'cancelled', '', 0),
(74, 10, 2, '2024-05-20', '2024-05-22', '', 0, 1, 'cancelled', '', 0),
(75, 10, 2, '2024-05-17', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(76, 10, 3, '2024-05-17', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(77, 10, 4, '2024-05-17', '2024-05-18', '', 0, 1, 'cancelled', '', 0),
(78, 10, 10, '2024-05-17', '2024-05-19', '', 0, 1, 'cancelled', '', 0),
(79, 10, 3, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(80, 10, 4, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(81, 10, 4, '2024-05-18', '2024-05-19', '', 0, 1, 'cancelled', '', 0),
(82, 10, 4, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(83, 10, 3, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(84, 10, 3, '2024-05-18', '2024-05-19', '', 0, 1, 'cancelled', '', 0),
(85, 10, 3, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', '', 0),
(86, 10, 3, '2024-05-18', '2024-05-19', '', 0, NULL, 'pending', '381549987', 0),
(87, 10, 3, '2024-05-18', '2024-05-20', '', 0, NULL, 'pending', 'ORD_10275868538', 0),
(88, 10, 3, '2024-05-18', '2024-05-20', '', 0, NULL, 'pending', 'ORD_10147195220', 0),
(89, 10, 3, '2024-05-18', '2024-05-20', '', 0, 1, 'cancelled', 'ORD_10275970640', 0),
(90, 10, 4, '2024-05-27', '2024-05-31', '', 0, 1, 'cancelled', 'ORD_10347045361', 0),
(91, 10, 1, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10426265986', 0),
(92, 10, 1, '2024-05-28', '2024-05-30', '', 0, NULL, 'pending', 'ORD_10214455190', 0),
(93, 10, 1, '2024-05-28', '2024-05-30', '', 0, 1, 'cancelled', 'ORD_10336254398', 0),
(94, 10, 3, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10120022929', 0),
(95, 10, 3, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10519860957', 0),
(96, 10, 3, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10248880622', 0),
(97, 10, 3, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10908296167', 0),
(98, 10, 3, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10152569761', 0),
(99, 10, 2, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_10100903128', 0),
(100, 10, 10, '2024-05-28', '2024-05-29', '', 0, NULL, 'pending', 'ORD_10821244883', 0),
(101, 10, 10, '2024-05-28', '2024-05-29', '', 0, NULL, 'pending', 'ORD_10459015406', 0),
(102, 10, 1, '2024-05-28', '2024-05-29', '', 0, NULL, 'pending', 'ORD_105087301', 0),
(103, 10, 1, '2024-05-28', '2024-05-29', '', 0, NULL, 'pending', 'ORD_10747958932', 0),
(104, 10, 10, '2024-05-27', '2024-05-28', '', 0, NULL, 'pending', 'ORD_1096463439', 0),
(105, 10, 10, '2024-05-27', '2024-05-28', '', 0, 1, 'cancelled', 'ORD_10188037914', 0),
(106, 10, 10, '2024-05-28', '2024-05-29', '', 0, 1, 'cancelled', 'ORD_10354004884', 0),
(107, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10367355130', 0),
(108, 10, 3, '2024-06-01', '2024-06-03', '', 0, NULL, 'pending', 'ORD_10569499559', 0),
(109, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10643320236', 0),
(110, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10544045087', 0),
(111, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10704416919', 0),
(112, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10967648989', 0),
(113, 10, 3, '2024-06-01', '2024-06-03', '', 0, NULL, 'pending', 'ORD_10756572301', 0),
(114, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10462292192', 0),
(115, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10936853832', 0),
(116, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10502305681', 0),
(117, 10, 3, '2024-05-31', '2024-06-01', '', 0, NULL, 'pending', 'ORD_10920522725', 0),
(118, 10, 4, '2024-06-01', '2024-06-07', '', 0, NULL, 'pending', 'ORD_10616314905', 0),
(119, 10, 4, '2024-06-01', '2024-06-07', '', 0, NULL, 'pending', 'ORD_10555341445', 0),
(120, 10, 4, '2024-06-01', '2024-06-07', '', 0, NULL, 'pending', 'ORD_10104308581', 0),
(121, 10, 4, '2024-06-01', '2024-06-07', '', 0, NULL, 'pending', 'ORD_10851419740', 0),
(122, 10, 3, '2024-05-27', '2024-05-30', '', 0, NULL, 'pending', 'ORD_10349577152', 0),
(123, 10, 3, '2024-05-27', '2024-05-30', '', 0, NULL, 'pending', 'ORD_10880694832', 0),
(124, 10, 3, '2024-05-27', '2024-05-30', '', 0, NULL, 'pending', 'ORD_10879355760', 0),
(125, 10, 2, '2024-05-28', '2024-05-30', '', 0, NULL, 'pending', 'ORD_10778948351', 0),
(126, 10, 2, '2024-05-27', '2024-05-28', '15000', 0, NULL, 'pending', 'ORD_10240991295', 0),
(127, 10, 2, '2024-05-27', '2024-05-28', '15000', 0, NULL, 'pending', 'ORD_10225677049', 0),
(128, 10, 3, '2024-05-28', '2024-05-30', '30000', 0, NULL, 'pending', 'ORD_10376682905', 0),
(129, 10, 3, '2024-05-27', '2024-05-28', '15000', 0, NULL, 'pending', 'ORD_10288843913', 0),
(130, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10320936811', 0),
(131, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10339319016', 0),
(132, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10410652796', 0),
(133, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10120130559', 0),
(134, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10683567325', 0),
(135, 10, 3, '2024-05-27', '2024-05-29', '30000', 0, NULL, 'pending', 'ORD_10685148279', 0),
(136, 10, 1, '2024-05-27', '2024-05-30', '30', 0, 1, 'cancelled', 'ORD_10672750209', 0),
(137, 10, 10, '2024-05-27', '2024-05-28', '12', 0, 1, 'cancelled', 'ORD_10828453638', 0),
(138, 10, 3, '2024-05-27', '2024-05-29', '18', 0, 1, 'cancelled', 'ORD_10696841408', 0),
(139, 10, 1, '2024-05-28', '2024-05-29', '10', 0, 1, 'cancelled', 'ORD_10367427763', 0),
(140, 10, 2, '2024-05-28', '2024-05-29', '15', 0, 1, 'cancelled', 'ORD_10938991720', 0),
(141, 13, 2, '2024-05-29', '2024-05-31', '30', 0, 1, 'cancelled', 'ORD_13261155647', 1),
(142, 10, 14, '2024-05-29', '2024-05-31', '42', 0, 1, 'cancelled', 'ORD_10402535579', 1),
(143, 10, 3, '2024-06-03', '2024-06-05', '18', 0, 1, 'cancelled', 'ORD_10712588212', 1),
(144, 10, 1, '2024-08-13', '2024-08-15', '20', 0, NULL, 'pending', 'ORD_10589388634', 0),
(145, 10, 3, '2024-08-22', '2024-08-23', '9', 0, NULL, 'pending', 'ORD_1025289644', 0),
(146, 10, 3, '2024-08-20', '2024-08-22', '18', 0, NULL, 'pending', 'ORD_10977378546', 0),
(147, 10, 3, '2024-08-20', '2024-08-22', '18', 0, NULL, 'pending', 'ORD_10742090799', 0),
(148, 10, 3, '2024-08-20', '2024-08-22', '18', 0, 1, 'cancelled', 'ORD_10341250863', 0),
(149, 10, 4, '2024-08-25', '2024-08-27', '200', 0, NULL, 'booked', 'ORD_10150193826', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(110) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` int(11) NOT NULL,
  `pn2` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'Thamel', 'https://maps.app.goo.gl/ZJW5JoJXpPH2E9VD6', 980000000, 999999999, 'maharjancharchit11@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/?lang=en', 'http://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7064.147533277554!2d85.3071212431779!3d27.715008604712473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4bd:0x58099b1deffed8d4!2');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(2, 'IMG_61897(.svg', 'Wifi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(3, 'IMG_19654(.svg', 'AC', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(4, 'IMG_86311(.svg', 'Spa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(8, 'IMG_86157(.svg', 'Heater', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(9, 'IMG_31931(.svg', 'cooler', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(10, 'IMG_99816(.svg', 'TV', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?'),
(11, 'IMG_79166.svg', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(2, 'kitchen'),
(3, 'sofa'),
(4, 'balcony'),
(5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `datentime` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`sr_no`, `booking_id`, `room_id`, `user_id`, `rating`, `review`, `seen`, `datentime`) VALUES
(6, 44, 4, 10, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(7, 41, 10, 10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(9, 30, 2, 10, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(10, 5, 1, 10, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(11, 41, 10, 10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(12, 44, 4, 10, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(13, 30, 2, 10, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(14, 41, 10, 10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(15, 5, 1, 10, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(16, 41, 10, 10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(18, 41, 10, 10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(19, 44, 4, 10, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? ', 1, 2147483647),
(21, 142, 14, 10, 5, 'room qwas nice', 1, 2147483647),
(22, 143, 3, 10, 5, 'nice rooms', 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `satus` int(11) NOT NULL DEFAULT 0,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `location`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `satus`, `removed`) VALUES
(1, 'Hotel Mark', 'sanepa', 2, 10, 2, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum,', 1, 0),
(2, 'Hotel New', 'Thamel', 13, 15, 1, 2, 3, 'DELUX ROOM\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? Lorem ipsum dolor sit amet consectetur adipisicing elit. L', 1, 0),
(3, 'Delux Room', 'Sanepa', 13, 9, 1, 2, 3, 'DELUX ROOM\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? Lorem ipsum dolor sit amet consectetur adipisicing elit. L', 1, 0),
(4, 'Simple Room', 'Sanepa', 123, 100, 1, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum,', 1, 0),
(5, 'delux', '', 123, 231, 213, 123, 12, '123', 0, 1),
(6, 'd', '', 1, 2, 1, 1, 1, 'qw', 1, 1),
(7, 'd', '', 1, 2, 1, 1, 1, 'qw', 1, 1),
(8, 'welcomre', '', 123, 213, 23, 123, 123, '123', 1, 1),
(9, 'welcomre', '', 123, 213, 23, 123, 123, '123', 1, 1),
(10, 'Family room', '', 1234, 12, 1, 2, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum,', 1, 1),
(11, 'lux room', '', 12, 12, 2, 2, 2, 'nice room', 1, 1),
(12, 'lux room', '', 12, 12, 2, 2, 2, 'nice room', 1, 1),
(13, 'lux room', '', 12, 12, 2, 2, 2, 'nice room', 1, 1),
(14, 'Lux room', '', 1, 21, 1, 2, 5, 'lux room', 1, 1),
(15, 'LUX ROOM', '', 1, 12, 1, 2, 7, 'Nice room', 0, 0),
(16, 'LUX ROOM', '', 1, 12, 1, 2, 7, 'Nice room', 0, 0),
(17, 'VIP', 'Sanepa', 12, 12, 1, 2, 2, 'test', 0, 0),
(18, 'VIP', 'Sanepa', 12, 12, 1, 2, 2, 'test', 0, 0),
(19, 'VIP', 'Sanepa', 12, 12, 1, 2, 2, 'test', 0, 0),
(20, 'VIP', 'Sanepa', 12, 12, 1, 2, 2, 'test', 0, 0),
(21, 'hotel', 'sanepa', 2, 200, 2, 1, 1, 'test', 0, 0),
(22, 'hotel', 'sanepa', 2, 200, 2, 1, 1, 'test', 0, 0),
(23, 'hotel', 'sanepa', 2, 200, 2, 1, 1, 'test', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(193, 15, 3),
(194, 15, 4),
(195, 15, 10),
(196, 15, 11),
(197, 16, 3),
(198, 16, 4),
(199, 16, 10),
(200, 16, 11),
(227, 17, 2),
(228, 17, 4),
(229, 17, 8),
(230, 17, 9),
(231, 17, 10),
(232, 17, 11),
(233, 18, 2),
(234, 18, 4),
(235, 18, 8),
(236, 18, 9),
(237, 18, 10),
(238, 18, 11),
(239, 19, 2),
(240, 19, 4),
(241, 19, 8),
(242, 19, 9),
(243, 19, 10),
(244, 19, 11),
(245, 20, 2),
(246, 20, 4),
(247, 20, 8),
(248, 20, 9),
(249, 20, 10),
(292, 3, 2),
(293, 3, 3),
(294, 3, 4),
(295, 3, 8),
(296, 3, 9),
(297, 3, 10),
(298, 4, 2),
(299, 4, 3),
(300, 4, 4),
(301, 4, 8),
(302, 4, 9),
(303, 4, 10),
(304, 4, 11),
(305, 1, 2),
(306, 1, 3),
(307, 1, 4),
(308, 1, 8),
(309, 1, 9),
(310, 1, 10),
(311, 1, 11),
(312, 2, 2),
(313, 2, 3),
(314, 2, 4),
(315, 2, 8),
(316, 2, 9),
(317, 2, 10),
(318, 2, 11),
(319, 21, 3),
(320, 22, 3),
(321, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(95, 3, 2),
(96, 3, 3),
(97, 4, 2),
(98, 4, 3),
(99, 1, 2),
(100, 1, 3),
(101, 2, 2),
(102, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_image`
--

CREATE TABLE `room_image` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_image`
--

INSERT INTO `room_image` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(1, 1, 'IMG_16085.jpeg', 1),
(3, 2, 'IMG_98188.jpeg', 1),
(4, 3, 'IMG_84275.jpeg', 1),
(5, 4, 'IMG_26367.jpeg', 1),
(9, 1, 'IMG_21873.jpeg', 0),
(10, 2, 'IMG_55061.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seetings`
--

CREATE TABLE `seetings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(110) NOT NULL,
  `site_about` varchar(100) NOT NULL,
  `shutdown` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seetings`
--

INSERT INTO `seetings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Hotel Booking1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(152) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(110) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pn` varchar(110) NOT NULL,
  `verification_id` int(11) NOT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT 0,
  `resettoken` varchar(222) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sr_no`, `name`, `email`, `password`, `cpassword`, `address`, `pn`, `verification_id`, `verification_status`, `resettoken`, `resettokenexpire`) VALUES
(10, 'infamous', 'maharjancharchit69@gmail.com', 'test', 'test', 'sanepa', '981000000', 257618929, 1, NULL, NULL),
(13, 'charchit', 'test@gmail.com', '1234', '1234', 'sanepa', '9818477481', 745282794, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities_id` (`facilities_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `seetings`
--
ALTER TABLE `seetings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seetings`
--
ALTER TABLE `seetings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`sr_no`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`),
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `rating_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`sr_no`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities_id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_image`
--
ALTER TABLE `room_image`
  ADD CONSTRAINT `room_image_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
