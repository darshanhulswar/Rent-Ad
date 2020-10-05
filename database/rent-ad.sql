-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2020 at 10:48 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=9 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `hall`, `kitchen`, `bathroom`, `bedroom`, `house`, `property`, `property_id`) VALUES
(1, '5f796eca101eahall-11.png', '5f796eca1021akitchen-9.png', '5f796eca1022fbath-15.png', '5f796eca10226bed-1.png', '5f796eca1023bbed-13.png', '5f796eca10249bed-6.png', 2),
(2, '5f79a817ddc55hall-15.png', '5f79a817ddc65kitchen-16.png', '5f79a817ddc7abath-7.png', '5f79a817ddc70bed-20.png', '5f79a817ddc84site-5.png', '5f79a817ddc8esite-1.png', 3),
(3, '5f79bc5a24ab0hall-2.png', '5f79bc5a24ab8kitchen-14.png', '5f79bc5a24ac1bath-14.png', '5f79bc5a24abdbed-12.png', '5f79bc5a24acbsite-2.png', '5f79bc5a24acfsite-2.png', 4),
(4, '5f79e5a2b1fc1hall-1.png', '5f79e5a2b2001kitchen-10.jpg', '5f79e5a2b2035bath-13.png', '5f79e5a2b201fbed-7.png', '5f79e5a2b2058site-1.png', '5f79e5a2b2065hall-18.png', 5),
(5, '5f7a74aacad9ehall-8.png', '5f7a74aacadbdkitchen-2.png', '5f7a74aacadd8bath-4.png', '5f7a74aacadccbed-8.png', '5f7a74aacade4site-6.png', '5f7a74aacadf0site-6.png', 6),
(6, '5f7a75fd42a2ehall-6.png', '5f7a75fd42a44kitchen-5.png', '5f7a75fd42a5dbath-2.png', '5f7a75fd42a51bed-7.png', '5f7a75fd42a69site-4.png', '5f7a75fd42a74site-4.png', 7),
(7, '5f7acc5c0e2edhall-16.png', '5f7acc5c0e302kitchen-6.png', '5f7acc5c0e318bath-7.png', '5f7acc5c0e30ebed-10.png', '5f7acc5c0e323site-6.png', '5f7acc5c0e32dsite-5.png', 9),
(8, '5f7af18193d50bath-5.png', '5f7af18193d5cbath-5.png', '5f7af18193d6ebath-5.png', '5f7af18193d65bath-5.png', '5f7af18193d76bath-5.png', '5f7af18193d7ebath-5.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'property ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'Property Name or Title',
  `location` varchar(255) NOT NULL COMMENT 'Location of the property',
  `details` varchar(3000) NOT NULL COMMENT 'Property Description',
  `bed` int(2) NOT NULL COMMENT 'Bedrooms ',
  `parking` int(2) NOT NULL COMMENT 'Car parking lot',
  `rpm` varchar(10) NOT NULL COMMENT 'Rent per month / Maintenance Charges',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time of property upload',
  `vendor_id` int(11) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=11 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `details`, `bed`, `parking`, `rpm`, `time`, `vendor_id`, `is_verified`) VALUES
