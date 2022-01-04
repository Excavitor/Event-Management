-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 07:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `cid` int(11) NOT NULL,
  `organization_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_phone` bigint(20) NOT NULL,
  `street` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_link` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`cid`, `organization_name`, `organization_email`, `organization_phone`, `street`, `city`, `zip`, `social_media_link`, `date_from`, `date_to`, `user_id`, `event_name`, `event_type`) VALUES
(19, 'Polok', 'polok@gmail.com', 123456, 'Tangail', 'Badda', '145', '', '2022-01-23', '2022-01-24', 11, 'Public', 'Concert'),
(20, 'Go', 'go@gmail.com', 123456, 'Dhaka', 'Badda', '145', 'https://www.w3school', '2022-01-25', '2022-01-26', 11, 'Public', 'Concert'),
(24, 'Polok', 'polok@gmail.com', 123456, 'Tangail', 'Badda', '145', '', '2022-01-10', '2022-01-11', 2, 'Public', 'Concert');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pid` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pid`, `name`, `phone_number`, `user_id`, `cid`) VALUES
(39, 'A', 1, 11, 19),
(40, 'B', 2, 11, 19),
(41, 'A', 1, 11, 20),
(42, 'B', 2, 11, 20),
(43, 'C', 3, 11, 20),
(48, 'polok', 1, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sid` int(11) NOT NULL,
  `catering` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photography_and_cinemetography` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decoration` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sid`, `catering`, `photography_and_cinemetography`, `facility`, `decoration`, `user_id`, `cid`) VALUES
(14, 'Drinks', 'Photographer', 'Wifi', 'Seating Arrangement', 11, 19),
(15, 'Drinks', 'Photographer', 'Wifi', 'Seating Arrangement', 11, 20),
(18, 'Drinks', 'Photographer', 'Wifi', 'Seating Arrangement', 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`) VALUES
(2, 'shad', '123', 'shad@gmail.com'),
(3, 'Towalha', '111', 'towalha@gmail.com'),
(8, 'Rafi', '141', 'rafi@gmail.com'),
(11, 'Test', '999', 'test@gmail.com'),
(14, 'sojib', 'sojib', 'sojib@gmail.com'),
(15, 'muhit', 'muhit', 'muhit@gmail.com'),
(16, 'Go', 'go', 'go@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
