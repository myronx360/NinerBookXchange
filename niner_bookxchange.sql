-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 03:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niner bookxchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Title`, `Author`, `ClassID`, `ISBN`) VALUES
(1, 'Learn Accounting', 'Vince McMann', 1, '0486994536'),
(2, 'Head First Java', 'Bill Gates', 2, '0596009208'),
(3, 'Signals and Waves', 'Jamas Conrad', 3, '0981991536'),
(4, 'Calculus X', 'Albert Einstein', 4, '0486404536');

-- --------------------------------------------------------

--
-- Table structure for table `book_catalog`
--

CREATE TABLE `book_catalog` (
  `postingID` int(11) NOT NULL,
  `UserID` int(8) NOT NULL,
  `BookID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_catalog`
--

INSERT INTO `book_catalog` (`postingID`, `UserID`, `BookID`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 3, 3),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `Crs_Dep` varchar(255) NOT NULL,
  `Crs_Num` int(6) NOT NULL,
  `Section` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `Crs_Dep`, `Crs_Num`, `Section`) VALUES
(1, 'ACCT', 12, 1),
(2, 'CCI', 15, 2),
(3, 'ECGR', 2, 1),
(4, 'MATH', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Fine_Amount` decimal(10,2) DEFAULT NULL,
  `Type` enum('admin','faculty','student') NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Fine_Amount`, `Type`, `Password`, `Username`) VALUES
(1, 'Alex', 'Ryder', '0.00', 'admin', '---', 'aryder'),
(2, 'John', 'Shepard', '0.00', 'faculty', '---', 'jshep'),
(3, 'Jane', 'Doe', '0.00', 'student', '---', 'jdoe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD UNIQUE KEY `ClassID` (`ClassID`);

--
-- Indexes for table `book_catalog`
--
ALTER TABLE `book_catalog`
  ADD PRIMARY KEY (`postingID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_catalog`
--
ALTER TABLE `book_catalog`
  MODIFY `postingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
