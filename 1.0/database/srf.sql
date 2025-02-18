-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: April 09, 2024 at 02:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin@srfmail.edu.gh', '21232f297a57a5a743894a0e4a801fc3', '2024-09-04 10:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `Teacher` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `Teacher`, `Password`, `updationDate`) VALUES
(1, 'staff@srfmail.edu.gh', '1253208465b1efa876f982d8a9e73eef', '2024-09-04 11:30:57');


-- --------------------------------------------------------


--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) DEFAULT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, 'JHS 1', 1, 'A', '2024-09-04 08:31:45', NULL),
(2, 'JHS 2', 2, 'A', '2024-09-04 09:55:02', NULL),
(3, 'JHS 3', 3, 'A', '2024-09-04 09:55:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `id` int(11) NOT NULL,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeDetails` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`id`, `noticeTitle`, `noticeDetails`, `postingDate`) VALUES
(1, 'Classes Resume', 'Dear Students, The classes will resume from 05-09-2024 (Monday). Students must reach the school in proper uniform as per their arrival time.', '2024-09-04 08:42:47'),
(2, 'Holiday Homework 2024/2025', 'Holiday Homework of Summer vacation 2024 – 2023 has been uploaded and you can download it by clicking on the link.', '2024-09-04 08:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `TermId` int(11) DEFAULT NULL,
  `SemesterId` int(11) DEFAULT NULL,
  `YearId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId` ,`TermId`, `SemesterId`,`YearId`, `marks` , `PostingDate`, `UpdationDate`) VALUES
(1, 1, 1, 2,1,1,1, 89, '2024-09-04 08:41:18', NULL),
(2, 1, 1, 3,1,1,1, 87, '2024-09-04 08:41:18', NULL),
(3, 1, 1, 5,1,1,1, 66, '2024-09-04 08:41:18', NULL),
(4, 1, 1, 1,1,1,1, 78, '2024-09-04 08:41:18', NULL),
(5, 1, 1, 4,1,1,1, 90, '2024-09-04 08:41:18', NULL),
(6, 3, 1, 2,1,1,1, 80, '2024-09-04 09:56:54', NULL),
(7, 3, 1, 3,1,1,1, 66, '2024-09-04 09:56:54', NULL),
(8, 3, 1, 5,1,1,1, 87, '2024-09-04 09:56:54', NULL),
(9, 3, 1, 1,1,1,1, 76, '2024-09-04 09:56:54', NULL),
(10,3, 1, 1,1,1,4, 55, '2024-09-04 09:56:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'Angela Ampadu', '1', 'angela@gmail.com', 'Female', '1991-09-06', 1, '2024-09-04 08:38:05', NULL, 1),
(2, 'Richmond Anomah', '2', 'richmond@gmail.com', 'Male', '1992-08-31', 1, '2024-09-04 08:38:32', NULL, 1),
(3, 'Peter Nortey Noye', '3', 'peter@gmail.com', 'Male', '1998-09-02', 1, '2024-09-04 09:56:15', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '202-09-04 08:37:16', NULL),
(2, 1, 2, 1, '2024-09-04 08:40:16', NULL),
(3, 1, 3, 1, '2024-09-04 08:40:25', NULL),
(4, 1, 4, 1, '2024-09-04 08:40:32', NULL),
(5, 1, 5, 1, '2024-09-04 08:40:40', NULL),
(6, 1, 6, 1, '2024-09-04 09:55:40', NULL),
(7, 1, 7, 1, '2024-09-04 09:55:40', NULL),
(8, 1, 8, 1, '2024-09-04 09:55:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Integrated Science', 'IS', '2024-09-04 08:36:08', NULL),
(2, 'Mathematics', 'MATHS', '2024-09-04 08:39:32', NULL),
(3, 'English Language', 'EL', '2024-09-04 08:39:44', NULL),
(4, 'French Language', 'FL', '2024-09-04 08:39:53', NULL),
(5, 'Social Studies', 'SS', '2024-09-04 08:40:03', NULL),
(6, 'Information And Communication Technology', 'ICT', '2024-09-04 09:55:25', NULL),
(7, 'Ghanaian Language', 'TWI', '2024-09-04 10:06:25', NULL),
(8, 'Basic Design And Technology', 'BDT', '2024-09-04 10:55:25', NULL);


--
-- Table structure for table `terms`
--

CREATE TABLE `tblterms` (
  `id` int(11) NOT NULL,
  `term` varchar(20) NOT NULL,
 `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


INSERT INTO `tblterms` (`id`, `term`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Term 1', '2024-09-01 08:45:06', NULL),
(2, 'Term 2', '2024-01-01 08:51:05', Null),
(3, 'Term 3', '2024-05-01 09:55:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `tblsemesters` (
  `id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


INSERT INTO `tblsemesters` (`id`, `semester`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Semester 1', '2024-09-01 08:45:06', NULL),
(2, 'Semester 2', '2024-01-01 08:51:05', Null),
(3, 'Semester 3', '2024-01-01 08:51:05', Null);


-- --------------------------------------------------------



--
-- Table structure for table `year`
--

CREATE TABLE `tblyear` (
  `id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblyear` (`id`, `year`, `Creationdate`, `UpdationDate`) VALUES
(1, 2024, '2024-09-01 08:45:06', NULL),
(2, 2025, '2024-09-01 09:45:06', NULL);

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);


--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblterms`
--
ALTER TABLE `tblterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsemesters`
--
ALTER TABLE `tblsemesters`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `tblyear`
--
ALTER TABLE `tblyear`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblterms`
--
ALTER TABLE `tblterms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsemesters`
--
ALTER TABLE `tblsemesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- AUTO_INCREMENT for table `tblyear`
--
ALTER TABLE `tblyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
