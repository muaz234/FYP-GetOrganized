-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 01:19 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchreport`
--

CREATE TABLE `branchreport` (
  `Count` int(3) NOT NULL,
  `branchid` int(5) NOT NULL,
  `empamt` int(10) NOT NULL,
  `actemp` int(10) NOT NULL,
  `cctv` varchar(20) NOT NULL,
  `item` varchar(30) NOT NULL,
  `datereport` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchreport`
--

INSERT INTO `branchreport` (`Count`, `branchid`, `empamt`, `actemp`, `cctv`, `item`, `datereport`) VALUES
(1, 101, 25, 15, '85', ' -new staff recruitment', '2018-03-08'),
(2, 101, 80, 60, '5', ' security camera\r\nmonitor scre', '2018-03-08'),
(3, 101, 10, 9, '1', 'pen ', '2018-04-02'),
(4, 101, 25, 55, '12', ' tv', '2018-04-18'),
(5, 100, 120, 90, '12', 'cupboard ', '2018-05-02'),
(6, 100, 120, 90, '2', 'kerusi ', '2018-05-03'),
(7, 100, 100, 96, '3', ' -desk', '2018-05-04'),
(8, 101, 120, 119, '2', ' notice board', '2018-05-07'),
(17, 102, 120, 119, '2', ' board', '2018-05-07'),
(25, 102, 120, 90, '7', ' pp', '2018-05-07'),
(26, 102, 120, 30, '2', ' pp', '2018-05-07'),
(27, 102, 90, 88, '2', ' qwerty', '2018-05-07'),
(28, 102, 90, 88, '2', ' qwerty', '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `ID` int(12) NOT NULL,
  `Item` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `DateRequest` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`ID`, `Item`, `quantity`, `DateRequest`) VALUES
(9, 'Rain Coat', 2, '03-05-2018'),
(10, 'Rain Coat', 2, '03-05-2018'),
(11, 'Torch Light', 4, '03-05-2018'),
(12, 'Torch Light', 1, '03-05-2018'),
(13, 'Rain Coat', 1, '2018-05-03'),
(14, 'Rain Coat', 1, '2018-05-03'),
(15, 'Rain Coat', 1, '2018-05-04'),
(16, 'Walkie Talkie', 1, '2018-05-04'),
(17, 'Walkie Talkie', 1, '2018-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `ID` int(3) NOT NULL,
  `Name` text NOT NULL,
  `Title` text NOT NULL,
  `Dept` text NOT NULL,
  `EmpID` int(5) NOT NULL,
  `Request` text NOT NULL,
  `AppliedDate` date NOT NULL,
  `DateBefore` date NOT NULL,
  `DateAfter` date NOT NULL,
  `Remarks` text NOT NULL,
  `NumDays` int(5) NOT NULL,
  `Approval` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`ID`, `Name`, `Title`, `Dept`, `EmpID`, `Request`, `AppliedDate`, `DateBefore`, `DateAfter`, `Remarks`, `NumDays`, `Approval`) VALUES
