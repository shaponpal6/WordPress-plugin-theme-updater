-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 09:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winnrepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ip_blocker`
--

CREATE TABLE `ip_blocker` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `continent` varchar(20) NOT NULL,
  `continent_code` varchar(20) NOT NULL,
  `download` int(11) NOT NULL,
  `licence` varchar(10) NOT NULL,
  `version` varchar(10) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_blocker`
--

INSERT INTO `ip_blocker` (`id`, `ip_address`, `city`, `state`, `country`, `country_code`, `continent`, `continent_code`, `download`, `licence`, `version`, `client_id`, `status`, `updated_time`) VALUES
(2, '122.122.0.33', '', '', '', '', '', '', 0, 'P4317998', '', 1, '1', '2017-04-16 22:53:03'),
(3, '122.88.99.9', '', '', '', '', '', '', 0, 'P4317998', '', 5, '1', '2017-04-16 22:53:03'),
(8, '::1', '', '', '', '', '', '', 225, 'P1272311', '', 6, '1', '2017-04-20 13:32:32'),
(13, '::1', '', '', '', '', '', '', 5, 'P12723112', '1.4', 6, '1', '2017-04-24 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `ip_list`
--

CREATE TABLE `ip_list` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `continent` varchar(50) NOT NULL,
  `continent_code` varchar(20) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_list`
--

INSERT INTO `ip_list` (`id`, `ip_address`, `city`, `state`, `country`, `country_code`, `continent`, `continent_code`, `updated_time`) VALUES
(22, '::1', 'localhost', '', '', '', '', '', '2017-04-17 22:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `ticket`, `name`, `user_id`, `email`, `admin_id`, `message`, `last_updated`) VALUES
(21, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'Hi', '2017-04-16 20:52:19'),
(22, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'Hi', '2017-04-16 20:59:09'),
(23, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'Hi', '2017-04-16 20:59:45'),
(24, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'ff', '2017-04-16 21:01:18'),
(25, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'dd', '2017-04-16 21:02:38'),
(26, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'ff', '2017-04-16 21:02:42'),
(27, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'ggg', '2017-04-16 21:02:47'),
(28, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'gttf', '2017-04-16 21:11:28'),
(29, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'Vince Camuto Lorim Open Toe Patent Leather Platform Heel. ... Save Big On Open-Box & Pre-owned: Buy "Vince Camuto Women''s Lorim Platform Pump” from Amazon Warehouse Deals and save 30% off the $119.99 list price. ... The designer and creator of the Camuto ', '2017-04-16 21:15:30'),
(30, '351081', 'shapon', 5, 'shaponpal4@gmail.com', 0, 'Vince Camuto Lorim Open Toe Patent Leather Platform Heel. ... Save Big On Open-Box & Pre-owned: Buy "Vince Camuto Women''s Lorim Platform Pump” from Amazon Warehouse Deals and save 30% off the $119.99 list price. ... The designer and creator of the Camuto ', '2017-04-16 21:20:22'),
(31, '251355', 'shapon', 5, 'shaponpal2@gmail.com', 0, 'hi', '2017-04-16 21:22:50'),
(32, '195259', 'shapon', 1, 'shaponpal2@gmail.com', 0, 'hi', '2017-04-22 06:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `payee_email` varchar(255) DEFAULT NULL,
  `sale_id` varchar(100) DEFAULT NULL,
  `payer_email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `create_time` varchar(100) DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_transaction`
--

CREATE TABLE `paypal_transaction` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `payee_email` varchar(255) DEFAULT NULL,
  `sale_id` varchar(100) DEFAULT NULL,
  `payer_email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `create_time` varchar(100) DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  `products` int(11) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_transaction`
--

INSERT INTO `paypal_transaction` (`id`, `user_id`, `payer_name`, `payee_email`, `sale_id`, `payer_email`, `shipping_address`, `phone`, `amount`, `description`, `payment_id`, `hash`, `create_time`, `expire_time`, `products`, `complete`) VALUES
(1, 1, 'Shapon pal', NULL, '0UU20673UH676903H', 'shaponpal2@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 9, 'Agency monthly', 'PAY-2VV58260UT5794404LDQNHIQ', 'd6b06a29b8585181dede37baae434dd6', '2017-04-02T10:37:18Z', '2017-05-02 00:00:00', 50, 1),
(5, 1, 'test buyer', 'support-facilitator@winncomm.net', '6A587773GF436883M', 'shaponpal2-buyer@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 19, 'Enterprise monthly', 'PAY-9SP74568TC122473VLDQTWGA', '1e02c6d2b9f4f4e44ddd68661a79deff', '2017-04-02T17:56:38Z', '2017-05-02 00:00:00', 99999, 1),
(6, 1, 'Shapon pal', 'support-facilitator@winncomm.net', '8P882378P5760580W', 'shaponpal2@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 5, 'Solo monthly', 'PAY-8XR149913R4588002LDRDKWY', 'f79168ec6f57775cfc9c4d0798bd0aa9', '2017-04-03T11:44:03Z', '2017-05-03 00:00:00', 10, 1),
(7, 1, 'Shapon pal', 'support-facilitator@winncomm.net', '6PH107134S7165500', 'shaponpal2@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 9, 'Agency monthly', 'PAY-6UL95178V7746821FLDRDOCY', '66bf7df082c78e2f5ff36f662d5f6ae9', '2017-04-03T11:51:34Z', '2017-05-03 00:00:00', 50, 1),
(8, 1, 'Shapon pal', 'support-facilitator@winncomm.net', '27291177L0083894T', 'shaponpal2@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 19, 'Enterprise monthly', 'PAY-93473196DG111462FLDRDQDY', '297adb64ebf95e4fcf314565822b6d8d', '2017-04-03T11:55:41Z', '2017-05-03 00:00:00', 99999, 1),
(9, 5, 'test buyer', 'support-facilitator@winncomm.net', '6E081152N8277091V', 'shaponpal2-buyer@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', 0, 9, 'Agency monthly', 'PAY-1JT36755UV602642XLDW4A6Y', '6aa82e5590f804c61232c78d5799034f', '2017-04-12T05:53:10Z', '2017-05-12 00:00:00', 50, 1),
(10, 6, NULL, NULL, NULL, '', NULL, NULL, 5, 'Solo monthly', 'PAY-84G743346X8251055LD4KNLI', 'a334a18a1f193d530eb6ea13ce87f8bd', NULL, NULL, NULL, 0),
(11, 6, 'test buyer', 'support-facilitator@winncomm.net', '3YB345417V561662F', 'shaponpal2-buyer@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', NULL, 9, 'Agency monthly', 'PAY-1VT533873L706881ALD4KYZQ', '5bb60dac3e4af13562633cd87df437da', '2017-04-20T12:46:57Z', '2017-05-20 00:00:00', 50, 1),
(12, 6, 'test buyer', 'support-facilitator@winncomm.net', '1XB21770XC581915L', 'shaponpal2-buyer@outlook.com', '1 Main St San Jose \r\n             CA 95131 US', NULL, 49, 'Solo yearly', 'PAY-5S742834BG685870DLD6RN5Y', '9527df4da90db7962bd59b9667877b5a', '2017-04-23T21:05:35Z', '2018-04-23 00:00:00', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `plugin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `download_url` varchar(255) NOT NULL,
  `plugin_size` varchar(255) NOT NULL,
  `plugin_file_name` varchar(255) NOT NULL,
  `php_file_url` varchar(255) NOT NULL,
  `php_file_name` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL,
  `requires` varchar(10) NOT NULL,
  `tested` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL,
  `author_homepage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `installation` text NOT NULL,
  `changelog` text NOT NULL,
  `banners` varchar(255) NOT NULL,
  `active_installs` int(4) NOT NULL,
  `downloads` int(4) NOT NULL,
  `total_downloads` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `user_id` int(6) NOT NULL,
  `secret_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`plugin_id`, `title`, `homepage`, `download_url`, `plugin_size`, `plugin_file_name`, `php_file_url`, `php_file_name`, `version`, `requires`, `tested`, `last_updated`, `author`, `author_homepage`, `description`, `installation`, `changelog`, `banners`, `active_installs`, `downloads`, `total_downloads`, `status`, `user_id`, `secret_key`) VALUES
