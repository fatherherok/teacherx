-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 05:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacherx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin1', '$2y$10$Lk9IYOPqbcDQy1UZ/ALYN.XQY/AhUTx5D5J4k0pAJ/d.825TA0GLO', 1),
(2, 'admin2', '$2y$10$Lk9IYOPqbcDQy1UZ/ALYN.XQY/AhUTx5D5J4k0pAJ/d.825TA0GLO', 1),
(3, 'admin3', '$2y$10$RWGqGj7FgehdeaBR5CNAsO67tRhC2gkekJA1llY52CAVxW/IaI3Bu', 2),
(4, 'admin4', '$2y$10$l.mztflhEZh6t6yYgCt4k.NHsF063Wp/pGaoN2P2VKR33xc032Swm', 2),
(5, 'admin5', '$2y$10$wjLVRtq5EbYLXa.pAsrWreHrUh5VpOqn9yexFJ7A1ieQovZxcsvgq', 2),
(6, 'admin6', '$2y$10$5yUJkZT9Nj1hnXxSx3epLOQyAn9twgeHN0UHBqiFVI4G24RQE6DVa', 2),
(7, 'admin7', '$2y$10$Dym4vMCMClHipXUpTRy6NOBydv69iPjm/7Tt8eNS/8pbN/FyqeGFu', 2),
(8, 'admin8', '$2y$10$hcepbWdo42.SJM.4vTy0jeRSkLGWjloafnkgYogmQCV.57LAI9D0m', 2),
(9, 'admin9', '$2y$10$iTk0egV8pBj19zSc4CwkoeHV0ZDz9mg8ETaLh2uwu3/E16GPK3kLO', 2),
(10, 'admin10', '$2y$10$nNK5sOhxop.KxDbblstSru/htlPzAmkHDwa2JVSX0IX13GHnwuR5y', 3),
(11, 'admin11', '$2y$10$lGo4ZWYw2NUPLeI1dxpV0.GPqblzlLmA1dym/8Nv43JXtIdnZn5RC', 3),
(12, 'admin12', '$2y$10$LtgWweCApiXFs/JJWeQ2Z.qnuNJpRo.74x2ArVNt/mvPxqLMSFUJu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_body` longtext NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blogpix` text NOT NULL,
  `ext` varchar(4) NOT NULL,
  `tags` text NOT NULL,
  `approve` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `added_by`, `date`, `blogpix`, `ext`, `tags`, `approve`) VALUES
(12, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-04 21:39:30', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology, Students, Policy', 'yes'),
(15, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-05 19:28:58', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology,  Policy', 'yes'),
(16, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-04 21:39:30', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology, Students, Policy', 'yes'),
(17, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-04 21:39:30', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology, Students, Policy', 'yes'),
(18, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-04 21:39:42', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology, Students, Policy', 'yes'),
(19, 'event to lagois', 'Visitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged familiesVisitation to a random less privileged families', 'facebook', '2020-10-04 21:39:30', '040_2750x3800_all-free-download.com.jpg', 'jpg', 'Technology, Students, Policy', 'yes'),
(20, 'This is a test topic ooo', 'UPDATE ON NAPOLI/JUVE:  We are sorry to inform you that nothing has changed based on our follow up with seria. So note our decisions thus:\r\n\r\nFor fantasy league and fantasy cup, the players from either teams will be marked null.\r\n\r\nFor pro-league and pro-cup, the teams will be awarded 0-0 apiece. What this means is that each team get 1points.\r\n\r\nThanks for your corporation. TEAM SPF', 'facebook', '2020-10-05 19:33:30', 'WhatsApp Image 2020-08-27 at 11.03.03 PM.jpeg', 'jpeg', 'Teaching Methods, Innovation, Teaching Resources, Writing', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `date` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `comment`, `name`, `email`, `blog_id`, `date`) VALUES
(1, 'This just an example to check', 'facebook', '', 19, 1601894482),
(2, 'Can someone please give me time to give my best', 'facebook', '', 19, 1601895001),
(3, 'This is a success', 'facebook', '', 19, 1601895074),
(4, 'How can can you', 'facebook', '', 19, 1601895120);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`) VALUES
(3, 'facebook', 'olukayodefadairo@gmail.com', 'Message from facebook', 'This is cool'),
(4, 'Olukayode Fadairo', 'olukayodefadairo@gmail.com', 'Message from Olukayode Fadairo', ''),
(5, 'Olukayode Fadairo', 'olukayodefadairo@gmail.com', 'Message from Olukayode Fadairo', ''),
(6, 'Olukayode Fadairo', 'olukayodefadairo@gmail.com', 'Message from Olukayode Fadairo', 'lover is good');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `mode` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `pix` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `pin`, `category`, `title`, `description`, `mode`, `cost`, `date`, `view`, `sale`, `pix`) VALUES
(8, 4358472, 'Creative Arts & Media', 'Visitation to a random less privileged families', '*UPDATE ON UNLIMITED TRANSFER*\r\nWe are glad to inform you that the unlimited transfer will extend till the begining of gameweek 5. This will be the last chance for you to make the unlimited free transfer this season. \r\n\r\nDon\'t be in a hurry, be calm, study the transfer through the day and feel free to change your team selection between now and friday.\r\n\r\n*Thanks for your corporation. TEAM SPF*', 'Instructor Led', 56, '2020-10-08 02:49:16', 0, 0, ''),
(9, 8316125, 'How to Teach Online', 'Visitation to a random less privileged families', '*UPDATE ON UNLIMITED TRANSFER*\r\nWe are glad to inform you that the unlimited transfer will extend till the begining of gameweek 5. This will be the last chance for you to make the unlimited free transfer this season. \r\n\r\nDon\'t be in a hurry, be calm, study the transfer through the day and feel free to change your team selection between now and friday.\r\n\r\n*Thanks for your corporation. TEAM SPF*', 'Self Paced', 0, '2020-10-08 11:25:51', 0, 0, '427.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `email_sub`
--

CREATE TABLE `email_sub` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_sub`
--

