-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2016 at 01:44 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `audioname` varchar(50) NOT NULL,
  `audiofile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `audioname`, `audiofile`) VALUES
(4, 'Music 4', 'Yaar.mp3'),
(5, 'Music 2', 'Sweden Village.mp3'),
(6, 'Music 3', '001z.mp3'),
(10, 'Music 5', 'demo.wav'),
(41, 'ewq', 'Sweden Village.mp3'),
(42, 'cxz', 'We Wish You.ogg'),
(54, 'hjjjjjj', 'zx.spectrum_life.mp3'),
(55, '', ''),
(56, '123', 'egg_med.sql'),
(57, '123', 'medical.sql'),
(58, '123', 's2.jpg'),
(59, '123', 'zx.spectrum_life.mp3'),
(60, '123', 'kcmusic.sql'),
(61, '123', 'kcmusic.sql');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `postcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `password`, `role`, `surname`, `dob`, `email`, `phone`, `address`, `postcode`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
