-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Ноя 12 2024 г., 21:25
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
  `created_at` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `short_description`, `description`, `created_at`, `image`, `slug`) VALUES
(1, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_1.png', 'Google-inks-pact-for-new-35storey-office'),
(2, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_2.png', 'Google-inks-pact-for-new-35storey-office1'),
(3, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_3.png', 'Google-inks-pact-for-new-35storey-office2'),
(4, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_4.png', 'Google-inks-pact-for-new-35storey-office3'),
(5, 'Google inks pact for new 35-storey office', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_5.png', 'Google-inks-pact-for-new-35storey-office4'),
(6, 'Hello', 'That dominion stars lights dominion divide years for fourth have don\'t star is that he earth it first without heaven in place seed it second morning saying.', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at fraction of the camp price. However, who has the willpower', '2024-11-11', '/img/blog/single_blog_5.png', 'Hello');

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
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 2, 3),
(8, 6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `available_position` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_popular`, `available_position`) VALUES
(1, 'Design & Creative', 1, 50),
(2, 'Marketing', 1, 100),
(3, 'Telemarketing', 1, 150),
(4, 'Software & Web', 1, 45),
(5, 'Administration', 1, 32),
(6, 'Teaching & Education', 1, 28),
(7, 'Engineering', 1, 13),
(8, 'Garments / Textile', 1, 354),
(11, 'dasd', 0, 123);

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
(4, 'dsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis consequuntur dolore ducimus eius eum fugit hic illum in maxime minus mollitia porro reprehenderit voluptate, voluptatem! Magni quibusdam reiciendis ut.', 'das@dsa', 'https://dsadas', 1, '2024-11-11 17:08:19');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `company`, `email`, `password`, `available_position`, `image`) VALUES
(11, 'ivan', 'ivan@mail.ru', '$2y$10$yxCbwrxNH9oz8umx8/LoROIammmIs978.NFXiQKHWDZ69/mEXus0m', 0, '/img/svg_icon/5.svg'),
(13, 'Snack Studio', 'snack@gmail.com', '$2y$10$wKdXv.H1lEAe2yWx16ndDOioaJVxooaEahs0.3e3bQI/k5W9q5k..', 0, NULL),
(15, 'ivan2', 'ivan.tixonov00@mail.ru', '$2y$10$ndGxRw102PG4a6Fiqc4cTeM0xJCClVZUSm/FXBIxmy3x7gSgY0ur2', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `experience`
--

CREATE TABLE `experience` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `experience`
--

INSERT INTO `experience` (`id`, `name`) VALUES
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
  `date` date NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `category_id`, `min_salary`, `max_salary`, `qualification_id`, `experience_id`, `job_type_id`, `location_id`, `image`, `date`, `slug`, `company_id`) VALUES
(1, 'Software Engineer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 7, 50, 120, 10, 1, 2, 1, '/img/svg_icon/1.svg', '2024-11-06', 'Software-Engineer', 11),
(13, 'Digital Marketer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 50, 120, 6, 1, 1, 1, '/img/svg_icon/2.svg', '2024-11-06', 'Digital-Marketer', 11),
(14, 'Wordpress Developer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 23, 56, 2, 1, 2, 1, './img/svg_icon/3.svg', '2024-11-06', 'Wordpress-Developer', 11),
(15, 'Visual Designer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing.', 1, 23, 33, 3, 1, 1, 1, '/img/svg_icon/4.svg', '2024-11-06', 'Visual-Designer', 11),
(17, 'dd3wa', 'dsa', 3, 2, 3, 7, 1, 1, 2, NULL, '2024-11-07', 'dd3wa', 11),
(21, '123', '123', 1, 2, 3, 2, 1, 1, 1, NULL, '2024-11-08', '123', 11),
(25, 'News', 'new job', 6, 56, 124, 6, 1, 2, 2, NULL, '2024-11-11', 'News', 15),
(28, 'New Job', 'cool', 2, 3, 65, 2, 1, 1, 1, NULL, '2024-11-11', 'New-Job', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `job_type`
--

CREATE TABLE `job_type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `job_type`
--

INSERT INTO `job_type` (`id`, `name`) VALUES
(1, 'Full-time'),
(2, 'Part-time');

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'California, USA'),
(2, 'Abakan, Russia');

-- --------------------------------------------------------

--
-- Структура таблицы `qualification`
--

CREATE TABLE `qualification` (
  `id` int NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `qualification`
--

INSERT INTO `qualification` (`id`, `level`) VALUES
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
(8, 'Vika', 'vika@mail.ru', 'https://vika.com', '/responses/Верстка.jpg', 'I am Vika!', 25),
(9, 'Ivan', 'ivan@mail.ru', 'https://my-site.com', '/responses/Аватарка.jpg', 'I am Ivan!', 25),
(10, 'Vlad', 'vlad@gmail.com', 'https://vlad.ru', '/responses/Снимок экрана 2024-09-24 234121.png', 'I am Vlad!', 28);

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
-- Структура таблицы `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `testimonial`
--

INSERT INTO `testimonial` (`id`, `author`, `description`, `image`) VALUES
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
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `blog_category_id` (`blog_category_id`);

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
  ADD KEY `blog_id` (`blog_id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company` (`company`);

--
-- Индексы таблицы `experience`
--
ALTER TABLE `experience`
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
  ADD KEY `location_id` (`location_id`);

--
-- Индексы таблицы `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qualification`
--
ALTER TABLE `qualification`
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
-- Индексы таблицы `testimonial`
--
ALTER TABLE `testimonial`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `testimonial`
--
ALTER TABLE `testimonial`
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
  ADD CONSTRAINT `blog_category_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `blog_category_ibfk_2` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`qualification_id`) REFERENCES `qualification` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_5` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_6` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
