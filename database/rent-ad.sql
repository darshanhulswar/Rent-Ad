-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2020 at 01:51 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent-ad`
--
CREATE DATABASE IF NOT EXISTS `rent-ad` DEFAULT CHARACTER SET ascii COLLATE ascii_general_ci;
USE `rent-ad`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'darshan@gmail.com', 'root'),
(2, 'vinayak@gmail.com', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` varchar(255) NOT NULL COMMENT 'Employee User ID',
  `password` varchar(255) NOT NULL COMMENT 'Employee Password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `password`) VALUES
(1, '112233', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hall` varchar(500) NOT NULL,
  `kitchen` varchar(500) NOT NULL,
  `bathroom` varchar(500) NOT NULL,
  `bedroom` varchar(500) NOT NULL,
  `house` varchar(500) NOT NULL,
  `property` varchar(500) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=17 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `hall`, `kitchen`, `bathroom`, `bedroom`, `house`, `property`, `property_id`) VALUES
(6, '5f72a26c7caccel-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', '5f72a26c7cad3el-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', '5f72a26c7cadcel-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', '5f72a26c7cad8el-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', '5f72a26c7cae1el-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', '5f72a26c7cae5el-capitan-5120x2880-5k-4k-wallpaper-8k-forest-osx-apple-mountains-183.jpg', 14),
(9, '5f72ade309d5bimg (53).jpg', '5f72ade309d63img (53).jpg', '5f72ade309d6cimg (53).jpg', '5f72ade309d67img (53).jpg', '5f72ade309d70img (53).jpg', '5f72ade309d74img (53).jpg', 16),
(13, '5f7327d3ec11fimg (12).jpg', '5f7327d3ec128img (12).jpg', '5f7327d3ec131img (12).jpg', '5f7327d3ec12dimg (12).jpg', '5f7327d3ec135img (12).jpg', '5f7327d3ec139img (12).jpg', 21),
(14, '5f732a6c45b88img (21).jpg', '5f732a6c45b91img (21).jpg', '5f732a6c45b9aimg (21).jpg', '5f732a6c45b96img (21).jpg', '5f732a6c45b9eimg (21).jpg', '5f732a6c45ba2img (21).jpg', 23),
(15, '5f732b70beec9img (27).jpg', '5f732b70beed1img (27).jpg', '5f732b70beee1img (27).jpg', '5f732b70beed8img (27).jpg', '5f732b70beee5img (27).jpg', '5f732b70beee9img (27).jpg', 24),
(16, '5f732c2e0e2b2img (28).jpeg', '5f732c2e0e2beimg (28).jpeg', '5f732c2e0e2cdimg (28).jpeg', '5f732c2e0e2c6img (28).jpeg', '5f732c2e0e2d4img (28).jpeg', '5f732c2e0e2dbimg (28).jpeg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'property ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'Property Name or Title',
  `location` varchar(255) NOT NULL COMMENT 'Location of the property',
  `details` varchar(1000) NOT NULL COMMENT 'Property Description',
  `bed` int(2) NOT NULL COMMENT 'Bedrooms ',
  `parking` int(2) NOT NULL COMMENT 'Car parking lot',
  `rpm` varchar(10) NOT NULL COMMENT 'Rent per month / Maintenance Charges',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time of property upload',
  `vendor_id` int(11) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=27 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `details`, `bed`, `parking`, `rpm`, `time`, `vendor_id`, `is_verified`) VALUES
(14, 'Aashiravada', 'Murkatte, Honnavar', 'Arihant Buildcon is happy to introduce its new residential project Arihant Abode at Greater Noida West. This group has successfully completed various residential projects and now it is going to introduce its new project Abode. This group has always fulfilled the desire of customer whether it is for primary needs or secondary needs.\r\n\r\nThis group is always ready to deliver at minimal cost so that the apartments are budget friendly too. In this project Arihant Abode too, both the primary needs and secondary needs are kept in mind and promised to deliver world class homes with world class facilities at minimal cost.\r\n ', 2, 1, '5000', '2020-09-29 02:50:46', 1, 1),
(16, 'Sannidhi', 'Gersoppa', 'lorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sumlorem ip sum', 2, 0, '5000', '2020-09-29 03:45:15', 1, 1),
(21, 'lorem', 'okoo', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem ', 2, 2, '200', '2020-09-29 12:25:21', 1, 0),
(22, 'kklkl', 'lkkl', 'jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj jjjnj ', 12, 1, '55', '2020-09-29 12:30:34', 1, 0),
(23, 'kjjjk', 'kjkjj', 'jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj jkj ', 665, 565, '444', '2020-09-29 12:36:42', 1, 0),
(24, 'lk', 'kkllk', 'hvjgghhkhjkjhhvjgghhkhjkjh hvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjhhvjgghhkhjkjh', 5, 555, '5', '2020-09-29 12:41:03', 1, 0),
(26, 'hjhjh', 'jhjhj', '554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb554jjbjb', 5455, 54545, '454544', '2020-09-29 12:44:15', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User Id',
  `firstname` varchar(30) NOT NULL COMMENT 'First name of the user',
  `lastname` varchar(30) NOT NULL COMMENT 'Last Name of the user',
  `dob` date NOT NULL COMMENT 'DOB',
  `age` varchar(3) NOT NULL COMMENT 'Age',
  `gender` varchar(12) NOT NULL COMMENT 'gender',
  `contactno` varchar(10) NOT NULL COMMENT 'Contact Number',
  `email` varchar(50) NOT NULL COMMENT 'User Email ID',
  `address` varchar(50) NOT NULL COMMENT 'Address',
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `postalcode` varchar(8) NOT NULL COMMENT 'Postal Code for Address',
  `password` varchar(50) NOT NULL COMMENT 'Password',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COMMENT='Users of Rent-Ad Services Ltd.' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `age`, `gender`, `contactno`, `email`, `address`, `city`, `state`, `postalcode`, `password`) VALUES
(1, 'Darshan', 'Hulswar', '1999-11-28', '21', 'male', '9989784458', 'darshan@gmail.com', 'Arolli Mundgod', 'Honnavar', 'Karnataka', '581334', 'root'),
(29, 'Goutam', 'Naik', '2020-09-01', '21', 'male', '9482255786', 'goutamnaik@gmail.com', 'Konalli', 'Kumta', 'Karnataka', '5813369', 'root'),
(30, 'root', 'root', '1999-02-08', '21', 'male', '1234567890', 'root@gmail.com', 'root for all', 'root', 'root', '896321', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Vendor Id',
  `first_name` varchar(30) NOT NULL COMMENT 'First Name',
  `last_name` varchar(30) NOT NULL COMMENT 'Last Name',
  `email` varchar(50) NOT NULL COMMENT 'Email',
  `dob` date NOT NULL COMMENT 'DOB',
  `age` int(3) NOT NULL COMMENT 'Age',
  `gender` varchar(12) NOT NULL COMMENT 'Gender',
  `phone` varchar(11) NOT NULL COMMENT 'Contact Numer of vendor',
  `address` varchar(50) NOT NULL COMMENT 'vendor address',
  `postal_code` varchar(9) NOT NULL,
  `state` varchar(100) NOT NULL COMMENT 'State',
  `city` varchar(100) NOT NULL COMMENT 'City',
  `aadhar` varchar(12) NOT NULL COMMENT 'Aadhar Number of vendor',
  `password` varchar(50) NOT NULL COMMENT 'Vendor password',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aadhar` (`aadhar`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COMMENT='Vendors of Rent-Ad Services Ltd.' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `email`, `dob`, `age`, `gender`, `phone`, `address`, `postal_code`, `state`, `city`, `aadhar`, `password`) VALUES
(1, 'Shasthri', 'Rao', 'shasthri@gmail.com', '1989-04-09', 31, 'male', '9488756695', 'Kasarkod', '581334', 'Karnataka', 'Honnavar', '997785487596', 'root'),
(2, 'Darshan', 'Hulswar', 'darshan23@gmail.com', '2020-09-10', 21, 'male', '9482255786', 'Arolli Mundgod', '581334', 'Karnataka', 'Honnavar', '112233445566', 'root'),
(12, 'vinayak', 'naik', 'vinayak@gmail.com', '2020-09-09', 21, 'male', '7406120281', 'Arolli Mundgod', '581334', 'Karnataka', 'Honnavar', '998877445566', 'root'),
(14, 'Goutam', 'Naik', 'goutamnaik@gmail.com', '2020-09-01', 21, 'male', '9482255786', 'Konalli', '5813369', 'Karnataka', 'Kumta', '459895284659', 'root');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
