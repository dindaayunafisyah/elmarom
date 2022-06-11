-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2022 pada 06.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

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
(13, 'Kue Kering'),
(14, 'Katering'),
(15, 'Rengginang Singkong');

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
(7, 'HADI IRWANSYAH', 'aldian@gmail.com', 'Haloo', 'afafaf', 0),
(8, 'ahmad daifullah', 'adefsing@gmail.com', 'beli kue', 'kue kering nastar', 0);

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
  `shopee` varchar(255) NOT NULL,
  `tokopedia` varchar(255) NOT NULL,
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

INSERT INTO `produk` (`id_produk`, `nama_produk`, `isi_produk`, `tanggal`, `berat`, `harga`, `shopee`, `tokopedia`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `id_kategori`) VALUES
(11, 'Rengginang Singkong Bawang & Terasi Khas Jember', '<p>Rengginang singkong El- Marom memiliki 2 rasa yang berbeda yaitu rasa bawang dan rasa terasi, yang mana pada setiap rasanya terdiri dari dua ukuran dengan diameter sekitar 1 cm dan 3 cm. Rengginang singkong yang dikembangkan di Pondok Pesantren Raden Rahmat Sunan Ampel ini dijual dengan 2 macam jenis yaitu mentah dan matang. Sehingga konsumen dapat memilih jenis rengginang mana yang nantinya akan dibeli dengan selera yang lebih sesuai dengan keinginan.</p>\r\n', '2022-06-01', '250 Gram', 24000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'rengginang11.jpg', 'rengginang21.jpg', NULL, NULL, NULL, 15),
(12, 'Kue Nastar', '<p>Nastar adalah kudapan Belanda yang akhirnya masuk ke Indonesia dan menjadi kudapan favorit seluruh lapisan masyarakat nusantara. nama nastar bahkan juga berasal dari bahasa Belanda. Yaitu ananas atau nanas dan taartjes atau tart. Nastar, adalah gabungan dari dua kata tersebut. Awal masuk ke Indonesia, nastar hanya keluar dalam perayaanperayaan besar atau penting saja. Bahkan hanya lidah-lidah bangsawan atau priyayi saja yang bisa mencecap sajian istimewa ini.</p>\r\n', '2022-06-01', '475 Gram', 48000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'nastar11.jpg', 'nastar21.jpg', NULL, NULL, NULL, 13),
(13, 'Kue Putri Salju', '<p>Nama putri salju berasal dari taburan gula halus berwarna putih di seluruh permukaan kue, seperti salju. Taburan inilah yang juga membuat kue putri salju memiliki rasa manis. Selain manis, ada sensasi dingin yang ditimbulkan saat menggigitnya. Ternyata kue putri salju tidak hanya ada di Indonesia, tetapi terkenal juga di Jerman dan Austria. Di sana, putri salju disebut Vanillekipferl. Bahkan ada yang menyebut juga bahwa negara asal kue putri salju yang kita kenal adalah Austria.</p>\r\n', '2022-06-01', '400 Gram', 46000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'salju11.jpg', 'salju21.jpg', 'salju31.jpg', NULL, NULL, 13),
(14, 'Peanut Cookies', '<p>Kacang tanah merupakan jenis biji-bijian yang sangat populer di Indonesia. Selain kerap dijadikan camilan, kacang tanah juga bisa diolah menjadi kue yang enak dan lezat. Tak hanya memiliki cita rasa yang gurih, kue kacang juga menjadi sumber protein nabati yang memiliki manfaat untuk menjaga kesehatan tubuh. Selain itu, kacang tanah juga mengandung serat dan magnesium yang dapat mencegah berbagai macam penyakit, seperti jantung dan stroke.</p>\r\n', '2022-06-01', '450 Gram', 48000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'kacang11.jpg', 'kacang21.jpg', NULL, NULL, NULL, 13),
(15, 'Brownise Cookies', '<p>Brownies Cookies yang merupakan inovasi Santri Pondok Pesantren Raden Rahmat Sunan Ampel Jember untuk memadukan perpaduan dari lembutnya brownies dan renyahnya cookies. Kudapan ini bercitarasa coklat dan memiliki bentuk seperti cookies/biskuit pada umumnya. Sesuai namanya, brownies cookies merupakan adonan brownies yang dimasak dengan cara dipanggang sehingga teksturnya renyah seperti cookies. Kudapan ini cocok sekali untuk hidangan ketika lebaran atau ketika bersantai saat di rumah.</p>\r\n', '2022-06-01', '325 Gram', 44000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'coklat11.jpg', 'coklat21.jpg', NULL, NULL, NULL, 13),
(16, 'Proltape El Marom', '<p>Proltape adalah olahan tapai singkong yang khas dari Kabupaten Jember , Jawa Timur. Disebut kue prol sebab saat dimakan kue ini langsung pecah atau &lsquo;ngeprol&rsquo; dalam bahasa Jawa. Makanan khas Jember dengan cita rasa manis legit serta aroma khas tape singkong ini, sekilas hampir mirip dengan cake tape hanya saja teksturnya lebih padat. Untuk menambah variasi rasa dan tekstur, santri Pondok Pesantren Raden Rahmat Sunan Ampel menambahkan kismis dan parutan keju di atasnya.</p>\r\n', '2022-06-01', '700 Gram', 35000, 'https://shopee.co.id/kelontongsantri', 'https://www.tokopedia.com/elmarom', 'WhatsApp_Image_2022-04-21_at_11_04_051.jpeg', 'Screenshot_8.jpg', NULL, NULL, NULL, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`nama`, `keterangan`) VALUES
('Dyta', 'Produk sangat enak');

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
(1, 'Adef', 'adefsing@gmail.com', 'LOGO_BULET_EL_MAROM.png', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2021-03-05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
