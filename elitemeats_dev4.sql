-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 01:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elitemeats_dev1`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--


CREATE TABLE IF NOT EXISTS `categories` (
  `cat_categoryID` int(11) NOT NULL,
  `cat_categoryName` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `categories`:
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_categoryID`, `cat_categoryName`) VALUES
(1, 'beef'),
(2, 'chicken'),
(3, 'pork'),
(4, 'seafood');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--


CREATE TABLE IF NOT EXISTS `comments` (
  `com_commentID` int(11) NOT NULL,
  `com_commemtText` text NOT NULL,
  `com_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `comments`:
--   `com_userID`
--       `users` -> `users_userID`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--


CREATE TABLE IF NOT EXISTS `products` (
  `prod_productID` int(11) NOT NULL,
  `prod_categoryID` int(11) NOT NULL,
  `prod_prodCode` varchar(60) NOT NULL,
  `prod_productName` varchar(60) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `products`:
--   `prod_categoryID`
--       `categories` -> `cat_categoryID`
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_productID`, `prod_categoryID`, `prod_prodCode`, `prod_productName`, `prod_description`, `prod_price`, `prod_date`) VALUES
(1, 1, 'beef', 'beef package 1', 'many packages of beef', '100.00', '2016-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


CREATE TABLE IF NOT EXISTS `users` (
  `users_userID` int(11) NOT NULL,
  `users_username` varchar(255) NOT NULL,
  `users_password` varchar(60) NOT NULL,
  `users_userLevel` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_userID`, `users_username`, `users_password`, `users_userLevel`) VALUES



--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--


--
-- Indexes for table `comments`
--


--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_productID`),
  ADD KEY `prod_categoryID` (`prod_categoryID`),
  ADD KEY `prod_productName` (`prod_productName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_userID`),
  ADD UNIQUE KEY `users_emailAddress` (`users_username`),
  ADD KEY `users_emailAddress_2` (`users_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments` FOREIGN KEY (`com_userID`) REFERENCES `users` (`users_userID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`prod_categoryID`) REFERENCES `categories` (`cat_categoryID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_categoryID`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_commentID`),
  ADD KEY `fk_comments` (`com_userID`);