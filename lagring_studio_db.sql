-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 11:03 AM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u578342230_lagring_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apt_id` int(11) NOT NULL,
  `schedule_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `apt_occasion_type` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `apt_datetime` datetime NOT NULL,
  `apt_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `apt_status` varchar(200) NOT NULL DEFAULT 'PENDING',
  `apt_remark` varchar(500) NOT NULL DEFAULT 'Please wait for approval.',
  `apt_status_date` datetime DEFAULT NULL,
  `apt_date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `apt_photographer` varchar(255) DEFAULT NULL,
  `photographer_id` int(11) NOT NULL,
  `apt_submit_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `walkin_fullname` varchar(255) DEFAULT NULL,
  `walkin_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apt_id`, `schedule_id`, `user_id`, `service_id`, `apt_occasion_type`, `apt_datetime`, `apt_location`, `apt_status`, `apt_remark`, `apt_status_date`, `apt_date_added`, `apt_photographer`, `photographer_id`, `apt_submit_type`, `walkin_fullname`, `walkin_contact`) VALUES
(25, NULL, 15, 2023002, 'WEDDING', '2024-01-19 23:59:59', 'sdsdfsd', 'DONE', 'Please wait for approval.', NULL, '2024-01-04 13:43:37', NULL, 0, '', '0', NULL),
(26, NULL, 15, 2023001, '', '2024-01-18 17:00:00', '', 'DONE', 'N/A', '2024-01-04 16:32:20', '2024-01-04 13:47:46', 'JAYSON', 0, '', '0', NULL),
(27, 'LS2024H5V0U', 15, 2023003, '', '2024-01-20 11:30:00', '', 'PENDING', 'Please wait for approval.', NULL, '2024-01-04 16:13:56', NULL, 0, '', '0', NULL),
(28, 'LS2024Y7D5F', 15, 2023004, 'N/A', '2024-01-20 11:00:00', 'N/A', 'PENDING', 'Please wait for approval.', NULL, '2024-01-04 16:52:29', NULL, 0, '', '0', NULL),
(29, 'LS2024O9Y7X', 15, 2023008, 'N/A', '2024-01-20 13:00:00', 'N/A', 'PENDING', 'Please wait for approval.', NULL, '2024-01-04 16:54:19', NULL, 0, '', '0', NULL),
(30, 'LS2024A7R1K', 15, 2023006, 'N/A', '2024-01-20 11:30:00', 'N/A', 'PENDING', 'Please wait for approval.', NULL, '2024-01-04 16:57:48', NULL, 0, '', '0', NULL),
(31, 'LS2024W9N0W', 2, 2023007, 'N/A', '2024-01-17 12:30:00', 'N/A', 'DONE', 'Please wait for approval.', NULL, '2024-01-04 19:43:10', NULL, 0, 'WALK-IN', 'Clyde Solas', '09271234570'),
(32, 'LS2024C7U1Z', 15, 2023002, 'N/A', '2024-01-25 15:30:00', 'N/A', 'APPROVED', 'N/A', '2024-01-09 21:03:10', '2024-01-09 20:13:28', 'CLYDE', 0, 'ONLINE', NULL, NULL),
(33, 'LS2024W6X5T', 15, 2023002, 'N/A', '2024-01-25 15:30:00', 'N/A', 'DECLINED', 'awda', '2024-01-11 12:30:21', '2024-01-09 20:13:32', 'N/A', 0, 'ONLINE', NULL, NULL),
(34, 'LS2024N2W9O', 15, 2023010, 'BAPTISM', '2024-01-17 23:59:59', 'cavite', 'DONE', 'N/A', '2024-01-11 12:26:21', '2024-01-11 12:24:19', 'JAYSON', 0, 'ONLINE', NULL, NULL),
(40, 'LS2024P4V5O', 15, 2023010, 'BAPTISM', '2024-01-17 23:59:59', 'cavite', 'PENDING', 'Please wait for approval.', NULL, '2024-01-11 12:24:55', NULL, 0, 'ONLINE', NULL, NULL),
(44, 'LS2024T4N8B', 15, 2023009, 'BAPTISM', '2024-01-17 23:59:59', 'cavite', 'PENDING', 'Please wait for approval.', NULL, '2024-01-11 12:28:43', NULL, 0, 'ONLINE', NULL, NULL),
(45, 'LS2024E7W8H', 15, 2023009, 'BIRTHDAY PARTY', '2024-01-27 23:59:59', 'dasmarinas, cavite', 'DECLINED', 'Not approved', '2024-01-16 13:59:30', '2024-01-16 05:37:10', 'N/A', 0, 'ONLINE', NULL, NULL),
(46, 'LS2024Q4V7L', 15, 2023002, 'N/A', '2024-01-30 11:30:00', 'N/A', 'APPROVED', 'N/A', '2024-01-16 13:55:07', '2024-01-16 05:42:23', 'Mr. Edgar Carias', 0, 'ONLINE', NULL, NULL),
(47, 'LS2024S2Z2P', 15, 2023003, 'N/A', '2024-01-30 11:30:00', 'N/A', 'APPROVED', 'N/A', '2024-01-16 13:54:53', '2024-01-16 05:44:46', 'Mr. Edgar Carias', 0, 'ONLINE', NULL, NULL),
(48, 'LS2024H3V3W', 15, 2023006, 'N/A', '2024-01-24 11:00:00', 'N/A', 'APPROVED', 'N/A', '2024-01-16 14:27:20', '2024-01-16 06:14:46', 'Mr. Edgar Carias', 0, 'ONLINE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backup_recovery_log`
--

