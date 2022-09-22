-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 08:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note_imgs` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`, `time`, `note_imgs`) VALUES
(133, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 09:25:31', 'IMG_5420.JPG'),
(134, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 09:25:45', 'IMG_5420.JPG'),
(135, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 09:26:07', 'IMG_5420.JPG'),
(136, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 09:31:04', 'IMG_5420.JPG'),
(137, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 09:32:41', 'IMG_5420.JPG'),
(138, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 10:03:39', 'IMG_5420.JPG'),
(139, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 10:05:47', 'IMG_5420.JPG'),
(140, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 10:06:29', 'IMG_5420.JPG'),
(141, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 10:06:38', 'IMG_5294.JPG'),
(142, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 12:44:28', 'IMG_5404.JPG'),
(144, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 13:22:19', '166272645103.jpg'),
(145, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 13:22:43', '166272645103.jpg'),
(146, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 13:22:48', '166272645103.jpg'),
(147, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 13:25:00', '1662726450998.jpg'),
(148, 'This is corephp  blog project ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, saepe!', '2022-09-16 13:25:24', '1662726451026.jpg'),
(149, 'This is corephp  blog project ', 'gfgfg', '2022-09-16 13:25:52', '1662726451035.jpg'),
(150, 'mehadi ', 'hasan', '2022-09-16 15:48:39', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
