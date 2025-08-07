-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `username`, `email`, `message`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 'Иван Петров', 'ivan.petrov@example.com', 'Отличный сайт! Спасибо за информацию.', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-08-07 17:33:13'),
(2, 'Анна Смирнова', 'anna.smirnova@example.com', 'Очень понравился ваш ресурс. Буду заходить чаще.', '192.168.0.2', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', '2025-08-07 17:33:13'),
(3, 'Олег Кузнецов', 'oleg.kuz@example.com', 'Полезные материалы. Особенно статьи по PHP.', '192.168.0.3', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64)', '2025-08-07 17:33:13'),
(4, 'Мария Соколова', 'maria.sok@example.com', 'Спасибо за вашу работу. Всё работает отлично!', '192.168.0.4', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X)', '2025-08-07 17:33:13'),
(5, 'Алексей Иванов', 'alex.ivanov@example.com', 'Есть пара предложений по улучшению. Написал на почту.', '192.168.0.5', 'Mozilla/5.0 (Windows NT 6.1; WOW64)', '2025-08-07 17:33:13'),
(6, 'Елена Орлова', 'elena.orlova@example.com', 'Быстро нашла нужную информацию. Спасибо!', '192.168.0.6', 'Mozilla/5.0 (Linux; Android 11; Pixel 5)', '2025-08-07 17:33:13'),
(7, 'Дмитрий Васильев', 'd.vas@example.com', 'Удобный интерфейс, хорошая навигация.', '192.168.0.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-08-07 17:33:13'),
(8, 'Светлана Морозова', 'svet.moroz@example.com', 'Очень красиво оформлено. Приятно читать.', '192.168.0.8', 'Mozilla/5.0 (iPad; CPU OS 13_2 like Mac OS X)', '2025-08-07 17:33:13'),
(9, 'Николай Ефимов', 'n.efimov@example.com', 'Добавьте, пожалуйста, больше тем по JavaScript.', '192.168.0.9', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3)', '2025-08-07 17:33:13'),
(10, 'Виктория Белова', 'v.belova@example.com', 'Спасибо! Всё понравилось.', '192.168.0.10', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64)', '2025-08-07 17:33:13'),
(11, 'Павел Федоров', 'pavel.fed@example.com', 'Немного не разобрался с навигацией, но в целом хорошо.', '192.168.0.11', 'Mozilla/5.0 (X11; Linux x86_64)', '2025-08-07 17:33:13'),
(12, 'Татьяна Мельникова', 't.meln@example.com', 'Потрясающий сайт. Видно, что делали с душой.', '192.168.0.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-08-07 17:33:13'),
(13, 'Артём Зайцев', 'artem.z@example.com', 'Буду рекомендовать друзьям!', '192.168.0.13', 'Mozilla/5.0 (Android 10; Mobile; rv:89.0)', '2025-08-07 17:33:13'),
(14, 'Инна Гаврилова', 'inna.gav@example.com', 'Хотелось бы тёмную тему оформления.', '192.168.0.14', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_2_1 like Mac OS X)', '2025-08-07 17:33:13'),
(15, 'Руслан Миронов', 'rus.mironov@example.com', 'Спасибо за поддержку на почте. Очень помогли!', '192.168.0.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-08-07 17:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`) VALUES
(5, 'Админ Сайт', 'admin@example.com', '$2y$10$us9dxRnAzWD/zNIXAZUtxuTpCFzFny5z05jZsTiwd7W6qEl1lR0M2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
