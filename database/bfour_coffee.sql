-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 06:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfour_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int(4) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `password` varchar(40) NOT NULL,
  `is_active` int(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `id`, `nama_admin`, `password`, `is_active`, `image`, `tgl_input`, `alamat`) VALUES
('1212', 4, 'Fourentina Agustin', '1212', 1, 'pro1722137434.jpg', '2024-06-11 16:23:02', 'RT 02/ RW 10, Jl. Harapan, Bekasi Barat'),
('coba', 8, 'ardi alias ardiansyah', 'coba', 0, 'pro1722139513.jpg', '2024-07-11 17:22:43', 'RT 01/ RW16, Jakarta Timur'),
('indra', 7, 'indra ardiansyah', 'indra', 2, 'img1721135235.jpg', '2024-07-02 11:59:32', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `image`) VALUES
(1, 'coffee', 'img1721645010.jpg'),
(2, 'non coffee', 'img1718882743.jpg'),
(3, 'food', 'img1718882658.jpg'),
(4, 'other', 'img1718882643.jpg'),
(7, 'extra', 'img1718882559.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `image`, `harga`, `harga2`) VALUES
(1, 1, 'Americano', 'img1718883089.jpg', 14000, 18000),
(2, 1, 'Latte', 'img1718883412.jpg', 16000, 20000),
(3, 1, 'Kopi Gula Aren', 'img1718883426.jpg', 16000, 20000),
(4, 1, 'Cloud Aren Latte', 'img1718883210.jpg', 16000, 20000),
(5, 1, 'Kopi Regal', 'img1718883442.jpg', 18000, 22000),
(6, 1, 'Flavoured Latte', 'img1718883637.jpg', 22000, 26000),
(7, 1, 'Caramel Macchiato', 'img1718883682.jpeg', 25000, 29000),
(8, 2, 'Yoghurt', 'img1720348393.jpg', 10000, 0),
(10, 2, 'Lychee Yakult', 'img1718884097.jpg', 14000, 18000),
(11, 2, 'Ovaltine', 'img1718884232.jpg', 14000, 18000),
(12, 2, 'Milky Regal', 'img1718884346.jpg', 16000, 20000),
(13, 3, 'Beef Rice Bowl Sambal Matah', 'img1718889344.jpg', 25000, 0),
(14, 3, 'Spaghetti Bolognese', 'img1718889356.jpg', 20000, 0),
(15, 3, 'Nasi Goreng Ikan Teri', 'img1718889370.jpg', 20000, 0),
(16, 3, 'Nasi Goreng Telur Ceplok', 'img1718889388.jpg', 20000, 0),
(17, 4, 'Kentang Goreng Sosis', 'img1718889403.jpg', 20000, 0),
(18, 4, 'Kentang Goreng', 'img1718889417.jpg', 18000, 0),
(19, 4, 'Tahu Susu Goreng (isi 9)', 'img1718889431.jpg', 15000, 0),
(20, 4, 'Cireng Rujak', 'img1718889491.jpg', 12000, 0),
(21, 7, 'Regal Biscuit', 'img1718975637.jpg', 3000, 0),
(22, 7, 'Espresso Shot', 'img1718975745.jpeg', 5000, 0),
(24, 1, 'Spanish Latte', 'img1720347333.jpg', 18000, 22000),
(25, 1, 'Mocha', 'img1720347435.jpg', 22000, 26000),
(26, 1, 'Matcha Fusion', 'img1720347514.jpg', 26000, 30000),
(27, 1, 'Lotus Biscoff Latte', 'img1720347591.jpg', 28000, 32000),
(28, 2, 'Sweet tea', 'img1720347822.jpg', 14000, 18000),
(29, 7, 'Cleo Water', 'img1720348343.jpeg', 5000, 0),
(30, 2, 'Peach Tea', 'img1720348331.jpeg', 16000, 20000),
(31, 2, 'Mango Tea', 'img1720348318.jpeg', 16000, 20000),
(32, 2, 'Lychee Tea', 'img1720348302.jpeg', 16000, 20000),
(33, 2, 'Chocolate Latte', 'img1720348285.jpg', 18000, 22000),
(34, 2, 'Matcha Lattee', 'img1720348260.jpg', 22000, 26000),
(37, 7, 'Oatmilk', 'img1722062883.jpeg', 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_booking` varchar(12) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL,
  `tgl_booking` date NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `nip`, `id_menu`, `id_booking`, `harga`, `jumlah`, `total`, `metode_pembayaran`, `status`, `tgl_booking`, `nama_cust`, `phone`) VALUES
(325, 'coba', 3, '21072024207', 16000, 1, 16000, 'cash', 'paid', '2024-07-21', 'aaaaaaaaaaa', ''),
(329, 'coba', 5, '21072024209', 22000, 1, 47000, 'Qris', 'paid', '2024-07-21', 'indra ardiansyah', ''),
(330, 'coba', 13, '21072024209', 25000, 1, 47000, 'Qris', 'paid', '2024-07-21', 'indra ardiansyah', ''),
(333, 'indra', 11, '21072024212', 18000, 2, 60000, 'Qris', 'paid', '2024-07-21', 'indra ardiansyah', ''),
(334, 'indra', 20, '21072024212', 12000, 2, 60000, 'Qris', 'paid', '2024-07-21', 'indra ardiansyah', ''),
(335, 'coba', 3, '22072024213', 16000, 1, 16000, 'Qris', 'paid', '2024-07-22', 'adi2', ''),
(338, 'coba', 5, '25072024216', 18000, 1, 44000, 'cash', 'paid', '2024-07-25', 'fouren', ''),
(339, 'coba', 6, '25072024216', 22000, 1, 44000, 'cash', 'paid', '2024-07-25', 'fouren', ''),
(340, 'coba', 5, '25072024217', 18000, 1, 32000, 'Qris', 'paid', '2024-07-25', 'adi2', ''),
(341, 'coba', 1, '25072024217', 14000, 1, 32000, 'Qris', 'paid', '2024-07-25', 'adi2', ''),
(342, 'indra', 4, '25072024218', 16000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(343, 'indra', 22, '25072024218', 5000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(344, 'indra', 4, '25072024219', 16000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(345, 'indra', 22, '25072024219', 5000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(346, 'indra', 4, '25072024220', 16000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(347, 'indra', 22, '25072024220', 5000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(349, 'indra', 4, '25072024222', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(350, 'indra', 22, '25072024222', 5000, 1, 5000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', ''),
(351, 'indra', 3, '25072024223', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '6282337067241'),
(352, 'indra', 8, '25072024223', 10000, 1, 10000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '6282337067241'),
(353, 'indra', 2, '25072024224', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '081286228136'),
(354, 'indra', 15, '25072024224', 20000, 1, 36000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '081286228136'),
(355, 'indra', 3, '25072024225', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '6282337067241'),
(356, 'indra', 14, '25072024225', 20000, 1, 36000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '6282337067241'),
(357, 'indra', 12, '25072024226', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '09123111'),
(358, 'indra', 22, '25072024226', 5000, 1, 21000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '09123111'),
(359, 'indra', 29, '25072024227', 5000, 1, 5000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '09123111'),
(360, 'indra', 21, '25072024227', 3000, 1, 8000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '09123111'),
(361, 'indra', 3, '25072024228', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '081286228136'),
(362, 'indra', 10, '25072024229', 14000, 1, 14000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '+6282337067241'),
(363, 'indra', 13, '25072024230', 25000, 1, 25000, 'Qris', 'unpaid', '2024-07-25', 'indra ardiansyah', '11111'),
(422, 'coba', 1, '28072024258', 14000, 1, 14000, 'Cash', 'paid', '2024-07-28', 'aaaaaaaaaaa', ''),
(423, 'coba', 4, '28072024259', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-28', 'haw', ''),
(424, 'coba', 4, '28072024260', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-28', 'adi2', ''),
(425, 'coba', 4, '28072024261', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-28', 'adi2', ''),
(434, 'indra', 3, '28072024267', 20000, 1, 62000, 'Qris', 'paid', '2024-07-28', 'indra ardiansyah', ''),
(435, 'indra', 12, '28072024267', 20000, 1, 62000, 'Qris', 'paid', '2024-07-28', 'indra ardiansyah', ''),
(440, 'coba', 3, '28072024268', 16000, 1, 87000, 'Cash', 'paid', '2024-07-28', 'adi', ''),
(441, 'coba', 12, '28072024268', 20000, 1, 87000, 'Cash', 'paid', '2024-07-28', 'adi', ''),
(442, 'coba', 14, '28072024268', 20000, 1, 87000, 'Cash', 'paid', '2024-07-28', 'adi', ''),
(443, 'coba', 25, '28072024268', 26000, 1, 87000, 'Cash', 'paid', '2024-07-28', 'adi', ''),
(444, 'coba', 29, '28072024268', 5000, 1, 87000, 'Cash', 'paid', '2024-07-28', 'adi', ''),
(445, 'coba', 1, '28072024269', 18000, 1, 78000, 'Qris', 'unpaid', '2024-07-28', 'adi', ''),
(446, 'coba', 2, '28072024269', 20000, 1, 78000, 'Qris', 'unpaid', '2024-07-28', 'adi', ''),
(447, 'coba', 3, '28072024269', 20000, 1, 78000, 'Qris', 'unpaid', '2024-07-28', 'adi', ''),
(448, 'coba', 4, '28072024269', 20000, 1, 78000, 'Qris', 'unpaid', '2024-07-28', 'adi', ''),
(449, 'indra', 2, '28072024270', 20000, 1, 61000, 'Qris', 'unpaid', '2024-07-28', 'indra ardiansyah', ''),
(450, 'indra', 11, '28072024270', 18000, 1, 61000, 'Qris', 'unpaid', '2024-07-28', 'indra ardiansyah', ''),
(451, 'indra', 12, '28072024270', 20000, 1, 61000, 'Qris', 'unpaid', '2024-07-28', 'indra ardiansyah', ''),
(452, 'indra', 21, '28072024270', 3000, 1, 61000, 'Qris', 'unpaid', '2024-07-28', 'indra ardiansyah', ''),
(453, 'indra', 3, '28072024271', 16000, 1, 16000, 'Qris', 'unpaid', '2024-07-28', 'indra ardiansyah', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `nip` (`nip`,`id_menu`),
  ADD KEY `nip_2` (`nip`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `nip_2` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`nip`) REFERENCES `admin` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `temp_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `admin` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
