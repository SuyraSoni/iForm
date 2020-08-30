-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iform`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `com_id` int(8) NOT NULL,
  `com_content` text NOT NULL,
  `t_id` int(8) NOT NULL,
  `com_by` int(8) NOT NULL,
  `com_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`com_id`, `com_content`, `t_id`, `com_by`, `com_time`) VALUES
(1, 'This is a comment.', 1, 2, '2020-08-22 14:56:27'),
(2, 'This is another Comment.', 1, 1, '2020-08-22 14:59:00'),
(3, 'Where you learn php?', 2, 2, '2020-08-22 15:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_mail` varchar(30) NOT NULL,
  `contact_card` varchar(100) NOT NULL,
  `contact_query` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `contact_mail`, `contact_card`, `contact_query`) VALUES
(1, 'admin@gmail.com', 'Array', 'sdasfsd'),
(2, 'admin@gmail.com', 'phpPythonC++Java ScriptGo', 'fagadgadgadga'),
(3, 'admin@gmail.com', 'phpPythonC++Java ScriptGo', 'adfstbgsdsfgh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_iform`
--

CREATE TABLE `tb_iform` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_desc` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_iform`
--

INSERT INTO `tb_iform` (`c_id`, `c_name`, `c_desc`, `created`) VALUES
(1, 'python', 'Python is an interpreted, high-level, general-purpose programming language.', '2020-08-20 19:04:42'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. ', '2020-08-20 19:05:19'),
(3, 'php', 'PHP is a general-purpose scripting language that is especially suited to web development.', '2020-08-20 19:05:45'),
(4, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-view-controller architectural pattern.', '2020-08-20 19:06:10'),
(5, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C implementation dependencies as possible.', '2020-08-25 16:39:23'),
(6, 'Java', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2020-08-25 16:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_threads`
--

CREATE TABLE `tb_threads` (
  `t_id` int(7) NOT NULL,
  `t_title` varchar(255) NOT NULL,
  `t_desc` text NOT NULL,
  `t_cat_id` int(7) NOT NULL,
  `t_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_threads`
--

INSERT INTO `tb_threads` (`t_id`, `t_title`, `t_desc`, `t_cat_id`, `t_user_id`, `timestamp`) VALUES
(1, 'Not able to use python', 'Please help me', 1, 2, '2020-08-21 14:21:11'),
(2, 'Now am persuing learn php', 'please help me how can i learn?', 1, 1, '2020-08-21 14:22:06'),
(3, 'New title', 'New Description', 1, 1, '2020-08-22 09:46:19'),
(5, 'Add new title', 'Add new desc', 1, 2, '2020-08-22 10:51:35'),
(6, 'Add new title', 'Add new desc', 1, 2, '2020-08-22 14:49:44'),
(7, 'discussion', 'kya me kr pa rha hu', 1, 1, '2020-08-25 10:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'user@gmail.com', '$2y$10$VDFi2unUrV7BTIpI2HF4H.LxnC66b/ueNYmwfBmiWDm9W3mWPWygS', '2020-08-23 14:04:00'),
(2, 'user1@gmail.com', '$2y$10$PylyGfFBHhai2GBiGQDm7.gE9StV1NWpvggzQwkJa4HiTxBCBzHVa', '2020-08-23 15:31:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tb_iform`
--
ALTER TABLE `tb_iform`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_threads`
--
ALTER TABLE `tb_threads`
  ADD PRIMARY KEY (`t_id`);
ALTER TABLE `tb_threads` ADD FULLTEXT KEY `t_title` (`t_title`,`t_desc`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `com_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_iform`
--
ALTER TABLE `tb_iform`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_threads`
--
ALTER TABLE `tb_threads`
  MODIFY `t_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
