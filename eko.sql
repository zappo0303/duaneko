-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2025 at 12:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eko`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `madh` int DEFAULT NULL,
  `iduser` int NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vocher` int DEFAULT NULL,
  `tongthanhtoan` int NOT NULL,
  `idpro` int DEFAULT NULL,
  `ngaydathang` date NOT NULL,
  `pttt` enum('0-cod','1-Ck','2-vidientu') COLLATE utf8mb4_general_ci NOT NULL,
  `tinhtrangtt` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bill_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `user`, `email`, `tel`, `diachi`, `vocher`, `tongthanhtoan`, `idpro`, `ngaydathang`, `pttt`, `tinhtrangtt`, `bill_status`) VALUES
(13, NULL, 1, 'phu', 'admin@gmail.com', '0978765743', 'xuan phuong', NULL, 155, NULL, '2025-02-12', '', '1', 4),
(14, NULL, 1, 'phu', 'admin@gmail.com', '0978765743', 'xuan phuong', NULL, 396, NULL, '2025-02-12', '', '0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `idpro` int NOT NULL,
  `price` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL,
  `iduser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idpro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `idbill`, `iduser`) VALUES
(2, 6, 65, 'Combo Happy Meal 65K', 'happy_meal.jpg', 1, 65, 9, 1),
(3, 7, 99, 'COMBO HAPPY MEAL 99K', 'happy_meal_social.jpg', 1, 99, 10, 1),
(4, 8, 155, 'Combo Happy Family 155K', 'happy_family.jpg', 1, 155, 11, 1),
(5, 8, 155, 'Combo Happy Family 155K', 'happy_family.jpg', 1, 155, 12, 1),
(6, 8, 155, 'Combo Happy Family 155K', 'happy_family.jpg', 1, 155, 13, 1),
(7, 7, 99, 'COMBO HAPPY MEAL 99K', 'happy_meal_social.jpg', 4, 396, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(14, 'Ưu đãi'),
(15, 'MÓN MỚI'),
(16, 'COMBOM 1 NGƯỜI'),
(17, 'COMBO NHÓM'),
(18, 'GÀ RÁN - GÀ QUAY'),
(19, 'BURGER - CƠM - MỲ Ý'),
(20, 'THỨC ĂN');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `idkm` int NOT NULL,
  `giam_gia` float NOT NULL,
  `ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soluong` int NOT NULL,
  `iddm` int NOT NULL,
  `mota` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `soluong`, `iddm`, `mota`) VALUES
(5, 'Combo Cơm - Gà Rán', 45.00, 'MIRINDA-HS.jpg', 100, 14, '1 Cơm Gà Rán + 1 Lon M'),
(6, 'Combo Happy Meal 65K', 65.00, 'happy_meal.jpg', 100, 14, '02 Miếng Gà Rán + 1 lo'),
(7, 'COMBO HAPPY MEAL 99K', 99.00, 'happy_meal_social.jpg', 100, 14, '3 Miếng Gà + 1 Gà Popc'),
(8, 'Combo Happy Family 155K', 155.00, 'happy_family.jpg', 100, 14, '5 Miếng Gà Rán + 1 Kho'),
(9, 'Gà Hoàng Kim', 80.00, '1-gahoangkim.jpg', 100, 15, '2 miếng gà Hoàng Kim\r\n'),
(10, '1 Gà Địa Trung Hải', 41.00, '1-ga-cuon-dia-trung-hai.jpg', 100, 15, '1 Miếng Gà Địa Trung H'),
(12, 'Combo Gà Địa Trung Hải A', 93.00, 'combo-ga-cuon-dia-trung-hai-a.jpg', 100, 15, '1 Miếng Gà Địa Trung H'),
(13, 'Combo Gà Địa Trung Hải B', 125.00, '2-ga-cuon-dia-trung-hai (1).jpg', 100, 15, '2 Miếng Gà Địa Trung H'),
(14, '1 Gà Cuộn Bắc Kinh', 39.00, '1-ga-cuon-bac-kinh.jpg', 100, 15, '01 Gà Cuộn Bắc Kinh'),
(15, 'Combo Gà Địa Trung Hải C', 199.00, 'combo-ga-cuon-dia-trung-hai-c.jpg', 100, 15, '3 Miếng Gà Địa Trung H'),
(16, 'COMBO GÀ ZERO HD', 96.00, 'combo-pepsi-zero.jpg', 100, 15, '02 Miếng Gà Rán + 0'),
(17, '1 Gà Que Kem Xốt Cajun', 40.00, '1-Cajun.jpg', 100, 14, '1 Gà Que Kem Xốt Cajun'),
(18, '2 Gà Que Kem Xốt Cajun', 74.00, '2-Cajun.jpg', 100, 14, '2 Gà Que Kem Xốt Cajun'),
(19, 'Combo Gà Que Kem Xốt Cajun A', 91.00, 'A-Cajun.jpg', 100, 15, '1 Gà Que Kem Xốt Cajun'),
(20, 'Combo Gà Que Kem Xốt Cajun B', 89.00, 'B-Cajun.jpg', 100, 15, '1 Gà Que Kem Xốt Cajun'),
(21, 'Cơm Gà Rán - Lon Mirinda cam - Mỳ Ý', 45.00, 'D3-new.jpg', 100, 16, '1 Cơm Gà Rán + 1 Lon M'),
(22, 'Combo Gà Rán', 87.00, 'D1-new.jpg', 100, 16, '2 Miếng Gà +1 Khoai tâ'),
(23, 'Combo Salad Hạt', 78.00, 'D4-new.jpg', 100, 16, '1 Miếng Gà + 1 Salad H'),
(24, 'Combo Burger', 89.00, 'D5.jpg', 100, 16, '1 Burger Zinger/Burger'),
(25, 'Combo Nhóm 1', 172.00, 'D6.jpg', 100, 17, '3 Miếng Gà + 1 Burger '),
(26, 'Combo Nhóm 2', 191.00, 'D7-new.jpg', 100, 17, '4 Miếng Gà + 1 Khoai t'),
(27, 'Combo Nhóm 3', 228.00, 'D8-new.jpg', 100, 17, '5 Miếng Gà + 1 Popcorn'),
(28, '1 MIẾNG GÀ RÁN', 35.00, '1-Fried-Chicken.jpg', 100, 18, '1 Miếng Gà Giòn Cay/Gà'),
(29, '2 Miếng Gà Rán', 70.00, '2-Fried-Chicken.jpg', 100, 14, '2 Miếng Gà Giòn Cay/Gà'),
(30, '6 Miếng Gà Rán', 201.00, '6-Fried-Chicken-new.jpg', 100, 14, '6 Miếng Gà Giòn Cay/Gà'),
(31, '1 Miếng Đùi Gà Quay', 74.00, 'BJ.jpg', 100, 18, '1 Miếng Đùi Gà Quay Gi'),
(32, '1 Miếng Phi-lê Gà Quay', 38.00, 'MOD-PHI-LE-GA-QUAY.jpg', 100, 18, '1 Miếng Phi-lê Gà Quay'),
(33, '3 Cánh Gà Hot Wings', 54.00, '3-HW.jpg', 100, 18, '3 Cánh Gà Hot Wings'),
(34, '5 Cánh Gà Hot Wings', 83.00, '5-HW.jpg', 100, 18, '5 Cánh Gà Hot Wings'),
(35, 'Burger Zinger', 54.00, 'Burger-Zinger.jpg', 100, 19, '1 Burger Zinger'),
(36, 'Burger Tôm', 44.00, 'Burger-Shrimp.jpg', 100, 19, '1 Burger Tôm'),
(37, 'Cơm Gà Xiên Que', 45.00, 'Rice-Skewer.jpg', 100, 19, '1 Cơm Gà Xiên Que'),
(38, 'Cơm Xiên Gà Tenderods', 45.00, 'Rice-TENDERODS.jpg', 100, 19, '1 Cơm Xiên Gà Tenderod'),
(39, 'Salad Hạt', 35.00, 'SALAD-HAT.jpg', 100, 20, ' 1 Salad Hạt'),
(40, 'Salad Pop', 38.00, 'SALAD-HAT-GA-VIEN.jpg', 100, 14, ' 1 Salad Hạt Gà Viên P'),
(41, '3 Cá Thanh', 40.00, '3-Fishsticks.jpg', 100, 20, '3 Cá Thanh'),
(42, '2 Xiên Que', 40.00, '2-Skewers.jpg', 100, 20, '2 Xiên Que'),
(43, '4 Phô Mai Viên', 34.00, '4-Chewy-Cheese.jpg', 100, 20, '4 Phô Mai Viên'),
(44, '6 Phô Mai Viên', 44.00, '6-Chewy-Cheese.jpg', 100, 20, '6 Phô Mai Viên'),
(45, 'Bắp Cải Trộn (Vừa)', 12.00, 'CL-(R)-new.jpg', 100, 20, 'Bắp Cải Trộn (Vừa)'),
(46, 'Bắp Cải Trộn (Lớn)', 22.00, 'CL-(L)-new.jpg', 100, 20, 'Bắp Cải Trộn (Lớn)'),
(47, 'Canh Rong Biển', 17.00, 'Soup-Rong-Bien.jpg', 100, 20, 'Súp Rong Biển');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'phu', '123456', 'admin@gmail.com', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`),
  ADD KEY `bill_ibfk_2` (`idpro`),
  ADD KEY `bill_ibfk_3` (`vocher`),
  ADD KEY `bill_ibfk_4` (`madh`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`idpro`),
  ADD KEY `cart_ibfk_2` (`idbill`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`idkm`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddm` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `idkm` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`vocher`) REFERENCES `khuyenmai` (`idkm`),
  ADD CONSTRAINT `bill_ibfk_4` FOREIGN KEY (`madh`) REFERENCES `cart` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
