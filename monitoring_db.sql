-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 07:05 AM
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
-- Database: `monitoring_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_metrics`
--

CREATE TABLE `daily_metrics` (
  `id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Day_1_Likes` int(11) DEFAULT NULL,
  `Day_1_Reacts` int(11) DEFAULT NULL,
  `Day_1_Bio` varchar(128) DEFAULT NULL,
  `Day_1_Post` int(11) DEFAULT NULL,
  `Day_1_Views` int(11) DEFAULT NULL,
  `Day_1_Following` int(11) DEFAULT NULL,
  `Day_1_Followers` int(11) DEFAULT NULL,
  `Day_1_Friends` int(11) DEFAULT NULL,
  `Day_1_Trends` varchar(128) DEFAULT NULL,
  `Day_2_Likes` int(11) DEFAULT NULL,
  `Day_2_Reacts` int(11) DEFAULT NULL,
  `Day_2_Bio` varchar(128) DEFAULT NULL,
  `Day_2_Post` int(11) DEFAULT NULL,
  `Day_2_Views` int(11) DEFAULT NULL,
  `Day_2_Following` int(11) DEFAULT NULL,
  `Day_2_Followers` int(11) DEFAULT NULL,
  `Day_2_Friends` int(11) DEFAULT NULL,
  `Day_2_Trends` varchar(128) DEFAULT NULL,
  `Day_3_Likes` int(11) DEFAULT NULL,
  `Day_3_Reacts` int(11) DEFAULT NULL,
  `Day_3_Bio` varchar(128) DEFAULT NULL,
  `Day_3_Post` int(11) DEFAULT NULL,
  `Day_3_Views` int(11) DEFAULT NULL,
  `Day_3_Following` int(11) DEFAULT NULL,
  `Day_3_Followers` int(11) DEFAULT NULL,
  `Day_3_Friends` int(11) DEFAULT NULL,
  `Day_3_Trends` varchar(128) DEFAULT NULL,
  `Day_4_Likes` int(11) DEFAULT NULL,
  `Day_4_Reacts` int(11) DEFAULT NULL,
  `Day_4_Bio` varchar(128) DEFAULT NULL,
  `Day_4_Post` int(11) DEFAULT NULL,
  `Day_4_Views` int(11) DEFAULT NULL,
  `Day_4_Following` int(11) DEFAULT NULL,
  `Day_4_Followers` int(11) DEFAULT NULL,
  `Day_4_Friends` int(11) DEFAULT NULL,
  `Day_4_Trends` varchar(128) DEFAULT NULL,
  `Day_5_Likes` int(11) DEFAULT NULL,
  `Day_5_Reacts` int(11) DEFAULT NULL,
  `Day_5_Bio` varchar(128) DEFAULT NULL,
  `Day_5_Post` int(11) DEFAULT NULL,
  `Day_5_Views` int(11) DEFAULT NULL,
  `Day_5_Following` int(11) DEFAULT NULL,
  `Day_5_Followers` int(11) DEFAULT NULL,
  `Day_5_Friends` int(11) DEFAULT NULL,
  `Day_5_Trends` varchar(128) DEFAULT NULL,
  `Day_6_Likes` int(11) DEFAULT NULL,
  `Day_6_Reacts` int(11) DEFAULT NULL,
  `Day_6_Bio` varchar(128) DEFAULT NULL,
  `Day_6_Post` int(11) DEFAULT NULL,
  `Day_6_Views` int(11) DEFAULT NULL,
  `Day_6_Following` int(11) DEFAULT NULL,
  `Day_6_Followers` int(11) DEFAULT NULL,
  `Day_6_Friends` int(11) DEFAULT NULL,
  `Day_6_Trends` varchar(128) DEFAULT NULL,
  `Day_7_Likes` int(11) DEFAULT NULL,
  `Day_7_Reacts` int(11) DEFAULT NULL,
  `Day_7_Bio` varchar(128) DEFAULT NULL,
  `Day_7_Post` int(11) DEFAULT NULL,
  `Day_7_Views` int(11) DEFAULT NULL,
  `Day_7_Following` int(11) DEFAULT NULL,
  `Day_7_Followers` int(11) DEFAULT NULL,
  `Day_7_Friends` int(11) DEFAULT NULL,
  `Day_7_Trends` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_metrics`
--

INSERT INTO `daily_metrics` (`id`, `User_Id`, `Day_1_Likes`, `Day_1_Reacts`, `Day_1_Bio`, `Day_1_Post`, `Day_1_Views`, `Day_1_Following`, `Day_1_Followers`, `Day_1_Friends`, `Day_1_Trends`, `Day_2_Likes`, `Day_2_Reacts`, `Day_2_Bio`, `Day_2_Post`, `Day_2_Views`, `Day_2_Following`, `Day_2_Followers`, `Day_2_Friends`, `Day_2_Trends`, `Day_3_Likes`, `Day_3_Reacts`, `Day_3_Bio`, `Day_3_Post`, `Day_3_Views`, `Day_3_Following`, `Day_3_Followers`, `Day_3_Friends`, `Day_3_Trends`, `Day_4_Likes`, `Day_4_Reacts`, `Day_4_Bio`, `Day_4_Post`, `Day_4_Views`, `Day_4_Following`, `Day_4_Followers`, `Day_4_Friends`, `Day_4_Trends`, `Day_5_Likes`, `Day_5_Reacts`, `Day_5_Bio`, `Day_5_Post`, `Day_5_Views`, `Day_5_Following`, `Day_5_Followers`, `Day_5_Friends`, `Day_5_Trends`, `Day_6_Likes`, `Day_6_Reacts`, `Day_6_Bio`, `Day_6_Post`, `Day_6_Views`, `Day_6_Following`, `Day_6_Followers`, `Day_6_Friends`, `Day_6_Trends`, `Day_7_Likes`, `Day_7_Reacts`, `Day_7_Bio`, `Day_7_Post`, `Day_7_Views`, `Day_7_Following`, `Day_7_Followers`, `Day_7_Friends`, `Day_7_Trends`) VALUES
(3, 1, 0, 0, 'flower', 0, 0, 130, 130, 2000, 'none', 0, 0, '.same', 0, 0, 130, 130, 2005, 'none', 0, 0, 'same', 0, 1, 140, 134, 2007, 'pets', 0, 0, 'same', 0, 0, 130, 130, 2007, 'tiktok filters', 0, 0, 'same', 0, 0, 145, 150, 2010, 'bonding with frineds', 0, 0, 'same', 0, 0, 150, 160, 2030, 'cats', -3, 0, 'same', 0, 0, 157, 173, 2030, 'tiktok filters'),
(4, 2, 1, 1, 'none', 1, 0, 100, 130, 1000, 'k-drama', 0, 1, 'none', 1, 1, 130, 130, 1000, 'motors', 0, 1, 'none', 1, 1, 130, 100, 1000, 'school', 0, 1, 'none', 1, 1, 130, 100, 1000, 'birtday', 0, 3, 'none', 1, 1, 130, 100, 1000, 'fliptop', 0, 2, 'none', 1, 1, 130, 100, 1000, 'black pink', 0, 1, 'none', 1, 1, 130, 100, 1000, 'funny moments'),
(5, 1, 0, 0, '', 0, 0, 0, 0, 0, '', 234, 432, '.', 56, 568, 500, 562, 568, 'pylometrics', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, ''),
(6, 3, 1, 78, 'none', 1, 100, 100, 130, 3300, 'rockband', 0, 1, 'none', 1, 1, 100, 130, 3300, 'beatles', 0, 17, 'none', 1, 30, 100, 130, 3300, 'guitar cover', 0, 12, 'none', 1, 100, 130, 140, 3300, 'iniibig kita cover', 0, 4, 'none', 1, 1, 130, 154, 3308, 'AI', 12, 14, 'none', 12, 140, 135, 140, 3300, 'about my self', 3, 14, 'none', 5, 45, 300, 120, 3300, 'rockband'),
(7, 3, 0, 5, 'skull', 10, 10, 394, 2600, 2600, 'politics', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, ''),
(9, 4, 0, 5, 'skull', 10, 10, 394, 2600, 2600, 'politics', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, -2, '', 0, 0, 0, 0, 0, ''),
(10, 5, 0, 5, 'skull', 10, 10, 394, 2600, 2600, 'politics', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, '', 0, -2, '', 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Name`) VALUES
(1, 'kimmarga89@gmail.com', 'Kim Marga'),
(2, 'clydearanez667@gmail.com', 'Clyde Aranez'),
(3, 'kobi24@gmail.com', 'Kobi Garcera'),
(4, 'aron456@gmail.com', 'Aron Rosas'),
(5, 'christian08@gmail.com', 'Christian Lee Lumanog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_metrics`
--
ALTER TABLE `daily_metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_metrics`
--
ALTER TABLE `daily_metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
