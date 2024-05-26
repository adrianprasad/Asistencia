-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2020 at 11:15 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendace_collector`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendace_list`
--

CREATE TABLE `attendace_list` (
  `id` bigint(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `absent_list` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendace_list`
--

INSERT INTO `attendace_list` (`id`, `department`, `staff_id`, `year`, `hour`, `absent_list`, `timestamp`) VALUES
(1, 'BSc Computer Science', 1, 2, 3, '8, 14, 20', '2020-08-21 22:43:32'),
(2, 'BSc Computer Science', 1, 2, 3, '8, 14, 20', '2020-08-21 22:46:27'),
(3, 'BSc Computer Science', 2, 1, 3, '21, 27', '2020-08-22 10:20:43'),
(4, 'BSc Computer Science', 1, 1, 2, '10, 22, 27', '2020-08-22 15:00:16'),
(5, 'BSc Physics', 2, 2, 4, '1, 15, 23, 26, 29, 30, 33, 34', '2020-08-22 22:16:56'),
(6, 'BSc Computer Science', 1, 3, 2, '6, 10', '2020-08-23 17:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `name`) VALUES
(1, 'BSc Computer Science'),
(2, 'BSc Physics');

-- --------------------------------------------------------

--
-- Table structure for table `staff_list`
--

CREATE TABLE `staff_list` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_list`
--

INSERT INTO `staff_list` (`id`, `name`) VALUES
(1, 'Luara'),
(2, 'Harry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendace_list`
--
ALTER TABLE `attendace_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_list`
--
ALTER TABLE `staff_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendace_list`
--
ALTER TABLE `attendace_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_list`
--
ALTER TABLE `staff_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
