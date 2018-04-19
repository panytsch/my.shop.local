-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2018 г., 21:32
-- Версия сервера: 5.7.20
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newssite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `small_description` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) UNSIGNED NOT NULL,
  `tag1` varchar(250) DEFAULT NULL,
  `views` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `small_description`, `description`, `date`, `category_id`, `tag1`, `views`) VALUES
(1, 'Lorem1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam.', '2018-04-19 10:13:44', 1, 'lorem', NULL),
(2, 'lorem another', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetu adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam.', '2018-04-19 10:13:44', 2, 'another', NULL),
(3, 'Аналітика', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque repellendus possimus necessitatibus dolores reiciendis in tempora et consequuntur voluptatem a assumenda, eaque. Dolorum commodi ipsa similique harum, veniam voluptatem ullam. ', '2018-04-19 10:23:01', 3, 'аналітика', NULL),
(4, 'lors', 'mini desc', 'SELECT articles.title, categories.name FROM articles JOIN categories ON articles.category_id = categories.id;SELECT articles.title, categories.name FROM articles JOIN categories ON articles.category_id = categories.id;SELECT articles.title, categories.name FROM articles JOIN categories ON articles.category_id = categories.id;SELECT articles.title, categories.name FROM articles JOIN categories ON articles.category_id = categories.id;', '2018-04-19 17:18:08', 2, 'sql', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Фінанси'),
(2, 'Інтернет'),
(3, 'Аналітика');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `article_id`, `rate`, `verified`) VALUES
(1, 2, 'так собі стаття', 1, -5, 0),
(2, 3, 'норм аналітика', 3, 57, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `permission`
--

CREATE TABLE `permission` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permission`
--

INSERT INTO `permission` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permission_id`) VALUES
(1, 'admin@admin.com', 'smile', 1),
(2, 'user@user.com', 'smile2', 3),
(3, 'moderator@moderator.com', 'smile3', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
