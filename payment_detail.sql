-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 11:31 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuitionwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `number` char(16) NOT NULL,
  `expiry` char(5) NOT NULL,
  `cvv` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_detail`
--

INSERT INTO `payment_detail` (`id`, `name`, `number`, `expiry`, `cvv`) VALUES
(72, 'natasha', '1eb6b78caadae8f9', '12/23', '835'),
(73, 'nathalien', '1234567890987654', '11/29', '432'),
(74, 'jasmin', '1234568274983726', '11/23', '122'),
(75, 'hello', '2810d54607c2eaf7', '11/29', '123'),
(76, 'jaja', '56a91628ff64934b', '12/22', '224'),
(77, 'jaya', '16beec9ed62b2fad', '11/21', '234'),
(78, 'hoi', 'd41d8cd98f00b204', '12/24', '122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
