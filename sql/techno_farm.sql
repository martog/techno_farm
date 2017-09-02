-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time:  2 септ 2017 в 12:02
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
(21, 'Rent', '2017-01-03', '2017-01-18', 35.5, 699.59),
(22, 'Property', '2017-09-01', '2018-12-31', 10536.37, 5670.99);

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
(9, 'Martin Grigorov', '0894466198', 894466198, 20),
(10, 'Nov Sum', '0898989899', 898989899, 21),
(11, 'Ne sum nov, pran sum s pervol', '08999999', 8999999, 21);

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
(20, 6987.39, 21),
(21, 9880.75, 22),
(22, 3658.37, 21);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