CREATE TABLE `backup_recovery_log` (
  `id` int(11) NOT NULL,
  `br_name` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `backup_recovery_log`
--

INSERT INTO `backup_recovery_log` (`id`, `br_name`, `date_added`, `activity`) VALUES
(68, 'test', '2024-01-14 03:09:47', 'Recovered'),
(69, 'backup_2024-01-14_03-09-52.zip', '2024-01-14 03:09:52', 'Back up '),
(70, 'backup_2024-01-14_03-09-52.zip', '2024-01-14 03:10:08', 'Recovered'),
(71, 'backup_2024-01-14_03-09-52.zip', '2024-01-14 03:11:50', 'Recovered'),
(72, 'backup_2024-01-14_03-13-14.zip', '2024-01-14 03:13:14', 'Back up '),
(73, 'backup_2024-01-14_03-13-14.zip', '2024-01-14 03:13:45', 'Recovered'),
(74, 'backup_2024-01-14_17-00-16.zip', '2024-01-14 09:00:16', 'Back up '),
(75, 'backup_2024-01-14_17-00-38.zip', '2024-01-14 17:00:38', 'Back up '),
(76, 'backup_2024-01-14_17-02-24.zip', '2024-01-14 17:02:24', 'Back up ');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `photographer_id` int(11) NOT NULL,
  `photographer_fullname` varchar(100) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photographer_status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `archived_flag` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `expire_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`photographer_id`, `photographer_fullname`, `firstname`, `middlename`, `surname`, `registration_date`, `contact`, `email`, `password`, `photographer_status`, `archived_flag`, `otp`, `expire_time`) VALUES
(1, 'preity escorial', 'preity', 'm', 'dd', '2024-01-04 14:44:06', 0, 'preity@gmail.com', '1234', 'ACTIVE', 1, 0, '0000-00-00 00:00:00'),
(8, 'tae', 'preity', 'm', 'escorial', '2024-01-22 14:03:30', 9609215872, 'preityantoinette0521@gmail.com', '$2y$10$miyNPfJRRWszg8OY.yvvTem6L79KXy7UK.1yrVwtp3qAziGXNtLHC', 'ACTIVE', 1, 0, '0000-00-00 00:00:00'),
(9, 'tae', 'preity', 'm', 'escorial', '2024-01-22 14:04:39', 9609215872, 'preityantoinette0521@gmail.com', '$2y$10$aeD.dWh68tvmRM.jON7ktOCEKdyEOHuZKnW59RfHPUoyzRRBs.qAO', 'ACTIVE', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_description` varchar(500) NOT NULL,
  `service_type` varchar(200) NOT NULL,
  `service_price` int(11) DEFAULT NULL,
  `service_date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `archived_flag` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_image`, `service_description`, `service_type`, `service_price`, `service_date_added`, `archived_flag`) VALUES
