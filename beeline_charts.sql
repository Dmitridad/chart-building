-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2019 г., 17:06
-- Версия сервера: 5.6.41
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
-- База данных: `beeline_charts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `charts_data`
--

CREATE TABLE `charts_data` (
  `id` int(255) NOT NULL,
  `beeline_value` int(255) NOT NULL,
  `mf_value` int(255) NOT NULL,
  `mts_value` int(11) NOT NULL,
  `time_key` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `charts_data`
--

INSERT INTO `charts_data` (`id`, `beeline_value`, `mf_value`, `mts_value`, `time_key`) VALUES
(5, 358, 659, 284, '2019-10-31 14:43:32'),
(6, 326, 216, 868, '2019-10-31 14:45:40'),
(7, 139, 445, 909, '2019-10-31 15:02:04'),
(8, 17, 734, 73, '2019-10-31 15:03:25'),
(9, 151, 835, 229, '2019-10-31 15:03:27'),
(10, 365, 453, 290, '2019-10-31 15:03:28'),
(11, 624, 427, 977, '2019-10-31 15:03:30'),
(12, 227, 921, 899, '2019-10-31 17:11:40'),
(16, 213, 526, 113, '2019-10-31 21:42:22'),
(17, 603, 387, 686, '2019-10-31 21:46:00'),
(18, 910, 562, 805, '2019-11-01 07:32:07'),
(19, 734, 814, 844, '2019-11-01 07:32:12'),
(20, 970, 810, 768, '2019-11-01 07:32:15'),
(21, 744, 388, 950, '2019-11-01 07:32:18'),
(22, 448, 607, 776, '2019-11-01 13:42:04'),
(23, 977, 379, 808, '2019-11-01 13:42:07'),
(24, 626, 335, 608, '2019-11-01 13:42:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `charts_data`
--
ALTER TABLE `charts_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `charts_data`
--
ALTER TABLE `charts_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
