-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 11:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_selector`
--

-- --------------------------------------------------------

--
-- Table structure for table `major_subjects`
--

CREATE TABLE `major_subjects` (
  `subject_name` varchar(300) NOT NULL,
  `category` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major_subjects`
--

INSERT INTO `major_subjects` (`subject_name`, `category`) VALUES
('Bio-Chemistry', '3'),
('Bio-Technology', '3'),
('Botany', '3'),
('Chemistry', '1'),
('Electronics', '1'),
('Environmental Science', '2'),
('Geography', '2'),
('Geology', '2'),
('Information Technology', '1'),
('Physics', '1'),
('Statistics', '1'),
('Water Management', '2'),
('Zoology', '3');

-- --------------------------------------------------------

--
-- Table structure for table `minor_subjects`
--

CREATE TABLE `minor_subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minor_subjects`
--

INSERT INTO `minor_subjects` (`id`, `subject_name`) VALUES
(1, 'Botany'),
(2, 'Zoology'),
(3, 'Bio-Chemistry'),
(4, 'Bio-Technology'),
(5, 'Chemistry'),
(6, 'Environmental Science'),
(7, 'Geography'),
(8, 'Geology'),
(9, 'Water Management'),
(10, 'Electronics'),
(11, 'Information Technology'),
(12, 'Physics'),
(13, 'Statistics'),
(14, 'Mathematics'),
(15, 'English'),
(16, 'Clinical Bio-Chemistry'),
(17, 'Environment and Water Management'),
(18, 'Bio-Informatics'),
(19, 'Human Genetics');

-- --------------------------------------------------------

--
-- Table structure for table `multidisciplinary_subjects`
--

CREATE TABLE `multidisciplinary_subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `subject_code` varchar(200) NOT NULL,
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multidisciplinary_subjects`
--

INSERT INTO `multidisciplinary_subjects` (`id`, `subject_name`, `subject_code`, `count`) VALUES
(1, 'English', 'ENG', 0),
(2, 'Math', 'MATH', 0),
(3, 'History', 'HIST', 0),
(4, 'Urdu', 'URDU', 0),
(5, 'Physical Education', 'PEDU', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skill_subjects`
--

CREATE TABLE `skill_subjects` (
  `id` int(11) NOT NULL,
  `parent_department` varchar(100) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `category` enum('0','1','2','3') NOT NULL,
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill_subjects`
--

INSERT INTO `skill_subjects` (`id`, `parent_department`, `subject_name`, `category`, `count`) VALUES
(1, 'English', 'Soft Skill', '0', 0),
(2, 'Zoology', 'Apiculture', '3', 0),
(3, 'Physics', 'TESTING, INSTALLATION AND REPAIRING SKILLS IN ELECTRICAL AND ELECTRONIC CONSUMER PRODUCTS ', '1', 0),
(4, 'Water Management', 'Processing & Packaging of Potable Drinking Water', '2', 0),
(5, 'Information Technology', 'BASICS OF SOFTWARE DEVELOPMENT USING PYTHON', '1', 0),
(6, 'BioChemistry', 'Clinical Testing', '3', 0),
(7, 'Mathematics', 'Mathematical logic and critical thinking ', '1', 0),
(8, 'BioTechnology', 'Lab Techniques in Biotechnology-I', '3', 0),
(9, 'Statistics', 'Statistical methods -I', '1', 0),
(10, 'Environmental Science', 'Vermitechnology-1', '2', 0),
(11, 'Geology', 'Field Geology', '2', 0),
(12, 'Geography', 'Mapping Techniques', '2', 0),
(13, 'Chemistry', 'Food Additives', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `std_name` varchar(200) NOT NULL,
  `form_number` varchar(100) NOT NULL,
  `mobile_number` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `minor` varchar(100) NOT NULL,
  `multidisciplinary_subject` varchar(100) NOT NULL,
  `skill_subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minor_subjects`
--
ALTER TABLE `minor_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multidisciplinary_subjects`
--
ALTER TABLE `multidisciplinary_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_subjects`
--
ALTER TABLE `skill_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `minor_subjects`
--
ALTER TABLE `minor_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `multidisciplinary_subjects`
--
ALTER TABLE `multidisciplinary_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skill_subjects`
--
ALTER TABLE `skill_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
