-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2025 at 04:23 AM
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
-- Database: `olympicmoments`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Meme'),
(2, 'Iconic ');

-- --------------------------------------------------------

--
-- Table structure for table `moments`
--

CREATE TABLE `moments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` enum('Meme','Iconic') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moments`
--

INSERT INTO `moments` (`id`, `title`, `description`, `image_url`, `category`) VALUES
(1, 'Snoop Dog\'s Reaction', 'Snoop Dogg\'s raised sunglasses have turned into a viral reaction image', '/assets/img/snoopDog.png', 'Meme'),
(2, 'Main Character Energy', 'South Korean sport shooter Kim Yeji going viral for her cool composure and “main character energy,” with commentators comparing her to a cyberpunk action hero.', '/assets/img/koreanShooter.png', 'Iconic'),
(3, 'Turkish Sport Shooter Yusuf Dikeç', 'He went incredibly viral by displaying another kind of cool—understated, underequipped and seemingly effortless.', '/assets/img/turkishShooter.png', 'Iconic'),
(4, 'The Muffin Man', 'Henrik Christiansen posts a variety of meme templates and comedy sketches, all revolving around those magical chocolate chip muffins, and raking in millions of views per video.\r\n\r\nChristiansen’s muffin fandom even attracted the attention of celebrity Chef Gordon Ramsay, who commented, “I think I need to try one now…”', '/assets/img/themuffinman.png', 'Meme'),
(5, 'The Olympic Shooters', 'The Olympic shooters and their slick outfits quickly caught the attention of the internet. \r\nGrouped together, the motley crew of shooters resembled a scrappy team of sci-fi heroes.', '/assets/img/shooters.png', 'Meme'),
(6, 'The Well-Endowed Pole Vaulter', 'French pole vaulter Anthony Ammirati became a viral star after footage of him failing to clear the pole showed his bulge hitting the crossbar, seemingly pulling it off the rack.', '/assets/img/poleMan.png', 'Meme'),
(7, 'Pommel Horse Guy', 'American gymnast Stephen Nedoroscik gave an impressive performance on the pommel horse, but the internet fell in love with the man’s vibes, posting memes about Nedoroscik sleeping while waiting his turn.\r\n\r\nNedoroscik’s glasses prompted comparisons to Clark Kent and Steve Smith from American Dad.', '/assets/img/horseguy.png', 'Iconic'),
(8, 'Snoop Dog Attends Everything', 'Through sheer enthusiasm, Snoop Dogg has become the unofficial face of the Olympics, with the rapper appearing at multiple events and showing his support, sparking many memes along the way.', '/assets/img/snoopportive.png\r\n', 'Iconic'),
(9, 'Celine Dion ', 'To close the opening ceremony, it was the diva Céline Dion who appeared on the Eiffel Tower, singing Hymne à l\'Amour. A sublime cover for the Canadian, who sang publicly for the first time in four years.', '/assets/img/celine.png', 'Iconic'),
(10, 'One of the Great Ladies of Paris 2024', 'American gymnast Simone Biles. Three years after missing out on the Tokyo 2020 Olympic Games, she is back on the floor of the Arena Bercy like a queen. Now that she\'s back to enjoying her sport, she\'s glowing once again!', '/assets/img/simone.png\r\n', 'Iconic'),
(11, 'Paris Olympics 2024', 'Paris 2024 Games has been filled with joy, a sense of community and shared excitement. The opening ceremony lived up to all its promises. For four hours, Thomas Jolly (artistic director of the ceremonies) and his teams impressed the world, as shown by this spectacular image of the Eiffel Tower.', '/assets/img/paris.png', 'Iconic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moments`
--
ALTER TABLE `moments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `moments`
--
ALTER TABLE `moments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
