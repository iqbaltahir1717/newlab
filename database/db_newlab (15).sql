-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 31 Des 2023 pada 19.55
-- Versi server: 5.7.23-23
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newlab55_support`
--

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
(1, 'Fullname', 'text', 'N', '2023-12-22 16:06:53', '2023-11-24 15:04:55'),
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
(5, 'Dark, sensitive, dry, and dull skin', 4),
(6, 'Dark colored lips', 4),
(7, 'Oily and acne prone skin', 4),
(8, 'Yellowish teeth\n', 4),
(9, 'Excess body weight', 4);

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
(4, 13, 'a:5:{i:0;a:2:{s:1:\"q\";s:9:\"Fullname \";s:1:\"r\";s:4:\"dhea\";}i:1;a:2:{s:1:\"q\";s:7:\"Gender \";s:1:\"r\";s:5:\"Woman\";}i:2;a:2:{s:1:\"q\";s:18:\"Activity Category \";s:1:\"r\";s:6:\"Indoor\";}i:3;a:2:{s:1:\"q\";s:20:\"Choose Your Problem \";s:1:\"r\";s:15:\"Yellowish teeth\";}i:4;a:2:{s:1:\"q\";s:17:\"Specific Problem \";s:1:\"r\";s:4:\"test\";}}', '2023-12-20 16:47:09', '2023-12-20 16:47:09');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `gallery_category_id` int(24) NOT NULL,
  `gallery_category_name` varchar(128) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2023-12-11 10:51:00', 'Administrator mengubah data sim_goals dengan ID - nama = 3 - Free from acne (face/body) ', '118.97.36.11', 2, '2023-12-11 10:51:00'),
(2, '2023-12-11 10:51:57', 'muhammad danil menambah data sim response ', '118.97.36.11', 11, '2023-12-11 10:51:57'),
(3, '2023-12-11 11:02:26', 'Iqbal Tahir melakukan login ke sistem', '110.136.237.184', 12, '2023-12-11 11:02:26'),
(4, '2023-12-11 11:02:35', 'Iqbal Tahir menambah data sim response ', '110.136.237.184', 12, '2023-12-11 11:02:35'),
(5, '2023-12-11 11:18:09', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.156.163', 21, '2023-12-11 11:18:09'),
(6, '2023-12-11 11:18:19', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.156.163', 21, '2023-12-11 11:18:19'),
(7, '2023-12-11 11:21:23', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.156.163', 21, '2023-12-11 11:21:23'),
(8, '2023-12-11 11:24:28', 'Hayara Octaviani 8065 menambah data sim response ', '180.251.156.163', 21, '2023-12-11 11:24:28'),
(9, '2023-12-11 12:26:32', 'Meliani  melakukan login ke sistem', '202.47.68.218', 20, '2023-12-11 12:26:32'),
(10, '2023-12-11 12:26:43', 'Meliani  menambah data sim response ', '202.47.68.218', 20, '2023-12-11 12:26:43'),
(11, '2023-12-11 21:46:14', 'Han Achmad melakukan login ke sistem', '182.3.101.38', 22, '2023-12-11 21:46:14'),
(12, '2023-12-11 22:09:07', 'abia storeid melakukan login ke sistem', '36.72.213.101', 23, '2023-12-11 22:09:07'),
(13, '2023-12-11 22:09:28', 'abia storeid melakukan login ke sistem', '36.72.213.101', 23, '2023-12-11 22:09:28'),
(14, '2023-12-12 13:56:53', 'PALiBu Channel melakukan login ke sistem', '120.188.6.90', 24, '2023-12-12 13:56:53'),
(15, '2023-12-13 20:30:07', 'Retno Prasetyowati melakukan login ke sistem', '36.81.91.125', 25, '2023-12-13 20:30:07'),
(16, '2023-12-13 20:30:50', 'Retno Prasetyowati menambah data sim response ', '36.81.91.125', 25, '2023-12-13 20:30:50'),
(17, '2023-12-13 20:31:00', 'Retno Prasetyowati melakukan login ke sistem', '36.81.91.125', 25, '2023-12-13 20:31:00'),
(18, '2023-12-14 22:44:56', 'Siti khalifah Muliono melakukan login ke sistem', '180.252.202.147', 26, '2023-12-14 22:44:56'),
(19, '2023-12-14 22:46:11', 'Siti khalifah Muliono menambah data consult response ', '180.252.202.147', 26, '2023-12-14 22:46:11'),
(20, '2023-12-14 22:52:10', 'Data Kurnia  melakukan login ke sistem', '180.252.170.68', 27, '2023-12-14 22:52:10'),
(21, '2023-12-14 22:52:27', 'Data Kurnia  melakukan login ke sistem', '180.252.170.68', 27, '2023-12-14 22:52:27'),
(22, '2023-12-15 09:41:47', 'APRIL LYA melakukan login ke sistem', '146.75.160.29', 28, '2023-12-15 09:41:47'),
(23, '2023-12-15 14:45:14', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-15 14:45:14'),
(24, '2023-12-15 14:45:56', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-15 14:45:56'),
(25, '2023-12-15 14:46:09', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-15 14:46:09'),
(26, '2023-12-18 10:46:05', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-18 10:46:05'),
(27, '2023-12-18 10:46:27', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-18 10:46:27'),
(28, '2023-12-19 15:47:20', 'Administrator melakukan login ke sistem', '125.162.208.168', 2, '2023-12-19 15:47:20'),
(29, '2023-12-19 15:49:47', 'administrator menghapus data sim_response dengan ID : 1', '125.162.208.168', 2, '2023-12-19 15:49:47'),
(30, '2023-12-19 15:49:50', 'administrator menghapus data sim_response dengan ID : 2', '125.162.208.168', 2, '2023-12-19 15:49:50'),
(31, '2023-12-19 15:50:14', 'administrator menghapus data sim_response dengan ID : 4', '125.162.208.168', 2, '2023-12-19 15:50:14'),
(32, '2023-12-19 15:50:18', 'administrator menghapus data sim_response dengan ID : 5', '125.162.208.168', 2, '2023-12-19 15:50:18'),
(33, '2023-12-19 15:50:20', 'administrator menghapus data sim_response dengan ID : 6', '125.162.208.168', 2, '2023-12-19 15:50:20'),
(34, '2023-12-19 20:13:52', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.158.93', 21, '2023-12-19 20:13:52'),
(35, '2023-12-19 21:24:53', 'Administrator melakukan login ke sistem', '180.251.158.93', 2, '2023-12-19 21:24:53'),
(36, '2023-12-20 10:06:45', 'Administrator melakukan login ke sistem', '36.75.146.187', 2, '2023-12-20 10:06:45'),
(37, '2023-12-20 10:37:43', 'Hayara Octaviani 8065 melakukan login ke sistem', '36.75.146.187', 21, '2023-12-20 10:37:43'),
(38, '2023-12-20 11:30:32', 'administrator menghapus data consult_response dengan ID : 1', '36.75.146.187', 2, '2023-12-20 11:30:32'),
(39, '2023-12-20 11:32:18', 'Hayara Octaviani 8065 menambah data consult response ', '36.75.146.187', 21, '2023-12-20 11:32:18'),
(40, '2023-12-20 11:32:50', 'administrator menghapus data consult_response dengan ID : 2', '36.75.146.187', 2, '2023-12-20 11:32:50'),
(41, '2023-12-20 12:38:53', 'Hayara Octaviani 8065 menambah data consult response ', '36.75.146.187', 21, '2023-12-20 12:38:53'),
(42, '2023-12-20 16:18:20', 'Administrator melakukan login ke sistem', '36.75.146.187', 2, '2023-12-20 16:18:20'),
(43, '2023-12-20 16:22:57', 'Administrator mengubah data consult_question dengan ID - nama = 1 - Fullname', '36.75.146.187', 2, '2023-12-20 16:22:57'),
(44, '2023-12-20 16:44:56', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-20 16:44:56'),
(45, '2023-12-20 16:47:09', 'bydhea wikana menambah data consult response ', '202.58.194.26', 13, '2023-12-20 16:47:09'),
(46, '2023-12-20 16:47:39', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-20 16:47:39'),
(47, '2023-12-20 16:47:47', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-20 16:47:47'),
(48, '2023-12-20 16:51:11', 'Meliani  melakukan login ke sistem', '202.47.68.218', 20, '2023-12-20 16:51:11'),
(49, '2023-12-20 16:51:23', 'Meliani  menambah data sim response ', '202.47.68.218', 20, '2023-12-20 16:51:23'),
(50, '2023-12-20 17:34:06', 'Ryan Tri Nugraha melakukan login ke sistem', '202.58.194.26', 29, '2023-12-20 17:34:06'),
(51, '2023-12-20 17:34:41', 'Ryan Tri Nugraha menambah data sim response ', '202.58.194.26', 29, '2023-12-20 17:34:41'),
(52, '2023-12-20 20:21:12', 'Administrator melakukan login ke sistem', '180.251.157.69', 2, '2023-12-20 20:21:12'),
(53, '2023-12-20 20:34:34', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.157.69', 21, '2023-12-20 20:34:34'),
(54, '2023-12-20 21:26:42', 'Hayara Octaviani 8065 menambah data sim response ', '180.251.157.69', 21, '2023-12-20 21:26:42'),
(55, '2023-12-20 21:30:17', 'Hayara Octaviani 8065 menambah data sim response ', '180.251.157.69', 21, '2023-12-20 21:30:17'),
(56, '2023-12-20 21:30:59', 'Hayara Octaviani 8065 menambah data sim response ', '180.251.157.69', 21, '2023-12-20 21:30:59'),
(57, '2023-12-21 20:26:56', 'Administrator melakukan login ke sistem', '180.251.157.69', 2, '2023-12-21 20:26:56'),
(58, '2023-12-22 10:01:08', 'Administrator melakukan login ke sistem', '125.162.208.168', 2, '2023-12-22 10:01:08'),
(59, '2023-12-22 10:03:31', 'Iqbal Tahir melakukan login ke sistem', '125.162.208.168', 12, '2023-12-22 10:03:31'),
(60, '2023-12-22 10:03:45', 'Iqbal Tahir menambah data sim response ', '125.162.208.168', 12, '2023-12-22 10:03:45'),
(61, '2023-12-22 11:24:36', 'Elko Dedy Pratama melakukan login ke sistem', '137.59.15.131', 30, '2023-12-22 11:24:36'),
(62, '2023-12-22 11:25:01', 'Elko Dedy Pratama menambah data sim response ', '137.59.15.131', 30, '2023-12-22 11:25:01'),
(63, '2023-12-22 13:34:05', 'Administrator melakukan login ke sistem', '180.251.157.69', 2, '2023-12-22 13:34:05'),
(64, '2023-12-22 14:15:00', 'Administrator Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:15:00'),
(65, '2023-12-22 14:15:19', 'Admin Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:15:19'),
(66, '2023-12-22 14:15:42', 'Adminstrator Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:15:42'),
(67, '2023-12-22 14:45:07', 'Mario Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:45:07'),
(68, '2023-12-22 14:46:09', 'Mario Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:46:09'),
(69, '2023-12-22 14:47:59', 'Mario melakukan login ke sistem', '180.251.157.69', 2, '2023-12-22 14:47:59'),
(70, '2023-12-22 14:49:08', 'Mario Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:49:08'),
(71, '2023-12-22 14:49:56', 'Mario Update Profile data : administrator', '180.251.157.69', 2, '2023-12-22 14:49:56'),
(72, '2023-12-22 14:57:00', 'Mario melakukan login ke sistem', '180.251.157.69', 2, '2023-12-22 14:57:00'),
(73, '2023-12-22 15:23:03', 'Hayara Octaviani 8065 melakukan login ke sistem', '180.251.157.69', 21, '2023-12-22 15:23:03'),
(74, '2023-12-22 15:51:47', 'administrator menghapus data consult_response dengan ID : 3', '180.251.157.69', 2, '2023-12-22 15:51:47'),
(75, '2023-12-22 16:06:06', 'Mario mengubah data consult_question dengan ID - nama = 1 - Name', '180.251.157.69', 2, '2023-12-22 16:06:06'),
(76, '2023-12-22 16:06:53', 'Mario mengubah data consult_question dengan ID - nama = 1 - Fullname', '180.251.157.69', 2, '2023-12-22 16:06:53'),
(77, '2023-12-26 09:15:33', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-26 09:15:33'),
(78, '2023-12-26 09:15:57', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-26 09:15:57'),
(79, '2023-12-26 09:59:39', 'Mario melakukan login ke sistem', '202.58.194.26', 2, '2023-12-26 09:59:39'),
(80, '2023-12-26 10:05:37', 'Mario mengubah data product dengan ID - nama = 1 - Brightlogy Whitening Kit', '202.58.194.26', 2, '2023-12-26 10:05:37'),
(81, '2023-12-26 10:08:49', 'Mario mengubah data product dengan ID - nama = 3 - Fitlogy Tea Drink', '202.58.194.26', 2, '2023-12-26 10:08:49'),
(82, '2023-12-26 14:01:17', 'Mario melakukan login ke sistem', '202.58.194.26', 2, '2023-12-26 14:01:17'),
(83, '2023-12-26 14:03:12', 'Mario mengubah data product dengan ID - nama = 4 - Growlogy Eyelash & Brow Serum', '202.58.194.26', 2, '2023-12-26 14:03:12'),
(84, '2023-12-26 14:05:06', 'Mario mengubah data product dengan ID - nama = 5 - Brightlogy Collagen Drink', '202.58.194.26', 2, '2023-12-26 14:05:06'),
(85, '2023-12-26 14:08:46', 'Mario mengubah data product dengan ID - nama = 6 - Brightlogy 7D Pink Lip Serum', '202.58.194.26', 2, '2023-12-26 14:08:46'),
(86, '2023-12-26 14:11:18', 'Mario mengubah data product dengan ID - nama = 7 - Brightlogy Body Lotion', '202.58.194.26', 2, '2023-12-26 14:11:18'),
(87, '2023-12-26 14:13:22', 'Mario mengubah data product dengan ID - nama = 8 - Brightlogy Intensive Brightening Serum', '202.58.194.26', 2, '2023-12-26 14:13:22'),
(88, '2023-12-26 14:20:22', 'Mario mengubah data product dengan ID - nama = 9 - Acnalogy Powder Drink', '202.58.194.26', 2, '2023-12-26 14:20:22'),
(89, '2023-12-26 14:22:46', 'Mario mengubah data product dengan ID - nama = 11 - Fitlogy Fiber Drink Apple', '202.58.194.26', 2, '2023-12-26 14:22:46'),
(90, '2023-12-26 14:29:51', 'Mario mengubah data product dengan ID - nama = 12 - Body Wash', '202.58.194.26', 2, '2023-12-26 14:29:51'),
(91, '2023-12-26 14:32:57', 'administrator menghapus data product dengan ID : 18 - ', '202.58.194.26', 2, '2023-12-26 14:32:57'),
(92, '2023-12-26 14:38:59', 'Mario mengubah data product dengan ID - nama = 13 -  Brightlogy Face Serum', '202.58.194.26', 2, '2023-12-26 14:38:59'),
(93, '2023-12-27 09:40:13', 'Mario melakukan login ke sistem', '202.58.194.26', 2, '2023-12-27 09:40:13'),
(94, '2023-12-27 09:57:55', 'Mario mengubah data product dengan ID - nama = 14 - Acnalogy Face Serum', '202.58.194.26', 2, '2023-12-27 09:57:55'),
(95, '2023-12-27 10:06:38', 'Mario mengubah data product dengan ID - nama = 15 - Slimlogy Slimming Gel', '202.58.194.26', 2, '2023-12-27 10:06:38'),
(96, '2023-12-27 10:07:24', 'Mario mengubah data product dengan ID - nama = 15 - Slimlogy Slimming Gel', '202.58.194.26', 2, '2023-12-27 10:07:24'),
(97, '2023-12-27 10:15:56', 'Mario mengubah data product dengan ID - nama = 17 - Fitlogy Fiber Drink Choco', '202.58.194.26', 2, '2023-12-27 10:15:56'),
(98, '2023-12-27 10:17:32', 'Mario mengubah data product dengan ID - nama = 15 - Slimlogy Slimming Gel', '202.58.194.26', 2, '2023-12-27 10:17:32'),
(99, '2023-12-27 10:19:41', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-27 10:19:41'),
(100, '2023-12-27 10:19:54', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-27 10:19:54'),
(101, '2023-12-27 10:23:59', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-27 10:23:59'),
(102, '2023-12-27 10:24:15', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-27 10:24:15'),
(103, '2023-12-27 10:44:11', 'administrator menghapus data product_service dengan ID : 28 - ', '202.58.194.26', 2, '2023-12-27 10:44:11'),
(104, '2023-12-27 10:44:16', 'administrator menghapus data product_service dengan ID : 29 - ', '202.58.194.26', 2, '2023-12-27 10:44:16'),
(105, '2023-12-27 10:44:24', 'administrator menghapus data product_service dengan ID : 30 - ', '202.58.194.26', 2, '2023-12-27 10:44:24'),
(106, '2023-12-27 10:44:27', 'administrator menghapus data product_service dengan ID : 31 - ', '202.58.194.26', 2, '2023-12-27 10:44:27'),
(107, '2023-12-27 10:44:29', 'administrator menghapus data product_service dengan ID : 32 - ', '202.58.194.26', 2, '2023-12-27 10:44:29'),
(108, '2023-12-27 10:44:31', 'administrator menghapus data product_service dengan ID : 33 - ', '202.58.194.26', 2, '2023-12-27 10:44:31'),
(109, '2023-12-27 10:44:33', 'administrator menghapus data product_service dengan ID : 34 - ', '202.58.194.26', 2, '2023-12-27 10:44:33'),
(110, '2023-12-27 10:44:34', 'administrator menghapus data product_service dengan ID : 35 - ', '202.58.194.26', 2, '2023-12-27 10:44:34'),
(111, '2023-12-27 10:44:37', 'administrator menghapus data product_service dengan ID : 36 - ', '202.58.194.26', 2, '2023-12-27 10:44:37'),
(112, '2023-12-27 10:44:40', 'administrator menghapus data product_service dengan ID : 37 - ', '202.58.194.26', 2, '2023-12-27 10:44:40'),
(113, '2023-12-27 10:44:42', 'administrator menghapus data product_service dengan ID : 38 - ', '202.58.194.26', 2, '2023-12-27 10:44:42'),
(114, '2023-12-27 10:44:44', 'administrator menghapus data product_service dengan ID : 39 - ', '202.58.194.26', 2, '2023-12-27 10:44:44'),
(115, '2023-12-27 10:44:46', 'administrator menghapus data product_service dengan ID : 40 - ', '202.58.194.26', 2, '2023-12-27 10:44:46'),
(116, '2023-12-27 10:45:15', 'administrator menghapus data product_service dengan ID : 1 - ', '202.58.194.26', 2, '2023-12-27 10:45:15'),
(117, '2023-12-27 10:45:19', 'administrator menghapus data product_service dengan ID : 2 - ', '202.58.194.26', 2, '2023-12-27 10:45:19'),
(118, '2023-12-27 10:45:23', 'administrator menghapus data product_service dengan ID : 3 - ', '202.58.194.26', 2, '2023-12-27 10:45:23'),
(119, '2023-12-27 10:45:26', 'administrator menghapus data product_service dengan ID : 4 - ', '202.58.194.26', 2, '2023-12-27 10:45:26'),
(120, '2023-12-27 10:45:28', 'administrator menghapus data product_service dengan ID : 5 - ', '202.58.194.26', 2, '2023-12-27 10:45:28'),
(121, '2023-12-27 10:45:30', 'administrator menghapus data product_service dengan ID : 6 - ', '202.58.194.26', 2, '2023-12-27 10:45:30'),
(122, '2023-12-27 10:45:32', 'administrator menghapus data product_service dengan ID : 7 - ', '202.58.194.26', 2, '2023-12-27 10:45:32'),
(123, '2023-12-27 10:45:34', 'administrator menghapus data product_service dengan ID : 8 - ', '202.58.194.26', 2, '2023-12-27 10:45:34'),
(124, '2023-12-27 10:45:35', 'administrator menghapus data product_service dengan ID : 9 - ', '202.58.194.26', 2, '2023-12-27 10:45:35'),
(125, '2023-12-27 10:45:37', 'administrator menghapus data product_service dengan ID : 10 - ', '202.58.194.26', 2, '2023-12-27 10:45:37'),
(126, '2023-12-27 10:45:39', 'administrator menghapus data product_service dengan ID : 11 - ', '202.58.194.26', 2, '2023-12-27 10:45:39'),
(127, '2023-12-27 10:45:41', 'administrator menghapus data product_service dengan ID : 12 - ', '202.58.194.26', 2, '2023-12-27 10:45:41'),
(128, '2023-12-27 10:45:43', 'administrator menghapus data product_service dengan ID : 13 - ', '202.58.194.26', 2, '2023-12-27 10:45:43'),
(129, '2023-12-27 10:45:45', 'administrator menghapus data product_service dengan ID : 14 - ', '202.58.194.26', 2, '2023-12-27 10:45:45'),
(130, '2023-12-27 10:45:47', 'administrator menghapus data product_service dengan ID : 15 - ', '202.58.194.26', 2, '2023-12-27 10:45:47'),
(131, '2023-12-27 10:45:49', 'administrator menghapus data product_service dengan ID : 16 - ', '202.58.194.26', 2, '2023-12-27 10:45:49'),
(132, '2023-12-27 10:45:51', 'administrator menghapus data product_service dengan ID : 17 - ', '202.58.194.26', 2, '2023-12-27 10:45:51'),
(133, '2023-12-27 10:45:52', 'administrator menghapus data product_service dengan ID : 18 - ', '202.58.194.26', 2, '2023-12-27 10:45:52'),
(134, '2023-12-27 10:45:54', 'administrator menghapus data product_service dengan ID : 19 - ', '202.58.194.26', 2, '2023-12-27 10:45:54'),
(135, '2023-12-27 10:45:56', 'administrator menghapus data product_service dengan ID : 20 - ', '202.58.194.26', 2, '2023-12-27 10:45:56'),
(136, '2023-12-27 10:45:58', 'administrator menghapus data product_service dengan ID : 21 - ', '202.58.194.26', 2, '2023-12-27 10:45:58'),
(137, '2023-12-27 10:46:00', 'administrator menghapus data product_service dengan ID : 22 - ', '202.58.194.26', 2, '2023-12-27 10:46:00'),
(138, '2023-12-27 10:46:02', 'administrator menghapus data product_service dengan ID : 23 - ', '202.58.194.26', 2, '2023-12-27 10:46:02'),
(139, '2023-12-27 10:46:04', 'administrator menghapus data product_service dengan ID : 24 - ', '202.58.194.26', 2, '2023-12-27 10:46:04'),
(140, '2023-12-27 10:46:05', 'administrator menghapus data product_service dengan ID : 25 - ', '202.58.194.26', 2, '2023-12-27 10:46:05'),
(141, '2023-12-27 10:46:07', 'administrator menghapus data product_service dengan ID : 26 - ', '202.58.194.26', 2, '2023-12-27 10:46:07'),
(142, '2023-12-27 11:06:24', 'bydhea wikana melakukan login ke sistem', '202.58.194.26', 13, '2023-12-27 11:06:24'),
(143, '2023-12-27 11:06:36', 'bydhea wikana menambah data sim response ', '202.58.194.26', 13, '2023-12-27 11:06:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text,
  `product_shopee_link` text,
  `product_cover` text NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_shopee_link`, `product_cover`, `product_status`, `updatetime`, `createtime`) VALUES
