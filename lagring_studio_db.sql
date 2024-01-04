-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2024 at 05:27 PM
-- Server version: 8.1.0
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `apt_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  `apt_occasion_type` varchar(200) NOT NULL,
  `apt_datetime` datetime NOT NULL,
  `apt_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apt_status` varchar(200) NOT NULL DEFAULT 'PENDING',
  `apt_remark` varchar(500) NOT NULL DEFAULT 'Please wait for approval.',
  `apt_status_date` datetime DEFAULT NULL,
  `apt_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`apt_id`),
  KEY `service_id` (`service_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apt_id`, `user_id`, `service_id`, `apt_occasion_type`, `apt_datetime`, `apt_location`, `apt_status`, `apt_remark`, `apt_status_date`, `apt_date_added`) VALUES
(13, 15, 2023001, '', '1970-01-01 00:00:00', '', 'PENDING', 'Please wait for approval.', NULL, '2024-01-04 01:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(250) NOT NULL,
  `service_description` varchar(500) NOT NULL,
  `service_type` varchar(200) NOT NULL,
  `service_price` int DEFAULT NULL,
  `service_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_flag` int NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2023012 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `service_type`, `service_price`, `service_date_added`, `archived_flag`) VALUES
(2023001, 'Portraits\r\n(Whole/Half Body)', '4r(2pcs)', 'SMALL', 120, '2023-11-29 18:58:11', 1),
(2023002, 'Graduation Picture', '8r(1pc) 3r(1pc) 2r(4pcs)', 'BIG', 300, '2023-11-29 19:01:31', 1),
(2023003, 'Family Package A', '8r(1pc) 3r(1pc) 2r(4pcs)', 'SMALL', 300, '2023-11-29 19:04:00', 1),
(2023004, 'Family Package B', '8r(2pcs) 3r(3pcs) 2r(4pcs)', 'SMALL', 350, '2023-11-29 19:05:42', 1),
(2023005, 'Digital Package', 'Unlimited Shots,\r\n8x12(40pcs) w/ layout & album,\r\nVideo Coverage 2pcs flash-drives,\r\nFree 1pc 16x20 Blow up pic w/ frame plus 1 free signature frame ', 'SMALL', NULL, '2023-11-29 19:07:48', 1),
(2023006, 'Special Package', 'Unlimited Shots,\r\n5r(100pcs) w/ layout & Album,\r\nVideo Coverage 2pcs flash-drives,\r\nFREE 11x14 blow up pic w/ frame and signature frame(1pc)', 'SMALL', NULL, '2023-11-29 19:21:10', 1),
(2023007, 'Regular Package', 'Unlimited Shots,\r\n5r(80pcs) & album,\r\nVideo coverage 1 flash-drive', 'SMALL', NULL, '2023-11-29 19:28:11', 1),
(2023008, 'Budget Package', 'Unlimited Shots,\r\n5r(100pcs)', 'SMALL', NULL, '2023-11-29 19:30:35', 1),
(2023009, 'Hire a Photographer', 'Photo only', 'BIG', NULL, '2023-11-29 19:34:15', 1),
(2023010, 'Hire a Video Grapher', 'Video Only', 'BIG', NULL, '2023-11-29 19:35:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `surname`, `registration_date`, `contact`, `email`, `password`, `role`) VALUES
(2, 'Admin', 'Mname', 'Surname', '2023-10-22 16:45:44', 0, 'admin.admin@cvsu.edu.ph', '$2y$10$OMyazDWKGNERSJW6KIfPIuZG1/ajR/tnen0g5q/zMoOm4cteM4EjK', 'ADMIN'),
(15, 'fname', 'mname', 'sname', '2023-11-28 23:48:10', 0, 'user.user@cvsu.edu.ph', '$2y$10$AycJciKiIN1xK6pxtFpXpeT8iQAMIysmH6W7MZ1aWWUwEZ0QyZttK', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

DROP TABLE IF EXISTS `website`;
CREATE TABLE IF NOT EXISTS `website` (
  `heading_title` varchar(200) NOT NULL,
  `heading_paragraph` varchar(500) NOT NULL,
  `services_paragraph` varchar(200) NOT NULL,
  `about_timeopen` varchar(500) NOT NULL,
  `about_paragraph` varchar(1000) NOT NULL,
  `footer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`heading_title`, `heading_paragraph`, `services_paragraph`, `about_timeopen`, `about_paragraph`, `footer`) VALUES
('Capture every moment with us', ' At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences. Allow us to join you in your every adventure and milestones in life and together, lets treasure every moment.', 'The following are our budget friendly but quality services. Contact us for more details. Book now!', 'Monday to Sunday\r\n8am to 5pm', ' The backround of Lagring Studio way back in 2010, There was a woman named Alegria Garcia who established a photo studio in Salitran and named the studio \"Lagring Studio\". Alegria “Lagring” Garcia is a mother of 4 child. The humble start of Lagring Studio shows that persistence is important if you want to be successful.\r\n\r\n    The business started with a small studio offering ID pictures, photo and video packages to events.The studio also sold frames in different size and photo enlargement. Through years of business, they establish their name in picture industry specially in Imus. They now cover almost 70% of public schools in Imus such as the big school in Imus National High School (INHS), Gen. Emilio Aguinald National High School (GEANHS), Malagasang 1,2,3 Elementary School, etc.. Until now, the business continues to grow.', 'Support Lagringstudio@gmail.com'),
('', ' At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences. Allow us to join you in your every adventure and milestones in life and together, lets treasure every moment.', '', 'Call Us: +63915 229 824\r\nOur Email: Lagringstudio@gmail.com', '', '');

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
