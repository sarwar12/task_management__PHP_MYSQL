-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 07:17 PM
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
-- Database: `task_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `recipient`, `type`, `date`, `is_read`) VALUES
(1, 'Customer feedback Survey Analysis has been assigned to you. Please review and start working on it.', 9, 'New Task Assigned', '2025-01-23', 1),
(2, '\'New Task\' has been assigned to you. Please review and start  working on it', 9, 'New Task Assigned', '0000-00-00', 1),
(3, '\'Complete Task\' has been assigned to you. Please review and start  working on it', 9, 'New Task Assigned', '2023-01-25', 1),
(4, '\'New Task Today\' has been assigned to you. Please review and start  working on it', 9, 'New Task Assigned', '2025-01-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('pending','in_progress','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `assigned_to`, `due_date`, `status`, `created_at`) VALUES
(3, 'Restaurent Project updated', 'Fastfood and coffee', 9, NULL, 'in_progress', '2025-01-19 09:23:08'),
(4, 'Food Panda', 'Create this project', 3, '2025-01-20', 'pending', '2025-01-19 10:01:03'),
(5, 'Work 01', 'Word Description', 9, '2025-01-25', 'completed', '2025-01-20 16:29:42'),
(6, 'Work 02', 'How to solve this problem', 9, '2025-01-21', 'pending', '2025-01-21 04:52:32'),
(7, 'Work 03', 'done the work', 9, '2025-01-22', 'in_progress', '2025-01-21 16:09:36'),
(8, 'Work 04', 'this is work four', 9, '2025-01-19', 'pending', '2025-01-21 16:37:36'),
(9, 'Work 05', 'this is work five', 9, '2025-01-19', 'in_progress', '2025-01-21 16:37:36'),
(10, 'New Task', 'now finished the word', 9, '2025-01-24', 'pending', '2025-01-23 10:21:31'),
(11, 'Complete Task', 'Today complete this work', 9, '2025-01-24', 'pending', '2025-01-23 10:25:08'),
(12, 'New Task Today', 'Release Description', 9, '2025-01-31', 'pending', '2025-01-23 17:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employee') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'sarwar khan', 'admin', '$2y$10$RKbnDAND5OgYZeMUnBUqS.eyjI1ikd4ytLFwVjIZrobS6kYSHewuK', 'admin', '2025-01-14 16:48:17'),
(2, 'nahin khan', 'nahink', '$2y$10$cndMSvbV716PZYh8Ow3IjeTtUFWQWltQyLmvzg0.SXy4DBWHC0U1a', 'employee', '2025-01-14 16:52:06'),
(3, 'Abrar Nahn', 'abrarn', '12311', 'employee', '2025-01-16 10:06:56'),
(7, 'rahul khan', 'rahul', '$2y$10$5zW3opo5KqcpEkwM4vz4M.Wid3btnvFA0jncGwd7TX2AaK2MqCsCu', 'employee', '2025-01-16 18:58:10'),
(9, 'Sadat Khan', 'sadat', '$2y$10$1zBK.vIIFdh55QYn/duMn.TtZGY6UYvJlO7oZ221XX7QeO3SHupw6', 'employee', '2025-01-19 09:31:01'),
(10, 'Abrar Fahad', 'abrar', '123', 'employee', '2025-01-16 10:06:56'),
(11, 'Abdulla Jahangir', 'adjahangir', '$2y$10$fwQp/RGEVNjvKJFLWWIBD.cjzhu0g9npVc8UrStYnyKOy9dBcUYHC', 'employee', '2025-01-21 09:05:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
