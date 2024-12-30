-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 10:05 AM
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
-- Database: `db_topsis_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `file`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rika', 'F`O17^$QmpyH|!B', 'Cinthia Rahimah', 'default.png', 'admin', 'active', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(2, 'Endra', 'VWysB4@xs6%7(SKG#_', 'Rahmi Jane Haryanti', 'default.png', 'user', 'inactive', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(3, 'Eko', '@2,^k[\'', 'Mumpuni Firmansyah S.Ked', 'default.png', 'user', 'active', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(4, 'Nova', '_&K@H#uI|3ot', 'Maimunah Halimah', 'default.png', 'admin', 'active', '2024-11-30 08:51:31', '2024-11-30 09:46:45'),
(5, 'Oliva', 'n{d2M[nDr<GNw8s?t$', 'Umaya Saputra', 'default.png', 'admin', 'inactive', '2024-11-30 08:51:31', '2024-11-30 08:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` bigint(20) UNSIGNED DEFAULT NULL,
  `kinerja` int(11) NOT NULL,
  `komunikasi` int(11) NOT NULL,
  `kerjasama` int(11) NOT NULL,
  `kreativitas` int(11) NOT NULL,
  `disiplin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_akun`, `id_karyawan`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 2, 1, 4, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(2, 2, 2, 1, 3, 2, 5, 4, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(3, 3, 3, 4, 1, 5, 3, 4, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(4, 4, 4, 1, 5, 1, 2, 5, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(5, 4, 5, 5, 4, 2, 1, 4, '2024-11-30 08:51:31', '2024-11-30 09:39:01');

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
-- Table structure for table `ideal_negatif`
--

CREATE TABLE `ideal_negatif` (
  `id_ideal_negatif` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `kinerja` double NOT NULL,
  `komunikasi` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kreativitas` double NOT NULL,
  `disiplin` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideal_negatif`
--

INSERT INTO `ideal_negatif` (`id_ideal_negatif`, `id_alternatif`, `nama`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 'A-', 0.1221694443563, 3.2444284226152, 0.7905694150421, 0.21199957600128, 0.005523883343626, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `ideal_positif`
--

CREATE TABLE `ideal_positif` (
  `id_ideal_positif` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `kinerja` double NOT NULL,
  `komunikasi` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kreativitas` double NOT NULL,
  `disiplin` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideal_positif`
--

INSERT INTO `ideal_positif` (`id_ideal_positif`, `id_alternatif`, `nama`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 'A+', 0.61084722178152, 0.64888568452304, 3.9528470752105, 1.0599978800064, 0.0044191066749007, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `jarak_negatif`
--

CREATE TABLE `jarak_negatif` (
  `id_jarak_negatif` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jarak_negatif`
--

INSERT INTO `jarak_negatif` (`id_jarak_negatif`, `id_alternatif`, `id_karyawan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1.0227677410392, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(2, 2, 2, 1.7402048357715, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(3, 3, 3, 4.1292792306772, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(4, 4, 4, 0.21199957600126, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(5, 5, 5, 1.1335165734384, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `jarak_positif`
--

CREATE TABLE `jarak_positif` (
  `id_jarak_positif` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jarak_positif`
--

INSERT INTO `jarak_positif` (`id_jarak_positif`, `id_alternatif`, `id_karyawan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3.2206180739037, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(2, 2, 2, 2.7473653736744, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(3, 3, 3, 0.4412489705747, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(4, 4, 4, 4.1689499490839, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(5, 5, 5, 3.1833276312384, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

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
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `lahir` date NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_akun`, `nama`, `lahir`, `telepon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yono Kawaca Mansur S.H.', '2007-05-29', '0508 5678 439', 'aswani.irawan@gmail.co.id', 'Kpg. Suharso No. 494, Tangerang 67766, Sultra', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(2, 2, 'Laras Novitasari', '1984-05-30', '0356 3326 7847', 'mardhiyah.sari@maryati.my.id', 'Kpg. Sutoyo No. 731, Palangka Raya 24248, Sumbar', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(3, 3, 'Juli Violet Hassanah S.I.Kom', '1989-07-27', '0438 1900 678', 'hilda.purnawati@mandasari.biz.id', 'Gg. Monginsidi No. 45, Sorong 12817, Kalteng', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(4, 4, 'Ibrahim Nashiruddin', '2002-10-30', '(+62) 497 5155 962', 'padma.mardhiyah@sihombing.web.id', 'Ki. Abdul Muis No. 751, Kupang 88508, Gorontalo', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(5, 5, 'Maras Saka Firgantoro S.E.', '1996-04-20', '(+62) 676 6627 6731', 'kpuspita@gmail.co.id', 'Jln. Wahid Hasyim No. 671, Surabaya 83163, NTT', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(6, 4, 'ewrwr', '2024-11-19', '654323456543', 'saya@gmail.com', 'sadadas', '2024-11-30 09:45:47', '2024-11-30 09:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED DEFAULT NULL,
  `kriteria` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_akun`, `kriteria`, `keterangan`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'kreativitas', 'Totam expedita quam.', 1, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(2, 2, 'kerjasama', 'Dolorem aliquid.', 4, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(3, 3, 'kreativitas', 'Delectus id.', 5, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(4, 4, 'komunikasi', 'Sunt nisi totam nam.', 2, '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(5, 5, 'disiplin', 'Quibusdam velit.', 5, '2024-11-30 08:51:31', '2024-11-30 08:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_akun`, `id_karyawan`, `tanggal`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-09-21', 'Sit non vel omnis.', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(2, 2, 2, '1973-06-29', 'Iste enim esse.', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(3, 3, 3, '2015-02-13', 'Id eveniet officiis.', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(4, 4, 4, '1997-07-28', 'Qui sit aut aut.', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(5, 5, 5, '2007-09-19', 'Nisi suscipit.', '2024-11-30 08:51:31', '2024-11-30 08:51:31'),
(6, 4, 6, '2024-11-12', 'tugas-azizah.pdf', '2024-11-30 09:46:28', '2024-11-30 09:46:28');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_06_113650_migration_akun', 1),
(5, '2024_11_06_113745_migration_karyawan', 1),
(6, '2024_11_06_114720_migration_kriteria', 1),
(7, '2024_11_06_114741_migration_laporan', 1),
(8, '2024_11_06_114751_migration_alternatif', 1),
(9, '2024_11_06_114812_migration_pembagi', 1),
(10, '2024_11_06_114820_migration_terbobot_r', 1),
(11, '2024_11_06_114825_migration_terbobot_y', 1),
(12, '2024_11_06_114854_migration_ideal_positif', 1),
(13, '2024_11_06_114910_migration_ideal_negatif', 1),
(14, '2024_11_06_114936_migration_jarak_positif', 1),
(15, '2024_11_06_114942_migration_jarak_negatif', 1),
(16, '2024_11_06_114953_migration_perangkingan', 1);

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
-- Table structure for table `pembagi`
--

CREATE TABLE `pembagi` (
  `id_pembagi` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `kinerja` double NOT NULL,
  `komunikasi` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kreativitas` double NOT NULL,
  `disiplin` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembagi`
--

INSERT INTO `pembagi` (`id_pembagi`, `id_alternatif`, `nama`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembagi', 8.1853527718725, 6.164414002969, 6.3245553203368, 9.4339811320566, 4525.8015864596, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `perangkingan`
--

CREATE TABLE `perangkingan` (
  `id_perangkingan` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkingan`
--

INSERT INTO `perangkingan` (`id_perangkingan`, `id_alternatif`, `id_karyawan`, `nilai`, `rank`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.2410263373737, 4, '2024-11-30 09:39:02', '2024-11-30 09:39:02'),
(2, 2, 2, 0.38778331135824, 2, '2024-11-30 09:39:02', '2024-11-30 09:39:02'),
(3, 3, 3, 0.90345777311825, 1, '2024-11-30 09:39:02', '2024-11-30 09:39:02'),
(4, 4, 4, 0.048391239110918, 5, '2024-11-30 09:39:02', '2024-11-30 09:39:02'),
(5, 5, 5, 0.26257991247643, 3, '2024-11-30 09:39:02', '2024-11-30 09:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1IGI9BHw1vuyYtBt3A5Kje3mnw2IUlCHdpxPlNQq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Ik5TY01vbnNsbGE3TlA3Y3VVaWNpUkVPRVdOblAwUDY3Q2RlTFR5bUkiO30=', 1732986431);

-- --------------------------------------------------------

--
-- Table structure for table `terbobot_r`
--

CREATE TABLE `terbobot_r` (
  `id_terbobot_r` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kinerja` double NOT NULL,
  `komunikasi` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kreativitas` double NOT NULL,
  `disiplin` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terbobot_r`
--

INSERT INTO `terbobot_r` (`id_terbobot_r`, `id_alternatif`, `id_karyawan`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.1221694443563, 0.64888568452305, 0.31622776601684, 0.10599978800064, 0.00088382133498015, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(2, 2, 2, 0.1221694443563, 0.48666426339229, 0.31622776601684, 0.52999894000318, 0.00088382133498015, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(3, 3, 3, 0.48867777742522, 0.16222142113076, 0.79056941504209, 0.31799936400191, 0.00088382133498015, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(4, 4, 4, 0.1221694443563, 0.81110710565381, 0.15811388300842, 0.21199957600127, 0.0011047766687252, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(5, 5, 5, 0.61084722178152, 0.64888568452305, 0.31622776601684, 0.10599978800064, 0.00088382133498015, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `terbobot_y`
--

CREATE TABLE `terbobot_y` (
  `id_terbobot_y` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kinerja` double NOT NULL,
  `komunikasi` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kreativitas` double NOT NULL,
  `disiplin` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terbobot_y`
--

INSERT INTO `terbobot_y` (`id_terbobot_y`, `id_alternatif`, `id_karyawan`, `kinerja`, `komunikasi`, `kerjasama`, `kreativitas`, `disiplin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.1221694443563, 2.5955427380922, 1.5811388300842, 0.21199957600128, 0.0044191066749007, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(2, 2, 2, 0.1221694443563, 1.9466570535692, 1.5811388300842, 1.0599978800064, 0.0044191066749007, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(3, 3, 3, 0.48867777742522, 0.64888568452304, 3.9528470752105, 0.63599872800382, 0.0044191066749007, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(4, 4, 4, 0.1221694443563, 3.2444284226152, 0.7905694150421, 0.42399915200254, 0.005523883343626, '2024-11-30 09:39:01', '2024-11-30 09:39:01'),
(5, 5, 5, 0.61084722178152, 2.5955427380922, 1.5811388300842, 0.21199957600128, 0.0044191066749007, '2024-11-30 09:39:01', '2024-11-30 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-11-30 08:51:30', '$2y$12$QDJSz5XWsaoRpwgn3hgSj.f/ZKX6leL0OH/53EymtqgripGMvq4QO', 'p0dwuHVIP5', '2024-11-30 08:51:31', '2024-11-30 08:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `alternatif_id_akun_foreign` (`id_akun`),
  ADD KEY `alternatif_id_karyawan_foreign` (`id_karyawan`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ideal_negatif`
--
ALTER TABLE `ideal_negatif`
  ADD PRIMARY KEY (`id_ideal_negatif`),
  ADD KEY `ideal_negatif_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `ideal_positif`
--
ALTER TABLE `ideal_positif`
  ADD PRIMARY KEY (`id_ideal_positif`),
  ADD KEY `ideal_positif_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `jarak_negatif`
--
ALTER TABLE `jarak_negatif`
  ADD PRIMARY KEY (`id_jarak_negatif`),
  ADD KEY `jarak_negatif_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `jarak_positif`
--
ALTER TABLE `jarak_positif`
  ADD PRIMARY KEY (`id_jarak_positif`),
  ADD KEY `jarak_positif_id_alternatif_foreign` (`id_alternatif`);

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
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `karyawan_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kriteria_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `laporan_id_akun_foreign` (`id_akun`),
  ADD KEY `laporan_id_karyawan_foreign` (`id_karyawan`);

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
-- Indexes for table `pembagi`
--
ALTER TABLE `pembagi`
  ADD PRIMARY KEY (`id_pembagi`),
  ADD KEY `pembagi_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id_perangkingan`),
  ADD KEY `perangkingan_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `terbobot_r`
--
ALTER TABLE `terbobot_r`
  ADD PRIMARY KEY (`id_terbobot_r`),
  ADD KEY `terbobot_r_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `terbobot_y`
--
ALTER TABLE `terbobot_y`
  ADD PRIMARY KEY (`id_terbobot_y`),
  ADD KEY `terbobot_y_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideal_negatif`
--
ALTER TABLE `ideal_negatif`
  MODIFY `id_ideal_negatif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ideal_positif`
--
ALTER TABLE `ideal_positif`
  MODIFY `id_ideal_positif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jarak_negatif`
--
ALTER TABLE `jarak_negatif`
  MODIFY `id_jarak_negatif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jarak_positif`
--
ALTER TABLE `jarak_positif`
  MODIFY `id_jarak_positif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembagi`
--
ALTER TABLE `pembagi`
  MODIFY `id_pembagi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id_perangkingan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terbobot_r`
--
ALTER TABLE `terbobot_r`
  MODIFY `id_terbobot_r` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terbobot_y`
--
ALTER TABLE `terbobot_y`
  MODIFY `id_terbobot_y` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ideal_negatif`
--
ALTER TABLE `ideal_negatif`
  ADD CONSTRAINT `ideal_negatif_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ideal_positif`
--
ALTER TABLE `ideal_positif`
  ADD CONSTRAINT `ideal_positif_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jarak_negatif`
--
ALTER TABLE `jarak_negatif`
  ADD CONSTRAINT `jarak_negatif_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jarak_positif`
--
ALTER TABLE `jarak_positif`
  ADD CONSTRAINT `jarak_positif_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembagi`
--
ALTER TABLE `pembagi`
  ADD CONSTRAINT `pembagi_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD CONSTRAINT `perangkingan_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terbobot_r`
--
ALTER TABLE `terbobot_r`
  ADD CONSTRAINT `terbobot_r_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terbobot_y`
--
ALTER TABLE `terbobot_y`
  ADD CONSTRAINT `terbobot_y_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