(5, 'WooZips by WinnComm for WooCommerce', 'http://ddddddd', 'http://localhost/WinnRepo/api/plugins2/WooZips-by-WinnComm3.zip', '1892.39', 'WooZips-by-WinnComm3.zip', 'api/1552-aaaaaaaa/plugins/woozips-by-winncomm-for-woocommerce_P1625215//WinnRepoWooZipsbyWinnCommforWooCommercePluginUpdater.php', '', '1.9', '4.2', '4', '2017-04-05 19:47:22', '', '', 'ffffffffffffffff', '', 'cccc', 'api/images/AAEAAQAAAAAAAAhXAAAAJDVkNWM0NzZhLWU3MjUtNGViOS1hNGE5LWYzYWFhODZhMTI5NQ2.jpg', 0, 0, 0, '1', 4, 'P1625215'),
(7, 'Plugin 1', 'http://dddddd', '', '', '', 'api/1553-shapon/plugins/plugin-1_P1516837//WinnRepoPlugin1PluginUpdater.php', '', '', '3.2', '', '2017-04-16 17:51:48', '', '', 'ddddddd', '', '', '', 0, 0, 0, '1', 5, 'P1516837'),
(9, 'test plugin update', 'http://kfkfkkff', 'C:/xampp/htdocs/WinnRepo/api/plugins/WinnRepo.zip', '10921.46', 'WinnRepo', 'api/1549-shapon/plugins/test-plugin-update_P2133989//WinnRepotestpluginupdatePluginUpdater.php', '', '2.2', '4.2', 'dddddddddd', '2017-04-23 00:41:37', '', '', 'krfikfkj', '', 'fffffff', '', 0, 0, 0, '1', 1, 'P2133989'),
(10, 'Plugin 1', 'http://dddddddddd', 'C:/xampp/htdocs/WinnRepo/api/1549-shapon/plugins/plugin-1_P37579410/CodeIgniter-3_1_3.zip', '2536.4', 'CodeIgniter-3_1_3', 'api/1549-shapon/plugins/plugin-1_P37579410/', 'WinnRepoPlugin1PluginUpdater.php', '2.2', '4.2', '4.2', '2017-04-23 01:09:16', '', '', 'ssss', '', 'gt', 'C:/xampp/htdocs/WinnRepo/api/1549-shapon/plugins/plugin-1_P37579410/support-icon.png', 0, 0, 0, '1', 1, 'P37579410'),
(11, 'sssssss', 'http://ggg', 'C:/xampp/htdocs/WinnRepo/winncomm/5935-aaaaaa/plugins/sssssss_P44083211/WinnRepo14-04-17.zip', '10958.27', 'WinnRepo14-04-17', 'winncomm/5935-aaaaaa/plugins/sssssss_P44083211/', 'WinnReposssssssPluginUpdater.php', '', 'ggg', '', '2017-04-23 05:10:14', '', '', 'ff', '', '', 'C:/xampp/htdocs/WinnRepo/winncomm/5935-aaaaaa/plugins/sssssss_P44083211/support-icon.png', 0, 0, 0, '1', 6, 'P44083211'),
(12, 'test plugin update', 'http://dddddddddd', 'C:/xampp/htdocs/WinnRepo/winncomm/5935-aaaaaa/plugins/test-plugin-update_P12723112/test-plugin-update.zip', '1.55', 'test-plugin-update', 'winncomm/5935-aaaaaa/plugins/test-plugin-update_P12723112/', 'WinnRepotestpluginupdatePluginUpdater.php', '1.4', '3.2', '4.2', '2017-04-23 05:14:34', 'dddddd', 'dd', 'fcrf', 'eeee', 'ccccccccccc', 'C:/xampp/htdocs/WinnRepo/winncomm/5935-aaaaaa/plugins/test-plugin-update_P12723112/support-icon.png', 0, 0, 0, '1', 6, 'P12723112');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `product` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `sub_category`, `price`, `product`) VALUES
(1, 'Solo monthly', 'solo', 'monthly', 5, 10),
(2, 'Solo yearly', 'solo ', 'yearly', 49, 10),
(3, 'Agency monthly', 'agency', 'monthly', 9, 50),
(4, 'Agency yearly', 'agency', 'yearly', 79, 50),
(5, 'Enterprise monthly', 'Enterprise', 'monthly', 19, 99999),
(6, 'Enterprise yearly', 'enterprise', 'yearly', 149, 99999);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL,
  `option6` varchar(10) NOT NULL,
  `option7` varchar(10) NOT NULL,
  `option8` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `support_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`support_id`, `user_id`, `name`, `email`, `ticket`, `admin_id`, `topic`, `description`, `created`, `status`) VALUES
(1, 5, 'aaaaaa', 'shaponpal4@gmail.com', '351081', 5, 'sssss', 'dddddddd', '2017-04-14 06:49:47', '0'),
(2, 5, 'shapon', 'shaponpal2@gmail.com', '251355', 5, 'ssssssss', 'aaaaaaaaa', '2017-04-16 21:22:23', '0'),
(3, 5, 'shapon', 'shaponpal2@gmail.com', '526978', 5, 'ssssssss', 'How should ''sensitive'' data be stored in MySQL Database?\r\n\r\n1) Should I focus more on the security of the MySQL database and store the data as plain text?\r\n\r\nI found a step by step tutorial on how to make a MySQL database more secure:\r\nhttp://www.symantec.com/connect/articles/securing-mysql-step-step\r\n2) Should I encrypt the data?\r\n\r\nIf yes, then how should the encryption be done?\r\nUsing MySQL aes_encrypt/aes_decrypt?\r\nUsing PHP AES functions/algorithm for encrypting/decrypting data?\r\nHow should the data be stored in MySQL?\r\nBLOB\r\nBINARY\r\nVARBINARY\r\nIn my case the ''sensitive'' data are payments done by individuals.', '2017-04-16 21:26:04', '0'),
(4, 5, 'shapon', 'shaponpal2@gmail.com', '354378', 0, 'ssssssss', 'ssssssssssssssssss', '2017-04-16 21:29:44', '1'),
(5, 5, 'shapon', 'shaponpal2@gmail.com', '480325', 0, 'ssssssss', 'rgfdrf', '2017-04-16 21:30:34', '1'),
(6, 0, 'shapon', 'shaponpal2@gmail.com', '222226', 5, 'ssssssss', 'fgvdtfgrtf', '2017-04-17 02:16:54', '0'),
(7, 1, 'shapon', 'shaponpal2@gmail.com', '195259', 0, 'ssssssss', 'hhyhj', '2017-04-22 06:04:52', '1'),
(8, 1, 'shapon', '', '464528', 0, 'ddddd', 'dddd', '2017-04-23 03:54:48', '1'),
(9, 1, 'shapon', '', '428269', 0, 'ssssssss', 'kmm', '2017-04-23 03:59:45', '1'),
(10, 1, 'shapon', '', '174880', 0, 'hb', 'gtt', '2017-04-23 04:00:08', '1'),
(11, 1, 'shapon', '', '3507011', 0, 'ikj', 'yugyu', '2017-04-23 04:00:41', '1'),
(12, 6, 'ddd', 'shaponpal2@gmail.com', '1106012', 0, 'ddddddd', 'dddd', '2017-04-24 03:36:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `download_url` varchar(255) NOT NULL,
  `theme_size` varchar(255) NOT NULL,
  `theme_file_name` varchar(255) NOT NULL,
  `php_file_url` varchar(255) NOT NULL,
  `php_file_name` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL,
  `requires` varchar(10) NOT NULL,
  `tested` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL,
  `author_homepage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `installation` text NOT NULL,
  `changelog` text NOT NULL,
  `banners` varchar(255) NOT NULL,
  `active_installs` int(4) NOT NULL,
  `downloads` int(4) NOT NULL,
  `total_downloads` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `user_id` int(6) NOT NULL,
  `secret_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `title`, `homepage`, `download_url`, `theme_size`, `theme_file_name`, `php_file_url`, `php_file_name`, `version`, `requires`, `tested`, `last_updated`, `author`, `author_homepage`, `description`, `installation`, `changelog`, `banners`, `active_installs`, `downloads`, `total_downloads`, `status`, `user_id`, `secret_key`) VALUES
(4, 'aaa', 'http://aaaaa', 'http://localhost/WinnRepo/api/themes/scilexer_(2).zip', '334.32', 'scilexer_(2).zip', 'api/1552-aaaaaaaa/themes/aaa_P3282844//WinnRepoaaaThemeUpdater.php', '', '11', '', 'ddd', '2017-04-04 19:14:38', '', '', 'aaaaa', '', 'dd', 'uploads/themes/banner-1090835__340.jpg', 0, 0, 0, '1', 4, 'P3282844'),
(5, 'ffffffff', 'http://ffffffffff', '', '', '', 'api/1553-shapon/themes/ffffffff_P1371935//WinnRepoffffffffThemeUpdater.php', '', '', '', '', '2017-04-16 20:02:32', '', '', 'ffffffff', '', '', '', 0, 0, 0, '1', 5, 'P1371935'),
(7, 'test plugin update', 'http://gyy', 'C:/xampp/htdocs/WinnRepo/api/5930-shapon/themes/test-plugin-update_T3104337/WinnRepo3.zip', '8916.1', 'WinnRepo3', 'api/5930-shapon/themes/test-plugin-update_T3104337/', 'WinnRepotestpluginupdateThemeUpdater.php', 'xxx', '', 'cccc', '2017-04-23 02:11:52', '', '', 'ftggf', '', 'ccccc', 'C:/xampp/htdocs/WinnRepo/support-icon.png', 0, 0, 0, '1', 1, 'T3104337'),
(8, 'aaaaaaaaaaaa', 'http://gtfg', '', '', '', 'api/5930-shapon/themes/aaaaaaaaaaaa_T2761698/', 'WinnRepoaaaaaaaaaaaaThemeUpdater.php', '', '', '', '2017-04-23 18:23:27', '', '', 'tgfrf', '', '', 'C:/xampp/htdocs/WinnRepo/api/5930-shapon/themes/aaaaaaaaaaaa_T2761698/support-icon.png', 0, 0, 0, '1', 1, 'T2761698'),
(9, 'byhg', 'http://mk', '', '', '', 'winncomm/5935-aaaaaa/themes/byhg_T1676509/', 'WinnRepobyhgThemeUpdater.php', '', '', '', '2017-04-24 06:57:02', '', '', 'hbh', '', '', '', 0, 0, 0, '1', 6, 'T1676509');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `rules` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `change_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `varify_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_varify` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`, `status`, `rules`, `change_email`, `varify_token`, `email_varify`, `address`, `city`, `state`, `zipcode`, `country`, `telephone`, `reason`) VALUES
(1, 'shapon', 'shaponpal4@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2017-03-03 14:08:06', '2017-03-03 14:08:06', '1', 'superAdmin', '', '', '1', '', '', '', '', '', '', ''),
(2, 'Jim Couts', 'jim@winncomm.net', 'c31ba8a9b86f049f44ff9a574d2402f7', '2017-03-25 19:03:23', '2017-03-25 19:03:23', '1', 'superAdmin', '', '', '1', '', '', '', '', '', '', ''),
(3, 'Jim', 'jimmycouts@gmail.com', 'c31ba8a9b86f049f44ff9a574d2402f7', '2017-04-03 08:41:56', '2017-04-03 08:41:56', '1', 'member', '', '', '1', '', '', '', '', '', '', ''),
(5, 'bbb', 'shapon@gmail.com', 'e1082154a666861e80f58f8821ad4e48', '2017-04-20 22:12:50', '2017-04-20 22:12:50', '1', 'member', '', '', '1', '', '', '', '', '', '', ''),
(6, 'aaaaaa', 'shaponpal2@gmail.com', 'bcae0ced2136b81746c340332605798b', '2017-04-23 23:03:54', '2017-04-23 23:03:54', '1', 'member', '', '', '1', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ip_blocker`
--
ALTER TABLE `ip_blocker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_list`
--
ALTER TABLE `ip_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_transaction`
--
ALTER TABLE `paypal_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`plugin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ip_blocker`
--
ALTER TABLE `ip_blocker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ip_list`
--
ALTER TABLE `ip_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paypal_transaction`
--
ALTER TABLE `paypal_transaction`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `plugin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
