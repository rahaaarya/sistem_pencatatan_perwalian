-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pencatatan_perwalian`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_perwalian`
--

CREATE TABLE `catatan_perwalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perwalian_id` bigint(20) UNSIGNED NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balasan_dosen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catatan_perwalian`
--

INSERT INTO `catatan_perwalian` (`id`, `perwalian_id`, `catatan`, `created_at`, `updated_at`, `balasan_dosen`) VALUES
(30, 63, '<p>Assalamulaikum ibu, izin melakukan konsultasi untuk pemilihan krs</p>', '2024-05-27 06:32:44', '2024-05-27 06:33:56', '<p>Walaikumsalam, baik besok di ruang 4 ya</p>'),
(31, 63, '<p>baik bu terimakasih</p>', '2024-05-27 06:35:09', '2024-05-27 06:35:09', NULL),
(32, 63, '<p><strong>baik bu terimakasih</strong></p>', '2024-05-27 06:35:15', '2024-05-27 06:35:15', NULL),
(33, 64, '<p><strong>Assalamualaikum bu, saya mahasiswa yang di wali oleh ibu dengan nim 1222002</strong></p>', '2024-05-27 06:37:51', '2024-05-27 06:38:56', '<p><strong>Walaikumsalam, baik besok bareng arya di ruang 4 ya</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `email`, `created_at`, `updated_at`) VALUES
(34, '1234567890', 'Dr.Nisrina Mahira', 'nisrinamhr@dosenuniversitas.id', '2024-05-27 06:31:05', '2024-05-27 06:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `perwalian_id` bigint(20) UNSIGNED NOT NULL,
  `mata_kuliah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `tahun_akademik_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `program_studi`, `tahun_akademik_id`, `created_at`, `updated_at`) VALUES
(80, '1222001', 'Arya Budi Raharja', 'raharjaarya666@gmail.com', 'Teknik Informatika', '3', '2024-05-27 06:30:10', '2024-05-27 06:30:10'),
(81, '1222002', 'Andi Atma Sri Ayu', 'ayusri@gmail.com', 'Teknik Informatika', '3', '2024-05-27 06:35:59', '2024-05-27 06:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode`, `nama`, `sks`, `semester`, `program_studi`, `created_at`, `updated_at`) VALUES
(1, 'IF101', 'Pengantar Informatika', 3, 2, 'Teknik Informatika', '2024-04-15 06:09:19', '2024-04-15 06:20:40'),
(2, 'IF102', 'Dasar Pemrograman', 4, 1, 'Teknik Informatika', '2024-04-15 06:09:56', '2024-04-15 06:09:56'),
(3, 'IF103', 'Algoritma dan Struktur Data', 4, 2, 'Teknik Informatika', '2024-04-15 06:10:20', '2024-04-15 06:10:20'),
(4, 'IF104', 'Pemrograman Berorientasi Objek', 4, 1, 'Teknik Informatika', '2024-04-15 06:10:48', '2024-04-15 06:10:48'),
(5, 'IF105', 'Basis Data', 4, 3, 'Teknik Informatika', '2024-04-15 06:11:15', '2024-04-15 06:11:15'),
(6, 'IF106', 'Pemrograman Web', 3, 3, 'Teknik Informatika', '2024-04-15 06:21:20', '2024-04-15 06:21:20'),
(7, 'IF107', 'Jaringan Komputer', 3, 4, 'Teknik Informatika', '2024-04-15 06:22:52', '2024-04-15 06:22:52'),
(8, 'IF108', 'Sistem Operasi', 4, 4, 'Teknik Informatika', '2024-04-15 06:23:29', '2024-04-15 06:23:29'),
(9, 'IF109', 'Kecerdasan Buatan', 3, 5, 'Teknik Informatika', '2024-04-15 06:23:55', '2024-04-15 06:23:55'),
(10, 'IF110', 'Analisis dan Desain Perangkat Lunak', 3, 5, 'Teknik Informatika', '2024-04-15 06:24:19', '2024-04-15 06:24:19'),
(11, 'IF111', 'Sistem Informasi', 3, 6, 'Teknik Informatika', '2024-04-15 06:24:44', '2024-04-15 06:24:44'),
(12, 'IF113', 'Rekayasa Perangkat Lunak', 3, 7, 'Teknik Informatika', '2024-04-15 06:25:10', '2024-04-15 06:25:10'),
(13, 'IF114', 'Manajemen Proyek Perangkat Lunak', 3, 7, 'Teknik Informatika', '2024-04-15 06:25:31', '2024-04-15 06:25:31'),
(14, 'IF115', 'Pemrograman Lanjut', 3, 8, 'Teknik Informatika', '2024-04-15 06:25:54', '2024-04-15 06:25:54'),
(16, 'IF116', 'Tugas Akhir', 8, 8, 'Teknik Informatika', '2024-04-15 06:26:59', '2024-04-15 06:26:59'),
(17, 'IF117', 'Pengembangan Aplikasi Mobile', 3, 4, 'Teknik Informatika', '2024-04-19 11:20:57', '2024-04-19 11:20:57'),
(18, 'IF118', 'Sistem Basis Data Terdistribusi', 4, 5, 'Teknik Informatika', '2024-04-19 11:21:45', '2024-04-19 11:21:45'),
(19, 'IF119', 'Jaringan Syaraf Tiruan', 3, 6, 'Teknik Informatika', '2024-04-19 11:22:26', '2024-04-19 11:22:26'),
(20, 'IF120', 'Desain Antarmuka Pengguna', 3, 6, 'Teknik Informatika', '2024-04-19 11:22:51', '2024-04-19 11:22:51'),
(21, 'IF121', 'Pemrograman Paralel dan Terdistribusi', 4, 7, 'Teknik Informatika', '2024-04-19 11:23:16', '2024-04-19 11:23:16'),
(22, 'IF122', 'Pengujian Perangkat Lunak', 3, 7, 'Teknik Informatika', '2024-04-19 11:23:37', '2024-04-19 11:23:37'),
(23, 'IF123', 'Pengolahan Citra Digital', 3, 5, 'Teknik Informatika', '2024-04-19 11:23:52', '2024-04-19 11:23:52'),
(24, 'IF124', 'Sistem Pendukung Keputusan', 3, 6, 'Teknik Informatika', '2024-04-19 11:24:08', '2024-04-19 11:24:08'),
(25, 'IF125', 'Keamanan Jaringan Komputer', 4, 7, 'Teknik Informatika', '2024-04-19 11:24:27', '2024-04-19 11:24:27'),
(26, 'IF126', 'Big Data dan Analitik', 4, 8, 'Teknik Informatika', '2024-04-19 11:24:40', '2024-04-19 11:24:40'),
(27, 'IF127', 'Interaksi Manusia dan Komputer', 3, 6, 'Teknik Informatika', '2024-04-19 11:24:57', '2024-04-19 11:24:57'),
(28, 'IF128', 'Komputasi Cloud', 4, 7, 'Teknik Informatika', '2024-04-19 11:25:17', '2024-04-19 11:25:17'),
(29, 'IF129', 'Pemrograman Game', 3, 6, 'Teknik Informatika', '2024-04-19 11:25:38', '2024-04-19 11:25:38'),
(30, 'IF130', 'Pemrosesan Bahasa Alami', 3, 7, 'Teknik Informatika', '2024-04-19 11:25:55', '2024-04-19 11:25:55'),
(31, 'IF131', 'Manajemen Proses Bisnis', 3, 8, 'Teknik Informatika', '2024-04-19 11:26:14', '2024-04-19 11:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2024_04_13_232641_create_perwalian_table', 7),
(11, '2024_04_14_014156_add_nim_to_perwalian_table', 8),
(12, '2024_04_14_021339_create_perwalian_table', 9),
(13, '2024_04_14_131450_create_perwalian_table', 10),
(16, '2014_10_12_000000_create_users_table', 11),
(17, '2014_10_12_100000_create_password_reset_tokens_table', 11),
(18, '2019_08_19_000000_create_failed_jobs_table', 11),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 11),
(20, '2024_04_09_155001_create_program_studi_table', 11),
(21, '2024_04_11_103227_create_dosen_table', 11),
(22, '2024_04_11_221227_create_mata_kuliah_table', 11),
(23, '2024_04_12_174418_create_mahasiswa_table', 11),
(24, '2024_04_13_224506_create_tahun_akademik_table', 11),
(25, '2024_04_14_154844_create_perwalian_table', 11),
(26, '2024_04_14_174248_crate_tahun_table', 11),
(30, '2024_04_14_180714_add_tahun_terbit_to_mahasiswa', 12),
(31, '2024_04_17_155058_create_tahun_table', 13),
(32, '2024_04_24_022019_create_krs_table', 14),
(33, '2024_04_27_145430_add_mahasiswa_id_to_users_table', 15),
(35, '2024_05_02_014552_add_dosen_id_to_users_table', 16),
(36, '2024_05_03_024151_create_catatan_perwalians_table', 17),
(37, '2024_05_03_024747_add_dosen_id_to_users_table', 17),
(38, '0001_01_01_000001_create_cache_table', 18),
(39, '2024_05_09_141621_create_catatan_perwalian_table', 19),
(40, '2024_05_25_093850_add_balasan_dosen_to_catatan_perwalian_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perwalian`
--

CREATE TABLE `perwalian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik_id` varchar(20) NOT NULL,
  `tanggal_perwalian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perwalian`
--

INSERT INTO `perwalian` (`id`, `nim`, `nama_mahasiswa`, `program_studi`, `dosen_id`, `tahun_akademik_id`, `tanggal_perwalian`, `created_at`, `updated_at`, `mahasiswa_id`) VALUES
(63, '1222001', '80', '1', 34, '3', '2024-05-27', '2024-05-27 06:31:24', '2024-05-27 06:31:24', 80),
(64, '1222002', '81', '1', 34, '3', '2024-05-27', '2024-05-27 06:36:23', '2024-05-27 06:36:23', 81);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `nomor`, `kode_prodi`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, NULL, 'KP01IF', 'Teknik Informatika', '2024-04-14 11:34:26', '2024-04-15 11:35:16'),
(2, NULL, 'KP02SI', 'Sistem Informasi', '2024-04-15 06:00:48', '2024-05-03 19:11:53'),
(4, NULL, 'KP03DKV', 'DKV', '2024-05-20 18:20:28', '2024-05-20 18:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(25) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun_akademik`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(3, '2023/2024', 'Ganjil', 'Nonaktif', '2024-04-19 00:30:04', '2024-04-19 00:30:04'),
(4, '2021/2022', 'Genap', 'Aktif', '2024-04-19 00:59:31', '2024-04-19 00:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` bigint(20) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mahasiswa_id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `dosen_id`) VALUES
(4, NULL, 'admin', 'admin@example.com', 'admin', NULL, '$2y$10$XXpMwhhmG6ME/y8s7c84zuyy41PPdQyXhA7SC/HdrEVjhulzxwLuW', NULL, '2024-04-15 05:25:38', '2024-04-15 05:25:38', NULL),
(80, 80, 'Arya Budi Raharja', 'raharjaarya666@gmail.com', 'mahasiswa', NULL, '$2y$10$2z.XxA3yMo1.pNhd0o219ekAQMkYR5FvTSlw8oYb..JdrE5pqFEUC', NULL, '2024-05-27 06:31:45', '2024-05-27 06:31:45', NULL),
(81, 81, 'Andi Atma Sri Ayu', 'ayusri@gmail.com', 'mahasiswa', NULL, '$2y$10$I5LiFw62wAuboGqrZ.r6a.U7Ceqx7WfKKaJ5nD03uZi77ZI7WxMoC', NULL, '2024-05-27 06:36:50', '2024-05-27 06:36:50', NULL),
(83, NULL, 'Nisrina Mahira', 'nisrinamhr@dosenuniversitas.id', 'dosen', NULL, '$2y$10$KktkJwNU1ZgL7cK6k2LCvOQ3TKZhWq9Qeu/RxRoVziei.JDjMG.rS', NULL, '2024-05-27 06:33:04', '2024-05-27 06:33:04', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `catatan_perwalian`
--
ALTER TABLE `catatan_perwalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catatan_perwalian_perwalian_id_foreign` (`perwalian_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nidn_unique` (`nidn`),
  ADD UNIQUE KEY `dosen_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perwalian`
--
ALTER TABLE `perwalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perwalian_nim_foreign` (`nim`),
  ADD KEY `perwalian_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_studi_kode_prodi_unique` (`kode_prodi`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `users_dosen_id_foreign` (`dosen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_perwalian`
--
ALTER TABLE `catatan_perwalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perwalian`
--
ALTER TABLE `perwalian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_perwalian`
--
ALTER TABLE `catatan_perwalian`
  ADD CONSTRAINT `catatan_perwalian_perwalian_id_foreign` FOREIGN KEY (`perwalian_id`) REFERENCES `perwalian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perwalian`
--
ALTER TABLE `perwalian`
  ADD CONSTRAINT `perwalian_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `perwalian_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