(2023001, 'PORTRAITS(WHOLE/HALF BODY)', '2023001_wholebody.jpg', '4R(2PCS)', 'SMALL', 10000, '2023-11-29 18:58:11', 1),
(2023002, 'Graduation Picture', '2023002_graduation.jpg', '8R(1PC) 3R(1PC) 2R(4PCS)', 'SMALL', 300, '2023-11-29 19:01:31', 1),
(2023003, 'Family Package A', '2023003_familypackagea.jpg', '8R(1PC) 3R(1PC) 2R(4PCS)', 'SMALL', 300, '2023-11-29 19:04:00', 1),
(2023004, 'Family Package B', '2023004_familypackageb.jpg', '8r(2pcs) 3r(3pcs) 2r(4pcs)', 'SMALL', 350, '2023-11-29 19:05:42', 1),
(2023005, 'Digital Package', '2023005_digitalpackage.jpg', 'Unlimited Shotspcs) with 8x12 (40pcs) with layout & album, Video Coverage with 2 flash-drives, Free 1pc 16x20 Blow up pic with frame, Free 1 signature frame', 'SMALL', NULL, '2023-11-29 19:07:48', 1),
(2023006, 'Special Package', '2023006_specialpackage.jpg', 'Unlimited Shots 5r(100pcs) with layout and Album Video Coverage 2pcs flashdrives FREE 11x14 blow up pic with frame and signature frame(1pc)', 'SMALL', NULL, '2023-11-29 19:21:10', 1),
(2023007, 'Regular Package', '2023007_regularpackage.jpg', 'Unlimited Shots, 5r(80pcs) pictures & album video Coverage 1pc flash-drive', 'SMALL', NULL, '2023-11-29 19:28:11', 1),
(2023008, 'Budget Package', '2023008_budgetpackage.jpg', 'Unlimited Shots,5r(100pcs)', 'SMALL', NULL, '2023-11-29 19:30:35', 1),
(2023009, 'HIRE A PHOTOGRAPHER', '415271255_1128578344975835_7754832911836392166_n.jpg', 'PHOTO ONLY', 'BIG', 0, '2023-11-29 19:34:15', 1),
(2023010, 'HIRE A VIDEO GRAPHER', '411281782_862883678962722_6799912096621998634_n.jpg', 'VIDEO ONLY', 'BIG', 0, '2023-11-29 19:35:26', 1);

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
  `contact` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(250) NOT NULL,
  `archived_flag` int(11) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `surname`, `registration_date`, `contact`, `email`, `password`, `role`, `archived_flag`, `otp`, `expire_time`) VALUES
