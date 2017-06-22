-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 10:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunnies`
--

-- --------------------------------------------------------

--
-- Table structure for table `bunnydetails`
--

CREATE TABLE `bunnydetails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bunnydetails`
--

INSERT INTO `bunnydetails` (`id`, `name`, `weight`, `description`, `img`, `category`) VALUES
(24, 'American', '9 - 12 pounds', 'Slate blue or white. This rabbit has well-rounded hindquarters, narrow shoulders, and long erect ears.', 'American.jpg', 'America'),
(25, 'American Fuzzy Lop', '3 to 4 pounds', 'These small rabbits have a large, flatted \"bulldog\" face and lopped ears, and look somewhat like a Holland Lop with long fur. They have been bred in many different colors.', 'american_fuzzy_lop.jpg', 'America'),
(26, 'American Sable', '7 - 10 pounds', 'Nose, ears, feet, and tail are a very dark brown, body a sepia color. Body is medium long and full, head narrow, and ears long and erected.', 'american_sable.jpg', 'America'),
(27, 'English Angora', '5 to 7 pounds', 'Thick wool covers the entire rabbit, including the face and the stand-up ears, giving in the appearance of a large fuzz-ball. They have been in many colors.', 'english_angora.jpg', 'Britain'),
(28, 'French Angora', '7 1/2 to 10 1/2 pounds', 'Medium long rounded body, ears long and erect. Face, ears, and front feet have short fur; rest of body has very long wool. Many different colors have been bred.', 'french_angora.jpg', 'Europe'),
(29, 'Belgian Hare', '6 - 9 1/2 pounds', 'This rabbit has a lean racy body that looks more like a hare\'s than a rabbit\'s. Large upright ears.', 'belgian_hare.jpg', 'Europe'),
(30, 'Beveren', '8 - 12 pounds', 'Pear-shaped body, long erect ears, dense coat of black, blue, or white.', 'Beveren.jpg', 'Europe'),
(31, 'Britannia Petite', '2 - 2 1/2 pounds', 'These tiny, compact rabbits have relatively narrow heads and a trim, arched body line. Ears are medium long and erect. Colors include white, black, otter, chesnut, agouti (like a wild rabbit), and sable marten.', 'britannia_petite.jpg', 'Britain'),
(32, 'Harlequin', '7 to 9 1/2 pounds', 'This striking rabbit originated in France. The body and head are banded with two colors. It has a medium-length body with rounded hindquarters, a rounded head, and long, upright ears.', 'Harlequin.jpg', 'Europe'),
(33, 'Havana', '4 1/2 - 6 1/2 pounds', 'Black, blue or chocolate colored. Body is short with wide shoulders and hind-quarters. Head is narrow, ears medium-long and upright.', 'havana.jpg', 'America'),
(34, 'Himalayan', '2 1/2 - 4 1/2 pounds', 'White rabbits with ears, nose, feet, and tail colored black, blue, lilac, or chocolate. Body is long and narrow with narrow head and rather short erect ears.', 'himalayan.jpg', 'Asia'),
(35, 'Dwarf Hotot', '2 - 3 pounds', 'These little rabbits have a very striking appearance, all white except for a ring of black around the eyes. They have compact, rounded bodies and short, upright ears.', 'dwarf_hotot.jpg', 'Europe'),
(36, 'Hotot', '8 - 11 pounds', 'Like the Dwarf Hotot this rabbit is white with black ringing the eye. Body is rounded and thick, head is narrow, ears are medium-long and upright.', 'Hotot.jpg', 'Europe'),
(37, 'Jersey Wooly', '2 3/4 to 3 1/2 pounds', 'Body is rounded and compact. The Fur on the face and upright ears is short the rest of the body has long dense fur. They have been bred in many colors.', 'jersey_wooly.jpg', 'Britain'),
(38, 'Lionhead', '3 - 3 3/4 pounds', 'This breed originated in Belgium but has been developed in England. Body is well-rounded. Fur on body is dense and of medium length, two to three inches long forming a mane.', 'lionhead.jpg', 'Britain'),
(39, 'Lilac', '5 3/4 to right pounds', 'This rabbit is dove-gray with a pinkish tint. It has a medium-sized body with a somewhat narrow head and medium-long erect ears.', 'Lilac.jpg', 'Britain'),
(40, 'English Lop', '9 to 12 pounds', 'Hinderquarters are rounded, shoulder and head narrow. The ears are lopped and extremely large, often measuring 24 inches from tip to tip.', 'english_lop.jpg', 'Britain'),
(41, 'French Lop', '10 - 14 pounds', 'The largest of the lop breeds. This rabbit has massive, well muscled body with a wide head and thick, wide, lopped ears. The French Lop has been bred in many different colors.', 'french_lop.jpg', 'Europe'),
(42, 'Holland Lop', '2 3/4 to four pounds', 'Head is slightly flattened, body is short and looks massive. They have lopped ears and a prominent \"crowns\" (the ridge of cartilage between the ears). These popular rabits come in many colors and have soft, fine fur.', 'holland_lop.jpg', 'Europe'),
(43, 'Velveteen Lop', '5 - 6 1/2 pounds', 'Body is mandolin, shaped, chest is full and rounded. The ears are lopped and measure from 14 inches tip to tip. Fur is like that of rex rabbits. It is being bred in several colors.', 'velveteen_lop.jpg', 'America'),
(44, 'Mini Plush Lop', '2 1/2 to 3 1/2 pounds', 'This breed was created in the late 1990s by Devie D\'Anniballe by mixing the Mini rex, Mini Lop, and Holland Lop. The fur is like that of a rex, the appearance between that of a small Mini Lop and Holland Lop.', 'mini_plush_lop.jpg', 'America'),
(45, 'American Chinchilla', '9 - 12 pounds', 'Medium length body with well rounded hindquarters. Base of each hair is slate blue. intermediate band is pearl, top band is black. Ears are long and upright.', 'american_chinchilla.jpg', 'America'),
(46, 'Standard Chinchilla', '5 - 7 pounds', ' Compact chubby-looking body of medium length. Ears long and upright. Each hair of fur has three bands of different colors; blue at the base, pearl in the middle, and black at the top.', 'standard_chinchilla.jpg', 'Europe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(13, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunnydetails`
--
ALTER TABLE `bunnydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bunnydetails`
--
ALTER TABLE `bunnydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
