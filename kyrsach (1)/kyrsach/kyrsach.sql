-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2021 г., 06:56
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kyrsach`
--

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `login` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transport` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `login`, `district`, `street`, `transport`) VALUES
(177, 'notri9922', 'Индустриальный', 'Азина_ул.10', 'transport'),
(178, 'notri9922', 'Индустриальный', 'Азина_ул.10', 'Велосипед');

-- --------------------------------------------------------

--
-- Структура таблицы `street`
--

CREATE TABLE `street` (
  `id` int NOT NULL,
  `district` varchar(256) NOT NULL,
  `street` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `street`
--

INSERT INTO `street` (`id`, `district`, `street`) VALUES
(104, 'Индустриальный', 'Азина_ул.10'),
(105, 'Индустриальный', 'Азина_ул.10'),
(106, 'Индустриальный', 'Азина_ул.10'),
(107, 'Индустриальный', 'Азина_ул.10'),
(108, 'Индустриальный', 'Азина_ул.10'),
(109, 'Индустриальный', 'Азина_ул.10'),
(111, 'Устиного', 'К.Маркса_ул.20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `number_card` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8_unicode_ci NOT NULL,
  `balance` int NOT NULL DEFAULT '0',
  `role` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `number_card`, `balance`, `role`) VALUES
(1, 'big', 'hand', 'admin', 'admin', '0', 1, 1),
(2, 'fsxfz', 'sdfsdf', 'sdfxzcfas', 'sadfsxcf', 'dfasdfaS', 0, 0),
(3, '123', '123', '13', '123', '123', 100, 0),
(4, 'sadf sad', 'fsdaf', 'sadfs', 'afvs', 'dfsf', 1, 0),
(10, '123123', '123123', '123123', '123123', '1234123412341234', 0, 0),
(12, '31231', '321312', '312312', '3213123', '1234123412341234', 0, 0),
(13, 'notri9922', 'notri9922', 'notri9922', 'notri9922', '1234123412341234', 12343, 0),
(14, 'wdas', 'sdfszs', 'asdfsadf', 'sadfsdf', '1234123412341234', 10, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT для таблицы `street`
--
ALTER TABLE `street`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
