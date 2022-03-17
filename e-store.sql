-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `mobile` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `mobile`) VALUES
(1, 'Dhoha_khorasani', 'raihanahit2016@gmail.com', '$2y$10$gWkZ5ijux.JoSGzzhLmx..ycV5sV', 773065471),
(2, 'Afnan_kh', 'Afnan@gmail.com', '$2y$10$PfyNK1oIx3AQSW4j2ApzreZTc5Eb', 733804870),
(3, 'Mohammed_kh', 'Mohammed@gmail.com', '$2y$10$gxphnOH7ZP3C4.pgDdQu4OuxyOue', 770928275),
(4, 'Abduljaleel_kh', 'Abduljaleel@gmail.com', '$2y$10$GkWHyf3UX009j8BeBJtb9ulWfdvJ', 777239384),
(5, 'Latifa_Esmail', 'Latifa@gmail', '351b70c04c83481114f28cbdfd98a8c3', 730279952),
(6, 'Anhar', 'Anhar@gmail.com', 'AnharAli22', 777234234),
(7, 'Sami', 'sami@gmail.com', '66fcd3bddd509e7393dcc106fdfb43d3', 773221990),
(123123, 'Samia_Ali', 'samia@gmail.com', '773510ea7edb143860f15c783b045c7d', 731233154);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `balance` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wid`, `uid`, `balance`, `currency`) VALUES
(1, 7, 0, 'YR'),
(2, 7, 0, 'YR'),
(3, 7, 0, 'YR'),
(4, 7, 0, 'YR'),
(5, 7, 0, 'YR'),
(6, 7, 0, 'YR'),
(7, 7, 0, 'YR'),
(8, 7, 0, 'YR'),
(9, 7, 0, 'YR'),
(10, 7, 0, 'YR'),
(11, 7, 0, 'YR'),
(12, 7, 0, 'YR'),
(13, 7, 0, 'YR'),
(14, 7, 0, 'YR'),
(15, 7, 0, 'YR'),
(16, 7, 0, 'YR'),
(17, 7, 0, 'YR'),
(18, 7, 0, 'YR'),
(19, 7, 0, 'YR'),
(20, 7, 0, 'YR'),
(21, 7, 0, 'YR'),
(22, 7, 0, 'YR'),
(23, 7, 0, 'YR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
