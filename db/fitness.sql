-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 04:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `filter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `address`, `keyword`, `lat`, `lng`,`filter`) VALUES
(1, 'ELIXIA Eliel', 'Rautatieasema, 00100 Helsinki', 'general', 60.170435, 24.9406728,"general"), 
(2, 'Powerlifting Central Helsinki', 'Energiakatu 3, 00180 Helsinki', 'powerlifting', 60.1658434, 24.90365,"general"),
(3, 'Mayors Gym', 'Itamerenkatu 21, 00180 Helsinki', 'bodybuilding', 60.1636348, 24.910476,"general"),
(4, 'UniSport, Toolo', 'Ilmarinkatu 1, 00100 Helsinki', 'cardio', 60.1717251, 24.9216869,"general"),
(5, 'Hot Gym Kino', 'Mannerheimintie 118, 00270 Helsinki', 'boxing', 60.1920688, 24.9096268,"general"),
(6, 'Fitness24Seven', 'Albertinkatu 29, 00180 Helsinki', 'general', 60.1649298, 24.9331002,"general"),
(7, 'Fressi Kamppi', 'Annankatu 33, 00100 Helsinki', 'bodybuilding', 60.1684358, 24.9350086,"general"),
(8, 'ELIXIA Alexium', 'Aleksanterinkatu 15, 00100 Helsinki', 'general', 60.1692647, 24.9446041,"general"),
(9, 'UniSport, Porthanian liikuntatilat', 'Yliopistonkatu 3, 00100 Helsinki', 'boxing', 60.1702958,24.9484077,"general"),
(10,'GB Gym', 'Mekaanikonkatu 21, 00880 Helsinki','boxing', 60.2055044, 25.0502759,"general");

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
