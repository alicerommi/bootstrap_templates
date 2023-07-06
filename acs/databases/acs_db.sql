-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 08:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_pic`) VALUES
(1, 'Binary6', 'admin', 'admin123', 'Attachment_1580395422.png');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `career_id` int(10) NOT NULL,
  `career_position_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `career_title` varchar(500) NOT NULL,
  `career_description` varchar(5000) NOT NULL,
  `career_expiry_date` date NOT NULL,
  `career_country` varchar(50) NOT NULL,
  `career_city` varchar(50) NOT NULL,
  `career_minimum_salary` varchar(50) NOT NULL,
  `career_maximum_salary` varchar(50) NOT NULL,
  `career_experience` varchar(50) NOT NULL,
  `career_education` varchar(500) NOT NULL,
  `career_type` varchar(50) NOT NULL,
  `career_added_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`career_id`, `career_position_id`, `career_title`, `career_description`, `career_expiry_date`, `career_country`, `career_city`, `career_minimum_salary`, `career_maximum_salary`, `career_experience`, `career_education`, `career_type`, `career_added_timestamp`) VALUES
(2, 8, 'HR Executive Jobs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, facilis provident quisquam, fugit sint, dolores iusto fugiat totam fuga rerum eligendi in odio magnam earum ullam eum dignissimos reiciendis? Quo?', '2020-01-31', 'Ameria', 'New York (256892)', '2500', '3500', '2 years', 'MBA', 'Full Time', '2020-01-30 07:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `career_postions`
--

CREATE TABLE `career_postions` (
  `career_postion_id` int(10) NOT NULL,
  `career_postion_name` varchar(500) NOT NULL,
  `career_postion_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_postions`
--

INSERT INTO `career_postions` (`career_postion_id`, `career_postion_name`, `career_postion_timestamp`) VALUES
(8, 'hr executive junior', '2020-01-30 07:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_subject` varchar(200) NOT NULL,
  `contact_msg` varchar(5000) NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `job_apply_id` int(10) NOT NULL,
  `career_id` int(10) NOT NULL COMMENT 'foreign key',
  `applicant_name` varchar(50) NOT NULL,
  `applicant_email_address` varchar(50) NOT NULL,
  `applicant_phone` varchar(50) NOT NULL,
  `applicant_brief_description` varchar(5000) NOT NULL,
  `applied_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicant_cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`job_apply_id`, `career_id`, `applicant_name`, `applicant_email_address`, `applicant_phone`, `applicant_brief_description`, `applied_datetime`, `applicant_cv`) VALUES
(3, 2, 'Abdul Rehman', 'rehmana578@gmail.com', '+923356050509', 'i am abdulr ehman form ajhfkldjsh lkdfjhs klfjh dflkjhfd lfdjh flkj dfh', '2020-01-30 15:58:43', '1580399923_cv_T.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `service_request_id` int(10) NOT NULL,
  `service_request_first_name` varchar(100) NOT NULL,
  `service_request_last_name` varchar(100) NOT NULL,
  `service_request_email` varchar(100) NOT NULL,
  `service_request_phone` varchar(50) NOT NULL,
  `service_request_zipcode` varchar(50) NOT NULL,
  `service_request_new_customer` varchar(50) NOT NULL,
  `service_request_msg` varchar(1000) NOT NULL,
  `service_request_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `career_postions`
--
ALTER TABLE `career_postions`
  ADD PRIMARY KEY (`career_postion_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`job_apply_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`service_request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `career_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `career_postions`
--
ALTER TABLE `career_postions`
  MODIFY `career_postion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `job_apply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `service_request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
