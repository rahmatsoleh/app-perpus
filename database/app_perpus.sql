-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 19.25
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
-- Database: `app_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(30) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nisn`, `nama`, `jenkel`, `email`, `alamat`, `telepon`, `foto`) VALUES
('20210000000001', '16854523653', 'Rizky Anita Sari', 'Perempuan', 'rizky@gmail.com', 'Jl Sempurna Bandung', '085469587456', 'rizky_(1).jpg'),
('20210000000003', '223366554477', 'Muhammad Budi Prayitno', 'Laki-laki', 'budi@gmail.com', 'Jl Jayanegara Bandung', '085641236545', 'Tutorial_Cara_Mengganti_Background_biru_menjadi_merah_(7).jpg'),
('20210000000005', '5566992233', 'Arum Wulandari Puspitasari', 'Perempuan', 'arum@gmail.com', 'Jl Adityawarman 59 Jombang', '085698546955', 'hipwee-a2_1.jpg'),
('20210000000006', '55669988446', 'Sari Puspita Intan', 'Perempuan', 'sari@gmail.com', 'Jl Gaya Baru 55 Mojokerto', '08569854652', 'photo_close_up.jpg'),
('20210000000007', '55669988441', 'Agus Hidayat', 'Laki-laki', 'agus@gmail.com', 'Jl Ahmad Hasyim Asy\'ari Jombang', '085698547588', 'foto-formal-compres-scaled.jpg'),
('20210000000008', '336655447', 'Fani Dian', 'Perempuan', 'fani@gmail.com', 'Jombang', '08569854788', 'IMG-20200618-WA0004.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `id_pengarang` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_pengarang`, `id_penerbit`, `judul`, `tahun`, `jumlah`, `sinopsis`, `foto`) VALUES
('B00001', 3, 4, 'Teknik Profesional Photoshop CS3', 2020, 0, 'Buku ini menggunakan ratusan gambar serta teks yang jelas untuk membantu anda mempelajari dan menguasai Photoshop CS 3 dengan cepat, tanpa membuang waktu telalu lama.', 'IMG_20210526_111924.jpg'),
('B00002', 4, 5, 'Menguasai Pemrograman Web dengan PHP 5', 2011, 1, 'PHP adalah salah satu teknologi baru yang mulai banyak dimanfaatkan untuk perkembangan web.', 'IMG_20210526_111859.jpg'),
('B00003', 5, 5, 'Pemrograman C++', 2011, 4, 'Buku pemrograman C++ ini tidak sama dengan buku lain yang kebanyakan khusus untuk mereka yang mengenal bahasa pemrograman C. Anda yang belum mengenal bahasa pemrograman C pun akan dapat mempelajari buku ini tanpa kesulitan.', 'IMG_20210526_111832.jpg'),
('B00005', 7, 4, 'Aplikasi Excel Untuk Guru', 2014, 5, 'Excel adalah sebuah program aplikasi paling banyak digunkan untuk pengolahan data selain database. Karena penggunaanya yang cukup mudah dan dapat di setting sedemikian rupa.', 'IMG_20210526_111726.jpg'),
('B00007', 9, 4, 'Inovasi Desain dengan AutoCad', 2011, 6, 'Inovasi desain dengan autocad merupakan sebuah buku panduan yang berisi tutorial dan laihan pemodelan desain teknik 3D berikut teknik finishing dan rendering desain', 'IMG_20210526_111634.jpg'),
('B00008', 10, 7, 'Buku Sakti Pemrograman Web', 2021, 3, 'Buku ini mengenalkan bagian dari sebuah pembentukan pemrograman web dnan menyajikan langkah-langkah program yang disusun secara terstruktur.', 'IMG_20210526_111604.jpg'),
('B00010', 12, 4, 'Kode Macro Excell Siap Pakai', 2014, 2, 'Microsoft Excell telah dikenal luas di kalanagan pengguna komputer perkantoran. Salah satu keunggulan Excell adalah tersedianya fitur macro yang akan memudahkan anda dalam mengolah data dan bekerja menggunakan Excell.', 'IMG_20210526_111452.jpg'),
('B00011', 13, 4, 'Joomla 1.7 Untuk Pemula', 2011, 3, 'Dari wktu ke waktu semakin banyak website yang dibuat menggunakan Joomla. Mulai dari website profile perusahaan, toko online, sampai website pemerintahan juga menggunakan Joomla.', 'IMG_20210526_111416.jpg'),
('B00012', 14, 8, 'Teknik Mudah Mempercepat Kinerja Komputer', 2011, 2, 'Bukan rahasia lagi kalau kita sering mengalami komputer kita bekerja dengan lambat sehingga waktu pun lebih banyak digunakan untuk mengunggu komputer yang sedang loading. ', 'IMG_20210526_111353.jpg'),
('B00013', 15, 5, '24 Jam Menguasai HTML, JSP, dan MySQL', 2011, 2, 'Peranan web dalam menyediakan layanan data dan informasi merupakan salah satu yang dianggap sangat penting baik oleh berbagai macam institusi maupun perorangan.', 'IMG_20210526_111332.jpg'),
('B00014', 16, 9, 'Microsoft Office Excell 2003', 2011, 1, 'Buku ini mempelajari tentang seluk beluk dalam mengoperasikan Microsoft Excell 2003', 'IMG_20210526_111305.jpg'),
('B00015', 17, 10, '63 Tips & trik Photoshop', 2012, 3, 'Setiap saat anda menjumpai berbagai macam gambar seperti pada poster, kamera digital, komputer, internet, atau hp.', 'IMG_20210526_111220.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `no_pegawai` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenkel` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `no_pegawai`, `nama`, `jenkel`, `email`, `telepon`, `username`, `password`, `level`, `foto`) VALUES
(10, '123456789', 'Nama Pengguna User', 'Laki-laki', 'user@gmail.com', '0851965412365', 'user', 'user', 'user', 'null.jpg'),
(11, '1122336655', 'Admin Perpus', 'Laki-laki', 'admin@gmail.com', '085698547588', 'admin', 'admin', 'administrator', 'th.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pm` varchar(30) NOT NULL,
  `id_anggota` varchar(30) DEFAULT NULL,
  `id_buku` varchar(10) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pm`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('PM0001', '20210000000003', 'B00003', '2021-05-26', '2021-06-02', 'dikembalikan'),
('PM0002', '20210000000006', 'B00003', '2021-06-11', '2021-06-18', 'dipinjam'),
('PM0003', '20210000000007', 'B00001', '2021-06-11', '2021-06-18', 'dipinjam'),
('PM0004', '20210000000005', 'B00005', '2021-06-11', '2021-06-18', 'dipinjam'),
('PM0005', '20210000000007', 'B00001', '2021-06-12', '2021-06-22', 'dipinjam');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `after_insert_peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW begin
update buku set buku.jumlah = buku.jumlah - 1
where buku.id_buku = new.id_buku ;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama`) VALUES
(4, 'PT Elex Media Komputindo'),
(5, 'CV Andi Offset'),
(6, 'Penerbit Bentang'),
(7, 'PT Anak Hebat Indonesia'),
(8, 'HP Cyber Community'),
(9, 'Grisindra Press'),
(10, 'Media Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `lama_peminjaman` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `max_pinjam` int(11) DEFAULT NULL,
  `prefixAnggota` varchar(10) DEFAULT NULL,
  `lengthAnggota` int(11) DEFAULT NULL,
  `prefixBuku` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `lama_peminjaman`, `denda`, `max_pinjam`, `prefixAnggota`, `lengthAnggota`, `prefixBuku`) VALUES
(2, 10, 500, 2, '2021', 10, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(3, 'Rahmad Widiyanto'),
(4, 'Dhewiberta Hardjono'),
(5, 'Abdul Kadir'),
(6, 'Syahrul'),
(7, 'Adi Kusrianto'),
(8, 'Fred Vogelstein'),
(9, 'Suparno Sastra M'),
(10, 'Didik Setiawan'),
(11, 'Wardana'),
(12, 'Edy Winarno ST, M.Eng'),
(13, 'Andy Krisianto'),
(14, 'Team Cyber'),
(15, 'Alb. V. Dian Sano'),
(16, 'Yudhistira Ikranegara'),
(17, 'A. Asep Effendhy'),
(18, 'Rahmat Soleh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pm` varchar(30) DEFAULT NULL,
  `id_buku` varchar(10) DEFAULT NULL,
  `id_anggota` varchar(30) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_kembalikan` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_pm`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`, `denda`) VALUES
(16, 'PM0001', 'B00003', '20210000000003', '2021-05-26', '2021-06-02', '2021-06-12', 5000);

--
-- Trigger `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `kembalikan` AFTER INSERT ON `pengembalian` FOR EACH ROW begin
update buku set buku.jumlah = buku.jumlah + 1
where buku.id_buku = new.id_buku ;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `FK_Pengarang` (`id_pengarang`),
  ADD KEY `FK_Penerbit` (`id_penerbit`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pm`),
  ADD KEY `peminjaman_ibfk_1` (`id_anggota`),
  ADD KEY `peminjaman_ibfk_2` (`id_buku`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `FK_Anggota_Kembali` (`id_anggota`),
  ADD KEY `FK_Buku_Kembali` (`id_buku`),
  ADD KEY `FK_Pinjam` (`id_pm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_Penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `FK_Pengarang` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `FK_Anggota_Kembali` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Buku_Kembali` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Pinjam` FOREIGN KEY (`id_pm`) REFERENCES `peminjaman` (`id_pm`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
