-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2025 at 08:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonafide`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonafide`
--

CREATE TABLE `bonafide` (
  `prnno` bigint(20) NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected','Completed') DEFAULT 'Pending',
  `rejected` varchar(150) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bonafide`
--

INSERT INTO `bonafide` (`prnno`, `reason`, `status`, `rejected`) VALUES
(202213148, 'loan', 'Pending', 'NO'),
(202213149, 'loan', 'Pending', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `desks`
--
-- Error reading structure for table bonafide.desks: #1932 - Table &#039;bonafide.desks&#039; doesn&#039;t exist in engine
-- Error reading data for table bonafide.desks: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `bonafide`.`desks`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `distributed_bonafides`
--

CREATE TABLE `distributed_bonafides` (
  `prnno` bigint(18) NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected','Completed') DEFAULT 'Pending',
  `rejected` varchar(150) DEFAULT 'NO',
  `distributed_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributed_bonafides`
--

INSERT INTO `distributed_bonafides` (`prnno`, `reason`, `status`, `rejected`, `distributed_date`) VALUES
(202213144, 'scholarships', 'Pending', 'NO', '2025-02-08 10:57:01'),
(202213149, 'scholarships', 'Pending', 'NO', '2025-01-22 14:32:51'),
(202213149, 'loan', 'Pending', 'NO', '2025-03-17 13:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `distributed_leaving_certificates`
--

CREATE TABLE `distributed_leaving_certificates` (
  `prnno` int(11) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributed_leaving_certificates`
--

INSERT INTO `distributed_leaving_certificates` (`prnno`, `reason`, `status`) VALUES
(202213144, 'Transfer to Another College', 'completed'),
(202213148, 'Higher Studies', 'completed'),
(202213149, 'Higher Studies', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `final_year`
--

CREATE TABLE `final_year` (
  `prnno` bigint(20) NOT NULL,
  `total_fees` int(11) DEFAULT NULL,
  `paid_fees` int(11) DEFAULT NULL,
  `schlorship_form_status` varchar(8) DEFAULT NULL,
  `first_installment` varchar(3) DEFAULT NULL,
  `second_installment` varchar(3) DEFAULT NULL,
  `exam_form_status` tinyint(1) DEFAULT NULL,
  `academic_status` enum('Completed','Pursuing') DEFAULT NULL,
  `SGPA` decimal(4,2) DEFAULT NULL,
  `CGPA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_year`
--

INSERT INTO `final_year` (`prnno`, `total_fees`, `paid_fees`, `schlorship_form_status`, `first_installment`, `second_installment`, `exam_form_status`, `academic_status`, `SGPA`, `CGPA`) VALUES
(202213121, 81000, 81000, '1', '1', '1', 1, 'Completed', 10.00, 11.00),
(202213144, 81000, 44736, '1', '1', '1', 1, 'Completed', 9.00, 9.20),
(202213148, 81000, 44736, '1', '1', '1', 1, 'Completed', 10.00, 10.00),
(202213149, 81000, 8000, 'Filled', 'YES', 'NO', 1, 'Completed', 8.50, 8.20);

-- --------------------------------------------------------

--
-- Table structure for table `first_year`
--

CREATE TABLE `first_year` (
  `prnno` bigint(20) NOT NULL,
  `total_fees` int(11) DEFAULT NULL,
  `paid_fees` int(11) DEFAULT NULL,
  `schlorship_form_status` varchar(8) DEFAULT NULL,
  `first_installment` varchar(3) DEFAULT NULL,
  `second_installment` varchar(3) DEFAULT NULL,
  `exam_form_status` tinyint(1) DEFAULT NULL,
  `academic_status` enum('Completed','Pursuing') DEFAULT NULL,
  `SGPA` decimal(4,2) DEFAULT NULL,
  `CGPA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `first_year`
--

INSERT INTO `first_year` (`prnno`, `total_fees`, `paid_fees`, `schlorship_form_status`, `first_installment`, `second_installment`, `exam_form_status`, `academic_status`, `SGPA`, `CGPA`) VALUES
(202213121, 81000, 81000, '1', '1', '1', 1, 'Completed', 8.20, 8.05),
(202213144, 81000, 44736, '1', '1', '1', 1, 'Completed', 9.00, 9.20),
(202213148, 81000, 44736, '1', '1', '1', 1, 'Completed', 8.70, 10.00),
(202213149, 81000, 8000, 'Filled', 'YES', 'YES', 1, 'Completed', 8.00, 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `leaving_certificate`
--

CREATE TABLE `leaving_certificate` (
  `prnno` int(11) NOT NULL,
  `section` tinyint(4) DEFAULT 1,
  `reject` text DEFAULT 'NO',
  `reason` varchar(200) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaving_certificate`
--

INSERT INTO `leaving_certificate` (`prnno`, `section`, `reject`, `reason`, `remark`, `status`) VALUES
(202213144, 1, 'NO', 'Transfer to Another College', NULL, 'Pending'),
(202213149, 1, 'NO', 'Transfer to Another College', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `previous_acadmic_details`
--

CREATE TABLE `previous_acadmic_details` (
  `name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `relegion` varchar(20) DEFAULT NULL,
  `cast` varchar(50) DEFAULT NULL,
  `place_of_birth` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `DOB_in_words` varchar(50) DEFAULT NULL,
  `previous_institute` varchar(100) DEFAULT NULL,
  `DOA` date DEFAULT NULL,
  `standerd` varchar(20) DEFAULT NULL,
  `prnno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `previous_acadmic_details`
--

INSERT INTO `previous_acadmic_details` (`name`, `mother_name`, `relegion`, `cast`, `place_of_birth`, `nationality`, `DOB`, `DOB_in_words`, `previous_institute`, `DOA`, `standerd`, `prnno`) VALUES
('Biradar Yogeshri Shivaji', 'Laxmi', 'Hindu', 'Hatkar (NTC)', 'Pune', 'Indian', '2004-11-27', 'Twenty-Seven Two Thousand Four', 'Camp Jr college, Pune', '2022-11-12', 'TE ', 202213121),
('Gaikwad Priyanka Uddhav', 'Shalan', 'Hindu', 'Kunbi (OBC)', 'Daund', 'Indian', '2004-06-02', 'Two June Two Thousands Four', 'Camp Education Socity jr. College, Pune', '2022-11-12', 'TE ', 202213144),
('Gharde Anjali Ashok', 'Kiran', 'Buddhist', 'Mahar (SC)', 'Yavatmal', 'Indian', '2004-04-03', 'Three April Two Thousand Four', 'Shree Tripura Jr college,Latur', '2022-11-12', 'TE ', 202213148),
('Ghuge Vishal Shriram', 'Sangita', 'Hindu', 'Vanjari (NTD)', 'Sawali(Bk)', 'Indian', '2004-04-15', 'Fifteenth April Two Thousands Four', 'Shri Shivaji College, Parbhani', '2022-11-12', 'TE ', 202213149);

-- --------------------------------------------------------

--
-- Table structure for table `second_year`
--

CREATE TABLE `second_year` (
  `prnno` bigint(20) NOT NULL,
  `total_fees` int(11) DEFAULT NULL,
  `paid_fees` int(11) DEFAULT NULL,
  `schlorship_form_status` varchar(8) DEFAULT NULL,
  `first_installment` varchar(3) DEFAULT NULL,
  `second_installment` varchar(3) DEFAULT NULL,
  `exam_form_status` tinyint(1) DEFAULT NULL,
  `academic_status` enum('Completed','Pursuing') DEFAULT NULL,
  `SGPA` decimal(4,2) DEFAULT NULL,
  `CGPA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `second_year`
--

INSERT INTO `second_year` (`prnno`, `total_fees`, `paid_fees`, `schlorship_form_status`, `first_installment`, `second_installment`, `exam_form_status`, `academic_status`, `SGPA`, `CGPA`) VALUES
(202213121, 81000, 81000, '1', '1', '1', 1, 'Completed', 8.20, 8.05),
(202213144, 81000, 44736, '1', '1', '1', 1, 'Completed', 9.00, 9.20),
(202213148, 81000, 44736, '1', '1', '1', 1, 'Completed', 8.70, 10.00),
(202213149, 81000, 8000, 'Filled', 'YES', 'YES', 1, 'Completed', 8.50, 8.20);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `prnno` bigint(20) NOT NULL,
  `studname` varchar(100) NOT NULL,
  `studdob` date NOT NULL,
  `address` text NOT NULL,
  `pincode` char(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` char(10) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `branch` varchar(50) NOT NULL,
  `division` char(1) NOT NULL,
  `year` varchar(11) NOT NULL,
  `parentsphone` char(10) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `batchYear` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `library_id` varchar(20) NOT NULL,
  `placement_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`prnno`, `studname`, `studdob`, `address`, `pincode`, `email`, `phone_no`, `gender`, `branch`, `division`, `year`, `parentsphone`, `batch`, `batchYear`, `rollno`, `library_id`, `placement_status`) VALUES
(202213144, 'Priyanka Uddhav Gaikwad', '2004-06-02', 'kondhwa, Pune', '411048', 'priya@gmail.com', '8888888888', 'Female', 'Computer Science', 'A', '3rd', '0000000000', 'Morning', 2022, 144, 'K001585', 'Yes'),
(202213148, 'Anjali Ashok Gharde', '2004-04-03', 'pune', '456755', 'anjali@gmail.com', '9588679333', 'Female', 'Computer Science', 'A', '3rd', '8263851621', 'Morning', 2025, 48, '', ''),
(202213149, 'Vishal shriram Ghuge', '2004-04-15', 'jintur, Parbhani', '431510', 'vishal@gmail.com', '7620290331', 'Male', 'Computer Science', 'A', '3rd', '0000000000', 'Morning', 2025, 149, 'K001649', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `third_year`
--

CREATE TABLE `third_year` (
  `prnno` bigint(20) NOT NULL,
  `total_fees` int(11) DEFAULT NULL,
  `paid_fees` int(11) DEFAULT NULL,
  `schlorship_form_status` varchar(8) DEFAULT NULL,
  `first_installment` varchar(3) DEFAULT NULL,
  `second_installment` varchar(3) DEFAULT NULL,
  `exam_form_status` tinyint(1) DEFAULT NULL,
  `academic_status` enum('Completed','Pursuing') DEFAULT NULL,
  `SGPA` decimal(4,2) DEFAULT NULL,
  `CGPA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `third_year`
--

INSERT INTO `third_year` (`prnno`, `total_fees`, `paid_fees`, `schlorship_form_status`, `first_installment`, `second_installment`, `exam_form_status`, `academic_status`, `SGPA`, `CGPA`) VALUES
(202213121, 81000, 81000, '1', '1', '1', 1, 'Completed', 8.20, 10.00),
(202213144, 81000, 44736, '1', '1', '1', 1, 'Completed', 9.00, 9.20),
(202213148, 81000, 44736, '1', '1', '1', 1, 'Completed', 8.70, 10.00),
(202213149, 81000, 8000, 'Filled', 'YES', 'YES', 1, 'Completed', 8.50, 8.20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonafide`
--
ALTER TABLE `bonafide`
  ADD PRIMARY KEY (`prnno`);

--
-- Indexes for table `distributed_leaving_certificates`
--
ALTER TABLE `distributed_leaving_certificates`
  ADD PRIMARY KEY (`prnno`);

--
-- Indexes for table `final_year`
--
ALTER TABLE `final_year`
  ADD PRIMARY KEY (`prnno`),
  ADD UNIQUE KEY `prnno` (`prnno`);

--
-- Indexes for table `first_year`
--
ALTER TABLE `first_year`
  ADD PRIMARY KEY (`prnno`),
  ADD UNIQUE KEY `prnno` (`prnno`);

--
-- Indexes for table `leaving_certificate`
--
ALTER TABLE `leaving_certificate`
  ADD PRIMARY KEY (`prnno`);

--
-- Indexes for table `previous_acadmic_details`
--
ALTER TABLE `previous_acadmic_details`
  ADD PRIMARY KEY (`prnno`);

--
-- Indexes for table `second_year`
--
ALTER TABLE `second_year`
  ADD PRIMARY KEY (`prnno`),
  ADD UNIQUE KEY `prnno` (`prnno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`prnno`),
  ADD UNIQUE KEY `prnno` (`prnno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `third_year`
--
ALTER TABLE `third_year`
  ADD PRIMARY KEY (`prnno`),
  ADD UNIQUE KEY `prnno` (`prnno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
