-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 06, 2025 at 06:06 AM
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
-- Database: `binaland`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `company` enum('Binaland','Superland') NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `fk_id_lokasi` int(11) DEFAULT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_fasilitas`
--

CREATE TABLE `gambar_fasilitas` (
  `id_gambar_fasilitas` int(11) NOT NULL,
  `fk_id_fasilitas` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_lokasi`
--

CREATE TABLE `gambar_lokasi` (
  `id_gambar_lokasi` int(11) NOT NULL,
  `fk_id_lokasi` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_rumah`
--

CREATE TABLE `gambar_rumah` (
  `id_gambar` int(11) NOT NULL,
  `fk_id_tipe_rumah` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `company` enum('Binaland','Superland') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `reservasi_lokasi`
--

CREATE TABLE `reservasi_lokasi` (
  `id_reservasi_lokasi` int(11) NOT NULL,
  `fk_id_reservasi` int(11) DEFAULT NULL,
  `fk_id_lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_survey`
--

CREATE TABLE `reservasi_survey` (
  `id_reservasi` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `jam_survey` time NOT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Pending','Dikonfirmasi','Dibatalkan') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi_survey`
--

INSERT INTO `reservasi_survey` (`id_reservasi`, `nama_pemesan`, `nomor_telepon`, `email`, `tanggal_survey`, `jam_survey`, `catatan`, `status`) VALUES
(6, 'Fajrul Falah', '085735035625', 'fajrulfalah.peta@gmail.com', '2025-05-05', '15:04:00', 'DP Dulu', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_rumah`
--

CREATE TABLE `tipe_rumah` (
  `id_tipe_rumah` int(11) NOT NULL,
  `fk_id_lokasi` int(11) DEFAULT NULL,
  `nama_tipe` varchar(100) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `jumlah_kamar` int(5) NOT NULL,
  `jumlah_kamar_mandi` int(5) NOT NULL,
  `fasilitas_unggulan` varchar(100) NOT NULL,
  `is_promo` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `address`, `city`, `country`, `postal`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', 'admin@argon.com', NULL, '$2y$10$z6ZjwJ2aYHj7WiJGNd6L9.bNbwI1EqsJcOtbxlZnWm/YrPTOR0OsS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Super Admin', 'Admin', 'Binaland', 'binaland@gmail.com', NULL, '$2a$10$UCkj8KbavOrl7AbZL/C1yOWikkBnlR7ZWUYOkbehgfz5vDN7ipwe6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `fk_id_lokasi` (`fk_id_lokasi`);

--
-- Indexes for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  ADD PRIMARY KEY (`id_gambar_fasilitas`),
  ADD KEY `fk_id_fasilitas` (`fk_id_fasilitas`);

--
-- Indexes for table `gambar_lokasi`
--
ALTER TABLE `gambar_lokasi`
  ADD PRIMARY KEY (`id_gambar_lokasi`),
  ADD KEY `fk_id_lokasi` (`fk_id_lokasi`);

--
-- Indexes for table `gambar_rumah`
--
ALTER TABLE `gambar_rumah`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk_id_tipe_rumah` (`fk_id_tipe_rumah`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

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
-- Indexes for table `reservasi_lokasi`
--
ALTER TABLE `reservasi_lokasi`
  ADD PRIMARY KEY (`id_reservasi_lokasi`),
  ADD KEY `fk_id_reservasi` (`fk_id_reservasi`),
  ADD KEY `fk_id_lokasi` (`fk_id_lokasi`);

--
-- Indexes for table `reservasi_survey`
--
ALTER TABLE `reservasi_survey`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  ADD PRIMARY KEY (`id_tipe_rumah`),
  ADD KEY `fk_id_lokasi` (`fk_id_lokasi`);

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
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  MODIFY `id_gambar_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gambar_lokasi`
--
ALTER TABLE `gambar_lokasi`
  MODIFY `id_gambar_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gambar_rumah`
--
ALTER TABLE `gambar_rumah`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi_lokasi`
--
ALTER TABLE `reservasi_lokasi`
  MODIFY `id_reservasi_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservasi_survey`
--
ALTER TABLE `reservasi_survey`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  MODIFY `id_tipe_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`fk_id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE;

--
-- Constraints for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  ADD CONSTRAINT `gambar_fasilitas_ibfk_1` FOREIGN KEY (`fk_id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE;

--
-- Constraints for table `gambar_lokasi`
--
ALTER TABLE `gambar_lokasi`
  ADD CONSTRAINT `gambar_lokasi_ibfk_1` FOREIGN KEY (`fk_id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE;

--
-- Constraints for table `gambar_rumah`
--
ALTER TABLE `gambar_rumah`
  ADD CONSTRAINT `gambar_rumah_ibfk_1` FOREIGN KEY (`fk_id_tipe_rumah`) REFERENCES `tipe_rumah` (`id_tipe_rumah`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi_lokasi`
--
ALTER TABLE `reservasi_lokasi`
  ADD CONSTRAINT `reservasi_lokasi_ibfk_1` FOREIGN KEY (`fk_id_reservasi`) REFERENCES `reservasi_survey` (`id_reservasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_lokasi_ibfk_2` FOREIGN KEY (`fk_id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE;

--
-- Constraints for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  ADD CONSTRAINT `tipe_rumah_ibfk_1` FOREIGN KEY (`fk_id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
