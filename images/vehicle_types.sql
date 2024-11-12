-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u255014993_atscab`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicletype` varchar(255) DEFAULT NULL,
  `displayname` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `isenable` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicletype`, `displayname`, `icon`, `isenable`, `seats`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hatchback', 'Hatchback', NULL, 1, 4, '2021-11-20 07:03:46', '2023-02-25 21:15:04', '2023-02-25 21:15:04'),
(2, 'SEDAN', 'SEDAN', NULL, 1, 4, '2021-11-20 07:03:47', '2023-02-25 21:16:05', NULL),
(3, 'MINI CAR', 'HATCHBACK', NULL, 1, 4, '2021-11-20 07:03:47', '2023-02-26 15:17:37', NULL),
(4, 'SUV', 'SUV', NULL, 1, 7, '2021-11-20 07:03:47', '2023-02-25 21:15:23', NULL),
(5, 'INNOVA ,ERTIGA,LODGI,TAVERA', 'SUV', NULL, 1, 7, '2021-11-20 07:03:48', '2023-02-25 21:14:57', '2023-02-25 21:14:57'),
(6, 'Bus', 'TRAVELLER', NULL, 1, 20, '2021-11-20 07:03:48', '2023-02-25 21:14:52', '2023-02-25 21:14:52'),
(7, 'Truck', 'Truck', NULL, 1, 3, '2021-11-20 07:03:48', '2023-02-25 20:34:12', '2023-02-25 20:34:12'),
(8, 'BUS', 'TRAVELLER', NULL, 1, 20, '2023-02-25 21:16:31', '2023-02-25 21:16:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
