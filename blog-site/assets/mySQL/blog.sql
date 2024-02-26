-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 26 2024 г., 20:59
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `creator` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `created_at`, `creator`, `category`) VALUES
(1, 'Build Your New Idea with Laravel Freamwork!!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:19:15', 'user1', 'Laravel'),
(2, 'Accessibility tools for designers and developers', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!!!', '2024-02-13 21:19:40', 'user1', 'Design'),
(3, 'PHP: Array to Map', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!!!', '2024-02-13 21:20:05', 'user2', 'PHP'),
(4, 'Django Dashboard - Learn by Coding', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!!!', '2024-02-13 21:20:30', 'user2', 'Django'),
(5, 'Build Your New Idea with Laravel Freamwork!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!!!', '2024-02-13 21:21:16', 'user4', 'Testing'),
(6, 'Laravel Project Build', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:22:39', 'user4', 'Laravel'),
(7, 'PHP: Array to Map Conversion', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:23:44', 'user2', 'PHP'),
(8, 'Vue.js for Reactive Web Design', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:24:13', 'user2', 'Vue.js'),
(9, 'Python Security Essentials', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:24:38', 'user1', 'Python'),
(10, 'Advanced C# Programming', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:25:46', 'user1', 'C#'),
(11, 'Modern HTML5 and CSS3', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:26:07', 'user1', 'HTML/CSS'),
(12, 'Data Science in Python', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:26:24', 'user1', 'Python'),
(13, 'Creative JavaScript Coding', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!', '2024-02-13 21:26:38', 'user1', 'JavaScript'),
(14, 'test admin title', 'test admin content', '2024-02-23 10:53:01', 'admin1', 'test admin category');

-- --------------------------------------------------------

--
-- Структура таблицы `usersdb`
--

CREATE TABLE `usersdb` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usersdb`
--

INSERT INTO `usersdb` (`id`, `username`, `password`, `role`) VALUES
(1, 'user1', '$2y$10$.IKkoXBRBobAzhCL1471w.KC2zJLR8wK.9bKaljJTxAVeLXlS/3Ou', 'user'),
(2, 'user2', '$2y$10$cahEq7bVy.ijEquHn0kqPOgSBJfloLwKeNtQdJ8Gvm/t8pldQVsI.', 'user'),
(3, 'user3', '$2y$10$w9/BscIgxQp/3SlMAojIEe5b.yC5xnCwqjTH/a6RCGqDfkKjNxuW6', 'user'),
(4, 'user4', '$2y$10$YdSqkWpu4j2dM975KTCDluFSU7u.b.93KRKSM3vrtZ1R1FtA81oVq', 'user'),
(5, 'user5', '$2y$10$3gQnhs59FEN2dZd97GmyLOwFxk5uDDVqUtppFr1nTs5Ad8f6wjThq', 'user'),
(6, 'admin1', '$2y$10$D9koZN0YTsIX21cSLUWpS.567aAMl/e6IS5QbsT4j/GSkCvJo0gx2', 'admin'),
(7, 'admin2', '$2y$10$Q0AlfOmKetDvFE5uJQJlsO63vKW4yKzERQM/qMAH06LRP4MsH3r4i', 'admin'),
(8, '', '$2y$10$KTdTnuAfEeC1BN.KF.Pmo.MMTJoPoxklxWTSLGRmsz.b1Q8lePdx.', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Индексы таблицы `usersdb`
--
ALTER TABLE `usersdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `usersdb`
--
ALTER TABLE `usersdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
