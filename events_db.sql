-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 08:54 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `code` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `username`, `password`, `email`, `status`, `code`) VALUES
(1, '', 'admin', 'admin123!', 'piyush@digidexlabs.com', 1, 'NwiRIJsi');

-- --------------------------------------------------------

--
-- Table structure for table `events_list`
--

CREATE TABLE `events_list` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` mediumtext NOT NULL,
  `starting_time` datetime NOT NULL,
  `duration` tinytext NOT NULL,
  `location` text NOT NULL,
  `first_img` tinytext NOT NULL,
  `second_img` tinytext NOT NULL,
  `third_img` tinytext NOT NULL,
  `fees` int(11) NOT NULL,
  `videos` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_list`
--

INSERT INTO `events_list` (`id`, `name`, `description`, `starting_time`, `duration`, `location`, `first_img`, `second_img`, `third_img`, `fees`, `videos`) VALUES
(10, 'Vastu, Geopathic Stress and Personal Energies with Ultimate Energy Scanner', 'Learn how to use \"The Ultimate Energy Scanner\" Professionally in an Exciting and \"Energizing Workshop.\r\nWhat will you learn?\r\n1) Vastu and Energy Basics\r\n2) Operating the energy scanner\r\n3) Scanning your chakras- you will be able to quantify the functioning of your chakras\r\n4) Scanning your aura\r\n5) Scanning your Vastu\r\n6) Scanning for Geopathic Stress\r\n7) Scanning compatibility for Gemstones for astrological remedies\r\n8) Making customised energy medicines to harmonise your chakras\r\n9) Remedies for Vastu and Geopathic stress\r\n  And much more\r\nThe workshop is designed to create value for both freshers and professionals who are practicing Astrology, Vastu, Energy healing, Alternative medicine.\r\nTake your professional journey to the next level.....\r\n\r\nFees:\r\n27000 (including Full scanner kit)\r\n9000 (Without scanner kit)', '2018-07-21 11:00:00', '6.00', 'B4/214 Basement Safdarjung Enclave near Baba Balaknath Mandir New Delhi Nearest Metro Station Green park', '../events_images/09dfa67d772dcc38c1293980a2336a17040ab424331206858646e9184d356971.JPG', '../events_images/5dcd5f761876ae794e7c48d574fa528fbd16b245df3e1326685b9487ed812a2d.JPG', '../events_images/2b7a29040b86ddf5cabf2b72a8b796b4e2021a066869929a115fcf1085b17bd7.JPG', 27000, 'https://www.youtube.com/watch?v=LEkxu40qjT4'),
(11, 'Nadi Astrology Level -2', 'course content:\r\n\r\n10 classes', '2018-07-22 11:00:00', '2.30', 'B4/214 Basement Safdarjung Enclave near Baba Balaknath Mandir New Delhi Nearest Metro Station Green park', '../events_images/2fba9a486a8e005ce5fbe7e6047ccf19b8d486943d6539cf006fa30de7cdb6b3.JPG', '../events_images/245d8867913e07f52034a1465324548d9426b791db2289d71f7e756ef23dd65d.JPG', '../events_images/a5c52d026f3cbf172470a7349f69f7e7c1b0a36b37f7641011604b7739711a65.JPG', 10000, 'https://www.youtube.com/watch?v=LEkxu40qjT4'),
(13, 'vipin', 'this is vipin event', '2018-07-20 00:59:00', '2.30', 'nauroji nagar', '../events_images/62471928d8df18429a1739cec8a3aff85a9e2dadb274fafb4aa2f530547093b7.JPG', '../events_images/cc11f491eb1dab9d21ed6c66611bce3e5fc65bda8910bc45463efb4f056dfffd.png', '../events_images/59c1d6fe06ebabb944c1e050863ede08202d79b3b39b97bba2f747079a8cda45.JPG', 27000, 'https://www.youtube.com/watch?v=LEkxu40qjT4');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` int(128) NOT NULL,
  `event_id` int(128) NOT NULL,
  `image` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `dob` date NOT NULL,
  `phone` int(11) NOT NULL,
  `birthplace` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `name`, `email`, `address`, `dob`, `phone`, `birthplace`) VALUES
(1, 'Piyush', 'piyush.goel9083@gmail.com', 'piyush.goel9083@gmail.com', '2018-06-01', 0, ''),
(2, 'Vipin', 'vipin.mourya@gmail.com', 'vipin.mourya@gmail.com', '2018-06-01', 0, ''),
(3, 'Aman', 'aman.verma@gmail.com', 'aman.verma@gmail.com', '2018-06-01', 0, ''),
(4, 'Gaurav', 'gaurav.sharma@gmail.com', 'gaurav.sharma@gmail.com', '2018-06-01', 0, ''),
(5, 'deepanshu@gmail.com', '', 'Vasant Kunj', '2018-05-05', 0, ''),
(6, 'deepannshu@gmail.com', '', 'Vasant Kunj', '2018-05-05', 0, ''),
(7, 'deepanshu@gmail.com', '', 'Vasant Kunj', '2018-05-05', 0, ''),
(8, 'vipin', 'vipin9maurya@gmail.com', 'nauroji nagar', '1996-04-18', 2147483647, 'nauroji nagar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `events_list`
--
ALTER TABLE `events_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events_list`
--
ALTER TABLE `events_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `image_id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
