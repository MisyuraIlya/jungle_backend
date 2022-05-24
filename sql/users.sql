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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `site_id` int DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mail_second` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `unpublished` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `recovery` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `accept` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `site_id`, `mail`, `mail_second`, `tel`, `mobile`, `first_name`, `last_name`, `type`, `unpublished`, `password`, `token`, `passport`, `recovery`, `img`, `facebook_id`, `google_id`, `town`, `address`, `zip`, `accept`) VALUES
(4, 5, 'greg@gmail.com', 'greg@gmail.com', '0546547878', '45656445', 'Gregory', 'Ostrovsky', NULL, NULL, '123456', '2fc67f95725a627fcf0c8c5f8d8a7fce5f917f1ee0d71302ce28145f7546b21d', '338024445', '3534', NULL, NULL, NULL, 'חיפה', 'ז\'ורס 36', '357219', NULL),
(24, NULL, 'statostech@gmail.com', 'statostech@gmail.com', '0548798787', NULL, 'גרגורי', 'אוסטרובסקי', NULL, NULL, NULL, 'b59a0d8baaca6dedfca8aa7ee7a4732d820ef58416fd77deb7d5bc3cafecb9eb', '338024445', NULL, NULL, NULL, '108857332408488980348', 'חיפה', 'ג\'ורס 36,22', '123456', 1),
(25, NULL, 'karina@digitrade.co.il', 'karina@digitrade.co.il', '0545239810', NULL, 'Karina', 'Nestrovsky', NULL, NULL, NULL, '2c257ff15e85c820148678f27d3aecefad2cc5e8ad7617e1420f0ed9d5a0cfef', '3212', NULL, NULL, NULL, '111670624955848511551', 'Haifa', 'Arlozorov 67', '12554', 1),
(26, NULL, 'support@digitrade.co.il', 'support@digitrade.co.il', '0545311784', NULL, 'tes', 'test', NULL, NULL, '1234567891', '43927e46e07107def16b330918112560d3abac898377162a6b8fac3f4cf6d562', '768678678', NULL, NULL, NULL, NULL, 'חיפה', 'לאון בלום', '12345', NULL),
(27, NULL, 'daniel@statos.co', 'daniel@statos.co', '0539662212', NULL, 'דניאל', 'שוב', NULL, NULL, 'Aa123456', '6c90e429588cfb3c14e277e1bf87c0d7ac733d51eee25c24d4b2e5cbfb2bc15e', NULL, NULL, NULL, NULL, NULL, 'חיפה', 'טבנקין', NULL, NULL),
(28, NULL, 'daniel@omegapos.co.il', 'daniel@omegapos.co.il', '0504531600', NULL, 'דניאל', 'קורן', NULL, NULL, 'ringo1', '3a3bc8f9f1c1d1608f96507138af3aea750827353eb21d066ceacf1a7d7690a8', NULL, NULL, NULL, NULL, NULL, 'חיפה', 'הבנים', NULL, NULL),
(29, NULL, 'dimonik_d@yahoo.com', 'dimonik_d@yahoo.com', '0545311784', NULL, 'דימה', 'גרינפלד', NULL, NULL, '1234567891', 'acd78f7c024af239c5ddd6633fb21bf9a783480d8758d3e7888e32721d0d9f9f', NULL, NULL, NULL, NULL, NULL, 'חיפה', 'לאון בלום', NULL, NULL),
(30, NULL, 'statosbiz@statos.co', 'statosbiz@statos.co', '0584018761', NULL, 'יולי', 'ייסיפוביץ', NULL, NULL, '123456', '523435e1d6a3c1225724da7c1b5d35bdbe957251baa59420fbd41e31dc303aec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
