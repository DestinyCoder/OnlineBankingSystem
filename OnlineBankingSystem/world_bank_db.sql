-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 03:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `world_bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accdetail`
--

CREATE TABLE `accdetail` (
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empId` int(11) NOT NULL,
  `empName` varchar(25) NOT NULL,
  `loginId` varchar(25) NOT NULL,
  `empPass` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactNo` varchar(30) NOT NULL,
  `joinDate` date NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empId`, `empName`, `loginId`, `empPass`, `email`, `contactNo`, `joinDate`, `lastLogin`) VALUES
(1, 'pawan', '445545', '125487', 'pawan@gmail.com', '9535543313', '2012-12-15', '2012-12-03 11:27:00'),
(2, 'niraj', '125487', '125452', 'niraj@gmail.com', '98478872783', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'varun', '3535355', '3636', 'varun@gmail.com', '95425422424', '2013-01-02', '0000-00-00 00:00:00');

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
-- Table structure for table `loanpay`
--

CREATE TABLE `loanpay` (
  `paymentId` int(11) NOT NULL,
  `date` date NOT NULL,
  `paidAmt` float(10,2) NOT NULL,
  `principleAmt` float(10,2) NOT NULL,
  `interestAmt` float(10,2) NOT NULL,
  `balance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `loanType` enum('CAR','HOME','SAVING','PERSONAL') NOT NULL,
  `maxAmt` float(10,2) NOT NULL,
  `minAmt` float(10,2) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailId` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `sendTime` datetime NOT NULL,
  `senderId` int(11) NOT NULL,
  `reciverId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
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
-- Indexes for dumped tables
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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanId`);

--
-- Indexes for table `loanpay`
--
ALTER TABLE `loanpay`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailId`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loanpay`
--
ALTER TABLE `loanpay`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
