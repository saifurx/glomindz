-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 17, 2017 at 05:21 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `district` varchar(40) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `name`, `district`, `update_at`) VALUES
(1, 'Guwahati', 'Kamrup', '2014-08-28 14:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_guestlist`
--

CREATE TABLE `hotel_guestlist` (
  `id` int(11) NOT NULL,
  `room_no` varchar(60) CHARACTER SET utf8 NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT 'M',
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime DEFAULT NULL,
  `check_out_status` tinyint(4) NOT NULL DEFAULT '0',
  `mobile` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT 'IND',
  `additional_member` int(11) NOT NULL,
  `coming_from` varchar(250) CHARACTER SET utf8 NOT NULL,
  `going_to` varchar(80) CHARACTER SET utf8 NOT NULL,
  `vehicle_no` varchar(80) CHARACTER SET utf8 NOT NULL,
  `id_type` varchar(80) CHARACTER SET utf8 NOT NULL,
  `id_no` varchar(80) CHARACTER SET utf8 NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `guestlist_date` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_records`
--

CREATE TABLE `hotel_records` (
  `id` int(10) unsigned NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `guestlist_date` date NOT NULL,
  `total_check_in` int(11) NOT NULL,
  `total_check_out` int(11) NOT NULL,
  `foreign_guest` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_transaction_master`
--

CREATE TABLE `hotel_transaction_master` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '1',
  `date_of_payment` date NOT NULL,
  `transaction_amount` decimal(10,0) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_transaction_master`
--

INSERT INTO `hotel_transaction_master` (`id`, `hotel_id`, `payment_status`, `date_of_payment`, `transaction_amount`, `updated_at`, `created_at`) VALUES
(1, 434, 1, '0000-00-00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 434, 1, '0000-00-00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `policestations`
--

CREATE TABLE `policestations` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code` varchar(40) CHARACTER SET latin1 NOT NULL,
  `name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policestations`
--

INSERT INTO `policestations` (`id`, `city_id`, `code`, `name`, `latitude`, `longitude`, `last_update`) VALUES
(1, 1, '', 'NA', 0, 0, '2017-04-12 18:44:22'),
(3, 1, '', 'Pan Bazar', 0, 0, '2014-01-08 11:05:54'),
(5, 1, '', 'Latasil', 0, 0, '2013-07-23 18:33:52'),
(6, 1, '', 'Paltan Bazar', 0, 0, '2014-01-08 11:05:49'),
(7, 1, '', 'Bharalumukh', 0, 0, '2013-07-23 18:33:52'),
(8, 1, '', 'North Guwahati', 0, 0, '2013-07-23 18:33:52'),
(9, 1, '', 'Fatasil Ambari', 0, 0, '2013-07-23 18:33:52'),
(10, 1, '', 'Azara', 0, 0, '2013-07-23 18:33:52'),
(11, 1, '', 'Chandmari', 0, 0, '2013-07-23 18:33:52'),
(12, 1, '', 'Geetanagar', 0, 0, '2013-07-23 18:33:52'),
(13, 1, '', 'Noonmati', 0, 0, '2013-07-23 18:33:52'),
(14, 1, '', 'Dispur', 0, 0, '2013-07-23 18:33:52'),
(15, 1, '', 'Khetri', 0, 0, '2013-07-23 18:33:52'),
(16, 1, '', 'Pragjyotishpur', 0, 0, '2013-07-23 18:33:52'),
(17, 1, '', 'Sonapur', 0, 0, '2013-07-23 18:33:52'),
(18, 1, '', 'Bhangagarh', 0, 0, '2013-07-23 18:33:52'),
(19, 1, '', 'Hatigaon', 0, 0, '2013-07-23 18:33:52'),
(20, 1, '', 'Satgaon', 0, 0, '2013-07-23 18:33:52'),
(21, 1, '', 'Gorchuk', 0, 0, '2013-07-23 18:33:52'),
(22, 1, '', 'Maligaon', 0, 0, '2013-07-23 18:33:52'),
(23, 1, '', 'Borjhar', 0, 0, '2013-07-23 18:33:52'),
(24, 1, '', 'khanapara', 0, 0, '2013-07-23 18:33:52'),
(25, 1, '', 'Jorabat', 0, 0, '2013-07-23 18:33:52'),
(26, 1, '', 'Kamakhya', 0, 0, '2013-07-23 18:33:52'),
(27, 1, '', 'Fancy Bazar', 0, 0, '2013-07-23 18:33:52'),
(28, 1, '', 'Crime Unit', 0, 0, '2013-10-23 05:26:10'),
(29, 1, '', 'Basistha', 0, 0, '2014-01-08 11:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `expiry_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `user_id`, `token`, `status`, `expiry_datetime`) VALUES
(1, 434, 'vw1a1xokwh0w7dis7qqcprqm0wvdhq7y3se7w35doel281b8', 0, '2016-12-16 20:17:03'),
(2, 434, 'pw9oaat6txurlcmikenzss4z6jay2pxroectd3x615nqvdt8', 0, '2016-12-16 20:18:13'),
(3, 434, 'cgwh73wyjwek14sm6te8mwvx56lkwq8s6nhikfl2g8kt11nz', 0, '2016-12-16 20:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_person` varchar(80) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `licence_no` varchar(80) NOT NULL,
  `locality` varchar(80) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `ps_id` int(11) NOT NULL DEFAULT '9999',
  `city_id` int(11) NOT NULL,
  `state` varchar(80) NOT NULL DEFAULT 'Assam',
  `country` varchar(80) NOT NULL DEFAULT 'India',
  `user_type` enum('hotel') NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `owner_name` varchar(40) NOT NULL,
  `owner_mobile` varchar(10) NOT NULL,
  `remember_token` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=603 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `contact_person`, `number_of_rooms`, `licence_no`, `locality`, `pin`, `address`, `ps_id`, `city_id`, `state`, `country`, `user_type`, `role`, `status`, `owner_name`, `owner_mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(434, 'Hotel Test Inn', 'support@glomindz.com', '9854087006', '$2y$10$uti1HsoFjWtpMhpc4/Q4/ednd6OmqSzJsxfc/xUUxMK6htAlnv766', 'admin user', 0, '', 'Paltanbazar', '', '', 10, 1, 'Assam', 'India', 'hotel', 'admin', 1, 'Saifur Rahman', '2222222222', '3C70GptQjgNsEZ4vDkwv7RgGtIrloKzjvdQ53qi8ytuKFianTYiSxepblR6y', '2014-09-08 08:38:52', '2017-04-17 05:50:17'),
(447, 'Capital Lodge', 'capitallodgedispur@gmail.com', '8472041746', '$2y$10$299R4mMwppM28DUbnO3ny.atxO/7Q.dAEYnsHqP3jqx2YZV74jy7y', '', 0, '', '', '', '', 1, 0, 'Assam', 'India', 'hotel', 'user', 1, '', '0', '', '2014-10-25 20:21:21', '2014-10-26 00:21:21'),
(466, 'India Club', 'indiaclubghy1@gmail.com', '9864509494', '$2y$10$QiM9YYw0/CgISKQkbt9uz.5NUDRaCp8wWI0YL8bUpZV1A5K.I85Jq', 'Jayanta Madhab Konwar', 9, '', 'Deghalipukhuri', '781001', 'India Club\r\nDeghalipukhuri,G.N.B. Road\r\nNear Reserve Bank of India\r\nGuwahati-781001\r\nAssam', 3, 1, 'Assam', 'India', 'hotel', 'user', 1, '', '0', 'nI5jABABwuA8EBwG1t4zHD7Jfa7gLnicU92Teoj5KZD93pDwPNkEA5IXu8Wk', '2015-01-27 15:47:43', '2015-07-17 11:08:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_guestlist`
--
ALTER TABLE `hotel_guestlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_records`
--
ALTER TABLE `hotel_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `per_day_info` (`hotel_id`,`guestlist_date`);

--
-- Indexes for table `hotel_transaction_master`
--
ALTER TABLE `hotel_transaction_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policestations`
--
ALTER TABLE `policestations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel_guestlist`
--
ALTER TABLE `hotel_guestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_records`
--
ALTER TABLE `hotel_records`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_transaction_master`
--
ALTER TABLE `hotel_transaction_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `policestations`
--
ALTER TABLE `policestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=603;
