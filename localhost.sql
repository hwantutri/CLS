-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2012 at 03:14 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cls`
--
CREATE DATABASE `cls` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cls`;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `cid` int(255) NOT NULL AUTO_INCREMENT,
  `faculty_uid` varchar(20) NOT NULL,
  `stud_id` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`cid`, `faculty_uid`, `stud_id`, `date`, `time`, `description`) VALUES
(6, 'dorward.villaruz', '2009-0000', '08/05/2012', '2012-08-06 04:28:38', 'aadadad');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_uid` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(40) NOT NULL,
  `college` varchar(40) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faculty_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_uid`, `password`, `name`, `college`, `dept`, `status`) VALUES
('dorward.villaruz', 'stevenseagal', 'Dorward Villaruz', 'School of Computer Studies', 'Computer Science', 0),
('val.madrid', 'jack.sparrow', 'Val Randolf Madrid', 'School of Computer Studies', 'Computer Science', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` varchar(10) NOT NULL,
  `stud_name` varchar(40) NOT NULL,
  `stud_college` varchar(30) NOT NULL,
  `stud_course` varchar(30) NOT NULL,
  `yearlvl` int(1) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_name`, `stud_college`, `stud_course`, `yearlvl`) VALUES
('2009-0000', 'James L. Antiquina', 'School of Computer Studies', 'BSIT', 4),
('2009-3869', 'Rodel S. Pepino', 'School of Engineering Technolo', 'ELET -  EPD', 3),
('2009-7604', 'Febris P. Pacarro', 'College of Science and Mathema', 'BSChem', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
