-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 01:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`) VALUES
(1, '/company/68d9dc819baea_campany-4.png'),
(2, '/company/68d9dc9bc4b28_campany-1.png'),
(3, '/company/68d9dcac1e115_campany-5.png'),
(4, '/company/68d9dcbb6c744_campany-6.png'),
(7, '/company/68dda6903cac3_campany-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`) VALUES
(2, 'Chinazor Maryjane', '08037991011', 'okwuazichinazor@gmail.com', 'test'),
(3, 'Alex Vincent', '08056890432', 'lexiscode@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam alias optio minima, tempore architecto sint ipsam dolore tempora facere laboriosam corrupti!'),
(4, 'Adanne Glady', '08099775533', 'adanne@gmail.com', 'These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.'),
(5, 'maryjane', '08037991011', 'okwuazichinazor@gmail.com', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero illum architecto modi.');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`) VALUES
(1, 'what is my name?', 'my name is chinazor okwuazi'),
(2, 'what is your nationality?', 'canadian'),
(4, 'how old are you?', 'i am 10years old.'),
(5, 'what is your favourite food?', 'pepper chicken and fried plantain');

-- --------------------------------------------------------

--
-- Table structure for table `intros`
--

CREATE TABLE `intros` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intros`
--

INSERT INTO `intros` (`id`, `title`, `description`) VALUES
(1, 'Hey!, I\'m Maryjane', 'I am a backend developer');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `image`) VALUES
(3, 'project 1', 'backend', '/portfolio/68cf0f406b6d5_portfolio-6.jpg'),
(4, 'project 2', 'frontend', '/portfolio/68cf0cb838c58_portfolio-8.jpg'),
(5, 'project 3', 'fullstack dev', '/portfolio/68cf0cffd1439_portfolio-7.jpg'),
(6, 'Project 4', 'software engnr', '/portfolio/68dda57f47153_portfolio-4.jpg'),
(7, 'Project 5', 'frontend dev', '/portfolio/68dda5ceb6b3b_portfolio-5.jpg'),
(9, 'project 6', 'backend dev', '/portfolio/68e2fd15048ea_portfolio-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`) VALUES
(1, 'Marketing', 'Helping businesses reach the right audience, build brand awareness, and drive engagement through creative strategies and effective communication.'),
(2, 'Web Development', 'Designing and building responsive, user-friendly websites and applications that provide seamless digital experiences across devices.'),
(3, 'Cloud Hosting', 'Providing reliable, scalable, and secure cloud solutions to ensure your applications and data are always accessible and performant.');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `github`, `linkedin`, `instagram`) VALUES
(1, 'https://www.facebook.com/share/19jk6YAgB5/?mibextid=wwXIfr', 'https://x.com/chisomsoremekun?s=21', 'https://github.com/Maryjane-16', 'https://www.linkedin.com/in/maryjane-okwuazi-141419126?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app', 'https://www.instagram.com/chinazormjay?igsh=MWU4eXY2cmh1bGRndQ%3D%3D&utm_source=qr');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `review`, `photo`) VALUES
(12, 'Chinazor Maryjane', 'Frontend Developer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat aut consequatur illo animi optio exercitationem doloribus eligendi iusto atque repudiandae. Distinctio.', '/testimonial/68a4f5bc6ca2a_client-3.jpg'),
(13, 'Alex Vincent', 'Finance Manager', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat aut consequatur illo animi optio exercitationem doloribus eligendi iusto atque repudiandae. Distinctio.', '/testimonial/68ae179119e22_client-4.jpg'),
(14, 'Adanne Glady', 'Global brand manager', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat aut consequatur illo animi optio exercitationem doloribus eligendi iusto atque repudiandae. Distinctio.', '/testimonial/68ae17aec8ae0_client-2.jpg'),
(16, 'Chinazor Mary', 'PHP Developer', 'It\'s mine', '/testimonial/68dee9d34ef74_client-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'chinazormjay', 'okwuazichinazor@gmail.com', '$2y$10$AYxA5qOqpycX8wNjlbluj.qBWZnGe4nrjLcHdQsdtqkAxt6tXfS..'),
(2, 'chinazormjay', 'okwuazichinazor@gmail.com', '$2y$10$wxi8dJAMZBvIZ35rYsP2Dew2vZOdwG2SErreiv8a66ooArFwoXYtW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `intros`
--
ALTER TABLE `intros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
