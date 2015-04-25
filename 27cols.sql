-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2015 at 06:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `27cols`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `read_more` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `blogs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `published`, `caption`, `image`, `comment_count`, `user_id`, `created_at`, `updated_at`, `cat`) VALUES
(1, 1, 'This is madame whitenicious', 'img/galleries/pPZJFXxhfze0', 0, 1, '2014-12-12 14:08:46', '2014-12-12 14:08:46', 'modelling'),
(2, 1, 'This is the man tuface and wife', 'img/galleries/yHNcrdFADbIK', 0, 1, '2014-12-12 14:10:32', '2014-12-12 14:10:32', 'others'),
(3, 1, 'Tiny but still beautiful', 'img/galleries/lXaSwrqWutun', 0, 1, '2014-12-12 14:12:38', '2014-12-12 14:12:38', 'modelling'),
(4, 1, 'Some good things don''t last', 'img/galleries/spNTmgQlaY4A', 0, 1, '2014-12-12 14:13:49', '2014-12-12 14:13:49', 'others'),
(5, 1, 'Genny giving back too', 'img/galleries/anpo0Mjw42Zg', 0, 1, '2014-12-12 14:14:54', '2014-12-12 14:14:54', 'modelling'),
(6, 1, 'Dbanj is the main', 'img/galleries/LxFsf5BKtTaC', 0, 1, '2014-12-14 06:08:50', '2014-12-14 06:08:50', 'modelling'),
(10, 1, 'This is great part 2', 'img/galleries/OaqVxngFfSEh.jpg', 0, 1, '2014-12-20 05:27:15', '2014-12-20 05:27:15', 'modelling'),
(11, 1, 'This is very nice', 'img/galleries/W9LID8Bsj3Vj.jpg', 0, 1, '2014-12-30 13:44:29', '2014-12-30 13:44:29', 'modelling'),
(12, 1, 'Hard to show', 'img/galleries/uMADd4WjZb2P.jpg', 0, 1, '2014-12-30 14:12:13', '2014-12-30 14:12:13', 'modelling'),
(13, 1, 'Horse on fire', 'img/galleries/t0qGtdQyISWo.jpg', 0, 1, '2014-12-30 14:26:36', '2014-12-30 14:26:36', 'others'),
(14, 1, 'Timbs', 'img/galleries/ZLl3pTRO7kCr.jpg', 0, 3, '2014-12-31 22:53:55', '2014-12-31 22:53:55', 'others'),
(15, 1, 'Nike badass', 'img/galleries/1rNuvK9BXNbn.jpg', 0, 3, '2015-01-01 03:23:18', '2015-01-01 03:23:18', 'modelling'),
(16, 1, 'Nike scribble', 'img/galleries/UTDB6UZ10w5h.jpg', 0, 3, '2015-01-01 03:25:46', '2015-01-01 03:25:46', 'modelling'),
(17, 1, 'Nike scribble', 'img/galleries/sv9SSHWjLHIx.jpg', 0, 3, '2015-01-01 03:26:36', '2015-01-01 03:26:36', 'others'),
(18, 1, '#caption', 'img/galleries/1hVe6UnjZFN4.jpg', 0, 3, '2015-01-01 03:30:06', '2015-01-01 03:30:06', 'others'),
(19, 1, '27colours team', 'img/galleries/7xCciCo59NrS.jpg', 0, 3, '2015-01-01 03:33:06', '2015-01-01 03:33:06', 'modelling'),
(20, 1, 'kobe', 'img/galleries/6GFtQMt75K4P.jpg', 0, 3, '2015-01-01 03:37:07', '2015-01-01 03:37:07', 'modelling'),
(21, 1, 'Elenu style', 'img/galleries/4XLS3FPuzXle.PNG', 0, 1, '2015-01-02 14:26:19', '2015-01-02 14:26:19', 'modelling'),
(22, 1, 'cray', 'img/galleries/w5Nud7mbfdjn.png', 0, 3, '2015-01-03 05:31:03', '2015-01-03 05:31:03', 'others'),
(23, 1, 'yealano', 'img/galleries/880H5axP4Ka9.png', 0, 3, '2015-01-03 05:32:08', '2015-01-03 05:32:08', 'others'),
(24, 1, 'Adidas', 'img/galleries/MjqD2LtLp5E8.png', 0, 3, '2015-01-03 05:36:25', '2015-01-03 05:36:25', 'others'),
(25, 1, 'swagged out', 'img/galleries/U8vnGsKBNvsJ.png', 0, 3, '2015-01-03 05:38:39', '2015-01-03 05:38:39', 'others'),
(26, 1, 'horsepower ', 'img/galleries/w0AIPq9ez1GV.jpg', 0, 4, '2015-01-03 23:11:06', '2015-01-03 23:11:06', 'others');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tag`
--

