-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 09:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `name` varchar(100) NOT NULL,
  `stored_amt` int(11) NOT NULL,
  `bb_id` int(11) NOT NULL,
  `blood_gp` varchar(3) NOT NULL,
  `phone_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`name`, `stored_amt`, `bb_id`, `blood_gp`, `phone_no`) VALUES
('Red Cresent', 3, 1, 'B+', 276521921),
('Red Cresent', 5, 1, 'O+', 21672565),
('Badhon', 4, 2, 'O-', 736512812);

-- --------------------------------------------------------

--
-- Table structure for table `blood_req`
--

CREATE TABLE `blood_req` (
  `post_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `disease` varchar(50) NOT NULL,
  `blood_gp` varchar(3) NOT NULL,
  `area` varchar(20) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_req`
--

INSERT INTO `blood_req` (`post_id`, `patient_name`, `disease`, `blood_gp`, `area`, `hospital`, `description`, `patient_id`) VALUES
(15, 'Sanjida Surma', 'Fever', 'B+', 'Cumilla', 'CMH', 'urgent', 7),
(18, 'Mofiz', 'Cancer', 'A+', 'Chittagong', 'LGH', 'nothing', 7);

-- --------------------------------------------------------

--
-- Table structure for table `blood_req_contact`
--

CREATE TABLE `blood_req_contact` (
  `contact` varchar(20) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_req_contact`
--

INSERT INTO `blood_req_contact` (`contact`, `post_id`) VALUES
('0128642842', 15),
('1234567', 18);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `name` varchar(30) NOT NULL,
  `blood_gp` varchar(3) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `area` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `last_donated` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `blood_gp`, `donor_id`, `area`, `age`, `last_donated`, `email`, `password`) VALUES
('Gourob', 'O+', 11, 'Laksham', 22, '2020-06-02', 'gm@gmail.com', 'pass'),
('Masum', 'B+ ', 12, 'Sonaimuri', 23, '2020-05-12', 'mr@gmail.com', 'pass'),
('Sahadat', 'A+ ', 13, 'Chatkhil', 22, '2020-03-11', 'sh@gmail.com', 'pass'),
('Sojeb', 'B- ', 14, 'Porkora', 23, '2020-04-09', 'ss@gmail.com', 'pass'),
('Selim', 'O-', 15, 'Newkali', 25, '2020-05-19', 'sm@gmail.com', 'pass'),
('Tohid', 'AB+', 17, 'Chowmuhuni', 23, '2020-04-16', 'tr@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `donor_phone_no`
--

CREATE TABLE `donor_phone_no` (
  `phone_no` varchar(20) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_phone_no`
--

INSERT INTO `donor_phone_no` (`phone_no`, `donor_id`) VALUES
('0112778426', 17),
('01527327237', 11),
('01633527636', 12),
('01728742836', 13),
('0178132146', 15),
('0182645246', 14);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(30) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `blood_gp` varchar(3) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `patient_id`, `blood_gp`, `age`, `email`, `password`, `address`) VALUES
('Mostafa Kamal', 5, 'O+', 54, 'mk@gmail.com', 'pass', 'Barura'),
('Mesbah Uddin', 6, 'B-', 47, 'mu@gmail.com', 'pass', 'Laksham'),
('Sanjida Surma', 7, 'AB+', 43, 'sasu@gmail.com', 'pass', 'B.baria');

-- --------------------------------------------------------

--
-- Table structure for table `patient_phone_no`
--

CREATE TABLE `patient_phone_no` (
  `phone_no` varchar(20) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_phone_no`
--

INSERT INTO `patient_phone_no` (`phone_no`, `patient_id`) VALUES
('01635445573', 6),
('0165256273', 7),
('01716446456', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`bb_id`,`blood_gp`);

--
-- Indexes for table `blood_req`
--
ALTER TABLE `blood_req`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `blood_req_contact`
--
ALTER TABLE `blood_req_contact`
  ADD PRIMARY KEY (`contact`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donor_phone_no`
--
ALTER TABLE `donor_phone_no`
  ADD PRIMARY KEY (`phone_no`,`donor_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patient_phone_no`
--
ALTER TABLE `patient_phone_no`
  ADD PRIMARY KEY (`phone_no`,`patient_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_req`
--
ALTER TABLE `blood_req`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_req`
--
ALTER TABLE `blood_req`
  ADD CONSTRAINT `blood_req_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `blood_req_contact`
--
ALTER TABLE `blood_req_contact`
  ADD CONSTRAINT `blood_req_contact_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blood_req` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
