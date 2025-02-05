-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 05 2025 г., 17:57
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_sam_crud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bid`
--

CREATE TABLE `bid` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bid`
--

INSERT INTO `bid` (`id`, `name`, `phone`, `email`, `comment`) VALUES
(1, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fdghgdhfg'),
(2, 'dsc', 'csd', 'ftyfty@asd.dassad', 'sdc'),
(3, 'dsc', 'csd', 'ftyfty@asd.dassad', 'sdc'),
(4, 'cdsf', 'dsfdsf', 'asdf0@gmail.com', 'fdsa'),
(5, 'cdsf', 'dsfdsf', 'asdf0@gmail.com', 'fdsa'),
(6, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fdghgdhfg'),
(7, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fdghgdhfg'),
(8, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fdghgdhfg'),
(9, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fdghgdhfg'),
(10, 'sad', '89319745283', 'dsf020@gmail.com', 'dsf'),
(11, 'sad', 'trh', 'dsvf0@gmail.com', 'sdfffff'),
(12, 'sdfdsf', '89559745283', 'sdfgdg@gmail.com', 'ааспавр'),
(13, 'sad', '89319745283', 'lfv31032020@gmail.com', 'xcvcvcvcvcvcvcv'),
(14, 'sad', '7(338)128-19-19', 'lfv31032020@gmail.com', 'ававп'),
(15, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'рпар'),
(16, 'sdfdsf', '89319745283', 'ftufty@gmail.com', 'sfdddddddddd'),
(17, 'TRHHXTTRGYHGTRT', '89319745283', 'lfv31032020@gmail.com', 'dfsfsd'),
(18, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'ававп'),
(19, 'sad', '89319745283', 'lfv31032020@gmail.com', 'fsds'),
(20, 'sad', '89319745283', 'lfv31032020@gmail.com', 'иарп'),
(21, 'тест', '89319745283', 'lfv31032020@gmail.com', 'выаыаыаыаыаыаыаыаыаыа'),
(22, 'fdsssssss', '89319745283', 'sdfgdg@gmail.com', 'sdf'),
(23, 'dfssssssss', '89319745283', 'lfv31032020@gmail.com', 'sdff'),
(24, 'впав', 'вапвап', 'lfv31032020@gmail.com', 'впа'),
(25, 'впав', 'вапвап', 'lfv31032020@gmail.com', 'впа'),
(26, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'fvvvvvvvvv'),
(27, 'sdfdsf', '89319745283', 'sdfgdg@gmail.com', 'уыуавва'),
(28, 'TESTTTTT', '89319745283', 'ftufty@gmail.com', 'dsf'),
(29, 'TESTTTTTgggg', '89319745283', 'ftufty@gmail.com', 'dfgggggggggggggggggggggggggg'),
(30, 'TETS7000', '89319745283', 'lfv31032020@gmail.comfgd', 'dgffgd'),
(31, 'TETS600', '89319745283', 'lfv31032020@gmail.comfgd', 'gdfgfd'),
(32, 'TETS200', '89319745283', 'lfv31032020@gmail.comfgd', 'zdcc'),
(33, 'sdfdsf', '89319745283', 'lfv31032020@gmail.com', 'ergd'),
(34, 'sad', '89319745283', 'lfv31032020@gmail.com', 'awdrrwa'),
(36, 'ARCADII2', 'sfdfd', 'ftufty@gmail.com', 'fdgdf');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`, `name`, `phone`) VALUES
(1, 'lnln1', '$2y$10$vsbw/i2YtcWCkVbsFNf65OtXid4tIz7in06ueBa.EKbrsHD5Ht5Ka', 'lfv31032020@gmail.com', 'user', 'sad', '89319745283'),
(2, 'TEST', '$2y$10$l4lhAuTe.Me0DzdW6k27XecZEqGURYo/IYu87bkHYY/HRL7oftYfe', 'ftufty@gmail.com', 'user', 'TEST', '89319745283'),
(4, 'TEST2', '$2y$10$M5hKm7F9Iv9nUhK6g3aV5eCmNkCOisAab6Cjxdb6lja3vRoKnmr9O', 'lfv31032ds020@gmail.com', 'admin', 'TEST2', '89319745283'),
(7, 'TEST223', '$2y$10$PxPQOjyzRB60oCONjECYqu16HuRW1h2G/TmtUFQq.6mOhAizlFV3q', 'lfv3145456655032020@gmail.com', 'user', 'fsgdf', '7(338)128-19-19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
