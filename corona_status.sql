-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corona_status`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_cases`
--

CREATE TABLE `country_cases` (
  `id` int(11) NOT NULL,
  `country_code` text NOT NULL,
  `country` varchar(30) NOT NULL,
  `confirmed` varchar(30) NOT NULL,
  `male` varchar(30) NOT NULL,
  `female` varchar(30) NOT NULL,
  `active` varchar(30) NOT NULL,
  `recovered` varchar(30) NOT NULL,
  `death` varchar(30) NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_cases`
--

INSERT INTO `country_cases` (`id`, `country_code`, `country`, `confirmed`, `male`, `female`, `active`, `recovered`, `death`, `updated_at`) VALUES
(1, 'IN', 'India', '2571875', '1336902', '1234973', '1115283', '1402275', '54314', '2021-06-01'),
(2, 'USA', 'America', '1000', '500', '500', '500', '250', '250', '2021-06-01'),
(3, 'AU', 'Australia', '0', '0', '0', '0', '0', '0', '2021-06-01'),
(4, 'CN', 'China', '0', '0', '0', '0', '0', '0', '2021-06-01'),
(5, 'FR', 'France', '0', '0', '0', '0', '0', '0', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `district_cases`
--

CREATE TABLE `district_cases` (
  `id` int(11) NOT NULL,
  `state_code` text NOT NULL,
  `districts` varchar(30) NOT NULL,
  `confirmed` varchar(30) NOT NULL,
  `male` varchar(20) NOT NULL,
  `female` varchar(30) NOT NULL,
  `active` varchar(30) NOT NULL,
  `recovered` varchar(30) NOT NULL,
  `death` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district_cases`
--

INSERT INTO `district_cases` (`id`, `state_code`, `districts`, `confirmed`, `male`, `female`, `active`, `recovered`, `death`, `date`) VALUES
(1, 'TN', 'Ariyalur', '65000', '20500', '44500', '20000', '40000', '5000', '2021-04-13'),
(2, 'TN', 'Karur', '50000', '12000', '38000', '8950', '38463', '2587', '2021-04-13'),
(4, 'TN', 'Nagappatinam', '400500', '200000', '200500', '100000', '296000', '4500', '2021-04-13'),
(5, 'TN', 'Perambalur', '60000', '20000', '40000', '16000', '40000', '4000', '2021-04-13'),
(8, 'TN', 'Pudukkottai', '95000', '54000', '41000', '15870', '74105', '5025', '2021-04-13'),
(11, 'TN', 'Thanjavur', '1000000', '465050', '534950', '500100', '489900', '10000', '2021-04-13'),
(14, 'TN', 'Thiruchirappali', '450000', '200000', '250000', '80000', '363450', '6550', '2021-04-13'),
(17, 'TN', 'Tiruvarur', '6', '2', '4', '3', '3', '2', '2021-04-16'),
(19, 'TN', 'Dharmapuri', '10', '5', '5', '0', '10', '0', '2021-04-16'),
(21, 'TN', 'Coimbatore', '6', '2', '4', '2', '2', '2', '2021-04-16'),
(22, 'TN', 'Erode', '4', '2', '2', '0', '0', '4', '2021-04-16'),
(23, 'TN', 'Krishnagiri', '8', '2', '6', '0', '0', '8', '2021-04-16'),
(24, 'TN', 'Namakkal', '5', '3', '2', '5', '0', '0', '2021-04-16'),
(43, 'TN', 'Nilgiris', '4', '2', '2', '1', '3', '0', '2021-05-31'),
(44, 'TN', 'Salem', '20', '10', '10', '0', '10', '10', '2021-05-31'),
(50, 'TN', 'Tiruppur', '10', '0', '10', '0', '10', '0', '2021-05-31'),
(52, 'TN', 'Dindigul', '100', '50', '50', '50', '40', '10', '2021-05-31'),
(74, 'TN', 'Thirupattur', '101', '50', '51', '10', '80', '11', '2021-05-31'),
(75, 'TN', 'Kanyakumari', '100', '50', '50', '0', '70', '30', '2021-05-31'),
(76, 'TN', 'Madurai', '10', '5', '5', '0', '5', '0', '2021-05-31'),
(77, 'TN', 'Ramanathapuram', '100', '30', '70', '60', '25', '15', '2021-05-31'),
(78, 'TN', 'Sivagangai', '26586', '12428', '14158', '19899', '5000', '1687', '2021-05-31'),
(79, 'TN', 'Theni', '6789', '3564', '3225', '4783', '1864', '142', '2021-05-31'),
(80, 'TN', 'Thoothukudi', '82932', '69544', '13388', '69624', '10457', '2851', '2021-05-31'),
(81, 'TN', 'Tirunelveli', '1200', '600', '600', '800', '200', '200', '2021-05-31'),
(82, 'TN', 'Virudhunagar', '50', '25', '25', '0', '25', '25', '2021-05-31'),
(83, 'TN', 'Tenkasi', '600', '200', '400', '350', '150', '100', '2021-05-31'),
(84, 'TN', 'Chennai', '82938', '69546', '13392', '69624', '10457', '2857', '2021-05-31'),
(85, 'TN', 'Cuddalore', '82932', '69544', '13388', '69624', '10457', '2851', '2021-05-31'),
(86, 'TN', 'Kanchipuram', '82932', '69544', '13388', '69624', '10457', '2851', '2021-05-31'),
(87, 'TN', 'Chengalpattu', '82932', '69544', '13388', '69624', '10457', '2851', '2021-05-31'),
(88, 'TN', 'Tiruvallur', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(89, 'TN', 'Tiruvannamalai', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(90, 'TN', 'Vellore', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(91, 'TN', 'Viluppuram', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(92, 'TN', 'Kallakurichi', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(93, 'TN', 'Ranipet', '100', '50', '50', '20', '70', '10', '2021-05-31'),
(97, 'KL', 'Kollam', '100', '80', '20', '50', '25', '25', '2021-06-01'),
(98, 'KL', 'Alappuzha', '100', '20', '80', '60', '30', '10', '2021-06-01'),
(99, 'KA', 'Gadag', '200', '200', '0', '50', '100', '50', '2021-06-01'),
(100, 'FL', 'Dade', '1000', '500', '500', '500', '250', '250', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `state_cases`
--

CREATE TABLE `state_cases` (
  `id` int(11) NOT NULL,
  `country_code` text NOT NULL,
  `state_code` text NOT NULL,
  `states` varchar(30) NOT NULL,
  `confirmed` varchar(30) NOT NULL,
  `male` varchar(30) NOT NULL,
  `female` varchar(30) NOT NULL,
  `active` varchar(30) NOT NULL,
  `recovered` varchar(30) NOT NULL,
  `death` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_cases`
--

INSERT INTO `state_cases` (`id`, `country_code`, `state_code`, `states`, `confirmed`, `male`, `female`, `active`, `recovered`, `death`) VALUES
(1, 'IN', 'TN', 'Tamil Nadu', '2571475', '1336602', '1234873', '1115123', '1402120', '54229'),
(2, 'IN', 'KL', 'Kerala', '200', '100', '100', '110', '55', '35'),
(3, 'IN', 'KA', 'Karnataka', '200', '200', '0', '50', '100', '50'),
(4, 'IN', 'DL', 'Delhi', '0', '0', '0', '0', '0', '0'),
(5, 'USA', 'FL', 'Florida', '1000', '500', '500', '500', '250', '250');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `user_id` int(255) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `fullname`, `email`, `phoneno`, `password`, `status`) VALUES
(1, 'Ganapathy', 'gana@gmail.com', 6385470031, 'MTIz', 1),
(2, 'vengadesh', 'venky@gmail.com', 8098108869, 'MTIz;', 1),
(3, 'sharmila', 'sharm@gmail.com', 1234567890, 'MTIz;', 1),
(4, 'Kamesh Babu', 'kamesh@gmail.com', 8912346789, 'MTIz;', 1),
(5, 'Bagadeesh kumar', 'bagi@gmail.com', 9867453289, 'MTIz;', 1),
(6, 'radha', 'ra@gmail.com', 12478901111, 'MTIz;', 1),
(7, 'kanaga', 'ka@gmail.com', 1234567890, 'MTIz;', 1),
(8, 'selwin', 'selwin@gmail.com', 6789013344, 'MTIz;', 1),
(9, 'Shriraam', 'shri@gmail.com', 8907564389, 'MTIz;', 1),
(11, 'vijay', 'vijay@gmail.com', 9826541213, 'MTIz;', 1),
(14, 'pugazh', 'pugazh@gmail.com', 6385470031, 'MTIz;', 1),
(15, 'nani', 'nani@gmail.com', 8738294932, 'MTIz;', 0),
(16, 'ben', 'ben@gmail.com', 6783239326, 'MTIz;', 2),
(20, 'vinayagam', 'vina@gmail.com', 8738374382, 'MTIz;', 2),
(23, 'ajmal', 'ajmal@gmail.com', 2398327983, 'MTIz;', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_cases`
--
ALTER TABLE `country_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_cases`
--
ALTER TABLE `district_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_cases`
--
ALTER TABLE `state_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_cases`
--
ALTER TABLE `country_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `district_cases`
--
ALTER TABLE `district_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `state_cases`
--
ALTER TABLE `state_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
