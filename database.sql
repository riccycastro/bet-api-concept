-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 09, 2024 at 04:59 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `balance`) VALUES
(1, 1, 235.11);

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `bet_amount` double NOT NULL,
  `bet_number` int NOT NULL,
  `generated_number` int NOT NULL,
  `payout` double NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`id`, `user_id`, `bet_amount`, `bet_number`, `generated_number`, `payout`, `created_at`) VALUES
(1, 1, 10, 2, 1, 0, '2024-05-09 16:29:18'),
(2, 1, 10, 2, 8, 0, '2024-05-09 16:29:32'),
(3, 1, 10, 2, 9, 0, '2024-05-09 16:29:37'),
(4, 1, 10, 2, 2, 10.73, '2024-05-09 16:29:43'),
(5, 1, 10, 2, 12, 0, '2024-05-09 16:42:37'),
(6, 1, 10, 2, 7, 0, '2024-05-09 16:42:39'),
(7, 1, 10, 2, 6, 0, '2024-05-09 16:42:40'),
(8, 1, 10, 2, 1, 0, '2024-05-09 16:42:42'),
(9, 1, 10, 2, 4, 0, '2024-05-09 16:42:43'),
(10, 1, 10, 2, 5, 0, '2024-05-09 16:42:44'),
(11, 1, 10, 2, 13, 0, '2024-05-09 16:42:45'),
(12, 1, 10, 2, 1, 0, '2024-05-09 16:42:46'),
(13, 1, 10, 2, 11, 0, '2024-05-09 16:42:47'),
(14, 1, 10, 2, 10, 0, '2024-05-09 16:42:48'),
(15, 1, 10, 2, 6, 0, '2024-05-09 16:42:49'),
(16, 1, 10, 2, 0, 0, '2024-05-09 16:42:50'),
(17, 1, 10, 2, 0, 0, '2024-05-09 16:42:56'),
(18, 1, 10, 2, 3, 0, '2024-05-09 16:42:57'),
(19, 1, 10, 2, 11, 0, '2024-05-09 16:42:58'),
(20, 1, 10, 2, 8, 0, '2024-05-09 16:42:59'),
(21, 1, 10, 2, 4, 0, '2024-05-09 16:42:59'),
(22, 1, 10, 2, 11, 0, '2024-05-09 16:43:00'),
(23, 1, 10, 2, 2, 10.73, '2024-05-09 16:43:01'),
(24, 1, 10, 2, 9, 0, '2024-05-09 16:44:58'),
(25, 1, 10, 2, 11, 0, '2024-05-09 16:44:59'),
(26, 1, 10, 2, 2, 10.73, '2024-05-09 16:45:00'),
(27, 1, 10, 2, 2, 10.73, '2024-05-09 16:55:04'),
(28, 1, 10, 2, 9, 0, '2024-05-09 16:55:34'),
(29, 1, 10, 2, 0, 0, '2024-05-09 16:55:42'),
(30, 1, 10, 2, 10, 0, '2024-05-09 16:55:45'),
(31, 1, 10, 2, 0, 0, '2024-05-09 16:55:48'),
(32, 1, 10, 2, 2, 10.73, '2024-05-09 16:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`, `created_at`) VALUES
(1, 'ricardo_castro', '123', '1234567890', '2024-05-09 00:52:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `bets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
