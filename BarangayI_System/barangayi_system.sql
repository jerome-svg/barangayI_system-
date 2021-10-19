-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 10:41 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangayi_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` varchar(30) NOT NULL,
  `admin_Fname` varchar(50) NOT NULL,
  `admin_Mname` varchar(50) NOT NULL,
  `admin_Lname` varchar(50) NOT NULL,
  `admin_Gender` varchar(7) NOT NULL,
  `admin_Barangayname` varchar(50) NOT NULL,
  `admin_Email` varchar(50) NOT NULL,
  `admin_Password` varchar(100) NOT NULL,
  `admin_Contactnumber` varchar(12) NOT NULL,
  `admin_addresss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_Fname`, `admin_Mname`, `admin_Lname`, `admin_Gender`, `admin_Barangayname`, `admin_Email`, `admin_Password`, `admin_Contactnumber`, `admin_addresss`) VALUES
('Admin-2021-0001', 'Jerome', 'Lanuzo', 'Valdez', 'Male', 'Barangay gwapo ', 'Jeromevaldez2020@gmial.com', '$2y$10$cdstFag/xJBZhVkkUjHdyeHQz/0gryN0gyyuWXoc8uJCk/tpsLRzW', '09051769859', 'Barangay Grapo Cabanatuan City ');

-- --------------------------------------------------------

--
-- Table structure for table `all_image`
--

CREATE TABLE `all_image` (
  `image_id` int(3) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image_onwerFullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_image`
--

INSERT INTO `all_image` (`image_id`, `image_name`, `image_onwerFullname`) VALUES
(70, '20190219_130717.jpg', 'Larry S. Ordonio'),
(72, 'Jerome.jpg', 'Jerome L. Valdez'),
(73, 'Rumi.png', 'Joy Cenisse H. Ramos '),
(74, '20190219_130902.jpg', 'Vince S. Cabreros'),
(75, 'aNTULIN.jpg', 'Antolin Tubera Melchor'),
(76, 'mick.jpg', 'Mick S. Saclayan '),
(77, 'Vien.jpg', 'Vien Michael Guillermo');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_official`
--

CREATE TABLE `barangay_official` (
  `Official_Id` varchar(20) NOT NULL,
  `Official_Fname` varchar(50) NOT NULL,
  `Official_Mname` varchar(50) NOT NULL,
  `Official_Lname` varchar(50) NOT NULL,
  `Official_Age` int(3) NOT NULL,
  `Official_DateBirth` varchar(50) NOT NULL,
  `Official_Term` varchar(50) NOT NULL,
  `Official_Position` varchar(50) NOT NULL,
  `Official_Status` varchar(20) NOT NULL,
  `Official_Profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_official`
--

INSERT INTO `barangay_official` (`Official_Id`, `Official_Fname`, `Official_Mname`, `Official_Lname`, `Official_Age`, `Official_DateBirth`, `Official_Term`, `Official_Position`, `Official_Status`, `Official_Profile`) VALUES
('BS-OF-001', 'Jerome', 'Lanuzo', 'Valdez', 24, '1996-05-20', '2021-2024', 'Barangay Captain ', 'Single', '\r\nJerome.jpg\r\n \r\n\r\n'),
('BS-OF-002', 'Mick Jan Paul', 'Santos ', 'Saclayan ', 26, '1995-03-13', '2021-2024', 'Treasurer ', 'married', '\r\nmick.jpg\r\n \r\n\r\n'),
('BS-OF-003', 'Joy Cenisse ', 'Hernandes', 'Ramos ', 21, '1996-06-21', '2021-2024', 'Barangay Secretary ', 'married', '\r\nRumi.png\r\n \r\n\r\n'),
('BS-OF-004', 'Melchor', 'Tabuhara ', 'Antulin ', 24, '1996-06-19', '2021-2025', 'Barangay Councilor ', 'Single ', '\r\naNTULIN.jpg\r\n \r\n\r\n'),
('BS-OF-005', 'Vien Michael ', 'Samson', 'Guillermo', 24, '1996-06-19', '2021-2025', 'Barangay Chairman ', 'Single ', '\r\nVien.jpg\r\n \r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `Case_blotter_no` varchar(10) NOT NULL,
  `Complanant` varchar(50) NOT NULL,
  `Complained` varchar(100) NOT NULL,
  `DateofFiling` varchar(20) NOT NULL,
  `PersonIncharge` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`Case_blotter_no`, `Complanant`, `Complained`, `DateofFiling`, `PersonIncharge`, `Status`, `Description`) VALUES
('B-001', 'Jerome L. Valdez', 'Erick James Bona ', '2021-05-18', 'Mick Jan Paul Santos . Saclayan', 'CASE CLOSE', 'Nag nakaw ng kalabaw 						');

-- --------------------------------------------------------

--
-- Table structure for table `house_hold`
--

CREATE TABLE `house_hold` (
  `H_id` varchar(20) NOT NULL,
  `H_Fname` varchar(50) NOT NULL,
  `H_Mname` varchar(50) NOT NULL,
  `H_Lname` varchar(50) NOT NULL,
  `H_Age` int(3) NOT NULL,
  `H_Religion` varchar(50) NOT NULL,
  `H_DBirth` varchar(50) NOT NULL,
  `H_PBirth` varchar(50) NOT NULL,
  `H_Gender` varchar(7) NOT NULL,
  `H_CivilStatus` varchar(10) NOT NULL,
  `H_Cityzenship` varchar(50) NOT NULL,
  `H_Occupation` varchar(50) NOT NULL,
  `H_Profile_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_hold`
--

INSERT INTO `house_hold` (`H_id`, `H_Fname`, `H_Mname`, `H_Lname`, `H_Age`, `H_Religion`, `H_DBirth`, `H_PBirth`, `H_Gender`, `H_CivilStatus`, `H_Cityzenship`, `H_Occupation`, `H_Profile_image`) VALUES
('BS-001', 'Vince ', 'Salazar ', 'Cabreros ', 21, 'I N C', '1997-06-19', 'Barangay Gwapo Cabanatuan City ', 'Male', 'Single', 'Filipino ', 'Student ', '20190219_130902.jpg'),
('BS-002', 'Jerome', 'Lanuzo', 'Valdez', 24, 'Born Again ', '1996-05-20', 'Barangay Gwapo Cabanatuan City ', 'Male', 'Marriage', 'Filipino ', 'Barangay Captain ', '\r\nJerome.jpg\r\n \r\n\r\n'),
('BS-003', 'Joy Cenisse', 'Hernandes ', 'Ramos ', 23, 'Catholic ', '1997-06-21', 'Barangay Gwapo Cabanatuan City ', 'Female', 'Single', 'Filipino ', 'Barangay Secretary ', '\r\nRumi.png\r\n \r\n\r\n'),
('BS-004', 'Mick ', 'Santos ', 'Saclayan ', 26, 'Catholic', '1995-03-13', 'Barangay Gwapo Bacanatuan City ', 'Male', 'Marriage', 'Filipino ', 'Barangay Treasurer ', '\r\nmick.jpg\r\n \r\n\r\n'),
('BS-005', 'Melchor ', 'Tabuhara ', 'Antulin ', 26, 'Catholic', '1995-03-14', 'Barangay Gwapo Bacanatuan City ', 'Male', 'Single', 'Filipino ', 'Barangay Councilor  ', '\r\naNTULIN.jpg\r\n \r\n\r\n'),
('BS-006', 'Vien Michael ', 'Punsalan ', 'Guillermo ', 26, 'Catholic', '1995-03-12', 'Barangay Gwapo Bacanatuan City ', 'Male', 'Widow', 'Filipino ', 'Barangay Councilor  ', '\r\nVien.jpg\r\n \r\n\r\n'),
('BS-007', 'Larry ', 'Samson ', 'Ordonio ', 24, 'I N C', '1996-07-18', 'Barnagay Gwapo Cabanatuan City ', 'Male', 'Single', 'Filipino ', 'Food Panda Delivery Boy ', '\r\n20190219_130717.jpg\r\n \r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `Purok_number` int(3) NOT NULL,
  `Purok_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`Purok_number`, `Purok_name`) VALUES
