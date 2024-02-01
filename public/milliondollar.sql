-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 04:05 AM
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
-- Database: `milliondollar`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_coordinates`
--

CREATE TABLE `image_coordinates` (
  `image_coordinate_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `selectedPixelsCoordinates` longtext DEFAULT NULL,
  `groupCoordinates` longtext DEFAULT NULL,
  `imageLocation` varchar(110) DEFAULT NULL,
  `numberOfPixelBoxes` int(11) DEFAULT NULL,
  `totalamount` double(16,2) DEFAULT NULL,
  `dateUploaded` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_coordinates`
--

INSERT INTO `image_coordinates` (`image_coordinate_id`, `name`, `email`, `phone`, `city`, `state`, `country`, `selectedPixelsCoordinates`, `groupCoordinates`, `imageLocation`, `numberOfPixelBoxes`, `totalamount`, `dateUploaded`, `status`) VALUES
(130, 'Rustom Codilan', 'rustomcodilan@gmail.com', '09975304890', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":600.0000305175781,\"y\":140},{\"x\":610.0000305175781,\"y\":140},{\"x\":600.0000305175781,\"y\":150},{\"x\":610.0000305175781,\"y\":150}]', '{\"x\":600.0000305175781,\"y\":140,\"width\":10,\"height\":10}', 'uploads/Acer_Wallpaper_01_3840x2400.jpg', 4, 400.00, '2024-01-31', 'Approved'),
(131, 'Rustom Codilan', 'rustomcodilan@gmail.com', '09765487965', 'Cagayan de Oro City', '', 'Philippines', '[{\"x\":430.0000305175781,\"y\":220},{\"x\":440.0000305175781,\"y\":220},{\"x\":450.0000305175781,\"y\":220},{\"x\":460.0000305175781,\"y\":220},{\"x\":470.0000305175781,\"y\":220},{\"x\":480.0000305175781,\"y\":220},{\"x\":490.0000305175781,\"y\":220},{\"x\":430.0000305175781,\"y\":230},{\"x\":440.0000305175781,\"y\":230},{\"x\":450.0000305175781,\"y\":230},{\"x\":460.0000305175781,\"y\":230},{\"x\":470.0000305175781,\"y\":230},{\"x\":480.0000305175781,\"y\":230},{\"x\":490.0000305175781,\"y\":230},{\"x\":430.0000305175781,\"y\":240},{\"x\":440.0000305175781,\"y\":240},{\"x\":450.0000305175781,\"y\":240},{\"x\":460.0000305175781,\"y\":240},{\"x\":470.0000305175781,\"y\":240},{\"x\":480.0000305175781,\"y\":240},{\"x\":490.0000305175781,\"y\":240},{\"x\":430.0000305175781,\"y\":250},{\"x\":440.0000305175781,\"y\":250},{\"x\":450.0000305175781,\"y\":250},{\"x\":460.0000305175781,\"y\":250},{\"x\":470.0000305175781,\"y\":250},{\"x\":480.0000305175781,\"y\":250},{\"x\":490.0000305175781,\"y\":250},{\"x\":430.0000305175781,\"y\":260},{\"x\":440.0000305175781,\"y\":260},{\"x\":450.0000305175781,\"y\":260},{\"x\":460.0000305175781,\"y\":260},{\"x\":470.0000305175781,\"y\":260},{\"x\":480.0000305175781,\"y\":260},{\"x\":490.0000305175781,\"y\":260},{\"x\":430.0000305175781,\"y\":270},{\"x\":440.0000305175781,\"y\":270},{\"x\":450.0000305175781,\"y\":270},{\"x\":460.0000305175781,\"y\":270},{\"x\":470.0000305175781,\"y\":270},{\"x\":480.0000305175781,\"y\":270},{\"x\":490.0000305175781,\"y\":270},{\"x\":430.0000305175781,\"y\":280},{\"x\":440.0000305175781,\"y\":280},{\"x\":450.0000305175781,\"y\":280},{\"x\":460.0000305175781,\"y\":280},{\"x\":470.0000305175781,\"y\":280},{\"x\":480.0000305175781,\"y\":280},{\"x\":490.0000305175781,\"y\":280}]', '{\"x\":430.0000305175781,\"y\":220,\"width\":60,\"height\":60}', 'uploads/Acer_Wallpaper_02_3840x2400.jpg', 49, 4900.00, '2024-01-31', 'Approved'),
(132, 'Lloyd Codilan', 'lloydcodilan@gmail.com', '09765487965', 'Cagayan de Oro City', 'Misamis Oriental', '', '[{\"x\":330.0000305175781,\"y\":120},{\"x\":340.0000305175781,\"y\":120},{\"x\":330.0000305175781,\"y\":130},{\"x\":340.0000305175781,\"y\":130}]', '{\"x\":330.0000305175781,\"y\":120,\"width\":10,\"height\":10}', 'uploads/Acer_Wallpaper_03_3840x2400.jpg', 4, 400.00, '2024-02-01', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `encryptedpass` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `emailaddress`, `username`, `password`, `encryptedpass`, `usertype`) VALUES
(6, 'Rustom', 'Codilan', 'rustomcodilan@gmail.com', 'r.codilan', '12345', '$2y$10$sE7LGsBgK4iJwLAKOSyWpe8BFGen81MKnZ.5KfuxO/Vm7SDr5lIRq', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_coordinates`
--
ALTER TABLE `image_coordinates`
  ADD PRIMARY KEY (`image_coordinate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_coordinates`
--
ALTER TABLE `image_coordinates`
  MODIFY `image_coordinate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
