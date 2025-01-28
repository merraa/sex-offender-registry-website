-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 12:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationId` int(11) NOT NULL,
  `OffenderId` int(11) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Region` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocationId`, `OffenderId`, `City`, `Region`) VALUES
(1, 1, 'Springfield', 'Illinois'),
(2, 2, 'Shelbyville', 'Indiana'),
(3, 3, 'Riverdale', 'California'),
(4, 4, 'Greenfield', 'Ohio'),
(5, 5, 'Foxborough', 'Massachusetts'),
(6, 6, 'Clearwater', 'Florida'),
(7, 7, 'Fairview', 'Colorado'),
(15, 5, 'addis ababa', 'oromia');

-- --------------------------------------------------------

--
-- Table structure for table `offender`
--

CREATE TABLE `offender` (
  `OffenderId` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `RiskLevel` enum('Low','Medium','High') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offender`
--

INSERT INTO `offender` (`OffenderId`, `Name`, `DOB`, `Address`, `RiskLevel`) VALUES
(1, 'John Smith', '1985-08-10', '123 Main St, Springfield', 'High'),
(2, 'Samuel Lee', '1990-02-25', '456 Oak St, Shelbyville', 'Medium'),
(3, 'Robert Brown', '1982-05-30', '789 Pine St, Riverdale', 'Low'),
(4, 'Emily Miller', '1995-09-15', '101 Maple St, Greenfield', 'Medium'),
(5, 'Jason Johnson', '1990-01-11', '202 Elm St, Foxborough', 'High'),
(6, 'Chris Clark', '1978-03-22', '303 Birch St, Clearwater', 'Low'),
(7, 'Anna Adams', '1992-06-04', '404 Cedar St, Fairview', 'Medium'),
(8, 'David Wilson', '1988-07-25', '505 Walnut St, Brookside', 'High'),
(9, 'Sophia White', '1985-11-16', '606 Cherry St, Downtown', 'Low'),
(10, 'George Taylor', '1979-12-05', '707 Fir St, Lakeside', 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `offense`
--

CREATE TABLE `offense` (
  `OffenseId` int(11) NOT NULL,
  `OffenderId` int(11) DEFAULT NULL,
  `OffenseType` enum('Rape','Sexual Assault','Harassment','Stalking','Indecent Exposure','Trafficking','Forced Prostitution','Other') NOT NULL,
  `DateCommitted` date DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offense`
--

INSERT INTO `offense` (`OffenseId`, `OffenderId`, `OffenseType`, `DateCommitted`, `Description`) VALUES
(1, 1, 'Rape', '2020-06-15', 'Assaulted a woman at gunpoint'),
(2, 2, 'Sexual Assault', '2021-05-20', 'Forced physical contact in public'),
(3, 3, 'Harassment', '2019-12-01', 'Repeatedly sending threatening messages'),
(4, 4, 'Stalking', '2022-01-30', 'Followed the victim over several weeks'),
(5, 5, 'Indecent Exposure', '2021-03-10', 'Exposed himself in public place'),
(6, 6, 'Trafficking', '2020-07-25', 'Smuggled individuals for forced labor'),
(7, 7, 'Forced Prostitution', '2022-09-15', 'Forced a victim into sex work'),
(8, 8, 'Other', '2021-02-14', 'Harassment disguised as a joke'),
(9, 9, 'Rape', '2025-01-27', 'Victim was attacked in a parking lot');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `OffenderId` int(11) DEFAULT NULL,
  `DateReported` date DEFAULT NULL,
  `Details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportId`, `UserId`, `OffenderId`, `DateReported`, `Details`) VALUES
(1, 1, 1, '2020-06-16', 'Reported the assault to authorities'),
(2, 2, 2, '2021-05-21', 'Victim reached out to officer for assistance'),
(3, 3, 3, '2019-12-02', 'Filed harassment complaint with local police'),
(4, 4, 4, '2022-01-31', 'Victim came forward after weeks of stalking'),
(5, 5, 5, '2021-03-11', 'Witnessed indecent exposure incident and reported it'),
(6, 6, 6, '2020-07-26', 'Victim provided statement on trafficking activities'),
(7, 7, 7, '2022-09-16', 'Reported forced prostitution to human rights group'),
(8, 8, 8, '2021-02-15', 'Victim described harassment in a joking context'),
(9, 9, 9, '2021-08-06', 'Victim filed a report for rape'),
(10, 10, 10, '2022-03-20', 'Victim reported unwanted touching in a bar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role` enum('Admin','User','Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Name`, `Email`, `Password`, `Role`) VALUES
(1, 'John Doe', 'johndoe@example.com', 'password123', 'Admin'),
(2, 'Jane Smith', 'janesmith@example.com', 'password123', 'User'),
(3, 'Mike Johnson', 'mikej@example.com', 'password123', 'Manager'),
(4, 'Emily Davis', 'emilyd@example.com', 'password123', 'Manager'),
(5, 'David Clark', 'davidc@example.com', 'password123', 'Admin'),
(6, 'Sarah Wilson', 'sarahw@example.com', 'password123', 'Admin'),
(7, 'James Brown', 'jamesb@example.com', 'password123', 'User'),
(8, 'Lisa White', 'lisaw@example.com', 'password123', 'User'),
(9, 'Daniel Green', 'danielg@example.com', 'password123', 'User'),
(10, 'Jessica Adams', 'jessicaa@example.com', 'password123', 'Admin'),
(14, 'tsion', 'tsionbirhanu@gmail.com', '$2y$10$/SLxSIkMXdx4IU7NzTkhSew1wYFfUHpFsv1a1tRiKlSHjBrUpSn8K', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationId`),
  ADD KEY `OffenderId` (`OffenderId`);

--
-- Indexes for table `offender`
--
ALTER TABLE `offender`
  ADD PRIMARY KEY (`OffenderId`);

--
-- Indexes for table `offense`
--
ALTER TABLE `offense`
  ADD PRIMARY KEY (`OffenseId`),
  ADD KEY `OffenderId` (`OffenderId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `OffenderId` (`OffenderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `offender`
--
ALTER TABLE `offender`
  MODIFY `OffenderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offense`
--
ALTER TABLE `offense`
  MODIFY `OffenseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`OffenderId`) REFERENCES `offender` (`OffenderId`);

--
-- Constraints for table `offense`
--
ALTER TABLE `offense`
  ADD CONSTRAINT `offense_ibfk_1` FOREIGN KEY (`OffenderId`) REFERENCES `offender` (`OffenderId`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`OffenderId`) REFERENCES `offender` (`OffenderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
