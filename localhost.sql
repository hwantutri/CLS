-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2012 at 06:00 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
  `Consultation_id` int(255) NOT NULL,
  `Fac_id` int(255) NOT NULL,
  `Student_id` int(255) NOT NULL,
  `Date_and_Time` date NOT NULL,
  `Duration` int(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`Consultation_id`, `Fac_id`, `Student_id`, `Date_and_Time`, `Duration`, `Description`) VALUES
(101, 1, 11, '2012-08-02', 1, 'Java Programming'),
(102, 1, 12, '2012-08-01', 2, 'Thesis'),
(103, 2, 13, '2012-08-01', 3, 'Thesis'),
(104, 4, 21, '2012-08-03', 3, 'C++ Programming'),
(105, 6, 18, '2012-08-03', 2, 'Yacc and Lex Programming');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `Fac_id` int(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `College` text NOT NULL,
  `Department` text NOT NULL,
  `Chairman` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Fac_id`, `Password`, `Name`, `College`, `Department`, `Chairman`) VALUES
(1, 'at', 'Alquine Taculin', 'School of Computer Studies', 'Computer Science', 1),
(2, 'rc', 'Rene Crisostomo', 'School of Computer Studies', 'Computer Science', 0),
(3, 'dv', 'Dorward Villaruz', 'School of Computer Studies', 'Computer Science', 0),
(4, 'ol', 'Orven Llantos', 'School of Computer Studies', 'Computer Science', 0),
(5, 'cg', 'Cyrus Gabilla', 'School of Computer Studies', 'Computer Science', 0),
(6, 'jm', 'Jennifer Montemayor', 'School of Computer Studies', 'Computer Science', 0),
(7, 'mm', 'Mark Manlimos', 'School of Computer Studies', 'Computer Science', 0),
(8, 'vm', 'Val Madrid', 'School of Computer Studies', 'Computer Science', 0),
(9, 'jp', 'Jeremy Pinzon', 'School of Computer Studies', 'Computer Science', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `College` text NOT NULL,
  `Department` text NOT NULL,
  `Year_Level` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Name`, `College`, `Department`, `Year_Level`) VALUES
(11, 'Carl Rudolf Berondo', 'School of Computer Studies', 'Computer Science', '4'),
(12, 'Rufo Barbarona 2', 'School of Computer Studies', 'Computer Science', '4'),
(13, 'Mellhakim Angni', 'School of Computer Studies', 'Computer Science', '4'),
(14, 'Genesis Baccarisas', 'School of Computer Studies', 'Computer Science', '4'),
(15, 'Keith Bandiola', 'School of Computer Studies', 'Computer Science', '4'),
(16, 'Novo Dimaporo', 'School of Computer Studies', 'Computer Science', '4'),
(17, 'Arven Aguilar', 'School of Computer Studies', 'Computer Science', '4'),
(26, 'Mellhakim Angni', 'School of Computer Studies', 'Computer Science', '4'),
(27, 'Genesis Baccarisas', 'School of Computer Studies', 'Computer Science', '4'),
(28, 'Keith Bandiola', 'School of Computer Studies', 'Computer Science', '4'),
(29, 'Novo Dimaporo', 'School of Computer Studies', 'Computer Science', '4'),
(18, 'Nadine Chu', 'School of Computer Studies', 'Information Technology', '2'),
(19, 'Rheaman Apugan', 'School of Engineering Technology', 'Civil Engineering Technology', '1'),
(20, 'Cliff Sumalpong', 'College of Business Administration and Accountancy', 'Marketing', '1'),
(21, 'Glory Faith N.Paza', 'School of Engineering Technology', 'Electrical Engineering', '2'),
(22, 'Rowena Grace S.Balaba', 'School of Computer Science ', 'Information Technology', '3'),
(23, 'Sarah Elizabeth N.Allen', 'College of Arts and Social Science', 'English', '4'),
(24, 'Reynalou S.Bontilao', 'College of Science and Mathematics', 'Physics', '1'),
(25, 'Jann Dainver L.Maravilla', 'College of Nursing', 'Nursing', '1');
