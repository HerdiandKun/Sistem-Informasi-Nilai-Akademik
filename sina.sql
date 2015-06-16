-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 12 Des 2014 pada 11.15
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sina`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `kode_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`kode_admin`, `nama`) VALUES
(1, 'Budi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_dosen`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_dosen` (
  `NIP` varchar(25) NOT NULL,
  `kode_mk` varchar(6) NOT NULL,
  `jam_mengajar` int(11) NOT NULL,
  UNIQUE KEY `kode_mk` (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_dosen`
--

INSERT INTO `tbl_detail_dosen` (`NIP`, `kode_mk`, `jam_mengajar`) VALUES
('1', 'DIP002', 14),
('1', 'DIP004', 30),
('1', 'INF001', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE IF NOT EXISTS `tbl_dosen` (
  `NIP` varchar(25) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `kode_dosen` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NIP`),
  UNIQUE KEY `kode_dosen` (`kode_dosen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`NIP`, `Nama`, `kode_dosen`) VALUES
('1', 'Prof. Herdiyan Septa Nugroho, S.Kom, M.Kom, ', 1),
('1234545.4535.345.', 'Septa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konten`
--

CREATE TABLE IF NOT EXISTS `tbl_konten` (
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konten`
--

INSERT INTO `tbl_konten` (`konten`) VALUES
('<p style="text-align:center"><span style="font-size:20px">Selamat Datang di Sistem Informasi Nilai Akademi</span>k</p>\r\n\r\n<p style="text-align:center">Tahun Ajaran 2014/2015</p>\r\n\r\n<p style="text-align:center"><span style="font-size:28px"><strong>Program Diploma</strong></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:28px"><strong>Institut Pertanian Bogor</strong></span></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tbl_mahasiswa` (
  `nim` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pk` varchar(3) NOT NULL,
  `Semester` int(11) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `id_pk`, `Semester`, `alamat`) VALUES
('J3B112109', 'Dinarsih', 'P', '2014-11-05', 'AKN', 3, 'Bogor'),
('J3B112186', 'Almira Maharani ', 'P', '1994-11-03', 'EKW', 5, 'msd'),
('J3C112048', 'Miatriana', 'P', '1994-05-24', 'INF', 5, 'Cimahpar'),
('J3C112144', 'Muhammad Arif Kalbu Adi ', 'L', '1995-01-12', 'INF', 5, 'Bekasi'),
('J3C112167', 'Herdiyan Septa Nugroho', 'L', '1994-09-18', 'INF', 5, 'Ponorogo'),
('J3D112155', 'Hanum B', 'L', '1995-01-12', 'TEK', 1, 'Nganjuk\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `tbl_mata_kuliah` (
  `kode_mk` varchar(6) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  PRIMARY KEY (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mata_kuliah`
--

INSERT INTO `tbl_mata_kuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('DIP001', 'Bahasa Indonesia', 3),
('DIP002', 'Kewirausahaan', 3),
('DIP003', 'Bahasa Inggris', 3),
('DIP004', 'Aplikom', 3),
('INF001', 'Sistem Operasi', 4),
('INF002', 'Aljabar Linier', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
  `nim` varchar(9) NOT NULL,
  `kode_mk` varchar(6) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nim`, `kode_mk`, `nilai`) VALUES
('J3C112048', 'DIP002', 'A'),
('J3C112144', 'DIP002', 'AB'),
('J3C112167', 'DIP002', 'B'),
('J3C112048', 'DIP004', 'BC'),
('J3C112144', 'DIP004', 'AB'),
('J3C112167', 'DIP004', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket_krs`
--

CREATE TABLE IF NOT EXISTS `tbl_paket_krs` (
  `kode_mk` varchar(6) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `IPK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket_krs`
--

INSERT INTO `tbl_paket_krs` (`kode_mk`, `nim`, `IPK`) VALUES
('DIP001', 'J3C112048', 0),
('DIP001', 'J3C112144', 0),
('DIP001', 'J3C112167', 0),
('DIP002', 'J3C112048', 0),
('DIP002', 'J3C112144', 0),
('DIP002', 'J3C112167', 0),
('DIP003', 'J3C112048', 0),
('DIP003', 'J3C112144', 0),
('DIP003', 'J3C112167', 0),
('DIP004', 'J3C112048', 0),
('DIP004', 'J3C112144', 0),
('DIP004', 'J3C112167', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kode_admin` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`username`, `password`, `status`, `nim`, `nip`, `kode_admin`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, '', '0', 1),
('fdgf', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', '1234545.4535.345.', 0),
('Herdian', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', '1', 0),
('J3B112186', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'J3B112186', '', 0),
('J3C112048', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'J3C112048', '', 0),
('J3C112144', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'J3C112144', '', 0),
('J3C112167', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'J3C112167', '', 0),
('J3D112155', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'J3D112155', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_program_keahlian`
--

CREATE TABLE IF NOT EXISTS `tbl_program_keahlian` (
  `id_pk` varchar(3) NOT NULL,
  `nama_pk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_program_keahlian`
--

INSERT INTO `tbl_program_keahlian` (`id_pk`, `nama_pk`) VALUES
('KMN', 'Komunikasi'),
('EKW', 'Ekowisata'),
('INF', 'Manajemen Informatika'),
('TEK', 'Teknik Komputer'),
('GZI', 'Manajemen Industri Makanan dan Gizi'),
('JMP', 'Superviser Jaminan Mutu Pangan'),
('PVT', 'Paramedik Veteriner'),
('MNI', 'Manajemen Industri'),
('PKS', 'Perkebunan Kelapa Sawit'),
('MAB', 'Manajemen Agribisnis'),
('TIB', 'Teknologi Industri Benih'),
('IKN', 'Teknologi Produksi dan Manajemen Perikanan Budiday'),
('TNK', 'Teknologi Manajemen Ternak'),
('ANK', 'Analisis Kimia'),
('LNK', 'Teknik Manajemen Lingkungan'),
('AKN', 'Akuntansi'),
('TMP', 'Teknologi dan Manajemen Produksi Perkebunan'),
('PPP', 'Produksi dan Pengembangan Pertanian Terpadu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
