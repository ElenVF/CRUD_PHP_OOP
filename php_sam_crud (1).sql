-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2025 г., 00:42
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
  `comment` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bid`
--

INSERT INTO `bid` (`id`, `name`, `comment`, `user_id`) VALUES
(41, 'thfth', 'fhggh', 4),
(42, 'sdfdsf', 'dxfzf', 4),
(45, 'аввррпаввввввввввввввввввввввв', 'рпаррпа', 4),
(46, 'TEST500', 'TEST500', 15),
(47, 'выпввввв', 'ввввыпвввв', 15),
(48, 'рссп', 'рспнеп', 4),
(49, 'TEST', 'dsdgd', 17),
(50, 'sadcvb', 'cvbbbbbbbb', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
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
(1, 'lnln1', '$2y$10$vsbw/i2YtcWCkVbsFNf65OtXid4tIz7in06ueBa.EKbrsHD5Ht5Ka', 'l1@gmail.com', 'user', 'sad', '7(338)128-19-19'),
(2, 'TEST', '$2y$10$l4lhAuTe.Me0DzdW6k27XecZEqGURYo/IYu87bkHYY/HRL7oftYfe', 'ftufty@gmail.com', 'user', 'TEST', '7(338)128-19-19'),
(4, 'TEST2', '$2y$10$M5hKm7F9Iv9nUhK6g3aV5eCmNkCOisAab6Cjxdb6lja3vRoKnmr9O', 'l2@gmail.com', 'admin', 'TEST2', '7(338)128-19-19'),
(7, 'TEST223', '$2y$10$PxPQOjyzRB60oCONjECYqu16HuRW1h2G/TmtUFQq.6mOhAizlFV3q', 'l3@gmail.com', 'user', 'fsgdf', '7(338)128-19-19'),
(8, 'TEST3', '$2y$10$KpYR1QFOqai1hk1LNE2/.O9e7Nk8ApfNdX0sfloT5EoRryVrM0XHq', 'l4@gmail.com', 'user', 'TEST3', '7(338)128-19-19'),
(9, 'TEST5', '$2y$10$YQuK8h32s/I0RMLq.trf9e/BYZTkLx0SpOvyfY4xqVlmAQzy85r7i', 'l5@gmail.com', 'user', 'TEST5', '7(338)128-19-19'),
(10, 'Test10', '$2y$10$v9/1Hz7FEsKNSdVEnlheZu67bU.H4opD/RWjGFxwa40tF7aNlQ.ey', 'l6@gmail.com', 'user', 'Test10', '7(338)128-19-19'),
(11, 'TEST7', '$2y$10$ih6G8Ni5/6/2GSnHJz70l.txJQ7bFG8q1WUDcrc89e.AAVVOFMIE6', 'l7@gmail.com', 'user', 'TEST7', '7(338)128-19-19'),
(12, 'TEST12', '$2y$10$TQRX0pKVKMIWgf36RNj5ROrVLXsmCZhPNrYIIOhhj/SAYQgiH86UW', 'l8@gmail.com', 'user', 'TEST12', '7(338)128-22-19'),
(13, 'test13', '$2y$10$neh9Tx8pj5peXGiXVW.9IOzq3WmPKIbrRk4UiBMLoYwbp8YxAvlby', 'f@gmail.com', 'user', 'test13', '7(338)128-19-44'),
(14, 'TEST100', '$2y$10$N2UglSK/dU1S1wvW.dI.uOv22T0NKrBZFFjrjYGKHaT49iJ.icl02', 'l9@gmail.com', 'user', 'TEST100100', '7(338)128-19-19'),
(15, 'вап', '$2y$10$KsJPGYV9bKmq1BdzCI9kCOmIBfxW7pGsdXZW3MGxlXZVkckx7vjpq', 'l10@gmail.com', 'user', 'авп', '7(338)128-19-19'),
(16, 'TEST56', '$2y$10$VscEdDhZl/J3B/zt1G6UFO/xPzBK4SJcB0FeasWchsq1OXG2y0aMi', 'l11@gmail.com', 'user', 'TEST56', '7(338)128-19-19'),
(17, 'TEST57', '$2y$10$KgQ4mB5hINiZ4GJGOLg1n.7.czMHLRr6AO.3yqNivBtlI994hmgPi', 'TEST57@fd.dd', 'user', 'TEST57', '7(338)128-19-33'),
(18, 'TEST333', '$2y$10$bDvPI4IYioDWQSbXder2wuwN7Gi1OZf6nOA6CVoWuv..zqYLtrCgO', 'ftuTEST333fty@gmail.com', 'user', 'TEST333', '7(338)128-19-19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
