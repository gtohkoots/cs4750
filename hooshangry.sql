-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hooshangry`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `notifytime` datetime NOT NULL,
  `cid` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `notifytime`, `cid`, `email`) VALUES
(2, '2021-10-29 21:25:10', 'an6gzp', '4o@yahoo.com'),
(3, '2021-11-07 21:07:00', 'an6gzp', '4o@yahoo.com'),
(4, '2021-10-29 21:25:10', 'an6gzp', '4o@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  CHECK (capacity < 6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `cid`, `time`, `details`, `capacity`, `tid`) VALUES
(1, 'kt9sh', '2021-10-30 21:25:10', 'This is a test post', 2, 1),
(2, 'an6gzp', '2021-11-29 12:23:40', 'Hello from Anh Thu', 5, 1),
(3, 'an6gzp', '2021-11-29 13:14:34', 'Hello from Anh Thu Again', 3, 1),
(4, 'an6gzp', '2021-11-29 13:19:37', 'UVA vs Tech', 4, 2),
(5, 'kt9sh', '2021-11-08 21:07:00', 'Of Wahoowa', 4, 1),
(6, 'kt9sh', '2021-12-08 14:42:00', 'Night Date In Runk', 2, 2),
(7, 'pichu', '2021-12-01 19:39:00', 'weishenme', 5, 2),
(8, 'an6gzp', '2021-12-02 01:49:00', 'jhgfhj', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pushes`
--

CREATE TABLE `pushes` (
  `rid` int(11) NOT NULL,
  `nid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `cid1` varchar(10) NOT NULL,
  `cid2` varchar(10) NOT NULL,
  `report_cat` varchar(20) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`cid1`, `cid2`, `report_cat`, `reason`, `date`) VALUES
('jml7ctd8', 'kt9sh', 'Inappropriate', 'ew', '0000-00-00 00:00:00'),
('jml7ctd8', 'an6gzp', 'Late', 'Bad', '2021-12-01 00:00:00'),
('jml7ctd8', 'kt9sh', 'Inappropriate', 'ew', '2021-12-01 20:26:15'),
('pichu', 'kt9sh', 'Scam', 'tkt is a scam', '2021-12-01 22:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `reports_deduction`
--

CREATE TABLE `reports_deduction` (
  `report_cat` varchar(20) NOT NULL,
  `deduction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports_deduction`
--

INSERT INTO `reports_deduction` (`report_cat`, `deduction`) VALUES
('Inappropriate', 2),
('Late', 3),
('No Show', 10),
('Other', 0),
('Scam', 15);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rid`, `cid`, `pid`) VALUES
(3, 'kt9sh', 2),
(7, 'kt9sh', 3),
(11, 'kt9sh', 4),
(12, 'jml7ctd8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `tid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`tid`, `name`) VALUES
(1, 'random'),
(2, 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `cid` varchar(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `rating` double DEFAULT NULL,
  `pwd` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `fname`, `lname`, `rating`, `pwd`, `role`) VALUES
('888', '3', '3', 0, 'test', 'student'),
('9032', 'adf', ';4ljt;l', 0, 'abc', 'student'),
('admin', 'test', 'admin', 0, '123456', 'admin'),
('an6gzp', 'Anh-Thu', 'Nguyen', 0, '12345', 'student'),
('asd', '3', '2', 0, 'test', 'student'),
('jml7ctd', 'Jack', 'Liu', 0, 'test', 'student'),
('jml7ctd4', 'Jack', 'Liu', 0, 'test', 'student'),
('jml7ctd5', 'Jack', 'Liu', 0, 'Liu', 'student'),
('jml7ctd8', 'Jkl;dfj', '5LKJT6;', 0, 'abbbb', 'student'),
('kt9sh', 'Ketian', 'Tu', 0, '12345', 'student'),
('pichu', 'PiChu', 'Lam', 0, 'pichu', 'student'),
('vbp8vgc', 'Victor', 'Pham', 0, '555', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `cid` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`cid`, `email`) VALUES
('888', '52@gmail.com'),
('an6gzp', '4o@yahoo.com'),
('asd', '56@gmail.com'),
('jml7ctd', 'jackliu612@gmail.com'),
('jml7ctd4', 'jackliu612@gmail.com'),
('jml7ctd5', 'jackliu612@gmail.com'),
('jml7ctd8', 'RE2F@GK.COM'),
('kt9sh', 'kt9sh@virginia.edu'),
('pichu', 'pichu@harvard.edu'),
('vbp8vgc', 'vbp8vgc@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `user_phonenumber`
--

CREATE TABLE `user_phonenumber` (
  `cid` varchar(10) NOT NULL,
  `phonenumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_phonenumber`
--

INSERT INTO `user_phonenumber` (`cid`, `phonenumber`) VALUES
('888', '235'),
('9032', '390'),
('asd', '654'),
('jml7ctd', '5716120835'),
('jml7ctd4', '5716120835'),
('jml7ctd5', '5716120835'),
('jml7ctd8', '490'),
('kt9sh', '4342573706'),
('pichu', '4'),
('vbp8vgc', '8043547000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `cid` (`cid`,`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `pushes`
--
ALTER TABLE `pushes`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `FK_pushNotif` (`nid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`cid1`,`date`),
  ADD KEY `FK_userReported` (`cid2`),
  ADD KEY `FK_reportDeduction` (`report_cat`);

--
-- Indexes for table `reports_deduction`
--
ALTER TABLE `reports_deduction`
  ADD PRIMARY KEY (`report_cat`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`cid`,`email`);

--
-- Indexes for table `user_phonenumber`
--
ALTER TABLE `user_phonenumber`
  ADD PRIMARY KEY (`cid`,`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`cid`,`email`) REFERENCES `user_email` (`cid`, `email`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `topic` (`tid`);

--
-- Constraints for table `pushes`
--
ALTER TABLE `pushes`
  ADD CONSTRAINT `FK_pushNotif` FOREIGN KEY (`nid`) REFERENCES `notification` (`nid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_pushReservation` FOREIGN KEY (`rid`) REFERENCES `reservation` (`rid`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `FK_reportDeduction` FOREIGN KEY (`report_cat`) REFERENCES `reports_deduction` (`report_cat`),
  ADD CONSTRAINT `FK_userReported` FOREIGN KEY (`cid2`) REFERENCES `user` (`cid`),
  ADD CONSTRAINT `FK_userReporting` FOREIGN KEY (`cid1`) REFERENCES `user` (`cid`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`);

--
-- Constraints for table `user_email`
--
ALTER TABLE `user_email`
  ADD CONSTRAINT `user_email_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`);

--
-- Constraints for table `user_phonenumber`
--
ALTER TABLE `user_phonenumber`
  ADD CONSTRAINT `user_phonenumber_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Trigger
DELIMITER $$
CREATE TRIGGER RatingTrigger
BEFORE INSERT ON `user`
FOR EACH ROW
BEGIN
  SET new.rating = 0;
END
$$
DELIMITER ;