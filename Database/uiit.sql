-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2018 at 11:18 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `image` mediumblob,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Name`, `Designation`, `image`) VALUES
('malikateeq@uiit.com', 'Malik AteeQ', 'Administrator ', 0x494d475f32303137313231305f3134353534372e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

DROP TABLE IF EXISTS `lectures`;
CREATE TABLE IF NOT EXISTS `lectures` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `Semester` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL,
  `size` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `Semester`, `Subject`, `Section`, `file`, `size`) VALUES
(26, '5th', 'HCI', 'A', 'Lecture-12.ppt', '508375'),
(27, '5th', 'HCI', 'A', 'Lecture-13.ppt', '0'),
(22, '5th', 'SE-II', 'A', 'Lect_10_11_Activity_Statechart_diagram.ppt', '775680'),
(28, '5th', 'HCI', 'A', 'Lecture-14.ppt', '0'),
(25, '5th', 'SE-II', 'A', 'Lect_13_14 Component nd Deployment  diagrams.ppt', '569856'),
(24, '5th', 'SE-II', 'A', 'Software Engineering-II - Assignment1.docx', '17683'),
(29, '5th', 'TOA', 'A', 'Lecture_10_TOA.pdf', '496187'),
(30, '5th', 'TOA', 'A', 'Lecture_11_TOA.pdf', '168541'),
(31, '5th', 'HCI', 'A', 'Lecture_12_TOA.pdf', '636900'),
(32, '5th', 'Web', 'A', '1 Introduction to PHP.pptx', '75415'),
(33, '5th', 'Web', 'A', '2 Building Dynamic Pages.pptx', '75108'),
(34, '5th', 'Web', 'A', '3 Database Connectivity Using PHP and Insert Record into Database.pptx', '82030'),
(35, '5th', 'Web', 'A', 'html.docx', '13373'),
(36, '5th', 'CCNet', 'A', 'ch22_routing-1.ppt', '894464'),
(37, '5th', 'CCNet', 'A', 'EthernetCable.ppt', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('student','admin') NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `role`) VALUES
('ateeq@uiit.com', '123', 'student'),
('khalid@uiit.com', 'khalid123', 'student'),
('saad@uiit.com', 'saad123', 'student'),
('malikateeq@uiit.com', '123', 'admin'),
('shahbaz@uiit.com', 'shahbaz123', 'student'),
('malikarbaz@uiit.com', '4010110', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `Email` varchar(50) NOT NULL,
  `Arid` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Degree` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `CGPA` float NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Arid` (`Arid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Email`, `Arid`, `Name`, `Degree`, `Section`, `Semester`, `CGPA`, `image`) VALUES
('ateeq@uiit.com', '15-Arid-901', 'Malik AteeQ', 'BS Computer Science', 'A', '5th', 3.2, 'IMG_20171210_145547.jpg'),
('khalid@uiit.com', '15-Arid-876', 'Khalid Raza', 'BS Computer Science', 'A', '5th', 1.2, '26230455_2073012669598581_7182596698987135081_n.jpg'),
('malikarbaz@uiit.com', '15-Arid-900', 'Malik Arbaz Khan', 'BS Computer Science', 'A', '5th', 3.1, 'IMG-20171129-WA0011.jpg'),
('saad@uiit.com', '15-Arid-920', 'Muhammad Saad Ullah', 'BS Computer Science', 'A', '5th', 2.8, 'IMG-20170214-WA0015.jpg'),
('shahbaz@uiit.com', '15-Arid-786', 'Malik Shahbaz', 'BS Computer Science', 'A', '5th', 4, '26229662_2072748456291669_4205493246950781495_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`email`) VALUES
('malikateeq13@gmail.com'),
('malikateeq@uiit.com'),
('saad@uiit.com');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `type`, `size`, `content`) VALUES
(1, 'Untitled.png', 'image/png', 1588, 0x89504e470d0a1a0a0000000d494844520000008000000061080200000091443ebb000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa86400000021744558744372656174696f6e2054696d6500323031383a30313a31332031333a30313a34327d258a460000059c49444154785eed9b316fe24a10c7cdfb00a928f0abf802544961a42785ea91e22453da1de952a44b03a246d05c71520abad0e1124b5724af0a152e922a5fc0d54141934fc0cdac77d70b1808046ec2d3fc64c961bd59aff7ef9dd96586dcfbfbfbd9d999c510f1973c3344b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4b000c4ec15949ffd23ffd0e47fc83f981de119400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b40cc1715601adce57217707423597244a64fb53f73a32c680488ba38b86b8efec18762c3ed6ac14c5622823a2b22eae7caf77076078f432f9f941d935950bbf29d8779a3240b00980176cb19bf341c59705840fe72d49e0cab0559b000fb0062beb80fb80ba68b1f83beb61eb9da93b8882cd5df8bb7ae6eb9fb26cb12609aea4bc64d57305a804334021d2b372d2b6cd946a169124f6b068cfcf87c3e7f994fda2e7c82a75a1aa94fd02cbf56a0653c1e3acd6bed1b50dab23596975ec64ecbced60046ff3a1a3c26d5b091e817542b78dfc71db0b0ed4952ae4c5f672c1b3c2d012e0775f100856a039e0a68be1eca6377c675e5024a958e15c613f1f75bdf1f19972ca7de76c3ff9e571598fe829e3845edc64a8d35461f701aa9bf39551f502c5e8af35b2cc6025e34f1427df7d63df47e88616d96538b91b35ba1bcb648e1dc7355cd4d664aa2ad103be1ad5c0e26d25ca82353e6bc37c4ab6870128bbf56067415b82e12ad9daa00713c12e752518cc5219c701685bf1d6b143cefb05700f382228d6fad4c4b0544af4d10b5270dd4690a10f5716981bb876fc759bb6b4af5c165e85f19fb64d849646d15613361aeca62581dc89703ad653889453952b45d6b14abcfa725c0c8b785e9147b375848fc81bd1b7a97f1ade106601f779ea13af8004bad357317b65f1acfa5eb2e78cd817b5f4e2ec1b2ad501d9a0d9ec4ef03c0c2d83ed81c30c78776b3d4b01326860520867fa2440ccf0062580062580062580062580062580062bea0002aaef4e9608bfa868e2ce3e123f00c20e6ff2c808ad21c29dd41ced44f26b6f00c2086540091929698e92dc6dacc4b8063c93d2c5d55ed2c45698c8fb3a0a62a2fc6adb4db80a3565bef42b0e7d722246185fe95a82682042b4fb4926766664edcd56a7421497c548cafa6013f0ce66581e1530c00dc26a90958ad79ad076ee9ea86761423dfee583da8f980158dd40a684a7de98dedf4bca4388b427598fcbb482913f715dffe63b9ec86eac97d596ba065eb3cc87f09a966c0f4e9061f15ba52d7dfef9bb90229d3a7ee62f00bf312e014b66ed0f8cee2e4e15cbb28ce40763b293aa86017b1211878cc1fd137d25d2a148decb9bd702ab7e27cff2c3a19f59380becaed101d2012209e24b9059dcab6875435d38c0f8cd3222273245f941fd268d49e5ef1e35dda82616444e44ea1df957f2b464ce9e49d30bcef4b36078df2e112b67642b810343232ef6a9ccc804d1009808169248ab7bdadab3545ae0ee0166d715689087848bb2cadca4e7cbc4b6b993d07c2aebaed34932b454f5623404f2640a1da1b606655e877742209f8c08cf5864a820bfd9fc9456949dd760f23f230df8d5414ad8d77be73e458645601fa4622b36103d28584c1abbafff2102fb5a05d42571ac9494ce684e179619784299e2ad1217791649aac822f38ce65995880d560159126fea52de865d55ed912796ff838c0319537ba0992f275e4bd9e4a51c5fab8d4711a1b5b70ea89514a57ae2e872437207fbb70bc540cfcb1c2c93be1a3310bba620d632c940f4cf4d30f790618c01a466cc4520efdbb1df05872ffacb86501886113440c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b400c0b40cc5e0119e670f00c20c5b27e031c1cc75b16f1ef1b0000000049454e44ae426082);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
