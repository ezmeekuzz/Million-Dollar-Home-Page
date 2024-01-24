-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 02:23 AM
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
(110, 'Rustom Codilan', 'rustomcodilan@gmail.com', '8575786768', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":450.000018119812,\"y\":150},{\"x\":460.000018119812,\"y\":150},{\"x\":470.000018119812,\"y\":150},{\"x\":480.000018119812,\"y\":150},{\"x\":490.000018119812,\"y\":150},{\"x\":500.000018119812,\"y\":150},{\"x\":509.9999876022339,\"y\":150},{\"x\":450.000018119812,\"y\":160},{\"x\":460.000018119812,\"y\":160},{\"x\":470.000018119812,\"y\":160},{\"x\":480.000018119812,\"y\":160},{\"x\":490.000018119812,\"y\":160},{\"x\":500.000018119812,\"y\":160},{\"x\":509.9999876022339,\"y\":160},{\"x\":450.000018119812,\"y\":170},{\"x\":460.000018119812,\"y\":170},{\"x\":470.000018119812,\"y\":170},{\"x\":480.000018119812,\"y\":170},{\"x\":490.000018119812,\"y\":170},{\"x\":500.000018119812,\"y\":170},{\"x\":509.9999876022339,\"y\":170},{\"x\":450.000018119812,\"y\":180},{\"x\":460.000018119812,\"y\":180},{\"x\":470.000018119812,\"y\":180},{\"x\":480.000018119812,\"y\":180},{\"x\":490.000018119812,\"y\":180},{\"x\":500.000018119812,\"y\":180},{\"x\":509.9999876022339,\"y\":180},{\"x\":450.000018119812,\"y\":190},{\"x\":460.000018119812,\"y\":190},{\"x\":470.000018119812,\"y\":190},{\"x\":480.000018119812,\"y\":190},{\"x\":490.000018119812,\"y\":190},{\"x\":500.000018119812,\"y\":190},{\"x\":509.9999876022339,\"y\":190},{\"x\":450.000018119812,\"y\":200},{\"x\":460.000018119812,\"y\":200},{\"x\":470.000018119812,\"y\":200},{\"x\":480.000018119812,\"y\":200},{\"x\":490.000018119812,\"y\":200},{\"x\":500.000018119812,\"y\":200},{\"x\":509.9999876022339,\"y\":200},{\"x\":450.000018119812,\"y\":210},{\"x\":460.000018119812,\"y\":210},{\"x\":470.000018119812,\"y\":210},{\"x\":480.000018119812,\"y\":210},{\"x\":490.000018119812,\"y\":210},{\"x\":500.000018119812,\"y\":210},{\"x\":509.9999876022339,\"y\":210}]', '{\"x\":450.000018119812,\"y\":150,\"width\":59.999969482421875,\"height\":60}', 'uploads/20231228215258_57.jpg', 49, 4900.00, '2024-01-22', 'Pending'),
(111, 'Rustom Codilan', 'rustomcodilan@gmail.com', '8575786768', 'Cagayan de Oro City', 'Misamis Oriental', 'Philippines', '[{\"x\":929.9999876022339,\"y\":10},{\"x\":939.9999876022339,\"y\":10},{\"x\":949.9999876022339,\"y\":10},{\"x\":959.9999876022339,\"y\":10},{\"x\":969.9999876022339,\"y\":10},{\"x\":979.9999876022339,\"y\":10},{\"x\":989.9999876022339,\"y\":10},{\"x\":929.9999876022339,\"y\":20},{\"x\":939.9999876022339,\"y\":20},{\"x\":949.9999876022339,\"y\":20},{\"x\":959.9999876022339,\"y\":20},{\"x\":969.9999876022339,\"y\":20},{\"x\":979.9999876022339,\"y\":20},{\"x\":989.9999876022339,\"y\":20},{\"x\":929.9999876022339,\"y\":30},{\"x\":939.9999876022339,\"y\":30},{\"x\":949.9999876022339,\"y\":30},{\"x\":959.9999876022339,\"y\":30},{\"x\":969.9999876022339,\"y\":30},{\"x\":979.9999876022339,\"y\":30},{\"x\":989.9999876022339,\"y\":30},{\"x\":929.9999876022339,\"y\":40},{\"x\":939.9999876022339,\"y\":40},{\"x\":949.9999876022339,\"y\":40},{\"x\":959.9999876022339,\"y\":40},{\"x\":969.9999876022339,\"y\":40},{\"x\":979.9999876022339,\"y\":40},{\"x\":989.9999876022339,\"y\":40},{\"x\":929.9999876022339,\"y\":50},{\"x\":939.9999876022339,\"y\":50},{\"x\":949.9999876022339,\"y\":50},{\"x\":959.9999876022339,\"y\":50},{\"x\":969.9999876022339,\"y\":50},{\"x\":979.9999876022339,\"y\":50},{\"x\":989.9999876022339,\"y\":50},{\"x\":929.9999876022339,\"y\":60},{\"x\":939.9999876022339,\"y\":60},{\"x\":949.9999876022339,\"y\":60},{\"x\":959.9999876022339,\"y\":60},{\"x\":969.9999876022339,\"y\":60},{\"x\":979.9999876022339,\"y\":60},{\"x\":989.9999876022339,\"y\":60},{\"x\":929.9999876022339,\"y\":70},{\"x\":939.9999876022339,\"y\":70},{\"x\":949.9999876022339,\"y\":70},{\"x\":959.9999876022339,\"y\":70},{\"x\":969.9999876022339,\"y\":70},{\"x\":979.9999876022339,\"y\":70},{\"x\":989.9999876022339,\"y\":70}]', '{\"x\":929.9999876022339,\"y\":10,\"width\":60,\"height\":60}', 'uploads/20231228215258_58.jpg', 49, 4900.00, '2024-01-22', 'Pending');

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
  MODIFY `image_coordinate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
