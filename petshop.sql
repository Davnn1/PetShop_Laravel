-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 12:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(6) NOT NULL,
  `foto` text NOT NULL,
  `namabrg` varchar(100) NOT NULL,
  `kategori` enum('Food','Cage','Grooming') NOT NULL,
  `hrg` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `foto`, `namabrg`, `kategori`, `hrg`) VALUES
('GM-001', 'GM-001.jpg', 'Sikat lembut', 'Grooming', 41250),
('GM-002', 'GM-002.jpg', 'Cat toy', 'Grooming', 20100),
('GM-003', 'GM-003.jpg', 'Gunting', 'Grooming', 34000),
('GM-004', 'GM-004.jpg', 'Sabun anjing', 'Grooming', 63000),
('GM-005', 'GM-005.jpg', 'pencukur bulu all', 'Grooming', 87000),
('GM-006', 'GM-006.jpg', 'Pengering bulu', 'Grooming', 60000),
('GM-007', 'GM-007.jpg', 'pencukur bulu asu', 'Grooming', 68000),
('GM-008', 'GM-008.jpg', 'Tempat mandi', 'Grooming', 50000),
('GM-009', 'GM-009.jpg', 'Tas anjing', 'Grooming', 68900),
('KD-001', 'KD-001.jpg', 'kandang babi mini', 'Cage', 35000),
('KD-002', 'KD-002.jpg', 'Kandang kucing', 'Cage', 50000),
('KD-003', 'KD-003.jpg', 'Cat Cage', 'Cage', 120000),
('KD-004', 'KD-004.jpg', 'Kandang kucing anti maling', 'Cage', 75000),
('KD-005', 'KD-005.jpg', 'kandang anjing', 'Cage', 200000),
('KD-006', 'KD-006.jpg', 'Kandang kucing 8x4', 'Cage', 220000),
('KD-007', 'KD-007.jpg', 'Kandang anjing murah', 'Cage', 22000),
('KD-008', 'KD-008.jpg', 'Kandang musang', 'Cage', 300000),
('KD-009', 'KD-009.jpg', 'Kandang puppy', 'Cage', 55000),
('MK-001', 'MK-001.jpg', 'Makanan kitten', 'Food', 30000),
('MK-002', 'MK-002.jpg', 'Makanan puppy', 'Food', 32000),
('MK-003', 'MK-003.jpeg', 'Cokelat pahit', 'Food', 66000),
('MK-004', 'MK-004.jpg', 'Susu cokelat', 'Food', 120000),
('MK-005', 'MK-005.jpg', 'Dandog', 'Food', 52000),
('MK-006', 'MK-006.jpg', 'Kornet anjing', 'Food', 70000),
('MK-007', 'MK-007.jpg', 'Wet cat food', 'Food', 35000),
('MK-008', 'MK-008.jpg', 'Wet dog food', 'Food', 52500),
('MK-009', 'MK-009.jpg', 'Whiskas Cokelat', 'Food', 89000),
('MK-010', 'MK-010.jpg', 'Growing cat food', 'Food', 50123);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('Admin','Customer') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `email`, `password`, `level`, `created`) VALUES
('31200044', 'handikurniawan59@gmail.com', '25704265805b1f622d5660d2a0a6a6c5', 'Customer', '2022-06-14 07:37:22'),
('admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2022-06-13 14:02:11'),
('davin', 'davinvin744@gmail.com', '8b900377fc9a207bfcb21c0e4ee88cff', 'Customer', '2022-06-13 14:32:43'),
('user', 'handi@gmail.com', '5b307381861d9a4c51b0e881eef973d3', 'Customer', '2022-06-13 14:02:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `UNIQUE` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
