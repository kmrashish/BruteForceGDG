-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2014 at 11:42 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--
CREATE DATABASE IF NOT EXISTS `hackathon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackathon`;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `lttd` double NOT NULL,
  `lgtd` double NOT NULL,
  `bg` varchar(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `name`, `email`, `pno`, `lttd`, `lgtd`, `bg`, `timestamp`) VALUES
(15, 'Piyush Mathur', 'piyush@gmail.com', '7894561230', 28.5663375, 77.3186499, 'O+', '2014-04-27 09:00:31'),
(16, 'Mani', 'mani@gmail.com', '9879868677', 28.5663485, 77.3186388, 'A+', '2014-04-27 09:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `lttd` double NOT NULL,
  `lgtd` double NOT NULL,
  `bg` varchar(3) NOT NULL,
  `showpno` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pno`, `lttd`, `lgtd`, `bg`, `showpno`) VALUES
(1, 'Atul Khanna', 'atul@gmail.com', '0123456789', 28.667349299999998, 77.17308959999998, 'A+', 1),
(2, 'Piyush Mathur', 'piyush@gmail.com', '7894561230', 28.69834929999, 77.27208959999999, 'O+', 0),
(3, 'Ashish Kumar', 'ashish@ashish.com', '928292922', 28.69934929999, 77.17808959999999, 'O+', 1),
(5, 'Mani', 'mani@gmail.com', '9879868677', 28.566347099999998, 77.3186334, 'A+', 1),
(6, 'sahil', 'sahil@gmail.com', '9876543210', 28.5063484, 77.3286357, 'B+', 1),
(7, 'Bharat', 'bharat@gmail.com', '9765481230', 28.5663536, 77.31863589999999, 'A+', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
