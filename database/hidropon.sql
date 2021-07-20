-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 19.07
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hidropon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'buah'),
(2, 'sayur'),
(5, 'herbal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(8) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `foto`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(2, 'lila@gmail.com', 'lila', NULL, 'Lila Marsa Amira', '085899765654', ''),
(9, 'sindi@gmail.com', 'sindi', NULL, 'Sindi Puspita', '081217645319', 'perum. griya'),
(11, 'risky@gmail.com', 'risky21', NULL, 'risky', '087210987656', 'mastrip gang 9 sumbersari'),
(12, 'ninik1321@gmail.com', 'ninik132', 'foto.jpg', 'ninik', '085332821084', 'sumbersari jember'),
(13, 'selfisn@gmail.com', 'selfi11', NULL, 'selfi', '089768546812', 'mastrip 5 jember'),
(14, 'ayu5@gmail.com', 'ayu1234', NULL, 'ayu', '087657865999', 'rambipuji jember'),
(15, 'intanktb@gmail.com', 'intan12', NULL, 'intan', '081678987666', 'mangli jember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(15, 1, 'Stroberi', 30000, 250, 'stroberi.png', '									Rekomendasi olahan : Jus, Selai, Puding, Ice cream, Salad, dll.\r\nKandungan dan manfaat : Strawberry mengandung vitamin C yang pasti baik untuk tubuh, kandungan antioksidan seperti antosianin dapat menjaga tubuh dari inflamasi dan berbagai penyakit. \r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember										'),
(16, 2, 'Kangkung', 3000, 250, 'kangkung.png', 'Rekomendasi olahan : Selain di tumis kangkung juga dapat diolah menjadi rujak, keripik, dan roket kangkung.bagi pecinta seblak bisa di coba nih mengolah kangkung untuk salah satu bahannya karena ternyata enak juga loh kangkung seblak itu. \r\nKandungan dan manfaat : Manfaat kangkung dengan kandungan vitamin B kompleks dan omega 3 membantu kinerja otak lebih baik. Sehingga sayur kangkung sangat baik dihidangkan pada anak-anak yang dalam masa pertumbuhan, karena mampu meningkatkan kecerdasan otak. Sejumlah zat penting seperti vitamin A. C dan B kompleks, kalsium, fosfor dan zat besi terkandung dalam kangkung. Hal ini menjadi pertimbangan yang dapat anda lakukan untuk pemberian sayur kangkung sebagai menu asupan makanan sehari-hari. \r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember								'),
(17, 2, 'Selada', 6000, 250, 'selada.png', 'Rekomendasi olahan : Tumis selada, Bobor selada, Plecing selada, Sup selada, Salad, dll.\r\nKandungan dan manfaat : Daun selada adalah sumber vitamin A dan vitamin K yang sangat tinggi. Selain itu, juga mengandung berbagai nutrisi penting seperti zat besi, kalium, kalsium, folat, dan serat.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember								'),
(18, 2, 'Kale', 17000, 250, 'kale.png', 'Rekomendasi olahan : Keripik kale, Kale tumiscah kale ayam dan kubis, Tumis kale, Perkedel, Salad,dll.\r\nKandungan dan manfaat : Kale mengandung vitamin A, C, D, E, B1, B2, B3, B6, B9, K, kolin, mangan, magnesium, zat besi, fosfor, serta nutrisi lainnya. Nutrisi lengkap ini tentu membantu memenuhi kebutuhan nutrisi harian Anda. Selain itu, kandungan kalori kale juga sangat rendah, yaitu hanya 33 kalori.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember							'),
(19, 2, 'Bayam', 6000, 250, 'bayam.png', 'Rekomendasi olahan : Sayur bening, Bobor bayam, Keripik bayam, Kulupan bayam, dll.\r\nKandungan dan manfaat : Kandungan vitamin dan mineral pada bayam adalah vitamin A, C, K, B6, B9, E, asam folat, zat besi, kalsium, kalium, dan magnesium. Selain itu, bayam juga memiliki kandungan senyawa tumbuhan penting: Lutein. Lutein dapat membantu memperbaiki kesehatan mata.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember							'),
(20, 2, 'Daun Bawang', 7000, 250, 'daun bawang.png', 'Rekomendasi olahan : Tumis daun bawang telur, Tahu crispy daun bawang, Perkedel jagung daun bawang, Oncom lenca daun bawang, dll.\r\nKandungan dan manfaat : Daun bawang mengandung rendah kalori dan kaya nutrisi. Sayuran ini mengandung kombinasi unik antara flavonoid dan nutrisi yang mengandung belerang. Selain itu, daun bawang memiliki kandungan serat, asam folat, kalsium, kalium dan vitamin C cukup tinggi.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember					'),
(21, 2, 'Bawang Merah', 33000, 250, 'bawang merah.png', 'Rekomendasi olahan : Bawang Goreng, Pasta Bawang Merah, dll.\r\nKandungan dan manfaat : Bawang merah mempunyai kandungan sufida methylallyl dan asam amino sulfur yang sangat berguna untuk mengurangi kadar kolesterol jahat dalam tubuh. Bukan hanya itu, bawang merang juga mampu mengontrol tekanan darah tinggi serta membuka arteri yang tersumbat.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember						'),
(22, 2, 'Kemangi', 4500, 250, 'kemangi.png', 'Rekomendasi olahan : Ayam kemangi, Sambal kemangi, Pepes tahu daun kemangi, Trancam, dll.\r\nKandungan dan manfaat : Di dalam daun kemangi segar terkandung air, protein, karbohidrat, antioksidan lutein dan zeaxanthin, serta serat. Tidak hanya itu, daun kemangi juga mengandung nutrisi penting lain, seperti kalsium, zat besi, magnesium, fosfor, kalium, folat, vitamin A, B, C, dan K, meskipun dalam jumlah yang sedikit.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember					'),
(23, 2, 'Cabai', 15000, 250, 'cabai.png', 'Rekomendasi olahan : Sambal, Manisan, dll.\r\nKandungan dan manfaat : Kandungan vitamin C yang tinggi, vitamin B6 yang terdapat pada cabe memiliki peran penting dalam metabolisme tubuh, vitamin K6 berpengaruh pada pembekuan darah dan kesehatan tulang dan ginjal, potassium dapat mengurangi risiko penyakit jantung.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember				'),
(24, 2, 'Seledri', 5000, 250, 'seledri.png', 'Rekomendasi olahan : Jus batang seledri, Smoothie seledri, Sop ayam seledri, dll.\r\nKandungan dan manfaat : Daun seledri memiliki kandungan antioksidan yang cukup tinggi. Antioksidan merupakan suatu zat yang berfungsi mengurangi kerusakan sel tubuh akibat proses oksidasi dan radikal bebas. Selain itu, kandungan seledri punya banyak zat bernutrisi, seperti folate, potasium, vitamin B6, vitamin C, dan vitamin K.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember				'),
(25, 2, 'Pakcoy', 4500, 250, 'pakcoy.png', 'Rekomendasi olahan : Pakcoy saos tiram, Tumis pakcoy, Pakcoy bawang putih, dll.\r\nKandungan dan manfaat : Pakcoy mengandung tinggi vitamin A dan vitamin C. Kedua jenis vitamin ini berperan penting sebagai antioksidan dalam tubuh. Fungsi antioksidan itu sendiri adalah untuk melindungi sel-sel tubuh tetap sehat dan mencegah terbentuknya radikal bebas dalam tubuh.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember						'),
(26, 2, 'Terong', 9500, 500, 'terong.png', 'Rekomendasi olahan : Sambal terong, Sayur terong, Tumis terong, Lalapan terong, dll.\r\nKandungan dan manfaat : Kalori: 20, serat: 3 gram, protein: 1 gram, karbohidrat: 5 gram, folat: 5% dari rekomendasi konsumsi harian, kalium: 5% dari rekomendasi konsumsi harian, mangan: 10% dari rekomendasi konsumsi harian, vitamin K: 4% dari rekomendasi konsumsi harian.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember				'),
(27, 5, 'Daun Mint', 4000, 250, 'daun mint.png', 'Rekomendasi olahan : Refreshing mint tea, Real mint sauce, Mint chocolate milkshake, Ice cream mint, dll.\r\nKandungan dan manfaat : Daun ini memiliki rasa pedas yang khas dan aroma yang menyegarkan. Daun mint mengandung antioksidan kuat dan banyak nutrisi. Selain itu, kandungan daun mint juga terdiri dari kalium, magnesium, vitamin C, vitamin A, kalsium, fosfor, dan zat besi.\r\nAlamat penjual : Perum Bumi Mangli Permai A7, Jember				');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '6543-8765-9876', 'Hidropon.id'),
(2, 'BNI', '6548-8769-0987', 'Hidropon.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`id_rinci`, `no_order`, `id_produk`, `qty`) VALUES
(1, NULL, NULL, NULL),
(2, NULL, NULL, NULL),
(3, '20210720TO9JWRYJ', 16, NULL),
(4, '20210720XMDV5LC9', 15, NULL),
(5, '20210720UVXMI9AK', 16, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `kode_lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `kode_lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'Hidropon.Id', 17, 'perum bumi mangli permai C6 5B Jember', '085332821084');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(25) DEFAULT NULL,
  `paket` varchar(25) DEFAULT NULL,
  `estimasi` varchar(25) DEFAULT NULL,
  `ongkir` varchar(50) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(2, 14, '20210720TO9JWRYJ', '2021-07-20', 'Ayu', '081543765753', 'Jawa Timur', 'Jember', 'Perum Bumi Mangli', '464646', 'jne', 'OKE.17000', '', '17000', 250, 3000, 20000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(3, 14, '20210720XMDV5LC9', '2021-07-20', 'Ayu', '081543765753', 'Jawa Timur', 'Banyuwangi', 'Perum Bumi Mangli', '464646', 'tiki', 'ECO.18000', '', '18000', 250, 30000, 48000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(4, 14, '20210720UVXMI9AK', '2021-07-20', 'Ayu', '081543765753', 'Bali', 'Badung', 'Perum Bumi Mangli', '464646', 'jne', 'CTCYES.18000', '', '18000', 250, 3000, 21000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Intan Kusumaning', 'admin1', '123456', 1),
(2, 'Lita Putri', 'user', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
