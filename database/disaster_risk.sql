-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 12:03 PM
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
(3, 'Capre', 'Tsunami', '', 'Capricos, East coast', '2024-03-02 01:14:29', '', ''),
(11, 'Germasha', 'Earthquake', '', 'Germany, East Block', '2024-03-02 02:24:24', '', ''),
(12, 'Degret', 'Earthquake', '', 'Denver, North Cambria', '2024-03-02 02:24:35', '', ''),
(13, 'Furtuge', 'Tsunami', '', 'Fortugi, West boute', '2024-03-02 02:44:33', '', ''),
(14, 'Juasmine', 'Earthquake', '', 'Puerto Ricaa, East side', '2024-03-02 02:56:23', '', ''),
(15, 'Paula', 'Earthquake', '', 'America, South umper', '2024-03-02 02:56:49', '', ''),
(16, 'Carries', 'Earthquake', '', 'Anlantic, South Part', '2024-03-02 02:57:11', '', ''),
(18, 'Signeg', 'Eruption', '', 'Sidnet, West Coast', '2024-03-02 02:58:16', '', ''),
(19, 'Monette', 'Eruption', '', 'Morico, East Recoside', '2024-03-02 02:58:35', '', ''),
(20, 'Homanic', 'Eruption', '', 'Dominico, East Country', '2024-03-02 02:59:02', '', ''),
(22, 'Tsukishima', 'Tsunami', '', 'Japan, Tokyo', '2024-03-02 03:00:06', '', ''),
(23, 'Kyochin', 'Tsunami', '', 'Kyoto, Japan', '2024-03-02 03:00:22', '', ''),
(24, 'Atlass', 'Tsunami', '', 'Antartic, North Side', '2024-03-02 03:00:48', '', ''),
(27, 'Binalig', 'Eruption', '', 'France, East Coast', '2024-03-02 10:57:18', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `message`, `date`) VALUES
(1, 'The Admin added a new Information of a recent Disaster Event!', '2024-03-02 09:11:46'),
(2, 'The Admin deleted an Information of a Disaster Event!', '2024-03-02 09:14:02'),
(3, 'The Admin deleted an Information of an Earthquake Disaster Event!', '2024-03-02 09:16:25'),
(4, 'The Admin Edited an Information of an Earthquake Disaster Event!', '2024-03-02 09:16:49'),
(5, 'The Admin deleted an Information of an Tsunami Disaster Event!', '2024-03-02 09:18:59'),
(6, 'The Admin Edited an Information of an Tsunami Disaster Event!', '2024-03-02 09:19:09'),
(7, 'The Admin deleted an Information of an Volcano Eruption Disaster Event!', '2024-03-02 09:22:05'),
(8, 'The Admin Edited an Information of an Volcano Eruption Disaster Event!', '2024-03-02 09:22:11'),
(9, 'The Admin deleted an Information of a Disaster Event!', '2024-03-02 09:23:53'),
(10, 'The Admin Edited an Information of a Tsunami Disaster Event!', '2024-03-02 09:24:08'),
(11, 'The Admin Edited an Information of a Tsunami Disaster Event!', '2024-03-02 09:24:21'),
(12, 'The Admin Edited an Information of a Tsunami Disaster Event!', '2024-03-02 09:24:30'),
(13, 'The Admin Edited an Information of an Volcano Eruption Disaster Event!', '2024-03-02 09:24:37'),
(14, 'The Admin Edited an Information of an Volcano Eruption Disaster Event!', '2024-03-02 09:24:45'),
(15, 'The Admin deleted an Information of a Disaster Event!', '2024-03-02 10:56:41'),
(16, 'The Admin added a new Information of a recent Disaster Event!', '2024-03-02 10:57:18'),
(17, 'The Admin Edited an Information of an Earthquake Disaster Event!', '2024-03-02 10:57:44'),
(18, 'The Admin Edited an Information of a Tsunami Disaster Event!', '2024-03-02 10:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `img`, `fullname`, `username`, `password`, `age`, `gmail`, `location`, `number`) VALUES
(7, '../profile_pictures/jena3.jpg', 'Jenna Maika Papa Odon', 'jenna', 'jenna', 20, 'Please Input information here!', 'Hilongos Southern Leyte', '09123837402');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disaster`
--
ALTER TABLE `disaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
