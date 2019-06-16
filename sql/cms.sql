-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 07:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(28, 'breakfast'),
(30, 'thai'),
(32, 'lunch'),
(33, 'shoes'),
(35, 'nail art'),
(36, 'mens shoes'),
(37, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_date`, `comment_content`, `comment_status`, `comment_email`) VALUES
(9, 9, 'mushroom', '2019-06-08', 'mushroom soup is great', 'approved', 'mushroom@gmail.com'),
(10, 9, 'DEEP PRAKASH GOYAL', '2019-06-08', 'THIS IS DEEP', 'approved', 'deepprakashgoyal@gmail.com'),
(12, 10, 'manu', '2019-06-08', 'nice shoes', 'approved', 'manu@gmail.com'),
(16, 10, 'jas', '2019-06-08', 'good shoes', 'approved', 'sim@gmail.com'),
(18, 10, 'nandi', '2019-06-08', 'nice lofers', 'unapproved', 'nadnini@gmail.com'),
(20, 10, 'good', '2019-06-08', 'good shoes', 'approved', 'good@gmail.com'),
(22, 11, 'silpa', '2019-06-08', 'nice nail art desing thanks for sharing', 'approved', 'silpa@gmail.com'),
(23, 11, 'madhu', '2019-06-08', 'such a nice pic', 'approved', 'madhu@gmail.com'),
(24, 11, 'mina', '2019-06-08', 'this is good art', 'approved', 'mina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_catagory_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_catagory_id`, `post_title`, `post_author`, `post_comment_count`, `post_content`, `post_date`, `post_image`, `post_tag`, `post_status`) VALUES
(9, 25, 'strawberry smoothie', 'deep', '', '			\r\n						\r\n						\r\n						\r\n			Lorem Ipsum is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.								', '2019-06-09', 'cold, smooth & tasty..png', 'deep', 'published'),
(10, 31, 'mushroom soup', 'manali', '', '			\r\n						\r\n			Lorem Ipsum is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.				', '2019-06-08', 'footwear-leather-shoes-267320.jpg', 'soup', 'published'),
(12, 25, 'shoe trends', 'jimmy', '', '			\r\n			shoes are most fashionable thing in this world everyone likes shoes		', '2019-06-08', 'fashion-footwear-shoes-19090.jpg', 'shoe, fashion', 'published'),
(13, 25, 'nail desings in trends', 'miny', '', '			\r\n			i love nail art this is a setisfieng thing \r\n		', '2019-06-08', 'cold, smooth & tasty. (2).png', 'nail art, fashion', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'nandini45', 'nandini', 'nandini', 'goel', 'nandini@gmail.com', 'Untitled design.png', 'subscriber', ''),
(5, 'deep23', 'deep23', 'deep', 'prakash', 'deep@gmail.com', 'download (1).png', 'admin', ''),
(6, 'mohan123', 'mohan123', 'mohan', 'rajput', 'mohan@gmail.com', 'Untitled design (4).png', 'admin', ''),
(7, 'sanu', 'sanu', 'sanu', 'goyal', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', ''),
(8, 'sanu', 'sanu', 'sanu', 'goyal', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', ''),
(9, '', '', '', '', '', '', 'admin', ''),
(10, '', '', '', '', '', '', 'admin', ''),
(11, '', '', '', '', '', '', 'admin', ''),
(12, 'sanu', 'sanu', 'sanu', 'sanu ', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', ''),
(13, 'sanu', 'sanu', 'sanu', 'sanu ', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', ''),
(14, 'sanu', 'sanu', 'sanu', 'sanu ', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', ''),
(15, 'sanu', 'sanu', 'sanu', 'sanu ', 'sanu@gmail.com', 'prewedding-1024x853.jpg', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
