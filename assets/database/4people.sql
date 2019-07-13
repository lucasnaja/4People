-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2019 at 10:17 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4people`
--

-- --------------------------------------------------------

--
-- Table structure for table `banneds`
--

CREATE TABLE `banneds` (
  `banned_ip` bigint(15) NOT NULL,
  `banned_status` tinyint(1) NOT NULL DEFAULT 0,
  `banned_datetime` datetime DEFAULT NULL,
  `banned_amount` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(11) NOT NULL,
  `tool_name` varchar(255) NOT NULL,
  `tool_path` varchar(255) NOT NULL,
  `tool_type` int(1) NOT NULL,
  `tool_visits` bigint(20) UNSIGNED NOT NULL,
  `tool_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`, `tool_path`, `tool_type`, `tool_visits`, `tool_active`) VALUES
(1, 'Gerador de Certidões', 'gerador_de_certidoes', 0, 12, b'1'),
(2, 'Gerador de CNH', 'gerador_de_cnh', 0, 12, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_nickname` varchar(45) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nickname`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'Lucas Bittencourt', 'lucasnaja', 'lucasnaja0@gmail.com', '66eccf32c43c345b4e4b88bd529dc384', 'lucas_bittencourt.jpg'),
(2, 'Jairo Arcy', 'jairo_arcy', 'jairo_arcy@hotmail.com', '66eccf32c43c345b4e4b88bd529dc384', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banneds`
--
ALTER TABLE `banneds`
  ADD PRIMARY KEY (`banned_ip`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_nickname` (`user_nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;