-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 03:20 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('65390f2dadb7a8f14c71cea9fb39a3b7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450630222, ''),
('e0990ae0aff5022ce08a7c3b70bca4ae', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450613949, '');

-- --------------------------------------------------------

--
-- Table structure for table `murge`
--

CREATE TABLE IF NOT EXISTS `murge` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murge`
--

INSERT INTO `murge` (`id`, `email`, `password`) VALUES
(1, 'testing@trial.com', '4785118b8ebb5e863d4adc14b478ab4f'),
(4, 'welcome@hello.com', '843f257a9b35eff7032b03bce281feb1'),
(5, 'wer@wer.com', '22c276a05aa7c90566ae2175bcc2a9b0'),
(6, 'gabbu@gabbu.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(7, '1@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4');

-- --------------------------------------------------------

--
-- Table structure for table `user-data`
--

CREATE TABLE IF NOT EXISTS `user-data` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poem` varchar(8000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `words` varchar(100) NOT NULL,
  `score` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-data`
--

INSERT INTO `user-data` (`id`, `email`, `poem`, `title`, `words`, `score`) VALUES
(1, 'mohit@mail.com', 'I rock!\r\nI rock!', 'Me, Myself', '', 5),
(2, 'chand@mail.com', 'I code.', 'My Poem', '', 7),
(3, '1@gmail.com', 'mate sate ate', '', '', 1),
(4, '0', 'mmggiuyuy', 'm', '', 0),
(5, '0', 'mm', 'm', '', 0),
(6, '0', 'mm', 'mm', '', 0),
(7, '1@gmail.com', 'ssas', 's', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `murge`
--
ALTER TABLE `murge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-data`
--
ALTER TABLE `user-data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `murge`
--
ALTER TABLE `murge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user-data`
--
ALTER TABLE `user-data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;