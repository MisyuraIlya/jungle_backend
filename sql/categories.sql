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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `ex_id` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `inner_title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_wide` varchar(255) DEFAULT NULL,
  `orden` int DEFAULT NULL,
  `unpublished` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `ex_id`, `code`, `title`, `inner_title`, `img`, `img_wide`, `orden`, `unpublished`) VALUES
(5, 46, '1064619', '35', 'ציוד לתוכי', NULL, NULL, '520210331084439.jpg', 59, NULL),
(6, 42, '1069821', '33', 'רהיטים לחתול', NULL, NULL, '620210331084451.jpg', 60, NULL),
(7, 40, '1069822', '32', 'וטרינריה', NULL, NULL, '720210331084504.jpg', 9, NULL),
(8, 42, '1069823', '2', 'אבזרי חתול               ', NULL, NULL, '820210331084514.jpg', 62, NULL),
(9, 43, '1069824', '3', 'אביזרי כלב               ', NULL, NULL, '920210331084529.jpg', 63, NULL),
(10, 42, '1069825', '4', 'מזון חתולים              ', NULL, NULL, '1020210331084545.jpg', 64, NULL),
(11, 43, '1069826', '5', 'מזון כלבים               ', NULL, NULL, '1120210331084346.jpg', 58, NULL),
(12, 44, '1069827', '6', 'מזון דגים                ', NULL, NULL, '1220210331084615.jpg', 65, NULL),
(13, 44, '1069828', '7', 'אקוריומים                ', NULL, NULL, '1320210331084630.jpg', 66, NULL),
(14, 40, '1069829', '8', 'מזון וציוד לציפורים ומכרס', NULL, NULL, '1420210331084642.jpg', 10, NULL),
(15, 44, '1069830', '9', 'דגי נוי וחיות מחמד', NULL, NULL, '1520210331084655.jpg', 68, NULL),
(16, 44, '1069831', '10', 'ציוד לאקוריום            ', NULL, NULL, '1620210331084708.jpg', 69, NULL),
(18, 40, '1069833', '12', 'חומרים ותרופות למים      ', NULL, NULL, '1820210331084735.jpg', 11, NULL),
(19, 43, '1069834', '13', 'עצמות וחטיפים לכלב       ', NULL, NULL, '1920210331084746.jpg', 71, NULL),
(20, 42, '1069835', '14', 'חטיפים ומעדנים לחתול     ', NULL, NULL, '2020210331084114.jpg', 48, NULL),
(21, 42, '1069836', '15', 'חול לחתולים              ', NULL, NULL, '2120210331083911.jpg', 11, NULL),
(22, 42, '1069837', '9101', 'כל מוצרי הטעינה הישירה', NULL, NULL, '2220210331083924.jpg', 22, NULL),
(23, 42, '1069838', '31', 'ריתמות וקולרים לחתול', NULL, NULL, '2320210331083938.jpg', 32, NULL),
(24, 43, '1069839', '17', 'זממים לכלב               ', NULL, NULL, '2420210331083950.jpg', 38, NULL),
(25, 40, '1069840', '18', 'מיטות לכלבים וחתולים וכלובי נסיעה ', NULL, NULL, '2520210331084003.jpg', 0, NULL),
(26, 40, '1069841', '19', 'ביגוד לחיות              ', NULL, NULL, '2620210331084016.jpg', 1, NULL),
(28, 40, '1069843', '21', 'ויטמינים ותוספות מזון כ/ח', NULL, NULL, '2820210331084041.jpg', 2, NULL),
(29, 40, '1069844', '22', 'צמחים טבעי               ', NULL, NULL, '2920210331084055.jpg', 3, NULL),
(30, 58, '1069845', '23', 'רהיטים+קרשי גירוד ', NULL, NULL, '3020210331080424.jpg', 10, NULL),
(31, 43, '1069846', '24', 'צעצועים לכלב+מברשות      ', NULL, NULL, '3120210331084125.jpg', 49, NULL),
(32, 40, '1069847', '25', 'חטיפים+תוספות תוכים+מכרסמ', NULL, NULL, '3220210331084142.jpg', 4, NULL),
(33, 40, '1069848', '26', 'כלי שתייה ואוכל כ/ח      ', NULL, NULL, '3320210331084157.jpg', 5, NULL),
(34, 40, '1069849', '27', 'תספורות כלב חתול         ', NULL, NULL, '3420210331084217.jpg', 6, NULL),
(35, 40, '1069850', '28', 'צעצועים לתוכים ומכרסמים  ', NULL, NULL, '3520210331084232.jpg', 7, NULL),
(36, 42, '1069851', '29', 'שירותים לחתול            ', NULL, NULL, '3620210331084243.jpg', 54, NULL),
(37, 45, '1069852', '30', 'מזון מכרסמים+נסורת       ', NULL, NULL, '3720210331084255.jpg', 55, NULL),
(38, 43, '1069853', '16', 'רצועות וקולרים לכלבים    ', NULL, NULL, '3820210331084307.jpg', 56, NULL),
(39, 40, '1069854', '1', 'כלובים                   ', NULL, NULL, '3920210331084317.jpg', 8, NULL),
(40, NULL, NULL, NULL, 'מספרה ואילוף כלבים', NULL, NULL, '4020210331082211.jpg', 5, 1),
(50, 43, NULL, NULL, 'מזון יבש', NULL, NULL, NULL, 28, NULL),
(51, 43, NULL, NULL, 'אביזרים', NULL, NULL, NULL, 40, NULL),
(52, 1, NULL, NULL, 'חול', NULL, NULL, '5220210405085435.jpg', 20, NULL),
(54, 43, NULL, NULL, 'שימורים לכלב בוגר', NULL, NULL, NULL, 44, NULL),
(55, 43, NULL, NULL, 'הדברה אמפולות ', NULL, NULL, NULL, 47, NULL),
(57, NULL, NULL, NULL, 'כלבים', NULL, '5720211212195945.jpg', '5720210408071952.jpg', 0, NULL),
(58, NULL, NULL, NULL, 'חתולים', NULL, NULL, '5820211221203243.jpg', 1, NULL),
(59, NULL, NULL, NULL, 'ציפורים', NULL, NULL, '5920211230110903.png', 2, NULL),
(60, NULL, NULL, NULL, 'מכרסמים', NULL, NULL, '6020211206181148.png', 3, NULL),
(61, 58, NULL, NULL, 'שימורים לחתול', NULL, NULL, '6120211212223249.jpg', 1, NULL),
(62, 57, NULL, NULL, 'צעצועים לכלב', NULL, NULL, '6220210408072349.jpg', 6, NULL),
(63, 57, NULL, NULL, 'רצועות וקולרים לכלב', NULL, NULL, NULL, 11, NULL),
(65, 57, NULL, NULL, 'ביגוד לכלב', NULL, NULL, '6520210408072125.jpg', 12, NULL),
(66, 57, NULL, NULL, 'חטיפים לכלב', NULL, '6620211201100700.jpg', '6620211212221636.jpg', 3, NULL),
(67, 57, NULL, NULL, 'חומרי הדברה רחיצה וטיפול ', NULL, NULL, '6720210408072304.jpg', 4, NULL),
(68, 57, NULL, NULL, 'ציוד נלווה לכלב', NULL, NULL, '6820210408072321.jpg', 10, NULL),
(69, 57, NULL, NULL, 'מזון יבש לכלב', NULL, '6920211201100548.png', '6920211212224022.jpg', 0, NULL),
(70, 57, NULL, NULL, 'שימורים לכלב', NULL, NULL, '7020210408072336.jpg', 5, NULL),
(71, 57, NULL, NULL, 'מיטות לכלב', NULL, NULL, NULL, 8, NULL),
(72, 58, NULL, NULL, 'מזון יבש לחתול', NULL, NULL, '7220211212214755.jpg', 0, NULL),
(73, 58, NULL, NULL, 'חול לחתול', NULL, '7320211211200608.jpg', '7320211211200900.jpg', 4, NULL),
(74, 58, NULL, NULL, 'חומרי הדברה לחתול', NULL, NULL, NULL, 6, NULL),
(75, 58, NULL, NULL, 'קולרים לחתול', NULL, NULL, NULL, 9, NULL),
(76, 58, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1),
(77, 58, NULL, NULL, 'כלי אוכל ומים', NULL, NULL, NULL, 11, NULL),
(78, 58, NULL, NULL, 'צעצועים לחתול', NULL, NULL, NULL, 7, NULL),
(79, 58, NULL, NULL, 'ציוד נלווה לחתול', NULL, NULL, NULL, 8, NULL),
(80, 59, NULL, NULL, 'מזון לתוכי', NULL, NULL, NULL, 2, NULL),
(81, 59, NULL, NULL, 'ציוד נלווה לתוכי', NULL, NULL, NULL, 12, NULL),
(83, NULL, NULL, NULL, 'דגים', NULL, NULL, '8320220225094830.jpg', 4, NULL),
(84, 83, NULL, NULL, 'אקווריומים', NULL, NULL, '8420211212192217.png', 2, NULL),
(85, 83, NULL, NULL, 'מזון לדגים', NULL, '8520220225094548.jpg', '8520220225094440.jpg', 0, NULL),
(86, 83, NULL, NULL, 'ציוד לדגים', NULL, NULL, NULL, 1, NULL),
(87, 60, NULL, NULL, 'מזון למכרסמים', NULL, '8720211206181736.jpg', '8720211230154604.png', 0, NULL),
(88, 60, NULL, NULL, 'ציוד למכרסמים', NULL, NULL, '8820211230154456.png', 4, NULL),
(89, 60, NULL, NULL, 'כלובים למכרסמים', NULL, NULL, '8920211230154542.png', 7, NULL),
(90, 57, NULL, NULL, 'כלי אוכל ומים', NULL, NULL, '9020210408072144.jpg', 9, NULL),
(91, 46, NULL, NULL, 'מזון לתוכי', NULL, NULL, NULL, 6, NULL),
(92, 59, NULL, NULL, 'כלובים לתוכים', NULL, NULL, NULL, 2, NULL),
(93, 58, NULL, NULL, 'גורי חתול', NULL, '9320211227221413.jpg', '9320211227183935.jpg', 2, NULL),
(94, 58, NULL, NULL, 'פרארפואי', NULL, NULL, NULL, 3, NULL),
(95, 57, NULL, NULL, 'מזון יבש גורי כלב', NULL, '9520211213110331.jpg', '9520211212224255.jpg', 2, NULL),
(96, 57, NULL, NULL, 'מזון יבש כלב מבוגר', NULL, NULL, NULL, 14, NULL),
(97, 60, NULL, NULL, 'חטיפים למכרסמים', NULL, NULL, '9720211230154400.png', 3, NULL),
(98, 57, NULL, NULL, 'עצמות לעיסה לכלב', NULL, NULL, '9820211214092712.jpg', 7, NULL),
(99, 58, NULL, NULL, 'חטיפים ותוספי תזונה ', NULL, '9920211228212215.png', '9920211212201751.jpg', 5, NULL),
(100, 57, NULL, NULL, 'מזון יבש לרגישים', NULL, NULL, NULL, 15, NULL),
(101, 58, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(102, 57, NULL, NULL, 'מזון פרארפואי', NULL, '10220211206163303.jpg', '10220211229140755.jpg', 1, NULL),
(103, 58, NULL, NULL, 'מעדנים לחתול ', NULL, NULL, '10320211212223831.jpg', 12, NULL),
(104, 57, NULL, NULL, 'ויטמינים ותוספי תזונה', NULL, NULL, NULL, 13, NULL),
(105, 58, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(106, 11, NULL, NULL, 'מזון יבש לכלב', NULL, NULL, NULL, 0, NULL),
(107, 60, NULL, NULL, 'מצעים סופגים', NULL, NULL, '10720211230154512.png', 4, NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL, '10820220111114455.jpg', 6, 1),
(109, 57, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
