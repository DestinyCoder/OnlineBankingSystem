-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 05:46 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `accdetail`
--

CREATE TABLE IF NOT EXISTS `accdetail` (
  `accType` enum('Current','Saving') NOT NULL,
  `minBalance` int(11) NOT NULL,
  `interestRate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accdetail`
--

INSERT INTO `accdetail` (`accType`, `minBalance`, `interestRate`) VALUES
('Current', 6000, 15),
('Saving', 4000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `customerAccount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `loan_status` varchar(11) NOT NULL,
  `date_create` date NOT NULL,
  PRIMARY KEY (`customerAccount`),
  UNIQUE KEY `loan_no` (`loan_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`customerAccount`, `balance`, `loan_status`, `date_create`) VALUES
(123, 9000, 'no', '2017-08-08'),
(321, 0, 'yes', '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `customerAccount` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `accountStatus` enum('Inactive','Active') NOT NULL,
  `accOpenDate` date NOT NULL,
  `accType` enum('Current','Saving') NOT NULL,
  `accountBalance` int(11) NOT NULL DEFAULT '5000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`customerAccount`, `customerID`, `accountStatus`, `accOpenDate`, `accType`, `accountBalance`) VALUES
(15705, 2, '', '2017-10-26', 'Saving', 5000),
(79927, 1, '', '2017-10-26', 'Current', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `add_user` varchar(100) NOT NULL,
  `add_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `add_user`, `add_pass`) VALUES
(1, 'adminishere', 'openthedoor');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchCode` enum('GEN123','MUM123','DEL123') NOT NULL,
  `branchName` enum('GENEVA','MUMBAI','DELHI') NOT NULL,
  `city` enum('GENEVA','MUMBAI','DELHI') NOT NULL,
  `branchAddress` text NOT NULL,
  `country` enum('INDIA','SWITZERLAND') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchCode`, `branchName`, `city`, `branchAddress`, `country`) VALUES
('GEN123', 'GENEVA', 'GENEVA', '24/3,Baker Street,Geneva', 'SWITZERLAND'),
('MUM123', 'MUMBAI', 'MUMBAI', '20th Street,Mumbai', 'INDIA'),
('DEL123', 'DELHI', 'DELHI', '29,Lake View Road,Delhi', 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

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
  `mobile` varchar(10) NOT NULL,
  `accType` enum('Current','Saving') NOT NULL DEFAULT 'Saving'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerAccount`, `gender`, `location`, `branchCode`, `accountStatus`, `customerName`, `customerEmail`, `customerPass`, `customerStatus`, `tokenCode`, `mobile`, `accType`) VALUES
(1, 79927, 'Male', 'GENEVA', 'GEN123', 'N', 'jitendra', 'rajpurohitjitendra81@gmail.com', 'cd64cc817ca1aa518773bde79aaa9449', 'Y', '460b398b97c4dbd9004eaa0a6076f6ee', '8879110374', 'Current'),
(2, 15705, 'Male', 'MUMBAI', '', 'N', 'jitendra2', 'rajpurohitjitendra86@gmail.com', 'eb90f0d59306c695924e5eaaea908fcc', 'Y', '52733d783f3986fcb5380c5236a7554a', '8879110374', 'Saving');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empname` varchar(255) NOT NULL,
  `empgender` varchar(1) NOT NULL,
  `empadd` varchar(255) NOT NULL,
  `empsalary` int(11) NOT NULL,
  `empemail` varchar(255) NOT NULL,
  `empmobile` bigint(20) NOT NULL,
  `empdob` date NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `empgender`, `empadd`, `empsalary`, `empemail`, `empmobile`, `empdob`) VALUES
(2, 'Pawan', 'M', 'Nerul', 50000, 'gamers@1107', 7656545412, '2017-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--


CREATE TABLE `loan` (
  `loanId` int(11) NOT NULL,
  `loanType` enum('CAR','HOME','SAVING','PERSONAL') NOT NULL,
  `loanAmt` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `interestRate` float(10,2) NOT NULL,
  `startDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table `loan_info`
--

CREATE TABLE IF NOT EXISTS `loan_info` (
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

CREATE TABLE `transactions` (
  `transId` int(11) NOT NULL,
  `paymentDate` datetime NOT NULL,
  `sendId` int(11) NOT NULL,
  `receiveId` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paymentStat` enum('SUCCESS','FAILED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--


--
-- Indexes for table `accdetail`
--
ALTER TABLE `accdetail`
  ADD PRIMARY KEY (`accType`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`customerAccount`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchCode`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanId`);


--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
