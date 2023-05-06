-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 06:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esports&gaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserID` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` varchar(5) NOT NULL,
  `EventID` varchar(5) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `TicketID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` varchar(5) NOT NULL,
  `UserID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` varchar(5) NOT NULL,
  `TicketID` varchar(5) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `EventVenue` varchar(50) NOT NULL,
  `EventDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `TicketID`, `EventName`, `EventDate`, `EventTime`, `EventVenue`, `EventDesc`) VALUES
('CA001', 'AU001', 'MLBB Grand Finale', '2023-04-28', '10:00:00', 'CA, TAR UMT', 'What awaits you is something like no other...Witness the final battle between the last 4 teams standing with a special guest appearance: THE MPL MY/SG CHAMPION OF S2 RYNN ! Join us in Mobile Legends\' Grand Finale to meet a real professional gamer in real ');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` varchar(5) NOT NULL,
  `FeedbackDate` date NOT NULL,
  `FeedbackTime` time NOT NULL,
  `FeedbackContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk_support`
--

CREATE TABLE `helpdesk_support` (
  `HelpID` varchar(5) NOT NULL,
  `HelpDate` date NOT NULL,
  `HelpTime` time NOT NULL,
  `HelpMsg` varchar(255) NOT NULL,
  `HelpReply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merch_buy`
--

CREATE TABLE `merch_buy` (
  `MbuyID` varchar(5) NOT NULL,
  `MerchID` varchar(5) NOT NULL,
  `CartID` varchar(5) NOT NULL,
  `MbuyTotal` double(7,2) NOT NULL,
  `MbuyQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merch_info`
--

CREATE TABLE `merch_info` (
  `MerchID` varchar(5) NOT NULL,
  `MerchPrice` double(7,2) NOT NULL,
  `MerchDesc` varchar(255) NOT NULL,
  `MerchQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(5) NOT NULL,
  `PaymentType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` varchar(5) NOT NULL,
  `CartID` varchar(5) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `PaymentID` varchar(5) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatID` varchar(5) NOT NULL,
  `SeatTypeID` varchar(5) NOT NULL,
  `TicketID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_type`
--

CREATE TABLE `seat_type` (
  `SeatTypeID` varchar(5) NOT NULL,
  `SeatType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_buy`
--

CREATE TABLE `ticket_buy` (
  `TbuyID` varchar(5) NOT NULL,
  `TicketID` varchar(5) NOT NULL,
  `CartID` varchar(5) NOT NULL,
  `TbuyTotal` double(7,2) NOT NULL,
  `TbuyQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `TicketID` varchar(5) NOT NULL,
  `TicketPrice` double(7,2) NOT NULL,
  `TicketType` varchar(20) NOT NULL,
  `TicketQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`TicketID`, `TicketPrice`, `TicketType`, `TicketQty`) VALUES
('AU001', 20.00, 'Standard', 120);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` char(10) NOT NULL,
  `PaymentID` varchar(5) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD UNIQUE KEY `EventID` (`EventID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `TicketID` (`TicketID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD UNIQUE KEY `TicketID` (`TicketID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `helpdesk_support`
--
ALTER TABLE `helpdesk_support`
  ADD PRIMARY KEY (`HelpID`);

--
-- Indexes for table `merch_buy`
--
ALTER TABLE `merch_buy`
  ADD PRIMARY KEY (`MbuyID`),
  ADD UNIQUE KEY `CartID` (`CartID`),
  ADD UNIQUE KEY `MerchID` (`MerchID`);

--
-- Indexes for table `merch_info`
--
ALTER TABLE `merch_info`
  ADD PRIMARY KEY (`MerchID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD UNIQUE KEY `CartID` (`CartID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatID`),
  ADD UNIQUE KEY `TicketID` (`TicketID`),
  ADD UNIQUE KEY `SeatTypeID` (`SeatTypeID`);

--
-- Indexes for table `seat_type`
--
ALTER TABLE `seat_type`
  ADD PRIMARY KEY (`SeatTypeID`);

--
-- Indexes for table `ticket_buy`
--
ALTER TABLE `ticket_buy`
  ADD PRIMARY KEY (`TbuyID`),
  ADD UNIQUE KEY `TicketID` (`TicketID`),
  ADD UNIQUE KEY `CartID` (`CartID`);

--
-- Indexes for table `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `PaymentID` (`PaymentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
