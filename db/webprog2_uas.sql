-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog2_uas`
--
CREATE DATABASE IF NOT EXISTS `webprog2_uas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webprog2_uas`;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `desc`) VALUES
(1, 'Foundation for the Future', '                                                                                                                Aranastudio is a freelance IT development team based in Depok, Indonesia. We are committed to realize innovations and ideas into various digital products towards an integrated future. Our team have almost 5 years of experience working as a freelance software developer. Over the years we grow our team to keep up with demands from the industry, so we could help our clients to grow their businesses. With all that the future of IT has to offer, Aranastudio is ready to help you realize your needs. Established in March 2018, Aranastudio is a freelance IT development company found by three buddies of students of Politeknik Negeri Jakarta\'s Faculty of Information and Technology, Ari Ramandana (28), Dwi Kusuma Ramayana (27), and Dagda Humaira Jahza (28) who graduated in 2016. Aranastudio was started simply as a team of freelancers grouped together to be able to accomplish more as one. After accomplishing many projects as Aranastudio, Ari decided to make Aranastudio a bigger team, and started recruitments for new developers to add to the team. Today, Aranastudio is composed of 30 employees, working as freelancers to help each other as a team to help people get projects done faster as more efficient.                                                                                 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`) VALUES
(14, 'adminbaru', '$2y$10$cxW7ArvlKB1nWv2yhAnVBOTNwHnoRAd/JvDXkH2XCHZryvcq7nD/K', 'izzati43@mail.com', 'Rozana'),
(15, 'arya123', '$2y$10$8l.Hon4U0XA0ETfz4zP6E.ljJdIozXOXfQ1fFUBTBqvZ../KDVbJi', 'user@mail.com', 'Arya'),
(16, 'nabila123', '$2y$10$PnZ2ZBDPwpETMvHMYTzDz.Pcu9eKCnYQTtaeThhYGgN8Z7jUVUdmy', 'nabilamail@gmail.com', 'Nabila');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `image`, `title`, `description`) VALUES
(3, 'FireShot Capture 026 - Home - OkeGarden - okegarden.com.png', 'OKEGarden', 'Web-based E-Commerce platform untuk produk-produk pertamanan seperti tanaman hias, tanaman herbal, dsb. dan juga konsultasi tentang desain taman dengan ahli pertamanan, 2020'),
(4, 'dorinku.png', 'Doringku App', 'Mobile-based application pembelian minuman Doringku, 2019'),
(5, 'Perpustakaan Bebas.png', 'Perpustakaan Bebas', 'Web application inventory management Perpustakaan Bebas yang berpusat di Jakarta Timur, 2018'),
(6, 'PethyCare.png', 'PethyCare', 'Telemedicine khusus pelayanan kesehatan hewan peliharaan, seperti kucing, anjing, dan kelinci, 2018'),
(9, 'FireShot Capture 016 - Home Page - Flextronics Co. - localhost.png', 'Flextronics Co.', 'Web application untuk inventory management toko elektronik Flextronics Co., 2017'),
(10, 'BookBer.png', 'BookBer', 'Android-based Mobile e-Bookstore Application untuk digitalisasi toko buku PT. Buku Bersama, Tbk., 2017'),
(11, 'logo-pemira.jpeg', 'e-Election Web App PEMIRA PNJ 2021 ', 'Web app pemilihan ketua BEM/MPM dan ketua HMJ PEMIRA PNJ 2021, 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
