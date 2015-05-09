-- phpMyAdmin SQL Dump
-- version 4.3.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:33060
-- Generation Time: May 06, 2015 at 11:08 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.6.3-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `29cols-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `talents` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `soundcloud` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `googleID` int(100) DEFAULT NULL,
  `facebookID` int(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `firstname`, `lastname`, `talents`, `facebook`, `twitter`, `soundcloud`, `youtube`, `tagline`, `googleID`, `facebookID`, `updated_at`, `created_at`) VALUES
(4, 30, 'shegun', 'babs', '', 'https://www.facebook.com/app_scoped_user_id/10205284415443313/', '', '', '', '', 0, 2147483647, '2015-05-05 23:54:55', '2015-05-05 23:54:55'),
(5, 1, 'sammy', 'oghog', 'modelling', 'https://www.facebook.com/samueljnr.oghogho', 'https://twitter.com/Todaysgist', NULL, '', 'Take life one step at a time', NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(6, 2, NULL, NULL, 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(7, 3, 'Nonso', 'Odigz', 'comedy', 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', 'More action less talk', NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(8, 4, 'Mad', 'Ajekwu', 'dancing', 'facebook.com/amadeeoha', 'twitter.com/amadeeoha', NULL, '', 'WHO DARES WINS ', NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(9, 6, NULL, NULL, 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(10, 7, NULL, NULL, 'comedy', 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(11, 13, 'bolaji', 'alade', 'dancing', 'https://www.facebook.com/GbolahanBabs', 'https://twitter.com/Gbolahanalade', NULL, 'https://www.youtube.com/user/MrGbolahanalade/videos', 'God 1st...', NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(12, 14, NULL, NULL, 'others', 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(13, 15, NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(14, 16, NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', NULL, '', NULL, NULL, NULL, '2015-05-06 08:46:06', '2015-05-06 08:46:06'),
(15, 31, 'olumercy', 'i-mol', NULL, 'https://www.facebook.com/app_scoped_user_id/10206902630666564/', NULL, NULL, NULL, NULL, NULL, 2147483647, '2015-05-06 09:15:23', '2015-05-06 09:15:23'),
(17, 33, 'Segun', 'babsy', 'dancing', '', '', '', '', 'I am a dancer', NULL, NULL, '2015-05-06 22:36:20', '2015-05-06 22:30:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
