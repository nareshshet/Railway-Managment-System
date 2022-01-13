-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `email_id` varchar(30) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_age` int(20) NOT NULL,
  `p_gender` varchar(5) NOT NULL,
  `p_number` bigint(10) NOT NULL,
  `p_address` varchar(30) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`email_id`, `p_name`, `p_age`, `p_gender`, `p_number`, `p_address`, `p_id`) VALUES
('rakesh9901182@gmail.com ', 'Rakesh', 20, 'm', 9901182902, 'sakrarayapatna, kadur', 1),
('rakeshu_is19.rvitm@rvei.edu.in', 'Umesh', 45, 'm', 9591570910, 'sakrarayapatna, kadur', 2),
('rakesh9901182@gmail.com ', 'naresh', 20, 'm', 852852852, 'karwar', 3),
('rakesh9901182@gmail.com ', 'pooja', 20, 'f', 9901182902, 'sakrarayapatna, kadur', 7),
('rakesh9901182@gmail.com ', 'jhanavi', 20, 'f', 852852852, 'kadur', 8);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `name` varchar(30) NOT NULL,
  `plt_no` int(5) NOT NULL,
  `s_no` int(5) NOT NULL,
  `num_plt` int(5) NOT NULL,
  `ari_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`name`, `plt_no`, `s_no`, `num_plt`, `ari_time`) VALUES
('ksr bengalure', 10, 1, 11, '10:30 am'),
('mangalore', 3, 4, 5, '9:00 pm'),
('mysore junction', 2, 3, 6, '8:30 am'),
('shivamogga', 3, 5, 4, '3:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `user_id` varchar(30) NOT NULL,
  `pnr` int(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'confirmed',
  `train_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`user_id`, `pnr`, `status`, `train_num`) VALUES
('rakeshu_is19.rvitm@rvei.edu.in', 123456789, 'confirmed', 12725),
('rakesh9901182@gmail.com ', 741741741, 'confirmed', 16517);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_no` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `avb_seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_no`, `name`, `source`, `destination`, `avb_seats`) VALUES
(12725, 'siddhaganga sf express', 'ksr bengalure', 'shivamogga', 1000),
(16517, 'kannur exp', 'mysore junction', 'mangalore', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email_id`, `password`) VALUES
('mumbai', 'mumbaiindians@gmail.com', '123456789'),
('Naresh', 'naresg@gmail.com', '123456789'),
('rakesh', 'rakesh9901182@gmail.com ', '123456789'),
('pakesh', 'rakeshu_is19.rvitm@rvei.edu.in', '789456123'),
('rcb', 'rcbipl@gmail.com', '741741741');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `email` (`email_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `train-num` (`train_num`),
  ADD KEY `user-id` (`user_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_no`),
  ADD KEY `source_name` (`source`),
  ADD KEY `destination_name` (`destination`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `email` FOREIGN KEY (`email_id`) REFERENCES `user` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `train-num` FOREIGN KEY (`train_num`) REFERENCES `train` (`train_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user-id` FOREIGN KEY (`user_id`) REFERENCES `user` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `destination_name` FOREIGN KEY (`destination`) REFERENCES `station` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `source_name` FOREIGN KEY (`source`) REFERENCES `station` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
