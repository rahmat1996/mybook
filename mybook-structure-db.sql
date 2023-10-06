-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 02:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(8) UNSIGNED NOT NULL,
  `author_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(8) UNSIGNED NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `book_year` varchar(4) NOT NULL,
  `book_description` text NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_thumb_image` varchar(100) NOT NULL,
  `book_file` varchar(100) NOT NULL,
  `book_language` varchar(2) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(8) UNSIGNED NOT NULL,
  `author_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `book_id` int(8) UNSIGNED NOT NULL,
  `category_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(3) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('000', 'Computer Science, Information, and General\n			Works'),
('100', 'Philosophy and Psychology'),
('200', 'Religion'),
('300', 'Social Sciences'),
('400', 'Language'),
('500', 'Science'),
('600', 'Technology'),
('700', 'Arts and Recreation'),
('800', 'Literature'),
('900', 'History and Geography');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `lang_id` varchar(2) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `is_used` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`, `is_used`) VALUES
('aa', 'Afar', 1),
('ab', 'Abkhazian', 1),
('ae', 'Avestan', 1),
('af', 'Afrikaans', 1),
('ak', 'Akan', 1),
('am', 'Amharic', 1),
('an', 'Aragonese', 1),
('ar', 'Arabic', 1),
('as', 'Assamese', 1),
('av', 'Avaric', 1),
('ay', 'Aymara', 1),
('az', 'Azerbaijani', 1),
('ba', 'Bashkir', 1),
('be', 'Belarusian', 1),
('bg', 'Bulgarian', 1),
('bh', 'Bihari languages', 1),
('bi', 'Bislama', 1),
('bm', 'Bambara', 1),
('bn', 'Bengali', 1),
('bo', 'Tibetan', 1),
('br', 'Breton', 1),
('bs', 'Bosnian', 1),
('ca', 'Catalan, Vallang_idian', 1),
('ce', 'Chechen', 1),
('ch', 'Chamorro', 1),
('co', 'Corsican', 1),
('cr', 'Cree', 1),
('cs', 'Czech', 1),
('cu', 'Church Slavonic, Old Bulgarian, Old Church Slavonic', 1),
('cv', 'Chuvash', 1),
('cy', 'Welsh', 1),
('da', 'Danish', 1),
('de', 'German', 1),
('dv', 'Divehi, Dhivehi, Maldivian', 1),
('dz', 'Dzongkha', 1),
('ee', 'Ewe', 1),
('el', 'Greek (Modern)', 1),
('en', 'English', 1),
('eo', 'Esperanto', 1),
('es', 'Spanish, Castilian', 1),
('et', 'Estonian', 1),
('eu', 'Basque', 1),
('fa', 'Persian', 1),
('ff', 'Fulah', 1),
('fi', 'Finnish', 1),
('fj', 'Fijian', 1),
('fo', 'Faroese', 1),
('fr', 'Frlang_idh', 1),
('fy', 'Western Frisian', 1),
('ga', 'Irish', 1),
('gd', 'Gaelic, Scottish Gaelic', 1),
('gl', 'Galician', 1),
('gn', 'Guarani', 1),
('gu', 'Gujarati', 1),
('gv', 'Manx', 1),
('ha', 'Hausa', 1),
('he', 'Hebrew', 1),
('hi', 'Hindi', 1),
('ho', 'Hiri Motu', 1),
('hr', 'Croatian', 1),
('ht', 'Haitian, Haitian Creole', 1),
('hu', 'Hungarian', 1),
('hy', 'Armenian', 1),
('hz', 'Herero', 1),
('ia', 'Interlingua (International Auxiliary Language Association)', 1),
('id', 'Indonesian', 1),
('ie', 'Interlingue', 1),
('ig', 'Igbo', 1),
('ii', 'Nuosu, Sichuan Yi', 1),
('ik', 'Inupiaq', 1),
('io', 'Ido', 1),
('is', 'Icelandic', 1),
('it', 'Italian', 1),
('iu', 'Inuktitut', 1),
('ja', 'Japanese', 1),
('jv', 'Javanese', 1),
('ka', 'Georgian', 1),
('kg', 'Kongo', 1),
('ki', 'Gikuyu, Kikuyu', 1),
('kj', 'Kwanyama, Kuanyama', 1),
('kk', 'Kazakh', 1),
('kl', 'Greenlandic, Kalaallisut', 1),
('km', 'Central Khmer', 1),
('kn', 'Kannada', 1),
('ko', 'Korean', 1),
('kr', 'Kanuri', 1),
('ks', 'Kashmiri', 1),
('ku', 'Kurdish', 1),
('kv', 'Komi', 1),
('kw', 'Cornish', 1),
('ky', 'Kyrgyz', 1),
('la', 'Latin', 1),
('lb', 'Letzeburgesch, Luxembourgish', 1),
('lg', 'Ganda', 1),
('li', 'Limburgish, Limburgan, Limburger', 1),
('ln', 'Lingala', 1),
('lo', 'Lao', 1),
('lt', 'Lithuanian', 1),
('lu', 'Luba-Katanga', 1),
('lv', 'Latvian', 1),
('mg', 'Malagasy', 1),
('mh', 'Marshallese', 1),
('mi', 'Maori', 1),
('mk', 'Macedonian', 1),
('ml', 'Malayalam', 1),
('mn', 'Mongolian', 1),
('mr', 'Marathi', 1),
('ms', 'Malay', 1),
('mt', 'Maltese', 1),
('my', 'Burmese', 1),
('na', 'Nauru', 1),
('nb', 'Norwegian Bokmål', 1),
('nd', 'Northern Ndebele', 1),
('ne', 'Nepali', 1),
('ng', 'Ndonga', 1),
('nl', 'Dutch, Flemish', 1),
('nn', 'Norwegian Nynorsk', 1),
('no', 'Norwegian', 1),
('nr', 'South Ndebele', 1),
('nv', 'Navajo, Navaho', 1),
('ny', 'Chichewa, Chewa, Nyanja', 1),
('oc', 'Occitan (post 1500)', 1),
('oj', 'Ojibwa', 1),
('om', 'Oromo', 1),
('or', 'Oriya', 1),
('os', 'Ossetian, Ossetic', 1),
('pa', 'Panjabi, Punjabi', 1),
('pi', 'Pali', 1),
('pl', 'Polish', 1),
('ps', 'Pashto, Pushto', 1),
('pt', 'Portuguese', 1),
('qu', 'Quechua', 1),
('rm', 'Romansh', 1),
('rn', 'Rundi', 1),
('ro', 'Moldovan, Moldavian, Romanian', 1),
('ru', 'Russian', 1),
('rw', 'Kinyarwanda', 1),
('sa', 'Sanskrit', 1),
('sc', 'Sardinian', 1),
('sd', 'Sindhi', 1),
('se', 'Northern Sami', 1),
('sg', 'Sango', 1),
('si', 'Sinhala, Sinhalese', 1),
('sk', 'Slovak', 1),
('sl', 'Slovenian', 1),
('sm', 'Samoan', 1),
('sn', 'Shona', 1),
('so', 'Somali', 1),
('sq', 'Albanian', 1),
('sr', 'Serbian', 1),
('ss', 'Swati', 1),
('st', 'Sotho, Southern', 1),
('su', 'Sundanese', 1),
('sv', 'Swedish', 1),
('sw', 'Swahili', 1),
('ta', 'Tamil', 1),
('te', 'Telugu', 1),
('tg', 'Tajik', 1),
('th', 'Thai', 1),
('ti', 'Tigrinya', 1),
('tk', 'Turkmen', 1),
('tl', 'Tagalog', 1),
('tn', 'Tswana', 1),
('to', 'Tonga (Tonga Islands)', 1),
('tr', 'Turkish', 1),
('ts', 'Tsonga', 1),
('tt', 'Tatar', 1),
('tw', 'Twi', 1),
('ty', 'Tahitian', 1),
('ug', 'Uighur, Uyghur', 1),
('uk', 'Ukrainian', 1),
('ur', 'Urdu', 1),
('uz', 'Uzbek', 1),
('ve', 'Venda', 1),
('vi', 'Vietnamese', 1),
('vo', 'Volap_k', 1),
('wa', 'Walloon', 1),
('wo', 'Wolof', 1),
('xh', 'Xhosa', 1),
('yi', 'Yiddish', 1),
('yo', 'Yoruba', 1),
('za', 'Zhuang, Chuang', 1),
('zh', 'Chinese', 1),
('zu', 'Zulu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admin', 1671854343),
(2, '::1', 'admin', 1690205914);

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
(3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$l4EX0pT4l8g8dsKLze0KyuUsDV4m/NhO2vb.G5pYORXALoy/7Eyga', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1671854511, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
