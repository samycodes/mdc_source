-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 04:52 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iqlanced_mdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` int(11) NOT NULL,
  `apikey_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `access_token` varchar(250) NOT NULL,
  `device_token` varchar(250) DEFAULT NULL,
  `device_type` enum('none','ios','android') NOT NULL DEFAULT 'none',
  `user_role` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`id`, `apikey_id`, `user_id`, `access_token`, `device_token`, `device_type`, `user_role`, `status`, `created_at`, `updated_at`) VALUES
(16, '8', '18', '66672a8dbbb06375b107f34c698435bf1393fd91', NULL, 'ios', 'user', 'active', '2020-11-11 13:46:35', '2020-11-11 13:46:35'),
(18, '8', '19', '11490fc3454b7aca42be525f5b525de8b4d9b575', NULL, 'ios', 'user', 'active', '2020-11-11 14:56:50', '2020-11-11 14:56:50'),
(19, '8', '20', '3355891cbd46d8d9592859ef7ab32ccd390dee62', NULL, 'ios', 'user', 'active', '2020-11-11 14:56:59', '2020-11-11 14:56:59'),
(22, '8', '21', 'd37bdc9d150a02247c37e1152f7f9fed71b792f0', NULL, 'ios', 'user', 'active', '2020-11-24 11:22:32', '2020-11-24 11:22:32'),
(23, '8', '22', 'cb339e9f9debe1c52180a3bc87f24fb155347969', NULL, 'ios', 'user', 'active', '2020-11-24 19:19:40', '2020-11-24 19:19:40'),
(25, '10', '23', 'dd3ce8f2a0c7f739e6f371cc293d62e5f35f3b34', NULL, 'ios', 'user', 'active', '2020-11-25 13:23:32', '2020-11-25 13:23:32'),
(26, '11', '24', 'f7235b9e9204b3b886c0f772e179de93407fef1a', NULL, 'ios', 'user', 'active', '2020-11-25 13:34:32', '2020-11-25 13:34:32'),
(27, '11', '25', 'b8837ad370a3406d33e65dfdd51482752d1c0c81', NULL, 'ios', 'user', 'active', '2020-11-25 13:53:03', '2020-11-25 13:53:03'),
(28, '11', '26', 'f447ca65e68612a69ddc5e753125e883dadbfae7', NULL, 'ios', 'user', 'active', '2020-11-25 14:02:31', '2020-11-25 14:02:31'),
(29, '13', '27', 'b9dc0f1dfbc583b9ff62a7dd26bf2d2beefd0868', NULL, 'ios', 'user', 'active', '2020-11-25 18:57:09', '2020-11-25 18:57:09'),
(32, '8', '19', 'e7b66da13f9497a0e3585881659c7ed51e26855e', 'eXUbgxoJRtCK7DVtFVedxH:APA91bG_LDstspwqz--336aNn88y2eiyjwT-9pSWKchuy0deArH86soKxBPREAzusPUCn7v6Zb_Z7xOCrDTDaLr-Z4whcqFfG42oTOM-pjF93s-eNI6WijCx1f0RHB-OmhAobAuyWQUR-new', 'ios', 'user', 'active', '2020-11-26 11:51:47', '2020-11-26 11:51:47'),
(35, '13', '28', '2dbaaadf0f016e95e0667efa719d728b5ca6b763', NULL, 'ios', 'user', 'active', '2020-11-26 13:09:00', '2020-11-26 13:09:00'),
(37, '15', '29', 'aea70e97d7c77c4b6e32aba9af75c9d716c26096', NULL, 'android', 'user', 'active', '2020-11-26 14:27:53', '2020-11-26 14:27:53'),
(42, '19', '30', 'b51c56cccd2d7c6dff4e56933658dcd70159cd6c', NULL, 'android', 'user', 'active', '2020-11-26 18:36:59', '2020-11-26 18:36:59'),
(43, '19', '31', '9d817331d73223ade4374ce6d40df6242519624f', NULL, 'android', 'user', 'active', '2020-11-26 18:40:02', '2020-11-26 18:40:02'),
(44, '19', '32', '8504fe4e76eb27ba1b08a611445c2e29625a8017', NULL, 'android', 'user', 'active', '2020-11-27 11:12:42', '2020-11-27 11:12:42'),
(45, '20', '33', 'b7d046d449ea16d7513a6e34b828f247228416bc', NULL, 'ios', 'user', 'active', '2020-11-27 12:30:33', '2020-11-27 12:30:33'),
(46, '20', '34', 'fdc804cd649bb723f7816661835ba44b5db0f177', NULL, 'ios', 'user', 'active', '2020-11-27 12:38:41', '2020-11-27 12:38:41'),
(49, '8', '35', 'f80d17dcc648407305d4191c87de0367fdcfb43d', NULL, 'ios', 'user', 'active', '2020-11-27 13:09:25', '2020-11-27 13:09:25'),
(50, '22', '36', '40521a6fa78a89ed8160bfd04648c978e70cb4dd', NULL, 'ios', 'user', 'active', '2020-11-27 13:10:58', '2020-11-27 13:10:58'),
(54, '26', '37', 'df16d7bb53e25189dd557a95f5fd92e487441b96', NULL, 'ios', 'user', 'active', '2020-11-27 13:23:28', '2020-11-27 13:23:28'),
(56, '28', '38', 'ad7336a100309e9c263f3e4a2207774ae46fcfca', NULL, 'ios', 'user', 'active', '2020-11-27 16:00:01', '2020-11-27 16:00:01'),
(60, '32', '39', '112416e6918bd91945d338029d822c01fbbd2377', NULL, 'android', 'user', 'active', '2020-11-27 18:42:23', '2020-11-27 18:42:23'),
(61, '31', '40', '97fd5267dcc29847c5505c3c13ef9e183352a662', NULL, 'ios', 'user', 'active', '2020-11-27 18:49:11', '2020-11-27 18:49:11'),
(62, '30', '41', 'f2c6afdfa045e1efafa288a6bfc81f5a12643322', NULL, 'android', 'user', 'active', '2020-11-27 18:49:59', '2020-11-27 18:49:59'),
(68, '33', '42', '43d091bddcce684ecc9c03f0aeff842e75804e03', NULL, 'android', 'user', 'active', '2020-11-27 19:25:18', '2020-11-27 19:25:18'),
(71, '36', '43', '802a7f6a48095028f3d328f4d18bf837a80255d8', NULL, 'ios', 'user', 'active', '2020-11-28 02:25:34', '2020-11-28 02:25:34'),
(72, '37', '44', '8eb78093de8e18e1d6e288d6a4ddd6014c2800f4', NULL, 'android', 'user', 'active', '2020-11-29 16:10:59', '2020-11-29 16:10:59'),
(75, '37', '45', 'b565320215920cfa54e64b82251bdf300b60a8bd', NULL, 'android', 'user', 'active', '2020-11-29 16:25:29', '2020-11-29 16:25:29'),
(78, '38', '46', '3ab2360f64fee0e01f8c000dea600b55bd7fc585', NULL, 'ios', 'user', 'active', '2020-11-29 17:26:40', '2020-11-29 17:26:40'),
(84, '8', '47', '1446f399e21e87a02e75d0986c5ff0ab90572a4a', NULL, 'ios', 'user', 'active', '2020-11-30 19:06:35', '2020-11-30 19:06:35'),
(85, '40', '48', '7301d85b518189933a5fac0b97f89164d8c44538', NULL, 'ios', 'user', 'active', '2020-11-30 21:34:37', '2020-11-30 21:34:37'),
(86, '40', '49', '0932998060b1ef8c432a62ccb39e1001b047ff16', NULL, 'ios', 'user', 'active', '2020-11-30 21:36:45', '2020-11-30 21:36:45'),
(87, '40', '50', '5bbf246de1a88e32990772399eba7b32de04a2d5', NULL, 'ios', 'user', 'active', '2020-11-30 21:43:46', '2020-11-30 21:43:46'),
(88, '40', '51', '93bbdbe87cb0ae92483d37240cac343b37c64114', NULL, 'ios', 'user', 'active', '2020-11-30 21:57:00', '2020-11-30 21:57:00'),
(90, '42', '52', '3f1ccc6a2cf26d95461f5ad2cfd57ec553b13714', NULL, 'android', 'user', 'active', '2020-12-01 12:07:41', '2020-12-01 12:07:41'),
(91, '42', '53', '205f20fbb01a872df7fcb040a7680237f9b4add5', NULL, 'android', 'user', 'active', '2020-12-01 12:09:25', '2020-12-01 12:09:25'),
(92, '8', '54', 'a7da6335d9507200334c32311ca666349e14e59c', NULL, 'ios', 'user', 'active', '2020-12-01 14:09:55', '2020-12-01 14:09:55'),
(93, '8', '55', 'dfbcee203d2b67c307f5f942d82aa43325b99cf6', NULL, 'ios', 'user', 'active', '2020-12-01 14:18:24', '2020-12-01 14:18:24'),
(97, '47', '56', '2d6f9b193ed6c11e60d42f0e2e37567e32359c84', NULL, 'android', 'user', 'active', '2020-12-01 20:44:42', '2020-12-01 20:44:42'),
(105, '49', '57', 'ddb44b178f116e3e8a6e67f931d48b611bef10ca', NULL, 'android', 'user', 'active', '2020-12-02 15:51:19', '2020-12-02 15:51:19'),
(108, '8', '58', '27816b8b19355d9345c9fdaaccb762de4cb370d2', NULL, 'ios', 'user', 'active', '2020-12-03 13:05:29', '2020-12-03 13:05:29'),
(140, '60', '59', '627cebb8c08a8d6ad55f1622172e939446853bee', NULL, 'android', 'user', 'active', '2020-12-03 19:30:01', '2020-12-03 19:30:01'),
(154, '65', '60', '79d25365bc9a96ff9a06798d8541ce7b521fd031', NULL, 'ios', 'user', 'active', '2020-12-04 18:39:27', '2020-12-04 18:39:27'),
(159, '65', '62', 'e3d982cd141e8bc1007c56c45a42ba6f442297a4', NULL, 'ios', 'user', 'active', '2020-12-04 18:42:57', '2020-12-04 18:42:57'),
(160, '65', '63', '459f7569f1ef2f076b4628b7cbd486b99325a880', NULL, 'ios', 'user', 'active', '2020-12-04 18:43:18', '2020-12-04 18:43:18'),
(162, '67', '64', '8fc3426c3da9b2e2491a9d957cf98921689f228e', NULL, 'android', 'user', 'active', '2020-12-04 19:01:47', '2020-12-04 19:01:47'),
(173, '73', '65', '18ebee6a17141a3e759d144965f9207637ab9ad0', NULL, 'ios', 'user', 'active', '2020-12-07 12:48:27', '2020-12-07 12:48:27'),
(201, '8', '67', '0a2c48a59f13e3d29f1c0af4ee6aa65509fdfb1c', NULL, 'ios', 'user', 'active', '2020-12-07 18:58:32', '2020-12-07 18:58:32'),
(210, '90', '68', 'da31f3bc5c00dda37a37cebdb7785aa626b69254', NULL, 'ios', 'user', 'active', '2020-12-07 20:27:43', '2020-12-07 20:27:43'),
(214, '91', '69', '7aa6d3a302acf67513a8b9815a4ac732f08c7801', NULL, 'ios', 'user', 'active', '2020-12-07 22:40:40', '2020-12-07 22:40:40'),
(236, '8', '70', '1b7ec36f974e5e37e7f7bfabfddfa2b0a23db7fa', NULL, 'ios', 'user', 'active', '2020-12-08 13:55:52', '2020-12-08 13:55:52'),
(237, '8', '71', 'e05ff61ab150c493412c27069357d93658eecb4f', NULL, 'ios', 'user', 'active', '2020-12-08 14:07:23', '2020-12-08 14:07:23'),
(238, '96', '72', 'b75c4ff14c6dca5a4a2ab80004d4c6a70a87e390', NULL, 'ios', 'user', 'active', '2020-12-08 14:20:34', '2020-12-08 14:20:34'),
(240, '98', '73', '9505c678e02d8bae07c0b189270696617a9bf981', NULL, 'ios', 'user', 'active', '2020-12-08 15:39:02', '2020-12-08 15:39:02'),
(242, '99', '74', '22edcaeba829b1c5aeda583f7429d075cbb713f7', NULL, 'ios', 'user', 'active', '2020-12-08 17:19:35', '2020-12-08 17:19:35'),
(252, '104', '75', '0710166db823014e3e56789c568bca6e404fb9c8', NULL, 'android', 'user', 'active', '2020-12-08 20:08:57', '2020-12-08 20:08:57'),
(253, '104', '76', '02ba0b0aa732a7557c7c3defe8c88aa8e0885e0a', NULL, 'android', 'user', 'active', '2020-12-08 20:18:55', '2020-12-08 20:18:55'),
(254, '104', '77', 'ddef2bcb8a341a147e935a1edbcb1f68d5ca376d', NULL, 'android', 'user', 'active', '2020-12-08 20:23:42', '2020-12-08 20:23:42'),
(255, '104', '78', '17329a77c9b9277367d3d161593505343f4122ca', NULL, 'android', 'user', 'active', '2020-12-08 20:26:27', '2020-12-08 20:26:27'),
(256, '103', '79', '752345d46afa28de0297b76f3707dbcc766ce018', NULL, 'ios', 'user', 'active', '2020-12-08 20:39:05', '2020-12-08 20:39:05'),
(257, '103', '80', '10db1cab38bdcaa32c4747fe7beb13f6e8ab39ba', NULL, 'ios', 'user', 'active', '2020-12-08 20:41:23', '2020-12-08 20:41:23'),
(258, '8', '81', '40774986370c52341d2b23a0489d7cf3b0278642', NULL, 'ios', 'user', 'active', '2020-12-08 20:42:36', '2020-12-08 20:42:36'),
(259, '8', '82', '2c5ea438470fe1fd8a4001083d032939009fdb77', NULL, 'ios', 'user', 'active', '2020-12-08 20:45:11', '2020-12-08 20:45:11'),
(261, '106', '83', '22f2c3663248d65748ab456a21ce8494230f1762', NULL, 'android', 'user', 'active', '2020-12-08 21:02:13', '2020-12-08 21:02:13'),
(263, '107', '84', 'bfc42b03797719c7ea567bf0006c6fc76a45bf1b', NULL, 'ios', 'user', 'active', '2020-12-08 21:04:21', '2020-12-08 21:04:21'),
(264, '108', '85', '7fcea15be4c34b0ae39cd3fe76065518d73bd78b', NULL, 'android', 'user', 'active', '2020-12-08 21:06:12', '2020-12-08 21:06:12'),
(265, '109', '86', '40aa96b5e07e82ffc44a42648d683da224521bfa', NULL, 'android', 'user', 'active', '2020-12-08 21:06:57', '2020-12-08 21:06:57'),
(266, '110', '87', 'a5f804e288860fdc0dfbf3a537f41c3266057c4d', NULL, 'android', 'user', 'active', '2020-12-08 21:12:00', '2020-12-08 21:12:00'),
(267, '111', '88', '08e2e75f8a90caf26c6c95e8f76d85125e058034', NULL, 'android', 'user', 'active', '2020-12-08 21:19:16', '2020-12-08 21:19:16'),
(268, '113', '89', '45a16594b9211b38a6e5a189ddfd9b5c3d81ca0d', NULL, 'android', 'user', 'active', '2020-12-08 21:30:27', '2020-12-08 21:30:27'),
(270, '113', '90', 'c5b22f0566226bedd2066d6b2ff7c21dd86895c6', NULL, 'android', 'user', 'active', '2020-12-08 21:32:29', '2020-12-08 21:32:29'),
(306, '119', '91', '0dfbb5f755e452bbcabfd1c54f00dae18eb1a3bb', NULL, 'android', 'user', 'active', '2020-12-09 19:38:31', '2020-12-09 19:38:31'),
(311, '120', '92', 'a3dfa8e8a746f682f405b47d3329875be181c7cb', NULL, 'android', 'user', 'active', '2020-12-09 20:00:09', '2020-12-09 20:00:09'),
(320, '125', '93', 'ba2e3335f7cae2aab7af0fd9011b0eba8c1ab2da', NULL, 'android', 'user', 'active', '2020-12-09 20:43:05', '2020-12-09 20:43:05'),
(325, '126', '94', '25deeacaff95db8d6ae914af1824a2279b1e57d5', NULL, 'ios', 'user', 'active', '2020-12-09 21:17:58', '2020-12-09 21:17:58'),
(327, '119', '95', '64e358cb1b70e0b1daa7b54a7763750e3950890d', NULL, 'android', 'user', 'active', '2020-12-09 21:34:17', '2020-12-09 21:34:17'),
(329, '119', '96', 'ca908f55f76023e8dc7278997738468f4ccd5516', NULL, 'android', 'user', 'active', '2020-12-09 21:37:07', '2020-12-09 21:37:07'),
(330, '126', '97', '77b6a225fa77929fb1c0eeea21a953b06404a406', NULL, 'ios', 'user', 'active', '2020-12-09 23:03:27', '2020-12-09 23:03:27'),
(334, '127', '98', '7af805f55d944fb95fdc4a56618695f2217855ab', NULL, 'android', 'user', 'active', '2020-12-09 23:13:21', '2020-12-09 23:13:21'),
(336, '126', '99', '062cd2421fba863b3b3428b468f458ee93ad482d', NULL, 'ios', 'user', 'active', '2020-12-09 23:15:59', '2020-12-09 23:15:59'),
(338, '126', '100', 'a35ae7de24f04459c73e811a1c3c195c95d76a5c', NULL, 'ios', 'user', 'active', '2020-12-09 23:18:22', '2020-12-09 23:18:22'),
(340, '127', '101', '56bc4618c62d710739632aebcde7d699e231b8cf', NULL, 'android', 'user', 'active', '2020-12-09 23:20:48', '2020-12-09 23:20:48'),
(342, '127', '102', '3746f0ec3fe9c7b620055cdd6da0575ff204c968', NULL, 'android', 'user', 'active', '2020-12-09 23:25:48', '2020-12-09 23:25:48'),
(356, '73', '103', '9682f8420bb150331b31cbf098ad23d16f4ecbf6', NULL, 'ios', 'user', 'active', '2020-12-10 13:46:04', '2020-12-10 13:46:04'),
(358, '73', '104', 'd34d0082a0646acb1b43b1e494240054fd776f7f', NULL, 'ios', 'user', 'active', '2020-12-10 13:49:10', '2020-12-10 13:49:10'),
(359, '73', '105', '7f9bb1e74d0456ca947c7a5ef782f629dfaa4701', NULL, 'ios', 'user', 'active', '2020-12-10 13:51:33', '2020-12-10 13:51:33'),
(362, '120', '106', '1b792a93d2fc848d3a563c2f89cfbadc5d651b3f', NULL, 'android', 'user', 'active', '2020-12-10 13:58:23', '2020-12-10 13:58:23'),
(364, '73', '107', '573c1c1430b1a66816fd789b6ae439d4f53412ea', NULL, 'ios', 'user', 'active', '2020-12-10 14:06:50', '2020-12-10 14:06:50'),
(371, '142', '108', 'e7b825aa743cc0635d3fcc6942e6d17375366f66', NULL, 'ios', 'user', 'active', '2020-12-10 18:03:50', '2020-12-10 18:03:50'),
(373, '142', '109', '9530a7503de243bbb910fe5a4cfc9873e74b0267', NULL, 'ios', 'user', 'active', '2020-12-10 18:09:17', '2020-12-10 18:09:17'),
(377, '144', '89', 'f17a24c7a9e8669d4cf0824c6fc6fa79e53bcf63', 'eXUbgxoJRtCK7DVtFVedxH:APA91bG_LDstspwqz--336aNn88y2eiyjwT-9pSWKchuy0deArH86soKxBPREAzusPUCn7v6Zb_Z7xOCrDTDaLr-Z4whcqFfG42oTOM-pjF93s-eNI6WijCx1f0RHB-OmhAobAuyWQUR', 'android', 'user', 'active', '2020-12-10 18:45:23', '2020-12-10 18:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `apiKey` varchar(250) NOT NULL,
  `user_role` enum('user','admin','','') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `apiKey`, `user_role`, `status`, `created_at`, `updated_at`) VALUES
