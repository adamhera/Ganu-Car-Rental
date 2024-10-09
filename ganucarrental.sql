-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 06:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganucarrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `booking_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `tot_day` int(11) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `pay_method` varchar(40) NOT NULL,
  `pay_slip` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `verify` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id_car` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id_car`, `category`, `title`, `description`, `price`, `photo`) VALUES
(1, 'Compact', 'Perodua Myvi VVT 1.5 (A)', 'caa', '235', 'compact1.jpg'),
(2, 'Compact', 'Proton Iriz 1.3 (A)', '<p>Proton</p>', '170', 'compact2.jpg'),
(3, 'Compact', 'Honda City Hatchback 1.5 (A)', 'Honda City Hatchback 1.5 (A)', '295', 'compact3.jpg'),
(4, 'Compact', 'Mini Countryman 2.0 (A)', 'Mini Countryman 2.0 (A)', '720', 'compact4.jpg'),
(5, 'Sedan', 'Honda City New Variant 1.5 (A)', 'Honda City New Variant 1.5 (A)', '141', 'sedan1.jpg'),
(6, 'Sedan', 'Mercedes-Benz CLS 250 AMG 2.1 (A)', 'Mercedes-Benz CLS 250 AMG 2.1 (A)', '588', 'sedan2.jpg'),
(7, 'Sedan', 'Perodua Bezza 1.3 (A)', 'Perodua Bezza 1.3 (A)', '170', 'sedan3.jpg'),
(8, 'Sedan', 'Proton Persona 1.6 (A)', 'Proton Persona 1.6 (A)', '170', 'sedan4.jpg'),
(9, 'MPV', 'Hyundai Starex Plus 2.5 (A)', 'Hyundai Starex Plus 2.5 (A)', '650', 'mpv1.jpg'),
(10, 'MPV', 'Toyota Vellfire 2.4 (A)', 'Toyota Vellfire 2.4 (A)', '720', 'mpv2.jpg'),
(11, 'MPV', 'Toyota Hiace 2.7 (M)', 'Toyota Hiace 2.7 (M)', '450', 'mpv3.jpg'),
(12, 'MPV', 'Toyota C-HR 1.8 (A)', 'Toyota C-HR 1.8 (A)', '600', 'mpv4.jpg'),
(13, 'SUV', 'Mazda CX-5 2.0 (A)', 'Mazda CX-5 2.0 (A)', '599', 'suv1.jpg'),
(14, 'SUV', 'Proton X70 1.5 (A)', '<h5 style=\"box-sizing: border-box; font-family: Quicksand, sans-serif; line-height: 1.1; color: rgb(83, 84, 88); font-size: 14px; letter-spacing: 0.28px; text-align: center;\">Proton X70 1.5 (A)</h5>', '599', 'suv2.jpg'),
(15, 'SUV', 'Nissan X Trail 2.0 (A)', '<h5 style=\"box-sizing: border-box; font-family: Quicksand, sans-serif; line-height: 1.1; color: rgb(83, 84, 88); font-size: 14px; letter-spacing: 0.28px; text-align: center;\">Nissan X Trail 2.0 (A)</h5>', '450', 'suv3.jpg'),
(16, 'SUV', 'Volvo XC60 2.0 (A)', '<h5 style=\"box-sizing: border-box; font-family: Quicksand, sans-serif; line-height: 1.1; color: rgb(83, 84, 88); font-size: 14px; letter-spacing: 0.28px; text-align: center;\">Volvo XC60 2.0 (A)</h5>', '650', 'suv4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `phone`) VALUES
(1, 'Nur Atirah', 'demo', 'demo', '0198888888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
