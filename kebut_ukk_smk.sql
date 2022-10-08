-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 05:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kebut_ukk_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `gambar`, `description`, `harga`) VALUES
(3, 'cuci kering', 'istockphoto-487156897-612x612.jpg', 'di layanan ini kami membantu anda dalam mencuci baju dan juga pengeringan baju. dan mengembalikan pakaian anda dalam keadaan kering', 5000),
(4, 'Setrika saja', 'istockphoto-172366447-612x612.jpg', 'di layanan ini kami membantu anda untuk menyelesaikan tugas menyetrika anda', 5000),
(5, 'cuci kering setrika', 'istockphoto-1305874613-612x612.jpg', 'di layanan ini kami membantu anda dalam mencuci,menjemur dan menyetrika pakaian anda. Dan mengembalikan pakaian anda sudah dalam keadaan rapi dan wangi', 8000),
(6, 'bed cover', 'download.jpg', 'di layanan ini dikhususkan untuk anda yang ingin mencuci bed cover ', 25000),
(7, 'topi tas sepatu', 'images (1).jpg', 'di layanan ini kami membantu anda dalam membersihkan aksesoris fashion anda seperti topi,tas dan sepatu', 3000),
(8, 'cuci kering dan setrika', 'PHOTO_ORIG_b127d1072f9d0206d44e01f1ffd6f96d0327571a0.jpg', 'lorerm lorem loremlo re', 5000),
(9, 'cuci boy', 'PHOTO_ORIG_b127d1072f9d0206d44e01f1ffd6f96d0327571a0.jpg', 'axbmxbamnx', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id` int(11) UNSIGNED NOT NULL,
  `type_mesin` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `max_work` int(11) DEFAULT NULL,
  `kondisi_mesin` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id`, `type_mesin`, `kapasitas`, `max_work`, `kondisi_mesin`) VALUES
(2, 'sharp', 8, 12, 'baik'),
(3, 'sharp 123', 10, 20, 'baik'),
(4, 'sharp', 8, 20, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(11) UNSIGNED NOT NULL,
  `daerah` varchar(111) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id`, `daerah`, `harga`) VALUES
(1, 'kutorejo', 2000),
(2, 'dlanggu', 3000),
(3, 'bangsal', 3000),
(4, 'mojosari', 3000),
(5, 'pungging', 4000),
(6, 'pacet', 7000),
(7, 'gondang', 7000),
(8, 'puri', 7000),
(9, 'mojoanyar', 7000),
(10, 'ngoro', 8500),
(11, 'trawas', 8500),
(12, 'jatirejo', 9000),
(13, 'trowulan', 9000),
(14, 'sooko', 9000),
(15, 'kota mojokerto', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(225) DEFAULT NULL,
  `layanan_id` int(225) DEFAULT NULL,
  `payment_id` int(225) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `total_harga` int(225) DEFAULT NULL,
  `status_laundry` varchar(225) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pickup_by` varchar(225) DEFAULT NULL,
  `jam_pickup` varchar(225) DEFAULT NULL,
  `deliver_by` varchar(225) DEFAULT NULL,
  `jam_deliver` varchar(225) DEFAULT NULL,
  `nama_pemesan` varchar(225) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `jumlah_barang` int(225) DEFAULT NULL,
  `code_order` varchar(225) DEFAULT NULL,
  `konfirmasi` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `layanan_id`, `payment_id`, `tgl_pesan`, `total_harga`, `status_laundry`, `alamat`, `pickup_by`, `jam_pickup`, `deliver_by`, `jam_deliver`, `nama_pemesan`, `deskripsi`, `jumlah_barang`, `code_order`, `konfirmasi`) VALUES
