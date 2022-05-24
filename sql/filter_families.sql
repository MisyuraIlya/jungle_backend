-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2022 at 12:06 PM
-- Server version: 8.0.21
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jungle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `filter_families`
--

CREATE TABLE `filter_families` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `unpublished` int DEFAULT NULL,
  `orden` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filter_families`
--

INSERT INTO `filter_families` (`id`, `title`, `unpublished`, `orden`) VALUES
(1, 'מותג', NULL, 0),
(3, 'שלב בחיים', NULL, 1),
(4, 'מונע כדורי שיער', NULL, 2),
(5, 'סוג', NULL, 3),
(6, 'תזונה מיוחדת ', NULL, 4),
(7, 'סוג החול', NULL, 5),
(8, 'מצפצף', NULL, 6),
(9, 'רצועות רתמות וזממים', NULL, 7),
(10, 'מזון דגים', NULL, 8),
(11, 'מזון רטוב', NULL, 9),
(12, NULL, NULL, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filter_families`
--
ALTER TABLE `filter_families`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filter_families`
--
ALTER TABLE `filter_families`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