(1, 'Brightlogy Whitening Kit', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Membantu </span><span style=\"background-color: #ffffff; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve;\">memutihkan gigi &amp;</span><span style=\"background-color: #ffffff; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve;\"> menghapus noda pada gigi (akibat sisa makanan, teh, kopi, dll yang terperangkap di dalam gigi). 100% Aman untuk tambalan, behel, veneer, crown dan gigi palsu. </span></p>', 'https://shopee.co.id/NewLab-Pro-Teeth-Whitening-Kit-Alat-Pemutih-Gigi-Permanen-Bleaching-Gigi-i.3714573.7315786944?sp_atk=fa022df4-0fad-4889-a235-2cf212beaa14&xptdk=fa022df4-0fad-4889-a235-2cf212beaa14', 'thumbnailproduct-20231201122136.png', 'Aktif', '2023-12-26 10:05:37', '2023-11-23 11:36:54'),
(3, 'Fitlogy Tea Drink', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Membantu membersihkan &amp; mendetoks saluran pencernaan, serta mempercepat proses metabolisme &amp; pembuangan ampas makanan. Selain itu Fitlogy Tea Drink juga mampu mengurangi nafsu makan dan efektif menurunkan 1-5 kg dalam 14 hari.</p>', 'https://shopee.co.id/NewLab-Fitlogy-Tea-Drink-Teh-Diet-Teh-Detox-Teh-Pelangsing-Slimming-Tea-i.3714573.6131697514?sp_atk=e2d24dc9-2558-4944-9717-a4fd013b9579&xptdk=e2d24dc9-2558-4944-9717-a4fd013b9579', 'thumbnailproduct-20231201122231.png', 'Aktif', '2023-12-26 10:08:49', '2023-11-24 13:04:47'),
(4, 'Growlogy Eyelash & Brow Serum', '<p>Membantu memanjangkan dan melebatkan bulu mata</p>', 'https://shopee.co.id/NewLab-Eyelash-Brow-Serum-Penumbuh-Bulu-Mata-Alis-Serum-Bulu-Mata-dan-Alis-i.3714573.5339709552?sp_atk=eaa26202-bd58-486b-9dff-49bf02d4058b&xptdk=eaa26202-bd58-486b-9dff-49bf02d4058b', 'thumbnailproduct-20231201122312.png', 'Aktif', '2023-12-26 14:03:12', '2023-11-24 13:05:29'),
(5, 'Brightlogy Collagen Drink', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Menjadikan kulit lebih cerah dan glowing dari dalam, terlihat lebih muda dan memperkuat &amp; mempercepat pertumbuhan rambut &amp; kuku</p>', 'https://shopee.co.id/NewLab-Premium-Collagen-Drink-Minuman-Collagen-Kolagen-Pencerah-Kulit-i.3714573.7586297663?sp_atk=a0fc82c2-2e53-4542-89f8-b4e4892c6e35&xptdk=a0fc82c2-2e53-4542-89f8-b4e4892c6e35', 'thumbnailproduct-20231201122503.png', 'Aktif', '2023-12-26 14:05:06', '2023-11-24 13:05:47'),
(6, 'Brightlogy 7D Pink Lip Serum', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Mencerahkan warna bibir dari dalam, memberikan warna pink alami pada bibir dalam 1x pemakaian serta melembabkan dan melembutkan bibir</p>\r\n<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">&nbsp;</p>', 'https://shopee.co.id/NewLab-7D-Pink-Lip-Serum-I-Serum-Bibir-untuk-Bibir-Hitam-Lip-Balm-Pemerah-Bibir-i.3714573.16708474904', 'thumbnailproduct-20231201122558.png', 'Aktif', '2023-12-26 14:08:46', '2023-11-24 13:06:07'),
(7, 'Brightlogy Body Lotion', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Melembabkan dan meratakan warna kulit, mengangkat sel-sel kulit mati. Serta menghilangkan bekas luka dan melindungi kulit dari sinar UV</p>', 'https://shopee.co.id/NewLab-Brightening-Body-Lotion-AHA-Handbody-Pencerah-Kulit-i.3714573.11568964148', 'thumbnailproduct-20231201130903.jpg', 'Aktif', '2023-12-26 14:11:18', '2023-11-24 13:06:25'),
(8, 'Brightlogy Intensive Brightening Serum', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Mencerahkan kulit area lipatan dari dalam</span></p>', 'https://shopee.co.id/NewLab-Underarm-Brightening-Serum-AHA-Serum-Pencerah-Ketiak-dan-Selangkangan-i.3714573.13745120121', 'thumbnailproduct-20231201122055.png', 'Aktif', '2023-12-26 14:13:22', '2023-11-24 13:06:41'),
(9, 'Acnalogy Powder Drink', '<p>Mengurangi produksi minyak berlebih, memudarkan bekas jerawat dan mempercepat regenerasi kulit.</p>', 'https://shopee.co.id/NewLab-Acnalogy-Powder-Drink-Minuman-untuk-Jerawat-Suplemen-Acne-i.3714573.18956952418', 'thumbnailproduct-20231201121954.png', 'Aktif', '2023-12-26 14:20:22', '2023-11-24 13:06:58'),
(11, 'Fitlogy Fiber Drink Apple', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Menutrisi dan melancarkan saluran pencernaan, membuat rasa kenyang lebih lama dalam tubuh, meningkatkan metabolisme tubuh dengan 30 Miliar Probiotik</p>\r\n<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">dan memenuhi asupan serat harian terpenuhi dengan 100++ ekstrak buah dan sayur.</p>', 'https://shopee.co.id/NewLab-Fiber-Drink-Apple-Minuman-Diet-Tinggi-Serat-Miliaran-Probiotic-Pencernaan-100-Lancar-i.3714573.23855838094?sp_atk=152fc4c4-9b51-4434-9f98-5a629424844e', 'thumbnailproduct-20231201121824.png', 'Aktif', '2023-12-26 14:22:46', '2023-12-01 11:35:00'),
(12, 'Body Wash', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Mencerahkan kulit dan mengangkat sel kulit mati</p>', 'https://shopee.co.id/NewLab-Brightening-Body-Wash-AHA-Sabun-Pencerah-Badan-Sabun-Mencerahkan-Badan-i.3714573.18773652241?sp_atk=c5b5c8f6-7e4b-4335-9ed8-22fc0126049e&xptdk=c5b5c8f6-7e4b-4335-9ed8-22fc0126049e', 'thumbnailproduct-20231201122025.png', 'Aktif', '2023-12-26 14:29:51', '2023-12-01 11:36:00'),
(13, ' Brightlogy Face Serum', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Mencerahkan kulit &amp; melembabkan kulit serta mencegah kerutan pada wajah</p>', 'https://shopee.co.id/NewLab-Brightening-Face-Serum-Serum-Pencerah-Wajah-Serum-Glowing-i.3714573.23269339226?sp_atk=73dee6a1-6397-46fc-af69-281296978e98&xptdk=73dee6a1-6397-46fc-af69-281296978e98', 'thumbnailproduct-20231201131145.png', 'Aktif', '2023-12-26 14:38:59', '2023-12-01 11:36:29'),
(14, 'Acnalogy Face Serum', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Mencegah jerawat, melindungi kulit dari sinar UV dan melembabkan kulit</p>', 'https://shopee.co.id/NewLab-Acnalogy-Face-Serum-Serum-Wajah-Jerawat-Niacinamide-Salicylic-Acid-Serum-i.3714573.22369335831?sp_atk=ec672921-1611-47c3-9a3e-772ef9098163&xptdk=ec672921-1611-47c3-9a3e-772ef9098163✅ Mencegah jerawat   ✅ Melindungi kulit dari sinar UV   ✅ Melembabkan kulit ', 'thumbnailproduct-20231201131216.png', 'Aktif', '2023-12-27 09:57:55', '2023-12-01 11:36:48'),
(15, 'Slimlogy Slimming Gel', '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space-collapse: preserve; background-color: #ffffff;\">Meningkatkan pembakaran lemak​, mencegah pembentukan lemak dengan menurunkan aktifitas LDAP​ dan mencegah selulit​</p>', 'https://shopee.co.id/NewLab-Slimming-Gel-Cream-Pembakar-Lemak-Gel-Pelangsing-Perut-i.3714573.22974907558?sp_atk=e907111b-6e90-4ddb-a49a-6aa699ef8ae9&xptdk=e907111b-6e90-4ddb-a49a-6aa699ef8ae9', 'thumbnailproduct-20231201131253.png', 'Aktif', '2023-12-27 10:17:32', '2023-12-01 11:37:11'),
(17, 'Fitlogy Fiber Drink Choco', '<p>Sebagai pengganti makan pagi atau malam dan membuat perut kenyang lebih lama&nbsp;</p>', 'https://shopee.co.id/NewLab-Fiber-Drink-Choco-Meal-Replacement-Susu-Diet-Coklat-i.3714573.19453415762?sp_atk=8953ffbc-633c-48eb-82ee-de2ea227cedb', 'thumbnailproduct-20231201131042.jpg', 'Aktif', '2023-12-27 10:15:56', '2023-12-01 11:38:21');

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
(1, 'Ideal body weight', '3', 'Body', '2023-12-01 11:44:26', '2023-11-26 17:31:20'),
(2, 'Bright skin (face/body) ', '12;7;5;13', 'Skin', '2023-12-11 10:36:07', '2023-11-26 18:21:04'),
(3, 'Free from acne (face/body) ', '14;9', 'Skin', '2023-12-11 10:51:00', '2023-11-26 18:21:59'),
(4, 'More elastic skin (face/body)', '12;5;13', 'Skin', '2023-12-11 10:37:09', '2023-11-26 18:22:40'),
(5, 'Reduced fine lines (face)', '5;13', 'Skin', '2023-12-11 10:37:23', '2023-11-26 18:23:04'),
(6, 'Thicker eyelashes (eyeleashes/eyebrows)', '4', 'Skin', '2023-12-11 10:37:39', '2023-11-26 18:23:33'),
(7, 'Naturally pink lips (lips)', '6', 'Skin', '2023-12-11 10:37:54', '2023-11-26 18:24:08'),
(8, 'Brightened fold areas (fold areas)', '7', 'Skin', '2023-12-11 10:38:33', '2023-11-26 18:24:41'),
(9, 'Fulfilled fibers', '11', 'Body', '2023-12-01 11:44:42', '2023-11-26 18:25:08'),
(10, 'Not easily hungry', '17', 'Body', '2023-12-01 11:44:54', '2023-11-26 18:25:20'),
(12, 'Teeth appear whiter', '1', 'Teeth', '2023-12-01 13:22:01', '2023-11-26 18:26:23'),
(13, 'Non-sensitive teeth\n', '1', 'Teeth', '2023-12-01 13:22:09', '2023-11-26 18:26:43'),
(14, 'No tooth stains', '1', 'Teeth', '2023-12-01 13:22:16', '2023-11-26 18:27:00'),
(15, 'Stopped snacking', '17', 'Body', '2023-12-01 11:45:44', '2023-12-01 11:45:44');

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
  `sim_question_order` int(11) DEFAULT '100',
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_question`
--

INSERT INTO `tbl_sim_question` (`sim_question_id`, `sim_question_text`, `sim_question_image`, `sim_question_type`, `sim_question_part`, `sim_question_multi`, `sim_question_order`, `updatetime`, `createtime`) VALUES
(1, 'Body Weight (kg)', NULL, 'number', 'Body', 'N', 1, '2023-12-01 11:14:19', '2023-11-24 17:51:27'),
(2, 'Height (cm)', NULL, 'number', 'Body', 'N', 2, '2023-12-01 11:14:38', '2023-11-24 17:51:44'),
(3, 'Waist Circumference (cm)', NULL, 'number', 'Body', 'N', 3, '2023-12-01 11:14:52', '2023-11-24 17:52:01'),
(4, 'Specific Issues', NULL, 'textarea', 'Body', 'N', 4, '2023-12-01 11:15:03', '2023-11-24 17:52:17'),
(5, 'Body Shape Closest To', NULL, 'radio', 'Body', 'N', 7, '2023-12-01 11:15:15', '2023-11-24 17:53:28'),
(6, 'Do you maintain a healthy diet and lifestyle?', NULL, 'dropdown', 'Body', 'N', 5, '2023-12-01 11:15:24', '2023-11-24 17:54:10'),
(7, 'Upload a picture of your part of the body has issues', NULL, 'file', 'Skin', 'N', 3, '2023-12-01 11:17:19', '2023-11-26 14:13:52'),
(8, 'Current Condition', NULL, 'dropdown', 'Skin', 'N', 1, '2023-12-01 11:17:28', '2023-11-26 14:14:12'),
(9, 'Which part of the body has issues?', NULL, 'dropdown', 'Skin', 'N', 2, '2023-12-01 11:17:39', '2023-11-26 14:14:49'),
(10, 'Goals to Achieve', NULL, 'dropdown', 'Body', 'Y', 6, '2023-11-26 18:29:33', '2023-11-26 14:16:40'),
(11, 'Target Weight Loss', NULL, 'dropdown', 'Body', 'N', 8, '2023-12-01 11:17:06', '2023-11-26 14:17:10'),
(12, 'Goals to Achieve', NULL, 'dropdown', 'Skin', 'Y', 5, '2023-11-26 14:21:11', '2023-11-26 14:21:11'),
(13, 'Upload a picture of your teeth', NULL, 'file', 'Teeth', 'N', 3, '2023-12-01 11:18:26', '2023-11-26 14:22:41'),
(14, 'Current Dental Condition', NULL, 'dropdown', 'Teeth', 'N', 1, '2023-12-01 11:18:38', '2023-11-26 14:22:58'),
(15, 'Do you often consume caffeine and smoke?', NULL, 'dropdown', 'Teeth', 'N', 2, '2023-12-01 11:18:51', '2023-11-26 14:23:28'),
(16, 'Goals to Achieve', NULL, 'dropdown', 'Teeth', 'Y', 4, '2023-11-26 14:23:51', '2023-11-26 14:23:51');

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
(1, 'Yes, I regularly exercise and consume an adequate amount of fiber and protein', 6),
(2, 'Sometimes I exercise and follow a diet (>2 times a week)', 6),
(3, 'Not at all, rarely exercise, and eat freely', 6),
(4, 'Ideal body weight', 10),
(5, 'Fiber needs met.', 10),
(6, 'Not easily hungry', 10),
(7, 'Stop snacking', 10),
(8, 'Lose 1-3 kg in 14 days', 11),
(9, 'Lose 5-8 kg in 14 days', 11),
(10, 'Lose 8-10 kg in 14 days', 11),
(11, 'Lose 1-3 kg in 30 days', 11),
(12, 'Lose 5-8 kg in 30 days', 11),
(13, 'Lose 8-10 kg in 30 days', 11),
(14, 'Normals', 8),
(15, 'Dry', 8),
(16, 'Oily', 8),
(17, 'Sensitive', 8),
(18, 'Combination', 8),
(19, 'Face', 9),
(20, 'Body Skin', 9),
(21, 'Eyelashes', 9),
(22, 'Eyebrows', 9),
(23, 'Lips', 9),
(24, 'Fold areas', 9),
(32, 'Yellow', 14),
(33, 'Sensitive', 14),
(34, 'Cigarette or caffeine stains', 14),
(35, 'Yes, i\'m consuming caffeinated beverages\n', 15),
(36, 'Yes, i\'m smoking', 15),
(37, 'Rarely (1-2 times a week) consuming caffeine', 15),
(38, 'Rarely (1-2 times a week) smoking', 15),
(39, 'Not at all', 15),
(40, 'Teeth appear whiter', 16),
(41, 'Teeth are not sensitive', 16),
(42, 'Teeth have no stains', 16),
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
  `sim_response_level` int(24) DEFAULT NULL,
  `daily_activity` varchar(111) NOT NULL,
  `problems_experienced` varchar(111) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_sim_response`
--

INSERT INTO `tbl_sim_response` (`sim_response_id`, `user_id`, `sim_response_name`, `sim_response_gender`, `sim_response_text`, `sim_response_level`, `daily_activity`, `problems_experienced`, `updatetime`, `createtime`) VALUES
(3, 25, 'Retno prasetyowati', 'Woman', NULL, NULL, 'Outdoor', 'Body', '2023-12-13 20:30:50', '2023-12-13 20:30:50'),
(7, 13, 'Dhea', 'Woman', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:4:\"Oily\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231220164825-9030.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:3:\"2;3\";}}', 2, 'Indoor', 'Skin', '2023-12-20 16:48:25', '2023-12-20 16:47:47'),
(8, 20, 'M', 'Man', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:3:\"Dry\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:26:\"--20231220165152-1718.jpeg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"5\";}}', 4, 'Indoor', 'Skin', '2023-12-20 16:51:52', '2023-12-20 16:51:23'),
(9, 29, 'Ryan Tri Nugraha', 'Man', NULL, NULL, 'Indoor', 'Skin', '2023-12-20 17:34:40', '2023-12-20 17:34:40'),
(10, 21, 'nia', 'Woman', NULL, NULL, 'Indoor', 'Skin', '2023-12-20 21:26:42', '2023-12-20 21:26:42'),
(11, 21, 'nia', 'Woman', NULL, NULL, 'Indoor', 'Teeth', '2023-12-20 21:30:17', '2023-12-20 21:30:17'),
(12, 21, 'nia', 'Woman', 'a:8:{i:0;a:2:{s:1:\"q\";s:17:\"Body Weight (kg) \";s:1:\"r\";s:2:\"52\";}i:1;a:2:{s:1:\"q\";s:12:\"Height (cm) \";s:1:\"r\";s:3:\"152\";}i:2;a:2:{s:1:\"q\";s:25:\"Waist Circumference (cm) \";s:1:\"r\";s:2:\"65\";}i:3;a:2:{s:1:\"q\";s:16:\"Specific Issues \";s:1:\"r\";s:3:\"fat\";}i:4;a:2:{s:1:\"q\";s:46:\"Do you maintain a healthy diet and lifestyle? \";s:1:\"r\";s:43:\"Not at all, rarely exercise, and eat freely\";}i:5;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"1\";}i:6;a:2:{s:1:\"q\";s:22:\"Body Shape Closest To \";s:1:\"r\";s:30:\"option-20231128111542-6632.png\";}i:7;a:2:{s:1:\"q\";s:19:\"Target Weight Loss \";s:1:\"r\";s:22:\"Lose 5-8 kg in 14 days\";}}', NULL, 'Indoor', 'Body', '2023-12-20 21:36:17', '2023-12-20 21:30:59'),
(13, 12, 'Iqbal', 'Man', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:7:\"Normals\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231222100708-7576.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"4\";}}', 5, 'Indoor', 'Skin', '2023-12-22 10:07:08', '2023-12-22 10:03:45'),
(14, 30, 'elko', 'Man', NULL, NULL, 'Outdoor', 'Teeth', '2023-12-22 11:25:01', '2023-12-22 11:25:01'),
(15, 13, 'test', 'Woman', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:11:\"Combination\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231226091707-9332.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"5\";}}', 2, 'Indoor', 'Skin', '2023-12-26 09:17:07', '2023-12-26 09:15:57'),
(16, 13, 'test', 'Woman', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:11:\"Combination\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:9:\"Body Skin\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231227102209-2512.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"2\";}}', 2, 'Indoor', 'Skin', '2023-12-27 10:22:09', '2023-12-27 10:19:54'),
(17, 13, 'Dhea', 'Woman', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:3:\"Dry\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231227102457-6341.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"5\";}}', 1, 'Indoor', 'Skin', '2023-12-27 10:24:57', '2023-12-27 10:24:15'),
(18, 13, 'Dhea', 'Woman', 'a:4:{i:0;a:2:{s:1:\"q\";s:18:\"Current Condition \";s:1:\"r\";s:3:\"Dry\";}i:1;a:2:{s:1:\"q\";s:35:\"Which part of the body has issues? \";s:1:\"r\";s:4:\"Face\";}i:2;a:2:{s:1:\"q\";s:53:\"Upload a picture of your part of the body has issues \";s:1:\"r\";s:25:\"--20231227110659-8010.jpg\";}i:3;a:2:{s:1:\"q\";s:17:\"Goals to Achieve \";s:1:\"r\";s:1:\"5\";}}', 1, 'Indoor', 'Skin', '2023-12-27 11:06:59', '2023-12-27 11:06:36');

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
  `user_spesialis` varchar(100) DEFAULT NULL,
  `user_category` varchar(24) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_photo`, `user_gender`, `user_spesialis`, `user_category`, `user_lastlogin`, `createtime`, `group_id`) VALUES
(1, 'Portal Studio', 'super_admin', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'portalstudio30@gmail.com', '', 'profile-1-20231201050311.jpg', 'Laki-Laki', '', '', '2022-10-05 21:47:20', '2022-10-05 21:47:20', 1),
(2, 'Mario', 'administrator', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'newlabindo@gmail.com', '', 'profile-2-20231222144955.jpg', 'Laki-Laki', '', '', '0000-00-00 00:00:00', '2022-10-27 04:59:45', 2),
(8, 'Hayara Octaviani', 'newlab_doctor', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'newlabdoctor@gmail.com', '6281246662006', 'profile-1-20231018215547.jpg', NULL, 'Nutrition Specialist Doctor', '1', '0000-00-00 00:00:00', '2023-10-29 22:56:09', 3),
(10, 'ChindyElfianaSN ', 'chindyelfiana@gmail.com', 'chindyelfiana@gmail.com', 'chindyelfiana@gmail.com', '', '', NULL, '', '', '0000-00-00 00:00:00', '2023-11-23 15:31:16', 4),
(11, 'muhammad danil', 'muhammaddanil790@gmail.com', 'muhammaddanil790@gmail.com', 'muhammaddanil790@gmail.com', '', '', NULL, '', '', '0000-00-00 00:00:00', '2023-11-27 09:04:18', 4),
(12, 'Iqbal Tahir', 'iqbaltahirtesting@gmail.com', 'iqbaltahirtesting@gmail.com', 'iqbaltahirtesting@gmail.com', '', '', NULL, '', '', '0000-00-00 00:00:00', '2023-11-30 14:56:49', 4),
(13, 'bydhea wikana', 'bydheaw@gmail.com', '$2y$10$qrvYeq.negRk/Enep5SdYu8BjNs7zz/YQw7nB1AbKnG.p0QtHZlB6', 'bydheaw@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-01 11:28:40', 4),
(14, 'Nur Azizah Tadjuddin 7023', 'nurazizatadjuddin@gmail.com', '$2y$10$Vtdt.7LLaAhzqtxEzcc1ZuN8gmpjivzbsl5sJHu3DVjQRGAJtQWZ6', 'nurazizatadjuddin@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-01 14:15:10', 4),
(15, 'Gillbert Gunawan', 'gunawangillbert@gmail.com', '$2y$10$m2UdVtVJrl/K4NTE1pSoV.piLTv0DsRyvkUGyTk9uceQNZn2KX6DG', 'gunawangillbert@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-01 15:21:03', 4),
(18, 'Cindy Amelia', 'cindyaa1616@gmail.com', '$2y$10$OvRZmvoiMNAYh.RfrxGCeOhwQdzUwljOwRbybfcudqrlowkRc8LEq', 'cindyaa1616@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-07 16:27:54', 4),
(19, 'haha wkwk', 'wkwkh23@gmail.com', '$2y$10$NPbCgfLtWQh31LRmwxvBDebEzhaGv9RoXyJoOT.plzitUDuOB2Eyq', 'wkwkh23@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-07 16:31:59', 4),
(20, 'Meliani ', 'meliani8994@gmail.com', '$2y$10$iWDlF8zymmzgG0nuvRocDeEnEIbXhnQJUNye9k2SXdHH15Q3RC84u', 'meliani8994@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-08 15:15:00', 4),
(21, 'Hayara Octaviani 8065', 'hayaraoctaviani@gmail.com', '$2y$10$8eMImqFeP.j5viGMEQgk/uqQaui3ORLTrCT/ZfiMsRjHAM4Pp/AaW', 'hayaraoctaviani@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-11 11:18:09', 4),
(22, 'Han Achmad', 'nasar.achmad86@gmail.com', '$2y$10$.vgHzbWyMZozzm85opakROTgUWx9DPDB4wDrq0hP0L9iI0l2.Zrn6', 'nasar.achmad86@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-11 21:46:14', 4),
(23, 'abia storeid', 'abiastore180@gmail.com', '$2y$10$qrqYjEUbFOxDJMypTsWRWeDNp6ihY.4U.Gan79nWPaxXWsH17Ycuy', 'abiastore180@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-11 22:09:07', 4),
(24, 'PALiBu Channel', 'palibu6@gmail.com', '$2y$10$lU4V6ivoVRPJvioCRWpJPuvYjqGGWclmV1kuYuJ0.g2VWsd4MbRhC', 'palibu6@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-12 13:56:52', 4),
(25, 'Retno Prasetyowati', 'retnoprasetyowati22@gmail.com', '$2y$10$5Pha1/nsS7MAyQt6OinwWu6MFBeT3Y5ndpuRFkxp9WZsgcmd9SUEi', 'retnoprasetyowati22@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-13 20:30:07', 4),
(26, 'Siti khalifah Muliono', 'sitikhalifahmuliono@gmail.com', '$2y$10$Yr.wzBjE63EbAIwUSG.DW.AfzUUillDjloFUymohg6sMLhaXo86AC', 'sitikhalifahmuliono@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-14 22:44:56', 4),
(27, 'Data Kurnia ', 'filedatakurnia@gmail.com', '$2y$10$0M0sz736Bdzr8p6E/M/aVOHj6SrUodhibqMmuekwqW5uoakxTC9Fa', 'filedatakurnia@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-14 22:52:10', 4),
(28, 'APRIL LYA', 'laprilia150@gmail.com', '$2y$10$nzEVhml.8o2YXWVcw6i.G./Jba5IudU0MjfZCpuI1VYob70RH3Fse', 'laprilia150@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-15 09:41:47', 4),
(29, 'Ryan Tri Nugraha', 'ryantrinugraha@gmail.com', '$2y$10$8wANn2q37JPE./IS7MMVJOQtRb2V1wuoMeFIej.ca7vU.0DCzCTSG', 'ryantrinugraha@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-20 17:34:06', 4),
(30, 'Elko Dedy Pratama', 'elkodedy.99@gmail.com', '$2y$10$6hhNFVaqXIcWqIuJwg1yc.u8s3cJgdda7M.acLEEFH7.Gc9gWglUO', 'elkodedy.99@gmail.com', '', '', NULL, NULL, '', '0000-00-00 00:00:00', '2023-12-22 11:24:36', 4);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_field`
--

CREATE TABLE `tbl_web_field` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_news_category`
--

CREATE TABLE `tbl_web_news_category` (
  `news_category_id` int(11) NOT NULL,
  `news_category_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `tbl_consult_question`
--
ALTER TABLE `tbl_consult_question`
  MODIFY `consult_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_consult_q_option`
--
ALTER TABLE `tbl_consult_q_option`
  MODIFY `consult_q_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_consult_response`
--
ALTER TABLE `tbl_consult_response`
  MODIFY `consult_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `gallery_category_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_product_service`
--
ALTER TABLE `tbl_product_service`
  MODIFY `product_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_goals`
--
ALTER TABLE `tbl_sim_goals`
  MODIFY `sim_goals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_question`
--
ALTER TABLE `tbl_sim_question`
  MODIFY `sim_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_q_option`
--
ALTER TABLE `tbl_sim_q_option`
  MODIFY `sim_q_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_sim_response`
--
ALTER TABLE `tbl_sim_response`
  MODIFY `sim_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  MODIFY `news_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
