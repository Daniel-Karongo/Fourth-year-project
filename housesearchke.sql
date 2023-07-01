-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 30, 2023 at 12:46 PM
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

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Bedrooms`, `Number_Of_Similar_Units`) VALUES
('1687279264_karongodaniel022@gmail.com_0743879002_Kwa Pastor_Apartment', 'Kwa Pastor', 'Witeithie', 'ljlkjkjljlkjkljlk', 'IMG-6491d6a06d5dd1.87423093.jpg, IMG-6491d6a06d90f8.67960135.jpg, IMG-6491d6a06db5e4.71196261.jpg, IMG-6491d6a06ddf14.94590938.jpg', 'Tap Water: Tap Water, Water Tank: Water Tank, Meter: Meter, handicap-access: Handicap Access, balcony: Balcony', 5, 3);

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

--
-- Dumping data for table `bedsitters`
--

INSERT INTO `bedsitters` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Similar_Units`) VALUES
('1687279170_karongodaniel022@gmail.com_0743879002_House Of Hope_Bedsitter', 'House Of Hope', 'Witeithie', 'kljkljljlkjj', 'IMG-6491d6421d3f54.57543644.jpg, IMG-6491d6421d62c7.43547311.jpg, IMG-6491d6421d8c22.20165315.jpg, IMG-6491d6421dae93.95260455.jpg', 'Tap Water: Tap Water, Water Tank: Water Tank, Security Guard: Security Guard, Pit Latrine: Pit Latrine, Automatic Toilet: Flashing Toilet, cleaner: Cleaner, ceiling: Ceiling, furnished: Furnished', 4);

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

--
-- Dumping data for table `business_premises`
--

