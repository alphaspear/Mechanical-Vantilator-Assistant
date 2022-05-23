-- phpMyAdmin SQL Dump
-- version 5.1.3deb1+jammy1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2022 at 05:58 PM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mayank`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int NOT NULL,
  `hr` int NOT NULL,
  `rr` int NOT NULL,
  `spo2` int NOT NULL,
  `fio2` int NOT NULL,
  `peep` int NOT NULL,
  `pao2` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `hr`, `rr`, `spo2`, `fio2`, `peep`, `pao2`, `time`) VALUES
(1, 67, 40, 67, 67, 30, 67, '2022-05-23 04:45:02'),
(1, 12, 12, 12, 12, 12, 12, '2022-05-23 04:54:31'),
(1, 21, 21, 21, 12, 12, 21, '2022-05-23 06:02:32'),
(1, 100, 40, 100, 100, 30, 100, '2022-05-23 07:30:13'),
(1, 100, 40, 100, 100, 30, 100, '2022-05-23 07:30:43'),
(1, 100, 40, 100, 100, 30, 100, '2022-05-23 07:32:02'),
(1, 100, 40, 100, 100, 30, 100, '2022-05-23 07:32:39'),
(1, 21, 21, 21, 21, 21, 21, '2022-05-23 08:20:30'),
(1, 67, 18, 95, 22, 3, 80, '2022-05-23 08:26:54'),
(1, 67, 18, 95, 22, 3, 80, '2022-05-23 08:27:24'),
(1, 67, 18, 95, 22, 3, 80, '2022-05-23 08:27:51'),
(2, 68, 20, 93, 23, 3, 78, '2022-05-23 11:02:58'),
(2, 57, 18, 94, 30, 4, 80, '2022-05-23 11:03:48'),
(2, 99, 40, 99, 99, 10, 99, '2022-05-23 11:25:23'),
(2, 99, 40, 99, 99, 30, 99, '2022-05-23 11:26:08'),
(2, 99, 40, 99, 99, 30, 99, '2022-05-23 11:26:39'),
(2, 69, 20, 93, 23, 2, 79, '2022-05-23 11:27:34'),
(2, 59, 18, 94, 30, 4, 81, '2022-05-23 11:28:11'),
(2, 62, 13, 99, 28, 2, 77, '2022-05-23 11:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`id`, `name`, `email`, `password`, `age`) VALUES
(1, 'Abhilash Joshi', 'iabhilashjoshi@gmail.com', 'aaaa', 22),
(2, 'mayank bhatt', 'mayank@gmail.com', 'aaaa', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
