-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 05.34
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immunihealth`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(10) NOT NULL,
  `tgl_waktu_permintaan` datetime DEFAULT NULL,
  `nama_wali` varchar(45) DEFAULT NULL,
  `nama_pasien` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `notes` text,
  `user_id` varchar(10) NOT NULL,
  `layanan_id` int(10) NOT NULL,
  `dokter_id` varchar(10) DEFAULT NULL,
  `jadwal_id` int(10) DEFAULT NULL,
  `is_acc` smallint(6) DEFAULT NULL,
  `is_done` smallint(6) DEFAULT NULL,
  `is_denied` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `tgl_waktu_permintaan`, `nama_wali`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `notes`, `user_id`, `layanan_id`, `dokter_id`, `jadwal_id`, `is_acc`, `is_done`, `is_denied`) VALUES
(1, '2020-04-08 10:00:00', 'Ibu Pertiwi', 'Luthfi', '2014-02-12', 'Luthfi', '', 'user', 1, 'dokter_1', 3, 1, 1, NULL),
(2, '2020-04-09 10:00:00', 'Ibu Pertiwi', 'Budi', '2008-02-14', NULL, NULL, 'user', 1, 'dokter_1', 4, 1, NULL, NULL),
(3, '2020-04-28 11:00:00', 'Ibu Pertiwi', 'Budi', '2016-08-23', 'Laki-laki', 'Mantap', 'user', 4, 'dokter_2', 7, 1, 1, NULL),
(4, '2020-04-30 14:00:00', 'Ibu Pertiwi', 'SUSI', '2015-07-20', 'Perempuan', NULL, 'user', 1, NULL, NULL, NULL, NULL, NULL),
(5, '2020-05-08 09:00:00', 'Ibu Pertiwi', 'Budi', '2011-02-26', 'Laki-laki', 'Sukses vaksinasi', 'user_test', 1, 'dokter_99', 17, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` varchar(60) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_dokter` varchar(45) DEFAULT NULL,
  `is_delete` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `password`, `nama_dokter`, `is_delete`) VALUES
('dokter_1', '123', 'Hanabi', 1),
('dokter_10', '123', 'Dokter Yani', 0),
('dokter_11', '123', 'Dokter Sisi', 0),
('dokter_12', '123', 'Dokter Iva', 0),
('dokter_13', '123', 'Dokter Gani', 0),
('dokter_2', '123', 'Dokter Oz', 0),
('dokter_202', 'password', 'Baru nih', 1),
('dokter_3', '123', 'Dokter House', 0),
('dokter_4', '123', 'Dokter Budiman', 0),
('dokter_5', '123', 'Pertama', 0),
('dokter_6', '123', 'Dokter Cecep', 0),
('dokter_7', '123', 'Dokter Yayat', 0),
('dokter_8', '123', 'Dokter Park', 0),
('dokter_9', '123', 'Dokter Pratama', 0),
('dokter_99', 'passworddokt', 'Otong', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(10) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `dokter_id` varchar(10) DEFAULT NULL,
  `is_delete` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `hari`, `waktu_mulai`, `waktu_selesai`, `dokter_id`, `is_delete`) VALUES
(1, 'Monday', '09:00:00', '17:00:00', 'dokter_1', 0),
(2, 'Tuesday', '09:00:00', '17:00:00', 'dokter_1', 0),
(3, 'Wednesday', '09:00:00', '17:00:00', 'dokter_1', 0),
(4, 'Thursday', '09:00:00', '17:00:00', 'dokter_1', 0),
(5, 'Friday', '09:00:00', '17:00:00', 'dokter_1', 0),
(6, 'Monday', '09:00:00', '17:00:00', 'dokter_2', 0),
(7, 'Tuesday', '09:00:00', '17:00:00', 'dokter_2', 0),
(8, 'Wednesday', '09:00:00', '17:00:00', 'dokter_2', 0),
(9, 'Thursday', '09:00:00', '17:00:00', 'dokter_2', 0),
(10, 'Friday', '09:00:00', '17:00:00', 'dokter_2', 0),
(15, 'Monday', '11:00:00', '13:00:00', 'dokter_10', 0),
(16, 'Tuesday', '08:00:00', '21:00:00', 'dokter_10', 1),
(17, 'Friday', '08:00:00', '13:00:00', 'dokter_99', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `layanan_id` int(10) NOT NULL,
  `grup` varchar(45) DEFAULT NULL,
  `jenis_layanan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`layanan_id`, `grup`, `jenis_layanan`) VALUES
(1, 'Bayi & Anak (0-9 tahun)', 'Vaksinasi Hepatitis '),
(2, 'Bayi & Anak (0-9 tahun)', 'Vaksinasi Influenza'),
(3, 'Bayi & Anak (0-9 tahun)', 'Vaksinasi vaksinasi '),
(4, 'Bayi & Anak (0-9 tahun)', 'Vaksinasi Vaksinasi '),
(6, 'Bayi & Anak (0-9 tahun)', 'Vaksinasi Hepatitis'),
(7, 'Remaja (10 - 18 tahun)', 'Vaksinasi Influenza'),
(8, 'Remaja (10 - 18 tahun)', 'Vaksinasi Hepatitis '),
(9, 'Remaja (10 - 18 tahun)', 'Vaksinasi Influenza'),
(11, 'Remaja (10 - 18 tahun)', 'Imunisasi Corona');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `pasien_id` int(10) NOT NULL,
  `nama_pasien` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`pasien_id`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'Luthfi', '2015-05-13', 'Luthfi'),
(2, 'Luthfi', '2014-02-12', 'Luthfi'),
(3, 'Luthfi', '2014-02-12', 'Luthfi'),
(4, 'Budi', '2008-02-14', NULL),
(5, 'Budi', '2016-08-23', 'Laki-laki'),
(6, 'SUSI', '2015-07-20', 'Perempuan'),
(7, 'Budi', '2011-02-26', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_petugas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `password`, `nama_petugas`) VALUES
('admin', 'admin', 'Superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_user` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `no_telp` int(10) DEFAULT NULL,
  `is_delete` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `password`, `nama_user`, `email`, `no_telp`, `is_delete`) VALUES
('test', 'password', 'coba test', 'test@email.com', 1273912873, 0),
('user', 'gantipasswor', 'John Doe', 'user@email.com', 123456789, 0),
('user_test', 'password', 'John Budi', 'john.budi@email.com', 2147483647, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fk_Appointment_User1_idx` (`user_id`),
  ADD KEY `fk_Appointment_Layanan1_idx` (`layanan_id`),
  ADD KEY `fk_Appointment_Dokter1_idx` (`dokter_id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `fk_Jadwal_Dokter1_idx` (`dokter_id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`layanan_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `layanan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `pasien_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_Appointment_Dokter1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Appointment_Layanan1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`layanan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Appointment_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_Jadwal_Dokter1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