(8, 'b646af00de7d76bfb93b4265d83954a041eaf3ce', 'user', 'active', '2020-11-11 13:42:52', '2020-11-11 13:42:52'),
(9, 'dd03cb59b691b3d881f287738cb3801a53169098', 'user', 'active', '2020-11-24 11:20:09', '2020-11-24 11:20:09'),
(10, '6b619ef79180d93793bfea8ec3e481ed8cf6563c', 'user', 'active', '2020-11-24 19:36:44', '2020-11-24 19:36:44'),
(11, '2dc53265517c17a7ab99149a99464ddb36d1964d', 'user', 'active', '2020-11-25 13:31:56', '2020-11-25 13:31:56'),
(12, '12e271005c85069c72cecfb62de0dc63920f4f10', 'user', 'active', '2020-11-25 14:25:21', '2020-11-25 14:25:21'),
(13, 'ca5cc309bf956bc5410ef3426cc5de66e337652f', 'user', 'active', '2020-11-25 18:57:06', '2020-11-25 18:57:06'),
(14, '5a67c333e495b2badf18ff8cafdb91c525defafc', 'user', 'active', '2020-11-25 19:24:29', '2020-11-25 19:24:29'),
(15, 'cb8510317f61c8624986647fad27f3e48f52dddd', 'user', 'active', '2020-11-26 14:26:52', '2020-11-26 14:26:52'),
(16, '8aab6b26011a12a89ea26a7bbc101ef2a4c2011f', 'user', 'active', '2020-11-26 15:54:37', '2020-11-26 15:54:37'),
(17, '6697ed382f6b9ea072b328beb6ff9d3f0e6133bc', 'user', 'active', '2020-11-26 16:03:47', '2020-11-26 16:03:47'),
(18, 'a865e0561b54f175ae0758e918db1551e9bc34fc', 'user', 'active', '2020-11-26 18:30:05', '2020-11-26 18:30:05'),
(19, '0281bc818dd3ade321e184eb7c23b767bd38f494', 'user', 'active', '2020-11-26 18:34:07', '2020-11-26 18:34:07'),
(20, '67178a488d2ea6e34cb6b3197136f338a1f506ec', 'user', 'active', '2020-11-27 12:30:31', '2020-11-27 12:30:31'),
(21, '3684bcc86a6f3f6fbcf8a6c3061b01fb6dbac38f', 'user', 'active', '2020-11-27 12:40:10', '2020-11-27 12:40:10'),
(22, '4b50213778145090b38d034e21b1ebdc07959e46', 'user', 'active', '2020-11-27 12:59:57', '2020-11-27 12:59:57'),
(23, '3eab01f341064af64177eac92dd30058bc286db3', 'user', 'active', '2020-11-27 13:12:56', '2020-11-27 13:12:56'),
(24, '27ca3b533a029aa83acc99f3494dc09aeb7d7136', 'user', 'active', '2020-11-27 13:18:46', '2020-11-27 13:18:46'),
(25, 'a24fccfdd60582bf79105056d14350bc41f63368', 'user', 'active', '2020-11-27 13:20:44', '2020-11-27 13:20:44'),
(26, 'f9632c343347af07761cf1e2b0f0b01827994c28', 'user', 'active', '2020-11-27 13:23:26', '2020-11-27 13:23:26'),
(27, 'fd6625796457d48293c988ed57c0053fc474de2e', 'user', 'active', '2020-11-27 13:47:25', '2020-11-27 13:47:25'),
(28, '6ea786d7a8368cf532cdb330c3322d2e6a627365', 'user', 'active', '2020-11-27 15:34:28', '2020-11-27 15:34:28'),
(29, '43f3ab0ed7fde237da973012b806fda3ba430829', 'user', 'active', '2020-11-27 16:12:20', '2020-11-27 16:12:20'),
(30, '6970613567018a4a44de65633889fa98a0273ade', 'user', 'active', '2020-11-27 18:32:17', '2020-11-27 18:32:17'),
(31, '7a9b6aa215a3420b480a43feb52e15d5ec12d70d', 'user', 'active', '2020-11-27 18:38:42', '2020-11-27 18:38:42'),
(32, '2e3e3144036943b3287780892da03f9584b68971', 'user', 'active', '2020-11-27 18:42:21', '2020-11-27 18:42:21'),
(33, '31c540387d5621ec56df1f70746212cf7d9cafd1', 'user', 'active', '2020-11-27 19:25:17', '2020-11-27 19:25:17'),
(34, 'e117b358c3119eee34f10bb1a3f1ed4e41305795', 'user', 'active', '2020-11-27 20:36:41', '2020-11-27 20:36:41'),
(35, '2f3ae22e1fd148b85ad9de564cd21a4e01df8d65', 'user', 'active', '2020-11-27 21:37:32', '2020-11-27 21:37:32'),
(36, '3094cb4e6e121c7485543cc09edf5c5ae8c08baa', 'user', 'active', '2020-11-28 02:25:32', '2020-11-28 02:25:32'),
(37, '8155ee8688bc523be22df5834de4454bd4e7fb1c', 'user', 'active', '2020-11-29 16:10:58', '2020-11-29 16:10:58'),
(38, 'fd077c59d2dfc6cdec845eb77279b092ae472de1', 'user', 'active', '2020-11-29 17:25:27', '2020-11-29 17:25:27'),
(39, 'af7c78a6ecbedccace5f72baaf8d6e9423d149c6', 'user', 'active', '2020-11-30 12:21:36', '2020-11-30 12:21:36'),
(40, 'dfc3bd9df480d598c249bab6a67cc7a9c30d0f45', 'user', 'active', '2020-11-30 16:55:54', '2020-11-30 16:55:54'),
(41, '69a9fa1dbc8e7de95c490375ced539342d1fcf1a', 'user', 'active', '2020-11-30 17:18:20', '2020-11-30 17:18:20'),
(42, '488e50d0db0058a6c0145395304e65cd25855797', 'user', 'active', '2020-12-01 11:01:59', '2020-12-01 11:01:59'),
(43, 'ca4051d4d99d3b67a826bde89d183b9b72d70b31', 'user', 'active', '2020-12-01 12:50:27', '2020-12-01 12:50:27'),
(44, '0527e59cb6a9520f556f4b2f4abf511e593d0e51', 'user', 'active', '2020-12-01 15:51:09', '2020-12-01 15:51:09'),
(45, 'ed4dd7636d7ab1fc78a910a6d7f43a6678cbbc10', 'user', 'active', '2020-12-01 19:54:38', '2020-12-01 19:54:38'),
(46, '606ce62fa699923c04c6f0686e7dcb79815c64fa', 'user', 'active', '2020-12-01 19:58:00', '2020-12-01 19:58:00'),
(47, '42fc244c934ba483fd21e817c1f733a0ef3c81cf', 'user', 'active', '2020-12-01 20:43:03', '2020-12-01 20:43:03'),
(48, 'c5432308ef80096bc1d4c130b362d6f051b9da28', 'user', 'active', '2020-12-02 14:04:20', '2020-12-02 14:04:20'),
(49, '1c36d4708e6105335108649348ceac5cd67b5b9b', 'user', 'active', '2020-12-02 15:51:17', '2020-12-02 15:51:17'),
(50, '47fbbb7ea5f4bbbaae410ab9a6964e58c3e61b7a', 'user', 'active', '2020-12-02 19:31:42', '2020-12-02 19:31:42'),
(51, 'b45b32fcb1c32e2307a9da3b9f658eb6ebda7f90', 'user', 'active', '2020-12-03 13:54:19', '2020-12-03 13:54:19'),
(52, '97b9eb39c11f477bfe6c22409ca2968c078fc09e', 'user', 'active', '2020-12-03 14:05:13', '2020-12-03 14:05:13'),
(53, '2ae9dc0712d750006a2243347ea5a8e484a306ad', 'user', 'active', '2020-12-03 14:09:10', '2020-12-03 14:09:10'),
(54, '293620a1e5557e0635f70c7c8a477ad0f5d5ca76', 'user', 'active', '2020-12-03 14:30:43', '2020-12-03 14:30:43'),
(55, '0d00e122d0b7015ab5362fafe17c2c8407fc39dd', 'user', 'active', '2020-12-03 14:34:53', '2020-12-03 14:34:53'),
(56, 'c13c1dc00e50c46bbad70b6225f5fa19449c1544', 'user', 'active', '2020-12-03 15:12:25', '2020-12-03 15:12:25'),
(57, '10bde0237070c6ea29c6b81c9f5eec27f3003a17', 'user', 'active', '2020-12-03 15:55:03', '2020-12-03 15:55:03'),
(58, '8b612328c16f567dc1820edd412ef57fdd237f20', 'user', 'active', '2020-12-03 15:55:38', '2020-12-03 15:55:38'),
(59, '5b6ade0751bef095e7ad852bfc7ee94914d5afb5', 'user', 'active', '2020-12-03 15:59:48', '2020-12-03 15:59:48'),
(60, 'eaffff7fd911e117ea90a49a55f14431eb1a2fa4', 'user', 'active', '2020-12-03 17:03:40', '2020-12-03 17:03:40'),
(61, '0d34add552a41f90543741c5b3eb1ed65f98ea76', 'user', 'active', '2020-12-03 17:08:54', '2020-12-03 17:08:54'),
(62, '6c80eef38d7157706b936ec55cb534ac325c4726', 'user', 'active', '2020-12-03 18:29:42', '2020-12-03 18:29:42'),
(63, '855801be9e057bbe1d8cee9241ab38ddbb0b33ae', 'user', 'active', '2020-12-03 18:32:11', '2020-12-03 18:32:11'),
(64, '7666d385b9f4d3ca90926de8d1d28e610fea8a21', 'user', 'active', '2020-12-03 22:27:21', '2020-12-03 22:27:21'),
(65, '9a37384f4bef9fa33e89f61f6bc95503a4d94956', 'user', 'active', '2020-12-04 12:48:22', '2020-12-04 12:48:22'),
(66, '5d0f49ecf5c2b1439eb24de7bf80c7981b09ba13', 'user', 'active', '2020-12-04 18:20:54', '2020-12-04 18:20:54'),
(67, '03ecdd57c4e949c57e0cb2ae012f614871423e1b', 'user', 'active', '2020-12-04 18:40:11', '2020-12-04 18:40:11'),
(68, 'ad09af863dd53764191fb3461ee5ed2baea1ce46', 'user', 'active', '2020-12-04 18:41:36', '2020-12-04 18:41:36'),
(69, '698e4d6f43c31795ba6bb80ffedeb780436c6746', 'user', 'active', '2020-12-04 18:42:07', '2020-12-04 18:42:07'),
(70, 'dfe43afff1a29ff0fbc4612c35e0b64a383f6761', 'user', 'active', '2020-12-07 10:47:56', '2020-12-07 10:47:56'),
(71, '9de20d952f435a47b1120fd8f2cbc8f0f6cf0331', 'user', 'active', '2020-12-07 10:54:35', '2020-12-07 10:54:35'),
(72, '141943dd69301c31b0b14000de61612f39cd164f', 'user', 'active', '2020-12-07 11:59:04', '2020-12-07 11:59:04'),
(73, '48a5894ba48860cbe82097ea710a238a576a9f2d', 'user', 'active', '2020-12-07 12:48:06', '2020-12-07 12:48:06'),
(74, '8a40fd00a5bffd23fb9e1f6f41d4ede08084a0c0', 'user', 'active', '2020-12-07 12:59:52', '2020-12-07 12:59:52'),
(75, 'd14f53cf44224b37400b6d17096506e4265dede6', 'user', 'active', '2020-12-07 13:20:53', '2020-12-07 13:20:53'),
(76, '9c0ebc13d9f6f4ce78ecdd22147ccee71e4e00ec', 'user', 'active', '2020-12-07 13:24:11', '2020-12-07 13:24:11'),
(77, '6416d308db2cc7366d08d740ad9e562417a8de79', 'user', 'active', '2020-12-07 13:26:31', '2020-12-07 13:26:31'),
(78, '267caaee016ce389a91223c08445a59bf3a4e733', 'user', 'active', '2020-12-07 13:33:04', '2020-12-07 13:33:04'),
(79, 'ac91cfc4b107aaed0dc7df2fb17cfb7d79302e83', 'user', 'active', '2020-12-07 13:34:27', '2020-12-07 13:34:27'),
(80, 'bd6c29f5b0df1797e6608dc0c8666fd365c6a469', 'user', 'active', '2020-12-07 13:57:18', '2020-12-07 13:57:18'),
(81, 'edcbbc5216fcd1fb783fb758e2e9bc4cad4f24b4', 'user', 'active', '2020-12-07 14:36:15', '2020-12-07 14:36:15'),
(82, 'e49243a9a75d6c0093c53e9ccbfcb192e70d1ee7', 'user', 'active', '2020-12-07 16:06:07', '2020-12-07 16:06:07'),
(83, '8dcab70fdf1cb18ca59fef6d05cc961004efd443', 'user', 'active', '2020-12-07 16:07:01', '2020-12-07 16:07:01'),
(84, 'ef2489033dbea3e7b5026772c89df4a6720d3104', 'user', 'active', '2020-12-07 16:44:57', '2020-12-07 16:44:57'),
(85, 'afa1a160669bfbcae8d3233cb0c985cb26d2f19a', 'user', 'active', '2020-12-07 16:46:49', '2020-12-07 16:46:49'),
(86, '1b84ed3f73ed5e755a58e709989f9ac3eff5233d', 'user', 'active', '2020-12-07 18:33:51', '2020-12-07 18:33:51'),
(87, 'ca42cd3f549a4122bd9f57956768af895c3bae28', 'user', 'active', '2020-12-07 18:38:07', '2020-12-07 18:38:07'),
(88, 'c8f4ebc9de702a2053f06826a16ff097477bafbf', 'user', 'active', '2020-12-07 19:12:00', '2020-12-07 19:12:00'),
(89, 'a9f591f9b2a6b2fcd28ee454d0ab664619db92ea', 'user', 'active', '2020-12-07 19:44:10', '2020-12-07 19:44:10'),
(90, '3472a13d1e0db8851725021da7fbd682b0942e14', 'user', 'active', '2020-12-07 20:00:26', '2020-12-07 20:00:26'),
(91, '5780332fcf40dcda2d0e15527281e615731a8707', 'user', 'active', '2020-12-07 22:40:39', '2020-12-07 22:40:39'),
(92, '0c974061a759913601a5061b99829898e36f96c9', 'user', 'active', '2020-12-07 23:00:19', '2020-12-07 23:00:19'),
(93, '18c50e650c6d75cfb30ccf14d92207bbc13d1f11', 'user', 'active', '2020-12-08 12:49:14', '2020-12-08 12:49:14'),
(94, 'fac3700ff54f8682222a1336571cac4b5c6c1924', 'user', 'active', '2020-12-08 13:03:15', '2020-12-08 13:03:15'),
(95, '1152881e257f5c58bacd3bd1a7145ac6db281bb6', 'user', 'active', '2020-12-08 13:12:15', '2020-12-08 13:12:15'),
(96, 'dc408133dfd797700730f2a3a8a144e5e1360881', 'user', 'active', '2020-12-08 14:20:32', '2020-12-08 14:20:32'),
(97, '8d682985124325a9f04c243df922ba427129a5dc', 'user', 'active', '2020-12-08 15:22:26', '2020-12-08 15:22:26'),
(98, '4003bb100da3cc68ff04c71ef2a3fdb06df82c34', 'user', 'active', '2020-12-08 15:39:01', '2020-12-08 15:39:01'),
(99, '68261507d14942fb8ae482331bf9258b12a59316', 'user', 'active', '2020-12-08 17:17:45', '2020-12-08 17:17:45'),
(100, '287b1a17cc0b2cf0a19649d0f6706284d2af0537', 'user', 'active', '2020-12-08 17:39:01', '2020-12-08 17:39:01'),
(101, 'fecb9f39e29315f5e511fa5a5daa0cde8deb766d', 'user', 'active', '2020-12-08 17:47:03', '2020-12-08 17:47:03'),
(102, '1addd7cc67e7855cb970a4721067e604c158c9dc', 'user', 'active', '2020-12-08 18:16:02', '2020-12-08 18:16:02'),
(103, '91d6b77524c64786315bdd1c034e667b6d599d09', 'user', 'active', '2020-12-08 19:29:07', '2020-12-08 19:29:07'),
(104, '816627ab384a412165cf8dc5be453e0397f50763', 'user', 'active', '2020-12-08 20:08:55', '2020-12-08 20:08:55'),
(105, '215893dbf67208a42ec8dea145b4ab17a0d60a60', 'user', 'active', '2020-12-08 20:51:42', '2020-12-08 20:51:42'),
(106, '97ed1078a2ccc004aacf35f8543585c8cdecef73', 'user', 'active', '2020-12-08 21:01:03', '2020-12-08 21:01:03'),
(107, 'ab9ae3095459e9bddb1e17981b0861b1e59cdd9f', 'user', 'active', '2020-12-08 21:03:07', '2020-12-08 21:03:07'),
(108, '7bdddc0ea064895ea4a820670c0993dd694c1b9f', 'user', 'active', '2020-12-08 21:05:35', '2020-12-08 21:05:35'),
(109, 'a1802e40013c59606384303240ec679fc5439f75', 'user', 'active', '2020-12-08 21:06:27', '2020-12-08 21:06:27'),
(110, '38611d15d8e3e62898a9466e9a12fb2b3b56d609', 'user', 'active', '2020-12-08 21:11:26', '2020-12-08 21:11:26'),
(111, 'c19de0820c43d4bfe3410eb70caa10f5f7f4610b', 'user', 'active', '2020-12-08 21:18:44', '2020-12-08 21:18:44'),
(112, '060d4d529c0f506651323a45bd7eca1d54a8024d', 'user', 'active', '2020-12-08 21:24:31', '2020-12-08 21:24:31'),
(113, '31915561e8fef832299438dae8f71b6422173fa0', 'user', 'active', '2020-12-08 21:29:40', '2020-12-08 21:29:40'),
(114, '64b79493b7cb107bee9cba90eb3f12baf9b5811e', 'user', 'active', '2020-12-09 12:02:20', '2020-12-09 12:02:20'),
(115, '78bd62fe8c3857ccec58f07d9671d4e78140b717', 'user', 'active', '2020-12-09 12:03:12', '2020-12-09 12:03:12'),
(116, '6b78d1438a4dee3406dbfb9f1d3d527a467a6af8', 'user', 'active', '2020-12-09 14:09:23', '2020-12-09 14:09:23'),
(117, 'a0d64656db09ffa6999ace72c67f8e5901914a0a', 'user', 'active', '2020-12-09 16:02:42', '2020-12-09 16:02:42'),
(118, '358f952518fa1eb6de7ff800bc42ff903791ae68', 'user', 'active', '2020-12-09 16:05:03', '2020-12-09 16:05:03'),
(119, '840fa274061483e2ff55eddb32b25cb20d6ee0ed', 'user', 'active', '2020-12-09 19:22:11', '2020-12-09 19:22:11'),
(120, 'f5518c5fdd917aeb61b4795b03e951e18fa562c6', 'user', 'active', '2020-12-09 19:32:13', '2020-12-09 19:32:13'),
(121, '0a70c29e81a259972acae8723a6723868def5242', 'user', 'active', '2020-12-09 19:38:22', '2020-12-09 19:38:22'),
(122, 'bc91759bab9a87926e4d1faca630ede70785f765', 'user', 'active', '2020-12-09 19:40:43', '2020-12-09 19:40:43'),
(123, '1e9f62560274bbcd1c61f7cb5a3f8f8ce203519d', 'user', 'active', '2020-12-09 20:03:29', '2020-12-09 20:03:29'),
(124, '63d8308c8b15d955a0836506375fd45a20b76105', 'user', 'active', '2020-12-09 20:04:02', '2020-12-09 20:04:02'),
(125, 'b148ee2b0c2225cb7d3c659e3601e4490abfc056', 'user', 'active', '2020-12-09 20:42:00', '2020-12-09 20:42:00'),
(126, 'eaa9d5896515172f78d51bdcda2927f4bfbd58ca', 'user', 'active', '2020-12-09 21:13:19', '2020-12-09 21:13:19'),
(127, '53b311dc4c35935477c594275a9f8e7bbe16ea28', 'user', 'active', '2020-12-09 23:13:20', '2020-12-09 23:13:20'),
(128, '9154b5fa9998bbbd3ad0396f68f9eeff6a819ae0', 'user', 'active', '2020-12-10 12:46:55', '2020-12-10 12:46:55'),
(129, 'dffba0b1546892c0f408d0cd42356875978b5d8a', 'user', 'active', '2020-12-10 12:50:56', '2020-12-10 12:50:56'),
(130, 'a7208b2f21192e45d6fbe7960c8a12ef6ba06664', 'user', 'active', '2020-12-10 12:52:26', '2020-12-10 12:52:26'),
(131, '2188ac6978880ffbe08550d89907c4454bdbbe28', 'user', 'active', '2020-12-10 13:00:02', '2020-12-10 13:00:02'),
(132, '338acb1a77b0accdda25384192ded9b3fef6df2b', 'user', 'active', '2020-12-10 13:04:57', '2020-12-10 13:04:57'),
(133, '25cf7b487f83af20b435dfabb96a83d8bfe9f209', 'user', 'active', '2020-12-10 13:06:44', '2020-12-10 13:06:44'),
(134, '841b45271514a8edf0cc3fb23c0c7410944d9610', 'user', 'active', '2020-12-10 13:28:05', '2020-12-10 13:28:05'),
(135, 'b206b2990b533aa78fa2e24aa49f335478c97396', 'user', 'active', '2020-12-10 13:30:29', '2020-12-10 13:30:29'),
(136, '4abfadbfe34918ece13f66ecd2da6d1e0ae42406', 'user', 'active', '2020-12-10 13:32:04', '2020-12-10 13:32:04'),
(137, 'a64ce5faa4cf6186faaacf49c8bbbb2c9b35a55b', 'user', 'active', '2020-12-10 13:54:56', '2020-12-10 13:54:56'),
(138, '39cf5cc6dc013d6c78bf4e7fc428df83fb39e0d7', 'user', 'active', '2020-12-10 15:06:44', '2020-12-10 15:06:44'),
(139, '420b5ae8cafbdf453d4a1015850d781873dc312f', 'user', 'active', '2020-12-10 16:50:24', '2020-12-10 16:50:24'),
(140, '8eb258327056b29bdc2973f670241f63e572bce6', 'user', 'active', '2020-12-10 17:20:19', '2020-12-10 17:20:19'),
(141, 'f6a5bea6d8329f91b62968999b611d6bd9421f29', 'user', 'active', '2020-12-10 17:58:08', '2020-12-10 17:58:08'),
(142, '88bce2553a19f2716feb2254102051246586b630', 'user', 'active', '2020-12-10 18:03:48', '2020-12-10 18:03:48'),
(143, '4e4c2472380a67321b67f08fbcfe5ca2961b8158', 'user', 'active', '2020-12-10 18:42:33', '2020-12-10 18:42:33'),
(144, 'cfd9563946f07aaeb88e50ae4f0fc7bc6ed5cf77', 'user', 'active', '2020-12-10 18:45:22', '2020-12-10 18:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gcc_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `policy` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_type` enum('Fatal Diseases','Special Needs','Social Insurance','Offer Card') COLLATE utf8_unicode_ci NOT NULL,
  `document_type` enum('Medical Report','Social Insurance Card') COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female','','') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `document_upload` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_status` enum('pending','in-progress','completed','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `type` enum('single','family') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'single',
  `occured_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_date` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '''''',
  `accepted_date` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `expired_date` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `fullname`, `country_code`, `mobile_number`, `gcc_id`, `policy`, `card_type`, `document_type`, `price`, `gender`, `user_id`, `document_upload`, `card_status`, `status`, `type`, `occured_on`, `created_date`, `accepted_date`, `expired_date`, `created_at`, `updated_at`) VALUES
