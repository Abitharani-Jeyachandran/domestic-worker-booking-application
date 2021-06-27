-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 03:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `Jobid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `content`, `Jobid`, `user_id`) VALUES
(0, 'Great work!', 1, 2),
(0, 'Great Work!', 2, 3),
(0, 'Hi', 2, 3),
(0, 'Good Work', 3, 5),
(0, 'Good Work', 3, 5),
(0, 'Great', 3, 5),
(0, 'Great', 3, 5),
(0, 'Great Work', 4, 5),
(0, 'Good', 4, 4),
(0, 'Good', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `UserName`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2020-06-04 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplyjob`
--

CREATE TABLE `tblapplyjob` (
  `ID` int(10) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `JobId` int(5) DEFAULT NULL,
  `EDate` varchar(100) DEFAULT NULL,
  `ETime` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Applydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `ResponseDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblapplyjob`
--

INSERT INTO `tblapplyjob` (`ID`, `UserId`, `JobId`, `EDate`, `ETime`, `Address`, `Applydate`, `Status`, `ResponseDate`) VALUES
(11, 5, 3, '2021-06-22', '1 p.m', 'Batticaloa', '2021-06-21 16:24:16', NULL, NULL),
(12, 5, 3, '2021-06-24', '9 a.m', 'Kallady, Batticaloa', '2021-06-21 16:25:06', NULL, NULL),
(15, 5, 3, '2021-06-25', '8 a.m', 'Batticaloa', '2021-06-22 12:00:16', NULL, NULL),
(16, 4, 4, '2021-06-29', '2 p.m', 'Jaffna', '2021-06-25 16:25:23', NULL, NULL),
(17, 4, 4, '2021-06-29', '2 p.m', 'Jaffna', '2021-06-25 16:26:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Carpenter', '2021-06-09 12:50:48', NULL, 0),
(2, 'Beautician', '2021-06-20 13:48:21', NULL, 0),
(3, 'Plumber', '2021-06-21 06:43:43', NULL, 0),
(4, 'House keeper', '2021-06-21 14:15:12', NULL, 0),
(5, 'Mechanics', '2021-06-22 06:14:26', NULL, 0),
(6, 'House cleaner', '2021-06-22 09:32:59', NULL, 0),
(7, 'abc', '2021-06-22 11:47:04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployers`
--

CREATE TABLE `tblemployers` (
  `id` int(11) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `NIC` varchar(250) DEFAULT NULL,
  `EmpPassword` varchar(250) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `RegDtae` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployers`
--

INSERT INTO `tblemployers` (`id`, `Name`, `NIC`, `EmpPassword`, `Image`, `RegDtae`, `LastUpdationDate`, `Is_Active`) VALUES
(3, 'Abi', '986180397V', '$2y$12$JMwDc9HZZ.iVJSNc6pVANOqPoqAHbrOIPOCg/VKAVNTFZIn/9NFyW', '0f95d9086b7fccee99fd5547221085bf.jpg', '2021-06-21 16:15:22', '2021-06-21 16:15:22', 1),
(4, 'Nusha', '975502767V', '$2y$12$bymnBHGUNwkl.w53DA9L1ufi0dTmnxRtiVqI3NSSiDwS/PvRJe5om', '46391433815b13a4033de2f32b694741.jpg', '2021-06-21 16:35:53', '2021-06-21 16:35:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobs`
--

CREATE TABLE `tbljobs` (
  `jobId` int(11) NOT NULL,
  `employerId` int(11) NOT NULL,
  `jobCategory` varchar(255) DEFAULT NULL,
  `salaryPackage` char(200) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `jobLocation` varchar(255) DEFAULT NULL,
  `jobDescription` mediumtext DEFAULT NULL,
  `JobExpdate` date DEFAULT NULL,
  `postinDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`jobId`, `employerId`, `jobCategory`, `salaryPackage`, `experience`, `jobLocation`, `jobDescription`, `JobExpdate`, `postinDate`, `updationDate`) VALUES
(3, 3, 'Beautician', '1000', '7', 'Kallady, Batticaloa', 'Experienced Worker', '2021-06-24', '2021-06-21 16:16:47', '2021-06-24 06:47:09'),
(4, 4, 'Plumber', '1000/Day', '5', 'Kattankudy, Batticaloa', 'Worked over 1000 projects', '2021-06-21', '2021-06-21 16:38:33', '2021-06-22 07:27:37'),
(5, 3, 'Beautician', '689', '5', 'Kallady', 'Work', '2021-06-22', '2021-06-22 06:33:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobseekers`
--

CREATE TABLE `tbljobseekers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `EmailId` varchar(150) DEFAULT NULL,
  `ContactNumber` bigint(15) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobseekers`
--

INSERT INTO `tbljobseekers` (`id`, `FullName`, `EmailId`, `ContactNumber`, `Password`, `ProfilePic`, `RegDate`, `LastUpdationDate`, `IsActive`) VALUES
(4, 'Arjun', 'test1@gmail.com', 774637777, '$2y$12$Z//kUcOveiHcEd/v1wHFN.2y4q78D8TeUSUHvE3dEFJUujXrjkt5.', NULL, '2021-06-21 16:12:47', NULL, 1),
(5, 'Joy', 'test2@gmail.com', 774689543, '$2y$12$9ue5ALaKM7JUE35/13MGnOxl8q3YgJGQQscwsvjte6LU2hn9odREm', '8659add0632749f79e747b7259c26cd21624292408.png', '2021-06-21 16:19:18', '2021-06-21 16:20:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `ID` int(10) NOT NULL,
  `JobID` int(5) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `ResponseDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`ID`, `JobID`, `UserID`, `Message`, `Status`, `ResponseDate`) VALUES
(12, NULL, NULL, 'Accepted', 'Sorted', '2021-06-21 16:49:38'),
(13, NULL, NULL, 'Accept', 'Sorted', '2021-06-21 16:55:16'),
(14, 4, 4, 'Accept', 'Sorted', '2021-06-21 16:57:24'),
(15, 4, 5, 'ghj', 'Sorted', '2021-06-21 16:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `ID` int(11) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` longtext DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(0, 'abijeya009@gmail.com', '2021-06-10 18:28:21'),
(0, 'joyna989@gmail.com', '2021-06-10 18:31:57'),
(0, 'joyna968@gmail.com', '2021-06-10 18:33:45'),
(0, 'abijeya00@gmail.com', '2021-06-10 18:34:38'),
(0, 'abitharani0409@gmail.com', '2021-06-10 18:35:28'),
(0, 'admin@gmail.com', '2021-06-20 13:50:11'),
(0, 'abitharani0097@gmail.com', '2021-06-21 14:16:56'),
(0, 'abi@gmail.com', '2021-06-22 09:31:33'),
(0, 'abc@gmail.com', '2021-06-22 11:47:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplyjob`
--
ALTER TABLE `tblapplyjob`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblemployers`
--
ALTER TABLE `tblemployers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljobs`
--
ALTER TABLE `tbljobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `tbljobseekers`
--
ALTER TABLE `tbljobseekers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblapplyjob`
--
ALTER TABLE `tblapplyjob`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblemployers`
--
ALTER TABLE `tblemployers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbljobs`
--
ALTER TABLE `tbljobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbljobseekers`
--
ALTER TABLE `tbljobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
