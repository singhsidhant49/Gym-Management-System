-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 06:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `username` varchar(1000) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(225) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_edit_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_status` varchar(10) COLLATE utf8_bin NOT NULL,
  `cat_priority` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_desc`, `cat_slug`, `cat_date`, `cat_edit_date`, `cat_status`, `cat_priority`) VALUES
(1, 'Weight Lifting', 'Weight Lifting', '1', '13/08/2020', '13/08/2020', '1', '1'),
(4, 'Weight Loss', 'Weight Loss', '1', '13/08/2020', '13/08/2020', '1', '1'),
(5, 'Cardio', 'Cardio', '1', '13/08/2020', '13/08/2020', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(225) NOT NULL,
  `postid` int(225) NOT NULL,
  `comm_autor` varchar(1000) NOT NULL,
  `comm_email` varchar(100) NOT NULL,
  `comm_text` varchar(1000) NOT NULL,
  `comm_status` varchar(1000) NOT NULL,
  `comm_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postid`, `comm_autor`, `comm_email`, `comm_text`, `comm_status`, `comm_date`) VALUES
(2, 1, 'Suraj Bisht', ' b3.png', 'Best', '', '13/08/2020'),
(5, 1, 'ADMIN', ' s.png', 'suetsdj', '', '13/08/2020'),
(6, 2, 'ADMIN', ' s.png', 'sdfds', '', '16/08/2020'),
(7, 2, 'Suraj Bisht', ' team1-removebg-preview.png', 'sd', '', '17/08/2020'),
(8, 2, 'Suraj Bisht', ' team1-removebg-preview.png', 'sd', '', '17/08/2020'),
(9, 2, 'Suraj Bisht', ' team1-removebg-preview.png', 'sd', '', '17/08/2020'),
(10, 2, 'Suraj Bisht', ' team1-removebg-preview.png', 'sd', '', '17/08/2020');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(225) NOT NULL,
  `enq_date` varchar(20) NOT NULL,
  `cus_name` varchar(500) NOT NULL DEFAULT '',
  `contact` varchar(10) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `ename` varchar(500) NOT NULL,
  `eamount` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `date`, `ename`, `eamount`) VALUES
(1, '13-07-2021', 'Salary', '7000'),
(2, '25-07-2021', 'Trainer Salary', '7500'),
(3, '02-08-2021', 'Salary', '7500'),
(4, '09-08-2021', 'salary', '3500'),
(5, '14-02-2023', 'rent', '350');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(225) NOT NULL,
  `m_image` varchar(1000) NOT NULL,
  `cus_name` varchar(1000) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `alcontact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(1000) NOT NULL,
  `h_feet` int(100) NOT NULL,
  `h_inch` int(225) NOT NULL,
  `weight` int(225) NOT NULL,
  `bmi2` varchar(50) NOT NULL,
  `bmr` varchar(50) NOT NULL,
  `fat` varchar(50) NOT NULL,
  `bp` varchar(50) NOT NULL,
  `fitnessgoal` varchar(500) NOT NULL,
  `medicalhistory` varchar(1000) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `plan` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `paid_date` varchar(100) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `months` varchar(600) NOT NULL,
  `type` int(11) NOT NULL,
  `bmi` varchar(1000) NOT NULL,
  `pendingpayment` varchar(1000) NOT NULL,
  `pendingdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `m_image`, `cus_name`, `contact`, `alcontact`, `email`, `password`, `gender`, `dob`, `address`, `h_feet`, `h_inch`, `weight`, `bmi2`, `bmr`, `fat`, `bp`, `fitnessgoal`, `medicalhistory`, `joining_date`, `plan`, `status`, `paid_date`, `expiry_date`, `amount`, `months`, `type`, `bmi`, `pendingpayment`, `pendingdate`) VALUES
