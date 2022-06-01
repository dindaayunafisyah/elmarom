-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jun 2021 pada 18.41
-- Versi server: 10.5.8-MariaDB-log
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elmarom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(30) NOT NULL,
  `kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(13, 'Keripik 1'),
(14, 'Keripik 2'),
(15, 'Keripik 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subject`, `message`, `status`) VALUES
(1, 'anisaa', 'aldian@gmail.com', 'ege', 'hallo gan', 0),
(2, 'Aldian', 'dwialdian2@gmail.com', 'ege', 'sfgg', 0),
(5, 'aaa', 'dwialdian2@gmail.com', 'Haloo', 'Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut, laborum sequi.\r\n\r\nvoluptas, praesen', 0),
(6, 'HADI IRWANSYAH', 'aldian@gmail.com', 'ege', 'bxbxb', 0),
(7, 'HADI IRWANSYAH', 'aldian@gmail.com', 'Haloo', 'afafaf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `isi_produk` longtext NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `berat` varchar(225) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar1` varchar(225) DEFAULT NULL,
  `gambar2` varchar(225) DEFAULT NULL,
  `gambar3` varchar(225) DEFAULT NULL,
  `gambar4` varchar(225) DEFAULT NULL,
  `gambar5` varchar(225) DEFAULT NULL,
  `id_kategori` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `isi_produk`, `tanggal`, `berat`, `harga`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `id_kategori`) VALUES
(6, 'anisaa', '<p style=\"text-align:justify\">Meriahkan perjalanan, waktu santai dan kumpul bersama dengan Kusuka Keripik Super Pedas 50g yang terbuat dari singkong pilihan dan memiliki rasa Super Pedas yang mantap. Kusuka Keripik Super Pedas 50g merupakan salah satu varian keripik singkong dari Kusuka. Terbuat dari singkong pilihan yang diolah secara higienis menggunakan teknologi modern untuk menghasilkan keripik singkong yang enak dan berkualitas. Singkong Kusuka dipanen pada usia yang sama, kemudian diiris dengan ketebalan yang sama dan diproses dengan teknologi modern dengan penambahan bumbu-bumbu dari resep tradisional Indonesia sehingga menjadikan Kusuka sangat renyah dan nikmat. Rasa super pedas yang mantap berpadu dengan keripik yang renyah menjadikan Kusuka Keripik Super Pedas 50g teman yang pas untuk menemani saat bepergian atau di waktu santai.</p>\r\n', '2021-05-23', '1kg', 15000, '71.jpg', '91.jpg', NULL, NULL, NULL, 13),
(7, 'COBA', '<p style=\"text-align:justify\">Maicih Keripik Singkong Pedas Level 3 100gr merupakan keripik khusus buat kamu yang menykai sedikit pedas tapi ingin menikmati keripik maicih. Keripik singkong maicih merupakan keripik yang tipis dengan tekstur yang renyah lalu ditaburi bumbu spesial maicih yang terbuat dari bahan-bahan pilihan berkualitas tanpa bahan pengawet yang dikemas secara modern menggunakan kemasan foil metalizer. BPOM: 1101057530511 Shelf Life: 12 Months</p>\r\n', '2021-05-23', '2kg', 300000, '5.jpg', NULL, NULL, NULL, NULL, 14),
(8, 'COBA', '<p style=\"text-align:justify\">Potabee Grilled Seaweed diolah dari kentang asli dengan v-cut technology dan bertabur bits asli rumput laut panggang yang mengunci lebih banyak rasa, bikin kriuknya pecah. Dikonsumsi sendiri atau bersama teman-teman pun, Potabee Grilled Seaweed enaknya mengigit.</p>\r\n\r\n<p style=\"text-align:justify\">Panggang (mengandung Gula, Garam, Bubuk Kecap, Perisa Sintetik, Penguat Rasa (Mononatrium Glutamat, Dinatrium Inosinat, dan Dinatrium Guanilat), Rumput Laut (0.65%), Bubuk Ikan)</p>\r\n', '2021-05-27', '1kg', 30000, '4.jpg', '8.jpg', NULL, NULL, NULL, 14),
(9, 'anisaa', '<p>Rasa Gurih, Renyah, Full bumbu dan pastinya bikin ketagihan lho..</p>\r\n\r\n<p>Cocok banget buat cemilan waktu santai dirumah. .</p>\r\n\r\n<p>Tersedia semua varian rasa</p>\r\n\r\n<p>-Asin+daun purut</p>\r\n\r\n<p>-pedas+ daun purut</p>\r\n\r\n<p>-Pedas Jingkar</p>\r\n', '2021-05-29', '1kg', 50000, '61.jpg', NULL, NULL, NULL, NULL, 13),
(10, 'anisaa', '<p style=\"text-align:justify\">SAWARGI Snack produk terlaris No1 &amp; 2 di Shopee. kita dapat 2 nominasi sekaligus. Terlaris berarti terenak. Makanya jadi produk terlaris di Indonesia. Kalau tidak enak atau tidak terpercaya tidak akan laku, dan tidak akan jadi produk terlaris. Atas dasar apa anda masih ragu untuk beli di SAWARGI Snack? Cari harga yang lebih murah? Lebih murah belum tentu enak. Nyari yang tidak bubuk? Kita pakai bahan baku yang tipis, supaya pas dimakan jadi kriuk dan renyah. Kalau yang tidak bubuk pakai bahan baku yang tebal, tapi dijamin jadinya keras dan sakit digigi saat dimakan. Mau yg kriuk, atau yang keras hayooo.. :D</p>\r\n\r\n<p style=\"text-align:justify\">Keripik kaca terbuat dari singkong dengan kualitas baik yang digiling lalu di oven dengan bumbu pilihan sensasi kencur dan daun jeruk. Pedas merah pakai cabai merah, pedas hijau pakai rawit / cengek asli. Bukan bumbu tabur.</p>\r\n\r\n<p style=\"text-align:justify\">Varian:</p>\r\n\r\n<p style=\"text-align:justify\">- Daun jeruk pedas cabai merah</p>\r\n\r\n<p style=\"text-align:justify\">- Daun jeruk cabai merah pedas extra</p>\r\n\r\n<p style=\"text-align:justify\">- Daun jeruk pedas cabai hijau</p>\r\n\r\n<p style=\"text-align:justify\">- Daun jeruk original / tidak pedas</p>\r\n', '2021-05-29', '1/5 kg', 15000, '1.jpg', '2.jpg', '3.jpg', NULL, NULL, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `level`, `date`) VALUES
(1, 'Aldian', 'aldian@gmail.com', '4.jpg', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2021-03-05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
