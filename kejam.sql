-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 07:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eza`
--

-- --------------------------------------------------------

--
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Superadmin Group'),
(2, 'RT', 'Rukun Tetangga'),
(3, 'RW', 'Rukun Warga'),
(4, 'Kelurahan', 'Kelurahan');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'menu_dashboard', NULL),
(2, 'menu_crud_builder', NULL),
(3, 'menu_api_builder', NULL),
(4, 'menu_page_builder', NULL),
(5, 'menu_form_builder', NULL),
(6, 'menu_menu', NULL),
(7, 'menu_auth', NULL),
(8, 'menu_user', NULL),
(9, 'menu_group', NULL),
(10, 'menu_access', NULL),
(11, 'menu_permission', NULL),
(12, 'menu_api_documentation', NULL),
(13, 'menu_web_documentation', NULL),
(14, 'menu_settings', NULL),
(15, 'user_list', NULL),
(16, 'user_update_status', NULL),
(17, 'user_export', NULL),
(18, 'user_add', NULL),
(19, 'user_update', NULL),
(20, 'user_update_profile', NULL),
(21, 'user_update_password', NULL),
(22, 'user_profile', NULL),
(23, 'user_view', NULL),
(24, 'user_delete', NULL),
(25, 'blog_list', NULL),
(26, 'blog_export', NULL),
(27, 'blog_add', NULL),
(28, 'blog_update', NULL),
(29, 'blog_view', NULL),
(30, 'blog_delete', NULL),
(31, 'form_list', NULL),
(32, 'form_export', NULL),
(33, 'form_add', NULL),
(34, 'form_update', NULL),
(35, 'form_view', NULL),
(36, 'form_manage', NULL),
(37, 'form_delete', NULL),
(38, 'crud_list', NULL),
(39, 'crud_export', NULL),
(40, 'crud_add', NULL),
(41, 'crud_update', NULL),
(42, 'crud_view', NULL),
(43, 'crud_delete', NULL),
(44, 'rest_list', NULL),
(45, 'rest_export', NULL),
(46, 'rest_add', NULL),
(47, 'rest_update', NULL),
(48, 'rest_view', NULL),
(49, 'rest_delete', NULL),
(50, 'group_list', NULL),
(51, 'group_export', NULL),
(52, 'group_add', NULL),
(53, 'group_update', NULL),
(54, 'group_view', NULL),
(55, 'group_delete', NULL),
(56, 'permission_list', NULL),
(57, 'permission_export', NULL),
(58, 'permission_add', NULL),
(59, 'permission_update', NULL),
(60, 'permission_view', NULL),
(61, 'permission_delete', NULL),
(62, 'access_list', NULL),
(63, 'access_add', NULL),
(64, 'access_update', NULL),
(65, 'menu_list', NULL),
(66, 'menu_add', NULL),
(67, 'menu_update', NULL),
(68, 'menu_delete', NULL),
(69, 'menu_save_ordering', NULL),
(70, 'menu_type_add', NULL),
(71, 'page_list', NULL),
(72, 'page_export', NULL),
(73, 'page_add', NULL),
(74, 'page_update', NULL),
(75, 'page_view', NULL),
(76, 'page_delete', NULL),
(77, 'blog_list', NULL),
(78, 'blog_export', NULL),
(79, 'blog_add', NULL),
(80, 'blog_update', NULL),
(81, 'blog_view', NULL),
(82, 'blog_delete', NULL),
(83, 'setting', NULL),
(84, 'setting_update', NULL),
(85, 'dashboard', NULL),
(86, 'extension_list', NULL),
(87, 'extension_activate', NULL),
(88, 'extension_deactivate', NULL),
(89, 'penduduk_add', ''),
(90, 'penduduk_update', ''),
(91, 'penduduk_view', ''),
(92, 'penduduk_delete', ''),
(93, 'penduduk_list', ''),
(94, 'menu_data_penduduk', ''),
(95, 'penduduk_export', ''),
(96, 'extension_add', ''),
(97, 'extension_install', ''),
(98, 'arsip_add', ''),
(99, 'arsip_update', ''),
(100, 'arsip_view', ''),
(101, 'arsip_delete', ''),
(102, 'arsip_list', ''),
(103, 'menu_users', ''),
(104, 'menu_data_arsip', ''),
(105, 'tipe_pelayanan_add', ''),
(106, 'tipe_pelayanan_update', ''),
(107, 'tipe_pelayanan_view', ''),
(108, 'tipe_pelayanan_delete', ''),
(109, 'tipe_pelayanan_list', ''),
(110, 'menu_tipe_layanan', ''),
(111, 'menu_pelayanan', ''),
(112, 'menu_tipe_pelayanan', ''),
(113, 'menu_notifikasi', ''),
(114, 'pelayanan_add', ''),
(115, 'pelayanan_update', ''),
(116, 'pelayanan_view', ''),
(117, 'pelayanan_delete', ''),
(118, 'pelayanan_list', ''),
(119, 'menu_data_pengguna', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(111, 0),
(1, 4),
(94, 4),
(104, 4),
(111, 4),
(112, 4),
(113, 4),
(20, 4),
(22, 4),
(85, 4),
(89, 4),
(90, 4),
(91, 4),
(92, 4),
(93, 4),
(95, 4),
(98, 4),
(99, 4),
(100, 4),
(101, 4),
(102, 4),
(105, 4),
(106, 4),
(107, 4),
(108, 4),
(109, 4),
(114, 4),
(115, 4),
(116, 4),
(117, 4),
(118, 4),
(1, 2),
(94, 2),
(104, 2),
(111, 2),
(112, 2),
(20, 2),
(22, 2),
(85, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(95, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `rt`, `rw`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'admin@admin.com', NULL, NULL, '8b235284a9f7a82364468e52dab386f33844421b481113794e0b4d634c86d0f3', 'admin', 'Administrator', '', 6, 6, 0, '2019-11-12 00:35:54', '2019-11-12 00:35:54', '2019-07-28 05:19:02', NULL, NULL, NULL, NULL, NULL, '::1'),
(2, 'agung@gmail.com', NULL, NULL, '52b3a93aac36bd14b3a1c9e7118f79981d14d39c6fd5118884d7544e58232a8d', 'agung', 'Agung Setiawan', 'default.png', 1, 1, 0, '2019-11-12 00:43:02', '2019-11-12 00:43:02', '2019-11-12 00:31:51', NULL, NULL, NULL, NULL, NULL, '::1'),
(3, 'wahyu@gmail.com', NULL, NULL, 'd4cf951e9f92ee7b6243f1d7958442323d1f6e4ce341e0a1cdf34da8c40108b8', 'wahyu', 'Wahyu Arief', 'default.png', 2, 1, 0, '2019-11-12 00:43:26', '2019-11-12 00:43:26', '2019-11-12 00:32:19', NULL, NULL, NULL, NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 4),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL,
  `kk` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `content`, `image`, `tags`, `category`, `status`, `author`, `viewers`, `created_at`, `updated_at`) VALUES
(1, 'Hello Wellcome To Cicool Builder', 'Hello-Wellcome-To-Ciool-Builder', 'greetings from our team I hope to be happy! ', 'wellcome.jpg', 'greetings', '1', 'publish', 'admin', 0, '2019-07-28 05:19:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Technology', ''),
(2, 'Lifestyle', '');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1573486736, '::1', 'IVVD'),
(2, 1573486741, '::1', '3GYS');

-- --------------------------------------------------------

--
-- Table structure for table `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'favicon', '2019-11-11setting223827.png'),
(2, 'timezone', 'Asia/Jakarta'),
(3, 'site_name', 'Pelayanan Administrasi'),
(4, 'site_description', 'Pelayanan Administrasi Kelurahan Jatimakmur'),
(5, 'keywords', 'pelayanan, administrasi, kelurahan, rt, rw, dokumen, arsip, data'),
(6, 'author', 'Admin'),
(7, 'logo', '2019-11-11setting222902.png'),
(8, 'landing_page_id', 'default'),
(9, 'active_theme', 'cicool'),
(10, 'email', 'admin@admin.com'),
(11, 'google_id', ''),
(12, 'google_secret', ''),
(13, 'background', '2019-11-11setting232233.jpg'),
(14, 'skin', 'skin-blue'),
(15, 'logo_small', '2019-11-11setting222907.png');

