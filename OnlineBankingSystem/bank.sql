-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2017 at 02:36 PM
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
(GEN123, 'GENEVA', 2225454, 'GENEVA');

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
  `Customerstatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerAccount`, `gender`, `location`, `branchCode`, `accountStatus`, `customerName`, `customerEmail`, `customerPass`, `Customerstatus`, `tokenCode`, `mobile`) VALUES
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
  ADD PRIMARY KEY (`account_no`),
  ADD UNIQUE KEY `loan_no` (`loan_status`);

--
-- Indexes for table `applied_cust`
--
ALTER TABLE `applied_cust`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`),
  ADD UNIQUE KEY `cust_phone` (`cust_phone`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`account_no`),
  ADD UNIQUE KEY `cust_id` (`cust_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD PRIMARY KEY (`loan_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
