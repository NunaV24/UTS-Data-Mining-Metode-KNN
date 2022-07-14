-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 01:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `knn`
--

CREATE TABLE `knn` (
  `no` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tinggi` varchar(20) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `l_perut` varchar(20) NOT NULL,
  `l_panggul` varchar(20) NOT NULL,
  `lemak` varchar(20) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knn`
--

INSERT INTO `knn` (`no`, `nama`, `tinggi`, `berat`, `l_perut`, `l_panggul`, `lemak`, `label`) VALUES
(1, 'Sari', '160', '70', '78', '99', '33.3', 'Gemuk'),
(2, 'Khofifah', '162', '56', '74', '90', '31', 'Gemuk'),
(3, 'Yati', '155', '63', '76', '95', '37', 'gemuk'),
(4, 'Putri', '156', '54', '74', '88', '31', 'Ideal'),
(5, 'Hasanah', '155', '55', '79', '88', '27', 'Gemuk'),
(6, 'Sasa', '155', '55', '67', '91', '29', 'Ideal'),
(7, 'Ayu', '151', '58', '76', '94', '31', 'Gemuk'),
(8, 'Vivi', '151', '62', '79', '98', '37', 'Gemuk'),
(9, 'Ita', '159', '49', '72', '89', '28', 'Ideal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knn`
--
ALTER TABLE `knn`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knn`
--
ALTER TABLE `knn`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
