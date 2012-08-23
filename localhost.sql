-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2012 at 03:58 PM
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
  `cid` int(255) NOT NULL AUTO_INCREMENT,
  `faculty_uid` varchar(20) NOT NULL,
  `stud_id` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` mediumtext NOT NULL,
  `subsec` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`cid`, `faculty_uid`, `stud_id`, `date`, `time`, `description`, `subsec`) VALUES
(6, 'dorward.villaruz', '2009-0666', '08/05/2012', '2012-08-09 23:31:03', 'how to load external fonts to using css', ''),
(7, 'dorward.villaruz', '2010-0666', '08/12/2012', '2012-08-11 14:11:37', 'c++', ''),
(8, 'dorward.villaruz', '2008-4123', '08/12/2012', '2012-08-11 14:30:27', 'c++', ''),
(9, 'dorward.villaruz', '2006-3332', '08/11/2012', '2012-08-11 14:47:23', 'HCI', 'csc186-d3'),
(10, 'dorward.villaruz', '2009-0003', '08/11/2012', '2012-08-11 14:53:13', 'asaddsd', ''),
(11, 'dorward.villaruz', '2009-0005', '08/15/2012', '2012-08-17 12:34:58', 'asafagg', 'csc102-b1'),
(12, 'dorward.villaruz', '2009-4441', '08/17/2012', '2012-08-17 20:31:20', 'lullaby', 'csc101-b1');

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
  `location` varchar(40) NOT NULL,
  PRIMARY KEY (`faculty_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_uid`, `password`, `name`, `college`, `dept`, `status`, `location`) VALUES
('dorward.villaruz', 'stevenseagal', 'Dorward Villaruz', 'School of Computer Studies', 'Computer Science', 1, ''),
('val.madrid', 'jack.sparrow', 'Val Randolf Madrid', 'School of Computer Studies', 'Computer Science', 1, ''),
('rene.crisostomo', 'rcris', 'Rene Crisostomo', 'School of Computer Studies', 'Computer Science', 0, ''),
('cyrus.gabilla', 'cgab', 'Cyrus Gabilla', 'School of Computer Studies', 'Computer Science', 0, ''),
('eli.mostrales', 'elmo', 'Eli Mostrales', 'School of Computer Studies', 'Computer Science', 0, ''),
('mark.manlimos', 'mman', 'Mark Manlimos', 'School of Computer Studies', 'Computer Science', 0, ''),
('jennifer.montemayor', 'jmon', 'Jennifer Montemayor', 'School of Computer Studies', 'Computer Science', 0, ''),
('fatima.santos', 'fsan', 'Fatimah Joy Santos', 'College of Arts and Social Science', 'English', 0, ''),
('nelia.balgoa', 'nbal', 'Nelia Galosa Balgoa', 'College of Arts and Social Science', 'English', 0, ''),
('rosie.boniao', 'rbon', 'Rosie Enderes Boniao', 'College of Arts and Social Science', 'English', 0, ''),
('judith.cagaanan', 'jcag', 'Judith Cagaanan', 'College of Arts and Social Science', 'English', 0, ''),
('michelle.caracut', 'mcar', 'Michelle Jeanne Casiple Caracut', 'College of Arts and Social Science', 'Filipino', 0, ''),
('honeylet.dumoran', 'hdum', 'Honeylet Ermac Dumoran', 'College of Arts and Social Science', 'Filipino', 0, ''),
('rosario.dizon', 'rdiz', 'Rosario Butron Dizon', 'College of Arts and Social Science', 'Filipino', 0, ''),
('kristine.herbito', 'kher', 'Kristine Ramo Herbito', 'College of Arts and Social Science', 'Filipino', 0, ''),
('melba.ijan', 'mij', 'Melba Baguio Ijan', 'College of Arts and Social Science', 'Filipino', 0, ''),
('lydia.mata', 'lmat', 'Lydia Laranjo Mata', 'College of Arts and Social Science', 'Filipino', 0, ''),
('melecita.baena', 'mbae', 'Melecita Galera Baena', 'College of Arts and Social Science', 'Filipino', 0, ''),
('nora.clar', 'ncla', 'Nora Ador Clar', 'College of Arts and Social Science', 'History', 0, '');

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
('2009-3869', 'Rodel S. Pepino', 'SET', 'ELET -  EPD', 3),
('2009-7604', 'Febris P. Pacarro', 'CSM', 'BS-Chem', 4),
('2005-5188', 'Carl Rudolf P. Berondo', 'SCS', 'BS-CS', 4),
('2009-0001', 'Genesis Bacarrisas', 'SCS', 'BS-CS', 4),
('2009-0002', 'Rufo Barbarona', 'SCS', 'BS-CS', 4),
('2009-0003', 'Mellhakim Angni', 'SCS', 'BS-CS', 4),
('2012-2121', 'Rheaman Apugan', 'SET', 'CET', 1),
('2010-1121', 'Kim Trinidad', 'SCS', 'BS-IT', 3),
('2010-0666', 'Clyde Sacote', 'SCS', 'BS-CS', 3),
('2011-5543', 'Nadine Chu', 'SCS', 'BS-IT', 2),
('2011-4432', 'Jobelle Villamor', 'SET', 'CET', 2),
('2012-5332', 'Jennt Luz Jenotan', 'CBAA', 'BS-A', 1),
('2010-1111', 'Loreli P.dela Cruz', 'CON', 'BS-N', 3),
('2009-0005', 'Novo Dimaporo', 'SCS', 'BS-CS', 4),
('2009-0007', 'Arjay Sitoy', 'SCS', 'BS-CS', 4),
('2006-3332', 'Scalaberch Bandiola', 'SCS', 'BS-CS', 4),
('2009-0009', 'John Michael Raterta', 'CED', 'BS-Ed Major in English', 4),
('2012-8875', 'Cliff Patrick P. Berondo', 'CSM', 'BS-Bio Major in Marine Bio', 1),
('2010-6642', 'Cliff Sumalpong', 'CASS', 'AB-Eng', 3),
('2010-4444', 'Ruby Jean Chatto', 'CASS', 'AB-Fil', 3),
('2009-4441', 'Ryan Cantonao', 'COE', 'BS-CE', 4),
('2008-4123', 'Krestin Joy Alberca', 'COE', 'BS- EE', 5),
('2009-5432', 'Jessie Lloyd Villanueva', 'CBAA', 'BS- Marketing', 4),
('2009-9111', 'Robert James Bon', 'CON', 'BS-N', 4),
('2009-1122', 'Luke P. dela Cruz', 'CON', 'BS-N', 4),
('2010-3321', 'Berlen Bon', 'SCS', 'BS-IT', 3),
('2011-5553', 'Mark Joseph Cuizon', 'SET', 'MET', 2);