-- --------------------------------------------------------

--
-- Table structure for table `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `title`, `subject`, `table_name`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(1, 'Data Penduduk', 'Data Penduduk', 'penduduk', 'id', 'yes', 'yes', 'yes'),
(2, 'Data Arsip', 'Data Arsip', 'arsip', 'id', 'yes', 'yes', 'yes'),
(3, 'Tipe Pelayanan', 'Tipe Pelayanan', 'tipe_pelayanan', 'id', 'yes', 'yes', 'yes'),
(4, 'Pelayanan', 'Pelayanan', 'pelayanan', 'id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(7, 53, 1, 'Pria', 'Pria'),
(8, 53, 1, 'Wanita', 'Wanita'),
(9, 65, 1, 'Pria', 'Pria'),
(10, 66, 1, 'Pria', 'Pria'),
(11, 83, 4, 'Menunggu', 'Menunggu'),
(12, 83, 4, 'Proses', 'Proses'),
(13, 83, 4, 'Selesai', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(49, 1, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(50, 1, 'nkk', 'Nomor Kartu Keluarga', 'number', '', 'yes', 'yes', 'yes', 2, '', '', ''),
(51, 1, 'nik', 'NIK', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(52, 1, 'nama_lengkap', 'Nama Lengkap', 'input', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(53, 1, 'jenis_kelamin', 'Jenis Kelamin', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(54, 1, 'tempat_lahir', 'Tempat Lahir', 'select', '', 'yes', 'yes', 'yes', 6, 'kota', 'nama', 'nama'),
(55, 1, 'tanggal_lahir', 'Tanggal Lahir', 'date', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(56, 1, 'golongan_darah', 'Golongan Darah', 'select', '', 'yes', 'yes', 'yes', 8, 'golongandarah', 'nama', 'nama'),
(57, 1, 'agama', 'Agama', 'select', 'yes', 'yes', 'yes', 'yes', 9, 'agama', 'nama', 'nama'),
(58, 1, 'pendidikan_akhir', 'Pendidikan Terakhir', 'select', '', 'yes', 'yes', 'yes', 10, 'pendidikan', 'nama', 'nama'),
(59, 1, 'pekerjaan', 'Pekerjaan', 'select', 'yes', 'yes', 'yes', 'yes', 11, 'pekerjaan', 'nama', 'nama'),
(60, 1, 'status_perkawinan', 'Status Perkawinan', 'select', '', 'yes', 'yes', 'yes', 12, 'statuskawin', 'nama', 'nama'),
(61, 1, 'status_keluarga', 'Status Hubungan Dalam Keluarga', 'select', '', 'yes', 'yes', 'yes', 13, 'statuskeluarga', 'nama', 'nama'),
(62, 1, 'nama_ibu', 'Nama Ibu', 'input', '', 'yes', 'yes', 'yes', 14, '', '', ''),
(63, 1, 'nama_ayah', 'Nama Ayah', 'input', '', 'yes', 'yes', 'yes', 15, '', '', ''),
(64, 1, 'alamat_lengkap', 'Alamat Lengkap', 'textarea', '', 'yes', 'yes', 'yes', 16, '', '', ''),
(65, 1, 'rt', 'RT Berapa', 'number', 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(66, 1, 'rw', 'RW Berapa', 'number', 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(72, 2, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(73, 2, 'nama', 'Nama', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'penduduk', 'nama_lengkap', 'nama_lengkap'),
(74, 2, 'ktp', 'Kartu Tanda Penduduk', 'file', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(75, 2, 'kk', 'Kartu Keluarga', 'file', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(76, 2, 'foto', 'Foto Formal (2x3, 3x4, 4x6)', 'file_multiple', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(77, 3, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(78, 3, 'nama_pelayanan', 'Nama Pelayanan', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(79, 3, 'deskripsi', 'Deskripsi', 'textarea', '', 'yes', 'yes', 'yes', 3, '', '', ''),
(80, 4, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(81, 4, 'nama', 'Nama Pemohon', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'penduduk', 'nama_lengkap', 'nama_lengkap'),
(82, 4, 'tipe', 'Surat Permintaan', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'tipe_pelayanan', 'nama_pelayanan', 'nama_pelayanan'),
(83, 4, 'status', 'status', 'custom_select', 'yes', '', 'yes', 'yes', 4, '', '', ''),
(84, 4, 'tanggal', 'tanggal', 'datetime', 'yes', '', '', 'yes', 5, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(52, 50, 1, 'required', ''),
(53, 50, 1, 'valid_number', ''),
(54, 51, 1, 'required', ''),
(55, 51, 1, 'valid_number', ''),
(56, 52, 1, 'required', ''),
(57, 53, 1, 'required', ''),
(58, 54, 1, 'required', ''),
(59, 55, 1, 'required', ''),
(60, 56, 1, 'required', ''),
(61, 57, 1, 'required', ''),
(62, 58, 1, 'required', ''),
(63, 59, 1, 'required', ''),
(64, 60, 1, 'required', ''),
(65, 61, 1, 'required', ''),
(66, 62, 1, 'required', ''),
(67, 63, 1, 'required', ''),
(68, 64, 1, 'required', ''),
(69, 65, 1, 'required', ''),
(70, 66, 1, 'required', ''),
(78, 73, 2, 'required', ''),
(79, 74, 2, 'required', ''),
(80, 74, 2, 'allowed_extension', 'jpg,jpeg,png'),
(81, 75, 2, 'required', ''),
(82, 75, 2, 'allowed_extension', 'jpg,jpeg,png'),
(83, 76, 2, 'required', ''),
(84, 76, 2, 'allowed_extension', 'jpg,jpeg,png'),
(85, 78, 3, 'required', ''),
(86, 81, 4, 'required', ''),
(87, 82, 4, 'required', ''),
(88, 83, 4, 'required', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select');

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `golongandarah`
--

CREATE TABLE `golongandarah` (
  `id` int(11) NOT NULL,
  `nama` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongandarah`
