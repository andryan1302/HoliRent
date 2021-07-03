-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2021 pada 07.36
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holirent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'andryan', '$2y$10$BNZkpZF6ceCcMUsPSAL3a.jnqnJILR63ccdc.3sM21VJd2zozxcX6', '2020-11-28 12:31:28', '2020-11-28 12:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `plat_nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buses`
--

INSERT INTO `buses` (`id`, `supplier_id`, `plat_nomor`, `nama_bus`, `tipe`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 1, 'HG - 1010 - 20', 'Mitsubisi Balis', 'NON-HD', 50000, '1614518694.png', '2021-02-28 06:24:54', '2021-02-28 06:24:54'),
(6, 3, 'deqwe', 'test', 'NON-HD', 311000, '1615031167.jpeg', '2021-03-06 04:46:07', '2021-03-06 04:46:22'),
(7, 4, 'hhaaa', 'test', 'HD', 12312321, '1617986256.jpg', '2021-04-09 09:37:36', '2021-04-09 09:37:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('A','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `email`, `nama`, `password`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'andryan130203@gmail.com', 'andryan', '$2y$10$eFuXEC3csTDkGwpzlP2xwe1aXE.MXPS65b1.LtHEtYNnthR5gsMDi', 'jl katulampa blok d8 no 10', 'A', '2020-11-28 12:33:48', '2020-12-30 00:41:50'),
(7, 'demo@gmail.com', 'demo', '$2y$10$GNyof2Tq1480D6BWPNGp2uHVCAbmiOWhL.oryXIUFQmDr74Qql5pK', 'demo', 'A', '2021-03-06 04:47:21', '2021-03-06 04:47:21'),
(8, 'danangwahyu@gmail.com', 'danangs', '$2y$10$q2zpX2woWUlTWun9ilnNoOT7cwouiE3BzaumPPnosCOTuHvsktqxu', 'danangs', 'A', '2021-04-08 08:32:08', '2021-04-08 08:32:08'),
(9, 'test@gmail.com', 'test', '$2y$10$eh9L/S7eRWq/g4hLpRNoyOP2p4d1ujj/E4qHHvNzaDsg.tt5jnXlm', 'test', 'A', '2021-04-08 08:34:27', '2021-04-08 08:34:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `no_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`no_transaksi`, `customer_id`, `bus_id`, `tanggal_sewa`, `tanggal_selesai`, `total`, `status`, `created_at`, `updated_at`) VALUES
('ajZfVFeE', 1, 6, '2021-04-08', '2021-04-09', 311000, 'Berhasil', '2021-04-08 02:03:36', '2021-04-08 02:03:36'),
('CRSUFuqo', 8, 5, '2021-04-08', '2021-04-10', 100000, 'Berhasil', '2021-04-08 08:33:14', '2021-04-08 08:33:14'),
('G09osY5B', 1, 6, '2021-04-08', '2021-04-09', 311000, 'Berhasil', '2021-04-08 08:09:29', '2021-04-08 08:09:29'),
('IS5PEH4f', 9, 5, '2021-04-08', '2021-04-10', 100000, 'Berhasil', '2021-04-08 08:35:13', '2021-04-08 08:35:13'),
('itZuAHfU', 1, 7, '2021-04-10', '2021-04-11', 31231231, 'Berhasil', '2021-04-09 09:58:00', '2021-04-09 09:58:00');

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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_11_19_133726_create_customers_table', 1),
(3, '2020_11_19_134030_create_admins_table', 1),
(4, '2020_11_19_140319_create_suppliers_table', 1),
(5, '2020_11_20_142349_create_buses_table', 1),
(6, '2020_11_20_142435_create_transactions_table', 1),
(7, '2020_11_20_142501_create_history_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('A','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `email`, `nama_company`, `password`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mitsubisi@gmail.com', 'Mitsubisi', '$2y$10$SMsOhjRBOQ1NEhBaMCQTeeFQ5uVP8iGj9XepaBvpokuF.IOgPF27K', '08980916908', 'A', '2020-11-28 12:35:43', '2021-02-05 02:14:44'),
(2, 'toyota@gmail.com', 'Toyota', '$2y$10$.DxStUvAY0IJa3E6FiXFR.2WD49grgsh/1RV.p74CaF7hW/KokmSu', '089635665176', 'A', '2020-11-28 12:35:43', '2021-02-05 02:15:27'),
(3, 'honda@gmail.com', 'Honda Company', '$2y$10$SMsOhjRBOQ1NEhBaMCQTeeFQ5uVP8iGj9XepaBvpokuF.IOgPF27K', '082117813378', 'A', '2021-02-08 08:15:41', '2021-02-21 07:12:55'),
(4, 'supplier@gmail.com', 'suppplier supplier', '$2y$10$QFCVZVtoZ4Vk.7i74X3r2.4skAUnVu/LLn/ljdmfXnHHMKWUDvJmK', '082117813378', 'A', '2021-02-22 20:27:07', '2021-02-22 21:15:39'),
(5, 'saya@gmail.com', 'sayacompany', '$2y$10$oNblcxggt82/g/qD/myxLu//hvACOHl7LfFlr.ZPemB4snuXiujOy', '082117813378', 'A', '2021-04-08 09:55:48', '2021-04-08 09:56:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `no_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_sewa` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indeks untuk tabel `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `history_customer_id_foreign` (`customer_id`),
  ADD KEY `history_bus_id_foreign` (`bus_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_nama_company_unique` (`nama_company`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD KEY `transactions_customer_id_foreign` (`customer_id`),
  ADD KEY `transactions_bus_id_foreign` (`bus_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