INSERT INTO `business_premises` (`Rental_ID`, `Rental_Name`, `Type_Of_Premise`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Similar_Units`) VALUES
('1687279328_karongodaniel022@gmail.com_0743879002_Mitahato_Business Premise', 'Mitahato', 'Shop', 'Witeithie', 'lkjhkljkjjklkjlkjkl', 'IMG-6491d6e06a54e1.83252985.jpg, IMG-6491d6e06a7566.40332392.jpg, IMG-6491d6e06a9362.23625409.jpg, IMG-6491d6e06adbe8.70265898.jpg', '', 2),
('1687558791_karongodaniel022@gmail.com_0743879002_Joskam Hostels_Business Premise', 'Joskam Hostels', 'Industrial', 'Witeithie', 'kljhjkhjlhukjjklhklj;lhk;;lhlk', 'IMG-64961ad798e016.45605502.jpg, IMG-64961ad79914d2.62464383.jpg, IMG-64961ad7993b89.83298635.jpg, IMG-64961ad7996a41.64445078.jpg', 'Token: Token, Meter: Meter, Security Guard: Security Guard, Cctv: Cctv, Security Lights: Security Lights, Pit Latrine: Pit Latrine, Garbage Collection: Garbage Collection, cleaner: Cleaner, sink: Sink, handicap-access: Handicap Access, packing: Packing, tiles: Tiles, ceiling: Ceiling, balcony: Balcony, wi-fi: Wi-Fi, joint-tv-subscription: Joint TV Subscription, air-conditioning: Air Conditioning, furnished: Furnished, swimming-pool: Swimming Pool, gym: Gym', 2);

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

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Similar_Units`) VALUES
('1687278945_karongodaniel022@gmail.com_0743879002_Roadside Residence_Hostel', 'Roadside Residence', 'Witeithie', 'jkhjkhjkhjhhjkh', 'IMG-6491d561437a21.04090092.jpg, IMG-6491d56143ae46.17366542.jpg, IMG-6491d56143dd28.34211883.jpg, IMG-6491d56143fe89.45743188.jpg', 'Tap Water: Tap Water, Water Tank: Water Tank, Bore Hole: Borehole, Token: Token, Meter: Meter, Security Guard: Security Guard, Cctv: Cctv, Security Lights: Security Lights, Pit Latrine: Pit Latrine, Automatic Toilet: Flashing Toilet, Garbage Collection: Garbage Collection, cleaner: Cleaner, sink: Sink, handicap-access: Handicap Access, packing: Packing, tiles: Tiles, ceiling: Ceiling, balcony: Balcony, wi-fi: Wi-Fi, joint-tv-subscription: Joint TV Subscription, air-conditioning: Air Conditioning, furnished: Furnished, swimming-pool: Swimming Pool, gym: Gym', 2);

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

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Bedrooms`, `Number_Of_Similar_Units`) VALUES
('1687279445_karongodaniel022@gmail.com_0743879002_Kwa Bishop_House', 'Kwa Bishop', 'Witeithie', 'kljklhjhklhjkhkljhj', 'IMG-6491d755cd71e6.32194317.jpg, IMG-6491d755cdb956.71643139.jpg, IMG-6491d755cdd8a8.06259298.jpg, IMG-6491d755ce24b0.85238093.jpg', 'Tap Water: Tap Water, Token: Token, Security Guard: Security Guard, Pit Latrine: Pit Latrine, gym: Gym', 5, 1);

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

--
-- Dumping data for table `properties_owners_details`
--

INSERT INTO `properties_owners_details` (`Rental_ID`, `Owners_Phone_Number`, `Email_Address`, `Rental_Term`, `Amount_of_Rent`, `Pitching`, `Preferred_Sorts_of_Applicants`, `Maximum_Number_Of_Occupants`, `Rules_Urls`) VALUES
('1687278945_karongodaniel022@gmail.com_0743879002_Roadside Residence_Hostel', '0743879002', 'karongodaniel022@gmail.com', 'monthly', 3200, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Males, Students: No Students, Family: No Children, Vehicles: Vehicles Allowed, Any Religion: Any religion', 2, 'IMG-6491d561442222.23368122.jpg, IMG-6491d561450ed5.29610769.jpg'),
('1687279068_karongodaniel022@gmail.com_0743879002_Twins Garden_Single Room', '0743879002', 'karongodaniel022@gmail.com', 'weekly', 1000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Males, Students: No Students, Family: No Children, Vehicles: Vehicles Allowed, Christianity: Christianity', 5, 'IMG-6491d5dc8186f2.77966111.jpg, IMG-6491d5dc81a753.85958399.jpg'),
('1687279170_karongodaniel022@gmail.com_0743879002_House Of Hope_Bedsitter', '0743879002', 'karongodaniel022@gmail.com', 'yearly', 50000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Any Gender, Students: No Students, Family: No Children, Vehicles: Vehicles Allowed, Any Religion: Any religion', 2, 'IMG-6491d6421dcfa5.80352599.jpg, IMG-6491d6421df1a4.27416291.jpg'),
('1687279264_karongodaniel022@gmail.com_0743879002_Kwa Pastor_Apartment', '0743879002', 'karongodaniel022@gmail.com', 'monthly', 10000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Any Gender, Specified Religion: Buddhism', 0, 'IMG-6491d6a06e0591.93642290.jpg, IMG-6491d6a06e2d46.29035598.jpg'),
('1687279328_karongodaniel022@gmail.com_0743879002_Mitahato_Business Premise', '0743879002', 'karongodaniel022@gmail.com', 'daily', 300, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '', 0, 'IMG-6491d6e06b0738.28834438.jpg, IMG-6491d6e06b2e37.08943058.jpg'),
('1687279445_karongodaniel022@gmail.com_0743879002_Kwa Bishop_House', '0743879002', 'karongodaniel022@gmail.com', 'quarterly', 30000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Males, Students: No Students, Vehicles: Vehicles Allowed', 0, 'IMG-6491d755ce4525.46426457.jpg, IMG-6491d755ce6974.88651468.jpg'),
('1687279580_karongodaniel022@gmail.com_0743879002_Siku Njema_Suite', '0743879002', 'karongodaniel022@gmail.com', 'bi-annually', 60000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Gender: Any Gender, Students: Students Welcome, Family: Any Family Welcome, Vehicles: Vehicles Allowed, Christianity: Christianity, Islam: Islam, Hinduism: Hinduism, Specified Religion: Buddhism', 2, 'IMG-6491d7dce465c7.45520784.jpg, IMG-6491d7dce48511.22494523.jpg'),
('1687558791_karongodaniel022@gmail.com_0743879002_Joskam Hostels_Business Premise', '0743879002', 'karongodaniel022@gmail.com', 'yearly', 100000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. ', 'Gender: Any Gender, Students: Students Welcome, Family: Any Family Welcome, Vehicles: Vehicles Not Allowed, Specified Religion: Vehicles Not Allowed, Any Religion: Any religion', 0, 'IMG-64961ad7999166.86508807.jpg, IMG-64961ad799be64.69906144.jpg');

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
  `Rentals_Owned` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_owners`
