-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2023 pada 07.29
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimapoli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `nip_nik_anggota` bigint(25) NOT NULL,
  `nim_anggota` bigint(25) NOT NULL,
  `tugas` varchar(150) NOT NULL,
  `status_anggota` varchar(20) NOT NULL,
  `pengabdian_id` int(11) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `penelitian_id`, `nip_nik_anggota`, `nim_anggota`, `tugas`, `status_anggota`, `pengabdian_id`, `status_pesan`, `tahun_id`) VALUES
(8, 2, 199011202019031007, 0, 'Mengembangkan Aplikasi', 'Disetujui', 0, 1, 1),
(9, 2, 198906012019031015, 0, 'Mengembangkan Aplikasi', 'Disetujui', 0, 1, 1),
(10, 2, 0, 2001301001, 'Mengembangkan Aplikasi', '', 0, 1, 1),
(11, 3, 199007112015041001, 0, 'Melaksanakan', 'Disetujui', 0, 1, 1),
(12, 3, 150801144, 0, 'Melaksanakan', 'Disetujui', 0, 1, 1),
(13, 3, 0, 2201301116, 'Melaksanakan', '', 0, 1, 1),
(14, 3, 0, 2101402031, 'Melaksanakan', '', 0, 1, 1),
(15, 3, 0, 2101402025, 'Melaksanakan', '', 0, 1, 1),
(16, 4, 198607012019031008, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(17, 4, 150801144, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(18, 4, 0, 2101402023, 'Melaksanakan', '', 0, 0, 1),
(19, 4, 0, 2201301014, 'Melaksanakan', '', 0, 0, 1),
(20, 5, 211201256, 0, 'Melaksankan', 'Disetujui', 0, 0, 1),
(21, 5, 199005272020121002, 0, 'Melaksankan', 'Disetujui', 0, 0, 1),
(22, 5, 0, 2104301054, 'Melaksankan', '', 0, 0, 1),
(23, 5, 0, 2104301055, 'Melaksanakan', '', 0, 0, 1),
(24, 6, 198907312019032013, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(25, 6, 211201253, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(26, 6, 0, 2205401023, 'Melaksanakan', '', 0, 0, 1),
(27, 6, 0, 2205401005, 'Melaksanakan', '', 0, 0, 1),
(28, 7, 199007292019031017, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(29, 7, 198408022019031005, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(30, 7, 0, 2201301179, 'Melaksanakan', '', 0, 0, 1),
(31, 8, 210701231, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(32, 8, 211201237, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(33, 8, 0, 2106401015, 'Melaksnakan', '', 0, 0, 1),
(34, 8, 0, 2106401012, 'Melaksanakan', '', 0, 0, 1),
(35, 9, 198802252019032016, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(36, 9, 0, 2002301046, 'Melaksanakan', '', 0, 0, 1),
(37, 10, 170103174, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(38, 10, 199102132018032001, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(39, 10, 0, 2002301045, 'Melaksanakan', '', 0, 0, 1),
(40, 10, 0, 2002301060, 'Melaksanakan', '', 0, 0, 1),
(41, 11, 199608252022032005, 0, 'Melaksankan', 'Disetujui', 0, 0, 1),
(42, 11, 0, 2001301095, 'Melaksanakan', '', 0, 0, 1),
(43, 12, 161001163, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(44, 12, 211201256, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(45, 12, 0, 2104301106, 'Melaksanakan', '', 0, 0, 1),
(46, 13, 211201235, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(47, 13, 180912191, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(48, 13, 0, 21064011008, 'Melaksanakan', '', 0, 0, 1),
(49, 14, 198203232021212009, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(50, 14, 211201255, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(51, 14, 0, 2205401032, 'Melaksankan', '', 0, 0, 1),
(52, 14, 0, 2205401029, 'Melaksanakan', '', 0, 0, 1),
(53, 15, 198909032019032015, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(54, 15, 210301226, 0, 'Melaksanakan', 'Disetujui', 0, 0, 1),
(55, 15, 0, 2001302008, 'Melaksankan', '', 0, 0, 1),
(56, 15, 0, 2104301110, 'Melaksanakan', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen_logbook`
--

CREATE TABLE `tbl_dokumen_logbook` (
  `id_dok` int(11) NOT NULL,
  `logbook_id` int(11) NOT NULL,
  `dokumen_file` varchar(50) NOT NULL,
  `dokumen_foto` varchar(50) NOT NULL,
  `dokumen_url` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dokumen_logbook`
--

INSERT INTO `tbl_dokumen_logbook` (`id_dok`, `logbook_id`, `dokumen_file`, `dokumen_foto`, `dokumen_url`, `nama_file`) VALUES
(1, 1, 'd53302ca1bf3fda84a1d8728a946ec1d.pdf', 'Tidak Ada', 'Tidak Ada', 'kelompok-2-erd-reservasi-hotel.pdf'),
(2, 2, '44a7f1da95f073b560540d95ce5bd65d.pdf', 'Tidak Ada', 'Tidak Ada', 'kelompok-2-erd-reservasi-hotel.pdf'),
(3, 3, 'Tidak Ada', '45648905a554d4377fbaac748c30b61c.png', 'Tidak Ada', '4x6 Muhammad Syupyan Arpan_2001301157.png'),
(4, 3, 'e559e145deac6b7e611a2ae04d81d14b.pdf', 'Tidak Ada', 'Tidak Ada', 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf'),
(5, 3, 'Tidak Ada', 'Tidak Ada', 'www.google.com', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dok_lp_kemajuan`
--

CREATE TABLE `tbl_dok_lp_kemajuan` (
  `id_dok_lp` int(11) NOT NULL,
  `nama_file` varchar(80) NOT NULL,
  `luaran_hasil_id` int(11) NOT NULL,
  `url_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dok_lp_kemajuan`
--

INSERT INTO `tbl_dok_lp_kemajuan` (`id_dok_lp`, `nama_file`, `luaran_hasil_id`, `url_file`) VALUES
(5, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 7, 'a117657756d009fd0ad01b46b1216650.pdf'),
(6, 'Surat Keterangan Bebas Prodi_Muhammad Syupyan Arpan.pdf', 9, '0861600f4856e1f32b2a394a2de37577.pdf'),
(7, 'Surat Keterangan Bebas Prodi_Muhammad Syupyan Arpan.pdf', 10, '282a3480181f74664011e0d38635b1e1.pdf'),
(8, 'rian,+186-rika+melyanti.pdf', 11, '14e05f4b02b0dea3828ae85fd1987f3e.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dok_lp_kemajuan_akhir`
--

CREATE TABLE `tbl_dok_lp_kemajuan_akhir` (
  `id_dok_lp` int(11) NOT NULL,
  `nama_file` varchar(80) NOT NULL,
  `luaran_hasil_id` int(11) NOT NULL,
  `url_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dok_lp_kemajuan_akhir`
--

INSERT INTO `tbl_dok_lp_kemajuan_akhir` (`id_dok_lp`, `nama_file`, `luaran_hasil_id`, `url_file`) VALUES
(1, 'kelompok-2-erd-reservasi-hotel.pdf', 2, '1645b14e17a6ea9871da6f0765dc231b.pdf'),
(2, 'membuat-database.pdf', 2, 'db5c4b592f6dcf13cd7f6ca94b21dbb6.pdf'),
(3, 'kelompok-2-erd-reservasi-hotel.pdf', 4, 'c87a24cb752f52bc66386d446a11ae2f.pdf'),
(4, 'kelompok-2-erd-reservasi-hotel.pdf', 4, '6c24959b5b28f9505effc70a650cbdd1.pdf'),
(5, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 8, '70da0cebf9e213467fd225a6c35eb9bb.pdf'),
(6, 'Surat Keterangan Bebas Prodi_Muhammad Syupyan Arpan.pdf', 10, 'd50a75ea585b3adbe8ed8cdf4e8d4d88.pdf'),
(7, 'Surat Keterangan Bebas Prodi_Muhammad Syupyan Arpan.pdf', 11, '60803adb0a3a4209be31b4f0bcb794d4.pdf'),
(8, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 12, '182978bbab6cf9e2f504bdcf1e4462f8.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_evaluasi_akhir_reviewer`
--

CREATE TABLE `tbl_evaluasi_akhir_reviewer` (
  `id_penilaian` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `pengabdian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_evaluasi_akhir_reviewer`
--

INSERT INTO `tbl_evaluasi_akhir_reviewer` (`id_penilaian`, `bobot`, `skor`, `nilai`, `penelitian_id`, `pengabdian_id`) VALUES
(1, 30, 6, 180, 1, 0),
(2, 20, 7, 140, 1, 0),
(3, 20, 7, 140, 1, 0),
(4, 20, 6, 120, 1, 0),
(5, 10, 7, 70, 1, 0),
(6, 30, 3, 90, 2, 0),
(7, 20, 5, 100, 2, 0),
(8, 20, 3, 60, 2, 0),
(9, 20, 5, 100, 2, 0),
(10, 10, 5, 50, 2, 0),
(11, 30, 2, 60, 3, 0),
(12, 20, 3, 60, 3, 0),
(13, 20, 3, 60, 3, 0),
(14, 20, 5, 100, 3, 0),
(15, 10, 5, 50, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_evaluasi_reviewer`
--

CREATE TABLE `tbl_evaluasi_reviewer` (
  `id_penilaian` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `pengabdian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_evaluasi_reviewer`
--

INSERT INTO `tbl_evaluasi_reviewer` (`id_penilaian`, `bobot`, `skor`, `nilai`, `penelitian_id`, `pengabdian_id`) VALUES
(1, 30, 3, 90, 1, 0),
(2, 20, 5, 100, 1, 0),
(3, 20, 7, 140, 1, 0),
(4, 20, 7, 140, 1, 0),
(5, 10, 6, 60, 1, 0),
(6, 30, 2, 60, 2, 0),
(7, 20, 5, 100, 2, 0),
(8, 20, 3, 60, 2, 0),
(9, 20, 3, 60, 2, 0),
(10, 10, 3, 30, 2, 0),
(11, 30, 3, 90, 3, 0),
(12, 20, 3, 60, 3, 0),
(13, 20, 3, 60, 3, 0),
(14, 20, 5, 100, 3, 0),
(15, 10, 6, 60, 3, 0),
(16, 30, 5, 150, 11, 0),
(17, 20, 6, 120, 11, 0),
(18, 20, 3, 60, 11, 0),
(19, 20, 5, 100, 11, 0),
(20, 10, 5, 50, 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_kemajuan`
--

CREATE TABLE `tbl_laporan_kemajuan` (
  `id_lp_kemajuan` int(11) NOT NULL,
  `luaran_hasil_id` int(11) NOT NULL,
  `url_dok` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status_lp_kemajuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan_kemajuan`
--

INSERT INTO `tbl_laporan_kemajuan` (`id_lp_kemajuan`, `luaran_hasil_id`, `url_dok`, `deskripsi`, `status_lp_kemajuan`) VALUES
(1, 1, 'www.google.com', 'kkk', 'Sudah Sesuai'),
(2, 4, 'www.google.com', 'ddss', 'Belum Lengkap'),
(3, 7, 'www.google.com', 'bagus', 'Sudah Sesuai'),
(4, 9, '', 'bagus', 'Sudah Sesuai'),
(5, 8, '', 'b', 'Sudah Sesuai'),
(6, 10, 'www.google.com', 'bagus', 'Belum Lengkap'),
(7, 11, '', 'lengkap', 'Belum Lengkap'),
(8, 12, '', 'kurang', 'Belum Lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_kemajuan_akhir`
--

CREATE TABLE `tbl_laporan_kemajuan_akhir` (
  `id_lp_kemajuan` int(11) NOT NULL,
  `luaran_hasil_id` int(11) NOT NULL,
  `url_dok` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status_lp_kemajuan_akhir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan_kemajuan_akhir`
--

INSERT INTO `tbl_laporan_kemajuan_akhir` (`id_lp_kemajuan`, `luaran_hasil_id`, `url_dok`, `deskripsi`, `status_lp_kemajuan_akhir`) VALUES
(1, 2, 'www.google.com', 'ddd', 'Sudah Sesuai'),
(2, 4, 'www.google.com', 'kkkk', 'Belum Lengkap'),
(3, 8, '', 'bagus', 'Sudah Sesuai'),
(4, 7, '', 'bagus', 'Sudah Sesuai'),
(5, 9, '', 'baguss', 'Sudah Sesuai'),
(6, 10, '', 'kurang', 'Belum Lengkap'),
(7, 11, '', 'kurang', 'Belum Lengkap'),
(8, 12, '', 'kurang', 'Belum Lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id_logbook` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `pengabdian_id` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id_logbook`, `tanggal`, `waktu`, `tempat_kegiatan`, `pengabdian_id`, `penelitian_id`) VALUES
(1, '10-07-2023', '21:04:00', 'Pelaihari', 0, 1),
(2, '11-07-2023', '10:27:00', 'ddd', 1, 0),
(3, '08-08-2023', '12:53:00', 'dds', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_luaran_hasil`
--

CREATE TABLE `tbl_luaran_hasil` (
  `id_luaran_hasil` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `luaran_tambahan_id` int(11) NOT NULL,
  `luaran_wajib_id` int(11) NOT NULL,
  `pengabdian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_luaran_hasil`
--

INSERT INTO `tbl_luaran_hasil` (`id_luaran_hasil`, `penelitian_id`, `luaran_tambahan_id`, `luaran_wajib_id`, `pengabdian_id`) VALUES
(1, 1, 0, 4, 0),
(2, 1, 0, 5, 0),
(3, 1, 6, 0, 0),
(4, 0, 0, 1, 1),
(5, 0, 0, 2, 1),
(6, 0, 3, 0, 1),
(7, 2, 0, 4, 0),
(8, 2, 0, 5, 0),
(9, 2, 6, 0, 0),
(10, 3, 0, 4, 0),
(11, 3, 0, 5, 0),
(12, 3, 6, 0, 0),
(13, 4, 0, 4, 0),
(14, 4, 0, 5, 0),
(15, 4, 6, 0, 0),
(16, 5, 0, 4, 0),
(17, 5, 0, 5, 0),
(18, 5, 6, 0, 0),
(19, 6, 0, 4, 0),
(20, 6, 0, 5, 0),
(21, 6, 6, 0, 0),
(22, 7, 0, 4, 0),
(23, 7, 0, 5, 0),
(24, 7, 6, 0, 0),
(25, 8, 0, 4, 0),
(26, 8, 0, 5, 0),
(27, 8, 6, 0, 0),
(28, 9, 0, 4, 0),
(29, 9, 0, 5, 0),
(30, 9, 6, 0, 0),
(31, 10, 0, 4, 0),
(32, 10, 0, 5, 0),
(33, 10, 6, 0, 0),
(34, 11, 0, 4, 0),
(35, 11, 0, 5, 0),
(36, 11, 6, 0, 0),
(37, 12, 0, 4, 0),
(38, 12, 0, 5, 0),
(39, 12, 6, 0, 0),
(40, 13, 0, 4, 0),
(41, 13, 0, 5, 0),
(42, 13, 6, 0, 0),
(43, 14, 0, 4, 0),
(44, 14, 0, 5, 0),
(45, 14, 6, 0, 0),
(46, 15, 0, 4, 0),
(47, 15, 0, 5, 0),
(48, 15, 6, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_luaran_usulan`
--

CREATE TABLE `tbl_luaran_usulan` (
  `id_luaran` int(11) NOT NULL,
  `nama_luaran_wajib` varchar(50) NOT NULL,
  `nama_luaran_tambahan` varchar(50) NOT NULL,
  `jenis_luaran` varchar(20) NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_luaran_usulan`
--

INSERT INTO `tbl_luaran_usulan` (`id_luaran`, `nama_luaran_wajib`, `nama_luaran_tambahan`, `jenis_luaran`, `tahun_id`) VALUES
(1, 'Jurnal Terakdreditasi S1 - S6', 'Tidak Ada', 'Pengabdian', 1),
(2, 'Prosiding', 'Tidak Ada', 'Pengabdian', 1),
(3, 'Tidak Ada', 'Descoinding', 'Pengabdian', 1),
(4, 'Jurnal Terakdreditasi S1 - S6', 'Tidak Ada', 'Penelitian', 1),
(5, 'Prosiding', 'Tidak Ada', 'Penelitian', 1),
(6, 'Tidak Ada', 'Descoinding', 'Penelitian', 1),
(13, 'Tidak Ada', 'dzx', 'Pengabdian', 1),
(14, 'Publikasi ilmiah pada jurnal ber ISSN', 'Tidak Ada', 'Penelitian', 2),
(15, 'Teknologi tepat guna yang langsung dimanfaatkan', 'Tidak Ada', 'Penelitian', 2),
(16, 'Tidak Ada', 'HKI', 'Penelitian', 2),
(17, 'Tidak Ada', 'Buku ajar', 'Penelitian', 2),
(18, 'Publikasi ilmiah pada jurnal ber ISSN', 'Tidak Ada', 'Pengabdian', 2),
(19, 'Penerapan peningkatan iptek pada masyarakat', 'Tidak Ada', 'Pengabdian', 2),
(20, 'Peningkatan daya saing', 'Tidak Ada', 'Pengabdian', 2),
(21, 'Tidak Ada', 'Publikasi dijurnal internasional', 'Pengabdian', 2),
(22, 'Tidak Ada', 'HKI', 'Pengabdian', 2),
(23, 'Buku ber ISBN', 'Tidak Ada', 'Pengabdian', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `prodi_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nama`, `nim`, `tanggal_lahir`, `prodi_id`, `tahun_id`) VALUES
(53, 'Abdul Ghoni Zaen', '2001301001', '01-03-2002', 1, 1),
(55, 'Khoirul Abidin', '2201301116', '12-03-2002', 1, 1),
(56, 'Sabhila Ajnun Tasna', '2101402031', '12-03-2002', 1, 1),
(57, 'Oktavia Nadia Sari', '2101402025', '11-02-2002', 1, 1),
(58, 'Nun Faisal Azma', '2101402023', '02-05-2003', 1, 1),
(59, 'Kartina Awaliana Putri', '2201301014', '02-06-2003', 1, 1),
(60, 'Anitha Ranmadaniyah', '2104301055', '12-02-2001', 3, 1),
(61, 'Afna Maulida', '2104301054', '22-02-2002', 3, 1),
(62, 'Rio Nugroho', '2205401005', '22-03-2003', 4, 1),
(63, 'Muhammad Nuruddin', '2205401023', '05-02-2002', 4, 1),
(64, 'Muhammad Maireza', '2201301179', '23-01-2003', 1, 1),
(65, 'Ryan Hidayat', '2106401015', '22-08-2003', 7, 1),
(66, 'Noor Jannah', '2106401012', '05-05-2004', 7, 1),
(67, 'Budiman', '2002301046', '06-06-2004', 6, 1),
(68, 'Novita Sari', '2002301045', '12-03-2003', 6, 1),
(69, 'Ramadani', '2002301060', '02-02-2001', 6, 1),
(70, 'Muhammad Ehsan Naufal', '2001301095', '02-03-2003', 1, 1),
(71, 'Miftahul Jannah', '2104301106', '06-03-2004', 3, 1),
(72, 'Salsa Bella', '2104301091', '02-03-2003', 3, 1),
(73, 'Intan Sari', '21064011008', '04-02-2003', 6, 1),
(74, 'Puterie Sabina', '2106401001', '02-03-2003', 6, 1),
(75, 'Vergiawan AI Hafidz', '2205401032', '03-01-2003', 4, 1),
(76, 'Ahmad Hunaidi', '2205401029', '22-02-2003', 4, 1),
(77, 'Faridah Puspita', '2001302008', '23-03-2003', 3, 1),
(78, 'Widya Putri Paramitha', '2104301110', '23-04-2004', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penelitian`
--

CREATE TABLE `tbl_penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `tkt_awal` int(11) NOT NULL,
  `tkt_akhir` int(11) NOT NULL,
  `tema_penelitian` varchar(50) NOT NULL,
  `nip_nik_ketua` bigint(25) NOT NULL,
  `tugas_ketua` varchar(200) NOT NULL,
  `status_penelitian` varchar(50) NOT NULL,
  `status_aktif` varchar(20) NOT NULL,
  `subtansi_usulan` varchar(100) NOT NULL,
  `nilai_penelitian` varchar(50) NOT NULL,
  `tahun_id` varchar(50) NOT NULL,
  `komentar_penelitian` varchar(150) NOT NULL,
  `komentar_evaluasi` varchar(150) NOT NULL,
  `komentar_evaluasi_akhir` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penelitian`
--

INSERT INTO `tbl_penelitian` (`id_penelitian`, `judul`, `tkt_awal`, `tkt_akhir`, `tema_penelitian`, `nip_nik_ketua`, `tugas_ketua`, `status_penelitian`, `status_aktif`, `subtansi_usulan`, `nilai_penelitian`, `tahun_id`, `komentar_penelitian`, `komentar_evaluasi`, `komentar_evaluasi_akhir`) VALUES
(2, 'Pengembangan Sistem Informasi Audit Mutu Internal Politala', 2, 3, 'Teknologi', 198408022019031005, 'Mengembangkan Aplikasi', '4', 'Disetujui', 'bcd5643b567163fb9fbff475d4440d7f.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(3, 'Machine Learning untuk Mendeteksi Penyakit Kelapa Sawit Berdasarkan Feature Ekstraction Daun dan Principal Component Analysis (PCA)', 2, 3, 'Ilmu Komputer', 198907202020121003, 'Melaksanakan', '4', 'Disetujui', '1534516318cf231e2c23118dccee4a0d.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(4, 'Implementasi Deteksi teks AI untuk meningkatkan kemampuan Plagiarisme Checker dengan menggunakan DetectGPT', 2, 4, 'Teknologi', 198909272019031013, 'Melaksanakan', '4', 'Disetujui', '430abb3d50e6d7c8d761fc2461fce64f.pdf', '0', '1', 'bagus', 'Bagus', 'bagus'),
(5, 'Pengujian Pengaruh Sosial Kultural Terhadap Perilaku Kaputusan Investasi dengan Mental Accounting sebagai Variabel Moderating', 2, 3, 'Akuntansi', 199310312020122004, 'Melaksanakan', '4', 'Disetujui', 'dbf374b9e8bd614b925f2d61c3e8e458.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(6, 'Analisis Kuat Tekan Bcton Geopolimer Menggunakan Fly Ash dan Serbuk Kulit Kayu Galam', 2, 4, 'Teknologi', 210201223, 'Melaksanakan', '4', 'Disetujui', '66075cf4df8f4f2d0e780e65f406cb7d.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(7, 'Pengembangan Aplikasi E-Presensi Berbasis Mobile', 3, 4, 'Teknologi', 199608252022032005, 'Melaksanakan', '4', 'Disetujui', '8113b0db5d2113252650aa670a2c386d.pdf', '0', '1', 'bgus', 'bagus', 'bagus'),
(8, 'Pengaruh Dosis Perekat Terhadap Kunlitas Fisik dan Kandungan Nutrien Ransum Ayam Petelur Berbentuk Pelet', 2, 4, 'Teknologi', 211201236, 'Melaksanakan', '4', 'Disetujui', '3f5d05a39368413aa11fac6ddf963ad0.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(9, 'Efektifitas Penambahan Ekstrak Bunga Rosella (Hibiscus sabdariffa) terhadap Kualitas Fisikokimia pada Sabun Cair', 2, 4, 'Teknologi', 198610022022032001, 'Melaksanakan', '4', 'Disetujui', '17d394c1bd8891f8dc16b972f0278329.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(10, 'Pemurnian Mnyak Goreng Bekas Menggunakan Bioadsorben dari Limbal Fiber Stasiun Press Pabrik Kelapa Sawit', 2, 4, 'Teknologi', 198802192018031001, 'Melaksanakan', '4', 'Disetujui', '6cea053e89a81065a34c3c10fbd7ab50.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(11, 'Pengembangan Server Cloud Storage di Politeknik Negeri Tanah Laut', 2, 3, 'Ilmu Komputer', 199105202022031007, 'Melaksanakan', '4', 'Disetujui', 'c250a1e24cdbdd5a93de9c2c53aa4282.pdf', '0', '1', 'bagus', 'Sesuai', 'bagus'),
(12, 'Analisis Faktor yang Mempengaruhi Minat Muzaid Terhadap Program Zakat Produktif pada Lembaga Pengelolaan Zakat Nasional', 2, 4, 'Akuntansi', 198909032019032015, 'Melaksanakan', '4', 'Disetujui', '845e1777bd0f02a8eb00a477b5869e98.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(13, 'Pengaruh Komt]inasi Rumput bermuda (Cynodon Dactylon) dan Leguminosa (Gliricidia sepium) Terhadap Kandungan Nutrient Silase Pakan Komplit', 2, 3, 'Teknologi', 210701232, 'Melaksanakan', '4', 'Disetujui', '46da44092aecde2381d4f82d7a144373.pdf', '0', '1', 'bagus', 'bagus', 'bagus'),
(14, 'Analisis Statistik Faktor Penyebab Kerusakan Jalan di Kabupaten Tanah Laut', 2, 4, 'Teknologi', 199110142019032018, 'Melaksanakan', '4', 'Disetujui', '68871a1a920576874df7e120aac2149d.pdf', '0', '1', 'Bagus', 'Bagus', 'Bagus'),
(15, 'Pengaruh Sistem Infomasi Akuntansi Terhadap Kunlitas Laporan Keunngan Desa Dengan Kompetensi SDM Sebagai Pemoderasi Pada Tiga Kecamatan Kabupaten Tanah Ijaut', 2, 4, 'Akuntansi', 161001163, 'Melaksanakan', '4', 'Disetujui', 'de73157803a3dc531c1ed9556b8e566e.pdf', '0', '1', 'bagus', 'bagus', 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengabdian`
--

CREATE TABLE `tbl_pengabdian` (
  `id_pengabdian` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `tkt_awal` int(11) NOT NULL,
  `tkt_akhir` int(11) NOT NULL,
  `tema_pengabdian` varchar(50) NOT NULL,
  `nip_nik_ketua` bigint(25) NOT NULL,
  `tugas_ketua` varchar(100) NOT NULL,
  `status_pengabdian` varchar(50) NOT NULL,
  `status_aktif` varchar(20) NOT NULL,
  `subtansi_usulan` varchar(100) NOT NULL,
  `nilai_pengabdian` varchar(50) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `komentar_pengabdian` varchar(150) NOT NULL,
  `komentar_evaluasi` varchar(150) NOT NULL,
  `komentar_evaluasi_akhir` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `nip_nik` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  `nidn_nidk` varchar(25) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','Belum Diisi') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `pengguna_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`nip_nik`, `nama`, `email`, `password`, `foto_profil`, `pengguna_status`, `nidn_nidk`, `jk`, `alamat`, `role_id`, `prodi_id`, `tahun_id`, `status_pesan`, `pengguna_aktif`) VALUES
('100102028', 'Eni Suasri, S.E, M.M', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('130204093', 'Ir. Nuryati, S.T., M.Eng.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('140102101', 'Reza Taufiqi Ivana, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('140102103', 'Yuliana Ningsih, S.S., M.Hum.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('150105124', 'Imron Musthofa, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('150206121', 'Muhammad Ghalih, S.I.Kom., M.Sc.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('150801144', 'Oky Rahmanto, S.Kom., M.T.', 'oky.rahmanto@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1111079001', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('160201152', 'Ema Lestari, M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('160401166', 'Desi Apriani, S.Psi', 'syupyan@gmail.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Laki-laki', 'yyyy', 1, 1, 1, 0, 1),
('161001163', 'Yuli Fitriyani, S.E., M.Sc.', 'yuli@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0016078406', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('170103174', 'Mariatul Kiptiah, S.Sos., M.Si.', 'mariatul@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0030118303', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('180912191', 'Abdul Muta Ali, S.E.I., M.H.', 'defaul1t@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('196205041987031018', 'Tekad, S.Pd., M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('196806171997022004', 'Dr. Mufrida Zein, S.Ag., M.Pd', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('196907032021212003', 'Wan Yuliyanti, M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('197005312021212006', 'Radna Nurmalina, SE., M.Si.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('197006071995122003', 'Titik Wijayati, M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('197610142021211003', 'Ir. Rusuminto S., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('197909142015041003', 'Meldayanoor, S.Hut., M.S.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198102122021212012', 'Raden Rizki Amalia, S.T., M.Si.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198203232021212009', 'Ir. Marlia Adriana, S.T., M.T.', 'marlia@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1123038202', 'Belum Diisi', 'Belum Diisi', 2, 4, 1, 0, 1),
('198301312021211002', 'Dwi Sandri, S.Si., M.P.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('198307112015042002', 'Fatimah, S.Si.,M.P.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198402022019032010', 'Wiwik Kusrini, S.Kom., M.Cs.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198402132021212002', 'Rina Pebriana, S.E, M.Comm.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('198404282011011003', 'Jaka Darma Jaya, M.P., M.Sc.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198408022019031005', 'Ir. Agustian Noor, M.Kom.', 'agustiannoor@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0002088405', 'Laki-laki', 'Jalan pramuka', 2, 1, 1, 0, 1),
('198503062019032007', 'Marliza Noor Hayatie, S.E., M.M.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('198504292018031001', 'Ir. Anggun Angkasa B.P, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198506272021211003', 'Kurnia Dwi Artika, S.T.,  M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198511012019031005', 'Muhammad Noor, M.H.I.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198607012019031008', 'Hendrik Setyo Utomo, S.T., MMSI.', 'hendrik.tomo@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1101078602', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('198607052019032010', 'Yulima Melsipa Lingga, S.Pd., M.Hum.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198610022022032001', 'Jesi Yardani, S.T.P., M.T.P.', 'default1@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0002108607', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198703192019031008', 'Adhiela Noer Syaief, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198706122019032017', 'Yunita Prastyaningsih, M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198708302019031012', 'Sukma Firdaus, S.Si., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198711212022031002', 'Juan Robert Sirait, S.Kom., M.Cs.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198802192018031001', 'M. Indra Darmawan, STP.,  M.Sc.', 'mindradarmawan@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0019028804', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198802252019032016', 'Almira Ulimaz, S.Si., M.Pd.', 'almiraulimaz@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1125028801', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198804202018032001', 'Ika Kusuma Nugraheni, S.Si., M.Sc.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('198805042019032019', 'Nina Hairiyah, S.T.P., M.Si.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198807032019031009', 'Jaka Permadi, S.Si., M.Cs.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198807172019031010', 'Ir. Anton Kuswoyo, S.Si., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('198904212019032026', 'Herfia Rhomadhona, S.Kom, M.Cs.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198906012019031015', 'Khairul Anwar Hafizd, M.Kom.', 'hafizd@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0001068901', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('198907202020121003', 'Ahmad Rusadi Arrahimi, S.Kom., M.Kom', 'ahmadrusadi@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0020078912', 'Laki-laki', 'Belum Diisi', 2, 2, 1, 0, 1),
('198907312019032013', 'Ines Saraswati Machfiroh, S.ST., M.Sc.', 'inessaraswati.m@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0031078903', 'Belum Diisi', 'Belum Diisi', 2, 4, 1, 0, 1),
('198909032019032015', 'Noor Amelia, S.ST., M.Si.', 'noor.amelia@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0003098905', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('198909272019031013', 'Arif  Supriyanto, S.Kom, M.Cs.', 'arif@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0027098904', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('199003222020121003', 'Billy Sabella, S.Kom., M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199004172018032002', 'Winda Aprianti, S.Si., M.Si.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199005272020121002', 'M. Riduan Abdillah, S.E., M.Si., Akt., CA.', 'riduan@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1127059001', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('199007112015041001', 'Veri Julianto, S.Si., M.Si', 'veri@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '1111079001', 'Belum Diisi', 'Belum Diisi', 4, 1, 1, 1, 1),
('199007292019031017', 'Fathurrahmani, M.Kom.', 'fathurrahmani@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0029079003', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199008262022032002', 'Nina Mia Aristi, M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199011162022031002', 'Afian Syafaadi Rizki, S.Kom., M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199011202019031007', 'Herpendi, M.Kom.', 'herpendi@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0020119001', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('199102132018032001', 'Adzani Ghani Ilmannafian, S.Si.,  M.Si.', 'adzani@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0013029101', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('199104042022031006', 'Dwi Agung Wibowo, M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199105202022031007', 'M Najamudin Ridha, S.Kom., M.Kom.', 'najamudin@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0025059111', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199110142019032018', 'Widiya Astuti Alam Sur, S.Pd., M.Sc.', 'widiyasur@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0014109102', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('199205052019032040', 'Rabini Sayyidati, M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199206212018032001', 'Karolina, M.Pd.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('199212152019031015', 'Ir. Muhammad Khalil, S.ST., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('199310312020122004', 'Astia Putriana, S.E., M.S.A.', 'astiaputri@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0024059301', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('199403152022031007', 'Muhammad Rezki Fitri Putra, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('199405132022031005', 'Aidil Fajar Zulfahri, S.Kom., M.Kom.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 1, 1, 0, 1),
('199409232020122006', 'Titis Linangsari, S.T.P., M.Sc.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 6, 1, 0, 1),
('199503092022032008', 'Bella Puspita Rininda, S.Ak., M.A.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('199608252022032005', 'Eka Wahyu Sholeha, M.Kom.', 'ekawahyus@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0025089601', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('200401208', 'Nova Widayanti, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('200503209', 'Humaira Afrila, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('210201223', 'Ir. Budi Kurniawan, S.T., M.T.', 'budikurniawan@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0020098606', 'Belum Diisi', 'Belum Diisi', 2, 4, 1, 0, 1),
('210301226', 'Maulida Hirdianti Bandi, SE.Ak., M.A.', 'maulidahirdianti@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1),
('210701231', 'Bunga Putri Febrina, S.Pt ., M.Si.', 'default1@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0007029305', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('210701232', 'Wenni Meika Lestari, S.Pt., M.Pt.', 'wennimeika@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0026059501', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('211201235', 'Amelia Lulu Rosalin Hutabarat, S.Pt., M.Pt.', 'default1@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '8938070023', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('211201236', 'Fadhli Fajri, S.Pt., M.Pt.', 'fadhlifajri@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '8948070023', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('211201237', 'Fajri Maulana, S.Pt., M.Pt.', 'fajrimaulana@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '8958070023', 'Belum Diisi', 'Belum Diisi', 2, 7, 1, 0, 1),
('211201252', 'Hajar Isworo, M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 5, 1, 0, 1),
('211201253', 'Ir. Intan Safitri, S.T., M.T.', 'defaulta@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Belum Diisi', 'Belum Diisi', 2, 4, 1, 0, 1),
('211201254', 'Misnawati, S.T., M.T.', 'default@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 0, '0', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('211201255', 'Ir. Norminawati Dewi, S.T., M.T.', 'default1@email.com', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Belum Diisi', 'Belum Diisi', 2, 2, 1, 0, 1),
('211201256', 'Gati Anjaswari, S.ST., M.Ak.', 'gati@politala.ac.id', '$2y$10$T3NDIgaJX48pGvWH/slICe5hQqTq9IiLhSx5gkF9wfuSyogHpUbOO', 'user.png', 1, '0', 'Belum Diisi', 'Belum Diisi', 2, 3, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna_token`
--

CREATE TABLE `tbl_pengguna_token` (
  `id` mediumint(9) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian_reviewer`
--

CREATE TABLE `tbl_penilaian_reviewer` (
  `id_penilaian` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `pengabdian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penilaian_reviewer`
--

INSERT INTO `tbl_penilaian_reviewer` (`id_penilaian`, `bobot`, `skor`, `nilai`, `penelitian_id`, `pengabdian_id`) VALUES
(1, 25, 5, 125, 1, 0),
(2, 20, 6, 120, 1, 0),
(3, 25, 6, 150, 1, 0),
(4, 15, 6, 90, 1, 0),
(5, 15, 5, 75, 1, 0),
(6, 25, 6, 150, 0, 1),
(7, 20, 6, 120, 0, 1),
(8, 25, 7, 175, 0, 1),
(9, 15, 7, 105, 0, 1),
(10, 15, 7, 105, 0, 1),
(11, 25, 3, 75, 2, 0),
(12, 20, 6, 120, 2, 0),
(13, 25, 5, 125, 2, 0),
(14, 15, 5, 75, 2, 0),
(15, 15, 6, 90, 2, 0),
(16, 25, 2, 50, 3, 0),
(17, 20, 3, 60, 3, 0),
(18, 25, 3, 75, 3, 0),
(19, 15, 6, 90, 3, 0),
(20, 15, 6, 90, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` tinyint(4) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `nama_lain_prodi` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `nama_lain_prodi`, `jurusan`) VALUES
(1, 'Teknologi Informasi', 'TI', 'Komputer dan Bisnis'),
(2, 'Teknologi Rekayasa Komputer Jaringan', 'TRKJ', 'Komputer dan Bisnis'),
(3, 'Akuntansi', 'AKT', 'Komputer dan Bisnis'),
(4, 'Teknologi Rekayasa Kontruksi Jalan dan Jembatan', 'TRKJJ', 'Teknologi Rekayasa Industri'),
(5, 'Teknologi Otomotif', 'TO', 'Teknologi Rekayasa Industri'),
(6, 'Agroindustri', 'AI', 'Teknologi Industri Pertanian'),
(7, 'Teknologi Pakan Ternak', 'TPT', 'Teknologi Industri Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reviewer`
--

CREATE TABLE `tbl_reviewer` (
  `nip_nik` varchar(25) NOT NULL,
  `nidn` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  `pengguna_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reviewer`
--

INSERT INTO `tbl_reviewer` (`nip_nik`, `nidn`, `password`, `nama`, `email`, `foto_profil`, `role_id`, `tahun_id`, `pengguna_status`, `pengguna_aktif`) VALUES
('198307192008011005', '0019078302', '$2y$10$OfryrLuto0Cy.VzmyqsYvu.dKU9t/aZz7qbYChuBTkLQMoaGN62r2', 'Prof. Agung Nugroho, S.TP, M.Sc, Ph.D', 'syupyanarpan2@gmail.com', 'user.png', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Reviewer'),
(4, 'Kepala P3M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `title_header` varchar(25) NOT NULL,
  `title_footer` varchar(25) NOT NULL,
  `title_login` varchar(25) NOT NULL,
  `title_url` varchar(50) NOT NULL,
  `panduan_bima` varchar(1000) NOT NULL,
  `nomor_whatsapp` varchar(12) NOT NULL,
  `file_panduan` varchar(50) NOT NULL,
  `template_import_pengguna` varchar(100) NOT NULL,
  `template_import_mahasiswa` varchar(100) NOT NULL,
  `template_subtansi_pengabdian` varchar(100) NOT NULL,
  `template_subtansi_penelitian` varchar(100) NOT NULL,
  `maksimal_anggota_dosen_penelitian` int(11) NOT NULL,
  `maksimal_anggota_dosen_pengabdian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `title_header`, `title_footer`, `title_login`, `title_url`, `panduan_bima`, `nomor_whatsapp`, `file_panduan`, `template_import_pengguna`, `template_import_mahasiswa`, `template_subtansi_pengabdian`, `template_subtansi_penelitian`, `maksimal_anggota_dosen_penelitian`, `maksimal_anggota_dosen_pengabdian`) VALUES
(1, 'BIMA POLITALA', 'BIMA POLITALA', 'BIMA POLITALA', 'BIMA - Politeknik Negeri Tanah Laut', '&lt;p&gt;Jika ada hal yang ingin ditanyakan prihal penggunaan aplikasi BIMA maupun masih kurang paham dalam panduan penggunaan BIMA. Silahkan hubungi admin melalu whatsapp.&lt;/p&gt;', '089692516251', 'c6e12d45cddcc32fd4f4882a5cc3afa3.pdf', '9fd14be62ec97486fd21e544e08e63e9.xlsx', '1d9b26d65ca23154d36f0b4f0f23d6c6.xlsx', 'f61ed43a7a9868408d741e666927c187.docx', 'c42ef48998f5eb7d6f749a35f910ef42.docx', 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun_aktif`
--

CREATE TABLE `tbl_tahun_aktif` (
  `id_thn` int(11) NOT NULL,
  `tahun_aktif` int(11) NOT NULL,
  `status_aktif` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tahun_aktif`
--

INSERT INTO `tbl_tahun_aktif` (`id_thn`, `tahun_aktif`, `status_aktif`) VALUES
(1, 2022, 'Tidak Aktif'),
(2, 2023, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tema_penelitian_pengabdian`
--

CREATE TABLE `tbl_tema_penelitian_pengabdian` (
  `id_tema` int(11) NOT NULL,
  `tema_penelitian` varchar(50) NOT NULL,
  `tema_pengabdian` varchar(50) NOT NULL,
  `tahun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tema_penelitian_pengabdian`
--

INSERT INTO `tbl_tema_penelitian_pengabdian` (`id_tema`, `tema_penelitian`, `tema_pengabdian`, `tahun_id`) VALUES
(1, 'Tidak Ada', 'Penguatan Modal Sosial', 1),
(2, 'Teknologi', 'Tidak Ada', 1),
(3, 'Ilmu Komputer', 'Tidak Ada', 1),
(4, 'Akuntansi', 'Tidak Ada', 1),
(5, 'Peternakan', 'Tidak Ada', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload_laporan`
--

CREATE TABLE `tbl_upload_laporan` (
  `id_up_laporan` int(11) NOT NULL,
  `nama_file_laporan_kemajuan` varchar(80) NOT NULL,
  `nama_file_laporan_kemajuan_akhir` varchar(80) NOT NULL,
  `url_file_laporan_kemajuan` varchar(80) NOT NULL,
  `url_file_laporan_kemajuan_akhir` varchar(80) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `pengabdian_id` int(11) NOT NULL,
  `nama_file_laporan_keuangan` varchar(80) NOT NULL,
  `url_file_laporan_keuangan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_upload_laporan`
--

INSERT INTO `tbl_upload_laporan` (`id_up_laporan`, `nama_file_laporan_kemajuan`, `nama_file_laporan_kemajuan_akhir`, `url_file_laporan_kemajuan`, `url_file_laporan_kemajuan_akhir`, `penelitian_id`, `pengabdian_id`, `nama_file_laporan_keuangan`, `url_file_laporan_keuangan`) VALUES
(1, 'kelompok-2-erd-reservasi-hotel.pdf', 'Tidak Ada1', 'e44a3fe9a473a93bb3625daa3e57dcba.pdf', 'Tidak Ada', 1, 0, 'Tidak Ada', 'Tidak Ada'),
(4, 'Tidak Ada1', 'kelompok-2-erd-reservasi-hotel.pdf', 'Tidak Ada', '9bd7701788852477311e0955e657f5ab.pdf', 1, 0, 'Tidak Ada', 'Tidak Ada'),
(5, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 1, 0, 'kelompok-2-erd-reservasi-hotel.pdf', '6ee1768d8c6f0be5ac03e27e3cdf3763.pdf'),
(6, 'kelompok-2-erd-reservasi-hotel.pdf', 'Tidak Ada', 'dfe1e91a66093150ec3c71d9853836b8.pdf', 'Tidak Ada', 0, 1, 'Tidak Ada', 'Tidak Ada'),
(7, 'Tidak Ada', 'kelompok-2-erd-reservasi-hotel.pdf', 'Tidak Ada', 'eb059281988aea73ed447adc9b765d6e.pdf', 0, 1, 'Tidak Ada', 'Tidak Ada'),
(8, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 0, 1, 'kelompok-2-erd-reservasi-hotel.pdf', 'cfaa89b5cedb7e31bc3a11b92214050c.pdf'),
(9, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 'Tidak Ada', '78611a654cfc2e077415c1e2e2227a7b.pdf', 'Tidak Ada', 2, 0, 'Tidak Ada', 'Tidak Ada'),
(10, 'Tidak Ada', 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 'Tidak Ada', '3521c159391d267902af78df2c7c1c95.pdf', 2, 0, 'Tidak Ada', 'Tidak Ada'),
(11, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 2, 0, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 'e302f629e93ab644e8000d793c16be21.pdf'),
(14, 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 3, 0, 'Surat Keterangan Bebas Prodi_Muhammad Syupyan Arpan.pdf', '7963e3177eccd9c96385fe9c763e163b.pdf'),
(15, 'Surat Keterangan Bebas Perpustakaan_Muhammad Syupyan Arpan.pdf', 'Tidak Ada', 'ecbcf72bd823b75896a6f2e68359cfb0.pdf', 'Tidak Ada', 3, 0, 'Tidak Ada', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan_anggaran_aktif`
--

CREATE TABLE `tbl_usulan_anggaran_aktif` (
  `id_anggaran` int(11) NOT NULL,
  `thn_aktif_id` int(11) NOT NULL,
  `waktu_anggaran_mulai` varchar(50) NOT NULL,
  `waktu_anggaran_berakhir` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_usulan_anggaran_aktif`
--

INSERT INTO `tbl_usulan_anggaran_aktif` (`id_anggaran`, `thn_aktif_id`, `waktu_anggaran_mulai`, `waktu_anggaran_berakhir`) VALUES
(6, 1, '09-08-2023 13:48:00', '11-11-2023 12:12:00'),
(7, 2, '04-09-2023 14:45:00', '21-03-2024 13:01:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tbl_dokumen_logbook`
--
ALTER TABLE `tbl_dokumen_logbook`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indeks untuk tabel `tbl_dok_lp_kemajuan`
--
ALTER TABLE `tbl_dok_lp_kemajuan`
  ADD PRIMARY KEY (`id_dok_lp`);

--
-- Indeks untuk tabel `tbl_dok_lp_kemajuan_akhir`
--
ALTER TABLE `tbl_dok_lp_kemajuan_akhir`
  ADD PRIMARY KEY (`id_dok_lp`);

--
-- Indeks untuk tabel `tbl_evaluasi_akhir_reviewer`
--
ALTER TABLE `tbl_evaluasi_akhir_reviewer`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `tbl_evaluasi_reviewer`
--
ALTER TABLE `tbl_evaluasi_reviewer`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `tbl_laporan_kemajuan`
--
ALTER TABLE `tbl_laporan_kemajuan`
  ADD PRIMARY KEY (`id_lp_kemajuan`);

--
-- Indeks untuk tabel `tbl_laporan_kemajuan_akhir`
--
ALTER TABLE `tbl_laporan_kemajuan_akhir`
  ADD PRIMARY KEY (`id_lp_kemajuan`);

--
-- Indeks untuk tabel `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indeks untuk tabel `tbl_luaran_hasil`
--
ALTER TABLE `tbl_luaran_hasil`
  ADD PRIMARY KEY (`id_luaran_hasil`);

--
-- Indeks untuk tabel `tbl_luaran_usulan`
--
ALTER TABLE `tbl_luaran_usulan`
  ADD PRIMARY KEY (`id_luaran`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indeks untuk tabel `tbl_pengabdian`
--
ALTER TABLE `tbl_pengabdian`
  ADD PRIMARY KEY (`id_pengabdian`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`nip_nik`);

--
-- Indeks untuk tabel `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penilaian_reviewer`
--
ALTER TABLE `tbl_penilaian_reviewer`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tbl_reviewer`
--
ALTER TABLE `tbl_reviewer`
  ADD PRIMARY KEY (`nip_nik`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_tahun_aktif`
--
ALTER TABLE `tbl_tahun_aktif`
  ADD PRIMARY KEY (`id_thn`);

--
-- Indeks untuk tabel `tbl_tema_penelitian_pengabdian`
--
ALTER TABLE `tbl_tema_penelitian_pengabdian`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indeks untuk tabel `tbl_upload_laporan`
--
ALTER TABLE `tbl_upload_laporan`
  ADD PRIMARY KEY (`id_up_laporan`);

--
-- Indeks untuk tabel `tbl_usulan_anggaran_aktif`
--
ALTER TABLE `tbl_usulan_anggaran_aktif`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokumen_logbook`
--
ALTER TABLE `tbl_dokumen_logbook`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_dok_lp_kemajuan`
--
ALTER TABLE `tbl_dok_lp_kemajuan`
  MODIFY `id_dok_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_dok_lp_kemajuan_akhir`
--
ALTER TABLE `tbl_dok_lp_kemajuan_akhir`
  MODIFY `id_dok_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_evaluasi_akhir_reviewer`
--
ALTER TABLE `tbl_evaluasi_akhir_reviewer`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_evaluasi_reviewer`
--
ALTER TABLE `tbl_evaluasi_reviewer`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan_kemajuan`
--
ALTER TABLE `tbl_laporan_kemajuan`
  MODIFY `id_lp_kemajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan_kemajuan_akhir`
--
ALTER TABLE `tbl_laporan_kemajuan_akhir`
  MODIFY `id_lp_kemajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_luaran_hasil`
--
ALTER TABLE `tbl_luaran_hasil`
  MODIFY `id_luaran_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_luaran_usulan`
--
ALTER TABLE `tbl_luaran_usulan`
  MODIFY `id_luaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengabdian`
--
ALTER TABLE `tbl_pengabdian`
  MODIFY `id_pengabdian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna_token`
--
ALTER TABLE `tbl_pengguna_token`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penilaian_reviewer`
--
ALTER TABLE `tbl_penilaian_reviewer`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun_aktif`
--
ALTER TABLE `tbl_tahun_aktif`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tema_penelitian_pengabdian`
--
ALTER TABLE `tbl_tema_penelitian_pengabdian`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_upload_laporan`
--
ALTER TABLE `tbl_upload_laporan`
  MODIFY `id_up_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan_anggaran_aktif`
--
ALTER TABLE `tbl_usulan_anggaran_aktif`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
