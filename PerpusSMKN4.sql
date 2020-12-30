-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Des 2020 pada 14.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PerpusSMKN4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `BUKU`
--

CREATE TABLE `BUKU` (
  `ID_BUKU` int(11) NOT NULL,
  `Judul_Buku` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `ISNB` varchar(15) NOT NULL,
  `Gendre` varchar(50) NOT NULL,
  `Tgl_proses` date NOT NULL,
  `Sumber` varchar(255) NOT NULL,
  `No_induk` varchar(15) NOT NULL,
  `Stok` int(11) NOT NULL,
  `OutSide` int(11) NOT NULL,
  `Sinopsis` text NOT NULL,
  `Sampul_Depan` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `BUKU`
--

INSERT INTO `BUKU` (`ID_BUKU`, `Judul_Buku`, `Penerbit`, `Penulis`, `ISNB`, `Gendre`, `Tgl_proses`, `Sumber`, `No_induk`, `Stok`, `OutSide`, `Sinopsis`, `Sampul_Depan`) VALUES
(57, '34324341111', 'dsdsd', 'f', 'sadasdasd', '1', '2020-12-01', 'asdsad', 'asdsads', 5, 0, 'asdasd', 'sampel'),
(59, 'nanali', 'asd', 'asd', '123123', 'asdaasd', '2020-12-16', 'asd', 'asdasd', 3, 0, '123123', '123123'),
(60, '39101434372', '33434', 'l', 'tajur', '1', '2020-12-01', 'as', 'asd', 123, 0, 'asda', 'sampel'),
(61, '323434343234', 'fdsdfs4a', 'l', 'dsasasd', '1', '2020-12-01', 'asd', 'asdasd', 123, 0, 'asdasdasdasd', 'sampel'),
(62, '34324341111', 'dsdsd', 'f', 'sadasdasd', '1', '2020-12-01', 'asdsad', 'asdsads', 123, 0, 'asdasd', 'sampel'),
(63, '34324341111', '34324341111', '34324341111', '34324341111', '34324341111', '0000-00-00', '34324341111', '34324341111', 122212, 0, '34324341111', 'sampel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Kelas`
--

CREATE TABLE `Kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Kelas`
--

INSERT INTO `Kelas` (`id`, `kelas`) VALUES
(1, 'X-RPL1'),
(2, 'X-RPL2'),
(3, 'XI-RPL1'),
(4, 'XI-RPL2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Peminjaman`
--

CREATE TABLE `Peminjaman` (
  `ID_BUKU` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ID_Peminjam` int(11) NOT NULL,
  `Barcode_Buku` varchar(1000) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `deatline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `Kelas` varchar(255) NOT NULL,
  `NIP` varchar(2555) NOT NULL,
  `ThatPassw` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `Kelas`, `NIP`, `ThatPassw`) VALUES
(5, 'Sandhika Galih', 'sandhikagalih@unpas.ac.id', 'profile1.jpg', '$2y$10$nXnrqGQTjpvg58OtOB/N.evYQjVlz7KIW37oUSQSQ2EgNMD0Dgrzq', 1, 1, 1552120289, 'X-RPL1', '', ''),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263, 'X-RPL1', '', ''),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354, 'X-RPL1', '', ''),
(13, 'AGUSTINUS PARDAMEAN LUMBAN TOBING', 'admin@admin.com', 'WhatsApp_Image_2020-12-12_at_11_28_26.jpeg', '$2y$10$P2UAEphZnadEH.N3rWb2Zu10PzpEEHDy4mQK.pOeBtbNWdDmuw74S', 1, 1, 1608783887, 'XI-TKJ2', '13112039', '12345678'),
(14, 'Siswa1', 'admin2@admin.com', 'WhatsApp_Image_2020-12-12_at_11_28_261.jpeg', '$2y$10$.2DXR5BKb5/elr4lBOYQIuParF3QJtKlCtecBoU2aGS8kfGNgRiPi', 2, 1, 1608785160, 'XI-RPL1', '233421231234123', '123'),
(15, 'Siswa2', 'admin3@admin.com', 'default.jpg', '$2y$10$bO6WhaHNAhWuRkUdZ.b5FOGMfL2kRfOcQ03Uqnia/AhSYzu1A5R4O', 2, 1, 1609114622, 'X-RPL2', '0039101372', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(10, 2, 5),
(11, 1, 5),
(12, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Buku-Ku'),
(6, 'Buku-Ku Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

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
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Go Book', 'Buku', 'fas fa-fw fa-book', 1),
(10, 5, 'Kembalikan Buku', 'Buku_Kembali', 'fas fa-fw fa-calendar', 1),
(11, 1, 'Database Control', 'DB_control', 'fas fa-fw fa-database', 1),
(12, 6, 'Buku-ku Admin', 'Ad_buku', 'fas fa-fw fa-briefcase', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `BUKU`
--
ALTER TABLE `BUKU`
  ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indeks untuk tabel `Kelas`
--
ALTER TABLE `Kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Peminjaman`
--
ALTER TABLE `Peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Buku Yang Dipinjam` (`ID_BUKU`),
  ADD KEY `Peminjam Buku` (`ID_Peminjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIP` (`NIP`(1024));

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
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `BUKU`
--
ALTER TABLE `BUKU`
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `Kelas`
--
ALTER TABLE `Kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Peminjaman`
--
ALTER TABLE `Peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
