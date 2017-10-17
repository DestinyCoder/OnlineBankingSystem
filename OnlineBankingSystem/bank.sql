-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 05:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bank`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `customerAccount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `loan_status` varchar(11) NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`customerAccount`, `balance`, `loan_status`, `date_create`) VALUES
(123, 9000, 'no', '2017-08-08'),
(321, 0, 'yes', '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `add_user` varchar(100) NOT NULL,
  `add_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `add_user`, `add_pass`) VALUES
(1, 'adminishere', 'openthedoor');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branchCode` enum('GEN123','DEL456','MUM789') NOT NULL DEFAULT 'GEN123',
  `branch_city` varchar(100) NOT NULL,
  `branch_phone` int(11) NOT NULL,
  `branch_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchCode`, `branch_city`, `branch_phone`, `branch_address`) VALUES
('GEN123', 'GENEVA', 2225454, 'GENEVA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerAccount` int(16) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `location` enum('GENEVA','DELHI','MUMBAI') NOT NULL DEFAULT 'GENEVA',
  `branchCode` enum('GEN123','DEL456','MUM789') NOT NULL DEFAULT 'GEN123',
  `accountStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `customerName` varchar(100) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerPass` varchar(100) DEFAULT NULL,
  `customerStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerAccount`, `gender`, `location`, `branchCode`, `accountStatus`, `customerName`, `customerEmail`, `customerPass`, `customerStatus`, `tokenCode`, `mobile`) VALUES
(1, 2147483647, 'Male', 'GENEVA', 'GEN123', 'N', 'jitendra', 'rajpurohitjitendra83@gmail.com', NULL, 'N', '', 2147483647),
(7, 58652, 'Male', 'GENEVA', 'GEN123', 'N', 'pawan', 'pawan@gmail.com', NULL, 'N', '', 2147483647),
(8, 47315, 'Male', 'GENEVA', 'GEN123', 'N', 'niraj', 'niraj@gmail.com', NULL, 'N', '', 2147483647),
(9, 31101, 'Male', 'GENEVA', 'GEN123', 'N', 'varun', 'varun@gmail.com', '967dc57cdd4751d24de6366b9301d8c3', 'N', 'e0c661f341e6cfdc1733a9df0a21b703', 54758778),
(10, 72077, 'Male', 'MUMBAI', 'MUM789', 'N', 'fgfg', 'rajpurohitjiten@gmail.com', NULL, 'N', '', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `loan_name` varchar(100) NOT NULL,
  `loan_interest` int(11) NOT NULL,
  `loan_months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_info`
--

DROP TABLE IF EXISTS `loan_info`;
CREATE TABLE `loan_info` (
  `loan_no` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_total` int(11) NOT NULL,
  `loan_remain` int(11) NOT NULL,
  `loan_date_start` date NOT NULL,
  `loan_date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `trans_amount` int(11) NOT NULL,
  `trans_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `sender`, `receiver`, `trans_amount`, `trans_date`) VALUES
(1, 123, 321, 500, '2017-09-01'),
(2, 321, 123, 100, '2017-09-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`customerAccount`),
  ADD UNIQUE KEY `loan_no` (`loan_status`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