INSERT INTO `email_sub` (`id`, `email`) VALUES
(1, 'olukayodefadairo@gmail.com'),
(2, 'fatherherokay@gmail.com'),
(3, 'olukayodefadaggirosso@gmail.com'),
(4, 'info@teacherx.com');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `following` varchar(255) NOT NULL,
  `following_id` int(11) NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `being_followed` varchar(255) NOT NULL,
  `being_followed_id` int(11) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `following`, `following_id`, `status`, `being_followed`, `being_followed_id`, `time`) VALUES
(75, 'facebook', 5, 'unread', 'fatherhero', 4, 1601593312);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `like_by` varchar(100) NOT NULL,
  `post_by` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `seen` enum('unread','read') NOT NULL DEFAULT 'unread',
  `mode` enum('unread','read') NOT NULL DEFAULT 'unread',
  `time` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `date_added` bigint(11) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `user_posted_to` varchar(255) NOT NULL,
  `post_likes` int(11) NOT NULL DEFAULT '0',
  `postpix` text NOT NULL,
  `ext` varchar(4) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_body`, `date_added`, `added_by`, `user_posted_to`, `post_likes`, `postpix`, `ext`, `views`) VALUES
(2, 'This should work well', 1600428104, 'fatherhero', '', 0, '', '', 9),
(3, 'Can someon eplease tell me this just work?', 1600428144, 'fatherhero', '', 0, '427.jpg', 'jpg', 101),
(4, 'How to use: Apply a dime size to wet skin. Massage lather into the skin for about 60 sec. rinse off with lukewarm water. For best results, mask on face for 3 mins before washing off.', 1601020698, 'fatherhero', 'facebook', 0, 'white-lion-spirit-king-carol-cavalaris.jpg', 'jpg', 1),
(5, 'This is just another reason i love my people', 1601688884, 'facebook', 'facebook', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `posted_to` varchar(255) NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `post_id` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `postpix` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `comment_body`, `posted_by`, `posted_to`, `status`, `post_id`, `time`, `postpix`) VALUES
(1, 'This is a beautiful comment', 'fatherhero', 'fatherhero', 'unread', 2, 1601044134, 'il_794xN.2010228138_hihb.jpg'),
(2, 'Fantasy Deadline is 1 hour from the first match today. Messi, Ronaldo, Son, Aubameyang, Salah, , Lewandoskwi, Benzema, Haland, Di Maria, Vardy, Mbappe etc. Make your selection today with your unlimited free transfers', 'fatherhero', 'fatherhero', 'unread', 2, 1601044169, ''),
(3, 'Fantasy Deadline is 1 hour from the first match today. Messi, Ronaldo, Son, Aubameyang, Salah, , Lewandoskwi, Benzema, Haland, Di Maria, Vardy, Mbappe etc. Make your selection today with your unlimited free transfers', 'fatherhero', 'fatherhero', 'unread', 3, 1601044762, 'portrait-sketch4_orig.jpg'),
(5, 'Fantasy Deadline is 1 hour from the first match today. Messi, Ronaldo, Son, Aubameyang, Salah, , Lewandoskwi, Benzema, Haland, Di Maria, Vardy, Mbappe etc. Make your selection today with your unlimited free transfers', 'fatherhero', 'fatherhero', 'unread', 3, 1601106607, ''),
(6, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'fatherhero', 'fatherhero', 'unread', 3, 1601117926, 'il_fullxfull.710367537_gu0n.jpg'),
(7, '', 'fatherhero', 'fatherhero', 'unread', 3, 1601118479, 'il_794xN.2010228138_hihb.jpg'),
(8, '', 'fatherhero', 'fatherhero', 'unread', 3, 1601118479, 'il_794xN.2010228138_hihb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `pix` text NOT NULL,
  `material` text NOT NULL,
  `material_ext` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `user_id`, `pin`, `category`, `title`, `description`, `type`, `mode`, `cost`, `date`, `view`, `sale`, `pix`, `material`, `material_ext`) VALUES
(1, 4, 9054696, 'Maths', 'Visitation to a random less privileged families', '*UPDATE ON UNLIMITED TRANSFER*\r\nWe are glad to inform you that the unlimited transfer will extend till the begining of gameweek 5. This will be the last chance for you to make the unlimited free transfer this season. \r\n\r\nDon\'t be in a hurry, be calm, study the transfer through the day and feel free to change your team selection between now and friday.\r\n\r\n*Thanks for your corporation. TEAM SPF*', 'Audio', 'Pptx', 56, '2020-10-08 03:03:38', 0, 0, '', '', ''),
(2, 5, 4152732, 'English/Languages', 'kayode book', '*UPDATE ON UNLIMITED TRANSFER*\r\nWe are glad to inform you that the unlimited transfer will extend till the begining of gameweek 5. This will be the last chance for you to make the unlimited free transfer this season. \r\n\r\nDon\'t be in a hurry, be calm, study the transfer through the day and feel free to change your team selection between now and friday.\r\n\r\n*Thanks for your corporation. TEAM SPF*', 'Video', 'Docx', 1200, '2020-10-08 03:03:42', 0, 0, '5674643-IVAWZYPP-7.jpg', '', ''),
(3, 4, 1300785, 'Business', 'Visitation to a random less privileged families', '*UPDATE ON UNLIMITED TRANSFER*\r\nWe are glad to inform you that the unlimited transfer will extend till the begining of gameweek 5. This will be the last chance for you to make the unlimited free transfer this season. \r\n\r\nDon\'t be in a hurry, be calm, study the transfer through the day and feel free to change your team selection between now and friday.\r\n\r\n*Thanks for your corporation. TEAM SPF*', 'Audio', 'Pptx', 0, '2020-10-08 03:03:45', 0, 0, '', 'Cloud_Intro_Badge20200728-58-lusq0r.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tempusers`
--

