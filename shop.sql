-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 24 2020 г., 15:16
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Футболки красные'),
(2, 'Штаны'),
(3, 'Обувь'),
(4, 'Кепки');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `Name`, `created_at`, `address`, `status`) VALUES
(29, 22, '{\"basket\":[{\"product_id\":\"2\",\"count\":2},{\"product_id\":\"1\",\"count\":2},{\"product_id\":\"4\",\"count\":2},{\"product_id\":\"5\",\"count\":2}]}', '2020-05-14 18:16:19', 'rewrwerw', 'Отправлен клиенту'),
(30, 23, '{\"basket\":[{\"product_id\":\"2\",\"count\":4},{\"product_id\":\"1\",\"count\":4},{\"product_id\":\"4\",\"count\":2},{\"product_id\":\"5\",\"count\":2},{\"product_id\":\"3\",\"count\":2}]}', '2020-05-14 18:39:34', 'rwerwe', 'Отправлен клиенту'),
(31, 24, '{\"basket\":[{\"product_id\":\"2\",\"count\":4},{\"product_id\":\"1\",\"count\":4},{\"product_id\":\"4\",\"count\":2},{\"product_id\":\"5\",\"count\":2},{\"product_id\":\"3\",\"count\":2}]}', '2020-05-14 18:41:18', 'hgfhgfh', 'Отправлен клиенту'),
(32, 67, '{\"basket\":[{\"product_id\":\"1\",\"count\":\"5\"},{\"product_id\":\"2\",\"count\":3}]}', '2020-05-24 15:23:49', 'dfdsfds', 'Новый'),
(33, 68, '{\"basket\":[{\"product_id\":\"1\",\"count\":\"5\"},{\"product_id\":\"2\",\"count\":3}]}', '2020-05-24 15:32:03', 'dvxvxvc', 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `costs` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `content`, `category_id`, `image`, `costs`) VALUES
(1, 'Брюки 1', 'аыфа', 'Хорошие брюки', 2, '', '100'),
(2, 'Футболка2', 'Классная футболка', 'Хорошая красная футболка', 1, '', '100'),
(3, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', '100'),
(4, 'Брюки 2', 'аыфа', 'Хорошие брюки', 2, '', '100'),
(5, 'Футболка3', 'Классная футболка', 'Хорошая красная футболка', 1, '', '123'),
(6, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', '134'),
(7, 'Брюки 3', 'аыфа', 'Хорошие брюки', 2, '', '127'),
(8, 'Футболка4', 'Классная футболка', 'Хорошая красная футболка', 1, '', '123'),
(9, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', '421'),
(10, 'Брюки 4', 'аыфа', 'Хорошие брюки', 2, '', '123'),
(11, 'Футболка5', 'Классная футболка', 'Хорошая красная футболка', 1, '', '321'),
(12, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', '112'),
(13, 'Брюки 5', 'аыфа', 'Хорошие брюки', 2, '', ''),
(14, 'Футболка6', 'Классная футболка', 'Хорошая красная футболка', 1, '', ''),
(15, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', ''),
(16, 'Брюки 6', 'аыфа', 'Хорошие брюки', 2, '', ''),
(17, 'Футболка7', 'Классная футболка', 'Хорошая красная футболка', 1, '', ''),
(18, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', ''),
(19, 'Брюки 7', 'аыфа', 'Хорошие брюки', 2, '', ''),
(20, 'Футболка2', 'Классная футболка', 'Хорошая красная футболка', 1, '', ''),
(21, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', ''),
(22, 'Брюки 8', 'аыфа', 'Хорошие брюки', 2, '', ''),
(23, 'Футболка2', 'Классная футболка', 'Хорошая красная футболка', 1, '', ''),
(24, 'Кроссовки', 'Кросссовки', 'Хорошие кроссовки', 3, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `veryfided` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `email`, `password`, `confirm_mail`, `veryfided`) VALUES
(44, 'qwerty', '', 'qwerty@i.ua', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', 1),
(45, 'Ivan', '', 'ivan@i.ua', '2c42e5cf1cdbafea04ed267018ef1511', '', 1),
(46, 'peter', '', 'peter@i.ua', '51dc30ddc473d43a6011e9ebba6ca770', '', 1),
(47, 'Kate', '', 'kate@i.ua', '29ddc288099264c17b07baf44d3f0adc', '', 1),
(56, 'David', '', 'david@i.ua', '172522ec1028ab781d9dfd17eaca4427', '', 1),
(57, 'Mike', '', 'mike@i.ua', '18126e7bd3f84b3f3e4df094def5b7de', '', 1),
(62, 'Bike', '', 'bike@i.ua', 'dde2c7ad63ad86d6a18de781205d194f', '', 1),
(63, 'Nike', '', 'nike@i.ua', '41fd220f05ed0d8c56e3b83af87d45d7', '', 1),
(64, 'Fike', '', 'fike@i.ua', '85d4903c31fd6371a8d47d95a93ca8ba', '', 1),
(66, 'Cike', '', 'cike@i.ua', '8f2dd03386411f7137dae2a88a6a4673', '', 1),
(67, 'fdsfd', '4234234', '', '', '', 0),
(68, 'hgjgjg', '53532', '', '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
