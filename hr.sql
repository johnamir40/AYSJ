-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 11:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `emp_id` int(11) NOT NULL,
  `emp_performance` int(11) NOT NULL,
  `average` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`emp_id`, `emp_performance`, `average`) VALUES
(1, 7, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `comp_emp`
--

CREATE TABLE `comp_emp` (
  `emp_id` int(11) NOT NULL,
  `pos_salary` int(11) NOT NULL,
  `weekend_Overtime` float NOT NULL,
  `nightshift_overtime` float NOT NULL,
  `total` float NOT NULL,
  `bonus_avg` float NOT NULL,
  `totalweeknd` int(11) NOT NULL,
  `totalnight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comp_emp`
--

INSERT INTO `comp_emp` (`emp_id`, `pos_salary`, `weekend_Overtime`, `nightshift_overtime`, `total`, `bonus_avg`, `totalweeknd`, `totalnight`) VALUES
(4, 6000, 6, 8, 7500, 0.2, 0, 300),
(5, 6000, 7, 4, 7700, 0.2, 150, 350);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `img` varchar(255) NOT NULL,
  `deactivate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fullname`, `address`, `email`, `position`, `username`, `password`, `mobile`, `img`, `deactivate`) VALUES
(1, 'Mayar Osama', 'El-Regab City', 'mayarosama18@gmail.com', 1, 'mayar', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1125502948, 'ls.jpg', 0),
(2, 'Rawan Sherif ', 'Nasr City', 'rawan1702859@miuegypt.edu.eg', 1, 'rawan', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1155646889, '3b3f2afb5788fd349e70c9d5deef3841--business-suits-women-in-business.jpg', 0),
(3, 'Mohamed Hassan', 'fifth settlement', 'mohamed1709629@miuegypt.edu.eg', 3, 'khazbak', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1283117717, 'john-timperley_popup.jpg', 0),
(4, 'John Hany', 'El-sherouk City', 'johnhany18@gmail.com', 4, 'john', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1002495635, 'images.jpg', 0),
(5, 'Donia Mahdy', 'El-rehab City', 'donia1702119@miuegypt.edu.eg', 4, 'donia', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1002495635, 'pixomatic_1572877263963.png', 0),
(6, 'Radwa Rashad', 'First settlement ', 'radwarashad18@gmail.com', 3, 'radwa', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1234567890, 'images (1).jpg', 0),
(7, 'Nadeen El-gaiar', 'Nasr city', 'nadeennagi90@gmail.com', 3, 'nadeen', '$2y$10$JDJ5JDA3JEJDcnlwdFJlcOvkIWOnZZCA9SbjycpiY7aGHf3FvBvyO', 1202333346, 'PROFILE-Photography-113.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `mngID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `performance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`mngID`, `id`, `p_name`, `feedback`, `performance`) VALUES
(1, 1, 'Vodafone Cash', 'good', 7),
(9, 2, 'BUE', 'not good', 5),
(3, 4, 'MIU', 'good', 9),
(3, 5, 'FUE', 'good', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `emp_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `id_not` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`emp_id`, `p_name`, `id_not`) VALUES
(1, 'miu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `positiontype`
--

CREATE TABLE `positiontype` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `salary` float NOT NULL,
  `rate_per_hour` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positiontype`
--

INSERT INTO `positiontype` (`id`, `type`, `salary`, `rate_per_hour`) VALUES
(1, 'Hr', 7000, 29.16),
(3, 'Project Manager', 8000, 33.33),
(4, 'Employee', 6000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mng_id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `noOfemp` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`name`, `description`, `mng_id`, `startDate`, `endDate`, `noOfemp`, `state_id`) VALUES
('BUE', 'Attendance Calculator System', 6, '2020-12-01', '2022-01-01', 1, 100),
('FUE', 'Attendance System', 3, '2021-02-02', '2021-06-12', 0, 2),
('MIU', 'Course Resevation System', 7, '2020-07-10', '2020-12-22', 1, 4),
('Vodafone Cash', 'A fast,simple and secure service that allows you to use your mobile phone to transfer money and make payments', 3, '2020-05-05', '2022-05-05', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `proj_state`
--

CREATE TABLE `proj_state` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proj_state`
--

INSERT INTO `proj_state` (`id`, `state`) VALUES
(2, 'Cancelled'),
(4, 'Completed'),
(100, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `answer`) VALUES
('What experience/qualifications do your staff have?', 'The manager holds a full and relevant level 3 qualification and at least half all other staff hold a full and relevant level 2.\r\n\r\nAll new staff have a 12 hour pediatric first aid certificate too. In addition they undertake regular CPD which may include workshops, online training, reading childcare magazines.'),
('How do you ensure safe recruitment of staff?', 'Our nursery has effective systems in place to check the suitability of those who have regular contact with children. This includes a disclosing and barring service check, suitability of qualifications and opportunities to disclose any convictions, cautions or court orders that may affect their suitability.'),
('What are the ratios of staff to children?', 'Our ratio is 1:13 where a person with Qualified Teacher status, Early Years Professional status or Early Years Teacher status is working directly with children or 1:8 where they are not.'),
('How do you ensure the safety of the children in your care?', 'We carry out risk assessments both of the home and outdoor space and whenever they take children out. They are also required to record any accidents or incidents and any medication that is given.'),
('What activities do you provide?', 'We are providing a range of activities both within the setting and out in the community. These should meet the needs of children of all ages. Make sure you share your children’s particular interests and find out how they could be catered for.'),
('How do you manage children\'s behavior?', 'We have a behavior policy. They will be using positive methods such as distraction and must not threaten or give corporal punishment');

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `emp_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`emp_id`, `p_name`) VALUES
(4, 'BUE'),
(4, 'FUE'),
(4, 'Vodafone Cash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`emp_id`,`emp_performance`);

--
-- Indexes for table `comp_emp`
--
ALTER TABLE `comp_emp`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_not`);

--
-- Indexes for table `positiontype`
--
ALTER TABLE `positiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `proj_state`
--
ALTER TABLE `proj_state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
