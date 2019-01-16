-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 02:53 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MCode` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Power` float NOT NULL,
  `Group_id` int(11) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Unit_price` float NOT NULL,
  `Activity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MCode`, `Name`, `Power`, `Group_id`, `Company`, `Unit_price`, `Activity`) VALUES
(1, 'Napa', 10, 2, 'Ace', 2, 'Active'),
(2, 'Ace Plusplusm', 4440, 2, 'Squareea', 9002, 'Active'),
(3, 'Napaa', 44, 6, 'pre', 60, 'Active'),
(4, 'Losectilee', 200, 5, 'aljfaaa', 57, 'Active'),
(5, 'sargelll', 200, 5, 'Aristo fharmaa', 78, 'Active'),
(6, 'Neoceptine', 12, 6, 'Helath', 3, 'Active'),
(7, 'Ac', 50, 6, 'nkr', 4, 'Deactive'),
(8, 'Ac', 50, 6, 'nkr', 4, 'Deactive'),
(9, 'koushik', 10, 6, 'aiub', 20, 'Active'),
(10, 'pento', 12, 6, 'fkf', 7, 'Deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD UNIQUE KEY `MCode` (`MCode`),
  ADD KEY `Group_id` (`Group_id`),
  ADD KEY `MCode_2` (`MCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
