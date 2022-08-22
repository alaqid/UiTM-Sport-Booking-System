-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 04:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminEmail`, `adminPass`) VALUES
(1, 'test@gmail.com', '123'),
(2, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking_records`
--

CREATE TABLE `booking_records` (
  `bookingID` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `booking_type` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `bookdate` varchar(50) NOT NULL,
  `booktime` varchar(50) NOT NULL,
  `booktime_end` varchar(50) NOT NULL,
  `book_status` varchar(50) NOT NULL DEFAULT 'Upcoming',
  `feedback` varchar(50) DEFAULT NULL,
  `return_proof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_records`
--

INSERT INTO `booking_records` (`bookingID`, `userID`, `booking_type`, `item_name`, `bookdate`, `booktime`, `booktime_end`, `book_status`, `feedback`, `return_proof`) VALUES
(23, 1, 'Equipment', 'Badminton Racket', '2021-12-24', '13:14', '14:23', 'Ended', 'Positive', 'IMG-6192ac057ec701.40485174.jpg'),
(38, 2, 'Equipment', 'Basketball', '2021-12-14', '23:13', '12:14', 'Ended', 'Negative', 'IMG-6202a23a30d258.05165799.jpg'),
(39, 2, 'Equipment', 'Jump Ropes', '2021-12-14', '16:14', '17:15', 'Ended', 'Negative', 'IMG-620366dc1e3753.58382012.jpg'),
(40, 2, 'Equipment', 'Tennis Ball', '2021-12-16', '16:00', '17:00', 'Ended', 'Positive', 'IMG-61b9011c9e5ff9.62535682.jpg'),
(43, 2, 'Facility', 'Laman Woodball', '2021-12-16', '18:00', '19:00', 'Ended', 'Negative', ''),
(44, 2, 'Facility', 'Badminton Court', '2021-12-18', '03:40', '04:40', 'Ended', 'Positive', ''),
(45, 2, 'Facility', 'Petanque ', '2021-12-18', '02:43', '03:43', 'Ended', 'Positive', ''),
(46, 2, 'Facility', 'Basketball Court', '2021-12-19', '05:49', '06:49', 'Upcoming', NULL, ''),
(48, 2, 'Facility', 'Laman Woodball', '2021-12-16', '18:00', '19:00', 'Upcoming', NULL, ''),
(49, 2, 'Equipment', 'Rugby Ball', '2021-12-20', '04:00', '05:00', 'Upcoming', NULL, ''),
(52, 2, 'Equipment', 'Hockey Stick', '2021-12-15', '18:02', '19:03', 'Upcoming', NULL, ''),
(59, 3, 'Equipment', 'Jump Ropes', '2021-12-15', '18:17', '20:20', 'Ongoing', NULL, ''),
(60, 3, 'Equipment', 'Badminton Shuttlecock', '2021-12-15', '18:19', '19:20', 'Ongoing', NULL, ''),
(61, 3, 'Equipment', 'Jump Ropes', '2021-12-16', '12:13', '14:13', 'Ended', 'Positive', 'IMG-61daf712252465.62312811.png'),
(62, 3, 'Equipment', 'Basketball', '2021-12-24', '18:21', '07:22', 'Ended', 'Positive', 'IMG-61daf702e831c5.60874315.png'),
(63, 3, 'Equipment', 'Basketball', '2021-12-17', '18:26', '07:26', 'Ongoing', NULL, ''),
(64, 3, 'Facility', 'Padang Rani', '2021-12-15', '01:34', '14:56', 'Ended', 'Positive', ''),
(65, 3, 'Facility', 'Futsal Court', '2021-12-15', '18:26', '18:27', 'Ended', 'Negative', ''),
(66, 1, 'Facility', 'Badminton Court', '2021-12-31', '17:13', '18:13', 'Ended', 'Positive', ''),
(67, 4, 'Equipment', 'Table Tennis', '2021-12-18', '13:00', '14:00', 'Ended', 'Negative', 'IMG-teniss.jpg'),
(68, 1, 'Facility', 'Futsal Court', '2022-01-09', '22:00', '23:00', 'Ended', 'Negative', ''),
(69, 1, 'Equipment', 'Badminton Racket', '2022-01-09', '22:00', '23:00', 'Ongoing', NULL, ''),
(70, 1, 'Equipment', 'Basketball', '2022-01-11', '16:00', '17:00', 'Ended', 'Negative', 'IMG-61dc793a5d0636.27756665.png'),
(71, 1, 'Equipment', 'Basketball', '2022-02-11', '02:19', '03:20', 'Ended', 'Negative', 'IMG-61dc7966110725.69613731.png'),
(72, 1, 'Equipment', 'Badminton Shuttlecock', '2022-01-20', '00:00', '00:00', 'Ongoing', NULL, ''),
(73, 1, 'Facility', 'Futsal Court', '2022-01-12', '09:00', '10:00', 'Ongoing', NULL, ''),
(74, 1, 'Facility', 'Squash Court', '2022-01-13', '13:00', '14:00', 'Upcoming', NULL, ''),
(75, 1, 'Equipment', 'Badminton Shuttlecock', '2022-01-12', '15:00', '16:00', 'Upcoming', NULL, ''),
(76, 2, 'Facility', 'Basketball Court', '2022-02-11', '13:00', '14:00', 'Upcoming', NULL, ''),
(77, 2, 'Facility', 'Futsal Court', '2022-02-12', '15:00', '16:00', 'Upcoming', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentID` int(50) NOT NULL,
  `equipment_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `equipment_name`) VALUES
(1, 'Badminton Racket'),
(2, 'Badminton Shuttlecock'),
(3, 'Basketball'),
(4, 'Jump Ropes'),
(5, 'Volleyball'),
(6, 'Football'),
(7, 'Handball'),
(8, 'Hockey Stick'),
(10, 'Softball'),
(11, 'Rugby Ball'),
(12, 'Petanque'),
(13, 'Tennis Racket'),
(14, 'Tennis Ball'),
(15, 'Table Tennis'),
(16, 'Bola');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facilityID` int(50) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `location_latitude` varchar(50) NOT NULL,
  `location_longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facilityID`, `facility_name`, `location_latitude`, `location_longitude`) VALUES
(1, 'Futsal Court', '6.452868146333808', '100.27569194214993'),
(2, 'Basketball Court', '6.448617098344782', '100.2757223828981'),
(3, 'Laman Woodball', '6.445539545457635', '100.27445991258972'),
(4, 'Padang Rani', '6.44503350645253', '100.27541869328628'),
(5, 'Volleyball Court', '6.4452000840573485', '100.27663871182394'),
(6, 'Netball Court', '6.445662183660713', '100.27733237212871'),
(7, 'Padang Ragbi Jati', '6.446459870753049', '100.28220683264993'),
(8, 'Petanque ', '6.448837897406582', '100.28083372750596'),
(9, 'Badminton Court', '6.451962606162659', '100.27574140947355'),
(10, 'Tennis Court', '6.4496305623286005', '100.28233473656871'),
(11, 'Squash Court', '6.45238188530417', '100.27916165302607');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(50) NOT NULL,
  `studentID` varchar(50) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `Uemail` varchar(50) NOT NULL,
  `Uphone` varchar(50) NOT NULL,
  `Ufaculty` varchar(50) NOT NULL,
  `user_dp` varchar(50) NOT NULL DEFAULT 'IMG-618b48ced21914.99383662.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `studentID`, `userPass`, `Uname`, `Uemail`, `Uphone`, `Ufaculty`, `user_dp`) VALUES
(1, '2019311911', '123', 'Al Aqid', 'aqid26@gmail.com', '+60104244220', 'Faculty Of Computer & Mathematical Sciences', 'IMG-618cabe0781d04.38891131.jpg'),
(2, '2019311837', '123', 'Abdul Taqims', 'taqim@gmail.com', '0123456789', 'Faculty Of Business And Management', 'IMG-6202a08f8b15f3.13387345.jpg'),
(3, '2019311067', '123', 'nur aiman', 'aiman@gmail.com', '0123456789', 'Faculty Of Applied Sciences', 'IMG-618b49169abde9.96785547.png'),
(4, '2019311000', '123', 'aidil', 'aidil@gmail.com', '01983454232', 'Faculty Of Applied Sciences', 'IMG-61b97ccaf15e01.77220062.jpg'),
(13, '201920221', '123', 'hisyam', 'hisyam@gmail.com', '0134567832', 'Faculty Of Sports Science And Recreation', 'IMG-618b48ced21914.99383662.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booking_records`
--
ALTER TABLE `booking_records`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_records`
--
ALTER TABLE `booking_records`
  MODIFY `bookingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
