-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 05:07 PM
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
-- Table structure for table `breport`
--

CREATE TABLE `breport` (
  `branchid` int(10) NOT NULL,
  `empamt` int(10) NOT NULL,
  `actemp` int(10) NOT NULL,
  `cctv` varchar(20) NOT NULL,
  `item` varchar(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breport`
--

INSERT INTO `breport` (`branchid`, `empamt`, `actemp`, `cctv`, `item`, `date`) VALUES
(101, 200, 100, '40', '20', '2017-12-22'),
(101, 30, 20, '15', '44', '2017-12-04'),
(102, 99, 44, '11', ' hjkhkjkhj', '2017-10-22'),
(101, 230, 150, '12', 'pen ', '2017-12-22'),
(101, 200, 140, '20', 'new computer ', '2017-12-13'),
(103, 100, 80, '1', ' -3 new cctv required', '2017-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `checkuser`
--

CREATE TABLE `checkuser` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkuser`
--

INSERT INTO `checkuser` (`username`, `password`) VALUES
('muaz', 'ahmed'),
('faisal azr', '$2y$10$GMR'),
('luqman', '$2y$10$81m'),
('muaz123', '$2y$10$MS2'),
('cubaan', '$2y$10$OUt'),
('muaz1234', 'muaz1234'),
('wantanahme', '$2y$10$sP7'),
('labun', 'gemok123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(10) NOT NULL,
  `empname` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `icno` int(14) NOT NULL,
  `accno` int(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `branch` text NOT NULL,
  `comment` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `date`, `icno`, `accno`, `address`, `branch`, `comment`) VALUES
(1, 'abu', '2017-01-01', 2147483647, 2147483647, 'Ampang', 'Kuala Lumpur', ' pengalaman kerja di luar negara'),
(2, 'ali', '2017-10-25', 2147483647, 2147483647, 'Batu Caves', 'Petaling Jaya', ' new officer'),
(3, 'azman', '2017-09-21', 2147483647, 2147483647, 'Sri Gombak', 'Petaling Jaya', ' retire from army'),
(4, 'jang', '2017-11-03', 4898449, 478347892, 'Taman Batu Muda', 'Selayang', ' just graduated'),
(5, 'abu', '2017-10-22', 2147483647, 2147483647, 'ampang', 'selayang', 'new officer '),
(103, 'mustaqim', '2017-12-13', 2147483647, 3394958, 'Cheras', 'kict', 'just retired from army ');

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `username` text NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`username`, `password`) VALUES
('admin', 'admin01'),
('admin02', 'admin02');

-- --------------------------------------------------------

--
-- Table structure for table `loginstaff`
--

CREATE TABLE `loginstaff` (
  `id` int(4) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginstaff`
--

INSERT INTO `loginstaff` (`id`, `email`, `password`) VALUES
(101, 'staff@gmail.com', 'staff01'),
(102, 'staff102@gmail.com', 'staff102'),
(123, 'test@gmail.com', 'staff123');

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE `loginuser` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`username`, `password`) VALUES
('alif', '123456'),
('irfan', 'naqhib123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
