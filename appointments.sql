-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 07:24 AM
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
-- Database: `appointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `doctor`, `date`) VALUES
(1, 'ujhgh', 'jugfvhtfcg@gmail.com', '88776577766', 'Dr. Smith', '2024-12-23'),
(2, 'P R Harshita', 'prharshita47@gmail.com', '9110208594', 'Dr. Smith', '2024-12-26'),
(3, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(4, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(5, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(6, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(7, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(8, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(9, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(10, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(11, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24'),
(12, 'harshitha PR', 'harshith23@gmail.com', '8987766563', 'Dr. Smith', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `sector_name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `phone`, `sector_name`, `link`) VALUES
(1, 'vasan Eye Care hospital', 'davanagere', '8908973653', 'private', 'https://www.google.com/search?client=firefox-b-d&q=hospital+link');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
