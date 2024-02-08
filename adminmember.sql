-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicshow`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmember`
--

CREATE TABLE `adminmember` (
  `id` int(11) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_level` varchar(50) NOT NULL,
  `subscription_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminmember`
--

INSERT INTO `adminmember` (`id`, `member_id`, `member_name`, `member_level`, `subscription_date`) VALUES
(1, 'M01', 'Johnson', 'Premium', '2024-03-23'),
(2, 'M02', 'Khoo Shu Jun', 'Standard', '2024-02-24'),
(3, 'M03', 'John Doe', 'Base', '2023-11-30'),
(4, 'M04', 'Teo Yao Yao', 'Standard', '2024-01-01'),
(5, 'M05', 'Tee Xue Ni', 'Base', '2024-01-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmember`
--
ALTER TABLE `adminmember`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmember`
--
ALTER TABLE `adminmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
