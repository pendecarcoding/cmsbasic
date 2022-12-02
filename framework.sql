-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2022 pada 08.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesmenu`
--

CREATE TABLE `aksesmenu` (
  `id_akses` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `id_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aksesmenu`
--

INSERT INTO `aksesmenu` (`id_akses`, `level`, `id_menu`) VALUES
(1, 'admin', '1,2,4,9,10,11,12,13,14,34'),
(2, 'user', '9,10,38,39,46,52,53'),
(3, 'masyarakat', '4,9,10,23'),
(4, 'kordinat', '4,9,10,34'),
(5, 'pegawai', '4,9,10,34'),
(6, 'templatesurat', '4,9,10,34'),
(7, 'ADMIN E-OFFICE', '4,9,10,34'),
(8, 'adminsurat', '1,4,9,10,45'),
(9, 'Pegawai', '9'),
(10, 'ASN', '4,9,10,43,44'),
(11, 'Admin Website', '4,9,10,34'),
(12, 'webadmin', '4,9,10,34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(0, 'webadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_side` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `is_active` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `dropdown` enum('Y','N') DEFAULT 'N',
  `id_sub` text NOT NULL DEFAULT '0',
  `active` enum('Y','N') DEFAULT 'N',
  `sortby` int(11) DEFAULT 0,
  `type` enum('header','side','all','navbar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_side`, `name`, `url`, `is_active`, `icon`, `dropdown`, `id_sub`, `active`, `sortby`, `type`) VALUES
(1, 'Route', 'settingroute', 'settingroute', 'fa fa-link', 'N', '0', 'Y', 2, 'side'),
(2, 'Menu Settings', 'menu', 'menu', 'fa fa-bars', 'N', '0', 'Y', 1, 'side'),
(4, 'Pengaturan Profil', 'settingprofil', 'settingprofil', 'fa fa-user', 'N', '0', 'Y', 7, 'side'),
(8, 'Notifikasi', '-', '-', 'bell', 'Y', '0', 'Y', 1, 'navbar'),
(9, 'Logout', 'logout', '-', 'fa fa-sign-out', 'N', '0', 'Y', 2, 'header'),
(10, 'Profil', 'settingprofil', 'settingprofil', 'fa fa-user', 'Y', '0', 'Y', 1, 'header'),
(11, 'Data User', 'users', 'users', 'fa fa-users', 'N', '0', 'Y', 3, 'side'),
(12, 'Akses Menu', 'aksesmenu', 'aksesmenu', 'fa fa-link', 'N', '0', 'Y', 2, 'side'),
(13, 'Level User', 'level', 'level', 'fa fa-users', 'N', '0', 'Y', 2, 'side'),
(14, 'Pengaturan Aplikasi', 'setAplikasi', 'setAplikasi', 'fa fa-desktop', 'N', '0', 'Y', 7, 'side'),
(39, 'Pengaturan Sistem', '#', '#', 'fa fa-cog', 'Y', '40,48,4', 'Y', 5, 'side');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2022_10_25_102149_tbl_pegawai', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `route`
--

CREATE TABLE `route` (
  `id_route` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `session` text DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `route`
--

INSERT INTO `route` (`id_route`, `type`, `link`, `controller`, `method`, `session`, `active`) VALUES
(1, '\'get\',\'post\'', 'dashboard', 'DashboardCo', 'index', 'admin,webadmin', 'Y'),
(2, '\'get\',\'post\'', 'settingroute', 'RouteCo', 'index', 'admin', 'Y'),
(3, '\'get\',\'post\'', 'settingroute/add', 'RouteCo', 'add', 'admin', 'Y'),
(4, '\'get\',\'post\'', 'settingroute/hapus/{id}', 'RouteCo', 'hapus', 'admin', 'Y'),
(5, '\'get\',\'post\'', 'settingroute/update', 'RouteCo', 'update', 'admin', 'Y'),
(6, '\'get\',\'post\'', 'menu', 'sidemenuCo', 'index', 'admin', 'Y'),
(7, '\'get\',\'post\'', 'menu/add', 'sidemenuCo', 'add', 'admin', 'Y'),
(8, '\'get\',\'post\'', 'menu/update', 'sidemenuCo', 'update', 'admin', 'Y'),
(11, '\'get\',\'post\'', 'menu/hapus/{id}', 'sidemenuCo', 'hapus', 'admin', 'Y'),
(12, '\'get\',\'post\'', 'settingprofil', 'profilCo', 'index', 'admin,webadmin', 'Y'),
(13, '\'get\',\'post\'', 'settingprofil/update', 'profilCo', 'update', 'admin,webadmin', 'Y'),
(14, '\'get\',\'post\'', 'logout', 'LoginCo', 'logout', 'admin', 'Y'),
(15, '\'get\',\'post\'', 'aksesmenu', 'aksesmenuCo', 'index', 'admin', 'Y'),
(16, '\'get\',\'post\'', 'hakakses/save', 'aksesmenuCo', 'save', 'admin', 'Y'),
(17, '\'get\',\'post\'', 'hakakses/update', 'aksesmenuCo', 'update', 'admin', 'Y'),
(18, '\'get\',\'post\'', 'updatepass', 'profilCo', 'updatepass', 'admin', 'Y'),
(19, '\'get\',\'post\'', 'level', 'levelCo', 'index', 'admin', 'Y'),
(20, '\'get\',\'post\'', 'level/add', 'levelCo', 'save', 'admin', 'Y'),
(21, '\'get\',\'post\'', 'level/hapus/{id}', 'levelCo', 'hapus', 'admin', 'Y'),
(22, '\'get\',\'post\'', 'level/update', 'levelCo', 'update', 'admin', 'Y'),
(23, '\'get\',\'post\'', 'users', 'userCo', 'index', 'admin', 'Y'),
(24, '\'get\',\'post\'', 'users/add', 'userCo', 'save', 'admin', 'Y'),
(25, '\'get\',\'post\'', 'users/hapus/{id}', 'userCo', 'hapus', 'admin', 'Y'),
(26, '\'get\',\'post\'', 'setAplikasi', 'aplikasiCo', 'index', 'admin', 'Y'),
(27, '\'get\',\'post\'', 'setAplikasi/update', 'aplikasiCo', 'update', 'admin', 'Y'),
(28, '\'get\',\'post\'', 'users/update', 'userCo', 'update', 'admin', 'Y'),
(30, '\'get\',\'post\'', 'galery', 'galeryCo', 'index', NULL, 'Y'),
(31, '\'get\',\'post\'', 'galery/add', 'galeryCo', 'save', NULL, 'Y'),
(32, '\'get\',\'post\'', 'galery/hapus/{id}', 'galeryCo', 'hapus', NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aksi`
--

CREATE TABLE `tbl_aksi` (
  `id` int(11) NOT NULL,
  `aksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_aksi`
--

INSERT INTO `tbl_aksi` (`id`, `aksi`) VALUES
(1, 'TERIMA'),
(2, 'TERIMA & TERUSKAN'),
(3, 'MEMBUAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_app`
--

CREATE TABLE `tbl_app` (
  `id_app` int(11) NOT NULL,
  `app_name` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_app`
--

INSERT INTO `tbl_app` (`id_app`, `app_name`, `alamat`, `email`, `nohp`, `logo`, `color`) VALUES
(1, 'ACE', 'BENGKALIS', 'bengkalis@gmail.com', '-', '1669883600.png', '#27282a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `email` varchar(50) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `kode_unitkerja` varchar(50) DEFAULT NULL,
  `id_bidang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`, `email`, `nohp`, `jk`, `alamat`, `blokir`, `kode_unitkerja`, `id_bidang`) VALUES
(1, 'Admin System', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1669883397.png', 'bohatimulyadi99@gmail.com', '0823865470937', NULL, 'Bengkalis', 'N', NULL, NULL),
(53, 'Ahmad Nazri', 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'webadmin', '1669964822.png', '-', '-', NULL, '-', 'Y', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksesmenu`
--
ALTER TABLE `aksesmenu`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_side`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id_route`);

--
-- Indeks untuk tabel `tbl_aksi`
--
ALTER TABLE `tbl_aksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_app`
--
ALTER TABLE `tbl_app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksesmenu`
--
ALTER TABLE `aksesmenu`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_side` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `route`
--
ALTER TABLE `route`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `tbl_aksi`
--
ALTER TABLE `tbl_aksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_app`
--
ALTER TABLE `tbl_app`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
