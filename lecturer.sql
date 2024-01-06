-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 09:06 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecturer`
--
CREATE DATABASE IF NOT EXISTS `lecturer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lecturer`;

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `acd_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `f_session` varchar(255) NOT NULL,
  `t_session` varchar(255) NOT NULL,
  `year_award` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `t_marks` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`email`, `password`) VALUES
('YWRtaW5AZW1haWwuY29t', 'YWRtaW4=');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exp_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `scale` varchar(255) NOT NULL,
  `job_profile` varchar(255) NOT NULL,
  `d_from` date NOT NULL,
  `d_to` date NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `user_id` int(255) NOT NULL,
  `subject1` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `subject2` varchar(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `subject3` varchar(255) NOT NULL,
  `status3` varchar(255) NOT NULL,
  `subject4` varchar(255) NOT NULL,
  `status4` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `subject`) VALUES
('STID3024', 'SYSTEM ANALYSIS AND DESIGN'),
('STIK2044', 'OPERATING SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `marital` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `domicile` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `passing_year` varchar(255) NOT NULL,
  `pec` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `postal_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`acd_id`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `acd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
