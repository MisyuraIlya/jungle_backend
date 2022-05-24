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
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `unpublished` int DEFAULT NULL,
  `orden` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `parent_id`, `title`, `unpublished`, `orden`) VALUES
(9, 1, 'ארם אנד האמר', NULL, 7),
(11, 4, 'לא', NULL, 13),
(12, 4, 'כן', NULL, 6),
(13, 1, 'Go', NULL, 52),
(14, 1, 'Kong', NULL, 53),
(15, 7, 'מתגבש', NULL, 2),
(16, 7, 'סופג', NULL, 15),
(17, 7, 'מנטרל ריחות', NULL, 20),
(18, 7, 'קריסטל', NULL, 24),
(19, 6, 'ללא דגנים', NULL, 3),
(20, 6, 'שמירה על המשקל', NULL, 6),
(21, 6, 'לבעלי רגישויות ', NULL, 2),
(22, 6, NULL, NULL, 11),
(23, 6, 'עשיר במיוחד', NULL, 5),
(24, 6, 'טבעי 100%', NULL, 1),
(25, 3, 'גור', NULL, 5),
(26, 3, 'בוגר', NULL, 12),
(27, 3, 'מבוגר', NULL, 19),
(29, 5, 'רולרים', NULL, 23),
(30, 5, 'פדים', NULL, 17),
(31, 5, 'חיתולים', NULL, 7),
(32, 5, 'חבל לעיסה ', NULL, 6),
(33, 5, 'מוצרים דנטליים', NULL, 12),
(34, 5, 'שמפו/קונדישינר', NULL, 25),
(35, 5, 'מברשות ומסרקים', NULL, 11),
(36, 1, 'רויאל קנין', NULL, 50),
(37, 1, 'אקויליבריו', NULL, 6),
(38, 1, 'אבר קלין ', NULL, 0),
(39, 1, 'הילס', NULL, 16),
(40, 1, 'סאינס פלן', NULL, 30),
(41, 1, 'פרו-פלן', NULL, 41),
(42, 1, 'הפי דוג', NULL, 18),
(43, 1, 'צ\'יקופי', NULL, 46),
(44, 1, 'ג\'נסיס פיור', NULL, 11),
(45, 1, 'אנימונדה ', NULL, 5),
(46, 1, 'בונזו', NULL, 8),
(47, 1, 'דוגלי', NULL, 13),
(48, 1, 'פריסקיז', NULL, 44),
(49, 1, 'לה קט', NULL, 28),
(50, 1, 'קיפי', NULL, 47),
(51, 6, 'דנטלי', NULL, 0),
(52, 6, 'מסורסים מעוקרות', NULL, 4),
(53, 6, 'טורפים', NULL, 7),
(54, 6, NULL, NULL, 8),
(55, 6, NULL, NULL, 9),
(56, 6, NULL, NULL, 10),
(57, 1, 'פרמיו', NULL, 42),
(58, 1, 'סשאזיר', NULL, 34),
(59, 1, 'פנסי ', NULL, 39),
(60, 1, 'דוג צ\'או', NULL, 14),
(61, 1, 'הורייזן', NULL, 15),
(62, 1, 'פודיס', NULL, 35),
(63, 1, 'אדוואנטג\'', NULL, 2),
(64, 1, 'פרונטליין', NULL, 40),
(65, 1, 'סרסטו', NULL, 33),
(66, 1, 'אדוונטיקס', NULL, 1),
(67, 1, 'הרץ', NULL, 20),
(68, 1, 'טריקסי', NULL, 26),
(69, 8, 'כן', NULL, 0),
(70, 8, 'לא', NULL, 1),
(71, 5, 'כף לאיסוף צרכים', NULL, 10),
(72, 5, 'פטה', NULL, 18),
(73, 5, 'פאוץ', NULL, 16),
(74, 5, 'מזון יבש', NULL, 13),
(75, 7, 'נטול ריח ', NULL, 4),
(76, 1, 'הפי קט ', NULL, 19),
(77, 1, 'ורסלה לאגה ', NULL, 25),
(78, 5, 'זממים ', NULL, 4),
(79, 5, 'כלובי נסיעה גדרות וכלובי חינוך', NULL, 9),
(80, 1, 'ויטהקרפט', NULL, 23),
(81, 1, 'ריבוס', NULL, 51),
(82, 1, 'ביאפר', NULL, 9),
(83, 1, 'ויסקס', NULL, 24),
(84, 1, 'ג\'רהיי', NULL, 12),
(85, 1, 'יורוקיטי', NULL, 27),
(86, 1, 'סניקט', NULL, 31),
(87, 7, 'חצץ', NULL, 5),
(88, 5, 'שירותים לחתולים', NULL, 24),
(89, 5, 'חבל', NULL, 5),
(90, 9, 'בד', NULL, 0),
(91, 9, 'פלסטיק', NULL, 1),
(92, 9, 'הולכה ואימון', NULL, 2),
(93, 1, 'פרפלסט', NULL, 45),
(94, 1, 'פירסט מייט', NULL, 37),
(95, 1, 'ליטל וואן', NULL, 29),
(96, 1, 'פלקסי', NULL, 38),
(97, 1, 'רד דינגו', NULL, 49),
(98, 1, 'איזי ווק', NULL, 3),
(99, 1, 'הלטי ', NULL, 17),
(100, 1, 'וונפי', NULL, 22),
(101, 1, 'פורינה', NULL, 36),
(102, 9, 'מתארכות אוטמוטי', NULL, 3),
(103, 5, 'קרטון', NULL, 22),
(104, 5, 'אמפולת ', NULL, 0),
(105, 5, 'קולרים', NULL, 21),
(106, 5, 'בד', NULL, 1),
(107, 9, 'עור ', NULL, 4),
(108, 5, 'פלסטיק', NULL, 19),
(109, 5, 'טבעיות/מעושנות', NULL, 8),
(110, 1, 'ווימיזיס', NULL, 21),
(111, 5, 'ביסקוויטם', NULL, 2),
(112, 1, 'קירה', NULL, 48),
(113, 1, 'ביל ג\'ק', NULL, 10),
(114, 1, 'אמפט', NULL, 4),
(115, 5, 'מרחקים מנטרלי ריחות וחינוך', NULL, 14),
(116, 5, 'תמציות קטניפ', NULL, 27),
(117, 1, 'spot', NULL, 54),
(118, 1, 'פרמינייטור', NULL, 43),
(119, 1, 'סרה', NULL, 32),
(120, 1, NULL, NULL, 55),
(121, 5, 'נירוסטה', NULL, 15),
(122, 5, 'פרווה ועור ', NULL, 20),
(123, 5, 'שקי קקי', NULL, 26),
(124, 1, NULL, NULL, 56),
(125, 1, NULL, NULL, 57),
(126, 5, 'גומי', NULL, 3),
(127, 5, NULL, NULL, 28),
(128, 1, NULL, NULL, 58),
(129, 1, NULL, NULL, 59),
(130, 10, 'טורפים', NULL, 2),
(131, 10, 'טרופיים', NULL, 3),
(132, 10, 'דפים', NULL, 1),
(133, 10, 'גרגרים', NULL, 0),
(134, 10, 'סטיקים', NULL, 4),
(135, 10, 'צמחוני', NULL, 5),
(136, 10, 'שוקע ', NULL, 7),
(137, 10, 'צף', NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
