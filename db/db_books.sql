-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 09:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_detail` varchar(255) NOT NULL,
  `book_user` text NOT NULL,
  `book_techer` varchar(255) NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `book_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`book_id`, `book_name`, `book_detail`, `book_user`, `book_techer`, `book_year`, `book_date`, `book_status`, `book_code`) VALUES
(1, 'หนังสือโครงงานวิทยาศาสตร์', '', '', '', 2560, '2017-10-20 00:00:00', 'ถูกยืม', ''),
(2, 'หนังสือโครงงานวิทยาศาสตร์ ระดับมัธยมศึกษา', '', '', '', 2560, '2017-10-20 00:00:00', 'ปกติ', ''),
(4, 'ระบบยืม-คืนโครงงานนักศึกษา สาขาคอมพิวเตอร์ธุรกิจ', '', 'ซาปูเราะห์  สาแม\r\nอัสมีน มะมิง', 'อาดัม  ทองดี', 2560, '2017-10-24 00:00:00', 'ปกติ', 'A0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `detail_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status_lend` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `lent_date_strat` datetime NOT NULL,
  `lend_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `history_id`, `book_id`, `status_lend`, `fine`, `lent_date_strat`, `lend_date_end`) VALUES
(3, 4, 1, 1, 0, '2017-10-24 05:53:49', '2017-11-23 00:00:00'),
(4, 4, 2, 1, 0, '2017-10-24 05:53:49', '2017-11-23 00:00:00'),
(5, 5, 1, 0, 0, '2018-12-29 02:43:44', '2019-01-28 00:00:00'),
(6, 5, 2, 1, 0, '2018-12-03 02:43:45', '2018-12-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`history_id`, `user_id`, `history_date`, `history_status`) VALUES
(4, 23, '2017-10-24 05:53:49', 0),
(5, 2, '2018-12-29 02:43:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `student_id`, `password`, `name`, `lastname`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '', 1),
(2, '406059001', '1234', 'มารีแย ', 'จินตารา', 0),
(23, '405459009', '1234', 'ซันซู', 'สะมะแอ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
