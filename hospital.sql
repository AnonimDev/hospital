-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2017 г., 14:51
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hospital_all`
--

CREATE TABLE `hospital_all` (
  `id` int(11) NOT NULL,
  `number` varchar(15) NOT NULL,
  `type` int(11) NOT NULL,
  `locality` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hospital_all`
--

INSERT INTO `hospital_all` (`id`, `number`, `type`, `locality`, `address`, `time`) VALUES
(1, '1', 1, 'Восточный', 'ул.Полярная, д.1', '7:00-18:00'),
(2, '222', 1, '1', '1', '16:00-16'),
(3, '2', 1, '1', '1', '6:00-16:00');

-- --------------------------------------------------------

--
-- Структура таблицы `hospital_type`
--

CREATE TABLE `hospital_type` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hospital_type`
--

INSERT INTO `hospital_type` (`id`, `type`) VALUES
(1, 'Детская'),
(2, 'Взлослая');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hospital_all`
--
ALTER TABLE `hospital_all`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hospital_type`
--
ALTER TABLE `hospital_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hospital_all`
--
ALTER TABLE `hospital_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `hospital_type`
--
ALTER TABLE `hospital_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
