-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 15, 2021 at 10:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Table structure for table `hang_sua`
--

CREATE TABLE `hang_sua` (
  `ma_hs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang_sua`
--

INSERT INTO `hang_sua` (`ma_hs`, `ten`, `dia_chi`, `dt`, `email`) VALUES
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dia_chi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten`, `gioi_tinh`, `dia_chi`, `dt`, `email`) VALUES
('kh001', 'Khuất Thùy Phương ', 0, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125', 'likingtrapdoesntmakemegay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sua`
--

CREATE TABLE `loai_sua` (
  `id` int(11) NOT NULL,
  `loai_sua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_sua`
--

INSERT INTO `loai_sua` (`id`, `loai_sua`, `descr`) VALUES
(1, 'Sữa bột', ''),
(2, 'Sữa tươi', ''),
(3, 'Sữa chua', '');

-- --------------------------------------------------------

--
-- Table structure for table `sua`
--

CREATE TABLE `sua` (
  `so_tt` int(11) NOT NULL,
  `ma_sua` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_id` int(11) NOT NULL,
  `trong_luong` int(11) NOT NULL,
  `gia` bigint(20) NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sua`
--

INSERT INTO `sua` (`so_tt`, `ma_sua`, `ten`, `hang_id`, `loai_id`, `trong_luong`, `gia`, `anh`, `ingredients`, `descr`) VALUES
(1, 'NTF-008', 'Fristy', 'NTF', 1, 1000, 10000, './uploads/sua1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable Eng'),
(2, 'VNM-001', 'Sữa 2', 'VNM', 1, 2000, 20000, './uploads/sua2.jpg', '', ''),
(3, 'NTF-007', 'sữa 3', 'NTF', 2, 1000, 25000, './uploads/sua3.jpg', '', ''),
(4, '', 'sữa 3', 'NTF', 3, 1000, 25000, './uploads/sua4.jpg', '', ''),
(5, '', 'sữa 3', 'NTF', 1, 1000, 25000, './uploads/sua5.jpg', '', ''),
(6, '', 'sữa 3', 'NTF', 1, 1000, 25000, './uploads/sua6.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`ma_hs`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`so_tt`),
  ADD KEY `hang_id` (`hang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loai_sua`
--
ALTER TABLE `loai_sua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sua`
--
ALTER TABLE `sua`
  MODIFY `so_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sua`
--
ALTER TABLE `sua`
  ADD CONSTRAINT `sua_ibfk_1` FOREIGN KEY (`hang_id`) REFERENCES `hang_sua` (`ma_hs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
