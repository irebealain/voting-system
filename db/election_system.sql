-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 09:51 PM
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
-- Database: `election_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `ProfileImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Name`, `Gender`, `Password`, `ProfileImg`) VALUES
('emmy@gmail.com', 'Irebe Gashumba Alain', 'Male', '123', 'profile.png'),
('justin@asyv.org', 'Justin', 'Male', '1234567', 'Rectangle (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Bio` varchar(255) NOT NULL,
  `Manifesto` varchar(255) NOT NULL,
  `PositionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateId`, `Name`, `Bio`, `Manifesto`, `PositionId`) VALUES
(1, 'John Doe', 'Experienced leader with a passion for community development.', 'Committed to improving education and healthcare services in our community.', 1),
(2, 'Jane Smith', 'Dedicated advocate for environmental sustainability.', 'Focused on implementing green initiatives and combating climate change.', 3),
(3, 'Nyaxo', 'Best Comedian', 'Comedian', 1),
(4, 'gashumba', 'talkative', 'one', 6);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `positionId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionId`, `Name`) VALUES
(1, 'President'),
(3, 'Vice-President'),
(4, 'Education'),
(5, 'Health and Wellness'),
(6, 'Communication');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Family` varchar(100) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Name`, `Password`, `Gender`, `Family`, `Class`, `Grade`) VALUES
(2023126222, 'Irebe Gashumba Alain', 'emma', 'Male', 'Rugamba Cyprien', 'S5 MPC', 'Intwali'),
(2023126223, 'Kastar', 'pacifique09', 'Male', 'King Menelk ', 'S6 MCE', 'ISHYAKA');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CandidateId` int(11) NOT NULL,
  `PositionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`VoteId`, `UserId`, `CandidateId`, `PositionId`) VALUES
(17, 2023126222, 1, 1),
(18, 2023126222, 2, 3),
(19, 2023126222, 4, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateId`) USING BTREE,
  ADD KEY `PositionId` (`PositionId`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`positionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CandidateId` (`CandidateId`),
  ADD KEY `PositionId` (`PositionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `CandidateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `positionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`PositionId`) REFERENCES `positions` (`positionId`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`CandidateId`) REFERENCES `candidate` (`CandidateId`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`PositionId`) REFERENCES `positions` (`positionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
