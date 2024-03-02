-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 04:12 AM
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
-- Database: `disaster_risk`
--

-- --------------------------------------------------------

--
-- Table structure for table `disaster`
--

CREATE TABLE `disaster` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `earthquake_magnitude` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tsunami_height` varchar(255) NOT NULL,
  `volcano_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disaster`
--

INSERT INTO `disaster` (`id`, `name`, `type`, `earthquake_magnitude`, `location`, `date`, `tsunami_height`, `volcano_status`) VALUES
(2, 'Binotoy', 'Eruption', '', 'Apolo, South Yumpee', '2024-03-02 01:12:36', '', ''),
(3, 'Capre', 'Tsunami', '', 'Capricos, East coast', '2024-03-02 01:14:29', '', ''),
(8, 'Humpy', 'Eruption', '', 'Humberger, East Town', '2024-03-02 01:23:50', '', ''),
(11, 'Germasha', 'Earthquake', '', 'Germany, East Block', '2024-03-02 02:24:24', '', ''),
(12, 'Degret', 'Earthquake', '', 'Denver, North Cambria', '2024-03-02 02:24:35', '', ''),
(13, 'Furtuge', 'Tsunami', '', 'Fortugi, West boute', '2024-03-02 02:44:33', '', ''),
(14, 'Juasmine', 'Earthquake', '', 'Puerto Ricaa, East side', '2024-03-02 02:56:23', '', ''),
(15, 'Paula', 'Earthquake', '', 'America, South umper', '2024-03-02 02:56:49', '', ''),
(16, 'Carries', 'Earthquake', '', 'Anlantic, South Part', '2024-03-02 02:57:11', '', ''),
(17, 'khumra', 'Earthquake', '', 'Kuala, Lumpur', '2024-03-02 02:57:46', '', ''),
(18, 'Signeg', 'Eruption', '', 'Sidnet, West Coast', '2024-03-02 02:58:16', '', ''),
(19, 'Monett', 'Eruption', '', 'Morico, East Recoside', '2024-03-02 02:58:35', '', ''),
(20, 'Homanico', 'Eruption', '', 'Dominico, East Country', '2024-03-02 02:59:02', '', ''),
(21, 'Yummiot', 'Eruption', '', 'Canada, Post west', '2024-03-02 02:59:26', '', ''),
(22, 'Tkusima', 'Tsunami', '', 'Japan, Tokyo', '2024-03-02 03:00:06', '', ''),
(23, 'Kyochi', 'Tsunami', '', 'Kyoto, Japan', '2024-03-02 03:00:22', '', ''),
(24, 'Atlas', 'Tsunami', '', 'Antartic, North Side', '2024-03-02 03:00:48', '', ''),
(25, 'Boogy', 'Tsunami', '', 'South, New York', '2024-03-02 03:01:12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `fullname`, `username`, `password`) VALUES
(5, 'Ejie Cabales Florida', 'ejie', 'ejie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disaster`
--
ALTER TABLE `disaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disaster`
--
ALTER TABLE `disaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
