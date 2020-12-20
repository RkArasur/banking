-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 05:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `account_number` int(11) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `cur_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`account_number`, `account_type`, `name`, `email`, `phno`, `address`, `cur_balance`) VALUES
(1, 'savings', 'Vinay Raj', 'vinayraj@1234.com', 8908908900, '#440 @KFI Dubai', 54000),
(2, 'current', 'Yash', 'yash@1234.com', 9999888800, '#KFI mumbai india.', 80000),
(3, 'savings', 'John Wick', 'jonwick@1234.com', 7897897890, '#washington America', 100000),
(4, 'current', 'Kohili', 'kohili@1234.com', 7897897899, '#acharya , Hydrabad, india', 20000),
(5, 'savings', 'Rohith', 'rohith@1234.com', 7418529631, '#789 washington DC, America', 98500),
(6, 'savings', 'raushan', 'raushan@1234.com', 1234567899, '#753 Suratkal DC, Bangalore', 800000),
(7, 'current', 'Johny John', 'johnjohn@1234.com', 4567891235, '#456 2nd floor, 5th cross, Mangalore india', 1000000),
(8, 'savings', 'Rahul Gandhi', 'rahulgandi@1234.com', 9513578525, '#420, Delhi, India', 80000),
(9, 'savings', 'Suresh Raj', 'suresh@1234.com', 9865329865, '#qwertyuiop, Africa ', 60000),
(10, 'savings', 'Vikas H K', 'vikas@1234.com', 8495162849, '#123, 4th flore, 5th cross, 7th main, 6th road, 7th main Road, 8th Highway Spain', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `from_account_no` int(11) NOT NULL,
  `to_account_no` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `message` text NOT NULL,
  `amount_sent` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`account_number`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `account_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
