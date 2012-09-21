-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2012 at 11:50 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`cid`, `faculty_uid`, `stud_id`, `date`, `time`, `description`, `subsec`) VALUES
(39, 'mark.manlimos', '2009-0000', '11/09/2012', '2012-09-14 10:29:39', 'C++', 'csc102-s1'),
(38, 'eli.mostrales', '2009-0009', '11/15/2012', '2012-09-14 10:29:39', 'Erlang', 'csc142-b2'),
(37, 'eli.mostrales', '2009-0001', '11/09/2012', '2012-09-14 10:29:39', 'Erlang', 'csc142-b2'),
(29, 'dorward.villaruz', '2008-4123', '11/09/2012', '2012-09-14 10:29:39', 'Java Programming', 'csc102-lr1'),
(28, 'dorward.villaruz', '2006-3332', '11/09/2012', '2012-09-14 10:29:39', 'Java Programming', 'csc102-lr1'),
(27, 'dorward.villaruz', '2005-5188', '11/09/2012', '2012-09-14 10:29:39', 'Java Programming', 'csc102-lr1'),
(30, 'val.madrid', '2009-0000', '11/09/2012', '2012-09-14 10:29:39', 'Data Structure', 'csc102-lr1'),
(31, 'val.madrid', '2009-0001', '11/09/2012', '2012-09-14 10:29:39', 'Data Structure', 'csc124-s4'),
(32, 'dorward.villaruz', '2009-0007', '11/09/2012', '2012-09-14 10:29:39', 'Operating Sytem', 'csc155-w2'),
(33, 'rene.crisostomo', '2009-0005', '11/09/2012', '2012-09-14 10:29:39', 'Database Sql', 'csc151-w3'),
(34, 'rene.crisostomo', '2005-5188', '11/09/2012', '2012-09-14 10:29:39', 'Database Sql', 'csc151-w3'),
(35, 'cyrus.gabilla', '2009-0007', '11/09/2012', '2012-09-14 10:29:39', 'Thesis', 'csc199-h2'),
(36, 'eli.mostrales', '2005-5188', '11/09/2012', '2012-09-14 10:29:40', 'Erlang', 'csc142-b2'),
(40, 'mark.manlimos', '2009-0003', '11/09/2012', '2012-09-14 10:29:40', 'C Language', 'csc100-d6'),
(41, 'jennifer.montemayor', '2005-5188', '11/09/2012', '2012-09-14 10:29:40', 'Lovelife', 'love1-d3'),
(42, 'jennifer.montemayor', '2008-4123', '11/09/2012', '2012-09-14 10:29:40', 'Lovelife', 'love1-d3'),
(43, 'fatima.santos', '2009-0000', '11/09/2012', '2012-09-14 10:29:40', 'Tutoring English', 'ch1-a2'),
(44, 'nelia.balgoa', '2009-0009', '11/09/2012', '2012-09-14 10:29:40', 'Dota Combos', 'lol3-c2'),
(45, 'nelia.balgoa', '2009-3869', '11/09/2012', '2012-09-14 10:29:40', 'Dota Combos', 'lol3-c2'),
(46, 'judith.cagaanan', '2006-3332', '11/09/2012', '2012-09-14 10:29:40', 'Vmobile', 'vm3-s6'),
(47, 'judith.cagaanan', '2005-5188', '11/09/2012', '2012-09-14 10:29:40', 'Vmobile', 'vm3-s6'),
(48, 'judith.cagaanan', '2009-0001', '11/09/2012', '2012-09-14 10:29:40', 'Vmobile', 'vm3-s6'),
(49, 'michelle.caracut', '2009-0003', '11/22/2012', '2012-09-14 10:29:40', 'Animeseason.com', 'anc2-s6'),
(50, 'judith.cagaanan', '2006-3332', '11/13/2012', '2012-09-14 10:29:40', 'Churva', 'vm3-s6'),
(51, 'rosario.dizon', '2009-0003', '11/09/2012', '2012-09-14 10:29:40', 'English to German ', 'eng101-g4'),
(52, 'kristine.herbito', '2009-0002', '11/22/2012', '2012-09-14 10:29:40', 'Mental Problem', 'mp3-f4'),
(53, 'kristine.herbito', '2009-0005', '11/22/2012', '2012-09-14 10:29:40', 'UNO', 'uno101-s4'),
(55, 'eli.mostrales', '2009-0007', '11/09/2012', '2012-09-14 10:29:40', 'Deterministic Finite Automaton', 'csc144-b4'),
(57, 'dorward.villaruz', '2005-5188', '2012/01/12', '2012-09-14 10:29:40', 'char', 'csc155-w3'),
(58, 'dorward.villaruz', '2009-0000', '2012/02/15', '2012-09-14 01:22:52', 'watching movies', 'csc-102'),
(59, 'dorward.villaruz', '2006-3332', '2012/02/24', '2012-09-14 01:24:06', 'lovelife problem', 'csc-151'),
(60, 'dorward.villaruz', '2009-0000', '2012/02/24', '2012-09-14 01:25:16', 'orange and bronze updates', 'csc102-b3'),
(61, 'dorward.villaruz', '2006-3332', '2012/03/02', '2012-09-14 01:27:30', 'User Interface Design', 'csc181-a3'),
(62, 'dorward.villaruz', '2009-0002', '2012/04/12', '2012-09-14 01:29:02', 'tailedfox.com', 'csc183-d2'),
(63, 'dorward.villaruz', '2009-0003', '2012/05/10', '2012-09-14 01:31:04', 'business management ', 'csc184-d2'),
(64, 'dorward.villaruz', '2009-4441', '2012/06/14', '2012-09-14 01:31:33', 'java programming', 'csc102'),
(65, 'dorward.villaruz', '2009-1122', '2012/06/14', '2012-09-14 01:32:21', 'elective', 'bsn1-csc100'),
(66, 'dorward.villaruz', '2005-5188', '2012/10/18', '2012-09-14 01:35:51', 'English', 'csc101-f1'),
(67, 'dorward.villaruz', '2005-5188', '2012/10/18', '2012-09-14 01:36:34', 'Data Structure', 'csc124-a1'),
(68, 'dorward.villaruz', '2009-4441', '2012/10/20', '2012-09-14 01:37:20', 'Ambot', 'ce111-w2'),
(69, 'dorward.villaruz', '2009-7604', '2012/10/26', '2012-09-14 01:37:54', 'problems', 'chem2-s1'),
(70, 'dorward.villaruz', '2008-4123', '2012/11/16', '2012-09-14 01:38:58', 'like a rose', 'ee11-s2'),
(71, 'dorward.villaruz', '2009-0007', '2012/12/06', '2012-09-14 01:39:52', 'La Na Ko Kabalo Unsa Pay Ibutang', 'csc171-e2'),
(72, 'dorward.villaruz', '2009-0000', '2012/08/08', '2012-09-14 01:41:56', 'proposal updates', 'csc198-a1'),
(73, 'dorward.villaruz', '2009-0009', '2012/08/09', '2012-09-14 01:42:43', 'Anything', 'eng1-s5'),
(74, 'dorward.villaruz', '2009-0007', '2012/08/17', '2012-09-14 01:43:21', ' Unsa pay Lain', 'csc199-d2'),
(75, 'dorward.villaruz', '2009-1122', '2012/08/24', '2012-09-14 01:44:03', 'Dota Highlights Palit', 'bsn2-q1'),
(76, 'dorward.villaruz', '2005-5188', '2012/08/30', '2012-09-14 01:44:54', 'Adobe Photoshop', 'csc111-c1'),
(77, 'dorward.villaruz', '2009-5432', '2012/09/11', '2012-09-14 01:45:36', 'Sasaw', 'mar1-g2'),
(78, 'dorward.villaruz', '2009-0000', '2012/07/10', '2012-09-14 01:46:49', 'Lechon Baboy', 'It1-ss1'),
(79, 'val.madrid', '2005-5188', '2012/01/11', '2012-09-14 08:27:31', 'Java Programming', 'csc102-b1'),
(80, 'val.madrid', '2006-3332', '2012/02/03', '2012-09-14 08:28:05', 'C++', 'csc101-c2'),
(81, 'val.madrid', '2009-0002', '2012/03/15', '2012-09-14 08:28:53', 'Ultimate Orb', 'csc124-d3'),
(82, 'val.madrid', '2009-0003', '2012/03/16', '2012-09-14 08:29:40', 'Ultimate Orb', 'csc124-d2'),
(83, 'val.madrid', '2009-0005', '2012/09/14', '2012-09-14 08:31:05', 'Simple Javascript', 'csc100-d4'),
(84, 'val.madrid', '2009-0005', '2012/09/15', '2012-09-14 08:31:43', 'Simple Javascript', 'csc100-d4'),
(85, 'rene.crisostomo', '2005-5188', '2012/09/14', '2012-09-14 10:20:05', 'Database Sql', 'csc151-s1'),
(86, 'rene.crisostomo', '2005-5188', '2012/09/15', '2012-09-14 10:20:39', 'Database Sql', 'csc151-s1'),
(87, 'rene.crisostomo', '2009-0000', '2012/09/15', '2012-09-14 10:20:52', 'Database Sql', 'csc151-s1'),
(88, 'rene.crisostomo', '2009-0005', '2012/10/11', '2012-09-14 10:21:11', 'Database Sql', 'csc151-s1'),
(89, 'rene.crisostomo', '2009-0009', '2012/10/24', '2012-09-14 10:21:31', 'Youtube ', 'csc151-s1'),
(90, 'rene.crisostomo', '2009-0009', '2012/10/25', '2012-09-14 10:21:44', 'Ambot', 'csc151-s1'),
(91, 'rene.crisostomo', '2009-1122', '2012/10/25', '2012-09-14 10:22:07', 'UI design', 'csc151-s1'),
(92, 'rene.crisostomo', '2009-3869', '2012/11/15', '2012-09-14 10:22:31', 'I Dont Know', 'csc151-s1'),
(93, 'rene.crisostomo', '2009-0007', '2012/12/20', '2012-09-14 10:33:21', 'Database Sql', 'csc151-d3'),
(94, 'rene.crisostomo', '2009-1122', '2012/12/20', '2012-09-14 10:33:35', 'Database Sql', 'csc151-d3'),
(95, 'rene.crisostomo', '2009-0007', '2012/12/20', '2012-09-14 10:34:03', 'Database Sql', 'csc151-d3'),
(96, 'rene.crisostomo', '2009-7604', '2012/08/22', '2012-09-14 10:34:36', 'Wala na ko kabalo unsa ibutang', 'csc151-d3'),
(97, 'rene.crisostomo', '2009-0002', '2012/08/22', '2012-09-14 10:34:49', 'bayot ko', 'csc151-d3'),
(98, 'rene.crisostomo', '2009-4441', '2012/07/08', '2012-09-14 10:35:11', 'Unsa pa?', 'csc151-d3'),
(99, 'rene.crisostomo', '2009-0002', '2012/06/11', '2012-09-14 10:35:31', 'Asa', 'csc151-d3'),
(100, 'dorward.villaruz', '2005-5188', '2012/09/14', '2012-09-14 13:22:22', 'rots', 'CSc 111 - JP'),
(101, 'dorward.villaruz', '2005-5188', '2012/08/09', '2012-09-14 13:24:56', 'char', 'CSc 111 - JP'),
(102, 'dorward.villaruz', '2005-5188', '2012/09/19', '2012-09-19 11:46:04', 'The second law poses an additional condition on thermodynamic processes. It is not enough to conserve energy and thus obey the first law. A machine that would deliver work while violating the second law is called a â€œperpetual-motion machine of the second kind,â€ since, for example, energy could then be continually drawn from a cold environment to do work in ', 'CSc 111 - JP');

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
  `chairman` int(1) NOT NULL,
  PRIMARY KEY (`faculty_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_uid`, `password`, `name`, `college`, `dept`, `status`, `location`, `chairman`) VALUES
