-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2021 pada 05.22
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kombimebel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Kombi Mebel', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '+6281364373699', 'kombimebel@usaha.com', 'Medan Timur, Sumatera Utara.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `penjual_id` int(11) NOT NULL,
  `penjual_nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `penjual_telp` varchar(20) NOT NULL,
  `penjual_email` varchar(50) NOT NULL,
  `penjual_alamat` text NOT NULL,
  `penjual_ttl` date NOT NULL,
  `level` enum('Pembeli','Penjual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`penjual_id`, `penjual_nama`, `username`, `password`, `penjual_telp`, `penjual_email`, `penjual_alamat`, `penjual_ttl`, `level`) VALUES
(1, 'Kombi Mebel', 'admin', '25d55ad283aa400af464c76d713c07ad', '+62895365793020', 'kombimebel@usaha.com', 'Medan Timur, Sumatera Utara.', '2003-09-28', 'Penjual'),
(2, 'Paulus Sigalingging', 'cak1', '25d55ad283aa400af464c76d713c07ad', '+6282273634917', 'paulussigalingging2803@gmail.com', 'Jl. Martabe, Doloksanggul', '2003-09-28', 'Penjual'),
(3, 'Fadhil M Lubis', 'fadhil20', '25d55ad283aa400af464c76d713c07ad', '+6282273084517', 'fadhil200@gmail.com', 'Medan', '2003-08-14', 'Penjual'),
(4, 'Kevin Simbolon', 'kevin1', '25d55ad283aa400af464c76d713c07ad', '+6281269455277', 'kevin@gmail.com', 'Sibolga', '2004-10-12', 'Penjual'),
(5, 'Alwin Rusli', 'alwin20', '25d55ad283aa400af464c76d713c07ad', '+6281364373699', 'alwin@kombi.com', 'Medan timur', '2004-04-14', 'Penjual'),
(6, 'Nadya Purba', 'nad20', '25d55ad283aa400af464c76d713c07ad', '+6282363117590', 'nadia@kombi.com', 'Medan ', '2003-10-28', 'Penjual'),
(7, 'Rizki Nabilah', 'Rizki', '25d55ad283aa400af464c76d713c07ad', '+62895611117712', 'rizki@kombi.com', 'Medan', '2003-06-14', 'Penjual'),
(8, 'Paulus Sigalingging', 'cak2', '25d55ad283aa400af464c76d713c07ad', '+6282279091231', 'paulus@gmail.com', 'Doloksanggul, Humbang Hasundutan', '2003-09-28', 'Pembeli'),
(9, 'Ruben Sigalingging', 'ruben20', '25d55ad283aa400af464c76d713c07ad', '+6282273631919', 'ruben200@gmail.com', 'Medan', '2004-01-15', 'Pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Meja'),
(2, 'Kursi'),
(3, 'Lemari'),
(4, 'Sofa'),
(5, 'Tempat Tidur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komen`
--

CREATE TABLE `tb_komen` (
  `komen_id` int(11) NOT NULL,
  `penjual_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komen`
--

INSERT INTO `tb_komen` (`komen_id`, `penjual_id`, `product_id`, `komentar`, `waktu`) VALUES
(4, 8, 10, 'Mantapp barangnya bagus', '2021-12-18 07:42:22'),
(5, 8, 10, 'sepp', '2021-12-18 07:44:34'),
(6, 8, 9, 'Tempat tidur bukan kaleng kaleng', '2021-12-18 07:46:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `penjual_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `penjual_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `data_created`) VALUES
(1, 4, 1, 'Savanna Sofa 3 Seater', 3750000, ' SOFA MINIMALIS 3 SEAT SAVANNA SOFA 3 SEAT - Cocok untuk hunian minimalis - Desain cantik dan kekinian', 'produk1639187102.jpg', 1, '2021-12-11 01:45:02'),
(2, 1, 1, 'Meja Makan VEDBO', 8499000, 'VEDBO meja makan, hitam, 160x95 cm ', 'produk1639187852.jpg', 1, '2021-12-11 01:57:32'),
(3, 2, 1, 'Kursi Lipat Terje', 395000, 'TERJE kursi lipat, kayu beech', 'produk1639188173.jpg', 1, '2021-12-11 02:02:53'),
(4, 3, 1, 'Lemari KLEPPSTAD', 1999000, '<p>KLEPPSTAD lemari pakaian 3 pintu, putih, 117x176 cm</p>\r\n', 'produk1639188795.jpg', 1, '2021-12-11 02:13:15'),
(5, 5, 1, 'Tempat tidur minimalis', 1000000, '<p><strong>Tempat Tidur Minimalis Laci Sandaran Jari</strong>&nbsp;Memberikan kenyamanan untuk istirahat Anda Tidur dan menjadikan kamar Anda lebih mewah dan nyaman. Sebuah kamar tidur seharusnya memberikan kenyamanan pada diri Anda. Dengan Tidur di tempat tidur yang nyaman dan kamar yang indah membuat kita lebih nyaman dan nyenyak saat beristirahat. Untuk itu Anda seharusnya memilih sebuah Tempat Tidur yang memiliki model bagus dan nyaman.</p>\r\n\r\n<p>Cara terbaik memulai hari adalah dengan tidur nyenyak di malam sebelumnya. Kamar tidur yang hadir dengan berbagai pilihan desain yang memberikan kenyamanan dan kualitas Produk sehingga Anda dapat membuka mata di pagi hari dengan senyuman yang Bahagia.</p>\r\n', 'produk1639259907.jpg', 1, '2021-12-11 21:58:27'),
(6, 4, 1, 'Sofa Minimalis 2 seater GF Series Vamala', 3270000, '<p>Desain kaki sofa khas Scandinavian ini selalu menarik hati. Tempatkan di dalam ruang keluarga Anda, dan dapatkan kesan ruang yang sangat fresh dan segar.</p>\r\n', 'produk1639366493.jpeg', 1, '2021-12-13 03:34:53'),
(7, 3, 1, 'Lemari Pakaian Bw 06  ', 900000, '<p>Lemari pakaian yang minimalis serta hemat dikantong</p>\r\n', 'produk1639366580.jpg', 1, '2021-12-13 03:36:20'),
(8, 1, 1, 'INGO Meja, kayu pinus, 120x75 cm', 2000000, '<p>Meja ini telah diuji dengan standar ketat kami dalam stabilitas, daya tahan dan keamanan untuk menahan penggunaan sehari-hari di rumah Anda selama bertahun-tahun.</p>\r\n', 'produk1639366641.jpg', 1, '2021-12-13 03:37:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`penjual_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD PRIMARY KEY (`komen_id`),
  ADD KEY `penjual_id` (`penjual_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `penjual_id` (`penjual_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `penjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_komen`
--
ALTER TABLE `tb_komen`
  MODIFY `komen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
