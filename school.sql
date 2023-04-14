-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 11:07 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` int(12) NOT NULL,
  `date` varchar(10) NOT NULL,
  `class` int(2) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `present` varchar(300) NOT NULL,
  `absent` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `date`, `class`, `teacher`, `present`, `absent`) VALUES
(625122020, '25-12-2020', 6, '', '10,12', '11,13,14,15');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(4) NOT NULL,
  `student_id` int(4) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `year`, `semester`, `grade`) VALUES
(2, 1, 2020, 'Fall', 'A'),
(3, 2, 2020, '1st', 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(6) NOT NULL,
  `date` varchar(10) NOT NULL,
  `notice` varchar(1000) NOT NULL,
  `published_by` int(2) NOT NULL,
  `published_for` varchar(12) NOT NULL,
  `valid_till` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `date`, `notice`, `published_by`, `published_for`, `valid_till`) VALUES
(4, '26-12-20', 'All students of class VI, VII, VII IX and X should submit their final examination fee within 2nd of December.', 0, '6,7,8,9,10', '02-12-2020'),
(5, '26-12-20', 'Holiday leave will be start from 10th of December to 31st December. Class will start from 1st January as of the current class routines.', 0, '6,7,8,9,10', '31-12-2020'),
(6, '26-12-20', 'Attention all students of class 9, you are instructed to complete and submit your form of SSC exam 2021 by 10th December.', 0, '9', '10-12-2020');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(2) NOT NULL,
  `class` int(2) NOT NULL,
  `day` varchar(3) NOT NULL,
  `p1` varchar(20) NOT NULL,
  `p2` varchar(20) NOT NULL,
  `p3` varchar(20) NOT NULL,
  `p4` varchar(20) NOT NULL,
  `p5` varchar(20) DEFAULT NULL,
  `p6` varchar(20) DEFAULT NULL,
  `p7` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `class`, `day`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`) VALUES
(1, 6, 'sat', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(2, 6, 'sun', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(3, 6, 'mon', 'Bangla 2nd', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(4, 6, 'tue', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(5, 6, 'wed', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(6, 6, 'thu', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(7, 7, 'sat', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(8, 7, 'sun', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(9, 7, 'mon', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(10, 7, 'tue', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(11, 7, 'wed', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(12, 7, 'thu', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(13, 8, 'sat', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(14, 8, 'sun', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(15, 8, 'mon', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(16, 8, 'tue', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(17, 8, 'wed', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(18, 8, 'thu', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(19, 9, 'sat', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(20, 9, 'sun', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(21, 9, 'mon', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(22, 9, 'tue', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(23, 9, 'wed', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(24, 9, 'thu', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(25, 10, 'sat', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(26, 10, 'sun', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(27, 10, 'mon', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(28, 10, 'tue', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(29, 10, 'wed', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study'),
(30, 10, 'thu', 'Bangla 1st', 'Mathematics', 'English', 'Social Science', 'Science', 'ICT', 'Religious Study');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `dob` varchar(10) NOT NULL,
  `father` varchar(30) NOT NULL,
  `mother` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `class` int(2) NOT NULL,
  `roll` int(3) NOT NULL,
  `section` varchar(1) NOT NULL,
  `department` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `dob`, `father`, `mother`, `contact`, `password`, `class`, `roll`, `section`, `department`) VALUES
(1, 'Fardul Islam', 'male', '', '', '0', 0, 'ridoy420', 6, 10, 'A', 'Science'),
(2, 'Habib Mia', 'male', '', '', '0', 0, 'habib1111', 6, 11, 'F', 'Science'),
(3, 'Merajul Islam', 'male', '', '', '0', 0, 'mrsknd', 6, 12, 'a', 'Science'),
(13, 'Rahim Uddin', 'male', '', '', '0', 0, 'rahim123', 7, 2, 'F', 'Science'),
(14, 'Nancy', 'male', '', '', '0', 0, 'mrsknd', 8, 1, 'a', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `classes` varchar(10) NOT NULL,
  `subjects` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `password`, `department`, `classes`, `subjects`) VALUES
(101, 'Anisul Islam', 'anis123', 'ICT', '6,7,8,9,10', 'ICT, Mathematics'),
(102, 'MD Shafiqul Islam', 'shafiq0011', 'Science', '9,10', 'Physics, Chemistry, Biology, Higher Mathematics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