(5, 'badrul', 'staff', 'operation', 2, 'Special Leave', '2018-04-21', '2018-04-23', '2018-04-24', 'undi PRU', 2, 2),
(6, 'badrul', 'staff', 'operation', 2, 'Annual Leave', '2018-04-21', '2018-04-23', '2018-04-24', '', 2, 2),
(7, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-04-21', '2018-04-24', '2018-04-26', 'aikkk', 3, 2),
(8, 'badrul', 'staff', 'operation', 2, 'Annual Leave', '2018-04-21', '2018-04-23', '2018-04-25', 'p', 3, 2),
(9, 'badrul', 'staff', 'operation', 2, 'Special Leave', '2018-04-21', '2018-04-24', '2018-04-26', 'qwerty', 3, 2),
(10, 'badrul', 'staff', 'operation', 2, 'Special Leave', '2018-04-22', '2018-04-23', '2018-04-24', 'alifff', 2, 2),
(11, 'badrul', 'staff', 'operation', 2, 'Annual Leave', '0000-00-00', '2018-04-30', '2018-04-30', 'pay bill', 1, 2),
(12, 'badrul', 'staff', 'operation', 2, 'Annual Leave', '2018-04-30', '2018-04-30', '2018-04-30', 'pay bill', 1, 2),
(13, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-03', '2018-05-07', '2018-05-09', 'demam', 3, 2),
(14, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-04', '2018-05-04', '2018-05-08', 'fever', 3, 2),
(15, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', 'medical checkup', 1, 0),
(16, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', 'medical checkup', 1, 0),
(17, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', 'medical checkup', 1, 0),
(18, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', 'medical checkup', 1, 0),
(19, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', 'medical checkup', 1, 0),
(20, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-15', '2018-05-15', 'q', 1, 0),
(21, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-15', '2018-05-15', 'q', 1, 0),
(22, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-09', 'aa', 2, 0),
(23, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-09', 'aa', 2, 0),
(24, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-07', '2018-05-08', '2018-05-08', '', 1, 0),
(25, 'badrul', 'staff', 'operation', 2, 'Medical Leave', '2018-05-10', '2018-05-10', '2018-05-11', 'GE', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(15) NOT NULL,
  `empname` text NOT NULL,
  `level` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `datejoin` date NOT NULL,
  `icno` varchar(20) NOT NULL,
  `accno` varchar(20) NOT NULL,
  `epfnum` int(10) NOT NULL,
  `address` text NOT NULL,
  `branch` varchar(25) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `department` varchar(25) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `level`, `email`, `password`, `datejoin`, `icno`, `accno`, `epfnum`, `address`, `branch`, `comment`, `designation`, `department`, `status`) VALUES
(1, 'muaz', 'manager', 'muaz@gmail.com', '123456', '2017-02-01', '770205075548', '7402258991', 0, 'batu caves', 'ampang', ' new staff', 'manager', 'finance', ''),
(2, 'badrul', 'staff', 'badrul@gmail.com', 'bad123', '2017-10-17', '800201056657', '554122000', 0, 'kepong', 'kuala lumpur', ' invoicing', 'staff', 'operation', 'Active'),
(3, 'ahmed', 'staff', 'ahmed@gmail.com', 'ahmed123', '2018-04-11', '665654665', '56521223', 0, 'kedah', 'petaling jaya', ' intern', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(3) NOT NULL,
  `item` varchar(30) NOT NULL,
  `image` varchar(20) NOT NULL,
  `count1` int(15) NOT NULL,
  `count2` int(15) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item`, `image`, `count1`, `count2`, `date1`, `date2`, `remarks`) VALUES
(39, 'Rain Coat', '', 9, 14, '2018-05-04', '2018-05-02', 'new item'),
(40, 'Walkie Talkie', '', 2, 14, '2018-05-04', '2018-05-03', 'new set');

-- --------------------------------------------------------

--
-- Table structure for table `leave_limit`
--

CREATE TABLE `leave_limit` (
  `empid` int(10) NOT NULL,
  `annual` int(11) NOT NULL,
  `maternity` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `medical` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_limit`
--

INSERT INTO `leave_limit` (`empid`, `annual`, `maternity`, `advance`, `special`, `medical`) VALUES
(1, 8, 90, 12, 3, 14),
(2, 5, 90, 12, 1, 5),
(3, 8, 90, 12, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(11) NOT NULL,
  `empname` varchar(30) NOT NULL,
  `empid` int(20) NOT NULL,
  `epfnum` varchar(25) NOT NULL,
  `month` text NOT NULL,
  `year` int(20) NOT NULL,
  `days` int(10) NOT NULL,
  `basic` decimal(8,2) NOT NULL,
  `ot` decimal(8,2) NOT NULL,
  `gross` decimal(8,2) NOT NULL,
  `epf_employee` decimal(8,2) NOT NULL,
  `epf_employer` decimal(8,2) NOT NULL,
  `socso_emp` decimal(8,2) NOT NULL,
  `socso_com` decimal(8,2) NOT NULL,
  `eis_emp` decimal(8,2) NOT NULL,
  `eis_com` decimal(8,2) NOT NULL,
  `allowances` decimal(8,2) NOT NULL,
  `tot_deduction` decimal(8,2) NOT NULL,
  `tot_allowance` decimal(8,2) NOT NULL,
  `tot_deductions` decimal(8,2) NOT NULL,
  `total_salary` decimal(8,2) NOT NULL,
  `date_keyin` date NOT NULL,
  `ApproveStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `empname`, `empid`, `epfnum`, `month`, `year`, `days`, `basic`, `ot`, `gross`, `epf_employee`, `epf_employer`, `socso_emp`, `socso_com`, `eis_emp`, `eis_com`, `allowances`, `tot_deduction`, `tot_allowance`, `tot_deductions`, `total_salary`, `date_keyin`, `ApproveStatus`) VALUES
(1, 'aliff', 123, '55511', 'September', 2018, 25, '961.50', '540.00', '1501.50', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '60.00', '120.85', '60.00', '120.85', '1440.65', '2018-04-25', 'Approve'),
(2, 'amir', 234, '494', 'August', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-04-25', 'Approve'),
(3, 'awe', 4, '3455712', 'May', 2018, 25, '961.50', '540.00', '1501.50', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1390.65', '2018-05-03', 'Disapprove'),
(4, 'bola', 666, '74102331', 'May', 2018, 25, '961.50', '540.00', '1501.50', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '30.00', '120.85', '30.00', '120.85', '1410.65', '2018-05-03', 'Approve'),
(5, 'gaga', 312, '68741025', 'June', 2018, 25, '961.50', '540.00', '1501.50', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '15.00', '120.85', '15.00', '120.85', '1395.65', '2018-05-03', 'Disapprove'),
(6, 'botako', 912, '44710247', 'May', 2018, 25, '961.50', '540.00', '1501.50', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '25.00', '120.85', '25.00', '120.85', '1405.65', '2018-05-03', 'Pending Approval'),
(7, 'lala', 12345, '74102587', 'May', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-05-03', 'Pending Approval'),
(8, 'akif', 741, '21698752', 'May', 2018, 27, '1000.00', '583.20', '1583.20', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '15.00', '120.85', '15.00', '120.85', '1477.35', '2018-05-04', 'Approve'),
(9, 'bila', 43, '41259863', 'April', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '30.00', '120.85', '30.00', '120.85', '1470.75', '2018-05-04', 'Pending Approval'),
(10, 'atika', 998, '74210365', 'April', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-05-07', 'Pending Approval'),
(11, 'atika', 998, '74210365', 'April', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-05-07', 'Pending Approval'),
(12, 'atika', 998, '74210365', 'April', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-05-07', 'Pending Approval'),
(13, 'atika', 998, '74210365', 'April', 2018, 26, '1000.00', '561.60', '1561.60', '110.00', '130.00', '7.75', '19.40', '3.10', '3.10', '10.00', '120.85', '10.00', '120.85', '1450.75', '2018-05-08', 'Pending Approval');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchreport`
--
ALTER TABLE `branchreport`
  ADD PRIMARY KEY (`Count`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_limit`
--
ALTER TABLE `leave_limit`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchreport`
--
ALTER TABLE `branchreport`
  MODIFY `Count` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_limit`
--
ALTER TABLE `leave_limit`
  ADD CONSTRAINT `empid` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