CREATE TABLE IF NOT EXISTS `gallery_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_tag_gallery_id_foreign` (`gallery_id`),
  KEY `gallery_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_tag`
--

INSERT INTO `gallery_tag` (`id`, `gallery_id`, `tag_id`) VALUES
(1, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_07_104803_confide_setup_users_table', 1),
('2014_11_07_155916_create_tables_table', 1),
('2015_02_02_212720_create_oauth_identities_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_identities`
--

CREATE TABLE IF NOT EXISTS `oauth_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `image_size` int(9) NOT NULL,
  `avatar_content_type` varchar(60) NOT NULL,
  `avatar_updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `cat` varchar(50) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `caption` text NOT NULL,
  `song` varchar(100) NOT NULL,
  `song_size` int(9) NOT NULL,
  `song_content_type` varchar(50) NOT NULL,
  `song_updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `image`, `image_size`, `avatar_content_type`, `avatar_updated_at`, `created_at`, `updated_at`, `cat`, `user_id`, `published`, `caption`, `song`, `song_size`, `song_content_type`, `song_updated_at`) VALUES
(2, '(8).jpg', 375214, 'image/jpeg', '2015-01-13 17:43:13', '2015-01-13 17:43:13', '2015-01-13 17:43:13', 'modelling', 1, 1, 'Fire of dom', '', 0, '', '0000-00-00 00:00:00'),
(3, '20120219_008.jpg', 652254, 'image/jpeg', '2015-01-13 22:58:12', '2015-01-13 22:58:12', '2015-01-13 22:58:12', 'modelling', 1, 1, 'John''s ex', '', 0, '', '0000-00-00 00:00:00'),
(4, '(1).JPG', 98737, 'image/jpeg', '2015-01-13 23:05:45', '2015-01-13 23:05:46', '2015-01-13 23:05:46', 'modelling', 1, 1, 'Bike on fire', '', 0, '', '0000-00-00 00:00:00'),
(5, '3.JPG', 299547, 'image/jpeg', '2015-01-13 23:17:32', '2015-01-13 23:17:32', '2015-01-13 23:17:32', 'modelling', 1, 1, 'Recording female artist', '', 0, '', '0000-00-00 00:00:00'),
(6, '20110502_001.jpg', 397326, 'image/jpeg', '2015-01-13 23:19:33', '2015-01-13 23:19:33', '2015-01-13 23:19:33', 'others', 1, 1, 'cute car', '', 0, '', '0000-00-00 00:00:00'),
(9, 'Asa-art-work.jpg', 4496, 'image/jpeg', '2015-01-14 12:48:07', '2015-01-14 12:48:07', '2015-01-14 12:48:07', '', 1, 1, 'This is on point', '', 0, '', '0000-00-00 00:00:00'),
(10, '', 0, '', '0000-00-00 00:00:00', '2015-01-14 12:54:50', '2015-01-14 12:54:50', '', 1, 1, '', '', 0, '', '0000-00-00 00:00:00'),
(11, '', 0, '', '0000-00-00 00:00:00', '2015-01-14 13:02:15', '2015-01-14 13:02:15', '', 1, 1, '', '', 0, '', '0000-00-00 00:00:00'),
(12, 'img/galleries/woVE0vAsa-art-work.jpg', 0, '', '2015-01-21 16:21:02', '2015-01-21 16:21:02', '2015-01-21 16:21:02', 'modelling', 1, 1, 'This is nice', 'img/songs/foDV73BrymO-Eko.mp3', 0, '', '2015-01-21 16:21:02'),
(13, 'img/galleries/5t6Iqxmadonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00', '2015-01-21 16:39:47', '2015-01-21 16:39:47', 'others', 1, 1, 'Trying this out', 'img/songs/bDb0DSBrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00'),
(14, 'img/galleries/D8G1mU_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-21 17:22:42', '2015-01-21 17:22:42', 'modelling', 1, 1, 'this will scale', 'img/songs/zYyFOs_madonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00'),
(15, 'img/galleries/oZoUkO_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-21 21:48:34', '2015-01-21 21:48:34', 'modelling', 1, 1, 'This is okay', 'img/songs/xXeHh0_Asa-art-work.jpg', 0, '', '0000-00-00 00:00:00'),
(16, 'img/galleries/4g4Wi0_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 09:20:44', '2015-01-22 09:20:44', 'modelling', 1, 1, 'cool', 'img/songs/E8mHLp_Asa-art-work.jpg', 0, '', '0000-00-00 00:00:00'),
(17, 'img/galleries/ke6PjI_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 15:15:17', '2015-01-22 15:15:17', 'others', 1, 1, 'will this work', 'img/songs/PJzAku_madonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00'),
(18, 'img/galleries/xTmiiq_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 15:21:38', '2015-01-22 15:21:38', 'modelling', 1, 1, 'big surgical face', 'img/songs/cum2vZ_madonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00'),
(19, 'img/galleries/XnaDzc_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 15:47:58', '2015-01-22 15:47:58', 'modelling', 1, 1, 'hope this is it', 'img/songs/USgVhx_madonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00'),
(20, 'img/galleries/MUm8gt_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 16:40:29', '2015-01-22 16:40:29', 'modelling', 1, 1, 'Well done', 'img/songs/6dK5lL_Asa-art-work.jpg', 0, '', '0000-00-00 00:00:00'),
(21, 'img/galleries/hhv6Yy_BrymO-Eko.mp3', 0, '', '0000-00-00 00:00:00', '2015-01-22 20:23:42', '2015-01-22 20:23:42', 'modelling', 1, 1, 'This is nice', 'img/songs/bVV4ZP_madonna-fat-face.jpg', 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_photos`
--

CREATE TABLE IF NOT EXISTS `profile_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profile_photos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `profile_photos`
--

INSERT INTO `profile_photos` (`id`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'img/profile_photos/zjv6kn8b1WHD', 1, '2014-12-12 15:10:47', '2015-01-09 02:55:49'),
(5, 'img/profile_photos/lDkP0dT3Fb3h', 3, '2014-12-31 22:43:12', '2014-12-31 22:43:12'),
(6, 'img/profile_photos/ntikFwRH9aCF', 4, '2015-01-03 23:09:40', '2015-01-03 23:09:40'),
(7, 'img/profile_photos/CbG5DUwFmXKq', 13, '2015-03-10 01:19:31', '2015-03-10 01:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `song` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soundcloud` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `songs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `published`, `description`, `genre`, `song`, `image`, `soundcloud`, `youtube`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Fresh New joint', 1, 'Don''t dull as guys are working so hard to please their fans', 'Others', 'img/songs/AFYDMcsUnyrp', 'img/songs/images/RAzYI1Fn4fC7', NULL, 'Add YouTube Url For Music Video (Optional)', 1, '2014-12-11 13:49:28', '2014-12-11 13:52:19'),
(7, 'Praize Ft Awilo', 1, 'Baddest new tune from Naija praise and Awilo Longomba', 'Gospel', 'img/songs/UMW8WsL6d5pa', 'img/songs/images/XWYYFTiSxbuL', NULL, 'Add YouTube Url For Music Video (Optional)', 1, '2014-12-11 13:59:32', '2014-12-11 14:01:09'),
(10, 'This is El classical songs', 1, 'This is the song from the movie,  Shaka  Zulu, an ancient powerful King who wanted it all!!!', 'Afrobeat', 'img/songs/WUKw4X6avMV1', 'img/songs/images/HZFpVxRyCFss', NULL, 'Add YouTube Url For Music Video (Optional)', 1, '2014-12-11 14:21:49', '2014-12-11 14:26:07'),
(11, 'Great Brymo track', 1, 'This is going on fine', 'Comedy', 'img/songs/1yQUspgzo5V3', 'img/songs/images/EOxmgpbkiiqt', '119282539', 'Add YouTube Url For Music Video (Optional)', 1, '2014-12-12 22:45:26', '2014-12-12 22:48:11'),
(33, 'Into You', 1, 'Jesse Jagz', 'Afrobeat', '', 'img/songs/images/GlxyUU02AfLT', NULL, NULL, 3, '2015-01-03 05:42:51', '2015-01-03 05:44:12'),
(36, 'shocked testing scenarios', 1, 'Hope this works oh', 'Afrobeat', 'img/songs/sZjR7v_BrymO-Eko.mp3', 'img/songs/images/Nn6vxv_eldee-d-don.jpg', NULL, NULL, 1, '2015-01-30 21:06:13', '2015-01-30 21:06:13'),
(45, 'This is so strange', 1, 'This is so strange', 'Afrobeat', 'img/songs/KWuGZw_BrymO-Eko.mp3', 'img/songs/images/x8oVTk_ara-drummer.jpg', NULL, NULL, 1, '2015-02-21 06:43:02', '2015-02-21 06:43:02'),
(46, 'This is so strange', 1, 'This is so strange', 'Afrobeat', 'img/songs/lALvsp_BrymO-Eko.mp3', 'img/songs/images/5TT0zN_Asa-art-work.jpg', NULL, NULL, 1, '2015-02-21 06:56:37', '2015-02-21 06:56:37'),
(47, 'This is so strange', 1, 'This is so strange', 'Afrobeat', 'img/songs/huvtQj_BrymO-Eko.mp3', 'img/songs/images/NejSXP_Asa-art-work.jpg', NULL, NULL, 1, '2015-02-21 07:16:44', '2015-02-21 07:16:44'),
(48, 'Beyonce - 7/11', 1, '', 'Hip-hop', 'img/songs/tPrTdj_Beyonce 7 11 - 7 11 - Beyonce 7 11 (7 11).mp3', 'img/songs/images/Ul2kDJ_davido.jpg', NULL, NULL, 13, '2015-02-21 12:01:49', '2015-02-21 12:01:49'),
(49, 'Nicki minaj - only', 1, '', 'RnB', 'img/songs/9S8eNS_Beyonce 7 11 - 7 11 - Beyonce 7 11 (7 11).mp3', 'img/songs/images/76ljGR_Wizkid.jpg', NULL, NULL, 13, '2015-02-21 12:04:43', '2015-02-21 12:04:43'),
(50, 'Beyonce - 7/11', 1, '', 'highlife', 'img/songs/5M5ejO_Beyonce 7 11 - 7 11 - Beyonce 7 11 (7 11).mp3', 'img/songs/images/B5OHfz_busparty.jpg', NULL, NULL, 13, '2015-02-21 12:06:32', '2015-02-21 12:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `song_tag`
--

CREATE TABLE IF NOT EXISTS `song_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `song_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `song_tag_song_id_foreign` (`song_id`),
  KEY `song_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `song_tag`
--

INSERT INTO `song_tag` (`id`, `song_id`, `tag_id`) VALUES
(5, 6, 7),
(6, 7, 5),
(7, 10, 9),
(8, 11, 13),
(12, 33, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'songs,Asa', 'Video', '2014-12-11 05:30:29', '2014-12-11 05:30:29'),
(2, 'Asa,cute', 'Video', '2014-12-11 05:37:20', '2014-12-11 05:37:20'),
(3, 'baddest,superstar', 'Song', '2014-12-11 06:22:59', '2014-12-11 06:22:59'),
(4, 'cute', 'Gallery', '2014-12-11 06:33:06', '2014-12-11 06:33:06'),
(5, 'talents, great voice', 'Song', '2014-12-11 13:03:19', '2014-12-11 13:03:19'),
(6, 'dance', 'Song', '2014-12-11 13:41:48', '2014-12-11 13:41:48'),
(7, 'cute', 'Gallery', '2014-12-11 13:52:20', '2014-12-11 13:52:20'),
(8, 'flexing guy, Awilo', 'dance', '2014-12-11 14:01:10', '2014-12-11 14:01:10'),
(9, 'cute', 'Gallery', '2014-12-11 14:26:08', '2014-12-11 14:26:08'),
(10, 'Asa,beautiful', 'Video', '2014-12-11 21:14:58', '2014-12-11 21:14:58'),
(11, 'dance', 'Video', '2014-12-11 21:21:20', '2014-12-11 21:21:20'),
(12, 'Asa,', 'Video', '2014-12-12 04:39:02', '2014-12-12 04:39:02'),
(13, 'cool,Nice', 'Song', '2014-12-12 22:48:12', '2014-12-12 22:48:12'),
(14, 'asa,cool', 'Song', '2014-12-12 22:50:02', '2014-12-12 22:50:02'),
(15, 'asa', 'Video', '2014-12-16 17:52:45', '2014-12-16 17:52:45'),
(16, 'dance', 'Song', '2014-12-16 20:50:11', '2014-12-16 20:50:11'),
(17, 'Enter your tags here', 'Video', '2014-12-30 14:37:56', '2014-12-30 14:37:56'),
(18, '', 'Song', '2014-12-30 16:11:10', '2014-12-30 16:11:10'),
(19, '', 'Song', '2015-01-03 05:44:12', '2015-01-03 05:44:12'),
(20, '', 'Song', '2015-01-03 23:16:08', '2015-01-03 23:16:08'),
(21, 'Enter your tags here', 'Video', '2015-01-03 23:21:09', '2015-01-03 23:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `tag_video`
--

CREATE TABLE IF NOT EXISTS `tag_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `video_tag_video_id_foreign` (`video_id`),
  KEY `video_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tag_video`
--

INSERT INTO `tag_video` (`id`, `video_id`, `tag_id`) VALUES
(1, 4, 2),
(2, 5, 10),
(3, 6, 11),
(4, 8, 12),
(5, 9, 15),
(7, 11, 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `talents` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Enter your facebook profile ID',
  `twitter` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Enter your twitter username',
  `soundcloud` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleID` int(100) DEFAULT NULL,
  `facebookID` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `is_admin`, `created_at`, `updated_at`, `first_name`, `last_name`, `talents`, `facebook`, `twitter`, `soundcloud`, `youtube`, `tagline`, `googleID`, `facebookID`) VALUES
(1, 'samizares', 'samizares@hotmail.com', '$2y$10$6LKn4LBBtG/LDo2vdNlX1uy02wGi30J..UtjW8ewyBaGKfRBXyZPS', 'afc7457ff147c30a169096de31c98358', 'mxOusXvIfmdDs301Qo3gOnFoSSivIjh088B2cWMRXzwkU1VF8hxoqqRvf3z1', 1, 0, '2014-12-11 05:13:39', '2015-01-04 13:18:36', 'sammy', 'oghog', 'modelling', 'https://www.facebook.com/samueljnr.oghogho', 'https://twitter.com/Todaysgist', '', '', 'Take life one step at a time', NULL, NULL),
(2, 'sammy', 'codedsam@gmail.com', '$2y$10$v2qgE4pYpOm3N3l7JrTnNOBlRd7cqrBONc6ck3WEWGUNH8un5dSsm', 'c7c3b44e31535dc9b946668d1ffeeb25', NULL, 1, 0, '2014-12-22 04:42:39', '2014-12-22 04:42:39', NULL, NULL, 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL),
(3, 'Nas', 'flagcareng@gmail.com', '$2y$10$lHwdOxj3/ygflFm2XRuKWei0qyAIHbY3.P/6K9.Rct3O3OqB2H4fG', '4b633c0ff33265e3fe36c69fa2d1a82e', 'SoCpDm2B1XhchwiOTROPqZZcNCEnF7yrr8TfNV9xVQcSV749SRHIIgiE4vqD', 1, 0, '2014-12-25 19:51:31', '2015-01-02 20:59:13', 'Nonso', 'Odigz', 'comedy', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', 'More action less talk', NULL, NULL),
(4, 'amadeeoha', 'kennedyajekwu@yahoo.com', '$2y$10$tlnY2i4AKu/jFTRsJju2cuCqUg5RAk9y9LS9zWSkzojkbht/naBj2', '6accca94de052b9138aafa46df37c94d', 'RKIs4IhgSupa1zCaKiHG9FmJc1P0KVxP9CtiuwAdZaMBcmz99cCwhmJ8yQfn', 1, 0, '2014-12-25 22:37:10', '2014-12-26 03:29:34', 'Mad', 'Ajekwu', 'dancing', 'facebook.com/amadeeoha', 'twitter.com/amadeeoha', '', '', 'WHO DARES WINS ', NULL, NULL),
(6, 'tochi_gold', 'ntochigold@gmail.com', '$2y$10$f2ePat4x7gehwNJPS9vLseNXuMQSU1NWEfkPHRds8oFKJNcMlrZHO', 'b12ecd85c726048a5158ed33d9a4c75c', NULL, 0, 0, '2014-12-26 21:26:56', '2014-12-26 21:26:56', NULL, NULL, 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL),
(7, 'mpk', 'michaelplangeiz@gmail.com', '$2y$10$iSy/l4uHVh50i3enMT8MqOLxAnt5C5B2UcjpMGXESC45tJwvVWpa2', 'b63329bb5f0cbe0f0f6ccf433496d6c8', NULL, 0, 0, '2014-12-27 00:02:00', '2014-12-27 00:02:00', NULL, NULL, 'comedy', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL),
(13, 'gentleRebel', 'gbolahanalade@gmail.com', '$2y$10$bsHiExbR7KJHy6orLkHsAOaMNJofhIdpUMomaPNPRcmyTNOf1yGiS', '9d847c4a8cfce02b5923cc2231371013', 'FPSvygmTAQOhio4HeV0Jjfu1P7PaYz3eiFfMIzqYPaJNQKJHrTCThmFOwk4h', 1, 0, '2014-12-28 19:32:11', '2015-03-10 02:53:44', 'bolaji', 'alade', 'dancing', 'https://www.facebook.com/GbolahanBabs', 'https://twitter.com/Gbolahanalade', 'https://soundcloud.com/bolaji-alade', 'https://www.youtube.com/user/MrGbolahanalade/videos', 'God 1st...', NULL, NULL),
(14, 'pjay', 'pjay@yahoo.com', '$2y$10$ilVpwBjfc.vA7bVGCmbp/usYDtIFRbGcmNGOQlq1E3h19bkPU1WUa', '4b33c96695c8b56f56ff7da77635c62e', NULL, 0, 0, '2014-12-30 03:56:45', '2014-12-30 03:56:45', NULL, NULL, 'others', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL),
(15, 'Azukaimagery', 'ebbiebbi43@gmail.com', '$2y$10$LT21cn9svXGrPMxtwlhvROnGy9aCwA5WahxoGc9kkjkYpE6QadCYy', 'ce381503471174683d9acfbf3bb3304e', NULL, 0, 0, '2015-01-01 00:55:50', '2015-01-01 00:55:50', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL),
(16, 'gbolahanalade2', 'gbolahanalade@live.com', '$2y$10$fbBpeGI8UthkPsSY0fmLweno4QGqed555HRuy4XzIMWaEjw86NDFm', 'ae2981dd2677f547db05d4914cc981cc', NULL, 0, 0, '2015-03-09 20:16:04', '2015-03-09 20:16:04', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) unsigned NOT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `published`, `description`, `image`, `video`, `comment_count`, `video_type`, `youtube`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'This is the first video', 1, 'This is the first video', 'img/videos/images/vNnGjocCShuz', 'https://www.youtube.com/watch?v=UyGuo0VMjz0', 0, 'Comedy', 'Y2OhlyXx3kE', 1, '2014-12-11 05:36:58', '2014-12-11 05:37:20'),
(5, 'Yeah, this is it!!!', 1, 'Asa new video,please check it out,', 'img/videos/images/oKzmFcEkIaYH', 'img/videos/NAzlDtRKjPCB', 0, 'Comedy', 'Add Youtube Url', 1, '2014-12-11 21:11:02', '2014-12-11 21:14:57'),
(6, 'Karen Igho On the dance floor', 1, 'Check her dancing skills', 'img/videos/images/lElf4XWNRmQ7', 'img/videos/rdIfKJirdVuH', 0, 'Dance', 'Add Youtube Url', 1, '2014-12-11 21:19:31', '2014-12-11 21:21:19'),
(8, 'Asa new video', 1, 'This is it', 'img/videos/images/QwRlz0yr4HDS', 'img/videos/I7HVV9jwPCRF', 0, 'Music-video', 'sdEEps6-aTU', 1, '2014-12-12 04:32:02', '2014-12-12 04:39:02'),
(9, 'This looks good oh', 1, 'Am very good at this lol. Its been fun playing with things like this', 'img/videos/images/BivQtBv4i028', '', 0, 'Comedy', 'UyGuo0VMjz0', 1, '2014-12-16 17:51:37', '2014-12-16 17:52:45'),
(11, 'keep walking', 1, 'Jonnie walker', 'img/videos/images/C8vXgroQa73W', '', 0, 'Comedy', NULL, 4, '2015-01-03 23:19:07', '2015-01-03 23:21:09'),
(13, 'Harry song doing what he knows how to do best', 1, 'Yeah, very classy performance from hit making song writer and singer', 'img/videos/images/KfvIlx_billboard-shakira.jpg', 'img/videos/mx3aYg_asa_dance.mp4', 0, 'Music video', 'VYazMGeCC4w', 1, '2015-01-23 06:49:24', '2015-01-23 06:49:24'),
(16, 'Checking if copying is the bad guy', 1, 'Checking if copying is the bad guy', 'img/videos/images/6ZiJTG_Asa-art-work.jpg', 'img/videos/lbXuWo_genevievennaji-ice-bucket-challenge.mp4', 0, 'Music video', NULL, 1, '2015-01-30 21:15:36', '2015-01-30 21:15:36'),
(17, 'It has been all about the size', 1, 'It has been all about the size', 'img/videos/images/m5g7H4_beyonce-family-jay.jpg', 'img/videos/NHfu7y_asa_dance.mp4', 0, 'Music video', NULL, 1, '2015-01-30 21:26:28', '2015-01-30 21:26:28');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_tag`
--
ALTER TABLE `gallery_tag`
  ADD CONSTRAINT `gallery_tag_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_photos`
--
ALTER TABLE `profile_photos`
  ADD CONSTRAINT `profile_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song_tag`
--
ALTER TABLE `song_tag`
  ADD CONSTRAINT `song_tag_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `song_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_video`
--
ALTER TABLE `tag_video`
  ADD CONSTRAINT `video_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_tag_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
