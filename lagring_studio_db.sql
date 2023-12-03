-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 08:21 AM
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
  `apt_occasion_type` varchar(200) NOT NULL,
  `apt_date` date NOT NULL,
  `apt_time` time NOT NULL,
  `apt_status` varchar(200) NOT NULL DEFAULT 'PENDING',
  `apt_remark` varchar(500) NOT NULL DEFAULT 'Please wait for approval.',
  `apt_status_date` datetime DEFAULT NULL,
  `apt_date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apt_id`, `user_id`, `service_id`, `apt_occasion_type`, `apt_date`, `apt_time`, `apt_status`, `apt_remark`, `apt_status_date`, `apt_date_added`) VALUES
(1, 15, 2023001, 'debut', '2023-12-04', '00:00:00', 'PENDING', 'Please wait for approval.', NULL, '2023-12-06 17:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_description` varchar(500) NOT NULL,
  `service_price` int(11) DEFAULT NULL,
  `service_date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `archived_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `service_price`, `service_date_added`, `archived_flag`) VALUES
(2023001, 'Portraits\r\n(Whole/Half Body)', '4r(2pcs)', 120, '2023-11-29 18:58:11', 1),
(2023002, 'Graduation Picture', '8r(1pc) 3r(1pc) 2r(4pcs)', 300, '2023-11-29 19:01:31', 1),
(2023003, 'Family Package A', '8r(1pc) 3r(1pc) 2r(4pcs)', 300, '2023-11-29 19:04:00', 1),
(2023004, 'Family Package B', '8r(2pcs) 3r(3pcs) 2r(4pcs)', 350, '2023-11-29 19:05:42', 1),
(2023005, 'Digital Package', 'Unlimited Shots,\r\n8x12(40pcs) w/ layout & album,\r\nVideo Coverage 2pcs flash-drives,\r\nFree 1pc 16x20 Blow up pic w/ frame plus 1 free signature frame ', NULL, '2023-11-29 19:07:48', 1),
(2023006, 'Special Package', 'Unlimited Shots,\r\n5r(100pcs) w/ layout & Album,\r\nVideo Coverage 2pcs flash-drives,\r\nFREE 11x14 blow up pic w/ frame and signature frame(1pc)', NULL, '2023-11-29 19:21:10', 1),
(2023007, 'Regular Package', 'Unlimited Shots,\r\n5r(80pcs) & album,\r\nVideo coverage 1 flash-drive', NULL, '2023-11-29 19:28:11', 1),
(2023008, 'Budget Package', 'Unlimited Shots,\r\n5r(100pcs)', NULL, '2023-11-29 19:30:35', 1),
(2023009, 'Hire a Photographer', 'Photo only', NULL, '2023-11-29 19:34:15', 1),
(2023010, 'Hire a Video Grapher', 'Video Only', NULL, '2023-11-29 19:35:26', 1);

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
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023012;

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
