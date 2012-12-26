-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2012 at 06:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_myshow`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_ticket_for_theatre`
--

CREATE TABLE IF NOT EXISTS `booking_ticket_for_theatre` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `theatre_show_time_id` int(10) NOT NULL,
  `date_of_booking` date NOT NULL,
  `show_time_id` int(10) NOT NULL,
  `ticket_rate_id` int(10) NOT NULL,
  `number_of_seats` int(10) NOT NULL,
  `seat_numbers` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_theatre_show_time_id` (`theatre_show_time_id`),
  KEY `fk_ticket_rate_id` (`ticket_rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `booking_ticket_for_theatre`
--

INSERT INTO `booking_ticket_for_theatre` (`booking_id`, `user_id`, `theatre_show_time_id`, `date_of_booking`, `show_time_id`, `ticket_rate_id`, `number_of_seats`, `seat_numbers`) VALUES
(1, 1, 6, '2012-11-05', 1, 1, 3, '1,2,3'),
(2, 1, 6, '2012-11-12', 2, 3, 9, '80,81,82,83,84,85,86,87,88'),
(3, 1, 6, '2012-11-09', 2, 3, 2, '88,89'),
(4, 1, 9, '2012-11-14', 2, 1, 3, '6,16,26,36'),
(5, 1, 11, '2012-11-13', 2, 1, 4, '35,36,38,41'),
(6, 1, 8, '2012-11-14', 3, 3, 3, '107,108,118,127,128'),
(7, 6, 8, '2012-11-15', 4, 2, 5, '56,67,78,87,99'),
(8, 6, 8, '2012-11-14', 3, 3, 3, '119,120,129'),
(9, 1, 9, '2012-11-17', 2, 1, 6, '16,18,19,28,29,34'),
(10, 6, 9, '2012-11-20', 2, 1, 3, '16,26,36'),
(11, 6, 9, '2012-11-17', 2, 1, 2, '27,38'),
(12, 1, 7, '2012-11-20', 2, 1, 3, '5,15,25'),
(13, 6, 3, '2012-11-20', 2, 1, 5, '6,17,18,27,28');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city`) VALUES
(1, 'bangalore'),
(2, 'gulbarga'),
(3, 'manipal'),
(4, 'shimoga'),
(5, 'mangalore'),
(6, 'udupi'),
(7, 'bhidar');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(32) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(32) NOT NULL,
  `movie_director` varchar(32) NOT NULL,
  `movie_decription` varchar(32) DEFAULT NULL,
  `movie_language` varchar(32) DEFAULT NULL,
  `movie_poster` varchar(100) NOT NULL,
  `islive` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_director`, `movie_decription`, `movie_language`, `movie_poster`, `islive`) VALUES
