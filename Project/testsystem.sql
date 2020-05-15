-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 15 2020 г., 15:20
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testsystem`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int(10) NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_question` int(10) NOT NULL,
  `correct_answer` enum('0','1') CHARACTER SET utf8 DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `answer`, `parent_question`, `correct_answer`) VALUES
(1, 'Да', 4, '1'),
(2, 'Нет', 4, '0'),
(3, 'Фи́зика — область естествознания: наука о наиболее общих законах природы, о материи, её структуре, движении и правилах трансформации. Законы физики лежат в основе всего естествознания', 2, '1'),
(4, 'Физика - предмет который изучают в школе ', 2, '0'),
(5, 'Физика -  область социальной деятельности, направленная на сохранение и укрепление здоровья, человека в процессе осознанной двигательной активности', 2, '0'),
(6, 'Выводит на экран Привет Мир', 5, '0'),
(7, 'Выводит на экран Hello Word', 5, '1'),
(8, 'Говорит Hello word', 5, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `parent_test`) VALUES
(1, 'Программирование это ', 2),
(2, 'Физика это', 1),
(4, 'F=m*a?', 1),
(5, ' Что делает данный годcout<< \"Hello word\";', 2),
(6, 'Сколько законов Ньютона?', 1),
(7, 'Земля плоская ? ', 1),
(8, 'Кто создал машину Тьюринга?', 2),
(9, 'for это -  ', 2),
(10, 'Как звучит первое начало термодинамики ', 1),
(11, 'База данных это ', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `regist`
--

CREATE TABLE `regist` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `regist`
--

INSERT INTO `regist` (`id`, `username`, `email`, `password`) VALUES
(2, 'Серега', 'andrejklimcuk93@gmail.com', '533r5356'),
(3, 'ugh9', 'andrejklimcuk93@gmail.com', '90-0-0-0'),
(4, 'ni', 'jnnn@lnhl', '9uj'),
(6, 'ло', 'andrejklimcuk93@gmail.com', 'ьл');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `test_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `test_name`) VALUES
(1, 'Физика'),
(2, 'Программирование ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Индексы таблицы `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
