-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 07:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `username`, `password`, `phonenumber`, `email`, `role`) VALUES
(14, 'Firstii', 'Name', 'Tutor345', '$2y$10$QAepV51jfDmUD8nlWt8XXe3aZEr973UUnaQIU9IDiYMoVSr4pCX7S', 12345678, 'email@mail.com', 'tutor'),
(18, '&quot;&quot;Safwan', 'S&#039;Sha', 'Username0', '$2y$10$3sbCCrShajsDzghozEUU2.MdK1Nswargcq6plK94Yiad2SCB5V9z2', 91049474, 'asd@gmail.com', 'student'),
(19, 'First', 'last', 'username1234', '$2y$10$nLoajc8PFL49IwVUopNNL.ANSvZysLrzQl9O5lV94go7Sgbtla9aW', 12345678, 'mail@gmail.com', 'student'),
(20, 'First', 'Name', 'Tutor1', '$2y$10$FzI2CnubdC3dyXt3tKmtlukK1soeKc9XyhnCfi70fVJ9nfF.esxbi', 12345675, 'email@mail.com', 'tutor'),
(21, 'Saf', 'Shahh', 'Password2', '$2y$10$8fImaWJFv1f0kTAd5EmQ0.jMAj87bcYUQkZit2CJkJ4ZBiBQ1W91C', 12345678, 'mail@mail.com', 'tutor'),
(24, 'First', 'Subi&quot;', 'Studenttest', '$2y$10$PtYWIOzGFCv1ynwwXlKGwOIHWtvnFLpOycwW3D487/uKgrtJfyD7C', 12345678, 'email@gmail.com', 'student'),
(25, 'Boi', 'BOiiii', 'Username123', '$2y$10$BgDDFuq03ma3PUM605ui7u1TfnQ8kNk7qeZNSWK3mKA3EC0xVr06W', 12345, 'mail@mail.com', 'tutor'),
(26, 'amsd', 'jsdnoas', 'Mannn', '$2y$10$9rjQxAJLndxH6Jvu0bM4a.wVYIy9X1MDDaXhEBEy5AHp.rzkTpfOW', 123324, 'mail@mail.com', 'student'),
(27, 'First', 'eeee', 'Admin1', '$2y$10$5RXM6UtqfcLHEBKU5Z/wXupHyjrOrmOnBeUmi2OiyyFUn/cDaMaoy', 12345678, 'email@mail.com', 'useradmin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `coursedesc` varchar(255) NOT NULL,
  `tutorinfo` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `numberoflectures` int(11) NOT NULL,
  `myFile` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `teacherID`, `coursename`, `coursedesc`, `tutorinfo`, `price`, `numberoflectures`, `myFile`) VALUES
(4, 14, '14', '1', '1', 1, 1, ''),
(5, 20, '12', 'zzxvzxvzxc', '4123', 123, 12, '');

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
(78, 'hoi', 'd41d8cd98f00b204', '12/24', '122'),
(80, 'fwef', '56a91628ff64934b', '05/22', '234'),
(82, 'araegawe', 'abeac07d3c28c1be', '12/23', '234');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `reviewID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productRating` int(5) NOT NULL,
  `productReview` varchar(255) NOT NULL,
  `datePosted` varchar(25) NOT NULL,
  `productRecommendation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`reviewID`, `userName`, `productName`, `productRating`, `productReview`, `datePosted`, `productRecommendation`) VALUES
(1, 'boi', 'asd', 4, 'wow', '12/12/2020', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`reviewID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
