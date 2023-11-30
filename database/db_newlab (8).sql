-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 30 Nov 2023 pada 06.15
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_newlab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cluster`
--

CREATE TABLE `tbl_cluster` (
  `cluster_id` int(11) NOT NULL,
  `cluster_name` varchar(128) NOT NULL,
  `cluster_cover` varchar(128) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cluster`
--

INSERT INTO `tbl_cluster` (`cluster_id`, `cluster_name`, `cluster_cover`, `createtime`) VALUES
(3, 'Badminton Court', 'cluster-3-20231031172521.jpg', '2023-10-31 09:25:21'),
(4, 'Indoor Gym', 'cluster-4-20231031173103.jpg', '2023-10-31 09:31:03'),
(5, 'Swimming Pool', 'cluster-5-20231031172854.jpg', '2023-10-31 09:28:54'),
(7, 'Tennis Court', 'cluster-7-20231031172825.jpeg', '2023-10-31 09:28:25'),
(8, 'Basket Ball Court', 'cluster-8-20231030121258.jpg', '2023-10-30 04:12:58'),
(9, 'Jogging Track', 'cluster-20231030121505.jpg', '2023-10-30 05:15:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_consult_question`
--

CREATE TABLE `tbl_consult_question` (
  `consult_question_id` int(11) NOT NULL,
  `consult_question_text` text NOT NULL,
  `consult_question_type` varchar(100) NOT NULL,
  `consult_question_multi` varchar(100) NOT NULL DEFAULT 'N',
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_consult_question`
--

INSERT INTO `tbl_consult_question` (`consult_question_id`, `consult_question_text`, `consult_question_type`, `consult_question_multi`, `updatetime`, `createtime`) VALUES
(1, 'Fullname', 'text', 'N', '2023-11-24 15:04:55', '2023-11-24 15:04:55'),
(2, 'Gender', 'radio', 'N', '2023-11-28 09:28:26', '2023-11-24 15:34:07'),
(3, 'Activity Category', 'radio', 'N', '2023-11-28 09:28:36', '2023-11-24 15:34:54'),
(4, 'Choose Your Problem', 'dropdown', 'N', '2023-11-24 15:35:18', '2023-11-24 15:35:18'),
(5, 'Specific Problem', 'textarea', 'N', '2023-11-28 10:02:18', '2023-11-24 15:35:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_consult_q_option`
--

CREATE TABLE `tbl_consult_q_option` (
  `consult_q_option_id` int(11) NOT NULL,
  `consult_q_option_text` text NOT NULL,
  `consult_question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_consult_q_option`
--

INSERT INTO `tbl_consult_q_option` (`consult_q_option_id`, `consult_q_option_text`, `consult_question_id`) VALUES
(1, 'Man', 2),
(2, 'Woman', 2),
(3, 'Indoor', 3),
(4, 'Outdoor', 3),
(5, 'Body', 4),
(6, 'Skin', 4),
(7, 'Teeth', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_consult_response`
--

CREATE TABLE `tbl_consult_response` (
  `consult_response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `consult_response_text` text NOT NULL,
  `updatetime` datetime NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_consult_response`
--

INSERT INTO `tbl_consult_response` (`consult_response_id`, `user_id`, `consult_response_text`, `updatetime`, `createtime`) VALUES
(2, 11, 'a:5:{i:0;a:2:{s:1:\"q\";s:9:\"Fullname \";s:1:\"r\";s:3:\"asd\";}i:1;a:2:{s:1:\"q\";s:7:\"Gender \";s:1:\"r\";s:9:\"Laki-laki\";}i:2;a:2:{s:1:\"q\";s:18:\"Activity Category \";s:1:\"r\";s:6:\"Indoor\";}i:3;a:2:{s:1:\"q\";s:20:\"Choose Your Problem \";s:1:\"r\";s:4:\"Body\";}i:4;a:2:{s:1:\"q\";s:17:\"Specific Problem \";s:1:\"r\";s:3:\"das\";}}', '2023-11-28 10:18:01', '2023-11-28 10:18:01'),
(3, 11, 'a:5:{i:0;a:2:{s:1:\"q\";s:9:\"Fullname \";s:1:\"r\";s:4:\"abcd\";}i:1;a:2:{s:1:\"q\";s:7:\"Gender \";s:1:\"r\";s:3:\"Man\";}i:2;a:2:{s:1:\"q\";s:18:\"Activity Category \";s:1:\"r\";s:6:\"Indoor\";}i:3;a:2:{s:1:\"q\";s:20:\"Choose Your Problem \";s:1:\"r\";s:4:\"Body\";}i:4;a:2:{s:1:\"q\";s:17:\"Specific Problem \";s:1:\"r\";s:5:\"asasa\";}}', '2023-11-30 14:14:23', '2023-11-30 14:14:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_question`, `faq_answer`, `createtime`) VALUES
(1, 'jelaskan tentang Website puskesmas mekar', 'Website puskesmas mekar dan e-medicord  ini dibuat oleh Muh. Fadjrul Falakh sebagai implementasi dari keilmuan yang dimiliki untuk sebagai syarat kelulusan Sarjana Teknik Informatika di Universitas Halu Oleo, Fakultas Teknik, Jurusan Teknik Informatika.', '2022-11-30 02:23:27'),
(3, 'DImana Lokasi Puskesmas Mekar', 'Jl. Laremba, Kadia Komp. RCTI Kadia', '2022-12-11 03:49:09'),
(4, 'Apa itu e-medicord', 'e-medicord merupakan aplikasi rekam medis elektronik untuk  menyimpan data-data rekam medis pasien puskesmas mekar', '2022-12-11 03:50:48'),
(5, 'Apakah e-medicord aman', 'e-medicord dilengkapi dengan enkripsi database sehingga dapat menambah keamanan data-data rekam medis pasien', '2022-12-14 19:00:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(24) NOT NULL,
  `gallery_name` varchar(128) NOT NULL,
  `gallery_image` varchar(128) NOT NULL,
  `gallery_description` text NOT NULL,
  `unit_id` int(24) NOT NULL,
  `gallery_category_id` int(24) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_image`, `gallery_description`, `unit_id`, `gallery_category_id`, `createtime`) VALUES
(1, 'Living Room Deluxe', 'lush.png', 'tes', 1, 3, '2023-10-21 07:12:41'),
(2, 'roomss', 'gallery-1-20231021132254.jpg', 'master room with 3x4 meters', 1, 2, '2023-10-21 05:22:54'),
(4, 'Alca Room', 'gallery-7-20231021124612.jpg', 'tes', 1, 2, '2023-10-23 19:26:37'),
(5, 'Layout Arma', 'gallery-11-20231112173701.jpg', '', 11, 4, '2023-11-12 09:37:01'),
(9, 'Walk in Closet Master Bedroom', 'gallery-11-20231112172130.jpg', '', 11, 3, '2023-11-12 09:21:30'),
(10, 'Master Bedroom', 'gallery-11-20231112171650.jpg', '', 11, 2, '2023-11-12 09:16:50'),
(12, 'Bedroom', 'gallery-11-20231112170555.jpg', '', 11, 3, '2023-11-12 09:05:55'),
(20, 'Layout Rumah', 'gallery-9-20231112233336.jpg', '', 9, 4, '2023-11-12 15:33:36'),
(26, 'Tampak Depan Rumah', 'gallery-9-20231112233306.jpg', 'Tampak Depan Tipe Alca', 9, 4, '2023-11-12 15:33:06'),
(27, 'Living Room, High Ceiling', 'gallery-9-20231112234249.jpg', 'Living Room High Ceiling Tipe Alca, Gramercy by Alam Sutera', 9, 1, '2023-11-12 15:42:49'),
(28, 'Garden', 'gallery-9-20231112234348.jpg', 'Garden Alca, Gramercy by Alam Sutera', 9, 1, '2023-11-12 15:43:48'),
(29, 'Wardrobe Master Bedroom', 'gallery-9-20231109210039.jpg', 'Wardrobe / Walk In Closet in Master Bedroom Alca, Gramercy by Alam Sutera', 9, 2, '2023-11-09 14:00:39'),
(30, 'Dining Room', 'gallery-9-20231112234448.jpg', 'Dining and Living Room Alca, Gramercy', 9, 1, '2023-11-12 15:44:48'),
(31, 'Master Bedroom ( Progress )', 'gallery-9-20231112233117.jpg', 'Master Bedroom Alca, Gramercy', 9, 2, '2023-11-12 15:31:17'),
(32, 'Living Room', 'gallery-10-20231109221505.jpg', 'Living Room Aera, High Ceiling', 10, 1, '2023-11-09 14:15:05'),
(33, 'Living Room Lantai 2', 'gallery-10-20231109224327.jpg', 'Living Room Lantai 2 Aera, Gramercy', 10, 1, '2023-11-09 15:43:27'),
(34, 'Master Bedroom Aera', 'gallery-10-20231109225344.jpg', 'Master Bedroom with Wardrobe Aera, Gramercy', 10, 2, '2023-11-09 15:53:44'),
(35, 'Swimming Pool', 'gallery-10-20231109225616.jpg', 'Swimming Pool Aera, Gramercy', 10, 4, '2023-11-09 15:56:16'),
(36, 'Bathroom with Bathup', 'gallery-10-20231109225912.jpg', 'Bathroom with Bathup Aera, Gramercy', 10, 2, '2023-11-09 15:59:12'),
(37, 'Facade Aera', 'gallery-10-20231109231358.jpg', 'Tampak Depan Aera', 10, 4, '2023-11-09 16:13:58'),
(38, 'Wet Kitchen', 'gallery-10-20231109231734.jpg', 'Dapur Basah Aera, Gramercy', 10, 1, '2023-11-09 16:17:34'),
(39, 'Wardrobe Aera', 'gallery-10-20231109232028.jpg', 'Walk in Closet / Wardrobe Aera, Gramercy', 10, 2, '2023-11-09 16:20:28'),
(40, 'Living Room Lantai 1', 'gallery-11-20231112173754.jpg', 'Living Room Arma, Gramercy', 11, 1, '2023-11-12 09:37:54'),
(41, 'Dining Room', 'gallery-11-20231112173844.jpg', 'Dining Room, Living Room and Garden Arma', 11, 1, '2023-11-12 09:38:44'),
(42, 'Kid Bedroom', 'gallery-11-20231112173149.jpg', 'Kids Bedroom with Unique Design', 11, 3, '2023-11-12 09:31:49'),
(43, 'Swimming Pool', 'gallery-11-20231112173334.jpg', 'Swimming Pool and Garden Arma, Gramercy', 11, 4, '2023-11-12 09:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `gallery_category_id` int(24) NOT NULL,
  `gallery_category_name` varchar(128) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gallery_category`
--

INSERT INTO `tbl_gallery_category` (`gallery_category_id`, `gallery_category_name`, `createtime`) VALUES
(1, 'Living , Dining and Pantry Room', '2023-10-20 19:02:31'),
(2, 'Master Bedroom & Walk in Closet', '2023-10-20 19:02:55'),
(3, 'Walk in Closet & Second Master Bedroom', '2023-10-20 19:03:05'),
(4, 'House Plan', '2023-10-20 19:03:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `createtime`) VALUES
(1, 'Super Admin', '2021-02-02 19:26:11'),
(2, 'Administrator', '2021-02-05 14:03:49'),
(3, 'Dokter', '2023-10-21 09:11:38'),
(4, 'Pasien', '2023-11-24 18:00:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_message` varchar(200) NOT NULL,
  `log_ipaddress` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `log_time`, `log_message`, `log_ipaddress`, `user_id`, `createtime`) VALUES
(1, '2022-10-05 11:28:08', 'Administrator CoreIgniter melakukan login ke sistem', '127.0.0.1', 1, '2022-10-05 11:28:08'),
(537, '2022-11-24 00:21:57', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:21:57'),
(538, '2022-11-24 00:40:39', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:40:39'),
(539, '2022-11-24 00:42:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:42:13'),
(540, '2022-11-24 13:39:18', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 13:39:18'),
(541, '2022-11-24 18:16:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 18:16:13'),
(542, '2022-11-25 10:31:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 10:31:35'),
(543, '2022-11-25 11:20:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 11:20:35'),
(544, '2022-11-25 14:25:10', 'administrator menambah data group Pengelola Berita', '::1', 1, '2022-11-25 14:25:10'),
(545, '2022-11-25 14:33:35', 'administrator mengubah data group dengan ID =  - Pengelolah Berita', '::1', 1, '2022-11-25 14:33:35'),
(546, '2022-11-25 15:55:50', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 15:55:50'),
(547, '2022-11-25 16:03:41', 'administrator menghapus data slider dengan ID = 4 - 4', '::1', 1, '2022-11-25 16:03:41'),
(548, '2022-11-25 16:04:00', 'administrator menambah data slider dengan name = slider-20221125160400.jpg', '::1', 1, '2022-11-25 16:04:00'),
(549, '2022-11-25 17:49:21', 'administrator menambah data slider dengan name = slider-20221125174921.jpg', '::1', 1, '2022-11-25 17:49:21'),
(550, '2022-11-25 18:51:09', 'administrator menghapus data slider dengan ID = 3 - 3', '::1', 1, '2022-11-25 18:51:09'),
(551, '2022-11-25 18:51:19', 'administrator menambah data slider dengan name = slider-20221125185119.jpg', '::1', 1, '2022-11-25 18:51:19'),
(552, '2022-11-25 18:53:44', 'administrator menghapus data slider dengan ID = 2 - 2', '::1', 1, '2022-11-25 18:53:44'),
(553, '2022-11-25 18:57:54', 'administrator menghapus data slider dengan ID = 5 - 5', '::1', 1, '2022-11-25 18:57:54'),
(554, '2022-11-25 18:58:04', 'administrator menambah data slider dengan name = slider-20221125185804.jpg', '::1', 1, '2022-11-25 18:58:04'),
(555, '2022-11-25 19:01:03', 'administrator menghapus data slider dengan ID = 8 - 8', '::1', 1, '2022-11-25 19:01:03'),
(556, '2022-11-25 19:01:16', 'administrator menambah data slider dengan name = slider-20221125190115.jpg', '::1', 1, '2022-11-25 19:01:16'),
(557, '2022-11-25 19:05:45', 'administrator menghapus data slider dengan ID = 7 - 7', '::1', 1, '2022-11-25 19:05:45'),
(558, '2022-11-25 19:05:53', 'administrator menambah data slider dengan name = slider-20221125190553.jpg', '::1', 1, '2022-11-25 19:05:53'),
(559, '2022-11-25 21:47:27', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 21:47:27'),
(560, '2022-11-26 00:59:42', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-26 00:59:42'),
(561, '2022-11-26 01:47:11', 'administrator menambah data slider dengan name = slider-20221126014711.png', '::1', 1, '2022-11-26 01:47:11'),
(562, '2022-11-26 16:31:00', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-26 16:31:00'),
(563, '2022-11-27 20:44:52', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-27 20:44:52'),
(564, '2022-11-27 20:53:53', 'administrator mengubah data slider dengan ID = 11', '::1', 1, '2022-11-27 20:53:53'),
(565, '2022-11-27 20:54:03', 'administrator menghapus data slider dengan ID = 10 - 10', '::1', 1, '2022-11-27 20:54:03'),
(566, '2022-11-27 20:56:42', 'administrator mengubah data slider dengan ID = 11', '::1', 1, '2022-11-27 20:56:42'),
(567, '2022-11-27 21:14:24', 'administrator menambah data slider dengan name = slider-20221127211424.jpg', '::1', 1, '2022-11-27 21:14:24'),
(568, '2022-11-27 21:16:04', 'administrator mengubah data slider dengan ID = 12', '::1', 1, '2022-11-27 21:16:04'),
(569, '2022-11-28 11:07:22', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-28 11:07:22'),
(570, '2022-11-28 20:51:11', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-28 20:51:11'),
(571, '2022-11-28 23:43:35', 'administrator menghapus data form dengan ID = 24', '::1', 1, '2022-11-28 23:43:35'),
(572, '2022-11-28 23:53:37', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-28 23:53:37'),
(573, '2022-11-28 23:56:21', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-28 23:56:21'),
(574, '2022-11-29 00:02:17', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-29 00:02:17'),
(575, '2022-11-29 00:02:48', 'administrator menghapus data form dengan ID = 26', '::1', 1, '2022-11-29 00:02:48'),
(576, '2022-11-29 00:03:14', 'administrator menghapus data form dengan ID = 24', '::1', 1, '2022-11-29 00:03:14'),
(577, '2022-11-29 00:03:39', 'administrator menghapus data form dengan ID = 27', '::1', 1, '2022-11-29 00:03:39'),
(578, '2022-11-29 00:05:03', 'administrator menghapus data form dengan ID = 29', '::1', 1, '2022-11-29 00:05:03'),
(579, '2022-11-29 00:05:10', 'administrator menghapus data form dengan ID = 28', '::1', 1, '2022-11-29 00:05:10'),
(580, '2022-11-29 16:21:55', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:21:55'),
(581, '2022-11-29 16:30:24', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:30:24'),
(582, '2022-11-29 16:30:54', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:30:54'),
(583, '2022-11-29 23:30:25', 'administrator menambah data kategori bidang berita Apoteker', '::1', 1, '2022-11-29 23:30:25'),
(584, '2022-11-30 01:58:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 01:58:56'),
(585, '2022-11-30 02:23:27', 'administrator menambah data faq Tes', '::1', 1, '2022-11-30 02:23:27'),
(586, '2022-11-30 02:29:53', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-11-30 02:29:53'),
(587, '2022-11-30 02:34:24', 'administrator menambah data faq', '::1', 1, '2022-11-30 02:34:24'),
(588, '2022-11-30 02:52:04', 'administrator menghapus data faq dengan ID = 2', '::1', 1, '2022-11-30 02:52:04'),
(589, '2022-11-30 03:19:46', 'administrator menghapus data message dengan ID = 3 - ', '::1', 1, '2022-11-30 03:19:46'),
(590, '2022-11-30 05:46:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 05:46:35'),
(591, '2022-11-30 05:49:28', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 05:49:28'),
(592, '2022-11-30 10:48:58', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 10:48:58'),
(593, '2022-11-30 10:49:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 10:49:26'),
(594, '2022-11-30 13:16:04', 'administrator menghapus data link terkait dengan ID = 5 - 5', '::1', 1, '2022-11-30 13:16:04'),
(595, '2022-11-30 13:18:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 13:18:56'),
(596, '2022-11-30 13:21:49', 'administrator menambah data link terkait dengan ID = 1', '::1', 1, '2022-11-30 13:21:49'),
(597, '2022-11-30 13:26:03', 'administrator mengubah data link terkait dengan ID = 2', '::1', 1, '2022-11-30 13:26:03'),
(598, '2022-11-30 13:32:44', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:32:44'),
(599, '2022-11-30 13:32:54', 'administrator menghapus data link terkait dengan ID = 4 - 4', '::1', 1, '2022-11-30 13:32:54'),
(600, '2022-11-30 13:40:38', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:40:38'),
(601, '2022-11-30 13:44:08', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:44:08'),
(602, '2022-11-30 15:31:46', 'administrator menambah data dokter dengan nama = drg. Anggi', '::1', 1, '2022-11-30 15:31:46'),
(603, '2022-11-30 15:35:08', 'administrator menghapus data dokter dengan nama = ', '::1', 1, '2022-11-30 15:35:08'),
(604, '2022-11-30 15:38:12', 'administrator menambah data dokter dengan nama = drg. Anggi', '::1', 1, '2022-11-30 15:38:12'),
(605, '2022-11-30 16:07:15', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 16:07:15'),
(606, '2022-11-30 16:14:40', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 16:14:40'),
(607, '2022-11-30 18:47:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 18:47:35'),
(608, '2022-11-30 18:53:02', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 18:53:02'),
(609, '2022-11-30 18:56:31', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 18:56:31'),
(610, '2022-11-30 19:13:54', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 19:13:54'),
(611, '2022-11-30 19:54:08', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 19:54:08'),
(612, '2022-11-30 21:07:43', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 21:07:43'),
(613, '2022-11-30 21:21:05', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 21:21:05'),
(614, '2022-12-02 13:17:52', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-02 13:17:52'),
(615, '2022-12-03 13:17:19', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-03 13:17:19'),
(616, '2022-12-04 17:30:44', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-04 17:30:44'),
(617, '2022-12-04 22:27:40', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-04 22:27:40'),
(618, '2022-12-05 11:42:40', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-05 11:42:40'),
(619, '2022-12-06 16:12:09', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-06 16:12:09'),
(620, '2022-12-06 20:39:43', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-06 20:39:43'),
(621, '2022-12-08 14:28:16', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 14:28:16'),
(622, '2022-12-08 14:51:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 14:51:26'),
(623, '2022-12-08 21:47:19', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 21:47:19'),
(624, '2022-12-08 21:49:10', 'Muh. Fadjrul Falakh menambah data pasien : Ina amalia', '::1', 1, '2022-12-08 21:49:10'),
(625, '2022-12-08 22:08:29', 'Muh. Fadjrul Falakh menambah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:08:29'),
(626, '2022-12-08 22:13:13', 'Muh. Fadjrul Falakh mengubah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:13:13'),
(627, '2022-12-08 22:16:41', 'Muh. Fadjrul Falakh menambah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:16:41'),
(628, '2022-12-09 01:56:27', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-09 01:56:27'),
(629, '2022-12-09 16:20:45', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-09 16:20:45'),
(630, '2022-12-09 17:07:11', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-09 17:07:11'),
(631, '2022-12-09 17:39:07', 'Muh. Fadjrul Falakh menghapus data rekam medis riwayat kunjungan pasien dengan ID : 2 - ', '::1', 1, '2022-12-09 17:39:07'),
(632, '2022-12-10 17:07:02', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-10 17:07:02'),
(633, '2022-12-10 20:35:28', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama :  - Suarni s', '::1', 1, '2022-12-10 20:35:28'),
(634, '2022-12-10 20:45:47', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama :  - Suarni yA', '::1', 1, '2022-12-10 20:45:47'),
(635, '2022-12-10 20:51:57', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli UmumS', '::1', 1, '2022-12-10 20:51:57'),
(636, '2022-12-10 20:53:36', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:53:36'),
(637, '2022-12-10 20:54:48', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:54:48'),
(638, '2022-12-10 20:55:23', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:55:23'),
(639, '2022-12-10 20:56:42', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli UmumXX', '::1', 1, '2022-12-10 20:56:42'),
(640, '2022-12-10 21:02:35', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Anaks', '::1', 1, '2022-12-10 21:02:35'),
(641, '2022-12-10 21:03:01', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-12-10 21:03:01'),
(642, '2022-12-10 21:04:56', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-12-10 21:04:56'),
(643, '2022-12-10 21:16:19', 'administrator mengubah data group dengan ID =  - Pengelolah Konten & Berita', '::1', 1, '2022-12-10 21:16:19'),
(644, '2022-12-10 21:18:19', 'administrator mengubah data group dengan ID = 6 - Pengelolah Berita', '::1', 1, '2022-12-10 21:18:19'),
(645, '2022-12-10 21:22:25', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama : 1 - Poli Umums', '::1', 1, '2022-12-10 21:22:25'),
(646, '2022-12-10 21:22:37', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama : 1 - Poli Umum', '::1', 1, '2022-12-10 21:22:37'),
(647, '2022-12-10 21:23:12', 'administrator mengubah data link terkait dengan ID = 1', '::1', 1, '2022-12-10 21:23:12'),
(648, '2022-12-10 21:23:25', 'administrator mengubah data link terkait dengan ID = 1', '::1', 1, '2022-12-10 21:23:25'),
(649, '2022-12-10 21:24:55', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:24:55'),
(650, '2022-12-10 21:25:06', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:25:06'),
(651, '2022-12-10 21:26:37', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:26:37'),
(652, '2022-12-10 21:29:55', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - Poli Gigi', '::1', 1, '2022-12-10 21:29:55'),
(653, '2022-12-10 21:31:12', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - Poli KIA', '::1', 1, '2022-12-10 21:31:12'),
(654, '2022-12-10 21:31:51', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - ss', '::1', 1, '2022-12-10 21:31:51'),
(655, '2022-12-10 21:32:01', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - aa', '::1', 1, '2022-12-10 21:32:01'),
(656, '2022-12-10 21:32:34', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - cc', '::1', 1, '2022-12-10 21:32:34'),
(657, '2022-12-10 21:32:44', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - dd', '::1', 1, '2022-12-10 21:32:44'),
(658, '2022-12-10 21:32:52', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - ff', '::1', 1, '2022-12-10 21:32:52'),
(659, '2022-12-10 21:33:08', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - jj', '::1', 1, '2022-12-10 21:33:08'),
(660, '2022-12-10 21:33:16', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - uu', '::1', 1, '2022-12-10 21:33:16'),
(661, '2022-12-10 21:33:43', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - qq', '::1', 1, '2022-12-10 21:33:43'),
(662, '2022-12-10 21:57:26', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - rr', '::1', 1, '2022-12-10 21:57:26'),
(663, '2022-12-11 00:26:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 00:26:34'),
(664, '2022-12-11 01:06:32', 'Muh. Fadjrul Falakh menghapus data pegawai dengan ID : 1', '::1', 1, '2022-12-11 01:06:32'),
(665, '2022-12-11 01:06:57', 'Muh. Fadjrul Falakh menambah data pegawai dengan ID - nama :  - Naruto', '::1', 1, '2022-12-11 01:06:57'),
(666, '2022-12-11 03:17:34', 'Muh. Fadjrul Falakh menambah data dokter dengan ID - nama :  - dr. Kane', '::1', 1, '2022-12-11 03:17:34'),
(667, '2022-12-11 03:19:44', 'Muh. Fadjrul Falakh menambah data dokter dengan ID - nama :  - dr. John', '::1', 1, '2022-12-11 03:19:44'),
(668, '2022-12-11 03:24:08', 'Muh. Fadjrul Falakh menghapus data dokter dengan nama = 7', '::1', 1, '2022-12-11 03:24:08'),
(669, '2022-12-11 03:25:06', 'Muh. Fadjrul Falakh menghapus data dokter dengan ID : 6', '::1', 1, '2022-12-11 03:25:06'),
(670, '2022-12-11 03:34:55', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 11', '::1', 1, '2022-12-11 03:34:55'),
(671, '2022-12-11 03:35:03', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 12', '::1', 1, '2022-12-11 03:35:03'),
(672, '2022-12-11 03:35:15', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 13', '::1', 1, '2022-12-11 03:35:15'),
(673, '2022-12-11 03:35:23', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 10', '::1', 1, '2022-12-11 03:35:23'),
(674, '2022-12-11 03:35:27', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 9', '::1', 1, '2022-12-11 03:35:27'),
(675, '2022-12-11 03:35:31', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 8', '::1', 1, '2022-12-11 03:35:31'),
(676, '2022-12-11 03:35:34', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 7', '::1', 1, '2022-12-11 03:35:34'),
(677, '2022-12-11 03:35:38', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 6', '::1', 1, '2022-12-11 03:35:38'),
(678, '2022-12-11 03:49:09', 'Muh. Fadjrul Falakh menambah data faq dengan ID : ', '::1', 1, '2022-12-11 03:49:09'),
(679, '2022-12-11 03:50:48', 'Muh. Fadjrul Falakh menambah data faq dengan pertanyaan : qqq', '::1', 1, '2022-12-11 03:50:48'),
(680, '2022-12-11 15:04:20', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 15:04:20'),
(681, '2022-12-11 21:17:46', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 21:17:46'),
(682, '2022-12-12 00:05:38', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Hj. Hadijah, SKM., M.Kes.', '::1', 1, '2022-12-12 00:05:38'),
(683, '2022-12-12 00:07:09', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Hayum Nartin', '::1', 1, '2022-12-12 00:07:09'),
(684, '2022-12-12 00:08:11', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:08:11'),
(685, '2022-12-12 00:10:49', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Evyanti Muas Saputri, SKM', '::1', 1, '2022-12-12 00:10:49'),
(686, '2022-12-12 00:12:28', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Riny Andriani, SKM., M.Kes.', '::1', 1, '2022-12-12 00:12:28'),
(687, '2022-12-12 00:13:38', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:13:38'),
(688, '2022-12-12 00:14:47', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Fitri Erningtyas', '::1', 1, '2022-12-12 00:14:47'),
(689, '2022-12-12 00:16:21', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 00:16:21'),
(690, '2022-12-12 00:17:50', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 00:17:50'),
(691, '2022-12-12 00:19:33', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Dewi Sultriana, S.ST.', '::1', 1, '2022-12-12 00:19:33'),
(692, '2022-12-12 00:20:29', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Sapriani Iskandar', '::1', 1, '2022-12-12 00:20:29'),
(693, '2022-12-12 00:21:18', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Fauziah Ibrahim', '::1', 1, '2022-12-12 00:21:18'),
(694, '2022-12-12 00:22:15', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Amra Nur, S.Si., A.pt.', '::1', 1, '2022-12-12 00:22:15'),
(695, '2022-12-12 00:23:16', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Sartina, S.Kep.', '::1', 1, '2022-12-12 00:23:16'),
(696, '2022-12-12 00:24:08', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Yuni Asna, S.Tr.Keb.', '::1', 1, '2022-12-12 00:24:08'),
(697, '2022-12-12 00:25:07', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Alang, AMAK', '::1', 1, '2022-12-12 00:25:07'),
(698, '2022-12-12 00:25:44', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Ashmaria, S.ST.', '::1', 1, '2022-12-12 00:25:44'),
(699, '2022-12-12 00:26:51', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Riny Andriani, SKM., M.Kes.', '::1', 1, '2022-12-12 00:26:51'),
(700, '2022-12-12 00:27:34', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Asriani L, S.Kep.', '::1', 1, '2022-12-12 00:27:34'),
(701, '2022-12-12 00:28:17', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:28:17'),
(702, '2022-12-12 00:29:27', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:29:27'),
(703, '2022-12-12 00:30:01', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:30:01'),
(704, '2022-12-12 00:30:30', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Nursamtria', '::1', 1, '2022-12-12 00:30:30'),
(705, '2022-12-12 00:31:23', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Martha Dwi F, Am.Keb.', '::1', 1, '2022-12-12 00:31:23'),
(706, '2022-12-12 00:32:17', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Yulianti Sahirun, SKM.', '::1', 1, '2022-12-12 00:32:17'),
(707, '2022-12-12 00:32:57', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Hasriati, AMG', '::1', 1, '2022-12-12 00:32:57'),
(708, '2022-12-12 00:33:29', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:33:29'),
(709, '2022-12-12 00:34:13', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rapda Sebplin, SKM.', '::1', 1, '2022-12-12 00:34:13'),
(710, '2022-12-12 00:35:18', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:35:18'),
(711, '2022-12-12 00:36:27', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Elis Yuliani', '::1', 1, '2022-12-12 00:36:27'),
(712, '2022-12-12 00:37:10', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:37:10'),
(713, '2022-12-12 00:37:50', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Siti Indariani, AMK', '::1', 1, '2022-12-12 00:37:50'),
(714, '2022-12-12 00:38:16', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:38:16'),
(715, '2022-12-12 00:39:02', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Ratih Astika, SKM.', '::1', 1, '2022-12-12 00:39:02'),
(716, '2022-12-12 00:39:41', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Harmin, S.Kep.', '::1', 1, '2022-12-12 00:39:41'),
(717, '2022-12-12 00:40:31', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Siti Indariani, AMK', '::1', 1, '2022-12-12 00:40:31'),
(718, '2022-12-12 00:42:23', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : drg. Tri Rahayu', '::1', 1, '2022-12-12 00:42:23'),
(719, '2022-12-12 00:44:09', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Diawati Dahian, S.Farm.', '::1', 1, '2022-12-12 00:44:09'),
(720, '2022-12-12 00:45:17', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Risky Lestari, S.Keb.', '::1', 1, '2022-12-12 00:45:17'),
(721, '2022-12-12 00:46:46', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Waode Risnawati, S.Kep., Ns.', '::1', 1, '2022-12-12 00:46:46'),
(722, '2022-12-12 00:48:21', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Mirnawati, AMF', '::1', 1, '2022-12-12 00:48:21'),
(723, '2022-12-12 00:49:03', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Lismaya Safitri, AMF', '::1', 1, '2022-12-12 00:49:03'),
(724, '2022-12-12 00:49:56', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rasdiana Rauf, AMK', '::1', 1, '2022-12-12 00:49:56'),
(725, '2022-12-12 00:50:48', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Atiyah Usman, AMK', '::1', 1, '2022-12-12 00:50:48'),
(726, '2022-12-12 00:51:38', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Sarina, AMK', '::1', 1, '2022-12-12 00:51:38'),
(727, '2022-12-12 00:52:52', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Renny Kasy, AMK', '::1', 1, '2022-12-12 00:52:52'),
(728, '2022-12-12 01:16:16', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:16:16'),
(729, '2022-12-12 01:18:03', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 01:18:03'),
(730, '2022-12-12 01:21:18', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : dr.  Sapriani Iskandar', '::1', 1, '2022-12-12 01:21:18'),
(731, '2022-12-12 01:22:12', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 01:22:12'),
(732, '2022-12-12 01:24:27', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:24:27'),
(733, '2022-12-12 01:28:44', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:28:44'),
(734, '2022-12-12 01:31:24', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : dr. Fauziah Ibrahim', '::1', 1, '2022-12-12 01:31:24'),
(735, '2022-12-12 01:33:11', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : drg. Tri Rahayu', '::1', 1, '2022-12-12 01:33:11'),
(736, '2022-12-12 01:54:15', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 6', '::1', 1, '2022-12-12 01:54:15'),
(737, '2022-12-12 01:54:31', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 5', '::1', 1, '2022-12-12 01:54:31'),
(738, '2022-12-12 01:54:44', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 4', '::1', 1, '2022-12-12 01:54:44'),
(739, '2022-12-12 01:54:53', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 3', '::1', 1, '2022-12-12 01:54:53'),
(740, '2022-12-12 01:55:28', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 2', '::1', 1, '2022-12-12 01:55:28'),
(741, '2022-12-12 01:55:43', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 1', '::1', 1, '2022-12-12 01:55:43'),
(742, '2022-12-12 01:56:49', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - andika', '::1', 1, '2022-12-12 01:56:49'),
(743, '2022-12-12 02:05:50', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Hanif Ar-rayyan', '::1', 1, '2022-12-12 02:05:50'),
(744, '2022-12-12 02:12:29', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Selpian Arung', '::1', 1, '2022-12-12 02:12:29'),
(745, '2022-12-12 14:59:48', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-12 14:59:48'),
(746, '2022-12-12 15:47:11', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 15:47:11'),
(747, '2022-12-12 22:36:12', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 22:36:12'),
(748, '2022-12-12 23:50:45', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 23:50:45'),
(749, '2022-12-13 06:31:59', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 06:31:59'),
(750, '2022-12-13 07:42:41', 'Muh. Fadjrul Falakh mengubah data rekam medis riwayat kunjungan pasien dengan ID = 7 - 11', '::1', 1, '2022-12-13 07:42:41'),
(751, '2022-12-13 10:27:50', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram 13', '::1', 1, '2022-12-13 10:27:50'),
(752, '2022-12-13 18:23:09', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 18:23:09'),
(753, '2022-12-13 18:41:37', 'administrator menghapus data rekam medis pemeriksaan odontogram dengan ID = 2 - ', '::1', 1, '2022-12-13 18:41:37'),
(754, '2022-12-13 18:48:06', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-13 18:48:06'),
(755, '2022-12-13 21:43:12', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 21:43:12'),
(756, '2022-12-13 22:13:04', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:13:04'),
(757, '2022-12-13 22:16:36', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:16:36'),
(758, '2022-12-13 22:24:09', 'Muh. Fadjrul Falakh mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:24:09'),
(759, '2022-12-13 22:35:41', 'administrator mengubah data konten profil puskesmas dengan ID : sejarah', '::1', 1, '2022-12-13 22:35:41'),
(760, '2022-12-13 22:47:34', 'administrator mengubah data konten profil puskesmas dengan ID : visi', '::1', 1, '2022-12-13 22:47:34'),
(761, '2022-12-13 22:49:36', 'administrator mengubah data konten profil puskesmas dengan ID : tupoksi', '::1', 1, '2022-12-13 22:49:36'),
(762, '2022-12-13 22:56:08', 'administrator mengubah data konten profil puskesmas dengan ID : maklumat', '::1', 1, '2022-12-13 22:56:08'),
(763, '2022-12-13 22:56:19', 'administrator mengubah data konten profil puskesmas dengan ID : maklumat', '::1', 1, '2022-12-13 22:56:19'),
(764, '2022-12-14 00:15:26', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:15:26'),
(765, '2022-12-14 00:21:49', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:21:49'),
(766, '2022-12-14 00:24:28', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:24:28'),
(767, '2022-12-14 00:32:10', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:32:10'),
(768, '2022-12-14 00:45:29', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 9', '::1', 1, '2022-12-14 00:45:29'),
(769, '2022-12-14 00:46:53', 'administrator menghapus data slider dengan ID = 11', '::1', 1, '2022-12-14 00:46:53'),
(770, '2022-12-14 00:48:59', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:48:59'),
(771, '2022-12-14 00:50:49', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:50:49'),
(772, '2022-12-14 00:51:31', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:51:31'),
(773, '2022-12-14 00:53:21', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:53:21'),
(774, '2022-12-14 13:59:33', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 13:59:33'),
(775, '2022-12-14 14:01:59', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 14:01:59'),
(776, '2022-12-14 14:37:08', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 8', '::1', 1, '2022-12-14 14:37:08'),
(777, '2022-12-14 14:43:43', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 14:43:43'),
(778, '2022-12-14 15:00:54', 'Muh. Fadjrul Falakh menambah data galeri dengan ID - nama :  - Launching Posyandu Remaja Solagratia Mahanaim', '::1', 1, '2022-12-14 15:00:54'),
(779, '2022-12-14 15:18:23', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran XY', '::1', 1, '2022-12-14 15:18:23'),
(780, '2022-12-14 15:29:08', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran XY', '::1', 1, '2022-12-14 15:29:08'),
(781, '2022-12-14 15:58:51', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 15:58:51'),
(782, '2022-12-14 16:15:12', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 16:15:12'),
(783, '2022-12-14 16:15:46', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran Xy', '::1', 1, '2022-12-14 16:15:46'),
(784, '2022-12-14 16:21:25', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan YT 2021', '::1', 1, '2022-12-14 16:21:25'),
(785, '2022-12-14 16:23:23', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 16:23:23'),
(786, '2022-12-14 16:23:48', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan XXY 2021', '::1', 1, '2022-12-14 16:23:48'),
(787, '2022-12-14 16:28:02', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatans Y 2021', '::1', 1, '2022-12-14 16:28:02'),
(788, '2022-12-14 16:30:29', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 2 - Kegiatan UY 2021', '::1', 1, '2022-12-14 16:30:29'),
(789, '2022-12-14 16:34:09', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 9 - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 16:34:09'),
(790, '2022-12-14 16:34:29', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 4 - Pameran XX', '::1', 1, '2022-12-14 16:34:29'),
(791, '2022-12-14 16:38:03', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Minlok Lintas Sektor Kecamatan Kadia', '::1', 1, '2022-12-14 16:38:03'),
(792, '2022-12-14 16:38:29', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 4', '::1', 1, '2022-12-14 16:38:29'),
(793, '2022-12-14 16:43:15', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 1', '::1', 1, '2022-12-14 16:43:15'),
(794, '2022-12-14 16:45:13', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Launching Posyandu Remaja Solagratia Mahanaim', '::1', 1, '2022-12-14 16:45:13'),
(795, '2022-12-14 17:02:16', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 2', '::1', 1, '2022-12-14 17:02:16'),
(796, '2022-12-14 17:03:35', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Vaksin di Plasa PT. Telkom WITEL Sultra, Indonesia', '::1', 1, '2022-12-14 17:03:35'),
(797, '2022-12-14 17:07:33', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Kaji Banding dengan Puskesmas Lepo-Lepo', '::1', 1, '2022-12-14 17:07:33'),
(798, '2022-12-14 17:10:18', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea', '::1', 1, '2022-12-14 17:10:18'),
(799, '2022-12-14 17:14:00', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Sharing dengan Topik \"Nutrisi pada Ibu Hamil\"', '::1', 1, '2022-12-14 17:14:00'),
(800, '2022-12-14 17:15:44', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Verifikasi STBM Puskesmas Mekar', '::1', 1, '2022-12-14 17:15:44'),
(801, '2022-12-14 17:18:47', 'administrator mengubah data informasi dengan ID : 4', '::1', 1, '2022-12-14 17:18:47'),
(802, '2022-12-14 17:37:51', 'Muh. Fadjrul Falakh menambah data informasi : Kasus Gagal Ginjal Akut Pada Anak Meningkat, Orang Tua Diminta Waspada', '::1', 1, '2022-12-14 17:37:51'),
(803, '2022-12-14 17:37:59', 'administrator menghapus data informasi dengan ID : 4', '::1', 1, '2022-12-14 17:37:59'),
(804, '2022-12-14 17:38:06', 'administrator menghapus data informasi dengan ID : 3', '::1', 1, '2022-12-14 17:38:06'),
(805, '2022-12-14 17:38:14', 'administrator menghapus data informasi dengan ID : 2', '::1', 1, '2022-12-14 17:38:14'),
(806, '2022-12-14 17:38:17', 'administrator menghapus data informasi dengan ID : 1', '::1', 1, '2022-12-14 17:38:17'),
(807, '2022-12-14 17:43:53', 'Muh. Fadjrul Falakh menambah data informasi : Sepanjang 2022, 6 Anak di Sukabumi Meninggal Akibat HIV/AIDS', '::1', 1, '2022-12-14 17:43:53'),
(808, '2022-12-14 17:49:02', 'Muh. Fadjrul Falakh menambah data informasi : Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pemicunya  Baca artikel detikHealth, \"Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pe', '::1', 1, '2022-12-14 17:49:02'),
(809, '2022-12-14 17:51:53', 'Muh. Fadjrul Falakh menambah data informasi : Bos Bio Farma Buka-bukaan Stok Vaksin COVID-19 Jelang Akhir Tahun, Aman ?', '::1', 1, '2022-12-14 17:51:53'),
(810, '2022-12-14 17:57:26', 'Muh. Fadjrul Falakh menambah data informasi : Heboh Bjorka Bocorkan Data PeduliLindungi, Kemenkes Buka Suara', '::1', 1, '2022-12-14 17:57:26'),
(811, '2022-12-14 17:57:47', 'administrator mengubah data informasi dengan ID : 7', '::1', 1, '2022-12-14 17:57:47'),
(812, '2022-12-14 18:00:22', 'Muh. Fadjrul Falakh menambah data informasi : Kebocoran Data PeduliLindungi oleh Hacker Bjorka Dinilai Valid', '::1', 1, '2022-12-14 18:00:22'),
(813, '2022-12-14 18:46:36', 'Muh. Fadjrul Falakh menambah data informasi : Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP', '::1', 1, '2022-12-14 18:46:36'),
(814, '2022-12-14 18:49:48', 'Muh. Fadjrul Falakh menambah data informasi : 8 Obat Asam Lambung Alami yang Efektif dan Gampang Dicari', '::1', 1, '2022-12-14 18:49:48'),
(815, '2022-12-14 18:52:57', 'Muh. Fadjrul Falakh mengubah data informasi dengan ID - nama : 11 - Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP', '::1', 1, '2022-12-14 18:52:57'),
(816, '2022-12-14 18:57:58', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : DImana Lokasi Puskesmas Mekar', '::1', 1, '2022-12-14 18:57:58'),
(817, '2022-12-14 18:59:38', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : Apa itu e-medicord', '::1', 1, '2022-12-14 18:59:38'),
(818, '2022-12-14 19:00:56', 'Muh. Fadjrul Falakh menambah data faq dengan pertanyaan : Apakah e-medicord aman', '::1', 1, '2022-12-14 19:00:56'),
(819, '2022-12-14 19:05:26', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : jelaskan tentang Website puskesmas mekar', '::1', 1, '2022-12-14 19:05:26'),
(820, '2022-12-14 19:18:44', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-14 19:18:44'),
(821, '2022-12-14 22:52:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 22:52:35'),
(822, '2022-12-14 22:55:52', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 11', '::1', 1, '2022-12-14 22:55:52'),
(823, '2022-12-15 00:13:57', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 00:13:57'),
(824, '2022-12-15 06:15:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 06:15:26'),
(825, '2022-12-15 13:38:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 13:38:34'),
(826, '2022-12-15 14:19:59', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-15 14:19:59'),
(827, '2022-12-15 14:27:48', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-15 14:27:48'),
(828, '2022-12-15 22:54:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 22:54:56'),
(829, '2022-12-16 09:21:49', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-16 09:21:49'),
(830, '2022-12-16 20:45:00', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-16 20:45:00'),
(831, '2022-12-17 21:45:33', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-17 21:45:33'),
(832, '2022-12-18 16:54:16', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-18 16:54:16'),
(833, '2022-12-18 18:27:23', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:27:23'),
(834, '2022-12-18 18:29:42', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:29:42'),
(835, '2022-12-18 18:34:41', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:34:41'),
(836, '2022-12-18 18:44:44', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:44:44'),
(837, '2022-12-18 18:49:56', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:49:56'),
(838, '2022-12-18 18:59:31', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:59:31'),
(839, '2022-12-18 19:02:42', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram dengan ID pasien: 11', '::1', 1, '2022-12-18 19:02:42'),
(840, '2022-12-18 19:04:43', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 19:04:43'),
(841, '2022-12-18 20:37:12', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID RM : ', '::1', 1, '2022-12-18 20:37:12'),
(842, '2022-12-18 20:45:44', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID RM : 4', '::1', 1, '2022-12-18 20:45:44'),
(843, '2022-12-20 00:27:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-20 00:27:13'),
(844, '2022-12-20 13:16:04', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-20 13:16:04'),
(845, '2022-12-21 01:02:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 01:02:13'),
(846, '2022-12-21 01:15:00', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Dira Fadhilah', '::1', 1, '2022-12-21 01:15:00'),
(847, '2022-12-21 01:17:24', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Muh. Alhamsyah', '::1', 1, '2022-12-21 01:17:24'),
(848, '2022-12-21 01:19:56', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Eka Pratiwi', '::1', 1, '2022-12-21 01:19:56'),
(849, '2022-12-21 01:22:45', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Rosantika Kamelia', '::1', 1, '2022-12-21 01:22:45'),
(850, '2022-12-21 01:24:50', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Muh. Kemal Hayat', '::1', 1, '2022-12-21 01:24:50'),
(851, '2022-12-21 01:32:53', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:32:53'),
(852, '2022-12-21 01:36:09', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:36:09'),
(853, '2022-12-21 01:36:18', 'Muh. Fadjrul Falakh menghapus data rekam medis pengkajian awal dengan ID RM : 3', '::1', 1, '2022-12-21 01:36:18'),
(854, '2022-12-21 01:36:28', 'Muh. Fadjrul Falakh menghapus data rekam medis pengkajian awal dengan ID RM : 5', '::1', 1, '2022-12-21 01:36:28'),
(855, '2022-12-21 01:44:06', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal ID Pasien : 12', '::1', 1, '2022-12-21 01:44:06'),
(856, '2022-12-21 01:44:45', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:44:45'),
(857, '2022-12-21 01:46:28', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:46:28'),
(858, '2022-12-21 01:48:37', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : 12', '::1', 1, '2022-12-21 01:48:37'),
(859, '2022-12-21 01:53:47', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal ID Pasien : 12', '::1', 1, '2022-12-21 01:53:47'),
(860, '2022-12-21 01:55:13', 'Muh. Fadjrul Falakh mengubah data user dengan nama : Robin', '::1', 1, '2022-12-21 01:55:13'),
(861, '2022-12-21 01:55:55', 'Robin melakukan login ke sistem', '::1', 6, '2022-12-21 01:55:55'),
(862, '2022-12-21 01:59:44', 'Gian Ainur melakukan login ke sistem', '::1', 7, '2022-12-21 01:59:44'),
(863, '2022-12-21 02:00:14', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 02:00:14'),
(864, '2022-12-21 02:06:16', 'Robin melakukan login ke sistem', '::1', 6, '2022-12-21 02:06:16'),
(865, '2022-12-21 02:08:56', 'Gian Ainur melakukan login ke sistem', '::1', 7, '2022-12-21 02:08:56'),
(866, '2022-12-21 14:06:01', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 14:06:01'),
(867, '2022-12-21 14:08:38', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Fadjrul', '::1', 1, '2022-12-21 14:08:38'),
(868, '2022-12-21 14:12:19', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal ID Pasien : 20', '::1', 1, '2022-12-21 14:12:19'),
(869, '2022-12-22 00:45:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-22 00:45:34'),
(870, '2022-12-22 01:30:44', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - jsnjsncsl', '::1', 1, '2022-12-22 01:30:44'),
(871, '2023-10-18 21:53:52', 'Christian R. melakukan login ke sistem', '::1', 1, '2023-10-18 21:53:52'),
(872, '2023-10-18 21:55:47', 'Christian R. mengubah data Profile : administrator', '::1', 1, '2023-10-18 21:55:47'),
(873, '2023-10-19 03:34:51', 'Christian R. melakukan login ke sistem', '::1', 1, '2023-10-19 03:34:51'),
(874, '2023-10-19 04:16:10', 'Christian R. melakukan login ke sistem', '::1', 1, '2023-10-19 04:16:10'),
(875, '2023-10-19 09:19:37', 'Christian R. melakukan login ke sistem', '::1', 3, '2023-10-19 09:19:37'),
(876, '2023-10-20 21:08:52', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-20 21:08:52'),
(877, '2023-10-21 00:51:19', 'Portal Studio menambah data unit dengan ID - nama :  - Alca', '::1', 1, '2023-10-21 00:51:19'),
(878, '2023-10-21 00:53:23', 'Portal Studio menambah data unit dengan ID - nama :  - Alca', '::1', 1, '2023-10-21 00:53:23'),
(879, '2023-10-21 00:58:31', 'Portal Studio menambah data unit dengan ID - nama :  - sdsd', '::1', 1, '2023-10-21 00:58:31'),
(880, '2023-10-21 00:59:44', 'Portal Studio menambah data unit dengan ID - nama :  - sdsdsd', '::1', 1, '2023-10-21 00:59:44'),
(881, '2023-10-21 01:01:19', 'Portal Studio menambah data unit dengan ID - nama :  - Alca', '::1', 1, '2023-10-21 01:01:19'),
(882, '2023-10-21 01:19:34', 'Portal Studio menambah data unit dengan ID - nama :  - Alca', '::1', 1, '2023-10-21 01:19:34'),
(883, '2023-10-21 01:53:32', 'Portal Studio mengubah data unit :  - Alcas', '::1', 1, '2023-10-21 01:53:32'),
(884, '2023-10-21 02:08:00', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:08:00'),
(885, '2023-10-21 02:08:09', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:08:09'),
(886, '2023-10-21 02:09:40', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:09:40'),
(887, '2023-10-21 02:11:25', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:11:25'),
(888, '2023-10-21 02:13:31', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:13:31'),
(889, '2023-10-21 02:14:24', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:14:24'),
(890, '2023-10-21 02:15:52', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:15:52'),
(891, '2023-10-21 02:20:21', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:20:21'),
(892, '2023-10-21 02:20:36', 'Portal Studio mengubah data unit : 7 - Alcas', '::1', 1, '2023-10-21 02:20:36'),
(893, '2023-10-21 11:09:04', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-21 11:09:04'),
(894, '2023-10-21 12:25:46', 'Portal Studio menambah data unit  gallery dengan ID - nama :  - room', '::1', 1, '2023-10-21 12:25:46'),
(895, '2023-10-21 12:27:44', 'Portal Studio menambah data unit  gallery dengan ID - nama :  - room 2', '::1', 1, '2023-10-21 12:27:44'),
(896, '2023-10-21 12:46:12', 'Portal Studio menambah data unit  gallery dengan ID - nama :  - Alca Room', '::1', 1, '2023-10-21 12:46:12'),
(897, '2023-10-21 13:08:24', 'Portal Studio menghapus data gallery dengan ID : 4', '::1', 1, '2023-10-21 13:08:24'),
(898, '2023-10-21 13:09:25', 'Portal Studio menghapus data gallery dengan ID : 3', '::1', 1, '2023-10-21 13:09:25'),
(899, '2023-10-21 13:12:18', 'Portal Studio menghapus data gallery dengan ID : 3', '::1', 1, '2023-10-21 13:12:18'),
(900, '2023-10-21 13:19:30', 'Portal Studio mengubah data gallery unit :  - ', '::1', 1, '2023-10-21 13:19:30'),
(901, '2023-10-21 13:21:14', 'Portal Studio mengubah data gallery unit :  - ', '::1', 1, '2023-10-21 13:21:14'),
(902, '2023-10-21 13:21:34', 'Portal Studio mengubah data gallery unit :  - ', '::1', 1, '2023-10-21 13:21:34'),
(903, '2023-10-21 13:22:31', 'Portal Studio mengubah data gallery unit : roomss', '::1', 1, '2023-10-21 13:22:31'),
(904, '2023-10-21 13:22:39', 'Portal Studio mengubah data gallery unit : roomss', '::1', 1, '2023-10-21 13:22:39'),
(905, '2023-10-21 13:22:54', 'Portal Studio mengubah data gallery unit : roomss', '::1', 1, '2023-10-21 13:22:54'),
(906, '2023-10-21 13:31:16', 'administrator menghapus data informasi dengan ID : 12', '::1', 1, '2023-10-21 13:31:16'),
(907, '2023-10-21 15:12:41', 'Portal Studio mengubah data gallery unit : Living Room Deluxe', '::1', 1, '2023-10-21 15:12:41'),
(908, '2023-10-21 16:05:46', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-21 16:05:46'),
(909, '2023-10-21 16:06:27', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-21 16:06:27'),
(910, '2023-10-21 16:06:55', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-21 16:06:55'),
(911, '2023-10-21 16:07:09', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-21 16:07:09'),
(912, '2023-10-21 21:40:05', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-21 21:40:05'),
(913, '2023-10-21 23:28:13', 'Super Admin menambah data cluster Gym dengan ID - nama :  - Gym', '::1', 1, '2023-10-21 23:28:13'),
(914, '2023-10-21 23:29:42', 'Super Admin mengubah data cluster : Gyms', '::1', 1, '2023-10-21 23:29:42'),
(915, '2023-10-21 23:29:51', 'Super Admin mengubah data cluster : Gyms', '::1', 1, '2023-10-21 23:29:51'),
(916, '2023-10-21 23:31:50', 'Super Admin menghapus data cluster dengan ID : 1', '::1', 1, '2023-10-21 23:31:50'),
(917, '2023-10-21 23:54:48', 'Super Admin menambah data cluster Supermarket dengan ID - nama :  - Supermarket', '::1', 1, '2023-10-21 23:54:48'),
(918, '2023-10-22 14:06:42', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-22 14:06:42'),
(919, '2023-10-22 14:31:58', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-22 14:31:58'),
(920, '2023-10-22 14:42:06', 'Portal Studio menambah data optical Binus ASO dengan ID - nama :  - Binus ASO', '::1', 1, '2023-10-22 14:42:06'),
(921, '2023-10-22 14:47:20', 'Portal Studio mengubah data tempat : Binus ASO', '::1', 1, '2023-10-22 14:47:20'),
(922, '2023-10-22 14:47:41', 'Portal Studio mengubah data tempat : Binus ASO', '::1', 1, '2023-10-22 14:47:41'),
(923, '2023-10-22 14:48:36', 'Portal Studio menghapus data tempat dengan ID : 1', '::1', 1, '2023-10-22 14:48:36'),
(924, '2023-10-22 14:48:52', 'Portal Studio menghapus data cluster dengan ID : 2', '::1', 1, '2023-10-22 14:48:52');
INSERT INTO `tbl_log` (`log_id`, `log_time`, `log_message`, `log_ipaddress`, `user_id`, `createtime`) VALUES
(925, '2023-10-22 15:55:04', 'Portal Studio menambah data project dengan nama : Prestigious Pavilion', '::1', 1, '2023-10-22 15:55:04'),
(926, '2023-10-22 20:52:47', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-22 20:52:47'),
(927, '2023-10-23 01:21:34', 'Portal Studio mengubah data unit : 1 - Armas', '::1', 1, '2023-10-23 01:21:34'),
(928, '2023-10-23 01:31:28', 'Portal Studio mengubah data gallery project : ', '::1', 1, '2023-10-23 01:31:28'),
(929, '2023-10-23 01:33:03', 'Portal Studio mengubah data gallery project : photo-20231023013303-9123.jpg', '::1', 1, '2023-10-23 01:33:03'),
(930, '2023-10-23 01:43:37', 'Portal Studio mengubah data gallery project : photo-20231023014337-9627.jpg', '::1', 1, '2023-10-23 01:43:37'),
(931, '2023-10-23 01:46:31', 'Portal Studio menghapus data gallery dengan ID : ', '::1', 1, '2023-10-23 01:46:31'),
(932, '2023-10-23 01:47:55', 'Portal Studio menghapus data gallery dengan ID : 1', '::1', 1, '2023-10-23 01:47:55'),
(933, '2023-10-23 02:00:48', 'Portal Studio menghapus data gallery dengan ID : 5', '::1', 1, '2023-10-23 02:00:48'),
(934, '2023-10-23 02:01:59', 'Portal Studio menghapus data gallery dengan ID : ', '::1', 1, '2023-10-23 02:01:59'),
(935, '2023-10-23 07:50:13', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-23 07:50:13'),
(936, '2023-10-23 07:54:24', 'Portal Studio mengubah data project : 2 - Prestigious Pavilions', '::1', 1, '2023-10-23 07:54:24'),
(937, '2023-10-23 07:54:39', 'Portal Studio menghapus data project dengan ID : 1', '::1', 1, '2023-10-23 07:54:39'),
(938, '2023-10-23 07:54:46', 'Portal Studio menghapus data project dengan ID : 2', '::1', 1, '2023-10-23 07:54:46'),
(939, '2023-10-23 07:57:57', 'Portal Studio mengubah data user dengan nama : contentwriter', '::1', 1, '2023-10-23 07:57:57'),
(940, '2023-10-23 08:32:46', 'Portal Studio menambah data cluster Wellness dengan ID - nama :  - Wellness', '::1', 1, '2023-10-23 08:32:46'),
(941, '2023-10-23 08:33:02', 'Portal Studio menambah data cluster Out Door GYM dengan ID - nama :  - Out Door GYM', '::1', 1, '2023-10-23 08:33:02'),
(942, '2023-10-23 08:33:15', 'Portal Studio menambah data cluster Swimming Pool dengan ID - nama :  - Swimming Pool', '::1', 1, '2023-10-23 08:33:15'),
(943, '2023-10-23 08:35:28', 'Portal Studio menambah data cluster Living World dengan ID - nama :  - Living World', '::1', 1, '2023-10-23 08:35:28'),
(944, '2023-10-23 08:35:42', 'Portal Studio mengubah data cluster : Wellness', '::1', 1, '2023-10-23 08:35:42'),
(945, '2023-10-23 08:35:52', 'Portal Studio mengubah data cluster : Swimming Pool', '::1', 1, '2023-10-23 08:35:52'),
(946, '2023-10-23 08:36:04', 'Portal Studio menambah data cluster Pasar 8 dengan ID - nama :  - Pasar 8', '::1', 1, '2023-10-23 08:36:04'),
(947, '2023-10-23 08:36:39', 'Portal Studio menambah data cluster Basket Ball Court dengan ID - nama :  - Basket Ball Court', '::1', 1, '2023-10-23 08:36:39'),
(948, '2023-10-23 12:54:40', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-23 12:54:40'),
(949, '2023-10-23 12:58:41', 'Portal Studio menambah data optical Binus ASO dengan ID - nama :  - Binus ASO', '::1', 1, '2023-10-23 12:58:41'),
(950, '2023-10-23 13:14:12', 'Portal Studio mengubah data siteplan', '::1', 1, '2023-10-23 13:14:12'),
(951, '2023-10-23 15:27:27', 'Portal Studio mengubah data unit : 1 - Arma', '::1', 1, '2023-10-23 15:27:27'),
(952, '2023-10-23 15:28:40', 'Portal Studio menambah data unit dengan ID - nama :  - Alca', '::1', 1, '2023-10-23 15:28:40'),
(953, '2023-10-23 15:31:11', 'Portal Studio menghapus data gallery dengan ID : ', '::1', 1, '2023-10-23 15:31:11'),
(954, '2023-10-23 15:31:33', 'Portal Studio menghapus data gallery dengan ID : ', '::1', 1, '2023-10-23 15:31:33'),
(955, '2023-10-23 20:58:37', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-23 20:58:37'),
(956, '2023-10-24 04:46:14', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-24 04:46:14'),
(957, '2023-10-24 04:48:38', 'Portal Studio menambah data project dengan nama : Sutera Winona', '::1', 1, '2023-10-24 04:48:38'),
(958, '2023-10-24 10:26:09', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-24 10:26:09'),
(959, '2023-10-25 13:57:04', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-25 13:57:04'),
(960, '2023-10-29 00:00:51', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-10-29 00:00:51'),
(961, '2023-10-29 01:54:42', 'Alam Sutera melakukan login ke sistem', '::1', 2, '2023-10-29 01:54:42'),
(962, '2023-10-29 02:02:34', 'Portal Studio melakukan login ke sistem', '36.83.96.175', 1, '2023-10-29 02:02:34'),
(963, '2023-10-29 02:03:46', 'Alam Sutera melakukan login ke sistem', '36.83.96.175', 2, '2023-10-29 02:03:46'),
(964, '2023-10-29 02:15:09', 'Alam Sutera menghapus data user dengan ID : 3', '36.83.96.175', 2, '2023-10-29 02:15:09'),
(965, '2023-10-29 02:15:39', 'administrator menghapus data informasi dengan ID : 5', '36.83.96.175', 2, '2023-10-29 02:15:39'),
(966, '2023-10-29 22:05:51', 'Alam Sutera melakukan login ke sistem', '103.19.109.36', 2, '2023-10-29 22:05:51'),
(967, '2023-10-29 22:38:18', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.251', 2, '2023-10-29 22:38:18'),
(968, '2023-10-29 22:46:31', 'Alam Sutera melakukan login ke sistem', '2001:448a:702e:3987:34dd:b7b:8', 2, '2023-10-29 22:46:31'),
(969, '2023-10-29 22:47:28', 'Portal Studio melakukan login ke sistem', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:47:28'),
(970, '2023-10-29 22:54:58', 'Update Informasi Aplikasi', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:54:58'),
(971, '2023-10-29 22:55:06', 'Update Informasi Aplikasi', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:55:06'),
(972, '2023-10-29 22:56:09', 'Portal Studio menambah data user dengan nama : yamin', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:56:09'),
(973, '2023-10-29 22:56:54', 'Portal Studio mengubah data siteplan', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:56:54'),
(974, '2023-10-29 22:57:00', 'Portal Studio mengubah data siteplan', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:57:00'),
(975, '2023-10-29 22:57:06', 'Portal Studio mengubah data siteplan', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:57:06'),
(976, '2023-10-29 22:57:20', 'Portal Studio mengubah data siteplan', '2001:448a:702e:3987:34dd:b7b:8', 1, '2023-10-29 22:57:20'),
(977, '2023-10-29 23:02:45', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:02:45'),
(978, '2023-10-29 23:02:52', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:02:52'),
(979, '2023-10-29 23:03:45', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:03:45'),
(980, '2023-10-29 23:05:11', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:05:11'),
(981, '2023-10-29 23:05:20', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:05:20'),
(982, '2023-10-29 23:05:30', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:05:30'),
(983, '2023-10-29 23:05:50', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:05:50'),
(984, '2023-10-29 23:12:43', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:12:43'),
(985, '2023-10-29 23:12:45', 'Update Informasi Aplikasi', '185.213.83.125', 2, '2023-10-29 23:12:45'),
(986, '2023-10-29 23:19:21', 'Alam Sutera mengubah data siteplan', '185.213.83.125', 2, '2023-10-29 23:19:21'),
(987, '2023-10-30 10:20:56', 'Alam Sutera melakukan login ke sistem', '185.213.83.41', 2, '2023-10-30 10:20:56'),
(988, '2023-10-30 10:25:35', 'Alam Sutera melakukan login ke sistem', '185.213.83.41', 2, '2023-10-30 10:25:35'),
(989, '2023-10-30 10:44:51', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:44:51'),
(990, '2023-10-30 10:44:55', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:44:55'),
(991, '2023-10-30 10:45:17', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:45:17'),
(992, '2023-10-30 10:45:30', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:45:30'),
(993, '2023-10-30 10:47:26', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:47:26'),
(994, '2023-10-30 10:50:43', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.41', 2, '2023-10-30 10:50:43'),
(995, '2023-10-30 10:55:05', 'Alam Sutera menghapus data gallery dengan ID : ', '185.213.83.41', 2, '2023-10-30 10:55:05'),
(996, '2023-10-30 10:55:30', 'Alam Sutera menghapus data gallery dengan ID : ', '185.213.83.41', 2, '2023-10-30 10:55:30'),
(997, '2023-10-30 10:55:37', 'Alam Sutera menghapus data gallery dengan ID : ', '185.213.83.41', 2, '2023-10-30 10:55:37'),
(998, '2023-10-30 10:55:42', 'Alam Sutera menghapus data gallery dengan ID : ', '185.213.83.41', 2, '2023-10-30 10:55:42'),
(999, '2023-10-30 11:03:16', 'Alam Sutera mengubah data siteplan', '185.213.83.41', 2, '2023-10-30 11:03:16'),
(1000, '2023-10-30 11:15:31', 'Alam Sutera melakukan login ke sistem', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 11:15:31'),
(1001, '2023-10-30 11:16:17', 'Alam Sutera menghapus data gallery dengan ID : ', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 11:16:17'),
(1002, '2023-10-30 11:18:22', 'Alam Sutera mengubah data siteplan', '185.213.83.182', 2, '2023-10-30 11:18:22'),
(1003, '2023-10-30 11:18:40', 'Alam Sutera menghapus data unit dengan ID : 1', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 11:18:40'),
(1004, '2023-10-30 11:26:49', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Layout Arma', '185.213.83.182', 2, '2023-10-30 11:26:49'),
(1005, '2023-10-30 11:29:01', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Living Room and Dining Room', '185.213.83.182', 2, '2023-10-30 11:29:01'),
(1006, '2023-10-30 11:29:37', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Living Room 2', '185.213.83.182', 2, '2023-10-30 11:29:37'),
(1007, '2023-10-30 11:30:03', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Living Room 1st Floor', '185.213.83.182', 2, '2023-10-30 11:30:03'),
(1008, '2023-10-30 11:30:26', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Walk in Closet Master Bedroom', '185.213.83.182', 2, '2023-10-30 11:30:26'),
(1009, '2023-10-30 11:31:20', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Master Bedroom', '185.213.83.182', 2, '2023-10-30 11:31:20'),
(1010, '2023-10-30 11:32:10', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Walk in Closet Bedroom', '185.213.83.182', 2, '2023-10-30 11:32:10'),
(1011, '2023-10-30 11:32:49', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Bedroom', '185.213.83.182', 2, '2023-10-30 11:32:49'),
(1012, '2023-10-30 11:33:58', 'Alam Sutera mengubah data unit : 10 - Aera', '185.213.83.182', 2, '2023-10-30 11:33:58'),
(1013, '2023-10-30 11:34:33', 'Alam Sutera mengubah data unit : 9 - Alca', '185.213.83.182', 2, '2023-10-30 11:34:33'),
(1014, '2023-10-30 11:36:32', 'Alam Sutera mengubah data unit : 11 - Arma', '185.213.83.182', 2, '2023-10-30 11:36:32'),
(1015, '2023-10-30 11:38:32', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Layout Rumah', '185.213.83.182', 2, '2023-10-30 11:38:32'),
(1016, '2023-10-30 11:38:47', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Bedroom', '185.213.83.182', 2, '2023-10-30 11:38:47'),
(1017, '2023-10-30 11:39:13', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Powder Room', '185.213.83.182', 2, '2023-10-30 11:39:13'),
(1018, '2023-10-30 11:39:33', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Walk in Closet', '185.213.83.182', 2, '2023-10-30 11:39:33'),
(1019, '2023-10-30 11:39:56', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Living Room', '185.213.83.182', 2, '2023-10-30 11:39:56'),
(1020, '2023-10-30 11:41:18', 'Alam Sutera mengubah data siteplan', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 11:41:18'),
(1021, '2023-10-30 11:41:56', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - High Ceiling Living Room', '185.213.83.182', 2, '2023-10-30 11:41:56'),
(1022, '2023-10-30 11:43:14', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Master  Bedroom', '185.213.83.182', 2, '2023-10-30 11:43:14'),
(1023, '2023-10-30 11:44:22', 'Alam Sutera mengubah data unit : 10 - Aera', '185.213.83.182', 2, '2023-10-30 11:44:22'),
(1024, '2023-10-30 11:45:14', 'Alam Sutera mengubah data unit : 10 - Aera', '185.213.83.182', 2, '2023-10-30 11:45:14'),
(1025, '2023-10-30 11:46:02', 'Alam Sutera mengubah data unit : 10 - Aera', '185.213.83.182', 2, '2023-10-30 11:46:02'),
(1026, '2023-10-30 11:46:23', 'Alam Sutera mengubah data unit : 10 - Aera', '185.213.83.182', 2, '2023-10-30 11:46:23'),
(1027, '2023-10-30 11:46:53', 'Alam Sutera mengubah data unit : 9 - Alca', '185.213.83.182', 2, '2023-10-30 11:46:53'),
(1028, '2023-10-30 11:47:18', 'Alam Sutera mengubah data unit : 9 - Alca', '185.213.83.182', 2, '2023-10-30 11:47:18'),
(1029, '2023-10-30 11:48:47', 'Alam Sutera mengubah data unit : 9 - Alca', '185.213.83.182', 2, '2023-10-30 11:48:47'),
(1030, '2023-10-30 11:54:34', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Layout Rumah', '185.213.83.182', 2, '2023-10-30 11:54:34'),
(1031, '2023-10-30 11:55:44', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Living Room', '103.19.109.36', 2, '2023-10-30 11:55:44'),
(1032, '2023-10-30 11:56:05', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Dining Room', '103.19.109.36', 2, '2023-10-30 11:56:05'),
(1033, '2023-10-30 11:56:23', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Walk in Closet', '103.19.109.36', 2, '2023-10-30 11:56:23'),
(1034, '2023-10-30 11:57:40', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - Master Bedroom', '103.19.109.36', 2, '2023-10-30 11:57:40'),
(1035, '2023-10-30 11:58:35', 'Alam Sutera menambah data unit  gallery dengan ID - nama :  - High Ceiling Living Room', '103.19.109.36', 2, '2023-10-30 11:58:35'),
(1036, '2023-10-30 12:04:18', 'Alam Sutera mengubah data unit : 10 - Aera', '103.19.109.36', 2, '2023-10-30 12:04:18'),
(1037, '2023-10-30 12:04:59', 'Alam Sutera mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 12:04:59'),
(1038, '2023-10-30 12:05:16', 'Alam Sutera mengubah data unit : 9 - Alca', '103.19.109.36', 2, '2023-10-30 12:05:16'),
(1039, '2023-10-30 12:05:29', 'Alam Sutera mengubah data siteplan', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 12:05:29'),
(1040, '2023-10-30 12:06:43', 'Alam Sutera menghapus data cluster dengan ID : 6', '103.19.109.36', 2, '2023-10-30 12:06:43'),
(1041, '2023-10-30 12:12:58', 'Alam Sutera mengubah data cluster : Basket Ball Court', '103.19.109.36', 2, '2023-10-30 12:12:58'),
(1042, '2023-10-30 12:13:11', 'Alam Sutera mengubah data cluster : Swimming Pool', '103.19.109.36', 2, '2023-10-30 12:13:11'),
(1043, '2023-10-30 12:13:27', 'Alam Sutera mengubah data cluster : Indoor Gym', '103.19.109.36', 2, '2023-10-30 12:13:27'),
(1044, '2023-10-30 12:13:43', 'Alam Sutera mengubah data cluster : Badminton Court', '103.19.109.36', 2, '2023-10-30 12:13:43'),
(1045, '2023-10-30 12:13:58', 'Alam Sutera mengubah data cluster : Tennis Court', '103.19.109.36', 2, '2023-10-30 12:13:58'),
(1046, '2023-10-30 12:15:05', 'Alam Sutera menambah data cluster Jogging Track dengan ID - nama :  - Jogging Track', '103.19.109.36', 2, '2023-10-30 12:15:05'),
(1047, '2023-10-30 12:19:21', 'Alam Sutera mengubah data tempat : Swiss German University', '103.19.109.36', 2, '2023-10-30 12:19:21'),
(1048, '2023-10-30 12:21:43', 'Alam Sutera mengubah data tempat : Bunda Mulia University', '103.19.109.36', 2, '2023-10-30 12:21:43'),
(1049, '2023-10-30 12:25:33', 'Alam Sutera mengubah data tempat : Binus University', '103.19.109.36', 2, '2023-10-30 12:25:33'),
(1050, '2023-10-30 12:25:53', 'Alam Sutera mengubah data tempat : Binus University', '103.19.109.36', 2, '2023-10-30 12:25:53'),
(1051, '2023-10-30 12:27:14', 'Alam Sutera menghapus data tempat dengan ID : 10', '103.19.109.36', 2, '2023-10-30 12:27:14'),
(1052, '2023-10-30 12:29:50', 'Alam Sutera mengubah data tempat : Alam Sutera Sport Lounge', '103.19.109.36', 2, '2023-10-30 12:29:50'),
(1053, '2023-10-30 12:30:35', 'Alam Sutera mengubah data tempat : Living World Mall', '103.19.109.36', 2, '2023-10-30 12:30:35'),
(1054, '2023-10-30 12:31:23', 'Alam Sutera mengubah data tempat : Alam Sutera Mall', '103.19.109.36', 2, '2023-10-30 12:31:23'),
(1055, '2023-10-30 12:32:40', 'Alam Sutera mengubah data tempat : Santa Laurensius Church', '103.19.109.36', 2, '2023-10-30 12:32:40'),
(1056, '2023-10-30 12:33:52', 'Alam Sutera mengubah data tempat : Santa Laurensia School', '103.19.109.36', 2, '2023-10-30 12:33:52'),
(1057, '2023-10-30 12:34:54', 'Alam Sutera mengubah data tempat : Kunciran Toll', '103.19.109.36', 2, '2023-10-30 12:34:54'),
(1058, '2023-10-30 12:46:18', 'Alam Sutera mengubah data project : 6 - Sutera Winona', '103.19.109.36', 2, '2023-10-30 12:46:18'),
(1059, '2023-10-30 12:47:04', 'Christian Rasandy Update Profile data : administrator', '103.19.109.36', 2, '2023-10-30 12:47:04'),
(1060, '2023-10-30 13:05:41', 'Christian Rasandy mengubah data project : 5 - Sutera Nykka', '103.19.109.36', 2, '2023-10-30 13:05:41'),
(1061, '2023-10-30 13:14:56', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 13:14:56'),
(1062, '2023-10-30 13:15:26', 'Christian Rasandy mengubah data unit : 10 - Aera', '103.19.109.36', 2, '2023-10-30 13:15:26'),
(1063, '2023-10-30 13:15:56', 'Christian Rasandy mengubah data unit : 9 - Alca', '103.19.109.36', 2, '2023-10-30 13:15:56'),
(1064, '2023-10-30 13:18:38', 'Christian Rasandy mengubah data tempat : Binus School', '103.19.109.36', 2, '2023-10-30 13:18:38'),
(1065, '2023-10-30 14:25:06', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 14:25:06'),
(1066, '2023-10-30 14:25:48', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 14:25:48'),
(1067, '2023-10-30 14:30:32', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 14:30:32'),
(1068, '2023-10-30 14:31:19', 'Christian Rasandy mengubah data tempat : Airport Toll', '103.19.109.36', 2, '2023-10-30 14:31:19'),
(1069, '2023-10-30 20:08:36', 'Christian Rasandy melakukan login ke sistem', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 20:08:36'),
(1070, '2023-10-30 20:25:28', 'administrator mengubah data konten profil puskesmas dengan ID : developer', '2001:448a:7022:2ada:e476:8b74:', 2, '2023-10-30 20:25:28'),
(1071, '2023-10-30 20:41:26', 'Christian Rasandy melakukan login ke sistem', '103.19.109.36', 2, '2023-10-30 20:41:26'),
(1072, '2023-10-30 20:57:05', 'Christian Rasandy melakukan login ke sistem', '103.19.109.36', 2, '2023-10-30 20:57:05'),
(1073, '2023-10-30 21:00:04', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 21:00:04'),
(1074, '2023-10-30 21:00:49', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 21:00:49'),
(1075, '2023-10-30 21:01:52', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 21:01:52'),
(1076, '2023-10-30 21:02:44', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 21:02:44'),
(1077, '2023-10-30 21:03:18', 'Christian Rasandy mengubah data unit : 11 - Arma', '103.19.109.36', 2, '2023-10-30 21:03:18'),
(1078, '2023-10-30 21:04:49', 'Christian Rasandy melakukan login ke sistem', '36.85.222.61', 2, '2023-10-30 21:04:49'),
(1079, '2023-10-30 21:07:49', 'Christian Rasandy mengubah data unit : 10 - Aera', '103.19.109.36', 2, '2023-10-30 21:07:49'),
(1080, '2023-10-30 21:08:49', 'Christian Rasandy mengubah data unit : 9 - Alca', '103.19.109.36', 2, '2023-10-30 21:08:49'),
(1081, '2023-10-30 21:09:59', 'administrator mengubah data konten gramercy dengan ID : privacy_policy', '180.249.173.115', 2, '2023-10-30 21:09:59'),
(1082, '2023-10-30 21:11:09', 'administrator mengubah data konten gramercy dengan ID : term_condition', '180.249.173.115', 2, '2023-10-30 21:11:09'),
(1083, '2023-10-30 21:20:41', 'Christian Rasandy mengubah data unit : 11 - Arma', '125.167.184.217', 2, '2023-10-30 21:20:41'),
(1084, '2023-10-30 21:23:03', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 21:23:03'),
(1085, '2023-10-30 21:24:29', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 21:24:29'),
(1086, '2023-10-30 21:48:04', 'administrator mengubah data konten gramercy dengan ID : privacy_policy', '103.19.109.36', 2, '2023-10-30 21:48:04'),
(1087, '2023-10-30 21:48:14', 'administrator mengubah data konten gramercy dengan ID : term_condition', '103.19.109.36', 2, '2023-10-30 21:48:14'),
(1088, '2023-10-30 21:50:06', 'Christian Rasandy melakukan login ke sistem', '103.19.109.36', 2, '2023-10-30 21:50:06'),
(1089, '2023-10-30 21:54:28', 'Christian Rasandy melakukan login ke sistem', '103.19.109.36', 2, '2023-10-30 21:54:28'),
(1090, '2023-10-30 21:55:19', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-10-30 21:55:19'),
(1091, '2023-10-30 22:54:38', 'administrator mengubah data konten gramercy dengan ID : privacy_policy', '185.213.83.177', 2, '2023-10-30 22:54:38'),
(1092, '2023-10-30 23:00:21', 'administrator mengubah data konten gramercy dengan ID : privacy_policy', '185.213.83.177', 2, '2023-10-30 23:00:21'),
(1093, '2023-10-30 23:01:13', 'administrator mengubah data konten gramercy dengan ID : term_condition', '185.213.83.177', 2, '2023-10-30 23:01:13'),
(1094, '2023-10-31 16:45:31', 'Christian Rasandy melakukan login ke sistem', '103.84.7.89', 2, '2023-10-31 16:45:31'),
(1095, '2023-10-31 17:02:07', 'administrator menghapus data kategori informasi dengan ID : 4 - ', '185.213.83.164', 2, '2023-10-31 17:02:07'),
(1096, '2023-10-31 17:02:15', 'administrator menghapus data kategori informasi dengan ID : 3 - ', '185.213.83.164', 2, '2023-10-31 17:02:15'),
(1097, '2023-10-31 17:06:15', 'Christian Rasandy mengubah data siteplan', '185.213.83.164', 2, '2023-10-31 17:06:15'),
(1098, '2023-10-31 17:08:43', 'Christian Rasandy mengubah data siteplan', '185.213.83.164', 2, '2023-10-31 17:08:43'),
(1099, '2023-10-31 17:13:28', 'Christian Rasandy mengubah data tempat : Airport Toll', '185.213.83.164', 2, '2023-10-31 17:13:28'),
(1100, '2023-10-31 17:15:34', 'Christian Rasandy mengubah data tempat : Alam Sutera Sport Lounge', '185.213.83.164', 2, '2023-10-31 17:15:34'),
(1101, '2023-10-31 17:17:36', 'Christian Rasandy mengubah data tempat : Swiss German University', '185.213.83.164', 2, '2023-10-31 17:17:36'),
(1102, '2023-10-31 17:22:03', 'Christian Rasandy mengubah data unit : 11 - Arma', '185.213.83.164', 2, '2023-10-31 17:22:03'),
(1103, '2023-10-31 17:25:21', 'Christian Rasandy mengubah data cluster : Badminton Court', '185.213.83.164', 2, '2023-10-31 17:25:21'),
(1104, '2023-10-31 17:28:25', 'Christian Rasandy mengubah data cluster : Tennis Court', '185.213.83.164', 2, '2023-10-31 17:28:25'),
(1105, '2023-10-31 17:28:54', 'Christian Rasandy mengubah data cluster : Swimming Pool', '185.213.83.164', 2, '2023-10-31 17:28:54'),
(1106, '2023-10-31 17:31:03', 'Christian Rasandy mengubah data cluster : Indoor Gym', '185.213.83.164', 2, '2023-10-31 17:31:03'),
(1107, '2023-10-31 17:33:51', 'Christian Rasandy mengubah data unit : 9 - Alca', '185.213.83.164', 2, '2023-10-31 17:33:51'),
(1108, '2023-10-31 17:35:36', 'Christian Rasandy mengubah data unit : 10 - Aera', '185.213.83.164', 2, '2023-10-31 17:35:36'),
(1109, '2023-10-31 17:50:03', 'Christian Rasandy menambah data informasi : Jakarta Premium Outlet akan buka di Alam Sutera', '185.213.83.164', 2, '2023-10-31 17:50:03'),
(1110, '2023-10-31 17:50:08', 'administrator menghapus data informasi dengan ID : 11', '185.213.83.164', 2, '2023-10-31 17:50:08'),
(1111, '2023-10-31 17:50:12', 'administrator menghapus data informasi dengan ID : 10', '185.213.83.164', 2, '2023-10-31 17:50:12'),
(1112, '2023-10-31 17:50:15', 'administrator menghapus data informasi dengan ID : 9', '185.213.83.164', 2, '2023-10-31 17:50:15'),
(1113, '2023-10-31 17:50:16', 'administrator menghapus data informasi dengan ID : 8', '185.213.83.164', 2, '2023-10-31 17:50:16'),
(1114, '2023-10-31 17:50:18', 'administrator menghapus data informasi dengan ID : 7', '185.213.83.164', 2, '2023-10-31 17:50:18'),
(1115, '2023-10-31 17:50:20', 'administrator menghapus data informasi dengan ID : 6', '185.213.83.164', 2, '2023-10-31 17:50:20'),
(1116, '2023-10-31 18:15:44', 'Christian Rasandy menambah data informasi : Gramercy by Alam Sutera, Perumahan Mewah Terakhir di Alam Sutera', '185.213.83.34', 2, '2023-10-31 18:15:44'),
(1117, '2023-11-01 11:37:42', 'Christian Rasandy melakukan login ke sistem', '103.19.109.36', 2, '2023-11-01 11:37:42'),
(1118, '2023-11-01 11:37:59', 'Christian Rasandy menghapus data project dengan ID : 4', '103.19.109.36', 2, '2023-11-01 11:37:59'),
(1119, '2023-11-01 11:38:05', 'Christian Rasandy menghapus data project dengan ID : 3', '103.19.109.36', 2, '2023-11-01 11:38:05'),
(1120, '2023-11-01 11:38:27', 'Christian Rasandy mengubah data project : 5 - Sutera Nykka', '103.19.109.36', 2, '2023-11-01 11:38:27'),
(1121, '2023-11-01 11:39:03', 'Christian Rasandy mengubah data project : 6 - Sutera Winona', '103.19.109.36', 2, '2023-11-01 11:39:03'),
(1122, '2023-11-01 11:41:15', 'Christian Rasandy mengubah data siteplan', '103.19.109.36', 2, '2023-11-01 11:41:15'),
(1123, '2023-11-09 16:24:37', 'Christian Rasandy melakukan login ke sistem', '185.213.83.166', 2, '2023-11-09 16:24:37'),
(1124, '2023-11-09 16:48:18', 'Christian Rasandy menambah data informasi : Mengapa Investasi di Alam Sutera ?', '185.213.83.36', 2, '2023-11-09 16:48:18'),
(1125, '2023-11-09 16:57:50', 'administrator mengubah data konten gramercy dengan ID : term_condition', '185.213.83.36', 2, '2023-11-09 16:57:50'),
(1126, '2023-11-09 17:27:22', 'Christian Rasandy menambah data informasi : Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', '185.213.83.33', 2, '2023-11-09 17:27:22'),
(1127, '2023-11-09 19:09:58', 'Christian Rasandy menghapus data gallery dengan ID : 25', '185.213.83.158', 2, '2023-11-09 19:09:58'),
(1128, '2023-11-09 19:10:02', 'Christian Rasandy menghapus data gallery dengan ID : 24', '185.213.83.158', 2, '2023-11-09 19:10:02'),
(1129, '2023-11-09 19:10:06', 'Christian Rasandy menghapus data gallery dengan ID : 23', '185.213.83.158', 2, '2023-11-09 19:10:06'),
(1130, '2023-11-09 19:10:09', 'Christian Rasandy menghapus data gallery dengan ID : 22', '185.213.83.158', 2, '2023-11-09 19:10:09'),
(1131, '2023-11-09 19:10:13', 'Christian Rasandy menghapus data gallery dengan ID : 21', '185.213.83.158', 2, '2023-11-09 19:10:13'),
(1132, '2023-11-09 19:22:18', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Tampak Depan Rumah', '103.19.109.36', 2, '2023-11-09 19:22:18'),
(1133, '2023-11-09 19:22:41', 'Christian Rasandy mengubah data unit : 9 - Alca', '103.19.109.36', 2, '2023-11-09 19:22:41'),
(1134, '2023-11-09 19:29:52', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Living Room, High Ceiling', '103.19.109.36', 2, '2023-11-09 19:29:52'),
(1135, '2023-11-09 19:36:49', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Garden', '103.19.109.36', 2, '2023-11-09 19:36:49'),
(1136, '2023-11-09 21:00:39', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Wardrobe Master Bedroom', '185.213.83.56', 2, '2023-11-09 21:00:39'),
(1137, '2023-11-09 21:07:52', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Dining Room', '185.213.83.167', 2, '2023-11-09 21:07:52'),
(1138, '2023-11-09 21:30:11', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Master Bedroom ( Progress )', '185.213.83.167', 2, '2023-11-09 21:30:11'),
(1139, '2023-11-09 21:30:38', 'Christian Rasandy menghapus data gallery dengan ID : 19', '185.213.83.167', 2, '2023-11-09 21:30:38'),
(1140, '2023-11-09 21:30:41', 'Christian Rasandy menghapus data gallery dengan ID : 18', '185.213.83.167', 2, '2023-11-09 21:30:41'),
(1141, '2023-11-09 21:30:44', 'Christian Rasandy menghapus data gallery dengan ID : 17', '185.213.83.167', 2, '2023-11-09 21:30:44'),
(1142, '2023-11-09 21:30:47', 'Christian Rasandy menghapus data gallery dengan ID : 16', '185.213.83.167', 2, '2023-11-09 21:30:47'),
(1143, '2023-11-09 21:30:51', 'Christian Rasandy menghapus data gallery dengan ID : 15', '185.213.83.167', 2, '2023-11-09 21:30:51'),
(1144, '2023-11-09 21:30:54', 'Christian Rasandy menghapus data gallery dengan ID : 14', '185.213.83.167', 2, '2023-11-09 21:30:54'),
(1145, '2023-11-09 21:30:58', 'Christian Rasandy menghapus data gallery dengan ID : 13', '185.213.83.167', 2, '2023-11-09 21:30:58'),
(1146, '2023-11-09 22:14:02', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Living Room', '185.213.83.167', 2, '2023-11-09 22:14:02'),
(1147, '2023-11-09 22:14:49', 'Christian Rasandy mengubah data gallery unit : Living Room', '185.213.83.167', 2, '2023-11-09 22:14:49'),
(1148, '2023-11-09 22:15:05', 'Christian Rasandy mengubah data gallery unit : Living Room', '185.213.83.167', 2, '2023-11-09 22:15:05'),
(1149, '2023-11-09 22:43:27', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Living Room Lantai 2', '103.19.109.36', 2, '2023-11-09 22:43:27'),
(1150, '2023-11-09 22:53:44', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Master Bedroom Aera', '103.19.109.36', 2, '2023-11-09 22:53:44'),
(1151, '2023-11-09 22:56:16', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Swimming Pool', '103.19.109.36', 2, '2023-11-09 22:56:16'),
(1152, '2023-11-09 22:59:12', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Bathroom with Bathup', '103.19.109.36', 2, '2023-11-09 22:59:12'),
(1153, '2023-11-09 23:13:58', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Facade Aera', '103.19.109.36', 2, '2023-11-09 23:13:58'),
(1154, '2023-11-09 23:17:34', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Wet Kitchen', '185.213.83.13', 2, '2023-11-09 23:17:34'),
(1155, '2023-11-09 23:20:28', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Wardrobe Aera', '185.213.83.13', 2, '2023-11-09 23:20:28'),
(1156, '2023-11-09 23:20:45', 'Christian Rasandy mengubah data unit : 10 - Aera', '185.213.83.13', 2, '2023-11-09 23:20:45'),
(1157, '2023-11-09 23:22:31', 'Christian Rasandy mengubah data unit : 10 - Aera', '185.213.83.13', 2, '2023-11-09 23:22:31'),
(1158, '2023-11-09 23:23:58', 'Christian Rasandy mengubah data unit : 9 - Alca', '185.213.83.13', 2, '2023-11-09 23:23:58'),
(1159, '2023-11-09 23:48:40', 'Christian Rasandy menghapus data gallery dengan ID : 6', '185.213.83.13', 2, '2023-11-09 23:48:40'),
(1160, '2023-11-09 23:48:51', 'Christian Rasandy menghapus data gallery dengan ID : 8', '185.213.83.13', 2, '2023-11-09 23:48:51'),
(1161, '2023-11-09 23:48:56', 'Christian Rasandy menghapus data gallery dengan ID : 7', '185.213.83.13', 2, '2023-11-09 23:48:56'),
(1162, '2023-11-09 23:49:05', 'Christian Rasandy menghapus data gallery dengan ID : 11', '185.213.83.13', 2, '2023-11-09 23:49:05'),
(1163, '2023-11-09 23:51:38', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Living Room Lantai 1', '185.213.83.13', 2, '2023-11-09 23:51:38'),
(1164, '2023-11-10 01:00:12', 'Christian Rasandy mengubah data gallery unit : Living Room Lantai 1', '185.213.83.13', 2, '2023-11-10 01:00:12'),
(1165, '2023-11-10 01:00:25', 'Christian Rasandy mengubah data gallery unit : Living Room Lantai 1', '185.213.83.13', 2, '2023-11-10 01:00:25'),
(1166, '2023-11-10 01:17:15', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Dining Room', '185.213.83.13', 2, '2023-11-10 01:17:15'),
(1167, '2023-11-10 01:21:29', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Kid Bedroom', '185.213.83.13', 2, '2023-11-10 01:21:29'),
(1168, '2023-11-10 01:25:13', 'Christian Rasandy menambah data unit  gallery dengan ID - nama :  - Swimming Pool', '185.213.83.13', 2, '2023-11-10 01:25:13'),
(1169, '2023-11-10 09:40:46', 'Christian Rasandy melakukan login ke sistem', '185.213.83.105', 2, '2023-11-10 09:40:46'),
(1170, '2023-11-10 09:48:12', 'administrator mengubah data konten gramercy dengan ID : privacy_policy', '185.213.83.105', 2, '2023-11-10 09:48:12'),
(1171, '2023-11-10 10:12:22', 'Christian Rasandy mengubah data informasi dengan ID - nama : 15 - Mengapa Investasi di Alam Sutera ?', '185.213.83.105', 2, '2023-11-10 10:12:22'),
(1172, '2023-11-10 10:18:07', 'Christian Rasandy mengubah data informasi dengan ID - nama : 14 - Gramercy by Alam Sutera, Perumahan Mewah Terakhir di Alam Sutera', '185.213.83.105', 2, '2023-11-10 10:18:07'),
(1173, '2023-11-10 10:21:47', 'Christian Rasandy mengubah data informasi dengan ID - nama : 13 - Jakarta Premium Outlet akan buka di Alam Sutera', '185.213.83.105', 2, '2023-11-10 10:21:47'),
(1174, '2023-11-10 10:28:17', 'Christian Rasandy mengubah data informasi dengan ID - nama : 16 - Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', '185.213.83.105', 2, '2023-11-10 10:28:17'),
(1175, '2023-11-10 15:06:06', 'Christian Rasandy melakukan login ke sistem', '185.213.83.105', 2, '2023-11-10 15:06:06'),
(1176, '2023-11-10 15:16:02', 'Christian Rasandy menambah data informasi : Alam Sutera Property Expo 2023', '185.213.83.105', 2, '2023-11-10 15:16:02'),
(1177, '2023-11-10 15:16:48', 'administrator mengubah data informasi dengan ID : 17', '185.213.83.105', 2, '2023-11-10 15:16:48'),
(1178, '2023-11-11 12:59:55', 'Christian Rasandy melakukan login ke sistem', '185.213.83.252', 2, '2023-11-11 12:59:55'),
(1179, '2023-11-11 16:35:10', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-11 16:35:10'),
(1180, '2023-11-11 18:10:34', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-11 18:10:34'),
(1181, '2023-11-11 21:54:52', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-11 21:54:52'),
(1182, '2023-11-11 21:57:50', 'Christian Rasandy mengubah data unit : 11 - Arma', '36.68.9.166', 2, '2023-11-11 21:57:50'),
(1183, '2023-11-11 22:50:49', 'Christian Rasandy mengubah data unit : 10 - Aera', '36.68.9.166', 2, '2023-11-11 22:50:49'),
(1184, '2023-11-11 22:51:01', 'Christian Rasandy mengubah data unit : 10 - Aera', '36.68.9.166', 2, '2023-11-11 22:51:01'),
(1185, '2023-11-11 23:00:58', 'Christian Rasandy mengubah data unit : 9 - Alca', '36.68.9.166', 2, '2023-11-11 23:00:58'),
(1186, '2023-11-11 23:02:57', 'Christian Rasandy mengubah data gallery unit : Swimming Pool', '36.68.9.166', 2, '2023-11-11 23:02:57'),
(1187, '2023-11-12 00:54:51', 'Christian Rasandy mengubah data siteplan', '36.68.9.166', 2, '2023-11-12 00:54:51'),
(1188, '2023-11-12 00:56:51', 'Christian Rasandy mengubah data siteplan', '36.68.9.166', 2, '2023-11-12 00:56:51'),
(1189, '2023-11-12 01:02:24', 'Christian Rasandy mengubah data informasi dengan ID - nama : 16 - Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', '36.68.9.166', 2, '2023-11-12 01:02:24'),
(1190, '2023-11-12 09:14:18', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-12 09:14:18'),
(1191, '2023-11-12 09:15:55', 'Christian Rasandy mengubah data informasi dengan ID - nama : 14 - Gramercy by Alam Sutera, Perumahan Mewah Terakhir di Alam Sutera', '36.68.9.166', 2, '2023-11-12 09:15:55'),
(1192, '2023-11-12 09:18:09', 'Christian Rasandy mengubah data informasi dengan ID - nama : 15 - Mengapa Investasi di Alam Sutera ?', '36.68.9.166', 2, '2023-11-12 09:18:09'),
(1193, '2023-11-12 09:19:27', 'Christian Rasandy mengubah data informasi dengan ID - nama : 16 - Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', '36.68.9.166', 2, '2023-11-12 09:19:27'),
(1194, '2023-11-12 17:05:55', 'Christian Rasandy mengubah data gallery unit : Bedroom', '36.68.9.166', 2, '2023-11-12 17:05:55'),
(1195, '2023-11-12 17:09:51', 'Christian Rasandy mengubah data gallery unit : Living Room Lantai 1', '36.68.9.166', 2, '2023-11-12 17:09:51'),
(1196, '2023-11-12 17:12:52', 'Christian Rasandy mengubah data gallery unit : Swimming Pool', '36.68.9.166', 2, '2023-11-12 17:12:52'),
(1197, '2023-11-12 17:16:03', 'Christian Rasandy mengubah data gallery unit : Kid Bedroom', '36.68.9.166', 2, '2023-11-12 17:16:03'),
(1198, '2023-11-12 17:16:50', 'Christian Rasandy mengubah data gallery unit : Master Bedroom', '36.68.9.166', 2, '2023-11-12 17:16:50'),
(1199, '2023-11-12 17:17:14', 'Christian Rasandy mengubah data gallery unit : Dining Room', '36.68.9.166', 2, '2023-11-12 17:17:14'),
(1200, '2023-11-12 17:20:11', 'Christian Rasandy mengubah data gallery unit : Kid Bedroom', '36.68.9.166', 2, '2023-11-12 17:20:11'),
(1201, '2023-11-12 17:20:46', 'Christian Rasandy mengubah data gallery unit : Swimming Pool', '36.68.9.166', 2, '2023-11-12 17:20:46'),
(1202, '2023-11-12 17:21:30', 'Christian Rasandy mengubah data gallery unit : Walk in Closet Master Bedroom', '36.68.9.166', 2, '2023-11-12 17:21:30'),
(1203, '2023-11-12 17:31:49', 'Christian Rasandy mengubah data gallery unit : Kid Bedroom', '36.68.9.166', 2, '2023-11-12 17:31:49'),
(1204, '2023-11-12 17:33:34', 'Christian Rasandy mengubah data gallery unit : Swimming Pool', '36.68.9.166', 2, '2023-11-12 17:33:34'),
(1205, '2023-11-12 17:37:01', 'Christian Rasandy mengubah data gallery unit : Layout Arma', '36.68.9.166', 2, '2023-11-12 17:37:01'),
(1206, '2023-11-12 17:37:54', 'Christian Rasandy mengubah data gallery unit : Living Room Lantai 1', '36.68.9.166', 2, '2023-11-12 17:37:54'),
(1207, '2023-11-12 17:38:44', 'Christian Rasandy mengubah data gallery unit : Dining Room', '36.68.9.166', 2, '2023-11-12 17:38:44'),
(1208, '2023-11-12 21:38:11', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-12 21:38:11'),
(1209, '2023-11-12 21:38:49', 'Christian Rasandy mengubah data project : 6 - Sutera Winona', '36.68.9.166', 2, '2023-11-12 21:38:49'),
(1210, '2023-11-12 21:38:57', 'Christian Rasandy mengubah data project : 5 - Sutera Nykka', '36.68.9.166', 2, '2023-11-12 21:38:57'),
(1211, '2023-11-12 22:13:29', 'Christian Rasandy mengubah data informasi dengan ID - nama : 16 - Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', '36.68.9.166', 2, '2023-11-12 22:13:29'),
(1212, '2023-11-12 23:31:17', 'Christian Rasandy mengubah data gallery unit : Master Bedroom ( Progress )', '36.68.9.166', 2, '2023-11-12 23:31:17'),
(1213, '2023-11-12 23:31:34', 'Christian Rasandy mengubah data gallery unit : Dining Room', '36.68.9.166', 2, '2023-11-12 23:31:34'),
(1214, '2023-11-12 23:32:43', 'Christian Rasandy mengubah data gallery unit : Garden', '36.68.9.166', 2, '2023-11-12 23:32:43'),
(1215, '2023-11-12 23:32:56', 'Christian Rasandy mengubah data gallery unit : Living Room, High Ceiling', '36.68.9.166', 2, '2023-11-12 23:32:56'),
(1216, '2023-11-12 23:33:06', 'Christian Rasandy mengubah data gallery unit : Tampak Depan Rumah', '36.68.9.166', 2, '2023-11-12 23:33:06'),
(1217, '2023-11-12 23:33:36', 'Christian Rasandy mengubah data gallery unit : Layout Rumah', '36.68.9.166', 2, '2023-11-12 23:33:36'),
(1218, '2023-11-12 23:42:49', 'Christian Rasandy mengubah data gallery unit : Living Room, High Ceiling', '36.68.9.166', 2, '2023-11-12 23:42:49'),
(1219, '2023-11-12 23:43:48', 'Christian Rasandy mengubah data gallery unit : Garden', '36.68.9.166', 2, '2023-11-12 23:43:48'),
(1220, '2023-11-12 23:44:48', 'Christian Rasandy mengubah data gallery unit : Dining Room', '36.68.9.166', 2, '2023-11-12 23:44:48'),
(1221, '2023-11-13 13:08:40', 'Christian Rasandy melakukan login ke sistem', '185.213.83.130', 2, '2023-11-13 13:08:40'),
(1222, '2023-11-13 13:11:38', 'Christian Rasandy mengubah data siteplan', '185.213.83.130', 2, '2023-11-13 13:11:38'),
(1223, '2023-11-13 13:12:06', 'Christian Rasandy mengubah data siteplan', '185.213.83.130', 2, '2023-11-13 13:12:06'),
(1224, '2023-11-13 13:35:35', 'Christian Rasandy melakukan login ke sistem', '36.68.9.166', 2, '2023-11-13 13:35:35'),
(1225, '2023-11-13 13:36:06', 'Christian Rasandy mengubah data unit : 11 - Arma', '36.68.9.166', 2, '2023-11-13 13:36:06'),
(1226, '2023-11-13 13:37:42', 'Christian Rasandy mengubah data unit : 10 - Aera', '36.68.9.166', 2, '2023-11-13 13:37:42'),
(1227, '2023-11-13 13:38:02', 'Christian Rasandy mengubah data unit : 9 - Alca', '36.68.9.166', 2, '2023-11-13 13:38:02'),
(1228, '2023-11-13 14:27:48', 'Christian Rasandy mengubah data tempat : Swiss German Univ.', '185.213.83.130', 2, '2023-11-13 14:27:48'),
(1229, '2023-11-13 14:27:58', 'Christian Rasandy mengubah data tempat : Bunda Mulia Univ.', '185.213.83.130', 2, '2023-11-13 14:27:58'),
(1230, '2023-11-13 14:28:06', 'Christian Rasandy mengubah data tempat : Binus Univ.', '185.213.83.130', 2, '2023-11-13 14:28:06'),
(1231, '2023-11-13 14:29:14', 'Christian Rasandy mengubah data tempat : Santo Laurensius Church', '185.213.83.130', 2, '2023-11-13 14:29:14'),
(1232, '2023-11-13 14:30:51', 'Christian Rasandy mengubah data tempat : Santo Laurensius Church', '185.213.83.130', 2, '2023-11-13 14:30:51'),
(1233, '2023-11-13 14:31:01', 'Christian Rasandy mengubah data tempat : Santo Laurensius', '185.213.83.130', 2, '2023-11-13 14:31:01'),
(1234, '2023-11-13 14:31:35', 'Christian Rasandy mengubah data tempat : Sport Lounge', '185.213.83.130', 2, '2023-11-13 14:31:35'),
(1235, '2023-11-13 14:33:54', 'Christian Rasandy mengubah data tempat : Santa Laurensia', '185.213.83.130', 2, '2023-11-13 14:33:54'),
(1236, '2023-11-13 14:34:10', 'Christian Rasandy mengubah data tempat : Santa Laurensia', '185.213.83.130', 2, '2023-11-13 14:34:10'),
(1237, '2023-11-13 14:34:30', 'Christian Rasandy mengubah data tempat : Santa Laurensia School', '185.213.83.130', 2, '2023-11-13 14:34:30'),
(1238, '2023-11-13 14:34:45', 'Christian Rasandy mengubah data tempat : SantoLaurensius Church', '185.213.83.130', 2, '2023-11-13 14:34:45'),
(1239, '2023-11-13 14:35:02', 'Christian Rasandy mengubah data tempat : Santo Laurensius', '185.213.83.130', 2, '2023-11-13 14:35:02'),
(1240, '2023-11-13 14:37:32', 'Christian Rasandy menambah data optical Central Living District dengan ID - nama :  - Central Living District', '185.213.83.130', 2, '2023-11-13 14:37:32'),
(1241, '2023-11-22 10:25:48', 'Portal Studio melakukan login ke sistem', '180.249.173.84', 1, '2023-11-22 10:25:48'),
(1242, '2023-11-22 10:26:08', 'Update Informasi Aplikasi', '180.249.173.84', 1, '2023-11-22 10:26:08'),
(1243, '2023-11-22 10:26:22', 'Update Informasi Aplikasi', '180.249.173.84', 1, '2023-11-22 10:26:22'),
(1244, '2023-11-22 13:52:40', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-11-22 13:52:40'),
(1245, '2023-11-22 13:53:34', 'Update Informasi Aplikasi', '::1', 1, '2023-11-22 13:53:34'),
(1246, '2023-11-22 13:55:20', 'Update Informasi Aplikasi', '::1', 1, '2023-11-22 13:55:20'),
(1247, '2023-11-22 13:55:37', 'Update Informasi Aplikasi', '::1', 1, '2023-11-22 13:55:37'),
(1248, '2023-11-22 13:59:48', 'Update Informasi Aplikasi', '::1', 1, '2023-11-22 13:59:48'),
(1249, '2023-11-22 14:07:39', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-11-22 14:07:39'),
(1250, '2023-11-22 14:07:47', 'Update Informasi Aplikasi', '::1', 1, '2023-11-22 14:07:47'),
(1251, '2023-11-23 09:46:46', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-23 09:46:46'),
(1252, '2023-11-23 11:27:32', 'Christian Rasandy menambah data product Lib Serum', '::1', 2, '2023-11-23 11:27:32'),
(1253, '2023-11-23 11:36:35', 'admin mengubah data product dengan ID - nama = 1 - Lib Serum', '::1', 6, '2023-11-23 11:36:35'),
(1254, '2023-11-23 11:36:54', 'admin mengubah data product dengan ID - nama = 1 - Lib Serum', '::1', 6, '2023-11-23 11:36:54'),
(1255, '2023-11-23 12:14:02', 'admin menambah data product_service Rangkaian Treatment Pemakaian', '::1', 6, '2023-11-23 12:14:02'),
(1256, '2023-11-23 12:21:15', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-23 12:21:15'),
(1257, '2023-11-23 12:21:55', 'Christian Rasandy menambah data product a', '::1', 2, '2023-11-23 12:21:55'),
(1258, '2023-11-23 12:21:59', 'administrator menghapus data product dengan ID : 2 - ', '::1', 2, '2023-11-23 12:21:59'),
(1259, '2023-11-23 14:49:13', 'muhammad danil melakukan login ke sistem', '::1', 9, '2023-11-23 14:49:13'),
(1260, '2023-11-23 14:52:37', 'muhammad danil melakukan login ke sistem', '::1', 9, '2023-11-23 14:52:37'),
(1261, '2023-11-23 15:31:16', 'ChindyElfianaSN  melakukan login ke sistem', '::1', 10, '2023-11-23 15:31:16'),
(1262, '2023-11-23 15:50:06', 'muhammad danil melakukan login ke sistem', '::1', 9, '2023-11-23 15:50:06'),
(1263, '2023-11-24 12:55:18', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-24 12:55:18'),
(1264, '2023-11-24 13:02:55', 'Christian Rasandy mengubah data product dengan ID - nama = 1 - Brightlogy Whitening Kit', '::1', 2, '2023-11-24 13:02:55'),
(1265, '2023-11-24 13:04:47', 'Christian Rasandy menambah data product Fitlogy TEA DRINK/Detox Tea', '::1', 2, '2023-11-24 13:04:47'),
(1266, '2023-11-24 13:05:29', 'Christian Rasandy menambah data product Growlogy Eyelash & Brow Serum', '::1', 2, '2023-11-24 13:05:29'),
(1267, '2023-11-24 13:05:47', 'Christian Rasandy menambah data product Brightlogy Collagen Drink (Revamp)', '::1', 2, '2023-11-24 13:05:47'),
(1268, '2023-11-24 13:06:07', 'Christian Rasandy menambah data product LIP SERUM', '::1', 2, '2023-11-24 13:06:07'),
(1269, '2023-11-24 13:06:25', 'Christian Rasandy menambah data product Brightlogy Body Lotion', '::1', 2, '2023-11-24 13:06:25'),
(1270, '2023-11-24 13:06:41', 'Christian Rasandy menambah data product UNDERARM SERUM', '::1', 2, '2023-11-24 13:06:41'),
(1271, '2023-11-24 13:06:58', 'Christian Rasandy menambah data product Acnalogy Powder Drink', '::1', 2, '2023-11-24 13:06:58'),
(1272, '2023-11-24 13:07:36', 'Christian Rasandy menambah data product Keauty Collagen', '::1', 2, '2023-11-24 13:07:36'),
(1273, '2023-11-24 13:08:49', 'Christian Rasandy mengubah data product_service dengan ID - nama = 1 - Rangkaian Treatment', '::1', 2, '2023-11-24 13:08:49'),
(1274, '2023-11-24 13:14:33', 'Christian Rasandy menambah data product_service Hasil Permanen', '::1', 2, '2023-11-24 13:14:33'),
(1275, '2023-11-24 13:14:54', 'Christian Rasandy menambah data product_service Bumil/Busui', '::1', 2, '2023-11-24 13:14:54'),
(1276, '2023-11-24 13:15:40', 'Christian Rasandy menambah data product_service Tambalan/Palsu/Veneer', '::1', 2, '2023-11-24 13:15:40'),
(1277, '2023-11-24 13:16:03', 'Christian Rasandy menambah data product_service Pakai Behel', '::1', 2, '2023-11-24 13:16:03'),
(1278, '2023-11-24 13:16:20', 'Christian Rasandy menambah data product_service Karang Gigi', '::1', 2, '2023-11-24 13:16:20'),
(1279, '2023-11-24 13:16:52', 'Christian Rasandy menambah data product_service Gak Putih Putih', '::1', 2, '2023-11-24 13:16:52'),
(1280, '2023-11-24 13:17:09', 'Christian Rasandy menambah data product_service Efek Samping', '::1', 2, '2023-11-24 13:17:09'),
(1281, '2023-11-24 13:17:30', 'Christian Rasandy menambah data product_service Pemakaian 30 menit', '::1', 2, '2023-11-24 13:17:30'),
(1282, '2023-11-24 13:17:41', 'Christian Rasandy menambah data product_service Ngilu', '::1', 2, '2023-11-24 13:17:41'),
(1283, '2023-11-24 13:18:08', 'Christian Rasandy menambah data product_service Gigi Gingsul Gak Rata', '::1', 2, '2023-11-24 13:18:08'),
(1284, '2023-11-24 13:18:21', 'Christian Rasandy menambah data product_service Expired', '::1', 2, '2023-11-24 13:18:21'),
(1285, '2023-11-24 13:18:46', 'Christian Rasandy menambah data product_service Gigi Berlubang', '::1', 2, '2023-11-24 13:18:46'),
(1286, '2023-11-24 13:22:03', 'Christian Rasandy menambah data product_service Tutorial', '::1', 2, '2023-11-24 13:22:03'),
(1287, '2023-11-24 13:22:26', 'Christian Rasandy menambah data product_service Mini LED gak nyala', '::1', 2, '2023-11-24 13:22:26'),
(1288, '2023-11-24 13:22:48', 'Christian Rasandy menambah data product_service Bilas Mini LED', '::1', 2, '2023-11-24 13:22:48'),
(1289, '2023-11-24 13:23:03', 'Christian Rasandy menambah data product_service Pakai Baterai', '::1', 2, '2023-11-24 13:23:03'),
(1290, '2023-11-24 13:23:19', 'Christian Rasandy menambah data product_service Baterai Habis', '::1', 2, '2023-11-24 13:23:19'),
(1291, '2023-11-24 13:23:42', 'Christian Rasandy menambah data product_service Kena Gusi/Lidah', '::1', 2, '2023-11-24 13:23:42'),
(1292, '2023-11-24 13:23:58', 'Christian Rasandy menambah data product_service Minimum Usia', '::1', 2, '2023-11-24 13:23:58'),
(1293, '2023-11-24 13:24:15', 'Christian Rasandy menambah data product_service Garansi', '::1', 2, '2023-11-24 13:24:15'),
(1294, '2023-11-24 13:24:29', 'Christian Rasandy menambah data product_service Jenis Batrai', '::1', 2, '2023-11-24 13:24:29'),
(1295, '2023-11-24 13:25:00', 'Christian Rasandy menambah data product_service Hasil terlihat', '::1', 2, '2023-11-24 13:25:00'),
(1296, '2023-11-24 13:25:15', 'Christian Rasandy menambah data product_service Mini Led Mati', '::1', 2, '2023-11-24 13:25:15'),
(1297, '2023-11-24 13:25:31', 'Christian Rasandy menambah data product_service Penawaran', '::1', 2, '2023-11-24 13:25:31'),
(1298, '2023-11-24 13:26:34', 'Christian Rasandy menambah data product_service Retouch Lama', '::1', 2, '2023-11-24 13:26:34'),
(1299, '2023-11-24 15:04:55', 'Christian Rasandy menambah data consult_question Nama', '::1', 2, '2023-11-24 15:04:55'),
(1300, '2023-11-24 15:34:07', 'Christian Rasandy menambah data consult_question Jenis Kelamin', '::1', 2, '2023-11-24 15:34:07'),
(1301, '2023-11-24 15:34:54', 'Christian Rasandy menambah data consult_question Kegiatan Harian', '::1', 2, '2023-11-24 15:34:54'),
(1302, '2023-11-24 15:35:18', 'Christian Rasandy menambah data consult_question Permasalahan Yang Dialami', '::1', 2, '2023-11-24 15:35:18'),
(1303, '2023-11-24 15:35:29', 'Christian Rasandy menambah data consult_question Permasalahan Spesifik', '::1', 2, '2023-11-24 15:35:29'),
(1304, '2023-11-24 15:35:46', 'Christian Rasandy menambah data consult_question a', '::1', 2, '2023-11-24 15:35:46'),
(1305, '2023-11-24 15:35:55', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 6 - ab', '::1', 2, '2023-11-24 15:35:55');
INSERT INTO `tbl_log` (`log_id`, `log_time`, `log_message`, `log_ipaddress`, `user_id`, `createtime`) VALUES
(1306, '2023-11-24 15:37:20', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 6 - ab', '::1', 2, '2023-11-24 15:37:20'),
(1307, '2023-11-24 15:38:14', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 6 - abc', '::1', 2, '2023-11-24 15:38:14'),
(1308, '2023-11-24 15:45:30', 'Christian Rasandy menambah data consult_question a', '::1', 2, '2023-11-24 15:45:30'),
(1309, '2023-11-24 15:54:10', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 7 - a', '::1', 2, '2023-11-24 15:54:10'),
(1310, '2023-11-24 15:54:14', 'administrator menghapus data consult_question dengan ID : 7 - ', '::1', 2, '2023-11-24 15:54:14'),
(1311, '2023-11-24 15:54:17', 'administrator menghapus data consult_question dengan ID : 6 - ', '::1', 2, '2023-11-24 15:54:17'),
(1312, '2023-11-24 15:54:37', 'Christian Rasandy menambah data product_service aaa', '::1', 2, '2023-11-24 15:54:37'),
(1313, '2023-11-24 15:54:47', 'Christian Rasandy mengubah data product_service dengan ID - nama = 27 - aaa', '::1', 2, '2023-11-24 15:54:47'),
(1314, '2023-11-24 15:54:58', 'administrator menghapus data product_service dengan ID : 27 - ', '::1', 2, '2023-11-24 15:54:58'),
(1315, '2023-11-24 16:11:30', 'Christian Rasandy menambah data consult_q_option Laki-laki', '::1', 2, '2023-11-24 16:11:30'),
(1316, '2023-11-24 16:12:10', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - Laki-laki', '::1', 2, '2023-11-24 16:12:10'),
(1317, '2023-11-24 16:12:16', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - Laki-laki', '::1', 2, '2023-11-24 16:12:16'),
(1318, '2023-11-24 16:13:23', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - 0asasa', '::1', 2, '2023-11-24 16:13:23'),
(1319, '2023-11-24 16:13:55', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - 0as', '::1', 2, '2023-11-24 16:13:55'),
(1320, '2023-11-24 16:15:20', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - 12334', '::1', 2, '2023-11-24 16:15:20'),
(1321, '2023-11-24 16:16:18', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama =  - asdasasdasdasdasd', '::1', 2, '2023-11-24 16:16:18'),
(1322, '2023-11-24 16:18:21', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama = 1 - asdasasas', '::1', 2, '2023-11-24 16:18:21'),
(1323, '2023-11-24 16:18:31', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama = 1 - Laki-laki', '::1', 2, '2023-11-24 16:18:31'),
(1324, '2023-11-24 16:18:36', 'Christian Rasandy menambah data consult_q_option Perempuan', '::1', 2, '2023-11-24 16:18:36'),
(1325, '2023-11-24 16:19:00', 'Christian Rasandy menambah data consult_q_option Indoor', '::1', 2, '2023-11-24 16:19:00'),
(1326, '2023-11-24 16:19:04', 'Christian Rasandy menambah data consult_q_option Outdoor', '::1', 2, '2023-11-24 16:19:04'),
(1327, '2023-11-24 16:19:12', 'Christian Rasandy menambah data consult_q_option Body', '::1', 2, '2023-11-24 16:19:12'),
(1328, '2023-11-24 16:19:16', 'Christian Rasandy menambah data consult_q_option Skin', '::1', 2, '2023-11-24 16:19:16'),
(1329, '2023-11-24 16:19:23', 'Christian Rasandy menambah data consult_q_option Teeth', '::1', 2, '2023-11-24 16:19:23'),
(1330, '2023-11-24 17:51:27', 'Christian Rasandy menambah data sim_question Berat Badan', '::1', 2, '2023-11-24 17:51:27'),
(1331, '2023-11-24 17:51:44', 'Christian Rasandy menambah data sim_question Tinggi Badan', '::1', 2, '2023-11-24 17:51:44'),
(1332, '2023-11-24 17:52:01', 'Christian Rasandy menambah data sim_question Lingkar Perut', '::1', 2, '2023-11-24 17:52:01'),
(1333, '2023-11-24 17:52:17', 'Christian Rasandy menambah data sim_question Permasalahan Spesifik', '::1', 2, '2023-11-24 17:52:17'),
(1334, '2023-11-24 17:53:28', 'Christian Rasandy menambah data sim_question Bentuk Tubuh Yang Paling Mendekati', '::1', 2, '2023-11-24 17:53:28'),
(1335, '2023-11-24 17:54:10', 'Christian Rasandy menambah data sim_question Apakah kamu menjaga pola makan dan hidup sehat?', '::1', 2, '2023-11-24 17:54:10'),
(1336, '2023-11-24 17:55:00', 'Christian Rasandy menambah data sim_q_option Ya, saya rutin berolahraga juga mengkonsumsi cukup serat dan protein', '::1', 2, '2023-11-24 17:55:00'),
(1337, '2023-11-24 17:55:39', 'Christian Rasandy menambah data sim_q_option Kadang-kadang berolahraga dan mengaja pola makan (>2x seminggu)', '::1', 2, '2023-11-24 17:55:39'),
(1338, '2023-11-24 17:55:58', 'Christian Rasandy menambah data sim_q_option Tidak sama sekali, jarang berolahraga dan bebas makan', '::1', 2, '2023-11-24 17:55:58'),
(1339, '2023-11-25 01:03:09', 'Update Informasi Aplikasi', '::1', 1, '2023-11-25 01:03:09'),
(1340, '2023-11-25 01:05:00', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-11-25 01:05:00'),
(1341, '2023-11-25 01:05:13', 'Update Informasi Aplikasi', '::1', 1, '2023-11-25 01:05:13'),
(1342, '2023-11-25 01:06:09', 'Update Informasi Aplikasi', '::1', 1, '2023-11-25 01:06:09'),
(1343, '2023-11-25 02:16:01', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-11-25 02:16:01'),
(1344, '2023-11-26 10:51:44', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-26 10:51:44'),
(1345, '2023-11-26 11:13:41', 'Christian Rasandy Update Profile data : administrator', '::1', 2, '2023-11-26 11:13:41'),
(1346, '2023-11-26 11:45:12', 'Christian Rasandy menambah data consult response ', '::1', 2, '2023-11-26 11:45:12'),
(1347, '2023-11-26 12:47:14', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 12:47:14'),
(1348, '2023-11-26 14:10:46', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 14:10:46'),
(1349, '2023-11-26 14:11:32', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 14:11:32'),
(1350, '2023-11-26 14:13:52', 'Christian Rasandy menambah data sim_question Upload skin picture(Wajah / Badan)', '::1', 2, '2023-11-26 14:13:52'),
(1351, '2023-11-26 14:14:12', 'Christian Rasandy menambah data sim_question Kondisi kulit saat ini', '::1', 2, '2023-11-26 14:14:12'),
(1352, '2023-11-26 14:14:49', 'Christian Rasandy menambah data sim_question Bagian tubuh mana yang bermasalah ?', '::1', 2, '2023-11-26 14:14:49'),
(1353, '2023-11-26 14:16:40', 'Christian Rasandy menambah data sim_question Target yang ingin kamu capai ?', '::1', 2, '2023-11-26 14:16:40'),
(1354, '2023-11-26 14:17:10', 'Christian Rasandy menambah data sim_question Target turunnya berat badan', '::1', 2, '2023-11-26 14:17:10'),
(1355, '2023-11-26 14:17:24', 'Christian Rasandy menambah data sim_q_option BB Ideal', '::1', 2, '2023-11-26 14:17:24'),
(1356, '2023-11-26 14:17:31', 'Christian Rasandy menambah data sim_q_option Serat terpenuhu', '::1', 2, '2023-11-26 14:17:31'),
(1357, '2023-11-26 14:17:36', 'Christian Rasandy mengubah data sim_q_option dengan ID - nama = 5 - Serat terpenuhi', '::1', 2, '2023-11-26 14:17:36'),
(1358, '2023-11-26 14:17:44', 'Christian Rasandy menambah data sim_q_option Tidak mudah lapar', '::1', 2, '2023-11-26 14:17:44'),
(1359, '2023-11-26 14:17:51', 'Christian Rasandy menambah data sim_q_option Berhenti ngemil', '::1', 2, '2023-11-26 14:17:51'),
(1360, '2023-11-26 14:18:12', 'Christian Rasandy menambah data sim_q_option Berat badan turun 1-3 kg dalam 14 hari', '::1', 2, '2023-11-26 14:18:12'),
(1361, '2023-11-26 14:18:28', 'Christian Rasandy menambah data sim_q_option Berat badan turun 5-8 kg dalam 14 hari', '::1', 2, '2023-11-26 14:18:28'),
(1362, '2023-11-26 14:18:40', 'Christian Rasandy menambah data sim_q_option Berat badan turun 8-10 kg dalam 14 hari', '::1', 2, '2023-11-26 14:18:40'),
(1363, '2023-11-26 14:18:48', 'Christian Rasandy menambah data sim_q_option Berat badan turun 1-3 kg dalam 30 hari', '::1', 2, '2023-11-26 14:18:48'),
(1364, '2023-11-26 14:18:56', 'Christian Rasandy menambah data sim_q_option Berat badan turun 5-8 kg dalam 30 hari', '::1', 2, '2023-11-26 14:18:56'),
(1365, '2023-11-26 14:19:07', 'Christian Rasandy menambah data sim_q_option Berat badan turun 8-10 kg dalam 30 hari', '::1', 2, '2023-11-26 14:19:07'),
(1366, '2023-11-26 14:19:35', 'Christian Rasandy menambah data sim_q_option Normal', '::1', 2, '2023-11-26 14:19:35'),
(1367, '2023-11-26 14:19:41', 'Christian Rasandy menambah data sim_q_option Kering', '::1', 2, '2023-11-26 14:19:41'),
(1368, '2023-11-26 14:19:48', 'Christian Rasandy menambah data sim_q_option Berminyak', '::1', 2, '2023-11-26 14:19:48'),
(1369, '2023-11-26 14:19:54', 'Christian Rasandy menambah data sim_q_option Sensitif', '::1', 2, '2023-11-26 14:19:54'),
(1370, '2023-11-26 14:20:00', 'Christian Rasandy menambah data sim_q_option Kombinasi', '::1', 2, '2023-11-26 14:20:00'),
(1371, '2023-11-26 14:20:09', 'Christian Rasandy menambah data sim_q_option Wajah', '::1', 2, '2023-11-26 14:20:09'),
(1372, '2023-11-26 14:20:16', 'Christian Rasandy menambah data sim_q_option Kulit tubuh', '::1', 2, '2023-11-26 14:20:16'),
(1373, '2023-11-26 14:20:24', 'Christian Rasandy menambah data sim_q_option Bulu mata', '::1', 2, '2023-11-26 14:20:24'),
(1374, '2023-11-26 14:20:27', 'Christian Rasandy menambah data sim_q_option Alis', '::1', 2, '2023-11-26 14:20:27'),
(1375, '2023-11-26 14:20:32', 'Christian Rasandy menambah data sim_q_option Bibir', '::1', 2, '2023-11-26 14:20:32'),
(1376, '2023-11-26 14:20:39', 'Christian Rasandy menambah data sim_q_option Area lipatan', '::1', 2, '2023-11-26 14:20:39'),
(1377, '2023-11-26 14:21:11', 'Christian Rasandy menambah data sim_question Goals yang ingin dicapai', '::1', 2, '2023-11-26 14:21:11'),
(1378, '2023-11-26 14:21:24', 'Christian Rasandy menambah data sim_q_option Kulit cerah', '::1', 2, '2023-11-26 14:21:24'),
(1379, '2023-11-26 14:21:31', 'Christian Rasandy menambah data sim_q_option Bebas jerawat', '::1', 2, '2023-11-26 14:21:31'),
(1380, '2023-11-26 14:21:38', 'Christian Rasandy mengubah data sim_q_option dengan ID - nama = 26 - Bebas dari jerawat', '::1', 2, '2023-11-26 14:21:38'),
(1381, '2023-11-26 14:21:46', 'Christian Rasandy menambah data sim_q_option Kulit lebih kenyal', '::1', 2, '2023-11-26 14:21:46'),
(1382, '2023-11-26 14:21:54', 'Christian Rasandy menambah data sim_q_option Garis halus berkurang', '::1', 2, '2023-11-26 14:21:54'),
(1383, '2023-11-26 14:22:01', 'Christian Rasandy menambah data sim_q_option Bulu mata lebat', '::1', 2, '2023-11-26 14:22:01'),
(1384, '2023-11-26 14:22:09', 'Christian Rasandy menambah data sim_q_option Bibir pink alam', '::1', 2, '2023-11-26 14:22:09'),
(1385, '2023-11-26 14:22:13', 'Christian Rasandy mengubah data sim_q_option dengan ID - nama = 30 - Bibir pink alami', '::1', 2, '2023-11-26 14:22:13'),
(1386, '2023-11-26 14:22:23', 'Christian Rasandy menambah data sim_q_option Area lipatan lebih cerah', '::1', 2, '2023-11-26 14:22:23'),
(1387, '2023-11-26 14:22:41', 'Christian Rasandy menambah data sim_question Upload foto gigi', '::1', 2, '2023-11-26 14:22:41'),
(1388, '2023-11-26 14:22:58', 'Christian Rasandy menambah data sim_question Kondisi gigi saat ini', '::1', 2, '2023-11-26 14:22:58'),
(1389, '2023-11-26 14:23:28', 'Christian Rasandy menambah data sim_question Apakah sering mengkonsumsi minuman kafein dan merokok', '::1', 2, '2023-11-26 14:23:28'),
(1390, '2023-11-26 14:23:51', 'Christian Rasandy menambah data sim_question Goals yang ingin dicapai', '::1', 2, '2023-11-26 14:23:51'),
(1391, '2023-11-26 14:26:50', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 14 - Kondisi gigi saat ini', '::1', 2, '2023-11-26 14:26:50'),
(1392, '2023-11-26 14:27:17', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 14 - Kondisi gigi saat ini', '::1', 2, '2023-11-26 14:27:17'),
(1393, '2023-11-26 14:28:28', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 14 - Kondisi gigi saat ini', '::1', 2, '2023-11-26 14:28:28'),
(1394, '2023-11-26 14:29:20', 'Christian Rasandy menambah data sim_q_option Kuning', '::1', 2, '2023-11-26 14:29:20'),
(1395, '2023-11-26 14:29:35', 'Christian Rasandy menambah data sim_q_option Sensitif', '::1', 2, '2023-11-26 14:29:35'),
(1396, '2023-11-26 14:29:50', 'Christian Rasandy menambah data sim_q_option Bekas bercah rokok atau kafein', '::1', 2, '2023-11-26 14:29:50'),
(1397, '2023-11-26 14:30:15', 'Christian Rasandy menambah data sim_q_option Ya, mengkonsumsi minuman kafein', '::1', 2, '2023-11-26 14:30:15'),
(1398, '2023-11-26 14:30:24', 'Christian Rasandy menambah data sim_q_option Ya, merokok', '::1', 2, '2023-11-26 14:30:24'),
(1399, '2023-11-26 14:30:47', 'Christian Rasandy menambah data sim_q_option Jarang (1-2x seminggu) minum kafein', '::1', 2, '2023-11-26 14:30:47'),
(1400, '2023-11-26 14:30:59', 'Christian Rasandy menambah data sim_q_option Jarang (1-2x seminggu) merokok', '::1', 2, '2023-11-26 14:30:59'),
(1401, '2023-11-26 14:31:06', 'Christian Rasandy menambah data sim_q_option Tidak sama sekali', '::1', 2, '2023-11-26 14:31:06'),
(1402, '2023-11-26 14:31:23', 'Christian Rasandy menambah data sim_q_option Gigi tampak lebih putih', '::1', 2, '2023-11-26 14:31:23'),
(1403, '2023-11-26 14:31:32', 'Christian Rasandy menambah data sim_q_option Gigi tidak sensitif', '::1', 2, '2023-11-26 14:31:32'),
(1404, '2023-11-26 14:31:43', 'Christian Rasandy menambah data sim_q_option Gigi tidak ada bercak', '::1', 2, '2023-11-26 14:31:43'),
(1405, '2023-11-26 14:33:37', 'administrator menghapus data sim_response dengan ID : 3', '::1', 2, '2023-11-26 14:33:37'),
(1406, '2023-11-26 14:33:39', 'administrator menghapus data sim_response dengan ID : 2', '::1', 2, '2023-11-26 14:33:39'),
(1407, '2023-11-26 14:33:40', 'administrator menghapus data sim_response dengan ID : 1', '::1', 2, '2023-11-26 14:33:40'),
(1408, '2023-11-26 14:33:57', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 14:33:57'),
(1409, '2023-11-26 16:48:53', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 16:48:53'),
(1410, '2023-11-26 16:50:06', 'administrator menghapus data sim_response dengan ID : 4', '::1', 2, '2023-11-26 16:50:06'),
(1411, '2023-11-26 16:50:22', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 16:50:22'),
(1412, '2023-11-26 17:06:27', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 17:06:27'),
(1413, '2023-11-26 17:31:20', 'Christian Rasandy menambah data sim_goals ee', '::1', 2, '2023-11-26 17:31:20'),
(1414, '2023-11-26 17:41:43', 'Christian Rasandy mengubah data sim_q_option dengan ID - nama = 4 - Berat badan ideal', '::1', 2, '2023-11-26 17:41:43'),
(1415, '2023-11-26 17:45:20', 'Christian Rasandy mengubah data sim_goals dengan ID - nama = 1 - ee', '::1', 2, '2023-11-26 17:45:20'),
(1416, '2023-11-26 18:18:05', 'Christian Rasandy mengubah data sim_goals dengan ID - nama = 1 - ee', '::1', 2, '2023-11-26 18:18:05'),
(1417, '2023-11-26 18:19:27', 'Christian Rasandy mengubah data sim_goals dengan ID - nama = 1 - Berat badan ideal', '::1', 2, '2023-11-26 18:19:27'),
(1418, '2023-11-26 18:21:04', 'Christian Rasandy menambah data sim_goals Kulit cerah', '::1', 2, '2023-11-26 18:21:04'),
(1419, '2023-11-26 18:21:59', 'Christian Rasandy menambah data sim_goals Bebas dari jerawat', '::1', 2, '2023-11-26 18:21:59'),
(1420, '2023-11-26 18:22:40', 'Christian Rasandy menambah data sim_goals Kulit lebih kenyal', '::1', 2, '2023-11-26 18:22:40'),
(1421, '2023-11-26 18:23:04', 'Christian Rasandy menambah data sim_goals Garis halus berkurang', '::1', 2, '2023-11-26 18:23:04'),
(1422, '2023-11-26 18:23:33', 'Christian Rasandy menambah data sim_goals Bulu mata lebat', '::1', 2, '2023-11-26 18:23:33'),
(1423, '2023-11-26 18:24:08', 'Christian Rasandy menambah data sim_goals Bibir pink alami', '::1', 2, '2023-11-26 18:24:08'),
(1424, '2023-11-26 18:24:41', 'Christian Rasandy menambah data sim_goals Area lipatan cerah', '::1', 2, '2023-11-26 18:24:41'),
(1425, '2023-11-26 18:25:08', 'Christian Rasandy menambah data sim_goals Serat terpenuhi', '::1', 2, '2023-11-26 18:25:08'),
(1426, '2023-11-26 18:25:20', 'Christian Rasandy menambah data sim_goals Tidak mudah lapar', '::1', 2, '2023-11-26 18:25:20'),
(1427, '2023-11-26 18:25:37', 'Christian Rasandy menambah data sim_goals Berhenti ngemil', '::1', 2, '2023-11-26 18:25:37'),
(1428, '2023-11-26 18:26:23', 'Christian Rasandy menambah data sim_goals Gigi tampak lebih putih', '::1', 2, '2023-11-26 18:26:23'),
(1429, '2023-11-26 18:26:43', 'Christian Rasandy menambah data sim_goals Gigi tidak sensitif', '::1', 2, '2023-11-26 18:26:43'),
(1430, '2023-11-26 18:27:00', 'Christian Rasandy menambah data sim_goals Gigi tidak ada bercak', '::1', 2, '2023-11-26 18:27:00'),
(1431, '2023-11-26 18:27:32', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 18:27:32'),
(1432, '2023-11-26 18:29:33', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 10 - Goals yang ingin dicapai', '::1', 2, '2023-11-26 18:29:33'),
(1433, '2023-11-26 18:39:29', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 18:39:29'),
(1434, '2023-11-26 18:41:43', 'Christian Rasandy menambah data sim response ', '::1', 2, '2023-11-26 18:41:43'),
(1435, '2023-11-27 08:50:40', 'muhammad danil melakukan login ke sistem', '::1', 9, '2023-11-27 08:50:40'),
(1436, '2023-11-27 08:51:09', 'muhammad danil melakukan login ke sistem', '::1', 9, '2023-11-27 08:51:09'),
(1437, '2023-11-27 09:04:18', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-27 09:04:18'),
(1438, '2023-11-27 09:06:10', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-27 09:06:10'),
(1439, '2023-11-27 09:07:46', 'ChindyElfianaSN  melakukan login ke sistem', '::1', 10, '2023-11-27 09:07:46'),
(1440, '2023-11-27 09:07:59', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-27 09:07:59'),
(1441, '2023-11-27 09:08:19', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-27 09:08:19'),
(1442, '2023-11-27 09:09:21', 'ChindyElfianaSN  melakukan login ke sistem', '::1', 10, '2023-11-27 09:09:21'),
(1443, '2023-11-28 09:05:31', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-28 09:05:31'),
(1444, '2023-11-28 09:12:31', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-28 09:12:31'),
(1445, '2023-11-28 09:28:26', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 2 - Jenis Kelamin', '::1', 2, '2023-11-28 09:28:26'),
(1446, '2023-11-28 09:28:36', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 3 - Kegiatan Harian', '::1', 2, '2023-11-28 09:28:36'),
(1447, '2023-11-28 10:02:18', 'Christian Rasandy mengubah data consult_question dengan ID - nama = 5 - Specific Problem', '::1', 2, '2023-11-28 10:02:18'),
(1448, '2023-11-28 10:18:01', 'muhammad danil menambah data consult response ', '::1', 11, '2023-11-28 10:18:01'),
(1449, '2023-11-28 10:24:29', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama = 1 - Man', '::1', 2, '2023-11-28 10:24:29'),
(1450, '2023-11-28 10:24:35', 'Christian Rasandy mengubah data consult_q_option dengan ID - nama = 2 - Woman', '::1', 2, '2023-11-28 10:24:35'),
(1451, '2023-11-28 10:58:02', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 4 - Permasalahan Spesifik', '::1', 2, '2023-11-28 10:58:02'),
(1452, '2023-11-28 10:58:49', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 5 - Bentuk Tubuh Yang Paling Mendekati', '::1', 2, '2023-11-28 10:58:49'),
(1453, '2023-11-28 11:14:42', 'Christian Rasandy menambah data sim_q_option body-1.png', '::1', 2, '2023-11-28 11:14:42'),
(1454, '2023-11-28 11:15:34', 'administrator menghapus data sim_q_option dengan ID : 43 - ', '::1', 2, '2023-11-28 11:15:34'),
(1455, '2023-11-28 11:15:42', 'Christian Rasandy menambah data sim_q_option option-20231128111542-6632.png', '::1', 2, '2023-11-28 11:15:42'),
(1456, '2023-11-28 11:19:10', 'Christian Rasandy menambah data sim_q_option option-20231128111910-9325.png', '::1', 2, '2023-11-28 11:19:10'),
(1457, '2023-11-28 11:19:17', 'Christian Rasandy menambah data sim_q_option option-20231128111917-1805.png', '::1', 2, '2023-11-28 11:19:17'),
(1458, '2023-11-28 11:19:22', 'Christian Rasandy menambah data sim_q_option option-20231128111922-4874.png', '::1', 2, '2023-11-28 11:19:22'),
(1459, '2023-11-28 11:19:27', 'Christian Rasandy menambah data sim_q_option option-20231128111927-8575.png', '::1', 2, '2023-11-28 11:19:27'),
(1460, '2023-11-28 11:52:58', 'Christian Rasandy menambah data sim_question Kulit seberapa cerah goals (Reguler)', '::1', 2, '2023-11-28 11:52:58'),
(1461, '2023-11-28 11:53:59', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 17 - Kulit seberapa cerah goals (Regular)', '::1', 2, '2023-11-28 11:53:59'),
(1462, '2023-11-28 11:55:42', 'Christian Rasandy menambah data sim_question Bibir seberapa pink goals (Regular)', '::1', 2, '2023-11-28 11:55:42'),
(1463, '2023-11-28 11:56:11', 'Christian Rasandy menambah data sim_question Gigi seberapa cerah goals (Regular)', '::1', 2, '2023-11-28 11:56:11'),
(1464, '2023-11-29 19:30:11', 'Portal Studio melakukan login ke sistem', '::1', 1, '2023-11-29 19:30:11'),
(1465, '2023-11-30 11:33:57', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-30 11:33:57'),
(1466, '2023-11-30 11:45:54', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-30 11:45:54'),
(1467, '2023-11-30 11:51:47', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-30 11:51:47'),
(1468, '2023-11-30 12:51:31', 'muhammad danil menambah data sim response ', '::1', 11, '2023-11-30 12:51:31'),
(1469, '2023-11-30 13:15:35', 'Christian Rasandy melakukan login ke sistem', '::1', 2, '2023-11-30 13:15:35'),
(1470, '2023-11-30 13:18:10', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 17 - Kulit seberapa cerah goals (Regular)', '::1', 2, '2023-11-30 13:18:10'),
(1471, '2023-11-30 13:19:37', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 17 - Kulit seberapa cerah goals (Regular)', '::1', 2, '2023-11-30 13:19:37'),
(1472, '2023-11-30 13:19:50', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 18 - Bibir seberapa pink goals (Regular)', '::1', 2, '2023-11-30 13:19:50'),
(1473, '2023-11-30 13:21:24', 'Christian Rasandy mengubah data sim_question dengan ID - nama = 19 - Gigi seberapa cerah goals (Regular)', '::1', 2, '2023-11-30 13:21:24'),
(1474, '2023-11-30 13:30:43', 'muhammad danil menambah data sim response ', '::1', 11, '2023-11-30 13:30:43'),
(1475, '2023-11-30 13:59:53', 'muhammad danil menambah data sim response ', '::1', 11, '2023-11-30 13:59:53'),
(1476, '2023-11-30 14:11:17', 'Christian Rasandy mengubah data sim_goals dengan ID - nama = 2 - Kulit cerah', '::1', 2, '2023-11-30 14:11:17'),
(1477, '2023-11-30 14:14:08', 'muhammad danil melakukan login ke sistem', '::1', 11, '2023-11-30 14:14:08'),
(1478, '2023-11-30 14:14:23', 'muhammad danil menambah data consult response ', '::1', 11, '2023-11-30 14:14:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_optical_layout`
--

CREATE TABLE `tbl_optical_layout` (
  `optical_id` int(11) NOT NULL,
  `optical_name` varchar(128) NOT NULL,
  `optical_cover` varchar(128) NOT NULL,
  `optical_distance` varchar(128) NOT NULL,
  `optical_distance_walk` int(24) NOT NULL,
  `optical_distance_vehicle` int(24) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_optical_layout`
--

INSERT INTO `tbl_optical_layout` (`optical_id`, `optical_name`, `optical_cover`, `optical_distance`, `optical_distance_walk`, `optical_distance_vehicle`, `createtime`) VALUES
(2, 'Binus School', 'optical-2-20231030131838.jpeg', '0,5', 5, 1, '2023-10-30 05:18:38'),
(3, 'Kunciran Toll', 'optical-3-20231030123454.jpg', '3', 15, 5, '2023-10-30 04:34:54'),
(4, 'Airport Toll', 'optical-4-20231031171328.jpg', '2', 15, 10, '2023-10-31 09:13:28'),
(5, 'Santa Laurensia School', 'optical-5-20231030123352.png', '0,1', 2, 1, '2023-11-13 06:34:30'),
(6, 'Santo Laurensius', 'optical-6-20231113143051.jpg', '0,2', 2, 1, '2023-11-13 06:35:02'),
(7, 'Sport Lounge', 'optical-7-20231031171534.jpg', '0,1', 1, 1, '2023-11-13 06:31:35'),
(8, 'Living World Mall', 'optical-8-20231030123035.jpg', '1', 5, 2, '2023-10-30 04:30:35'),
(9, 'Alam Sutera Mall', 'optical-9-20231030123123.jpg', '2', 15, 5, '2023-10-30 04:31:23'),
(11, 'Binus Univ.', 'optical-11-20231030122553.png', '2', 10, 5, '2023-11-13 06:28:06'),
(12, 'Bunda Mulia Univ.', 'optical-12-20231030122143.png', '2', 10, 5, '2023-11-13 06:27:58'),
(13, 'Swiss German Univ.', 'optical-13-20231031171736.png', '2', 10, 6, '2023-11-13 06:27:48'),
(14, 'Central Living District', 'optical-20231113143732.png', '2', 15, 5, '2023-11-13 07:37:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text,
  `product_cover` text NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_cover`, `product_status`, `updatetime`, `createtime`) VALUES
(1, 'Brightlogy Whitening Kit', NULL, 'thumbnailproduct-20231124130254.png', 'Aktif', '2023-11-24 13:02:54', '2023-11-23 11:36:54'),
(3, 'Fitlogy TEA DRINK/Detox Tea', NULL, 'thumbnailproduct-20231124130447.png', 'Aktif', '2023-11-24 13:04:47', '2023-11-24 13:04:47'),
(4, 'Growlogy Eyelash & Brow Serum', NULL, 'thumbnailproduct-20231124130529.png', 'Aktif', '2023-11-24 13:05:29', '2023-11-24 13:05:29'),
(5, 'Brightlogy Collagen Drink (Revamp)', NULL, 'thumbnailproduct-20231124130547.png', 'Aktif', '2023-11-24 13:05:47', '2023-11-24 13:05:47'),
(6, 'LIP SERUM', NULL, 'thumbnailproduct-20231124130607.png', 'Aktif', '2023-11-24 13:06:07', '2023-11-24 13:06:07'),
(7, 'Brightlogy Body Lotion', NULL, 'thumbnailproduct-20231124130625.png', 'Aktif', '2023-11-24 13:06:25', '2023-11-24 13:06:25'),
(8, 'UNDERARM SERUM', NULL, 'thumbnailproduct-20231124130641.png', 'Aktif', '2023-11-24 13:06:41', '2023-11-24 13:06:41'),
(9, 'Acnalogy Powder Drink', NULL, 'thumbnailproduct-20231124130658.png', 'Aktif', '2023-11-24 13:06:58', '2023-11-24 13:06:58'),
(10, 'Keauty Collagen', '', 'thumbnailproduct-20231124130736.png', 'Aktif', '2023-11-24 13:07:36', '2023-11-24 13:07:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product_service`
--

CREATE TABLE `tbl_product_service` (
  `product_service_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_service_name` varchar(255) NOT NULL,
  `product_service_description` text NOT NULL,
  `product_service_status` varchar(255) NOT NULL,
  `updatetime` datetime NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_product_service`
--

INSERT INTO `tbl_product_service` (`product_service_id`, `product_id`, `product_service_name`, `product_service_description`, `product_service_status`, `updatetime`, `createtime`) VALUES
(1, 1, 'Rangkaian Treatment', '<p>Satu rangkaian treatment adalah 7-14 hari berturut2 kk. Dan dipakai 2x kak dlm 1 hari ❤️', 'Aktif', '2023-11-24 13:08:49', '2023-11-23 12:14:02'),
(2, 1, 'Hasil Permanen', '<p>Hai NewGen, untuk hasil akan bertahan 3-4 bulan kak ', 'Aktif', '2023-11-24 13:14:33', '2023-11-24 13:14:33'),
(3, 1, 'Bumil/Busui', '<p>Aman kak untuk bumil &amp; busui, dikarenakan produk Newlab ini pemakaiannya hanya diluar, dan seperti odol hanya dioles di gigi lalu dikumur &amp; dibuang stlh 15 menit (tidak ditelan) jadi tidak akan masuk ke aliran darah sama sekali dan tidak akan \'mengganggu\' si baby ya kak ', 'Aktif', '2023-11-24 13:14:54', '2023-11-24 13:14:54'),
(4, 1, 'Tambalan/Palsu/Veneer', '<p>Hai NewGen, untuk gigi palsu, gigi tambalan bahkan veneer bisa lebih putih kak, bahkan Youtuber Saddy Aulia sudah membuktikan ya kak, dgn veneer gigi lebih putih 1 tingkat slm 3x pemakaian saja ❤️', 'Aktif', '2023-11-24 13:15:40', '2023-11-24 13:15:40'),
(5, 1, 'Pakai Behel', '<p>Untuk behel bisa kakak syg ', 'Aktif', '2023-11-24 13:16:03', '2023-11-24 13:16:03'),
(6, 1, 'Karang Gigi', '<p>Hai NewGen,,untuk karang gigi belum bs kak', 'Aktif', '2023-11-24 13:16:20', '2023-11-24 13:16:20'),
(7, 1, 'Gak Putih Putih', '<p>Hai NewGen, untuk hasil maksimal dipakai 14x ya kak</p>\r\n<p>Dan sekali pemakaian @30 menit kk utk maksimal hasilnya ', 'Aktif', '2023-11-24 13:16:52', '2023-11-24 13:16:52'),
(8, 1, 'Efek Samping', '<p>100% aman dr efek samping &amp; aman bagi gigi sensitif jg, serta sudah FDA approved ya dear ❤️', 'Aktif', '2023-11-24 13:17:09', '2023-11-24 13:17:09'),
(9, 1, 'Pemakaian 30 menit', '<p>Durasi pemakaian normal 15 mnit ya kak, namun untuk gigi membandel diperbolehkan maksimal 30 mnit kak say ', 'Aktif', '2023-11-24 13:17:30', '2023-11-24 13:17:30'),
(10, 1, 'Ngilu', '<p>Kalau ngilu, ada kemungkinan karena gigi sensitif yah kak say', 'Aktif', '2023-11-24 13:17:41', '2023-11-24 13:17:41'),
(11, 1, 'Gigi Gingsul Gak Rata', '<p>Hai NewGen, untuk gigi gingsul ataupun gak rata bisa ya kak ❤️', 'Aktif', '2023-11-24 13:18:08', '2023-11-24 13:18:08'),
(12, 1, 'Expired', '<p>1 pen expired 1 tahun ya kak, pen biasanya di produksi 14-21 hari sblm dikirm ke customer kak ', 'Aktif', '2023-11-24 13:18:21', '2023-11-24 13:18:21'),
(13, 1, 'Gigi Berlubang', '<p>Hai NewGen, untuk gigi berlubang ada baiknya di tambal dlu ya kak, kena secara kesehatan&nbsp; gigi berlubang memang sebaiknya ditangani segera kak ', 'Aktif', '2023-11-24 13:18:46', '2023-11-24 13:18:46'),
(14, 1, 'Tutorial', '<p>Untuk cara pakai Brightlogy Whitening Kit Newlab sgt mudah kak:</p>\r\n<p>1. Sikat gigi &amp; lap gigi. Jangan lupa bandingkan warna gigi saat ini dgn teeth shade guide card kak</p>\r\n<p>2. Putar bagian blkg Whitening Pen, hingga Gel keluar &amp; oleskan merata ke gigi (kira2 1mm per gigi)</p>\r\n<p>3. Hidupkan mini LED (untuk petama penggunaan jangan lupa melepas pengangga baterai agar bisa hidup) &amp; pasangkan kedalam mulut selama 30 menit</p>\r\n<p>4. Kumur dgn air bersih</p>\r\n<p>5. Bersihkan Mouth Tray LED dg tissue</p>\r\n<p>6. Disarankan setelah pemakaian, tidak makan/minum yg berwarna 1 jam setelahnya kk</p>\r\n<p>&nbsp;</p>\r\n<p>Newlab bisa dipakai 1-2x sehari selama 7-14 hari berturut-turut untuk gigi putih maksimal ', 'Aktif', '2023-11-24 13:22:03', '2023-11-24 13:22:03'),
(15, 1, 'Mini LED gak nyala', '<p>Hai NewGen, bisa dibuka di bagian belakang di sela-sela baterai ada plastik silahkan dikeluarkan plastiknya dulu kak dan bisa dipsang kembali baterainya dengan posisi tulisan baterai mnghdap keatas ya kk ', 'Aktif', '2023-11-24 13:22:26', '2023-11-24 13:22:26'),
(16, 1, 'Bilas Mini LED', '<p>Hai NewGen, bisa dilap dengan tisu di bagian yang menempel pada gigi agar lebih aman yaa kak', 'Aktif', '2023-11-24 13:22:48', '2023-11-24 13:22:48'),
(17, 1, 'Pakai Baterai', '<p>Hai NewGen, untuk Brightlogy Whitening Kit menggunakan jenis baterai kancing dmna bisa diganti saat habis ya kk ', 'Aktif', '2023-11-24 13:23:03', '2023-11-24 13:23:03'),
(18, 1, 'Baterai Habis', '<p>Hai NewGen, jika baterai Mini LED habis, bisa dibelikan di toko terdekat dngan jenis baterai kancing ya kk ', 'Aktif', '2023-11-24 13:23:19', '2023-11-24 13:23:19'),
(19, 1, 'Kena Gusi/Lidah', '<p>Hai NewGen, ada baiknya tidak terkena lidah dan gusi ya untuk gelnya, dikhawatirkan iritasi kecil sma sprt mnggunakan shampoo yang kena mata kak ', 'Aktif', '2023-11-24 13:23:42', '2023-11-24 13:23:42'),
(20, 1, 'Minimum Usia', '<p>Hai NewGen, untuk penggunaan Brightlogy Whitening Kit disarankan untuk usia 13th keatas ya kak ', 'Aktif', '2023-11-24 13:23:58', '2023-11-24 13:23:58'),
(21, 1, 'Garansi', '<p>Hai NewGen, mohon maaf kak, garansi dari kami jika kerusakannya memang dari pabrik pasti kami ganti kaka, namun jika kerusakannya dikarenakan kekeliruan pengguna, mohon maaf kami sulit untuk membantu untuk penggantian barang kak, sekali lagi mohon maaf yaa kak', 'Aktif', '2023-11-24 13:24:15', '2023-11-24 13:24:15'),
(22, 1, 'Jenis Batrai', '<p>Hai NewGen, untuk jenis dan ukuran batrai nya batrai kancing 3V dan bisa didapatkan di toko terdekat ya kak ', 'Aktif', '2023-11-24 13:24:29', '2023-11-24 13:24:29'),
(23, 1, 'Hasil terlihat', '<p>Untuk hasil rata2 sudah terlihat 3-5 hari ya kak.</p>\r\n<p>Tp kembali ke warna gigi masing2 lagi kak, krna kekuningan gigi setiap orang beda-beda kak, jd keceptan putih nya beda2 kak tetap rutin menggunkn teeth whiteningny selama 14 hari ya kak untuk mendapat hasil yg maksimal kak ', 'Aktif', '2023-11-24 13:25:00', '2023-11-24 13:25:00'),
(24, 1, 'Mini Led Mati', '<p>Hai NewGen mohon maaf atas ketidaknyamnnya ya kak ', 'Aktif', '2023-11-24 13:25:15', '2023-11-24 13:25:15'),
(25, 1, 'Penawaran', '<p>Hai NewGen, apakah kakaknya punya keluhan Gigi Kuning juga kak? Jika iya, yuk cobain Teeth Whitening yg sdh memiliki 10.000 ++ testimoni dan Terbukti memutihkan Gigi dalam waktu 7-14 hari pemakaian ', 'Aktif', '2023-11-24 13:25:31', '2023-11-24 13:25:31'),
(26, 1, 'Retouch Lama', '<p>Hai NewGen, karena kalau terlalu intense jg kurang baik ', 'Aktif', '2023-11-24 13:26:34', '2023-11-24 13:26:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(24) NOT NULL,
  `project_name` varchar(128) NOT NULL,
  `project_cover` varchar(128) NOT NULL,
  `project_description` text NOT NULL,
  `project_bedroom` varchar(128) NOT NULL,
  `project_bathroom` varchar(128) NOT NULL,
  `project_luas` int(128) NOT NULL,
  `project_price` varchar(128) NOT NULL,
  `update_at` datetime NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_project`
--

INSERT INTO `tbl_project` (`project_id`, `project_name`, `project_cover`, `project_description`, `project_bedroom`, `project_bathroom`, `project_luas`, `project_price`, `update_at`, `createtime`) VALUES
(5, 'Sutera Nykka', 'project-20231112213857.jpg', '<p>Nykka is located inside the previously existing Sutera Narada and is complete with many facilities like club house and sport lounge center. This neighbour is also surrounded by trees which makes the environment very convenient and comfortable to live in. This is the answer to the pollution problem which has recently become a major problem in large cities such as Jakarta and Tangerang. Nykka at Sutera Narada is also very comfortable and safe for walkers and joggers. Directly close to Santa Laurensius Church and Santa Laurensia School makes it easy to reach by just walking.\"</p>\r\n<p>\"</p>', '3+1', '2+1', 135, '3.832.000.000', '2023-11-12 21:38:57', '2023-11-12 13:38:57'),
(6, 'Sutera Winona', 'project-20231112213849.jpg', '<p>Sutera Winona berkonsep American Classic dengan 3 lantai yang luas. Lokasinya berada di jantung Alam Sutera dan bersebelahan dengan danau. Tentunya juga terbebas dari kebisingan masjid dan perumahan warga sekitar. Lokasinya juga sangat dekat dengan Tol Bandara dan Tol Kunciran. Tetangga di Alam Sutera sangat enak untuk berjalan dan berlari dan dikelilingi oleh Mall Alam Sutera dan Living World Mall di sampingnya. Nikmati kebebasan lalu lintas bebas.</p>\r\n<p>\"</p>', '5+1', '5+1', 277, '5.464.000.000', '2023-11-12 21:38:49', '2023-11-12 13:38:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_project_gallery`
--

CREATE TABLE `tbl_project_gallery` (
  `project_gallery_id` int(24) NOT NULL,
  `project_gallery_image` varchar(128) NOT NULL,
  `project_gallery_token` varchar(128) NOT NULL,
  `project_id` int(24) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_project_gallery`
--

INSERT INTO `tbl_project_gallery` (`project_gallery_id`, `project_gallery_image`, `project_gallery_token`, `project_id`, `createtime`) VALUES
(6, 'photo2-20231023020013-2136.JPG', 'token-20231023020002-0.6727490364708544', 2, '2023-10-22 18:00:13'),
(7, 'photo2-20231023020014-7883.JPG', 'token-20231023020002-0.8076734403085579', 2, '2023-10-22 18:00:14'),
(8, 'photo3-20231024044854-2176.jpg', 'token-20231024044842-0.03769299026115758', 3, '2023-10-23 20:48:54'),
(9, 'photo3-20231024044854-5161.jpg', 'token-20231024044842-0.18417362215464173', 3, '2023-10-23 20:48:54'),
(10, 'photo3-20231024044854-3345.jpg', 'token-20231024044842-0.5558200668494191', 3, '2023-10-23 20:48:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(20) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(30) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` varchar(100) NOT NULL,
  `setting_background` varchar(150) NOT NULL,
  `setting_instagram` varchar(150) NOT NULL,
  `setting_facebook` varchar(150) NOT NULL,
  `setting_youtube` varchar(150) NOT NULL,
  `setting_about` text,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_background`, `setting_instagram`, `setting_facebook`, `setting_youtube`, `setting_about`, `createtime`) VALUES
(1, 'Newlab+', 'NEWLAB+', 'NewLab Company', '089526221616', 'iqbaltahir1717@gmail.com', 'Jl Sutera Utama, Alam Sutera, Kec. Serpong Utara, Kota Tangerang Selatan', 'medicord120231122140747.png', 'background-login120231125010609.jpg', 'https://www.instagram.com/newlab.id/', 'https://www.facebook.com/newlab.id/', 'https://www.youtube.com/@Newlab_id', 'description about app', '2022-10-01 15:22:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sim_goals`
--

CREATE TABLE `tbl_sim_goals` (
  `sim_goals_id` int(11) NOT NULL,
  `sim_goals_text` varchar(111) NOT NULL,
  `product` text NOT NULL,
  `sim_goals_part` varchar(111) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_goals`
--

INSERT INTO `tbl_sim_goals` (`sim_goals_id`, `sim_goals_text`, `product`, `sim_goals_part`, `updatetime`, `createtime`) VALUES
(1, 'Berat badan ideal', '7', 'Body', '2023-11-26 18:19:27', '2023-11-26 17:31:20'),
(2, 'Kulit cerah', '1;9', 'Skin', '2023-11-30 14:11:17', '2023-11-26 18:21:04'),
(3, 'Bebas dari jerawat', '9', 'Skin', '2023-11-26 18:21:59', '2023-11-26 18:21:59'),
(4, 'Kulit lebih kenyal', '5', 'Skin', '2023-11-26 18:22:40', '2023-11-26 18:22:40'),
(5, 'Garis halus berkurang', '5', 'Skin', '2023-11-26 18:23:04', '2023-11-26 18:23:04'),
(6, 'Bulu mata lebat', '4', 'Skin', '2023-11-26 18:23:33', '2023-11-26 18:23:33'),
(7, 'Bibir pink alami', '5', 'Skin', '2023-11-26 18:24:08', '2023-11-26 18:24:08'),
(8, 'Area lipatan cerah', '7', 'Skin', '2023-11-26 18:24:41', '2023-11-26 18:24:41'),
(9, 'Serat terpenuhi', '5', 'Body', '2023-11-26 18:25:08', '2023-11-26 18:25:08'),
(10, 'Tidak mudah lapar', '5', 'Body', '2023-11-26 18:25:20', '2023-11-26 18:25:20'),
(11, 'Berhenti ngemil', '5', 'Skin', '2023-11-26 18:25:37', '2023-11-26 18:25:37'),
(12, 'Gigi tampak lebih putih', '7', 'Teeth', '2023-11-26 18:26:23', '2023-11-26 18:26:23'),
(13, 'Gigi tidak sensitif', '9', 'Teeth', '2023-11-26 18:26:43', '2023-11-26 18:26:43'),
(14, 'Gigi tidak ada bercak', '9', 'Teeth', '2023-11-26 18:27:00', '2023-11-26 18:27:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sim_question`
--

CREATE TABLE `tbl_sim_question` (
  `sim_question_id` int(11) NOT NULL,
  `sim_question_text` text NOT NULL,
  `sim_question_image` text,
  `sim_question_type` text NOT NULL,
  `sim_question_part` varchar(100) NOT NULL,
  `sim_question_multi` text NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_question`
--

INSERT INTO `tbl_sim_question` (`sim_question_id`, `sim_question_text`, `sim_question_image`, `sim_question_type`, `sim_question_part`, `sim_question_multi`, `updatetime`, `createtime`) VALUES
(1, 'Berat Badan', NULL, 'number', 'Body', 'N', '2023-11-24 17:51:27', '2023-11-24 17:51:27'),
(2, 'Tinggi Badan', NULL, 'number', 'Body', 'N', '2023-11-24 17:51:44', '2023-11-24 17:51:44'),
(3, 'Lingkar Perut', NULL, 'number', 'Body', 'N', '2023-11-24 17:52:01', '2023-11-24 17:52:01'),
(4, 'Permasalahan Spesifik', NULL, 'textarea', 'Body', 'N', '2023-11-28 10:58:02', '2023-11-24 17:52:17'),
(5, 'Bentuk Tubuh Yang Paling Mendekati', NULL, 'radio', 'Body', 'N', '2023-11-28 10:58:49', '2023-11-24 17:53:28'),
(6, 'Apakah kamu menjaga pola makan dan hidup sehat?', NULL, 'dropdown', 'Body', 'N', '2023-11-24 17:54:10', '2023-11-24 17:54:10'),
(7, 'Upload skin picture(Wajah / Badan)', NULL, 'file', 'Skin', 'N', '2023-11-26 14:13:52', '2023-11-26 14:13:52'),
(8, 'Kondisi kulit saat ini', NULL, 'dropdown', 'Skin', 'N', '2023-11-26 14:14:12', '2023-11-26 14:14:12'),
(9, 'Bagian tubuh mana yang bermasalah ?', NULL, 'dropdown', 'Skin', 'N', '2023-11-26 14:14:49', '2023-11-26 14:14:49'),
(10, 'Goals yang ingin dicapai', NULL, 'dropdown', 'Body', 'Y', '2023-11-26 18:29:33', '2023-11-26 14:16:40'),
(11, 'Target turunnya berat badan', NULL, 'dropdown', 'Body', 'N', '2023-11-26 14:17:10', '2023-11-26 14:17:10'),
(12, 'Goals yang ingin dicapai', NULL, 'dropdown', 'Skin', 'Y', '2023-11-26 14:21:11', '2023-11-26 14:21:11'),
(13, 'Upload foto gigi', NULL, 'file', 'Teeth', 'N', '2023-11-26 14:22:41', '2023-11-26 14:22:41'),
(14, 'Kondisi gigi saat ini', NULL, 'dropdown', 'Teeth', 'N', '2023-11-26 14:28:28', '2023-11-26 14:22:58'),
(15, 'Apakah sering mengkonsumsi minuman kafein dan merokok', NULL, 'dropdown', 'Teeth', 'N', '2023-11-26 14:23:28', '2023-11-26 14:23:28'),
(16, 'Goals yang ingin dicapai', NULL, 'dropdown', 'Teeth', 'Y', '2023-11-26 14:23:51', '2023-11-26 14:23:51'),
(17, 'Kulit seberapa cerah goals (Regular)', 'question-20231130131937-5257.png', 'info', 'Skin', 'N', '2023-11-30 13:19:37', '2023-11-28 11:52:58'),
(18, 'Bibir seberapa pink goals (Regular)', 'question-20231130131950-4261.png', 'info', 'Skin', 'N', '2023-11-30 13:19:50', '2023-11-28 11:55:42'),
(19, 'Gigi seberapa cerah goals (Regular)', 'question-20231130132124-4323.png', 'info', 'Teeth', 'N', '2023-11-30 13:21:24', '2023-11-28 11:56:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sim_q_option`
--

CREATE TABLE `tbl_sim_q_option` (
  `sim_q_option_id` int(11) NOT NULL,
  `sim_q_option_text` text NOT NULL,
  `sim_question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_q_option`
--

INSERT INTO `tbl_sim_q_option` (`sim_q_option_id`, `sim_q_option_text`, `sim_question_id`) VALUES
(1, 'Ya, saya rutin berolahraga juga mengkonsumsi cukup serat dan protein', 6),
(2, 'Kadang-kadang berolahraga dan mengaja pola makan (>2x seminggu)', 6),
(3, 'Tidak sama sekali, jarang berolahraga dan bebas makan', 6),
(4, 'Berat badan ideal', 10),
(5, 'Serat terpenuhi', 10),
(6, 'Tidak mudah lapar', 10),
(7, 'Berhenti ngemil', 10),
(8, 'Berat badan turun 1-3 kg dalam 14 hari', 11),
(9, 'Berat badan turun 5-8 kg dalam 14 hari', 11),
(10, 'Berat badan turun 8-10 kg dalam 14 hari', 11),
(11, 'Berat badan turun 1-3 kg dalam 30 hari', 11),
(12, 'Berat badan turun 5-8 kg dalam 30 hari', 11),
(13, 'Berat badan turun 8-10 kg dalam 30 hari', 11),
(14, 'Normal', 8),
(15, 'Kering', 8),
(16, 'Berminyak', 8),
(17, 'Sensitif', 8),
(18, 'Kombinasi', 8),
(19, 'Wajah', 9),
(20, 'Kulit tubuh', 9),
(21, 'Bulu mata', 9),
(22, 'Alis', 9),
(23, 'Bibir', 9),
(24, 'Area lipatan', 9),
(25, 'Kulit cerah', 12),
(26, 'Bebas dari jerawat', 12),
(27, 'Kulit lebih kenyal', 12),
(28, 'Garis halus berkurang', 12),
(29, 'Bulu mata lebat', 12),
(30, 'Bibir pink alami', 12),
(31, 'Area lipatan lebih cerah', 12),
(32, 'Kuning', 14),
(33, 'Sensitif', 14),
(34, 'Bekas bercah rokok atau kafein', 14),
(35, 'Ya, mengkonsumsi minuman kafein', 15),
(36, 'Ya, merokok', 15),
(37, 'Jarang (1-2x seminggu) minum kafein', 15),
(38, 'Jarang (1-2x seminggu) merokok', 15),
(39, 'Tidak sama sekali', 15),
(40, 'Gigi tampak lebih putih', 16),
(41, 'Gigi tidak sensitif', 16),
(42, 'Gigi tidak ada bercak', 16),
(44, 'option-20231128111542-6632.png', 5),
(45, 'option-20231128111910-9325.png', 5),
(46, 'option-20231128111917-1805.png', 5),
(47, 'option-20231128111922-4874.png', 5),
(48, 'option-20231128111927-8575.png', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sim_response`
--

CREATE TABLE `tbl_sim_response` (
  `sim_response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sim_response_name` varchar(111) NOT NULL,
  `sim_response_gender` varchar(111) NOT NULL,
  `sim_response_text` text,
  `daily_activity` varchar(111) NOT NULL,
  `problems_experienced` varchar(111) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_response`
--

INSERT INTO `tbl_sim_response` (`sim_response_id`, `user_id`, `sim_response_name`, `sim_response_gender`, `sim_response_text`, `daily_activity`, `problems_experienced`, `updatetime`, `createtime`) VALUES
(11, 11, 'danil', 'Woman', 'a:8:{i:0;a:2:{s:1:\"q\";s:12:\"Berat Badan \";s:1:\"r\";s:2:\"23\";}i:1;a:2:{s:1:\"q\";s:13:\"Tinggi Badan \";s:1:\"r\";s:2:\"12\";}i:2;a:2:{s:1:\"q\";s:14:\"Lingkar Perut \";s:1:\"r\";s:2:\"21\";}i:3;a:2:{s:1:\"q\";s:22:\"Permasalahan Spesifik \";s:1:\"r\";s:2:\"12\";}i:4;a:2:{s:1:\"q\";s:35:\"Bentuk Tubuh Yang Paling Mendekati \";s:1:\"r\";s:30:\"option-20231128111542-6632.png\";}i:5;a:2:{s:1:\"q\";s:48:\"Apakah kamu menjaga pola makan dan hidup sehat? \";s:1:\"r\";s:63:\"Kadang-kadang berolahraga dan mengaja pola makan (>2x seminggu)\";}i:6;a:2:{s:1:\"q\";s:25:\"Goals yang ingin dicapai \";s:1:\"r\";s:17:\"Berat badan ideal\";}i:7;a:2:{s:1:\"q\";s:28:\"Target turunnya berat badan \";s:1:\"r\";s:38:\"Berat badan turun 1-3 kg dalam 14 hari\";}}', 'Indoor', 'Body', '2023-11-30 13:44:10', '2023-11-30 13:30:43'),
(12, 11, 'aaa', 'Woman', 'a:6:{i:0;a:2:{s:1:\"q\";s:35:\"Upload skin picture(Wajah / Badan) \";s:1:\"r\";s:25:\"--20231130141147-7226.png\";}i:1;a:2:{s:1:\"q\";s:23:\"Kondisi kulit saat ini \";s:1:\"r\";s:9:\"Berminyak\";}i:2;a:2:{s:1:\"q\";s:36:\"Bagian tubuh mana yang bermasalah ? \";s:1:\"r\";s:5:\"Wajah\";}i:3;a:2:{s:1:\"q\";s:25:\"Goals yang ingin dicapai \";s:1:\"r\";s:1:\"2\";}i:4;a:2:{s:1:\"q\";s:37:\"Kulit seberapa cerah goals (Regular) \";s:1:\"r\";N;}i:5;a:2:{s:1:\"q\";s:36:\"Bibir seberapa pink goals (Regular) \";s:1:\"r\";N;}}', 'Indoor', 'Skin', '2023-11-30 14:11:47', '2023-11-30 13:59:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siteplan`
--

CREATE TABLE `tbl_siteplan` (
  `siteplan_id` int(24) NOT NULL,
  `siteplan_image1` varchar(128) NOT NULL,
  `siteplan_image2` varchar(128) NOT NULL,
  `siteplan_image1_description` text NOT NULL,
  `siteplan_image2_description` text NOT NULL,
  `siteplan_cluster` text NOT NULL,
  `siteplan_optical` text NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siteplan`
--

INSERT INTO `tbl_siteplan` (`siteplan_id`, `siteplan_image1`, `siteplan_image2`, `siteplan_image1_description`, `siteplan_image2_description`, `siteplan_cluster`, `siteplan_optical`, `createtime`) VALUES
(1, 'siteplan_image1-20231112005451.jpg', 'siteplan_image1-20231112005651.jpg', '<p>The Gramercy by Alam Sutera site plan is designed in such a way as to meet the comfortable living needs of its residents. Starting from considering wind direction, width of ROW roads within the cluster, to flood resistance. Gramercy itself has a total of 109 units which are divided into 2 stages. Phase 1 offers great pricing for investors and early buyers.</p>', '', '<p>Gramercy by Alam Sutera has the most complete facilities to support residents\' needs and makes it easier for residents to enjoy it by directly integrating the Alam Sutera Sport Center facilities which are directly connected to the Gramercy housing complex.</p>\r\n<p>Some of the facilities at the Alam Sutera Sport Center are:</p>\r\n<p>1. Swimming Pool</p>\r\n<p>2. Indoor Gym</p>\r\n<p>3. Tennis Court</p>\r\n<p>4. Basketball Court</p>\r\n<p>5. Badminton Court</p>', '<p>Gramercy by Alam Sutera has a very strategic location. This luxury cluster is located in the Alam Sutera Green Tunnel, which makes the air very cool and comfortable to live in. Alam Sutera is an environment that has proven to be very comfortable for walkers and runners.</p>\r\n<p>Directly close to Santa Laurensia School and Santa Laurensia Church, it also has other location advantages, such as:</p>\r\n<p>1. Only 1 minute to Alam Sutera Boulevard</p>\r\n<p>2. Only 2 minutes to Living World Mall</p>\r\n<p>3. Only 5 minutes to Alam Sutera Mall</p>\r\n<p>4. Only 10 minutes to Kunciran Toll Road</p>\r\n<p>5. Only 10 minutes to the Airport Toll Road</p>', '2023-11-13 05:12:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(24) NOT NULL,
  `unit_name` varchar(300) NOT NULL,
  `unit_bedroom` varchar(10) NOT NULL,
  `unit_bathroom` varchar(10) NOT NULL,
  `unit_luas` varchar(10) NOT NULL,
  `unit_description` text NOT NULL,
  `unit_preview1` varchar(128) NOT NULL,
  `unit_preview2` varchar(128) NOT NULL,
  `update_at` datetime NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`, `unit_bedroom`, `unit_bathroom`, `unit_luas`, `unit_description`, `unit_preview1`, `unit_preview2`, `update_at`, `createtime`) VALUES
(9, 'Alca', '4+1', '5+1', '398', '<h3>Absolutely incredible layout with full compact and spacious home.</h3>\r\n<blockquote>\r\n<p>Land Area</p>\r\n<p>Tipe Alca Show Unit 360 m2 ( 12 x 30 )</p>\r\n<p>Tipe Alca Standard 312 m2 ( 12 x 26 )</p>\r\n<p>Building Area 398 m2</p>\r\n<p>4+1 Luxury Bedroom</p>\r\n<p>5+1 Luxury Bathroom</p>\r\n<p>Imported Material</p>\r\n<p>Automatic Garage Door</p>\r\n<p>4 Carport</p>\r\n<p>Split Duct and Split Wall</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>AC FREE AC Installed</p>\r\n<p>FREE Wet Kitchen Set</p>\r\n<p>FREE Solar Water Heater</p>\r\n<p>FREE Smart Home System</p>\r\n<p>FREE Smart Door Lock</p>\r\n</blockquote>', 'unit-preview-1-20231113133802.jpg', 'unit-preview-2-20231111230058.png', '2023-11-13 13:38:02', '2023-11-13 05:38:02'),
(10, 'Aera', '4+1', '5+1', '451', '<h3>Enjoy the high ceiling floor in the living room for this type.</h3>\r\n<blockquote>\r\n<p>Land Area</p>\r\n<p>Tipe Aera+ 420 m2 ( 14 x 30 )</p>\r\n<p>Tipe Aera Standard 364 m2 ( 14 x 26 )</p>\r\n<p>Building Area 451 m2</p>\r\n<p>4+1 Luxury Bedroom</p>\r\n<p>5+1 Luxury Bathroom</p>\r\n<p>Imported Material</p>\r\n<p>Automatic Garage Door</p>\r\n<p>4 Carport</p>\r\n<p>Split Duct and Split Wall AC</p>\r\n<p>&nbsp;</p>\r\n<p>FREE AC Installed</p>\r\n<p>FREE Wet Kitchen Set</p>\r\n<p>FREE Solar Water Heater</p>\r\n<p>FREE Smart Home System</p>\r\n<p>FREE Smart Door Lock</p>\r\n</blockquote>', 'unit-preview-1-20231113133742.jpg', 'unit-preview-2-20231111225101.png', '2023-11-13 13:37:42', '2023-11-13 05:37:42'),
(11, 'Arma', '5+1', '6+1', '569', '<h3 style=\"text-align: left;\">The highest, luxurious and spacious in Gramercy Alam Sutera.</h3>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p style=\"text-align: left;\">Land Area 600 m2 ( 20 x 30 )</p>\r\n<p style=\"text-align: left;\">Building Area 569 m2</p>\r\n<p style=\"text-align: left;\">5+1 Luxury Bedroom</p>\r\n<p style=\"text-align: left;\">6+1 Luxury Bathroom</p>\r\n<p style=\"text-align: left;\">Master Bedroom up to 80 m2</p>\r\n<p style=\"text-align: left;\">Imported Material</p>\r\n<p style=\"text-align: left;\">Automatic Garage Door</p>\r\n<p style=\"text-align: left;\">4 Carport</p>\r\n<p style=\"text-align: left;\">Split Duct and Split Wall AC</p>\r\n</blockquote>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<blockquote>\r\n<p style=\"text-align: left;\">FREE AC Installed</p>\r\n<p style=\"text-align: left;\">FREE Wet Kitchen Set</p>\r\n<p style=\"text-align: left;\">FREE Solar Water Heater</p>\r\n<p style=\"text-align: left;\">FREE Smart Home System</p>\r\n<p style=\"text-align: left;\">FREE Smart Door Lock</p>\r\n</blockquote>', 'unit-preview-1-20231113133606.jpg', 'unit-preview-2-20231111215750.png', '2023-11-13 13:36:06', '2023-11-13 05:36:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_phone` varchar(24) NOT NULL,
  `user_photo` varchar(128) NOT NULL,
  `user_gender` varchar(111) DEFAULT NULL,
  `user_spesialis` varchar(24) NOT NULL,
  `user_category` varchar(24) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_photo`, `user_gender`, `user_spesialis`, `user_category`, `user_lastlogin`, `createtime`, `group_id`) VALUES
(1, 'Portal Studio', 'super_admin', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'portalstudio30@gmail.com', '', 'profile-1-20231018215545.jpg', NULL, '', '', '2022-10-05 21:47:20', '2022-10-05 21:47:20', 1),
(2, 'Christian Rasandy', 'administrator', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'christianrasandy@gmail.com', '', '', 'Laki-Laki', '', '', '0000-00-00 00:00:00', '2022-10-27 04:59:45', 2),
(8, 'ChindyElfianaSN ', 'ChindyElfianaSN ', '$2y$10$pz2wbQh8ETQagUranaDVXeX3zKSJqqJEB8PRbOL7sndRBJMe474UC', 'tes@gmail.com', '6289526221616', 'profile-1-20231018215545.jpg', NULL, 'Ahli Nutrisi', '1', '0000-00-00 00:00:00', '2023-10-29 22:56:09', 3),
(10, 'ChindyElfianaSN ', 'chindyelfiana@gmail.com', 'chindyelfiana@gmail.com', 'chindyelfiana@gmail.com', '', '', NULL, '', '', '0000-00-00 00:00:00', '2023-11-23 15:31:16', 4),
(11, 'muhammad danil', 'muhammaddanil790@gmail.com', 'muhammaddanil790@gmail.com', 'muhammaddanil790@gmail.com', '', '', NULL, '', '', '0000-00-00 00:00:00', '2023-11-27 09:04:18', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_content`
--

CREATE TABLE `tbl_web_content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(30) NOT NULL,
  `content_text` text NOT NULL,
  `content_image` varchar(50) NOT NULL,
  `content_menu` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_content`
--

INSERT INTO `tbl_web_content` (`content_id`, `content_title`, `content_text`, `content_image`, `content_menu`, `createtime`) VALUES
(1, 'Developer', '<p>apa</p>', 'content-20210611091905.png', 'developer', '2023-10-30 20:25:28'),
(2, 'Privacy Policy', '<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Terimakasih telah mengunjungi website Gramercy by Alam Sutera yang dioperasikan oleh broker agent PT Property Cuan Nusantara. Gramercy by Alam Sutera adalah cluster / komplek &nbsp;perumahan yang diluncurkan oleh Alam Sutera Realty Tbk pada akhir tahun 2023, dan ditujukan kepada penggemar area Alam Sutera dan sekitarnya. Cluster ini adalah cluster terakhir yang akan berada di kawasan Alam Sutera.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Adanya Kebijakan Privasi ini adalah komitmen dari Property Cuan untuk menghargai dan melindungi berbagai data dan informasi pribadi kamu yang mengakses situs gramercy.id dan situs-situs turunannya.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Kebijakan Privasi ini (beserta syarat-syarat penggunaan dari situs titipkirimin sebagaimana tercantum dalam &ldquo;Syarat &amp; Ketentuan&rdquo; dan informasi lain yang tercantum di Situs) menetapkan dasar atas perolehan, pengumpulan, pengolahan, penganalisisan, penampilan, pembukaan, dan/atau segala bentuk pengelolaan yang terkait dengan data atau informasi yang Pengguna berikan kepada Property Cuan atau yang Property Cuan kumpulkan dari Pengguna, termasuk data pribadi Pengguna, baik pada saat Pengguna melakukan pendaftaran di Situs, mengakses Situs, maupun mempergunakan layanan-layanan pada Situs (selanjutnya disebut sebagai &ldquo;data&rdquo;).</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Dengan mengakses dan/atau mempergunakan layanan Property Cuan, Pengguna menyatakan bahwa setiap data Pengguna merupakan data yang benar dan sah, serta Pengguna memberikan persetujuan kepada Property Cuan untuk memperoleh, mengumpulkan, menyimpan, mengelola dan mempergunakan data tersebut sebagaimana tercantum dalam Kebijakan Privasi maupun Syarat dan Ketentuan Property Cuan.</p>\r\n<p>Perolehan dan Pengumpulan Data Pengguna</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Property Cuan mengumpulkan data Pengguna dengan tujuan untuk memproses transaksi Pengguna, mengelola dan memperlancar proses penggunaan Situs, serta tujuan-tujuan lainnya selama diizinkan oleh peraturan perundang-undangan yang berlaku. Adapun data Pengguna yang dikumpulkan adalah sebagai berikut:</p>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Data yang diserahkan secara mandiri oleh Pengguna, termasuk namun tidak terbatas pada data yang diserahkan pada saat Pengguna:</li>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Membuat atau memperbarui akun gramercy.id, termasuk diantaranya nama pengguna (username), alamat email, nomor telepon, password, alamat, foto, dan lain-lain.</li>\r\n<li style=\"box-sizing: inherit;\">Menghubungi Property Cuan / Christian Rasandy, termasuk melalui layanan konsumen</li>\r\n<li style=\"box-sizing: inherit;\">Mengisi survei yang dikirimkan oleh Property Cuan atau atas nama Property Cuan;</li>\r\n<li style=\"box-sizing: inherit;\">Mempergunakan layanan-layanan pada Situs, termasuk data transaksi yang detil, diantaranya jenis, jumlah dan/atau keterangan dari produk atau layanan yang dibeli, alamat pengiriman, kanal pembayaran yang digunakan, jumlah transaksi, tanggal dan waktu transaksi, serta detil transaksi lainnya;</li>\r\n<li style=\"box-sizing: inherit;\">Mengisi data-data pembayaran pada saat Pengguna melakukan aktivitas transaksi pembayaran melalui Situs, termasuk namun tidak terbatas pada data rekening bank, kartu kredit, virtual account, instant payment, internet banking, gerai ritel; dan/atau</li>\r\n<li style=\"box-sizing: inherit;\">Menggunakan fitur yang membutuhkan izin akses terhadap perangkat Pengguna.</li>\r\n</ol>\r\n<li style=\"box-sizing: inherit;\">Data yang diserahkan secara mandiri oleh Pengguna, termasuk namun tidak terbatas pada data yang diserahkan pada saat Pengguna:</li>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Data lokasi riil atau perkiraannya seperti alamat IP, lokasi Wi-Fi, geo-location, dan sebagainya;</li>\r\n<li style=\"box-sizing: inherit;\">Data berupa waktu dari setiap aktivitas Pengguna, termasuk aktivitas pendaftaran, login, transaksi, dan lain sebagainya;</li>\r\n<li style=\"box-sizing: inherit;\">Data penggunaan atau preferensi Pengguna, diantaranya interaksi Pengguna dalam menggunakan Situs, pilihan yang disimpan, serta pengaturan yang dipilih. Data tersebut diperoleh menggunakan cookies, pixel tags, dan teknologi serupa yang menciptakan dan mempertahankan pengenal unik;</li>\r\n<li style=\"box-sizing: inherit;\">Data perangkat, diantaranya jenis perangkat yang digunakan untuk mengakses Situs, termasuk model perangkat keras, sistem operasi dan versinya, perangkat lunak, nama file dan versinya, pilihan bahasa, pengenal perangkat unik, pengenal iklan, nomor seri, informasi gerakan perangkat, dan/atau informasi jaringan seluler;</li>\r\n<li style=\"box-sizing: inherit;\">Data catatan (log), diantaranya catatan pada server yang menerima data seperti alamat IP perangkat, tanggal dan waktu akses, fitur aplikasi atau laman yang dilihat, proses kerja aplikasi dan aktivitas sistem lainnya, jenis peramban, dan/atau situs atau layanan pihak ketiga yang Anda gunakan sebelum berinteraksi dengan Situs.</li>\r\n<li style=\"box-sizing: inherit;\">Data yang diperoleh dari sumber lain, termasuk:</li>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Mitra usaha Property Cuan yang turut membantu Property Cuan dalam mengembangkan dan menyajikan layanan-layanan dalam Situs kepada Pengguna, antara lain mitra penyedia layanan pembayaran, logistik atau kurir, infrastruktur situs, dan mitra-mitra lainnya.</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Mitra usaha Property Cuan tempat Pengguna membuat atau mengakses akun Property Cuan, seperti layanan media sosial, atau situs/aplikasi yang menggunakan API Property Cuan atau yang digunakan Property Cuan;</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Penyedia layanan finansial (apabila Pengguna menggunakan Layanan Finansial seperti Doku Pay);</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Penyedia layanan pemasaran;</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Sumber yang tersedia secara umum.</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Property Cuan dapat menggabungkan data yang diperoleh dari sumber tersebut dengan data lain yang dimilikinya.</p>\r\n<p>Perolehan dan Pengumpulan Data Pengguna</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">titipkirimin mengumpulkan data Pengguna dengan tujuan untuk memproses transaksi Pengguna, mengelola dan memperlancar proses penggunaan Situs, serta tujuan-tujuan lainnya selama diizinkan oleh peraturan perundang-undangan yang berlaku. Adapun data Pengguna yang dikumpulkan adalah sebagai berikut:</p>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Memproses segala bentuk permintaan, aktivitas maupun transaksi yang dilakukan oleh Pengguna melalui Situs, termasuk untuk keperluan pengiriman produk kepada Pengguna.</li>\r\n<li style=\"box-sizing: inherit;\">Penyediaan fitur-fitur untuk memberikan, mewujudkan, memelihara dan memperbaiki produk dan layanan kami, termasuk:</li>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Menawarkan, memperoleh, menyediakan, atau memfasilitasi layanan marketplace, asuransi, pembiayaan, pinjaman, maupun produk-produk lainnya melalui Situs;</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Memungkinkan fitur untuk mempribadikan akun Property Cuan Pengguna, seperti Wishlist dan Toko Favorit; dan/atau</li>\r\n<li style=\"box-sizing: inherit;\" type=\"a\">Melakukan kegiatan internal yang diperlukan untuk menyediakan layanan pada situs/aplikasi titipkirimin, seperti pemecahan masalah software, bug, permasalahan operasional, melakukan analisis data, pengujian, dan penelitian, dan untuk memantau dan menganalisis kecenderungan penggunaan dan aktivitas.</li>\r\n</ol>\r\n<li style=\"box-sizing: inherit;\">Membantu Pengguna pada saat berkomunikasi dengan Layanan Pelanggan Property Cuan, diantaranya untuk:</li>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Memeriksa dan mengatasi permasalahan Pengguna;</li>\r\n<li style=\"box-sizing: inherit;\">Mengarahkan pertanyaan Pengguna kepada petugas Layanan Pelanggan yang tepat untuk mengatasi permasalahan; dan</li>\r\n<li style=\"box-sizing: inherit;\">Mengawasi dan memperbaiki tanggapan Layanan Pelanggan Property Cuan.</li>\r\n</ol>\r\n<li style=\"box-sizing: inherit;\">Menghubungi Pengguna melalui email, surat, telepon, fax, dan lain-lain, termasuk namun tidak terbatas, untuk membantu dan/atau menyelesaikan proses transaksi maupun proses penyelesaian kendala.</li>\r\n<li style=\"box-sizing: inherit;\">Menggunakan informasi yang diperoleh dari Pengguna untuk tujuan penelitian, analisis, pengembangan dan pengujian produk guna meningkatkan keamanan dan keamanan layanan-layanan pada Situs, serta mengembangkan fitur dan produk baru.</li>\r\n<li style=\"box-sizing: inherit;\">Menginformasikan kepada Pengguna terkait produk, layanan, promosi, studi, survei, berita, perkembangan terbaru, acara dan lain-lain, baik melalui Situs maupun melalui media lainnya. Property Cuan juga dapat menggunakan informasi tersebut untuk mempromosikan dan memproses kontes dan undian, memberikan hadiah, serta menyajikan iklan dan konten yang relevan tentang layanan titipkirimin dan mitra usahanya.</li>\r\n<li style=\"box-sizing: inherit;\">Melakukan monitoring ataupun investigasi terhadap transaksi-transaksi mencurigakan atau transaksi yang terindikasi mengandung unsur kecurangan atau pelanggaran terhadap Syarat dan Ketentuan atau ketentuan hukum yang berlaku, serta melakukan tindakan-tindakan yang diperlukan sebagai tindak lanjut dari hasil monitoring atau investigasi transaksi tersebut.</li>\r\n<li style=\"box-sizing: inherit;\">Dalam keadaan tertentu, Property Cuan mungkin perlu untuk menggunakan ataupun mengungkapkan data Pengguna untuk tujuan penegakan hukum atau untuk pemenuhan persyaratan hukum dan peraturan yang berlaku, termasuk dalam hal terjadinya sengketa atau proses hukum antara Pengguna dan Property Cuan.</li>\r\n</ol>\r\n<p>Pengungkapan Data Pribadi Pengguna</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Property Cuan menjamin tidak ada penjualan, pengalihan, distribusi atau meminjamkan data pribadi Anda kepada pihak ketiga lain, tanpa terdapat izin dari Anda, kecuali dalam hal-hal sebagai berikut:</p>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Dibutuhkan adanya pengungkapan data Pengguna kepada mitra atau pihak ketiga lain yang membantu Property Cuan dalam menyajikan layanan pada Situs dan memproses segala bentuk aktivitas Pengguna dalam Situs, termasuk memproses transaksi, verifikasi pembayaran, pengiriman produk, dan lain-lain.</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan dapat menyediakan informasi yang relevan kepada mitra usaha sesuai dengan persetujuan Pengguna untuk menggunakan layanan mitra usaha, termasuk diantaranya aplikasi atau situs lain yang telah saling mengintegrasikan API atau layanannya, atau mitra usaha yang mana Property Cuan telah bekerjasama untuk mengantarkan promosi, kontes, atau layanan yang dikhususkan.</li>\r\n<li style=\"box-sizing: inherit;\">Dibutuhkan adanya komunikasi antara mitra usaha Property Cuan (seperti penyedia logistik, pembayaran, dan lain-lain) dengan Pengguna dalam hal penyelesaian kendala maupun hal-hal lainnya.</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan dapat menyediakan informasi yang relevan kepada vendor, konsultan, mitra pemasaran, firma riset, atau penyedia layanan sejenis.</li>\r\n<li style=\"box-sizing: inherit;\">Pengguna menghubungi Property Cuan melalui media publik seperti media sosial, whatsapp dan fitur tertentu pada Situs, komunikasi antara Pengguna dan Property Cuan mungkin dapat dilihat secara publik.</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan dapat membagikan informasi Pengguna kepada anak perusahaan dan afiliasinya untuk membantu memberikan layanan atau melakukan pengolahan data untuk dan atas nama Property Cuan.</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan mengungkapkan data Pengguna dalam upaya mematuhi kewajiban hukum dan/atau adanya permintaan yang sah dari aparat penegak hukum.</li>\r\n</ol>\r\n<p>Cookies</p>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Cookies adalah file kecil yang secara otomatis akan mengambil tempat di dalam perangkat Pengguna yang menjalankan fungsi dalam menyimpan preferensi maupun konfigurasi Pengguna selama mengunjungi suatu situs.</li>\r\n<li style=\"box-sizing: inherit;\">Cookies tersebut tidak diperuntukkan untuk digunakan pada saat melakukan akses data lain yang Pengguna miliki di perangkat komputer Pengguna, selain dari yang telah Pengguna setujui untuk disampaikan.</li>\r\n<li style=\"box-sizing: inherit;\">Walaupun secara otomatis perangkat komputer Pengguna akan menerima cookies, Pengguna dapat menentukan pilihan untuk melakukan modifikasi melalui pengaturan browser Pengguna yaitu dengan memilih untuk menolak cookies (pilihan ini dapat membatasi layanan optimal pada saat melakukan akses ke Situs).</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan menggunakan fitur Google Analytics Demographics and Interest. Data yang kami peroleh dari fitur tersebut, seperti umur, jenis kelamin, minat Pengguna dan lain-lain, akan kami gunakan untuk pengembangan Situs dan konten titipkirimin. Jika tidak ingin data Anda terlacak oleh Google Analytics, Anda dapat menggunakan Add-On Google Analytics Opt-Out Browser.</li>\r\n<li style=\"box-sizing: inherit;\">Property Cuan dapat menggunakan fitur-fitur yang disediakan oleh pihak ketiga dalam rangka meningkatkan layanan dan konten Property Cuan, termasuk diantaranya ialah penyesuaian dan penyajian iklan kepada setiap Pengguna berdasarkan minat atau riwayat kunjungan. Jika Anda tidak ingin iklan ditampilkan berdasarkan penyesuaian tersebut, maka Anda dapat mengaturnya melalui browser.</li>\r\n</ol>\r\n<p>Pilihan Pengguna dan Transparansi</p>\r\n<ol style=\"box-sizing: inherit; margin: 0px 0px 15px; list-style-position: initial; list-style-image: initial;\">\r\n<li style=\"box-sizing: inherit;\">Perangkat seluler pada umumnya (iOS, Android, dan sebagainya) memiliki pengaturan sehingga aplikasi Property Cuan tidak dapat mengakses data tertentu tanpa persetujuan dari Pengguna. Perangkat iOS akan memberikan pemberitahuan kepada Pengguna saat aplikasi Property Cuan pertama kali meminta akses terhadap data tersebut, sedangkan perangkat Android akan memberikan pemberitahuan kepada Pengguna saat aplikasi titipkirimin pertama kali dimuat. Dengan menggunakan aplikasi dan memberikan akses terhadap aplikasi, Pengguna dianggap memberikan persetujuannya terhadap Kebijakan Privasi.</li>\r\n<li style=\"box-sizing: inherit;\">Setelah transaksi jual beli melalui marketplace berhasil, Penjual maupun Pembeli memiliki kesempatan untuk memberikan penilaian dan ulasan terhadap satu sama lain. Informasi ini mungkin dapat dilihat secara publik dengan persetujuan Pengguna.</li>\r\n<li style=\"box-sizing: inherit;\">Pengguna dapat mengakses dan mengubah informasi berupa alamat email, nomor telepon, tanggal lahir, jenis kelamin, daftar alamat, metode pembayaran, dan rekening bank melalui fitur Pengaturan pada Situs.</li>\r\n<li style=\"box-sizing: inherit;\">Pengguna dapat menarik diri dari informasi atau notifikasi berupa buletin, ulasan, diskusi produk, pesan pribadi, atau pesan pribadi dari Admin yang dikirimkan oleh titipkirimin melalui fitur Pengaturan pada Situs. Property Cuan tetap dapat mengirimkan pesan atau email berupa keterangan transaksi atau informasi terkait akun Pengguna.</li>\r\n<li style=\"box-sizing: inherit;\">Sejauh diizinkan oleh ketentuan yang berlaku, Pengguna dapat menghubungi Property Cuan untuk melakukan penarikan persetujuan terhadap perolehan, pengumpulan, penyimpanan, pengelolaan dan penggunaan data Pengguna. Apabila terjadi demikian maka Pengguna memahami konsekuensi bahwa Pengguna tidak dapat menggunakan layanan Situs maupun layanan Property Cuan lainnya.</li>\r\n</ol>\r\n<p>Pilihan Pengguna dan Transparansi</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Property Cuan akan menyimpan informasi selama akun Pengguna tetap aktif dan dapat melakukan penghapusan sesuai dengan ketentuan peraturan hukum yang berlaku.</p>\r\n<p>Pembaruan Kebijakan Privasi</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 20px;\">Property Cuan dapat sewaktu-waktu melakukan perubahan atau pembaruan terhadap Kebijakan Privasi ini. Property Cuan menyarankan agar Pengguna membaca secara seksama dan memeriksa halaman Kebijakan Privasi ini dari waktu ke waktu untuk mengetahui perubahan apapun. Dengan tetap mengakses dan menggunakan layanan Situs maupun layanan Property Cuan lainnya, maka Pengguna dianggap menyetujui perubahan-perubahan dalam Kebijakan Privasi.</p>', '', 'privacy_policy', '2023-11-10 09:48:12'),
(3, 'Term & Condition', '<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Syarat dan Ketentuan untuk Situs Web Gramercy by Alam Sutera</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Selamat datang di Gramercy by Alam Sutera. Sebelum Anda menjelajahi situs web kami, harap luangkan waktu sejenak untuk membaca dan memahami syarat dan ketentuan berikut. Dengan mengakses dan menggunakan situs web ini, Anda setuju untuk mematuhi syarat-syarat ini. Jika Anda tidak setuju dengan bagian apa pun dari syarat ini, mohon tidak menggunakan situs web kami.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">1. Penggunaan Umum</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">1.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Kelayakan</strong>: Anda harus berusia minimal 18 tahun untuk menggunakan situs web ini. Dengan menggunakan situs web ini, Anda menyatakan bahwa Anda berusia di atas 18 tahun.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">1.2. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Akurasi Informasi</strong>: Meskipun kami berusaha menyediakan informasi yang akurat dan terkini, kami tidak menjamin keakuratan, kelengkapan, atau ketepatan waktu informasi apa pun di situs web ini. Gramercy by Alam Sutera berhak mengubah atau memperbarui konten kapan saja tanpa pemberitahuan.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">2. Listing Properti dan Informasi Investasi</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">2.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Listing Properti</strong>: Informasi properti di situs web ini untuk menyediakan informasi umum untuk para pembaca untuk mengetahui informasi lengkap tentang Gramercy by Alam Sutera.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">2.2. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Risiko Investasi</strong>: Investasi dalam real estate memiliki risiko, dan kinerja masa lalu tidak menjamin hasil di masa depan. Calon pembeli dan investor disarankan untuk melakukan penelitian mereka sendiri dan berkonsultasi dengan profesional yang tepat sebelum mengambil keputusan investasi.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">3. Perilaku Pengguna</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">3.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Penggunaan yang Sah</strong>: Pengguna setuju untuk menggunakan situs web ini hanya untuk tujuan yang sah dan sesuai dengan semua hukum dan peraturan yang berlaku.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">3.2. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Perilaku Dilarang</strong>: Pengguna dilarang melakukan kegiatan yang dapat mengganggu fungsionalitas situs web, termasuk namun tidak terbatas pada hacking, mentransmisikan malware, atau terlibat dalam bentuk perilaku penipuan.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">4. Kebijakan Privasi</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">4.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Pengumpulan Data</strong>: Gramercy by Alam Sutera mengumpulkan dan memproses data pengguna sesuai dengan Kebijakan Privasi kami. Dengan menggunakan situs web ini, Anda memberikan persetujuan untuk pengumpulan dan penggunaan informasi Anda seperti yang dijelaskan dalam Kebijakan Privasi.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">5. Kekayaan Intelektual</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">5.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Kepemilikan</strong>: Seluruh konten di situs web, termasuk teks, grafis, logo, gambar, dan perangkat lunak, adalah milik Gramercy by Alam Sutera dan dilindungi oleh hukum kekayaan intelektual.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">5.2. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Batasan Penggunaan</strong>: Pengguna tidak boleh mereproduksi, mendistribusikan, mengubah, atau menampilkan bagian apa pun dari situs web tanpa izin tertulis dari Gramercy by Alam Sutera.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">6. Pembaruan Syarat dan Ketentuan</strong></p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">6.1. <strong style=\"border: 0px solid #d9d9e3; box-sizing: border-box; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent;\">Pembaruan</strong>: Gramercy by Alam Sutera berhak memperbarui atau mengubah syarat dan ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Pengguna dianjurkan untuk secara berkala meninjau syarat-syarat tersebut untuk perubahan.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Dengan menggunakan situs web Gramercy by Alam Sutera, Anda mengakui bahwa Anda telah membaca, memahami, dan menyetujui syarat dan ketentuan ini. Jika Anda memiliki pertanyaan atau kekhawatiran, silakan hubungi kami di [christian@propertycuan.id].</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Terima kasih telah memilih Gramercy by Alam Sutera! Selamat Cuan !</p>', '', 'term_condition', '2023-11-09 16:57:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_field`
--

CREATE TABLE `tbl_web_field` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_field`
--

INSERT INTO `tbl_web_field` (`field_id`, `field_name`, `createtime`) VALUES
(1, 'Semua', '2022-10-02 16:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_gallery`
--

CREATE TABLE `tbl_web_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(200) NOT NULL,
  `gallery_cover` text NOT NULL,
  `gallery_url` text,
  `gallery_description` text NOT NULL,
  `gallery_date` date NOT NULL,
  `gallery_type` varchar(10) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_gallery`
--

INSERT INTO `tbl_web_gallery` (`gallery_id`, `gallery_name`, `gallery_cover`, `gallery_url`, `gallery_description`, `gallery_date`, `gallery_type`, `createtime`) VALUES
(9, 'Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', 'video-20221214144343.mp4', 'https://www.youtube.com/watch?v=-iJsq6rF0Do&t=5s', 'Aparatur Sipil Negara (ASN) merupakan pekerja dengan usia produktif yang membutuhkan kebugaran jasmani yang baik dalam melaksanakan tugas dan fungsinya. Untuk mengetahui tingkat kebugaran jasmani, perlu dilakukan pengukuran untuk mewujudkan ASN yang produktif serta penerapan gaya hidup sehat.\r\n\r\nPeningkatan kebugaran jasmani bertujuan meningkatkan stamina dan status kesehatan seseorang, dapat dicapai dengan menambah aktivitas fisik dan latihan fisik/olahraga secara baik, benar, terukur, dan teratur.\r\n\r\nSalah satu metode yang dapat digunakan untuk pengukuran kebugaran jasmani ASN adalah Rockport. Berdasarkan hasil kajian para ahli, metode ini mudah dilaksanakan dan tidak memerlukan sarana dan prasarana khusus sehingga dapat dijadikan sebagai salah satu pilihan latihan fisik..\r\n\r\nNahh kemaren (Sabtu, 18 September 2021) telah dilaksanakan kegiatan dimaksud yang berlokasi di area kantor kecamatan kadia dihadiri oleh ASN Kecamatan Kadia, ASN Kelurahan Kadia dan Pondambea serta ASN Puskesmas Mekar dan melibatkan dokter pengawas.', '2021-09-18', 'video', '2022-12-14 14:43:43'),
(10, 'Minlok Lintas Sektor Kecamatan Kadia', 'video-20221214163803.mp4', 'https://www.youtube.com/watch?v=uunrtfvPqnM&t=6s', 'Hari ini (Kamis, 30 September 2021) dilaksanakan kegiatan Minilokakarya Lintas Sektor di Kantor Kecamatan Kadia yang dihadiri oleh Camat, Lurah, Bhabinsa, Bhabinkamtibmas, Kepala Sekolah, Toma/Toga wilker Puskesmas Mekar', '2021-09-18', 'video', '2022-12-14 16:38:03'),
(11, 'Launching Posyandu Remaja Solagratia Mahanaim', 'gallery-20221214164513.jpg', NULL, 'Foto Kegiatan Launching Posyandu Remaja Solagratia Mahanaim', '2021-11-13', 'photo', '2022-12-14 16:45:13'),
(12, 'Kegiatan Vaksin di Plasa PT. Telkom WITEL Sultra, Indonesia', 'gallery-20221214170335.jpg', NULL, 'Foto tim vaksin', '2022-02-18', 'photo', '2022-12-14 17:03:35'),
(13, 'Kegiatan Kaji Banding dengan Puskesmas Lepo-Lepo', 'gallery-20221214170732.jpg', NULL, 'Foto kegiatan', '2021-11-09', 'photo', '2022-12-14 17:07:32'),
(14, 'kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea', 'gallery-20221214171018.jpg', NULL, 'kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea; Senam Bersama dan Pemeriksaan Kesehatan Masyarakat..(Minggu, 10 Oktober 2021)', '2021-10-10', 'photo', '2022-12-14 17:10:18'),
(15, 'Kegiatan Sharing dengan Topik \"Nutrisi pada Ibu Hamil\"', 'gallery-20221214171400.jpg', NULL, 'Terima Kasih dr. Muzdatul Khaeriah, Sp.OG M.Kes atas ilmunya hari ini ( Kamis, 17 Maret 2022),,semoga bermanfaat untuk para bunda-bunda', '2022-03-17', 'photo', '2022-12-14 17:14:00'),
(16, 'Kegiatan Verifikasi STBM Puskesmas Mekar', 'gallery-20221214171543.jpg', NULL, 'Kegiatan Verifikasi STBM Puskesmas Mekar, Perumnas dan Jati Raya di Kecamatan Kadia', '2021-07-17', 'photo', '2022-12-14 17:15:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_gallery_photo`
--

CREATE TABLE `tbl_web_gallery_photo` (
  `gallery_photo_id` int(11) NOT NULL,
  `gallery_photo_name` varchar(200) NOT NULL,
  `gallery_photo_token` varchar(100) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_gallery_photo`
--

INSERT INTO `tbl_web_gallery_photo` (`gallery_photo_id`, `gallery_photo_name`, `gallery_photo_token`, `gallery_id`, `createtime`) VALUES
(19, 'photo-2-20210611190214-8120.png', 'token-20210611190205-0.2128556498343348', 2, '2021-06-11 19:02:14'),
(20, 'photo-1-20210611190252-1850.png', 'token-20210611190247-0.7843863151726149', 1, '2021-06-11 19:02:52'),
(21, 'photo-2-20210611190716-6055.png', 'token-20210611190712-0.6079270910029597', 2, '2021-06-11 19:07:16'),
(22, 'photo-2-20210611190722-2313.png', 'token-20210611190719-0.4930588848195715', 2, '2021-06-11 19:07:22'),
(23, 'photo-2-20210611190725-8204.png', 'token-20210611190719-0.6381562621644137', 2, '2021-06-11 19:07:25'),
(30, 'photo-11-20221214164534-5191.jpg', 'token-20221214164524-0.148589419852724', 11, '2022-12-14 16:45:34'),
(31, 'photo-11-20221214164534-8914.jpg', 'token-20221214164524-0.6227664395895876', 11, '2022-12-14 16:45:34'),
(32, 'photo-11-20221214164534-8406.jpg', 'token-20221214164524-0.8813841756315524', 11, '2022-12-14 16:45:34'),
(33, 'photo-11-20221214164534-9395.jpg', 'token-20221214164524-0.2551622686980046', 11, '2022-12-14 16:45:34'),
(34, 'photo-12-20221214170358-9336.jpg', 'token-20221214170345-0.8373024805566123', 12, '2022-12-14 17:03:58'),
(35, 'photo-12-20221214170358-2350.jpg', 'token-20221214170345-0.5447303128431589', 12, '2022-12-14 17:03:58'),
(36, 'photo-13-20221214170747-9187.jpg', 'token-20221214170743-0.4812185945200729', 13, '2022-12-14 17:07:47'),
(37, 'photo-14-20221214171039-4896.jpg', 'token-20221214171028-0.009942058756648997', 14, '2022-12-14 17:10:39'),
(38, 'photo-14-20221214171039-2333.jpg', 'token-20221214171028-0.04519317278822976', 14, '2022-12-14 17:10:39'),
(39, 'photo-14-20221214171039-1400.jpg', 'token-20221214171028-0.8173875624090434', 14, '2022-12-14 17:10:39'),
(40, 'photo-14-20221214171039-9402.jpg', 'token-20221214171028-0.3003723128728548', 14, '2022-12-14 17:10:39'),
(41, 'photo-14-20221214171039-8220.jpg', 'token-20221214171028-0.3495412789611394', 14, '2022-12-14 17:10:39'),
(42, 'photo-14-20221214171039-6692.jpg', 'token-20221214171028-0.9253418415273951', 14, '2022-12-14 17:10:39'),
(43, 'photo-14-20221214171040-2032.jpg', 'token-20221214171028-0.37542138505430334', 14, '2022-12-14 17:10:40'),
(44, 'photo-14-20221214171040-8528.jpg', 'token-20221214171028-0.6796747599869553', 14, '2022-12-14 17:10:40'),
(45, 'photo-15-20221214171413-8745.jpg', 'token-20221214171409-0.21742870393824676', 15, '2022-12-14 17:14:13'),
(46, 'photo-15-20221214171419-4995.jpg', 'token-20221214171409-0.870376589524247', 15, '2022-12-14 17:14:19'),
(47, 'photo-15-20221214171420-5564.jpg', 'token-20221214171409-0.258269611483553', 15, '2022-12-14 17:14:20'),
(48, 'photo-16-20221214171557-4059.jpg', 'token-20221214171550-0.9318769897639498', 16, '2022-12-14 17:15:57'),
(49, 'photo-16-20221214171557-9714.jpg', 'token-20221214171550-0.3369665042243464', 16, '2022-12-14 17:15:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_link`
--

CREATE TABLE `tbl_web_link` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(50) NOT NULL,
  `link_url` text NOT NULL,
  `link_image` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_link`
--

INSERT INTO `tbl_web_link` (`link_id`, `link_name`, `link_url`, `link_image`, `createtime`) VALUES
(1, 'Kota Kendari', 'https://www.kendarikota.go.id/', 'link-20221130132149.png', '2022-11-10 16:38:00'),
(2, 'BPJS Kesehatan', 'https://bpjs-kesehatan.go.id/bpjs/', 'link-20221130132603.png', '2022-11-10 16:39:39'),
(3, 'e-medicord', 'http://www.e-medicord.co.id/', 'link-20221130134408.svg', '2022-11-10 16:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_news`
--

CREATE TABLE `tbl_web_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `news_text` text NOT NULL,
  `news_date` date NOT NULL,
  `news_count_view` int(11) NOT NULL,
  `news_slug` text NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_news`
--

INSERT INTO `tbl_web_news` (`news_id`, `news_title`, `news_cover`, `news_text`, `news_date`, `news_count_view`, `news_slug`, `news_category_id`, `field_id`, `user_id`, `createtime`) VALUES
(13, 'Jakarta Premium Outlet akan buka di Alam Sutera', 'thumbnailnews-20231110102147.png', '<p>Mereka yang gemar shopping pasti ingin berbelanja barang bagus dari brand terkenal dengan harga miring. Karenanya butik-butik yang menyediakan diskon dan promo biasanya menjadi tujuan para shopaholic. Tidak heran bila lokasi seperti La Vallee Village di Paris atau North Premium Outlets di Las Vegas kerap menjadi tujuan mereka yang ingin berbelanja atau menerima jasa titipan produk mewah.</p>\r\n<p>Lokasi factory outlets atau premium outlets ini menjadi tujuan karena menyediakan barang berkualitas dari merek terkenal, namun dengan harga lebih murah, karena biasanya merupakan barang dari koleksi musim sebelumnya. Lokasi semacam ini juga menarik karena menyediakan barang asli, ditata agar para pengunjung bisa berbelanja dengan nyaman, dan memiliki berbagai fasilitas untuk memudahkan orang berbelanja.</p>\r\n<p>Nah, jika dulu berburu barang dari brand ternama biasanya mengharuskan kita ke luar negeri, maka tidak lama lagi di dekat Jakarta, tepatnya di Alam Sutera, Tangerang Selatan, bakal dibangun premium outlets yang berisi brand populer dengan harga bersaing. Jakarta Premium Outlets akan dibuka pada kuartal akhir tahun 2024 dan menawarkan berbagai brand kelas atas dari para desainer terkemuka dan brand ternama dan berkualitas yang menawarkan harga spesial hingga 65% dari harga aslinya setiap hari.</p>\r\n<p>Lokasi ini dikembangkan oleh Simon Genting Private Limited yang juga mengelola Premium Outlets di 69 lokasi di Amerika Serikat dan 23 pusat internasional. Saat acara groundbreaking di Alam Sutera, Jean Marie, Presiden dan Chief Operating Officer Simon Genting Group of Companies menyatakan, &ldquo;Kami senang atas kesempatan untuk menghadirkan Premium Outlets terbaru kami di Indonesia. Tempat ini siap menjadi tujuan belanja world-class yang menyediakan branded brands.&rdquo; Dato Justin Leong (Director, Simon Genting Private Limited) Mr Jean Marie Pin Harry (President and Chief Operating Officer, Simon Genting Group of Companies) dan Mr Uchenna Akujuo (Vice President of International Development &amp; Finance, Simon Property Group) saat groundbreaking di Alam Sutera.</p>\r\n<p>Lokasi Jakarta Premium Outlets bisa ditempuh 30 menit berkendara dari Bandara Internasional Soekarno-Hatta, dan sekitar 45 menit berkendara dari Jakarta Pusat. Properti ini akan berdiri di area seluas sekitar 80.600 m2 dan bakal berisi sekitar 150 toko retail dan berbagai pilihan konsep makanan dan minuman. Pusat perbelanjaannya dibangun dengan desain arsitektur kontemporer modern dengan beberapa fasilitas yang menciptakan suasana nyaman bagi pengunjung. Tempat ini berada di deretan lokasi belanja lain seperti IKEA Alam Sutera dan Decathlon. Ada juga 8 bangunan tempat tinggal di sekitar-nya dan beberapa proyek perumahan dan gedung perkantoran yang sedang dibangun. Seperti Premium Outlets lain di Johor dan Genting Highlands, Jakarta Premium Outlets akan dilengkapi layanan pelanggan/pusat informasi, ATM, penyewaan stroller, kursi roda, layanan Multi-Bahasa, penukaran mata uang asing, penyewaan loker, hingga pengiriman skala internasional.</p>\r\n<p><br />Artikel ini telah tayang di kompas.com</p>', '2023-10-31', 2, 'jakarta-premium-outlet-akan-buka-di-alam-sutera', 1, 1, 2, '2023-10-31 17:50:03'),
(14, 'Gramercy by Alam Sutera, Perumahan Mewah Terakhir di Alam Sutera', 'thumbnailnews-20231112091555.jpg', '<h4>Gramercy by Alam Sutera</h4>\r\n<p>Alam Sutera menghadirkan perumahan terakhir yang mewah dan berkelas di kawasan Green Tunnel Alam Sutera, yang terkenal dengan design pepohonannya yang membuat lingkungan sangat nyaman &nbsp;dan asriuntuk dihuni. Gramercy by Alam Sutera ini menghadirkan konsep Europrean Classic Timeless Design yang sangat cocok untuk para pecinta classic tapi tidak akan tertinggal jaman untuk generasi mendatang.</p>\r\n<p>Tak ada yang membandingi pesona Gramercy di Alam Sutera, Tangerang Selatan, Indonesia. Dengan konsep yang begitu unik, hunian ini memberikan pengalaman berbeda dalam menjalani kehidupan perkotaan. Dari konsep hingga manfaatnya, mari kita eksplorasi keajaiban yang ditawarkan oleh Gramercy.</p>\r\n<p>&nbsp;</p>\r\n<h4>Konsep yang Mengagumkan</h4>\r\n<p>Gramercy adalah manifestasi sempurna dari gaya hidup perkotaan yang modern. Dengan arsitektur kontemporer yang canggih dan perpaduan elemen-elemen alam, ini adalah tempat yang cocok untuk individu yang mencari keseimbangan antara kehidupan perkotaan dan keindahan alam. Konsep ini memberikan perasaan nyaman dan eksklusif kepada para penghuninya, dengan fokus pada detail dan keanggunan.</p>\r\n<p>&nbsp;</p>\r\n<h4>Keindahan Rumah yang begitu Mewah</h4>\r\n<p>Rumah-rumah di Gramercy dirancang dengan cermat untuk memenuhi kebutuhan penghuninya. Dengan perabotan yang mewah dan desain interior yang elegan, setiap sudut rumah ini memberikan kenyamanan dan kelas tersendiri. Selain itu, tata letak yang efisien dan pintu-pintu kaca besar memungkinkan cahaya alami masuk, menciptakan ruang yang terasa lebih terang dan lapang.</p>\r\n<p>&nbsp;</p>\r\n<h4>Tetangga yang Berkualitas</h4>\r\n<p>Menghuni Gramercy juga berarti menjadi bagian dari komunitas yang ramah dan berkualitas. Dengan tetangga-tetangga yang saling mendukung dan keamanan yang terjaga dengan baik, Anda akan merasa aman dan nyaman di sini. Ini adalah tempat yang cocok untuk mereka yang menghargai hubungan sosial yang kuat dan memiliki lingkungan yang harmonis.</p>\r\n<p>&nbsp;</p>\r\n<h4>Akses yang Strategis</h4>\r\n<p>Lokasi Gramercy di Alam Sutera, Tangerang Selatan, memberikan akses yang mudah ke berbagai fasilitas dan pusat perbelanjaan. Anda dapat dengan mudah menjangkau pusat kota Jakarta dan bandara internasional Soekarno-Hatta. Ini sangat menguntungkan bagi para pekerja yang ingin menghemat waktu perjalanan mereka.</p>\r\n<p>&nbsp;</p>\r\n<h4>Manfaat Lokasi dan Hunian</h4>\r\n<p>Salah satu manfaat utama tinggal di Gramercy adalah kehidupan yang seimbang antara kenyamanan perkotaan dan alam. Dengan akses ke taman dan ruang hijau yang indah, Anda dapat menjalani gaya hidup aktif dan sehat. Selain itu, berada di kawasan yang berkembang pesat seperti Alam Sutera memberikan peluang investasi yang menjanjikan.</p>\r\n<p>Dengan konsep yang memukau, rumah yang elegan, tetangga yang ramah, akses yang mudah, dan manfaat lokasi yang luar biasa, Gramercy di Alam Sutera adalah tempat yang tak tertandingi. Jika Anda mencari hunian yang memenuhi semua kebutuhan Anda dan memberikan keseimbangan yang sempurna antara kehidupan perkotaan dan alam, Gramercy adalah pilihan yang sempurna. Selamat tinggal, Anda telah menemukan rumah impian Anda!</p>\r\n<p>&nbsp;</p>\r\n<h4><strong>Jangan Lewatkan Kesempatan untuk Mengunjungi dan Melihat Show Unit</strong></h4>\r\n<p>Kami mengundang Anda untuk merasakan sendiri keindahan Gramercy di Alam Sutera. Dalam kunjungan Anda, Anda akan dapat mengagumi detail-detail mewah rumah-rumah kami, merasakan kenyamanan dan kehangatan yang ditawarkan oleh lingkungan ini, serta mendapatkan gambaran yang jelas tentang bagaimana Gramercy akan menjadi rumah impian Anda.</p>\r\n<p>&nbsp;</p>\r\n<h4>Manfaatkan Penawaran Khusus untuk Pembeli Awal dan Investor</h4>\r\n<p>Kami memahami bahwa investasi dalam hunian adalah langkah penting, dan kami ingin memberikan insentif istimewa kepada Anda. Bagi pembeli awal dan investor, kami menawarkan harga istimewa yang tidak akan Anda temukan di tempat lain. Ini adalah kesempatan langka untuk mendapatkan properti di Gramercy dengan harga terbaik.</p>\r\n<p>Jadi, jangan ragu-ragu. Dapatkan hunian mewah Anda di Gramercy sekarang, dan nikmati kehidupan yang lebih baik dalam komunitas yang ramah dan penuh keindahan. Jangan lewatkan kesempatan ini, hubungi kami segera untuk informasi lebih lanjut dan jadwalkan kunjungan Anda. Gramercy menanti Anda, tempat di mana impian Anda menjadi kenyataan.</p>', '2023-10-31', 3, 'gramercy-by-alam-sutera-perumahan-mewah-terakhir-di-alam-sutera', 1, 1, 2, '2023-10-31 18:15:44'),
(15, 'Mengapa Investasi di Alam Sutera ?', 'thumbnailnews-20231112091809.jpg', '<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Alam Sutera, yang terletak di wilayah Alam Sutera, Tangerang, Banten, menawarkan peluang investasi yang menarik bagi para investor dari berbagai generasi. Pengembangnya, Alam Sutera Realty Tbk, dikenal luas sebagai pengembang terkemuka di Indonesia, khususnya di Alam Sutera.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Sebagai destinasi investasi yang menarik, Alam Sutera telah menjadi sorotan bagi para investor dari berbagai kalangan, termasuk baby boomer, millennial, dan Gen Z. Salah satu poin kunci yang membuat Alam Sutera begitu menarik saat ini adalah bahwa kini tidak ada lagi lahan yang tersedia untuk dikembangkan. Hal ini menciptakan tingkat eksklusivitas dan nilai investasi yang tinggi.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Sejarah Alam Sutera dimulai dari awal pendiriannya hingga kini mencerminkan kesuksesan dan pertumbuhan yang konsisten. Dengan kehadiran Alam Sutera Realty Tbk sebagai pengembang utama, setiap langkah pembangunan telah dijalankan dengan cermat, memberikan investasi yang berfundamental kuat dan berkelanjutan.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Investor di Alam Sutera telah menikmati keuntungan yang signifikan seiring waktu. Dari kebijakan pengembangan yang terencana dengan baik hingga fasilitas modern dan infrastruktur yang berkualitas seperti tol Kunciran, setiap aspek di Alam Sutera dirancang untuk memberikan nilai tambah bagi para investor.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Namun, yang perlu diperhatikan adalah bahwa saat ini tidak ada lagi lahan yang tersedia di Alam Sutera. Ini menciptakan situasi langka di mana kesempatan untuk berinvestasi semakin terbatas. Bagi mereka yang ingin mengambil bagian dalam kesuksesan Alam Sutera, sekarang adalah saat yang tepat untuk berinvestasi.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Dengan keuntungan yang terus meningkat, eksklusivitas lahan yang tidak lagi tersedia, dan jejak sukses yang sudah terbukti, Alam Sutera menawarkan peluang investasi yang sulit untuk diabaikan. Jangan lewatkan kesempatan ini untuk menjadi bagian dari kisah sukses Alam Sutera.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><br />The Gramercy by Alam Sutera hadir sebagai pilihan terakhir bagi para investor, ataupun penghuni yang ingin membeli hunian baru di Alam Sutera. Dengan timeless design Gramercy, Lokasi yang premium di Boulevard Alam Sutera, unit yang sangat terbatas hanya 109 unit, harga jual perdana, benefit ini tentunya akan menguntungkan anda sebagai pembeli.<br />Hubungi kami segera untuk dapatkan presentasi secara eksklusif on site Gramercy.</p>', '2023-11-09', 1, 'mengapa-investasi-di-alam-sutera', 1, 1, 2, '2023-11-09 16:48:18'),
(16, 'Escala, Komersil Terbaru dengan Konsep Green dan Modern di Alam Sutera Central Living District', 'thumbnailnews-20231112221329.jpg', '<h2 style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\"><strong>Tingkatkan Pengalaman Bisnis Anda di Escala, Area Komersial Terbaru di Alam Sutera</strong></h2>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Escala adalah area komersil terbaru di Central Living District Alam Sutera, Tangerang. Dengan konsep modern yang hijau, Escala menawarkan pengalaman berbelanja dan berbisnis yang unik di tengah-tengah lingkungan yang ramah lingkungan dan inovatif.</p>\r\n<h3 style=\"caret-color: #000000; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; font-size: 1.25em; margin: 1rem 0px 0.5rem; line-height: 1.6; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Lokasi Strategis di Central Living District</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Escala terletak di Central Living District, yang menjadi pusat kehidupan komersial di Alam Sutera. Dikelilingi oleh office tower, mall, universitas, apartemen dan perumahan terkini, Escala menawarkan akses mudah ke berbagai restoran, toko, dan area hiburan. Dengan lokasi yang strategis, Escala memberikan kemudahan bagi bisnis Anda untuk tumbuh dan berkembang.</p>\r\n<h3 style=\"caret-color: #000000; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; font-size: 1.25em; margin: 1rem 0px 0.5rem; line-height: 1.6; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Konsep Modern dan Hijau</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Escala memadukan desain modern dengan konsep hijau yang menonjol. Area komersil ini dirancang dengan memperhatikan keunikan dan kenyamanan. Ruang terbuka hijau dan desain arsitektur yang inovatif menciptakan lingkungan yang menginspirasi dan nyaman bagi penghuni dan pengunjung. Pengunjung akan senantiasa merasa nyaman dan <em>pewe</em> saat datang ke tempat anda.</p>\r\n<h3 style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Keuntungan Investasi di Escala</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Investasi di Escala bukan hanya tentang memiliki properti atau kavling komersial, tetapi juga tentang menjadi bagian dari komunitas yang berkembang pesat di Alam Sutera. Dengan pertumbuhan ekonomi yang stabil dan daya tarik area ini, Escala menjadi pilihan yang cerdas untuk investasi bisnis Anda.</p>\r\n<h3 style=\"caret-color: #000000; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; font-size: 1.25em; margin: 1rem 0px 0.5rem; line-height: 1.6; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Unit Terbatas, Harga Akan Meningkat</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Jangan lewatkan kesempatan untuk memiliki unit di Escala, karena unit-unitnya terbatas. Harga saat ini adalah peluang investasi yang menguntungkan, namun, dengan keterbatasan unit, harga dipastikan akan melonjak pada tahun depan. Segera ambil keputusan untuk memastikan Anda mendapatkan nilai terbaik untuk investasi bisnis Anda.</p>\r\n<h3 style=\"caret-color: #000000; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; font-size: 1.25em; margin: 1rem 0px 0.5rem; line-height: 1.6; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Jaminan Keamanan dan Kenyamanan</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Escala tidak hanya menawarkan lingkungan bisnis yang berkembang, tetapi juga jaminan keamanan dan kenyamanan. Sistem keamanan modern dan fasilitas yang lengkap memberikan rasa aman bagi penghuni dan pelanggan Anda.</p>\r\n<h3 style=\"caret-color: #000000; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; font-size: 1.25em; margin: 1rem 0px 0.5rem; line-height: 1.6; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Hubungi Kami Hari Ini</h3>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 0px 0px 1.25em; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Jangan lewatkan kesempatan untuk menjadi bagian dari Escala, Central Living District yang menjanjikan di Alam Sutera. Hubungi kami hari ini untuk informasi lebih lanjut untuk kavling komersil di Escala dan jadilah pelopor dalam mengambil keputusan investasi yang cerdas.</p>\r\n<p style=\"font-size: 16px; white-space: pre-wrap; border: 0px solid #d9d9e3; box-sizing: border-box; margin: 1.25em 0px 0px; caret-color: #d1d5db; color: #d1d5db; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Segera miliki unit Anda di Escala sebelum kehabisan dan nikmati cuan untuk anda dan generasi mendatang !</p>', '2023-11-09', 2, 'escala-komersil-terbaru-dengan-konsep-green-dan-modern-di-alam-sutera-central-living-district', 1, 1, 2, '2023-11-09 17:27:22'),
(17, 'Alam Sutera Property Expo 2023', 'thumbnailnews-20231110151602.jpg', '<p>Alam Sutera kembali mengadakan Property Expo di tahun 2023 ini di tanggal 10 November hingga 26 November 2023. Property Expo ini diselenggarakan di Atrium Mall Alam Sutera, yang dimeriahkan oleh berbagai artis ternama seperti Isyana Saravati dan Marcell.</p>\r\n<p>Temukan berbagai product Alam Sutera Realty Group khusus di Property Expo ini, seperti perumahan terbaru dan termewah the Gramercy, ada juga Escala yang merupakan launching terbaru untuk kavling komersil di Central Living District Alam Sutera. Tak ketinggalan untuk perumahan milenial di Suvarna Sutera, Ayodhya dan Suvarna Sutera.</p>\r\n<p>Kamu juga bisa mendapatkan Free Health Check by EMC Hospital, khusus untuk kamu yang datang ke Alam Sutera Property Expo ini lho. Dimeriahkan juga dengan beberapa performance lain yang turut menghibur kamu yang datang ke Mall Alam Sutera.&nbsp;<br /><br />Segera hubungi untuk dapatkan hadiah menarik lainnya.</p>', '2023-11-10', 2, 'alam-sutera-property-expo-2023', 1, 1, 2, '2023-11-10 15:16:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_news_category`
--

CREATE TABLE `tbl_web_news_category` (
  `news_category_id` int(11) NOT NULL,
  `news_category_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_news_category`
--

INSERT INTO `tbl_web_news_category` (`news_category_id`, `news_category_name`, `createtime`) VALUES
(1, 'Berita', '2021-06-10 12:15:50'),
(2, 'Agenda', '2021-06-10 12:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_slider`
--

CREATE TABLE `tbl_web_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_text` varchar(200) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_slider`
--

INSERT INTO `tbl_web_slider` (`slider_id`, `slider_title`, `slider_text`, `slider_image`, `createtime`) VALUES
(6, '', '', 'slider-20221214003210.png', '2022-12-14 00:32:10'),
(9, '', '', 'slider-20221214004529.png', '2022-12-14 00:45:29'),
(12, '', '', 'slider-20221127211604.jpg', '2022-11-27 21:16:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cluster`
--
ALTER TABLE `tbl_cluster`
  ADD PRIMARY KEY (`cluster_id`);

--
-- Indeks untuk tabel `tbl_consult_question`
--
ALTER TABLE `tbl_consult_question`
  ADD PRIMARY KEY (`consult_question_id`);

--
-- Indeks untuk tabel `tbl_consult_q_option`
--
ALTER TABLE `tbl_consult_q_option`
  ADD PRIMARY KEY (`consult_q_option_id`);

--
-- Indeks untuk tabel `tbl_consult_response`
--
ALTER TABLE `tbl_consult_response`
  ADD PRIMARY KEY (`consult_response_id`);

--
-- Indeks untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indeks untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indeks untuk tabel `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  ADD PRIMARY KEY (`gallery_category_id`);

--
-- Indeks untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `tbl_optical_layout`
--
ALTER TABLE `tbl_optical_layout`
  ADD PRIMARY KEY (`optical_id`);

--
-- Indeks untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tbl_product_service`
--
ALTER TABLE `tbl_product_service`
  ADD PRIMARY KEY (`product_service_id`);

--
-- Indeks untuk tabel `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indeks untuk tabel `tbl_project_gallery`
--
ALTER TABLE `tbl_project_gallery`
  ADD PRIMARY KEY (`project_gallery_id`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `tbl_sim_goals`
--
ALTER TABLE `tbl_sim_goals`
  ADD PRIMARY KEY (`sim_goals_id`);

--
-- Indeks untuk tabel `tbl_sim_question`
--
ALTER TABLE `tbl_sim_question`
  ADD PRIMARY KEY (`sim_question_id`);

--
-- Indeks untuk tabel `tbl_sim_q_option`
--
ALTER TABLE `tbl_sim_q_option`
  ADD PRIMARY KEY (`sim_q_option_id`);

--
-- Indeks untuk tabel `tbl_sim_response`
--
ALTER TABLE `tbl_sim_response`
  ADD PRIMARY KEY (`sim_response_id`);

--
-- Indeks untuk tabel `tbl_siteplan`
--
ALTER TABLE `tbl_siteplan`
  ADD PRIMARY KEY (`siteplan_id`);

--
-- Indeks untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indeks untuk tabel `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  ADD PRIMARY KEY (`field_id`);

--
-- Indeks untuk tabel `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indeks untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  ADD PRIMARY KEY (`gallery_photo_id`);

--
-- Indeks untuk tabel `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indeks untuk tabel `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indeks untuk tabel `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  ADD PRIMARY KEY (`news_category_id`);

--
-- Indeks untuk tabel `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cluster`
--
ALTER TABLE `tbl_cluster`
  MODIFY `cluster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_consult_question`
--
ALTER TABLE `tbl_consult_question`
  MODIFY `consult_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_consult_q_option`
--
ALTER TABLE `tbl_consult_q_option`
  MODIFY `consult_q_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_consult_response`
--
ALTER TABLE `tbl_consult_response`
  MODIFY `consult_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `gallery_category_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1479;

--
-- AUTO_INCREMENT untuk tabel `tbl_optical_layout`
--
ALTER TABLE `tbl_optical_layout`
  MODIFY `optical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_product_service`
--
ALTER TABLE `tbl_product_service`
  MODIFY `product_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_project_gallery`
--
ALTER TABLE `tbl_project_gallery`
  MODIFY `project_gallery_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_goals`
--
ALTER TABLE `tbl_sim_goals`
  MODIFY `sim_goals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_question`
--
ALTER TABLE `tbl_sim_question`
  MODIFY `sim_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_q_option`
--
ALTER TABLE `tbl_sim_q_option`
  MODIFY `sim_q_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_response`
--
ALTER TABLE `tbl_sim_response`
  MODIFY `sim_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_siteplan`
--
ALTER TABLE `tbl_siteplan`
  MODIFY `siteplan_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  MODIFY `news_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