(2, 'Vaibhav', 'Kavalakki, Near NH', 'Very Near to school, market, hospital and banks, and facilities like Gym', 4, 2, '5000', '2020-10-04 06:40:45', 21, 1),
(3, 'Prameela House', 'Honnavar Near Moodaganapati', 'This property is near schools, markets, hospitals, and various marketing services.\r\nProvides basic facilities like water 24x7, power supply, laundry services, parking lot for cars as well as a bike (two-wheeler vehicles).\r\nHouse was constructed by Krishna Civil Constructions.\r\nHouse Interior is built with Italian technologies like an Italian shower,  kitchen.\r\nThe ceiling is decorated with lights to bring the galaxy like environment.\r\n', 2, 2, '5000', '2020-10-04 10:45:01', 24, 1),
(4, 'Anugruha', 'Bhatkal', 'Presenting you with a golden opportunity is this beautiful 3 BHK residential apartment that is up for sale in New Delhi. It is located in Saraswati Garden, one of the upcoming localities within the city. This home is perfect for close knit families as it is situated within a residential area.\r\n\r\nProperty Specifications\r\n\r\nThe carefully designed apartment is spread across an area of 900 sq-ft and is on the first floor of a four storey building. This is a freehold property, hence the new owners enjoy absolute reign over it. The building has been well maintained and was built facing north-east directions and is crafted as per Vaastu norms.\r\n\r\nSemi furnished this abode features three cosy bedrooms with wardrobes attached with ample storage space. There are two western styled bathrooms, one of which is attached to a bedroom and the other is for common use. There is a geyser available in one of the bathrooms supplying enough hot water.\r\n\r\nThere are two spacious balconies to use that are attached to the bedrooms and overlook the main road. The living and dining room have been built separately for exclusive use. The normal sized kitchen has covered cabinets for storing utensils and crockeries. It even has a granite platform and a sink while the apartment is restricted with PNG gas. The whole apartment has marble flooring, which further enhances the beauty of this abode. Furthermore, the dining room and one bedroom are covered with wall tiles.\r\n\r\nFacilities\r\n\r\nThere are two open parking space available for the owners to use. The building is supplied with a 24 hours water cycle to prevent any shortage of it. There is a power backup system in place to help avoid any power blackouts. CCTVs have been installed around the building to ensure the safety of the inhabitants.\r\n\r\n\r\nLocality\r\n\r\nThis property is situated in such an affluent neighborhood where facilities like schools and hospitals are within walking distance. There are malls and supermarkets that are also close by for any shopping needed. OBC Bank is on the opposite side of the building while SBI is within walking distance for any financial help. Public transportation is easily available as buses and taxis are common because of the main road that is close by. Furthermore, even the Mayapuri Metro Station is only 1 km away from the building.', 2, 1, '8000', '2020-10-04 12:11:00', 24, 1),
(5, 'Sangama', 'Bhatkal', 'At the foothill of serene Aravalli hillsNoise and air pollution free surroundingsRich neighborhood\r\n - Well connected with NH8, Dwarka Expressway and Golf course extension road.\r\n3 Sprawling Golf Course located at a distance of just 5 minutes by car from this projectJust 10 minutes drive away from Golf Course Ext Road or Sohna Road5 Min Drive from Delhi - Jaipur ExpresswayBang on SPR Link Road15 min from Sohna Road10 min from proposed Metro Station10 min from ITC Grand Bharat', 3, 2, '8000', '2020-10-04 15:07:50', 24, 1),
(6, 'Garden House', 'Kasarkod', 'East faced house. semi-furnished, has small living garden outside the house.\r\nBasic water, power supply 24x7\r\nNear to NH,\r\n', 2, 1, '5000', '2020-10-05 01:17:47', 24, 1),
(7, 'Sagar Kinara', 'Honnavar Near govt Degree College', 'Near to National Highway, with in touch to lodging also very calm place to live.\r\nEco friendly environment.', 2, 1, '6000', '2020-10-05 01:24:18', 25, 1),
(8, 'darshan house', 'kumta', 'lorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\n', 2, 1, '2000', '2020-10-05 07:30:09', 24, 0),
(9, 'darshan house', 'kumta', 'lorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\nlorem ipsum \r\n', 2, 1, '2000', '2020-10-05 07:30:09', 24, 0),
(10, 'Kumta Hse', 'Kumta', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 3, 3, '8000', '2020-10-05 10:11:59', 28, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COMMENT='Users of Rent-Ad Services Ltd.' AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `age`, `gender`, `contactno`, `email`, `address`, `city`, `state`, `postalcode`, `password`) VALUES
(31, 'Darshan', 'Hulswar', '1999-11-28', '21', 'male', '9483376592', 'darshan@gmail.com', 'Arolli Mundgod', 'Honnavar', 'Karnataka', '581334', 'root'),
(32, 'Subbu', 'Hegde', '2020-09-30', '21', 'male', '9482255786', 'subbrhmnya24@gmail.com', 'lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum', 'Karnataka', '581334', 'root'),
(33, 'Harshit ', 'Naik', '1999-06-17', '21', 'male', '7406120281', 'harshitnaik222@gmail.com', 'Rayalkeri, Honnavar', 'Honnavar', 'Karnataka', '581334', 'harsham123');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `feedback_date` varchar(500) NOT NULL,
  `desrciption` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `user_id`, `user_name`, `user_email`, `phone`, `feedback_date`, `desrciption`) VALUES
