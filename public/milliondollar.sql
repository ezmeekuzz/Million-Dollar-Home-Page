-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:23 AM
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
(119, 'Rustom Codilan', 'rustomcodilan@gmail.com', '8575786768', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":460.0000305175781,\"y\":150},{\"x\":470.0000305175781,\"y\":150},{\"x\":460.0000305175781,\"y\":160},{\"x\":470.0000305175781,\"y\":160}]', '{\"x\":460.0000305175781,\"y\":150,\"width\":10,\"height\":10}', 'uploads/Acer_Wallpaper_02_3840x2400.jpg', 4, 400.00, '2024-01-24', 'Rejected'),
(121, 'Rustom Codilan', 'rustomcodilan@gmail.com', '8575786768', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":380.0000305175781,\"y\":210},{\"x\":390.0000305175781,\"y\":210},{\"x\":400.0000305175781,\"y\":210},{\"x\":410.0000305175781,\"y\":210},{\"x\":380.0000305175781,\"y\":220},{\"x\":390.0000305175781,\"y\":220},{\"x\":400.0000305175781,\"y\":220},{\"x\":410.0000305175781,\"y\":220},{\"x\":380.0000305175781,\"y\":230},{\"x\":390.0000305175781,\"y\":230},{\"x\":400.0000305175781,\"y\":230},{\"x\":410.0000305175781,\"y\":230},{\"x\":380.0000305175781,\"y\":240},{\"x\":390.0000305175781,\"y\":240},{\"x\":400.0000305175781,\"y\":240},{\"x\":410.0000305175781,\"y\":240}]', '{\"x\":380.0000305175781,\"y\":210,\"width\":30,\"height\":30}', 'uploads/Acer_Wallpaper_03_3840x2400_2.jpg', 16, 1600.00, '2024-01-24', 'Approved'),
(122, 'Rustom Codilan', 'rustomcodilan@gmail.com', '09975304890', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":659.9999866485596,\"y\":80},{\"x\":669.9999866485596,\"y\":80},{\"x\":679.9999866485596,\"y\":80},{\"x\":689.9999866485596,\"y\":80},{\"x\":699.9999866485596,\"y\":80},{\"x\":709.9999866485596,\"y\":80},{\"x\":719.9999866485596,\"y\":80},{\"x\":659.9999866485596,\"y\":90},{\"x\":669.9999866485596,\"y\":90},{\"x\":679.9999866485596,\"y\":90},{\"x\":689.9999866485596,\"y\":90},{\"x\":699.9999866485596,\"y\":90},{\"x\":709.9999866485596,\"y\":90},{\"x\":719.9999866485596,\"y\":90},{\"x\":659.9999866485596,\"y\":100},{\"x\":669.9999866485596,\"y\":100},{\"x\":679.9999866485596,\"y\":100},{\"x\":689.9999866485596,\"y\":100},{\"x\":699.9999866485596,\"y\":100},{\"x\":709.9999866485596,\"y\":100},{\"x\":719.9999866485596,\"y\":100},{\"x\":659.9999866485596,\"y\":110},{\"x\":669.9999866485596,\"y\":110},{\"x\":679.9999866485596,\"y\":110},{\"x\":689.9999866485596,\"y\":110},{\"x\":699.9999866485596,\"y\":110},{\"x\":709.9999866485596,\"y\":110},{\"x\":719.9999866485596,\"y\":110},{\"x\":659.9999866485596,\"y\":120},{\"x\":669.9999866485596,\"y\":120},{\"x\":679.9999866485596,\"y\":120},{\"x\":689.9999866485596,\"y\":120},{\"x\":699.9999866485596,\"y\":120},{\"x\":709.9999866485596,\"y\":120},{\"x\":719.9999866485596,\"y\":120},{\"x\":659.9999866485596,\"y\":130},{\"x\":669.9999866485596,\"y\":130},{\"x\":679.9999866485596,\"y\":130},{\"x\":689.9999866485596,\"y\":130},{\"x\":699.9999866485596,\"y\":130},{\"x\":709.9999866485596,\"y\":130},{\"x\":719.9999866485596,\"y\":130},{\"x\":659.9999866485596,\"y\":140},{\"x\":669.9999866485596,\"y\":140},{\"x\":679.9999866485596,\"y\":140},{\"x\":689.9999866485596,\"y\":140},{\"x\":699.9999866485596,\"y\":140},{\"x\":709.9999866485596,\"y\":140},{\"x\":719.9999866485596,\"y\":140}]', '{\"x\":659.9999866485596,\"y\":80,\"width\":60,\"height\":60}', 'uploads/Acer_Wallpaper_02_3840x2400_1.jpg', 49, 4900.00, '2024-01-24', 'Approved'),
(123, 'Rustom Codilan', 'rustomcodilan@gmail.com', '09765487965', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":520,\"y\":290},{\"x\":530,\"y\":290},{\"x\":520,\"y\":300},{\"x\":530,\"y\":300}]', '{\"x\":520,\"y\":290,\"width\":10,\"height\":10}', 'uploads/20231228215258_1.jpg', 4, 1600.00, '2024-01-24', 'Approved'),
(125, 'Rustom Codilan', 'rustomcodilan@gmail.com', '09762536291', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":580.0000305175781,\"y\":230}]', '{\"x\":580.0000305175781,\"y\":230,\"width\":0,\"height\":0}', 'uploads/Acer_Wallpaper_01_3840x2400.jpg', 1, 100.00, '2024-01-24', 'Approved');

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
  MODIFY `image_coordinate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
