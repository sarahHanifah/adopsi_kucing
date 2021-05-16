-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 04:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adopsi_kucing`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1001, 'Jakarta'),
(1002, 'Bandung'),
(1003, 'Bogor'),
(1004, 'Depok'),
(1005, 'Tangerang'),
(1006, 'Purwakarta'),
(1007, 'Serang'),
(1008, 'Bekasi'),
(1009, 'Yogyakarta'),
(1010, 'Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `kucing`
--

CREATE TABLE `kucing` (
  `id_kucing` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kucing` varchar(255) NOT NULL,
  `id_ras` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `tentang` text DEFAULT NULL,
  `status_adopsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kucing`
--

INSERT INTO `kucing` (`id_kucing`, `id_user`, `nama_kucing`, `id_ras`, `jenis_kelamin`, `umur`, `tentang`, `status_adopsi`, `foto`) VALUES
(9, 3037, 'Lucas', 2001, 'Jantan', '1 - 2 tahun', 'Suka di tempat yang dingin, lincah, dan suka loncat loncat ke lemari hihi. Belum divaksin.', 'Belum Diadopsi', '3037Lucas.jpg'),
(13, 3037, 'Mumu', 2002, 'Betina', '1 - 2 tahun', 'Sudah divaksin dan sudah disteril.', 'Belum Diadopsi', '3037Mumu.jpg'),
(14, 3037, 'Casper', 2001, 'Jantan', 'Di atas 2 tahun', 'Suka jalan jalan ke kebun. Kucing baik ga pernah nyerang majikan', 'Belum Diadopsi', '3037Casper.jpg'),
(15, 3037, 'Mbul', 2007, 'Jantan', 'Di atas 2 tahun', 'Kucing baik, suka banget sama makanan basah, tapi jangan terlalu sering dikasih yang basah yaa', 'Belum Diadopsi', '3037Mbul.jpg'),
(17, 3037, 'Ijah', 2001, 'Jantan', '1 - 2 tahun', 'Sudah disteril, suka ikan pindang. Kucingnya pemalu, kalau ada tamu suka kabur hihi', 'Belum Diadopsi', '3037ijah.jpg'),
(18, 3037, 'Milo', 2001, 'Jantan', '1 - 2 tahun', 'Gapernah buang air sembarangan, makan dua kali sehari pake whiskas', 'Belum Diadopsi', '3037Milo.jpg'),
(19, 3042, 'Miki', 2005, 'Betina', 'Di atas 2 tahun', 'Sangat lucu, makan 3 kali sehari', 'Belum Diadopsi', '3042Miki.jpg'),
(20, 3043, 'Jenny', 2009, 'Betina', 'Di bawah 1 tahun', 'Saya sudah gabisa urus kucing lagi makanya saya buka adopsi.. Kucingnya masih kecil, mesti diberi makanan basah', 'Belum Diadopsi', '3043Jenny.jpg'),
(21, 3043, 'Kevin', 2001, 'Jantan', '1 - 2 tahun', 'Kucing pendiam, ga suka banyak gerak, seringnya tidur. Sudah gabisa saya urus lagi karena saya sudah jarang di rumah', 'Belum Diadopsi', '3043Kevin.jpg'),
(22, 3042, 'Witi', 2004, 'Jantan', 'Di atas 2 tahun', 'Bulunya ga rontok, suka makan ikan mentah, dimandiin seminggu sekali biar wangi ya ????', 'Belum Diadopsi', '3042Witi.jpg'),
(23, 3043, 'Betty', 2006, 'Betina', 'Di atas 2 tahun', 'Tidak suka kerumunan banyak orang. Makan 2 kali sehari dengan royal canin', 'Belum Diadopsi', '3043Betty.jpg'),
(24, 3043, 'Jaja', 2001, 'Jantan', '1 - 2 tahun', 'Suka berkeliaran malam malam, makan 2x dengan pindang', 'Belum Diadopsi', '3043Jaja.jpg'),
(25, 3043, 'Gerry', 2001, 'Jantan', 'Di bawah 1 tahun', 'Kucing manja, suka tidurnya di tempat yg empuk..', 'Belum Diadopsi', '3043Gerry.jpg'),
(26, 3042, 'Cici', 2002, 'Betina', 'Di atas 2 tahun', 'Udah ga bisa urus kucing lagi karena sekeluarga alergi bulu kucing :(', 'Belum Diadopsi', '3042Cici.jpg'),
(27, 3042, 'Lucy', 2002, 'Betina', 'Di atas 2 tahun', 'Kucing punya ponakan.. gamau urus lagi katanya.. Ini sudah steril, ga nakal juga, siap adopsi..', 'Belum Diadopsi', '3042Lucy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pencarian`
--

CREATE TABLE `pencarian` (
  `id_pencarian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `p_id_ras` varchar(255) DEFAULT NULL,
  `p_jenis_kelamin` varchar(255) DEFAULT NULL,
  `p_umur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencarian`
--

INSERT INTO `pencarian` (`id_pencarian`, `id_user`, `p_id_ras`, `p_jenis_kelamin`, `p_umur`) VALUES
(2, 3037, '2003', 'Betina', '1 - 2 tahun'),
(4, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(5, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(6, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(7, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(8, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(9, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(10, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(11, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(12, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(13, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(14, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(15, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(16, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(17, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(18, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(19, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(20, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(21, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(22, 3037, '2001', 'Jantan', 'Di bawah 1 tahun'),
(23, 3037, '2001', 'Betina', 'Di bawah 1 tahun'),
(24, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(25, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(26, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(27, 3037, '2001', 'Jantan', 'Di atas 2 tahun'),
(28, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(29, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(30, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(31, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(32, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(33, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(34, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(35, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(36, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(37, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(38, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(39, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(40, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(41, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(42, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(43, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(44, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(45, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(46, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(47, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(48, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(49, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(50, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(51, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(52, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(53, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(54, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(55, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(56, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(57, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(58, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(59, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(60, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(61, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(62, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(63, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(64, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(65, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(66, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(67, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(68, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(69, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(70, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(71, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(72, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(73, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(74, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(75, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(76, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(77, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(78, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(79, 3037, '2006', 'Jantan', '1 - 2 tahun'),
(80, 3037, '2009', 'Betina', 'Di bawah 1 tahun'),
(81, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(82, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(83, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(84, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(85, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(86, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(87, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(88, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(89, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(90, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(91, 3037, '2011', 'Betina', 'Di atas 2 tahun'),
(92, 3037, '2001', 'Jantan', '1 - 2 tahun'),
(93, 3037, '2008', 'Betina', 'Di bawah 1 tahun'),
(94, 3037, '2006', 'Jantan', '1 - 2 tahun'),
(95, 3037, '2007', 'Betina', 'Di bawah 1 tahun'),
(96, 3043, '2001', 'Betina', 'Di bawah 1 tahun'),
(97, 3043, '2001', 'Jantan', '1 - 2 tahun'),
(98, 3043, '2001', 'Jantan', '1 - 2 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `ras_kucing`
--

CREATE TABLE `ras_kucing` (
  `id_ras` int(11) NOT NULL,
  `nama_ras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ras_kucing`
--

INSERT INTO `ras_kucing` (`id_ras`, `nama_ras`) VALUES
(2001, 'Kucing Domestik'),
(2002, 'Kucing Persia'),
(2003, 'Kucing Anggora'),
(2004, 'Kucing Siam'),
(2005, 'Kucing Ragdoll'),
(2006, 'Kucing Maine Coon'),
(2007, 'Kucing Sphynx'),
(2008, 'Kucing Russian Blue'),
(2009, 'Kucing Bengal'),
(2010, 'Kucing British Shorthair'),
(2011, 'Kucing American Shorthair'),
(2012, 'Kucing Scottish Fold'),
(2013, 'Kucing Balinese');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `no_telfon` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama`, `id_kota`, `no_telfon`, `alamat`) VALUES
(3001, 'aazzeezee', 'azizi123', 'aazizi@mail.com', 'Ahmad Azizi', 1001, '081234567890', 'Jalan Pondok Indah 4 no 321, Jakarta Selatan'),
(3002, 'naffisri', 'naffnaff', 'naffnaf@mail.com', 'Naflah Isri', 1002, '087811234599', 'Jalan Cihampelas no 75, Bandung Barat'),
(3003, 'aminamina', 'minaa27', 'aminaa27@mail.com', 'Aminah Mina', 1003, '083456671122', 'Jalan Raya Pajajaran no 4A, Bogor Timur'),
(3004, 'yuliawrny', 'yulwarn11', 'yulwarn@mail.com', 'Yulia Warnaya', 1004, '082100998877', 'Jalan St. Depok Lama no 109'),
(3005, 'ramran', 'passwordamran', 'amranr90@mail.com', 'Robert Amran', 1005, '087199887752', 'Jalan Kisamaun no 43 blok A'),
(3006, 'juliakebalik', 'juljul', 'juliaanih@mail.com', 'Julia Ailuj', 1006, '082299876543', 'Jalan Veteran Blok 2C no 71'),
(3007, 'sintarmn', 'sintaa2323', 'sintaramanit23@mail.com', 'Sinta Ramanita', 1007, '087865214356', 'Jalan Raya Pandeglang Blok C no C54'),
(3008, 'taykania', 'tayakan', 'kania2001@mail.com', 'Kania Taya', 1008, '087711223344', 'Jalan Sultan Hassanudin no 74, Tambun Selatan'),
(3009, 'senal', '991234', 'sensena99@mail.com', 'Sena Al-Sen', 1009, '081233445678', 'Jalan Gamelan Kidul no 12, Keraton'),
(3010, 'rifaarnti', 'ariantii', 'rifaaarianti@mail.com', 'Rifa Arianti', 1010, '082234561980', 'Jalan Seroja Dalam IV no 1, RT 4, RW 5, Semarang Tengah'),
(3037, 'sarah', 'sarah', 'sarahhanifah@upi.edu', 'Sarah', 1002, '085314631505', 'Sariwangi Kec. Parongpong 40559'),
(3042, 'jett', 'jett', 'jett@mail.com', 'jett', 1002, '000000000', 'breeze'),
(3043, 'reyna', 'reyna', 'reyna@mail.com', 'reyna', 1009, '123456789', 'icebox');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`id_kucing`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ras` (`id_ras`);

--
-- Indexes for table `pencarian`
--
ALTER TABLE `pencarian`
  ADD PRIMARY KEY (`id_pencarian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ras_kucing`
--
ALTER TABLE `ras_kucing`
  ADD PRIMARY KEY (`id_ras`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kota` (`id_kota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `kucing`
--
ALTER TABLE `kucing`
  MODIFY `id_kucing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pencarian`
--
ALTER TABLE `pencarian`
  MODIFY `id_pencarian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `ras_kucing`
--
ALTER TABLE `ras_kucing`
  MODIFY `id_ras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3044;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kucing`
--
ALTER TABLE `kucing`
  ADD CONSTRAINT `kucing_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `kucing_ibfk_2` FOREIGN KEY (`id_ras`) REFERENCES `ras_kucing` (`id_ras`);

--
-- Constraints for table `pencarian`
--
ALTER TABLE `pencarian`
  ADD CONSTRAINT `pencarian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