(20, 'man-1459246.png', 'siddhant singh22', '8077896748', '', '', '12345', 'Male', '2000-08-27', 'def', 0, 0, 0, '', '', '', '', 'Fat Loss,Bodybuilding', 'd', '15-02-2023', '3 month', 'Active', '15-02-2023', '16-05-2023', 2800, '90 Days', 2, '', '', ''),
(21, 'pythoncert.jpeg', 'payara lal', '33232', '323432', 'admin@phpzag.com', '12345', 'Male', '3333-03-31', 'fddf', 0, 0, 0, '', '', '', '', 'Weight Gain', 'd', '15-02-2023', '3 month', 'Active', '15-02-2023', '16-05-2023', 2800, '90 Days', 2, '', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `serial` int(225) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_detail` varchar(1000) NOT NULL,
  `month` varchar(200) NOT NULL,
  `days` varchar(100) NOT NULL,
  `rate` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`serial`, `plan_name`, `plan_detail`, `month`, `days`, `rate`) VALUES
(8, '3 month', '3 month plan', '', '90', 2800),
(10, '12 month', 'yearly ', '', '365', 7500),
(13, 'ddddwe', 'dfssdf', '34', '', 123123123);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `post_category` varchar(10) COLLATE utf8_bin NOT NULL,
  `post_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_autor` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_edit_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_image1` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_image2` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_image3` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_text` text COLLATE utf8_bin NOT NULL,
  `post_tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_visit_counter` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_priority` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_autor_name` varchar(1000) COLLATE utf8_bin NOT NULL,
  `autor_type` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prosale`
--

CREATE TABLE `prosale` (
  `id` int(225) NOT NULL,
  `saledate` varchar(1000) NOT NULL,
  `invoiceno` varchar(1000) NOT NULL,
  `proname` varchar(1000) NOT NULL,
  `batchno` varchar(1000) NOT NULL,
  `cusname` varchar(1000) NOT NULL,
  `phoneno` varchar(1000) NOT NULL,
  `smrp` varchar(1000) NOT NULL,
  `discount` varchar(1000) NOT NULL,
  `gst` varchar(1000) NOT NULL,
  `cgst` varchar(1000) NOT NULL,
  `sgst` varchar(1000) NOT NULL,
  `igst` varchar(1000) NOT NULL,
  `exclude` varchar(1000) NOT NULL,
  `excludedis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prosale`
--

INSERT INTO `prosale` (`id`, `saledate`, `invoiceno`, `proname`, `batchno`, `cusname`, `phoneno`, `smrp`, `discount`, `gst`, `cgst`, `sgst`, `igst`, `exclude`, `excludedis`) VALUES
(2, '25/07/2021', '4755', 'Nitrotech whey', '123', 'suraj', '984575485', '3800', '5', '18', '9', '9', '0', '3220.3389830508', '161.01694915254'),
(3, '02/08/2021', '1401', 'Nitrotech whey', '12345', 'SURAJ', '75485566555', '4100', '1', '0', '', '', '0', '4100', '41');

-- --------------------------------------------------------

--
-- Table structure for table `pur2`
--

CREATE TABLE `pur2` (
  `id` int(225) NOT NULL,
  `invoices` varchar(1000) NOT NULL,
  `batchno` varchar(1000) NOT NULL,
  `proname` varchar(1000) NOT NULL,
  `mrp` varchar(1000) NOT NULL,
  `discount` varchar(1000) NOT NULL,
  `gst` varchar(1000) NOT NULL,
  `cgst` varchar(1000) NOT NULL,
  `sgst` varchar(1000) NOT NULL,
  `igst` varchar(1000) NOT NULL,
  `exclude` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pur2`
--

INSERT INTO `pur2` (`id`, `invoices`, `batchno`, `proname`, `mrp`, `discount`, `gst`, `cgst`, `sgst`, `igst`, `exclude`) VALUES
(1, '456', '756747568487', 'Nitrotech whey', '3800', '', '18', '9', '9', '0', '3220.3389830508'),
(2, '456', '357437', 'Nitrotech whey', '3900', '', '18', '9', '9', '0', '3305.0847457627'),
(3, '414755', '756747568487', 'Nitrotech whey', '3800', '', '18', '9', '9', '0', '3220.3389830508'),
(4, '414755', '334566', 'Nitrotech whey', '3800', '', '18', '9', '9', '0', '3220.3389830508'),
(5, '475', '123', 'Nitrotech whey', '3600', '', '18', '9', '9', '0', '3050.8474576271'),
(6, '475', '234', 'Nitrotech whey', '2323', '', '18', '9', '9', '0', '1968.6440677966'),
(7, '141410', '12345', 'Nitrotech whey', '3700', '', '18', '9', '9', '0', '3135.593220339'),
(8, '141410', '1234567890', 'Nitrotech whey', '3700', '', '18', '9', '9', '0', '3135.593220339'),
(9, '5822', '10120', 'powder1', '2500', '2', '5', '2.5', '2.5', '0', '2330.9523809524'),
(10, '5822', '10120', 'powder2', '2500', '2', '5', '2.5', '2.5', '0', '2330.9523809524'),
(11, '1001', '10002', 'ppo', '2000', '5', '5', '2.5', '2.5', '0', '1804.7619047619'),
(12, '1001', '10121', 'powder1ewe', '4000', '5', '5', '2.5', '2.5', '0', '3609.5238095238');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(225) NOT NULL,
  `invoiceno` varchar(1000) NOT NULL,
  `purchasedate` varchar(100) NOT NULL,
  `partyname` varchar(1000) NOT NULL,
  `quantity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `invoiceno`, `purchasedate`, `partyname`, `quantity`) VALUES
(1, '456', '28/06/2021', 'Sh health', '2'),
(2, '414755', '13/07/2021', 'MI Nutrition Mantra', '2'),
(3, '475', '25/07/2021', 'Sh', '2'),
(4, '141410', '02/08/2021', 'Sh Mantra Nutrition', '2'),
(5, '5822', '14/02/2023', 'monalisa', '5'),
(6, '1001', '14/02/2023', 'monalisa', '2');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider`) VALUES
(24, 'r.jpg'),
(30, 'o.jpg'),
(31, 'e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `timeboook`
--

CREATE TABLE `timeboook` (
  `idd` int(11) NOT NULL,
  `sid` int(225) NOT NULL,
  `cid` int(224) NOT NULL,
  `customer` varchar(1000) NOT NULL,
  `slot` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(225) NOT NULL,
  `timeslot` varchar(1000) NOT NULL,
  `nummember` varchar(1000) NOT NULL,
  `enroll` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toptext`
--

CREATE TABLE `toptext` (
  `txtid` int(1) NOT NULL,
  `texxt` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toptext`
--

INSERT INTO `toptext` (`txtid`, `texxt`) VALUES
(1, 'Welcome to Gym Pro');

-- --------------------------------------------------------

--
-- Table structure for table `trans_his`
--

CREATE TABLE `trans_his` (
  `tid` int(225) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `paid_da` varchar(20) NOT NULL,
  `expiry_da` varchar(20) NOT NULL,
  `plan_name` varchar(1000) NOT NULL,
  `amt` int(255) NOT NULL,
  `month` varchar(225) NOT NULL,
  `nowdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_his`
--

INSERT INTO `trans_his` (`tid`, `contact`, `paid_da`, `expiry_da`, `plan_name`, `amt`, `month`, `nowdate`) VALUES
(1, '8279858076', '28-11-2020', '28-12-2020', '700', 700, '1 Months', '06-03-2021'),
(2, '8279858076', '28-12-2020', '28-01-2021', '700', 700, '1 Months', '06-03-2021'),
(3, '7987898789', '01-07-2020', '01-08-2020', '700', 700, '1 Months', '06-03-2021'),
(4, '8279858000', '28-11-2020', '28-12-2020', '700', 700, '1 Months', '08-06-2021'),
(5, '8279858076', '11-06-2021', '11-07-2021', '700', 700, '1 Months', '11-06-2021'),
(6, '8279858076', '11-06-2021', '11-07-2021', '700', 700, '1 Months', '11-06-2021'),
(7, '7987898789', '10-05-2021', '10-06-2021', '700', 700, '1 Months', '11-06-2021'),
(8, '9568748519', '25-06-2021', '25-07-2021', '700', 700, '1 Months', '28-06-2021'),
(9, '8279858076', '28-06-2021', '28-09-2021', 'quartelry', 2400, '3 Months', '28-06-2021'),
(10, '8279858000', '28-12-2020', '28-03-2021', 'quartelry', 2400, '3 Months', '28-06-2021'),
(11, '8279858000', '28-03-2021', '28-06-2021', 'quartelry', 2400, '3 Months', '28-06-2021'),
(12, '8279858000', '28-06-2021', '28-09-2021', 'quartelry', 2400, '3 Months', '28-06-2021'),
(13, '8279858076', '13-07-2021', '12-08-2021', 'Monthly', 1100, '30 Days', '13-07-2021'),
(14, '8652255669', '01/07/2021', '07-04-2021', 'quartelry', 2400, '3 Months', '23-07-2021'),
(15, '8279858071', '04-07-2021', '03-08-2021', 'Monthly', 1100, '30 Days', '25-07-2021'),
(16, '9568748519', '25-07-2021', '24-08-2021', 'Monthly', 1100, '30 Days', '25-07-2021'),
(17, '8279858079', '02-07-2021', '01-08-2021', 'Monthly', 1100, '30 Days', '25-07-2021'),
(18, '9897900222', '02-08-2021', '01-09-2021', 'Monthly Package', 1300, '30 Days', '02-08-2021'),
(19, '9897900222', '01-08-2021', '31-08-2021', 'Monthly Package', 1300, '30 Days', '02-08-2021'),
(20, '8279858079', '01-08-2021', '31-08-2021', 'Monthly Package', 1300, '30 Days', '02-08-2021'),
(21, '8978452510', '02-07-2021', '02-08-2021', 'Monthly', 1200, '1 Months', '09-08-2021'),
(22, '7987898789', '10-06-2021', '10-07-2021', 'Monthly', 1200, '1 Months', '09-08-2021'),
(23, '7987898789', '10-07-2021', '10-08-2021', 'Monthly', 1200, '1 Months', '09-08-2021'),
(24, '8978452510', '09-08-2021', '09-09-2021', 'Monthly', 1200, '1 Months', '09-08-2021'),
(25, '9865326980', '12-08-2021', '12-09-2021', 'Monthly', 1200, '1 Months', '09-08-2021'),
(26, '9065939852', '09-08-2021', '30-08-2021', 'new year offer plan', 1350, '21 Days', '09-08-2021'),
(27, '9068072152', '11-08-2021', '01-09-2021', 'new year offer plan', 1350, '21 Days', '09-08-2021'),
(28, '8652255669', '07-04-2021', '28-04-2021', 'new year offer plan', 1350, '21 Days', '09-08-2021'),
(29, '8652255669', '28-04-2021', '19-05-2021', 'new year offer plan', 1350, '21 Days', '09-08-2021'),
(30, '8209512896', '13-08-2021', '03-09-2021', 'new year offer plan', 1350, '21 Days', '09-08-2021'),
(31, '7983928641', '16-12-2022', '16-01-2023', 'Monthly', 1200, '1 Months', '16-12-2022'),
(32, '123456789', '16-12-2022', '16-03-2023', '3 month', 2800, '90 Days', '16-12-2022'),
(33, '8475009596', '14-02-2023', '14-03-2023', 'Monthly', 1200, '1 Months', '14-02-2023'),
(34, '8475009596', '', '15-05-2023', '3 month', 2800, '90 Days', '14-02-2023'),
(35, '7983928641', '14-02-2023', '15-05-2023', '3 month', 2800, '90 Days', '14-02-2023'),
(36, '123456789', '13-02-2023', '13-03-2023', 'Monthly', 1200, '1 Months', '14-02-2023'),
(37, '456456', '14-02-2023', '14-03-2023', 'Monthly', 1200, '1 Months', '14-02-2023'),
(38, '78784564563', '16-12-2022', '16-01-2023', 'Monthly', 1200, '1 Months', '14-02-2023'),
(39, '1231231230', '14-02-2023', '14-03-2023', 'Monthly', 1200, '1 Months', '14-02-2023'),
(40, '8077896748', '15-02-2023', '16-05-2023', '3 month', 2800, '90 Days', '15-02-2023'),
(41, '33232', '15-02-2023', '16-05-2023', '3 month', 2800, '90 Days', '15-02-2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(225) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `code` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(100) COLLATE utf8_bin NOT NULL,
  `type` varchar(10) COLLATE utf8_bin NOT NULL,
  `address` varchar(1000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gender`, `image`, `code`, `status`, `type`, `address`) VALUES
(1, 'siddhant singh', '122334345', 'info@softtechsolution.in', 'admin@123', 'Male', 'man-1459246.png', '', 'Active', '1', 'Dehradun'),
(2, 'adminn', '8958186196', 'admin@hotmail.com', '12345', 'Male', 'man-1459246.png', '', 'Active', '1', 'india\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(100) NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`) VALUES
(6, 'VID-20200315-WA0003.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prosale`
--
ALTER TABLE `prosale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pur2`
--
ALTER TABLE `pur2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeboook`
--
ALTER TABLE `timeboook`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_his`
--
ALTER TABLE `trans_his`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `serial` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prosale`
--
ALTER TABLE `prosale`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pur2`
--
ALTER TABLE `pur2`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `timeboook`
--
ALTER TABLE `timeboook`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_his`
--
ALTER TABLE `trans_his`
  MODIFY `tid` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
