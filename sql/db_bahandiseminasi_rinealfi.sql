-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 01:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balitklimat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_id`, `stok`, `satuan_id`) VALUES
(7, 'Pulpen Tali', 2, -51, 4),
(8, 'Info Agroklimat dan Hidrologi', 2, 9, 1),
(10, 'Tas Blacu', 4, 3, 2),
(11, 'Buku Tahunan', 2, 100, 2),
(12, 'Buletin Agroklimat dan Hidrologi', 2, 17, 1),
(13, 'Tumblr', 3, 2, 4),
(14, 'Notebook', 2, 23, 2),
(17, 'Juknis', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah_keluar` int(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barangkeluar`, `tanggal_keluar`, `barang_id`, `jumlah_keluar`, `keterangan`, `foto`, `dokumen`, `status`) VALUES
(11, '2022-02-26', 12, 3, '-', 'fococlipping-20220105-530571.png', 'Barang_Masuk_Bahan_Diseminasi3.pdf', ''),
(12, '2022-02-26', 14, 5, '-', 'shopping-bag.png', 'Barang_Masuk_Bahan_Diseminasi4.pdf', ''),
(13, '2022-02-28', 12, 2, 'Barang Sesuai', 'color-palette-4295.png', 'Barang_Masuk_Bahan_Diseminasi5.pdf', ''),
(14, '2022-02-27', 10, 5, '-', 'NEW_POSTER_.jpg', 'INFB-5_Database_Komoditas.pdf', ''),
(15, '2022-02-27', 13, 1, '', '', '', ''),
(16, '2022-02-28', 11, 3, '-', '', '', '');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_keluar_edit` AFTER UPDATE ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar + OLD.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_keluar_hapus` AFTER DELETE ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + OLD.jumlah_keluar WHERE `barang`.`id_barang` = OLD.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_kembali`
--

CREATE TABLE `barang_kembali` (
  `id_barangkembali` int(25) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah_kembali` int(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `barang_idkeluar` int(25) NOT NULL,
  `fotokembali` varchar(255) DEFAULT NULL,
  `dokumenkembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_kembali`
--

INSERT INTO `barang_kembali` (`id_barangkembali`, `tanggal_kembali`, `jumlah_kembali`, `keterangan`, `barang_idkeluar`, `fotokembali`, `dokumenkembali`) VALUES
(9, '2022-02-23', 1, '-', 5, 'fococlipping-20220105-53057.png', '1-FRM_KESEDIAAN_PKL_TA_2122_INF_(1).pdf'),
(10, '2022-02-24', 2, '-', 7, 'WhatsApp Image 2021-10-02 at 14.50.50.jpeg', 'J3C119103_Rine_Alfi_Fitrianti_Latihan_5A.pdf'),
(11, '2022-02-27', 1, '-', 0, 'Screenshot_2022-02-09-20-00-51-43.png', 'Barang_Masuk_Bahan_Diseminasi5.pdf'),
(16, '2022-02-27', 3, '-', 0, 'shopping-bag.png', NULL),
(17, '2022-02-27', 1, '-', 0, 'return_(1).png', 'Barang_Masuk_Bahan_Diseminasi6.pdf'),
(18, '2022-02-28', 2, '-', 0, NULL, NULL),
(19, '2022-03-14', 1, '-', 11, 'icon.png', 'Profil_Instansi_Balai_Penelitian_Agroklimat_dan_Hidrologi.pdf'),
(22, '2022-02-28', 1, '-', 12, 'logo_hitam.png', ''),
(23, '2022-03-01', 1, 'Barang Sesuai', 13, 'Idul_Adha.png', 'PenjadwalanBaru.pdf'),
(24, '2022-02-28', 2, '-', 13, '', ''),
(25, '2022-02-27', 2, '-', 14, '', ''),
(26, '2022-02-23', 2, '-', 12, '', ''),
(27, '2022-02-28', 1, '-', 12, '', '');

--
-- Triggers `barang_kembali`
--
DELIMITER $$
CREATE TRIGGER `update_stok_kembali` BEFORE INSERT ON `barang_kembali` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_kembali WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_kembali_edit` AFTER UPDATE ON `barang_kembali` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_kembali - OLD.jumlah_kembali WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_kembali_hapus` AFTER DELETE ON `barang_kembali` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - OLD.jumlah_kembali WHERE `barang`.`id_barang` = OLD.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `tanggal_masuk`, `barang_id`, `jumlah_masuk`, `foto`, `dokumen`, `keterangan`) VALUES
(14, '2022-02-13', 8, 9, '', '', '-'),
(15, '2022-02-13', 10, 6, '', '', '-'),
(16, '2022-02-14', 12, 3, '', '', '-'),
(17, '2022-02-14', 7, 1, '', '', '-'),
(18, '2022-02-14', 10, 8, '', '', '-'),
(19, '2022-02-14', 11, 9, '', '', '-'),
(20, '2022-02-14', 8, 7, '', '', 'Ok'),
(22, '2022-02-15', 12, 9, '', '', 'Barang Sesuai'),
(23, '2022-02-17', 13, 1, '', '', 'Barang Sesuai'),
(24, '2022-02-17', 13, 9, '', '', '-'),
(25, '2022-02-18', 13, 5, '', '', 'asada'),
(26, '2022-02-18', 13, 10, '', '', 'Barang Sesuai'),
(27, '2022-02-17', 14, 5, '', '', 'Barang Sesuai'),
(28, '2022-02-18', 14, 5, '', '', '-'),
(29, '2022-02-17', 14, 6, NULL, NULL, '-'),
(30, '2022-02-17', 7, 10, '201911050941381.pdf', 'test', 'ini tes'),
(32, '2022-02-18', 14, 10, 'fococlipping-20220105-53057.png', 'Kegiatan_membuat_Kue.docx', '-'),
(33, '2022-02-19', 7, 10, '', '', ''),
(36, '2022-02-19', 7, 1, '', '', '-'),
(37, '2022-02-22', 8, 2, '', '', '-'),
(38, '2022-02-22', 10, 8, 'WhatsApp Image 2021-12-11 at 09.15.08 (1).jpeg', 'file_form_master_form__FRM012_docx.docx', '-'),
(39, '2022-02-22', 11, 3, 'shopping-bag.png', '', '-'),
(40, '2022-02-16', 11, 6, 'logo_hitam.png', 'User_Management_Aplikasi_Pengadaan_Barang.pdf', 'yayayaya'),
(41, '2022-02-26', 12, 2, 'icon3.png', 'file_form_master_form__FRM012_docx_(1)1.docx', '-');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_masuk_edit` AFTER UPDATE ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk - OLD.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_masuk_hapus` AFTER DELETE ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - OLD.jumlah_masuk WHERE `barang`.`id_barang` = OLD.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_golongan`
--

CREATE TABLE `data_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_golongan`
--

INSERT INTO `data_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'II C'),
(3, 'II D'),
(4, 'III A'),
(5, 'III C'),
(6, 'III C'),
(7, 'III D'),
(8, 'IV A'),
(9, 'IV B'),
(10, 'IV C'),
(11, 'IV D');

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `jabatan`) VALUES
(2, 'Plt. Kepala Balai'),
(3, 'Peneliti Ahli Utama'),
(4, 'Peneliti Ahli Madya');

-- --------------------------------------------------------

--
-- Table structure for table `data_pangkat`
--

CREATE TABLE `data_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pangkat`
--

INSERT INTO `data_pangkat` (`id_pangkat`, `pangkat`) VALUES
(1, 'Pembina Tk I'),
(2, 'Pembina Utama'),
(3, 'Pembina Utama Muda'),
(4, 'Pembina'),
(6, 'Penata'),
(7, 'Penata Tk I'),
(8, 'Pengatur Tk I');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `status_kepegawaian` varchar(15) NOT NULL,
  `pangkat` varchar(40) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_whatsapp` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `pumk` tinyint(1) NOT NULL,
  `kpa` tinyint(1) NOT NULL,
  `ppk` tinyint(1) NOT NULL,
  `pj` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `nama_pegawai`, `foto`, `golongan`, `status_kepegawaian`, `pangkat`, `jabatan`, `nik`, `email`, `password`, `no_whatsapp`, `admin`, `pumk`, `kpa`, `ppk`, `pj`) VALUES
('195805161993032002', 'Dr. Nani Heryani', 'fix_kolokium.jpg', 'IV D', 'PNS', 'Pembina Tk I', 'Peneliti Ahli Madya', '3271055605580006', 'administrator@gmail.com', '123456', '081235062988', 0, 0, 0, 0, 0),
('196401211990031002', 'Dr. Ir. A. Arivin Rivaie, M.Sc', '', '', '', '', 'Plt. Kepala Balai', '3271062101640004', 'bogorfood.kel8@gmail.com', '12345678', '081235062988', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_role`
--

CREATE TABLE `data_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_role`
--

INSERT INTO `data_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(3, 'PUMK'),
(4, 'Bendahara ');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(2, 'Alat Tulis'),
(3, 'Alat Makan'),
(4, 'Tas'),
(8, 'Cenderamata');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_disposisi`
--

CREATE TABLE `riwayat_disposisi` (
  `id_riwayat` int(11) NOT NULL,
  `suratmasuk_id` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `catatantam` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_disposisi`
--

INSERT INTO `riwayat_disposisi` (`id_riwayat`, `suratmasuk_id`, `isi`, `catatan`, `catatantam`, `user`, `nip`) VALUES
(1, 0, 'Harap Penyelesaian Selanjutnya', '', '0', '', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`) VALUES
(1, 'Lembar'),
(2, 'Pcs'),
(4, 'Unit'),
(5, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `sifat_surat`
--

CREATE TABLE `sifat_surat` (
  `id_sifatsurat` int(11) NOT NULL,
  `sifat_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sifat_surat`
--

INSERT INTO `sifat_surat` (`id_sifatsurat`, `sifat_surat`) VALUES
(1, 'Penting'),
(3, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `id_status_peg` int(11) NOT NULL,
  `status_kepegawaian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`id_status_peg`, `status_kepegawaian`) VALUES
(1, 'PNS'),
(2, 'PNS/TB'),
(3, 'CPNS'),
(5, 'PPNPN');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(25) NOT NULL,
  `sifatsurat_id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `tanggal_input` date NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `sifatsurat_id`, `kode`, `no_surat`, `tanggal_surat`, `asal_surat`, `perihal`, `dokumen`, `tanggal_input`, `no_urut`) VALUES
(1, 1, '0', 1, '2022-02-24', 'Balitklimat', 'Zoom', 'file_form_master_form__FRM012_docx (1).docx', '2022-02-24', 1),
(2, 3, '0', 1, '2022-02-24', 'Balitklimat', '-', '2MTF01628.pdf', '2022-02-25', 2),
(3, 1, 'HM.140', 2, '2022-02-25', 'Balitklimat', 'Surat Undangan', '592-1277-1-PB.pdf', '2022-02-26', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_idbarang` (`satuan_id`),
  ADD KEY `jenis_idbarang` (`jenis_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `barang_idkeluar` (`barang_id`);

--
-- Indexes for table `barang_kembali`
--
ALTER TABLE `barang_kembali`
  ADD PRIMARY KEY (`id_barangkembali`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `barang_idmasuk` (`barang_id`);

--
-- Indexes for table `data_golongan`
--
ALTER TABLE `data_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_pangkat`
--
ALTER TABLE `data_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_role`
--
ALTER TABLE `data_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `riwayat_disposisi`
--
ALTER TABLE `riwayat_disposisi`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  ADD PRIMARY KEY (`id_sifatsurat`);

--
-- Indexes for table `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD PRIMARY KEY (`id_status_peg`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_kembali`
--
ALTER TABLE `barang_kembali`
  MODIFY `id_barangkembali` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `data_golongan`
--
ALTER TABLE `data_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pangkat`
--
ALTER TABLE `data_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_role`
--
ALTER TABLE `data_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayat_disposisi`
--
ALTER TABLE `riwayat_disposisi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sifat_surat`
--
ALTER TABLE `sifat_surat`
  MODIFY `id_sifatsurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  MODIFY `id_status_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_idbarang` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `satuan_idbarang` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_idkeluar` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_idmasuk` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
