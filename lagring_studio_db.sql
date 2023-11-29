-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 12:47 PM
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
-- Database: `lagring_studio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `apt_date` datetime NOT NULL,
  `apt_status` varchar(200) NOT NULL DEFAULT 'PENDING',
  `apt_remark` varchar(500) NOT NULL DEFAULT 'Please wait for approval.',
  `apt_status_date` datetime DEFAULT NULL,
  `apt_date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_category` varchar(100) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_description` varchar(500) NOT NULL,
  `service_price` int(11) NOT NULL,
  `service_date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `archived_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_category`, `service_name`, `service_description`, `service_price`, `service_date_added`, `archived_flag`) VALUES
(1, 'Studio ID', '1x1 Picture', '6pcs 1x1 pic w/ free formal attire edit', 60, '2023-11-29 02:11:28', 1),
(2, 'Studio ID', '2x2 Picture', '4pcs 2x2 pic w/ free formal attire edit', 70, '2023-11-29 02:13:42', 1),
(3, 'Studio ID', '1.5x1.5 Pictures', '6pcs 1.5x1.5 pic w/ free formal attire edit', 70, '2023-11-29 02:15:18', 1),
(4, 'Studio ID', 'Passport Size Pic', '6pcs Passport Size Pic 45mmx35mm pic w/ free formal attire edit', 80, '2023-11-29 02:17:26', 1),
(5, 'Studio ID', 'Combo Package', '2x2(3pcs) 1x1(3pcs) w/ free formal attire edit', 90, '2023-11-29 02:20:37', 1),
(6, 'Portraits', 'Whole Body / Half Body ', '2pcs 4r size W/ free formal attire edit', 120, '2023-11-29 02:53:44', 1),
(7, 'Portraits', 'Graduation Picture ', '1pc(8r) 1pc(3r) 4pcs(2r)', 300, '2023-11-29 02:57:40', 1),
(8, 'Portraits', 'Family Package A ', '1pc(8r) 1pc(3r) 4pcs(2r)     ', 300, '2023-11-29 03:01:55', 1),
(9, 'Portraits', 'Family Package B ', '2pcs(8r) 3pcs(3r) 4pcs(2r) / If customer wants to frame, additional 250php', 350, '2023-11-29 03:02:12', 1),
(10, 'Print Rates', 'Colored Print ', 'Print Per Page', 10, '2023-11-29 03:05:54', 1),
(11, 'Print Rates', 'Black & White ', 'Print Per Page', 5, '2023-11-29 03:08:05', 1),
(12, 'Print Rates', 'Full color Print ', 'Print Per Page', 20, '2023-11-29 03:09:48', 1),
(13, 'Print Rates', 'Xerox B/W ', 'Print Per Page', 3, '2023-11-22 03:11:17', 1),
(14, 'Print Rates\r\n', 'Xerox Colored ', 'Xerox Per Page', 10, '2023-11-29 03:13:58', 1),
(15, 'Photo Develop', '8r', 'No Minimum', 60, '2023-11-29 03:15:48', 1),
(16, 'Photo Develop', '5r', '2pcs Minimum', 20, '2023-11-29 03:21:46', 1),
(17, 'Photo Develop', '4r ', '3pcs Minimum / 8php each pic', 8, '2023-11-22 03:21:54', 1),
(18, 'Photo Develop', '3r', '4pcs Minimum / 6php each pic', 6, '2023-11-29 03:23:49', 1),
(19, 'Photo Develop', '2r', '9pcs Minimum / 3php each pic', 3, '2023-11-29 03:26:53', 1),
(20, 'Photo Develop', '1x1', '36pcs', 30, '2023-11-29 03:27:58', 1),
(21, 'Photo Develop', '2x2', '6pcs', 30, '2023-11-29 03:28:23', 1),
(22, 'Photo Develop', '8r', 'Chemical Print ', 150, '2023-11-29 03:29:10', 1),
(23, 'Photo Develop', '11x14', 'Chemical Print', 300, '2023-11-29 03:30:51', 1),
(24, 'Photo Develop', '12x18', 'Chemical Print ', 500, '2023-11-29 03:31:41', 1),
(25, 'Photo Develop', '16x20', 'Chemical Print', 900, '2023-11-29 03:32:51', 1),
(26, 'Photo Develop', '20x30', 'Chemical Print ', 1500, '2023-11-29 03:35:21', 0),
(27, 'Photo Develop', '24x36', 'Chemical Print ', 2000, '2023-11-29 03:35:37', 1),
(28, 'Tarpaulin', '2x3\r\n', 'if customer does not have a layout, additional 200php for the layout fee. ', 350, '2023-11-29 03:37:46', 1),
(29, 'Tarpaulin', '3x4', 'if customer does not have a layout, additional 200php for the layout fee.', 500, '2023-11-29 03:40:15', 1),
(30, 'Tarpaulin\r\n', '4x6', 'if customer does not have a layout, additional 200php for the layout fee.', 700, '2023-11-29 03:43:15', 1),
(31, 'Tarpaulin\r\n', '5x6', 'if customer does not have a layout, additional 200php for the layout fee.', 900, '2023-11-29 03:45:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `surname`, `registration_date`, `email`, `password`, `role`) VALUES
(2, 'Admin', 'Mname', 'Surname', '2023-10-22 16:45:44', 'admin.admin@cvsu.edu.ph', '$2y$10$OMyazDWKGNERSJW6KIfPIuZG1/ajR/tnen0g5q/zMoOm4cteM4EjK', 'ADMIN'),
(15, 'fname', 'mname', 'sname', '2023-11-28 23:48:10', 'user.user@cvsu.edu.ph', '$2y$10$AycJciKiIN1xK6pxtFpXpeT8iQAMIysmH6W7MZ1aWWUwEZ0QyZttK', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apt_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