(2, 'Vanessa', '', 'Gelera', '2023-10-22 16:45:44', 9271234570, 'preityantoinette0521@gmail.com', '$2y$10$OMyazDWKGNERSJW6KIfPIuZG1/ajR/tnen0g5q/zMoOm4cteM4EjK', 'ADMIN', 1, 692415, '2024-01-22 22:18:50'),
(15, 'Faith', 'Magtalas', 'Maquerme', '2023-11-28 23:48:10', 9271234570, 'maquermefaith@gmail.com', '$2y$10$AycJciKiIN1xK6pxtFpXpeT8iQAMIysmH6W7MZ1aWWUwEZ0QyZttK', 'USER', 1, NULL, NULL),
(22, 'preity', 'm', 'escorial', '2024-01-16 08:25:18', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$kQY2.lWYUTptvUoxqYO2mOamdHhiRY1eWBSSkqz4yghFCco0Hidhi', 'ADMIN', 0, 692415, '2024-01-22 22:18:50'),
(23, 'Tarba', 'M', 'Ajero', '2024-01-16 08:26:01', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$vixfdTqN3EZbbclI5wNt0uKTOmL0t1Ldq/rJxvQ4PisSysmPbeqVO', 'ADMIN', 0, 692415, '2024-01-22 22:18:50'),
(24, 'faith', 'm', 'maquerme', '2024-01-16 08:33:59', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$ahNsbD6r6UDEnX4kezhkU.dxndKPVC.j5aykM5zmdcvzlUvjPvmQq', 'ADMIN', 0, 692415, '2024-01-22 22:18:50'),
(25, 'cxdf', 'df', 'dfs', '2024-01-16 08:38:18', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$8GNLByM1gezAe5uTbafLo.9HkGKf.FU4tN0bZQVaFWoDwW2kx9nJm', 'ADMIN', 0, 692415, '2024-01-22 22:18:50'),
(26, 'klaid', 'lozano', 'moran', '2024-01-16 06:23:33', 9999129192, 'klaid.moran@gmail.com', '$2y$10$WEFTniPyXJg/9au8h14m0u7Y5QYOpbgDwsy7M98MjQIiFlEXx5W4u', 'USER', 0, 0, NULL),
(27, 'gef', 'df', 'dgf', '2024-01-17 08:07:39', 4445, 'df@gmail.com', '$2y$10$VPuKNswVYKQYyoSReh0GhuC8kcBPt3yWjYXbxShdQWJ55QQUnbSKa', 'USER', 0, 108254, '2024-01-17 16:12:39'),
(28, 'preity', 'm', 'escorial', '2024-01-22 13:18:23', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$3VAJxHsSVIOX8evswYdmgeNfG.zYmd/SEF.EsXV4wQu0E51VED90G', 'USER', 0, 692415, '2024-01-22 22:18:50'),
(29, 'preity', 'm', 'escorial', '2024-01-22 13:20:03', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$vuXbp8klc4orzPIbueAMFuz53xCTkJndONMhjGV7UFmjU8z9PxT1i', 'USER', 0, 692415, '2024-01-22 22:18:50'),
(30, 'preity', 'm', 'escorial', '2024-01-22 13:20:05', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$Pvjr5LeaiUk8/mrnFswBHuEdjiN4UqQMF6AYVM6xSmLLjHBSrdnFa', 'USER', 0, 692415, '2024-01-22 22:18:50'),
(31, 'preity', 'm', 'escorial', '2024-01-22 13:23:08', 9335171120, 'preityantoinette0521@gmail.com', '$2y$10$svVjAUXLDZhXR8cLTNDfROUQ02WC47TRPHNzoelfOPgol5iJnVEpC', 'USER', 0, 692415, '2024-01-22 22:18:50'),
(32, 'preity', 'm', 'escorial', '2024-01-22 13:50:42', 9609215872, 'preityantoinette0521@gmail.com', '$2y$10$G8roKiYQfM6Vp6eCPkM6wONBd39pb2SphgQG16jrIuuKpJcSQ6dQ.', 'USER', 0, 692415, '2024-01-22 22:18:50'),
(33, 'preity', 'm', 'escorial', '2024-01-22 13:55:11', 9609215872, 'preityantoinette0521@gmail.com', '$2y$10$S0hdBCRf9ozVIw1VSXf3zed1R5riUbTozdVxoyMYsbNhzhRbl/ZHy', 'USER', 0, 692415, '2024-01-22 22:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `website_content_id` int(11) NOT NULL,
  `heading_title` varchar(200) NOT NULL,
  `heading_paragraph` varchar(500) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `services_paragraph` varchar(200) NOT NULL,
  `about_paragraph` varchar(1000) NOT NULL,
  `heading_image` varchar(100) NOT NULL,
  `archived_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`website_content_id`, `heading_title`, `heading_paragraph`, `contact`, `email`, `services_paragraph`, `about_paragraph`, `heading_image`, `archived_flag`) VALUES
(4, '', ' At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences. Allow us to join you in your every adventure and milestones in life and together, lets treasure every moment.', 0, '', '', '', '', 1),
(5, 'Capture every moment with us', ' At Lagring studio, we believe in the power of creativity, technology, and imagination. We are thrilled to introduce our cutting-edge digital studio, where we transform ideas into captivating digital experiences. Allow us to join you in your every adventure and milestones in life and together, lets treasure every moment.', 961399203, 'lagringstudio@gmail.com', 'The following are our budget friendly but quality services. Contact us for more details. Book now!', 'A woman by the name of Alegria Garcia opened Lagring Studio, a photography studio in Salitran, back in 2010. Alegria \"Lagring\" Garcia has four children. Lagring\'s modest beginnings demonstrate the value of perseverance in achieving success.A tiny studio offering ID photos, photo packages, and video services for occasions was where it all began. They also offer frames in various sizes as well as photo enlargements. They make a name for themselves in the film industry, particularly in Imus, over years of operation. Currently, they serve over 70% of Imus\'s public schools, including Malagasang 1, 2, and 3 Elementary School, Gen. Emilio Aguinald National High School, and the large Imus National High School (INHS). The company has been expanding up to this point.', 'samplepic.JPG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apt_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `photographer_id` (`photographer_id`);

--
-- Indexes for table `backup_recovery_log`
--
ALTER TABLE `backup_recovery_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`photographer_id`);

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
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`website_content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `backup_recovery_log`
--
ALTER TABLE `backup_recovery_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `photographer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023014;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `website_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
