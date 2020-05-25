-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 25 2020 г., 10:00
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
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_question` int(10) NOT NULL,
  `correct_answer` enum('0','1') CHARACTER SET utf8 DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer`, `parent_question`, `correct_answer`) VALUES
(1, 'Да', 4, '1'),
(2, 'Нет', 4, '0'),
(3, 'Фи́зика — область естествознания: наука о наиболее общих законах природы, о материи, её структуре, движении и правилах трансформации. Законы физики лежат в основе всего естествознания', 2, '1'),
(4, 'Физика - предмет который изучают в школе ', 2, '0'),
(5, 'Физика -  область социальной деятельности, направленная на сохранение и укрепление здоровья, человека в процессе осознанной двигательной активности', 2, '0'),
(9, 'are', 12, '0'),
(10, 'was', 12, '0'),
(11, 'is', 12, '1'),
(15, 'am', 13, '1'),
(16, 'are', 13, '0'),
(17, 'is', 13, '0'),
(18, 'is not', 14, '0'),
(19, 'aren`t', 14, '1'),
(20, 'arent', 14, '0'),
(21, 'is', 15, '0'),
(22, 'will be', 15, '1'),
(23, 'were', 15, '0'),
(24, 'are', 16, '0'),
(25, 'were', 16, '1'),
(26, 'was', 16, '0'),
(27, 'is not', 17, '0'),
(28, 'wasn`t', 17, '1'),
(29, 'weren`t', 17, '0'),
(32, 'is not', 18, '1'),
(33, 'is not', 18, '0'),
(34, 'aren`t', 18, '0'),
(35, 'с какой силой магнитное поле действует на проводник с током', 19, '1'),
(36, 'с какой силой магнитное поле действует на покоящиеся электрические заряды', 19, '0'),
(37, 'значение заряда, помещенное в это магнитное поле', 19, '0'),
(38, 'в каком направлении течет ток по проводнику', 19, '0'),
(39, 'нет правильного ответа', 20, '0'),
(40, 'из катушки «на нас».', 20, '1'),
(41, 'в катушку «от нас»', 20, '0'),
(42, 'по касательной к движению электрического тока.', 20, '0'),
(43, 'вдоль провода слева направо', 21, '0'),
(44, 'вдоль провода справа налево', 21, '0'),
(45, 'вокруг провода сверху – «на нас», снизу «от нас»', 21, '1'),
(46, ' вокруг провода сверху – «от нас», снизу «на нас»', 21, '0'),
(47, 'Ампер', 22, '0'),
(48, 'Вольт', 22, '0'),
(49, 'Кулон', 22, '0'),
(50, 'Тесла', 22, '1');

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
(2, 'Физика это', 1),
(4, 'F=m*a?', 1),
(12, 'This __ a good restaurant', 2),
(13, ' I __ a new student', 2),
(14, 'Manny and Max ___ here.', 2),
(15, 'This __ your home for a while.', 2),
(16, 'Where __ you last light?', 2),
(17, 'My dog __ sick.', 2),
(18, 'The Tsar __ real!', 2),
(19, 'Индукция магнитного поля показывает', 1),
(20, 'Если глядеть внутрь катушки с током так, чтобы ток по ней шел против часовой стрелки, то вектор возникающей магнитной индукции будет направлен …', 1),
(21, 'Если расположить провод с током горизонтально так, чтобы ток шел слева направо, то магнитные линии будут направлены…', 1),
(22, 'Единицей магнитного поля является …', 1);

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
(12, 'Милада Крапивина ', 'miladakrapiva@gmail.com', 'Я милада'),
(15, 'я', 'andrejklimcuk93@gmail.com', '1'),
(25, 'Андрей', 'andrejklimcuk93@gmail.com', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `test_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `result`
--

INSERT INTO `result` (`id`, `username`, `test_id`, `rating`) VALUES
(32, 'Андрей', 1, 50);

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
(2, 'Англ.яз'),
(3, 'СиАОД'),
(4, 'Право');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
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
-- Индексы таблицы `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
