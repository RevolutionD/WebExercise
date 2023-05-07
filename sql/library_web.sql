-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT 2 COMMENT '1 - Admin\r\n2 - User',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `type`, `create_at`, `update_at`) VALUES
(1, 'admin', '698d51a19d8a121ce581499d7b701668', 1, '2023-05-01 14:57:13', '2023-05-01 14:57:13'),
(2, 'ooooo', '698d51a19d8a121ce581499d7b701668', 2, '2023-05-01 14:58:12', '2023-05-01 14:58:12'),
(12, 'ooo', '1bbd886460827015e5d605ed44252251', 2, '2023-05-03 09:15:55', '2023-05-03 09:15:55'),
(16, 'abc', '202cb962ac59075b964b07152d234b70', 2, '2023-05-05 01:48:36', '2023-05-05 01:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` tinyint(4) NOT NULL,
  `full_name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `account_id` int(11) NOT NULL DEFAULT -1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `email`, `account_id`, `create_at`, `update_at`) VALUES
(1, 'admin one', 'a@b.c', 1, '2023-05-01 15:09:22', '2023-05-01 15:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Dennis Ritchie', '2023-05-05 04:43:05', '2023-05-07 03:55:33'),
(2, 'Bjarne Stroustrup', '2023-05-05 04:43:26', '2023-05-07 03:55:42'),
(3, 'James Gosling', '2023-05-05 04:50:17', '2023-05-07 03:58:51'),
(4, 'John Duckett', '2023-05-05 06:24:17', '2023-05-05 06:24:17'),
(5, 'David DuRocher', '2023-05-05 06:25:42', '2023-05-05 06:25:42'),
(6, 'Paul Mcfedries', '2023-05-05 07:01:51', '2023-05-05 07:01:51'),
(7, 'Tiffany B. Brown', '2023-05-05 07:12:58', '2023-05-05 07:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '- 0 lost\r\n- 1 not issue\r\n- 2 issued',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `name`, `category_id`, `author_id`, `price`, `image`, `status`, `create_at`, `update_at`) VALUES
(1, 'HTML & CSS Quickstart: The Simplified Beginner’s Guide', 3, 5, 25, 'book1.png', 1, '2023-05-05 06:39:07', '2023-05-05 06:39:07'),
(2, 'Web Design Playground: HTML & CSS the Interactive Way', 3, 6, 30, 'book2.png', 1, '2023-05-05 07:05:40', '2023-05-05 07:05:40'),
(3, 'CSS Master: 3rd Edition', 3, 7, 25, 'book3.png', 1, '2023-05-05 07:13:23', '2023-05-05 07:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_author_detail`
--

CREATE TABLE `tbl_book_author_detail` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 - not active\r\n1 - active',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `status`, `create_at`, `update_at`) VALUES
(1, 'Technology', 0, '2023-05-04 14:25:55', '2023-05-07 04:04:13'),
(2, 'Science', 1, '2023-05-05 04:04:44', '2023-05-07 04:03:57'),
(3, 'Programming', 1, '2023-05-05 04:24:45', '2023-05-05 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue_details`
--

CREATE TABLE `tbl_issue_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `return_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0 - issued\r\n1 - return'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_issue_details`
--

INSERT INTO `tbl_issue_details` (`id`, `book_id`, `user_id`, `issue_date`, `return_date`, `status`) VALUES
(1, 2, 1, '2023-05-07 04:47:47', '2023-05-07 04:56:59', 0),
(2, 3, 1, '2023-05-07 05:09:22', NULL, 0),
(3, 2, 6, '2023-05-07 05:09:34', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0 - not active\r\n1 - active',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `student_id`, `full_name`, `email`, `phone`, `account_id`, `status`, `create_at`, `update_at`) VALUES
(1, 11111, 'abc', '0', '0123456', 2, 1, '2023-05-02 15:41:12', '2023-05-02 15:41:12'),
(3, 0, 'ooo', '0', '0123456789', 12, 1, '2023-05-03 09:15:55', '2023-05-03 09:15:55'),
(6, NULL, 'ooo', 'o@o.o', '12356123', 16, 1, '2023-05-05 01:48:36', '2023-05-05 01:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_ACCOUNT` (`account_id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BOOK_CATEGORY` (`category_id`),
  ADD KEY `FK_BOOK_AUTHOR` (`author_id`);

--
-- Indexes for table `tbl_book_author_detail`
--
ALTER TABLE `tbl_book_author_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DETAIL_AUTHOR` (`author_id`),
  ADD KEY `FK_DETAIL_BOOK` (`book_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_issue_details`
--
ALTER TABLE `tbl_issue_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ISSUE_STUDENT` (`user_id`),
  ADD KEY `FK_ISSUE_BOOK` (`book_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `FK_STUDENT_ACCOUNT` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_book_author_detail`
--
ALTER TABLE `tbl_book_author_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_issue_details`
--
ALTER TABLE `tbl_issue_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `FK_USER_ACCOUNT` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`);

--
-- Constraints for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD CONSTRAINT `FK_BOOK_AUTHOR` FOREIGN KEY (`author_id`) REFERENCES `tbl_author` (`id`),
  ADD CONSTRAINT `FK_BOOK_CATEGORY` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`);

--
-- Constraints for table `tbl_book_author_detail`
--
ALTER TABLE `tbl_book_author_detail`
  ADD CONSTRAINT `FK_DETAIL_AUTHOR` FOREIGN KEY (`author_id`) REFERENCES `tbl_author` (`id`),
  ADD CONSTRAINT `FK_DETAIL_BOOK` FOREIGN KEY (`book_id`) REFERENCES `tbl_book` (`id`);

--
-- Constraints for table `tbl_issue_details`
--
ALTER TABLE `tbl_issue_details`
  ADD CONSTRAINT `FK_ISSUE_BOOK` FOREIGN KEY (`book_id`) REFERENCES `tbl_book` (`id`),
  ADD CONSTRAINT `FK_ISSUE_STUDENT` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_STUDENT_ACCOUNT` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