('dorward.villaruz', '123e7cd7f3c39c508f07c8f974dd2f55', 'Dorward Villaruz', 'SCS', 'Computer Science', 1, 'cs dept', 0),
('val.madrid', 'd34f9f73de4e49c41bb8cb5ae0a156c3', 'Val Randolf Madrid', 'SCS', 'Computer Science', 0, 'CSM', 1),
('rene.crisostomo', 'afd7d29926d89e1fae7f8c04a58c25df', 'Rene Crisostomo', 'SCS', 'Computer Science', 0, 'hubport', 0),
('cyrus.gabilla', '0eaca0ffd0461ba0dd21ee9b1434db75', 'Cyrus Gabilla', 'SCS', 'Computer Science', 0, 'comp lab', 0),
('eli.mostrales', '5945261a168e06a5b763cc5f4908b6b2', 'Eli Mostrales', 'SCS', 'Computer Science', 0, 'cs dept', 0),
('mark.manlimos', '3c77e7a44db006bc3c68b57052c4df77', 'Mark Manlimos', 'SCS', 'Computer Science', 0, 'cs dept', 0),
('jennifer.montemayor', 'aad8de013165308d96fde6b59b46cf25', 'Jennifer Montemayor', 'SCS', 'Computer Science', 0, 'cs dept', 0),
('fatima.santos', '3bd8542b7a1a9f32acb2cbb41156d220', 'Fatimah Joy Santos', 'CASS', 'English', 0, 'english dept', 1),
('nelia.balgoa', 'b117e7b7dbf68bc0fbfb8d13070fb3a9', 'Nelia Galosa Balgoa', 'CASS', 'English', 0, 'english dept', 0),
('rosie.boniao', 'b117e7b7dbf68bc0fbfb8d13070fb3a9', 'Rosie Enderes Boniao', 'CASS', 'English', 0, 'english dept', 0),
('judith.cagaanan', '5712b298db5c730ebfdfbc9ebc4eb31b', 'Judith Cagaanan', 'CASS', 'English', 0, 'english dept', 0),
('michelle.caracut', '33b4d205bf2c13073f57902b94af6cbc', 'Michelle Jeanne  Caracut', 'CASS', 'Filipino', 0, 'filipino dept', 1),
('honeylet.dumoran', 'bb7a186065a9e4b4e5ee202aaaef75ae', 'Honeylet Ermac Dumoran', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('rosario.dizon', '67bf31c24bcb709eb151b4a0dafc022d', 'Rosario Butron Dizon', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('kristine.herbito', '68d73d3ef6c3b1a2bcdc66c429e3d5e2', 'Kristine Ramo Herbito', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('melba.ijan', 'ac5b21d484e02fa71b65d7b9fe0aee9d', 'Melba Baguio Ijan', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('lydia.mata', 'bcc1db1dfbcedeb2d5089a7516063cb4', 'Lydia Laranjo Mata', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('melecita.baena', '59ee21e6c4f8e7d59e70e40569b689d3', 'Melecita Galera Baena', 'CASS', 'Filipino', 0, 'filipino dept', 0),
('nora.clar', 'cd9f4d9237d742c8e7ff47ee9933b33f', 'Nora Ador Clar', 'CASS', 'History', 0, 'history dept', 0),
('darlene.obach', 'be1085ea9fc38376aaf1be5328667302', 'Darlene Daryl Daig Obach', 'SCS', 'Computer Science', 0, '', 0),
('jeremy.pinzon', 'd8f57cbd67382df871c502116858738d', 'Jeremy Pinzon', 'SCS', 'Computer Science', 0, '', 0),
('alquine.taculin', 'b2ba1c86c27dffeb67aa3d1edca2bd97', 'Alquine Roy Taculin', 'SCS', 'Computer Science', 0, '', 0),
('danilo.adlaon', 'f86b77d91d1d74c917649cd1c20db3bb', 'Danilo Adlaon', 'SCS', 'ESET', 0, '', 1),
('nerissa.adlaon', 'c372574758992af3a7a26486e7da5c5e', 'Nerissa Adlaon', 'SCS', 'ESET', 0, '', 0),
('aileen.cabiros', 'c9b79ff1841fb5cfecc66e1ea5a29b4d', 'Aileen Cabiros', 'SCS', 'ESET', 0, '', 0),
('ricardo.coronado', '0ec671c402439e579fdd6c2b4deb61fb', 'Ricardo Coronado', 'SCS', 'ESET', 0, '', 0),
('ernesto.empig', '325bccb7774c67d0e4fd02b598664ab8', 'Ernesto.Empig', 'SCS', 'ESET', 0, '', 0),
('rolando.galucan', '5ec822d2c28eac6a9d5f59132a8becf4', 'Rolando Galucan', 'SCS', 'ESET', 0, '', 0),
('alexander.gaw', '0e6319d231191155beb7290a29cd6cf2', 'Alexander,Gaw', 'SCS', 'ESET', 0, '', 0),
('nieva.mapula', '7c0132070a0ef71d542663e9dc1f5dee', 'Nieva Mapula', 'SCS', 'ESET', 0, '', 0),
('antonio.marajas', '36341cbb9c5a51ba81e855523de49dfd', 'Antonio Marajas', 'SCS', 'ESET', 0, '', 0),
('joseph.mascardo', '3020ed959147544a40be93b4b7954fb6', 'Joseph Allan Mascardo', 'SCS', 'ESET', 0, '', 0),
('ofelia.mendoza', '0ce86897a5099892d91a35bb7091bc2a', 'Ofelia Mendoza', 'SCS', 'ESET', 0, '', 0),
('michael.nabua', '8d26a240477b403bca8a0857f153bde5', 'Michael Nabua', 'SCS', 'ESET', 0, '', 0),
('harreez.villaruz', 'f2356229436e5d47a780fee4eac397a6', 'Harreez Villaruz', 'SCS', 'ESET', 0, '', 0),
('aloha.ambe', 'f3a7e5b18a92d7a1a00076aec74eb2b7', 'Aloha May Ambe', 'SCS', 'Information Technology', 0, '', 0),
('manuel.cabido', '6358136b4c498bfb187932237b7484cc', 'Mauel Cabido', 'SCS', 'Information Technology', 0, '', 0),
('lomesindo.caparida', '2bd541bf8053124ab281f0bcbfa5df0d', 'Lomesindo Caparida', 'SCS', 'Information Technology', 0, '', 0),
('josephine.chiu', '6e61d196546423f8a619d226a49018a8', 'Josephine Chiu', 'SCS', 'Information Technology', 0, '', 0),
('rabby.lavilles', '82d33dc357fc77c1ac6674e6744bffbf', 'Rabby Lavilles', 'SCS', 'Information Technology', 0, '', 0),
('cenie.malabanan', 'bafb12927965529d21e5ca4942c0dee8', 'Cenie Malabanan', 'SCS', 'Information Technology', 0, '', 0),
('eddie.palad', '66577d3b82a07bf81230633a30eadc76', 'Eddie Bouy Palad', 'SCS', 'Information Technology', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `fid` varchar(30) NOT NULL,
  `section` varchar(40) NOT NULL,
  `sid` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`fid`, `section`, `sid`) VALUES
('dorward.villaruz', 'CSc 111 - JP', '2005-5188'),
('dorward.villaruz', 'CSc 124 - ALG', ' 2009-7604'),
('dorward.villaruz', 'CSc 124 - ALG', '2009-0001'),
('dorward.villaruz', 'CSc 111 - JP', ' 2009-0002'),
('dorward.villaruz', 'CSc 111 - JP', ' 2012-5332'),
('dorward.villaruz', 'CSc 171 - AIA', '2009-0001');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