--

INSERT INTO `golongandarah` (`id`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '5B3D86FBDFCE4B034271C5FC673708FF', 0, 0, 0, NULL, '2019-07-27 22:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'KABUPATEN SIMEULUE'),
(2, 'KABUPATEN ACEH SINGKIL'),
(3, 'KABUPATEN ACEH SELATAN'),
(4, 'KABUPATEN ACEH TENGGARA'),
(5, 'KABUPATEN ACEH TIMUR'),
(6, 'KABUPATEN ACEH TENGAH'),
(7, 'KABUPATEN ACEH BARAT'),
(8, 'KABUPATEN ACEH BESAR'),
(9, 'KABUPATEN PIDIE'),
(10, 'KABUPATEN BIREUEN'),
(11, 'KABUPATEN ACEH UTARA'),
(12, 'KABUPATEN ACEH BARAT DAYA'),
(13, 'KABUPATEN GAYO LUES'),
(14, 'KABUPATEN ACEH TAMIANG'),
(15, 'KABUPATEN NAGAN RAYA'),
(16, 'KABUPATEN ACEH JAYA'),
(17, 'KABUPATEN BENER MERIAH'),
(18, 'KABUPATEN PIDIE JAYA'),
(19, 'KOTA BANDA ACEH'),
(20, 'KOTA SABANG'),
(21, 'KOTA LANGSA'),
(22, 'KOTA LHOKSEUMAWE'),
(23, 'KOTA SUBULUSSALAM'),
(24, 'KABUPATEN NIAS'),
(25, 'KABUPATEN MANDAILING NATAL'),
(26, 'KABUPATEN TAPANULI SELATAN'),
(27, 'KABUPATEN TAPANULI TENGAH'),
(28, 'KABUPATEN TAPANULI UTARA'),
(29, 'KABUPATEN TOBA SAMOSIR'),
(30, 'KABUPATEN LABUHAN BATU'),
(31, 'KABUPATEN ASAHAN'),
(32, 'KABUPATEN SIMALUNGUN'),
(33, 'KABUPATEN DAIRI'),
(34, 'KABUPATEN KARO'),
(35, 'KABUPATEN DELI SERDANG'),
(36, 'KABUPATEN LANGKAT'),
(37, 'KABUPATEN NIAS SELATAN'),
(38, 'KABUPATEN HUMBANG HASUNDUTAN'),
(39, 'KABUPATEN PAKPAK BHARAT'),
(40, 'KABUPATEN SAMOSIR'),
(41, 'KABUPATEN SERDANG BEDAGAI'),
(42, 'KABUPATEN BATU BARA'),
(43, 'KABUPATEN PADANG LAWAS UTARA'),
(44, 'KABUPATEN PADANG LAWAS'),
(45, 'KABUPATEN LABUHAN BATU SELATAN'),
(46, 'KABUPATEN LABUHAN BATU UTARA'),
(47, 'KABUPATEN NIAS UTARA'),
(48, 'KABUPATEN NIAS BARAT'),
(49, 'KOTA SIBOLGA'),
(50, 'KOTA TANJUNG BALAI'),
(51, 'KOTA PEMATANG SIANTAR'),
(52, 'KOTA TEBING TINGGI'),
(53, 'KOTA MEDAN'),
(54, 'KOTA BINJAI'),
(55, 'KOTA PADANGSIDIMPUAN'),
(56, 'KOTA GUNUNGSITOLI'),
(57, 'KABUPATEN KEPULAUAN MENTAWAI'),
(58, 'KABUPATEN PESISIR SELATAN'),
(59, 'KABUPATEN SOLOK'),
(60, 'KABUPATEN SIJUNJUNG'),
(61, 'KABUPATEN TANAH DATAR'),
(62, 'KABUPATEN PADANG PARIAMAN'),
(63, 'KABUPATEN AGAM'),
(64, 'KABUPATEN LIMA PULUH KOTA'),
(65, 'KABUPATEN PASAMAN'),
(66, 'KABUPATEN SOLOK SELATAN'),
(67, 'KABUPATEN DHARMASRAYA'),
(68, 'KABUPATEN PASAMAN BARAT'),
(69, 'KOTA PADANG'),
(70, 'KOTA SOLOK'),
(71, 'KOTA SAWAH LUNTO'),
(72, 'KOTA PADANG PANJANG'),
(73, 'KOTA BUKITTINGGI'),
(74, 'KOTA PAYAKUMBUH'),
(75, 'KOTA PARIAMAN'),
(76, 'KABUPATEN KUANTAN SINGINGI'),
(77, 'KABUPATEN INDRAGIRI HULU'),
(78, 'KABUPATEN INDRAGIRI HILIR'),
(79, 'KABUPATEN PELALAWAN'),
(80, 'KABUPATEN S I A K'),
(81, 'KABUPATEN KAMPAR'),
(82, 'KABUPATEN ROKAN HULU'),
(83, 'KABUPATEN BENGKALIS'),
(84, 'KABUPATEN ROKAN HILIR'),
(85, 'KABUPATEN KEPULAUAN MERANTI'),
(86, 'KOTA PEKANBARU'),
(87, 'KOTA D U M A I'),
(88, 'KABUPATEN KERINCI'),
(89, 'KABUPATEN MERANGIN'),
(90, 'KABUPATEN SAROLANGUN'),
(91, 'KABUPATEN BATANG HARI'),
(92, 'KABUPATEN MUARO JAMBI'),
(93, 'KABUPATEN TANJUNG JABUNG TIMUR'),
(94, 'KABUPATEN TANJUNG JABUNG BARAT'),
(95, 'KABUPATEN TEBO'),
(96, 'KABUPATEN BUNGO'),
(97, 'KOTA JAMBI'),
(98, 'KOTA SUNGAI PENUH'),
(99, 'KABUPATEN OGAN KOMERING ULU'),
(100, 'KABUPATEN OGAN KOMERING ILIR'),
(101, 'KABUPATEN MUARA ENIM'),
(102, 'KABUPATEN LAHAT'),
(103, 'KABUPATEN MUSI RAWAS'),
(104, 'KABUPATEN MUSI BANYUASIN'),
(105, 'KABUPATEN BANYU ASIN'),
(106, 'KABUPATEN OGAN KOMERING ULU SELATAN'),
(107, 'KABUPATEN OGAN KOMERING ULU TIMUR'),
(108, 'KABUPATEN OGAN ILIR'),
(109, 'KABUPATEN EMPAT LAWANG'),
(110, 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
(111, 'KABUPATEN MUSI RAWAS UTARA'),
(112, 'KOTA PALEMBANG'),
(113, 'KOTA PRABUMULIH'),
(114, 'KOTA PAGAR ALAM'),
(115, 'KOTA LUBUKLINGGAU'),
(116, 'KABUPATEN BENGKULU SELATAN'),
(117, 'KABUPATEN REJANG LEBONG'),
(118, 'KABUPATEN BENGKULU UTARA'),
(119, 'KABUPATEN KAUR'),
(120, 'KABUPATEN SELUMA'),
(121, 'KABUPATEN MUKOMUKO'),
(122, 'KABUPATEN LEBONG'),
(123, 'KABUPATEN KEPAHIANG'),
(124, 'KABUPATEN BENGKULU TENGAH'),
(125, 'KOTA BENGKULU'),
(126, 'KABUPATEN LAMPUNG BARAT'),
(127, 'KABUPATEN TANGGAMUS'),
(128, 'KABUPATEN LAMPUNG SELATAN'),
(129, 'KABUPATEN LAMPUNG TIMUR'),
(130, 'KABUPATEN LAMPUNG TENGAH'),
(131, 'KABUPATEN LAMPUNG UTARA'),
(132, 'KABUPATEN WAY KANAN'),
(133, 'KABUPATEN TULANGBAWANG'),
(134, 'KABUPATEN PESAWARAN'),
(135, 'KABUPATEN PRINGSEWU'),
(136, 'KABUPATEN MESUJI'),
(137, 'KABUPATEN TULANG BAWANG BARAT'),
(138, 'KABUPATEN PESISIR BARAT'),
(139, 'KOTA BANDAR LAMPUNG'),
(140, 'KOTA METRO'),
(141, 'KABUPATEN BANGKA'),
(142, 'KABUPATEN BELITUNG'),
(143, 'KABUPATEN BANGKA BARAT'),
(144, 'KABUPATEN BANGKA TENGAH'),
(145, 'KABUPATEN BANGKA SELATAN'),
(146, 'KABUPATEN BELITUNG TIMUR'),
(147, 'KOTA PANGKAL PINANG'),
(148, 'KABUPATEN KARIMUN'),
(149, 'KABUPATEN BINTAN'),
(150, 'KABUPATEN NATUNA'),
(151, 'KABUPATEN LINGGA'),
(152, 'KABUPATEN KEPULAUAN ANAMBAS'),
(153, 'KOTA B A T A M'),
(154, 'KOTA TANJUNG PINANG'),
(155, 'KABUPATEN KEPULAUAN SERIBU'),
(156, 'KOTA JAKARTA SELATAN'),
(157, 'KOTA JAKARTA TIMUR'),
(158, 'KOTA JAKARTA PUSAT'),
(159, 'KOTA JAKARTA BARAT'),
(160, 'KOTA JAKARTA UTARA'),
(161, 'KABUPATEN BOGOR'),
(162, 'KABUPATEN SUKABUMI'),
(163, 'KABUPATEN CIANJUR'),
(164, 'KABUPATEN BANDUNG'),
(165, 'KABUPATEN GARUT'),
(166, 'KABUPATEN TASIKMALAYA'),
(167, 'KABUPATEN CIAMIS'),
(168, 'KABUPATEN KUNINGAN'),
(169, 'KABUPATEN CIREBON'),
(170, 'KABUPATEN MAJALENGKA'),
(171, 'KABUPATEN SUMEDANG'),
(172, 'KABUPATEN INDRAMAYU'),
(173, 'KABUPATEN SUBANG'),
(174, 'KABUPATEN PURWAKARTA'),
(175, 'KABUPATEN KARAWANG'),
(176, 'KABUPATEN BEKASI'),
(177, 'KABUPATEN BANDUNG BARAT'),
(178, 'KABUPATEN PANGANDARAN'),
(179, 'KOTA BOGOR'),
(180, 'KOTA SUKABUMI'),
(181, 'KOTA BANDUNG'),
(182, 'KOTA CIREBON'),
(183, 'KOTA BEKASI'),
(184, 'KOTA DEPOK'),
(185, 'KOTA CIMAHI'),
(186, 'KOTA TASIKMALAYA'),
(187, 'KOTA BANJAR'),
(188, 'KABUPATEN CILACAP'),
(189, 'KABUPATEN BANYUMAS'),
(190, 'KABUPATEN PURBALINGGA'),
(191, 'KABUPATEN BANJARNEGARA'),
(192, 'KABUPATEN KEBUMEN'),
(193, 'KABUPATEN PURWOREJO'),
(194, 'KABUPATEN WONOSOBO'),
(195, 'KABUPATEN MAGELANG'),
(196, 'KABUPATEN BOYOLALI'),
(197, 'KABUPATEN KLATEN'),
(198, 'KABUPATEN SUKOHARJO'),
(199, 'KABUPATEN WONOGIRI'),
(200, 'KABUPATEN KARANGANYAR'),
(201, 'KABUPATEN SRAGEN'),
(202, 'KABUPATEN GROBOGAN'),
(203, 'KABUPATEN BLORA'),
(204, 'KABUPATEN REMBANG'),
(205, 'KABUPATEN PATI'),
(206, 'KABUPATEN KUDUS'),
(207, 'KABUPATEN JEPARA'),
(208, 'KABUPATEN DEMAK'),
(209, 'KABUPATEN SEMARANG'),
(210, 'KABUPATEN TEMANGGUNG'),
(211, 'KABUPATEN KENDAL'),
(212, 'KABUPATEN BATANG'),
(213, 'KABUPATEN PEKALONGAN'),
(214, 'KABUPATEN PEMALANG'),
(215, 'KABUPATEN TEGAL'),
(216, 'KABUPATEN BREBES'),
(217, 'KOTA MAGELANG'),
(218, 'KOTA SURAKARTA'),
(219, 'KOTA SALATIGA'),
(220, 'KOTA SEMARANG'),
(221, 'KOTA PEKALONGAN'),
(222, 'KOTA TEGAL'),
(223, 'KABUPATEN KULON PROGO'),
(224, 'KABUPATEN BANTUL'),
(225, 'KABUPATEN GUNUNG KIDUL'),
(226, 'KABUPATEN SLEMAN'),
(227, 'KOTA YOGYAKARTA'),
(228, 'KABUPATEN PACITAN'),
(229, 'KABUPATEN PONOROGO'),
(230, 'KABUPATEN TRENGGALEK'),
(231, 'KABUPATEN TULUNGAGUNG'),
(232, 'KABUPATEN BLITAR'),
(233, 'KABUPATEN KEDIRI'),
(234, 'KABUPATEN MALANG'),
(235, 'KABUPATEN LUMAJANG'),
(236, 'KABUPATEN JEMBER'),
(237, 'KABUPATEN BANYUWANGI'),
(238, 'KABUPATEN BONDOWOSO'),
(239, 'KABUPATEN SITUBONDO'),
(240, 'KABUPATEN PROBOLINGGO'),
(241, 'KABUPATEN PASURUAN'),
(242, 'KABUPATEN SIDOARJO'),
(243, 'KABUPATEN MOJOKERTO'),
(244, 'KABUPATEN JOMBANG'),
(245, 'KABUPATEN NGANJUK'),
(246, 'KABUPATEN MADIUN'),
(247, 'KABUPATEN MAGETAN'),
(248, 'KABUPATEN NGAWI'),
(249, 'KABUPATEN BOJONEGORO'),
(250, 'KABUPATEN TUBAN'),
(251, 'KABUPATEN LAMONGAN'),
(252, 'KABUPATEN GRESIK'),
(253, 'KABUPATEN BANGKALAN'),
(254, 'KABUPATEN SAMPANG'),
(255, 'KABUPATEN PAMEKASAN'),
(256, 'KABUPATEN SUMENEP'),
(257, 'KOTA KEDIRI'),
(258, 'KOTA BLITAR'),
(259, 'KOTA MALANG'),
(260, 'KOTA PROBOLINGGO'),
(261, 'KOTA PASURUAN'),
(262, 'KOTA MOJOKERTO'),
(263, 'KOTA MADIUN'),
(264, 'KOTA SURABAYA'),
(265, 'KOTA BATU'),
(266, 'KABUPATEN PANDEGLANG'),
(267, 'KABUPATEN LEBAK'),
(268, 'KABUPATEN TANGERANG'),
(269, 'KABUPATEN SERANG'),
(270, 'KOTA TANGERANG'),
(271, 'KOTA CILEGON'),
(272, 'KOTA SERANG'),
(273, 'KOTA TANGERANG SELATAN'),
(274, 'KABUPATEN JEMBRANA'),
(275, 'KABUPATEN TABANAN'),
(276, 'KABUPATEN BADUNG'),
(277, 'KABUPATEN GIANYAR'),
(278, 'KABUPATEN KLUNGKUNG'),
(279, 'KABUPATEN BANGLI'),
(280, 'KABUPATEN KARANG ASEM'),
(281, 'KABUPATEN BULELENG'),
(282, 'KOTA DENPASAR'),
(283, 'KABUPATEN LOMBOK BARAT'),
(284, 'KABUPATEN LOMBOK TENGAH'),
(285, 'KABUPATEN LOMBOK TIMUR'),
(286, 'KABUPATEN SUMBAWA'),
(287, 'KABUPATEN DOMPU'),
(288, 'KABUPATEN BIMA'),
(289, 'KABUPATEN SUMBAWA BARAT'),
(290, 'KABUPATEN LOMBOK UTARA'),
(291, 'KOTA MATARAM'),
(292, 'KOTA BIMA'),
(293, 'KABUPATEN SUMBA BARAT'),
(294, 'KABUPATEN SUMBA TIMUR'),
(295, 'KABUPATEN KUPANG'),
(296, 'KABUPATEN TIMOR TENGAH SELATAN'),
(297, 'KABUPATEN TIMOR TENGAH UTARA'),
(298, 'KABUPATEN BELU'),
(299, 'KABUPATEN ALOR'),
(300, 'KABUPATEN LEMBATA'),
(301, 'KABUPATEN FLORES TIMUR'),
(302, 'KABUPATEN SIKKA'),
(303, 'KABUPATEN ENDE'),
(304, 'KABUPATEN NGADA'),
(305, 'KABUPATEN MANGGARAI'),
(306, 'KABUPATEN ROTE NDAO'),
(307, 'KABUPATEN MANGGARAI BARAT'),
(308, 'KABUPATEN SUMBA TENGAH'),
(309, 'KABUPATEN SUMBA BARAT DAYA'),
(310, 'KABUPATEN NAGEKEO'),
(311, 'KABUPATEN MANGGARAI TIMUR'),
(312, 'KABUPATEN SABU RAIJUA'),
(313, 'KABUPATEN MALAKA'),
(314, 'KOTA KUPANG'),
(315, 'KABUPATEN SAMBAS'),
(316, 'KABUPATEN BENGKAYANG'),
(317, 'KABUPATEN LANDAK'),
(318, 'KABUPATEN MEMPAWAH'),
(319, 'KABUPATEN SANGGAU'),
(320, 'KABUPATEN KETAPANG'),
(321, 'KABUPATEN SINTANG'),
(322, 'KABUPATEN KAPUAS HULU'),
(323, 'KABUPATEN SEKADAU'),
(324, 'KABUPATEN MELAWI'),
(325, 'KABUPATEN KAYONG UTARA'),
(326, 'KABUPATEN KUBU RAYA'),
(327, 'KOTA PONTIANAK'),
(328, 'KOTA SINGKAWANG'),
(329, 'KABUPATEN KOTAWARINGIN BARAT'),
(330, 'KABUPATEN KOTAWARINGIN TIMUR'),
(331, 'KABUPATEN KAPUAS'),
(332, 'KABUPATEN BARITO SELATAN'),
(333, 'KABUPATEN BARITO UTARA'),
(334, 'KABUPATEN SUKAMARA'),
(335, 'KABUPATEN LAMANDAU'),
(336, 'KABUPATEN SERUYAN'),
(337, 'KABUPATEN KATINGAN'),
(338, 'KABUPATEN PULANG PISAU'),
(339, 'KABUPATEN GUNUNG MAS'),
(340, 'KABUPATEN BARITO TIMUR'),
(341, 'KABUPATEN MURUNG RAYA'),
(342, 'KOTA PALANGKA RAYA'),
(343, 'KABUPATEN TANAH LAUT'),
(344, 'KABUPATEN KOTA BARU'),
(345, 'KABUPATEN BANJAR'),
(346, 'KABUPATEN BARITO KUALA'),
(347, 'KABUPATEN TAPIN'),
(348, 'KABUPATEN HULU SUNGAI SELATAN'),
(349, 'KABUPATEN HULU SUNGAI TENGAH'),
(350, 'KABUPATEN HULU SUNGAI UTARA'),
(351, 'KABUPATEN TABALONG'),
(352, 'KABUPATEN TANAH BUMBU'),
(353, 'KABUPATEN BALANGAN'),
(354, 'KOTA BANJARMASIN'),
(355, 'KOTA BANJAR BARU'),
(356, 'KABUPATEN PASER'),
(357, 'KABUPATEN KUTAI BARAT'),
(358, 'KABUPATEN KUTAI KARTANEGARA'),
(359, 'KABUPATEN KUTAI TIMUR'),
(360, 'KABUPATEN BERAU'),
(361, 'KABUPATEN PENAJAM PASER UTARA'),
(362, 'KABUPATEN MAHAKAM HULU'),
(363, 'KOTA BALIKPAPAN'),
(364, 'KOTA SAMARINDA'),
(365, 'KOTA BONTANG'),
(366, 'KABUPATEN MALINAU'),
(367, 'KABUPATEN BULUNGAN'),
(368, 'KABUPATEN TANA TIDUNG'),
(369, 'KABUPATEN NUNUKAN'),
(370, 'KOTA TARAKAN'),
(371, 'KABUPATEN BOLAANG MONGONDOW'),
(372, 'KABUPATEN MINAHASA'),
(373, 'KABUPATEN KEPULAUAN SANGIHE'),
(374, 'KABUPATEN KEPULAUAN TALAUD'),
(375, 'KABUPATEN MINAHASA SELATAN'),
(376, 'KABUPATEN MINAHASA UTARA'),
(377, 'KABUPATEN BOLAANG MONGONDOW UTARA'),
(378, 'KABUPATEN SIAU TAGULANDANG BIARO'),
(379, 'KABUPATEN MINAHASA TENGGARA'),
(380, 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
(381, 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
(382, 'KOTA MANADO'),
(383, 'KOTA BITUNG'),
(384, 'KOTA TOMOHON'),
(385, 'KOTA KOTAMOBAGU'),
(386, 'KABUPATEN BANGGAI KEPULAUAN'),
(387, 'KABUPATEN BANGGAI'),
(388, 'KABUPATEN MOROWALI'),
(389, 'KABUPATEN POSO'),
(390, 'KABUPATEN DONGGALA'),
(391, 'KABUPATEN TOLI-TOLI'),
(392, 'KABUPATEN BUOL'),
(393, 'KABUPATEN PARIGI MOUTONG'),
(394, 'KABUPATEN TOJO UNA-UNA'),
(395, 'KABUPATEN SIGI'),
(396, 'KABUPATEN BANGGAI LAUT'),
(397, 'KABUPATEN MOROWALI UTARA'),
(398, 'KOTA PALU'),
(399, 'KABUPATEN KEPULAUAN SELAYAR'),
(400, 'KABUPATEN BULUKUMBA'),
(401, 'KABUPATEN BANTAENG'),
(402, 'KABUPATEN JENEPONTO'),
(403, 'KABUPATEN TAKALAR'),
(404, 'KABUPATEN GOWA'),
(405, 'KABUPATEN SINJAI'),
(406, 'KABUPATEN MAROS'),
(407, 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
(408, 'KABUPATEN BARRU'),
(409, 'KABUPATEN BONE'),
(410, 'KABUPATEN SOPPENG'),
(411, 'KABUPATEN WAJO'),
(412, 'KABUPATEN SIDENRENG RAPPANG'),
(413, 'KABUPATEN PINRANG'),
(414, 'KABUPATEN ENREKANG'),
(415, 'KABUPATEN LUWU'),
(416, 'KABUPATEN TANA TORAJA'),
(417, 'KABUPATEN LUWU UTARA'),
(418, 'KABUPATEN LUWU TIMUR'),
(419, 'KABUPATEN TORAJA UTARA'),
(420, 'KOTA MAKASSAR'),
(421, 'KOTA PAREPARE'),
(422, 'KOTA PALOPO'),
(423, 'KABUPATEN BUTON'),
(424, 'KABUPATEN MUNA'),
(425, 'KABUPATEN KONAWE'),
(426, 'KABUPATEN KOLAKA'),
(427, 'KABUPATEN KONAWE SELATAN'),
(428, 'KABUPATEN BOMBANA'),
(429, 'KABUPATEN WAKATOBI'),
(430, 'KABUPATEN KOLAKA UTARA'),
(431, 'KABUPATEN BUTON UTARA'),
(432, 'KABUPATEN KONAWE UTARA'),
(433, 'KABUPATEN KOLAKA TIMUR'),
(434, 'KABUPATEN KONAWE KEPULAUAN'),
(435, 'KABUPATEN MUNA BARAT'),
(436, 'KABUPATEN BUTON TENGAH'),
(437, 'KABUPATEN BUTON SELATAN'),
(438, 'KOTA KENDARI'),
(439, 'KOTA BAUBAU'),
(440, 'KABUPATEN BOALEMO'),
(441, 'KABUPATEN GORONTALO'),
(442, 'KABUPATEN POHUWATO'),
(443, 'KABUPATEN BONE BOLANGO'),
(444, 'KABUPATEN GORONTALO UTARA'),
(445, 'KOTA GORONTALO'),
(446, 'KABUPATEN MAJENE'),
(447, 'KABUPATEN POLEWALI MANDAR'),
(448, 'KABUPATEN MAMASA'),
(449, 'KABUPATEN MAMUJU'),
(450, 'KABUPATEN MAMUJU UTARA'),
(451, 'KABUPATEN MAMUJU TENGAH'),
(452, 'KABUPATEN MALUKU TENGGARA BARAT'),
(453, 'KABUPATEN MALUKU TENGGARA'),
(454, 'KABUPATEN MALUKU TENGAH'),
(455, 'KABUPATEN BURU'),
(456, 'KABUPATEN KEPULAUAN ARU'),
(457, 'KABUPATEN SERAM BAGIAN BARAT'),
(458, 'KABUPATEN SERAM BAGIAN TIMUR'),
(459, 'KABUPATEN MALUKU BARAT DAYA'),
(460, 'KABUPATEN BURU SELATAN'),
(461, 'KOTA AMBON'),
(462, 'KOTA TUAL'),
(463, 'KABUPATEN HALMAHERA BARAT'),
(464, 'KABUPATEN HALMAHERA TENGAH'),
(465, 'KABUPATEN KEPULAUAN SULA'),
(466, 'KABUPATEN HALMAHERA SELATAN'),
(467, 'KABUPATEN HALMAHERA UTARA'),
(468, 'KABUPATEN HALMAHERA TIMUR'),
(469, 'KABUPATEN PULAU MOROTAI'),
(470, 'KABUPATEN PULAU TALIABU'),
(471, 'KOTA TERNATE'),
(472, 'KOTA TIDORE KEPULAUAN'),
(473, 'KABUPATEN FAKFAK'),
(474, 'KABUPATEN KAIMANA'),
(475, 'KABUPATEN TELUK WONDAMA'),
(476, 'KABUPATEN TELUK BINTUNI'),
(477, 'KABUPATEN MANOKWARI'),
(478, 'KABUPATEN SORONG SELATAN'),
(479, 'KABUPATEN SORONG'),
(480, 'KABUPATEN RAJA AMPAT'),
(481, 'KABUPATEN TAMBRAUW'),
(482, 'KABUPATEN MAYBRAT'),
(483, 'KABUPATEN MANOKWARI SELATAN'),
(484, 'KABUPATEN PEGUNUNGAN ARFAK'),
(485, 'KOTA SORONG'),
(486, 'KABUPATEN MERAUKE'),
(487, 'KABUPATEN JAYAWIJAYA'),
(488, 'KABUPATEN JAYAPURA'),
(489, 'KABUPATEN NABIRE'),
(490, 'KABUPATEN KEPULAUAN YAPEN'),
(491, 'KABUPATEN BIAK NUMFOR'),
(492, 'KABUPATEN PANIAI'),
(493, 'KABUPATEN PUNCAK JAYA'),
(494, 'KABUPATEN MIMIKA'),
(495, 'KABUPATEN BOVEN DIGOEL'),
(496, 'KABUPATEN MAPPI'),
(497, 'KABUPATEN ASMAT'),
(498, 'KABUPATEN YAHUKIMO'),
(499, 'KABUPATEN PEGUNUNGAN BINTANG'),
(500, 'KABUPATEN TOLIKARA'),
(501, 'KABUPATEN SARMI'),
(502, 'KABUPATEN KEEROM'),
(503, 'KABUPATEN WAROPEN'),
(504, 'KABUPATEN SUPIORI'),
(505, 'KABUPATEN MAMBERAMO RAYA'),
(506, 'KABUPATEN NDUGA'),
(507, 'KABUPATEN LANNY JAYA'),
(508, 'KABUPATEN MAMBERAMO TENGAH'),
(509, 'KABUPATEN YALIMO'),
(510, 'KABUPATEN PUNCAK'),
(511, 'KABUPATEN DOGIYAI'),
(512, 'KABUPATEN INTAN JAYA'),
(513, 'KABUPATEN DEIYAI'),
(514, 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', '', '{admin_url}/dashboard', 1, 0, '', 1, 0),
(2, 'Dashboard', 'menu', 'text-yellow', '{admin_url}/dashboard', 2, 0, 'fa-dashboard', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 8, 0, 'fa-table', 1, 0),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 9, 0, 'fa-code', 1, 0),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 10, 0, 'fa-file-o', 1, 0),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 11, 0, 'fa-newspaper-o', 1, 0),
(7, 'Blog', 'menu', '', '{admin_url}/blog', 12, 0, 'fa-file-text-o', 1, 0),
(8, 'Menu', 'menu', '', '{admin_url}/menu', 13, 0, 'fa-bars', 1, 0),
(9, 'Auth', 'menu', '', '', 15, 0, 'fa-shield', 1, 0),
(10, 'Data Pengguna', 'menu', 'text-yellow', '{admin_url}/user', 14, 0, 'fa-user', 1, 1),
(11, 'Groups', 'menu', '', '{admin_url}/group', 16, 9, '', 1, 0),
(12, 'Access', 'menu', '', '{admin_url}/access', 17, 9, '', 1, 0),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 18, 9, '', 1, 0),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 19, 9, '', 1, 0),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 20, 0, 'fa-puzzle-piece', 1, 0),
(16, 'OTHER', 'label', '', '', 21, 0, '', 1, 0),
(17, 'Settings', 'menu', 'text-yellow', '{admin_url}/setting', 22, 0, 'fa-cogs', 1, 0),
(18, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 23, 0, 'fa-circle-o', 1, 0),
(19, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 24, 0, 'fa-circle-o', 1, 0),
(20, 'Home', 'menu', '', '/', 1, 0, '', 2, 1),
(21, 'Blog', 'menu', '', 'blog', 4, 0, '', 2, 1),
(22, 'Dashboard', 'menu', '', 'administrator/dashboard', 5, 0, '', 2, 1),
(23, 'Data Penduduk', 'menu', 'text-yellow', '{admin_url}/penduduk', 6, 0, 'fa-users', 1, 1),
(25, 'Data Arsip', 'menu', 'text-yellow', '{admin_url}/arsip', 7, 0, 'fa-archive', 1, 1),
(26, 'Tipe Pelayanan', 'menu', 'text-yellow', '{admin_url}/tipe_pelayanan', 5, 0, 'fa-list-ul', 1, 1),
(27, 'Pelayanan', 'menu', 'text-yellow', '{admin_url}/pelayanan', 4, 0, 'fa-book', 1, 1),
(28, 'Notifikasi', 'menu', 'text-yellow', '{admin_url}/notifications', 3, 0, 'fa-info-circle', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`) VALUES
(1, 'Pegawai Swasta'),
(2, 'Wiraswasta'),
(3, 'PNS/TNI/Polri'),
(4, 'Ibu Rumah Tangga'),
(5, 'Pelajar/Mahasiswa'),
(6, 'Pensiunan'),
(7, 'Pegawai Otoritas/Lembaga/BUMN'),
(8, 'Profesional'),
(9, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tipe` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'Menunggu',
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'D3'),
(5, 'S1'),
(6, 'S2'),
(7, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nkk` varchar(32) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `pendidikan_akhir` varchar(32) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `status_perkawinan` varchar(32) NOT NULL,
  `status_keluarga` varchar(32) NOT NULL,
  `nama_ibu` varchar(64) NOT NULL,
  `nama_ayah` varchar(64) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `price` varchar(39) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `variant` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rest`
--

CREATE TABLE `rest` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rest_input_type`
--

INSERT INTO `rest_input_type` (`id`, `type`, `relation`, `validation_group`) VALUES
(1, 'input', '0', 'input'),
(2, 'timestamp', '0', 'timestamp'),
(3, 'file', '0', 'file');

-- --------------------------------------------------------

--
-- Table structure for table `statuskawin`
--

CREATE TABLE `statuskawin` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuskawin`
--

INSERT INTO `statuskawin` (`id`, `nama`) VALUES
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Cerai Hidup'),
(4, 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `statuskeluarga`
--

CREATE TABLE `statuskeluarga` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuskeluarga`
--

INSERT INTO `statuskeluarga` (`id`, `nama`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Istri'),
(3, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pelayanan`
--

CREATE TABLE `tipe_pelayanan` (
  `id` int(11) NOT NULL,
  `nama_pelayanan` varchar(64) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_pelayanan`
--

INSERT INTO `tipe_pelayanan` (`id`, `nama_pelayanan`, `deskripsi`) VALUES
(1, 'Surat Keterangan Tidak Mampu', ''),
(2, 'Surat Pengantar Pembuatan KTP', ''),
(3, 'Surat Pengantar Pembuatan KK', ''),
(4, 'Surat Pengantar Pembuatan SKCK', ''),
(5, 'Surat Pengantar Pembuatan Akte Kelahiran', ''),
(6, 'Surat Pengantar Untuk Menikah', ''),
(7, 'Surat Pengantar Pengajuan Gugatan Cerai', ''),
(8, 'Surat Pengantar Pengajuan IMB', ''),
(9, 'Surat Pengantar Pembuatan SKU', ''),
(10, 'Surat Pengantar Pembuatan NPWP', ''),
(11, 'Surat Pengantar Pencatatan Sipil', ''),
(12, 'Surat Pengantar Pengajuan Izin Keramaian', ''),
(13, 'Surat Pengantar Pindah Penduduk', ''),
(14, 'Surat Pengantar Kepolisian', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indexes for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongandarah`
--
ALTER TABLE `golongandarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuskawin`
--
ALTER TABLE `statuskawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuskeluarga`
--
ALTER TABLE `statuskeluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_pelayanan`
--
ALTER TABLE `tipe_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongandarah`
--
ALTER TABLE `golongandarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuskawin`
--
ALTER TABLE `statuskawin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuskeluarga`
--
ALTER TABLE `statuskeluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipe_pelayanan`
--
ALTER TABLE `tipe_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
