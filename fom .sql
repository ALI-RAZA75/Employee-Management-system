-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2024 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fom`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_type` int(25) NOT NULL,
  `profile_owner` varchar(255) NOT NULL,
  `project_manager` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `is_completed` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `client`, `project_type`, `profile_owner`, `project_manager`, `deadline`, `details`, `price`, `is_completed`) VALUES
(3, 'WordPress', 'Amar', 2, 'Abrar', 'Ali ', '2024-08-14', 'Make whole Landing Page', 2001, 1),
(6, 'Web [page', 'Amar', 4, 'Usman', 'TaLHA', '2024-08-16', 'Make whole Landing Page logo\'s', 20, 0),
(7, 'test 1', 'Amoor', 2, 'test 2', 'test 3', '2024-08-10', 'Make whole Landing Page logo\'s', 1111, 0),
(8, 'issuessss', 'maxtern', 4, 'morniii', 'morn', '2024-02-12', 'we are here moerni', 202, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `id` int(50) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `type`) VALUES
(1, 'timer'),
(2, 'fix'),
(4, 'per day');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_profile_owner` tinyint(10) NOT NULL DEFAULT 0,
  `user_roles_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(25) NOT NULL DEFAULT 'Internee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`, `img`, `is_profile_owner`, `user_roles_id`, `status`, `title`) VALUES
(44, 'talhaxwordpres@gmail.com', 'f2105a377338c0884800b751ccd97bf3', 'Talha Iqbal', '66b5132335c841.43858026.jpg', 1, 24, 1, 'Internee'),
(46, 'bilal@gmail.com', '6cb7ddbc89866b83c774c9266b0e451f', 'Bilal', '66b524f67ed351.21734316.png', 1, 25, 1, 'Internee'),
(47, 'dawoodx@gmail.com', '27a99497aaca31c3acebc24df8037866', 'Dawood', '66b5252869a782.47861025.jpg', 1, 26, 1, 'Internee'),
(48, 'umer786@gmail.com', '2a97046b8b55aceda7fcfa0c4bccf98c', 'Umer Iqbal', '66b525761c9cb6.40527229.jpg', 1, 26, 1, 'Internee'),
(49, 'alixhaider@gmail.com', 'f4bc3ade2564b100c4aa6fee3278d3c4', 'Ali Haider', '66b5388536b7f2.73775550.png', 1, 27, 1, 'Internee');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(50) NOT NULL,
  `role` varchar(255) NOT NULL,
  `access_level` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `access_level`) VALUES
(1, 'Admin', 'all'),
(24, 'Manager', 'all'),
(25, 'Invoice Manager', 'all'),
(26, 'Team Lead', 'view-projects,add-projects,view-invoices,add-invoices');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`project_type`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk` FOREIGN KEY (`project_type`) REFERENCES `project_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
