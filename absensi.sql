-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2019 pada 09.25
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siswa_id` int(10) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absens`
--

INSERT INTO `absens` (`id`, `tanggal`, `jam_masuk`, `jam_pulang`, `keterangan`, `siswa_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '2019-08-15', '00:18:53', NULL, NULL, 1, 2, '2019-08-14 17:18:53', '2019-08-14 17:18:53'),
(2, '2019-08-05', NULL, NULL, NULL, 2, 3, NULL, NULL),
(3, '2019-08-15', '01:04:27', NULL, NULL, 1, 2, '2019-08-14 18:04:27', '2019-08-14 18:04:27'),
(4, '2019-08-16', '11:59:49', '12:11:54', NULL, 1, 2, '2019-08-16 04:59:49', '2019-08-16 05:11:54'),
(5, '2019-08-16', '12:55:47', NULL, NULL, 1, 2, '2019-08-16 05:55:47', '2019-08-16 05:55:47'),
(6, '2019-08-16', '13:19:22', NULL, NULL, 1, 2, '2019-08-16 06:19:22', '2019-08-16 06:19:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala PTIPD', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(2, 'Layanan Informasi Akademik', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(3, 'Kepala Divisi Infrastruktur', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(4, 'Divisi Infrastruktur', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(5, 'Kepala Divisi Aplikasi', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(6, 'Divisi Aplikasi', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(7, 'Kepala Divisi PDDIKTI', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(8, 'Divisi PDDIKTI', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(9, 'Kepala Divisi Pelatihan', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(10, 'Divisi Pelatihan', '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(11, 'Monitoring', '2019-08-08 03:52:56', '2019-08-08 03:52:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(2, 'TKJ1'),
(3, 'TKJ2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_20_051023_create_jabatans_table', 1),
(4, '2018_10_20_051047_create_pegawais_table', 1),
(5, '2018_10_20_051054_create_absens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `nama`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(1, '0201800001', 'Undang Syaripudin, M.Kom', 1, '2019-08-08 03:52:56', '2019-08-08 03:52:56'),
(2, '0201800101', 'Diana Nurmalasari', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(3, '0201800102', 'Siti Nur Latifatul Qolbiyah', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(4, '0201800103', 'Rizki Faudzan Adzim', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(5, '0201800104', 'Wine Widiawaty', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(6, '0201800105', 'Wulan Ismaya', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(7, '0201800106', 'Sophia Putri Nurmalasari', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(8, '0201800107', 'Novi Amalia Ardha', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(9, '0201800108', 'Sri Nur Shinta', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(10, '0201800109', 'Tari Miftahul Jannah', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(11, '0201800110', 'Erik Nugraha', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(12, '0201800111', 'Rahmalia Ahmadi', 2, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(13, '0201800201', 'Gitarja Sandi, MT', 3, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(14, '0201800202', 'Yogi Wijaya, ST', 4, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(15, '0201800203', 'Bagus Enggartiasto', 4, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(16, '0201800204', 'M Iqbal Qomarudin', 4, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(17, '0201800205', 'Sulaiman Syah Jamal', 4, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(18, '0201800206', 'Abraham Dwi Kurniawan', 4, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(19, '0201800301', 'Jumadi ST M.Cs', 5, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(20, '0201800302', 'Rahmat Zaenal Abidin, MT', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(21, '0201800303', 'Furiansyah Dipraja, ST', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(22, '0201800304', 'Alfi Gusman', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(23, '0201800305', 'Piscal Pratama Putra', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(24, '0201800306', 'Temy Ramdhan', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(25, '0201800307', 'Hadaina Lesta', 6, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(26, '0201800401', 'Ichsan Taufik, MT', 7, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(27, '0201800402', 'Fitri Puspitasari Budiana, S.Si', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(28, '0201800403', 'Danil Kardia', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(29, '0201800404', 'Agus Mahari', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(30, '0201800405', 'Zahra Tsaradina', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(31, '0201800406', 'Rinka Pranita', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(32, '0201800407', 'Adi Nurachman', 8, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(33, '0201800501', 'Yogi Saputra Assyahab, ST', 9, '2019-08-08 03:52:57', '2019-08-08 03:52:57'),
(34, '0201800502', 'Fatimah Ulwiyatul Badriyah', 10, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(35, '0201800503', 'Adi Putra Andriyandi', 10, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(36, '0201800504', 'Wendi Siswanto', 10, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(37, '0201800505', 'Finki Anjani', 10, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(38, '0201800601', 'Raka Fajar Salinggih', 11, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(39, '0201800602', 'Rexsy Rustiana Suparman', 11, '2019-08-08 03:52:58', '2019-08-08 03:52:58'),
(40, '6969', 'saputra', 2, '2019-08-08 17:51:24', '2019-08-08 17:51:24'),
(41, '15120001', 'saputra', 2, '2019-08-08 17:53:00', '2019-08-08 17:53:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas_id`) VALUES
(1, 212, 'saputra', 2),
(2, 231, 'test4', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin PTIPD', 'admin@tkj.id', NULL, '$2y$12$mYLcZbcFT7GfN1ypUyOUiu6xiLxGC71oRnZBCwaoJ3PPGNGZ94yoG', '9CVNGBgc1Io9mulmIyMpqvTlYP4qOLsfaJXKoI967xEd534cYJvtNKhqtBMl', '2019-08-08 03:52:56', '2019-08-08 03:52:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