(1, 'singleUserTest', '+91', '98701325', '111', '29bc07', 'Fatal Diseases', 'Medical Report', '19.99', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607069885-image.png', 'pending', 'active', 'single', '2020-12-04 15:18:05', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 15:18:05', '2020-12-04 15:18:05'),
(2, 'singleUserTest', '+91', '98701325', '111', '398af0', 'Fatal Diseases', 'Medical Report', '19.99', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607075721-image.png', 'pending', 'active', 'single', '2020-12-04 16:55:21', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 16:55:21', '2020-12-04 16:55:21'),
(3, 'Mahammad', '+297', '33344344', '3434343434', 'cfc5b1', 'Special Needs', 'Medical Report', '19.9', 'Female', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607076923-image.png', 'pending', 'active', 'single', '2020-12-04 17:15:23', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:15:23', '2020-12-04 17:15:23'),
(4, 'Mahammad', '+376', '87872772', '22222222', 'fe0e52', 'Social Insurance', 'Social Insurance Card', '19.9', 'Female', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607077614-image.png', 'pending', 'active', 'single', '2020-12-04 17:26:54', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:26:54', '2020-12-04 17:26:54'),
(5, 'singleUserTest', '+4532', '98701325', '111', 'e1c0ad', 'Fatal Diseases', 'Medical Report', '19.99', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607078103-image.png', 'pending', 'active', 'single', '2020-12-04 17:35:03', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:35:03', '2020-12-04 17:35:03'),
(6, 'Dsdd', '+376', '33333388', '5566666666', 'a2c203', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607078115-image.png', 'pending', 'active', 'single', '2020-12-04 17:35:15', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:35:15', '2020-12-04 17:35:15'),
(7, 'singleUserTest', '+4532', '98701325', '111', 'f3cc52', 'Fatal Diseases', 'Medical Report', '19.99', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607078940-image.png', 'pending', 'active', 'single', '2020-12-04 17:49:00', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:49:00', '2020-12-04 17:49:00'),
(8, 'shahin', '+91', '9870013', '111', '9cb4b8', 'Fatal Diseases', 'Medical Report', '19.19', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607079051-image.png', 'pending', 'active', 'family', '2020-12-04 17:50:51', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:50:51', '2020-12-04 17:50:51'),
(9, 'shahin2', '+91', '9870013', '111', 'd580f8', 'Fatal Diseases', 'Medical Report', '19.19', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607079051-image.png', 'pending', 'active', 'family', '2020-12-04 17:50:51', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 17:50:51', '2020-12-04 17:50:51'),
(10, 'Ghfgh', '+376', '53358741', '2551685555', '73d0fe', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607089475-image.png', 'pending', 'active', 'family', '2020-12-04 20:44:35', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 20:44:35', '2020-12-04 20:44:35'),
(11, 'Dfdfdf', '+358', '23242342', '2342342342', 'f15563', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091008-image.png', 'pending', 'active', 'family', '2020-12-04 21:10:08', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:10:08', '2020-12-04 21:10:08'),
(12, 'hhhhh6hhhhh6 MH s', '+355', '55632589', '4343534534', '2cff34', 'Offer Card', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091113-image.png', 'pending', 'active', 'family', '2020-12-04 21:11:53', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:11:53', '2020-12-04 21:11:53'),
(13, 'Gfgdfgdfg', '+376', '43534235', '4613454645', 'af9ea5', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091113-image.png', 'pending', 'active', 'family', '2020-12-04 21:11:53', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:11:53', '2020-12-04 21:11:53'),
(14, 'Retertertrt', '+213', '56666666', '2533665555', 'fcda74', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091271-image.png', 'pending', 'active', 'family', '2020-12-04 21:14:31', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:14:31', '2020-12-04 21:14:31'),
(15, 'Dfdsfdsf', '+355', '43432535', '4353453453', 'c574ca', 'Offer Card', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091271-image.png', 'pending', 'active', 'family', '2020-12-04 21:14:31', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:14:31', '2020-12-04 21:14:31'),
(16, 'Ghhhhgg', '+1268', '58566996', '3223655689', '3e4f54', 'Social Insurance', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091368-image.png', 'pending', 'active', 'family', '2020-12-04 21:16:08', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:16:08', '2020-12-04 21:16:08'),
(17, 'Fgdgdgdgdg', '+672', '34534534', '3543535646', 'a46dca', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091368-image.png', 'pending', 'active', 'family', '2020-12-04 21:16:08', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:16:08', '2020-12-04 21:16:08'),
(18, 'Fdhgdhfghfgh', '+1684', '54645645', '6456456456', '4ca6f5', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091619-image.png', 'pending', 'active', 'family', '2020-12-04 21:20:19', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:20:19', '2020-12-04 21:20:19'),
(19, 'Ggggggg', '+376', '45345345', '5346464456', 'ac33b5', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091619-image.png', 'pending', 'active', 'family', '2020-12-04 21:20:19', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:20:19', '2020-12-04 21:20:19'),
(20, 'Tryrtyty', '+1684', '46464564', '4564564645', '640dae', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091773-image.png', 'pending', 'active', 'family', '2020-12-04 21:22:53', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:22:53', '2020-12-04 21:22:53'),
(21, 'Fdsfsdf', '+1684', '32432435', '345345345', '603f2c', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091773-image.png', 'pending', 'active', 'family', '2020-12-04 21:22:53', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:22:53', '2020-12-04 21:22:53'),
(22, 'Erytrtyrty', '+355', '54645646', '4564564646', '65fa15', 'Offer Card', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091813-image.png', 'pending', 'active', 'family', '2020-12-04 21:23:33', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:23:33', '2020-12-04 21:23:33'),
(23, 'Tryrtyty', '+1684', '46464564', '4564564645', 'c554a6', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091813-image.png', 'pending', 'active', 'family', '2020-12-04 21:23:33', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:23:33', '2020-12-04 21:23:33'),
(24, 'Fdsfsdf', '+1684', '32432435', '345345345', '55a676', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '27', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607091813-image.png', 'pending', 'active', 'family', '2020-12-04 21:23:33', '2020-12-04', '0000-00-00', '0000-00-00', '2020-12-04 21:23:33', '2020-12-04 21:23:33'),
(25, 'Sagar', '+973', '96325807', '9632580741', '0056fe', 'Offer Card', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607339887-image.png', 'pending', 'active', 'single', '2020-12-07 18:18:08', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:18:08', '2020-12-07 18:18:08'),
(26, 'Sagar', '+244', '98765432', '963258741', 'ec9f17', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340521-image.png', 'pending', 'active', 'family', '2020-12-07 18:28:41', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:28:41', '2020-12-07 18:28:41'),
(27, 'Sagar', '+54', '96742538', '9876543210', 'fb395e', 'Offer Card', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340521-image.png', 'pending', 'active', 'family', '2020-12-07 18:28:41', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:28:41', '2020-12-07 18:28:41'),
(28, 'Pass', '+1684', '12457809', '9874125036', 'b51192', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340695-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:35', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(29, 'Mom', '+1684', '89563514', '9632580741', '95cf15', 'Special Needs', 'Social Insurance Card', '19.9', 'Female', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340695-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:35', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(30, 'Sagar', '+244', '98765432', '963258741', 'c1379f', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340695-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:35', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(31, 'Sagar', '+244', '98765432', '963258741', '247fe6', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340695-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:35', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(32, 'Sagar', '+54', '96742538', '9876543210', '7e1e29', 'Offer Card', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340695-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:35', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(33, 'Pass', '+1684', '12457809', '9874125036', 'ca11e2', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(34, 'Pass', '+1684', '12457809', '9874125036', '1e1a2c', 'Fatal Diseases', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(35, 'Mom', '+1684', '89563514', '9632580741', '1b5abe', 'Special Needs', 'Social Insurance Card', '19.9', 'Female', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(36, 'Sagar', '+244', '98765432', '963258741', 'ef1bad', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(37, 'Sagar', '+244', '98765432', '963258741', 'fa35e1', 'Social Insurance', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(38, 'Sagar', '+54', '96742538', '9876543210', 'e5c3ab', 'Offer Card', 'Medical Report', '19.9', 'Male', '31', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607340715-image.png', 'pending', 'active', 'family', '2020-12-07 18:31:55', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(39, 'singleUserTest', '+4532', '98701325', '111', 'e01af5', 'Fatal Diseases', 'Medical Report', '19.99', 'Female', '18', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607342698-image.png', 'pending', 'active', 'single', '2020-12-07 19:04:58', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 19:04:58', '2020-12-07 19:04:58'),
(40, 'Enter  enter t', '+213', '42423432', '2443234234', 'ec1c79', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348583-image.png', 'pending', 'active', 'single', '2020-12-07 20:43:03', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:43:03', '2020-12-07 20:43:03'),
(41, 'Gdfggfgdg dgfgdg', '+355', '53534536', '4353453453', '52f31c', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(42, 'Ffdsd', '+1684', '45345345', '3453453453', '42c31d', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(43, 'Df dfgdf', '+672', '43453453', '3453453453', '523df8', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(44, 'Dssdfdfsdf', '+1684', '43435353', '5354654657', '91e76f', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(45, 'Fdfdfdf dff  f df g', '+1684', '43243345', '3453453453', '7d3d5c', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(46, 'Are e rower', '+376', '42342342', '2342342342', 'd6f258', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348952-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:12', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(47, 'Gdfggfgdg dgfgdg', '+355', '53534536', '4353453453', 'e1057d', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(48, 'Gdfggfgdg dgfgdg', '+355', '53534536', '4353453453', '5f7fc0', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(49, 'Ffdsd', '+1684', '45345345', '3453453453', '305795', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(50, 'Df dfgdf', '+672', '43453453', '3453453453', '9e4ec5', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(51, 'Dssdfdfsdf', '+1684', '43435353', '5354654657', 'cc802f', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(52, 'Fdfdfdf dff  f df g', '+1684', '43243345', '3453453453', '2ff53f', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(53, 'Are e rower', '+376', '42342342', '2342342342', 'd7c2fe', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '68', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607348979-image.png', 'pending', 'active', 'family', '2020-12-07 20:49:39', '2020-12-07', '0000-00-00', '0000-00-00', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(54, 'Cczxc  34', '+213', '33232332', '424324324', '22f1c2', 'Social Insurance', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607410363-image.png', 'pending', 'active', 'single', '2020-12-08 13:52:43', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 13:52:43', '2020-12-08 13:52:43'),
(55, 'Good', '+376', '34434223', '3432222222', 'e635f4', 'Social Insurance', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607410799-image.png', 'pending', 'active', 'family', '2020-12-08 13:59:59', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 13:59:59', '2020-12-08 13:59:59'),
(56, 'Sdadsd', '+213', '33333333', '3333333333', '6cfaf2', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607410799-image.png', 'pending', 'active', 'family', '2020-12-08 13:59:59', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 13:59:59', '2020-12-08 13:59:59'),
(57, 'Ddsdsd sd', '+355', '33333333', '3333333333', '65ffac', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607410799-image.png', 'pending', 'active', 'family', '2020-12-08 13:59:59', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 13:59:59', '2020-12-08 13:59:59'),
(58, 'Avesh', '+376', '98700000', '2', 'fc15f4', 'Special Needs', 'Medical Report', '19.9', 'Male', '61', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607445569-image.png', 'pending', 'active', 'family', '2020-12-08 23:39:29', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 23:39:29', '2020-12-08 23:39:29'),
(59, 'Sanu', '+355', '98700132', '10', 'f8c6af', 'Special Needs', 'Medical Report', '19.9', 'Female', '61', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607445569-image.png', 'pending', 'active', 'family', '2020-12-08 23:39:29', '2020-12-08', '0000-00-00', '0000-00-00', '2020-12-08 23:39:29', '2020-12-08 23:39:29'),
(60, 'Sagar', '+54', '96321457', '9621470350', '8070f8', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607502407-image.png', 'pending', 'active', 'single', '2020-12-09 15:26:47', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:26:47', '2020-12-09 15:26:47'),
(61, 'Sagar', '+54', '96325807', '9632580711', '493f20', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607502468-image.png', 'pending', 'active', 'single', '2020-12-09 15:27:48', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:27:48', '2020-12-09 15:27:48'),
(62, 'Sagar', '+672', '96251775', '963258147', '5c035e', 'Special Needs', 'Medical Report', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(63, 'Name', '+376', '96325147', '9871425365', 'c05d20', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(64, 'Schh', '+244', '98865788', '9632580741', '442efc', 'Offer Card', 'Medical Report', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(65, 'Sahar', '+54', '96325176', '9632581770', '2d508c', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(66, 'Segy', '+54', '96321478', '9874152360', 'd5283e', 'Special Needs', 'Social Insurance Card', '19.9', 'Female', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(67, 'Sagar', '+54', '96325071', '987425301', '2ec5da', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503072-image.png', 'pending', 'active', 'family', '2020-12-09 15:37:52', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(68, 'Sagar', '+1268', '96325874', '9874152236', '1a0081', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503457-image.png', 'pending', 'active', 'single', '2020-12-09 15:44:17', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:44:17', '2020-12-09 15:44:17'),
(69, 'Sagar', '+244', '96325175', '9633258147', '6fe90b', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503506-image.png', 'pending', 'active', 'single', '2020-12-09 15:45:06', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:45:06', '2020-12-09 15:45:06'),
(70, 'Sagar', '+1268', '85993217', '963214750', 'f5880e', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503681-image.png', 'pending', 'active', 'family', '2020-12-09 15:48:01', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:48:01', '2020-12-09 15:48:01'),
(71, 'Sagb', '+672', '96321475', '9632580741', '4d5f0b', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503681-image.png', 'pending', 'active', 'family', '2020-12-09 15:48:01', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:48:01', '2020-12-09 15:48:01'),
(72, 'Davb', '+54', '96325874', '9632584471', 'fd058f', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503681-image.png', 'pending', 'active', 'family', '2020-12-09 15:48:01', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:48:01', '2020-12-09 15:48:01'),
(73, 'Sagar', '+1268', '96321475', '9874152260', '0f4583', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607503681-image.png', 'pending', 'active', 'family', '2020-12-09 15:48:01', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 15:48:01', '2020-12-09 15:48:01'),
(74, 'Fghh', '+54', '99446839', '5973886655', '292bd5', 'Social Insurance', 'Medical Report', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607506350-image.png', 'pending', 'active', 'family', '2020-12-09 16:32:30', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 16:32:30', '2020-12-09 16:32:30'),
(75, 'Dgjh', '+672', '96687977', '965729', '96a925', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607506350-image.png', 'pending', 'active', 'family', '2020-12-09 16:32:30', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 16:32:30', '2020-12-09 16:32:30'),
(76, 'Sagar', '+244', '96328170', '9632517844', 'e909ad', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607506350-image.png', 'pending', 'active', 'family', '2020-12-09 16:32:30', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 16:32:30', '2020-12-09 16:32:30'),
(77, 'Sagsr', '+1264', '96328817', '963247504', 'e959bd', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607506350-image.png', 'pending', 'active', 'family', '2020-12-09 16:32:30', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 16:32:30', '2020-12-09 16:32:30'),
(78, 'Shsnsbb', '+1264', '98998975', '679544684', '0a7dbe', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607506555-image.png', 'pending', 'active', 'single', '2020-12-09 16:35:55', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 16:35:55', '2020-12-09 16:35:55'),
(79, 'Cbgfhgf', '+213', '35454645', '4564564564', 'f3cfed', 'Offer Card', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607508776-image.png', 'pending', 'active', 'single', '2020-12-09 17:12:56', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 17:12:56', '2020-12-09 17:12:56'),
(80, 'Ddsd', '+355', '33344342', '2342342342', 'b0da0e', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607508926-image.png', 'pending', 'active', 'single', '2020-12-09 17:15:26', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 17:15:26', '2020-12-09 17:15:26'),
(81, 'Ddfsfsdf', '+213', '45345365', '5364646535', 'a1dafc', 'Social Insurance', 'Social Insurance Card', '19.9', 'Female', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607510209-image.png', 'pending', 'active', 'family', '2020-12-09 17:36:49', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 17:36:49', '2020-12-09 17:36:49'),
(82, 'Dsfsfsdf', '+376', '42335345', '3453453534', 'a168d0', 'Social Insurance', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607510209-image.png', 'pending', 'active', 'family', '2020-12-09 17:36:49', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 17:36:49', '2020-12-09 17:36:49'),
(83, 'Dsdsd', '+244', '33434434', '4343434344', 'f0d5c5', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607510209-image.png', 'pending', 'active', 'family', '2020-12-09 17:36:49', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 17:36:49', '2020-12-09 17:36:49'),
(84, 'Test', '+973', '33333333', '4444444444', '4bd065', 'Offer Card', 'Medical Report', '19.9', 'Female', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517323-image.png', 'pending', 'active', 'single', '2020-12-09 19:35:23', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:35:23', '2020-12-09 19:35:23'),
(85, 'Test', '+973', '33333333', '3333333333', '5fef40', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517359-image.png', 'pending', 'active', 'single', '2020-12-09 19:35:59', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:35:59', '2020-12-09 19:35:59'),
(86, 'Test2', '+973', '44444444', '4444444444', '0a55f2', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Female', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517487-image.png', 'pending', 'active', 'family', '2020-12-09 19:38:07', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:38:07', '2020-12-09 19:38:07'),
(87, 'Test', '+973', '33333333', '3333333333', '79ac9f', 'Special Needs', 'Medical Report', '19.9', 'Male', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517487-image.png', 'pending', 'active', 'family', '2020-12-09 19:38:07', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:38:07', '2020-12-09 19:38:07'),
(88, 'Test', '+1242', '44444444', '4444444444', 'ec1c6d', 'Social Insurance', 'Social Insurance Card', '19.9', 'Female', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517790-image.png', 'pending', 'active', 'family', '2020-12-09 19:43:10', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:43:10', '2020-12-09 19:43:10'),
(89, 'Test', '+973', '44444444', '4444444444', 'ab6eff', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517790-image.png', 'pending', 'active', 'family', '2020-12-09 19:43:10', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:43:10', '2020-12-09 19:43:10'),
(90, 'Sagar', '+1246', '96321457', '984512376', 'c9025f', 'Special Needs', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607518558-image.png', 'pending', 'active', 'single', '2020-12-09 19:55:58', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 19:55:58', '2020-12-09 19:55:58'),
(91, 'Sagar', '+1246', '96871552', '987415830', '7155f0', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607519697-image.png', 'pending', 'active', 'family', '2020-12-09 20:14:57', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 20:14:57', '2020-12-09 20:14:57'),
(92, 'Bhavik', '+1242', '22445533', '1234564890', 'e07da7', 'Special Needs', 'Medical Report', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522679-image.png', 'pending', 'active', 'single', '2020-12-09 21:04:39', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:04:39', '2020-12-09 21:04:39'),
(93, 'Bhavik', '+1242', '22445533', '1234564890', '008885', 'Special Needs', 'Medical Report', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522690-image.png', 'pending', 'active', 'single', '2020-12-09 21:04:50', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:04:50', '2020-12-09 21:04:50'),
(94, 'Sagar', '+1264', '96325814', '9632507410', '5b7dd9', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '89', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522749-image.png', 'pending', 'active', 'single', '2020-12-09 21:05:49', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:05:49', '2020-12-09 21:05:49'),
(95, 'Bhavik', '+1242', '22445533', '1234564890', 'c7255f', 'Special Needs', 'Medical Report', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522759-image.png', 'pending', 'active', 'single', '2020-12-09 21:05:59', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:05:59', '2020-12-09 21:05:59'),
(96, 'Sagar', '+672', '99845315', '9768431580', 'd9dfdf', 'Social Insurance', 'Medical Report', '19.9', 'Male', '34', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522810-image.png', 'pending', 'active', 'single', '2020-12-09 21:06:50', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:06:50', '2020-12-09 21:06:50'),
(97, 'Bbh', '+213', '99885478', '88555666', '06f5ba', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522859-image.png', 'pending', 'active', 'family', '2020-12-09 21:07:39', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:07:39', '2020-12-09 21:07:39'),
(98, 'Bb', '+1684', '66998855', '865565565', 'dc2fb9', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522859-image.png', 'pending', 'active', 'family', '2020-12-09 21:07:39', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:07:39', '2020-12-09 21:07:39'),
(99, 'Bbh', '+213', '99885478', '88555666', 'd4fcdd', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522865-image.png', 'pending', 'active', 'family', '2020-12-09 21:07:45', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:07:45', '2020-12-09 21:07:45'),
(100, 'Bbh', '+213', '99885478', '88555666', 'e0457d', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522865-image.png', 'pending', 'active', 'family', '2020-12-09 21:07:45', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:07:45', '2020-12-09 21:07:45'),
(101, 'Bb', '+1684', '66998855', '865565565', '801df3', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '93', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522865-image.png', 'pending', 'active', 'family', '2020-12-09 21:07:45', '2020-12-09', '0000-00-00', '0000-00-00', '2020-12-09 21:07:45', '2020-12-09 21:07:45'),
(102, 'Fsdfdf', '+376', '32223424', '4353453454', 'f4f1d4', 'Offer Card', 'Medical Report', '19.9', 'Male', '100', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607569162-image.png', 'pending', 'active', 'family', '2020-12-10 09:59:22', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 09:59:22', '2020-12-10 09:59:22'),
(103, 'Dsfsdf', '+376', '42423423', '3242423423', 'd8baff', 'Special Needs', 'Medical Report', '19.9', 'Male', '100', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607569162-image.png', 'pending', 'active', 'family', '2020-12-10 09:59:22', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 09:59:22', '2020-12-10 09:59:22'),
(104, 'Cvxcv', '+1684', '34234234', '4234234234', '11889d', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '100', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607569940-image.png', 'pending', 'active', 'single', '2020-12-10 10:12:20', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 10:12:20', '2020-12-10 10:12:20'),
(105, 'Test 3', '+973', '66666666', '6666666666', '3dbb1f', 'Fatal Diseases', 'Medical Report', '19.9', 'Female', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607580659-image.png', 'pending', 'active', 'family', '2020-12-10 13:10:59', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 13:10:59', '2020-12-10 13:10:59'),
(106, 'Test 4', '+973', '99999999', '9999999999', '5bdffb', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '45', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607580659-image.png', 'pending', 'active', 'family', '2020-12-10 13:10:59', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 13:10:59', '2020-12-10 13:10:59'),
(107, 'Bfggfhfg', '+376', '34534534', '3453453453', '15d5f1', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596029-image.png', 'pending', 'active', 'single', '2020-12-10 17:27:09', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:27:09', '2020-12-10 17:27:09'),
(108, 'Rwrertert', '+376', '24342342', '2342342423', 'bf181f', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596123-image.png', 'pending', 'active', 'family', '2020-12-10 17:28:43', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:28:43', '2020-12-10 17:28:43'),
(109, 'Retertrtert', '+355', '34534534', '3453453453', 'fd1b84', 'Special Needs', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596123-image.png', 'pending', 'active', 'family', '2020-12-10 17:28:43', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:28:43', '2020-12-10 17:28:43'),
(110, 'Fdgdfg', '+1684', '45345345', '3453455345', 'f4df81', 'Social Insurance', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596123-image.png', 'pending', 'active', 'family', '2020-12-10 17:28:43', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:28:43', '2020-12-10 17:28:43'),
(111, 'Gfdgdfg', '+376', '34535345', '3453453453', 'd5c189', 'Special Needs', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596241-image.png', 'pending', 'active', 'single', '2020-12-10 17:30:41', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:30:41', '2020-12-10 17:30:41'),
(112, 'Fgfdgdf', '+376', '34534534', '3545345345', '80f134', 'Fatal Diseases', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596292-image.png', 'pending', 'active', 'family', '2020-12-10 17:31:32', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:31:32', '2020-12-10 17:31:32'),
(113, 'Fdgdfgdfgdf', '+213', '45345345', '5345345435', 'f3df61', 'Offer Card', 'Medical Report', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596292-image.png', 'pending', 'active', 'family', '2020-12-10 17:31:32', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:31:32', '2020-12-10 17:31:32'),
(114, 'Fgdgfdgdfgd', '+1264', '24243534', '3545345345', 'bf7b29', 'Social Insurance', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596386-image.png', 'pending', 'active', 'single', '2020-12-10 17:33:06', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:33:06', '2020-12-10 17:33:06'),
(115, 'Hgfhfgh', '+376', '43534534', '345345345', 'f1d45f', 'Offer Card', 'Social Insurance Card', '19.9', 'Male', '29', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607596417-image.png', 'pending', 'active', 'family', '2020-12-10 17:33:37', '2020-12-10', '0000-00-00', '0000-00-00', '2020-12-10 17:33:37', '2020-12-10 17:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Complain','GeneralInquiry','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'GeneralInquiry',
  `status` enum('active','inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `message`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '18', 'shahin', 'shahin.iqlance@gmail.com', 'Hie', 'Complain', 'active', '2020-12-03 14:43:26', '2020-12-03 14:43:26'),
(2, '18', 'shahin', 'shahin.iqlance@gmail.com', 'Hie', 'Complain', 'active', '2020-12-04 12:17:51', '2020-12-04 12:17:51'),
(3, '18', 'shahin', 'User41@gmail.com', 'Hie', 'Complain', 'active', '2020-12-04 12:18:06', '2020-12-04 12:18:06'),
(4, '29', 'Dsdd', 'Dsds@gmail.com', 'Dsdd dsdd', 'Complain', 'active', '2020-12-04 12:21:42', '2020-12-04 12:21:42'),
(5, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Hello', 'Complain', 'active', '2020-12-04 12:37:57', '2020-12-04 12:37:57'),
(6, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Yellow card', 'Complain', 'active', '2020-12-04 12:38:44', '2020-12-04 12:38:44'),
(7, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Yellow card', 'Complain', 'active', '2020-12-04 12:38:51', '2020-12-04 12:38:51'),
(8, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Yellow card', 'Complain', 'active', '2020-12-04 12:39:32', '2020-12-04 12:39:32'),
(9, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Hello picnic', 'Complain', 'active', '2020-12-04 12:40:23', '2020-12-04 12:40:23'),
(10, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'Dsddd ghhh', 'Complain', 'active', '2020-12-04 12:41:15', '2020-12-04 12:41:15'),
(11, '29', 'Mahammad', 'Mahammad.iqlance@gmail.com', 'This is FGEnearl Iquiries', 'GeneralInquiry', 'active', '2020-12-04 12:41:57', '2020-12-04 12:41:57'),
(12, '31', 'Sagar', 'Sagar.iqlance@gmail.com', 'Sags\nHhhhh\nHhhhh\nHhhhh\nHhhhh\nHhgg\nGhhhh\nHhhhj', 'Complain', 'active', '2020-12-04 18:55:51', '2020-12-04 18:55:51'),
(13, '31', 'Sagar', 'Sagar@gmsil.com', 'Sagar\nBhh\nGhhh\nHhhj\nHhhh\n\n\n\n\n\n\n\n\nGhh\nGhh\nGhh', 'GeneralInquiry', 'active', '2020-12-04 19:49:33', '2020-12-04 19:49:33'),
(14, '27', 'Gdfgdfg', 'Gdgdfg@gmail.com', 'Tyuuhg', 'Complain', 'active', '2020-12-04 21:45:29', '2020-12-04 21:45:29'),
(15, '29', 'Mohamadnedariya', 'Dsdsd@gmail.com', 'Dfffdfdfdfdfdff', 'Complain', 'active', '2020-12-07 13:18:13', '2020-12-07 13:18:13'),
(16, '29', 'Sddsd', 'Fdfd@gmail.com', 'Fdfdfdf fdffdf', 'Complain', 'active', '2020-12-07 13:20:55', '2020-12-07 13:20:55'),
(17, '29', 'Dfdff', 'Dffd@gmail.com', 'Dfffdfdffdf', 'Complain', 'active', '2020-12-07 13:24:13', '2020-12-07 13:24:13'),
(18, '29', 'mahhaa', 'Sdsd@gmail.com', 'Ffgdggddd', 'Complain', 'active', '2020-12-07 13:26:33', '2020-12-07 13:26:33'),
(19, '31', 'Sagarmodi', 'Sagar@gmail.com', 'Sagar', 'Complain', 'active', '2020-12-07 16:11:33', '2020-12-07 16:11:33'),
(20, '34', 'Sagar', 'Sagar.iqlance@gmail.com', 'Sagar', 'Complain', 'active', '2020-12-07 16:11:50', '2020-12-07 16:11:50'),
(21, '31', 'Sagarmodi', 'Sagar.iqlance@gmail.com', 'Sagar', 'Complain', 'active', '2020-12-07 16:12:24', '2020-12-07 16:12:24'),
(22, '31', 'Sa', 'Sagar.iqlance@gmail.com', 'Sagar\nDeed\nEhhh\nEhhh\nEhhh\nGahh\nAhhhh\nGogh\nOhhhh', 'GeneralInquiry', 'active', '2020-12-07 16:17:18', '2020-12-07 16:17:18'),
(23, '34', 'Sagar', 'Sagar.iqlance@gmail.com', 'Safa\nGdsf\nBgddf\nJjff\nJjgg\nHggh\nJuhgy\nHhhh\nIijjj', 'GeneralInquiry', 'active', '2020-12-07 16:17:29', '2020-12-07 16:17:29'),
(24, '18', 'sagar', 'sagar.iqlance@gmail.com', 'QA', 'GeneralInquiry', 'active', '2020-12-07 18:03:20', '2020-12-07 18:03:20'),
(25, '29', 'Mahammad', 'Dsdds@gmail.com', 'Fdfdfdf hellopw MDC', 'Complain', 'active', '2020-12-07 19:09:43', '2020-12-07 19:09:43'),
(26, '29', 'Dfdf', 'Dffdfdf@gmail.com', 'Fdffdf@1233', 'Complain', 'active', '2020-12-07 19:10:54', '2020-12-07 19:10:54'),
(27, '29', 'S  jfdh dfg', 'dkdfj@gmail.com', 'Fgdfgdfg', 'Complain', 'active', '2020-12-07 19:12:32', '2020-12-07 19:12:32'),
(28, '31', 'Saga', 'Sagar.iqlance@gmail.com', 'Das', 'Complain', 'active', '2020-12-07 20:03:02', '2020-12-07 20:03:02'),
(29, '68', 'Dff', 'User42@gmail.com', 'Ddfdf dfs g g', 'Complain', 'active', '2020-12-07 20:37:55', '2020-12-07 20:37:55'),
(30, '68', 'Dfsdf', 'Dsfsdf@gmai.com', 'Dfsdf s dfsdf', 'Complain', 'active', '2020-12-07 20:38:38', '2020-12-07 20:38:38'),
(31, '68', 'Dfsfs', 'Dfsfsdf@gmail.com', 'Fgdfg fgdfg', 'Complain', 'active', '2020-12-07 20:38:53', '2020-12-07 20:38:53'),
(32, '29', 'Dfsdf dfs sdfsdf', 'Dda@gmail.com', 'Sdsdaddad', 'Complain', 'active', '2020-12-08 09:41:59', '2020-12-08 09:41:59'),
(33, '34', 'Sagar', 'Sagar.iqlance@gmail.com', 'Safgghh', 'Complain', 'active', '2020-12-09 12:17:56', '2020-12-09 12:17:56'),
(34, '34', 'Sa', 'Qa@gmail.com', 'Adfhjj', 'GeneralInquiry', 'active', '2020-12-09 12:18:37', '2020-12-09 12:18:37'),
(35, '89', 'Sagar', 'Sagar.iqlance@gmail.com', 'Sag', 'Complain', 'active', '2020-12-09 12:19:33', '2020-12-09 12:19:33'),
(36, '89', 'Sagar', 'Sah@gmail.com', 'Sagan', 'Complain', 'active', '2020-12-09 16:02:50', '2020-12-09 16:02:50'),
(37, '89', 'SagVb', 'Graf@grr.on', 'Huff\nGhh\n\nGgg\nHhh\nHhh\nHhh\nGggh\nGgg\nGgghh\nHhhh\nHhh\nGggh\nHhhh', 'GeneralInquiry', 'active', '2020-12-09 16:05:33', '2020-12-09 16:05:33'),
(38, '93', 'Bb', 'B@b.com', 'B467', 'Complain', 'active', '2020-12-09 21:00:52', '2020-12-09 21:00:52'),
(39, '93', 'G', 'V@f.com', 'Vhj', 'GeneralInquiry', 'active', '2020-12-09 21:01:10', '2020-12-09 21:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(1900) NOT NULL DEFAULT '''''',
  `country_code` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `country_code2` varchar(250) NOT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `address` varchar(1200) NOT NULL,
  `street` varchar(250) NOT NULL,
  `apartment` varchar(250) NOT NULL,
  `office` varchar(250) NOT NULL DEFAULT '''''',
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `address_latitude` varchar(250) NOT NULL,
  `address_longitude` varchar(250) NOT NULL,
  `facebook_link` varchar(250) NOT NULL,
  `instagram_link` varchar(250) NOT NULL,
  `twitter_link` varchar(250) NOT NULL,
  `dribble_link` varchar(250) NOT NULL,
  `working_days` varchar(250) NOT NULL,
  `start_day` varchar(250) NOT NULL,
  `end_day` varchar(250) NOT NULL,
  `closed_day` varchar(250) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `services` varchar(250) NOT NULL,
  `offerable` bit(1) NOT NULL DEFAULT b'0' COMMENT '1-offerred, 0-not',
  `logo` varchar(1200) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `description`, `country_code`, `phone_number`, `country_code2`, `mobile_number`, `address`, `street`, `apartment`, `office`, `city`, `state`, `country`, `address_latitude`, `address_longitude`, `facebook_link`, `instagram_link`, `twitter_link`, `dribble_link`, `working_days`, `start_day`, `end_day`, `closed_day`, `start_time`, `end_time`, `services`, `offerable`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Royal Victoria Hospital', 'The Royal Victoria Hospital', '+91', '98888888', '+98', '98888888', 'Bahrain', 'Abu Gazalah', '1', '\'\'', 'Manama', 'Al-Manamah', 'Bahrain', '25.930414', '50.637772', '', '', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:00', '16:05:00', '', b'1', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'active', '2020-11-30 10:55:25', '2020-12-08 15:06:51'),
(2, 'Toronto General Hospital', 'Toronto General Hospital', '+91', '98888888', '+98', '98888888', ' Bahrain', '3457 Fallon Drive', '1', '\'\'', 'Riffa', 'Al-Manāmah', ' Bahrain', '25.930414', '50.637772', 'https://www.facebook.com/', 'https://www.instagram.com/mdc.bh/?hl=en', 'https://twitter.com/explore', 'https://www.iqlance.com/', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:18', '16:05:33', '1,2,3,4,5', b'1', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'active', '2020-11-30 10:55:25', '2020-11-30 10:55:25'),
(3, 'Montreal General Hospital', 'Montreal General Hospital', '+91', '98888888', '+98', '98888888', ' Bahrain', '3457 Fallon Drive', '1', '\'\'', 'Hamad Town', 'Al-Manāmah', ' Bahrain', '25.930414', '50.637772', 'https://www.facebook.com/', 'https://www.instagram.com/mdc.bh/?hl=en', 'https://twitter.com/explore', 'https://www.iqlance.com/', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:18', '16:05:33', '1,2,3,4,5', b'0', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'active', '2020-11-30 10:55:25', '2020-11-30 10:55:25'),
(4, 'Vancouver General Hospital', 'Vancouver General Hospital', '+91', '98888888', '+98', '98888888', ' Bahrain', '3457 Fallon Drive', '1', '\'\'', 'Issa Town', 'Al-Manāmah', ' Bahrain', '25.930414', '50.637772', 'https://www.facebook.com/', 'https://www.instagram.com/mdc.bh/?hl=en', 'https://twitter.com/explore', 'https://www.iqlance.com/', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:18', '16:05:33', '1,2,3,4,5', b'0', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'active', '2020-11-30 10:55:25', '2020-11-30 10:55:25'),
(5, 'Centre for Addiction and Mental Health', 'Centre for Addiction and Mental Health', '+91', '98888888', '+98', '98888888', ' Bahrain', '3457 Fallon Drive', '1', '\'\'', 'Muharraq', 'Al-Manāmah', ' Bahrain', '25.930414', '50.637772', 'https://www.facebook.com/', 'https://www.instagram.com/mdc.bh/?hl=en', 'https://twitter.com/explore', 'https://www.iqlance.com/', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:18', '16:05:33', '1,2,3,4,5', b'0', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'active', '2020-11-30 10:55:25', '2020-11-30 10:55:25'),
(6, 'Etobicoke General Hospital', 'Etobicoke General Hospital', '+91', '98888888', '+98', '98888888', ' Bahrain', '3457 Fallon Drive', '1', '\'\'', 'Zayed Town', 'Al-Manāmah', ' Bahrain', '25.930414', '50.637772', 'https://www.facebook.com/', 'https://www.instagram.com/mdc.bh/?hl=en', 'https://twitter.com/explore', 'https://www.iqlance.com/', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '09:59:18', '16:05:33', '1,2,3,4,5', b'0', 'http://webapps.iqlance-demo.com/mdc/public/images/Image-2.png', 'inactive', '2020-11-30 10:55:25', '2020-11-30 10:55:25'),
(9, 'Al-Salam Specialist', 'Al-Salam Specialist Hospital', '91', '99999999', '91', '99999999', 'Riffa, Bahrain', 'test', '1', 'test', 'test', 'test', 'test', '26.1335736', '50.5379101', '', '', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '15:47:00', '16:50:00', '', b'1', 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607343876Mask_medical.png', 'inactive', '2020-12-08 17:23:33', '2020-12-10 16:52:17'),
(10, 'Dar al Shifa Medical', 'Dar al Shifa Medical Centre', '91', '98888888', '91', '99999999', 'Hidd, Bahrain', 'Bahrain', '1', 'Bahrain', 'Bahrain', 'Bahrain', 'Bahrain', '26.2340617', '50.652032', '', '', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'Monday', 'Saturday', 'Sunday', '10:57:00', '11:57:00', '', b'1', 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607492379Mask_medical.png', 'inactive', '2020-12-09 12:30:55', '2020-12-10 16:52:11'),
(11, 'Al Dheyahfeh', 'Al Dheyahfeh Hospital', '91', '99999999', '91', '99999999', 'Manama, Bahrain', 'Manama', '1', 'Bahrain', 'Bahrain', 'A bulding', 'Bahrain', '26.2235305', '50.5875935', '', '', '', '', 'Sunday,Monday,Tuesday,Wednesday,Saturday', 'Sunday', 'Saturday', 'Thursday,Friday', '15:00:00', '16:00:00', '', b'1', 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607506411android-chrome-512x512.png', 'inactive', '2020-12-09 16:33:31', '2020-12-10 16:52:01'),
(13, 'Ibn Al-Nafees', 'Ibn Al-Nafees Hospital offers you the opportunity to request an appointment with any department or doctors of your choos', '91', '98888888', '91', '99999999', 'Al Bahrain, Al Qurayyat Arabia', 'Arabia', '1', 'Arabia', 'Arabia', 'Arabia', 'Arabia', '31.3272601', '37.3320553', '', '', '', '', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Saturday', 'Sunday', 'Saturday', 'Friday', '18:02:00', '19:02:00', '', b'1', 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607517711android-chrome-512x512.png', 'inactive', '2020-12-09 19:41:51', '2020-12-10 13:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_images`
--

CREATE TABLE `hospital_images` (
  `id` int(11) NOT NULL,
  `image` varchar(1200) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_images`
--

INSERT INTO `hospital_images` (`id`, `image`, `hospital_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 1, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(2, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 1, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(3, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 2, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(4, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 2, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(5, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 3, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(6, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 3, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(7, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 4, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(8, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 4, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(9, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 5, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(10, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 5, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(11, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 6, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(12, 'http://webapps.iqlance-demo.com/mdc/public/images/hospitals/sliderImg_cus.png', 6, 'active', '2020-11-30 13:16:52', '2020-11-30 13:16:52'),
(15, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607343876Mask_medical.png', 9, 'active', '2020-12-07 19:24:36', '2020-12-07 19:24:36'),
(17, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607491855android-chrome-512x512.png', 10, 'active', '2020-12-09 12:30:55', '2020-12-09 12:30:55'),
(18, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607499109android-chrome-512x512.png', 10, 'active', '2020-12-09 14:31:49', '2020-12-09 14:31:49'),
(19, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607499109Mask_medical.png', 10, 'active', '2020-12-09 14:31:49', '2020-12-09 14:31:49'),
(20, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607499109Mask.png', 10, 'active', '2020-12-09 14:31:49', '2020-12-09 14:31:49'),
(21, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607506411Mask_medical.png', 11, 'active', '2020-12-09 16:33:31', '2020-12-09 16:33:31'),
(24, 'https://webapps.iqlance-demo.com/mdc/public/images/hospitals/1607517711android-chrome-512x512.png', 13, 'active', '2020-12-09 19:41:51', '2020-12-09 19:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL DEFAULT '0',
  `receiver_id` int(11) NOT NULL DEFAULT '0',
  `read_status` enum('read','unread') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread',
  `notification_type` enum('None','MessageSent','RequestSent','Request') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `message`, `sender_id`, `receiver_id`, `read_status`, `notification_type`, `created_at`, `updated_at`) VALUES
(1, 'New', ' New Notification', 0, 18, 'read', 'None', '2020-09-21 09:33:47', '2020-10-23 13:31:47'),
(55, 'New', ' New Notification', 0, 18, 'read', 'None', '2020-09-21 09:33:47', '2020-10-23 13:31:47'),
(56, 'Single Card', 'Your single card request has reached us successfull', 1, 18, 'unread', 'None', '2020-12-04 17:49:00', '2020-12-04 17:49:00'),
(57, 'Family Card', 'Your family card request has reached us successfull', 1, 18, 'unread', 'None', '2020-12-04 17:50:51', '2020-12-04 17:50:51'),
(58, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 20:44:35', '2020-12-04 20:44:35'),
(59, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:10:08', '2020-12-04 21:10:08'),
(60, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:11:53', '2020-12-04 21:11:53'),
(61, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:14:31', '2020-12-04 21:14:31'),
(62, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:16:08', '2020-12-04 21:16:08'),
(63, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:20:19', '2020-12-04 21:20:19'),
(64, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:22:53', '2020-12-04 21:22:53'),
(65, 'Family Card', 'Your family card request has reached us successfull', 1, 27, 'unread', 'None', '2020-12-04 21:23:33', '2020-12-04 21:23:33'),
(66, 'Single Card', 'Your single card request has reached us successfull', 1, 31, 'unread', 'None', '2020-12-07 18:18:08', '2020-12-07 18:18:08'),
(67, 'Family Card', 'Your family card request has reached us successfull', 1, 31, 'unread', 'None', '2020-12-07 18:28:41', '2020-12-07 18:28:41'),
(68, 'Family Card', 'Your family card request has reached us successfull', 1, 31, 'unread', 'None', '2020-12-07 18:31:35', '2020-12-07 18:31:35'),
(69, 'Family Card', 'Your family card request has reached us successfull', 1, 31, 'unread', 'None', '2020-12-07 18:31:55', '2020-12-07 18:31:55'),
(70, 'Single Card', 'Your single card request has reached us successfull', 1, 18, 'unread', 'None', '2020-12-07 19:04:58', '2020-12-07 19:04:58'),
(71, 'Single Card', 'Your single card request has reached us successfull', 1, 68, 'unread', 'None', '2020-12-07 20:43:03', '2020-12-07 20:43:03'),
(72, 'Family Card', 'Your family card request has reached us successfull', 1, 68, 'unread', 'None', '2020-12-07 20:49:12', '2020-12-07 20:49:12'),
(73, 'Family Card', 'Your family card request has reached us successfull', 1, 68, 'unread', 'None', '2020-12-07 20:49:39', '2020-12-07 20:49:39'),
(74, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-08 13:52:43', '2020-12-08 13:52:43'),
(75, 'Family Card', 'Your family card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-08 13:59:59', '2020-12-08 13:59:59'),
(76, 'Family Card', 'Your family card request has reached us successfull', 1, 61, 'unread', 'None', '2020-12-08 23:39:29', '2020-12-08 23:39:29'),
(77, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:26:47', '2020-12-09 15:26:47'),
(78, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:27:48', '2020-12-09 15:27:48'),
(79, 'Family Card', 'Your family card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:37:52', '2020-12-09 15:37:52'),
(80, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:44:17', '2020-12-09 15:44:17'),
(81, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:45:06', '2020-12-09 15:45:06'),
(82, 'Family Card', 'Your family card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 15:48:01', '2020-12-09 15:48:01'),
(83, 'Family Card', 'Your family card request has reached us successfull', 1, 34, 'unread', 'None', '2020-12-09 16:32:30', '2020-12-09 16:32:30'),
(84, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 16:35:55', '2020-12-09 16:35:55'),
(85, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-09 17:12:56', '2020-12-09 17:12:56'),
(86, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-09 17:15:26', '2020-12-09 17:15:26'),
(87, 'Family Card', 'Your family card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-09 17:36:49', '2020-12-09 17:36:49'),
(88, 'Single Card', 'Your single card request has reached us successfull', 1, 45, 'unread', 'None', '2020-12-09 19:35:23', '2020-12-09 19:35:23'),
(89, 'Single Card', 'Your single card request has reached us successfull', 1, 45, 'unread', 'None', '2020-12-09 19:35:59', '2020-12-09 19:35:59'),
(90, 'Family Card', 'Your family card request has reached us successfull', 1, 45, 'unread', 'None', '2020-12-09 19:38:07', '2020-12-09 19:38:07'),
(91, 'Family Card', 'Your family card request has reached us successfull', 1, 45, 'unread', 'None', '2020-12-09 19:43:10', '2020-12-09 19:43:10'),
(92, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 19:55:58', '2020-12-09 19:55:58'),
(93, 'Family Card', 'Your family card request has reached us successfull', 1, 34, 'unread', 'None', '2020-12-09 20:14:57', '2020-12-09 20:14:57'),
(94, 'Single Card', 'Your single card request has reached us successfull', 1, 93, 'unread', 'None', '2020-12-09 21:04:39', '2020-12-09 21:04:39'),
(95, 'Single Card', 'Your single card request has reached us successfull', 1, 93, 'unread', 'None', '2020-12-09 21:04:50', '2020-12-09 21:04:50'),
(96, 'Single Card', 'Your single card request has reached us successfull', 1, 89, 'unread', 'None', '2020-12-09 21:05:49', '2020-12-09 21:05:49'),
(97, 'Single Card', 'Your single card request has reached us successfull', 1, 93, 'unread', 'None', '2020-12-09 21:05:59', '2020-12-09 21:05:59'),
(98, 'Single Card', 'Your single card request has reached us successfull', 1, 34, 'unread', 'None', '2020-12-09 21:06:50', '2020-12-09 21:06:50'),
(99, 'Family Card', 'Your family card request has reached us successfull', 1, 93, 'unread', 'None', '2020-12-09 21:07:39', '2020-12-09 21:07:39'),
(100, 'Family Card', 'Your family card request has reached us successfull', 1, 93, 'unread', 'None', '2020-12-09 21:07:45', '2020-12-09 21:07:45'),
(101, 'Family Card', 'Your family card request has reached us successfull', 1, 100, 'unread', 'None', '2020-12-10 09:59:22', '2020-12-10 09:59:22'),
(102, 'Single Card', 'Your single card request has reached us successfull', 1, 100, 'unread', 'None', '2020-12-10 10:12:20', '2020-12-10 10:12:20'),
(103, 'Family Card', 'Your family card request has reached us successfull', 1, 45, 'unread', 'None', '2020-12-10 13:10:59', '2020-12-10 13:10:59'),
(104, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:27:09', '2020-12-10 17:27:09'),
(105, 'Family Card', 'Your family card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:28:43', '2020-12-10 17:28:43'),
(106, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:30:41', '2020-12-10 17:30:41'),
(107, 'Family Card', 'Your family card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:31:32', '2020-12-10 17:31:32'),
(108, 'Single Card', 'Your single card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:33:06', '2020-12-10 17:33:06'),
(109, 'Family Card', 'Your family card request has reached us successfull', 1, 29, 'unread', 'None', '2020-12-10 17:33:37', '2020-12-10 17:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `offer_percentage` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `supplier_id` varchar(250) NOT NULL,
  `hospital_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `image`, `offer_percentage`, `status`, `supplier_id`, `hospital_id`, `created_at`, `updated_at`) VALUES
(1, 'Doctor Online', 'Doctor Online', 'http://webapps.iqlance-demo.com/mdc/public/images/offers/Mask.png', '50', 'active', '1', 1, '2020-11-10 11:50:04', '2020-11-10 11:50:04'),
(2, 'New', 'New', 'http://webapps.iqlance-demo.com/mdc/public/images/offers/Mask.png', '50', 'active', '1', 1, '2020-11-10 11:50:04', '2020-11-10 11:50:04'),
(3, 'Latest', 'Latest', 'http://webapps.iqlance-demo.com/mdc/public/images/offers/Mask.png', '50', 'active', '1', 1, '2020-11-10 11:50:04', '2020-11-10 11:50:04'),
(4, 'Flash Sale', 'Flash Sale', 'http://webapps.iqlance-demo.com/mdc/public/images/offers/Mask.png', '50', 'active', '1', 1, '2020-11-10 11:50:04', '2020-11-10 11:50:04'),
(5, 'Tripwires', 'tripwires', 'http://webapps.iqlance-demo.com/mdc/public/images/offers/Mask.png', '50', 'active', '1', 1, '2020-11-10 11:50:04', '2020-11-10 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price_before_discount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price_after_discount` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price_before_discount`, `price_after_discount`, `hospital_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Consultation', '15', '6', '1', 'active', '2020-11-30 14:01:14', '2020-11-30 14:01:14'),
(2, 'Follow-up', '5', '0', '1', 'active', '2020-11-30 14:01:41', '2020-11-30 14:01:41'),
(3, 'Pain Killer', '6', '3', '1', 'active', '2020-11-30 14:02:20', '2020-11-30 14:02:20'),
(4, 'Saline ', '5', '2', '1', 'active', '2020-11-30 14:03:04', '2020-11-30 14:03:04'),
(5, 'Pulmicort ', '5.5', '3.5', '1', 'active', '2020-11-30 14:03:56', '2020-11-30 14:03:56'),
(6, 'Consultation', '15', '6', '2', 'active', '2020-11-30 14:01:14', '2020-11-30 14:01:14'),
(7, 'Follow-up', '5', '0', '2', 'active', '2020-11-30 14:01:41', '2020-11-30 14:01:41'),
(8, 'Pain Killer', '6', '3', '2', 'active', '2020-11-30 14:02:20', '2020-11-30 14:02:20'),
(9, 'Saline ', '5', '2', '2', 'active', '2020-11-30 14:03:04', '2020-11-30 14:03:04'),
(10, 'Pulmicort ', '5.5', '3.5', '2', 'active', '2020-11-30 14:03:56', '2020-11-30 14:03:56'),
(11, 'Consultation', '15', '6', '3', 'active', '2020-11-30 14:01:14', '2020-11-30 14:01:14'),
(12, 'Follow-up', '5', '0', '3', 'active', '2020-11-30 14:01:41', '2020-11-30 14:01:41'),
(13, 'Pain Killer', '6', '3', '3', 'active', '2020-11-30 14:02:20', '2020-11-30 14:02:20'),
(14, 'Saline ', '5', '2', '3', 'active', '2020-11-30 14:03:04', '2020-11-30 14:03:04'),
(15, 'Pulmicort ', '5.5', '3.5', '3', 'active', '2020-11-30 14:03:56', '2020-11-30 14:03:56'),
(16, 'Consultation', '15', '6', '4', 'active', '2020-11-30 14:01:14', '2020-11-30 14:01:14'),
(17, 'Follow-up', '5', '0', '4', 'active', '2020-11-30 14:01:41', '2020-11-30 14:01:41'),
(18, 'Pain Killer', '6', '3', '4', 'active', '2020-11-30 14:02:20', '2020-11-30 14:02:20'),
(19, 'Saline ', '5', '2', '4', 'active', '2020-11-30 14:03:04', '2020-11-30 14:03:04'),
(20, 'Pulmicort ', '5.5', '3.5', '4', 'active', '2020-11-30 14:03:56', '2020-11-30 14:03:56'),
(21, 'Consultation', '15', '6', '5', 'active', '2020-11-30 14:01:14', '2020-11-30 14:01:14'),
(22, 'Follow-up', '5', '0', '5', 'active', '2020-11-30 14:01:41', '2020-11-30 14:01:41'),
(23, 'Pain Killer', '6', '3', '5', 'active', '2020-11-30 14:02:20', '2020-11-30 14:02:20'),
(24, 'Saline ', '5', '2', '5', 'active', '2020-11-30 14:03:04', '2020-11-30 14:03:04'),
(25, 'Pulmicort ', '5.5', '3.5', '5', 'active', '2020-11-30 14:03:56', '2020-11-30 14:03:56'),
(49, 'GENERAL SURGERY', '10000', '10000', '9', 'active', '2020-12-08 17:23:33', '2020-12-08 17:23:33'),
(50, 'COSMETIC & PLASTICS', '500', '500', '9', 'active', '2020-12-08 17:23:33', '2020-12-08 17:23:33'),
(51, 'ORTHOPEDICS & PHYSIC', '8000', '5000', '9', 'active', '2020-12-08 17:23:33', '2020-12-08 17:23:33'),
(55, 'SURGERY', '1000', '1000', '9', 'active', '2020-12-08 19:45:11', '2020-12-08 19:45:11'),
(58, 'Audiometry', '1000', '1000', '10', 'active', '2020-12-09 12:30:55', '2020-12-09 12:30:55'),
(59, 'Tympanometry', '1000', '1000', '10', 'active', '2020-12-09 12:30:55', '2020-12-09 12:30:55'),
(60, 'Brain Opration', '1000', '500', '11', 'active', '2020-12-09 16:33:31', '2020-12-09 16:33:31'),
(63, 'Psychiatric', '1000', '1000', '13', 'active', '2020-12-09 19:41:51', '2020-12-09 19:41:51'),
(64, 'Pediatric Urology', '1000', '1000', '13', 'active', '2020-12-09 19:41:51', '2020-12-09 19:41:51'),
(65, 'Rheumatology', '1000', '1000', '13', 'active', '2020-12-09 19:41:51', '2020-12-09 19:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `hospital_id` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `image`, `hospital_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alex', 'alex@gmail.com', 'http://webapps.iqlance-demo.com/mdc/public/images/suppliers/Mask_medical.png', '1', 'active', '2020-11-10 12:37:03', '2020-11-10 12:37:03'),
(2, 'Zoey', 'zoey@gmail.com', 'http://webapps.iqlance-demo.com/mdc/public/images/suppliers/Mask_medical.png', '1', 'active', '2020-11-10 12:37:03', '2020-11-10 12:37:03'),
(3, 'Rea', 'rea@gmail.com', 'http://webapps.iqlance-demo.com/mdc/public/images/suppliers/Mask_medical.png', '2', 'active', '2020-11-10 12:37:03', '2020-11-10 12:37:03'),
(4, 'Liza', 'liza@gmail.com', 'http://webapps.iqlance-demo.com/mdc/public/images/suppliers/Mask_medical.png', '2', 'active', '2020-11-10 12:37:03', '2020-11-10 12:37:03'),
(5, 'Olivia', 'olivia@gmail.com', 'http://webapps.iqlance-demo.com/mdc/public/images/suppliers/Mask_medical.png', '3', 'active', '2020-11-10 12:37:03', '2020-11-10 12:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `country_code` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `address2` varchar(1200) NOT NULL DEFAULT '''''',
  `login_type` enum('Manual','Facebook','Google','Email','Apple') NOT NULL DEFAULT 'Manual',
  `social_id` varchar(250) NOT NULL,
  `profile_image` varchar(250) NOT NULL,
  `notification_status` enum('on','Off','','') NOT NULL DEFAULT 'on',
  `remember_token` varchar(250) NOT NULL DEFAULT 'NULL',
  `gender` enum('Male','Female','Transgender','None','Other') NOT NULL DEFAULT 'None',
  `birth_date` varchar(250) NOT NULL DEFAULT '',
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `country_code`, `phone_number`, `city`, `state`, `country`, `address`, `address2`, `login_type`, `social_id`, `profile_image`, `notification_status`, `remember_token`, `gender`, `birth_date`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Admin', 'mdc.admin@gmail.com', '$2y$12$oIrkDunZD85UASo9Wum8Q.tp7QkeM3E9dvi6QE2rC4679EccqVH66', '+91', '9870013255', 'Canada', 'Canada', '', 'Canada', '', 'Manual', '', '\'\'', 'on', 'hJWdBTsnxtDUWKpVr9KgYUydqEx7w4Edt9VlzUCfz0dZxuCO8N0bb0bwJHSY', '', '', 'active', '2020-11-11 06:39:56', '2020-11-11 06:39:56'),
(18, 'iceme', 'shahin.iqlance@gmail.com', '$2y$10$YsT6yLIEjdF8hkQHcEILXufEYob6Ydsthi1gJXkteOBSPhn4qEv0a', '+91', '45689975', 'Manama', '', 'Bahrain-Al Arab', 'Manama', 'Bahrain', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607081448-image.png', 'Off', 'NULL', 'Female', '1987-11-13', 'inactive', '2020-11-11 13:46:33', '2020-12-09 17:56:59'),
(19, 'iqlance', 'shahin.iqlance+01@gmail.com', '$2y$10$wGGAJlPgpcxo6SFHFzH81.utJ0umTwC4HQuL6mgMsffETs8uPLo4O', '', '9870013255', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', '', '', 'active', '2020-11-11 14:56:49', '2020-11-11 14:56:49'),
(20, 'iqlance', 'shahin.iqlance+001@gmail.com', '$2y$10$D.FsbF7T.4k0taBPsvTBjuUB/qxQT.HZaDXm95/qwkLPavftB0fXq', '', '9870013255', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', '', '', 'active', '2020-11-11 14:56:58', '2020-11-11 14:56:58'),
(22, 'iqlance', 'mahammad1.iqlance@gmail.com', '$2y$10$14Hl87nyctVKnebjUw0rt.UpCBQZBcdugK1ueTfSky9sS3QjwZasq', '', '9898172247', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', '', '', 'active', '2020-11-24 19:19:40', '2020-11-24 19:19:40'),
(24, 'Mahammad ikbal', 'mahammadnew2@gmail.com', '', '+1268', '43434343', 'Rwrwer', '', 'Antigua and Barbuda', 'Rewrwer', 'Ewrwrwer', 'Google', '107631347223870903131', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522771-image.png', 'on', 'NULL', 'Female', '2020-09-12', 'active', '2020-11-25 13:34:31', '2020-12-09 21:09:53'),
(25, 'User3', 'User3@grr.la', '$2y$10$O4AMHrVWhmBdqhIwPzKJHOUKkECAykFZhL11gPeKfM.H.QWkCeXRe', '', '87878787', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-25 13:53:02', '2020-11-25 13:53:02'),
(26, 'User4', 'User4@grr.la', '$2y$10$vWljPck.7x83Pgaj6Q8dT./k6r3KJpqwRhUYtwmIviSix9qFtClgy', '', '78789876', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-25 14:02:31', '2020-11-25 14:02:31'),
(27, 'Bhavik Darji', 'apple.iqlance@gmail.com', '', '+374', '45689975', 'Gujarat', '', 'Armenia', 'Grease', 'Grres', 'Facebook', '186554879739253', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607084374-image.png', 'on', 'NULL', 'Male', '2020-11-04', 'active', '2020-11-25 18:57:08', '2020-12-04 19:19:34'),
(28, 'User10', 'user10@grr.la', '$2y$10$338WLDhr8bNJTl44qttPbO7I1tld5gxWlW8GuMciJ./l9e47fmrzi', '', '98981722', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-26 13:09:00', '2020-11-26 13:11:14'),
(29, 'User41', 'User41@gmail.com', '$2y$10$nOxeJX3z9gM6QAdPxGigv.YeYeG8cLK0SDiTecVP8eSkERjcDB3di', '+672', '89563214', 'Palanpur', '', 'Antarctica', 'Gujarat', 'Gujarat2', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607514038-image.png', 'on', 'NULL', 'Female', '1986-05-05', 'active', '2020-11-26 14:27:52', '2020-12-09 20:40:07'),
(30, 'Sagar25', 'Sagar25@grr.la', '$2y$10$SUHV1pNddQXiwGG8Sw7mSe2LH01kM7C/BLzZz37OcfQ7BHXiflrOW', '', '96385207', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-26 18:36:58', '2020-11-26 18:36:58'),
(32, 'Sagar Modi', 'modisagar29@gmail.com', '', '', '', '', '', '', '', '', 'Google', '113578195866231627978', '', 'on', 'NULL', '', '', 'active', '2020-11-27 11:12:42', '2020-11-27 11:12:42'),
(33, 'Krishna Patel', 'krishna.g.zaksyvision@gmail.com', '', '+54', '96321475', 'Rajkt', '', 'Argentina', 'Bbb', 'Ebbnn', 'Facebook', '824898048333644', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607505766-image.png', 'on', 'NULL', 'Female', '2020-09-12', 'active', '2020-11-27 12:30:32', '2020-12-09 16:22:46'),
(34, 'sagar qa', 'sagarmodi008@gmail.com', '', '+1268', '96321454', 'Surat', '', 'Antigua and Barbuda', '987577', '644245', 'Google', '117193702046431680112', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607518872-image.png', 'on', 'NULL', 'Male', '1995-01-01', 'active', '2020-11-27 12:38:40', '2020-12-09 20:01:12'),
(35, 'iqlance', 'shahin.iqlance+081@gmail.com', '$2y$10$AmZJ7/CRD7mwpgSqxlrXj.9tDWBfuOv8K9kstbEVB40p67VKn2w16', '', '9870013255', '', '', '', '', '', 'Apple', '88888889', '', 'on', 'NULL', '', '', 'active', '2020-11-27 13:09:25', '2020-11-27 13:09:25'),
(36, 'Naresh', 'naresh.iqlance@gmail.com', '', '', '', '', '', '', '', '', 'Apple', '001671.1a06b8ba97e54d9d92f881365d7ad857.1002', '', 'on', 'NULL', '', '', 'active', '2020-11-27 13:10:58', '2020-11-27 13:10:58'),
(37, 'Mahammad Nedariya', 'mahammadnew1@gmail.com', '', '+244', '45345345', 'Palanpur', '', 'Angola', 'Gujarat', 'Gujarat', 'Google', '104343411985514272243', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607522419-image.png', 'on', 'NULL', 'Female', '2020-08-12', 'active', '2020-11-27 13:23:28', '2020-12-09 21:13:42'),
(38, 'Mahammad Nedariya', 'mahammadnew11@gmail.com', '', '', '', '', '', '', '', '', 'Google', '112868461973306355228', '', 'on', 'NULL', '', '', 'active', '2020-11-27 16:00:01', '2020-11-27 16:00:01'),
(39, 'Sagar Modi', 'modisagar1611@gmail.com', '', '', '', '', '', '', '', '', 'Google', '113591043936706872247', '', 'on', 'NULL', '', '', 'active', '2020-11-27 18:42:23', '2020-11-27 18:42:23'),
(40, 'Qa', 'Sagar90@grr.la', '$2y$10$eoC8DKl6rtvu4vS7A.uVJO2M/BBlHsDH3a7t1SEQqxtE1qEOTstcu', '', '98765432', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-27 18:49:10', '2020-12-09 13:39:15'),
(41, 'Test', 'Sagar56@grr.la', '$2y$10$fDmVleDoIQf0i7ZdlNeCnewaBWf1iecqmgfAVYqDdF0iTghSCI6jG', '', '96325807', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-27 18:49:58', '2020-11-27 18:55:50'),
(42, 'Bhavik', 'Bhavik.iqlance@gmail.com', '$2y$10$7JBMmi9TPDCa2rc0u/MiF..mUEtgYXnJ4SMXk8XXwAoBBogVREUNS', '', '98745632', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-27 19:25:18', '2020-11-27 19:25:18'),
(43, 'Mustafa Hashim', 'mustafa.alhlewa@gmail.com', '', '', '', '', '', '', '', '', 'Google', '111705378370012453739', '', 'on', 'NULL', '', '', 'active', '2020-11-28 02:25:34', '2020-11-28 02:25:34'),
(44, 'Test', 'famel95215@btsese.com', '$2y$10$qhYieKYuH3Bpx8SNsTMiH.shioZpur5v4fOKFHSDO2BvKe6cTP6Pa', '', '33333333', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-29 16:10:59', '2020-11-29 16:41:13'),
(45, 'Masooma SpaceTap', 'masoomaspacetap@gmail.com', '', '', '', '', '', '', '', '', 'Google', '110665177786022101769', '', 'on', 'NULL', '', '', 'active', '2020-11-29 16:25:28', '2020-11-29 16:25:28'),
(46, 'Test', 'Hadeel713@btcproductkey.com', '$2y$10$lU7nTNdjoDDQpsA5jV6bG.3Vz8ox75WOJac6Ri025zUgfL7Lhbd.q', '', '33333333', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', '', '', 'active', '2020-11-29 17:26:40', '2020-11-29 17:29:49'),
(47, 'iqlance', 'shahin.iqlance+0021@gmail.com', '$2y$10$eOpezGB.OuJY933W1u0c/Oq9Bwn6PI4pHdG2O4EvuR3iyAv1/uPOW', '', '9870013255', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', 'None', '', 'active', '2020-11-30 19:06:34', '2020-11-30 19:06:34'),
(48, 'Testing', 'Tejas.iqlance@gmail.com', '$2y$10$GsQmoq/OrvheSYFhYYZs2ew4ItpFco4s4Xl2du1gJeVEb8FKraDbG', '', '00000000', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-11-30 21:34:36', '2020-11-30 21:34:36'),
(49, 'Te', 'Testing@test.con', '$2y$10$E168ZoCUjDlwL7/Bv83yhewrW4ZNQtuILSKJosUYsRJsAfyl2f9dm', '', '00000000', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-11-30 21:36:45', '2020-11-30 21:36:45'),
(50, 'Test', 'Test@testing.com', '$2y$10$xi52kV8PzO7Tz87Fa.6rtOo7sN9ReqjVK3lKL6M5D2jdwqtvKnfBe', '', '00000000', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-11-30 21:43:45', '2020-11-30 21:43:45'),
(51, 'tejas', 'macwan.tea@hotmail.com', '', '', '', '', '', '', '', '', 'Apple', '001312.5ac1a6cc286f4f528dc719a3333e238b.1456', '', 'on', 'NULL', 'None', '', 'active', '2020-11-30 21:57:00', '2020-11-30 21:57:00'),
(52, 'Test', 'Testing@test.com', '$2y$10$ZFxSpqhzsJCs3axAeKF2ae9qaXza1py3T21c3ftUdPMgFMByhhnWu', '', '00000000', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-01 12:07:40', '2020-12-01 12:07:40'),
(53, 'Testopp', 'Testpo@gmail.com', '$2y$10$5Wmk9bDsE9HxcXGlQwF4Ae5iy.MFOPyMWxilwmbbF8G0qrLG4u9B.', '', '00000000', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-01 12:09:24', '2020-12-01 12:09:24'),
(54, 'iqlance', 'shahin.iqlance+0031@gmail.com', '$2y$10$mocvH77lVhAxKgm0tRemWuF06RM9NW/toku.F.4gMYtiMFLSLHL8K', '', '9870013255', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', 'None', '', 'active', '2020-12-01 14:09:55', '2020-12-01 14:09:55'),
(55, 'iqlance', 'shahin.iqlance+0033@gmail.com', '$2y$10$Mhh1lSqSTT/RvPJ1QjyNLexXEd8zycS3xkvm5/k.cdc0gphkdiFIC', '', '98700132555', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', 'None', '', 'active', '2020-12-01 14:18:24', '2020-12-01 14:18:24'),
(56, 'Sagarmohdj', 'Sagar45@grr.la', '$2y$10$FUkAtkEHAWWWk0XrLgb/o.1QKulAAkQ3xxoif/tRCvcU5gwG1uN5a', '', '99669996', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-01 20:44:41', '2020-12-01 20:44:41'),
(57, 'Nana Yuki', 'sadness_n@hotmail.com', '', '', '', '', '', '', '', '', 'Facebook', '1020931701720423', '', 'on', 'NULL', 'None', '', 'active', '2020-12-02 15:51:18', '2020-12-02 15:51:18'),
(58, 'iqlance', 'shahin.iqlance+00334@gmail.com', '$2y$10$qu0iFFxirggo7LFbTh6A6u/S7uofS0cBayXmxL.1KgfZmxZjXMQje', '', '9870313255', '', '', '', '', '', 'Facebook', '8888888', '', 'on', 'NULL', 'None', '', 'active', '2020-12-03 13:05:28', '2020-12-03 13:05:28'),
(59, 'Sagar', 'Sagar008@gmail.com', '$2y$10$TwprS7uqyxyoc.b4/os3WeS9IxqKEPHoyMQe5EPgfzF1.GclrHh6a', '', '96325874', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-03 19:30:00', '2020-12-03 19:30:00'),
(60, 'MahammadNedariya', 'Mahammad@gmail.com', '$2y$10$Qdj//NDysUnUOimHBYZBleQ6ipECx1.lmePLB16s1ocFex3ntXZPe', '+93', '98989898', 'Gandhinagar', '', 'Afghanistan', 'Gujarat', 'Gujarat', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607083121-image.png', 'on', 'NULL', 'Female', '2020-04-12', 'active', '2020-12-04 18:39:26', '2020-12-04 18:58:41'),
(61, 'shahin juneja', 'iceme.shahin@gmail.com', '', '+93', '98700132', 'Test', '', 'Afghanistan', 'Test', 'Test', 'Google', '113253230299722562989', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607082316-image.png', 'on', 'NULL', 'Female', '1970-01-01', 'active', '2020-12-04 18:42:31', '2020-12-04 18:45:16'),
(62, 'Dsd', 'Dsdsd@gmail.com', '$2y$10$q1WKH1ofUga1Fd1Uk83YaeXdccv2GRMoqOkQ872SZbXWgGGHMgKJy', '', '56666666', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-04 18:42:57', '2020-12-04 18:42:57'),
(63, 'Dsd', 'Dsdsdddd@gmail.com', '$2y$10$3o/OWvEi6mYPTYV4xsXrC.G2Dxph14ZeEguQAHsarJ0.xTfLk5NTe', '', '56666335', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-04 18:43:18', '2020-12-04 18:43:18'),
(64, 'Juneja Shahin', 'junejashahin.stegowl@gmail.com', '', '+355', '98888888', 'Test', '', 'Albania', 'Test', 'Test', 'Google', '104505054049805989891', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607083634-image.png', 'on', 'NULL', 'Female', '1970-01-01', 'active', '2020-12-04 19:01:46', '2020-12-04 19:07:14'),
(65, 'Test', 'Yixiki4631@hebgsw.com', '$2y$10$GbQ1VCRuyg2ITkv/jyCTxOhmLyZDAb7jY3u2TAWRqF58xKNdjDCIi', '', '44444444', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-07 12:48:27', '2020-12-09 20:13:52'),
(66, 'Qa', 'Sagar85@grr.la', '$2y$10$vXY7wTHnFyMfs320kKbErOI5vi/lPrNyASYLuD5CTY3jue216eVVi', '', '98523971', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-07 13:36:05', '2020-12-07 13:36:05'),
(67, 'iqlance', 'prathmesh@gmail.com', '$2y$10$Z6N7pa95tQm.2odiBqgo.eppxI/vLRW4vMSHiUFZVJMYCjmEJOujS', '', '34343434343', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-07 18:58:32', '2020-12-07 18:58:32'),
(68, 'Jdhjdd', 'User42@gmail.com', '$2y$10$NJJdeBoFbagYTO.0gyWFAOT.JIQKUcy9PUl/PcXGoNLIz8aNY78d2', '', '32423423', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-07 20:27:43', '2020-12-07 20:27:43'),
(69, 'User  New', 'Usernew1@gmail.com', '$2y$10$xfCg39gCxBuNrmxE7gaMVeat539PMTTJy8ycFJN.4WRO.tlhWnEfO', '+358', '44545440', 'Mumbai', '', 'Aland Islands', 'Route1', 'Route2', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607360573-image.png', 'on', 'NULL', 'Female', '2020-12-07', 'active', '2020-12-07 22:40:40', '2020-12-09 19:27:10'),
(70, 'iqlance', 'shahin.iqlance+06@gmail.com', '$2y$10$ALnEkeIzYeB0P6nGGGmViu33uIf0esc/otiDqdUFuPXyEePKdiY0y', '', '98703132557', '', '', '', '', '', 'Facebook', '88888889', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 13:55:51', '2020-12-08 13:55:51'),
(71, 'iqlance', 'shahin.iqlance+044@gmail.com', '$2y$10$jjLvJVeM9QNN1umK5BKC0upvJ77veBWlFvmqCMaN82JXhgtNNRxvK', '', '9870313254', '', '', '', '', '', 'Facebook', '8888888977', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 14:07:23', '2020-12-08 14:07:23'),
(72, 'Mahammad Nadariya', 'mahammad.iqlance@gmail.com', '', '+672', '34333333', 'Paris', '', 'Antarctica', 'France', 'France', 'Google', '114113601028774694178', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607513742-image.png', 'on', 'NULL', 'Transgender', '2020-05-07', 'active', '2020-12-08 14:20:34', '2020-12-09 20:47:46'),
(73, 'Mahammad', 'Mahammad111@gmail.com', '$2y$10$eQM6p15aQQp9Ro9Fu/YNUelAn3oSd2eb7w55NXLyEVDbh81ZxLokC', '', '44433333', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 15:39:02', '2020-12-08 15:39:02'),
(74, 'User', 'user@grr.la', '$2y$10$BG9ZEd92PWuIeftG8chseeZm2SDPABnJnciJBw9ibsof2cEdPGfUm', '+376', '33333223', 'Palanpur', '', 'Andorra', 'W33323432', '234err34r43', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607422960-image.png', 'on', 'NULL', 'Male', '2020-08-12', 'active', '2020-12-08 17:19:35', '2020-12-08 17:22:40'),
(75, 'Luck', 'Luck98@grr.la', '$2y$10$g9yC1/ITJihoEtRy6mIx4uGs0DRUwJBXneb/K548hrD3UhxbODLa6', '', '96321475', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 20:08:56', '2020-12-08 20:08:56'),
(79, 'Userr', 'Mahammad123@gmail.com', '$2y$10$t2MMlScR.W.Wycab6brm9OaBEAp9KF/7cvjAzQvNFdGGbYz1.Wfw2', '', '44444445', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 20:39:05', '2020-12-08 20:39:05'),
(80, 'Fdsfsf', 'Fdsfsf@gmail.com', '$2y$10$WcLxe7V4QcrZ3l/YDXvoBuj9YeMdOLwNAxm2Ruv0MDFVMzoba06vG', '', '56987534', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 20:41:23', '2020-12-08 20:41:23'),
(81, 'iqlance', 'shahin.iqlance+04334@gmail.com', '$2y$10$uwc2kCqHZlMfj/W4/kMiZ.ftUJ7Stx/SpSlM2OFOJKkRhYr5ssTHm', '', '987031325544', '', '', '', '', '', 'Facebook', '888888811', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 20:42:36', '2020-12-08 20:42:36'),
(82, 'iqlance', 'shahin.iqlance+043334@gmail.com', '$2y$10$8mB8BiQv..x/Fj1aqFCL6.rF2ssdroBY.j4F4UIrBfQVwK2.UtSZ6', '', '9870313255441', '', '', '', '', '', 'Facebook', '8888888113', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 20:45:11', '2020-12-08 20:45:11'),
(85, 'sdfsdf', 'sdfsdfsdf@gmail.com', '$2y$10$HDFfu.RuGpArn2HGEBh/4.PhBTbNAutjkrc9vQ9M.7uuFv3wRAX2G', '', '34434335', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 21:06:12', '2020-12-08 21:06:12'),
(87, 'Ndjdj', 'Bsjdjs@gmail.com', '$2y$10$QnNi42cJeF.u/RmQLuCX..DBAeNY2PcOKzo7Cs7ywCfurJ6YFCIC6', '', '32983298', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 21:12:00', '2020-12-08 21:12:00'),
(89, 'Sagar modi', 'Sagar.iqlance@gmail.com', '$2y$10$oTiXs/zzrO3sST4zNjJszOrDR6HysQ86aaYZCUyAgBamicouHCPem', '+672', '96325187', 'Bharuch', '', 'Antarctica', '123456', '4567821', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607518689-image.png', 'on', 'NULL', 'Transgender', '2000-12-09', 'active', '2020-12-08 21:30:27', '2020-12-09 19:58:09'),
(90, 'Bsji', 'Sagar@a.com', '$2y$10$rNBS3ldecIqsQrMM0jH6lelt0ZqLVnC6fxVxXaagfuOFDCtd.Qas6', '', '66559988', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-08 21:32:29', '2020-12-08 21:32:29'),
(91, 'Userrr', 'User15@gmail.com', '$2y$10$WitK9yrUxinfID/1QRaT8eyl109.LHbgIWf63VrDjUi86KuAJkC7S', '+244', '56238764', 'Gujarat', '', 'Angola', 'India', 'USA', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607517731-image.png', 'on', 'NULL', 'Male', '2020-08-12', 'active', '2020-12-09 19:38:31', '2020-12-09 19:42:11'),
(92, 'Yixiki', 'Jad85@xhanimatedm.com', '$2y$10$bfX/SYdoRrg.Jve/L9tDbuwjgUK4Ka34qNnI6A3l2lNmhTDhSaEtW', '', '55555555', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-09 20:00:08', '2020-12-09 20:00:08'),
(93, 'Bhavik Darji', 'bhavik12style@gmail.com', '', '', '', '', '', '', '', '', 'Google', '103167189675629939836', '', 'on', 'NULL', 'None', '', 'active', '2020-12-09 20:43:04', '2020-12-09 20:43:04'),
(94, 'Userrrrr', 'User51@gmail.com', '$2y$10$eL9yIdGDqvJszUprT4duleFxpn9IApj2eopLEjVhYViTuftBCOevq', '+1268', '34343434', 'Dfdsf', '', 'Antigua and Barbuda', 'Sdfdsf', 'Sfdfsdf', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607523867-image.png', 'on', 'NULL', 'Male', '2020-09-12', 'active', '2020-12-09 21:17:57', '2020-12-09 21:24:27'),
(95, 'Userrrr', 'User52@gmail.com', '$2y$10$59daKYW1WzRk8R8Yr5BdseXdZePfSLXqiov7IKF0GkgVHEI7M4ZqW', '+1264', '65986498', 'hdhdd', '', 'Anguilla', 'Ndjdbdnd', 'Bdhdndnd', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607524577-image.png', 'on', 'NULL', 'Male', '2011-08-12', 'active', '2020-12-09 21:34:16', '2020-12-09 23:15:19'),
(96, 'Mahammad Nedariya', 'nedariyami@gmail.com', '', '+672', '64646875', 'Gstsgsvsv', '', 'Antarctica', 'Ggsghshs', 'Bshshshsh', 'Google', '116009926433171560744', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607524789-image.png', 'on', 'NULL', 'Male', '2020-12-09', 'active', '2020-12-09 21:37:07', '2020-12-09 23:08:10'),
(97, 'User', 'User53@gmail.com', '$2y$10$XLsuf.cm0rf9Nt5xPpCRquk32zUzXZ4FsD5CwxOomjsMsNYHb.gZa', '+374', '34355554', 'Cvv', '', 'Armenia', 'Cvxv', 'Xcvcv', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607529914-image.png', 'on', 'NULL', 'Male', '2019-09-12', 'active', '2020-12-09 23:03:26', '2020-12-09 23:07:05'),
(98, 'Userhdhd', 'User55@gmail.com', '$2y$10$NPfey/aZVVxbaeRWM7bjnOu9kYU.D1PJbzG0ePWstvWDDmBzCwOfK', '+54', '31986184', 'Hxjdfjf', '', 'Argentina', 'Jdjffnf', 'Bfnff', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607530490-image.png', 'on', 'NULL', 'Male', '2020-09-12', 'active', '2020-12-09 23:13:21', '2020-12-09 23:14:50'),
(99, 'Ddd', 'User56@gmail.com', '$2y$10$XHLCbfCVYUGhXpZl.JtYGej8QxnE8wknwgqM9d7S.i6u1jngX/I/y', '+672', '45687689', 'Ffgdfg', '', 'Antarctica', 'Fgdfgdfgfgd', 'Dfgdfgdfg', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607530636-image.png', 'on', 'NULL', 'Male', '2020-12-11', 'active', '2020-12-09 23:15:58', '2020-12-09 23:17:42'),
(100, 'Udfnsf', 'User57@gmail.com', '$2y$10$wtJjdR.8jkVYjkpM7OFbRO919RrZMMdFCNi7/6ed4bISr8GLcGtEu', '+244', '34543645', 'Vxcvf', '', 'Angola', 'Fgdfgdf', 'Ghfghfgh', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607530769-image.png', 'on', 'NULL', 'Male', '2011-10-25', 'active', '2020-12-09 23:18:21', '2020-12-10 10:26:32'),
(101, 'Usernf', 'User58@gmail.com', '$2y$10$kUUoacqNb5BhijPRXLLy4uPSIYAZ3ARR1GrLjjdmfhrqtSINa67fm', '+376', '98315616', 'Ndkkd', '', 'Andorra', 'Mdkdkx', 'Ndkdkd', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607531084-image.png', 'on', 'NULL', 'Female', '2020-09-12', 'active', '2020-12-09 23:20:48', '2020-12-09 23:25:00'),
(102, 'Usbdj', 'User59@gmail.com', '$2y$10$0k5ZgiXlw2S9zzhFISYGjuziId0lq0eMfNkFahWFO4MN/UdGoL4x2', '+1264', '94945327', 'Fjfjf', '', 'Anguilla', 'Nccncn', 'jcjcc', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607531291-image.png', 'on', 'NULL', 'Female', '2020-10-06', 'active', '2020-12-09 23:25:47', '2020-12-09 23:28:40'),
(103, 'Test', 'Katrena75@xhanimatedm.com', '$2y$10$t/D2gYg7y.M5uLwMBLuJgOgWa91et.pVnKrbor1X4SmMtlOr8GSGq', '', '12345678', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 13:46:03', '2020-12-10 13:46:03'),
(104, 'Test', 'Tameem45@xhanimatedm.com', '$2y$10$A1Um.KL5WHXMx4v/P16Fm.PK7bID1tnEC0C4rQ3X1BQX.2Ggyk9SC', '', '78945612', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 13:49:10', '2020-12-10 13:49:10'),
(105, 'Test', 'Jegnaveyde@nedoz.com', '$2y$10$VCfDvFwFCYIkiYawsJS0W.xfmUBhmWaoR4l2.yO8vtQfYG9V..HeG', '', '78912346', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 13:51:33', '2020-12-10 13:51:33'),
(106, 'Test', 'Ilene48@xhanimatedm.com', '$2y$10$Qc.h6c78YixTytc7RYcJGuG.HoYvWY0fNJUiEzkkxUjFn0nP92Ih6', '', '07894563', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 13:58:23', '2020-12-10 13:58:23'),
(107, 'Test', 'Um5zlmaksv@montokop.pw', '$2y$10$cexYEhlF8jIzKh6rHoNgXud2iu423UmX4FGUriHh8VlM5C0NzhhYO', '', '07412589', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 14:06:49', '2020-12-10 14:07:54'),
(108, 'Fdsf', 'User61@gmail.com', '$2y$10$41edzvS5ed5LBL6dmHj2wety6Q.DPQanBU5moTVVffwlpVGeycyvi', '+1684', '44353453', 'Ffdgdfg', '', 'AmericanSamoa', 'Fdgdfgdfg', 'Fgdgdfg', 'Manual', '', 'https://webapps.iqlance-demo.com/mdc/storage/app/public/1607598379-image.png', 'on', 'NULL', 'Male', '2020-12-10', 'active', '2020-12-10 18:03:49', '2020-12-10 18:06:19'),
(109, 'Uui', 'Fdfd@gmail.com', '$2y$10$PGDRuHgm5t/8yS9ZIt0DeOZaJXNNNlt8Jrd3VgR0MmEPliP3KkaTK', '', '24353453', '', '', '', '', '', 'Manual', '', '', 'on', 'NULL', 'None', '', 'active', '2020-12-10 18:09:17', '2020-12-10 18:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_images`
--
ALTER TABLE `hospital_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hospital_images`
--
ALTER TABLE `hospital_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
