-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time:  1 септ 2017 в 23:39
-- Версия на сървъра: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techno_farm`
--

-- --------------------------------------------------------

--
-- Структура на таблица `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rent_per_decare` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `contracts`
--

INSERT INTO `contracts` (`id`, `type`, `start_date`, `end_date`, `rent_per_decare`, `price`) VALUES
(13, 'Rent', '2017-09-01', '2017-10-05', 5.32, 37.1),
(14, 'Property', '2017-09-18', '2017-11-30', 1.1, 98.7);

-- --------------------------------------------------------

--
-- Структура на таблица `landlords`
--

CREATE TABLE `landlords` (
  `id` int(11) NOT NULL,
  `fn_ln` varchar(60) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `personal_num` int(15) NOT NULL,
  `lands_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `landlords`
--

INSERT INTO `landlords` (`id`, `fn_ln`, `phone_num`, `personal_num`, `lands_id`) VALUES
(4, 'Martin Grigorov', '0894466198', 894466198, 13),
(5, 'ASD DSA', '324234234', 324234234, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `lands`
--

CREATE TABLE `lands` (
  `id` int(11) NOT NULL,
  `area` double NOT NULL,
  `contracts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `lands`
--

INSERT INTO `lands` (`id`, `area`, `contracts_id`) VALUES
(13, 5, 14),
(14, 8, 13),
(15, 5.6, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lands_id` (`lands_id`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_id` (`contracts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `landlords`
--
ALTER TABLE `landlords`
  ADD CONSTRAINT `landlords_ibfk_1` FOREIGN KEY (`lands_id`) REFERENCES `lands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `lands`
--
ALTER TABLE `lands`
  ADD CONSTRAINT `lands_ibfk_1` FOREIGN KEY (`contracts_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
