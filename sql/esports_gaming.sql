-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 09:34 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(5) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `checkout` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `UserID`, `checkout`) VALUES
(1, 'adrianna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` varchar(5) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `EventVenue` varchar(50) NOT NULL,
  `EventDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `EventName`, `EventDate`, `EventTime`, `EventVenue`, `EventDesc`) VALUES
('CA001', 'MLBB Grand Finale', '2023-04-28', '10:00:00', 'CA, TAR UMT', 'What awaits you is something like no other...Witness the final battle between the last 4 teams standing with a special guest appearance: THE MPL MY/SG CHAMPION OF S2 RYNN ! Join us in Mobile Legends\' Grand Finale to meet a real professional gamer in real life!'),
('CA004', 'Warzone S2 Fun Camp', '2023-12-06', '11:00:00', 'CA, TAR UMT', 'Join us in Warzone S2 where you can participate in team building, gaming tournaments and workshops to expand your social circle and test your gaming potential!'),
('FA001', 'Valorant: Battle of the Ace', '2023-05-25', '10:00:00', 'FOYER, TAR UMT', 'Ever dream of fighting side-by-side with your best buddies in an E-Sports gaming event? This could be your battle. Assemble all your comrades because it\'s showtime!\r\nNOTE : Participants are required to register together in a TEAM OF 5\r\nFor NON-Gamers : FEAR NOT! You can also witness the ultimate victory of your friends. What are you waiting for? Grab your tickets NOW!');

-- --------------------------------------------------------

--
-- Table structure for table `merch_buy`
--

CREATE TABLE `merch_buy` (
  `MbuyID` int(5) NOT NULL,
  `MerchID` varchar(5) NOT NULL,
  `CartID` int(5) NOT NULL,
  `MbuyQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merch_buy`
--

INSERT INTO `merch_buy` (`MbuyID`, `MerchID`, `CartID`, `MbuyQty`) VALUES
(1, 'M0001', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `merch_info`
--

CREATE TABLE `merch_info` (
  `MerchID` varchar(5) NOT NULL,
  `MerchPrice` double(7,2) NOT NULL,
  `MerchDesc` varchar(255) NOT NULL,
  `Material` varchar(100) DEFAULT NULL,
  `Color` varchar(100) DEFAULT NULL,
  `Style` varchar(100) DEFAULT NULL,
  `FitType` varchar(100) DEFAULT NULL,
  `Category` varchar(30) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `MerchQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merch_info`
--

INSERT INTO `merch_info` (`MerchID`, `MerchPrice`, `MerchDesc`, `Material`, `Color`, `Style`, `FitType`, `Category`, `Size`, `MerchQty`) VALUES
('M0001', 50.00, 'Gaming Controller T-Shirt', 'Cotton', 'Black', 'Casual', 'Oversized', 'T-Shirt', 'FreeSize', 50),
('M0002', 40.00, 'Typical Gamer Baseball Cap', 'Fabric', 'White', 'Trendy', 'Baseball Cap', 'Hats', 'FreeSize', 10),
('M0003', 35.00, 'Saving The World By Levels Tote Bag', 'Polyester', 'Black', 'Casual', 'Tote Bag', 'Totebags', 'FreeSize', 10),
('M0004', 35.00, 'I Paused My Game Tote Bag', 'Polyester', 'Black', 'Casual', 'Tote Bag', 'Totebags', 'FreeSize', 10),
('M0005', 80.00, 'Typical Gamer Hoodie', 'Fabric', 'Blue', 'Casual', 'Oversized', 'Hoodie/Sweater', 'UniSize', 20),
('M0006', 75.00, 'Typical Gamer Sweater', 'Fabric', 'Pink', 'Casual', 'Regular Fit', 'Hoodie/Sweater', 'FreeSize', 30),
('M0007', 50.00, 'Hipster T-Shirt', 'Cotton', 'Black', 'Casual', 'Regular Fit', 'T-Shirt', 'UniSize', 30),
('M0008', 40.00, 'Air Force Gaming Baseball Cap', 'Fabric', 'Blue', 'Trendy', 'Baseball Cap', 'Hats', 'FreeSize', 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(5) NOT NULL,
  `PaymentType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentType`) VALUES
('P0001', 'Mastercard'),
('P0002', 'Visa'),
('P0003', 'Paypal'),
('P0004', 'AmericanEx');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(5) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `CartID` int(5) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatID` varchar(5) NOT NULL,
  `SeatTypeID` varchar(5) NOT NULL,
  `TicketID` varchar(5) NOT NULL,
  `Status` int NOT NULL
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
  `TbuyID` int(5) NOT NULL,
  `TicketID` varchar(5) NOT NULL,
  `CartID` int(5) NOT NULL,
  `TbuyQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_buy`
--

INSERT INTO `ticket_buy` (`TbuyID`, `TicketID`, `CartID`, `TbuyQty`) VALUES
(1, 'AU001', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `TicketID` varchar(5) NOT NULL,
  `EventID` varchar(5) NOT NULL,
  `TicketPrice` double(7,2) NOT NULL,
  `TicketType` varchar(20) NOT NULL,
  `TicketQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`TicketID`, `EventID`, `TicketPrice`, `TicketType`, `TicketQty`) VALUES
('AU001', 'CA001', 20.00, 'Standard', 120),
('AU002', 'CA001', 40.00, 'VIP', 50),
('AU003', 'CA004', 20.00, 'Standard', 120),
('AU004', 'CA004', 40.00, 'VIP', 50),
('AU005', 'FA001', 20.00, 'Standard', 120),
('AU006', 'FA001', 40.00, 'VIP', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` char(10) NOT NULL,
  `PaymentID` varchar(5) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `PaymentID`, `Password`, `Name`, `Email`, `Tel`) VALUES
('adrianna', '', 'adrianna', 'Adrianna', 'adrianna@gmail.com', '016-4121629');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `merch_buy`
--
ALTER TABLE `merch_buy`
  ADD PRIMARY KEY (`MbuyID`),
  ADD UNIQUE KEY `CartID` (`CartID`);

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
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `CartID` (`CartID`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merch_buy`
--
ALTER TABLE `merch_buy`
  MODIFY `MbuyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_buy`
--
ALTER TABLE `ticket_buy`
  MODIFY `TbuyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
