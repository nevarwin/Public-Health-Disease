-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 08:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publichealthdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abdinfotbl`
--

CREATE TABLE `abdinfotbl` (
  `amebiasisld` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `stoolCulture` varchar(20) DEFAULT 'N/A',
  `organism` varchar(20) DEFAULT 'N/A',
  `outcome` varchar(20) DEFAULT 'N/A',
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT 0,
  `morbidityMonth` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abdinfotbl`
--

INSERT INTO `abdinfotbl` (`amebiasisld`, `patientId`, `stoolCulture`, `organism`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityWeek`, `morbidityMonth`) VALUES
(1, 349, 'sdfa', 'asdf', 'alive', '0000-00-00 00:00:00', '2023-05-29', 1, 1),
(2, 350, 'neg', 'no', 'alive', '0000-00-00 00:00:00', '2023-05-29', 11, 1),
(3, 351, 'negative', 'not done', 'alive', '0000-00-00 00:00:00', '2023-06-01', 1, 0),
(4, 352, 'engative', 'not done', 'alive', '0000-00-00 00:00:00', '2023-05-31', 1, 1),
(5, 353, 'negative', 'note done', 'alive', '0000-00-00 00:00:00', '2023-06-05', 1, 1),
(6, 354, 'negative ', 'note done', 'alive', '0000-00-00 00:00:00', '2023-06-02', 1, 0),
(7, 355, '', '', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(8, 356, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-06-01', 4, 4),
(9, 375, 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '2000-01-10', 0, 0),
(10, 376, 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(11, 437, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-05-29', 0, 0),
(12, 438, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-05-31', 0, 0),
(13, 451, 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(14, 452, 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(15, 453, 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(16, 454, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(17, 455, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(18, 462, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 1, 1),
(19, 492, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(20, 493, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(21, 494, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(22, 495, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(23, 496, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(24, 497, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(25, 498, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(26, 499, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(27, 500, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(28, 501, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(29, 502, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(30, 503, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(31, 504, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(32, 505, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(33, 506, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(34, 507, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(35, 508, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(36, 509, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(37, 510, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(38, 511, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(39, 512, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(40, 513, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(41, 514, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(42, 515, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(43, 516, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(44, 517, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(45, 518, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(46, 519, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(47, 520, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(48, 521, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(49, 522, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(50, 523, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(51, 524, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(52, 525, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(53, 526, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(54, 527, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(55, 528, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(56, 529, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(57, 530, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(58, 531, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(59, 532, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(60, 533, 'N/A', 'N/A', 'other', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(61, 534, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(62, 538, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(63, 539, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(64, 540, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(65, 541, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(66, 542, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(67, 550, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(68, 552, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(69, 553, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(70, 554, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(71, 555, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(72, 556, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(77, 561, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(79, 563, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(80, 564, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(81, 565, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(82, 566, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(83, 567, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(84, 568, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(85, 569, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(86, 570, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(87, 571, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(88, 572, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(89, 573, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(90, 574, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(91, 575, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(92, 576, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(93, 577, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(94, 578, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(95, 579, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(97, 581, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(98, 582, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(99, 583, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(100, 584, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(101, 585, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(102, 586, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(104, 588, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(105, 589, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(106, 590, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(107, 591, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(108, 592, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(109, 593, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(110, 594, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(111, 595, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(114, 687, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(115, 787, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(116, 788, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(117, 789, 'N/A', 'N/A', 'N/A', NULL, NULL, 0, 0),
(118, 790, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(119, 791, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(120, 792, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(121, 794, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(122, 795, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(123, 808, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(124, 825, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(125, 826, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(126, 827, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(127, 828, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(128, 829, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(129, 830, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(130, 833, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(131, 834, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(132, 836, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(133, 837, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(134, 838, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(135, 839, 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aefiinfotbl`
--

CREATE TABLE `aefiinfotbl` (
  `aefiId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `case` varchar(20) DEFAULT NULL,
  `anaphylactoid` varchar(20) DEFAULT NULL,
  `anaphylaxis` varchar(20) DEFAULT NULL,
  `brachialneuritis` varchar(20) DEFAULT NULL,
  `dissbcginfect` varchar(20) DEFAULT NULL,
  `encephalopathy` varchar(20) DEFAULT NULL,
  `hhe` varchar(20) DEFAULT NULL,
  `injectsiteAbcess` varchar(20) DEFAULT NULL,
  `intussusception` varchar(20) DEFAULT NULL,
  `lymphadenitis` varchar(20) DEFAULT NULL,
  `osteitis` varchar(20) DEFAULT NULL,
  `persistent` varchar(20) DEFAULT NULL,
  `seizures` varchar(10) NOT NULL,
  `sepsis` varchar(20) DEFAULT NULL,
  `thrombocytopenia` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `aliveCondition` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `otherSign` varchar(20) DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL,
  `suspectedVacc` varchar(20) DEFAULT NULL,
  `dateVaccination` datetime DEFAULT NULL,
  `dose` datetime DEFAULT NULL,
  `siteInjection` varchar(20) DEFAULT NULL,
  `manufacturer` varchar(20) DEFAULT NULL,
  `dateExpire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aefiinfotbl`
--

INSERT INTO `aefiinfotbl` (`aefiId`, `patientId`, `case`, `anaphylactoid`, `anaphylaxis`, `brachialneuritis`, `dissbcginfect`, `encephalopathy`, `hhe`, `injectsiteAbcess`, `intussusception`, `lymphadenitis`, `osteitis`, `persistent`, `seizures`, `sepsis`, `thrombocytopenia`, `outcome`, `aliveCondition`, `dateDied`, `otherSign`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`, `suspectedVacc`, `dateVaccination`, `dose`, `siteInjection`, `manufacturer`, `dateExpire`) VALUES
(1, 357, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(2, 357, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'no', 'No', 'No', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(3, 358, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 358, 'na', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'alive', 'recovering', '0000-00-00 00:00:00', 'na', '2023-06-01', 1, 1, 'na', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'arm', 'na', '0000-00-00 00:00:00'),
(5, 359, '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', 'no', 'alive', '', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00'),
(6, 360, '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', 'no', 'alive', '', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00'),
(7, 361, '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'alive', '', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00'),
(8, 362, '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'alive', '', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00'),
(9, 363, 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(10, 364, 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '2000-01-01', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(11, 436, 'N/A', 'Unknown', 'Unknown', 'Other', 'No', 'Unknown', 'No', 'No', 'No', 'Unknown', 'No', 'No', 'Yes', 'No', 'Other', 'Alive', 'recovering', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(12, 439, 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(13, 440, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(14, 441, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '2023-06-01', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(15, 442, 'asdf', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'dead', 'asdf', '2023-06-20 23:58:00', 'asdf', '2023-06-01', 1, 2, 'zxcv', '2023-06-07 12:59:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(16, 457, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(17, 458, 'N/A', 'No', 'No', 'Unknown', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(18, 463, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Dead', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 1, 1, '1', '2023-07-01 00:50:00', '0000-00-00 00:00:00', 'arm', 'na', '0000-00-00 00:00:00'),
(19, 464, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Dead', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(20, 536, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'dead', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(21, 793, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(22, 796, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'alive', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00'),
(23, 841, 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'dead', 'N/A', '2023-11-16 06:15:00', 'N/A', '2023-11-07', 0, 0, 'N/A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N/A', 'N/A', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aesinfotbl`
--

CREATE TABLE `aesinfotbl` (
  `aesld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `organism` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL,
  `outcome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aesinfotbl`
--

INSERT INTO `aesinfotbl` (`aesld`, `patientId`, `labResult`, `organism`, `dateDied`, `caseClass`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`, `outcome`) VALUES
(1, 365, 'N/A', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'alive'),
(2, 365, 'N/A', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'alive'),
(3, 366, 'negative', 'na', '0000-00-00 00:00:00', 'na', '0000-00-00', 1, 1, 'alive'),
(4, 367, '', '', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, 'alive'),
(5, 368, 'N/A', 'N/A', '0000-00-00 00:00:00', '', '0000-00-00', 0, 0, ''),
(6, 369, 'N/A', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'Alive'),
(7, 465, 'N/A', 'N/A', '0000-00-00 00:00:00', 'N/A', '0000-00-00', 0, 0, 'alive');

-- --------------------------------------------------------

--
-- Table structure for table `afpinfotbl`
--

CREATE TABLE `afpinfotbl` (
  `afpld` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `rarm` varchar(20) DEFAULT NULL,
  `cough` varchar(20) DEFAULT NULL,
  `paralysisatBirth` varchar(20) DEFAULT NULL,
  `diarrheaVomiting` varchar(20) DEFAULT NULL,
  `musclePain` varchar(20) DEFAULT NULL,
  `mening` varchar(20) DEFAULT NULL,
  `brthMusc` varchar(20) DEFAULT NULL,
  `neckMusc` varchar(20) DEFAULT NULL,
  `paradev` varchar(20) DEFAULT NULL,
  `paradir` varchar(20) DEFAULT NULL,
  `facialMusc` varchar(20) DEFAULT NULL,
  `rasens` varchar(20) DEFAULT NULL,
  `lasens` varchar(20) DEFAULT NULL,
  `rlsens` varchar(20) DEFAULT NULL,
  `llsens` varchar(20) DEFAULT NULL,
  `raref` varchar(20) DEFAULT NULL,
  `laref` varchar(20) DEFAULT NULL,
  `rlref` varchar(20) DEFAULT NULL,
  `llref` varchar(20) DEFAULT NULL,
  `ramotor` varchar(20) DEFAULT NULL,
  `lamotor` varchar(20) DEFAULT NULL,
  `rlmotor` varchar(20) DEFAULT NULL,
  `llmotor` varchar(20) DEFAULT NULL,
  `hxDisorder` varchar(20) DEFAULT NULL,
  `otherCases` varchar(20) DEFAULT NULL,
  `firststoolSpec` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dstool1Taken` date DEFAULT NULL,
  `dstool2Taken` date DEFAULT NULL,
  `dstool1Sent` date DEFAULT NULL,
  `dstool2Sent` date DEFAULT NULL,
  `stool1Result` varchar(20) DEFAULT NULL,
  `stool2Result` varchar(20) DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `afpinfotbl`
--

INSERT INTO `afpinfotbl` (`afpld`, `patientId`, `fever`, `rarm`, `cough`, `paralysisatBirth`, `diarrheaVomiting`, `musclePain`, `mening`, `brthMusc`, `neckMusc`, `paradev`, `paradir`, `facialMusc`, `rasens`, `lasens`, `rlsens`, `llsens`, `raref`, `laref`, `rlref`, `llref`, `ramotor`, `lamotor`, `rlmotor`, `llmotor`, `hxDisorder`, `otherCases`, `firststoolSpec`, `dateDied`, `outcome`, `dstool1Taken`, `dstool2Taken`, `dstool1Sent`, `dstool2Sent`, `stool1Result`, `stool2Result`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(3, 370, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'No', 'No', '0000-00-00 00:00:00', 'alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 0, 0),
(4, 371, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0),
(5, 372, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0),
(6, 373, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0),
(7, 374, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0),
(8, 377, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00', 0, 0),
(9, 378, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'no', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'no', 'no', 'no', '0000-00-00 00:00:00', 'Alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 0, 0),
(10, 444, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'No', 'No', '0000-00-00 00:00:00', 'alive', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 0, 0),
(11, 466, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'N/A', 'Yes', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'Yes', 'No', '0000-00-00 00:00:00', 'dead', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `amesinfotbl`
--

CREATE TABLE `amesinfotbl` (
  `amesld` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `behaviorChng` varchar(20) DEFAULT NULL,
  `seizure` varchar(20) DEFAULT NULL,
  `stiffneck` varchar(20) DEFAULT NULL,
  `bulgefontanel` varchar(20) DEFAULT NULL,
  `menSign` varchar(20) DEFAULT NULL,
  `clinDiag` varchar(20) DEFAULT NULL,
  `pcv10` varchar(20) DEFAULT NULL,
  `pcv13` varchar(20) DEFAULT NULL,
  `meningoVacc` varchar(20) DEFAULT NULL,
  `vacMeningDate` date DEFAULT NULL,
  `meningoVaccDose` varchar(10) DEFAULT NULL,
  `measVacc` varchar(20) DEFAULT NULL,
  `vacMeasDate` date DEFAULT NULL,
  `measVaccDose` varchar(10) DEFAULT NULL,
  `aesCaseClass` varchar(20) DEFAULT NULL,
  `finalDiagnosis` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amesinfotbl`
--

INSERT INTO `amesinfotbl` (`amesld`, `patientId`, `fever`, `behaviorChng`, `seizure`, `stiffneck`, `bulgefontanel`, `menSign`, `clinDiag`, `pcv10`, `pcv13`, `meningoVacc`, `vacMeningDate`, `meningoVaccDose`, `measVacc`, `vacMeasDate`, `measVaccDose`, `aesCaseClass`, `finalDiagnosis`, `outcome`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`, `dateDied`) VALUES
(1, 379, 'No', 'No', 'No', 'No', 'No', 'No', 'a', 'No', 'No', 'No', '0000-00-00', 'a', 'a', '0000-00-00', 'a', 'a', 'a', 'alive', '2023-07-01', 0, 0, '0000-00-00 00:00:00'),
(2, 380, 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'no', 'no', 'no', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00', 0, 0, '0000-00-00 00:00:00'),
(3, 382, 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'no', 'no', 'no', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00', 0, 0, '0000-00-00 00:00:00'),
(4, 445, 'No', 'No', 'No', 'No', 'No', 'No', 'asdf', 'No', 'No', 'No', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'asdf', 'alive', '2023-06-01', 1, 1, '0000-00-00 00:00:00'),
(5, 467, 'No', 'Unknown', 'No', 'No', 'Unknown', 'No', 'N/A', 'No', 'Yes', 'Yes', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'alive', '2023-07-03', 0, 0, '0000-00-00 00:00:00'),
(6, 535, 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'No', 'No', 'No', '0000-00-00', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'dead', '0000-00-00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `muncityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay`, `muncityId`) VALUES
(1, 'Barangay I', 1),
(2, 'Amuyong', 1),
(3, 'Barangay II', 1),
(4, 'Barangay III', 1),
(5, 'Barangay IV', 1),
(6, 'Barangay V', 1),
(7, 'Bilog', 1),
(8, 'Buck Estate', 1),
(9, 'Esperanza Ibaba', 1),
(10, 'Esperanza Ilaya', 1),
(11, 'Kaysuyo', 1),
(12, 'Kaytitinga I', 1),
(13, 'Kaytitinga II', 1),
(14, 'Kaytitinga III', 1),
(15, 'Luksuhin', 1),
(16, 'Luksuhin Ilaya', 1),
(17, 'Mangas I', 1),
(18, 'Mangas II', 1),
(19, 'Marahan I', 1),
(20, 'Marahan II', 1),
(21, 'Matagbak I', 1),
(22, 'Matagbak II', 1),
(23, 'Pajo', 1),
(24, 'Palumlum', 1),
(25, 'Santa Teresa', 1),
(26, 'Sikat', 1),
(27, 'Sinaliw Malaki', 1),
(28, 'Sinaliw na Munti', 1),
(29, 'Sulsugin', 1),
(30, 'Taywanak Ibaba', 1),
(31, 'Taywanak Ilaya', 1),
(32, 'Upli', 1),
(33, 'Banaybanay', 2),
(34, 'Barangay I', 2),
(35, 'Barangay II', 2),
(36, 'Barangay III', 2),
(37, 'Barangay IV', 2),
(38, 'Barangay IX', 2),
(39, 'Barangay V', 2),
(40, 'Barangay VI', 2),
(41, 'Barangay VII', 2),
(42, 'Barangay VIII', 2),
(43, 'Barangay X', 2),
(44, 'Barangay XI', 2),
(45, 'Barangay XII', 2),
(46, 'Bucal', 2),
(47, 'Buho', 2),
(48, 'Dagatan', 2),
(49, 'Halang', 2),
(50, 'Loma', 2),
(51, 'Maitim I', 2),
(52, 'Maymangga', 2),
(53, 'Minantok Kanluran', 2),
(54, 'Minantok Silangan', 2),
(55, 'Pangil', 2),
(56, 'Salaban', 2),
(57, 'Talon', 2),
(58, 'Tamacan', 2),
(59, 'Alima', 3),
(60, 'Aniban I', 3),
(61, 'Aniban II', 3),
(62, 'Aniban III', 3),
(63, 'Aniban IV', 3),
(64, 'Aniban V', 3),
(65, 'Banalo', 3),
(66, 'Bayanan', 3),
(67, 'Campo Santo', 3),
(68, 'Daang Bukid', 3),
(69, 'Digman', 3),
(70, 'Dulong Bayan', 3),
(71, 'Habay I', 3),
(72, 'Habay II', 3),
(73, 'Kaingin', 3),
(74, 'Ligas I', 3),
(75, 'Ligas II', 3),
(76, 'Ligas III', 3),
(77, 'Mabolo I', 3),
(78, 'Mabolo II', 3),
(79, 'Mabolo III', 3),
(80, 'Maliksi I', 3),
(81, 'Maliksi II', 3),
(82, 'Maliksi III', 3),
(83, 'Mambog I', 3),
(84, 'Mambog II', 3),
(85, 'Mambog III', 3),
(86, 'Mambog IV', 3),
(87, 'Mambog V', 3),
(88, 'Molino I', 3),
(89, 'Molino II', 3),
(90, 'Molino III', 3),
(91, 'Molino IV', 3),
(92, 'Molino V', 3),
(93, 'Molino VI', 3),
(94, 'Molino VII', 3),
(95, 'Niog I', 3),
(96, 'Niog II', 3),
(97, 'Niog III', 3),
(98, 'P. F. Espiritu I', 3),
(99, 'P. F. Espiritu II', 3),
(100, 'P. F. Espiritu III', 3),
(101, 'P. F. Espiritu IV', 3),
(102, 'P. F. Espiritu V', 3),
(103, 'P. F. Espiritu VI', 3),
(104, 'P. F. Espiritu VII', 3),
(105, 'P. F. Espiritu VIII', 3),
(106, 'Queens Row Central', 3),
(107, 'Queens Row East', 3),
(108, 'Queens Row West', 3),
(109, 'Real I', 3),
(110, 'Real II', 3),
(111, 'Salinas I', 3),
(112, 'Salinas II', 3),
(113, 'Salinas III', 3),
(114, 'Salinas IV', 3),
(115, 'San Nicolas I', 3),
(116, 'San Nicolas II', 3),
(117, 'San Nicolas III', 3),
(118, 'Sineguelasan', 3),
(119, 'Tabing Dagat', 3),
(120, 'Talaba I', 3),
(121, 'Talaba II', 3),
(122, 'Talaba III', 3),
(123, 'Talaba IV', 3),
(124, 'Talaba V', 3),
(125, 'Talaba VI', 3),
(126, 'Talaba VII', 3),
(127, 'Zapote I', 3),
(128, 'Zapote II', 3),
(129, 'Zapote III', 3),
(130, 'Zapote IV', 3),
(131, 'Zapote V', 3),
(132, 'Bancal', 4),
(133, 'Barangay 1', 4),
(134, 'Barangay 2,', 4),
(135, 'Barangay 3,', 4),
(136, 'Barangay 4', 4),
(137, 'Barangay 5', 4),
(138, 'Barangay 6', 4),
(139, 'Barangay 7', 4),
(140, 'Barangay 8', 4),
(141, 'Cabilang Baybay', 4),
(142, 'Lantic', 4),
(143, 'Mabuhay', 4),
(144, 'Maduya', 4),
(145, 'Milagrosa', 4),
(146, 'Barangay 1', 5),
(147, 'Barangay 10', 5),
(148, 'Barangay 10-A', 5),
(149, 'Barangay 10-B', 5),
(150, 'Barangay 11', 5),
(151, 'Barangay 12', 5),
(152, 'Barangay 13', 5),
(153, 'Barangay 14', 5),
(154, 'Barangay 15', 5),
(155, 'Barangay 16', 5),
(156, 'Barangay 17', 5),
(157, 'Barangay 18', 5),
(158, 'Barangay 19', 5),
(159, 'Barangay 2', 5),
(160, 'Barangay 20', 5),
(161, 'Barangay 21', 5),
(162, 'Barangay 22', 5),
(163, 'Barangay 22-A', 5),
(164, 'Barangay 23', 5),
(165, 'Barangay 24', 5),
(166, 'Barangay 25', 5),
(167, 'Barangay 26', 5),
(168, 'Barangay 27', 5),
(169, 'Barangay 28', 5),
(170, 'Barangay 29', 5),
(171, 'Barangay 29-A', 5),
(172, 'Barangay 3', 5),
(173, 'Barangay 30', 5),
(174, 'Barangay 31', 5),
(175, 'Barangay 32', 5),
(176, 'Barangay 33', 5),
(177, 'Barangay 34', 5),
(178, 'Barangay 35', 5),
(179, 'Barangay 36', 5),
(180, 'Barangay 36-A', 5),
(181, 'Barangay 37', 5),
(182, 'Barangay 37-A', 5),
(183, 'Barangay 38', 5),
(184, 'Barangay 38-A', 5),
(185, 'Barangay 39', 5),
(186, 'Barangay 4', 5),
(187, 'Barangay 40', 5),
(188, 'Barangay 41', 5),
(189, 'Barangay 42', 5),
(190, 'Barangay 42-A', 5),
(191, 'Barangay 42-B', 5),
(192, 'Barangay 42-C', 5),
(193, 'Barangay 43', 5),
(194, 'Barangay 44', 5),
(195, 'Barangay 45', 5),
(196, 'Barangay 45-A', 5),
(197, 'Barangay 46', 5),
(198, 'Barangay 47', 5),
(199, 'Barangay 47-A', 5),
(200, 'Barangay 47-B', 5),
(201, 'Barangay 48', 5),
(202, 'Barangay 48-A', 5),
(203, 'Barangay 49', 5),
(204, 'Barangay 49-A', 5),
(205, 'Barangay 5', 5),
(206, 'Barangay 50', 5),
(207, 'Barangay 52', 5),
(208, 'Barangay 52', 5),
(209, 'Barangay 53', 5),
(210, 'Barangay 53-A', 5),
(211, 'Barangay 53-B', 5),
(212, 'Barangay 54', 5),
(213, 'Barangay 54-A', 5),
(214, 'Barangay 55', 5),
(215, 'Barangay 56', 5),
(216, 'Barangay 57', 5),
(217, 'Barangay 58', 5),
(218, 'Barangay 58-A', 5),
(219, 'Barangay 59', 5),
(220, 'Barangay 6', 5),
(221, 'Barangay 60', 5),
(222, 'Barangay 61', 5),
(223, 'Barangay 61-A', 5),
(224, 'Barangay 62', 5),
(225, 'Barangay 62-A', 5),
(226, 'Barangay 62-B', 5),
(227, 'Barangay 7', 5),
(228, 'Barangay 8', 5),
(229, 'Barangay 9', 5),
(230, 'Burol', 6),
(231, 'Burol I', 6),
(232, 'Burol II', 6),
(233, 'Burol III', 6),
(234, 'Datu Esmael', 6),
(235, 'Emmanuel Bergado I', 6),
(236, 'Emmanuel Bergado II', 6),
(237, 'Fatima I', 6),
(238, 'Fatima II', 6),
(239, 'Fatima III', 6),
(240, 'H-2', 6),
(241, 'Langkaan I', 6),
(242, 'Langkaan II', 6),
(243, 'Luzviminda I', 6),
(244, 'Luzviminda II', 6),
(245, 'Paliparan I', 6),
(246, 'Paliparan II', 6),
(247, 'Paliparan III', 6),
(248, 'Sabang', 6),
(249, 'Saint Peter I', 6),
(250, 'Saint Peter II', 6),
(251, 'Salawag', 6),
(252, 'Salitran I', 6),
(253, 'Salitran II', 6),
(254, 'Salitran III', 6),
(255, 'Salitran IV', 6),
(256, 'Sampaloc I', 6),
(257, 'Sampaloc II', 6),
(258, 'Sampaloc III', 6),
(259, 'Sampaloc IV', 6),
(260, 'Sampaloc V', 6),
(261, 'San Agustin I', 6),
(262, 'San Agustin II', 6),
(263, 'San Agustin III', 6),
(264, 'San Andres I', 6),
(265, 'San Andres II', 6),
(266, 'San Antonio de Padua I', 6),
(267, 'San Antonio de Padua II', 6),
(268, 'San Dionisio', 6),
(269, 'San Esteban', 6),
(270, 'San Francisco I', 6),
(271, 'San Francisco II', 6),
(272, 'San Isidro Labrador I', 6),
(273, 'San Isidro Labrador II', 6),
(274, 'San Jose', 6),
(275, 'San Juan', 6),
(276, 'San Lorenzo Ruiz I', 6),
(277, 'San Lorenzo Ruiz II', 6),
(278, 'San Luis I', 6),
(279, 'San Luis II', 6),
(280, 'San Manuel I', 6),
(281, 'San Manuel II', 6),
(282, 'San Mateo', 6),
(283, 'San Miguel', 6),
(284, 'San Miguel II', 6),
(285, 'San Nicolas I', 6),
(286, 'San Nicolas II', 6),
(287, 'San Roque', 6),
(288, 'San Simon', 6),
(289, 'Santa Cristina I', 6),
(290, 'Santa Cristina II', 6),
(291, 'Santa Cruz I', 6),
(292, 'Santa Cruz II', 6),
(293, 'Santa Fe', 6),
(294, 'Santa Lucia', 6),
(295, 'Santa Maria', 6),
(296, 'Santo Cristo', 6),
(297, 'Santo Niño I', 6),
(298, 'Santo Niño II', 6),
(299, 'Victoria Reyes', 6),
(300, 'Zone I', 6),
(301, 'Zone I-B', 6),
(302, 'Zone II', 6),
(303, 'Zone III', 6),
(304, 'Zone IV', 6),
(305, 'A. Dalusag', 7),
(306, 'Batas Dao', 7),
(307, 'Castaños Cerca', 7),
(308, 'Castaños Lejos', 7),
(309, 'Kabulusan', 7),
(310, 'Kaymisas', 7),
(311, 'Kaypaaba', 7),
(312, 'Lumipa', 7),
(313, 'Narvaez', 7),
(314, 'Poblacion I', 7),
(315, 'Poblacion II', 7),
(316, 'Poblacion III', 7),
(317, 'Poblacion IV', 7),
(318, 'Tabora', 7),
(319, 'Aldiano Olaes', 8),
(320, 'Barangay 1 Poblacion', 8),
(321, 'Barangay 2 Poblacion', 8),
(322, 'Barangay 3 Poblacion', 8),
(323, 'Barangay 4 Poblacion', 8),
(324, 'Barangay 5 Poblacion', 8),
(325, 'Benjamin Tirona', 8),
(326, 'Bernardo Pulido', 8),
(327, 'Epifanio Malia', 8),
(328, 'Fiorello Calimag', 8),
(329, 'Francisco Reyes', 8),
(330, 'Francisco de Castro', 8),
(331, 'Gavino Maderan', 8),
(332, 'Gregoria de Jesus', 8),
(333, 'Inocencio Salud', 8),
(334, 'Jacinto Lumbreras', 8),
(335, 'Kapitan Kua', 8),
(336, 'Koronel Jose P. Elises', 8),
(337, 'Macario Dacon', 8),
(338, 'Marcelino Memije', 8),
(339, 'Nicolasa Virata', 8),
(340, 'Pantaleon Granados', 8),
(341, 'Ramon Cruz', 8),
(342, 'San Gabriel', 8),
(343, 'San Jose', 8),
(344, 'Severino de Las Alas', 8),
(345, 'Tiniente Tiago', 8),
(346, 'Alingaro', 9),
(347, 'Arnaldo Poblacion', 9),
(348, 'Bacao I', 9),
(349, 'Bacao II', 9),
(350, 'Bagumbayan Poblacion', 9),
(351, 'Biclatan', 9),
(352, 'Buenavista I', 9),
(353, 'Buenavista II', 9),
(354, 'Buenavista III', 9),
(355, 'Corregidor Poblacion', 9),
(356, 'Dulong Bayan Poblacion', 9),
(357, 'Gov. Ferrer Poblacion', 9),
(358, 'Javalera', 9),
(359, 'Manggahan', 9),
(360, 'Navarro', 9),
(361, 'Ninety Sixth Poblacion', 9),
(362, 'Panungyanan', 9),
(363, 'Pasong Camachile I', 9),
(364, 'Pasong Camachile II', 9),
(365, 'Pasong Kawayan I', 9),
(366, 'Pasong Kawayan II', 9),
(367, 'Pinagtipunan', 9),
(368, 'Prinza Poblacion', 9),
(369, 'Sampalucan Poblacion', 9),
(370, 'San Francisco', 9),
(371, 'San Gabriel Poblacion', 9),
(372, 'San Juan I', 9),
(373, 'San Juan II', 9),
(374, 'Santa Clara', 9),
(375, 'Santiago', 9),
(376, 'Tapia', 9),
(377, 'Tejero', 9),
(378, 'Vibora Poblacion', 9),
(379, 'Alapan I-A', 10),
(380, 'Alapan I-B', 10),
(381, 'Alapan I-C', 10),
(382, 'Alapan II-A', 10),
(383, 'Alapan II-B', 10),
(384, 'Anabu I-A', 10),
(385, 'Anabu I-B', 10),
(386, 'Anabu I-C', 10),
(387, 'Anabu I-D', 10),
(388, 'Anabu I-E', 10),
(389, 'Anabu I-F', 10),
(390, 'Anabu I-G', 10),
(391, 'Anabu II-A', 10),
(392, 'Anabu II-B', 10),
(393, 'Anabu II-C', 10),
(394, 'Anabu II-D', 10),
(395, 'Anabu II-E', 10),
(396, 'Anabu II-F', 10),
(397, 'Bagong 19', 10),
(398, 'Bayan Luma I', 10),
(399, 'Bayan Luma II', 10),
(400, 'Bayan Luma III', 10),
(401, 'Bayan Luma IV', 10),
(402, 'Bayan Luma IX', 10),
(403, 'Bayan Luma V', 10),
(404, 'Bayan Luma VI', 10),
(405, 'Bayan Luma VII', 10),
(406, 'Bayan Luma VIII', 10),
(407, 'Bucandala I', 10),
(408, 'Bucandala II', 10),
(409, 'Bucandala III', 10),
(410, 'Bucandala IV', 10),
(411, 'Bucandala V', 10),
(412, 'Buhay na Tubig', 10),
(413, 'Carsadang Bago I', 10),
(414, 'Carsadang Bago II', 10),
(415, 'Magdalo', 10),
(416, 'Maharlika', 10),
(417, 'Malagasang I-A', 10),
(418, 'Malagasang I-B', 10),
(419, 'Malagasang I-C', 10),
(420, 'Malagasang I-D', 10),
(421, 'Malagasang I-E', 10),
(422, 'Malagasang I-F', 10),
(423, 'Malagasang I-G', 10),
(424, 'Malagasang II-A', 10),
(425, 'Malagasang II-B', 10),
(426, 'Malagasang II-C', 10),
(427, 'Malagasang II-D', 10),
(428, 'Malagasang II-E', 10),
(429, 'Malagasang II-F', 10),
(430, 'Malagasang II-G', 10),
(431, 'Mariano Espeleta I', 10),
(432, 'Mariano Espeleta II', 10),
(433, 'Mariano Espeleta III', 10),
(434, 'Medicion I-A', 10),
(435, 'Medicion I-B', 10),
(436, 'Medicion I-C', 10),
(437, 'Medicion I-D', 10),
(438, 'Medicion II-A', 10),
(439, 'Medicion II-B', 10),
(440, 'Medicion II-C', 10),
(441, 'Medicion II-D', 10),
(442, 'Medicion II-E', 10),
(443, 'Medicion II-F', 10),
(444, 'Pag-asa I', 10),
(445, 'Pag-asa II', 10),
(446, 'Pag-asa III', 10),
(447, 'Palico I', 10),
(448, 'Palico II', 10),
(449, 'Palico III', 10),
(450, 'Palico IV', 10),
(451, 'Pasong Buaya I', 10),
(452, 'Pasong Buaya II', 10),
(453, 'Pinagbuklod', 10),
(454, 'Poblacion I-A', 10),
(455, 'Poblacion I-B', 10),
(456, 'Poblacion I-C', 10),
(457, 'Poblacion II-A', 10),
(458, 'Poblacion II-B', 10),
(459, 'Poblacion III-A', 10),
(460, 'Poblacion III-B', 10),
(461, 'Poblacion IV-A', 10),
(462, 'Poblacion IV-B', 10),
(463, 'Poblacion IV-C', 10),
(464, 'Poblacion IV-D', 10),
(465, 'Tanzang Luma I', 10),
(466, 'Tanzang Luma II', 10),
(467, 'Tanzang Luma III', 10),
(468, 'Tanzang Luma IV', 10),
(469, 'Tanzang Luma V', 10),
(470, 'Tanzang Luma VI', 10),
(471, 'Toclong I-A', 10),
(472, 'Toclong I-B', 10),
(473, 'Toclong I-C', 10),
(474, 'Toclong II-A', 10),
(475, 'Toclong II-B', 10),
(476, 'Agus-us', 11),
(477, 'Alulod', 11),
(478, 'Banaba Cerca', 11),
(479, 'Banaba Lejos', 11),
(480, 'Bancod', 11),
(481, 'Barangay 1', 11),
(482, 'Barangay 2', 11),
(483, 'Barangay 3', 11),
(484, 'Barangay 4', 11),
(485, 'Buna Cerca', 11),
(486, 'Buna Lejos I', 11),
(487, 'Buna Lejos II', 11),
(488, 'Calumpang Cerca', 11),
(489, 'Calumpang Lejos I', 11),
(490, 'Carasuchi', 11),
(491, 'Daine I', 11),
(492, 'Daine II', 11),
(493, 'Guyam Malaki', 11),
(494, 'Guyam Munti', 11),
(495, 'Harasan', 11),
(496, 'Kayquit I', 11),
(497, 'Kayquit II', 11),
(498, 'Kayquit III', 11),
(499, 'Kaytambog', 11),
(500, 'Kaytapos', 11),
(501, 'Limbon', 11),
(502, 'Lumampong Balagbag', 11),
(503, 'Lumampong Halayhay', 11),
(504, 'Mahabangkahoy Cerca', 11),
(505, 'Mahabangkahoy Lejos', 11),
(506, 'Mataas na Lupa', 11),
(507, 'Pulo', 11),
(508, 'Tambo Balagbag', 11),
(509, 'Tambo Ilaya', 11),
(510, 'Tambo Kulit', 11),
(511, 'Tambo Malaki', 11),
(512, 'Balsahan-Bisita', 12),
(513, 'Batong Dalig', 12),
(514, 'Binakayan-Aplaya', 12),
(515, 'Binakayan-Kanluran', 12),
(516, 'Congbalay-Legaspi', 12),
(517, 'Gahak', 12),
(518, 'Kaingen', 12),
(519, 'Magdalo', 12),
(520, 'Manggahan-Lawin', 12),
(521, 'Marulas', 12),
(522, 'Panamitan', 12),
(523, 'Poblacion', 12),
(524, 'Pulvorista', 12),
(525, 'Samala-Marquez', 12),
(526, 'San Sebastian', 12),
(527, 'Santa Isabel', 12),
(528, 'Tabon I', 12),
(529, 'Tabon II', 12),
(530, 'Tabon III', 12),
(531, 'Toclong', 12),
(532, 'Tramo-Bantayan', 12),
(533, 'Wakas I', 12),
(534, 'Wakas II', 12),
(535, 'Baliwag', 13),
(536, 'Barangay 1', 13),
(537, 'Barangay 2', 13),
(538, 'Barangay 3', 13),
(539, 'Barangay 4', 13),
(540, 'Barangay 5', 13),
(541, 'Bendita I', 13),
(542, 'Bendita II', 13),
(543, 'Caluangan', 13),
(544, 'Kabulusan', 13),
(545, 'Medina', 13),
(546, 'Pacheco', 13),
(547, 'Ramirez', 13),
(548, 'San Agustin', 13),
(549, 'Tua', 13),
(550, 'Urdaneta', 13),
(551, 'Bucal I', 14),
(552, 'Bucal II', 14),
(553, 'Bucal III A', 14),
(554, 'Bucal III B', 14),
(555, 'Bucal IV A', 14),
(556, 'Bucal IV B', 14),
(557, 'Caingin Poblacion', 14),
(558, 'Garita I A', 14),
(559, 'Garita I B', 14),
(560, 'Layong Mabilog', 14),
(561, 'Mabato', 14),
(562, 'Pantihan I', 14),
(563, 'Pantihan II', 14),
(564, 'Pantihan III', 14),
(565, 'Pantihan IV', 14),
(566, 'Patungan', 14),
(567, 'Pinagsanhan I A', 14),
(568, 'Pinagsanhan I B', 14),
(569, 'Poblacion I A', 14),
(570, 'Poblacion I B', 14),
(571, 'Poblacion II A', 14),
(572, 'Poblacion II B', 14),
(573, 'San Miguel I A', 14),
(574, 'San Miguel I B', 14),
(575, 'Talipusngo', 14),
(576, 'Tulay Kanluran', 14),
(577, 'Tulay Silangan', 14),
(578, 'Anuling Cerca I', 15),
(579, 'Anuling Cerca II', 15),
(580, 'Anuling Lejos I', 15),
(581, 'Anuling Lejos II', 15),
(582, 'Asis I', 15),
(583, 'Asis II', 15),
(584, 'Asis III', 15),
(585, 'Banayad', 15),
(586, 'Bukal', 15),
(587, 'Galicia I', 15),
(588, 'Galicia II', 15),
(589, 'Galicia III', 15),
(590, 'Miguel Mojica', 15),
(591, 'Palocpoc I', 15),
(592, 'Palocpoc II', 15),
(593, 'Panungyan I', 15),
(594, 'Panungyan II', 15),
(595, 'Poblacion I', 15),
(596, 'Poblacion II', 15),
(597, 'Poblacion III', 15),
(598, 'Poblacion IV', 15),
(599, 'Poblacion V', 15),
(600, 'Poblacion VI', 15),
(601, 'Poblacion VII', 15),
(602, 'Bagong Karsada', 16),
(603, 'Balsahan', 16),
(604, 'Bancaan', 16),
(605, 'Bucana Malaki', 16),
(606, 'Bucana Sasahan', 16),
(607, 'Calubcob', 16),
(608, 'Capt. C. Nazareno', 16),
(609, 'Gomez-Zamora', 16),
(610, 'Halang', 16),
(611, 'Humbac', 16),
(612, 'Ibayo Estacion', 16),
(613, 'Ibayo Silangan', 16),
(614, 'Kanluran', 16),
(615, 'Labac', 16),
(616, 'Latoria', 16),
(617, 'Mabolo', 16),
(618, 'Makina', 16),
(619, 'Malainen Bago', 16),
(620, 'Malainen Luma', 16),
(621, 'Molino', 16),
(622, 'Munting Mapino', 16),
(623, 'Muzon', 16),
(624, 'Palangue 1', 16),
(625, 'Palangue 2 & 3', 16),
(626, 'Sabang', 16),
(627, 'San Roque', 16),
(628, 'Santulan', 16),
(629, 'Sapa', 16),
(630, 'Timalan Balsahan', 16),
(631, 'Timalan Concepcion', 16),
(632, 'Magdiwang', 17),
(633, 'Poblacion', 17),
(634, 'Salcedo I', 17),
(635, 'Salcedo II', 17),
(636, 'San Antonio I', 17),
(637, 'San Antonio II', 17),
(638, 'San Jose I', 17),
(639, 'San Jose II', 17),
(640, 'San Juan I', 17),
(641, 'San Juan II', 17),
(642, 'San Rafael I', 17),
(643, 'San Rafael II', 17),
(644, 'San Rafael III', 17),
(645, 'San Rafael IV', 17),
(646, 'Santa Rosa I', 17),
(647, 'Santa Rosa II', 17),
(648, 'Bagbag I', 18),
(649, 'Bagbag II', 18),
(650, 'Kanluran', 18),
(651, 'Ligtong I', 18),
(652, 'Ligtong II', 18),
(653, 'Ligtong III', 18),
(654, 'Ligtong IV', 18),
(655, 'Muzon I', 18),
(656, 'Muzon II', 18),
(657, 'Poblacion', 18),
(658, 'Sapa I', 18),
(659, 'Sapa II', 18),
(660, 'Sapa III', 18),
(661, 'Sapa IV', 18),
(662, 'Silangan I', 18),
(663, 'Silangan II', 18),
(664, 'Tejeros Convention', 18),
(665, 'Wawa 1', 18),
(666, 'Wawa 2', 18),
(667, 'Wawa 3', 18),
(668, 'Acacia', 19),
(669, 'Adlas', 19),
(670, 'Anahaw I', 19),
(671, 'Anahaw II', 19),
(672, 'Balite I', 19),
(673, 'Balite II', 19),
(674, 'Balubad', 19),
(675, 'Banaba', 19),
(676, 'Barangay I', 19),
(677, 'Barangay II', 19),
(678, 'Barangay III', 19),
(679, 'Barangay IV', 19),
(680, 'Barangay V', 19),
(681, 'Batas', 19),
(682, 'Biga I', 19),
(683, 'Biga II', 19),
(684, 'Biluso', 19),
(685, 'Bucal', 19),
(686, 'Buho', 19),
(687, 'Bulihan', 19),
(688, 'Cabangaan', 19),
(689, 'Carmen', 19),
(690, 'Hoyo', 19),
(691, 'Hukay', 19),
(692, 'Iba', 19),
(693, 'Inchican', 19),
(694, 'Ipil I', 19),
(695, 'Ipil II', 19),
(696, 'Kalubkob', 19),
(697, 'Kaong', 19),
(698, 'Lalaan I', 19),
(699, 'Lalaan II', 19),
(700, 'Litlit', 19),
(701, 'Lucsuhin', 19),
(702, 'Lumil', 19),
(703, 'Maguyam', 19),
(704, 'Malabag', 19),
(705, 'Malaking Tatyao', 19),
(706, 'Mataas na Burol', 19),
(707, 'Munting Ilog', 19),
(708, 'Narra I', 19),
(709, 'Narra II', 19),
(710, 'Narra III', 19),
(711, 'Paligawan', 19),
(712, 'Pasong Langka', 19),
(713, 'Pooc I', 19),
(714, 'Pooc II', 19),
(715, 'Pulong Bunga', 19),
(716, 'Pulong Saging', 19),
(717, 'Puting Kahoy', 19),
(718, 'Sabutan', 19),
(719, 'San Miguel I', 19),
(720, 'San Miguel II', 19),
(721, 'San Vicente I', 19),
(722, 'San Vicente II', 19),
(723, 'Santol', 19),
(724, 'Tartaria', 19),
(725, 'Tibig', 19),
(726, 'Toledo', 19),
(727, 'Tubuan I', 19),
(728, 'Tubuan II', 19),
(729, 'Tubuan III', 19),
(730, 'Ulat', 19),
(731, 'Yakal', 19),
(732, 'Asisan', 20),
(733, 'Bagong Tubig', 20),
(734, 'Calabuso', 20),
(735, 'Dapdap East', 20),
(736, 'Dapdap West', 20),
(737, 'Francisco', 20),
(738, 'Guinhawa North', 20),
(739, 'Guinhawa South', 20),
(740, 'Iruhin East', 20),
(741, 'Iruhin South', 20),
(742, 'Iruhin West', 20),
(743, 'Kaybagal East', 20),
(744, 'Kaybagal North', 20),
(745, 'Kaybagal South', 20),
(746, 'Mag-Asawang Ilat', 20),
(747, 'Maharlika East', 20),
(748, 'Maharlika West', 20),
(749, 'Maitim 2nd Central', 20),
(750, 'Maitim 2nd East', 20),
(751, 'Maitim 2nd West', 20),
(752, 'Mendez Crossing East', 20),
(753, 'Mendez Crossing West', 20),
(754, 'Neogan', 20),
(755, 'Patutong Malaki North', 20),
(756, 'Patutong Malaki South', 20),
(757, 'Sambong', 20),
(758, 'San Jose', 20),
(759, 'Silang Junction North', 20),
(760, 'Silang Junction South', 20),
(761, 'Sungay North', 20),
(762, 'Sungay South', 20),
(763, 'Tolentino East', 20),
(764, 'Tolentino West', 20),
(765, 'Zambal', 20),
(766, 'Amaya I', 21),
(767, 'Amaya II', 21),
(768, 'Amaya III', 21),
(769, 'Amaya IV', 21),
(770, 'Amaya V', 21),
(771, 'Amaya VI', 21),
(772, 'Amaya VII', 21),
(773, 'Bagtas', 21),
(774, 'Barangay I', 21),
(775, 'Barangay II', 21),
(776, 'Barangay III', 21),
(777, 'Barangay IV', 21),
(778, 'Biga', 21),
(779, 'Biwas', 21),
(780, 'Bucal', 21),
(781, 'Bunga', 21),
(782, 'Calibuyo', 21),
(783, 'Capipisa', 21),
(784, 'Daang Amaya I', 21),
(785, 'Daang Amaya II', 21),
(786, 'Daang Amaya III', 21),
(787, 'Halayhay', 21),
(788, 'Julugan I', 21),
(789, 'Julugan II', 21),
(790, 'Julugan III', 21),
(791, 'Julugan IV', 21),
(792, 'Julugan V', 21),
(793, 'Julugan VI', 21),
(794, 'Julugan VII', 21),
(795, 'Julugan VIII', 21),
(796, 'Lambingan', 21),
(797, 'Mulawin', 21),
(798, 'Paradahan I', 21),
(799, 'Paradahan II', 21),
(800, 'Punta I', 21),
(801, 'Punta II', 21),
(802, 'Sahud Ulan', 21),
(803, 'Sanja Mayor', 21),
(804, 'Santol', 21),
(805, 'Tanauan', 21),
(806, 'Tres Cruses', 21),
(807, 'Bucana', 22),
(808, 'Poblacion I', 22),
(809, 'Poblacion I A', 22),
(810, 'Poblacion II', 22),
(811, 'Poblacion III', 22),
(812, 'San Jose', 22),
(813, 'San Juan I', 22),
(814, 'San Juan II', 22),
(815, 'Sapang I', 22),
(816, 'Sapang II', 22),
(817, 'Aguado', 23),
(818, 'Cabezas', 23),
(819, 'Cabuco', 23),
(820, 'Conchu', 23),
(821, 'De Ocampo', 23),
(822, 'Gregorio', 23),
(823, 'Inocencio', 23),
(824, 'Lallana', 23),
(825, 'Lapidario', 23),
(826, 'Luciano', 23),
(827, 'Osorio', 23),
(828, 'Perez', 23),
(829, 'San Agustin', 23);

-- --------------------------------------------------------

--
-- Table structure for table `chikvinfotbl`
--

CREATE TABLE `chikvinfotbl` (
  `chikvld` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dayswithSymp` varchar(20) DEFAULT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `arthritis` varchar(20) DEFAULT NULL,
  `hands` varchar(20) DEFAULT NULL,
  `feet` varchar(20) DEFAULT NULL,
  `ankles` varchar(20) DEFAULT NULL,
  `otherSite` varchar(20) DEFAULT NULL,
  `arthralgia` varchar(20) DEFAULT NULL,
  `periEdema` varchar(20) DEFAULT NULL,
  `skinMani` varchar(20) DEFAULT NULL,
  `skinDesc` varchar(20) DEFAULT NULL,
  `myalgia` varchar(20) DEFAULT NULL,
  `backPain` varchar(20) DEFAULT NULL,
  `headache` varchar(20) DEFAULT NULL,
  `nausea` varchar(20) DEFAULT NULL,
  `mucosBleed` varchar(20) DEFAULT NULL,
  `vomiting` varchar(20) DEFAULT NULL,
  `asthenia` varchar(20) DEFAULT NULL,
  `meningoEncep` varchar(20) DEFAULT NULL,
  `otherSymptom` varchar(20) DEFAULT NULL,
  `clinDx` varchar(20) DEFAULT NULL,
  `dCollected` varchar(20) DEFAULT NULL,
  `dspecSent` varchar(20) DEFAULT NULL,
  `serIgm` varchar(20) DEFAULT NULL,
  `igm_Res` varchar(20) DEFAULT NULL,
  `digMres` varchar(20) DEFAULT NULL,
  `serIgG` varchar(20) DEFAULT NULL,
  `igG_Res` varchar(20) DEFAULT NULL,
  `dIgGRes` varchar(20) DEFAULT NULL,
  `rt_PCR` varchar(20) DEFAULT NULL,
  `rt_PCRRes` varchar(20) DEFAULT NULL,
  `drtPCRRes` varchar(20) DEFAULT NULL,
  `virIso` varchar(20) DEFAULT NULL,
  `virIsoRes` varchar(20) DEFAULT NULL,
  `travHist` varchar(20) DEFAULT NULL,
  `placeOfTravel` varchar(20) DEFAULT NULL,
  `dVirIsoRes` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chikvinfotbl`
--

INSERT INTO `chikvinfotbl` (`chikvld`, `patientId`, `dayswithSymp`, `fever`, `arthritis`, `hands`, `feet`, `ankles`, `otherSite`, `arthralgia`, `periEdema`, `skinMani`, `skinDesc`, `myalgia`, `backPain`, `headache`, `nausea`, `mucosBleed`, `vomiting`, `asthenia`, `meningoEncep`, `otherSymptom`, `clinDx`, `dCollected`, `dspecSent`, `serIgm`, `igm_Res`, `digMres`, `serIgG`, `igG_Res`, `dIgGRes`, `rt_PCR`, `rt_PCRRes`, `drtPCRRes`, `virIso`, `virIsoRes`, `travHist`, `placeOfTravel`, `dVirIsoRes`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 381, '3', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'No', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 383, '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'no', '', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 384, 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'no', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 385, 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'no', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 446, 'asdf', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'No', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 1, 1),
(6, 468, 'N/A', 'No', 'Unknown', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'N/A', 'No', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cholerainfotbl`
--

CREATE TABLE `cholerainfotbl` (
  `cholerald` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `stoolCulture` varchar(20) DEFAULT NULL,
  `organism` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cholerainfotbl`
--

INSERT INTO `cholerainfotbl` (`cholerald`, `patientId`, `stoolCulture`, `organism`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 386, 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 387, 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '2023-06-01', 0, 0),
(3, 402, 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 469, 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 474, 'not done', 'na', 'suspected', 'dead', '2023-07-01 00:42:00', '2023-07-01', 1, 11),
(6, 475, 'N/A', 'N/A', 'N/A', 'Dead', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(7, 476, 'N/A', 'N/A', 'N/A', 'dead', '2023-07-01 00:50:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `createdby_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `barangay` int(50) NOT NULL,
  `municipality` int(50) NOT NULL,
  `positionId` int(11) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `createdby_id`, `name`, `email`, `password`, `contact_number`, `address`, `barangay`, `municipality`, `positionId`, `otp`, `created_at`) VALUES
(36, 36, 'Caloyskieee', 'caloy@gmail.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09124844756', 'caloy alfonso bilog mabisa 1096', 477, 11, 1, '', '2023-04-18 00:18:45'),
(120, 36, 'ravens', 'rukaxkazuya@gmail.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09124844375', 'bagbag', 648, 18, 2, '', '2023-05-22 12:09:55'),
(131, 36, 'user1', 'user1@gmail.com', 'dbec23f1c6e2b45157bf686732e57c4e', '09121212123', 'asdf', 346, 9, 2, '', '2023-06-19 21:27:15'),
(135, 36, 'apol depad1', 'depad1@email.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09122312123', 'kawit', 528, 12, 2, '', '2023-11-07 05:14:50'),
(136, 36, 'abad depad', 'depad2@email.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09122312231', 'kawit', 512, 12, 2, '', '2023-11-07 05:22:31'),
(137, 135, 'nurse1', 'nurse1@email.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09124578124', 'kawit', 632, 17, 3, '', '2023-11-07 05:29:44'),
(138, 135, 'nurse2', 'nurse2@email.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09235689456', 'asdf', 665, 18, 3, '', '2023-11-07 06:18:05'),
(139, 136, 'nurse joy', 'nurse1@gmail.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09235689789', 'wawa', 667, 18, 3, '', '2023-11-07 06:25:19'),
(140, 136, 'nurse marites', 'nurse2@gmail.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09234578123', 'wawa', 666, 18, 3, '', '2023-11-07 06:27:29'),
(141, 36, 'ben', 'depad3@gmail.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09457845456', 'wawa', 648, 18, 2, '', '2023-11-24 05:21:40'),
(142, 36, 'genie', 'genie@email.com', 'f35dfb0188858f6292ed0ab40bd8597b', '09457845456', 'wawa', 648, 18, 3, '', '2023-11-24 05:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `daysId` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `monthId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`daysId`, `day`, `monthId`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0),
(12, 12, 0),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 0),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_fields`
--

CREATE TABLE `deleted_fields` (
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  `patientId` int(11) DEFAULT NULL,
  `date_deleted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_fields`
--

INSERT INTO `deleted_fields` (`id`, `adminId`, `clientId`, `patientId`, `date_deleted`) VALUES
(1, 0, 0, 0, '2023-05-01 16:18:02'),
(2, 0, 0, 0, '2023-05-01 16:18:27'),
(3, 0, 0, 0, '2023-05-01 16:19:45'),
(4, 0, 0, 0, '2023-05-01 16:19:52'),
(5, 0, 0, 0, '2023-05-01 16:19:56'),
(6, 0, 0, 0, '2023-05-01 16:19:58'),
(7, 0, 0, 0, '2023-05-01 16:20:00'),
(8, 0, 0, 0, '2023-05-01 16:21:12'),
(9, 0, 0, 0, '2023-05-01 16:24:01'),
(10, 0, 0, 0, '2023-05-01 16:25:54'),
(11, 0, 0, 0, '2023-05-01 16:26:28'),
(12, 0, 0, 0, '2023-05-01 16:26:45'),
(13, 0, 0, 0, '2023-05-01 16:27:28'),
(14, 0, 0, 0, '2023-05-01 16:29:10'),
(15, 0, 0, 0, '2023-05-01 16:31:59'),
(16, 0, 0, 0, '2023-05-01 16:34:54'),
(17, 0, 24, 0, '2023-05-01 16:37:21'),
(18, 0, 25, 0, '2023-05-01 16:37:34'),
(19, 0, 26, 0, '2023-05-01 16:37:42'),
(20, 0, 91, 0, '2023-05-01 16:39:04'),
(21, 0, 0, 0, '2023-05-01 16:39:05'),
(22, 0, 0, 0, '2023-05-01 16:39:06'),
(23, 0, 0, 0, '2023-05-01 16:39:07'),
(24, 0, 88, 0, '2023-05-01 16:39:43'),
(25, 0, 78, 0, '2023-05-01 16:39:54'),
(26, 0, 0, 164, '2023-05-09 07:45:19'),
(27, 0, 94, 0, '2023-05-09 07:54:26'),
(28, 0, 92, NULL, '2023-05-09 07:59:44'),
(29, 0, NULL, 28, '2023-05-09 08:00:59'),
(30, 0, 102, NULL, '2023-05-10 08:03:02'),
(31, 0, 101, NULL, '2023-05-10 08:03:04'),
(32, 0, 100, NULL, '2023-05-10 08:03:08'),
(33, 0, 96, NULL, '2023-05-10 08:03:10'),
(34, 0, NULL, 30, '2023-05-11 03:44:43'),
(35, 0, NULL, 186, '2023-05-11 03:49:12'),
(36, 0, NULL, 188, '2023-05-11 04:57:16'),
(37, 0, NULL, 189, '2023-05-11 04:57:17'),
(38, 0, NULL, 193, '2023-05-11 06:45:35'),
(39, 0, NULL, 191, '2023-05-11 10:21:08'),
(40, 0, NULL, 195, '2023-05-11 10:21:11'),
(41, 0, NULL, 194, '2023-05-11 10:34:00'),
(42, 0, NULL, 197, '2023-05-11 10:58:08'),
(43, 0, NULL, 199, '2023-05-11 11:13:10'),
(44, 0, NULL, 200, '2023-05-11 11:15:02'),
(45, 0, NULL, 201, '2023-05-11 11:16:12'),
(46, 0, NULL, 203, '2023-05-11 13:08:10'),
(47, 0, NULL, 202, '2023-05-11 13:08:11'),
(48, 0, NULL, 209, '2023-05-11 15:12:42'),
(49, 0, NULL, 213, '2023-05-12 04:50:45'),
(50, 0, NULL, 206, '2023-05-15 05:25:48'),
(51, 0, NULL, 224, '2023-05-15 05:33:27'),
(52, 0, NULL, 225, '2023-05-15 10:57:12'),
(53, 0, NULL, 228, '2023-05-15 12:13:46'),
(54, 0, NULL, 230, '2023-05-15 12:18:09'),
(55, 0, NULL, 229, '2023-05-15 12:26:08'),
(56, 0, NULL, 205, '2023-05-15 12:26:14'),
(57, 0, NULL, 232, '2023-05-15 12:27:50'),
(58, 0, NULL, 211, '2023-05-15 12:55:33'),
(59, 0, NULL, 234, '2023-05-15 12:55:38'),
(60, 0, NULL, 233, '2023-05-15 12:55:44'),
(61, 0, NULL, 212, '2023-05-16 04:03:47'),
(62, 0, NULL, 240, '2023-05-16 04:03:59'),
(63, 0, NULL, 239, '2023-05-16 04:09:28'),
(64, 0, NULL, 222, '2023-05-17 02:33:25'),
(65, 0, NULL, 198, '2023-05-17 02:40:41'),
(66, 0, NULL, 247, '2023-05-17 02:57:38'),
(67, 0, 106, NULL, '2023-05-17 04:42:16'),
(68, 0, NULL, 187, '2023-05-17 04:44:40'),
(69, 0, 123, NULL, '2023-05-22 05:40:24'),
(70, 0, NULL, 259, '2023-05-22 05:42:51'),
(71, 0, NULL, 190, '2023-05-22 05:44:19'),
(72, 0, NULL, 275, '2023-05-23 04:19:35'),
(73, 0, NULL, 0, '2023-05-23 04:30:27'),
(74, 0, NULL, 279, '2023-05-23 04:40:34'),
(75, 0, NULL, 280, '2023-05-23 04:57:28'),
(76, 0, NULL, 278, '2023-05-23 05:02:32'),
(77, 0, NULL, 279, '2023-05-23 06:29:56'),
(78, 0, NULL, 277, '2023-05-23 07:06:13'),
(79, 0, NULL, 280, '2023-05-23 07:06:15'),
(80, 0, NULL, 281, '2023-05-23 07:06:17'),
(81, 0, NULL, 282, '2023-05-23 07:06:18'),
(82, 0, NULL, 283, '2023-05-23 07:06:20'),
(83, 0, NULL, 284, '2023-05-23 07:06:23'),
(84, 0, NULL, 286, '2023-05-23 07:09:38'),
(85, 0, NULL, 289, '2023-05-23 07:23:43'),
(86, 0, NULL, 288, '2023-05-23 07:23:45'),
(87, 0, NULL, 287, '2023-05-23 07:23:46'),
(88, 0, NULL, 421, '2023-06-07 10:20:45'),
(89, 0, 130, NULL, '2023-06-11 14:37:58'),
(90, 0, NULL, 285, '2023-07-01 07:48:11'),
(91, 0, NULL, 290, '2023-07-10 15:40:12'),
(92, 0, NULL, 291, '2023-07-10 15:40:16'),
(93, 0, NULL, 292, '2023-07-10 15:40:20'),
(94, 0, NULL, 293, '2023-07-10 15:40:24'),
(95, 0, NULL, 294, '2023-07-10 15:40:28'),
(96, 0, NULL, 295, '2023-07-10 15:40:32'),
(97, 0, NULL, 296, '2023-07-10 15:40:36'),
(98, 0, NULL, 297, '2023-07-10 15:40:44'),
(99, 0, NULL, 298, '2023-07-10 15:40:48'),
(100, 0, NULL, 299, '2023-07-10 15:40:50'),
(101, 0, NULL, 300, '2023-07-10 15:40:54'),
(102, 0, NULL, 301, '2023-07-10 15:40:58'),
(103, 0, NULL, 302, '2023-07-10 15:41:01'),
(104, 0, NULL, 303, '2023-07-10 15:41:05'),
(105, 0, NULL, 304, '2023-07-10 15:41:09'),
(106, 0, NULL, 305, '2023-07-10 15:41:17'),
(107, 0, NULL, 306, '2023-07-10 15:41:21'),
(108, 0, NULL, 307, '2023-07-10 15:41:24'),
(109, 0, NULL, 308, '2023-07-10 15:43:30'),
(110, 0, NULL, 309, '2023-07-10 15:43:33'),
(111, 0, NULL, 310, '2023-07-10 15:43:37'),
(112, 0, NULL, 311, '2023-07-10 15:43:40'),
(113, 0, NULL, 312, '2023-07-10 15:43:43'),
(114, 0, NULL, 313, '2023-07-10 15:43:47'),
(115, 0, NULL, 314, '2023-07-10 15:43:52'),
(116, 0, NULL, 315, '2023-07-10 15:43:55'),
(117, 0, NULL, 316, '2023-07-10 15:43:59'),
(118, 0, NULL, 317, '2023-07-10 15:44:02'),
(119, 0, NULL, 318, '2023-07-10 15:44:06'),
(120, 0, NULL, 319, '2023-07-10 15:44:09'),
(121, 0, NULL, 320, '2023-07-10 15:44:13'),
(122, 0, NULL, 321, '2023-07-10 15:44:16'),
(123, 0, NULL, 322, '2023-07-10 15:44:19'),
(124, 0, NULL, 323, '2023-07-10 15:44:22'),
(125, 0, NULL, 324, '2023-07-10 15:44:26'),
(126, 0, NULL, 325, '2023-07-10 15:44:29'),
(127, 0, NULL, 326, '2023-07-10 15:45:01'),
(128, 0, NULL, 327, '2023-07-10 15:45:05'),
(129, 0, NULL, 328, '2023-07-10 15:45:10'),
(130, 0, NULL, 329, '2023-07-10 15:45:13'),
(131, 0, NULL, 330, '2023-07-10 15:45:54'),
(132, 0, NULL, 331, '2023-07-10 15:45:57'),
(133, 0, NULL, 332, '2023-07-10 15:46:00'),
(134, 0, NULL, 333, '2023-07-10 15:46:03'),
(135, 0, NULL, 334, '2023-07-10 15:46:07'),
(136, 0, NULL, 335, '2023-07-10 15:46:10'),
(137, 0, NULL, 336, '2023-07-10 15:46:13'),
(138, 0, NULL, 337, '2023-07-10 15:46:16'),
(139, 0, NULL, 338, '2023-07-10 15:46:19'),
(140, 0, NULL, 397, '2023-07-11 07:58:40'),
(141, 0, NULL, 347, '2023-07-18 08:00:33'),
(142, 0, NULL, 348, '2023-07-18 08:00:41'),
(143, 0, NULL, 456, '2023-07-23 06:46:54'),
(144, 0, NULL, 662, '2023-08-31 16:27:03'),
(145, 0, 134, NULL, '2023-11-24 11:07:15'),
(146, 0, 121, NULL, '2023-11-24 11:07:39'),
(147, 0, 133, NULL, '2023-11-24 11:08:11'),
(148, 0, 122, NULL, '2023-11-24 11:20:42'),
(149, 0, 143, NULL, '2023-11-30 05:00:07'),
(150, 0, 147, NULL, '2023-11-30 05:35:54'),
(151, 0, 146, NULL, '2023-11-30 05:35:57'),
(152, 0, 145, NULL, '2023-11-30 05:36:01'),
(153, 0, 144, NULL, '2023-11-30 05:36:04'),
(154, 0, 132, NULL, '2023-11-30 05:37:42'),
(155, 0, 124, NULL, '2023-11-30 05:37:49'),
(156, 0, 148, NULL, '2023-11-30 06:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `dengueinfotbl`
--

CREATE TABLE `dengueinfotbl` (
  `dengueld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `labTest` varchar(20) DEFAULT NULL,
  `labRes` varchar(20) DEFAULT NULL,
  `clinClass` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dengueinfotbl`
--

INSERT INTO `dengueinfotbl` (`dengueld`, `patientId`, `type`, `labTest`, `labRes`, `clinClass`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 388, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-05-31', 0, 0),
(2, 389, 'df', 'negative', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 390, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 403, 'N/A', 'N/A', 'asdf', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 443, 'N/A', 'N/A', 'asdf', 'asdf', 'asdf', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(6, 470, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Dead', '0000-00-00 00:00:00', '2023-06-27', 0, 0),
(7, 471, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'dead', '2023-07-05 00:33:00', '0000-00-00', 0, 0),
(8, 537, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(9, 596, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 597, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 598, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 599, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 601, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 602, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 603, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 604, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 605, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 606, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 607, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 608, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 609, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 610, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 611, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 612, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 613, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 614, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 615, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 616, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 617, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 618, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 619, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 620, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 621, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 622, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 624, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 626, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 627, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 628, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 629, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 630, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 631, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 632, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 633, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 634, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 635, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 636, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 637, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 638, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 639, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 640, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 641, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 642, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 643, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 644, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 646, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 647, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 648, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 649, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 650, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 651, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 652, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 653, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 655, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 656, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 657, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 671, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 672, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 673, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 674, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 675, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 676, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 677, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 678, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 679, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 680, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 681, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 682, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 683, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diphinfotbl`
--

CREATE TABLE `diphinfotbl` (
  `diphld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `dptDoses` varchar(20) DEFAULT NULL,
  `dateLastDose` date DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diphinfotbl`
--

INSERT INTO `diphinfotbl` (`diphld`, `patientId`, `dptDoses`, `dateLastDose`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(2, 391, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 392, 'N/A', '0000-00-00', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 404, 'N/A', '0000-00-00', 'asdf', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 472, 'N/A', '0000-00-00', 'N/A', 'Dead', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(6, 484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 485, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 491, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `diseaseId` int(11) NOT NULL,
  `disease` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`diseaseId`, `disease`) VALUES
(1, 'ABD'),
(2, 'AEFI'),
(3, 'AES'),
(4, 'AFP'),
(5, 'AMES'),
(6, 'ChikV'),
(7, 'DIPH'),
(8, 'HFMD'),
(9, 'NNT'),
(10, 'NT'),
(11, 'PERT'),
(12, 'Influenza'),
(13, 'Dengue'),
(14, 'Rabies'),
(15, 'Cholera'),
(16, 'Hepatitis'),
(17, 'Measles'),
(18, 'Meningitis'),
(19, 'Meningo'),
(20, 'Typhoid'),
(21, 'Leptospirosis'),
(24, 'Leptos'),
(25, 'newer disease'),
(26, 'Try disease');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `genderId` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`genderId`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `hepatitisinfotbl`
--

CREATE TABLE `hepatitisinfotbl` (
  `hepatitisld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `typeofHepatitis` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hepatitisinfotbl`
--

INSERT INTO `hepatitisinfotbl` (`hepatitisld`, `patientId`, `type`, `labResult`, `typeofHepatitis`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 405, 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 405, 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 406, 'N/A', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 407, 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-06-01', 0, 0),
(5, 473, 'N/A', 'N/A', 'N/A', 'N/A', 'Dead', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hfmdinfotbl`
--

CREATE TABLE `hfmdinfotbl` (
  `hfmdld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `rashChar` varchar(20) DEFAULT NULL,
  `rashSores` varchar(20) DEFAULT NULL,
  `palms` varchar(20) DEFAULT NULL,
  `fingers` varchar(20) DEFAULT NULL,
  `footSoles` varchar(20) DEFAULT NULL,
  `buttocks` varchar(20) DEFAULT NULL,
  `mouthUlcers` varchar(20) DEFAULT NULL,
  `pain` varchar(20) DEFAULT NULL,
  `anorexia` varchar(20) DEFAULT NULL,
  `bm` varchar(20) DEFAULT NULL,
  `soreThroat` varchar(20) DEFAULT NULL,
  `nausVom` varchar(20) DEFAULT NULL,
  `diffBreath` varchar(20) DEFAULT NULL,
  `paralysis` varchar(20) DEFAULT NULL,
  `meningLes` varchar(20) DEFAULT NULL,
  `otherSymptoms` varchar(20) DEFAULT NULL,
  `anyComp` varchar(20) DEFAULT NULL,
  `complicated` varchar(20) DEFAULT NULL,
  `travel` varchar(20) DEFAULT NULL,
  `probExposure` varchar(20) DEFAULT NULL,
  `otherCase` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `wfDiag` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hfmdinfotbl`
--

INSERT INTO `hfmdinfotbl` (`hfmdld`, `patientId`, `fever`, `rashChar`, `rashSores`, `palms`, `fingers`, `footSoles`, `buttocks`, `mouthUlcers`, `pain`, `anorexia`, `bm`, `soreThroat`, `nausVom`, `diffBreath`, `paralysis`, `meningLes`, `otherSymptoms`, `anyComp`, `complicated`, `travel`, `probExposure`, `otherCase`, `caseClass`, `outcome`, `wfDiag`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 393, 'no', 'unknown', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'N/A', NULL, 'N/A', 'N/A', 'N/A', 'Alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 399, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'asdfasdf', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 1, 1),
(3, 400, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'N/A', 'no', 'N/A', 'N/A', 'N/A', 'Alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 401, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'N/A', 'no', 'N/A', 'N/A', 'N/A', 'Alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 543, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(6, 544, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(7, 545, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(8, 546, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(9, 547, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(10, 548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 549, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(12, 551, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'No', 'N/A', 'N/A', 'N/A', 'alive', 'N/A', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `influenzainfotbl`
--

CREATE TABLE `influenzainfotbl` (
  `influenzald` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `sari` varchar(20) DEFAULT NULL,
  `organism` varchar(20) DEFAULT NULL,
  `vacName` varchar(20) DEFAULT NULL,
  `vaccinated` varchar(10) NOT NULL,
  `vacDate1` date DEFAULT NULL,
  `vacDate2` date DEFAULT NULL,
  `boosterName` varchar(20) DEFAULT NULL,
  `boosterDate` date DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `influenzainfotbl`
--

INSERT INTO `influenzainfotbl` (`influenzald`, `patientId`, `labResult`, `outcome`, `caseClass`, `sari`, `organism`, `vacName`, `vaccinated`, `vacDate1`, `vacDate2`, `boosterName`, `boosterDate`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 408, 'N/A', 'alive', 'N/A', 'N/A', 'N/A', 'asdf', 'yes', '0000-00-00', '0000-00-00', 'asdf', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 409, 'N/A', 'Alive', 'N/A', 'N/A', 'N/A', 'N/A', 'no', '0000-00-00', '0000-00-00', 'N/A', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leptospirosisinfotbl`
--

CREATE TABLE `leptospirosisinfotbl` (
  `leptospirosisld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `serovar` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leptospirosisinfotbl`
--

INSERT INTO `leptospirosisinfotbl` (`leptospirosisld`, `patientId`, `labResult`, `serovar`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 410, 'N/A', 'N/A', 'N/A', 'dead', '2023-05-30 17:47:00', '0000-00-00', 0, 0),
(2, 411, 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-06-02', 0, 0),
(3, 835, 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `measlesinfotbl`
--

CREATE TABLE `measlesinfotbl` (
  `measlesld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `measVacc` varchar(20) DEFAULT NULL,
  `vitaminA` varchar(20) DEFAULT NULL,
  `cough` varchar(20) DEFAULT NULL,
  `koplikSpot` varchar(20) DEFAULT NULL,
  `lastVac` date DEFAULT NULL,
  `runnyNose` varchar(20) DEFAULT NULL,
  `redEyes` varchar(20) DEFAULT NULL,
  `arthritisArthralgia` varchar(20) DEFAULT NULL,
  `swolympNod` varchar(20) DEFAULT NULL,
  `otherSymptoms` varchar(20) DEFAULT NULL,
  `complications` varchar(20) DEFAULT NULL,
  `otherCase` varchar(20) DEFAULT NULL,
  `finalClass` varchar(20) DEFAULT NULL,
  `infectionSource` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measlesinfotbl`
--

INSERT INTO `measlesinfotbl` (`measlesld`, `patientId`, `measVacc`, `vitaminA`, `cough`, `koplikSpot`, `lastVac`, `runnyNose`, `redEyes`, `arthritisArthralgia`, `swolympNod`, `otherSymptoms`, `complications`, `otherCase`, `finalClass`, `infectionSource`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 345, 'No', 'No', 'No', 'No', '0000-00-00', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 345, 'No', 'No', 'No', 'No', '0000-00-00', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 412, 'No', 'No', 'No', 'No', '0000-00-00', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'dead', '2023-07-06 17:59:00', '0000-00-00', 0, 0),
(4, 413, 'no', 'no', 'no', 'no', '0000-00-00', 'no', 'no', 'no', 'no', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(6, 447, 'No', 'No', 'No', 'No', '0000-00-00', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-06-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meningitisinfotbl`
--

CREATE TABLE `meningitisinfotbl` (
  `meningitisld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `organism` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meningitisinfotbl`
--

INSERT INTO `meningitisinfotbl` (`meningitisld`, `patientId`, `type`, `labResult`, `organism`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 414, '', '', '', '', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 415, 'N/A', 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meningoinfotbl`
--

CREATE TABLE `meningoinfotbl` (
  `meningold` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `seizure` varchar(20) DEFAULT NULL,
  `malaise` varchar(20) DEFAULT NULL,
  `headache` varchar(20) DEFAULT NULL,
  `stiffNeck` varchar(20) DEFAULT NULL,
  `cough` varchar(20) DEFAULT NULL,
  `rash` varchar(20) DEFAULT NULL,
  `vomiting` varchar(20) DEFAULT NULL,
  `soreThroat` varchar(20) DEFAULT NULL,
  `petechia` varchar(20) DEFAULT NULL,
  `sensoriumCh` varchar(20) DEFAULT NULL,
  `runnyNose` varchar(20) DEFAULT NULL,
  `purpura` varchar(20) DEFAULT NULL,
  `drowsiness` varchar(20) DEFAULT NULL,
  `dyspnea` varchar(20) DEFAULT NULL,
  `otherSS` varchar(20) DEFAULT NULL,
  `clinicalPres` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `antibiotics` varchar(20) DEFAULT NULL,
  `bloodSpecimen` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meningoinfotbl`
--

INSERT INTO `meningoinfotbl` (`meningold`, `patientId`, `fever`, `seizure`, `malaise`, `headache`, `stiffNeck`, `cough`, `rash`, `vomiting`, `soreThroat`, `petechia`, `sensoriumCh`, `runnyNose`, `purpura`, `drowsiness`, `dyspnea`, `otherSS`, `clinicalPres`, `caseClass`, `antibiotics`, `bloodSpecimen`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(2, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(3, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(4, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(5, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(6, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(7, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(8, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(9, 339, 'Yes', 'Other', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'dead', '2023-07-14 23:49:00', '2023-05-01', 1, 1),
(10, 340, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 'alive', '0000-00-00 00:00:00', '2023-05-01', 1, 1),
(11, 341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 341, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'na', 'na', 'suspected', 'na', 'no', 'alive', '0000-00-00 00:00:00', '2023-05-01', 11, 1),
(13, 342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 342, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'na', 'na', 'suspected', 'na', 'no', 'alive', '0000-00-00 00:00:00', '2023-05-01', 1, 1),
(15, 343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 343, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'na', 'na', 'suspected', 'na', 'no', 'alive', '0000-00-00 00:00:00', '2023-05-01', 1, 2),
(17, 344, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'na', 'na', 'na', 'na', 'No', 'alive', '0000-00-00 00:00:00', '2023-05-01', 1, 1),
(18, NULL, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'na', 'na', 'suspected', 'na', 'no', 'alive', '0000-00-00 00:00:00', '2023-05-09', 1, 1),
(19, 416, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(20, 417, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(21, 418, 'No', 'Unknown', 'No', 'No', 'Unknown', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(22, 419, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'N/A', 'N/A', 'N/A', 'N/A', 'unknown', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(23, 427, 'Yes', 'No', 'No', 'No', 'Unknown', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(24, 428, 'No', 'No', 'No', 'No', 'Unknown', 'No', 'No', 'Other', 'No', 'No', 'Unknown', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(25, 448, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(26, 459, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(27, 460, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(28, 461, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(29, 831, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'N/A', 'N/A', 'N/A', 'N/A', 'No', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `monthId` int(11) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`monthId`, `month`) VALUES
(1, 'January'),
(2, 'Febraury'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `munId` int(11) NOT NULL,
  `municipality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`munId`, `municipality`) VALUES
(1, 'Alfonso'),
(2, 'Amadeo'),
(3, 'Bacoor'),
(4, 'Carmona'),
(5, 'Cavite City'),
(6, 'Dasmariñas'),
(7, 'General Emilio Aguinaldo'),
(8, 'General Mariano Alvarez'),
(9, 'General Trias'),
(10, 'Imus'),
(11, 'Indang'),
(12, 'Kawit'),
(13, 'Magallanes'),
(14, 'Maragondon'),
(15, 'Mendez'),
(16, 'Naic'),
(17, 'Noveleta'),
(18, 'Rosario'),
(19, 'Silang'),
(20, 'Tagaytay City'),
(21, 'Tanza'),
(22, 'Ternate'),
(23, 'Trece Martires City');

-- --------------------------------------------------------

--
-- Table structure for table `nntinfotbl`
--

CREATE TABLE `nntinfotbl` (
  `nntld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `recentAcuteWound` varchar(20) DEFAULT NULL,
  `woundSite` varchar(20) DEFAULT NULL,
  `woundType` varchar(20) DEFAULT NULL,
  `otherWound` varchar(20) DEFAULT NULL,
  `tetanusToxoid` varchar(20) DEFAULT NULL,
  `tetanusAntitoxin` varchar(20) DEFAULT NULL,
  `skinLesion` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` date DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nntinfotbl`
--

INSERT INTO `nntinfotbl` (`nntld`, `patientId`, `recentAcuteWound`, `woundSite`, `woundType`, `otherWound`, `tetanusToxoid`, `tetanusAntitoxin`, `skinLesion`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 420, 'asdf', 'df', 'asdf', 'sdf', 'f', 'df', 'N/A', 'alive', '0000-00-00', '0000-00-00', 0, 0),
(2, 422, 'sd', 'asdf', 'asdf', 'N/Aasdf', 'asdf', 'N/Aasdf', 'Nsadfasdfasd', 'alive', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ntinfotbl`
--

CREATE TABLE `ntinfotbl` (
  `ntld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `mother` varchar(50) DEFAULT NULL,
  `first2Days` varchar(20) DEFAULT NULL,
  `after2Days` varchar(20) DEFAULT NULL,
  `finalDx` varchar(20) DEFAULT NULL,
  `trismus` varchar(20) DEFAULT NULL,
  `clenFis` varchar(20) DEFAULT NULL,
  `opistho` varchar(20) DEFAULT NULL,
  `stumpInf` varchar(20) DEFAULT NULL,
  `cordCut` varchar(20) DEFAULT NULL,
  `finalClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ntinfotbl`
--

INSERT INTO `ntinfotbl` (`ntld`, `patientId`, `mother`, `first2Days`, `after2Days`, `finalDx`, `trismus`, `clenFis`, `opistho`, `stumpInf`, `cordCut`, `finalClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 424, 'jauna', 'No', 'No', 'N/A', 'No', 'Other', 'No', 'No', 'No', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(2, 425, 'N/A', 'No', 'No', 'N/A', 'No', 'No', 'No', 'No', 'No', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 426, 'juana', 'unknown', 'unknown', 'N/A', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 429, 'juana', 'No', 'No', 'N/A', 'Unknown', 'Unknown', 'Unknown', 'No', 'No', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(5, 450, 'Juana', 'No', 'No', 'N/A', 'No', 'No', 'No', 'No', 'No', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

CREATE TABLE `outcomes` (
  `outcomeId` int(11) NOT NULL,
  `outcome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`outcomeId`, `outcome`) VALUES
(1, 'Alive'),
(2, 'Died'),
(3, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientId` int(11) NOT NULL,
  `createdby_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `creationDate` datetime NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `contact` varchar(11) NOT NULL,
  `munCityOfDRU` int(11) NOT NULL,
  `brgyOfDRU` int(11) NOT NULL,
  `addressOfDRU` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `municipality` int(11) NOT NULL,
  `barangay` int(11) NOT NULL,
  `street` varchar(50) NOT NULL DEFAULT '',
  `unitCode` varchar(20) DEFAULT '',
  `subd` varchar(30) DEFAULT '',
  `postalCode` varchar(10) DEFAULT NULL,
  `disease` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientId`, `createdby_id`, `nurse_id`, `latitude`, `longitude`, `creationDate`, `firstName`, `lastName`, `middleName`, `contact`, `munCityOfDRU`, `brgyOfDRU`, `addressOfDRU`, `gender`, `dob`, `age`, `municipality`, `barangay`, `street`, `unitCode`, `subd`, `postalCode`, `disease`, `updated_at`) VALUES
(339, 0, 0, 14.169275283813477, 120.92221069335938, '2023-05-30 17:58:53', 'wer', 'xvzc', 'sdfa', '09124844735', 17, 632, 'asfd', 1, '2000-01-01', 23, 2, 42, '', '', '', '4119', 19, '2023-11-17 12:37:30'),
(340, 0, 0, 14.13776683807373, 120.85742950439453, '2023-05-30 18:19:55', 'cvbn', 'vbn', 'vcbn', '09124844936', 19, 668, 'asdf', 1, '2000-01-01', 23, 1, 1, '', '', '', '4123', 19, '2023-11-17 12:37:30'),
(341, 0, 0, 14.316110610961914, 120.76882934570312, '2023-05-30 18:24:42', 'fghj', 'gfhj', 'fghj', '09124847231', 18, 648, 'zxcv', 1, '2000-01-01', 23, 16, 611, '', '', '', '4110', 19, '2023-11-17 12:37:30'),
(342, 0, 0, 14.479129791259766, 120.89696502685547, '2023-05-30 18:27:07', 'tyui', 'tyui', 'tyui', '09124821371', 13, 535, 'zxcv', 1, '2000-01-01', 23, 5, 171, '', '', '', '4100', 19, '2023-11-17 12:37:30'),
(343, 0, 0, 14.283016204833984, 121.0016098022461, '2023-05-30 18:35:59', 'asdf', 'zxcv', 'qwer', '09124844763', 18, 648, 'zxcv', 1, '2000-01-01', 23, 8, 331, '', '', '', '4117', 19, '2023-11-17 12:37:30'),
(344, 0, 0, 14.320091247558594, 121.04210662841797, '2023-05-30 18:39:49', 'ghjf', 'ghj', 'bvnm', '09121482731', 19, 668, 'zxc', 1, '2000-01-01', 23, 4, 141, '', '', '', '4116', 19, '2023-11-17 12:37:30'),
(345, 0, 0, 14.38725471496582, 120.89869689941406, '2023-06-04 18:10:45', 'vbn', 'zxcv', 'bngh', '09124844673', 19, 668, 'asdf', 1, '2000-01-01', 23, 9, 360, '', '', '', '4107', 17, '2023-11-17 12:37:30'),
(349, 0, 0, 14.13776683807373, 120.85742950439453, '2023-06-05 18:24:27', 'gfhj', 'gfhj', 'fghj', '09124844732', 2, 33, 'asdf', 1, '2000-01-10', 23, 1, 1, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(350, 0, 0, 14.45759391784668, 120.9352798461914, '2023-06-05 18:25:06', 'ghkj', 'hjkg', 'ghjk', '09124844736', 19, 668, 'asdf', 1, '2000-01-10', 23, 3, 59, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(351, 0, 0, 14.147472381591797, 120.84127807617188, '2023-06-06 08:57:32', 'p1', 'p1', 'p1', '09124844723', 1, 19, 'asdf', 2, '2000-01-10', 23, 1, 19, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(352, 0, 0, 14.105753898620605, 120.8168716430664, '2023-06-06 09:17:38', 'amb1', 'amb1', 'amb1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 1, 11, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(353, 0, 0, 14.110953330993652, 120.87142944335938, '2023-06-06 09:24:54', 'amb2', 'amb2', 'amb2', '09121212123', 19, 668, 'amb2', 1, '2000-10-10', 22, 1, 18, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(354, 0, 0, 14.2118501663208, 120.9331283569336, '2023-06-06 09:38:20', 'amb3', 'amb3', 'amb3', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 2, 33, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(355, 0, 0, 14.185023307800293, 120.87020874023438, '2023-06-06 09:48:48', 'amb4', 'amb4', 'amb4', '09121212123', 19, 668, 'asd', 1, '2000-01-01', 23, 11, 499, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(356, 0, 0, 14.385687828063965, 120.8803939819336, '2023-06-06 09:51:04', 'amb5', 'amb5', 'amb5', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 9, 357, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(357, 0, 0, 14.422050476074219, 120.91735076904297, '2023-06-06 12:13:02', 'tyui', 'tyui', 'tyui', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 10, 379, '', '', '', '4103', 2, '2023-11-17 12:37:30'),
(358, 0, 0, 14.26873779296875, 120.74217987060547, '2023-06-06 12:14:19', 'bnvc', 'zxcv', 'tryu', '09124844635', 18, 648, 'asdf', 1, '2000-01-10', 23, 14, 551, '', '', '', '4112', 2, '2023-11-17 12:37:30'),
(359, 0, 0, 14.2118501663208, 120.9331283569336, '2023-06-06 12:16:34', 'fghj', 'ghjf', 'fghj', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 2, 33, '', '', '', '4119', 2, '2023-11-17 12:37:30'),
(360, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-06 12:18:08', 'aefi', 'aefi', 'aefi', '09121212123', 19, 668, 'sadf', 1, '2000-01-01', 23, 6, 230, '', '', '', '4114', 2, '2023-11-17 12:37:30'),
(361, 0, 0, 14.296486854553223, 120.7924575805664, '2023-06-06 12:19:43', 'aefi2', 'aefi2', 'aefi2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 16, 602, '', '', '', '4110', 2, '2023-11-17 12:37:30'),
(362, 0, 0, 14.430359840393066, 120.88218688964844, '2023-06-06 12:27:42', 'aefi3', 'aefi3', 'aefi3', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 17, 632, '', '', '', '4105', 2, '2023-11-17 12:37:30'),
(363, 0, 0, 14.385687828063965, 120.8803939819336, '2023-06-06 12:29:52', 'aefi4', 'aefi4', 'aefi4', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 5, 146, '', '', '', '4100', 2, '2023-11-17 12:37:30'),
(364, 0, 0, 14.452329635620117, 120.9180679321289, '2023-06-06 12:35:11', 'aefi5', 'aefi5', 'aefi5', '09124844735', 16, 602, 'asdf', 1, '2000-01-01', 23, 12, 512, '', '', '', '4104', 2, '2023-11-17 12:37:30'),
(365, 0, 0, 14.240118026733398, 120.9159164428711, '2023-06-06 13:59:45', 'aes1', 'aes1', 'aes1', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 9, 346, '', '', '', '4107', 3, '2023-11-17 12:37:30'),
(366, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-06 14:00:54', 'aes2', 'aes2', 'aes2', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 6, 230, '', '', '', '4114', 3, '2023-11-17 12:37:30'),
(367, 0, 0, 14.283753395080566, 121.00770568847656, '2023-06-06 14:01:37', 'aes3', 'aes3', 'aes3', '09123123123', 19, 668, 'ASDF', 1, '2000-01-01', 23, 4, 132, '', '', '', '4116', 3, '2023-11-17 12:37:30'),
(368, 0, 0, 14.192038536071777, 120.87286376953125, '2023-06-06 14:04:07', 'aes4', 'aes4', 'aes4', '09124844472', 18, 648, 'asdf', 1, '2000-01-10', 23, 11, 476, '', '', '', '4122', 3, '2023-11-17 12:37:30'),
(369, 0, 0, 14.299017906188965, 120.95896911621094, '2023-06-06 14:05:00', 'aes5', 'aes5', 'aes5', '09123847123', 17, 632, 'asdf', 1, '2000-01-01', 23, 6, 240, '', '', '', '4114', 3, '2023-11-17 12:37:30'),
(370, 0, 0, 14.452329635620117, 120.9180679321289, '2023-06-06 14:11:51', 'afp1', 'afp1', 'afp1', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 12, 512, '', '', '', '4104', 4, '2023-11-17 12:37:30'),
(371, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-06 14:17:18', 'afp2', 'afp2', 'afp2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 6, 230, '', '', '', '4114', 4, '2023-11-17 12:37:30'),
(372, 0, 0, 14.308401107788086, 121.01129150390625, '2023-06-06 14:19:09', 'afp3', 'afp3', 'afp3', '09121212123', 14, 551, 'asdf', 1, '2000-01-01', 23, 8, 319, '', '', '', '4117', 4, '2023-11-17 12:37:30'),
(373, 0, 0, 14.296486854553223, 120.7924575805664, '2023-06-06 14:20:19', 'afp4', 'afp4', 'afp4', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 16, 602, '', '', '', '4110', 4, '2023-11-17 12:37:30'),
(374, 0, 0, 14.146906852722168, 120.79963684082031, '2023-06-06 14:25:20', 'afp5', 'afp5', 'afp5', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 7, 305, '', '', '', '4124', 4, '2023-11-17 12:37:30'),
(375, 0, 0, 14.430359840393066, 120.88218688964844, '2023-06-06 14:30:52', 'abd11', 'abd11', 'abd11', '09121212123', 16, 602, 'asdf', 1, '2000-01-10', 23, 17, 632, '', '', '', '4105', 1, '2023-11-17 12:37:30'),
(376, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-06 14:31:32', 'abd12', 'abd12', 'abd12', '09121212123', 16, 602, 'asd', 1, '2000-10-10', 22, 6, 230, '', '', '', '4114', 1, '2023-11-17 12:37:30'),
(377, 0, 0, 14.42208480834961, 120.86783599853516, '2023-06-06 15:11:07', 'afp6', 'afp6', 'afp6', '09121212123', 12, 512, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 4, '2023-11-17 12:37:30'),
(378, 0, 0, 14.304594039916992, 121.0130844116211, '2023-06-06 15:23:27', 'afp7', 'afp7', 'afp7', '09121212123', 15, 578, 'asdf', 1, '2000-01-01', 23, 8, 333, '', '', '', '4117', 4, '2023-11-17 12:37:30'),
(379, 0, 0, 14.26873779296875, 120.74217987060547, '2023-06-06 16:20:10', 'ames1', 'ames1', 'ames1', '09124844735', 16, 602, 'asdf', 1, '2000-01-10', 23, 14, 551, '', '', '', '4112', 5, '2023-11-17 12:37:30'),
(380, 0, 0, 14.430359840393066, 120.88218688964844, '2023-06-06 16:56:07', 'ames2', 'ames2', 'ames2', '09121212123', 14, 551, 'asdf', 1, '2000-10-10', 22, 17, 632, '', '', '', '4105', 5, '2023-11-17 12:37:30'),
(381, 0, 0, 14.26873779296875, 120.74217987060547, '2023-06-06 17:25:07', 'chicv1', 'chicv1', 'chicv1', '09124844735', 17, 632, 'asdf', 1, '2000-10-11', 22, 14, 551, '', '', '', '4112', 6, '2023-11-17 12:37:30'),
(382, 0, 0, 14.308401107788086, 121.01129150390625, '2023-06-06 17:49:45', 'ames3', 'ames3', 'ames3', '09121212123', 15, 578, 'sdfg', 1, '2000-01-01', 23, 8, 319, '', '', '', '4117', 5, '2023-11-17 12:37:30'),
(383, 0, 0, 14.192038536071777, 120.87286376953125, '2023-06-06 17:50:19', 'chicv2', 'chicv2', 'chicv2', '09121212123', 17, 632, 'asdf', 1, '2000-10-10', 22, 11, 476, '', '', '', '4122', 6, '2023-11-17 12:37:30'),
(384, 0, 0, 14.308401107788086, 121.01129150390625, '2023-06-06 18:07:40', 'chikv3', 'chikv3', 'chikv3', '09121212123', 19, 668, 'asdf', 1, '2000-10-10', 22, 8, 319, '', '', '', '4117', 6, '2023-11-17 12:37:30'),
(385, 0, 0, 14.308401107788086, 121.01129150390625, '2023-06-06 18:08:22', 'chikv4', 'chikv4', 'chikv4', '09121212123', 14, 551, 'asdf', 1, '2000-10-10', 22, 8, 319, '', '', '', '4117', 6, '2023-11-17 12:37:30'),
(386, 0, 0, 14.26873779296875, 120.74217987060547, '2023-06-07 09:06:48', 'cholera1', 'cholera1', 'cholera1', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 14, 551, '', '', '', '4112', 15, '2023-11-17 12:37:30'),
(387, 0, 0, 14.244556427001953, 121.02727508544922, '2023-06-07 09:11:01', 'cholera2', 'cholera2', 'cholera2', '09121212123', 17, 632, 'sdf', 1, '0000-00-00', 0, 19, 668, '', '', '', '4118', 15, '2023-11-17 12:37:30'),
(388, 0, 0, 14.452329635620117, 120.9180679321289, '2023-06-07 09:14:02', 'dengue1', 'dengue1', 'dengue1', '09121212123', 13, 535, 'asdf', 1, '2000-10-10', 22, 12, 512, '', '', '', '4104', 13, '2023-11-17 12:37:30'),
(389, 0, 0, 14.192038536071777, 120.87286376953125, '2023-06-07 09:15:35', 'dengue2', 'dengue2', 'dengue2', '09121212123', 16, 602, 'asdf', 1, '2000-01-10', 23, 11, 492, '', '', '', '4122', 13, '2023-11-17 12:37:30'),
(390, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-07 09:16:32', 'dengue3', 'dengue3', 'dengue3', '09121212123', 17, 632, 'asdf', 1, '2000-01-10', 23, 6, 230, '', '', '', '4114', 13, '2023-11-17 12:37:30'),
(391, 0, 0, 14.479129791259766, 120.89696502685547, '2023-06-07 09:20:56', 'diph1', 'diph1', 'diph1', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 5, 155, '', '', '', '4100', 7, '2023-11-17 12:37:30'),
(392, 0, 0, 14.329163551330566, 120.94390869140625, '2023-06-07 09:54:35', 'diph2', 'diph2', 'diph2', '09121212123', 13, 535, 'asdf', 1, '2000-01-01', 23, 6, 230, '', '', '', '4114', 7, '2023-11-17 12:37:30'),
(393, 0, 0, 14.283753395080566, 121.00770568847656, '2023-06-07 09:57:42', 'hfmd1', 'hfmd1', 'hfmd1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 4, 132, '', '', '', '4116', 8, '2023-11-17 12:37:30'),
(396, 0, 0, 14.387898445129395, 120.88075256347656, '2023-06-07 10:09:28', 'hfmd2', 'hfmd2', 'hfmd2', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 9, 356, '', '', '', '4107', 8, '2023-11-17 12:37:30'),
(398, 0, 0, 14.34293270111084, 120.85031127929688, '2023-06-07 10:13:39', 'hfmd4', 'hfmd4', 'hfmd4', '09121212123', 19, 668, 'sadf', 1, '2000-01-10', 23, 21, 777, '', '', '', '4108', 8, '2023-11-17 12:37:30'),
(399, 0, 0, 14.278741836547852, 120.73320007324219, '2023-06-07 10:16:27', 'hfmd5', 'hfmd5', 'hfmd5', '09121212123', 7, 311, 'asdf', 1, '2000-01-01', 23, 14, 559, '', '', '', '4112', 8, '2023-11-17 12:37:30'),
(400, 0, 0, 14.385469436645508, 120.94245147705078, '2023-06-07 10:23:32', 'hfmd6', 'hfmd6', 'hfmd6', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 10, 392, '', '', '', '4103', 8, '2023-11-17 12:37:30'),
(401, 0, 0, 14.283016204833984, 121.0016098022461, '2023-06-07 10:24:33', 'hfmd7', 'hfmd7', 'hfmd7', '09121212123', 16, 621, 'asdf', 1, '2000-01-01', 23, 8, 331, '', '', '', '4117', 8, '2023-11-17 12:37:30'),
(402, 0, 0, 14.310818672180176, 121.0409927368164, '2023-06-07 10:50:07', 'cholera11', 'cholera11', 'cholera11', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 4, 137, '', '', '', '4116', 15, '2023-11-17 12:37:30'),
(403, 0, 0, 14.283753395080566, 121.00770568847656, '2023-06-07 10:50:29', 'dengue11', 'dengue11', 'dengue11', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 4, 132, '', '', '', '4116', 13, '2023-11-17 12:37:30'),
(404, 0, 0, 14.138459205627441, 120.90945434570312, '2023-06-07 10:51:02', 'diph11', 'diph11', 'diph11', '09121212123', 13, 545, 'asdf', 1, '2000-01-01', 23, 15, 590, '', '', '', '4121', 7, '2023-11-17 12:37:30'),
(405, 0, 0, 14.455262184143066, 120.94245147705078, '2023-06-07 10:51:36', 'hepa1', 'hepa1', 'hepa1', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 3, 68, '', '', '', '4102', 16, '2023-11-17 12:37:30'),
(406, 0, 0, 14.4382963180542, 120.8943862915039, '2023-06-07 10:52:07', 'hepa2', 'hepa2', 'hepa2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 12, 522, '', '', '', '4104', 16, '2023-11-17 12:37:30'),
(407, 0, 0, 14.192038536071777, 120.87286376953125, '2023-06-07 10:53:00', 'hepa3', 'hepa3', 'hepa3', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 11, 492, '', '', '', '4122', 16, '2023-11-17 12:37:30'),
(408, 0, 0, 14.217589378356934, 120.78384399414062, '2023-06-07 10:59:31', 'influ1', 'influ1', 'influ1', '09121212123', 14, 551, 'asdf', 1, '2000-01-01', 23, 7, 312, '', '', '', '4124', 12, '2023-11-17 12:37:30'),
(409, 0, 0, 14.133096694946289, 120.910888671875, '2023-06-07 11:36:09', 'influ2', 'influ2', 'influ2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 15, 586, '', '', '', '4121', 12, '2023-11-17 12:37:30'),
(410, 0, 0, 14.310818672180176, 121.0409927368164, '2023-06-07 11:47:30', 'leptos1', 'leptos1', 'leptos1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 4, 137, '', '', '', '4116', 21, '2023-11-17 12:37:30'),
(411, 0, 0, 14.169275283813477, 120.92221069335938, '2023-06-07 11:58:35', 'leptos2', 'leptos2', 'leptos2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 2, 42, '', '', '', '4119', 21, '2023-11-17 12:37:30'),
(412, 0, 0, 14.457887649536133, 120.93994140625, '2023-06-07 11:59:13', 'mes1', 'mes1', 'mes1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 3, 67, '', '', '', '4102', 17, '2023-11-17 12:37:30'),
(413, 0, 0, 14.321972846984863, 120.75444793701172, '2023-06-07 12:01:50', 'mes2', 'mes2', 'mes2', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 16, 605, '', '', '', '4110', 17, '2023-11-17 12:37:30'),
(414, 0, 0, 14.299017906188965, 120.95896911621094, '2023-06-07 12:03:18', 'menin1', 'menin1', 'menin1', '09121212123', 19, 668, 'asdf', 1, '2000-10-10', 22, 6, 237, '', '', '', '4114', 18, '2023-11-17 12:37:30'),
(415, 0, 0, 14.252950668334961, 120.73499298095703, '2023-06-07 12:04:07', 'menin2', 'menin2', 'menin2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 14, 564, '', '', '', '4112', 18, '2023-11-17 12:37:30'),
(416, 0, 0, 14.096671104431152, 120.83554077148438, '2023-06-07 12:06:53', 'ngo1', 'ngo1', 'ngo1', '09121212123', 18, 648, 'asd', 1, '2000-01-01', 23, 1, 14, '', '', '', '4123', 19, '2023-11-17 12:37:30'),
(417, 0, 0, 14.169275283813477, 120.92221069335938, '2023-06-07 12:09:26', 'ngo2', 'ngo2', 'ngo2', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 2, 41, '', '', '', '4119', 19, '2023-11-17 12:37:30'),
(418, 0, 0, 14.129124641418457, 120.90479278564453, '2023-06-07 12:10:50', 'ngo3', 'ngo3', 'ngo3', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 15, 595, '', '', '', '4121', 19, '2023-11-17 12:37:30'),
(419, 0, 0, 14.305142402648926, 121.01276397705078, '2023-06-07 12:12:22', 'ngo4', 'ngo4', 'ngo4', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 8, 328, '', '', '', '4117', 19, '2023-11-17 12:37:30'),
(420, 0, 0, 14.273320198059082, 120.86425018310547, '2023-06-07 12:18:00', 'nnt1', 'nnt1', 'nnt1', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 23, 825, '', '', '', '4109', 9, '2023-11-17 12:37:30'),
(422, 0, 0, 14.443754196166992, 120.94603729248047, '2023-06-07 12:21:02', 'nnt2', 'nnt2', 'nnt2', '09121212123', 19, 687, 'asd', 1, '2000-01-01', 23, 3, 72, '', '', '', '4102', 9, '2023-11-17 12:37:30'),
(423, 0, 0, 14.193117141723633, 120.7924575805664, '2023-06-07 12:21:45', 'nt1', 'nt1', 'nt1', '09121212123', 13, 535, 'asdf', 1, '2000-01-10', 23, 7, 314, '', '', '', '4124', 10, '2023-11-17 12:37:30'),
(424, 0, 0, 14.446982383728027, 120.90586853027344, '2023-06-07 12:23:59', 'nt2', 'nt2', 'nt2', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 12, 518, '', '', '', '4104', 10, '2023-11-17 12:37:30'),
(425, 0, 0, 14.479129791259766, 120.89696502685547, '2023-06-07 12:25:59', 'nt3', 'nt3', 'nt3', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 5, 152, '', '', '', '4100', 10, '2023-11-17 12:37:30'),
(426, 0, 0, 14.45759391784668, 120.9352798461914, '2023-06-07 12:26:59', 'nt4', 'nt4', 'nt4', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 3, 59, '', '', '', '4102', 10, '2023-11-17 12:37:30'),
(427, 0, 0, 14.130499839782715, 120.85635375976562, '2023-06-07 12:27:52', 'ngo4', 'ngo4', 'ngo4', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 1, 6, '', '', '', '4123', 19, '2023-11-17 12:37:30'),
(428, 0, 0, 14.479129791259766, 120.89696502685547, '2023-06-07 12:31:23', 'ngo5', 'ngo5', 'ngo5', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 5, 169, '', '', '', '4100', 19, '2023-11-17 12:37:30'),
(429, 0, 0, 14.192038536071777, 120.87286376953125, '2023-06-07 12:32:43', 'nt5', 'nt5', 'nt5', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 11, 483, '', '', '', '4122', 10, '2023-11-17 12:37:30'),
(430, 0, 0, 14.310818672180176, 121.0409927368164, '2023-06-07 12:39:06', 'pert1', 'pert1', 'pert1', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 4, 135, '', '', '', '4116', 11, '2023-11-17 12:37:30'),
(431, 0, 0, 14.449743270874023, 120.9180679321289, '2023-06-07 12:39:58', 'pert2', 'pert2', 'pert2', '09121212123', 19, 668, 'sdf', 1, '2000-01-01', 23, 12, 514, '', '', '', '4104', 11, '2023-11-17 12:37:30'),
(432, 0, 0, 14.440290451049805, 120.88506317138672, '2023-06-07 12:40:38', 'pert3', 'pert3', 'pert3', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 17, 641, '', '', '', '4105', 11, '2023-11-17 12:37:30'),
(433, 0, 0, 14.299017906188965, 120.95896911621094, '2023-06-07 12:43:01', 'pert4', 'pert4', 'pert4', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 6, 238, '', '', '', '4114', 11, '2023-11-17 12:37:30'),
(434, 0, 0, 14.130499839782715, 120.85635375976562, '2023-06-07 12:45:58', 'rabies1', 'rabies1', 'rabies1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 1, 6, '', '', '', '4123', 14, '2023-11-17 12:37:30'),
(435, 0, 0, 14.169275283813477, 120.92221069335938, '2023-06-07 12:52:15', 'typ1', 'typ1', 'typ1', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 2, 35, '', '', '', '4119', 20, '2023-11-17 12:37:30'),
(436, 0, 0, 14.244556427001953, 121.02727508544922, '2023-06-11 16:49:39', 'aefi12', 'aefi12', 'aefi12', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 19, 668, '', '', '', '4118', 2, '2023-11-17 12:37:30'),
(437, 0, 0, 14.425962448120117, 120.96707153320312, '2023-06-11 16:54:05', 'abd12', 'abd12', 'abd12', '09121212123', 11, 476, 'asdf', 1, '2000-01-01', 23, 3, 66, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(438, 0, 0, 14.299017906188965, 120.95896911621094, '2023-06-11 16:54:38', 'abd13', 'abd13', 'abd13', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 6, 243, '', '', '', '4114', 1, '2023-11-17 12:37:30'),
(439, 0, 0, 14.44572925567627, 120.90335845947266, '2023-06-11 17:37:41', 'aefi13', 'aefi13', 'aefi13', '09121212123', 18, 648, 'asdfasdf', 1, '2000-01-01', 23, 12, 523, '', '', '', '4104', 2, '2023-11-17 12:37:30'),
(440, 0, 0, 14.305142402648926, 121.01276397705078, '2023-06-11 17:38:17', 'aefi14', 'aefi14', 'aefi14', '09121212123', 11, 476, 'asdf', 1, '2000-01-01', 23, 8, 329, '', '', '', '4117', 2, '2023-11-17 12:37:30'),
(441, 0, 0, 14.301923751831055, 121.02490997314453, '2023-06-11 17:38:58', 'aefi15', 'aefi15', 'aefi15', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 4, 143, '', '', '', '4116', 2, '2023-11-17 12:37:30'),
(442, 0, 0, 14.169275283813477, 120.92221069335938, '2023-06-11 17:58:13', 'aefi15', 'aefi15', 'aefi15', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 2, 42, '', '', '', '4119', 2, '2023-11-17 12:37:30'),
(443, 0, 0, 14.45759391784668, 120.9352798461914, '2023-06-11 17:59:41', 'dengue3', 'dengue3', 'dengue3', '09121212123', 15, 578, 'asdf', 1, '2000-01-01', 23, 3, 59, '', '', '', '4102', 13, '2023-11-17 12:37:30'),
(444, 0, 0, 14.440644264221191, 120.90945434570312, '2023-06-11 18:11:21', 'afp5', 'afp5', 'afp5', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 12, 517, '', '', '', '4104', 4, '2023-11-17 12:37:30'),
(445, 0, 0, 14.39322280883789, 120.94245147705078, '2023-06-11 18:20:42', 'ames5', 'ames5', 'ames5', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 10, 388, '', '', '', '4103', 5, '2023-11-17 12:37:30'),
(446, 0, 0, 14.158284187316895, 120.74649047851562, '2023-06-11 18:31:09', 'chicv11', 'chicv11', 'chicv11', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 13, 535, '', '', '', '4113', 6, '2023-11-17 12:37:30'),
(447, 0, 0, 14.175166130065918, 120.9732894897461, '2023-06-11 18:47:32', 'meas12', 'meas12', 'meas12', '09121212123', 17, 632, 'asd', 1, '2000-01-01', 23, 19, 673, '', '', '', '4118', 17, '2023-11-17 12:37:30'),
(448, 0, 0, 14.2118501663208, 120.9331283569336, '2023-06-23 07:44:09', 'meningo1', 'meningo1', 'meningo1', '09121212123', 16, 602, 'asdf', 1, '2000-10-10', 22, 2, 33, '', '', '', '4119', 19, '2023-11-17 12:37:30'),
(449, 0, 0, 14.13776683807373, 120.85742950439453, '2023-06-23 07:56:39', 'pert21', 'pert21', 'pert21', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 1, 1, '', '', '', '4123', 11, '2023-11-17 12:37:30'),
(450, 0, 0, 14.304929733276367, 121.0152359008789, '2023-06-23 07:58:52', 'nt21', 'nt21', 'nt21', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 8, 326, '', '', '', '4117', 10, '2023-11-17 12:37:30'),
(451, 0, 0, 14.407960891723633, 120.84917449951172, '2023-06-30 18:28:52', 'raven', 'raveen', 'r', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 18, 667, '', 'blk 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(452, 0, 0, 14.417131423950195, 120.85958099365234, '2023-06-30 18:31:59', 'armil', 'armil', 'a', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 662, 'Kadena De Amor Street', '517', '', '4106', 1, '2023-11-17 12:37:30'),
(453, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-01 08:59:31', 'raven2', 'raven2', 'raven2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'blk 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(454, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-01 09:03:42', 'raven3', 'raven3', 'raven3', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'block 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(455, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-01 09:22:59', 'raven4', 'raven4', 'raven4', '09121212123', 18, 667, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'block 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(457, 0, 0, 14.244556427001953, 121.02727508544922, '2023-07-07 17:41:33', 'aefi22', 'aefi22', 'aefi22', '09121212123', 21, 766, 'asdf', 1, '2000-01-01', 23, 19, 668, '', '', '', '4118', 2, '2023-11-17 12:37:30'),
(458, 0, 0, 14.41187858581543, 120.84666442871094, '2023-07-08 08:08:57', 'aefi21', 'aefi21', 'aefi21', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 665, '', '', '', '4106', 2, '2023-11-17 12:37:30'),
(459, 0, 0, 14.13776683807373, 120.85742950439453, '2023-07-10 17:47:15', 'meningo11', 'meningo11', 'meningo11', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 1, 1, '', '', '', '4123', 19, '2023-11-17 12:37:30'),
(460, 0, 0, 14.151142120361328, 120.81050109863281, '2023-07-10 17:47:34', 'meningo12', 'meningo12', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 7, 313, '', '', '', '4124', 19, '2023-11-17 12:37:30'),
(461, 0, 0, 14.451913833618164, 120.92093658447266, '2023-07-10 17:47:52', 'meningo13', 'meningo13', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 12, 520, '', '', '', '4104', 19, '2023-11-17 12:37:30'),
(462, 0, 0, 14.12276554107666, 120.86998748779297, '2023-07-10 17:48:14', 'disease1', 'disease1', '', '09121212123', 2, 52, 'asdf', 1, '2000-01-01', 23, 1, 9, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(463, 0, 0, 14.169275283813477, 120.92221069335938, '2023-07-10 17:49:12', 'disease2', 'disease2', 'disease2', '09121212123', 2, 51, 'asdf', 1, '2000-01-01', 23, 2, 38, '', '', '', '4119', 2, '2023-11-17 12:37:30'),
(464, 0, 0, 14.169275283813477, 120.92221069335938, '2023-07-10 17:52:40', 'disease2', 'disease2', 'disease2', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 2, 43, '', '', '', '4119', 2, '2023-11-17 12:37:30'),
(465, 0, 0, 14.412993431091309, 120.97367858886719, '2023-07-10 18:11:53', 'disease3', 'disease3', 'disease3', '09121212123', 3, 75, 'asdf', 1, '2000-01-01', 23, 3, 62, '', '', '', '4102', 3, '2023-11-17 12:37:30'),
(466, 0, 0, 14.320091247558594, 121.04210662841797, '2023-07-10 18:13:25', 'disease4', 'disease4', 'disease4', '09121212123', 4, 139, 'asdf', 1, '2000-01-01', 23, 4, 141, '', '', '', '4116', 4, '2023-11-17 12:37:30'),
(467, 0, 0, 14.391626358032227, 120.89112091064453, '2023-07-10 18:22:11', 'disease5', 'disease5', '', '09121212123', 5, 162, 'asdf', 1, '2000-01-01', 23, 5, 157, '', '', '', '4100', 5, '2023-11-17 12:37:30'),
(468, 0, 0, 14.299017906188965, 120.95896911621094, '2023-07-10 18:23:51', 'disease5', 'disease5', 'disease5', '09121212123', 8, 336, 'asd', 1, '2000-01-01', 23, 6, 236, '', '', '', '4114', 6, '2023-11-17 12:37:30'),
(469, 0, 0, 14.299017906188965, 120.95896911621094, '2023-07-10 18:24:32', 'disease6', 'disease6', '', '09121212123', 4, 141, 'asd', 1, '2000-01-01', 23, 6, 236, '', '', '', '4114', 15, '2023-11-17 12:37:30'),
(470, 0, 0, 14.183059692382812, 120.79963684082031, '2023-07-10 18:32:41', 'disease7', 'disease7', '', '09121212123', 8, 336, 'asdf', 1, '2000-01-01', 23, 7, 316, '', '', '', '4124', 13, '2023-11-17 12:37:30'),
(471, 0, 0, 14.159961700439453, 120.8168716430664, '2023-07-10 18:33:20', 'disease6', 'disease6', 'disease6', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 7, 310, '', '', '', '4124', 13, '2023-11-17 12:37:30'),
(472, 0, 0, 14.385687828063965, 120.8803939819336, '2023-07-10 18:38:19', 'disease7', 'disease7', '', '09121212123', 18, 648, '', 1, '2000-01-01', 23, 9, 357, '', '', '', '4107', 7, '2023-11-17 12:37:30'),
(473, 0, 0, 14.395313262939453, 120.9503402709961, '2023-07-10 18:39:02', 'disease8', 'disease8', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 10, 390, '', '', '', '4103', 16, '2023-11-17 12:37:30'),
(474, 0, 0, 14.218942642211914, 120.87429809570312, '2023-07-10 18:40:44', 'cholera', 'cholera', '', '09121212123', 11, 476, 'asdf', 1, '2000-01-01', 23, 11, 480, '', '', '', '4122', 15, '2023-11-17 12:37:30'),
(475, 0, 0, 14.192038536071777, 120.87286376953125, '2023-07-10 18:42:54', 'cholera ', 'cholera ', '', '09121212123', 7, 313, 'asd', 1, '2000-01-01', 23, 11, 486, '', '', '', '4122', 15, '2023-11-17 12:37:30'),
(476, 0, 0, 14.460433006286621, 120.94245147705078, '2023-07-10 18:50:48', 'cholera ', 'cholera', '', '09121212123', 17, 636, 'asdf', 1, '2000-01-01', 23, 3, 69, '', '', '', '4102', 15, '2023-11-17 12:37:30'),
(477, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 09:56:01', 'r', 'r', 'r', '09123456789', 10, 379, 'asd', 1, '2023-07-05', 0, 16, 613, '', '', '', '4110', 14, '2023-11-17 12:37:30'),
(478, 0, 0, 14.42208480834961, 120.86783599853516, '2023-07-11 10:03:16', 'r', 'raveis', '', '09121212123', 18, 648, 'safd', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 14, '2023-11-17 12:37:30'),
(479, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:04:23', 'r', 'r', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 14, '2023-11-17 12:37:30'),
(480, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:08:09', 'r', 'r', '', '09121212123', 16, 602, 'ad', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 14, '2023-11-17 12:37:30'),
(481, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:09:51', 'r', 'r', '', '09121212123', 18, 648, 'asd', 1, '2000-01-01', 23, 16, 631, '', '', '', '4110', 14, '2023-11-17 12:37:30'),
(482, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:18:03', 'naic', 'naic', '', '09121212123', 17, 632, 'sdfa', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 14, '2023-11-17 12:37:30'),
(483, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-11 10:19:38', 'rabies', 'ra', '', '09121212123', 18, 648, 'asf', 1, '2000-01-01', 23, 18, 667, '', '', '', '4106', 14, '2023-11-17 12:37:30'),
(484, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:33:22', 'diph', 'diph', '', '09121212123', 18, 648, 'asf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 7, '2023-11-17 12:37:30'),
(485, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:34:12', 'diph', 'diph', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 7, '2023-11-17 12:37:30'),
(486, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:35:44', 'diph', 'diph', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 7, '2023-11-17 12:37:30'),
(487, 0, 0, 14.41187858581543, 120.84666442871094, '2023-07-11 10:37:06', 'diph', 'diph', '', '09121212123', 19, 668, 'asdf', 1, '2000-09-12', 22, 18, 665, '', '', '', '4106', 7, '2023-11-17 12:37:30'),
(488, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-11 10:38:03', 'dihp', 'diph', '', '09121212123', 1, 1, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 7, '2023-11-17 12:37:30'),
(489, 0, 0, 14.417131423950195, 120.85958099365234, '2023-07-11 10:39:41', 'diph', 'diph', '', '09121212123', 1, 1, 'asdf', 1, '2000-01-01', 23, 18, 662, '', '', '', '4106', 7, '2023-11-17 12:37:30'),
(490, 0, 0, 14.311731338500977, 120.7852783203125, '2023-07-11 10:57:33', 'naic', 'naic ', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 16, 627, '', '', '', '4110', 7, '2023-11-17 12:37:30'),
(491, 0, 0, 14.308341026306152, 120.96683502197266, '2023-07-12 08:16:45', 'dipg', 'diph', '', '09121212123', 18, 648, 'sdf', 1, '2000-01-01', 0, 6, 239, '', '', '', '4114', 7, '2023-11-17 12:37:30'),
(492, 0, 0, 14.320091247558594, 121.04210662841797, '2023-07-12 15:00:53', 'abd21', 'abd21', '', '09121212123', 18, 648, 'asd', 1, '2000-01-01', 23, 4, 141, '', '', '', '4116', 1, '2023-11-17 12:37:30'),
(493, 0, 0, 14.383919715881348, 120.9352798461914, '2023-07-12 15:02:12', 'abd22', 'abd22', '', '09121212123', 12, 512, 'asdf', 1, '2000-01-10', 23, 10, 391, '', '', '', '4103', 1, '2023-11-17 12:37:30'),
(494, 0, 0, 14.31809139251709, 121.04032135009766, '2023-07-12 15:02:33', 'abd23', 'abd23', '', '09121212123', 10, 379, 'asdf', 1, '2000-01-01', 23, 8, 332, '', '', '', '4117', 1, '2023-11-17 12:37:30'),
(495, 0, 0, 14.412993431091309, 120.97367858886719, '2023-07-12 15:02:56', 'abd24', 'abd24', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 3, 59, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(496, 0, 0, 14.460433006286621, 120.94245147705078, '2023-07-12 15:03:28', 'abd25', 'abd25', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 3, 69, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(497, 0, 0, 14.273909568786621, 120.7353515625, '2023-07-12 15:03:52', 'abd25', 'abd26', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 14, 570, '', '', '', '4112', 1, '2023-11-17 12:37:30'),
(498, 0, 0, 14.219467163085938, 120.9159164428711, '2023-07-12 15:04:20', 'abd26', 'abd26', '', '09121212123', 14, 551, 'asdf', 1, '2000-01-10', 23, 2, 49, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(499, 0, 0, 14.273320198059082, 120.86425018310547, '2023-07-12 15:04:42', 'abd27', 'abd27', '', '09121212123', 15, 578, 'asdf', 1, '2000-01-01', 23, 23, 825, '', '', '', '4109', 1, '2023-11-17 12:37:30'),
(500, 0, 0, 14.299017906188965, 120.95896911621094, '2023-07-12 15:05:00', 'abd28', 'abd28', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 6, 245, '', '', '', '4114', 1, '2023-11-17 12:37:30'),
(501, 0, 0, 14.288202285766602, 120.70984649658203, '2023-07-12 15:05:21', 'abd29', 'abd29', '', '09121212123', 2, 33, 'asdf', 1, '2000-01-01', 23, 22, 815, '', '', '', '4111', 1, '2023-11-17 12:37:30'),
(502, 0, 0, 14.479129791259766, 120.89696502685547, '2023-07-12 15:05:45', 'abd30', 'abd30', '', '09121212123', 17, 641, 'asdf', 1, '2000-01-01', 23, 5, 158, '', '', '', '4100', 1, '2023-11-17 12:37:30'),
(503, 0, 0, 14.2141752243042, 120.96873474121094, '2023-07-12 15:06:35', 'abd31', 'abd31', '', '09121212123', 18, 656, 'asdf', 1, '2000-01-01', 23, 19, 701, '', '', '', '4118', 1, '2023-11-17 12:37:30'),
(504, 0, 0, 14.443754196166992, 120.94603729248047, '2023-07-12 15:07:21', 'abd32', 'abd32', '', '09121212123', 6, 230, 'asdf', 1, '2000-01-01', 23, 3, 72, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(505, 0, 0, 14.305142402648926, 121.01276397705078, '2023-07-12 15:07:37', 'abd33', 'abd33', '', '09121212123', 6, 230, 'asdf', 1, '2000-01-10', 23, 8, 328, '', '', '', '4117', 1, '2023-11-17 12:37:30'),
(506, 0, 0, 14.421793937683105, 120.91017150878906, '2023-07-12 15:08:02', 'abd34', 'abd34', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-09', 23, 12, 531, '', '', '', '4104', 1, '2023-11-17 12:37:30'),
(507, 0, 0, 14.320091247558594, 121.04210662841797, '2023-07-12 15:08:21', 'abd35', 'abd35', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 4, 141, '', '', '', '4116', 1, '2023-11-17 12:37:30'),
(508, 0, 0, 14.400537490844727, 120.85133361816406, '2023-07-12 15:08:43', 'abd36', 'abd36', '', '09121212123', 4, 132, 'asdf', 1, '2000-01-01', 23, 21, 779, '', '', '', '4108', 1, '2023-11-17 12:37:30'),
(509, 0, 0, 14.34293270111084, 120.85031127929688, '2019-07-12 15:09:18', 'abd37', 'abd37', '', '09121212123', 6, 230, 'asdf', 1, '2000-01-01', 23, 21, 771, '', '', '', '4108', 1, '2023-11-17 12:37:30'),
(510, 0, 0, 14.174873352050781, 120.7479248046875, '2024-07-12 15:09:44', 'abd38', 'abd38', '', '09121212123', 5, 146, 'asdf', 1, '2000-01-01', 23, 13, 544, '', '', '', '4113', 1, '2023-11-17 12:37:30'),
(511, 0, 0, 14.321972846984863, 120.75444793701172, '2023-07-12 15:10:13', 'abd39', 'abd39', '', '09121212123', 3, 59, 'asdf', 1, '2000-01-01', 23, 16, 605, '', '', '', '4110', 1, '2023-11-17 12:37:30'),
(512, 0, 0, 14.383505821228027, 120.87901306152344, '2022-12-31 00:00:00', 'abd40', 'abd40', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 9, 361, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(513, 0, 0, 14.217589378356934, 120.78384399414062, '2021-07-12 15:11:57', 'abd41', 'abd41', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-10', 23, 7, 312, '', '', '', '4124', 1, '2023-11-17 12:37:30'),
(514, 0, 0, 14.158284187316895, 120.74649047851562, '2020-07-12 15:12:22', 'abd42', 'abd42', '', '09121212123', 6, 230, 'asdf', 1, '2000-01-01', 23, 13, 547, '', '', '', '4113', 1, '2023-11-17 12:37:30'),
(515, 0, 0, 14.385687828063965, 120.8803939819336, '2024-07-12 15:12:42', 'abd43', 'abd43', '', '09121212123', 5, 146, 'asdf', 1, '2000-01-02', 23, 9, 357, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(516, 0, 0, 14.391626358032227, 120.89112091064453, '2023-07-12 15:13:00', 'abd44', 'abd44', '', '09121212123', 5, 146, 'asdf', 1, '2000-01-01', 23, 5, 152, '', '', '', '4100', 1, '2023-11-17 12:37:30'),
(517, 0, 0, 14.451913833618164, 120.92093658447266, '2022-07-12 15:13:56', 'abd45', 'abd45', '', '09121212123', 7, 305, 'asdf', 1, '2000-01-01', 23, 12, 520, '', '', '', '4104', 1, '2023-11-17 12:37:30'),
(518, 0, 0, 14.138459205627441, 120.90945434570312, '2021-07-12 15:14:41', 'abd46', 'abd46', '', '09121212123', 8, 319, 'asdf', 1, '2000-01-01', 23, 15, 590, '', '', '', '4121', 1, '2023-11-17 12:37:30'),
(519, 0, 0, 14.086523056030273, 120.88003540039062, '2020-07-12 15:15:39', 'abd47', 'abd47', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-02', 23, 1, 16, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(520, 0, 0, 14.395807266235352, 120.94245147705078, '2024-07-12 15:15:58', 'abd48', 'abd48', '', '09121212123', 11, 476, 'asdf', 1, '2000-01-01', 23, 10, 386, '', '', '', '4103', 1, '2023-11-17 12:37:30'),
(521, 0, 0, 14.430102348327637, 120.87501525878906, '2023-07-12 15:16:29', 'abd48', 'abd48', '', '09121212123', 15, 578, 'asdf', 1, '2000-01-01', 23, 17, 642, '', '', '', '4105', 1, '2023-11-17 12:37:30'),
(522, 0, 0, 14.12193489074707, 120.93647766113281, '2022-07-12 15:17:37', 'abd49', 'abd49', '', '09121212123', 5, 146, 'asdf', 1, '2000-01-01', 23, 20, 744, '', '', '', '4120', 1, '2023-11-17 12:37:30'),
(523, 0, 0, 14.169275283813477, 120.92221069335938, '2021-07-12 15:18:03', 'abd50', 'abd50', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 2, 36, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(524, 0, 0, 14.310818672180176, 121.0409927368164, '2020-07-12 15:25:46', 'abd51', 'abd51', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 4, 138, '', '', '', '4116', 1, '2023-11-17 12:37:30'),
(525, 0, 0, 14.412993431091309, 120.97367858886719, '2024-07-12 15:26:20', 'abd52', 'abd52', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 3, 64, '', '', '', '4102', 1, '2023-11-17 12:37:30'),
(526, 0, 0, 14.469040870666504, 120.88972473144531, '2023-07-12 15:26:49', 'abd53', 'abd53', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 5, 149, '', '', '', '4100', 1, '2023-11-17 12:37:30'),
(527, 0, 0, 14.169275283813477, 120.92221069335938, '2022-07-12 15:27:14', 'abd54', 'abd54', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 2, 36, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(528, 0, 0, 14.192038536071777, 120.87286376953125, '2021-07-12 15:27:56', 'abd55', 'abd55', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 11, 480, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(529, 0, 0, 14.223557472229004, 120.88721466064453, '2020-07-12 15:28:30', 'abd56', 'abd56', '', '09121212123', 11, 476, 'asdf', 1, '2000-01-10', 23, 11, 477, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(530, 0, 0, 14.210517883300781, 120.86998748779297, '2024-07-12 15:29:36', 'abd57', 'abd57', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 11, 488, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(531, 0, 0, 14.197063446044922, 120.8829116821289, '2022-07-12 15:30:37', 'abd58', 'abd58', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-02', 23, 11, 500, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(532, 0, 0, 14.190130233764648, 120.90443420410156, '2021-07-12 15:31:52', 'abd59', 'abd59', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 11, 487, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(533, 0, 0, 14.187417030334473, 120.88721466064453, '2020-07-12 15:33:02', 'abd60', 'abd60', '', '09121212123', 18, 648, 'sdf', 1, '2000-01-10', 23, 11, 485, '', '', '', '4122', 1, '2023-11-17 12:37:30'),
(534, 0, 0, 14.2118501663208, 120.9331283569336, '2023-07-18 06:35:34', 'abd61', 'abd61', '', '09121212123', 19, 668, 'asda', 1, '2000-01-01', 23, 2, 33, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(535, 0, 0, 14.412993431091309, 120.97367858886719, '2023-07-18 10:08:14', 'ames12', 'ames12', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 3, 59, '', '', '', '4102', 5, '2023-11-17 12:37:30'),
(536, 0, 0, 14.440290451049805, 120.88506317138672, '2023-07-18 10:09:42', 'aefi5', 'aefi5', '', '09121212123', 8, 319, 'asdf', 1, '2000-01-01', 23, 17, 641, '', '', '', '4105', 2, '2023-11-17 12:37:30'),
(537, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-18 10:36:29', 'dengue10', 'dengue10', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-10', 23, 18, 667, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(538, 0, 0, 14.302495956420898, 120.73212432861328, '2023-07-19 12:49:32', 'abd70', 'abd70', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 22, 814, '', '', '', '4111', 1, '2023-11-17 12:37:30'),
(539, 0, 0, 14.158284187316895, 120.74649047851562, '2023-07-19 12:50:00', 'abd71', 'abd71', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 13, 547, '', '', '', '4113', 1, '2023-11-17 12:37:30'),
(540, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-23 17:27:53', 'abd72', 'abd72', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 1, '2023-11-17 12:37:30'),
(541, 0, 0, 14.296486854553223, 120.7924575805664, '2023-07-23 17:29:18', 'abd73', 'abd73', '', '09121212123', 16, 613, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 1, '2023-11-17 12:37:30'),
(542, 0, 0, 14.32112979888916, 120.77378845214844, '2023-07-23 17:32:37', 'abd73', 'abd73', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 16, 613, '', '', '', '4110', 1, '2023-11-17 12:37:30'),
(543, 0, 0, 14.40904712677002, 120.8506088256836, '2023-07-23 17:33:45', 'hfmd8', 'hfmd8', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 665, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(544, 0, 0, 14.408166885375977, 120.84774017333984, '2023-07-23 17:34:53', 'hfmd9', 'hfmd9', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(545, 0, 0, 14.414595603942871, 120.85025024414062, '2023-07-23 17:36:50', 'hfmd10', 'hfmd10', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 661, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(546, 0, 0, 14.407960891723633, 120.84917449951172, '2023-07-23 17:37:41', 'hfmd11', 'hfmd11', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(547, 0, 0, 14.40904712677002, 120.8506088256836, '2023-07-23 17:38:35', 'hfmd12', 'hfmd12', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 665, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(548, 0, 0, 14.408166885375977, 120.84774017333984, '2023-07-23 17:39:31', 'hfmd13', 'hfmd13', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(549, 0, 0, 14.41187858581543, 120.84666442871094, '2023-07-23 17:42:12', 'hmfd14', 'hmfd14', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 665, '', '', '', '4106', 8, '2023-11-17 12:37:30'),
(550, 0, 0, 14.42208480834961, 120.86783599853516, '2023-07-26 18:22:52', 'asdf', 'asdf', '', '09121212123', 15, 578, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(551, 0, 0, 14.10807991027832, 120.83697509765625, '2023-07-27 18:14:37', 'hmfd15', 'hmfd15', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 1, 7, '', '', '', '4123', 8, '2023-11-17 12:37:30'),
(552, 0, 0, 14.073604583740234, 120.85276794433594, '2023-08-10 14:11:05', 'abdtrial1', 'abdtrial1', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 1, 2, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(553, 0, 0, 14.2118501663208, 120.9331283569336, '2023-08-10 14:12:04', 'abdtrial2', 'abdtrial2', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 2, 33, '', '', '', '4119', 1, '2023-11-17 12:37:30'),
(554, 0, 0, 14.135186195373535, 120.85742950439453, '2023-08-10 14:12:42', 'abdtrial3', 'abdtrial3', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 1, 3, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(555, 0, 0, 14.42208480834961, 120.86783599853516, '2023-08-10 14:14:07', 'abdtrial4', 'abdtrial4', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(556, 0, 0, 14.130499839782715, 120.85635375976562, '2023-08-10 14:14:42', 'abdtrial5', 'abdtrial5', '', '09121212123', 14, 551, 'asd', 1, '2000-01-10', 23, 1, 6, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(561, 0, 0, 14.407960891723633, 120.84917449951172, '2023-08-17 08:02:59', 'newapitest', 'newapitest', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'blk 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(563, 0, 0, 14.407960891723633, 120.84917449951172, '2023-08-17 08:18:17', 'raven', 'solis', 'calinao', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'block 10 lot 29', 'karla ville subd', '4106', 1, '2023-11-17 12:37:30'),
(564, 0, 0, 14.417131423950195, 120.85958099365234, '2023-08-17 08:19:31', 'armil', 'balatbat', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 662, 'Kadena De Amor Street', '517', '', '4106', 1, '2023-11-17 12:37:30'),
(565, 0, 0, 14.398392677307129, 120.84458923339844, '2023-08-17 08:21:36', 'jake', 'saguid', '', '09121212123', 21, 766, 'asd', 1, '2000-01-10', 23, 21, 791, 'Sampaguita Street', '24', '', '4108', 1, '2023-11-17 12:37:30'),
(566, 0, 0, 14.326935768127441, 120.8326644897461, '2023-08-18 09:40:31', 'shara', 'abutin', '', '09121212123', 18, 648, 'sdf', 1, '2000-01-01', 23, 21, 806, '', '319', '', '4108', 1, '2023-11-17 12:37:30'),
(567, 0, 0, 14.372941970825195, 120.9796142578125, '2023-08-18 09:54:29', 'menard', 'de sagun', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 21, 766, '', 'Blk 10 Lot 3 ', 'casa amaya south', '4108', 1, '2023-11-17 12:37:30'),
(568, 0, 0, 14.401119232177734, 120.85344696044922, '2023-08-18 09:55:23', 'Louisa Jea', 'diano', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, 'tramo street', '', '', '4106', 1, '2023-11-17 12:37:30'),
(569, 0, 0, 14.336817741394043, 120.77974700927734, '2023-08-18 10:12:59', 'iverson', 'lomat', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-01', 23, 16, 631, '', '026', '', '4110', 1, '2023-11-17 12:37:30'),
(570, 0, 0, 14.417131423950195, 120.85958099365234, '2023-08-18 10:14:29', 'monzales', 'yannica', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 662, '', 'Blk 13 Lot 25', 'parkville', '4106', 1, '2023-11-17 12:37:30'),
(571, 0, 0, 14.37763786315918, 120.82620239257812, '2023-08-18 10:16:12', 'delwin', 'pareja', '', '09121212123', 21, 784, 'asdf', 1, '2000-01-10', 23, 21, 772, 'liko street', '125 14', '', '4108', 1, '2023-11-17 12:37:30'),
(572, 0, 0, 14.324776649475098, 120.77774810791016, '2023-08-18 10:18:43', 'velarde', 'ydrian', '', '09121212123', 16, 602, 'asdf', 1, '2000-01-10', 23, 16, 613, '', '', 'villa apolonia subd', '4110', 1, '2023-11-17 12:37:30'),
(573, 0, 0, 14.430952072143555, 120.89151763916016, '2023-08-18 10:25:31', 'joy', 'villaluz', '', '09121212123', 17, 632, 'asdf', 2, '2000-01-01', 23, 12, 519, 'Potol', '386 ', '', '4104', 1, '2023-11-17 12:37:30'),
(574, 0, 0, 14.197063446044922, 120.8829116821289, '2023-08-18 10:31:45', 'indang', 'indang', '', '09121212123', 11, 476, 'asdf', 1, '2000-01-01', 23, 11, 500, 'rough road street', '', 'agatha subd', '4122', 1, '2023-11-17 12:37:30'),
(575, 0, 0, 14.245633125305176, 120.8785629272461, '2023-08-19 17:21:42', 'caloy', 'modesto', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-01', 23, 21, 796, 'boracay street', '43', '', '4108', 1, '2023-11-17 12:37:30'),
(576, 0, 0, 14.359978675842285, 120.79316711425781, '2023-08-19 17:25:12', 'paul', 'bocalan', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-01', 23, 21, 783, '', '', 'Peters Compound', '4108', 1, '2023-11-17 12:37:30'),
(577, 0, 0, 14.390832901000977, 120.83338165283203, '2023-08-19 17:29:15', 'justine', 'odono', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-10', 23, 21, 767, 'Phase A', ' block 2 lot 13 ', 'Istana', '4108', 1, '2023-11-17 12:37:30'),
(578, 0, 0, 14.398392677307129, 120.84458923339844, '2023-08-19 17:32:55', 'jake2', 'saguid2', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-01', 23, 21, 791, 'Sampaguita Street', '027', '', '4108', 1, '2023-11-17 12:37:30'),
(579, 0, 0, 14.245633125305176, 120.8785629272461, '2023-08-19 18:13:00', 'noy2', 'noy2', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-10', 23, 9, 375, 'Majestic Street ', 'Blk 14 Lot 17', 'Ville De Palm Subd', '4107', 1, '2023-11-17 12:37:30'),
(581, 0, 0, 14.245633125305176, 120.8785629272461, '2023-08-19 18:23:51', 'santiago', 'santiago', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(582, 0, 0, 14.245633125305176, 120.8785629272461, '2023-08-19 18:27:42', 'santiago2', 'santiago2', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(583, 0, 0, 14.2456329, 120.8785658, '2023-08-19 18:29:18', 'santiago3', 'santiago3', '', '09121212123', 18, 648, 'asd', 1, '2000-01-10', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(584, 0, 0, 14.2456329, 120.8785658, '2023-08-19 18:38:47', 'santiago4', 'santiago4', '', '09121212123', 1, 1, 'asdf', 1, '2000-10-10', 22, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(585, 0, 0, 14.2456329, 120.8785658, '2023-08-20 17:55:38', 'santiago6', 'santiago6', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, 'Majestic Palm St. ', 'Blk 14 Lot 17', 'Villa de Palme', '4107', 1, '2023-11-17 12:37:30'),
(586, 0, 0, 14.4791297, 120.8969634, '2023-08-20 17:58:01', 'santiago7', 'santiago7', '', '09121212123', 1, 1, 'sadf', 1, '2000-01-01', 23, 9, 375, 'Majestic Street', 'Blk 14 Lot 17', 'Ville De Palme Subd', '4107', 1, '2023-11-17 12:37:30'),
(588, 0, 0, 14.2456329, 120.8785658, '2023-08-20 18:01:22', 'santiago8', 'santiago8', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, 'Majestic Palm Street', 'Blk 14 Lot 17', 'Ville De Palme Subd', '4107', 1, '2023-11-17 12:37:30'),
(589, 0, 0, 14.3450617, 120.8053835, '2023-08-20 18:07:04', 'caloy2', 'caloy2', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-10', 23, 21, 796, '', '', '', '4108', 1, '2023-11-17 12:37:30'),
(590, 0, 0, 14.2456329, 120.8785658, '2023-08-21 15:41:44', 'santiago9', 'santiago9', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(591, 0, 0, 14.2456329, 120.8785658, '2023-08-21 15:55:14', 'santiago3', 'santiago3', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-01', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30');
INSERT INTO `patients` (`patientId`, `createdby_id`, `nurse_id`, `latitude`, `longitude`, `creationDate`, `firstName`, `lastName`, `middleName`, `contact`, `munCityOfDRU`, `brgyOfDRU`, `addressOfDRU`, `gender`, `dob`, `age`, `municipality`, `barangay`, `street`, `unitCode`, `subd`, `postalCode`, `disease`, `updated_at`) VALUES
(592, 0, 0, 14.3214094, 120.907304, '2023-08-21 15:56:27', 'santiago10', 'santiago10', '', '09121212123', 9, 346, 'asdf', 1, '2000-01-10', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(593, 0, 0, 14.3214094, 120.907304, '2023-08-21 15:58:31', 'santiago11', 'santiago11', '', '09121212123', 9, 375, 'asdf', 1, '2000-01-10', 23, 9, 375, '', '', '', '4107', 1, '2023-11-17 12:37:30'),
(594, 0, 0, 14.3450617, 120.8053835, '2023-08-21 16:36:32', 'caloy3', 'caloy3', '', '09121212123', 1, 1, 'asdf', 1, '2000-01-01', 23, 21, 796, '', '', '', '4108', 1, '2023-11-17 12:37:30'),
(595, 0, 0, 14.3766258, 120.8197436, '2023-08-21 16:46:10', 'wangso1', 'wangso1', '', '09121212123', 21, 766, 'asdf', 1, '2000-01-01', 23, 21, 766, '', '', '', '4108', 1, '2023-11-17 12:37:30'),
(596, 0, 0, 14.4079605, 120.8491766, '2023-08-27 08:52:14', 'raven2', 'raven2', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'b10 lot29 ', 'karla ville subd', '4106', 13, '2023-11-17 12:37:30'),
(597, 0, 0, 14.410627, 120.848369, '2023-08-27 08:55:18', 'sample1', 'sample1', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', 'b4 l1', 'karla ville subd', '4106', 13, '2023-11-17 12:37:30'),
(598, 0, 0, 14.4079605, 120.8491766, '2023-08-27 08:57:08', 'sample2', 'sample2', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 667, '', 'b21 l9', 'karla ville subd', '4106', 13, '2023-11-17 12:37:30'),
(599, 0, 0, 14.4079605, 120.8491766, '2023-08-27 08:59:15', 'sample3 ', 'sample3 ', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'LITTLE BAGUIO ST', '290 A ', '', '4106', 13, '2023-11-17 12:37:30'),
(600, 0, 0, 14.4079605, 120.8491766, '2023-08-27 09:01:34', 'sample3.1', 'sample3.1', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 667, 'Little Baguio St', '290 A', '', '4106', 13, '2023-11-17 12:37:30'),
(601, 0, 0, 14.4079605, 120.8491766, '2023-08-27 09:03:23', 'sample3.2', 'sample3.2', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'Litte Baguio St', '290 A', '', '4106', 13, '2023-11-17 12:37:30'),
(602, 0, 0, 14.2456329, 120.8785658, '2023-08-27 09:04:18', 'sample3.2', 'sample3.2', '', '09121212123', 18, 648, 'asdf', 1, '0000-00-00', 0, 18, 667, 'LITTLE BAGUIO ST', '290 A', '', '4106', 13, '2023-11-17 12:37:30'),
(603, 0, 0, 14.2456329, 120.8785658, '2023-08-27 09:06:31', 'sample4', 'sample4', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'Habagat St', '406', '', '4106', 13, '2023-11-17 12:37:30'),
(604, 0, 0, 14.4079605, 120.8491766, '2023-08-27 09:08:05', 'sample4.1', 'sample4.1', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'Habagat St', '206', '', '4106', 13, '2023-11-17 12:37:30'),
(605, 0, 0, 14.4079605, 120.8491766, '2023-08-27 09:10:38', 'sample4.2', 'sample4.2', '', '09121212123', 18, 662, 'asdf', 1, '2000-01-01', 23, 18, 667, 'Habagat St', '406', '', '4106', 13, '2023-11-17 12:37:30'),
(606, 0, 0, 14.4079605, 120.8491766, '2023-08-27 09:11:55', 'sample4.3', 'sample4.3', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'Habagat St', '406', '', '4106', 13, '2023-11-17 12:37:30'),
(607, 0, 0, 14.4101732, 120.8471205, '2023-08-27 09:13:40', 'sample5', 'sample5', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'D.P. Jimenez Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(608, 0, 0, 14.4097492, 120.8471661, '2023-08-27 09:15:13', 'sample5.1', 'sample5.1', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, 'D.P. Jimenez Street', '70', '', '4106', 13, '2023-11-17 12:37:30'),
(609, 0, 0, 14.4101732, 120.8471205, '2023-08-27 09:16:42', 'sample6', 'sample6', '', '09121212123', 18, 648, 'asdfasdf', 1, '0000-00-00', 0, 18, 667, 'D.P. Jimenez Street', '2703', '', '4106', 13, '2023-11-17 12:37:30'),
(610, 0, 0, 14.4131488, 120.8465633, '2023-08-27 09:19:06', 'sample7', 'sample7', '', '09121212123', 18, 648, 'asdfasdf', 1, '2000-01-01', 23, 18, 665, 'AC Mercado Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(611, 0, 0, 14.4118788, 120.8466643, '2023-08-27 09:21:04', 'sample7.1', 'sample7.1', '', '09121212123', 18, 648, 'asdfasdf', 1, '2000-01-01', 23, 18, 665, 'Habagat Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(612, 0, 0, 14.4116706, 120.8476112, '2023-08-27 09:23:03', 'sample8', 'sample8', '', '09121212123', 18, 648, 'asdfasdf', 1, '2000-01-01', 23, 18, 665, 'D.P. Jimenez Street', '46', '', '4106', 13, '2023-11-17 12:37:30'),
(613, 0, 0, 14.4130972, 120.8481672, '2023-08-27 09:24:47', 'sample9', 'sample9', '', '09121212123', 18, 648, 'asdfasdf', 1, '2000-01-01', 23, 18, 666, 'D.P. Jimenez Street', '24', '', '4106', 13, '2023-11-17 12:37:30'),
(614, 0, 0, 14.4131488, 120.8465633, '2023-08-27 09:26:21', 'sample10', 'sample10', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, 'AC Mercado Street', 'block 3', '', '4106', 13, '2023-11-17 12:37:30'),
(615, 0, 0, 14.4131488, 120.8465633, '2023-08-27 09:28:10', 'sample11', 'sample11', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, 'AC Mercado Street', 'blk 9 ', '', '4106', 13, '2023-11-17 12:37:30'),
(616, 0, 0, 14.4130861, 120.8481352, '2023-08-27 09:29:54', 'sample12', 'sample12', '', '09121212123', 18, 648, 'asdf', 1, '2000-10-01', 22, 18, 666, 'D.P Jimenez', 'block 3', '', '4106', 13, '2023-11-17 12:37:30'),
(617, 0, 0, 14.4142587, 120.8480999, '2023-08-27 09:31:21', 'sample13', 'sample13', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(618, 0, 0, 14.413453, 120.8490645, '2023-08-27 09:34:47', 'sample14', 'sample14', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 666, 'C. Abueg Street', '616', '', '4106', 13, '2023-11-17 12:37:30'),
(619, 0, 0, 14.4148546, 120.8520408, '2023-08-27 09:37:58', 'sample15', 'sample15', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 658, 'C. Abueg Street', '15', '', '4106', 13, '2023-11-17 12:37:30'),
(620, 0, 0, 14.4149489, 120.8521733, '2023-08-27 09:39:11', 'sample16', 'sample16', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 658, 'C. Abueg St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(621, 0, 0, 14.415207, 120.852754, '2023-08-27 09:40:42', 'sample17', 'sample17', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 658, 'C. Abueg St', '', 'Manggahan Compound', '4106', 13, '2023-11-17 12:37:30'),
(622, 0, 0, 14.414982, 120.8497275, '2023-08-27 09:44:29', 'sample18', 'sample18', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 660, 'Manuel C. Lorenzo', '', '', '4106', 13, '2023-11-17 12:37:30'),
(624, 0, 0, 14.4161988, 120.8480999, '2023-08-27 09:48:25', 'sample19', 'sample19', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 660, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(625, 0, 0, 14.4150088, 120.8473821, '2023-08-27 09:50:53', 'sample20', 'sample20', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 659, 'Callejon 5', '', '', '4106', 13, '2023-11-17 12:37:30'),
(626, 0, 0, 14.4183071, 120.8491766, '2023-08-27 09:51:54', 'sample21', 'sample21', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 659, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(627, 0, 0, 14.4155501, 120.8504702, '2023-08-27 09:53:22', 'sample22', 'sample22', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 660, 'Abadilla Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(628, 0, 0, 14.4176213, 120.8514726, '2023-08-27 09:54:40', 'sample23', 'sample23', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 659, 'P. Burgos Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(629, 0, 0, 14.4145953, 120.8502533, '2023-08-27 09:56:54', 'sample24', 'sample24', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 661, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(630, 0, 0, 14.4190185, 120.8533082, '2023-08-27 10:00:46', 'sample25', 'sample25', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 656, 'Gov. Pugeda', '', '', '4106', 13, '2023-11-17 12:37:30'),
(631, 0, 0, 14.4206485, 120.8531244, '2023-08-27 10:02:20', 'sample26', 'sample26', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 656, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(632, 0, 0, 14.4203382, 120.8552777, '2023-08-27 10:03:32', 'sample27', 'sample27', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 655, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(633, 0, 0, 14.4199397, 120.8547761, '2023-08-27 10:04:38', 'sample28', 'sample28', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 655, 'Dr. P. Giongco', '', '', '4106', 13, '2023-11-17 12:37:30'),
(634, 0, 0, 14.4171222, 120.857701, '2023-08-27 10:06:11', 'sample29', 'sample29', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 663, 'Ave Maria St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(635, 0, 0, 14.4160447, 120.8581487, '2023-08-27 10:18:11', 'sample30', 'sample30', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 663, 'Biac Na Bato', '', '', '4106', 13, '2023-11-17 12:37:30'),
(636, 0, 0, 14.4171311, 120.8595842, '2023-08-27 10:20:07', 'sample31', 'sample31', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 662, 'Biac na bato street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(637, 0, 0, 14.4171222, 120.857701, '2023-08-27 10:27:23', 'sample32', 'sample32', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 663, 'Ave Maria St.', '049', 'Norvioric Subdivision', '4106', 13, '2023-11-17 12:37:30'),
(638, 0, 0, 14.4171311, 120.8595842, '2023-08-27 10:28:24', 'sample33', 'sample33', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 662, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(639, 0, 0, 14.3166427, 120.7644481, '2023-08-27 10:29:53', 'sample34', 'sample34', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 650, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(640, 0, 0, 14.4191122, 120.8576172, '2023-08-27 10:31:36', 'sample35', 'sample35', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 662, 'Marsellia St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(641, 0, 0, 14.4220844, 120.8678378, '2023-08-27 10:33:44', 'sample36', 'sample36', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(642, 0, 0, 14.4195755, 120.8628139, '2023-08-27 10:34:55', 'sample37', 'sample37', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 649, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(643, 0, 0, 14.4225632, 120.8652583, '2023-08-27 10:37:43', 'sample38', 'sample38', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, 'Sampaguita St', '', 'Sunrise Subd', '4106', 13, '2023-11-17 12:37:30'),
(644, 0, 0, 14.4283437, 120.8692731, '2023-08-27 10:40:36', 'sample39', 'sample39', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 651, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(645, 0, 0, 14.4258217, 120.8710673, '2023-08-27 10:41:35', 'sample40', 'sample40', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 652, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(646, 0, 0, 14.4263459, 120.8699906, '2023-08-27 10:42:41', 'sample41', 'sample41', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-02', 23, 18, 652, '', '', 'Rodriguez Subd', '4106', 13, '2023-11-17 12:37:30'),
(647, 0, 0, 14.4209204, 120.8714262, '2023-08-27 10:43:45', 'sample42', 'sample42', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 653, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(648, 0, 0, 14.4209204, 120.8714262, '2023-08-27 10:48:21', 'sample43', 'sample43', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 653, 'Tramo Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(649, 0, 0, 14.4192192, 120.8659324, '2023-08-27 10:49:11', 'sample44', 'sample44', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 653, 'Dama de noche street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(650, 0, 0, 14.4260609, 120.8652845, '2023-08-27 10:51:38', 'sample45', 'sample45', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-10', 23, 18, 654, 'B. Toledo St.', '', '', '4106', 13, '2023-11-17 12:37:30'),
(651, 0, 0, 14.4209204, 120.8714262, '2023-08-27 10:53:21', 'sample46', 'sample46', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 653, 'Acacia St.', '', '', '4106', 13, '2023-11-17 12:37:30'),
(652, 0, 0, 14.2456329, 120.8785658, '2023-08-27 10:56:48', 'sample47', 'sample47', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, 'Sitio Banal St.', '', '', '4106', 13, '2023-11-17 12:37:30'),
(653, 0, 0, 14.4085569, 120.8585076, '2023-08-27 10:58:36', 'sample48', 'sample48', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, 'Hacienda St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(654, 0, 0, 14.4085569, 120.8585076, '2023-08-27 11:00:54', 'sample49', 'sample49', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(655, 0, 0, 14.4013544, 120.8614236, '2023-08-27 11:02:55', 'sample50', 'sample50', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, 'Sampaguita Street', '', 'Cuevas Subd', '4106', 13, '2023-11-17 12:37:30'),
(656, 0, 0, 14.4013544, 120.8614236, '2023-08-27 11:19:48', 'sample51', 'sample51', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 664, '', '', 'Cuevas Subd', '4106', 13, '2023-11-17 12:37:30'),
(657, 0, 0, 14.4210326, 120.8613104, '2023-08-27 11:26:37', 'sample52', 'sample52', '', '09121212123', 18, 648, 'sdf', 1, '2000-01-01', 23, 18, 662, 'J.K. Mata Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(671, 0, 0, 14.4161867, 120.8549188, '2023-09-01 09:44:31', 'sample 53', 'sample 53', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 657, '', '', '', '4106', 13, '2023-11-17 12:37:30'),
(672, 0, 0, 14.4170164, 120.8540043, '2023-09-01 10:00:48', 'sample 54', 'sample 54', '', '09121212123', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 657, 'N Ner Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(673, 0, 0, 14.4181038, 120.8539418, '2023-09-01 10:40:12', 'sample 55', 'sample 55', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 657, 'Rizal Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(674, 0, 0, 14.4180208, 120.855149, '2023-09-01 11:38:31', 'sample 56', 'sample 56', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 657, 'C. Mata Street', '', '', '4106', 13, '2023-11-17 12:37:30'),
(675, 0, 0, 14.4188685, 120.8554557, '2023-09-01 11:49:24', 'sample 57', 'sample 57', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 657, 'Dr P. Giongco', '', '', '4106', 13, '2023-11-17 12:37:30'),
(676, 0, 0, 14.4233341, 120.8680037, '2023-09-01 12:50:07', 'sample 59', 'sample 59', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', 'greenfield subd', '4106', 13, '2023-11-17 12:37:30'),
(677, 0, 0, 14.4233341, 120.8680037, '2023-09-01 12:51:09', 'sample 60', 'sample 60', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, 'Jupiter St', '', 'green field subd', '4106', 13, '2023-11-17 12:37:30'),
(678, 0, 0, 14.4218527, 120.8677658, '2023-09-01 12:52:04', 'sample 61', 'sample 61', '', '09121212123', 19, 668, 'asdf', 1, '2000-01-01', 23, 18, 648, 'Jupiter St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(679, 0, 0, 14.4215353, 120.8674801, '2023-09-01 13:04:11', 'sample 62', 'sample 62', '', '09121212123', 18, 648, 'hj', 1, '2000-01-01', 23, 18, 648, 'Venus St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(680, 0, 0, 14.422198, 120.8653833, '2023-09-01 13:05:41', 'sample 63', 'sample 63', '', '09121212123', 17, 632, 'hj', 1, '2000-01-01', 23, 18, 648, 'Dona Aurora', '', '', '4106', 13, '2023-11-17 12:37:30'),
(681, 0, 0, 14.4260252, 120.8664872, '2023-09-01 13:12:28', 'sample 64', 'sample 64', '', '09121212123', 18, 648, 'hj', 1, '2000-01-01', 23, 18, 654, 'Don Basilio Leyva St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(682, 0, 0, 14.4265196, 120.8672601, '2023-09-01 13:13:52', 'sample 65', 'sample 65', '', '09121212123', 18, 648, 'hj', 1, '2000-01-01', 23, 18, 654, 'J. Ricafrente St', '', '', '4106', 13, '2023-11-17 12:37:30'),
(683, 0, 0, 14.4178934, 120.8535096, '2023-09-02 06:29:58', 'sample 66', 'sample 66', '', '09121212123', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 657, 'Buenaflor', '', '', '4106', 13, '2023-11-17 12:37:30'),
(687, 0, 0, 14.1377669, 120.8574309, '2023-09-23 08:36:59', 'testing3', 'testing3', '', '09121212123', 1, 1, '', 1, '2000-10-10', 22, 1, 1, '', '', '', '4123', 1, '2023-11-17 12:37:30'),
(688, 0, 0, 13.5555, 123.4567, '2023-10-29 08:00:00', 'John', 'Doe', 'A.', '09123456789', 1, 101, '123 Main St', 1, '1990-01-15', 33, 1, 101, 'Main Street', 'Apt 3A', 'Subdivision A', '12345', 5, '2023-11-17 12:37:30'),
(689, 0, 0, 14.1234, 121.9876, '2023-10-29 09:30:00', 'Jane', 'Smith', 'B.', '09876543210', 2, 201, '456 Elm St', 2, '1985-05-20', 38, 2, 201, 'Elm Avenue', 'Unit 2B', 'Subdivision B', '54321', 7, '2023-11-17 12:37:30'),
(690, 0, 0, 12.3456, 124.5678, '2023-10-29 10:45:00', 'Michael', 'Johnson', NULL, '07123456789', 3, 301, '789 Oak St', 1, '1978-12-10', 45, 3, 301, 'Oak Lane', '', 'Subdivision C', '67890', 2, '2023-11-17 12:37:30'),
(691, 0, 0, 10.9876, 123.4567, '2023-10-29 12:15:00', 'Sarah', 'Williams', 'C.', '09109876543', 2, 202, '234 Pine St', 2, '1980-07-25', 43, 2, 202, 'Pine Road', 'Apt 5C', '', '43210', 4, '2023-11-17 12:37:30'),
(692, 0, 0, 14.1111, 120.9876, '2023-10-29 14:30:00', 'David', 'Brown', 'D.', '09785634129', 1, 102, '567 Cedar St', 1, '1995-03-05', 28, 1, 102, 'Cedar Street', 'Unit 1D', '', '56789', 6, '2023-11-17 12:37:30'),
(693, 0, 0, 13.6543, 121.1111, '2023-10-29 16:45:00', 'Emily', 'Lee', 'E.', '08123456789', 4, 401, '678 Maple St', 2, '1998-09-18', 25, 2, 202, 'Maple Avenue', 'Unit 4A', 'Subdivision D', '34567', 3, '2023-11-17 12:37:30'),
(694, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'James', 'Clark', NULL, '09091234567', 1, 101, '123 Birch St', 1, '1972-11-30', 50, 1, 101, 'Birch Lane', '', 'Subdivision E', '76543', 8, '2023-11-17 12:37:30'),
(695, 0, 0, 14.9876, 122.3456, '2023-10-29 19:30:00', 'Olivia', 'Martinez', 'F.', '07712345689', 3, 301, '456 Pine St', 2, '1983-04-12', 40, 2, 201, 'Pine Road', 'Apt 2C', 'Subdivision F', '87654', 1, '2023-11-17 12:37:30'),
(696, 0, 0, 13.4321, 124.4321, '2023-10-29 21:45:00', 'Daniel', 'Garcia', 'G.', '09234123456', 4, 401, '789 Cedar St', 1, '1992-06-08', 31, 1, 102, 'Cedar Street', 'Unit 3B', 'Subdivision G', '23456', 7, '2023-11-17 12:37:30'),
(697, 0, 0, 10.5555, 123.9876, '2023-10-29 23:15:00', 'Sophia', 'Lopez', 'H.', '08876543210', 2, 201, '234 Elm St', 2, '1999-12-22', 23, 2, 202, 'Elm Avenue', 'Unit 5A', '', '65432', 5, '2023-11-17 12:37:30'),
(698, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Ella', 'Rodriguez', 'I.', '09654321098', 2, 202, '345 Oak St', 2, '2005-08-17', 18, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 1, '2023-11-17 12:37:30'),
(699, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'Liam', 'Gonzales', 'J.', '09876543210', 3, 301, '678 Pine St', 1, '2006-11-03', 16, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 1, '2023-11-17 12:37:30'),
(700, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Aiden', 'Hernandez', 'K.', '07123456789', 1, 101, '234 Cedar St', 1, '2008-03-25', 14, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 1, '2023-11-17 12:37:30'),
(701, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Sophia', 'Flores', 'L.', '09234567890', 2, 201, '567 Elm St', 2, '2007-06-12', 15, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 1, '2023-11-17 12:37:30'),
(702, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Mason', 'Santos', 'M.', '08876543210', 1, 101, '789 Maple St', 1, '2010-02-08', 12, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 1, '2023-11-17 12:37:30'),
(703, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Lucas', 'Reyes', 'N.', '09987654321', 3, 301, '123 Birch St', 2, '2011-05-30', 10, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 1, '2023-11-17 12:37:30'),
(704, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Lily', 'Gomez', 'O.', '09123456789', 2, 202, '456 Pine St', 2, '2013-07-10', 8, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 1, '2023-11-17 12:37:30'),
(705, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Logan', 'Perez', 'P.', '07123456789', 1, 101, '789 Elm St', 1, '2014-11-20', 7, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 1, '2023-11-17 12:37:30'),
(706, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Ava', 'Torres', 'Q.', '09109876543', 3, 301, '234 Oak St', 2, '2015-09-14', 6, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 1, '2023-11-17 12:37:30'),
(707, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Noah', 'Ortega', 'R.', '08876543210', 4, 401, '567 Cedar St', 1, '2016-12-22', 4, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 1, '2023-11-17 12:37:30'),
(708, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Emma', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '2002-04-15', 21, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 1, '2023-11-17 12:37:30'),
(709, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'William', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1995-06-10', 28, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 1, '2023-11-17 12:37:30'),
(710, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Olivia', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '1996-09-05', 27, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 1, '2023-11-17 12:37:30'),
(711, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Liam', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1997-11-15', 26, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 1, '2023-11-17 12:37:30'),
(712, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Sophia', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '2001-02-05', 22, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 1, '2023-11-17 12:37:30'),
(713, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'James', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1994-04-10', 29, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 1, '2023-11-17 12:37:30'),
(714, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Ava', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '2000-06-25', 23, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 1, '2023-11-17 12:37:30'),
(715, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Benjamin', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1998-03-08', 25, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 1, '2023-11-17 12:37:30'),
(716, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sophia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '2005-01-14', 18, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 1, '2023-11-17 12:37:30'),
(717, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Logan', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1996-08-22', 27, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 1, '2023-11-17 12:37:30'),
(718, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Ella', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '2003-04-15', 20, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 2, '2023-11-17 12:37:30'),
(719, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'Liam', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1997-06-10', 26, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 2, '2023-11-17 12:37:30'),
(720, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Mia', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '1998-09-05', 25, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 2, '2023-11-17 12:37:30'),
(721, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'William', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '2001-11-15', 22, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 2, '2023-11-17 12:37:30'),
(722, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Sophia', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '2004-02-05', 19, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 2, '2023-11-17 12:37:30'),
(723, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'James', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '2000-04-10', 23, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 2, '2023-11-17 12:37:30'),
(724, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Ava', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1994-06-25', 27, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 2, '2023-11-17 12:37:30'),
(725, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Benjamin', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1996-03-08', 25, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 2, '2023-11-17 12:37:30'),
(726, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sophia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '2003-01-14', 20, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 2, '2023-11-17 12:37:30'),
(727, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Logan', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1995-08-22', 28, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 2, '2023-11-17 12:37:30'),
(728, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Lucas', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1999-04-15', 24, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 3, '2023-11-17 12:37:30'),
(729, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'Aria', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '2002-06-10', 21, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 3, '2023-11-17 12:37:30'),
(730, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Benjamin', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '2003-09-05', 20, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 3, '2023-11-17 12:37:30'),
(731, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Liam', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '2001-11-15', 22, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 3, '2023-11-17 12:37:30'),
(732, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Ava', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '2005-02-05', 18, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 3, '2023-11-17 12:37:30'),
(733, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'James', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1997-04-10', 26, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 3, '2023-11-17 12:37:30'),
(734, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Sophia', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1998-06-25', 25, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 3, '2023-11-17 12:37:30'),
(735, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Benjamin', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '2000-03-08', 23, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 3, '2023-11-17 12:37:30'),
(736, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sophia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '2003-01-14', 20, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 3, '2023-11-17 12:37:30'),
(737, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Logan', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1995-08-22', 28, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 3, '2023-11-17 12:37:30'),
(738, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Aiden', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1995-04-15', 28, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 4, '2023-11-17 12:37:30'),
(739, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'Sofia', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1998-06-10', 25, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 4, '2023-11-17 12:37:30'),
(740, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Logan', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '2002-09-05', 21, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 4, '2023-11-17 12:37:30'),
(741, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Ella', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1995-11-15', 26, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 4, '2023-11-17 12:37:30'),
(742, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Liam', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '2003-02-05', 20, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 4, '2023-11-17 12:37:30'),
(743, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Mia', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '2000-04-10', 23, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 4, '2023-11-17 12:37:30'),
(744, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'William', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1999-06-25', 24, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 4, '2023-11-17 12:37:30'),
(745, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Benjamin', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '2001-03-08', 22, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 4, '2023-11-17 12:37:30'),
(746, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sofia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '1994-01-14', 29, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 4, '2023-11-17 12:37:30'),
(747, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Liam', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '2002-08-22', 21, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 4, '2023-11-17 12:37:30'),
(748, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Liam', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1990-04-15', 33, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 5, '2023-11-17 12:37:30'),
(749, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'Ava', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1985-06-10', 38, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 5, '2023-11-17 12:37:30'),
(750, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Sofia', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '1978-09-05', 45, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 5, '2023-11-17 12:37:30'),
(751, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Aria', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1982-11-15', 41, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 5, '2023-11-17 12:37:30'),
(752, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Lucas', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '1977-02-05', 46, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 5, '2023-11-17 12:37:30'),
(753, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Olivia', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1970-04-10', 53, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 5, '2023-11-17 12:37:30'),
(754, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Benjamin', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1986-06-25', 37, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 5, '2023-11-17 12:37:30'),
(755, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Liam', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1992-03-08', 31, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 5, '2023-11-17 12:37:30'),
(756, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Ava', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '1988-01-14', 35, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 5, '2023-11-17 12:37:30'),
(757, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Sofia', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1980-08-22', 43, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 5, '2023-11-17 12:37:30'),
(758, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Ella', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1995-04-15', 28, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 6, '2023-11-17 12:37:30'),
(759, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'James', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1998-06-10', 25, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 7, '2023-11-17 12:37:30'),
(760, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Liam', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '2002-09-05', 21, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 8, '2023-11-17 12:37:30'),
(761, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Sofia', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1985-11-15', 38, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 9, '2023-11-17 12:37:30'),
(762, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Benjamin', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '1980-02-05', 43, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 10, '2023-11-17 12:37:30'),
(763, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Mia', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1990-04-10', 33, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 11, '2023-11-17 12:37:30'),
(764, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Liam', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1986-06-25', 37, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 12, '2023-11-17 12:37:30'),
(765, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Ava', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1992-03-08', 31, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 13, '2023-11-17 12:37:30'),
(766, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sofia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '1988-01-14', 35, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 14, '2023-11-17 12:37:30'),
(767, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Liam', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1980-08-22', 43, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 15, '2023-11-17 12:37:30'),
(768, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Ella', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1985-04-15', 38, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 16, '2023-11-17 12:37:30'),
(769, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'James', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1988-06-10', 35, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 17, '2023-11-17 12:37:30'),
(770, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Liam', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '1992-09-05', 29, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 18, '2023-11-17 12:37:30'),
(771, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Sofia', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1985-11-15', 36, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 19, '2023-11-17 12:37:30'),
(772, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Benjamin', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '1980-02-05', 41, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 20, '2023-11-17 12:37:30'),
(773, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Mia', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1990-04-10', 33, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 21, '2023-11-17 12:37:30'),
(774, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Liam', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1986-06-25', 37, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 6, '2023-11-17 12:37:30'),
(775, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Ava', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1992-03-08', 31, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 7, '2023-11-17 12:37:30'),
(776, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sofia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '1988-01-14', 35, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 8, '2023-11-17 12:37:30'),
(777, 0, 0, 10.5555, 121.1111, '2023-10-29 23:15:00', 'Liam', 'Lopez', 'L.', '08876543210', 4, 401, '567 Cedar St', 1, '1980-08-22', 43, 1, 102, 'Cedar Road', 'Unit 5B', 'Subdivision J', '43210', 9, '2023-11-17 12:37:30'),
(778, 0, 0, 12.3456, 123.9876, '2023-10-29 08:00:00', 'Ella', 'Gonzales', 'G.', '09654321098', 2, 202, '345 Oak St', 2, '1985-04-15', 38, 2, 202, 'Oak Lane', 'Unit 2D', 'Subdivision A', '12345', 10, '2023-11-17 12:37:30'),
(779, 0, 0, 13.5555, 121.9876, '2023-10-29 09:30:00', 'James', 'Martinez', 'M.', '09876543210', 3, 301, '678 Pine St', 1, '1988-06-10', 35, 1, 101, 'Pine Road', 'Unit 1A', 'Subdivision B', '54321', 11, '2023-11-17 12:37:30'),
(780, 0, 0, 14.1111, 124.5678, '2023-10-29 10:45:00', 'Liam', 'Torres', 'T.', '07123456789', 1, 101, '234 Cedar St', 1, '1992-09-05', 29, 1, 101, 'Cedar Street', 'Unit 1B', 'Subdivision C', '67890', 12, '2023-11-17 12:37:30'),
(781, 0, 0, 10.9876, 120.9876, '2023-10-29 12:15:00', 'Sofia', 'Martinez', 'M.', '09234567890', 2, 201, '567 Elm St', 2, '1985-11-15', 36, 2, 201, 'Elm Avenue', 'Unit 2C', 'Subdivision D', '43210', 13, '2023-11-17 12:37:30'),
(782, 0, 0, 14.1234, 123.4321, '2023-10-29 14:30:00', 'Benjamin', 'Hernandez', 'H.', '08876543210', 1, 101, '789 Maple St', 1, '1980-02-05', 41, 1, 101, 'Maple Lane', '', 'Subdivision E', '56789', 14, '2023-11-17 12:37:30'),
(783, 0, 0, 13.6543, 122.3456, '2023-10-29 16:45:00', 'Mia', 'Garcia', 'G.', '09987654321', 3, 301, '123 Birch St', 2, '1990-04-10', 33, 2, 202, 'Birch Road', 'Apt 3B', 'Subdivision F', '76543', 15, '2023-11-17 12:37:30'),
(784, 0, 0, 12.3456, 125.4321, '2023-10-29 18:00:00', 'Liam', 'Brown', 'B.', '09123456789', 2, 202, '456 Pine St', 2, '1986-06-25', 37, 2, 202, 'Pine Lane', 'Apt 4C', 'Subdivision G', '87654', 16, '2023-11-17 12:37:30'),
(785, 0, 0, 14.9876, 124.4321, '2023-10-29 19:30:00', 'Ava', 'Clark', 'C.', '07123456789', 1, 101, '789 Elm St', 1, '1992-03-08', 31, 1, 101, 'Elm Road', '', 'Subdivision H', '23456', 17, '2023-11-17 12:37:30'),
(786, 0, 0, 13.4321, 120.5555, '2023-10-29 21:45:00', 'Sofia', 'Smith', 'S.', '09109876543', 3, 301, '234 Oak St', 2, '1988-01-14', 35, 2, 202, 'Oak Avenue', 'Unit 3A', 'Subdivision I', '54321', 18, '2023-11-17 12:37:30'),
(787, 0, 0, 14.4079605, 120.8491766, '2023-11-07 14:29:26', 'James', 'Santos', '', '09124556231', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 667, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(788, 0, 0, 14.4220844, 120.8678378, '2023-11-07 14:33:46', 'John', 'Tirzo', '', '09235689123', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(789, 135, 137, 14.3033161, 121.0062721, '2023-11-07 14:48:06', 'Loki', 'Abad', '', '09124578563', 14, 551, 'asdf', 1, '1988-01-09', 35, 8, 335, '', '', '', '4117', 1, '2023-11-17 12:37:30'),
(790, 135, 137, 14.4220844, 120.8678378, '2023-11-07 14:49:07', 'James', 'Reid', '', '09568923612', 9, 346, 'sadf', 1, '1991-06-05', 32, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(791, 0, 0, 14.4220844, 120.8678378, '2023-11-07 14:53:32', 'Aron', 'Dimakulangan', '', '09231245562', 11, 476, 'qwer', 1, '1990-06-05', 33, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(792, 135, 137, 14.4303595, 120.8821906, '2023-11-07 14:57:12', 'Perci', 'Dimagiba', '', '09124578896', 18, 648, 'zxcv', 1, '2016-08-31', 7, 17, 632, '', '', '', '4105', 1, '2023-11-17 12:37:30'),
(793, 135, 137, 14.4220844, 120.8678378, '2023-11-07 15:05:28', 'Bob', 'Santos', '', '09231223122', 17, 632, 'asdf', 1, '2000-05-08', 23, 18, 648, '', '', '', '4106', 2, '2023-11-17 12:37:30'),
(794, 135, 137, 14.2445565, 121.0272762, '2023-11-07 17:52:07', 'tamad', 'abad', '', '09895623232', 17, 632, 'asdf', 1, '1960-05-31', 63, 19, 668, '', '', '', '4118', 1, '2023-11-17 12:37:30'),
(795, 136, 139, 14.3208683, 120.752955, '2023-11-07 18:13:46', 'Delo', 'Santos', '', '09124589563', 17, 632, 'asdf', 1, '1989-05-02', 34, 16, 602, '', '', '', '4110', 1, '2023-11-17 12:37:30'),
(796, 136, 139, 14.3208683, 120.752955, '2023-11-07 18:15:33', 'Dar', 'Reyes', '', '09124578451', 18, 648, 'asdf', 1, '1977-05-02', 46, 16, 602, '', '', '', '4110', 2, '2023-11-17 12:37:30'),
(797, 135, 136, 14.3208683, 120.752955, '2023-11-07 12:00:00', 'John', 'Doe', 'M.', '1234567890', 1, 2, '123 Main St', 1, '1990-01-01', 33, 3, 4, 'Main St', 'Apt 101', 'Subdivision A', '12345', 5, '2023-11-17 12:37:30'),
(798, 137, 138, 14.3208683, 120.752955, '2023-11-07 12:30:00', 'Jane', 'Smith', 'S.', '9876543210', 2, 3, '456 Elm St', 2, '1985-02-15', 38, 5, 6, 'Elm St', 'Apt 202', 'Subdivision B', '54321', 4, '2023-11-17 12:37:30'),
(799, 135, 139, 14.3208683, 120.752955, '2023-11-07 13:00:00', 'Robert', 'Johnson', 'R.', '5555555555', 3, 4, '789 Oak St', 1, '1980-03-20', 43, 7, 8, 'Oak St', 'Unit 303', 'Subdivision C', '98765', 3, '2023-11-17 12:37:30'),
(800, 136, 140, 14.2401179, 120.9159131, '2023-11-07 13:30:00', 'Emily', 'Williams', 'E.', '09999999999', 4, 132, '101 Pine St', 2, '1975-04-10', 50, 9, 346, 'Pine St', 'Suite 404', 'Subdivision D', '12345', 2, '2023-11-17 20:12:35'),
(801, 135, 135, 14.2268282, 120.8642493, '2023-11-07 14:00:00', 'David', 'Anderson', 'D.', '09777777777', 5, 146, '202 Cedar St', 1, '1995-06-25', 28, 11, 476, 'Cedar St', 'Unit 505', 'Subdivision E', '54321', 5, '2023-11-17 19:51:49'),
(802, 138, 135, 14.3208683, 120.752955, '2023-11-07 14:30:00', 'Susan', 'Martin', 'M.', '1231231234', 1, 2, '303 Birch St', 2, '1992-08-12', 31, 13, 14, 'Birch St', 'Apt 606', 'Subdivision F', '98765', 4, '2023-11-17 12:37:30'),
(803, 137, 136, 14.3208683, 120.752955, '2023-11-07 15:00:00', 'Michael', 'Wilson', 'W.', '9876543210', 3, 4, '404 Walnut St', 1, '1988-10-30', 35, 15, 16, 'Walnut St', 'Unit 707', 'Subdivision G', '12345', 3, '2023-11-17 12:37:30'),
(804, 139, 137, 14.3208683, 120.752955, '2023-11-07 15:30:00', 'Sarah', 'Thompson', 'T.', '5555555555', 4, 5, '505 Maple St', 2, '1983-12-05', 40, 17, 18, 'Maple St', 'Suite 808', 'Subdivision H', '54321', 2, '2023-11-17 12:37:30'),
(805, 140, 135, 14.3208683, 120.752955, '2023-11-07 16:00:00', 'Christopher', 'Harris', 'H.', '9999999999', 5, 6, '606 Pine St', 1, '1977-02-28', 46, 19, 20, 'Pine St', 'Unit 909', 'Subdivision I', '98765', 5, '2023-11-17 12:37:30'),
(806, 138, 136, 14.3208683, 120.752955, '2023-11-07 16:30:00', 'Laura', 'Davis', 'D.', '1231231234', 2, 3, '707 Oak St', 2, '1999-05-15', 24, 21, 22, 'Oak St', 'Apt 1010', 'Subdivision J', '12345', 4, '2023-11-17 12:37:30'),
(807, 36, 36, 14.4220844, 120.8678378, '2023-11-09 08:24:36', 'Joy', 'Dimapili', '', '09124578123', 18, 648, 'asdf', 2, '1990-03-05', 33, 18, 648, '', '', '', '4106', 26, '2023-11-17 12:37:30'),
(808, 36, 36, 14.2445565, 121.0272762, '2023-11-09 08:26:58', 'Joy', 'Dimapili', '', '09124578563', 18, 648, 'asdf', 2, '1998-05-25', 25, 19, 668, '', '', '', '4118', 1, '2023-11-17 12:37:30'),
(809, 36, 36, 14.2540076, 120.6545022, '2023-11-09 08:29:59', 'John', 'Dimagiba', '', '09235689789', 11, 476, 'asdf', 1, '1993-02-05', 30, 22, 807, '', '', '', '4111', 25, '2023-11-17 12:37:30'),
(810, 36, 36, 14.4188723, 120.8594438, '2023-11-09 08:51:51', 'Dimagiba', 'John', '', '09235689789', 19, 668, 'asdf', 1, '2020-08-05', 3, 18, 648, '', '', '', '4106', 24, '2023-11-17 12:37:30'),
(811, 36, 36, 14.4303595, 120.8821906, '2023-11-09 08:53:42', 'Marites', 'Santos', '', '09124578789', 16, 602, 'asdf', 1, '2002-12-15', 20, 17, 632, '', '', '', '4105', 25, '2023-11-17 12:37:30'),
(812, 36, 36, 14.2445565, 121.0272762, '2023-11-09 08:56:37', 'Mark', 'Leon', '', '09124578456', 17, 632, 'asdf', 1, '2002-06-05', 21, 19, 668, '', '', '', '4118', 26, '2023-11-17 12:37:30'),
(813, 36, 36, 14.4220844, 120.8678378, '2023-11-09 08:57:31', 'James', 'De Leon', '', '09235689789', 14, 551, 'sdaf', 1, '2020-06-05', 3, 18, 648, '', '', '', '4106', 24, '2023-11-17 12:37:30'),
(814, 36, 36, 14.4220844, 120.8678378, '2023-11-09 09:08:38', 'Tara', 'Alcan', '', '09457878456', 18, 648, 'qweqw', 1, '2020-05-04', 3, 18, 648, '', '', '', '4106', 26, '2023-11-17 12:37:30'),
(815, 36, 36, 14.4220844, 120.8678378, '2023-11-09 09:09:35', 'May', 'Santi', '', '09788989456', 17, 632, 'asdf', 2, '2020-04-05', 3, 18, 648, '', '', '', '4106', 26, '2023-11-17 12:37:30'),
(816, 36, 36, 14.4303595, 120.8821906, '2023-11-09 10:18:11', 'sample1', 'sample1', '', '09124578789', 17, 632, 'asdf', 1, '2020-11-12', 2, 17, 632, '', '', '', '4105', 25, '2023-11-17 12:37:30'),
(817, 36, 36, 14.2687377, 120.7421793, '2023-11-09 10:19:12', 'sample1', 'sample1', '', '09124578789', 16, 602, 'asdf', 1, '2020-11-12', 0, 14, 551, '', '', '', '4112', 25, '2023-11-17 12:37:30'),
(818, 36, 36, 14.153694, 120.7881492, '2023-11-09 10:22:48', 'sample1', 'sample1', '', '09124578789', 14, 551, 'asdf', 1, '2020-11-12', 0, 13, 535, '', '', '', '4113', 25, '2023-11-17 12:37:30'),
(819, 36, 36, 14.2445565, 121.0272762, '2023-11-09 10:24:28', 'sample1', 'sample1', '', '09124578789', 18, 648, 'asdf', 1, '2020-11-12', 0, 19, 668, '', '', '', '4118', 25, '2023-11-17 12:37:30'),
(820, 36, 36, 14.2445565, 121.0272762, '2023-11-09 11:47:45', 'sample1', 'sample1', '', '09124578789', 10, 379, 'asdf', 1, '2020-11-12', 0, 19, 668, '', '', '', '4118', 25, '2023-11-17 12:37:30'),
(821, 36, 36, 14.2445565, 121.0272762, '2023-11-09 11:48:29', 'sample1', 'sample1', '', '09124578789', 19, 668, 'asdf', 1, '2020-11-12', 0, 19, 668, '', '', '', '4118', 25, '2023-11-17 12:37:30'),
(822, 36, 36, 14.4512909, 120.925239, '2023-11-09 11:48:43', 'sample1', 'sample1', '', '09124578789', 18, 648, 'asdf', 1, '2020-11-12', 0, 12, 512, '', '', '', '4104', 25, '2023-11-17 12:37:30'),
(823, 36, 36, 14.1469065, 120.799639, '2023-11-09 11:49:59', 'sample1', 'sample1', '', '09124578789', 6, 230, 'asdf', 1, '2020-11-12', 0, 7, 305, '', '', '', '4124', 25, '2023-11-17 12:37:30'),
(824, 36, 36, 14.2687377, 120.7421793, '2023-11-09 11:50:26', 'sample1', 'sample1', '', '09124578789', 15, 578, 'asdf', 1, '2020-11-12', 0, 14, 551, '', '', '', '4112', 25, '2023-11-17 12:37:30'),
(825, 36, 36, 14.4220844, 120.8678378, '2023-11-17 18:24:52', 'test', 'test', '', '09124844735', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(826, 36, 36, 14.4220844, 120.8678378, '2023-11-17 18:25:49', 'test', 'test', '', '09124844735', 16, 602, 'asdf', 1, '2000-09-09', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(827, 36, 36, 14.4220844, 120.8678378, '2023-11-17 18:28:30', 'test', 'test', '', '09124844735', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-17 12:37:30'),
(828, 36, 36, 14.4303595, 120.8821906, '2023-11-17 18:32:42', 'test', 'test', '', '09124844735', 18, 648, 'asdf', 1, '2000-01-01', 23, 17, 632, '', '', '', '4105', 1, '2023-11-17 12:37:30'),
(829, 36, 36, 14.4303595, 120.8821906, '2023-11-17 18:34:20', 'test', 'test', '', '09124844735', 15, 578, 'asdf', 1, '2000-01-01', 23, 17, 632, '', '', '', '4105', 1, '2023-11-17 12:37:30'),
(830, 36, 36, 14.4303595, 120.8821906, '2023-11-17 18:35:09', 'test', 'test', '', '09124844735', 11, 476, 'asdf', 1, '2000-01-01', 23, 17, 632, '', '', '', '4105', 1, '2023-11-17 19:50:23'),
(831, 36, 36, 14.4220844, 120.8678378, '2023-11-21 13:27:06', 'cruz', 'juan', '', '09124578456', 18, 648, 'asdf', 1, '2000-12-10', 22, 18, 648, '', '', '', '4106', 19, '0000-00-00 00:00:00'),
(832, 36, 36, 14.2445565, 121.0272762, '2023-11-21 13:31:49', 'juan', 'zruz', '', '09124578456', 15, 578, 'asdf', 1, '2000-10-10', 23, 19, 668, '', '', '', '4118', 11, '0000-00-00 00:00:00'),
(833, 36, 36, 14.4220844, 120.8678378, '2023-11-21 19:57:14', 'test', 'test', '', '09124844735', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '0000-00-00 00:00:00'),
(834, 36, 36, 14.2445565, 121.0272762, '2023-11-21 20:02:41', 'test', 'test', '', '09124844735', 19, 668, 'asdf', 1, '2000-01-01', 23, 19, 668, '', '', '', '4118', 1, '0000-00-00 00:00:00'),
(835, 36, 36, 14.4303595, 120.8821906, '2023-11-21 20:03:40', 'test', 'test', '', '09124844735', 19, 668, 'asdf', 1, '2000-01-01', 23, 17, 632, '', '', '', '4105', 21, '0000-00-00 00:00:00'),
(836, 36, 36, 14.2445565, 121.0272762, '2023-11-21 20:04:30', 'test', 'test', '', '09124844736', 18, 648, '', 1, '2000-01-01', 23, 19, 668, '', '', '', '4118', 1, '0000-00-00 00:00:00'),
(837, 135, 137, 14.4188723, 120.8594438, '2023-11-22 13:22:41', 'Jeric', 'Abad', '', '09121212123', 18, 648, '', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-27 15:47:21'),
(838, 135, 137, 14.4188723, 120.8594438, '2023-11-22 13:23:37', 'Kevin', 'Santos', '', '09124844736', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-27 15:47:06'),
(839, 135, 137, 14.4188723, 120.8594438, '2023-11-22 13:26:10', 'John', 'Smith', '', '09124844734', 18, 648, 'asdf', 1, '2000-01-01', 23, 18, 648, '', '', '', '4106', 1, '2023-11-27 15:46:47'),
(840, 36, 36, 14.4142587, 120.8480999, '2023-11-24 13:13:04', 'Migel', 'Jonn', '', '09457845456', 17, 632, 'asdf', 1, '2000-01-01', 23, 18, 666, '', '', '', '4106', 26, '2023-12-09 18:39:25'),
(841, 36, 36, 14.4523293, 120.9180653, '2023-11-24 13:14:15', 'Hernandez', 'Jiro', '', '09457845457', 6, 230, 'asdf', 1, '2000-01-01', 23, 12, 512, '', '', '', '4104', 2, '2023-12-09 18:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `pertinfotbl`
--

CREATE TABLE `pertinfotbl` (
  `pertld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `dptDose` varchar(20) DEFAULT NULL,
  `datelastDose` date DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertinfotbl`
--

INSERT INTO `pertinfotbl` (`pertld`, `patientId`, `dptDose`, `datelastDose`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(2, 430, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(3, 431, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(4, 432, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-05-31', 0, 0),
(5, 433, 'N/A', '0000-00-00', 'N/A', 'Alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0),
(6, 449, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 832, 'N/A', '0000-00-00', 'N/A', 'alive', '0000-00-00 00:00:00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `positionId` int(11) NOT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionId`, `position`) VALUES
(1, 'Super Admin'),
(2, 'Department Admin'),
(3, 'Authorize User');

-- --------------------------------------------------------

--
-- Table structure for table `rabiesinfotbl`
--

CREATE TABLE `rabiesinfotbl` (
  `rabiesInfoId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `typeOfExposure` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `biteSite` varchar(50) NOT NULL,
  `dateBitten` date NOT NULL,
  `typeOfAnimal` varchar(20) NOT NULL DEFAULT 'Dog',
  `labDiagnosis` varchar(50) NOT NULL,
  `labResult` varchar(50) NOT NULL,
  `animalStatus` varchar(50) NOT NULL DEFAULT 'Stray',
  `dateVaccStarted` date DEFAULT NULL,
  `animalVacc` varchar(20) NOT NULL DEFAULT 'Unknown',
  `woundCleaned` varchar(20) NOT NULL DEFAULT 'Unknown',
  `rabiesVaccine` varchar(20) NOT NULL DEFAULT 'No',
  `animalOutcome` varchar(20) NOT NULL DEFAULT 'Unknown',
  `caseClass` varchar(20) NOT NULL DEFAULT 'Probable',
  `dateAdmitted` date DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `outcome` varchar(20) NOT NULL,
  `dateDied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rabiesinfotbl`
--

INSERT INTO `rabiesinfotbl` (`rabiesInfoId`, `patientId`, `typeOfExposure`, `category`, `biteSite`, `dateBitten`, `typeOfAnimal`, `labDiagnosis`, `labResult`, `animalStatus`, `dateVaccStarted`, `animalVacc`, `woundCleaned`, `rabiesVaccine`, `animalOutcome`, `caseClass`, `dateAdmitted`, `morbidityWeek`, `morbidityMonth`, `outcome`, `dateDied`) VALUES
(1, 434, 'N/A', 'N/A', 'N/A', '2023-06-01', 'N/A', 'N/A', 'N/A', 'N/A', '2023-06-01', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2023-06-01', 0, 0, 'dead', '2023-06-13'),
(2, 477, 'bite', 'N/A', 'leg', '2023-06-25', 'ostrich', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'no', 'N/A', 'N/A', 'N/A', '2023-07-05', 0, 0, 'alive', '0000-00-00'),
(3, 478, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00'),
(4, 479, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00'),
(5, 480, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00'),
(6, 481, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00'),
(7, 482, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00'),
(8, 483, 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', 0, 0, 'alive', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `typhoidinfotbl`
--

CREATE TABLE `typhoidinfotbl` (
  `typhoidld` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `labResult` varchar(20) DEFAULT NULL,
  `organism` varchar(20) DEFAULT NULL,
  `caseClass` varchar(20) DEFAULT NULL,
  `outcome` varchar(20) DEFAULT NULL,
  `dateDied` datetime DEFAULT NULL,
  `dateAdmitted` date DEFAULT NULL,
  `morbidityMonth` int(11) DEFAULT NULL,
  `morbidityWeek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typhoidinfotbl`
--

INSERT INTO `typhoidinfotbl` (`typhoidld`, `patientId`, `labResult`, `organism`, `caseClass`, `outcome`, `dateDied`, `dateAdmitted`, `morbidityMonth`, `morbidityWeek`) VALUES
(1, 435, 'N/A', 'N/A', 'N/A', 'alive', '0000-00-00 00:00:00', '2023-06-01', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abdinfotbl`
--
ALTER TABLE `abdinfotbl`
  ADD PRIMARY KEY (`amebiasisld`),
  ADD KEY `fk_amebiasisinfotbl_patient` (`patientId`);

--
-- Indexes for table `aefiinfotbl`
--
ALTER TABLE `aefiinfotbl`
  ADD PRIMARY KEY (`aefiId`),
  ADD KEY `fk_aefiinfotbl_patient` (`patientId`);

--
-- Indexes for table `aesinfotbl`
--
ALTER TABLE `aesinfotbl`
  ADD PRIMARY KEY (`aesld`),
  ADD KEY `fk_aesinfotbl_patient` (`patientId`);

--
-- Indexes for table `afpinfotbl`
--
ALTER TABLE `afpinfotbl`
  ADD PRIMARY KEY (`afpld`),
  ADD KEY `fk_afpinfotbl_patient` (`patientId`);

--
-- Indexes for table `amesinfotbl`
--
ALTER TABLE `amesinfotbl`
  ADD PRIMARY KEY (`amesld`),
  ADD KEY `fk_amesinfotbl_patient` (`patientId`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalityId` (`muncityId`);

--
-- Indexes for table `chikvinfotbl`
--
ALTER TABLE `chikvinfotbl`
  ADD PRIMARY KEY (`chikvld`),
  ADD KEY `fk_chikvinfotbl_patient` (`patientId`);

--
-- Indexes for table `cholerainfotbl`
--
ALTER TABLE `cholerainfotbl`
  ADD PRIMARY KEY (`cholerald`),
  ADD KEY `fk_cholerainfotbl_patient` (`patientId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipality` (`municipality`),
  ADD KEY `barangay` (`barangay`),
  ADD KEY `position` (`positionId`),
  ADD KEY `id` (`createdby_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`daysId`);

--
-- Indexes for table `deleted_fields`
--
ALTER TABLE `deleted_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dengueinfotbl`
--
ALTER TABLE `dengueinfotbl`
  ADD PRIMARY KEY (`dengueld`),
  ADD KEY `fk_dengueinfotbl_patient` (`patientId`);

--
-- Indexes for table `diphinfotbl`
--
ALTER TABLE `diphinfotbl`
  ADD PRIMARY KEY (`diphld`),
  ADD KEY `fk_diphinfotbl_patient` (`patientId`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`diseaseId`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `hepatitisinfotbl`
--
ALTER TABLE `hepatitisinfotbl`
  ADD PRIMARY KEY (`hepatitisld`),
  ADD KEY `fk_hepatitisinfotbl_patient` (`patientId`);

--
-- Indexes for table `hfmdinfotbl`
--
ALTER TABLE `hfmdinfotbl`
  ADD PRIMARY KEY (`hfmdld`),
  ADD KEY `fk_hfmdinfotbl_patient` (`patientId`);

--
-- Indexes for table `influenzainfotbl`
--
ALTER TABLE `influenzainfotbl`
  ADD PRIMARY KEY (`influenzald`),
  ADD KEY `fk_influenzainfotbl_patient` (`patientId`);

--
-- Indexes for table `leptospirosisinfotbl`
--
ALTER TABLE `leptospirosisinfotbl`
  ADD PRIMARY KEY (`leptospirosisld`),
  ADD KEY `fk_leptospirosisinfotbl_patient` (`patientId`);

--
-- Indexes for table `measlesinfotbl`
--
ALTER TABLE `measlesinfotbl`
  ADD PRIMARY KEY (`measlesld`),
  ADD KEY `fk_measlesinfotbl_patient` (`patientId`);

--
-- Indexes for table `meningitisinfotbl`
--
ALTER TABLE `meningitisinfotbl`
  ADD PRIMARY KEY (`meningitisld`),
  ADD KEY `fk_meningitisinfotbl_patient` (`patientId`);

--
-- Indexes for table `meningoinfotbl`
--
ALTER TABLE `meningoinfotbl`
  ADD PRIMARY KEY (`meningold`),
  ADD KEY `fk_meningoinfotbl_patient` (`patientId`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`monthId`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`munId`);

--
-- Indexes for table `nntinfotbl`
--
ALTER TABLE `nntinfotbl`
  ADD PRIMARY KEY (`nntld`),
  ADD KEY `fk_nntinfotbl_patient` (`patientId`);

--
-- Indexes for table `ntinfotbl`
--
ALTER TABLE `ntinfotbl`
  ADD PRIMARY KEY (`ntld`),
  ADD KEY `fk_neonatalinfotbl_patient` (`patientId`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`outcomeId`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientId`),
  ADD KEY `municipalityDRU` (`munCityOfDRU`),
  ADD KEY `barangayDRU` (`brgyOfDRU`),
  ADD KEY `diseases` (`disease`),
  ADD KEY `gender` (`gender`),
  ADD KEY `mun` (`municipality`),
  ADD KEY `brgy` (`barangay`),
  ADD KEY `deptid` (`createdby_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `pertinfotbl`
--
ALTER TABLE `pertinfotbl`
  ADD PRIMARY KEY (`pertld`),
  ADD KEY `fk_perthesinfotbl_patient` (`patientId`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`positionId`);

--
-- Indexes for table `rabiesinfotbl`
--
ALTER TABLE `rabiesinfotbl`
  ADD PRIMARY KEY (`rabiesInfoId`),
  ADD KEY `fk_rabiesinfotbl_patient` (`patientId`);

--
-- Indexes for table `typhoidinfotbl`
--
ALTER TABLE `typhoidinfotbl`
  ADD PRIMARY KEY (`typhoidld`),
  ADD KEY `fk_typhoidinfotbl_patient` (`patientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abdinfotbl`
--
ALTER TABLE `abdinfotbl`
  MODIFY `amebiasisld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `aefiinfotbl`
--
ALTER TABLE `aefiinfotbl`
  MODIFY `aefiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `aesinfotbl`
--
ALTER TABLE `aesinfotbl`
  MODIFY `aesld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `afpinfotbl`
--
ALTER TABLE `afpinfotbl`
  MODIFY `afpld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `amesinfotbl`
--
ALTER TABLE `amesinfotbl`
  MODIFY `amesld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;

--
-- AUTO_INCREMENT for table `chikvinfotbl`
--
ALTER TABLE `chikvinfotbl`
  MODIFY `chikvld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cholerainfotbl`
--
ALTER TABLE `cholerainfotbl`
  MODIFY `cholerald` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `daysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deleted_fields`
--
ALTER TABLE `deleted_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `dengueinfotbl`
--
ALTER TABLE `dengueinfotbl`
  MODIFY `dengueld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `diphinfotbl`
--
ALTER TABLE `diphinfotbl`
  MODIFY `diphld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `diseaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hepatitisinfotbl`
--
ALTER TABLE `hepatitisinfotbl`
  MODIFY `hepatitisld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hfmdinfotbl`
--
ALTER TABLE `hfmdinfotbl`
  MODIFY `hfmdld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `influenzainfotbl`
--
ALTER TABLE `influenzainfotbl`
  MODIFY `influenzald` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leptospirosisinfotbl`
--
ALTER TABLE `leptospirosisinfotbl`
  MODIFY `leptospirosisld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `measlesinfotbl`
--
ALTER TABLE `measlesinfotbl`
  MODIFY `measlesld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meningitisinfotbl`
--
ALTER TABLE `meningitisinfotbl`
  MODIFY `meningitisld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meningoinfotbl`
--
ALTER TABLE `meningoinfotbl`
  MODIFY `meningold` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `monthId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `munId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nntinfotbl`
--
ALTER TABLE `nntinfotbl`
  MODIFY `nntld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ntinfotbl`
--
ALTER TABLE `ntinfotbl`
  MODIFY `ntld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `outcomeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=842;

--
-- AUTO_INCREMENT for table `pertinfotbl`
--
ALTER TABLE `pertinfotbl`
  MODIFY `pertld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `positionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rabiesinfotbl`
--
ALTER TABLE `rabiesinfotbl`
  MODIFY `rabiesInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `typhoidinfotbl`
--
ALTER TABLE `typhoidinfotbl`
  MODIFY `typhoidld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abdinfotbl`
--
ALTER TABLE `abdinfotbl`
  ADD CONSTRAINT `fk_amebiasisinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `aefiinfotbl`
--
ALTER TABLE `aefiinfotbl`
  ADD CONSTRAINT `fk_aefiinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `aesinfotbl`
--
ALTER TABLE `aesinfotbl`
  ADD CONSTRAINT `fk_aesinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `afpinfotbl`
--
ALTER TABLE `afpinfotbl`
  ADD CONSTRAINT `fk_afpinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `amesinfotbl`
--
ALTER TABLE `amesinfotbl`
  ADD CONSTRAINT `fk_amesinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `municipalityId` FOREIGN KEY (`muncityId`) REFERENCES `municipality` (`munId`);

--
-- Constraints for table `chikvinfotbl`
--
ALTER TABLE `chikvinfotbl`
  ADD CONSTRAINT `fk_chikvinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `cholerainfotbl`
--
ALTER TABLE `cholerainfotbl`
  ADD CONSTRAINT `fk_cholerainfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `barangay` FOREIGN KEY (`barangay`) REFERENCES `barangay` (`id`),
  ADD CONSTRAINT `municipality` FOREIGN KEY (`municipality`) REFERENCES `municipality` (`munId`),
  ADD CONSTRAINT `position` FOREIGN KEY (`positionId`) REFERENCES `positions` (`positionId`);

--
-- Constraints for table `dengueinfotbl`
--
ALTER TABLE `dengueinfotbl`
  ADD CONSTRAINT `fk_dengueinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `diphinfotbl`
--
ALTER TABLE `diphinfotbl`
  ADD CONSTRAINT `fk_diphinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `hepatitisinfotbl`
--
ALTER TABLE `hepatitisinfotbl`
  ADD CONSTRAINT `fk_hepatitisinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `hfmdinfotbl`
--
ALTER TABLE `hfmdinfotbl`
  ADD CONSTRAINT `fk_hfmdinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `influenzainfotbl`
--
ALTER TABLE `influenzainfotbl`
  ADD CONSTRAINT `fk_influenzainfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `leptospirosisinfotbl`
--
ALTER TABLE `leptospirosisinfotbl`
  ADD CONSTRAINT `fk_leptospirosisinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `measlesinfotbl`
--
ALTER TABLE `measlesinfotbl`
  ADD CONSTRAINT `fk_measlesinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `meningitisinfotbl`
--
ALTER TABLE `meningitisinfotbl`
  ADD CONSTRAINT `fk_meningitisinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `meningoinfotbl`
--
ALTER TABLE `meningoinfotbl`
  ADD CONSTRAINT `fk_meningoinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `nntinfotbl`
--
ALTER TABLE `nntinfotbl`
  ADD CONSTRAINT `fk_nntinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `ntinfotbl`
--
ALTER TABLE `ntinfotbl`
  ADD CONSTRAINT `fk_neonatalinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `barangayDRU` FOREIGN KEY (`brgyOfDRU`) REFERENCES `barangay` (`id`),
  ADD CONSTRAINT `brgy` FOREIGN KEY (`barangay`) REFERENCES `barangay` (`id`),
  ADD CONSTRAINT `diseases` FOREIGN KEY (`disease`) REFERENCES `diseases` (`diseaseId`),
  ADD CONSTRAINT `gender` FOREIGN KEY (`gender`) REFERENCES `genders` (`genderId`),
  ADD CONSTRAINT `mun` FOREIGN KEY (`municipality`) REFERENCES `municipality` (`munId`),
  ADD CONSTRAINT `municipalityDRU` FOREIGN KEY (`munCityOfDRU`) REFERENCES `municipality` (`munId`);

--
-- Constraints for table `pertinfotbl`
--
ALTER TABLE `pertinfotbl`
  ADD CONSTRAINT `fk_perthesinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `rabiesinfotbl`
--
ALTER TABLE `rabiesinfotbl`
  ADD CONSTRAINT `fk_rabiesinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;

--
-- Constraints for table `typhoidinfotbl`
--
ALTER TABLE `typhoidinfotbl`
  ADD CONSTRAINT `fk_typhoidinfotbl_patient` FOREIGN KEY (`patientId`) REFERENCES `patients` (`patientId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
