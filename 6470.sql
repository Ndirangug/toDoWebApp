-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 01:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6470`
--

-- --------------------------------------------------------

--
-- Table structure for table `6470users`
--

CREATE TABLE `6470users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `6470users`
--

INSERT INTO `6470users` (`id`, `username`, `password`, `phone`) VALUES
(3, 'Bruce', '$2y$10$9NTvshOjUUq4YBa5dqLoLOlBXWpgoLj5YghziIO1i4PRF2xYL2Lme', '254713504895'),
(4, 'Raps', '$2y$10$hRNfJm5007admi9Vi7kbx.ak.lt4Q9EV0EyJ.ESQuGY5KO8dnIQwy', '254743473018'),
(5, 'Skidi Ki Papa', '$2y$10$0kxIUTH4j2GRQjboBwQqM.b5XSgh8cJ0pWQJK.iIVXkG.Ico8.hy6', '254767260009'),
(6, 'Tyler', '$2y$10$z8Ld84SEYEi3dHnkUltVCevt5ZvGbTTeNrVo0TjyBwubbLRc85MKe', '254745315269'),
(7, 'George', '$2y$10$guj2fR1ND1teDmbefx15ZOFMiCIXia1qAM9jKU0cSlxzS8BZQLR6m', '254746649576'),
(22, 'Kairitu', '$2y$10$UVICvZWEK6Oo6Zt4BV.7VO37o/IQh1VDcivUtTiuhUbYD3h5fTT7q', '254737251353'),
(23, 'Samuel', '$2y$10$GEOgqLqgzyf6cwwnLY72fOpc26lpsYoLyOxbTu/MHcpsRVspr5BcW', '0771210799'),
(24, 'ephra', '$2y$10$/p79HtQGM8Iga6I1VvWgGelhvHy37fJMdOlM8GGOugFSgA5VfbfTu', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(255) NOT NULL,
  `task` mediumtext NOT NULL,
  `userID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `userID`) VALUES
(12, 'buy pen', 3),
(13, 'go to town', 7),
(26, 'buy boat', 7),
(27, 'get into a boat', 7),
(32, 'go to school', 7),
(33, 'go schooling', 3),
(34, 'buy an exercise book', 6),
(35, 'Get a manicure', 6),
(36, 'Buy a wig', 6),
(37, 'Get puncture repaired', 6),
(38, 'Get a muscle car', 5),
(39, 'Have it painted purple', 5),
(40, 'Throw a bash', 5),
(41, 'get a golden ring', 5),
(43, 'Get an iphone', 4),
(44, 'learn css', 4),
(45, 'take a photo', 4),
(46, 'Take a shower', 4),
(47, 'Get braids done', 22),
(48, 'Buy sunglasses', 22),
(49, 'get artificial nails', 22),
(52, 'buy premium perfume', 22),
(53, 'go on date', 22),
(54, 'do laundry', 22),
(55, 'cook', 4),
(56, 'do cat', 23),
(57, 'Finish Assignment', 23),
(59, 'nope', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `6470users`
--
ALTER TABLE `6470users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `6470users`
--
ALTER TABLE `6470users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
