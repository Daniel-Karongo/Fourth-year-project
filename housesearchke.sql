-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 08, 2023 at 05:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housesearchke`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Bedrooms` int(10) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bedsitters`
--

CREATE TABLE `bedsitters` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_premises`
--

CREATE TABLE `business_premises` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Type_Of_Premise` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Bedrooms` int(10) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties_owners_details`
--

CREATE TABLE `properties_owners_details` (
  `Rental_ID` varchar(255) NOT NULL,
  `Owners_Phone_Number` varchar(10) NOT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Rental_Term` varchar(15) NOT NULL,
  `Amount_of_Rent` int(10) NOT NULL,
  `Pitching` mediumtext NOT NULL,
  `Preferred_Sorts_of_Applicants` varchar(255) NOT NULL,
  `Maximum_Number_Of_Occupants` int(10) NOT NULL,
  `Rules_Urls` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_owners`
--

CREATE TABLE `property_owners` (
  `Phone_Number` varchar(10) NOT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Pass_Word` varchar(255) DEFAULT NULL,
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) DEFAULT NULL,
  `Rentals_Owned` mediumtext DEFAULT NULL,
  `Password_Reset_Confirmation_Code` mediumtext DEFAULT NULL,
  `Remember_Me` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `single_rooms`
--

CREATE TABLE `single_rooms` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` varchar(1000) NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suites`
--

CREATE TABLE `suites` (
  `Rental_ID` varchar(255) NOT NULL,
  `Rental_Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Google_Location` varchar(255) NOT NULL,
  `Image_Urls` mediumtext NOT NULL,
  `Ammenities` varchar(1000) NOT NULL,
  `Number_Of_Beds_Per_Suite` int(10) NOT NULL,
  `Number_Of_Similar_Units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `bedsitters`
--
ALTER TABLE `bedsitters`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `business_premises`
--
ALTER TABLE `business_premises`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `properties_owners_details`
--
ALTER TABLE `properties_owners_details`
  ADD PRIMARY KEY (`Rental_ID`,`Owners_Phone_Number`,`Email_Address`);

--
-- Indexes for table `property_owners`
--
ALTER TABLE `property_owners`
  ADD PRIMARY KEY (`Phone_Number`,`Email_Address`);

--
-- Indexes for table `single_rooms`
--
ALTER TABLE `single_rooms`
  ADD PRIMARY KEY (`Rental_ID`);

--
-- Indexes for table `suites`
--
ALTER TABLE `suites`
  ADD PRIMARY KEY (`Rental_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
