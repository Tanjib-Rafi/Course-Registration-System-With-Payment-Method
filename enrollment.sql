-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2021 at 08:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`email`, `password`) VALUES
('admin@gmail.com', '123'),
('admin1@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `coursetable`
--

CREATE TABLE `coursetable` (
  `course_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_limit` int(200) NOT NULL,
  `seat_available` int(200) NOT NULL,
  `tuitionfee` int(200) NOT NULL,
  `examfee` int(200) NOT NULL,
  `totalfee` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursetable`
--

INSERT INTO `coursetable` (`course_id`, `semester`, `course_name`, `seat_limit`, `seat_available`, `tuitionfee`, `examfee`, `totalfee`) VALUES
('1', '1st', 'CSE110- Introduction to Computer Systems (2)', 3, 1, 100, 100, 0),
('10', '2nd', 'CSE112- Structured Programming Language Laboratory (2)', 3, 3, 2000, 1000, 0),
('11', '2nd', 'EEE211- Electronics I (3)', 3, 3, 4000, 1000, 0),
('12', '2nd', 'EEE212- Electronics I Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('13', '2nd', 'CSE103- Discrete Mathematics (3)', 3, 3, 4000, 1000, 0),
('14', '2nd', 'PHY103- Engineering Physics II (3)', 3, 3, 4000, 1000, 0),
('15', '2nd', 'MAT106- Engineering Mathematics II (3)', 3, 3, 4000, 1000, 0),
('16', '2nd', 'ENG104- Developing English Skills (2)', 3, 3, 4000, 1000, 0),
('17', '3rd', 'CSE221- Data Structure (3)', 3, 3, 4000, 1000, 0),
('18', '3rd', 'CSE222- Data Structure Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('19', '3rd', 'CSE211- Object Oriented Programming (3)', 3, 3, 4000, 1000, 0),
('2', '1st', 'EEE101- Electrical Circuits I (3)', 3, 3, 4000, 1000, 0),
('20', '3rd', 'CSE212- Object Oriented Programming Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('21', '3rd', 'EEE311- Digital Electronics (3)', 3, 3, 4000, 1000, 0),
('22', '3rd', 'EEE312- Digital Electronics Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('23', '3rd', 'MAT201- Engineering Mathematics III (3)', 3, 3, 4000, 1000, 0),
('24', '3rd', 'ECO202- Basic Economics (3)', 3, 3, 4000, 1000, 0),
('25', '4th', 'CSE225- Algorithm Design and Analysis (3)', 3, 3, 4000, 1000, 0),
('26', '4th', 'CSE226- Algorithm Design and Analysis Laboratory (1)', 3, 3, 2000, 1000, 0),
('27', '4th', 'MAT203- Engineering Mathematics IV (3)', 3, 3, 4000, 1000, 0),
('28', '4th', 'EEE201- Signals & Systems (3)', 3, 3, 4000, 1000, 0),
('29', '4th', 'EEE202- Signals & Systems Laboratory (1)', 3, 3, 2000, 1000, 0),
('3', '1st', 'EEE102- Electrical Circuits I Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('30', '4th', 'CSE237- Database Management System (3)', 3, 3, 4000, 1000, 0),
('31', '4th', 'CSE238- Database Management System Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('32', '4th', 'MGT203- Industrial and Business Management (3)', 3, 3, 4000, 1000, 0),
('33', '5th', 'CSE301- Computational Methods for Engineering Problems (3)', 3, 3, 4000, 1000, 0),
('34', '5th', 'CSE302- Computational Methods for Engineering Problems Laboratory (1)', 3, 3, 2000, 1000, 0),
('35', '5th', 'EEE303- Microprocessor & Microcontroller (3)', 3, 3, 4000, 1000, 0),
('36', '5th', 'EEE304- Microprocessor & Microcontroller Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('37', '5th', 'CSE305- Software Engineering & Information System Design (4)', 3, 3, 4000, 1000, 0),
('38', '5th', 'CSE306- Software Engineering & Information System Design Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('39', '5th', 'EEE309- Communications Theory (3)', 3, 3, 4000, 1000, 0),
('4', '1st', 'MAT105- Engineering Mathematics I (3)', 3, 3, 4000, 1000, 0),
('40', '5th', 'EEE310- Communications Laboratory (1.5)', 0, 0, 2000, 1000, 0),
('41', '5th', 'MGT251- Organizational Behavior (3)', 3, 3, 4000, 1000, 0),
('42', '6th', 'CSE333- Operating Systems (3)', 3, 3, 4000, 1000, 0),
('43', '6th', 'CSE334- Operating Systems Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('44', '6th', 'CSE337- Computer Organization & Architecture (3)', 3, 3, 4000, 1000, 0),
('45', '6th', 'CSE317- Artificial Intelligence (3)', 3, 3, 4000, 1000, 0),
('46', '6th', 'CSE318- Artificial Intelligence Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('47', '6th', 'CSE367- Computer Network (3)', 3, 3, 4000, 1000, 0),
('48', '6th', 'CSE368- Computer Network Laboratory (1.5)', 3, 3, 2000, 1000, 0),
('49', '6th', 'CSE338- Software Development (2)', 3, 3, 4000, 1000, 0),
('5', '1st', 'PHY101- Engineering Physics 1 (3)', 3, 3, 4000, 1000, 0),
('50', '6th', 'CSE364- Data Communication (3)', 3, 3, 4000, 1000, 0),
('51', '7th', 'EEE 313 Control Systems 3', 3, 3, 4000, 1000, 0),
('52', '7th', 'EEE 314 Control Systems Laboratory 1.5', 3, 3, 2000, 1000, 0),
('53', '7th', 'ENG 401 Technical Writing & Presentation 2', 3, 3, 4000, 1000, 0),
('54', '7th', 'CSE 309 Theory of Computation 2', 3, 3, 4000, 1000, 0),
('55', '7th', 'CSE 453 Compiler Construction 3', 3, 3, 4000, 1000, 0),
('56', '7th', 'CSE 454 Compiler Construction Laboratory 1.5', 3, 3, 2000, 1000, 0),
('57', '7th', 'CSE 401 Project I (For 7th semester only) 2', 3, 3, 8000, 2000, 0),
('58', '7th', '	CSE 400 Thesis (Two semesters long course, i.e., for 7th & 8th semesters) 4', 3, 3, 10000, 2000, 0),
('59', '8th', 'CSE 400 Thesis (Two semesters long course, i.e., for 7th & 8th semesters) 4', 3, 3, 5000, 1000, 0),
('6', '1st', 'ME101- Mechanical Engineering Drawing & CAD (1)', 3, 3, 2000, 1000, 0),
('60', '8th', 'CSE 411 Project Management for Information Systems 3', 3, 3, 4000, 1000, 0),
('61', '8th', 'CSE 402 Project II/Internship (For 8th semester only) 2', 3, 3, 4000, 1000, 0),
('62', '8th', 'CSE 412 Project Management for Information Systems Laboratory 1', 3, 3, 2000, 1000, 0),
('63', '8th', 'CSE 413 Advanced Database design 3', 3, 3, 4000, 1000, 0),
('64', '8th', 'CSE 451 Neural Network & Fuzzy Logic 3', 3, 3, 4000, 1000, 0),
('65', '8th', 'CSE 452 Neural Network & Fuzzy Logic Laboratory 1', 3, 3, 2000, 1000, 0),
('66', '8th', 'CSE 417 Advanced Software Engineering 3', 3, 3, 4000, 1000, 0),
('7', '1st', 'ACC101- Basic Accounting (3)', 3, 3, 4000, 1000, 0),
('8', '1st', 'ENG101- General English (3)', 3, 3, 4000, 1000, 0),
('9', '2nd', 'CSE111- Structured Programming Language (2)', 3, 3, 4000, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `status` int(200) NOT NULL,
  `exam_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`status`, `exam_type`) VALUES
(1, 'Recourse'),
(2, 'Regular'),
(3, 'Retake');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `roll_no` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `trxid` varchar(200) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `monthi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`roll_no`, `amount`, `trxid`, `transaction`, `monthi`) VALUES
(1, 200, 'ch_1Iin4KDfbWnbeNn8HZ4CFWXr', 'txn_1Iin4KDfbWnbeNn8iKqWxwSD', '0000-00-00'),
(99, 39200, 'ch_1IinW5DfbWnbeNn8a0uI0xWS', 'txn_1IinW5DfbWnbeNn8gvADNJwV', '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `pendingcourse`
--

CREATE TABLE `pendingcourse` (
  `roll_no` int(200) NOT NULL,
  `course_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coursefee` int(200) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendingcourse`
--

INSERT INTO `pendingcourse` (`roll_no`, `course_id`, `semester`, `course_name`, `exam_type`, `coursefee`, `status`) VALUES
(5747, '1', '1st', 'CSE110- Introduction to Computer Systems (2)', 'Regular', 0, 1),
(99, '33', '5th', 'CSE301- Computational Methods for Engineering Problems (3)', 'Recourse', 0, 1),
(5747, '8', '1st', 'ENG101- General English (3)', 'Recourse', 0, 1),
(1, '1', '1st', 'CSE110- Introduction to Computer Systems (2)', 'Recourse', 0, 1),
(1, '3', '1st', 'EEE102- Electrical Circuits I Laboratory (1.5)', 'Recourse', 0, 1),
(99, '17', '3rd', 'CSE221- Data Structure (3)', 'Recourse', 0, 1),
(99, '51', '7th', 'EEE 313 Control Systems 3', 'Recourse', 0, 1),
(99, '17', '3rd', 'CSE221- Data Structure (3)', 'Recourse', 0, 1),
(99, '17', '3rd', 'CSE221- Data Structure (3)', 'Recourse', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `status`) VALUES
('Fall 2020 (B. Sc.)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentsignup`
--

CREATE TABLE `studentsignup` (
  `student_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` int(200) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `guardian_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentsignup`
--

INSERT INTO `studentsignup` (`student_name`, `roll_no`, `email`, `department`, `father_name`, `mother_name`, `address`, `mobile_no`, `guardian_name`, `password`, `confirm_password`, `img`) VALUES
('a', 1, 'a@gmail.com', 'CSE', 'gd', 'gs', 'asdfs', 24, 'afgafg', '123', '', '12.jpg'),
('b', 2, 'b@gmail.com', 'cse', 'dfag', 'afgaf', 'afdgsdfg', 346546, 'fgafsg', '123', '123', ''),
('c', 7, 'c@gmail.com', 'CSE', 'sf', 'sg', 'sgfdg', 344, 'dfg', '123', '123', '12.jpg'),
('Bill Gates', 99, 'billgates@gmail.com', 'CSE', 'afgfag', 'afgfadsg', 'adfghdfasg', 53656, 'sghsdg', '123', '123', 'bill.jpg'),
('sthsdg', 5747, 'dfhsdh@gmail.com', 'CSE', 'sgfhsgd', 'sgdhsg', 'sghsgdh', 63457, 'dfgsdf', '123', '123', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachersignup`
--

CREATE TABLE `teachersignup` (
  `teacher_name` varchar(200) NOT NULL,
  `id_no` int(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(30) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `nid_no` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachersignup`
--

INSERT INTO `teachersignup` (`teacher_name`, `id_no`, `email`, `department`, `father_name`, `mother_name`, `address`, `mobile_no`, `nid_no`, `password`, `confirm_password`, `img`) VALUES
('a', 2, 'a@gmail.com', 'cse', 'af', 'mf', 'ctg', 346546, 76557, '123', '123', '12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursetable`
--
ALTER TABLE `coursetable`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`exam_type`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `pendingcourse`
--
ALTER TABLE `pendingcourse`
  ADD KEY `roll_no` (`roll_no`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `studentsignup`
--
ALTER TABLE `studentsignup`
  ADD PRIMARY KEY (`roll_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendingcourse`
--
ALTER TABLE `pendingcourse`
  ADD CONSTRAINT `pendingcourse_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `studentsignup` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendingcourse_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `coursetable` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
