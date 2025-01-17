-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2025 pada 04.48
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kayujaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkah_kayu`
--

CREATE TABLE `berkah_kayu` (
  `id_kayu` int(11) NOT NULL,
  `jenis_kayu` varchar(150) NOT NULL,
  `lebar_kayu` int(11) NOT NULL,
  `tinggi_kayu` int(11) NOT NULL,
  `harga_kayu` int(11) NOT NULL,
  `stok_kayu` int(11) NOT NULL,
  `keterangan_kayu` varchar(256) NOT NULL,
  `foto_kayu` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkah_kayu`
--

INSERT INTO `berkah_kayu` (`id_kayu`, `jenis_kayu`, `lebar_kayu`, `tinggi_kayu`, `harga_kayu`, `stok_kayu`, `keterangan_kayu`, `foto_kayu`, `date_created`, `update_at`) VALUES
(1, 'Kayu Jati Merah', 12, 20, 150000, 8, 'Kayu Jati Merah', 'gambarkayu.png', '2024-08-06 11:14:26', '2025-01-15 21:27:06'),
(2, 'Kayu Kamper', 12, 350, 1008000, 25, 'Lebar 12cm, tebal 8 cm, panjang 350cm\r\nHarga per kubik Rp. 3.000.000', 'jenis_kayukamper.png', '2024-08-29 11:37:08', '2025-01-17 10:41:10'),
(3, 'Kayu Merbau', 20, 12, 100000, 15, 'Kayu Merbau', 'kayu_merbau.png', '2025-01-15 11:15:14', '2025-01-15 21:27:23'),
(4, 'Kayu Meranti', 12, 31, 75000, 15, 'Kayu Meranti Batu', 'kayu_meranti.png', '2025-01-15 11:16:01', '2025-01-15 21:27:30'),
(5, 'Kayu Cemara', 20, 15, 70000, 27, 'Kayu Cemara', 'kayu_cemara.png', '2025-01-15 11:18:38', '2025-01-15 21:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_kayu`
--

CREATE TABLE `gambar_kayu` (
  `id_gambarkayu` int(11) NOT NULL,
  `id_kayu` int(11) NOT NULL,
  `gambar_berkahkayu` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_kayu`
--

INSERT INTO `gambar_kayu` (`id_gambarkayu`, `id_kayu`, `gambar_berkahkayu`, `date_created`, `update_at`) VALUES
(7, 1, 'gambar_kayu1.png', '2025-01-16 15:21:02', '0000-00-00 00:00:00'),
(8, 1, 'gambar_kayu2.png', '2025-01-16 15:21:07', '0000-00-00 00:00:00'),
(9, 1, 'gambar_kayu3.png', '2025-01-16 15:21:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_berkahkayu`
--

CREATE TABLE `kegiatan_berkahkayu` (
  `id_kegiatan` int(11) NOT NULL,
  `deskripsi_kegiatan` varchar(500) NOT NULL,
  `upload_kegiatan` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan_berkahkayu`
--

INSERT INTO `kegiatan_berkahkayu` (`id_kegiatan`, `deskripsi_kegiatan`, `upload_kegiatan`, `date_created`, `update_at`) VALUES
(4, 'Xyz Kyz', 'bongkaran1.png', '2025-01-16 14:45:20', '2025-01-16 14:58:22'),
(5, 'Kylz Cyza', 'bongkaran2.png', '2025-01-16 14:45:39', '2025-01-16 14:58:28'),
(6, 'Test 1', 'bongkaran3.png', '2025-01-16 14:58:53', '0000-00-00 00:00:00'),
(7, 'Tets 2', 'bongkaran4.png', '2025-01-16 14:59:04', '0000-00-00 00:00:00'),
(8, 'Test 3', 'bongkaran5.png', '2025-01-16 14:59:36', '2025-01-16 14:59:47'),
(9, 'Test 4', 'bongkaran6.png', '2025-01-16 15:00:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `image` varchar(128) NOT NULL,
  `token` varchar(300) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `nama`, `email`, `password`, `role_id`, `is_active`, `image`, `token`, `date_created`, `update_at`) VALUES
(1, 'administrator', 'admin', 'admin@gmail.com', '$2y$10$ptzHJemkAm8xk3pB8rCZ3OvuS/eBZ.UFVRcvrDgaH65zzo3cVM7PG', 1, 1, 'logo_berkah_kayu.png', '', '2024-05-29 09:17:52', '0000-00-00 00:00:00'),
(2, 'user', 'User', 'user@gmail.com', '$2y$10$uThklgC2nYLEo5XO1DWerueuEwgVSbuRkQa2tnFb4CEvsCW1FQLb2', 2, 1, '1717146421-0bd5ef9c768b91993461ff6733dd1536.jpg', '', '2024-05-29 09:23:21', '2024-05-31 16:07:14'),
(3, 'pelanggan', 'Pelanggan', 'pelanggan@gmail.com', '$2y$10$Hf8yhWQzrxD0sz8GbK57TeJC/awTAQoodpNDbF5AIX0jMl/9/YhCe', 3, 1, 'default.png', '', '2024-05-31 16:09:54', '2024-05-31 16:12:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_role`
--

CREATE TABLE `login_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_role`
--

INSERT INTO `login_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_berkahkayu`
--

CREATE TABLE `pesanan_berkahkayu` (
  `id_pesanankayu` int(11) NOT NULL,
  `id_kayu` int(11) NOT NULL,
  `nama_customer` varchar(256) NOT NULL,
  `tanggal_pesankayu` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat_pesanan` varchar(256) NOT NULL,
  `is_read` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 1, 3),
(6, 2, 5),
(8, 1, 5),
(9, 1, 6),
(10, 1, 7),
(11, 1, 8),
(12, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `target_menu` varchar(128) NOT NULL,
  `idtarget_menu` varchar(128) NOT NULL,
  `icon_menu` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `target_menu`, `idtarget_menu`, `icon_menu`, `date_created`, `update_at`) VALUES
(1, 'Dashboard', '#submenu-1', 'submenu-1', 'fa fa-fw fa-rocket', '0000-00-00 00:00:00', '2024-05-30 14:51:54'),
(2, 'Administrator', '#submenu-2', 'submenu-2', 'fa fa-fw fa-user-circle', '0000-00-00 00:00:00', '2024-05-30 14:52:09'),
(3, 'Menu', '#submenu-3', 'submenu-3', 'fa fa-fw fa-book', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'User', '#submenu-4', 'submenu-4', 'fa fa-fw fa-user', '2024-05-30 14:53:04', '0000-00-00 00:00:00'),
(6, 'Kayu', '#submenu-5', 'submenu-5', 'fa fa-fw fa-th-large', '2024-05-31 16:14:42', '2024-08-06 10:33:56'),
(7, 'Pesanankayu', '#submenu-6', 'submenu-6', 'fa fa-fw fa-paper-plane', '2024-08-06 11:23:40', '2024-08-06 11:25:24'),
(8, 'Gambarkayu', '#submenu-7', 'submenu-7', 'fa fa-fw fa-image', '2025-01-01 10:09:58', '0000-00-00 00:00:00'),
(9, 'Kegiatan', '#submenu-8', 'submenu-8', 'fa fa-fw fa-people-carry', '2025-01-14 08:38:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `date_created`, `update_at`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fa fa-fw fa-rocket', 1, '0000-00-00 00:00:00', '2024-05-30 14:53:24'),
(2, 2, 'Administrator', 'administrator', 'fa fa-fw fa-user-circle', 1, '0000-00-00 00:00:00', '2024-05-30 14:53:52'),
(3, 3, 'Menu Management', 'menu', 'fa fa-fw fa-folder', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 'Submenu Management', 'menu/submenu', 'fa fa-fw fa-folder-open', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 5, 'My Profile', 'user', 'fa fa-fw fa-user', 1, '2024-05-30 14:54:31', '0000-00-00 00:00:00'),
(7, 2, 'Role', 'administrator/role', 'fa fa-fw fa-user-plus', 1, '2024-05-30 15:02:12', '2024-05-30 15:04:34'),
(9, 6, 'Kayu', 'kayu', 'fa fa-fw fa-th', 1, '2024-08-06 10:35:24', '0000-00-00 00:00:00'),
(10, 7, 'Pesanan Kayu', 'pesanankayu', 'fa fa-fw fa-paper-plane', 1, '2024-08-06 11:24:31', '0000-00-00 00:00:00'),
(11, 8, 'Gambar Kayu', 'gambarkayu', 'fa fa-fw fa-image', 1, '2025-01-01 10:10:37', '0000-00-00 00:00:00'),
(12, 9, 'Kegiatan Berkah Kayu Jaya', 'kegiatan', 'fa fa-fw fa-tasks', 1, '2025-01-14 08:39:46', '2025-01-14 08:42:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkah_kayu`
--
ALTER TABLE `berkah_kayu`
  ADD PRIMARY KEY (`id_kayu`);

--
-- Indeks untuk tabel `gambar_kayu`
--
ALTER TABLE `gambar_kayu`
  ADD PRIMARY KEY (`id_gambarkayu`);

--
-- Indeks untuk tabel `kegiatan_berkahkayu`
--
ALTER TABLE `kegiatan_berkahkayu`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_role`
--
ALTER TABLE `login_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_berkahkayu`
--
ALTER TABLE `pesanan_berkahkayu`
  ADD PRIMARY KEY (`id_pesanankayu`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkah_kayu`
--
ALTER TABLE `berkah_kayu`
  MODIFY `id_kayu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `gambar_kayu`
--
ALTER TABLE `gambar_kayu`
  MODIFY `id_gambarkayu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_berkahkayu`
--
ALTER TABLE `kegiatan_berkahkayu`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login_role`
--
ALTER TABLE `login_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan_berkahkayu`
--
ALTER TABLE `pesanan_berkahkayu`
  MODIFY `id_pesanankayu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
