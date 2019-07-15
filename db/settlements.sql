-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 03, 2019 at 09:42 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `settlements`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `name` varchar(30) NOT NULL,
  `login` varchar(10) NOT NULL,
  `ps` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`name`, `login`, `ps`) VALUES
('Ivan Boyko', 'vanya', 'vanya1234');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `url` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `population` varchar(15) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`url`, `name`, `country`, `population`, `type`) VALUES
('img/cities/lviv.jpg', 'Lviv', 'Ukraine', '1,2 mln', 'city'),
('img/cities/kyiv.jpg', 'Kyiv', 'Ukraine', '4,5 mln', 'capital of Ukraine'),
('img/cities/poltava.jpg', 'Poltava', 'Ukraine', '300k', 'city'),
('img/cities/zhytomyr.jpg', 'Zhytomyr', 'Ukraine', '250k', 'city'),
('img/cities/pyriatyn.jpg', 'Pyriatyn', 'Ukraine', '16,4k', 'town'),
('img/cities/medvyn.jpg', 'Medvyn', 'Ukraine', '708', 'village'),
('img/cities/vatutino.jpg', 'Vatutino', 'Ukraine', '1436', 'village'),
('img/cities/donetsk.jpg', 'Donetsk', 'Ukraine', '0,918 mln', 'city'),
('img/cities/odessa.jpg', 'Odessa', 'Ukraine', '1,3 vln', 'city');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
