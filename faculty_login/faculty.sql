-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 05:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `user_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `awards` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`user_id`, `award_id`, `awards`) VALUES
(1, 1, 'First'),
(1, 2, 'Second'),
(1, 3, 'Third'),
(1, 4, 'Fourth');

-- --------------------------------------------------------

--
-- Table structure for table `conferencepub`
--

CREATE TABLE `conferencepub` (
  `srno` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `authors` text NOT NULL,
  `paper_title` text NOT NULL,
  `conference_name` text NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `issn` varchar(8) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `paper_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `srno` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `activity_title` text NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ini_year` year(4) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `consult_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journalpublications`
--

CREATE TABLE `journalpublications` (
  `srno` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `authors` text NOT NULL,
  `paper_title` text NOT NULL,
  `journal_name` text NOT NULL,
  `vol_no` int(11) NOT NULL,
  `issue_no` int(11) NOT NULL,
  `pg_from` int(11) NOT NULL,
  `pg_to` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `issn` varchar(8) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `paper_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `majorprojects`
--

CREATE TABLE `majorprojects` (
  `srno` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `project_title` text NOT NULL,
  `funding_agency` varchar(255) NOT NULL,
  `funding_category` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `approval_year` year(4) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `project_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `minorprojects`
--

CREATE TABLE `minorprojects` (
  `srno` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `project_title` text NOT NULL,
  `funding_agency` varchar(255) NOT NULL,
  `funding_category` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `approval_year` year(4) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `project_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `papers_presented`
--

CREATE TABLE `papers_presented` (
  `paper_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `paper_title` text NOT NULL,
  `paper_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers_presented`
--

INSERT INTO `papers_presented` (`paper_id`, `user_id`, `paper_title`, `paper_description`) VALUES
(1, 1, 'IoT using Arduino', '4th National Conference on \"Advance technologies and management\" ACPCE Kharghar on 23-24 March 2017'),
(2, 2, 'Implementation of Multiplayer Bluetooth Memory Game for Mobile Phones', 'International Journal of Information and Electronics Engineering, Vol. 2, No. 5, September 2012'),
(26, 1, 'IEEE Paper 1', 'This is Paper 1'),
(27, 1, 'IEEE Paper II', 'This is Paper 2'),
(28, 2, 'Online Security and Privacy Protection using HTTPS and Tor', 'International Journal for Scientific Research & Development ,Vol-4,Issue-08,2016, ISSN (online): 2321-0613 ,Page No -536-538'),
(29, 2, 'Microcontroller Based Automatic Plant Watering System', 'International Journal of Computer Science and Engineering (IJCSE) ; ISSN (Print): 2278-9960; ISSN (Online): 2278-9979; Vol-5, Issue-3, Apr - May - 2016; Impact Factor(JCC) - 2015: 3.5987;Index Copernicus Value (ICV) - 2015: 3.0; NAAS Rating:1.89.'),
(32, 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `faculty_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `faculty_contact` bigint(255) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_qualification` varchar(255) NOT NULL,
  `faculty_designation` varchar(255) NOT NULL,
  `faculty_doj` varchar(255) NOT NULL,
  `faculty_specialization` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`faculty_id`, `user_id`, `faculty_name`, `faculty_contact`, `faculty_email`, `faculty_qualification`, `faculty_designation`, `faculty_doj`, `faculty_specialization`, `image`) VALUES
(24, 2, 'Mr. Mritunjay Ojha', 9221229221, 'mritunjay.ojha@fcrit.ac.in', 'M.E (Comps)', 'Asst. Professor', '28 July 2008', '', '1570106113-Mritunjayojha.JPG_160.jpg'),
(38, 1, 'Suraj Khandare', 7506530870, 'suraj.khandare@fcrit.ac.in', 'M. Tech', 'Asst. Professor', '18 Aug 2010', 'Embedded Systems', '1522236565-Suraj.JPG_160.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `research_projects`
--

CREATE TABLE `research_projects` (
  `user_id` int(255) NOT NULL,
  `research_project_id` int(255) NOT NULL,
  `research_project_name` text NOT NULL,
  `grant_type` text NOT NULL,
  `funding_organization` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_projects`
--

INSERT INTO `research_projects` (`user_id`, `research_project_id`, `research_project_name`, `grant_type`, `funding_organization`, `amount`, `duration`) VALUES
(2, 2, 'Target Tracking in Wireless Sensor Network', 'Minor', 'University of Mumbai', 'Rs. 40000/-', '2014-15'),
(1, 26, 'Project 1', 'Minor', 'Mumbai University', '25000', '2011-12'),
(1, 27, 'Project-II', 'Major', 'CIBA', '50000', '2017-18'),
(2, 28, 'Project XYZ', 'Major', 'CIBA', '100000', '2017-18'),
(2, 31, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `user_id` int(11) NOT NULL,
  `speaker_id` int(11) NOT NULL,
  `speaker` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`user_id`, `speaker_id`, `speaker`) VALUES
(1, 1, 'Narendra Modi'),
(1, 2, 'Barack Obama');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `user_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `specialization` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`user_id`, `specialization_id`, `specialization`) VALUES
(1, 2, 'Deep Learning'),
(1, 3, 'Machine Learning'),
(1, 4, 'Artificial Intelligence'),
(1, 5, 'Neural Networks');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `user_id`, `sub_name`, `sem`) VALUES
(1, 1, 'Applied Mathematics - I', '1'),
(4, 2, 'Digital Forensics', 'VI'),
(5, 2, 'Cryptography', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'suraj', '123'),
(2, 'ojha', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `conferencepub`
--
ALTER TABLE `conferencepub`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `journalpublications`
--
ALTER TABLE `journalpublications`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `majorprojects`
--
ALTER TABLE `majorprojects`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `minorprojects`
--
ALTER TABLE `minorprojects`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `papers_presented`
--
ALTER TABLE `papers_presented`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `research_projects`
--
ALTER TABLE `research_projects`
  ADD PRIMARY KEY (`research_project_id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`speaker_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conferencepub`
--
ALTER TABLE `conferencepub`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journalpublications`
--
ALTER TABLE `journalpublications`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majorprojects`
--
ALTER TABLE `majorprojects`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minorprojects`
--
ALTER TABLE `minorprojects`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers_presented`
--
ALTER TABLE `papers_presented`
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `faculty_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `research_projects`
--
ALTER TABLE `research_projects`
  MODIFY `research_project_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferencepub`
--
ALTER TABLE `conferencepub`
  ADD CONSTRAINT `conferencepub_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `journalpublications`
--
ALTER TABLE `journalpublications`
  ADD CONSTRAINT `journalpublications_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `majorprojects`
--
ALTER TABLE `majorprojects`
  ADD CONSTRAINT `majorprojects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `minorprojects`
--
ALTER TABLE `minorprojects`
  ADD CONSTRAINT `minorprojects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