(1, 'Son Of Sardars', 'abc', 'cdef', 'Hindi', 'Son-Of-Sardars.png', 'Running'),
(2, 'Jab Tak Hai Jann', 'affd', 'gjksdhgdj', 'Hindi', 'Jab-Tak-Hai-Jann.png', 'Not Running'),
(3, 'Sky Fall', 'qwert', 'yifbjhv', 'English', 'Sky-Fall.png', 'Running'),
(4, 'Denikaina Ready', 'fdhgd', 'hfudyufdhj', 'Telugu', 'Denikaina-Ready.png', 'Running'),
(5, 'Student Of The Year', 'gdjhjkjld', 'rywetwi', 'Hindi', 'Student-Of-The-Year.png', 'Running'),
(6, 'Life Of Pie', 'uyri', 'trrioi', 'English', 'Life-Of-Pie.png', 'Running'),
(7, 'English Vinglish', 'dgjj', '1346fdfd', 'Hindi', 'English-Vinglish.png', 'Running');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(32) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `role`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE IF NOT EXISTS `screens` (
  `screen_id` int(10) NOT NULL AUTO_INCREMENT,
  `screen_name` varchar(32) NOT NULL,
  `theatre_id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `screen_capactiy` int(10) NOT NULL,
  PRIMARY KEY (`screen_id`),
  KEY `fk_theatre_id` (`theatre_id`),
  KEY `fk_movie_id` (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`screen_id`, `screen_name`, `theatre_id`, `movie_id`, `screen_capactiy`) VALUES
(101, 'A', 1, 1, 100),
(102, 'B', 1, 2, 200),
(103, 'A', 2, 3, 150),
(104, 'B', 2, 2, 120),
(105, 'A', 3, 3, 100),
(106, 'B', 3, 6, 150),
(107, 'A', 4, 1, 130),
(108, 'B', 4, 4, 100),
(109, 'A', 5, 7, 120),
(110, 'B', 5, 5, 100),
(111, 'A', 6, 3, 110),
(112, 'B', 6, 6, 110),
(113, 'A', 7, 5, 120),
(114, 'B', 7, 7, 100);

-- --------------------------------------------------------

--
-- Table structure for table `show_timing`
--

CREATE TABLE IF NOT EXISTS `show_timing` (
  `show_time_id` int(10) NOT NULL AUTO_INCREMENT,
  `show_time` varchar(50) NOT NULL,
  PRIMARY KEY (`show_time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `show_timing`
--

INSERT INTO `show_timing` (`show_time_id`, `show_time`) VALUES
(1, 'Morning Show  [09:30am - 12:00pm]'),
(2, 'Matinee Show [12:30pm - 30:00pm]'),
(3, 'First Show [06:30pm - 09:00pm]'),
(4, 'Second Show [09:30pm - 12:00pm]');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE IF NOT EXISTS `theatres` (
  `theatre_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_id` int(10) NOT NULL,
  `theatre_name` varchar(32) NOT NULL,
  `manager` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`theatre_id`),
  KEY `fk_city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`theatre_id`, `city_id`, `theatre_name`, `manager`) VALUES
(1, 1, 'bigcinema', 'pramod'),
(2, 7, 'cineplex', 'prasad'),
(3, 3, 'inox', 'ramesh'),
(4, 6, 'inox1', 'ashok'),
(5, 5, 'shilpa', 'dan'),
(6, 4, 'platinum', 'bhagat'),
(7, 2, 'central', 'chandu');

-- --------------------------------------------------------

--
-- Table structure for table `theatre_show_timings`
--

CREATE TABLE IF NOT EXISTS `theatre_show_timings` (
  `theatre_show_time_id` int(10) NOT NULL AUTO_INCREMENT,
  `screen_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`theatre_show_time_id`),
  KEY `fk_screen_id` (`screen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `theatre_show_timings`
--

INSERT INTO `theatre_show_timings` (`theatre_show_time_id`, `screen_id`, `start_date`, `end_date`) VALUES
(1, 106, '2012-10-31', '2012-11-15'),
(2, 110, '2012-11-04', '2012-11-07'),
(3, 114, '2012-11-02', '2012-11-22'),
(4, 108, '2012-11-05', '2012-11-15'),
(5, 112, '2012-11-03', '2012-11-10'),
(6, 101, '2012-11-04', '2012-11-12'),
(7, 102, '2012-11-14', '2012-11-21'),
(8, 103, '2012-11-01', '2012-11-15'),
(9, 104, '2012-11-01', '2012-11-22'),
(10, 105, '2012-11-07', '2012-11-14'),
(11, 107, '2012-11-01', '2012-11-22'),
(12, 109, '2012-11-02', '2012-11-08'),
(13, 111, '2012-11-07', '2012-11-21'),
(14, 113, '2012-11-01', '2012-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_rate`
--

CREATE TABLE IF NOT EXISTS `ticket_rate` (
  `ticket_rate_id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_type` varchar(32) CHARACTER SET utf8 NOT NULL,
  `ticket_price` int(10) NOT NULL,
  PRIMARY KEY (`ticket_rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ticket_rate`
--

INSERT INTO `ticket_rate` (`ticket_rate_id`, `ticket_type`, `ticket_price`) VALUES
(1, 'Platinium', 300),
(2, 'Gold', 200),
(3, 'Silver', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `rid` int(10) NOT NULL DEFAULT '3',
  `sid` varchar(50) NOT NULL DEFAULT '0',
  `login_time` varchar(32) NOT NULL,
  `logout_time` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_rid` (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `first_name`, `last_name`, `address`, `mobile_number`, `rid`, `sid`, `login_time`, `logout_time`) VALUES
(1, 'bhagat', '18427a4a7f0aaf3f78ec13c5dc121894', 'bhagat.sangam1992@gmail.com', 'Bhagat', 'Sangam', 'Mumbai', '7204856706', 1, '0', '1353429866', '1353429895'),
(2, 'teja', '19edacd33ab84209efc96eb76f578f38', 'tejakikat@gmail.com', 'Teja', 'Palisheety', 'Vizag', '7894561237', 2, '0', '1353430364', '1353430423'),
(3, 'ravi', '63dd3e154ca6d948fc380fa576343ba6', 'raviteja@gmail.com', 'Ravi', 'Teja', 'Vijaywada', '9111222333', 3, '0', '1353430467', '1353430497'),
(4, 'bharath', '7616b81196ee6fe328497da3f1d9912d', 'bharath.k.sangam@gmail.com', 'Bharath', 'Sangam', 'Mumbai', '7208612664', 3, '0', '1353352936', '1353349436'),
(5, 'drupal', '08d15a4aef553492d8971cdd5198f314', 'drupal.cool.expert1@gmail.com', 'Drupal', 'Expert', 'Mumbai', '7208612664', 3, '0', '1353430829', '1353430905'),
(6, 'heman', '2c015b9d98247a59a2d574a972d49076', 'heman.sangam@gmail.com', 'heman', 'Sangam', 'koliwadaa', '7208612664', 3, '0', '1353432863', '1353432878');

-- --------------------------------------------------------

--
-- Table structure for table `user_selected_seats`
--

CREATE TABLE IF NOT EXISTS `user_selected_seats` (
  `user_selected_seats_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `screen_id` int(10) DEFAULT NULL,
  `movie_id` int(10) DEFAULT NULL,
  `theatre_showtime_id` int(10) DEFAULT NULL,
  `seat_number` varchar(32) NOT NULL,
  `booking_id` int(10) DEFAULT NULL,
  `selected_date_of_show` date NOT NULL,
  PRIMARY KEY (`user_selected_seats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_selected_seats`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_ticket_for_theatre`
--
ALTER TABLE `booking_ticket_for_theatre`
  ADD CONSTRAINT `fk_theatre_show_time_id` FOREIGN KEY (`theatre_show_time_id`) REFERENCES `theatre_show_timings` (`theatre_show_time_id`),
  ADD CONSTRAINT `fk_ticket_rate_id` FOREIGN KEY (`ticket_rate_id`) REFERENCES `ticket_rate` (`ticket_rate_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `fk_theatre_id` FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`theatre_id`);

--
-- Constraints for table `theatres`
--
ALTER TABLE `theatres`
  ADD CONSTRAINT `fk_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Constraints for table `theatre_show_timings`
--
ALTER TABLE `theatre_show_timings`
  ADD CONSTRAINT `fk_screen_id` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`screen_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_rid` FOREIGN KEY (`rid`) REFERENCES `roles` (`rid`);
