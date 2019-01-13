-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 07:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(2, 'June-01-2018 22:42:51', 'SQL', 'Mysql', 'Mohammad Nawaz', 'mysqlimg.png', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.'),
(7, 'June-03-2018 12:46:13', 'Diwali', 'Culture', 'Mohammad Nawaz', 'Diwali.jpg', 'WISHING YOU VERY HAPPY DIWALI !!!\r\n\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.'),
(11, 'June-03-2018 12:54:44', 'WELCOME', 'Culture', 'Mohammad Nawaz', 'NAMASTE.jpg', 'This is how we welcome Guests \r\n\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.'),
(14, 'June-05-2018 15:47:16', 'LOGO OF PHP( Very important for Web Developers)', 'WORK', 'Mohammad Nawaz', 'PHP.png', '                5555This is the logo of php. By the way that\'s an ELEPHANT :D :D\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\nCurabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n            Praesent sapien massa, convallis a pellentesque nec,\r\n            egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.\r\n           Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n           Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n           Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.                            '),
(15, 'June-06-2018 16:23:12', 'Java', 'WORK', 'NashKay', 'java.jpg', ';vndl;akn vkldanV\'NDSLKVNSlkdnbvlkSNKFNkvwnv\';dn\'WKNVKNwlv'),
(16, 'June-09-2018 15:22:39', 'Work Environment', 'WORK', 'NashKay', 'workenvi.jpg', 'Testing 2'),
(17, 'June-09-2018 15:23:35', 'MariaDB', 'WORK', 'NashKay', 'Maria_img.png', 'Testing 3'),
(18, 'June-09-2018 15:24:01', 'Diwali', 'Culture', 'NashKay', 'Diwali.jpg', 'Testing 4\r\n'),
(19, 'June-09-2018 15:24:28', 'LOGO OF PHP', 'PHP', 'NashKay', 'PHP.png', 'Testing 5\r\n'),
(21, 'June-09-2018 15:26:34', 'Diwali', 'Culture', 'NashKay', 'Diwali.jpg', 'testing7'),
(22, 'June-09-2018 15:27:27', 'Nawaz', 'WORK', 'NashKay', 'Work.jpg', 'Testing8'),
(23, 'June-09-2018 15:46:30', 'Culture', 'Culture', 'NashKay', 'culture.jpg', 'test 13'),
(24, 'June-09-2018 18:32:09', 'Work Environment', 'WORK', 'Mohammad Nawaz', 'NAMASTE.jpg', '                                                                                                                                                                                                This is testing Para 1\r\nThis is the Para 2\r\n<h1>This is the FIrst Heading </h1>\r\nAnd this is the 3rd Para\r\n<h3> This image is bought directly from the google  url link </h3>\r\n<img class=\"img-responsive\" src=\"images/Nawaz.jpg \">\r\nNot necessary to hit Shift+Enter, Just the Enter will Do the job                                                                                                                                                                        '),
(25, 'June-10-2018 14:11:00', 'Tradition', 'Culture', 'NashKay', 'Tradition.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(26, 'June-10-2018 14:47:21', 'Tattoo Arm', 'Style', 'NashKay', 'style.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(1, 'June-01-2018 17:34:41', 'Trending', 'Mohammad Nawaz'),
(4, 'June-01-2018 18:41:47', 'PHP', 'Mohammad Nawaz'),
(5, 'June-01-2018 18:41:58', 'Mysql', 'Mohammad Nawaz'),
(7, 'June-01-2018 21:35:14', 'Style', 'Mohammad Nawaz'),
(8, 'June-03-2018 12:44:38', 'Culture', 'Mohammad Nawaz'),
(9, 'June-03-2018 12:47:48', 'WORK', 'Mohammad Nawaz'),
(10, 'June-10-2018 17:05:46', 'Fashion', 'NashKay'),
(11, 'June-19-2018 12:02:37', 'Education', 'NashKay');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `approveby` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comments`, `approveby`, `status`, `admin_panel_id`) VALUES
(5, 'June-05-2018 18:22:36', 'Nash', 'nashkay@hotmail.com', 'Best Welcome in the World', 'NashKay', 'ON', 11),
(6, 'June-06-2018 11:41:40', 'Root', 'root@nothing.com', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ', 'NashKay', 'ON', 2),
(7, 'June-06-2018 11:44:22', 'Peter', 'peet@gmail.com', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.', 'MohammadNawaz', 'ON', 14),
(8, 'June-06-2018 12:33:18', 'Rak', 'rak@gmail.com', 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.', 'NashKay', 'ON', 14),
(9, 'June-06-2018 12:33:54', 'Median', 'median@gmail.com', 'llis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pra', 'NashKay', 'ON', 11),
(10, 'June-06-2018 16:34:27', 'nawaz', 'mohammadnawaz.me@gmail.com', 'Checking', 'NashKay', 'ON', 15),
(11, 'June-10-2018 17:01:57', 'John Snow', 'john@nothing.com', 'mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui', 'NashKay', 'ON', 26),
(12, 'June-10-2018 17:02:55', 'Sansa', 'sanasa@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 'NashKay', 'ON', 25),
(13, 'June-10-2018 17:03:10', 'Ned', 'ned@icloud.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 'NashKay', 'ON', 25),
(14, 'June-10-2018 17:04:01', 'Joffery', 'Joff@noting.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 'NashKay', 'ON', 26),
(15, 'June-10-2018 17:04:33', 'Baratheon', 'bar@iclod.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', 'NashKay', 'OFF', 26),
(16, 'June-19-2018 12:00:26', 'kristan', 'kris@nothing.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'NashKay', 'ON', 26),
(17, 'June-25-2018 20:54:34', 'fayaz', 'fayaz@nothing.com', 'niam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'NashKay', 'ON', 26);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `password`, `addedby`) VALUES
(2, 'June-06-2018 14:27:03', 'NashKay', '1234', 'Mohammad Nawaz'),
(3, 'June-06-2018 14:29:31', 'MohammadNawaz', '1234', 'Mohammad Nawaz'),
(4, 'June-06-2018 16:25:08', 'Doe', '1234', 'NashKay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `foreign key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
