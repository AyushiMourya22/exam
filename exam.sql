-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2022 at 02:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `q_id` int(10) NOT NULL,
  `question_contents` varchar(300) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` varchar(1) NOT NULL,
  `correct_marks` float NOT NULL,
  `incorrect_marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`q_id`, `question_contents`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `correct_marks`, `incorrect_marks`) VALUES
(1, 'Who is the inventor of C?', 'Denis Ritchie', 'James Gosling', 'Brajane Stroupstrup', 'None of These', 'a', 2, 0.5),
(2, 'What is the full form of DBMS?', 'Data of Binary Management System', 'Database Management System', 'Database Management Service', 'Data Backup Management System', 'c', 2, 0.5),
(3, 'Who created the first DBMS?', 'Edgar Frank Codd', 'Charles Bachman', 'Charles Babbage', 'Sharon B. Codd', 'b', 2, 0.5),
(4, 'Which type of data can be stored in the database?', 'Image oriented data', 'Text, files containing data', 'Data in the form of audio or video', 'All of the above', 'd', 2, 0.5),
(5, 'Which of the following is not a type of database?', 'Hierarchical', 'Network', 'Distributed', 'Decentralized', 'd', 2, 0.5),
(6, 'Which of the following is not an example of DBMS?', 'MySQL', 'Microsoft Access', 'IBM DB2', 'Google', 'd', 2, 0.5),
(7, 'Which of the following is not a function of the database?', 'Managing stored data', 'Manipulating data', 'Security for stored data', 'Analysing code', 'd', 2, 0.5),
(8, 'What is information about data called?', 'Hyper data', 'Tera data', 'Meta data', 'Relations', 'c', 2, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(10) NOT NULL,
  `roll_no` varchar(30) DEFAULT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `total_marks` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `roll_no`, `student_name`, `total_marks`) VALUES
(1, '1811603', NULL, 0),
(2, '20bme09', NULL, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_name` varchar(50) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `course` varchar(30) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_name`, `roll_no`, `course`, `branch`, `semester`) VALUES
('Poornima Singh Thakur', '1811603', 'PhD', 'CSE', 7),
('Sanjay Kumar', '20bme09', 'B.Tech.', 'ECE', 5),
('Amit Bhati', '20pcse02', 'PhD', 'CSE', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `student` (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
