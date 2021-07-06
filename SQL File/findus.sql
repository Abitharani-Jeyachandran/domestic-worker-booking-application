-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 03:43 PM
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
-- Database: `findus`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`name`, `date`, `time`, `id`, `empid`) VALUES
('Kallady', '8/9/2021', '1pm', 0, 3),
('Batticaloa', '12/10/2021', '4pm', 0, 3),
('hi', '8/9/2021', '40pm', 0, 3),
('Kallady', '25/9/2021', '3pm', 0, 3);

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
(0, 'Good', 3, 5),
(0, 'Great work!', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(0, 305109698, 1169881704, 'hio');

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
(12, 5, 3, '2021-06-24', '9 a.m', 'Kallady, Batticaloa', '2021-07-05 13:26:38', 'Sorted', '2021-07-05 13:26:38'),
(18, 4, 5, '2021-06-30', '2 p.m', 'Batti', '2021-06-27 15:42:36', NULL, NULL),
(19, 4, 3, '2021-07-13', '9 a.m', 'Kallady', '2021-07-05 13:26:38', 'Sorted', '2021-07-05 13:26:38');

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
(7, 'abc', '2021-06-22 11:47:04', NULL, 0),
(8, 'abd\\cds', '2021-07-05 13:32:26', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployers`
--

CREATE TABLE `tblemployers` (
  `id` int(11) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `NIC` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
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
(3, 'Abi', '986180397V', '$2y$12$1SQLN9UqxitrNKsGnMMkO.0MIGomRcQZi8CmyMH54mPp6uUX8v4he', '0f95d9086b7fccee99fd5547221085bf.jpg', '2021-06-21 16:15:22', '2021-07-05 17:46:42', 1),
(4, 'Nusha', '975502767V', '$2y$12$bymnBHGUNwkl.w53DA9L1ufi0dTmnxRtiVqI3NSSiDwS/PvRJe5om', '46391433815b13a4033de2f32b694741.jpg', '2021-06-21 16:35:53', '2021-06-21 16:35:53', 1),
(5, 'fghj', '986184963V', '$2y$12$H0XSSHDBguh4urfSvRI//e23XDSvOgfbJDkhkbkC0DXxVqgtb.5ua', 'c4ab99540e752cc460aa3484a4ccadb2.jpg', '2021-07-05 13:11:15', '2021-07-05 13:11:15', 1),
(6, 'fghj', 'test4@gmail.com', '$2y$12$EtfIZ14CQuuIvDUiPhWmoOxRDCg0JCXibAmm4TM12Bwg2ptp47uRe', '4846906426ec480704358a082c049801.jpg', '2021-07-05 17:48:21', '2021-07-05 17:48:21', 1),
(7, 'fghj', 'test6@gmail.com', '$2y$12$vJJHZvevRPHL2BhUD6xSgu.hZ8PSNcbKIq3OXFVi1m7i6hEfg2nbu', 'c048ad5f72e46062cd97776984ebac7e.png', '2021-07-05 17:49:12', '2021-07-05 17:49:12', 1);

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
  `Pay` varchar(255) DEFAULT NULL,
  `postinDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`jobId`, `employerId`, `jobCategory`, `salaryPackage`, `experience`, `jobLocation`, `jobDescription`, `Pay`, `postinDate`, `updationDate`) VALUES
(3, 3, 'Beautician', '1000', '7', 'Kallady, Batticaloa', 'Experienced Worker', '2021-06-24', '2021-06-21 16:16:47', '2021-06-24 06:47:09'),
(4, 4, 'Plumber', '1000/Day', '5', 'Kattankudy, Batticaloa', 'Worked over 1000 projects', '2021-06-21', '2021-06-21 16:38:33', '2021-06-22 07:27:37'),
(6, 3, 'Beautician', '100', '5', 'Batticaloa', 'dfghj', '2021-07-05', '2021-07-05 13:23:05', NULL),
(7, 3, 'House keeper', '300', '2', 'Kallady', 'sdfg', '2021-07-05', '2021-07-05 13:24:28', NULL),
(8, 3, 'Carpenter', '788', '4', 'Batticaloa', 'dfghj', NULL, '2021-07-06 13:30:27', NULL),
(9, 3, 'Carpenter', '300', '2', 'abc', 'asdf', '0000-00-00', '2021-07-06 13:41:38', NULL);

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
(4, 'Arjun', 'test1@gmail.com', 774637777, '$2y$12$cAG7/aOyKV9JN7fiSkvc4u6RawhB1fh8ypAaalTKR7fKN.qFlobMq', '6c0cc1365ad028a31fac9167aa0bbf891625490135.jpg', '2021-06-21 16:12:47', '2021-07-05 13:08:30', 1),
(5, 'Joy', 'test2@gmail.com', 774689543, '$2y$12$9ue5ALaKM7JUE35/13MGnOxl8q3YgJGQQscwsvjte6LU2hn9odREm', '8659add0632749f79e747b7259c26cd21624292408.png', '2021-06-21 16:19:18', '2021-06-21 16:20:08', 1),
(6, 'fghj', 'test5@gmail.com', 653892013, '$2y$12$4oQS5I2lBumZi1UEZWKec.vMYNwboGp0TybIREtB/75xVIiUTH/7y', NULL, '2021-07-05 12:58:36', NULL, 1);

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
(14, 4, 4, 'Accept', 'Sorted', '2021-06-21 16:57:24'),
(15, 4, 5, 'ghj', 'Sorted', '2021-06-21 16:58:23'),
(16, 3, 4, 'Accepted', 'Sorted', '2021-07-05 13:26:38');

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
(0, 'abc@gmail.com', '2021-06-22 11:47:59'),
(0, 'test5@gmail.com', '2021-07-05 13:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `username`, `status`) VALUES
(0, 1169881704, 'Abi', 'Offline now'),
(0, 305109698, 'Admin', 'Active now');

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblemployers`
--
ALTER TABLE `tblemployers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbljobs`
--
ALTER TABLE `tbljobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbljobseekers`
--
ALTER TABLE `tbljobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
