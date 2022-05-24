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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `send_to` int DEFAULT '1',
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `price_for` varchar(255) DEFAULT NULL,
  `public` int DEFAULT NULL,
  `unpublished` int DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `link`, `date`, `send_to`, `img`, `video`, `course_id`, `price_for`, `public`, `unpublished`, `type`, `isDeleted`, `created`, `modified`) VALUES
(9, 'מבצע חומרי הדברה 20%', 'אמפולות קולרים ותרסיסיםn', NULL, NULL, 1, 'NaN.jpg', 'https://www.youtube.com/watch?v=uoGNBs85_TY', NULL, NULL, 1, NULL, NULL, 0, '2021-12-27 10:07:04', '2022-03-04 13:17:19'),
(10, 'הלטי רצועת 8 מצבים מדהימה', '&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uoGNBs85_TY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen&gt;&lt;/iframe&gt;', 'https://www.youtube.com/watch?v=uoGNBs85_TY', NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2022-03-04 13:09:34', '2022-03-04 13:16:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
