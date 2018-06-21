-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2018 pada 12.52
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adm-obaju`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps`
--

CREATE TABLE `apps` (
  `id` int(1) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `app_company` varchar(100) NOT NULL,
  `app_logo` varchar(100) DEFAULT NULL,
  `app_logo_lg` varchar(20) NOT NULL,
  `app_logo_mini` varchar(5) NOT NULL,
  `app_theme` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `apps`
--

INSERT INTO `apps` (`id`, `app_name`, `app_company`, `app_logo`, `app_logo_lg`, `app_logo_mini`, `app_theme`, `updated_at`) VALUES
(1, 'Apps Name', 'Company', NULL, 'AdminLTE', 'LTE', 'skin-black', '2018-01-03 14:26:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `produk_id` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `disc` decimal(3,2) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `log` varchar(128) NOT NULL,
  `activity` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `log`, `activity`, `user_id`, `created_by`, `created_at`) VALUES
(1, '/users/add', '', 1, 'admin', '2018-01-22 03:51:11'),
(2, '/users/update', '', 1, 'admin', '2018-01-22 03:56:29'),
(3, '/users/update', '', 1, 'admin', '2018-01-22 03:57:33'),
(4, '/users/update', '', 1, 'admin', '2018-01-22 03:58:15'),
(5, '/users/update', '', 1, 'admin', '2018-01-22 03:59:06'),
(9, '/users/update', '', 1, 'admin', '2018-01-22 04:01:02'),
(10, '/users/update', '', 1, 'admin', '2018-01-22 04:12:06'),
(11, '/users/update/3', '', 1, 'admin', '2018-01-22 04:18:05'),
(12, '/users/delete/3', '', 1, 'admin', '2018-01-22 04:19:08'),
(13, '/users/add', '{\"username\":\"username\",\"password\":\"$2y$11$2Xhy0ci\\/Ctxs6pfFmqCMbuHVNa107sYGXofwcy419Ix8D62cfpslm\",\"role_id\":2,\"created_at\":\"2018-01-22 07:15:42\",\"user_id\":21,\"fullname\":\"fullmane\",\"address\":\"address\",\"phone\":\"09877\",\"gender\":\"2\"}', 1, 'admin', '2018-01-22 07:15:42'),
(14, '/users/update/21', '{\"password\":\"$2y$11$HSXEVFb6zqFd6TwWpd.aY.VdNLRv0xaVdFdw7w0a.VLIEenohufZu\",\"fullname\":\"update\",\"address\":\"update\",\"phone\":\"09877\",\"gender\":\"2\",\"created_at\":\"2018-01-22 07:21:06\"}', 1, 'admin', '2018-01-22 07:21:06'),
(15, '/users/delete/21', '{\"id\":\"21\",\"user_id\":\"21\",\"fullname\":\"update\",\"address\":\"update\",\"phone\":\"09877\",\"gender\":\"2\",\"created_at\":\"2018-01-22 07:15:42\",\"updated_at\":\"2018-01-22 13:21:06\",\"role_id\":\"2\",\"username\":\"username\",\"password\":\"$2y$11$HSXEVFb6zqFd6TwWpd.aY.VdNLRv0xaVdFdw7w0a.VLIEenohufZu\",\"last_login\":\"0000-00-00 00:00:00\"}', 1, 'admin', '2018-01-22 07:30:15'),
(16, '/group_user/add', '[{\"role_id\":3,\"menu_id\":\"23\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"},{\"role_id\":3,\"menu_id\":\"22\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"},{\"role_id\":3,\"menu_id\":\"21\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"},{\"role_id\":3,\"menu_id\":\"20\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"},{\"role_id\":3,\"menu_id\":\"9\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"},{\"role_id\":3,\"menu_id\":\"8\",\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 07:39:30\"}]', 1, 'admin', '2018-01-22 07:39:30'),
(17, '/group_user/delete/3', '{\"id\":\"3\",\"role\":\"oemar bakri\",\"created_at\":\"2018-01-22 07:39:30\",\"updated_at\":null}', 1, 'admin', '2018-01-22 07:41:05'),
(18, '/privileges_user/update_priv/34', '{\"priv_update\":\"0\"}', 1, 'admin', '2018-01-22 08:09:56'),
(19, '/privileges_user/update_priv/34', '{\"priv_update\":\"1\"}', 1, 'admin', '2018-01-22 08:10:11'),
(20, '/list_menus/add', '{\"menu\":\"tambah\",\"parent\":\"0\",\"link\":\"link\",\"is_published\":1,\"menu_order\":\"8000\",\"created_at\":\"2018-01-22 10:43:56\",\"level\":0,\"icon\":\"fa-bars\",\"0\":{\"role_id\":\"2\",\"menu_id\":24,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 10:43:56\"},\"1\":{\"role_id\":\"1\",\"menu_id\":24,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-01-22 10:43:56\"}}', 1, 'admin', '2018-01-22 10:43:56'),
(24, '/list_menus/add', '{\"menu\":\"gabut\",\"parent\":\"0\",\"link\":\"gabut\",\"is_published\":1,\"menu_order\":\"1111111\",\"created_at\":\"2018-01-22 10:54:56\",\"level\":0,\"icon\":\"fa-bitbucket-square\",\"0\":{\"role_id\":\"2\",\"menu_id\":25,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-01-22 10:54:56\"},\"1\":{\"role_id\":\"1\",\"menu_id\":25,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-01-22 10:54:56\"}}', 1, 'admin', '2018-01-22 10:54:56'),
(25, '/list_menus/delete/25', '{\"id\":\"54\",\"level\":\"0\",\"parent\":\"0\",\"menu\":\"gabut\",\"link\":\"gabut\",\"is_published\":\"1\",\"menu_order\":\"1111111\",\"icon\":\"fa-bitbucket-square\",\"created_at\":\"2018-01-22 10:54:56\",\"updated_at\":null,\"role_id\":\"1\",\"menu_id\":\"25\",\"priv_create\":\"1\",\"priv_read\":\"1\",\"priv_update\":\"1\",\"priv_delete\":\"1\"}', 1, 'admin', '2018-01-22 10:55:16'),
(26, '/users/update/2', '{\"username\":\"djuned92\",\"password\":\"$2y$11$Iyo4rJ6MpGhl93z7wNf5zOZAx8QDmugqz2Eoc6\\/HK0YEp0CTCIrRy\",\"fullname\":\"User\",\"address\":\"user\",\"phone\":\"988833\",\"gender\":\"1\",\"created_at\":\"2018-01-23 02:25:43\"}', 1, 'admin', '2018-01-23 02:25:43'),
(27, '/users/update/2', '{\"username\":\"djuned92\",\"password\":\"$2y$11$zTMEv9\\/HI0gK5SpU3CMjbuMiyWrJIyV1CdGOTdZyVUom1VaMQKJO6\",\"fullname\":\"Ahmad Djunaedi\",\"address\":\"Bekasi, Jati Asih\",\"phone\":\"988833\",\"gender\":\"1\",\"created_at\":\"2018-01-23 02:26:10\"}', 1, 'admin', '2018-01-23 02:26:10'),
(28, '/users/update/1', '{\"username\":\"admin\",\"password\":\"$2y$11$qrn0A.uXSnfGGGul\\/JSLGOxmtrYhbJf7rlkKTkYyM0h.TRewUKt.2\",\"fullname\":\"Admin\",\"address\":\"Indonesia\",\"phone\":\"218489878\",\"gender\":\"2\",\"created_at\":\"2018-01-23 02:29:56\"}', 1, 'admin', '2018-01-23 02:29:56'),
(29, '/privileges_user/update_priv/9', '{\"priv_read\":\"1\"}', 1, 'admin', '2018-01-31 07:50:19'),
(30, '/privileges_user/update_priv/36', '{\"priv_update\":\"0\"}', 1, 'admin', '2018-01-31 08:02:22'),
(31, '/privileges_user/update_priv/36', '{\"priv_update\":\"1\"}', 1, 'admin', '2018-01-31 08:02:36'),
(32, '/privileges_user/update_priv/36', '{\"priv_update\":\"0\"}', 1, 'admin', '2018-01-31 08:02:38'),
(33, '/privileges_user/update_priv/36', '{\"priv_delete\":\"0\"}', 1, 'admin', '2018-01-31 08:02:39'),
(34, '/privileges_user/update_priv/36', '{\"priv_create\":\"0\"}', 1, 'admin', '2018-01-31 08:02:50'),
(35, '/privileges_user/update_priv/34', '{\"priv_update\":\"1\"}', 1, 'admin', '2018-01-31 08:03:16'),
(36, '/privileges_user/update_priv/34', '{\"priv_delete\":\"1\"}', 1, 'admin', '2018-01-31 08:03:18'),
(37, '/privileges_user/update_priv/34', '{\"priv_create\":\"1\"}', 1, 'admin', '2018-01-31 08:03:19'),
(38, '/privileges_user/update_priv/36', '{\"priv_update\":\"1\"}', 1, 'admin', '2018-01-31 08:03:24'),
(39, '/privileges_user/update_priv/36', '{\"priv_delete\":\"1\"}', 1, 'admin', '2018-01-31 08:03:25'),
(40, '/privileges_user/update_priv/36', '{\"priv_create\":\"1\"}', 1, 'admin', '2018-01-31 08:03:27'),
(41, '/privileges_user/update_priv/35', '{\"priv_read\":\"1\"}', 1, 'admin', '2018-04-07 07:18:12'),
(42, '/privileges_user/update_priv/9', '{\"priv_read\":\"0\"}', 1, 'admin', '2018-04-07 07:18:16'),
(43, '/list_menus/add', '{\"menu\":\"Master\",\"parent\":\"0\",\"link\":\"\",\"is_published\":1,\"menu_order\":\"500\",\"created_at\":\"2018-06-11 14:36:47\",\"level\":0,\"icon\":\"fa-cogs\",\"0\":{\"role_id\":\"2\",\"menu_id\":24,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 14:36:47\"},\"1\":{\"role_id\":\"1\",\"menu_id\":24,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 14:36:47\"}}', 1, 'admin', '2018-06-11 14:36:47'),
(44, '/list_menus/update/24', '{\"menu\":\"Master\",\"parent\":\"0\",\"link\":\"\",\"is_published\":1,\"menu_order\":\"500\",\"level\":0,\"icon\":\"fa-plus-square-o\"}', 1, 'admin', '2018-06-11 14:37:07'),
(45, '/list_menus/add', '{\"menu\":\"Kategori\",\"parent\":\"24\",\"link\":\"category\",\"is_published\":1,\"menu_order\":\"510\",\"created_at\":\"2018-06-11 14:37:30\",\"level\":1,\"icon\":null,\"0\":{\"role_id\":\"2\",\"menu_id\":25,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 14:37:30\"},\"1\":{\"role_id\":\"1\",\"menu_id\":25,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 14:37:30\"}}', 1, 'admin', '2018-06-11 14:37:30'),
(46, '/list_menus/update/22', '{\"menu\":\"Role User\",\"parent\":\"20\",\"link\":\"group_user\",\"is_published\":1,\"menu_order\":\"520\",\"level\":2,\"icon\":null}', 1, 'admin', '2018-06-11 15:17:55'),
(47, '/list_menus/update/22', '{\"menu\":\"Role User\",\"parent\":\"24\",\"link\":\"group_user\",\"is_published\":1,\"menu_order\":\"520\",\"level\":1,\"icon\":null}', 1, 'admin', '2018-06-11 15:18:15'),
(48, '/list_menus/update/21', '{\"menu\":\"Data Users\",\"parent\":\"0\",\"link\":\"users\",\"is_published\":1,\"menu_order\":\"400\",\"level\":0,\"icon\":\"fa-users\"}', 1, 'admin', '2018-06-11 15:19:00'),
(49, '/list_menus/update/22', '{\"menu\":\"Level User\",\"parent\":\"24\",\"link\":\"group_user\",\"is_published\":1,\"menu_order\":\"520\",\"level\":1,\"icon\":null}', 1, 'admin', '2018-06-11 15:47:51'),
(50, '/list_menus/update/22', '{\"menu\":\"Level User\",\"parent\":\"24\",\"link\":\"group_user\",\"is_published\":1,\"menu_order\":\"530\",\"level\":1,\"icon\":null}', 1, 'admin', '2018-06-11 15:48:08'),
(51, '/list_menus/add', '{\"menu\":\"Produk\",\"parent\":\"24\",\"link\":\"product\",\"is_published\":1,\"menu_order\":\"520\",\"created_at\":\"2018-06-11 15:48:37\",\"level\":1,\"icon\":null,\"0\":{\"role_id\":\"2\",\"menu_id\":26,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 15:48:37\"},\"1\":{\"role_id\":\"1\",\"menu_id\":26,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 15:48:37\"}}', 1, 'admin', '2018-06-11 15:48:37'),
(52, '/list_menus/add', '{\"menu\":\"Data Barang\",\"parent\":\"0\",\"link\":\"\",\"is_published\":1,\"menu_order\":\"600\",\"created_at\":\"2018-06-11 18:10:33\",\"level\":0,\"icon\":\"fa-archive\",\"0\":{\"role_id\":\"2\",\"menu_id\":27,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 18:10:33\"},\"1\":{\"role_id\":\"1\",\"menu_id\":27,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 18:10:33\"}}', 1, 'admin', '2018-06-11 18:10:33'),
(53, '/list_menus/add', '{\"menu\":\"Barang In\",\"parent\":\"27\",\"link\":\"barang_in\",\"is_published\":1,\"menu_order\":\"610\",\"created_at\":\"2018-06-11 18:11:09\",\"level\":1,\"icon\":null,\"0\":{\"role_id\":\"2\",\"menu_id\":28,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 18:11:09\"},\"1\":{\"role_id\":\"1\",\"menu_id\":28,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 18:11:09\"}}', 1, 'admin', '2018-06-11 18:11:09'),
(54, '/list_menus/add', '{\"menu\":\"Barang Out\",\"parent\":\"27\",\"link\":\"barang_out\",\"is_published\":1,\"menu_order\":\"620\",\"created_at\":\"2018-06-11 18:11:40\",\"level\":1,\"icon\":null,\"0\":{\"role_id\":\"2\",\"menu_id\":29,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 18:11:40\"},\"1\":{\"role_id\":\"1\",\"menu_id\":29,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 18:11:40\"}}', 1, 'admin', '2018-06-11 18:11:40'),
(55, '/list_menus/add', '{\"menu\":\"Jumlah Barang\",\"parent\":\"27\",\"link\":\"jumlah_barang\",\"is_published\":1,\"menu_order\":\"630\",\"created_at\":\"2018-06-11 18:12:12\",\"level\":1,\"icon\":null,\"0\":{\"role_id\":\"2\",\"menu_id\":30,\"priv_create\":0,\"priv_read\":0,\"priv_update\":0,\"priv_delete\":0,\"created_at\":\"2018-06-11 18:12:12\"},\"1\":{\"role_id\":\"1\",\"menu_id\":30,\"priv_create\":1,\"priv_read\":1,\"priv_update\":1,\"priv_delete\":1,\"created_at\":\"2018-06-11 18:12:12\"}}', 1, 'admin', '2018-06-11 18:12:12'),
(56, '/privileges_user/update_priv/44', '{\"priv_create\":\"0\"}', 1, 'admin', '2018-06-19 09:01:27'),
(57, '/privileges_user/update_priv/44', '{\"priv_update\":\"0\"}', 1, 'admin', '2018-06-19 09:01:33'),
(58, '/privileges_user/update_priv/44', '{\"priv_delete\":\"0\"}', 1, 'admin', '2018-06-19 09:01:34'),
(59, '/privileges_user/update_priv/44', '{\"priv_create\":\"1\"}', 1, 'admin', '2018-06-19 09:01:53'),
(60, '/privileges_user/update_priv/44', '{\"priv_create\":\"0\"}', 1, 'admin', '2018-06-19 09:01:55'),
(61, '/privileges_user/update_priv/44', '{\"priv_create\":\"1\"}', 1, 'admin', '2018-06-19 09:01:55'),
(62, '/privileges_user/update_priv/44', '{\"priv_update\":\"1\"}', 1, 'admin', '2018-06-19 09:01:57'),
(63, '/privileges_user/update_priv/44', '{\"priv_delete\":\"1\"}', 1, 'admin', '2018-06-19 09:01:58'),
(64, '/privileges_user/update_priv/34', '{\"priv_create\":\"0\"}', 1, 'admin', '2018-06-19 09:02:03'),
(65, '/privileges_user/update_priv/34', '{\"priv_update\":\"0\"}', 1, 'admin', '2018-06-19 09:02:05'),
(66, '/privileges_user/update_priv/34', '{\"priv_delete\":\"0\"}', 1, 'admin', '2018-06-19 09:02:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `level` int(4) NOT NULL DEFAULT '0',
  `parent` int(4) NOT NULL DEFAULT '0',
  `menu` varchar(64) NOT NULL,
  `link` varchar(64) NOT NULL,
  `is_published` int(1) NOT NULL DEFAULT '0',
  `menu_order` int(4) NOT NULL,
  `icon` varchar(64) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `level`, `parent`, `menu`, `link`, `is_published`, `menu_order`, `icon`, `created_at`, `updated_at`) VALUES
(8, 0, 0, 'Settings', '', 1, 1300, 'fa-gear', '2017-12-21 05:46:14', '2018-01-15 14:55:03'),
(9, 1, 8, 'Menu', 'list_menus', 1, 1320, NULL, '2017-12-21 05:47:19', '2018-01-15 14:55:06'),
(20, 1, 8, 'User', '', 1, 1310, NULL, '2017-12-23 07:23:25', '2018-01-15 14:55:10'),
(21, 0, 0, 'Data Users', 'users', 1, 400, 'fa-users', '2017-12-23 07:24:31', '2018-06-11 20:19:00'),
(22, 1, 24, 'Level User', 'group_user', 1, 530, NULL, '2017-12-23 07:25:25', '2018-06-11 20:48:08'),
(23, 2, 20, 'Privileges User', 'privileges_user', 1, 1313, NULL, '2017-12-23 11:03:14', '2018-01-15 14:55:20'),
(24, 0, 0, 'Master', '', 1, 500, 'fa-plus-square-o', '2018-06-11 14:36:47', '2018-06-11 19:37:07'),
(25, 1, 24, 'Kategori', 'category', 1, 510, NULL, '2018-06-11 14:37:30', NULL),
(26, 1, 24, 'Produk', 'product', 1, 520, NULL, '2018-06-11 15:48:37', NULL),
(27, 0, 0, 'Data Barang', '', 1, 600, 'fa-archive', '2018-06-11 18:10:33', NULL),
(28, 1, 27, 'Barang In', 'barang_in', 1, 610, NULL, '2018-06-11 18:11:09', NULL),
(29, 1, 27, 'Barang Out', 'barang_out', 1, 620, NULL, '2018-06-11 18:11:40', NULL),
(30, 1, 27, 'Jumlah Barang', 'jumlah_barang', 1, 630, NULL, '2018-06-11 18:12:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `gender` int(1) NOT NULL COMMENT '1.male 2.female',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `fullname`, `address`, `phone`, `email`, `photo`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Indonesia', '218489878', '', NULL, 2, '2018-01-23 02:29:56', '2018-01-23 08:29:56'),
(2, 2, 'Ahmad Djunaedi', 'Bekasi, Jati Asih', '988833', '', NULL, 1, '2018-01-23 02:26:10', '2018-01-23 08:26:10'),
(4, 4, 'Widya Ariyani', 'Larangan, Tangerang Selatan', '0988827272', 'a@gmail.com', NULL, 2, '2018-06-19 11:38:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `role` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-12-16 00:00:00', '2017-12-23 14:24:15'),
(2, 'user', '2017-12-22 00:00:00', '2017-12-23 14:23:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_barang_in`
--

CREATE TABLE `tm_barang_in` (
  `id` int(3) NOT NULL,
  `produk_id` int(3) NOT NULL,
  `barang_in` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_barang_out`
--

CREATE TABLE `tm_barang_out` (
  `id` int(3) NOT NULL,
  `produk_id` int(3) NOT NULL,
  `barang_out` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_kategori`
--

CREATE TABLE `tm_kategori` (
  `id` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_kategori`
--

INSERT INTO `tm_kategori` (`id`, `kategori`, `created_at`, `update_at`) VALUES
(2, 'Lemari', '2018-06-11 15:19:44', NULL),
(3, 'Rak', '2018-06-18 08:46:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_produk`
--

CREATE TABLE `tm_produk` (
  `id` int(3) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `detail_produk` text NOT NULL,
  `image` text NOT NULL,
  `harga` int(11) NOT NULL,
  `disc` decimal(3,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_produk`
--

INSERT INTO `tm_produk` (`id`, `kategori_id`, `produk`, `detail_produk`, `image`, `harga`, `disc`, `created_at`, `updated_at`) VALUES
(4, 2, 'Lemari 4 x 4 Meter', '<blockquote>Lemari</blockquote>Berbahan dari <br><ol><li>kayu jati<br></li><li>cat terbaik</li><li>dll</li></ol><b><i><u>Lorem ipsum dolor sit amet</u></i></b>, Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet<br><br><br>', '[\"ed29f5d8ff016db7a4123304d4c22cd7.jpg\",\"2ca7e9c298e222657e8fb3e80089482b.png\"]', 200000, NULL, '2018-06-20 13:42:17', '2018-06-20 18:42:17'),
(7, 3, 'Rak Buku', '<blockquote>This Quote?</blockquote>', '[\"ed29f5d8ff016db7a4123304d4c22cd7.jpg\",\"2ca7e9c298e222657e8fb3e80089482b.png\"]', 20000, NULL, '2018-06-19 06:39:21', '2018-06-19 11:39:21'),
(8, 3, 'Rak Piring', '<p><i>is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to&nbsp;</i></p><p><b><i>using \'Content here, content here\',</i></b>&nbsp;</p><p></p><ol><li>making it look like readable English. Many desktop publishing&nbsp;</li><li>packages and web page editors now use Lorem Ipsum as their&nbsp;</li><li>default model text, and a search for \'lorem ipsum\' will uncover&nbsp;</li><li>many web sites still in their infancy. Various versions&nbsp;</li><li>have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></li></ol><p></p><div><br></div>', '[\"27aedec245041e14d4a7d2b03573b97b.jpg\",\"181c965c1fa0c580a737a6a4751c9560.png\"]', 900000, NULL, '2018-06-19 06:38:27', '2018-06-19 11:38:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_stok`
--

CREATE TABLE `tm_stok` (
  `id` int(3) NOT NULL,
  `produk_id` int(3) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tx_transaksi`
--

CREATE TABLE `tx_transaksi` (
  `id` int(3) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `detail_transaksi` text NOT NULL,
  `detail_pembayaran` text,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0. Pending 1. Pembayaran 2. Approve 3. Not Approve',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$11$XBYAcNFBwa1e1dvc1zrUdOfBvvA1LQoWWVZNDW2kKyF7kqWU.iezG', '2018-06-21 07:41:48', '2017-12-11 04:57:04', '2018-06-21 12:41:48'),
(2, 2, 'djuned92', '$2y$11$XBYAcNFBwa1e1dvc1zrUdOfBvvA1LQoWWVZNDW2kKyF7kqWU.iezG', '2018-06-11 15:55:00', '2017-12-24 11:55:52', '2018-06-11 20:55:00'),
(4, 2, 'asd92', '$2y$11$XBYAcNFBwa1e1dvc1zrUdOfBvvA1LQoWWVZNDW2kKyF7kqWU.iezG', '2018-06-21 09:47:02', '2018-06-19 11:38:38', '2018-06-21 14:47:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `priv_create` int(1) NOT NULL DEFAULT '0',
  `priv_read` int(1) NOT NULL DEFAULT '0',
  `priv_update` int(1) NOT NULL DEFAULT '0',
  `priv_delete` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_privileges`
--

INSERT INTO `user_privileges` (`id`, `role_id`, `menu_id`, `priv_create`, `priv_read`, `priv_update`, `priv_delete`, `created_at`, `updated_at`) VALUES
(7, 2, 8, 0, 1, 0, 0, '2017-12-21 05:46:14', '2017-12-24 17:53:51'),
(8, 1, 8, 1, 1, 1, 1, '2017-12-21 05:46:14', NULL),
(9, 2, 9, 0, 0, 0, 0, '2017-12-21 05:47:19', '2018-04-07 12:18:16'),
(10, 1, 9, 1, 1, 1, 1, '2017-12-21 05:47:19', '2017-12-27 10:19:23'),
(31, 2, 20, 0, 1, 0, 0, '2017-12-23 07:23:25', '2017-12-24 17:53:55'),
(32, 1, 20, 1, 1, 1, 1, '2017-12-23 07:23:25', '2017-12-24 22:45:33'),
(33, 2, 21, 1, 1, 0, 0, '2017-12-23 07:24:31', '2017-12-29 11:16:59'),
(34, 1, 21, 0, 1, 0, 0, '2017-12-23 07:24:31', '2018-06-19 14:02:07'),
(35, 2, 22, 0, 1, 0, 0, '2017-12-23 07:25:25', '2018-04-07 12:18:12'),
(36, 1, 22, 1, 1, 1, 1, '2017-12-23 07:25:25', '2018-01-31 14:03:26'),
(43, 2, 23, 0, 0, 0, 0, '2017-12-23 11:03:14', NULL),
(44, 1, 23, 1, 1, 1, 1, '2017-12-23 11:03:14', '2018-06-19 14:01:58'),
(45, 2, 24, 0, 0, 0, 0, '2018-06-11 14:36:47', NULL),
(46, 1, 24, 1, 1, 1, 1, '2018-06-11 14:36:47', NULL),
(47, 2, 25, 0, 0, 0, 0, '2018-06-11 14:37:30', NULL),
(48, 1, 25, 1, 1, 1, 1, '2018-06-11 14:37:30', NULL),
(49, 2, 26, 0, 0, 0, 0, '2018-06-11 15:48:37', NULL),
(50, 1, 26, 1, 1, 1, 1, '2018-06-11 15:48:37', NULL),
(51, 2, 27, 0, 0, 0, 0, '2018-06-11 18:10:33', NULL),
(52, 1, 27, 1, 1, 1, 1, '2018-06-11 18:10:33', NULL),
(53, 2, 28, 0, 0, 0, 0, '2018-06-11 18:11:09', NULL),
(54, 1, 28, 1, 1, 1, 1, '2018-06-11 18:11:09', NULL),
(55, 2, 29, 0, 0, 0, 0, '2018-06-11 18:11:40', NULL),
(56, 1, 29, 1, 1, 1, 1, '2018-06-11 18:11:40', NULL),
(57, 2, 30, 0, 0, 0, 0, '2018-06-11 18:12:12', NULL),
(58, 1, 30, 1, 1, 1, 1, '2018-06-11 18:12:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_barang_in`
--
ALTER TABLE `tm_barang_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_barang_out`
--
ALTER TABLE `tm_barang_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_kategori`
--
ALTER TABLE `tm_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_produk`
--
ALTER TABLE `tm_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_stok`
--
ALTER TABLE `tm_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tx_transaksi`
--
ALTER TABLE `tx_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_previllages_ibfk_1_idx` (`role_id`),
  ADD KEY `user_previllages_ibfk_2_idx` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_barang_in`
--
ALTER TABLE `tm_barang_in`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_barang_out`
--
ALTER TABLE `tm_barang_out`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_kategori`
--
ALTER TABLE `tm_kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_produk`
--
ALTER TABLE `tm_produk`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tm_stok`
--
ALTER TABLE `tm_stok`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tx_transaksi`
--
ALTER TABLE `tx_transaksi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
