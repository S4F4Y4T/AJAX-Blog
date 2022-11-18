-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2022 at 02:25 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_token`
--

CREATE TABLE `login_token` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_token`
--

INSERT INTO `login_token` (`id`, `user_id`, `token`) VALUES
(1, 1, '7176e920a3dc5f9e9780323b1ca80e5e37fa0d82'),
(3, 1, '45ce092cfca673d40ad6108298ceb0c24303bf6a'),
(5, 3, 'cd5caee4355c2f5642a6bc50237029a96aa13d09');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(64) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `body`, `image`, `date`) VALUES
(27, 3, 'this is title', 'this is post body', '59d334db04.png', '2022-11-18 14:22:59'),
(29, 3, 'dsfsad', 'fdsfds', 'ea35f4020d.png', '2022-11-18 14:24:15'),
(30, 3, 'sdfsdf', 'sdfdsfds', 'f70a598557.png', '2022-11-18 14:24:18'),
(31, 3, 'sdfsdf', 'sdfsdf', '9933bd90c0.png', '2022-11-18 14:24:20'),
(32, 3, 'fsdfds', 'fsdfdsf', 'ab63e680d2.png', '2022-11-18 14:24:23'),
(33, 3, 'fdsfdsf', 'sadfsdafsd', '78e7c0d787.png', '2022-11-18 14:24:25'),
(34, 3, 'sdfdsaf', 'sadfsadf', '2d8ef902a7.png', '2022-11-18 14:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'safayat', 'safayat69@gmail.com', 'a3fda8eb3748117ee3e82e1c8a159f6bf5fff48a'),
(2, 'razi', 'razi@gmail.com', '4321f0274585b6038d8fc35cfda4dbdb76145dfe'),
(3, 'parvez', 'parvez@gmail.com', '4321f0274585b6038d8fc35cfda4dbdb76145dfe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_token`
--
ALTER TABLE `login_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_token`
--
ALTER TABLE `login_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