(1, 'Matang lawin'),
(2, 'Masigasig');

-- --------------------------------------------------------

--
-- Table structure for table `resident_address`
--

CREATE TABLE `resident_address` (
  `r_id` int(3) NOT NULL,
  `House_number` int(3) NOT NULL,
  `Street_name` varchar(50) NOT NULL,
  `Purok_number` int(3) NOT NULL,
  `H_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_address`
--

INSERT INTO `resident_address` (`r_id`, `House_number`, `Street_name`, `Purok_number`, `H_id`) VALUES
(36, 251, 'Malinis ', 1, 'BS-001'),
(37, 215, 'Matiponu ', 2, 'BS-002'),
(38, 213, 'Matipuno ', 2, 'BS-003'),
(39, 216, 'Matipuno ', 2, 'BS-004'),
(40, 218, 'Malinis', 1, 'BS-005'),
(41, 210, 'Malinis', 1, 'BS-006'),
(42, 201, 'Malinis ', 1, 'BS-007');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `V_id` varchar(20) NOT NULL,
  `V_Fname` varchar(50) NOT NULL,
  `V_Mname` varchar(50) NOT NULL,
  `V_Lname` varchar(50) NOT NULL,
  `V_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`V_id`, `V_Fname`, `V_Mname`, `V_Lname`, `V_Type`) VALUES
('VT-001', 'Jerome', 'Lanuzo', 'Valdez', 'SK Voter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_image`
--
ALTER TABLE `all_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `barangay_official`
--
ALTER TABLE `barangay_official`
  ADD PRIMARY KEY (`Official_Id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`Case_blotter_no`);

--
-- Indexes for table `house_hold`
--
ALTER TABLE `house_hold`
  ADD PRIMARY KEY (`H_id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`Purok_number`);

--
-- Indexes for table `resident_address`
--
ALTER TABLE `resident_address`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `H_id` (`H_id`),
  ADD KEY `Purok_number` (`Purok_number`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`V_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_image`
--
ALTER TABLE `all_image`
  MODIFY `image_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `resident_address`
--
ALTER TABLE `resident_address`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resident_address`
--
ALTER TABLE `resident_address`
  ADD CONSTRAINT `resident_address_ibfk_1` FOREIGN KEY (`H_id`) REFERENCES `house_hold` (`H_id`),
  ADD CONSTRAINT `resident_address_ibfk_2` FOREIGN KEY (`Purok_number`) REFERENCES `purok` (`Purok_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
