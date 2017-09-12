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
  `account_no` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `loan_status` varchar(11) NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_no`, `balance`, `loan_status`, `date_create`) VALUES
(123, 9000, 'no', '2017-08-08'),
(321, 0, 'yes', '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `applied_cust`
--

DROP TABLE IF EXISTS `applied_cust`;
CREATE TABLE `applied_cust` (
  `customer_id` int(11) NOT NULL,
  `cust_name` text NOT NULL,
  `cust_phone` int(11) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_address` varchar(200) NOT NULL,
  `cust_branch` varchar(100) NOT NULL,
  `cust_dob` date NOT NULL,
  `cust_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_city` varchar(100) NOT NULL,
  `branch_phone` int(11) NOT NULL,
  `branch_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_city`, `branch_phone`, `branch_address`) VALUES
(12, 'nerul', 2225454, 'nerul');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `account_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `branch_code` int(11) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `account_no`, `phone`, `email`, `gender`, `address`, `branch_code`, `dob`, `age`, `username`, `password`) VALUES
(1, 'Pawan Yadav', 123, 845210124, 'pawan@gmail.com', 'male', 'Nerul', 12, '1997-07-11', 20, 'pawan11', '123\r\n'),
(2, 'jitendra', 321, 845201974, 'jitu@gmail.com', 'male', 'dombivali', 12, '1998-05-13', 19, 'jitu12', '321');

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
