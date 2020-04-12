-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 15.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan`
--

CREATE TABLE `aduan` (
  `id` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `keterangan_tempat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `img_bukti_1` varchar(255) DEFAULT NULL,
  `img_bukti_2` varchar(255) DEFAULT NULL,
  `img_bukti_3` varchar(255) DEFAULT NULL,
  `sifat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aduan`
--

INSERT INTO `aduan` (`id`, `id_masyarakat`, `nama`, `tanggal`, `id_kategori`, `id_provinsi`, `id_kota`, `keterangan_tempat`, `deskripsi`, `img_bukti_1`, `img_bukti_2`, `img_bukti_3`, `sifat`) VALUES
(1, 1, 'Bau sampah yang sangat menyengat', '2020-02-20', 1, 5, 6, 'Jl.Lorem Ipsum Dolor dekat sit amat pertigaan dekat consectetur adipisicing elit', 'Bau sampah yang menyengat dari perusahaan sed do eiusmod yang selalu membuang samapah sembarangan 1 bulan terakhir', '20200327105742_UPLOADED-BUKTI_1_Bau sampah yang sangat menyengat_2020-02-20.png', '20200327105742_UPLOADED-BUKTI_2_Bau sampah yang sangat menyengat_2020-02-20.png', '20200327105742_UPLOADED-BUKTI_3_Bau sampah yang sangat menyengat_2020-02-20.png', 1),
(7, 1, 'Ipsum Dolor Sit Amet', '2020-02-20', 2, 12, 31, 'Gg. Excepteur sint occaecat', 'llamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20200328023944_UPLOADED-BUKTI_1_Ipsum Dolor Sit Amet_2020-02-20.png', '20200328023944_UPLOADED-BUKTI_2_Ipsum Dolor Sit Amet_2020-02-20.png', '20200328023944_UPLOADED-BUKTI_3_Ipsum Dolor Sit Amet_2020-02-20.png', 2),
(11, 3, 'Segibrig', '2020-02-20', 2, 1, 1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20200407022920_UPLOADED-BUKTI_1_Segibrig_2020-02-20.webp', '20200407045830_UPLOADED-BUKTI_2_Segibrig_2020-02-20.jpg', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_dislike`
--

CREATE TABLE `aduan_dislike` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_like`
--

CREATE TABLE `aduan_like` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_masyarakat`
--

CREATE TABLE `aduan_masyarakat` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `text` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_petugas`
--

CREATE TABLE `aduan_petugas` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `text` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_tanggapan`
--

CREATE TABLE `aduan_tanggapan` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `tanggapan` enum('1','2','3') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'Kabupaten Aceh Barat'),
(2, 'Kabupaten Aceh Barat Daya'),
(3, 'Kabupaten Aceh Besar'),
(4, 'Kabupaten Aceh Jaya'),
(5, 'Kabupaten Aceh Selatan'),
(6, 'Kabupaten Aceh Singkil'),
(7, 'Kabupaten Aceh Tamiang'),
(8, 'Kabupaten Aceh Tengah'),
(9, 'Kabupaten Aceh Tenggara'),
(10, 'Kabupaten Aceh Timur'),
(11, 'Kabupaten Aceh Utara'),
(12, 'Kabupaten Bener Meriah'),
(13, 'Kabupaten Bireuen'),
(14, 'Kabupaten Gayo Lues'),
(15, 'Kabupaten Nagan Raya'),
(16, 'Kabupaten Pidie'),
(17, 'Kabupaten Pidie Jaya'),
(18, 'Kabupaten Simeulue'),
(19, 'Humas Pemerintah Kota Banda Aceh'),
(20, 'Humas Pemerintah Kota Langsa'),
(21, 'Humas Pemerintah Kota Lhokseumawe'),
(22, 'Humas Pemerintah Kota Sabang'),
(23, 'Humas Pemerintah Kota Subulussalam'),
(24, 'Kabupaten Asahan'),
(25, 'Kabupaten Batu Bara'),
(26, 'Kabupaten Dairi'),
(27, 'Kabupaten Deli Serdang'),
(28, 'Kabupaten Humbang Hasundutan'),
(29, 'Kabupaten Karo'),
(30, 'Kabupaten Labuhanbatu'),
(31, 'Kabupaten Labuhanbatu Selatan'),
(32, 'Kabupaten Labuhanbatu Utara'),
(33, 'Kabupaten Langkat'),
(34, 'Kabupaten Mandailing Natal'),
(35, 'Kabupaten Nias'),
(36, 'Kabupaten Nias Barat'),
(37, 'Kabupaten Nias Selatan'),
(38, 'Kabupaten Nias Utara'),
(39, 'Kabupaten Padang Lawas'),
(40, 'Kabupaten Padang Lawas Utara'),
(41, 'Kabupaten Pakpak Bharat'),
(42, 'Kabupaten Samosir'),
(43, 'Kabupaten Serdang Bedagai'),
(44, 'Kabupaten Simalungun'),
(45, 'Kabupaten Tapanuli Selatan'),
(46, 'Kabupaten Tapanuli Tengah'),
(47, 'Kabupaten Tapanuli Utara'),
(48, 'Kabupaten Toba Samosir'),
(49, 'Humas Pemerintah Kota Binjai'),
(50, 'Humas Pemerintah Kota Gunungsitoli'),
(51, 'Humas Pemerintah Kota Medan'),
(52, 'Humas Pemerintah Kota Padang Sidempuan'),
(53, 'Humas Pemerintah Kota Pematangsiantar'),
(54, 'Humas Pemerintah Kota Sibolga'),
(55, 'Humas Pemerintah Kota Tanjung Balai'),
(56, 'Humas Pemerintah Kota Tebing Tinggi'),
(57, 'Kabupaten Agam'),
(58, 'Kabupaten Dharmasraya'),
(59, 'Kabupaten Kepulauan Mentawai'),
(60, 'Kabupaten Lima Puluh Kota'),
(61, 'Kabupaten Padang Pariaman'),
(62, 'Kabupaten Pasaman'),
(63, 'Kabupaten Pasaman Barat'),
(64, 'Kabupaten Pesisir Selatan'),
(65, 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)'),
(66, 'Kabupaten Solok'),
(67, 'Kabupaten Solok Selatan'),
(68, 'Kabupaten Tanah Datar'),
(69, 'Humas Pemerintah Kota Bukittinggi'),
(70, 'Humas Pemerintah Kota Padang'),
(71, 'Humas Pemerintah Kota Padang Panjang'),
(72, 'Humas Pemerintah Kota Pariaman'),
(73, 'Humas Pemerintah Kota Payakumbuh'),
(74, 'Humas Pemerintah Kota Sawahlunto'),
(75, 'Humas Pemerintah Kota Solok'),
(76, 'Kabupaten Bengkalis'),
(77, 'Kabupaten Indragiri Hilir'),
(78, 'Kabupaten Indragiri Hulu'),
(79, 'Kabupaten Kampar'),
(80, 'Kabupaten Kepulauan Meranti'),
(81, 'Kabupaten Kuantan Singingi'),
(82, 'Kabupaten Pelalawan'),
(83, 'Kabupaten Rokan Hilir'),
(84, 'Kabupaten Rokan Hulu'),
(85, 'Kabupaten Siak'),
(86, 'Humas Pemerintah Kota Dumai'),
(87, 'Humas Pemerintah  Kota Pekanbaru'),
(88, 'Kabupaten Batanghari'),
(89, 'Kabupaten Bungo'),
(90, 'Kabupaten Kerinci'),
(91, 'Kabupaten Merangin'),
(92, 'Kabupaten Muaro Jambi'),
(93, 'Kabupaten Sarolangun'),
(94, 'Kabupaten Tanjung Jabung Barat'),
(95, 'Kabupaten Tanjung Jabung Timur'),
(96, 'Kabupaten Tebo'),
(97, 'Humas Pemerintah Kota Jambi'),
(98, 'Humas Pemerintah Kota Sungai Penuh'),
(99, 'Kabupaten Banyuasin'),
(100, 'Kabupaten Empat Lawang'),
(101, 'Kabupaten Lahat'),
(102, 'Kabupaten Muara Enim'),
(103, 'Kabupaten Musi Banyuasin'),
(104, 'Kabupaten Musi Rawas'),
(105, 'Kabupaten Musi Rawas Utara'),
(106, 'Kabupaten Ogan Ilir'),
(107, 'Kabupaten Ogan Komering Ilir'),
(108, 'Kabupaten Ogan Komering Ulu'),
(109, 'Kabupaten Ogan Komering Ulu Selatan (Oku Selatan)'),
(110, 'Kabupaten Ogan Komering Ulu Timur (Oku Timur)'),
(111, 'Kabupaten Penukal Abab Lematang Ilir'),
(112, 'Humas Pemerintah Kota Lubuk Linggau'),
(113, 'Kota Pagar Alam'),
(114, 'Humas Pemerintah Kota Palembang'),
(115, 'Humas Pemerintah Kota Prabumulih'),
(116, 'Kabupaten Bengkulu Selatan'),
(117, 'Kabupaten Bengkulu Tengah'),
(118, 'Kabupaten Bengkulu Utara'),
(119, 'Kabupaten Kaur'),
(120, 'Kabupaten Kepahiang'),
(121, 'Kabupaten Lebong'),
(122, 'Kabupaten Muko Muko'),
(123, 'Kabupaten Rejang Lebong'),
(124, 'Kabupaten Seluma'),
(125, 'Humas Pemerintah Kota  Bengkulu'),
(126, 'Kabupaten Lampung Barat'),
(127, 'Kabupaten Lampung Selatan'),
(128, 'Kabupaten Lampung Tengah'),
(129, 'Kabupaten Lampung Timur'),
(130, 'Kabupaten Lampung Utara'),
(131, 'Kabupaten Mesuji'),
(132, 'Kabupaten Pesawaran'),
(133, 'Kabupaten Pesisir Barat'),
(134, 'Kabupaten Pringsewu'),
(135, 'Kabupaten Tanggamus'),
(136, 'Kabupaten Tulang Bawang'),
(137, 'Kabupaten Tulang Bawang Barat'),
(138, 'Kabupaten Way Kanan'),
(139, 'Humas Pemerintah Kota Bandar Lampung'),
(140, 'Humas Pemerintah Kota Metro'),
(141, 'Kabupaten Bangka'),
(142, 'Kabupaten Bangka Barat'),
(143, 'Kabupaten Bangka Selatan'),
(144, 'Kabupaten Bangka Tengah'),
(145, 'Kabupaten Belitung'),
(146, 'Kabupaten Belitung Timur'),
(147, 'Humas Pemerintah Kota Pangkal Pinang'),
(148, 'Kabupaten Bintan'),
(149, 'Kabupaten Karimun'),
(150, 'Kabupaten Kepulauan Anambas'),
(151, 'Kabupaten Lingga'),
(152, 'Kabupaten Natuna'),
(153, 'Humas Pemerintah Kota Batam'),
(154, 'Humas Pemerintah Kota Tanjung Pinang'),
(155, 'Kabupaten Adm. Kepulauan Seribu'),
(156, 'Humas Pemerintah Kota Adm. Jakarta Barat'),
(157, 'Humas Pemerintah Kota Adm. Jakarta Pusat'),
(158, 'Humas Pemerintah Kota Adm. Jakarta Selatan'),
(159, 'Humas Pemerintah Kota Adm. Jakarta Timur'),
(160, 'Humas Pemerintah Kota Adm. Jakarta Utara'),
(161, 'Kabupaten Bandung'),
(162, 'Kabupaten Bandung Barat'),
(163, 'Kabupaten Bekasi'),
(164, 'Kabupaten Bogor'),
(165, 'Kabupaten Ciamis'),
(166, 'Kabupaten Cianjur'),
(167, 'Kabupaten Cirebon'),
(168, 'Kabupaten Garut'),
(169, 'Kabupaten Indramayu'),
(170, 'Kabupaten Karawang'),
(171, 'Kabupaten Kuningan'),
(172, 'Kabupaten Majalengka'),
(173, 'Kabupaten Pangandaran'),
(174, 'Kabupaten Purwakarta'),
(175, 'Kabupaten Subang'),
(176, 'Kabupaten Sukabumi'),
(177, 'Kabupaten Sumedang'),
(178, 'Kabupaten Tasikmalaya'),
(179, 'Humas Pemerintah Kota Bandung'),
(180, 'Humas Pemerintah Kota Banjar'),
(181, 'Humas Pemerintah Kota Bekasi'),
(182, 'Humas Pemerintah Kota Bogor'),
(183, 'Humas Pemerintah Kota Cimahi'),
(184, 'Humas Pemerintah Kota Cirebon'),
(185, 'Humas Pemerintah Kota Depok'),
(186, 'Humas Pemerintah Kota Sukabumi'),
(187, 'Humas Pemerintah Kota Tasikmalaya'),
(188, 'Kabupaten Banjarnegara'),
(189, 'Kabupaten Banyumas'),
(190, 'Kabupaten Batang'),
(191, 'Kabupaten Blora'),
(192, 'Kabupaten Boyolali'),
(193, 'Kabupaten Brebes'),
(194, 'Kabupaten Cilacap'),
(195, 'Kabupaten Demak'),
(196, 'Kabupaten Grobogan'),
(197, 'Kabupaten Jepara'),
(198, 'Kabupaten Karanganyar'),
(199, 'Kabupaten Kebumen'),
(200, 'Kabupaten Kendal'),
(201, 'Kabupaten Klaten'),
(202, 'Kabupaten Kudus'),
(203, 'Kabupaten Magelang'),
(204, 'Kabupaten Pati'),
(205, 'Kabupaten Pekalongan'),
(206, 'Kabupaten Pemalang'),
(207, 'Kabupaten Purbalingga'),
(208, 'Kabupaten Purworejo'),
(209, 'Kabupaten Rembang'),
(210, 'Kabupaten Semarang'),
(211, 'Kabupaten Sragen'),
(212, 'Kabupaten Sukoharjo'),
(213, 'Kabupaten Tegal'),
(214, 'Kabupaten Temanggung'),
(215, 'Kabupaten Wonogiri'),
(216, 'Kabupaten Wonosobo'),
(217, 'Humas Pemerintah Kota Magelang'),
(218, 'Humas Pemerintah Kota Pekalongan'),
(219, 'Humas Pemerintah Kota Salatiga'),
(220, 'Humas Pemerintah Kota Semarang'),
(221, 'Humas Pemerintah Kota Surakarta (Solo)'),
(222, 'Humas Pemerintah Kota Tegal'),
(223, 'Kabupaten Bantul'),
(224, 'Kabupaten Gunung Kidul'),
(225, 'Kabupaten Kulon Progo'),
(226, 'Kabupaten Sleman'),
(227, 'Humas Pemerintah Kota Yogyakarta'),
(228, 'Kabupaten Bangkalan'),
(229, 'Kabupaten Banyuwangi'),
(230, 'Kabupaten Blitar'),
(231, 'Kabupaten Bojonegoro'),
(232, 'Kabupaten Bondowoso'),
(233, 'Kabupaten Gresik'),
(234, 'Kabupaten Jember'),
(235, 'Kabupaten Jombang'),
(236, 'Kabupaten Kediri'),
(237, 'Kabupaten Lamongan'),
(238, 'Kabupaten Lumajang'),
(239, 'Kabupaten Madiun'),
(240, 'Kabupaten Magetan'),
(241, 'Kabupaten Malang'),
(242, 'Kabupaten Mojokerto'),
(243, 'Kabupaten Nganjuk'),
(244, 'Kabupaten Ngawi'),
(245, 'Kabupaten Pacitan'),
(246, 'Kabupaten Pamekasan'),
(247, 'Kabupaten Pasuruan'),
(248, 'Kabupaten Ponorogo'),
(249, 'Kabupaten Probolinggo'),
(250, 'Kabupaten Sampang'),
(251, 'Kabupaten Sidoarjo'),
(252, 'Kabupaten Situbondo'),
(253, 'Kabupaten Sumenep'),
(254, 'Kabupaten Trenggalek'),
(255, 'Kabupaten Tuban'),
(256, 'Kabupaten Tulungagung'),
(257, 'Humas Pemerintah Kota Batu'),
(258, 'Humas Pemerintah Kota Blitar'),
(259, 'Humas Pemerintah Kota Kediri'),
(260, 'Humas Pemerintah Kota Madiun'),
(261, 'Humas Pemerintah Kota Malang'),
(262, 'Humas Pemerintah Kota Mojokerto'),
(263, 'Humas Pemerintah Kota Pasuruan'),
(264, 'Humas Pemerintah Kota Probolinggo'),
(265, 'Humas Pemerintah Kota Surabaya'),
(266, 'Kabupaten Lebak'),
(267, 'Kabupaten Pandeglang'),
(268, 'Kabupaten Serang'),
(269, 'Kabupaten Tangerang'),
(270, 'Humas Pemerintah Kota Cilegon'),
(271, 'Humas Pemerintah Kota Serang'),
(272, 'Humas Pemerintah Kota Tangerang'),
(273, 'Humas Pemerintah Kota Tangerang Selatan'),
(274, 'Kabupaten Badung'),
(275, 'Kabupaten Bangli'),
(276, 'Kabupaten Buleleng'),
(277, 'Kabupaten Gianyar'),
(278, 'Kabupaten Jembrana'),
(279, 'Kabupaten Karangasem'),
(280, 'Kabupaten Klungkung'),
(281, 'Kabupaten Tabanan'),
(282, 'Humas Pemerintah Kota Denpasar'),
(283, 'Kabupaten Bima'),
(284, 'Kabupaten Dompu'),
(285, 'Kabupaten Lombok Barat'),
(286, 'Kabupaten Lombok Tengah'),
(287, 'Kabupaten Lombok Timur'),
(288, 'Kabupaten Lombok Utara'),
(289, 'Kabupaten Sumbawa'),
(290, 'Kabupaten Sumbawa Barat'),
(291, 'Humas Pemerintah Kota Bima'),
(292, 'Humas Pemerintah Kota Mataram'),
(293, 'Kabupaten Alor'),
(294, 'Kabupaten Belu'),
(295, 'Kabupaten Ende'),
(296, 'Kabupaten Flores Timur'),
(297, 'Kabupaten Kupang'),
(298, 'Kabupaten Lembata'),
(299, 'Kabupaten Malaka'),
(300, 'Kabupaten Manggarai'),
(301, 'Kabupaten Manggarai Barat'),
(302, 'Kabupaten Manggarai Timur'),
(303, 'Kabupaten Nagekeo'),
(304, 'Kabupaten Ngada'),
(305, 'Kabupaten Rote Ndao'),
(306, 'Kabupaten Sabu Raijua'),
(307, 'Kabupaten Sikka'),
(308, 'Kabupaten Sumba Barat'),
(309, 'Kabupaten Sumba Barat Daya'),
(310, 'Kabupaten Sumba Tengah'),
(311, 'Kabupaten Sumba Timur'),
(312, 'Kabupaten Timor Tengah Selatan'),
(313, 'Kabupaten Timor Tengah Utara'),
(314, 'Humas Pemerintah Kota Kupang'),
(315, 'Kabupaten Bengkayang'),
(316, 'Kabupaten Kapuas Hulu'),
(317, 'Kabupaten Kayong Utara'),
(318, 'Kabupaten Ketapang'),
(319, 'Kabupaten Kubu Raya'),
(320, 'Kabupaten Landak'),
(321, 'Kabupaten Melawi'),
(322, 'Kabupaten Mempawah'),
(323, 'Kabupaten Sambas'),
(324, 'Kabupaten Sanggau'),
(325, 'Kabupaten Sekadau'),
(326, 'Kabupaten Sintang'),
(327, 'Humas Pemerintah Kota Pontianak'),
(328, 'Humas Pemerintah Kota Singkawang'),
(329, 'Kabupaten Barito Selatan'),
(330, 'Kabupaten Barito Timur'),
(331, 'Kabupaten Barito Utara'),
(332, 'Kabupaten Gunung Mas'),
(333, 'Kabupaten Kapuas'),
(334, 'Kabupaten Katingan'),
(335, 'Kabupaten Kotawaringin Barat'),
(336, 'Kabupaten Kotawaringin Timur'),
(337, 'Kabupaten Lamandau'),
(338, 'Kabupaten Murung Raya'),
(339, 'Kabupaten Pulang Pisau'),
(340, 'Kabupaten Seruyan'),
(341, 'Kabupaten Sukamara'),
(342, 'Kota Palangka Raya'),
(343, 'Kabupaten Balangan'),
(344, 'Kabupaten Banjar'),
(345, 'Kabupaten Barito Kuala'),
(346, 'Kabupaten Hulu Sungai Selatan'),
(347, 'Kabupaten Hulu Sungai Tengah'),
(348, 'Kabupaten Hulu Sungai Utara'),
(349, 'Kabupaten Kotabaru'),
(350, 'Kabupaten Tabalong'),
(351, 'Kabupaten Tanah Bumbu'),
(352, 'Kabupaten Tanah Laut'),
(353, 'Kabupaten Tapin'),
(354, 'Humas Pemerintah Kota Banjarbaru'),
(355, 'Humas Pemerintah Kota Banjarmasin'),
(356, 'Kabupaten Berau'),
(357, 'Kabupaten Kutai Barat'),
(358, 'Kabupaten Kutai Kartanegara'),
(359, 'Kabupaten Kutai Timur'),
(360, 'Kabupaten Mahakam Ulu'),
(361, 'Kabupaten Paser'),
(362, 'Kabupaten Penajam Paser Utara'),
(363, 'Humas Pemerintah Kota Balikpapan'),
(364, 'Humas Pemerintah Kota Bontang'),
(365, 'Humas Pemerintah Kota Samarinda'),
(366, 'Kabupaten Bulungan (Bulongan)'),
(367, 'Kabupaten Malinau'),
(368, 'Kabupaten Nunukan'),
(369, 'Kabupaten Tana Tidung'),
(370, 'Humas Pemerintah Kota Tarakan'),
(371, 'Kabupaten Bolaang Mongondow'),
(372, 'Kabupaten Bolaang Mongondow Selatan'),
(373, 'Kabupaten Bolaang Mongondow Timur'),
(374, 'Kabupaten Bolaang Mongondow Utara'),
(375, 'Kabupaten Kepulauan Sangihe'),
(376, 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(377, 'Kabupaten Kepulauan Talaud'),
(378, 'Kabupaten Minahasa'),
(379, 'Kabupaten Minahasa Selatan'),
(380, 'Kabupaten Minahasa Tenggara'),
(381, 'Kabupaten Minahasa Utara'),
(382, 'Humas Pemerintah Kota Bitung'),
(383, 'Humas Pemerintah Kota Kotamobagu'),
(384, 'Humas Pemerintah Kota Manado'),
(385, 'Humas Pemerintah Kota Tomohon'),
(386, 'Kabupaten Banggai'),
(387, 'Kabupaten Banggai Kepulauan'),
(388, 'Kabupaten Banggai Laut'),
(389, 'Kabupaten Buol'),
(390, 'Kabupaten Donggala'),
(391, 'Kabupaten Morowali'),
(392, 'Kabupaten Morowali Utara'),
(393, 'Kabupaten Parigi Moutong'),
(394, 'Kabupaten Poso'),
(395, 'Kabupaten Sigi'),
(396, 'Kabupaten Tojo Una-Una'),
(397, 'Kabupaten Toli-Toli'),
(398, 'Humas Pemerintah Kota Palu'),
(399, 'Kabupaten Bantaeng'),
(400, 'Kabupaten Barru'),
(401, 'Kabupaten Bone'),
(402, 'Kabupaten Bulukumba'),
(403, 'Kabupaten Enrekang'),
(404, 'Kabupaten Gowa'),
(405, 'Kabupaten Jeneponto'),
(406, 'Kabupaten Selayar (Kepulauan Selayar)'),
(407, 'Kabupaten Luwu'),
(408, 'Kabupaten Luwu Timur'),
(409, 'Kabupaten Luwu Utara'),
(410, 'Kabupaten Maros'),
(411, 'Kabupaten Pangkajene Kepulauan'),
(412, 'Kabupaten Pinrang'),
(413, 'Kabupaten Sidenreng Rappang (Sidrap)'),
(414, 'Kabupaten Sinjai'),
(415, 'Kabupaten Soppeng'),
(416, 'Kabupaten Takalar'),
(417, 'Kabupaten Tana Toraja'),
(418, 'Kabupaten Toraja Utara'),
(419, 'Kabupaten Wajo'),
(420, 'Humas Pemerintah Kota Makassar'),
(421, 'Humas Pemerintah Kota Palopo'),
(422, 'Humas Pemerintah Kota Parepare'),
(423, 'Kabupaten Bombana'),
(424, 'Kabupaten Buton'),
(425, 'Kabupaten Buton Selatan'),
(426, 'Kabupaten Buton Tengah'),
(427, 'Kabupaten Buton Utara'),
(428, 'Kabupaten Kolaka'),
(429, 'Kabupaten Kolaka Timur'),
(430, 'Kabupaten Kolaka Utara'),
(431, 'Kabupaten Konawe'),
(432, 'Kabupaten Konawe Kepulauan'),
(433, 'Kabupaten Konawe Selatan'),
(434, 'Kabupaten Konawe Utara'),
(435, 'Kabupaten Muna'),
(436, 'Kabupaten Muna Barat'),
(437, 'Kabupaten Wakatobi'),
(438, 'Humas Pemerintah Kota Baubau'),
(439, 'Humas Pemerintah Kota Kendari'),
(440, 'Kabupaten Boalemo'),
(441, 'Kabupaten Bone Bolango'),
(442, 'Kabupaten Gorontalo'),
(443, 'Kabupaten Gorontalo Utara'),
(444, 'Kabupaten Pohuwato'),
(445, 'Humas Pemerintah Kota Gorontalo'),
(446, 'Kabupaten Majene'),
(447, 'Kabupaten Mamasa'),
(448, 'Kabupaten Mamuju'),
(449, 'Kabupaten Mamuju Tengah'),
(450, 'Kabupaten Mamuju Utara'),
(451, 'Kabupaten Polewali Mandar'),
(452, 'Kabupaten Buru'),
(453, 'Kabupaten Buru Selatan'),
(454, 'Kabupaten Kepulauan Aru'),
(455, 'Kabupaten Maluku Barat Daya'),
(456, 'Kabupaten Maluku Tengah'),
(457, 'Kabupaten Maluku Tenggara'),
(458, 'Kabupaten Maluku Tenggara Barat'),
(459, 'Kabupaten Seram Bagian Barat'),
(460, 'Kabupaten Seram Bagian Timur'),
(461, 'Humas Pemerintah Kota Ambon'),
(462, 'Humas Pemerintah Kota Tual'),
(463, 'Kabupaten Halmahera Barat'),
(464, 'Kabupaten Halmahera Selatan'),
(465, 'Kabupaten Halmahera Tengah'),
(466, 'Kabupaten Halmahera Timur'),
(467, 'Kabupaten Halmahera Utara'),
(468, 'Kabupaten Kepulauan Sula'),
(469, 'Kabupaten Pulau Morotai'),
(470, 'Kabupaten Pulau Taliabu'),
(471, 'Humas Pemerintah Kota Ternate'),
(472, 'Humas Pemerintah Kota Tidore Kepulauan'),
(473, 'Kabupaten Asmat'),
(474, 'Kabupaten Biak Numfor'),
(475, 'Kabupaten Boven Digoel'),
(476, 'Kabupaten Deiyai (Deliyai)'),
(477, 'Kabupaten Dogiyai'),
(478, 'Kabupaten Intan Jaya'),
(479, 'Kabupaten Jayapura'),
(480, 'Kabupaten Jayawijaya'),
(481, 'Kabupaten Keerom'),
(482, 'Kabupaten Kepulauan Yapen (Yapen Waropen)'),
(483, 'Kabupaten Lanny Jaya'),
(484, 'Kabupaten Mamberamo Raya'),
(485, 'Kabupaten Mamberamo Tengah'),
(486, 'Kabupaten Mappi'),
(487, 'Kabupaten Merauke'),
(488, 'Kabupaten Mimika'),
(489, 'Kabupaten Nabire'),
(490, 'Kabupaten Nduga'),
(491, 'Kabupaten Paniai'),
(492, 'Kabupaten Pegunungan Bintang'),
(493, 'Kabupaten Puncak'),
(494, 'Kabupaten Puncak Jaya'),
(495, 'Kabupaten Sarmi'),
(496, 'Kabupaten Supiori'),
(497, 'Kabupaten Tolikara'),
(498, 'Kabupaten Waropen'),
(499, 'Kabupaten Yahukimo'),
(500, 'Kabupaten Yalimo'),
(501, 'Humas Pemerintah Kota Jayapura'),
(502, 'Kabupaten Fakfak'),
(503, 'Kabupaten Kaimana'),
(504, 'Kabupaten Manokwari'),
(505, 'Kabupaten Manokwari Selatan'),
(506, 'Kabupaten Maybrat'),
(507, 'Kabupaten Pegunungan Arfak'),
(508, 'Kabupaten Raja Ampat'),
(509, 'Kabupaten Sorong'),
(510, 'Kabupaten Sorong Selatan'),
(511, 'Kabupaten Tambrauw'),
(512, 'Kabupaten Teluk Bintuni'),
(513, 'Kabupaten Teluk Wondama'),
(514, 'Humas Pemerintah Kota Sorong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kekerasan Dalam Rumah Tangga (KDRT)'),
(2, 'Bencana Alam (Banjir)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'Kabupaten Aceh Barat'),
(2, 'Kabupaten Aceh Barat Daya'),
(3, 'Kabupaten Aceh Besar'),
(4, 'Kabupaten Aceh Jaya'),
(5, 'Kabupaten Aceh Selatan'),
(6, 'Kabupaten Aceh Singkil'),
(7, 'Kabupaten Aceh Tamiang'),
(8, 'Kabupaten Aceh Tengah'),
(9, 'Kabupaten Aceh Tenggara'),
(10, 'Kabupaten Aceh Timur'),
(11, 'Kabupaten Aceh Utara'),
(12, 'Kabupaten Bener Meriah'),
(13, 'Kabupaten Bireuen'),
(14, 'Kabupaten Gayo Lues'),
(15, 'Kabupaten Nagan Raya'),
(16, 'Kabupaten Pidie'),
(17, 'Kabupaten Pidie Jaya'),
(18, 'Kabupaten Simeulue'),
(19, 'Kota Banda Aceh'),
(20, 'Kota Langsa'),
(21, 'Kota Lhokseumawe'),
(22, 'Kota Sabang'),
(23, 'Kota Subulussalam'),
(24, 'Kabupaten Asahan'),
(25, 'Kabupaten Batu Bara'),
(26, 'Kabupaten Dairi'),
(27, 'Kabupaten Deli Serdang'),
(28, 'Kabupaten Humbang Hasundutan'),
(29, 'Kabupaten Karo'),
(30, 'Kabupaten Labuhanbatu'),
(31, 'Kabupaten Labuhanbatu Selatan'),
(32, 'Kabupaten Labuhanbatu Utara'),
(33, 'Kabupaten Langkat'),
(34, 'Kabupaten Mandailing Natal'),
(35, 'Kabupaten Nias'),
(36, 'Kabupaten Nias Barat'),
(37, 'Kabupaten Nias Selatan'),
(38, 'Kabupaten Nias Utara'),
(39, 'Kabupaten Padang Lawas'),
(40, 'Kabupaten Padang Lawas Utara'),
(41, 'Kabupaten Pakpak Bharat'),
(42, 'Kabupaten Samosir'),
(43, 'Kabupaten Serdang Bedagai'),
(44, 'Kabupaten Simalungun'),
(45, 'Kabupaten Tapanuli Selatan'),
(46, 'Kabupaten Tapanuli Tengah'),
(47, 'Kabupaten Tapanuli Utara'),
(48, 'Kabupaten Toba Samosir'),
(49, 'Kota Binjai'),
(50, 'Kota Gunungsitoli'),
(51, 'Kota Medan'),
(52, 'Kota Padang Sidempuan'),
(53, 'Kota Pematangsiantar'),
(54, 'Kota Sibolga'),
(55, 'Kota Tanjung Balai'),
(56, 'Kota Tebing Tinggi'),
(57, 'Kabupaten Agam'),
(58, 'Kabupaten Dharmasraya'),
(59, 'Kabupaten Kepulauan Mentawai'),
(60, 'Kabupaten Lima Puluh Kota'),
(61, 'Kabupaten Padang Pariaman'),
(62, 'Kabupaten Pasaman'),
(63, 'Kabupaten Pasaman Barat'),
(64, 'Kabupaten Pesisir Selatan'),
(65, 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)'),
(66, 'Kabupaten Solok'),
(67, 'Kabupaten Solok Selatan'),
(68, 'Kabupaten Tanah Datar'),
(69, 'Kota Bukittinggi'),
(70, 'Kota Padang'),
(71, 'Kota Padang Panjang'),
(72, 'Kota Pariaman'),
(73, 'Kota Payakumbuh'),
(74, 'Kota Sawahlunto'),
(75, 'Kota Solok'),
(76, 'Kabupaten Bengkalis'),
(77, 'Kabupaten Indragiri Hilir'),
(78, 'Kabupaten Indragiri Hulu'),
(79, 'Kabupaten Kampar'),
(80, 'Kabupaten Kepulauan Meranti'),
(81, 'Kabupaten Kuantan Singingi'),
(82, 'Kabupaten Pelalawan'),
(83, 'Kabupaten Rokan Hilir'),
(84, 'Kabupaten Rokan Hulu'),
(85, 'Kabupaten Siak'),
(86, 'Kota Dumai'),
(87, 'Kota Pekanbaru'),
(88, 'Kabupaten Batanghari'),
(89, 'Kabupaten Bungo'),
(90, 'Kabupaten Kerinci'),
(91, 'Kabupaten Merangin'),
(92, 'Kabupaten Muaro Jambi'),
(93, 'Kabupaten Sarolangun'),
(94, 'Kabupaten Tanjung Jabung Barat'),
(95, 'Kabupaten Tanjung Jabung Timur'),
(96, 'Kabupaten Tebo'),
(97, 'Kota Jambi'),
(98, 'Kota Sungai Penuh'),
(99, 'Kabupaten Banyuasin'),
(100, 'Kabupaten Empat Lawang'),
(101, 'Kabupaten Lahat'),
(102, 'Kabupaten Muara Enim'),
(103, 'Kabupaten Musi Banyuasin'),
(104, 'Kabupaten Musi Rawas'),
(105, 'Kabupaten Musi Rawas Utara'),
(106, 'Kabupaten Ogan Ilir'),
(107, 'Kabupaten Ogan Komering Ilir'),
(108, 'Kabupaten Ogan Komering Ulu'),
(109, 'Kabupaten Ogan Komering Ulu Selatan (Oku Selatan)'),
(110, 'Kabupaten Ogan Komering Ulu Timur (Oku Timur)'),
(111, 'Kabupaten Penukal Abab Lematang Ilir'),
(112, 'Kota Lubuk Linggau'),
(113, 'Kota Pagar Alam'),
(114, 'Kota Palembang'),
(115, 'Kota Prabumulih'),
(116, 'Kabupaten Bengkulu Selatan'),
(117, 'Kabupaten Bengkulu Tengah'),
(118, 'Kabupaten Bengkulu Utara'),
(119, 'Kabupaten Kaur'),
(120, 'Kabupaten Kepahiang'),
(121, 'Kabupaten Lebong'),
(122, 'Kabupaten Muko Muko'),
(123, 'Kabupaten Rejang Lebong'),
(124, 'Kabupaten Seluma'),
(125, 'Kota Bengkulu'),
(126, 'Kabupaten Lampung Barat'),
(127, 'Kabupaten Lampung Selatan'),
(128, 'Kabupaten Lampung Tengah'),
(129, 'Kabupaten Lampung Timur'),
(130, 'Kabupaten Lampung Utara'),
(131, 'Kabupaten Mesuji'),
(132, 'Kabupaten Pesawaran'),
(133, 'Kabupaten Pesisir Barat'),
(134, 'Kabupaten Pringsewu'),
(135, 'Kabupaten Tanggamus'),
(136, 'Kabupaten Tulang Bawang'),
(137, 'Kabupaten Tulang Bawang Barat'),
(138, 'Kabupaten Way Kanan'),
(139, 'Kota Bandar Lampung'),
(140, 'Kota Metro'),
(141, 'Kabupaten Bangka'),
(142, 'Kabupaten Bangka Barat'),
(143, 'Kabupaten Bangka Selatan'),
(144, 'Kabupaten Bangka Tengah'),
(145, 'Kabupaten Belitung'),
(146, 'Kabupaten Belitung Timur'),
(147, 'Kota Pangkal Pinang'),
(148, 'Kabupaten Bintan'),
(149, 'Kabupaten Karimun'),
(150, 'Kabupaten Kepulauan Anambas'),
(151, 'Kabupaten Lingga'),
(152, 'Kabupaten Natuna'),
(153, 'Kota Batam'),
(154, 'Kota Tanjung Pinang'),
(155, 'Kabupaten Adm. Kepulauan Seribu'),
(156, 'Kota Adm. Jakarta Barat'),
(157, 'Kota Adm. Jakarta Pusat'),
(158, 'Kota Adm. Jakarta Selatan'),
(159, 'Kota Adm. Jakarta Timur'),
(160, 'Kota Adm. Jakarta Utara'),
(161, 'Kabupaten Bandung'),
(162, 'Kabupaten Bandung Barat'),
(163, 'Kabupaten Bekasi'),
(164, 'Kabupaten Bogor'),
(165, 'Kabupaten Ciamis'),
(166, 'Kabupaten Cianjur'),
(167, 'Kabupaten Cirebon'),
(168, 'Kabupaten Garut'),
(169, 'Kabupaten Indramayu'),
(170, 'Kabupaten Karawang'),
(171, 'Kabupaten Kuningan'),
(172, 'Kabupaten Majalengka'),
(173, 'Kabupaten Pangandaran'),
(174, 'Kabupaten Purwakarta'),
(175, 'Kabupaten Subang'),
(176, 'Kabupaten Sukabumi'),
(177, 'Kabupaten Sumedang'),
(178, 'Kabupaten Tasikmalaya'),
(179, 'Kota Bandung'),
(180, 'Kota Banjar'),
(181, 'Kota Bekasi'),
(182, 'Kota Bogor'),
(183, 'Kota Cimahi'),
(184, 'Kota Cirebon'),
(185, 'Kota Depok'),
(186, 'Kota Sukabumi'),
(187, 'Kota Tasikmalaya'),
(188, 'Kabupaten Banjarnegara'),
(189, 'Kabupaten Banyumas'),
(190, 'Kabupaten Batang'),
(191, 'Kabupaten Blora'),
(192, 'Kabupaten Boyolali'),
(193, 'Kabupaten Brebes'),
(194, 'Kabupaten Cilacap'),
(195, 'Kabupaten Demak'),
(196, 'Kabupaten Grobogan'),
(197, 'Kabupaten Jepara'),
(198, 'Kabupaten Karanganyar'),
(199, 'Kabupaten Kebumen'),
(200, 'Kabupaten Kendal'),
(201, 'Kabupaten Klaten'),
(202, 'Kabupaten Kudus'),
(203, 'Kabupaten Magelang'),
(204, 'Kabupaten Pati'),
(205, 'Kabupaten Pekalongan'),
(206, 'Kabupaten Pemalang'),
(207, 'Kabupaten Purbalingga'),
(208, 'Kabupaten Purworejo'),
(209, 'Kabupaten Rembang'),
(210, 'Kabupaten Semarang'),
(211, 'Kabupaten Sragen'),
(212, 'Kabupaten Sukoharjo'),
(213, 'Kabupaten Tegal'),
(214, 'Kabupaten Temanggung'),
(215, 'Kabupaten Wonogiri'),
(216, 'Kabupaten Wonosobo'),
(217, 'Kota Magelang'),
(218, 'Kota Pekalongan'),
(219, 'Kota Salatiga'),
(220, 'Kota Semarang'),
(221, 'Kota Surakarta (Solo)'),
(222, 'Kota Tegal'),
(223, 'Kabupaten Bantul'),
(224, 'Kabupaten Gunung Kidul'),
(225, 'Kabupaten Kulon Progo'),
(226, 'Kabupaten Sleman'),
(227, 'Kota Yogyakarta'),
(228, 'Kabupaten Bangkalan'),
(229, 'Kabupaten Banyuwangi'),
(230, 'Kabupaten Blitar'),
(231, 'Kabupaten Bojonegoro'),
(232, 'Kabupaten Bondowoso'),
(233, 'Kabupaten Gresik'),
(234, 'Kabupaten Jember'),
(235, 'Kabupaten Jombang'),
(236, 'Kabupaten Kediri'),
(237, 'Kabupaten Lamongan'),
(238, 'Kabupaten Lumajang'),
(239, 'Kabupaten Madiun'),
(240, 'Kabupaten Magetan'),
(241, 'Kabupaten Malang'),
(242, 'Kabupaten Mojokerto'),
(243, 'Kabupaten Nganjuk'),
(244, 'Kabupaten Ngawi'),
(245, 'Kabupaten Pacitan'),
(246, 'Kabupaten Pamekasan'),
(247, 'Kabupaten Pasuruan'),
(248, 'Kabupaten Ponorogo'),
(249, 'Kabupaten Probolinggo'),
(250, 'Kabupaten Sampang'),
(251, 'Kabupaten Sidoarjo'),
(252, 'Kabupaten Situbondo'),
(253, 'Kabupaten Sumenep'),
(254, 'Kabupaten Trenggalek'),
(255, 'Kabupaten Tuban'),
(256, 'Kabupaten Tulungagung'),
(257, 'Kota Batu'),
(258, 'Kota Blitar'),
(259, 'Kota Kediri'),
(260, 'Kota Madiun'),
(261, 'Kota Malang'),
(262, 'Kota Mojokerto'),
(263, 'Kota Pasuruan'),
(264, 'Kota Probolinggo'),
(265, 'Kota Surabaya'),
(266, 'Kabupaten Lebak'),
(267, 'Kabupaten Pandeglang'),
(268, 'Kabupaten Serang'),
(269, 'Kabupaten Tangerang'),
(270, 'Kota Cilegon'),
(271, 'Kota Serang'),
(272, 'Kota Tangerang'),
(273, 'Kota Tangerang Selatan'),
(274, 'Kabupaten Badung'),
(275, 'Kabupaten Bangli'),
(276, 'Kabupaten Buleleng'),
(277, 'Kabupaten Gianyar'),
(278, 'Kabupaten Jembrana'),
(279, 'Kabupaten Karangasem'),
(280, 'Kabupaten Klungkung'),
(281, 'Kabupaten Tabanan'),
(282, 'Kota Denpasar'),
(283, 'Kabupaten Bima'),
(284, 'Kabupaten Dompu'),
(285, 'Kabupaten Lombok Barat'),
(286, 'Kabupaten Lombok Tengah'),
(287, 'Kabupaten Lombok Timur'),
(288, 'Kabupaten Lombok Utara'),
(289, 'Kabupaten Sumbawa'),
(290, 'Kabupaten Sumbawa Barat'),
(291, 'Kota Bima'),
(292, 'Kota Mataram'),
(293, 'Kabupaten Alor'),
(294, 'Kabupaten Belu'),
(295, 'Kabupaten Ende'),
(296, 'Kabupaten Flores Timur'),
(297, 'Kabupaten Kupang'),
(298, 'Kabupaten Lembata'),
(299, 'Kabupaten Malaka'),
(300, 'Kabupaten Manggarai'),
(301, 'Kabupaten Manggarai Barat'),
(302, 'Kabupaten Manggarai Timur'),
(303, 'Kabupaten Nagekeo'),
(304, 'Kabupaten Ngada'),
(305, 'Kabupaten Rote Ndao'),
(306, 'Kabupaten Sabu Raijua'),
(307, 'Kabupaten Sikka'),
(308, 'Kabupaten Sumba Barat'),
(309, 'Kabupaten Sumba Barat Daya'),
(310, 'Kabupaten Sumba Tengah'),
(311, 'Kabupaten Sumba Timur'),
(312, 'Kabupaten Timor Tengah Selatan'),
(313, 'Kabupaten Timor Tengah Utara'),
(314, 'Kota Kupang'),
(315, 'Kabupaten Bengkayang'),
(316, 'Kabupaten Kapuas Hulu'),
(317, 'Kabupaten Kayong Utara'),
(318, 'Kabupaten Ketapang'),
(319, 'Kabupaten Kubu Raya'),
(320, 'Kabupaten Landak'),
(321, 'Kabupaten Melawi'),
(322, 'Kabupaten Mempawah'),
(323, 'Kabupaten Sambas'),
(324, 'Kabupaten Sanggau'),
(325, 'Kabupaten Sekadau'),
(326, 'Kabupaten Sintang'),
(327, 'Kota Pontianak'),
(328, 'Kota Singkawang'),
(329, 'Kabupaten Barito Selatan'),
(330, 'Kabupaten Barito Timur'),
(331, 'Kabupaten Barito Utara'),
(332, 'Kabupaten Gunung Mas'),
(333, 'Kabupaten Kapuas'),
(334, 'Kabupaten Katingan'),
(335, 'Kabupaten Kotawaringin Barat'),
(336, 'Kabupaten Kotawaringin Timur'),
(337, 'Kabupaten Lamandau'),
(338, 'Kabupaten Murung Raya'),
(339, 'Kabupaten Pulang Pisau'),
(340, 'Kabupaten Seruyan'),
(341, 'Kabupaten Sukamara'),
(342, 'Kota Palangka Raya'),
(343, 'Kabupaten Balangan'),
(344, 'Kabupaten Banjar'),
(345, 'Kabupaten Barito Kuala'),
(346, 'Kabupaten Hulu Sungai Selatan'),
(347, 'Kabupaten Hulu Sungai Tengah'),
(348, 'Kabupaten Hulu Sungai Utara'),
(349, 'Kabupaten Kotabaru'),
(350, 'Kabupaten Tabalong'),
(351, 'Kabupaten Tanah Bumbu'),
(352, 'Kabupaten Tanah Laut'),
(353, 'Kabupaten Tapin'),
(354, 'Kota Banjarbaru'),
(355, 'Kota Banjarmasin'),
(356, 'Kabupaten Berau'),
(357, 'Kabupaten Kutai Barat'),
(358, 'Kabupaten Kutai Kartanegara'),
(359, 'Kabupaten Kutai Timur'),
(360, 'Kabupaten Mahakam Ulu'),
(361, 'Kabupaten Paser'),
(362, 'Kabupaten Penajam Paser Utara'),
(363, 'Kota Balikpapan'),
(364, 'Kota Bontang'),
(365, 'Kota Samarinda'),
(366, 'Kabupaten Bulungan (Bulongan)'),
(367, 'Kabupaten Malinau'),
(368, 'Kabupaten Nunukan'),
(369, 'Kabupaten Tana Tidung'),
(370, 'Kota Tarakan'),
(371, 'Kabupaten Bolaang Mongondow'),
(372, 'Kabupaten Bolaang Mongondow Selatan'),
(373, 'Kabupaten Bolaang Mongondow Timur'),
(374, 'Kabupaten Bolaang Mongondow Utara'),
(375, 'Kabupaten Kepulauan Sangihe'),
(376, 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(377, 'Kabupaten Kepulauan Talaud'),
(378, 'Kabupaten Minahasa'),
(379, 'Kabupaten Minahasa Selatan'),
(380, 'Kabupaten Minahasa Tenggara'),
(381, 'Kabupaten Minahasa Utara'),
(382, 'Kota Bitung'),
(383, 'Kota Kotamobagu'),
(384, 'Kota Manado'),
(385, 'Kota Tomohon'),
(386, 'Kabupaten Banggai'),
(387, 'Kabupaten Banggai Kepulauan'),
(388, 'Kabupaten Banggai Laut'),
(389, 'Kabupaten Buol'),
(390, 'Kabupaten Donggala'),
(391, 'Kabupaten Morowali'),
(392, 'Kabupaten Morowali Utara'),
(393, 'Kabupaten Parigi Moutong'),
(394, 'Kabupaten Poso'),
(395, 'Kabupaten Sigi'),
(396, 'Kabupaten Tojo Una-Una'),
(397, 'Kabupaten Toli-Toli'),
(398, 'Kota Palu'),
(399, 'Kabupaten Bantaeng'),
(400, 'Kabupaten Barru'),
(401, 'Kabupaten Bone'),
(402, 'Kabupaten Bulukumba'),
(403, 'Kabupaten Enrekang'),
(404, 'Kabupaten Gowa'),
(405, 'Kabupaten Jeneponto'),
(406, 'Kabupaten Selayar (Kepulauan Selayar)'),
(407, 'Kabupaten Luwu'),
(408, 'Kabupaten Luwu Timur'),
(409, 'Kabupaten Luwu Utara'),
(410, 'Kabupaten Maros'),
(411, 'Kabupaten Pangkajene Kepulauan'),
(412, 'Kabupaten Pinrang'),
(413, 'Kabupaten Sidenreng Rappang (Sidrap)'),
(414, 'Kabupaten Sinjai'),
(415, 'Kabupaten Soppeng'),
(416, 'Kabupaten Takalar'),
(417, 'Kabupaten Tana Toraja'),
(418, 'Kabupaten Toraja Utara'),
(419, 'Kabupaten Wajo'),
(420, 'Kota Makassar'),
(421, 'Kota Palopo'),
(422, 'Kota Parepare'),
(423, 'Kabupaten Bombana'),
(424, 'Kabupaten Buton'),
(425, 'Kabupaten Buton Selatan'),
(426, 'Kabupaten Buton Tengah'),
(427, 'Kabupaten Buton Utara'),
(428, 'Kabupaten Kolaka'),
(429, 'Kabupaten Kolaka Timur'),
(430, 'Kabupaten Kolaka Utara'),
(431, 'Kabupaten Konawe'),
(432, 'Kabupaten Konawe Kepulauan'),
(433, 'Kabupaten Konawe Selatan'),
(434, 'Kabupaten Konawe Utara'),
(435, 'Kabupaten Muna'),
(436, 'Kabupaten Muna Barat'),
(437, 'Kabupaten Wakatobi'),
(438, 'Kota Baubau'),
(439, 'Kota Kendari'),
(440, 'Kabupaten Boalemo'),
(441, 'Kabupaten Bone Bolango'),
(442, 'Kabupaten Gorontalo'),
(443, 'Kabupaten Gorontalo Utara'),
(444, 'Kabupaten Pohuwato'),
(445, 'Kota Gorontalo'),
(446, 'Kabupaten Majene'),
(447, 'Kabupaten Mamasa'),
(448, 'Kabupaten Mamuju'),
(449, 'Kabupaten Mamuju Tengah'),
(450, 'Kabupaten Mamuju Utara'),
(451, 'Kabupaten Polewali Mandar'),
(452, 'Kabupaten Buru'),
(453, 'Kabupaten Buru Selatan'),
(454, 'Kabupaten Kepulauan Aru'),
(455, 'Kabupaten Maluku Barat Daya'),
(456, 'Kabupaten Maluku Tengah'),
(457, 'Kabupaten Maluku Tenggara'),
(458, 'Kabupaten Maluku Tenggara Barat'),
(459, 'Kabupaten Seram Bagian Barat'),
(460, 'Kabupaten Seram Bagian Timur'),
(461, 'Kota Ambon'),
(462, 'Kota Tual'),
(463, 'Kabupaten Halmahera Barat'),
(464, 'Kabupaten Halmahera Selatan'),
(465, 'Kabupaten Halmahera Tengah'),
(466, 'Kabupaten Halmahera Timur'),
(467, 'Kabupaten Halmahera Utara'),
(468, 'Kabupaten Kepulauan Sula'),
(469, 'Kabupaten Pulau Morotai'),
(470, 'Kabupaten Pulau Taliabu'),
(471, 'Kota Ternate'),
(472, 'Kota Tidore Kepulauan'),
(473, 'Kabupaten Asmat'),
(474, 'Kabupaten Biak Numfor'),
(475, 'Kabupaten Boven Digoel'),
(476, 'Kabupaten Deiyai (Deliyai)'),
(477, 'Kabupaten Dogiyai'),
(478, 'Kabupaten Intan Jaya'),
(479, 'Kabupaten Jayapura'),
(480, 'Kabupaten Jayawijaya'),
(481, 'Kabupaten Keerom'),
(482, 'Kabupaten Kepulauan Yapen (Yapen Waropen)'),
(483, 'Kabupaten Lanny Jaya'),
(484, 'Kabupaten Mamberamo Raya'),
(485, 'Kabupaten Mamberamo Tengah'),
(486, 'Kabupaten Mappi'),
(487, 'Kabupaten Merauke'),
(488, 'Kabupaten Mimika'),
(489, 'Kabupaten Nabire'),
(490, 'Kabupaten Nduga'),
(491, 'Kabupaten Paniai'),
(492, 'Kabupaten Pegunungan Bintang'),
(493, 'Kabupaten Puncak'),
(494, 'Kabupaten Puncak Jaya'),
(495, 'Kabupaten Sarmi'),
(496, 'Kabupaten Supiori'),
(497, 'Kabupaten Tolikara'),
(498, 'Kabupaten Waropen'),
(499, 'Kabupaten Yahukimo'),
(500, 'Kabupaten Yalimo'),
(501, 'Kota Jayapura'),
(502, 'Kabupaten Fakfak'),
(503, 'Kabupaten Kaimana'),
(504, 'Kabupaten Manokwari'),
(505, 'Kabupaten Manokwari Selatan'),
(506, 'Kabupaten Maybrat'),
(507, 'Kabupaten Pegunungan Arfak'),
(508, 'Kabupaten Raja Ampat'),
(509, 'Kabupaten Sorong'),
(510, 'Kabupaten Sorong Selatan'),
(511, 'Kabupaten Tambrauw'),
(512, 'Kabupaten Teluk Bintuni'),
(513, 'Kabupaten Teluk Wondama'),
(514, 'Kota Sorong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `no_telepon`, `id_provinsi`, `id_kota`, `alamat`, `tanggal_lahir`, `usia`, `img`) VALUES
(1, '11762543331418', 'Usep Sunandar', '08777655431', 15, 97, 'Jl Sumur Lega', '2001-02-02', 20, '20200329095328_Photo-Picture_Usep Sunandar.jpg'),
(3, '19992222888837465', 'Ahmad Lorem Sudjana', '087765514213', 13, 202, 'Jl Pegangsaan Timur no 34 Rt 33 Rw 12 Kec.Londok Kell.Lahirman Kabupaten Kudus ', '1991-09-22', 30, '20200401102704_Photo-Picture_Ahmad Lorem Sudjanajpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `id_bagian`, `no_telepon`, `id_provinsi`, `id_kota`, `alamat`, `tanggal_lahir`, `usia`, `img`) VALUES
(2, 'Bima Pria Aditya', 179, '087878182791', 12, 179, 'Jl Gagak No.34', '2001-11-02', 18, 'bima.png'),
(3, 'Caldin Masyuri Tanchi', 2, '09877615341', 5, 9, 'Jl Kepanjangan', '2002-10-04', 18, '20200412065253Photo_Picture_Caldin Masyuri Tanchi.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'Aceh'),
(2, 'Sumatra Utara'),
(3, 'Sumatra Barat'),
(4, 'Riau'),
(5, 'Jambi'),
(6, 'Sumatra Selatan'),
(7, 'Bengkulu'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'Daerah Khusus Ibukota Jakarta'),
(12, 'Jawa Barat'),
(13, 'Jawa Tengah'),
(14, 'Daerah Istimewa Yogyakarta'),
(15, 'Jawa Timur'),
(16, 'Banten'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Tengah'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tenggara'),
(29, 'Gorontalo'),
(30, 'Sulawesi Barat'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `id_masyarakat` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `id_masyarakat`, `id_petugas`) VALUES
(1, 'bpabima@gmail.com', 'lorem123', 2, NULL, 2),
(2, 'user@user.com', 'user123', 1, 1, NULL),
(3, 'lorem@lorem.com', 'lorem123', 1, 3, NULL),
(4, 'admin@admin.com', 'admin123', 3, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indeks untuk tabel `aduan_dislike`
--
ALTER TABLE `aduan_dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_aduan` (`id_aduan`);

--
-- Indeks untuk tabel `aduan_like`
--
ALTER TABLE `aduan_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_aduan` (`id_aduan`);

--
-- Indeks untuk tabel `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indeks untuk tabel `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `aduan_dislike`
--
ALTER TABLE `aduan_dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aduan_like`
--
ALTER TABLE `aduan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `aduan_ibfk_3` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `aduan_ibfk_4` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `aduan_ibfk_5` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `aduan_ibfk_6` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`);

--
-- Ketidakleluasaan untuk tabel `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  ADD CONSTRAINT `aduan_masyarakat_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`),
  ADD CONSTRAINT `aduan_masyarakat_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`);

--
-- Ketidakleluasaan untuk tabel `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  ADD CONSTRAINT `aduan_petugas_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`),
  ADD CONSTRAINT `aduan_petugas_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Ketidakleluasaan untuk tabel `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  ADD CONSTRAINT `aduan_tanggapan_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`);

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `masyarakat_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`),
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `petugas_ibfk_3` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