(1, 12, 2, 1, '2022-03-15', 2000, 'done', 'kutorejo,dsn radegan rt17', '', 'pagi', '', 'pagi', 'rara', 'null', 0, 'UC8U3T', 1),
(2, 31, 2, 2, '2022-03-15', 18000, 'done', 'bangsal,dsn peterongan rt 2', 'kurir', 'pagi', 'kurir', 'pagi', 'diva riski nur', 'kaos putih polos 7', 5, 'Y7RQDW', 1),
(4, 32, 3, 4, '2022-03-15', 23000, 'done', 'mojosari,ds mojosari', 'kurir', 'pagi', 'kurir', 'pagi', 'amelia zahra', 'kaos putih polos 7', 4, 'F3MMGO', 1),
(5, 33, 6, 5, '2022-03-15', 102000, 'Barang anda akan segera di kirim', 'kutorejo,ds kaligoro', 'kurir', 'pagi', 'kurir', 'pagi', 'wilda fajria', 'kaos putih polos 7', 4, 'VYSMWZ', 1),
(6, 35, 5, 6, '2022-03-15', 39000, 'Barang anda akan segera di kirim', 'pacet,ds sajen', 'kurir', 'pagi', 'kurir', 'pagi', 'listya hanifah', 'kaos hitam polos 7', 4, 'P25IX3', 1),
(7, 36, 7, 7, '2022-03-15', 13000, 'Barang anda akan segera di kirim', 'gondang,ds pohjejer', 'kurir', 'pagi', 'kurir', 'pagi', 'habibah ', 'kaos putih polos 7\r\n', 2, 'TP6OJ0', 1),
(8, 37, 3, 8, '2022-03-15', 34000, 'done', 'jatirejo,ds sumber jaya', 'kurir', 'pagi', 'kurir', 'pagi', 'nurul hasanah', 'kaos putih polos 7', 5, '8XVO3I', 1),
(9, 38, 2, 9, '2022-03-15', 26500, 'done', 'ngoro,ds sumber rejeki', 'kurir', 'pagi', 'kurir', 'pagi', 'zakiyah melati', 'kaos putih polos 7', 6, 'G7YBZC', 1),
(10, 39, 4, 10, '2022-03-15', 8000, 'done', 'mojosari,ds jotangan', 'kurir', 'pagi', 'kurir', 'pagi', 'mariyatul hidayah', 'kaos putih polos 3', 1, '87LPF1', 1),
(11, 40, 2, 11, '2022-03-15', 18000, 'done', 'trowulan,ds jaya jaya ', 'kurir', 'pagi', 'kurir', 'pagi', 'nur aini', 'kaos putih polos 7', 3, 'FXQ906', 1),
(12, 40, 3, 12, '2022-03-15', 19000, 'Proses Pencucian', 'sooko,ds syukur rt5', 'kurir', 'pagi', 'kurir', 'pagi', 'zaila', 'kaos putih polos 7', 2, 'TVMF7Z', 1),
(13, 40, 4, 13, '2022-03-15', 22000, 'terkonfirmasi', 'gondang,ds mekar jaya abadi', 'kurir', 'pagi', 'kurir', 'pagi', 'asmaul husnah', 'baju pramuka', 3, '47UHZ1', 1),
(14, 40, 5, 14, '2022-03-15', 95000, 'Proses Pencucian', 'pacet,ds suku batok rt7', 'kurir', 'siang', 'kurir', 'siang', 'rodiyah', 'qwertyuiopsdfgh', 11, 'OKY7QI', 1),
(15, 40, 6, 15, '2022-03-15', 84000, 'done', 'kota mojokerto,ds berkah rt8', 'kurir', 'siang', 'kurir', 'siang', 'nur faiza', 'sdfghcbnm', 3, 'W6NIEA', 1),
(16, 40, 7, 16, '2022-03-15', 10000, 'kurir akan mengantar barang anda', 'pungging,ds babibubebo rt4', 'kurir', 'siang', 'kurir', 'siang', 'aminah', 'mnasns', 2, '0172KW', 1),
(17, 12, 2, 17, '2022-03-30', 8000, 'done', 'kutorejo,dsn mantap rt4', 'kurir', 'pagi', 'kurir', 'pagi', 'yuki kato', 'baju baju', 2, 'RRZZCQ', 2),
(18, 12, 3, 18, '2022-03-29', 2000, 'unconfirm', 'kutorejo,ds mantap rt4', '', 'pagi', '', 'pagi', 'yuki kato', 'null', 0, '0R2QPO', 2),
(19, 12, 4, 19, '2022-03-15', 2000, 'unconfirm', 'kutorejo,ds mantap rt4', '', 'pagi', '', 'pagi', 'yuki kato', 'null', 0, 'WC4UH6', 2),
(20, 41, 2, 20, '2022-03-15', 6000, 'Proses Pencucian', 'dlanggu,ds maju jaya rt3', 'kurir', 'siang', 'kurir', 'siang', 'sulastri', 'msm na nccc', 1, '23MHVB', 1),
(21, 41, 3, 21, '2022-03-15', 19000, 'Proses Pencucian', 'pungging,ds karya rt8', 'kurir', 'siang', 'kurir', 'siang', 'diana nur', 'mndnc n dc   cnd naaa', 3, 'BI17S0', 1),
(22, 41, 4, 22, '2022-03-31', 23500, 'done', 'trawas,ds juragan rt3', 'kurir', 'siang', 'kurir', 'siang', 'adinda', 'bsbdlhblh jdjblj jansjbc', 3, '9E7NPD', 1),
(23, 41, 5, 23, '2022-03-15', 9000, 'unconfirm', 'jatirejo,ds koto rt6', '', 'sore', '', 'sore', 'mirna aji', 'null', 0, 'FW421B', 1),
(24, 41, 6, 24, '2022-03-15', 9000, 'unconfirm', 'sooko,ds santri rt2', '', 'sore', '', 'sore', 'anggi rahma', 'null', 0, 'VSJLAB', 1),
(25, 41, 7, 25, '2022-03-15', 9000, 'unconfirm', 'kota mojokerto,ds kamusuka rt1', '', 'sore', '', 'sore', 'rahma gita', 'null', 0, '8FG94J', 1),
(26, 42, 2, 26, '2022-03-15', 7000, 'unconfirm', 'puri,ds maju rt9', '', 'sore', '', 'sore', 'dewi anggraini', 'null', 0, 'JE9IRX', 1),
(27, 42, 3, 27, '2022-03-15', 7000, 'unconfirm', 'mojoanyar,ds sumber rt6', '', 'sore', '', 'sore', 'dewi sri', 'null', 0, 'AJDEZR', 1),
(28, 42, 4, 28, '2022-03-15', 3000, 'unconfirm', 'mojosari,ds kedinding rt6', '', 'sore', '', 'sore', 'reni', 'null', 0, 'X0V17A', 1),
(29, 42, 5, 29, '2022-03-15', 18000, 'terkonfirmasi', 'kutorejo,ds kaligoro', 'kurir', 'siang', 'kurir', 'siang', 'firda amalia', 'baju putih', 2, '47P7NZ', 1),
(30, 42, 6, 30, '2022-03-15', 2000, 'kurir akan mengambil cucian anda', 'kutorejo,ds kaligror', 'kurir', 'siang', 'kurir', 'siang', 'ratna agustin', 'null', 0, '3HVSP9', 1),
(31, 42, 7, 31, '2022-03-15', 35000, 'Menuju Ke Gudang Pencucian', 'kutorejo,ds  kaligoro rt4', 'kurir', 'siang', 'kurir', 'siang', 'andina rahayu', 'asdfghjk', 11, '2CCPYC', 1),
(32, 43, 2, 32, '2022-03-15', 16000, 'Menuju Ke Gudang Pencucian', 'pacet,ds raya baru rt2', 'kurir', 'siang', 'kurir', 'siang', 'tya ilmi', 'baju polos 4', 3, 'TQ1OK1', 1),
(33, 43, 3, 33, '2022-03-15', 3000, 'unconfirm', 'bangsal,ds sumberpandan rt8', '', 'siang', '', 'siang', 'airin kemala', 'null', 0, 'ASPYQC', 1),
(34, 43, 4, 34, '2022-03-15', 12000, 'done', 'kutorejo,ds kaligoro rt 7', 'kurir', 'siang', 'kurir', 'siang', 'ersa dwi', 'bscablhjbs', 2, 'CF36VY', 1),
(35, 43, 5, 35, '2022-03-15', 7000, 'unconfirm', 'gondang,ds karang anyar rt3', '', 'sore', '', 'sore', 'mala eka ', 'null', 0, '9G2WVJ', 1),
(36, 43, 6, 36, '2022-03-15', 2000, 'unconfirm', 'kutorejo,ds kaligoro rt6', '', 'sore', '', 'sore', 'elsa febriana', 'null', 0, 'F898KY', 1),
(37, 43, 7, 37, '2022-03-15', 3000, 'unconfirm', 'bangsal,ds pandawa rt7', '', 'sore', '', 'sore', 'novi arfianti', 'null', 0, 'F2P7K9', 1),
(38, 44, 7, 38, '2022-03-15', 3000, 'unconfirm', 'bangsal,ds pandawa rt2', '', 'siang', '', 'siang', 'anggie mutia', 'null', 0, 'IMS7M9', 1),
(39, 44, 6, 39, '2022-03-15', 53000, 'terkonfirmasi', 'mojosari,ds sejahtera rt99', 'kurir', 'siang', 'kurir', 'siang', 'sherli aprilia', 'msnacanscb  jnasjcsanc', 2, 'VOVBAV', 1),
(40, 44, 5, 40, '2022-03-15', 8500, 'unconfirm', 'trawas,ds sukses rt33', '', 'sore', '', 'sore', 'putri eka ', 'null', 0, '90WHNW', 1),
(41, 44, 4, 41, '2022-03-15', 9000, 'unconfirm', 'sooko,ds paduka rt5', '', 'siang', '', 'siang', 'widya nur rahma', 'null', 0, 'RAHBXX', 1),
(42, 44, 3, 42, '2022-03-15', 8500, 'unconfirm', 'ngoro,ds prabu rt6', '', 'sore', '', 'sore', 'endang sri', 'null', 0, '568O9K', 1),
(43, 44, 2, 43, '2022-03-15', 7000, 'unconfirm', 'mojoanyar,ds tani rt4', '', 'sore', '', 'sore', 'tiara asih', 'null', 0, 'UR9ZAY', 1),
(44, 12, 7, 44, '2022-03-16', 3000, 'unconfirm', 'bangsal,ds kusuka rt3', '', 'pagi', '', 'pagi', 'jamilah', 'null', 0, 'ZOBQWP', 2),
(45, 45, 2, 45, '2022-03-16', 3000, 'unconfirm', 'mojosari,ds kamusuka ', '', 'siang', '', 'siang', 'asih', 'null', 0, 'F6PM3D', 2),
(46, 45, 3, 46, '2022-03-16', 23000, 'terkonfirmasi', 'mojosari,ds kusuka', 'kurir', 'siang', 'kurir', 'siang', 'wilda fajria kha', 'mndkjnjcnjd', 4, '2Y4UVF', 2),
(47, 45, 2, 47, '2022-03-16', 7000, 'unconfirm', 'mojoanyar,ds coba lagi', '', 'siang', '', 'siang', 'firda a', 'null', 0, 'Y83F4D', 2),
(48, 45, 3, 48, '2022-03-16', 9000, 'unconfirm', 'jatirejo,ds vision', '', 'siang', '', 'siang', 'bu ningsih', 'null', 0, 'MGBVTM', 2),
(49, 45, 2, 49, '2022-03-16', 19000, 'terkonfirmasi', 'pacet,ds mojo', 'kurir', 'siang', 'kurir', 'siang', 'dewi', 'msmnnsdhj  bsdhbch', 4, '7F8WK2', 2),
(50, 46, 2, 50, '2022-03-16', 12000, 'Menuju Ke Gudang Pencucian', 'dlanggu,ds kaligro', 'kurir', 'siang', 'kurir', 'siang', 'fajar ', 'aaaaaa aaaaa aaaa', 3, 'I606RF', 2),
(51, 47, 2, 51, '2022-03-16', 6000, 'done', 'dlanggu,ajhkxa', 'kurir', 'siang', 'kurir', 'siang', 'jars', 'ahhjsghja', 1, '4K023H', 2),
(52, 13, 2, 52, '2022-03-16', 3000, 'unconfirm', 'dlanggu,hjg', '', 'siang', '', 'siang', 'admin', 'null', 0, 'YJDLX1', 2),
(53, 48, 3, 53, '2022-03-17', 3000, 'unconfirm', 'mojosari,ds kalioro', '', 'pagi', '', 'pagi', 'fajar', 'null', 0, 'OCKYN4', 2),
(55, 12, 8, 55, '2022-03-20', 17000, 'Menuju Ke Gudang Pencucian', 'kutorejo,kaligoro okee', 'kurir', 'siang', 'kurir', 'siang', 'pelanggan', 'fpmknjkdsn', 3, 'GYZ1XM', 1),
(56, 13, 2, 56, '2022-03-29', 2000, 'unconfirm', 'kutorejo,karang asem', '', 'sore', '', 'sore', 'nia ramadhani', 'null', 0, 'RKB0JH', 2),
(57, 0, 0, 57, '2022-03-29', 0, 'unconfirm', ',', '', '', '', '', '', 'null', 0, 'JGKOWX', 1),
(58, 50, 2, 58, '2022-03-30', 2000, 'done', 'kutorejo,dsn kaligoro', 'kurir', 'siang', 'kurir', 'siang', 'jars', 'fghjkl', 0, '81MVUI', 2),
(60, 50, 2, 60, '2022-03-30', 3000, 'unconfirm', 'dlanggu,akjbxkj', '', 'siang', '', 'siang', 'jars', 'null', 0, 'Z0FSKB', 1),
(61, 51, 3, 62, '2022-10-08', 2000, 'unconfirm', 'kutorejo,bvh', '', 'pagi', '', 'pagi', 'p', 'null', 0, '1T9OJQ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `status` varchar(111) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `status`, `tanggal`, `amount`) VALUES
(1, 12, 'belum dibayar', '2022-03-15', 0),
(2, 31, 'lunas', '2022-03-15', 18000),
(3, 31, 'belum dibayar', '2022-03-15', 0),
(4, 32, 'lunas', '2022-03-15', 23000),
(5, 33, 'belum dibayar', '2022-03-15', 0),
(6, 35, 'belum dibayar', '2022-03-15', 0),
(7, 36, 'belum dibayar', '2022-03-15', 0),
(8, 37, 'lunas', '2022-03-15', 34000),
(9, 38, 'lunas', '2022-03-15', 26500),
(10, 39, 'lunas', '2022-03-15', 8000),
(11, 40, 'lunas', '2022-03-15', 18000),
(12, 40, 'belum dibayar', '2022-03-15', 0),
(13, 40, 'belum dibayar', '2022-03-15', 0),
(14, 40, 'belum dibayar', '2022-03-15', 0),
(15, 40, 'lunas', '2022-03-15', 84000),
(16, 40, 'belum dibayar', '2022-03-15', 0),
(17, 12, 'lunas', '2022-03-15', 8000),
(18, 12, 'belum dibayar', '2022-03-15', 0),
(19, 12, 'belum dibayar', '2022-03-15', 0),
(20, 41, 'belum dibayar', '2022-03-15', 0),
(21, 41, 'belum dibayar', '2022-03-15', 0),
(22, 41, 'belum dibayar', '2022-03-31', 0),
(23, 41, 'belum dibayar', '2022-03-26', 0),
(24, 41, 'belum dibayar', '2022-04-01', 0),
(25, 41, 'belum dibayar', '2022-03-27', 0),
(26, 42, 'belum dibayar', '2022-03-15', 0),
(27, 42, 'belum dibayar', '2022-03-15', 0),
(28, 42, 'belum dibayar', '2022-03-15', 0),
(29, 42, 'belum dibayar', '2022-03-15', 0),
(30, 42, 'belum dibayar', '2022-03-15', 0),
(31, 42, 'belum dibayar', '2022-03-15', 0),
(32, 43, 'belum dibayar', '2022-03-15', 0),
(33, 43, 'belum dibayar', '2022-03-15', 0),
(34, 43, 'lunas', '2022-03-15', 12000),
(35, 43, 'belum dibayar', '2022-03-15', 0),
(36, 43, 'belum dibayar', '2022-03-15', 0),
(37, 43, 'belum dibayar', '2022-03-15', 0),
(38, 44, 'belum dibayar', '2022-03-15', 0),
(39, 44, 'belum dibayar', '2022-03-15', 0),
(40, 44, 'belum dibayar', '2022-03-15', 0),
(41, 44, 'belum dibayar', '2022-03-15', 0),
(42, 44, 'belum dibayar', '2022-03-15', 0),
(43, 44, 'belum dibayar', '2022-03-15', 0),
(44, 12, 'belum dibayar', '2022-03-16', 0),
(45, 45, 'belum dibayar', '2022-03-16', 0),
(46, 45, 'belum dibayar', '2022-03-16', 0),
(47, 45, 'belum dibayar', '2022-03-16', 0),
(48, 45, 'belum dibayar', '2022-03-16', 0),
(49, 45, 'belum dibayar', '2022-03-16', 0),
(50, 46, 'belum dibayar', '2022-03-16', 0),
(51, 47, 'lunas', '2022-03-16', 6000),
(52, 13, 'belum dibayar', '2022-03-16', 0),
(53, 48, 'belum dibayar', '2022-03-17', 0),
(54, 12, 'belum dibayar', '2022-03-20', 0),
(55, 12, 'belum dibayar', '2022-03-20', 0),
(56, 13, 'belum dibayar', '2022-03-29', 0),
(57, 0, 'belum dibayar', '2022-03-29', 0),
(58, 50, 'lunas', '2022-03-30', 2000),
(59, 50, 'belum dibayar', '2022-03-30', 0),
(60, 50, 'belum dibayar', '2022-03-30', 0),
(61, 2, 'done', '2022-03-15', 0),
(62, 51, 'belum dibayar', '2022-10-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(111) DEFAULT NULL,
  `umur` int(22) DEFAULT NULL,
  `nohp` bigint(15) DEFAULT NULL,
  `status_pekerjaan` varchar(22) DEFAULT NULL,
  `asal` varchar(111) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `ttl` varchar(111) DEFAULT NULL,
  `wilker` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `umur`, `nohp`, `status_pekerjaan`, `asal`, `foto`, `ttl`, `wilker`) VALUES
(1, 'rendra', 20, 98765421234, 'kurir', 'mojosari', '', 'mojokerto,02-12-2000', 'kutorejo'),
(2, 'raka', 18, 124567890, 'kurir', 'mojokerto', 'big-ElSenordelosCielosTelem-380x380.jpg', 'mojokerto,02-12-2003', 'dlanggu'),
(3, 'sahrul', 18, 1234567890, 'kurir', 'mojokerto', 'images (17).jpg', 'mojokerto,02-12-2003', 'bangsal'),
(4, 'rohmad', 18, 1234567890, 'kurir', 'mojokerto', 'images (16).jpg', 'bojonegoro,02-12-2003', 'mojosari'),
(5, 'devan', 18, 1234567890, 'kurir', 'surabaya', 'images (15).jpg', 'surabaya,02-12-2003', 'pungging'),
(6, 'aji', 18, 1234567890, 'kurir', 'jombang', 'images (14).jpg', 'mojokerto,02-12-2000', 'pacet'),
(7, 'hasyim', 18, 1234567890, 'kurir', 'mojokerto', 'images (13).jpg', 'mojokerto,02-12-2003', 'gondang'),
(8, 'fery', 18, 1234567890, 'kurir', 'lamongan', 'images (18).jpg', 'mojokerto,02-12-2000', 'puri'),
(9, 'habib', 18, 123457890, 'kurir', 'mojokerto', 'avatar.png', 'lamongan,02-12-2003', 'mojoanyar'),
(10, 'hasan', 18, 1234567890, 'kurir', 'surabaya', 'avatar.png', 'surabaya,02-12-2003', 'ngoro'),
(11, 'amin', 18, 1234567890, 'kurir', 'mojokerto', 'avatar.png', 'mojokerto,02-12-2003', 'trawas'),
(12, 'safii', 18, 1234567, 'kurir', 'mojokerto', 'avatar.png', 'bojonegoro,02-12-2003', 'jatirejo'),
(13, 'firman', 18, 9854567896, 'kurir', 'surabaya', 'avatar.png', 'mojokerto,02-12-2003', 'trowulan'),
(14, 'zidan', 18, 1234509876, 'kurir', 'mojokerto', 'avatar.png', 'mojokerto,02-12-2003', 'sooko'),
(15, 'arif', 18, 1234509856, 'kurir', 'madiun', 'avatar.png', 'madiun,02-12-2003', 'kota mojokerto'),
(16, 'amelia', 18, 12340987456, 'admin', 'mojokerto', 'agnes mo 3.jpg', 'mojokerto,02-12-2000', 'gudang'),
(17, 'kurir', 18, 123456789, 'kurir', 'mojokerto', 'fiersa besari 2.jpg', 'mojokerto,02-12-2003', 'kutorejo'),
(18, 'mukhamad fajar', 18, 98754546878, 'admin', 'mojokerto', '', 'lamongan,02-12-2003', 'gudang');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `order_id`, `mulai`, `selesai`) VALUES
(1, 2, '2022-03-16', '2022-03-18'),
(2, 4, '2022-03-16', '2022-03-18'),
(3, 5, '2022-03-16', '2022-03-18'),
(4, 6, '2022-03-16', '2022-03-18'),
(5, 7, '2022-03-16', '2022-03-18'),
(6, 8, '2022-03-16', '2022-03-18'),
(7, 9, '2022-03-16', '2022-03-18'),
(8, 10, '2022-03-16', '2022-03-18'),
(9, 11, '2022-03-16', '2022-03-18'),
(10, 12, '2022-03-16', '2022-03-18'),
(11, 17, '2022-03-16', '2022-03-18'),
(12, 14, '2022-03-16', '2022-03-18'),
(13, 15, '2022-03-16', '2022-03-18'),
(14, 16, '2022-03-16', '2022-03-18'),
(15, 20, '2022-03-16', '2022-03-18'),
(16, 21, '2022-03-16', '2022-03-18'),
(17, 22, '2022-03-16', '2022-03-18'),
(18, 34, '2022-03-16', '2022-03-18'),
(19, 39, '2022-03-16', '2022-03-18'),
(20, 46, '2022-03-16', '2022-03-18'),
(21, 49, '2022-03-16', '2022-03-18'),
(22, 29, '2022-03-16', '2022-03-18'),
(23, 51, '2022-03-16', '2022-03-18'),
(24, 13, '2022-03-17', '2022-03-19'),
(25, 31, '2022-03-30', '2022-04-01'),
(26, 55, '2022-03-30', '2022-04-01'),
(27, 50, '2022-03-30', '2022-04-01'),
(28, 32, '2022-03-30', '2022-04-01'),
(29, 58, '2022-03-30', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `type_data`
--

CREATE TABLE `type_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `type_data` varchar(30) NOT NULL,
  `name_data` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_data`
--

INSERT INTO `type_data` (`id`, `type_data`, `name_data`) VALUES
(1, 'numeric', 'INT'),
(2, 'numeric', 'TINYINT'),
(3, 'numeric', 'SMALLINT'),
(4, 'numeric', 'MEDIUMINT'),
(5, 'numeric', 'BIGINT'),
(6, 'numeric', 'DECIMAL'),
(7, 'numeric', 'FLOAT'),
(8, 'numeric', 'DOUBLE'),
(9, 'numeric', 'BIT'),
(10, 'numeric', 'BOOLEAN'),
(11, 'string', 'VARCHAR'),
(12, 'string', 'TEXT'),
(13, 'string', 'CHAR'),
(14, 'string', 'BINARY'),
(15, 'string', 'VARBINARY'),
(16, 'string', 'TINYBLOB'),
(17, 'string', 'BLOB'),
(18, 'string', 'MEDIUMBLOB'),
(19, 'string', 'LONGBLOB'),
(20, 'string', 'TINYTEXT'),
(21, 'string', 'MEDIUMTEXT'),
(22, 'string', 'LONGTEXT'),
(23, 'string', 'ENUM'),
(24, 'string', 'SET'),
(25, 'date', 'DATE'),
(26, 'date', 'TIME'),
(27, 'date', 'DATETIME'),
(28, 'date', 'TIMESTAMP'),
(29, 'date', 'YEAR'),
(30, 'spatial', 'GEOMETRY'),
(31, 'spatial', 'POINT'),
(32, 'spatial', 'LINESTRING'),
(33, 'spatial', 'POLYGON'),
(34, 'spatial', 'GEOMETRYCOLLECTION'),
(35, 'spatial', 'MULTILINESTRING'),
(36, 'spatial', 'MULTIPOINT'),
(37, 'spatial', 'MULTIPOLYGON');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(12, 'pelanggan', 'pelanggan@gmail.com', '$2y$10$AVGKrNLEKG10Z6LIDFzVi.gk6e8P6LL/CM7Mr.waemTl77YcJV9T2', 'null'),
(13, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(15, 'raka', 'raka@raka.com', '$2y$10$fw4YxAqigHZ8T46mnzuV4udNIx57aoDHEDtpDmSHNeZxpOnKBJPl.', 'kurir'),
(16, 'sahrul', 'sahrul@sahrul.com', '$2y$10$inUm1g1REZE/RxMJtfM1XuNqzBeAncysBqjQHvc21haDsQKWbWBWq', 'kurir'),
(17, 'rohmad', 'rohmad@rohmad', '$2y$10$2IjG7kspalwiqWAaVL61r..UoLthD0SkYZHhyIzmngmE0T1y.zqAW', 'kurir'),
(18, 'devan', 'devan@devan.com', '$2y$10$M9Z2I1ULcYTymerAtM437elGQ3afBwkHn3V3KAW.Xv4XCK7/.2GrK', 'kurir'),
(19, 'aji', 'aji@aji.com', '$2y$10$7Vv0kHRkKwK7wkmQqbo0Uej..m6x3Ag4VzWcbIdsx.xXwQ3NDDP06', 'kurir'),
(20, 'hasyim', 'hasyim@hasyim.com', '$2y$10$pAf7V/gU1SYfW8Oz5PZeQu5Cm7.hLNxosN6XNeHy7CZVMKZOTP0ua', 'kurir'),
(21, 'fery', 'fery@fery.com', '$2y$10$4RMDK9Zx//3YB/TE1FfsXuZD4215I3hc1yyCpwH76PZtlU1GsSdyi', 'kurir'),
(22, 'habib', 'habib@habib.com', '$2y$10$HLSOYjd8Uyssl6EwQjDJQez9RBUzazZcPsB4kGgnaNVFS1NJxO1K.', 'kurir'),
(23, 'hasan', 'hasan@hasan.com', '$2y$10$psqVjuSz9PRAJkybiOhUe.J54d4ap7TWv6vfpNUTNbM5oYEKJpRf.', 'kurir'),
(24, 'amin', 'amin@amin.com', '$2y$10$Bks49.6hX0ZMWV7sQE9.he.sfOvpxXroCZew2Orcq/AzR9xuQj39m', 'kurir'),
(25, 'safii', 'safii@safii.com', '$2y$10$4qx33cOxH9pwjphX/m.NXOo8x.VQ/VmF5KfIiRlF/NSLlp9la/UL2', 'kurir'),
(26, 'firman', 'firman@firman.com', '$2y$10$TneJuBi8kOThbAFuj8wgrOUK30Qnl8QTdfhDMMgksUqxTSOjwX20C', 'kurir'),
(27, 'zidan', 'zidan@zidan.com', '$2y$10$pKWvszrIYEu3LlT3vwt8zecgZSMuNCGjCu.TdBXAGvJOsrjzDCw3y', 'kurir'),
(28, 'arif', 'arif@arif.com', '$2y$10$hEduxMwcT6TrvSskEzz90.TnO6F3QE6gw7/De8o8qnPAxvlnyq8nq', 'kurir'),
(29, 'amelia', 'amelia@amelia.com', '$2y$10$fE60trnqt.ZgysuuBqVqMuv0ohFoLv7THLMeLkjrELYapVyC.75ge', 'admin'),
(30, 'kurir', 'kurir@gmail.com', '$2y$10$vEw3vJrJOzEA8mqJZ.xQEuM8igCCCh0ZRaKmO8UqChrEQ4adALTxS', 'kurir'),
(31, 'diva riski', 'diva@diva.com', '$2y$10$mwLW57R4NcB5bBbNkeWWwekav/zQ1Pp7F/9POLKoSOnJ.p2nI.qdu', 'null'),
(32, 'amelia zahra', 'amel@amel.com', '$2y$10$B8l6VPnoLugpwpqQPS1yIeGHHXa8yjCh9H3yLN2gB/kpefmeu.Aja', 'null'),
(33, 'wilda', 'wilda@wilda.com', '$2y$10$l7XoCpO3OhmQjg8S.hEWk.uRdyy4KTjja2pIR3e06Zlyt3Ye8CcWW', 'null'),
(35, 'listy', 'lis@lis.com', '$2y$10$3EzsqOVgweoMrXRlxfI77u29ib3.EKLKS4ZoKhSj8tHkFld9TmHPy', 'null'),
(36, 'aqw', 'aqw@aqw.com', '$2y$10$DBrZUHavcVTTxdrtrLNrpuTDMeFdxNA5mU3ev0VtIw2Q4ATiyLfbC', 'null'),
(37, 'qwe', 'qwe@qwe.com', '$2y$10$Jhf192Orn23waCLALNIbr.B6MfHIMqNYx1w98pD/3AGaurUf9OchK', 'null'),
(38, 'rty', 'rtry@rty.com', '$2y$10$eajBASloIlE31tAjCNv87evtUmhkyGTlTaX50yjKKAORwpdBadP7q', 'null'),
(39, 'asd', 'asd@asd.coom', '$2y$10$VArDEzaxzT1mvyGrrgS1wup31UAOhCKtakJHt/Yye3YTghsWM/i7i', 'null'),
(40, 'rukmi', 'qas@qas.com', '$2y$10$BqK45.SoI0nK2VuOBrMdieTwvkIWy5qt7NpSnRLiCtrjrTaUQBLfO', 'null'),
(41, 'rrq', 'rrq@rrq.com', '$2y$10$Ri5WntTuvzdbTCqPqcxlWOayiu5YJCSOlASyBbngmLqF0cd5CytY6', 'null'),
(42, 'poi', 'poi@poi.com', '$2y$10$wBXwmnJuyjsxwDEBtQ7VyOM/O6Kevbap5QuU14jzUB7zsTzcjs99O', 'null'),
(43, 'ty', 'ty@ty.com', '$2y$10$OYwNWHulSiMxY38kxqNDzehLf7qhsar8HY3cef7L0dzPcafxVF9YG', 'null'),
(44, 'pandawa', 'pandawa@pandawa', '$2y$10$Akfd5ebzpzjWSkJQ0vX//OviQr.pNq1wrBJs1LDI0C0dSJjp26Wii', 'null'),
(45, 'dd', 'dd@dd.com', '$2y$10$VgsWxYPI/Z1niDZB4hAbHOuPT39xG4SJOLm972mqIXVzFn0pimS.a', 'null'),
(46, 'fajar', 'fajar@gmail.com', '$2y$10$5bb/b12WUTTEdwvh0tPH8eb0pduXtoHvLcXPZIr.TLSw0arIGx9Ei', 'null'),
(47, 'jar', 'jasr@jar.com', '$2y$10$gPQsceQj7rFVqg8oLLszL.1R68T77bWYDLjyM2roIS.YNNENP62Qa', 'null'),
(48, 'fajar', 'kokok@kokok.com', '$2y$10$F2hT.HmoJjlZV3cGnVmWRu0k1oO7oG4PYSMF/5RuQ.2kboD59OC.a', 'null'),
(49, 'fajar say', 'ppp@ppp.com', '$2y$10$7z0f9M5EBv2drOQua6a3uu00llwHIkI993fBqB6AhmGhdvHbICUKy', 'admin'),
(50, 'jars', 'jars@jar.com', '$2y$10$uKUdRkXGFBUelGqlMRzFz..TgCFp8V.SFk9yzEO3OO3/mxp7bJQVe', 'null'),
(51, 'p', 'aaa@a.com', '$2y$10$lW.eHzEfkbjWWLbEQzXCQeD5j1lTVt0JKB9r7jTlAOccJ0wvspgv.', 'null'),
(52, 'admin', 'admin@admin.com', '$2y$10$KHAC0UM5PS9T7so.CGW2meyL2bHcKPRk4NQCvOsQ5QPTud1NNVBMm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_data`
--
ALTER TABLE `type_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `type_data`
--
ALTER TABLE `type_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
