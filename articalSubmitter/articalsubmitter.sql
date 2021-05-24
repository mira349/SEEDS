-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 09:38 PM
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
-- Database: `articalsubmitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `artical`
--

CREATE TABLE `artical` (
  `id` double NOT NULL,
  `author` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `journal` varchar(500) NOT NULL,
  `year` int(4) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `number` varchar(20) NOT NULL,
  `pages` int(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `annote` int(20) NOT NULL,
  `publisher` varchar(500) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artical`
--

INSERT INTO `artical` (`id`, `author`, `title`, `journal`, `year`, `volume`, `number`, `pages`, `month`, `annote`, `publisher`, `registerDate`, `status`) VALUES
(1, 'Muhammad Bilal Khan', 'Rawalpindi', 'hide', 2004, 'Volume 1', '2147483647', 125, 'May', 0, '', '14:45 12:05:2021', 'Pending'),
(2, 'Ahmaad Muhammad Bilal 12', 'Rawalpindi', 'hide', 2005, 'Volume 1', '2147483647', 123, 'June', 0, 'Publication', '16:00 12:05:2021', 'Pending'),
(3, 'Bilal Khan', 'My Biblography', 'Biblography', 2021, 'Vol. 1', '923455292157', 135, 'August', 0, 'Self publication', '18:08 12:05:2021', 'Pending'),
(4, 'Muhammad Bilal Khan', '', '', 2020, '', '', 12, 'October', 0, '', '18:31 12:05:2021', 'Pending'),
(5, 'Bilal Khan', 'My Details', 'Contact Info: 923455292157', 2021, 'Vol 1', '00923455292157', 125, 'June', 0, 'Self publication', '20:38 13:05:2021', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artical`
--
ALTER TABLE `artical`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
