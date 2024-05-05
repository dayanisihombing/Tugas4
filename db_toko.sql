-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2024 pada 10.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `IdBarang` varchar(4) NOT NULL,
  `IdSupplier` varchar(4) NOT NULL,
  `NamaBarang` varchar(35) NOT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Satuan` varchar(30) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`IdBarang`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`) VALUES
('001', 'S001', 'Laptop Asus ROG', 'Laptop gaming dengan spesifikasi tinggi', 'unit', 20),
('002', 'S001', 'Macbook Air M2', '', 'unit', 22),
('003', 'S001', 'Mouse Logitech G502', 'Mouse gaming dengan sensor presisi tinggi', 'unit', 14),
('004', 'S001', 'Monitor Dell Ultrasharp 27 inch', 'Monitor IPS dengan resolusi tinggi', 'unit', 15),
('005', 'S005', 'Harddisk', 'hardware yang menampung data ', 'unit', 8),
('006', 'S005', 'Keyboard Mechanical RGB', 'Keyboard mekanikal dengan lampu RGB', 'unit', 17),
('007', 'S005', 'Printer Epson L3150', 'Printer multifungsi dengan tinta tank', 'unit', 11),
('008', 'S005', 'Smartphone Samsung Galaxy S22', 'Smartphone flagship dengan kamera canggih', 'unit', 17),
('009', 'S008', 'SSD NVMe 1TB', 'Solid State Drive dengan kecepatan tinggi', 'unit', 14),
('010', 'S008', 'Router TP-Link AC1750', 'Router dual-band dengan kecepatan tinggi', 'unit', 19),
('011', 'S008', 'Headset HyperX Cloud Alpha', 'Headset gaming dengan suara stereo jernih', 'unit', 13),
('012', 'S008', 'Jam Heavy Metal HX-P920', 'Speaker', 'unit', 15),
('013', 'S008', 'Kamera Mirrorless Sony Alpha A7S II', 'Kamera profesional dengan kualitas video 4K', 'unit', 12),
('014', 'S008', 'Creative Muvo 2c', 'Speaker', 'unit', 14),
('015', 'S008', 'Laptop DELL', '', 'unit', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `IdAkses` varchar(3) NOT NULL,
  `NamaAkses` varchar(30) NOT NULL,
  `Keterangan` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
('1', 'Admin', 'Hak akses administrator'),
('2', 'User', 'Hak akses pengguna biasa'),
('3', 'Manager', 'Hak akses pengelola'),
('4', 'Finance', 'Hak akses keuangan'),
('5', 'Sales', 'Hak akses penjualan'),
('6', 'Inventory', 'Hak Akses Inventaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` varchar(6) NOT NULL,
  `IdBarang` varchar(4) NOT NULL,
  `IdSupplier` varchar(4) NOT NULL,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `IdBarang`, `IdSupplier`, `JumlahPembelian`, `HargaBeli`) VALUES
('BY0001', '001', 'S001', 5, 6000000),
('BY0002', '002', 'S002', 4, 8000000),
('BY0003', '003', 'S003', 6, 350000),
('BY0004', '004', 'S004', 8, 1650000),
('BY0005', '005', 'S005', 5, 1350000),
('BY0006', '006', 'S006', 6, 1050000),
('BY0007', '007', 'S007', 7, 2700000),
('BY0008', '008', 'S008', 8, 4600000),
('BY0009', '009', 'S005', 9, 1270000),
('BY0010', '010', 'S008', 10, 1000000),
('BY0011', '011', 'S003', 4, 580000),
('BY0012', '012', 'S006', 6, 1960000),
('BY0013', '013', 'S002', 5, 1075000),
('BY0014', '014', 'S001', 13, 55000),
('BY0015', '015', 'S004', 5, 8045000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` varchar(4) NOT NULL,
  `IdAkses` varchar(3) NOT NULL,
  `NamaPengguna` varchar(16) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `StatusAktivasi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `StatusAktivasi`) VALUES
('U001', '1', 'Andi', '123456', '1'),
('U002', '2', 'Anita', '123456', '1'),
('U003', '3', 'Bayu', '123456', '1'),
('U004', '4', 'Cika', '123456', '1'),
('U005', '5', 'Citra', '123456', '1'),
('U006', '6', 'Putri', '123456', '1'),
('U007', '6', 'Ratih', '123456', '1'),
('U008', '6', 'Satria', '123456', '1'),
('U009', '6', 'Faiz', '123456', '1'),
('U010', '6', 'David', '123456', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` varchar(6) NOT NULL,
  `IdBarang` varchar(4) NOT NULL,
  `IdPelanggan` varchar(4) NOT NULL,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES
('SL0001', '001', 'P001', 5, 7500000),
('SL0002', '002', 'P002', 4, 12000000),
('SL0003', '003', 'P003', 6, 400000),
('SL0004', '004', 'P004', 8, 2000000),
('SL0005', '005', 'P005', 5, 1500000),
('SL0006', '006', 'P006', 6, 1250000),
('SL0007', '007', 'P007', 7, 3000000),
('SL0008', '008', 'P008', 8, 5000000),
('SL0009', '009', 'P009', 9, 1500000),
('SL0010', '010', 'P010', 10, 1100000),
('SL0011', '011', 'P011', 4, 650000),
('SL0012', '012', 'P012', 6, 2100000),
('SL0013', '013', 'P013', 5, 1250000),
('SL0014', '014', 'P014', 4, 400000),
('SL0015', '015', 'P015', 5, 8500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` varchar(4) NOT NULL,
  `IdPengguna` varchar(4) NOT NULL,
  `NamaSupplier` varchar(45) NOT NULL,
  `NamaPerusahaan` varchar(50) NOT NULL,
  `Alamat` varchar(75) NOT NULL,
  `NoTelepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `IdPengguna`, `NamaSupplier`, `NamaPerusahaan`, `Alamat`, `NoTelepon`) VALUES
('S001', 'U001', 'Dayani', 'CV. Dayani', 'Jl. Satu No.2 Jakarta Pusat', '081263564576'),
('S002', 'U002', 'Tatarisa', 'CV.Tatarisa', 'Jl. Dua No.3 Jakarta Barat', '086565672372'),
('S003', 'U003', 'Elliya', 'CV.Elliya', 'Ruko Baru No.4 Jakarta Pusat', '0854365676'),
('S004', 'U004', 'Fauzan ', 'CV. Fauzan', 'Toko Serba Ada No.3b Jakarta Selatan', '08653764357'),
('S005', 'U005', 'Shantika', 'CV.Shantika', 'Jalan Senja No.4 Bogor', '086465456656'),
('S006', 'U006', 'Nuri', 'CV.Nuri', 'Jl. Cemara No.23a Jakarta Timur', '081785656545'),
('S007', 'U007', 'Rifa\'i', 'CV.Rifa\'i', 'Jl. Pahlawan No.6b Jakarta Barat', '081245345469'),
('S008', 'U008', 'Lusiyana', 'CV.Lusiyana', 'Tanah abang', '082143456576');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `IdSupplier` (`IdSupplier`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `IdSupplier` (`IdSupplier`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `IdPelanggan` (`IdPelanggan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `hak_akses` (`IdAkses`);

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
