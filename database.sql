-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2015 at 06:15 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sports_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE `Article` (
  `Article_ID` int(1) NOT NULL AUTO_INCREMENT,
  `Article_Name` varchar(255) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Favorites` int(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Article_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`Article_ID`, `Article_Name`, `Content`, `User_ID`, `Date`, `Favorites`, `Status`) VALUES
(1, 'Example Article 1', 'this article is an example. Go nets.', 0, '2015-02-23', 0, 0),
(2, 'Second example', 'this article is my second example', 0, '2015-02-24', 0, 0),
(3, 'example three', 'this is my third article example', 0, '2015-02-18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ArticleTag`
--

CREATE TABLE `ArticleTag` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `Article_ID` int(11) NOT NULL,
  `Tag_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ArticleTag`
--

INSERT INTO `ArticleTag` (`id`, `Article_ID`, `Tag_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 2, 4),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE `Tags` (
  `Tag_ID` int(1) NOT NULL AUTO_INCREMENT,
  `Tag` varchar(30) NOT NULL,
  PRIMARY KEY (`Tag_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Tags`
--

INSERT INTO `Tags` (`Tag_ID`, `Tag`) VALUES
(1, 'Knicks'),
(2, 'Nets'),
(3, 'Basketball'),
(4, 'Baseball');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(1) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `User_Level` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserTag`
--

CREATE TABLE `UserTag` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Tag_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;