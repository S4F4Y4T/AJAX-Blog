-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2020 at 02:10 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_token`
--

CREATE TABLE `login_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_token`
--

INSERT INTO `login_token` (`id`, `user_id`, `token`) VALUES
(1, 1, '7176e920a3dc5f9e9780323b1ca80e5e37fa0d82'),
(3, 1, '45ce092cfca673d40ad6108298ceb0c24303bf6a');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `body`, `image`) VALUES
(3, 1, 'My first fucking post goes here', 'sex in my fucking mind right now', '1c3a20e055.png'),
(4, 1, 'dsfds', 'dsf', '6912207d8a.png'),
(5, 1, 'dsds', 'dsfd', '142f2e1b51.png'),
(6, 1, 'dsfds', 'dsfd', 'c94b20ecca.png'),
(7, 1, 'dsfd', 'dsd', '24b8f98dcb.png'),
(8, 1, 'dsds', 'fdsf', 'a581c23ae7.png'),
(9, 1, 'sdf', 'sdfsd', '1128039e04.png'),
(10, 1, 'sfds', 'fdsf', '4c7df629b6.png'),
(11, 1, 'sfdsf', 'dsfds', '64c32c4a20.png'),
(12, 1, 'fsdfds', 'dsfds', '782c80ae6b.png'),
(13, 1, 'dsfsd', 'sdfds', 'b88f389e2c.png'),
(14, 1, 'sdfds', 'sdfds', '57c9b21670.png'),
(15, 1, 'fdsf', 'sdfds', '880c64f286.png'),
(16, 1, 'fdsf', 'sfds', '77112e6303.png'),
(17, 1, 'dsfds', 'dfsdf', '97015a7379.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'safayat', 'safayat69@gmail.com', 'a3fda8eb3748117ee3e82e1c8a159f6bf5fff48a');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
