-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 12:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `costumer` varchar(255) NOT NULL,
  `costumerid` int(11) NOT NULL,
  `listofproducts` longtext NOT NULL,
  `total` int(11) NOT NULL,
  `costumeremail` varchar(255) NOT NULL,
  `costumeraddress` varchar(255) NOT NULL,
  `costumerzipcode` varchar(255) NOT NULL,
  `checkout_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `costumer`, `costumerid`, `listofproducts`, `total`, `costumeremail`, `costumeraddress`, `costumerzipcode`, `checkout_time`) VALUES
(14, 'Hugo Bomtempo Furtado', 7, '{\"3\":{\"quantity\":1,\"price\":\"10\"}}', 10, 'hugo12bf@yahoo.com.br', '49, Rue de Geneve', '1210', '2020-02-16 14:04:35'),
(15, 'Hugo Bomtempo Furtado', 7, 'null', 0, 'hugo12bf@yahoo.com.br', '49, Rue de Geneve', '1210', '2020-02-16 14:05:33'),
(16, 'zedasilva', 13, '{\"9\":{\"quantity\":1,\"price\":\"18\"}}', 18, 'zezin@gmail.com', '', '0', '2020-02-17 09:26:37'),
(17, 'zedasilva', 13, '{\"2\":{\"quantity\":1,\"price\":\"10\"}}', 10, 'zezin@gmail.com', '', '0', '2020-02-17 09:31:43'),
(18, 'john', 15, '{\"2\":{\"quantity\":2,\"price\":\"10\"}}', 20, 'john@gmail.com', 'hfhgfh', '1235', '2020-02-17 10:49:40'),
(19, 'dfgd', 16, '{\"3\":{\"quantity\":1,\"price\":\"10\"},\"2\":{\"quantity\":1,\"price\":\"10\"}}', 20, 'hugo@gmail.com', '49 Rue de Geneve', '1210', '2020-02-18 09:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `pauthor` varchar(255) NOT NULL,
  `pisbn` bigint(20) NOT NULL,
  `pprice` int(11) NOT NULL,
  `pcategory` varchar(255) NOT NULL,
  `pimg1` varchar(255) NOT NULL,
  `pcreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `pdescription` longtext NOT NULL,
  `pstock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ptitle`, `pauthor`, `pisbn`, `pprice`, `pcategory`, `pimg1`, `pcreation`, `pdescription`, `pstock`) VALUES
(2, 'The Fellowship of the Ring', 'J.R.R.Tolkien', 9780345339706, 10, 'Fantasy', 'tolkien1.jpg', '2020-01-29 09:56:19', '', 100),
(3, 'The Two Towers', 'J.R.R.Tolkien', 9780345339713, 10, 'Fantasy', 'tolkien2.jpg', '2020-01-29 09:58:34', '', 100),
(4, 'The Return of the King', 'J.R.R.Tolkien', 9780345339737, 10, 'Fantasy', 'tolkien3.jpg', '2020-01-29 09:59:29', '', 100),
(5, 'A Brief History of Time', 'Stephen Hawking, Leonard Mlodinow', 9780553385465, 20, 'Science', 'hawkings1.jpg', '2020-01-29 10:31:45', '', 100),
(6, 'The Grand Design', 'Stephen Hawking, Leonard Mlodinow', 9780553384666, 18, 'Science', 'hawkings2.jpg', '2020-01-29 10:33:39', '', 100),
(7, 'The Universe in a Nutshell', 'Stephen Hawking', 9780553802023, 30, 'Science', 'hawkings3.jpg', '2020-01-29 10:34:39', '', 100),
(9, 'Animal Farm', 'George Orwell', 9780451526342, 18, 'Fiction', 'orwell2.jpg', '2020-01-29 10:45:21', '', 100),
(10, 'Homage to Catalonia', 'George Orwell', 9780544382046, 14, 'Fiction', 'orwell3.jpg', '2020-01-29 10:46:31', '', 100),
(11, 'Talking to Strangers', 'Malcolm Gladwell', 9780316478526, 16, 'Essay', 'gladwell1.jpg', '2020-01-29 10:51:28', '', 100),
(12, 'Outliers: The Story of Success', 'Malcolm Gladwell', 9780316017930, 16, 'Essay', 'gladwell2.jpg', '2020-01-29 10:52:13', '', 100),
(13, 'Blink: The Power of Thinking without Thinking', 'Malcolm Gladwell', 9780316010665, 16, 'Essay', 'gladwell3.jpg', '2020-01-29 10:52:39', '', 100),
(14, 'The Tipping Point', 'Malcolm Gladwell', 9780316346627, 16, 'Essay', 'gladwell4.jpg', '2020-01-29 10:53:05', '', 100),
(15, 'The Drunkards Walk', 'Leonard Mlodinow', 9780307275172, 15, 'Science', 'mlodinow1.jpg', '2020-01-29 11:06:32', '', 100),
(16, 'Subliminal', 'Leonard Mlodinow', 9780307472250, 14, 'Science', 'mlodinow2.jpg', '2020-01-29 11:07:09', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ucreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` longtext NOT NULL,
  `zipcode` int(11) NOT NULL,
  `wishlist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `ucreation`, `address`, `zipcode`, `wishlist`) VALUES
(4, 'Hugo Bomtempo Furtado', 'e10adc3949ba59abbe56e057f20f883e', '', '2020-02-05 15:14:42', '', 0, ''),
(7, 'Hugo Bomtempo Furtado', 'e10adc3949ba59abbe56e057f20f883e', 'hugo12bf@yahoo.com.br', '2020-02-06 09:28:17', '0', 1210, 'aa3aa16aaa2a2a2a2a3'),
(12, 'jose da silva', 'e10adc3949ba59abbe56e057f20f883e', 'jose@hotmail.co', '2020-02-17 09:12:16', '', 0, ''),
(13, 'zedasilva', '3ab7d910787ba1bc39e0a5a8cb5a81f4', 'zezin@gmail.com', '2020-02-17 09:26:13', '', 0, ''),
(14, 'joao', '005f47cddf568dacb8d03e20ba682cf9', 'joao@gmail.com', '2020-02-17 09:46:41', '47, Rue de Lausanne', 1234, 'a2'),
(15, 'john', '465828fc05b1e68234390c027924f023', 'john@gmail.com', '2020-02-17 10:45:49', 'hfhgfh', 1235, 'a2a3'),
(16, 'dfgd', '9f25d1e262541f85917ab49ccf2c3a67', 'hugo@gmail.com', '2020-02-18 09:35:23', '49 Rue de Geneve', 1210, ''),
(20, 'asda', 'd131caf274de23345de02b10baca5934', 'hugo12bf@yahoo.com.br', '2020-02-18 10:44:08', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
