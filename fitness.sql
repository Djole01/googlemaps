-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 03:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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

INSERT INTO `gyms` (`id`, `name`, `address`, `keyword`, `lat`, `lng`, `filter`) VALUES
(1, 'ELIXIA Eliel', 'Rautatieasema, 00100 Helsinki', 'general', 60.170437, 24.940674, 'general'),
(2, 'Powerlifting Central Helsinki', 'Energiakatu 3, 00180 Helsinki', 'powerlifting', 60.165844, 24.903650, 'general'),
(3, 'Mayors Gym', 'Itamerenkatu 21, 00180 Helsinki', 'bodybuilding', 60.163635, 24.910477, 'general'),
(4, 'UniSport, Toolo', 'Ilmarinkatu 1, 00100 Helsinki', 'cardio', 60.171726, 24.921686, 'general'),
(5, 'Hot Gym Kino', 'Mannerheimintie 118, 00270 Helsinki', 'boxing', 60.192070, 24.909628, 'general'),
(6, 'Fitness24Seven2', 'Albertinkatu 29, 00180 Helsinki', 'general', 60.164726, 24.932947, 'general'),
(7, 'Fressi Kamppi', 'Annankatu 33, 00100 Helsinki', 'bodybuilding', 60.168434, 24.935009, 'general'),
(8, 'ELIXIA Alexium', 'Aleksanterinkatu 15, 00100 Helsinki', 'general', 60.169266, 24.944605, 'general'),
(9, 'UniSport, Porthanian liikuntatilat', 'Yliopistonkatu 3, 00100 Helsinki', 'boxing', 60.170296, 24.948408, 'general'),
(10, 'GB Gym', 'Mekaanikonkatu 21, 00880 Helsinki', 'boxing', 60.205505, 25.050276, 'general');

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
