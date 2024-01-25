-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 09:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worklog`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `aktivitas`, `tanggal`, `waktu_mulai`, `waktu_akhir`, `users_id`) VALUES
(13, 'mika yudha ajeng jois ivy. yey', '2024-01-25', '08:27:00', '14:27:00', 2),
(14, 'yeuahdousedaw', '2024-01-25', '08:29:00', '14:29:00', 1),
(15, 'test', '2024-01-25', '08:43:00', '08:45:00', 2),
(16, 'adawdsw', '2024-01-25', '10:59:00', '12:59:00', 2),
(17, 'asdawdas', '2024-01-25', '11:32:00', '15:32:00', 1),
(18, 'tes', '2024-01-24', '11:40:00', '12:40:00', 2),
(19, 'lagi makan di icon pondok indah', '2024-01-23', '09:00:00', '13:15:00', 2),
(20, 'sdfsd', '2024-01-25', '14:39:00', '19:39:00', 2),
(21, 'asdawds', '2024-01-25', '14:42:00', '14:43:00', 2),
(22, 'asdaswdxzf', '2024-01-25', '14:41:00', '20:39:00', 2),
(23, 'asdawdsdswad', '2024-01-25', '03:39:00', '20:40:00', 2),
(24, 'awdaswdwasd', '2024-01-25', '14:43:00', '20:40:00', 2),
(25, 'awdsaswda', '2024-01-25', '16:40:00', '19:40:00', 2),
(27, 'awdasdwawdasdwsdawdsdawdsdadsadw', '2024-01-25', '15:00:00', '20:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'mikhael.natalnael', 'passwordmika'),
(2, 'yudhazulkarnaen', 'passwordyudha'),
(4, 'richiemartin', 'passwordrichie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_activities_users` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
