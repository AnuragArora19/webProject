-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 11:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `uid` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Mobile` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`uid`, `password`, `Mobile`, `date`, `photo`) VALUES
('anuragarora@gmail.in', 'Anurag', '6284166004', '2020-09-19', 'Screenshot (12).png');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `uid` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `exp` int(10) NOT NULL,
  `spl` varchar(100) NOT NULL,
  `ppic` varchar(30) NOT NULL,
  `certpic` varchar(30) NOT NULL,
  `dos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`uid`, `name`, `mobile`, `email`, `address`, `state`, `city`, `qualification`, `exp`, `spl`, `ppic`, `certpic`, `dos`) VALUES
('hii', 'hiii', '6284166004', 'hi@gmail.com', '# 75 model town', 'Punjab', 'bombay', 'Doctor of Philosophy (Ph.D) in Veterinary Pathology', 7, 'Fish', 'hii-Screenshot (11).png', 'hii-Screenshot (12).png', '2020-10-07'),
('Nikhil1', 'Nikhil Singla', '6284166004', 'Anuragarora5433@gmail.in', '#34 model town phase-1', 'Punjab', 'pataila', 'BV. Sc. in Animal Production & Management', 4, 'Feline', 'Nikhil1-Screenshot (20).png', 'Screenshot (22).png', '2020-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `ename` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `basicSal` float DEFAULT NULL,
  `da` float DEFAULT NULL,
  `hra` float DEFAULT NULL,
  `ma` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `net` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `ename`, `mobile`, `basicSal`, `da`, `hra`, `ma`, `total`, `tax`, `net`) VALUES
(101, 'aman', '9465042060', 500000, 250000, 100000, 165000, 12180000, 2436000, 9744000),
(102, 'Pulkit', '8284928841', 250000, 125000, 50000, 82500, 6090000, 1218000, 4872000),
(103, 'nikhil', '8360120447', 5000, 2500, 1000, 1650, 121800, 12180, 109620),
(104, 'bholu ram', '8360125447', 6000, 3000, 1200, 1980, 146160, 14616, 131544),
(105, 'chaman', '8529776077', 50, 25, 10, 16.5, 1218, 121.8, 1096.2),
(106, 'raman', '8529776577', 5058, 2529, 1011.6, 1669.14, 123213, 12321.3, 110892);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `uid` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `licence` varchar(50) NOT NULL,
  `qrpic` varchar(50) NOT NULL,
  `dos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`uid`, `fname`, `mobile`, `address`, `city`, `licence`, `qrpic`, `dos`) VALUES
('helloo', 'hello', '9041402540', 'shop no-121 ,ajit road', 'Bathinda', 'hello_2134', 'helloo-Screenshot (1).png', '2020-10-06'),
('Nikhil2', 'Nikhil Singla', '6284166004', '#344 model town phase-3', 'goa', 'nikhil_5433', 'Nikhil2-Screenshot (20).png', '2020-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `uid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`uid`, `name`, `mobile`, `address`, `pet`, `info`) VALUES
('Anurag5433', 'Anurag', '6284166004', '#75 model town phase-1', 'Dog', 'mera kutta khaint aa'),
('anurag', 'Anuraggg', '9041402538', '#75 model town phase-3', 'Dog', 'sirra kutta'),
('anurag', 'Anuraggg', '9041402538', '#75 model town phase-3', 'Fish', 'sirra  machi'),
('', '', '', '', '', ''),
('nikhil', 'nikhil', '6284166004', '#141 model town phase-2', 'Cow', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `days` varchar(3) NOT NULL,
  `selpet` varchar(20) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `pic1` varchar(100) NOT NULL,
  `pic2` varchar(100) NOT NULL,
  `pic3` varchar(100) NOT NULL,
  `dos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`uid`, `name`, `contact`, `address`, `city`, `days`, `selpet`, `info`, `pic1`, `pic2`, `pic3`, `dos`) VALUES
('aman', 'aman', '8360120447', '#75 model town phase-3', 'Bathinda', '15', 'Dog,Cat,Cow', 'hellooooo', 'aman-Screenshot (1).png', 'aman-Screenshot (2).png', 'aman-Screenshot (3).png', '2020-10-06'),
('Anurag', 'Anurag', '6284166004', '#75 model town phase-1', 'Bathinda', '20', 'Dog', 'dncjdsncsnjdcnd', 'Anurag-Screenshot (11).png', 'Anurag-Screenshot (12).png', 'Anurag-Screenshot (13).png', '2020-09-26'),
('Anurag54', 'Anurag', '6284166004', '#75 model town phase-1', 'Bathinda', '25', 'Cat', 'ncjncjencjencjenje', 'Anurag54-Screenshot (2).png', 'Anurag54-Screenshot (3).png', 'Anurag54-Screenshot (4).png', '2020-09-26'),
('Nikhil', 'Nikhil Singla', '9646190577', '#34 model town phase-1', 'Bathinda', '20', 'Dog,Cat', 'ill keep them safe.', 'Nikhil-Screenshot (21).png', 'Nikhil-Screenshot (22).png', 'Nikhil-Screenshot (23).png', '2020-10-12'),
('nikhil34', 'nikhil', '8360120447', '#34 model town', 'Bathinda', '3', '', 'ncjdnununuencuencuncjencj', 'nikhil34-Screenshot (11).png', 'nikhil34-Screenshot (13).png', 'nikhil34-Screenshot (12).png', '2020-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `perc` float NOT NULL,
  `doa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `rollno` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `per` float DEFAULT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`rollno`, `name`, `branch`, `per`, `doa`) VALUES
(101, 'Anurag', 'cse', 90, '2020-09-09'),
(102, 'Aman', 'cse', 78.99, '2020-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dos` date NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pwd`, `mobile`, `dos`, `type`) VALUES
('aman', 'aman', '9876543210', '2020-10-06', 'Shelter'),
('anurag', 'anurag123', '6284166004', '2020-09-29', 'Shelter'),
('anurag12', 'Anurag123@', '6284166004', '2020-09-30', 'Doctor'),
('Anurag123', 'anurag12', '6284166004', '2020-09-29', 'Doctor'),
('Anurag54', 'anurag', '6284166004', '2020-10-10', 'Citizen'),
('Anurag543', 'anurag@123', '6284166004', '2020-10-10', 'Shelter'),
('Anurag5433', ' f v v', '6284166004', '2020-09-29', 'Doctor'),
('Anurag5444', 'anurag', '6284166004', '2020-10-10', 'Pharmacy'),
('Apoorva', 'Apoorvs123', '7009124521', '2020-10-12', 'Citizen'),
('hello', 'hello', '6284166004', '2020-10-05', 'Doctor'),
('helloo', 'helloo', '9041402538', '2020-10-06', 'Pharmacy'),
('hellooo', 'hello', '9041402538', '2020-10-09', 'Citizen'),
('hii', 'hii', '6284166004', '2020-10-05', 'Doctor'),
('Nikhil', 'NIkhil@123', '9646190577', '2020-10-12', 'Shelter'),
('Nikhil1', 'Nikhil123', '6284166004', '2020-10-12', 'Doctor'),
('Nikhil2', 'Nikhil123', '6284166004', '2020-10-12', 'Pharmacy'),
('pulkit', 'puchi', '9465042008', '2020-10-08', 'Citizen'),
('sushil', 'Sushil@#$', '9149838520', '2020-10-11', 'Doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
