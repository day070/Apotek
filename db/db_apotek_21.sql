-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2024 at 02:43 AM
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
-- Database: `db_apotek_21`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_obat` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` double NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_obat`, `jumlah`, `harga_satuan`, `total_harga`) VALUES
(3821, 1, 5, 1, 7000, 7000),
(3822, 2, 3, 1, 5500, 5500),
(3823, 3, 4, 1, 13000, 13000),
(3824, 4, 2, 1, 3200, 3200),
(3825, 5, 4, 1, 13000, 13000),
(3826, 6, 5, 2, 7000, 14000),
(3827, 8, 6, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `telp`) VALUES
(1, 'Muhammad Iqbal', 'Jalan Pulau Enggano', '08997772882'),
(2, 'Adi Kusuma', 'Jalan Pulau Saelus no 80', '0874910203'),
(3, 'Fernando Simatupang', 'Jalan Nusa Kambangan No 99', '08857491923'),
(4, 'Arya Faisal', 'Jalan Pulau Ayu No 28', '0883918274'),
(5, 'Muhammad Sufyan', 'Jalan Teuku Umar No 100', '08977384912'),
(6, 'Alif Rizki Raditya', 'Jalan Pulau Bungin No 200', '08749275239'),
(7, 'Tugus Maha ', 'Jalan Tukad Citarum No 150', '089774928209');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `level_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_karyawan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `level_user`, `id_karyawan`) VALUES
(1, '2gus', 'admin', 'Admin', 7),
(2, 'arya.faisal', 'admin123', 'Admin', 4),
(3, 'Fernando', 'admin', 'Admin', 3),
(4, 'iqbal123', 'iqbal123', 'Admin', 1),
(5, 'k.adi', 'adikusuma1', 'Admin', 2),
(6, 'msufyan', 'aksdoe929a', 'Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int NOT NULL,
  `id_supplier` int NOT NULL,
  `nama_obat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok_obat` int NOT NULL,
  `keterangan_obat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `id_supplier`, `nama_obat`, `kategori`, `harga_jual`, `harga_beli`, `stok_obat`, `keterangan_obat`) VALUES
(1, 1, 'Bodrex Extra 4 Kaplet', 'Kaplet', 2180, 2180, 33, 'Sakit kepala adalah rasa sakit atau nyeri di kepala, yang bisa muncul secara bertahap atau mendadak. Nyeri bisa muncul di salah satu sisi kepala, atau di seluruh bagian kepala. Sakit kepala bisa membuat kepala terasa berdenyut, atau seperti terlilit kencang oleh tali. Sakit kepala bisa terasa ringan hingga berat, dan dapat berlangsung beberapa jam hingga berhari-hari. Umumnya sakit kepala dapat diobati dengan obat-obatan antinyeri yang dijual bebas. Salah satu obat yang dapat Anda konsumsi adalah Bodrex.'),
(2, 2, 'Mixagrip Strip Isi 4 Obat', 'Kaplet', 3200, 3200, 22, 'Indikasi Umum\r\nMenyembuhkan gejala flu seperti bersin-bersin, hidung berair, hidung tersumbat, demam, sakit kepala, dan nyeri otot.\r\n\r\nDeskripsi\r\nMIXAGRIP FLU adalah obat yang digunakan untuk meringankan gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin.\r\n\r\nKategori\r\nBatuk dan Flu\r\n\r\nKomposisi\r\nParacetamol 500 mg, Phenylephrine HCl 15 mg, Chlorpheniramin maleate 2 mg\r\n\r\nDosis\r\nDewasa : 3 - 4 kali per hari 1 - 2 tablet. Anak : 3 - 4 kali per hari 1/2 - 1 tablet\r\n\r\nAturan Pakai\r\nSesudah makan\r\n\r\nKemasan\r\nDus, 25 Catch Cover @ 1 Strip @ 4 kaplet'),
(3, 3, 'Omeprazole 20 Mg', 'Pil', 5500, 5500, 123, 'Omeprazole obat apa? Omeprazole Novell merupakan obat generik dengan zat aktif Omeprazole yang digunakan untuk mengatasi penyakit-penyakit yang disebabkan oleh kelebihan produksi asam lambung, seperti sakit maag dan tukak lambung.\r\n\r\nMekanisme kerja dari Omeprazole yaitu: • Omeprazole termasuk golongan PPI (Proton Pump Inhibitor) yang efektif bekerja dengan menghambat sekresi asam lambung melalui sistem enzim adenosin trifosfatase hidrogen-kalium (pompa proton) dari sel parietal lambung. \r\n\r\nKomposisi\r\n\r\nOmeprazole\r\n\r\nKemasan\r\n\r\n1 Dos isi 3 Strip x 10 Tablet\r\n\r\nIndikasi / Manfaat / Kegunaan :\r\n\r\nTerapi jangka pendekulkus duodenal dan lambung. Refluks esofagitis, sindroma Zollinger-Ellison\r\n\r\nSub Kategori\r\n\r\nAntasid, Obat Antirefluks & Antiulserasi'),
(4, 4, 'Panadol Paracetamol Obat', 'Kaplet', 13000, 13000, 12, 'aplet penurun panas dan pereda nyeri yang mengandung parasetamol\r\n• Dapat membantu menurunkan demam\r\n• Dapat membantu meringankan rasa sakit seperti sakit kepala dan sakit gigi\r\n• Dapat membantu meringankan sakit pada otot'),
(5, 5, 'Dermacolin 10 Tablet', 'Tablet', 7000, 7000, 20, 'Deskripsi DEMACOLIN 10 TABLET merupakan obat yang mengandung Paracetamol, Pseudoephedrine HCl, dan Chlorpheniramine maleat. Obat ini bekerja sebagai analgesik-antipiretik, antihistamin dan dekongestan hidung, dimana obat ini digunakan untuk meringankan gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin. Indikasi Umum Obat ini digunakan untuk meringankan gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin. Komposisi Paracetamol 500 mg, Pseudoefedrin HCL 7.5 mg, Klorfeniramin maleat 2 mg. Dosis Dewasa : 1 tablet 3 kali per hari. Anak 6-12 tahun : 0.5 tablet 3 kali sehari. Aturan Pakai Sebelum atau sesudah makan. Produsen Coronet Crown Nomor Izin Edar: BPOM: DTL7204217010A1'),
(6, 4, 'Wawad', 'test', 12000, 15000, 21, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `usia` int NOT NULL,
  `bukti_foto_resep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_lengkap`, `alamat`, `telp`, `usia`, `bukti_foto_resep`) VALUES
(1, 'Bezaleel Elderoy Sulastiyo', 'Jalan Tukad Citarum', '08833919274', 17, '129230.jpeg'),
(2, 'Aurelio Fransiskus Sinarta', 'Jalan Pulau Ayu No 27', '08771298334', 17, '93840.jpeg'),
(3, 'Muhammad Jaffan Hanindito', 'Jalan Patih Jelantik', '08744219335', 18, '759819.jpeg'),
(4, 'M. Hidayatullah', 'Jalan Nangka Selatan No 90', '08774912398', 20, '38520.jpeg'),
(5, 'Henri Saputra', 'Jl Pulau Buton No 100', '089371274945', 18, 'icons8-valorant-96.png'),
(17, 'Sadewa Bharaka', 'Jalan Tukad Citarum', '08793845566', 33, '116-1164164_logo-router-packet-tracer-hd-png-download.png'),
(19, 'Gede Rama Paramartha', 'Jln Pacitan', '0892121', 18, 'ePzKnRg83f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `perusahaan`, `telp`, `alamat`, `keterangan`) VALUES
(1, 'PT Semua Obat', '08917738849', 'Jl Tukad Citarum No. 1 Denpasar Selatan', 'Supplier obat obatan'),
(2, 'PT Kimia Farma', '087722388991', 'Jalan Tukad Citarum No 2 Denpasar Selatan', 'supplier obat sirup'),
(3, 'PT Rajawali Obat', '087733992299', 'Jalan Tukad Citarum No 30 Denpasar', 'supplir obat pak rusdi\r\n'),
(4, 'PT Fransiskus Abadi', '083199988774', 'Jalan Pulau Bungin No 24', 'supplier obat'),
(5, 'PT Indobat', '08887722883', 'Jalan Raya Kuta no 151', 'obat obatan'),
(6, 'PT Global Digital Verse', '08749212345', 'Jalan Pulau Ayu', 'Obat Herbal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `kategori_pelanggan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_bayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan`, `id_karyawan`, `tanggal_transaksi`, `kategori_pelanggan`, `total_bayar`, `bayar`, `kembali`) VALUES
(1, 1, 1, '2024-08-10 00:00:00', 'Reguler', 7000, 10000, 3000),
(2, 2, 2, '2024-08-09 00:00:00', 'Reguler', 5500, 6000, 500),
(3, 3, 3, '2024-07-16 00:00:00', 'Reguler', 13000, 15000, 2000),
(4, 4, 4, '2024-08-10 00:00:00', 'Reguler', 3200, 5000, 1800),
(5, 5, 5, '2024-08-10 00:00:00', 'Reguler', 20000, 20000, 0),
(6, 3, 3, '2024-09-20 10:32:19', 'Kocak', 14000, 15000, 1000),
(7, 1, 3, '2024-09-21 09:08:20', 'umum', 0, 0, 0),
(8, 19, 3, '2024-09-21 09:08:52', 'Reguler', 12000, 15000, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `FK_idtransaksi` (`id_transaksi`),
  ADD KEY `FK_idobat` (`id_obat`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `idkaryawan` (`id_karyawan`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `supplier` (`id_supplier`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_karyawan` (`id_karyawan`),
  ADD KEY `FK_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3828;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `FK_idobat` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idtransaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `FK_login` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `FK_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `FK_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
