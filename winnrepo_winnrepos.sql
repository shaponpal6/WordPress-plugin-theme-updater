-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 208.115.105.35:3306
-- Generation Time: Apr 24, 2017 at 02:43 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winnrepo_winnrepos`
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
  `licence` varchar(10) NOT NULL,
  `download` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_blocker`
--

INSERT INTO `ip_blocker` (`id`, `ip_address`, `city`, `state`, `country`, `country_code`, `continent`, `continent_code`, `licence`, `download`, `client_id`, `status`, `updated_time`) VALUES
(1, '208.115.105.36', '', '', '', '', '', '', 'P2368171', 0, 4, '0', '2017-04-21 00:09:28'),
(2, '208.115.105.36', 'Seattle', 'Washington', 'United States', 'US', 'North America', 'NA', 'P2949932', 1, 4, '1', '2017-04-22 05:15:00'),
(3, '208.115.105.36', 'Seattle', 'Washington', 'United States', 'US', 'North America', 'NA', 'P2396403', 1, 4, '0', '2017-04-22 06:06:35'),
(4, '208.115.105.36', 'Seattle', 'Washington', 'United States', 'US', 'North America', 'NA', 'P2084704', 1, 4, '0', '2017-04-23 20:17:11');

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
(23, '163.53.151.182', '', '', 'Bangladesh', 'BD', 'Asia', 'AS', '2017-04-20 13:35:53'),
(24, '73.140.22.146,66.102.6.18', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-20 14:34:21'),
(25, '73.140.22.146', 'Kent', 'Washington', 'United States', 'US', 'North America', 'NA', '2017-04-20 14:34:21'),
(26, '163.53.151.182,66.102.6.18', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-20 21:56:26'),
(27, '66.249.90.80', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-21 10:53:25'),
(28, '66.249.90.82', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-21 10:53:27'),
(29, '66.102.8.214', 'Bronx', 'New York', 'United States', 'US', 'North America', 'NA', '2017-04-21 12:26:40'),
(30, '66.249.90.64', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-21 13:52:29'),
(31, '73.140.22.146,66.102.7.144', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-21 15:01:29'),
(32, '163.53.151.182,66.102.6.22', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-22 01:11:55'),
(33, '73.140.22.146,66.102.6.22', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-22 17:30:55'),
(34, '163.53.151.182,168.235.195.211', 'Pasadena', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-23 06:58:19'),
(35, '163.53.151.182,64.233.172.130', 'Mountain View', 'California', 'United States', 'US', 'North America', 'NA', '2017-04-23 23:05:57');

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
(1, '315114', 'Jim Couts', 2, 'jim@winncomm.net', 0, 'sdf', '2017-04-21 15:03:03'),
(2, '516893', 'Jim Couts', 2, 'info@winncomm.net', 0, 'sadfaws', '2017-04-21 15:03:14'),
(3, '516893', 'Jim Couts', 4, 'info@winncomm.net', 0, 'Hey', '2017-04-21 16:19:00'),
(4, '516893', 'shapon', 1, 'info@winncomm.net', 0, 'Hello Now i am close this ticket.', '2017-04-22 17:48:41');

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
(1, 2, 'test buyer', 'support-facilitator@winncomm.net', '66M01087P6348801T', 'support-buyer@winncomm.net', '1 Main St San Jose \r\n             CA 95131 US', NULL, 149, 'Enterprise yearly', 'PAY-26M895227T128641MLD4S2MQ', '69bf6bcbd6b78e654895cce767ea8e25', '2017-04-20T21:51:05Z', '2018-04-20 00:00:00', 99999, 1),
(2, 4, 'test buyer', 'support-facilitator@winncomm.net', '06009313B5595972E', 'support-buyer@winncomm.net', '1 Main St San Jose \r\n             CA 95131 US', NULL, 149, 'Enterprise yearly', 'PAY-28J93615Y8171440VLD42TGA', '53f467ae56e83e27db7c6f077374b4e0', '2017-04-21T06:41:45Z', '2018-04-21 00:00:00', 99999, 1);

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

INSERT INTO `plugins` (`plugin_id`, `title`, `homepage`, `download_url`, `plugin_size`, `plugin_file_name`, `php_file_url`, `version`, `requires`, `tested`, `last_updated`, `author`, `author_homepage`, `description`, `installation`, `changelog`, `banners`, `active_installs`, `downloads`, `total_downloads`, `status`, `user_id`, `secret_key`) VALUES
(4, 'WooZips by WinnComm for WooCommerce', 'http://woozips.com/', '', '', '', 'api/1552-jims-test-account/plugins/woozips-by-winncomm-for-woocommerce_P2084704//WinnRepoWooZipsbyWinnCommforWooCommercePluginUpdater.php', '0.0.0.3', '4.7', '4.7.4', '2017-04-24 09:39:20', 'WinnComm, LLC', 'https://www.winncomm.net/', 'This plugin is mainly for the ones that are selling products or services through a geolocation based around zipcodes, the plugin will take your products/services within WooCommerce and create a new section under each product/service where you can assign zipcodes per the WooCommerce product itself. In short, locking down products or services for providers online to a certain geographical area.', '1. Install plugin within WordPress via FTP or through the installer within WordPress itself.\r\n2. Activate plugin\r\n3. Advanced Users ONLY: Import the database tables, this is only done via command line or through cronjob if you don\'t have access to SSH. \r\n	I.E. \r\n	# cd WooZips-by-WinnComm/includes\r\n	# which php \r\n	# php import-zipcode-table.php\r\n	(Note: The above will take time to run and import all depending on server resoures, due to the size of database tables this file contains for importing.)\r\n\r\nNow you\'ll find two areas, first would be under your Settings Menu within WordPress.\r\n	1. Click the WooZip Settings link\r\n	2. Set your settings within here to your likings.\r\n	3. Click Add Zip Code to review the area that all of your Zip Codes are filled out within. Here you can modify, add new zip codes and etc...\r\n	4. After reviewing the above, let\'s go add some zip codes to a product.\r\n\r\nOnce you\'re installed, reviewed everything is imported correctly with zip codes or you simply wanted to enter your own. Let\'s add some zip code(s) to an example product. We highly recommend you to add a test product to see how this will work.\r\n\r\n	1. Add New Product\r\n	2. Find the box below the Description area named: WooZips\r\n	3. You\'ll have three choices on adding zip codes to the product:\r\n		1. Add All Zip Codes (Every Zipcode)\r\n		2. Add Zip Code (Single Zipcodes)\r\n		3. Add Zip Code + Radius in (Miles) (This takes the current zip you\'ve entered and apply a radius of how many miles around your \"central\" zip code you entered.)\r\n	4. After saving, let\'s head over to the front end of the product and review how this works.\r\n\r\nNote: Once you assign zip codes to a product or the check box for All Zip Codes, this will add a new box for someone to enter in a zip code to see if this product/service is available to them.\r\n\r\nQuestions or issues, feel free to reach out to us with a Subject of WooZips to support@winncomm.net\r\n\r\nYour friends,\r\nWinnComm, LLC\r\n\r\nwww.winncomm.net', '- Added WinnRepo Automatic Updates. Test for v3', '', 0, 0, 0, '1', 4, 'P2084704');

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
(1, 4, 'Jim Couts', 'info@winncomm.net', '516893', 1, 'I need Help', 'with this support thing.', '2017-04-21 15:00:08', '0'),
(2, 2, 'Jim Couts', 'jim@winncomm.net', '315114', 0, 'I need help2', 'ssss', '2017-04-21 15:00:58', '1'),
(3, 0, 'test', 'ahhh@hotmail.com', '671678', 0, 'tttt', 'Fhjrr', '2017-04-23 09:01:52', '1');

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
(4, 'Jims Test Account', 'info@winncomm.net', 'c31ba8a9b86f049f44ff9a574d2402f7', '2017-04-21 06:40:28', '2017-04-21 06:40:28', '1', 'member', '', '', '1', '27177 185th Ave SE, Ste: 111-202', 'Covington', 'WA', '98042', 'United States', '2069208556', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ip_list`
--
ALTER TABLE `ip_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paypal_transaction`
--
ALTER TABLE `paypal_transaction`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `plugin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
