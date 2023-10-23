-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2022 pada 07.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfriendsapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mydays`
--

CREATE TABLE `mydays` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `warna` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `catatan` longtext NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mydays`
--

INSERT INTO `mydays` (`id`, `tanggal`, `waktu`, `warna`, `judul`, `catatan`, `foto`) VALUES
(23, '2022-06-10', '10:01:50', '#e85e7a', 'Pergi ke Pantai', 'Setibanya di penginapan, aku dan adikku tidak langsung beristirahat, tapi segera berjalan-jalan ke Pantai Kuta. Dengan langit yang berwarna biru dan semilir angin sepoi-sepoi yang terasa sejuk, kami menikmati waktu berjalan di sekitar tepi pantai.\r\nMeskipun terbilang masih pagi, tapi sudah cukup banyak orang yang berada di pantai. Sebagian menikmati waktu berjemur, dan sebagian lainnya dengan aktivitas olahraga air.\r\nAku ingin berenang, tapi aku hanya berdua bersama adikku dan adikku itu belum bisa berenang. Jadi, kami hanya menikmati ombak laut di tepi pantai yang menjilat kaki kami.\r\nTidak lama berselang, ibu dan ayahku menghampiri kami berdua. Mereka sempat terlihat kesal karena khawatir kami berjalan-jalan sendirian dan tidak membawa ponsel. Aku pun meminta maaf pada orang tuaku. Setelahnya, kami sekeluarga bermain di pantai.', '62a2b470233d2.jpg'),
(24, '2022-06-14', '22:06:12', '#5f76e8', 'Mendaki Gunung', 'Saat tengah mendaki, salah satu pemuda itu melihat sosok hitam yang melambaikan tangan ke dia. Dirinya langsung bertanya pada teman yang berada di dekatnya apakah melihat hal serupa. Temannya hanya berkata tidak dan memintanya untuk membiarkan sosok itu. Jelang malam, cuaca yang tidak mendukung akhirnya membuat mereka membangun kemah lebih awal.\r\n\r\nKetika berhasil membangun tenda, pemuda yang melihat sosok hitam tadi tidak dapat tidur karena ada perasaan yang tidak nyaman. Dia pun akhirnya terjaga dan memutuskan untuk keluar tenda. Tak disangka di luar tenda sudah ada sejumlah &#039;pasukan&#039; berseragam tentara berwajah pucat mengeliling tenda mereka. Dalam kondisi ketakutan, dia tidak bisa berbuat apa-apa, terlebih ketika seekor macan menatapnya dengan mata bersinar di antara barisan tentara itu.\r\n\r\nNamun, tak lama kemudian terdengar suara lantunan ayat-ayat doa dari bukit di atas mereka. Suara tersebut berasal dari seorang wanita. Meski begitu dia tidak melihat wanita itu. Dia pun pelan-pelan mampu masuk ke dalam tendanya lagi dan terlelap berkat lantunan doa yang juga mengusir &#039;pasukan&#039; tersebut.', '62a2b540c8962.jpg'),
(25, '2022-06-15', '10:06:51', '#5ee8a8', 'Belajar Bersama Teman', 'Pada hari rabu pagi hari yang begitu cerah ,saya pergi sekolah bersama teman saya kami berjalan kaki bersama-sama kesekolah sesampai disekolah kami pergi kekantin dan kami pun sarapan pagi dikantin sesudah sarapan bel masuk pun  berbunyi dan kami cepat bergegas masuk sekolah dan sampai dalam kelas gurunya pun datang kami semua berdoa  kami pun belajar sama-sama dan pelajaran pertama adalah pelajaran bahasa indonesia pelajaran bahasa indonesia ini sangat saya\r\nsukai karna beljar bahasa indonesia ini banyak sekali cerita-cerita dogeng,pantun,dan puisi ,karna itulah saya menyukai pelajaran bahasa indonesa.\r\nDalam proses belajar kami semua diberi tugas kerja kelompokyang membahas tentang PUISI dan kami semua diberi masing-masing kelompok,kebetulan kelompok saya dapat 5 orang yang membahas tentang “kupu-kupu yang hinggap dibunga”dan kami senang sekali dapat puisi tersebut tidak terasa jam pelajaran bahasa indonesia pun sudah habis dan kami kerja kelompok  tadi dijadikan tugas pr PR dirumah dan pada hari sabtu tugas kelompok itu harus sudah selesai dan akan ditampilkan.', ''),
(26, '2022-06-23', '10:08:26', '#c35ee8', 'Ujian Hari Ini', 'besok lusa aku akan ujian ahir semester jadi mulai sekarang aku bersiap siap untuk belajar karena aku ingin menjadi juara kelas besok lusa pelajaran ujian ahirnya adalah matematika dan bhs indonesia pkn jadi mulai sekarang aku bersiap siap belajar mtk dulu\r\naku akan belajar di pagi siang dan malam karena pelajaran nya satu hari 3 jadi aku membagi waktuku belajar pagi siang dan malam ibuku membantuku untuk belajar karena ibu ku ingin aku menjadi juara kelas tahun ini biasanya jika ulangan seperti ini aku pulang lebih awal dari sekolah\r\njadi kerena itu aku bisa belajar dengan baik aku biasanya belajar itu dengan berkelompok jadi aku membuat kelompok dengan temanku jadi kita bisa belajar bersama sama jadi belajar akan lebih terasa menyenangkan\r\ntek terasa ujian ku sudah selasai ibu guruku menyuruh orang tuaku datang untuk mengambil rapotku dantak disangka aku menjapat kan juara oertama aku merasa sangan senang dan ibuku membelikan ku hadiah aku sangat senang', '62a2b5df3a68f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `myfriends`
--

CREATE TABLE `myfriends` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `myfriends`
--

INSERT INTO `myfriends` (`id`, `nama`, `nohp`, `alamat`, `foto`) VALUES
(34, 'Allea Yunanda', '081234567890', 'Semarang', '62a2af703b42d.jpg'),
(35, 'Bagas Mahda', '081245672451', 'Bantul, Yogyakarta', '62a2afa5192b9.jpg'),
(36, 'Bunga Melati', '089577778909', 'Serpong, Tangerang', '62a2b271979ae.jpg'),
(37, 'Elang Rajawali', '086675778989', 'Medan', '62a2b28dc5e6c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'abcd', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mydays`
--
ALTER TABLE `mydays`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `myfriends`
--
ALTER TABLE `myfriends`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mydays`
--
ALTER TABLE `mydays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `myfriends`
--
ALTER TABLE `myfriends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
