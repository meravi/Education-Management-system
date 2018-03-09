-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 03:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_term`
--

CREATE TABLE `exam_term` (
  `id` int(12) NOT NULL,
  `name` varchar(450) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_term`
--

INSERT INTO `exam_term` (`id`, `name`) VALUES
(6, 'mid_term_1'),
(5, 'first_term');

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(12) NOT NULL,
  `website_name` varchar(400) NOT NULL,
  `website_address` varchar(500) NOT NULL,
  `website_phone1` varchar(30) NOT NULL,
  `website_phone2` varchar(30) NOT NULL,
  `website_email1` varchar(200) NOT NULL,
  `website_email2` varchar(200) NOT NULL,
  `website_start` varchar(25) NOT NULL,
  `web_about` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `website_name`, `website_address`, `website_phone1`, `website_phone2`, `website_email1`, `website_email2`, `website_start`, `web_about`) VALUES
(5, 'Lokanthali Business', 'Kausaltar', '12345678', '1222222', 'lokanthalikhabar@gmail.com', 'llllllll@gmail.com', '2000', 'welcome to our company. lokanthali khabar one of the popular news portal in bhaktapur........');

-- --------------------------------------------------------

--
-- Table structure for table `meadmin`
--

CREATE TABLE `meadmin` (
  `id` int(12) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `t_staff_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meadmin`
--

INSERT INTO `meadmin` (`id`, `admin_username`, `admin_password`, `t_staff_type`) VALUES
(1, 'ravi@ravi', 'ravi', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(6) UNSIGNED NOT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `student_grade` varchar(10) DEFAULT NULL,
  `english` varchar(250) DEFAULT NULL,
  `english2` varchar(250) DEFAULT NULL,
  `math` varchar(250) DEFAULT NULL,
  `math2` varchar(250) DEFAULT NULL,
  `Social` varchar(250) DEFAULT NULL,
  `Health` varchar(250) DEFAULT NULL,
  `GK` varchar(250) DEFAULT NULL,
  `Computer` varchar(250) DEFAULT NULL,
  `Science` varchar(250) DEFAULT NULL,
  `Nepali` varchar(250) DEFAULT NULL,
  `first_term` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_info`
--

CREATE TABLE `st_info` (
  `st_id` int(12) NOT NULL,
  `st_fullname` varchar(100) NOT NULL,
  `st_username` varchar(30) NOT NULL,
  `st_password` varchar(100) NOT NULL,
  `st_grade` int(5) NOT NULL,
  `roll_no` int(5) NOT NULL,
  `st_dob` varchar(20) NOT NULL,
  `st_address` varchar(100) NOT NULL,
  `st_district` varchar(100) NOT NULL,
  `st_gender` varchar(12) NOT NULL,
  `st_father` varchar(100) NOT NULL,
  `st_mother` varchar(100) NOT NULL,
  `st_parents_contact` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_info`
--

INSERT INTO `st_info` (`st_id`, `st_fullname`, `st_username`, `st_password`, `st_grade`, `roll_no`, `st_dob`, `st_address`, `st_district`, `st_gender`, `st_father`, `st_mother`, `st_parents_contact`) VALUES
(1, 'Ravi Khadka', 'ravi2056', 'ravi', 10, 2, '11/17/2056', 'lokanthali', 'Bhaktapur', 'Male', 'Abc Xyz', 'Bcd Xyz', '9800000'),
(2, 'Hari Thapa', 'hari2055', 'asdf', 10, 12, '11/17/2055', 'Kausaltar', 'Bhaktapur', 'Male', 'Ram Thapa', 'Sita Thapa', '9812222200'),
(5, 'Saugat Gautam', 'saugat2055', 'saugat2055', 7, 12, '12 Jan 1999', 'Jadibuti', 'Kathmandu', 'Male', 'John Gautam', 'Sita Gautam', '9802212222'),
(3, 'qwe', 'asdf', 'asdf', 8, 11, '27 Dec 1998', 'Banepa', 'Kavre', 'Male', 'aasd', 'aasdf', '9812222'),
(4, 'Robin Dhakal', 'robin2053', '123456', 10, 1, '20 Jan 1994', 'Patan', 'Lalitpur', 'Male', 'Rajan Dhakal', 'Rama Dhakal', '9841111'),
(9, 'rajkumar xyz', 'rajkumar', 'abcdef', 10, 5, '13 Jan 2000', 'Kausaltar', 'Bhaktapur', 'Male', 'Abc xyz', 'Bcd xyz', '98000000'),
(8, 'Your Name', 'yourname', 'yourname1', 5, 1, '27 Jan 2000', 'Lokanthali', 'Bhaktapur', 'Male', 'John Cena', 'Sita Cena', '9811111111'),
(10, 'dsdsdsd', 'aaaa', 'abc', 2, 1, '1 Jan 2000', 'Tinkune', 'Kathmandu', 'Male', 'abbb', 'acc', '123456'),
(12, 'dsdsds', 'qq', '123', 3, 1, '28 jan 2000', 'adsd', 'dsdsd', 'Male', 'dsds', 'ddsds', '12121');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_info`
--

CREATE TABLE `subjects_info` (
  `id` int(12) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `t_fullname` varchar(200) NOT NULL,
  `t_email` varchar(200) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `time` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_info`
--

INSERT INTO `subjects_info` (`id`, `subject_name`, `t_fullname`, `t_email`, `grade`, `time`) VALUES
(1, 'Math', 'ram parsad thapa', 'ram@ram', '9', '10:00AM - 10:45AM'),
(2, 'Computer', 'Ravi Khadka', 'rrrrr@gmail.com', '10', '10:00AM - 10:45AM'),
(3, 'English', 'Rabin Khadka', 'rabin@gmail.com', '10', '10:45AM - 11:30AM');

-- --------------------------------------------------------

--
-- Table structure for table `sub_class_name`
--

CREATE TABLE `sub_class_name` (
  `id` int(12) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_class_name`
--

INSERT INTO `sub_class_name` (`id`, `subject`, `class`) VALUES
(1, 'English', '1'),
(2, 'Nepali', '2'),
(3, 'Social', '3'),
(4, 'Computer ', '4'),
(5, 'Math', '5'),
(6, 'Optional Math', '6'),
(7, 'Health', '7'),
(8, 'Grammar', '8'),
(9, 'GK', '9'),
(10, 'Science', '10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `t_id` int(12) NOT NULL,
  `t_fullname` varchar(150) NOT NULL,
  `t_address` varchar(200) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `t_username` varchar(150) NOT NULL,
  `t_pass` varchar(50) NOT NULL,
  `t_father` varchar(150) NOT NULL,
  `t_mother` varchar(150) NOT NULL,
  `t_dob` varchar(50) NOT NULL,
  `t_qualification` varchar(800) NOT NULL,
  `t_contact` int(255) NOT NULL,
  `t_staff_type` varchar(200) NOT NULL,
  `t_gender` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`t_id`, `t_fullname`, `t_address`, `t_email`, `t_username`, `t_pass`, `t_father`, `t_mother`, `t_dob`, `t_qualification`, `t_contact`, `t_staff_type`, `t_gender`) VALUES
(1, 'Hari Parsad Thapa', 'Tinkune 1', 'ram@gmail.com', 'ramsir', 'ram', 'hari prasad thapa', 'sita kumari thapa', '20 Feb 1978', 'Master ', 986811111, 'Teacher', 'Male'),
(2, 'Hello MeRavi', 'Lokanthali', 'abc@xyz', 'ravi@ravi', 'ravi', 'ABC XYZ', 'Bcd Xyz', '29 feb 2000', '+2', 98680000, 'Admin', 'Male'),
(3, 'Hello', 'Kathmandu', 'hello@gmail.com', 'hello', 'hello', 'hello abc ', 'world abc', '20 jan 1885', 'Master', 98680222, 'Teacher', 'Male'),
(5, 'Sanjay', 'Bhaktapur', 'sanjay@gmail.com', 'sanjay', 'sanjay', 'Abc xyz', 'bcd xyz', '22 feb 2000', 'Master ', 9866666, 'Teacher', 'Male'),
(6, 'Ram Karki', 'Lokanthali', 'ram@hhkhkjk', 'ram1878', 'ram1878', 'Hari Karki', 'Rita Karki', '12 Jan 1878', 'Master', 1234567890, 'Teacher', 'Male'),
(7, 'Raj Thapa', 'Kausaltar', 'rajjjjjjjjjjjjjj@gmail.com', 'raaj', 'raaj1', 'hari thapa', 'gita thapa', '11 Jan 1978', 'Master', 123456789, 'Teacher', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_term`
--
ALTER TABLE `exam_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meadmin`
--
ALTER TABLE `meadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_info`
--
ALTER TABLE `st_info`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `subjects_info`
--
ALTER TABLE `subjects_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_class_name`
--
ALTER TABLE `sub_class_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_term`
--
ALTER TABLE `exam_term`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meadmin`
--
ALTER TABLE `meadmin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_info`
--
ALTER TABLE `st_info`
  MODIFY `st_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subjects_info`
--
ALTER TABLE `subjects_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_class_name`
--
ALTER TABLE `sub_class_name`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `t_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
