-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 06:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesnewjeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_fans` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_desc` varchar(300) NOT NULL,
  `ticket` varchar(300) NOT NULL,
  `event_poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `date_time`, `location`, `event_desc`, `ticket`, `event_poster`) VALUES
(1, 'BLACKPINK Vs. NewJeans Night', '2024-04-22 15:00:00', 'Gelora Bung Karno', 'Bawa Payung', 'BLACKPINK Vs. NewJeans Night', 'wallpaper_new_jeans.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `fans`
--

CREATE TABLE `fans` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `profile_picture` mediumblob DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fans`
--

INSERT INTO `fans` (`id`, `email`, `gender`, `profile_picture`, `phone_number`) VALUES
(2, 'roinnnreal@gmail.com', 'M', 0x646f68797575756e6e6e6e2e6a7067, '08123234432'),
(3, '', 'F', NULL, NULL),
(4, 'xeana5@gmail.com', NULL, NULL, NULL),
(5, 'jlkjkj@xyz.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id_fans` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `stats` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`id_fans`, `id_post`, `stats`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nj_member`
--

CREATE TABLE `nj_member` (
  `id` int(11) NOT NULL,
  `name_member` varchar(100) NOT NULL,
  `member_pict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nj_member`
--

INSERT INTO `nj_member` (`id`, `name_member`, `member_pict`) VALUES
(3, 'Minji', 'image7.png'),
(4, 'Minji', 'image17.png'),
(5, 'Minji', 'image19.png'),
(6, 'Hanni', 'image5.png'),
(7, 'Hanni', 'image13.png'),
(8, 'Hanni', 'image14.png'),
(9, 'Haerin', 'image6.png'),
(10, 'Haerin', 'image15.png'),
(11, 'Haerin', 'image16.png'),
(12, 'Danielle', 'image4.png'),
(13, 'Danielle', 'image10.png'),
(14, 'Danielle', 'image18.png'),
(15, 'Hyein', 'image9.png'),
(16, 'Hyein', 'image11.png'),
(17, 'Hyein', 'image12.png');

-- --------------------------------------------------------

--
-- Table structure for table `nj_members`
--

CREATE TABLE `nj_members` (
  `id` int(11) NOT NULL,
  `member_pict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nj_members`
--

INSERT INTO `nj_members` (`id`, `member_pict`) VALUES
(2, 'members_photo03.jpg'),
(3, 'members_photo04.jpg'),
(4, 'members_photo05.jpg'),
(5, 'members_photo06.jpg'),
(6, 'members_photo07.jpg'),
(7, 'members_photo08.jpg'),
(8, 'members_photo09.jpg'),
(9, 'members_photo10.jpg'),
(10, 'members_photo11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_fans` int(11) DEFAULT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_desc` varchar(255) DEFAULT NULL,
  `post_pict` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_fans`, `post_title`, `post_desc`, `post_pict`) VALUES
(1, 2, 'Test ', 'gatau apa pokonya test 1', 0x4e65774a65616e732d4f4d472d4d562d46617368696f6e2e6a7067),
(4, 2, 'Test 4', 'dwfwfege', 0x372d66616b74612d6769726c62616e642d6e65776a65616e732d6d656e67616b752d736562616761692d67656e65726173692d626172752d6b6f7265612d3232313232383135333430392e6a7067),
(5, 2, 'Test 5', 'dwfqafw', 0x7765622d6c6f676f5f3035323234352e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `id_fans` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `report_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `passwords` varchar(60) NOT NULL,
  `role` enum('A','F') NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwords`, `role`) VALUES
(1, 'Rean', 'R3an', 'A'),
(2, 'Roin', 'Roinnn23', 'F'),
(3, 'Lyn', 'Oinnn11.', 'F'),
(4, 'Xena', 'Xennn111', 'F'),
(5, 'richi', '123ithB.', 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fans` (`id_fans`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fans`
--
ALTER TABLE `fans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD KEY `id_fans` (`id_fans`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fans` (`id_fans`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fans` (`id_fans`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_fans`) REFERENCES `fans` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Constraints for table `fans`
--
ALTER TABLE `fans`
  ADD CONSTRAINT `fans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_post_ibfk_1` FOREIGN KEY (`id_fans`) REFERENCES `fans` (`id`),
  ADD CONSTRAINT `like_post_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_fans`) REFERENCES `fans` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_fans`) REFERENCES `fans` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
