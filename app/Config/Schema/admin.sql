-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 06:43 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `passwordstatus` tinyint(1) NOT NULL,
  `remembertoken` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `passwordstatus`, `remembertoken`, `created`, `modified`) VALUES
(1, 'admin@admin.com', '9a2ce73bde64af02061df81ec8b6c0cb', 1, 0, 'db6269382b517db72e72bc0e16f1aba4', '2013-04-26 00:00:00', '2013-09-13 10:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `breadcrumbs`
--

CREATE TABLE IF NOT EXISTS `breadcrumbs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `keyval` varchar(255) DEFAULT NULL,
  `keycontroller` varchar(255) DEFAULT NULL,
  `keyaction` varchar(255) DEFAULT NULL,
  `keylink` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `breadcrumbs`
--

INSERT INTO `breadcrumbs` (`id`, `controller`, `action`, `keyval`, `keycontroller`, `keyaction`, `keylink`, `status`, `created`, `modified`) VALUES
(1, 'admins', 'dashboard', 'Home', 'admins', 'dashboard', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(2, 'admins', 'changepassword', 'Home', 'admins', 'dashboard', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(3, 'admins', 'changepassword', 'Change Password', 'admins', 'changepassword', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(4, 'admins', 'index', 'Home', 'admins', 'dashboard', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(5, 'admins', 'index', 'Admins', 'admins', 'index', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(6, 'admins', 'add', 'Home', 'admins', 'dashboard', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(7, 'admins', 'add', 'Admins', 'admins', 'index', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(8, 'admins', 'add', 'Add Admin', 'admins', 'index', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(9, 'admins', 'edit', 'Home', 'admins', 'dashboard', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(10, 'admins', 'edit', 'Admins', 'admins', 'index', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(11, 'admins', 'edit', 'Edit Admin', 'admins', 'index', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(12, 'admins', 'editprofile', 'Home', 'admins', 'dashboard', 1, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17'),
(13, 'admins', 'editprofile', 'Edit Profile', 'admins', 'index', 0, 1, '2013-04-29 12:26:17', '2013-04-29 12:26:17');
