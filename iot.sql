-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 08:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `RegistrationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `RegistrationDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`RegistrationID`, `UserID`, `ServiceID`, `RegistrationDate`) VALUES
(1, 9, 1, '2023-12-21 13:12:41'),
(2, 9, 1, '2023-12-20 00:00:00'),
(3, 9, 2, '2023-12-20 00:00:00'),
(4, 9, 1, '2023-12-20 00:00:00'),
(5, 9, 2, '2023-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `ReportName` text NOT NULL,
  `ReportDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` text NOT NULL,
  `Description` text DEFAULT NULL,
  `ServiceProvider` text DEFAULT NULL,
  `UsageInstructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceID`, `ServiceName`, `Description`, `ServiceProvider`, `UsageInstructions`) VALUES
(1, 'service 1', 'service 1', 'service 1', 'service 1'),
(2, 'service 2', 'service 2', 'service 2', 'service 2');

-- --------------------------------------------------------

--
-- Table structure for table `userpermissions`
--

CREATE TABLE `userpermissions` (
  `UserPermissionID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `UserRoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `UserRoleID` int(11) NOT NULL,
  `RoleName` text NOT NULL,
  `RoleDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`UserRoleID`, `RoleName`, `RoleDescription`) VALUES
(1, 'user', 'user general'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `PhoneNumber` text DEFAULT NULL,
  `Role` text NOT NULL,
  `AccountStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `PhoneNumber`, `Role`, `AccountStatus`) VALUES
(1, 'ken', 'Singhayoo', 'ken@gmail.com', '1234', '0800000000000000', '1', 'true'),
(2, 'test1', 'test1', 'qwe2@gad.com', '1234', '1231', '1', 'true'),
(3, 'adsasd', 'LastName', 'LastName', 'LastName', 'LastName', 'LastName', 'LastName'),
(4, 'adsasd', 'LastName', 'LastNasdaasdme', 'LastasdName', 'LastasdName', 'LastNasdame', 'LastNasdame'),
(5, 'Sekkarin', 'Singhayoo', '$2y$10$vwqHdrV1GuBiayXFf8Fx5OC5XHhmbaSjNJSKlUFNjs4AT/0VYjdvi', 'sekkri1234@gmail.com', '+66611979132', '1', 'true'),
(6, 'Sekkarin', 'Singhayoo', '$2y$10$AJOSGywhQGjJNgQsoHMSdur/VsN1FUFeKbUahlN1Fq6fY2DJ31fde', 'sekkri1234@gmail.com', '+66611979132', '1', 'true'),
(7, 'Sekkarin', 'Singhayoo', '$2y$10$3skKm0a8OUcRbu1wdMiL9unBAEFRTShdCap87Nsarx0sF.necsK2u', 'sekkri1234@gmail.com', '+66611979132', '1', 'true'),
(8, 'Sekkarin', 'Singhayoo', '$2y$10$A4V4JC3HKenzp4x9Ve47QuL9oh8NcggJlhvxMoKk6fv1Y88YyCWkq', 'sekkri1234@gmail.com', '+66611979132', '1', 'true'),
(9, 'Sekkarin', 'Singhayoo', 'sekkri1234@gmail.com', '$2y$10$P.FPGD0vlWL8Ntm6uWxT7erMMa5rC4aWkwrFBjfMw0IMpbiNNR4OC', '+66611979132', '1', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`RegistrationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `userpermissions`
--
ALTER TABLE `userpermissions`
  ADD PRIMARY KEY (`UserPermissionID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `UserRoleID` (`UserRoleID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`UserRoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `RegistrationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userpermissions`
--
ALTER TABLE `userpermissions`
  MODIFY `UserPermissionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `services` (`ServiceID`);

--
-- Constraints for table `userpermissions`
--
ALTER TABLE `userpermissions`
  ADD CONSTRAINT `userpermissions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `userpermissions_ibfk_2` FOREIGN KEY (`UserRoleID`) REFERENCES `userroles` (`UserRoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
