-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 03:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceId` int(4) NOT NULL,
  `attendanceDate` date DEFAULT NULL,
  `employeeName` varchar(255) DEFAULT NULL,
  `department_name` varchar(256) NOT NULL,
  `attendanceStatus` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceId`, `attendanceDate`, `employeeName`, `department_name`, `attendanceStatus`) VALUES
(1, '2018-05-07', 'Snigdha', 'Engineering', 'on'),
(2, '2018-05-07', 'Snigdha', 'Engineering', ''),
(3, '2018-05-07', 'niranjan', 'Accounts', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentNo` int(4) NOT NULL,
  `departmentName` varchar(20) NOT NULL,
  `departmentLocation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentNo`, `departmentName`, `departmentLocation`) VALUES
(20, 'Research', 'Zoo Road'),
(25, 'Accounts', 'zoo road'),
(26, 'Developer', 'zoo road'),
(27, 'UX Designer', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empNo` int(4) NOT NULL,
  `fName` varchar(256) DEFAULT NULL,
  `mName` varchar(256) DEFAULT NULL,
  `lName` varchar(256) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bloodGroup` varchar(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `state` varchar(256) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `employeeType` varchar(256) DEFAULT NULL,
  `department` varchar(256) DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `basicSalary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empNo`, `fName`, `mName`, `lName`, `dob`, `bloodGroup`, `gender`, `address`, `city`, `state`, `phone`, `email`, `employeeType`, `department`, `joiningDate`, `basicSalary`) VALUES
(2, 'Namrata', '', 'Das', '1999-05-15', 'O-', 'female', 'Paltan Bazar', 'Guwahati', 'Assam', '1234567890', 'namrata@gmail.com', 'part_time', 'UX Designer', '2018-05-28', 12345465),
(3, 'Snigdha', '', 'Brahma', '1990-07-12', 'O-', 'female', 'Kharghuli', 'Guwahati', 'Assam', '9435552758', 'brahmasnigdha94@gmail.com', 'full_time', 'UX Designer', '2018-05-01', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `userName` varchar(20) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  `roleId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`userName`, `userPassword`, `roleId`) VALUES
('Alex', 'admin', 1),
('Snigdha', 'hello123', 2),
('Kangkana', 'admin', 10),
('Kajal', 'admin', 9),
('Ishani', 'ishani', 2),
('Shriti', 'brahma', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE `role_table` (
  `roleId` int(6) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_table`
--

INSERT INTO `role_table` (`roleId`, `roleName`) VALUES
(1, 'Admin'),
(2, 'user'),
(8, 'Acountant'),
(9, 'Developer'),
(10, 'Human Resource'),
(11, 'Management'),
(12, 'CEO'),
(13, 'Vice President'),
(14, 'Security'),
(16, 'Java Developer'),
(17, 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salaryId` int(4) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `salaryAmount` double NOT NULL,
  `salaryMonth` varchar(10) DEFAULT NULL,
  `termDeposits` float DEFAULT NULL,
  `houseRentAllowance` float DEFAULT NULL,
  `Total_Income` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salaryId`, `employeeId`, `salaryAmount`, `salaryMonth`, `termDeposits`, `houseRentAllowance`, `Total_Income`) VALUES
(1, 10, 8000, 'April', 4000, 4000, 0),
(2, 10, 8000, 'April', 4000, 4000, 0),
(3, 10, 8000, 'March', 4000, 4000, 0),
(4, 10, 10000, 'May', 4900, 5000, 0),
(5, 10, 12000, 'July', 3423, 3432, 0),
(6, 10, 8000, 'January', 3000, 7000, 28000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentNo`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empNo`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salaryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_table`
--
ALTER TABLE `role_table`
  MODIFY `roleId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salaryId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_table`
--
ALTER TABLE `login_table`
  ADD CONSTRAINT `login_table_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role_table` (`roleId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