CREATE TABLE `tempusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `teacher` enum('yes','no') NOT NULL DEFAULT 'no',
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempusers`
--

INSERT INTO `tempusers` (`user_id`, `username`, `phone`, `email`, `teacher`, `password`, `token`) VALUES
(1, 'fatherhero', '', 'olukayodefadairo@gmail.com', 'yes', '$2y$10$AROICaKwI9LUiMVHUcK9TeMX0k6.fQYkoDevfmiDnXpPZisirzhkC', 'h32rOsDHwnQVaXF'),
(2, 'fatherhero', '', 'olukayodefadairo@gmail.com', 'yes', '$2y$10$1yOFY8bx50eX6ilb87jnYu2vQKhendYAVA92iushfIPADX7/uhNAC', 'cy1NTvtmU29EfOZ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `teacher` enum('yes','no') NOT NULL DEFAULT 'no',
  `password` varchar(255) NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'no',
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `pix` longtext NOT NULL,
  `subject` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `school` text NOT NULL,
  `quali` varchar(255) NOT NULL,
  `website` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `linkedin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `phone`, `email`, `teacher`, `password`, `active`, `lname`, `fname`, `pix`, `subject`, `country`, `gender`, `class`, `school`, `quali`, `website`, `facebook`, `twitter`, `instagram`, `linkedin`) VALUES
(4, 'fatherhero', '07066352274', 'olukayodefadairo@gmail.com', 'yes', '$2y$10$Od8GZ.wM17NR2Qh4PwvXeOz2WOqQQZVTwTSa76YIimg3Xf6GGCdzO', 'yes', 'Fadairo', 'Olukayode', 'IMG-20200822-WA0026.jpg', 'STEM (Sciences)', 'Nigeria', 'male', 'Higher Education', 'Abeograms', 'B.Sc', '', '', '', '', ''),
(5, 'facebook', '07066352274', 'facebook@gmail.com', 'yes', '$2y$10$Od8GZ.wM17NR2Qh4PwvXeOz2WOqQQZVTwTSa76YIimg3Xf6GGCdzO', 'yes', 'Fadairo', 'Olukayode', 'EYSN57YXYAAcSle.jpg', 'STEM (Sciences)', 'Nigeria', 'male', 'Higher Education', 'Abeograms', 'B.Sc', 'www.outtaboxtech.com', 'fatherherokay', 'fatherherok', 'fatherherok', 'olukayode-fadairo');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `link`) VALUES
(1, 'this is a test', 'https://www.youtube.com/embed/gT69SMs486c'),
(2, 'this is an example', 'https://www.youtube.com/embed/gT69SMs486c'),
(3, 'this is the correct one', 'https://www.youtube.com/embed/gT69SMs486c'),
(4, 'event to lagois', 'https://www.youtube.com/embed/gT69SMs486c'),
(5, 'event to lagois', 'https://www.youtube.com/embed/42hI1GaB7wg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sub`
--
ALTER TABLE `email_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempusers`
--
ALTER TABLE `tempusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_sub`
--
ALTER TABLE `email_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempusers`
--
ALTER TABLE `tempusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