(1, '32', 'subbu', 'subbrhmnya24@gmail.com', '9482255786', '2020-10-04', 'I Really Appreciate Rent-Ad Web Application for making such an awesome solution to rent property seekers'),
(2, '31', 'darshan', 'darshan@gmail.com', '9483376592', '2020-10-04', 'Hello Sir/Madam can i write my property description about 2000 words? Please clarify if it is OK.'),
(3, '31', 'Darshan', 'darshan@gmail.com', '9483376592', '2020-10-04', 'Very good customer service support keep it up...'),
(4, '33', 'Harshit ', 'harshitnaik222@gmail.com', '7406120281', '2020-10-05', 'loerejwnfwb wehwehfkfdnmsdhfjewf oqjnfe. ukwfhwefwef\r\nwfwbfhwefigwfbwbsncad\r\nwkehjkwefjwf uhweufjbajdbvkjnvij\r\n\r\n');

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
  UNIQUE KEY `aadhar` (`aadhar`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COMMENT='Vendors of Rent-Ad Services Ltd.' AUTO_INCREMENT=29 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `email`, `dob`, `age`, `gender`, `phone`, `address`, `postal_code`, `state`, `city`, `aadhar`, `password`) VALUES
(21, 'Subrahmanya', 'Hegde', 'subrahmnya24@gmail.com', '1999-11-10', 21, 'male', '9875485522', 'At Gangeri, Post Salkod, Honnavar', '581334', 'Karnataka', 'Honnavar', '887755449986', '2091'),
(24, 'Darshan', 'Hulswar', 'darshan@gmail.com', '1999-11-28', 21, 'male', '9483376592', 'Arolli Mundgod', '581334', 'Karnataka', 'Honnavar', '985748759625', 'root'),
(25, 'Manoj', 'Manu', 'manoj22@gmail.com', '2006-03-16', 13, 'male', '9880025836', 'Arolli Mundgod , Post Mugwa', '581334', 'Karnataka', 'Honnavar', '967485215789', 'root'),
(27, 'prasanna', 'shanbhag', 'prasanna@gmail.com', '1999-11-11', 21, 'male', '9482255786', 'Arolli Mundgod', '581334', 'Karnataka', 'Honnavar', '789456123456', '123456'),
(28, 'Harsha', 'Shet', 'harsha@gmail.com', '1999-11-14', 21, 'male', '7406687412', 'Kumta Baliga', '581334', 'Karnataka', 'Kumta', '547896214785', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_feedback`
--

CREATE TABLE IF NOT EXISTS `vendor_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(255) NOT NULL,
  `vendor_name` varchar(100) NOT NULL COMMENT 'Vendor Name',
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `feedback_date` varchar(255) NOT NULL,
  `description` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii AUTO_INCREMENT=15 ;

--
-- Dumping data for table `vendor_feedback`
--

INSERT INTO `vendor_feedback` (`id`, `vendor_id`, `vendor_name`, `email`, `phone`, `feedback_date`, `description`) VALUES
(5, '20', 'Darshan', 'darshan@gmail.com', '9483376592', '2020-10-04', 'Can i talk with your employee please, i have on doubt about my property site and documentation details'),
(6, '24', 'Darshan', 'darshan@gmail.com', '9483376592', '2020-10-04', 'Thank You. Rent-Ad company and team.'),
(7, '24', 'Darshan', 'darshan@gmail.com', '9483376592', '2020-10-04', 'Hello sir I need more features for uploading more photos.\r\ncan you improve your services to end-users?'),
(9, '21', 'Subrahmanya', 'subrahmnya24@gmail.com', '9875485522', '2020-10-04', 'Where the main brach of Rent-ad is located i want to talk with your service provider.'),
(10, '21', 'Subrahmanya', 'subrahmnya24@gmail.com', '9875485522', '2020-10-04', 'all properties are stored in many textual and image forms it helps us to store in better seperation way.'),
(11, '21', 'Subrahmanya', 'subrahmnya24@gmail.com', '9875485522', '2020-10-04', 'As a vendor, I think your application is going well and providing quality services to the required users.'),
(12, '21', 'Subrahmanya', 'subrahmnya24@gmail.com', '9875485522', '2020-10-04', 'Really awesome application'),
(13, '21', 'Subrahmanya', 'subrahmnya24@gmail.com', '9875485522', '2020-10-04', 'Hello, Im Darshan Hulswar and Im here to get more information on how can I get my accurate property details.'),
(14, '25', 'Manoj', 'manoj22@gmail.com', '9880025836', '2020-10-05', 'Very good Web App that integrates all the vendor details all in one place togather to get the right rent property decision.');

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
