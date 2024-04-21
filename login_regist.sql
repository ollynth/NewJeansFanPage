-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 10:32 AM
-- Server version: 11.5.0-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_regist`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--
-- Error reading structure for table login_regist.event: #1932 - Table &#039;login_regist.event&#039; doesn&#039;t exist in engine
-- Error reading data for table login_regist.event: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `login_regist`.`event`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_desc` varchar(300) NOT NULL,
  `ticket` varchar(300) NOT NULL,
  `event_poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `event_name`, `date_time`, `location`, `event_desc`, `ticket`, `event_poster`) VALUES
(5, 'BLACKPINK Vs. NewJeans Night', '2024-06-01 21:00:00', 'El Club Detroit, Detroit, US', 'Celebrate the music of BLACKPINK and NewJeans with a night dedicated entirely to their songs.', 'https://ln.run/7fygl', 'Untitled design1.png'),
(6, 'BLACKPINK In Your Area', '2024-04-17 15:12:00', 'Tokyo, Japan', 'Celebrate 15th Anniversary of BLACKPINK', 'https://monkeytype.com/', 'b6030939-285d-48ff-b51f-b8a716389462.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Error reading structure for table login_regist.user: #1932 - Table &#039;login_regist.user&#039; doesn&#039;t exist in engine
-- Error reading data for table login_regist.user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `login_regist`.`user`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_fans` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNum` int(100) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` mediumblob DEFAULT NULL,
  `role` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_fans`, `username`, `email`, `phoneNum`, `gender`, `password`, `profile_picture`, `role`) VALUES
(9, 'sepuhRichi', NULL, NULL, 'M', '1234ABcd', NULL, 'Admin'),
(10, 'sepuhOllyn', NULL, NULL, 'F', '2345BCde', NULL, 'Admin'),
(11, 'sepuhPangestu', NULL, NULL, 'M', '3456CDef', NULL, 'Admin'),
(12, 'sepuhIan', NULL, NULL, 'M', '4567DEfg', NULL, 'Admin'),
(13, 'mm93', 'mmarquez@gmail.com', NULL, NULL, 'theBabyAlien93', NULL, 'User'),
(14, 'vr46', 'valerossi@gmail.com', NULL, NULL, 'theDoctor46', NULL, 'User'),
(15, 'fb63', 'callmepecco@gmail.com', NULL, NULL, 'Go1Fire63', NULL, 'User'),
(16, 'menyalaAbangkuhh', 'nyalakan@gmail.com', NULL, NULL, 'abangGanteng#2', NULL, 'User'),
(17, 'eidorian_681', 'kristanto826@gmail.com', NULL, NULL, 'DynastyAG23', NULL, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_fans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_fans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
