-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 07:03 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '', 'admin', 'admin123!', 'deepanshu@digidexlabs.com', 1, 'H6Ku036c');

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
(15, 'vastu, Geopathic stress', 'Learn how to use "The ultimate Energy scanner" professionally in an exciting and Energizing Workshop.\r\nWhat will you learn?\r\n1) Vastu and Energy basic\r\n2) Operating the energy scanner', '2018-09-14 12:49:00', '3', 'B-4/214 basement safdarjung enclave near Baba Balaknath Mandir, New Delhi ', '../events_images/0b9a6dc3886dc203604da53f8ed7acb6e06ce75fb8f0353c02bbe289c770590e.jpg', '../events_images/998bb81cf06ea9c750506c947ef76e917d8a320d853ecd33e0b36d896f2fa41a.jpg', '../events_images/1ac9493fac4b93f3affec007783514e92c81fe02b110275c063d87bce9cd1b31.jpg', 2700, 'https://www.youtube.com/watch?v=_R-gottYKKM'),
(16, 'Nadi Astrology level-2', 'Course content: 10 classes', '2018-09-17 10:53:00', '3', 'B-4/214 basement safdarjung enclave near Baba Balaknath Mandir, New Delhi ', '../events_images/a5bcc1ed11ddd18cfdfde0faafbc2244d4bc11cdd0561c4cc40f7050e88317ed.jpg', '../events_images/8be8afccc2f4ad9be343bfebfbb53635a4b24f6692cf2c1e1b1b322898d04199.jpg', '../events_images/04c4534d0d0f7d9e4b97c233ac1576c38425c9802c25b384e2ae93e20aa343bf.jpg', 10000, 'https://www.youtube.com/watch?v=wS63ofJ_VXU');

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
  `birthplace` tinytext NOT NULL,
  `refercode` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `name`, `email`, `address`, `dob`, `phone`, `birthplace`, `refercode`) VALUES
(15, 'gaurav', 'adsfas@gmail.com', 'asdfasdf ', '1995-12-31', 2147483647, 'asdfasdf', 'dtMZtH');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
