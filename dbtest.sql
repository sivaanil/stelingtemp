-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2017 at 07:00 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fisstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userGender` enum('Male','Female') NOT NULL,
  `userDob` date DEFAULT NULL,
  `userAddress` varchar(255) DEFAULT NULL,
  `userPincode` int(111) NOT NULL,
  `userCity` varchar(255) DEFAULT NULL,
  `userState` varchar(255) DEFAULT NULL,
  `userQualification` varchar(255) DEFAULT NULL,
  `userOrganization` varchar(255) DEFAULT NULL,
  `userTexp` varchar(255) DEFAULT NULL,
  `userIndustry` varchar(255) DEFAULT NULL,
  `userRoleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fisstName`, `lastName`, `userEmail`, `userPass`, `userGender`, `userDob`, `userAddress`, `userPincode`, `userCity`, `userState`, `userQualification`, `userOrganization`, `userTexp`, `userIndustry`, `userRoleid`) VALUES
(1, 'Sivaanil', '', 'a@a.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
