-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 25 2020 г., 07:13
-- Версия сервера: 5.5.63-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `text`, `date`) VALUES
(41, 'Первый пост', 'Здесь должен быть какой то текст и он тут есть!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis earum fuga mollitia est labore, minima nihil reiciendis obcaecati sint, ipsum atque similique facilis molestiae beatae, nisi commodi consequatur exercitationem magnam?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis earum fuga mollitia est labore, minima nihil reiciendis obcaecati sint, ipsum atque similique facilis molestiae beatae, nisi commodi consequatur exercitationem magnam?', '2020-09-25 11:12:20'),
(42, 'Second post', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis earum fuga mollitia est labore, minima nihil reiciendis obcaecati sint, ipsum atque similique facilis molestiae beatae, nisi commodi consequatur exercitationem magnam?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis earum fuga mollitia est labore, minima nihil reiciendis obcaecati sint, ipsum atque similique facilis molestiae beatae, nisi commodi consequatur exercitationem magnam?', '2020-09-25 11:12:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
