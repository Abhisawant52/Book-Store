-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 09:50 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(61) NOT NULL,
  `main` int(1) NOT NULL,
  `createOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `pass`, `main`, `createOn`) VALUES
('Abhi', 'abhi@gmail.com', '$2y$10$9Wapo6wXfMeK2rRUWs3sl.T2h2QZEK/Uu9/gJe26NjnQUnr30DWja', 1, '2021-05-24 14:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `Cid` int(4) NOT NULL,
  `Pid` int(3) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Cid`, `Pid`, `Quantity`) VALUES
(10, 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cid` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(61) NOT NULL,
  `CreateOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cid`, `name`, `email`, `pass`, `CreateOn`) VALUES
(1, 'Abhi', 'abhi@gmail.com', '$2y$10$VN6Per5wr3nXLavwnzrMVufb3UTSBwUhMKHkVVxy9ba7BTAnV/v62', '2021-05-31'),
(2, 'bhavesh', 'bhavesh@gmail.com', '$2y$10$vincvt22XcflZP9YdDiX/ecGIX.0JQw9sfOqyOrBJ/zD1Gc6lIzuy', '2021-05-31'),
(3, 'hardik', 'hardik@gmail.com', '$2y$10$qOEwYH3lveBT1hP43OD6Fuc37NbAftNqiTgKLC8OEdN8Kj3j65Jj.', '2021-05-31'),
(4, 'Ankita', 'ankita@gmail.com', '$2y$10$mvO4G.SeqgF1.wkfNR8x5utjNX.vgtn1sJO/dUzRnXLxW6yABLTY.', '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `OrderID` varchar(20) NOT NULL,
  `Cid` int(4) NOT NULL,
  `Pid` int(3) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) NOT NULL,
  `title` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(40) NOT NULL,
  `createOn` datetime NOT NULL,
  `display` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `description`, `image`, `createOn`, `display`) VALUES
(1, 'Yoga For All by Dr. Hansaji ', 150, ' Often, Yoga is equated with the physical practices such as asanas, pranayamas and kriyas, but in Yoga for All, Hansaji revisits\r\n the idea of yoga and presents it in an all-inclusive role where the person is considered in totality.  The books brings forth the\r\n joy, freshness and wholesomeness of yoga, and repositions the traditional techniques of yoga in a new and unique dimension.\r\n  This approach and techniques are taught at the Institute and has benefited its disciples, including renowned celebrities.\r\nNumber of Pages – 276.<br>\r\nWeight –  Grams<br>', 'yoga-for-all-tyi-books.png', '2020-03-20 00:16:33', 'YES'),
(2, 'Hatha Yoga Simplifie  ', 60, ' A difficult subject dealt with simplicity and in depth by Shri Yogendraji who devoted all his life in simplifying the complex \r\nsubject of yoga, so that it is understood by the layman. The book deals with some important topics like respiratory activity, \r\nsexual drive and its control, brain and nervous system with its complex network, skin – the largest organ of the body and\r\n hygiene in general.This book has been microfilmed and preserved in the Crypt of Civilization at the Oglethorpe University, \r\nAtlanta, to be opened after 6,000 years in the year 8113 A.D.<br>\r\nNumber of Pages – 173.<br>\r\nWeight – 220 Grams.\r\n\r\n', 'hatha-yoga-simplified-book.png', '2020-03-19 23:59:39', 'YES'),
(3, 'Teaching Yoga ', 100, ' The Yoga Institute, Santacruz is a Government recognized Institute and has published this book as an essential resource for new\r\n as well as experienced teachers and also a guide for all yoga students.<br>\r\nby \"Satyapal Duggal\".<br>\r\nNumber of Pages – 85.<br>\r\nWeight – 170 Grams.<br>\r\n', 'Teaching-Yoga.jpg', '2020-03-20 00:04:24', 'YES'),
(4, 'Recipes for Happines ', 120, ' This book Fulfills the needs of various people who want to follow a Yogic diet. It contains simple, healthy, tasty and quick recipes\r\n which besides being good for bodily health are also essential for spiritual and mental development.<br>\r\nby Hansaji .<br>\r\npages:80.<br>\r\nWeight – 250 Grams <br>\r\n', 'Yoga-for-back-and-joint-disorders.jpg', '2020-03-20 00:07:02', 'YES'),
(5, 'Yoga for Youngsters  ', 70, ' This book explains various Yogic techniques and concepts with the help of stories and games, teaching the young how to handle \r\nvaried life situations and be more peaceful and happy<br>\r\nby Sadhakas<br>\r\nWeight – 200 Grams.<br>', 'Yoga-For-Youngsters.jpg', '2020-03-20 00:11:36', 'YES'),
(7, 'Guide to a Fuller Life ', 140, ' The ever-growing urge for a fuller better life is dealt with here theoretically and practically. What are the stages that are \r\ninvolved in reaching such fullness in life? Eminent philosophers, intellectuals and Yogis discuss the issues lucidly in this book.<br>\r\nNumber of Pages – 71<br>\r\nWeight – 150 Grams', 'Guide-to-a-Fuller-Life.jpg', '2020-03-20 00:19:22', 'YES'),
(8, 'Facts About Yoga ', 100, ' In this book, facts about yoga have been simplified and then presented, so that the common man can understand the true \r\nsignificance of yoga, come out of his misconceptions and bring yoga into his life with the right understanding.<br>\r\nNumber of Pages – 214<br>\r\nWeight – 260 Grams', 'Facts-about-yoga.jpg', '2020-03-20 00:21:23', 'YES'),
(9, 'Yoga of Caring  ', 200, ' During their visit to Canada in 1994, Dr. Jayadeva and Smt. Hansaji gave a series of talks on all aspects of yoga, from Samkhya \r\nPhilosophy to practical techniques. The book gives a clear and complete picture on what yoga is all about.<br>\r\nWeight – 500 Grams', 'The-Yoga-of-Caring-1.jpg', '2020-03-20 00:29:36', 'YES'),
(10, 'Yoga Asanas Simplified ', 200, ' This book is intended to guide the layman to study yoga in the absence of a teacher and supplies an ideal course for daily \r\npractice which includes simple yoga postures with rhythmic breathing and which are both traditional and scientific.<br>\r\nNumber of Pages – 50<br>\r\nWeight – 230 Grams', 'Yoga-Asanas-Simplified-1.jpg', '2020-03-20 00:32:02', 'YES'),
(11, 'Why Yoga – Shri Yogendra ', 110, ' In order to help the modern man to come out of his limited perceptions and give him clarity about his purpose, Shri Yogendraji \r\nhas put forward the Yogic thesis of self-discipline, concentration and self-development in this book.<br>\r\nNumber of Pages – 182<br>\r\nWeight – 230 Grams', 'Facts-about-yoga.jpg', '2020-03-20 00:34:12', 'YES'),
(12, 'Better Humans ', 150, ' How can one develop an integrated personality which involves a right attitude, a one pointed mind and a right value system\r\n leading to becoming a better human being? Read this book to get an insight to these ideas.<br>\r\nNumber of Pages – 47<br>\r\nWeight – 80 Grams', 'better-humans.jpg', '2020-03-20 00:36:20', 'YES'),
(13, 'Guide to Meditation  ', 120, ' No other movement in recent years has so fascinated people as the possibility of calming the mind through meditation. All \r\ntechniques in Patanjali’s Classic Yoga aim at making one more aware and finally to see the true Self shining forth in its own \r\nnature. When the waters of the lake are still only then can you see your reflection. Simple guidelines are offered in this book by\r\n Shri Yogendraji to help one on this exciting journey.\r\nNumber of Pages – 113.\r\nWeight – 190 Grams.\r\n', 'Guide-to-yoga-Medition.jpg', '2020-03-19 23:53:26', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `transcationbook`
--

CREATE TABLE `transcationbook` (
  `OrderID` varchar(20) NOT NULL,
  `Cid` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `Address` text NOT NULL,
  `contactDetail` text NOT NULL,
  `price` int(8) NOT NULL,
  `PaymentInfo` text DEFAULT NULL,
  `txnStatus` varchar(20) DEFAULT NULL,
  `exceptDate` date DEFAULT NULL,
  `OrderStatus` varchar(20) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcationbook`
--
ALTER TABLE `transcationbook`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
