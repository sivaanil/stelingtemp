-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2017 at 04:59 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.6.30-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
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
  `userRoleid` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `userEmail`, `userPass`, `userGender`, `userDob`, `userAddress`, `userPincode`, `userCity`, `userState`, `userQualification`, `userOrganization`, `userTexp`, `userIndustry`, `userRoleid`) VALUES
(1, 'Sivaanil', '', 'a@a.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'test2', 'test4', 'test32@gmail.com', '794fd8df6686e85e0d8345670d2cd4ae', 'Male', '2017-06-14', 'test', 500084, 'hyd', 'telangana', 'B Tech', 'Purpletalk', '5', 'IT', 2),
(5, 'test2', 'test4', 'test323@gmail.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', '2017-06-14', 'test', 500084, 'hyd', 'telangana', 'B Tech', 'Purpletalk', '5', 'IT', 2),
(6, 'test', 'test', 'test@gmail.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', '2013-06-21', '12th', 500084, 'Hyderabad', 'Telangana', 'Btech', 'Purpletalk', '5', 'IT', 3),
(14, 'test', 'test', 'test343@gmail.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', '2017-06-23', 'test423424234324324', 456456, 'testgfdgdf', 'test42343242', 'testts', 'testesttseets', 'esttets', 'ETSTSETS', 3),
(15, 'siva', 'aa', 'abcd@efgh.com', '3bc49b73e2fb201924d9dcce5fb6d6fd7cfbf58c49be8cc46439c05dc634b151', 'Male', '2017-06-23', 'add', 123456, 'hyd', 'tela', 'btech', 'tt', '12', 'exp', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
