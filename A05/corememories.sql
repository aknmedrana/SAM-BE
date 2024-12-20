-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2024 at 01:06 PM
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
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandContents`
--

CREATE TABLE `islandContents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandContents`
--

INSERT INTO `islandContents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, 'assets/img/C1.png', 'This image showcases a collection of my latest designs and contributions across various organizations and projects, reflecting my creative visual representation and interpretation.', 'Purple'),
(2, 1, 'assets/img/C2.png', 'This picture reflects my passion for music, highlighting my love for playing the guitar and listening to songs on Spotify, which fuels my creativity. My musical journey began in elementary school when I was part of a mini band.', 'Purple'),
(3, 1, 'assets/img/C3.png', 'This image features a palette, symbolizing my ability to create traditional art, such as painting, in addition to my digital design skills.', 'Purple'),
(4, 2, 'assets/img/H1.png', 'I find joy in simple things, like watching funny cats.', 'Green'),
(5, 2, 'assets/img/H2.png', 'I’m my own biggest fan and can’t help but laugh at my own jokes.', 'Green'),
(6, 2, 'assets/img/H3.png', 'I spend my free time watching TikToks and Instagram Reels to enjoy a good laugh.', 'Green'),
(7, 3, 'assets/img/S1.png', 'I find peace by staring at the sea; it\'s a great place for solitude.', 'Blue'),
(8, 3, 'assets/img/S2.png', 'Playing my guitar lifts my mood when I\'m by myself.', 'Blue'),
(9, 3, 'assets/img/S3.png', 'Sometimes, being alone isn’t so bad. ', 'Blue'),
(10, 4, 'assets/img/ho1.png', 'I genuinely care for and love my family, finding strength and comfort in their presence.', 'Red'),
(11, 4, 'assets/img/ho2.png', 'I deeply value and care for my friends, appreciating the support and connections we share.', 'Red'),
(12, 4, 'assets/img/ho3.png', 'I adore my cat and enjoy the comfort and companionship he brings.', 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `islandsOfPersonality`
--

CREATE TABLE `islandsOfPersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsOfPersonality`
--

INSERT INTO `islandsOfPersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Creative Island', 'Combining Creativity, Artistic Vision, and Hobby', 'This is my space to create, where my imagination runs wild. Whether through art, music, or hobbies, it\'s where my ideas come alive and I find joy in expression.', 'Purple', 'assets/img/creative.png', 'Active'),
(2, 'Sense of Humor Island', 'Humor Island is my personal slice of comedy paradise, where I get to share all the funniest memes, viral TikToks, reels, and moments with family and friends. It\'s my go-to place for laughs, big and small!', 'Everything that makes me laugh—from the latest memes and viral TikToks to funny reels and family moments. Whether it\'s a quick scroll or an inside joke, this is my spot for daily laughs.\r\n', 'Green', 'assets/img/humor.png', 'Active'),
(3, 'Solitude Island', 'My peaceful escape where I recharge after socializing, embrace independence, and enjoy my own company.', 'Solitude Island is my personal retreat, where I find peace after the hustle of socializing. It’s my space to be independent, reflect, and recharge in the quiet of my own thoughts. After spending time with others, this is where I come to embrace solitude, find calm, and reconnect with myself. It\'s my perfect balance of being with people and then taking time to just be.', 'Blue', 'assets/img/solitude.png', 'Active'),
(4, 'Home Island', 'Family, Friends & Pet Connection', 'Family, Friends and pets fill my heart. This island is where love and loyalty thrive, reminding me of the importance of connection and comfort from those I hold dear.\r\n', 'Red', 'assets/img/home.png', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandContents`
--
ALTER TABLE `islandContents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsOfPersonality`
--
ALTER TABLE `islandsOfPersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandContents`
--
ALTER TABLE `islandContents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `islandsOfPersonality`
--
ALTER TABLE `islandsOfPersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