--

INSERT INTO `property_owners` (`Phone_Number`, `Email_Address`, `Pass_Word`, `First_Name`, `Last_Name`, `Rentals_Owned`) VALUES
('0723715225', 'kungu.ik@gmail.com', '$2y$10$bbJbQdS6ycB8VpMA211/UuAx1dO5am1ctb8qUkayZRyFV6OdDYqrK', 'Isaac', 'Kungu', ''),
('0743879002', 'karongodaniel022@gmail.com', '$2y$10$7bn8dplVrkTxCd.pJYi9P.w.v0sz8acrW6OzS2VHjNksd.CIGBYsO', 'Daniel', 'Kungu', '1687278945_karongodaniel022@gmail.com_0743879002_Roadside Residence_Hostel, 1687279068_karongodaniel022@gmail.com_0743879002_Twins Garden_Single Room, 1687279170_karongodaniel022@gmail.com_0743879002_House Of Hope_Bedsitter, 1687279264_karongodaniel022@gmail.com_0743879002_Kwa Pastor_Apartment, 1687279328_karongodaniel022@gmail.com_0743879002_Mitahato_Business Premise, 1687279445_karongodaniel022@gmail.com_0743879002_Kwa Bishop_House, 1687279580_karongodaniel022@gmail.com_0743879002_Siku Njema_Suite, 1687558791_karongodaniel022@gmail.com_0743879002_Joskam Hostels_Business Premise');

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

--
-- Dumping data for table `single_rooms`
--

INSERT INTO `single_rooms` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Similar_Units`) VALUES
('1687279068_karongodaniel022@gmail.com_0743879002_Twins Garden_Single Room', 'Twins Garden', 'Witeithie', 'lkjkljkljkljlkj', 'IMG-6491d5dc810883.31645430.jpeg, IMG-6491d5dc8127d5.75921183.jpg, IMG-6491d5dc8149d1.94369382.jpg, IMG-6491d5dc816a49.58205116.jpg', 'Tap Water: Tap Water, Token: Token, Security Guard: Security Guard, Pit Latrine: Pit Latrine, Garbage Collection: Garbage Collection, handicap-access: Handicap Access, tiles: Tiles, wi-fi: Wi-Fi', 2);

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
-- Dumping data for table `suites`
--

INSERT INTO `suites` (`Rental_ID`, `Rental_Name`, `Location`, `Google_Location`, `Image_Urls`, `Ammenities`, `Number_Of_Beds_Per_Suite`, `Number_Of_Similar_Units`) VALUES
('1687279580_karongodaniel022@gmail.com_0743879002_Siku Njema_Suite', 'Siku Njema', 'Witeithie', 'KLJ;LJKLJ;LJKJ;', 'IMG-6491d7dce374f5.48375706.jpg, IMG-6491d7dce39f19.51113474.jpg, IMG-6491d7dce3bdf2.30646490.jfif, IMG-6491d7dce446c8.10179377.jpg', 'Tap Water: Tap Water, Bore Hole: Borehole, Token: Token, Security Guard: Security Guard, Pit Latrine: Pit Latrine, Garbage Collection: Garbage Collection, packing: Packing, balcony: Balcony, wi-fi: Wi-Fi', 2, 4);

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
