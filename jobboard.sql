-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Ноя 26 2024 г., 22:24
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jobboard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `short_description`, `description`, `created_at`, `image`, `slug`) VALUES
(1, 'Google inks pact for new 35-storey office', 'Hello', '<h1>MCSE boot camps have its supporters and its detractors.</h1>\r\n\r\n<p>Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower</p>\r\n', '2024-11-10 17:00:00', '/img/blog/single_blog_1.png', 'Google-inks-pact-for-new-35storey-office'),
(2, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-10 17:00:00', '/img/blog/single_blog_2.png', 'Google-inks-pact-for-new-35storey-office1'),
(3, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-10 17:00:00', '/img/blog/single_blog_3.png', 'Google-inks-pact-for-new-35storey-office2'),
(4, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-10 17:00:00', '/img/blog/single_blog_4.png', 'Google-inks-pact-for-new-35storey-office3'),
(5, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-10 17:00:00', '/img/blog/single_blog_5.png', 'Google-inks-pact-for-new-35storey-office4'),
(6, 'Hello', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-10 17:00:00', '/img/blog/single_blog_5.png', 'Hello'),
(23, 'New blog', 'new blog', '<h1>It&#39;s new blog!</h1>\r\n', '2024-11-26 15:02:40', '/img/blog/blog_1.png', 'New-blog');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`) VALUES
(1, 'Travel news'),
(2, 'Product'),
(3, 'Health Care');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int NOT NULL,
  `blog_id` int NOT NULL,
  `blog_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_id`, `blog_category_id`) VALUES
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(7, 2, 3),
(8, 6, 3),
(79, 1, 1),
(80, 1, 2),
(81, 1, 3),
(82, 23, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_popular`) VALUES
(1, 'Design & Creative', 1),
(2, 'Marketing', 1),
(3, 'Telemarketing', 0),
(4, 'Software & Web', 0),
(5, 'Administration', 0),
(6, 'Teaching & Education', 0),
(7, 'Engineering', 1),
(8, 'Garments / Textile', 0),
(11, 'dasd', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `email`, `website`, `blog_id`, `created_at`) VALUES
(3, 'Ivan', 'My new comment', 'ivan@mail.ru', 'https://dsadas', 1, '2024-11-11 17:07:42'),
(4, 'dsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis consequuntur dolore ducimus eius eum fugit hic illum in maxime minus mollitia porro reprehenderit voluptate, voluptatem! Magni quibusdam reiciendis ut.', 'das@dsa', 'https://dsadas', 1, '2024-11-11 17:08:19'),
(6, 'Ivan', 'Comment', 'ivan.tixonov00@mail.ru', 'https://dsadas', 2, '2024-11-26 15:08:14');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_position` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_top` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `company`, `email`, `password`, `available_position`, `image`, `is_admin`, `is_top`) VALUES
(11, 'ivan', 'ivan@mail.ru', '$2y$10$yxCbwrxNH9oz8umx8/LoROIammmIs978.NFXiQKHWDZ69/mEXus0m', 0, '/img/svg_icon/5.svg', 1, 1),
(13, 'Snack Studio', 'snack@gmail.com', '$2y$10$wKdXv.H1lEAe2yWx16ndDOioaJVxooaEahs0.3e3bQI/k5W9q5k..', 0, NULL, 0, 0),
(15, 'ivan2', 'ivan.tixonov00@mail.ru', '$2y$10$ndGxRw102PG4a6Fiqc4cTeM0xJCClVZUSm/FXBIxmy3x7gSgY0ur2', 0, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `experiences`
--

INSERT INTO `experiences` (`id`, `name`) VALUES
(1, '1 year');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `min_salary` int NOT NULL,
  `max_salary` int NOT NULL,
  `qualification_id` int NOT NULL,
  `experience_id` int NOT NULL,
  `job_type_id` int NOT NULL,
  `location_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int NOT NULL,
  `available_position` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `category_id`, `min_salary`, `max_salary`, `qualification_id`, `experience_id`, `job_type_id`, `location_id`, `image`, `date`, `slug`, `company_id`, `available_position`) VALUES
(1, 'Software Engineer', '<h1>Header</h1>\r\n\r\n<hr />\r\n<h3>Experience</h3>\r\n\r\n<ol>\r\n	<li>1 year</li>\r\n	<li>2 year</li>\r\n	<li>5 year</li>\r\n</ol>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing.</p>\r\n', 7, 50, 120, 10, 1, 2, 1, '/img/svg_icon/1.svg', '2024-11-05 17:00:00', 'Software-Engineer', 11, 3),
(13, 'Digital Marketer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 50, 120, 6, 1, 1, 1, '/img/svg_icon/2.svg', '2024-11-05 17:00:00', 'Digital-Marketer', 11, 5),
(14, 'Wordpress Developer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 23, 56, 2, 1, 2, 1, '/img/svg_icon/3.svg', '2024-11-05 17:00:00', 'Wordpress-Developer', 11, 10),
(15, 'Visual Designer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 23, 33, 3, 1, 1, 1, '/img/svg_icon/4.svg', '2024-11-05 17:00:00', 'Visual-Designer', 11, 41),
(17, 'dd3wa', 'dsa', 3, 2, 3, 7, 1, 1, 2, NULL, '2024-11-06 17:00:00', 'dd3wa', 11, 0),
(21, '123', '123', 1, 2, 3, 2, 1, 1, 1, NULL, '2024-11-07 17:00:00', '123', 11, 0),
(25, 'News', 'new job', 6, 56, 124, 6, 1, 2, 2, NULL, '2024-11-10 17:00:00', 'News', 15, 0),
(28, 'New Job', 'cool', 2, 3, 65, 2, 1, 1, 1, NULL, '2024-11-10 17:00:00', 'New-Job', 15, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `job_types`
--

CREATE TABLE `job_types` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `job_types`
--

INSERT INTO `job_types` (`id`, `name`) VALUES
(1, 'Full-time'),
(2, 'Part-time');

-- --------------------------------------------------------

--
-- Структура таблицы `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'California, USA'),
(2, 'Abakan, Russia');

-- --------------------------------------------------------

--
-- Структура таблицы `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `qualifications`
--

INSERT INTO `qualifications` (`id`, `level`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `responses`
--

CREATE TABLE `responses` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `responses`
--

INSERT INTO `responses` (`id`, `name`, `email`, `url`, `CV`, `cover_letter`, `job_id`) VALUES
(11, 'Ivan', 'ivan.tixonov00@mail.ru', 'https://my-site.com', '/responses/slide_thumb_1.png', 'Hello!', 1),
(12, 'Vika', 'vika@mail.ru', 'https://vika.com', '/responses/blog_4.png', 'I\'m Vika!', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `specialties`
--

CREATE TABLE `specialties` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specialties`
--

INSERT INTO `specialties` (`id`, `name`) VALUES
(1, 'Software Engineer');

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `testimonials`
--

INSERT INTO `testimonials` (`id`, `author`, `description`, `image`) VALUES
(1, 'Micky Mouse', 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering through animal welfare when people might depend on livestock as their only source of income or food.', '/img/testmonial/author.png');

-- --------------------------------------------------------

--
-- Структура таблицы `сandidates`
--

CREATE TABLE `сandidates` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `сandidates`
--

INSERT INTO `сandidates` (`id`, `first_name`, `last_name`, `speciality_id`, `image`) VALUES
(1, 'Markary', 'Jondon', 1, '/img/candiateds/1.png'),
(2, 'Markary', 'Jondon', 1, '/img/candiateds/2.png'),
(3, 'Markary', 'Jondon', 1, '/img/candiateds/3.png'),
(4, 'Markary', 'Jondon', 1, '/img/candiateds/4.png'),
(5, 'Markary', 'Jondon', 1, '/img/candiateds/5.png'),
(6, 'Markary', 'Jondon', 1, '/img/candiateds/6.png'),
(7, 'Markary', 'Jondon', 1, '/img/candiateds/7.png'),
(8, 'Markary', 'Jondon', 1, '/img/candiateds/8.png'),
(9, 'Markary', 'Jondon', 1, '/img/candiateds/9.png'),
(10, 'Markary', 'Jondon', 1, '/img/candiateds/10.png'),
(11, 'Markary', 'Jondon', 1, '/img/candiateds/3.png'),
(12, 'Markary', 'Jondon', 1, '/img/candiateds/4.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_ibfk_1` (`blog_id`),
  ADD KEY `blog_category_ibfk_2` (`blog_category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`blog_id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company` (`company`);

--
-- Индексы таблицы `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `qualification_id` (`qualification_id`),
  ADD KEY `experience` (`experience_id`),
  ADD KEY `job_type_id` (`job_type_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Индексы таблицы `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Индексы таблицы `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `сandidates`
--
ALTER TABLE `сandidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `сandidates`
--
ALTER TABLE `сandidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `blog_category_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_category_ibfk_2` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_5` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_6` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_7` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `сandidates`
--
ALTER TABLE `сandidates`
  ADD CONSTRAINT `сandidates_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `specialties` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
