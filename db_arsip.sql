-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2022 pada 13.10
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', '1471275613_Screen Shot 2019-10-11 at 16.26.42.png'),
(2, 'rizki', 'rizki', 'rizki', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `arsip_waktu_upload` datetime NOT NULL,
  `arsip_petugas` int(11) NOT NULL,
  `arsip_kode` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_jenis` varchar(255) NOT NULL,
  `arsip_kategori` int(11) NOT NULL,
  `arsip_keterangan` text NOT NULL,
  `arsip_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `arsip_waktu_upload`, `arsip_petugas`, `arsip_kode`, `arsip_nama`, `arsip_jenis`, `arsip_kategori`, `arsip_keterangan`, `arsip_file`) VALUES
(2, '2019-10-10 15:09:59', 4, '21xxb', 'dada', 'png', 0, '', '1162363338_Screen Shot 2019-10-10 at 13.22.15.png'),
(3, '2019-10-10 16:02:44', 4, 'asd', 'asdasd 2x', 'pdf', 3, 'asdasd', '432536246_mamunur.pdf'),
(4, '2019-10-12 17:02:16', 5, 'MN-002', 'Contoh Surat Izin Pelaksanaan', 'pdf', 4, 'Ini Contoh Surat Izin Pelaksanaan', '1352467019_c4611_sample_explain.pdf'),
(5, '2019-10-12 17:03:01', 5, 'MN-003', 'Contoh Keputusan Kerja', 'pdf', 3, 'Contoh Keputusan Kerja pegawai', '1765932248_Contoh-surat-lamaran-kerja-pdf (1).pdf'),
(6, '2019-10-12 17:03:37', 5, 'MN-004', 'Contoh Surat Izin Pegawai', 'pdf', 7, 'berikut Contoh Surat Izin Pegawai untuk pelaksana kerja', '1651167980_instructions-for-adding-your-logo.pdf'),
(7, '2019-10-12 17:04:30', 5, 'MN-005', 'Contoh SPK Proyek Kontraktor', 'pdf', 5, 'Contoh SPK Proyek Kontraktor adalah contoh surat SPK KONTRAK', '142845393_OoPdfFormExample.pdf'),
(8, '2019-10-12 17:05:22', 5, 'MN-006', 'SPK Kontrak Jembatan', 'pdf', 6, 'Surat SPK Kontrak Jembatan Layang', '106615077_sample-link_1.pdf'),
(9, '2019-10-12 17:06:55', 6, 'MN-008', 'Contoh Curiculum Vitae Untuk Lamaran Kerja', 'pdf', 10, 'Contoh Curiculum Vitae Untuk Lamaran Kerja untuk pegawai baru', '927990343_pdf-sample(1).pdf'),
(10, '2019-10-12 17:07:30', 6, 'MN-009', 'Surat Cuti Sakit Pegawai', 'pdf', 7, 'Contoh Surat Cuti Sakit Pegawai baru', '2071946811_PEMBUATAN FILE PDF_FNH_tamim (1).pdf'),
(11, '2021-11-11 22:24:34', 4, '', '', 'pdf', 0, '', '1492354991_Contoh Surat Lampiran Skripsi.pdf'),
(24, '2022-07-26 20:36:34', 4, '99oo.llk', 'dandi', 'pdf', 10, 'lll', '1523056959_Prakt12 Pengukuran QoS Streaming Server.pdf'),
(26, '2022-07-28 11:39:33', 4, '', '', '', 0, '', '1152181988_'),
(27, '2022-07-28 11:42:14', 4, '', '', '', 0, '', '90449928_'),
(28, '2022-07-28 14:54:46', 4, '', '', 'pdf', 0, '', '2054141121_Prakt12 Pengukuran QoS Streaming Server.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsipp`
--

CREATE TABLE `arsipp` (
  `arsip_idd` int(15) NOT NULL,
  `arsip_waktu_uploadd` datetime NOT NULL,
  `arsip_petugass` int(15) NOT NULL,
  `arsip_kodee` varchar(255) NOT NULL,
  `arsip_namaa` varchar(255) NOT NULL,
  `arsip_jeniss` varchar(255) NOT NULL,
  `arsip_filee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arsipp`
--

INSERT INTO `arsipp` (`arsip_idd`, `arsip_waktu_uploadd`, `arsip_petugass`, `arsip_kodee`, `arsip_namaa`, `arsip_jeniss`, `arsip_filee`) VALUES
(1, '2022-07-06 00:00:00', 4, 'dada22', 'sada', 'pdf', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_npwp`
--

CREATE TABLE `arsip_npwp` (
  `arsipp_id` int(15) NOT NULL,
  `arsipp_waktu_upload` datetime NOT NULL,
  `arsipp_petugas` int(15) NOT NULL,
  `id_npwp` int(15) NOT NULL,
  `jenis_arsip` varchar(255) NOT NULL,
  `file_arsip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arsip_npwp`
--

INSERT INTO `arsip_npwp` (`arsipp_id`, `arsipp_waktu_upload`, `arsipp_petugas`, `id_npwp`, `jenis_arsip`, `file_arsip`) VALUES
(16, '2022-07-28 18:50:31', 4, 7, 'pdf', '1649726680_Prakt12 Pengukuran QoS Streaming Server.pdf'),
(19, '2022-07-29 19:15:25', 4, 6, 'pdf', '1020942145_PERANCANGAN PROYEK 1_KELOMPOK 2_TT4D.pdf'),
(22, '2022-07-29 21:01:10', 4, 7, 'docx', '1616595638_PERANCANGAN PROYEK 1_KELOMPOK 2_TT4D.docx'),
(59, '2022-07-29 23:22:47', 4, 9, 'pdf', '312898944_PERANCANGAN PROYEK 1_KELOMPOK 2_TT4D.pdf'),
(73, '2022-07-30 10:09:54', 4, 11, 'pdf', '1504597045_Diagram Hubungan.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`) VALUES
(1, 'Tidak berkategori', 'Semua yang tidak memiliki kategori'),
(3, 'Surat Keputusan', 'Format arsip untuk surat keputusan\r\n'),
(4, 'Surat Izin Pelaksanaan', 'Contoh format surat izin pelaksaan pekerjaan'),
(5, 'Surat Perintah Kerja Proyek jalan', 'Contoh format surat perintah untuk pekerjaan proyek jalan'),
(6, 'Surat Perintah Kerja Proyek Jembatan', 'Contoh format untuk surat perintah kerja proyek jembatan'),
(7, 'Surat Kesehatan Pegawai', 'Surat kesehatan untuk pegawai'),
(8, 'Surat Lampiran Skripsi', 'Surat contoh lampiran untuk skripsi'),
(10, 'Curiculum Vitae', 'Contoh format surat curiculum vitae untuk kenaikan jabatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_foto`) VALUES
(4, 'Vikrih Yanto', 'petugas1', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Junaidi Mus', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', ''),
(6, 'Jamilah Suanda', 'petugas3', '32408919e7c985cf5439ebda3e1eb0f5', ''),
(8, 'sasda', 'dada', '$2y$10$b93IRNFfVNPhCwPBoA3nfOWlYMv5buJ/fssTUyDjCjePRD9wJFygq', ''),
(9, 'ddd', 'ddd', '$2y$10$jM4rE/FMh2tN1A0nmS6gAeSDYkG2QmvVnLFDzDlwKomyydnT8cqdy', ''),
(10, 'ss', 'ss', '$2y$10$rix/GcImBwV.oyMNlW0x8eVdLRuE1jCjQ.uHA62/sLE5Xiv/pEk8q', 'diblok2.png'),
(11, 'sdadsa', 'dasad', '$2y$10$.5LyKxngFFGV5zf2gCdAP.JSlubQS6.BXtoCt6XseZjGVKV7w9i1y', 'mikon2.png'),
(12, 'fdfd', 'fdfdf', '$2y$10$cF1ZmtACRTGzSPeNUQzDUOxLl.bXxjgM/ZBEZphL7s1VFZM00vgOi', 'flowchart1.png'),
(13, 'aa', 'aaaa', '$2y$10$7L3YaTN.XEw86Kp2tkYrweuLsevOs9gH7DZhZAKcrBfHOO36bIw.i', 'flowchart1.png'),
(14, 'dandi', 'dandi', '$2y$10$OE3pKCcHqou7UpEOB3Gt1u6iJ03MEdGpfoQzK3wYzca7AxacNmc9u', 'flowchart1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_waktu` datetime NOT NULL,
  `riwayat_user` int(11) NOT NULL,
  `riwayat_arsip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_waktu`, `riwayat_user`, `riwayat_arsip`) VALUES
(1, '2019-10-11 15:32:29', 8, 3),
(2, '2019-10-12 17:09:31', 8, 10),
(3, '2019-10-12 17:09:45', 8, 9),
(16, '2022-07-30 15:17:39', 8, 16),
(17, '2022-07-30 15:17:59', 8, 16),
(18, '2022-07-30 15:20:19', 8, 16),
(19, '2022-07-30 15:20:52', 8, 16),
(20, '2022-07-30 15:22:57', 8, 16),
(21, '2022-07-30 15:29:49', 8, 24),
(22, '2022-07-30 15:30:29', 8, 16),
(23, '2022-07-30 15:32:02', 8, 16),
(24, '2022-07-30 15:32:27', 8, 16),
(25, '2022-07-30 16:37:51', 17, 73),
(26, '2022-07-30 17:46:47', 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_npwp`
--

CREATE TABLE `tb_npwp` (
  `npwp_id` int(15) NOT NULL,
  `npwp_waktu_upload` datetime NOT NULL,
  `npwp_petugas` int(11) NOT NULL,
  `no_npwp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_npwp`
--

INSERT INTO `tb_npwp` (`npwp_id`, `npwp_waktu_upload`, `npwp_petugas`, `no_npwp`, `nama`) VALUES
(7, '2022-07-28 15:11:17', 4, 'dandi.899', 'jakung'),
(11, '2022-07-28 18:55:50', 4, '90.dandim', 'dandi'),
(12, '2022-07-30 12:33:58', 4, '09.77.66.dandi', 'maulana'),
(13, '2022-07-30 13:27:21', 4, '88.33.maulana', 'dandi maulana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(8, 'Samsul Bahri', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', ''),
(9, 'Reza Yuzanni', 'user2', '7e58d63b60197ceb55a1c487989a3720', ''),
(10, 'Ajir Muhajier', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', ''),
(11, 'Cut Nanda Somay', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', ''),
(12, 'afika putri', 'afika2021', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(13, 'Iswatul Hasanah', 'iswatul', '202cb962ac59075b964b07152d234b70', ''),
(14, 'sdadas', 'asdadadsd', '$2y$10$.5kgsX7NsG6zqofEbo4Ol.lBKEsdYeIcxUPaMOoEcKCUNaFt/HSH.', 'flowchart1.png'),
(16, 'ss', 'sss', '$2y$10$KrGTF.HGaX6flQKZmoJLeuwXU0MsrhoXMZ1TXq91Odz6NykJZ6gCO', 'diblok2.png'),
(17, 'dandi', 'dandi', '$2y$10$gsBA4DiZzvorkHHMYsBCt.h.yvtl0hh5XOoUtxHsj593CtvnWQiDi', 'dandi.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indeks untuk tabel `arsipp`
--
ALTER TABLE `arsipp`
  ADD PRIMARY KEY (`arsip_idd`);

--
-- Indeks untuk tabel `arsip_npwp`
--
ALTER TABLE `arsip_npwp`
  ADD PRIMARY KEY (`arsipp_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indeks untuk tabel `tb_npwp`
--
ALTER TABLE `tb_npwp`
  ADD PRIMARY KEY (`npwp_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `arsipp`
--
ALTER TABLE `arsipp`
  MODIFY `arsip_idd` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `arsip_npwp`
--
ALTER TABLE `arsip_npwp`
  MODIFY `arsipp_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_npwp`
--
ALTER TABLE `tb_npwp`
  MODIFY `npwp_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
