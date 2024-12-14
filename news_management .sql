-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Waktu pembuatan: 14 Des 2024 pada 14.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `likes` int(11) DEFAULT 0,
  `layout` enum('layout1','layout2','layout3') DEFAULT 'layout1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `kategori`, `judul`, `konten`, `isi_artikel`, `gambar`, `gambar2`, `gambar3`, `tanggal`, `penulis`, `author_id`, `views`, `likes`, `layout`) VALUES
(13, 'Internasional', 'KECELAKAAN DI SIDOARJO', 'MENEWASKAN 2 orang yang sedang berjalan kaki dan makan bakso!!', 'SEMARANG, KOMPAS.com - Tiga korban tewas dan dua selamat dalam peristiwa kecelakaan rombongan jurnalis TV One dengan truk di Tol Jakarta-Pemalang Km 315+900 pada Kamis (31/10/2024). Kabid Humas Polda Jawa Tengah Kombes Artanto mengatakan, kejadian bermula saat truk boks melaju dari arah Jakarta menuju Semarang. \"Laka lantas tersebut diduga disebabkan oleh driver kendaraan mobil boks yang berusaha menghindari kendaraan yang oleng di depannya dan akibatnya menabrak mobil yang sedang berhenti di bahu jalan tol,\" kata Artanto saat dihubungi melalui pesan singkat, Kamis. Baca juga: Kesaksian Korban Selamat Kecelakaan Maut Kru Tv One, Felicia: Mau Ngelap Kacanya yang Burem Berdebu Saat ini, petugas kepolisian masih melakukan pendalaman terkait penyebab kecelakaan yang menewaskan tiga orang itu.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Kronologi Kecelakaan Maut yang Menewaskan 3 Rombongan TV One di Pemalang\", Klik untuk baca: https://regional.kompas.com/read/2024/10/31/115510778/kronologi-kecelakaan-maut-yang-menewaskan-3-rombongan-tv-one-di-pemalang.\r\n\r\n\r\nKompascom+ baca berita tanpa iklan: https://kmp.im/plus6\r\nDownload aplikasi: https://kmp.im/app6\r\n\r\nArtanto menyebutkan, penumpang mobil Avanza (rombongan jurnalis TV One) yang selamat, saat ini dalam kondisi sadar. Baca juga: Sering Tidak Cabut \"Charger\" dari Colokan Listrik, Apa Konsekuensinya? \"Sedang dirawat di RSI Al Ikhlas Taman Pemalang,\" kata Artanto. Penumpang yang selamat bernama Felicia Amelinda Deqi Priatna (24). Posisi Felicia saat itu berada di samping sopir. \"Korban mengalami luka cedera kepala ringan (CKR), sobek kepala belakang, kondisi sadar,\" ucap dia. Penumpang lain yang selamat bernama Gege. Posisi dia berada di sebelah kiri pada baris kedua di mobil Avanza tersebut. Baca juga: Daftar Korban Meninggal Kecelakaan Rombongan Jurnalis TV One di Pemalang \"Korban mengalami luka cedera kepala ringan (CKR), gejala dada, lecet di wajah, kondisi sadar,\" ungkap Artanto. Dia mengatakan, saat ini anggota kepolisian masih berada di lokasi kejadian dan RSI Al Ikhlas Taman Pemalang untuk melakukan penanganan. \"Anggota masih melakukan penanganan,\" ujar dia.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Kronologi Kecelakaan Maut yang Menewaskan 3 Rombongan TV One di Pemalang\", Klik untuk baca: https://regional.kompas.com/read/2024/10/31/115510778/kronologi-kecelakaan-maut-yang-menewaskan-3-rombongan-tv-one-di-pemalang.\r\n\r\n\r\nKompascom+ baca berita tanpa iklan: https://kmp.im/plus6\r\nDownload aplikasi: https://kmp.im/app6', '../assets64-367x267.jpg', 'uploads/gambar/22-4434x3729.jpg', NULL, '2024-12-13', 'penulis01', 5, 56, 23, 'layout2'),
(16, 'Bisnis', 'TERJADI KEBAKARAN DI SURABAYA', 'KEBAKARAN MELAHAP RUMAH WARGA DAN SEKITAR', 'jpnn.com - JAKARTA - Kebakaran terjadi di permukiman padat penduduk Jalan Kebon Kosong, Kemayoran, Jakarta Pusat, Selasa (10/12) siang. Badan Penanggulangan Bencana Daerah (BPBD) DKI Jakarta menyebut 15 orang terluka akibat kebakaran tersebut. \"Rekap data pelayanan kesehatan pos kebakaran Kebon Kosong, Kemayoran pada Selasa 10 Desember 2024 sampai dengan pukul 17.45 WIB tadi sebanyak 15 pasien,\" kata Kepala BPBD Provinsi DKI Jakarta Isnawa Adji saat dikonfirmasi di Jakarta, Selasa (10/12). Baca Juga: Api Kebakaran di Kemayoran Berasal dari Rumah Pak Juman Isnawa menyebut seorang ibu hamil menjadi pasien yang dirujuk ke rumah sakit untuk mendapatkan penanganan lebih lanjut. Sementara, pasien rawat jalan sebanyak 14 orang. \"Pasien yang dirujuk satu jiwa itu ibu hamil, kita belum mendapatkan update-nya karena nanti dikabari lebih lanjut oleh tim ambulans gawat darurat (AGD). Kalau pasien yang rawat jalan ada 14 orang, itu 11 orang rawat jalan sedangkan tiga orang tindakan di tempat,\" ujar Isnawa. Dia mengatakan dari 15 orang yang terluka, 11 berusia 6-18 tahun, tujuh orang usia 19-45 tahun, dan lima orang berusia di atas 45 tahun.\r\n\r\nArtikel ini telah tayang di\r\nJPNN.com\r\ndengan judul\r\n\"Kebakaran di Kemayoran Jakarta Pusat, 15 Orang Terluka\",\r\nhttps://www.jpnn.com/news/kebakaran-di-kemayoran-jakarta-pusat-15-orang-terluka\r\nKebakaran di permukiman padat penduduk yang terjadi di Jalan Kebon Kosong, Kemayoran, Jakarta Pusat, Selasa, diduga berasal dari rumah seorang pengepul rongsokan sampah plastik berinisial J. \"Kebakaran di kawasan Kemayoran ini diduga dari rumah Pak J yang bekerja sebagai pengumpul rongsokan plastik,\" kata Kepala Suku Dinas Penanggulangan Kebakaran dan Penyelamatan (Sudin Gulkarmat) Jakarta Pusat, Asril Rizal saat dihubungi di Jakarta, Selasa. Kebakaran tersebut berawal dari adanya percikan api dari rumah yang dijadikan pengepul rongsokan plastik milik warga berinisial J. Percikan api kemudian dengan cepat membesar dan membakar seluruh bagian bangunan semipermanen yang ada di kawasan tersebut. Akibat kebakaran di pemukiman padat penduduk ini, sebanyak 1.800 jiwa dari 600 KK dan tujuh rukun tetangga (RT) yakni RT 03, 04, 05, 06, 07, 08 dan 09 (tergabung dalam RW 05) terdampak. (antara/jpnn)\r\n\r\nArtikel ini telah tayang di\r\nJPNN.com\r\ndengan judul\r\n\"Kebakaran di Kemayoran Jakarta Pusat, 15 Orang Terluka\",\r\nhttps://www.jpnn.com/news/kebakaran-di-kemayoran-jakarta-pusat-15-orang-terluka?page=2', '../assets/websiteplanet-dummy-800X400.png', '../assets/85-367x267.jpg', NULL, '2024-12-14', 'penulis01', 5, 2, 1, 'layout2'),
(17, 'Keuangan', 'RUPIAH NAIK TINGGI', 'RUPIAH MELEMAH DAN DOLLAR TERUS NAIK', '360News.com - Nila tukar rupiah terhadap dollar AS terus melemah dalam beberapa hari terakhir. Berdasarkan data Google Finance pada Selasa (18/6/2024), nilai tukar rupiah terhadap dollar AS kini berada pada angka Rp 16.410. Ekonom Universitas Gadjah Mada (UGM) Eddy Junarsin menuturkan, peningkatan kurs dollar AS ke rupiah akan lebih mengkhawatirkan jika melewati Rp 16.500. Baca juga: Dokter Koas Unsri Babak Belur dan Syok akibat Dipukuli Sopir Rekannya \"Bahaya (kurs dollar AS ke rupiah) Rp 16.500 itu secara teknis dan ekonomis tidak apa-apa karena bisa menguat lagi. Namun secara psikologis berbahaya,\" ujarnya saat dikonfirmasi Kompas.com, Kamis (13/6/2024). Jika mencapai angka itu, nilai tukar dollar AS terhadap rupiah akan lebih mudah naik melampaui Rp 16.500 dibandingkan sebelumnya. Lantas, apa penyebab dollar AS terhadap rupiah terus meningkat?\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Rupiah Tembus Angka Rp 16.400 per Dollar AS, Ini Penyebab dan Bahaya yang Mengintai\", Klik untuk baca: https://www.kompas.com/tren/read/2024/06/18/160000065/rupiah-tembus-angka-rp-16.400-per-dollar-as-ini-penyebab-dan-bahaya-yang.\r\n\r\n\r\nKompascom+ baca berita tanpa iklan: https://kmp.im/plus6\r\nDownload aplikasi: https://kmp.im/app6\r\nPerdagangan, Inflasi, dan suku bunga Eddy menjelaskan, perubahan kurs mata uang merupakan hal alami. Namun, ada beberapa faktor yang membuat nilai tukar rupiah tidak menguat signifikan terhadap dollar AS. Seperti barang, permintaan mata uang yang tinggi akan membuat harganya naik. Sebaliknya, permintaan rendah menyebabkan harganya turun. Baca juga: Romy Ungkap 4 Calon Ketum PPP: Sandiaga Uno, Taj Yasin, Gus Ipul, dan Dudung Abdurachman Dia mencontohkan, suatu negara yang lebih banyak eskpor barang ke luar negeri akan membuat pasar meminta lebih banyak mata uang negara tersebut. Akibatnya, harga uang meningkat sehingga kurs mata uangnya menjadi lebih rendah. Menurutnya, kondisi tersebut saat ini sedang dialami Indonesia. Baca juga: Rupiah Tembus Rp 16.300 Per Dollar AS, Gubernur BI Sebut Depresiasi Sangat Rendah Ia menuturkan, Indonesia banyak mendapatkan keuntungan perdagangan dari barang ekspor. Dengan begitu, nilai tukar rupiah rupiah terhadap dollar AS seharusnya menguat. Akan tetapi, ada faktor lain yang memengaruhi nilai tukar rupiah dengan dollar AS, misalnya perbedaan suku bunga antarkedua negara. Negara yang memiliki suku bunga lebih tinggi akan membuat mata uang menjadi merosot. Suku bunga adalah harga yang dibayarkan bank kepada nasabah yang menyimpan uang di bank tersebut. Karena Indonesia saat ini memiliki suku bunga sekitar 6 persen, sedangkan AS 5,5 persen, hal ini membuat kurs dollar AS menjadi lebih tinggi daripada rupiah.\r\n', '../assets/websiteplanet-dummy-800X500 (1).png', '../assets/Yellow Ferrari F8 On Slate Brick Road  3D Sublimation 20oz Skinny Straight Tumblr Wrap  300 DPI PNG Commercial Use  Supercar Enthusiast Gift.jpg', '../assets/websiteplanet-dummy-800X500.png', '2024-12-14', 'penulis02', 6, 3, 1, 'layout3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','penulis') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nama_lengkap`, `jenis_kelamin`, `nomor_hp`, `email`, `created_at`) VALUES
(1, 'user1', 'password123', 'admin', 'John Doe', '', '081234567890', NULL, '2024-12-13 14:24:59'),
(2, 'user2', 'mypassword', 'admin', 'Jane Doe', '', '082345678901', NULL, '2024-12-13 14:24:59'),
(3, 'user3', 'alexpass', 'admin', 'Alex Smith', '', '083456789012', NULL, '2024-12-13 14:24:59'),
(4, 'admin01', 'password123', 'admin', 'Admin Satu', 'L', '081234567890', 'admin01@example.com', '2024-12-13 14:26:12'),
(5, 'penulis01', 'password123', 'penulis', 'Penulis Satu', 'P', '082345678901', 'penulis01@example.com', '2024-12-13 14:26:12'),
(6, 'penulis02', 'password123', 'penulis', 'Penulis Dua', 'L', '083456789012', 'penulis02@example.com', '2024-12-13 14:26:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
