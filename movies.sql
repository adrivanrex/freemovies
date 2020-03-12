-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 06:16 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `loginCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`id`, `username`, `loginCount`) VALUES
(2, 'rex', 25),
(3, 'Nico', 1),
(4, 'free', 1),
(5, 'paul', 10),
(6, 'Mac', 1),
(7, 'kimpossible', 10),
(8, 'jech', 3),
(9, 'nimrod', 61),
(10, 'pating', 6),
(11, 'skymangotara', 0),
(12, 'ramuel', 1),
(13, '', 3),
(14, 'Xeniashanley', 36),
(15, 'Chloer27', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `filename` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logo` text NOT NULL,
  `user` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `filename`, `title`, `description`, `creation_date`, `logo`, `user`, `category`) VALUES
(11, '1234aquiteplace.mp4', 'A Quite Place', 'The Abbott family must now face the terrors of the outside world as they fight for survival in silence. Forced to venture into the unknown, they realize that the creatures that hunt by sound are not the only threats that lurk', '2020-03-09 05:29:41', 'https://upload.wikimedia.org/wikipedia/en/a/a0/A_Quiet_Place_film_poster.png', 'rex', 'A Quite Place'),
(13, '1234avengersendgame.mp4', 'Avengers End Game', 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.\r\n', '2020-03-09 05:41:16', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg', 'rex', 'Avengers End Game'),
(14, '1234gunsakimbo.mp4', 'Guns Akimbo', 'Miles is a video game developer who inadvertently becomes the next participant in a real-life death match that streams online. While Miles soon excels at running away from everything, that won\'t help him outlast Nix, a killer', '2020-03-09 07:15:36', 'https://www.gstatic.com/tv/thumb/v22vodart/17395438/p17395438_v_v8_aa.jpg', 'rex', 'Guns Akimbo'),
(15, '1234ipman.mkv', 'Ip Man 4', 'Ip Man and his son encounter racial discrimination after traveling to the United States to seek a better life.', '2020-03-09 10:37:57', 'https://www.gstatic.com/tv/thumb/v22vodart/17585581/p17585581_v_v8_aa.jpg', 'rex', 'Ip Man'),
(16, 'Harry.Potter.and.the.Half.Blood.Prince.2009.1080p.BrRip.x264.YIFY.mp4', 'Harry Potter and the Half Blood Prince', 'Dumbledore and Harry Potter learn more about Voldemort\'s past and his rise to power. Meanwhile, Harry stumbles upon an old potions textbook belonging to a person calling himself the Half-Blood Prince.\r\n', '2020-03-09 23:24:18', 'https://upload.wikimedia.org/wikipedia/en/3/3f/Harry_Potter_and_the_Half-Blood_Prince_poster.jpg', 'rex', 'Harry Potter'),
(17, 'sonicthehedgehog.mkv', 'Sonic the Hedgehog', 'Sonic tries to navigate the complexities of life on Earth with his newfound best friend -- a human named Tom Wachowski. They must soon join forces to prevent the evil Dr. Robotnik from capturing Sonic and using his powers for', '2020-03-10 00:20:58', 'https://www.movienewsletters.net/photos/242898R1.jpg', 'rex', 'sonic the hedgehog'),
(18, '1234spenserconfidential.mkv', 'Spenser Confidential', 'To unravel a twisted murder conspiracy, a former police detective returns to Boston\'s criminal underworld.\r\n', '2020-03-10 00:24:16', 'https://www.gstatic.com/tv/thumb/v22vodart/17965458/p17965458_v_v8_aa.jpg', 'rex', 'spenser confidential'),
(19, '1234littlewomen.mp4', 'Little Women', 'In the years after the Civil War, Jo March lives in New York and makes her living as a writer, while her sister Amy studies painting in Paris. Amy has a chance encounter with Theodore, a childhood crush who proposed to Jo but', '2020-03-10 01:46:38', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS11_0-LUr9stA36SHACO5wfd4l2jD_W_1lywxz5oHksb7EvnvT', 'rex', 'little women');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mobileNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `date`, `firstName`, `middleName`, `lastName`, `reg_date`, `mobileNumber`) VALUES
(1, 'rex', 'adrivan', '', '2020-03-04 01:43:52', '', '', '', '0000-00-00 00:00:00', 0),
(2, 'mario', 'igdon', '', '2020-03-04 06:07:09', '', '', '', '0000-00-00 00:00:00', 0),
(3, 'darwin', 'paterno', '', '2020-03-04 06:42:30', '', '', '', '0000-00-00 00:00:00', 0),
(4, 'merah', 'serad', '', '2020-03-04 06:46:37', '', '', '', '0000-00-00 00:00:00', 0),
(5, 'free', 'movie', '', '2020-03-04 06:59:44', '', '', '', '0000-00-00 00:00:00', 0),
(6, 'nico', 'ong', '', '2020-03-04 07:39:55', '', '', '', '0000-00-00 00:00:00', 0),
(7, 'nersa', 'bongo', '', '2020-03-04 08:16:57', '', '', '', '0000-00-00 00:00:00', 0),
(8, 'allyza', 'obach', '', '2020-03-04 08:27:21', '', '', '', '0000-00-00 00:00:00', 0),
(9, 'alyza', 'maturan', '', '2020-03-04 09:04:25', '', '', '', '0000-00-00 00:00:00', 0),
(10, 'paul', 'cartin', '', '2020-03-05 06:05:08', '', '', '', '0000-00-00 00:00:00', 0),
(11, 'mac', 'ladera', '', '2020-03-05 06:29:03', '', '', '', '0000-00-00 00:00:00', 0),
(12, 'juderaquel', 'raquel', '', '2020-03-05 12:33:52', '', '', '', '0000-00-00 00:00:00', 0),
(13, 'kimpossible', 'kimpossible', '', '2020-03-05 13:02:05', '', '', '', '0000-00-00 00:00:00', 0),
(14, 'jech', 'underground', '', '2020-03-05 15:58:41', '', '', '', '0000-00-00 00:00:00', 0),
(15, 'roy', 'adrivan', '', '2020-03-05 17:46:35', '', '', '', '0000-00-00 00:00:00', 0),
(16, 'vantok', 'borromeo', '', '2020-03-05 18:59:07', '', '', '', '0000-00-00 00:00:00', 0),
(17, 'anelle', 'charity', '', '2020-03-06 04:04:56', '', '', '', '0000-00-00 00:00:00', 0),
(18, 'allocid', 'allocid', '', '2020-03-06 05:26:48', '', '', '', '0000-00-00 00:00:00', 0),
(19, 'nimrod', 'nimrod', '', '2020-03-06 05:55:35', '', '', '', '0000-00-00 00:00:00', 0),
(20, 'allocid', 'allocid', '', '2020-03-06 06:21:27', '', '', '', '0000-00-00 00:00:00', 0),
(21, 'pating', 'pating', '', '2020-03-06 06:23:48', '', '', '', '0000-00-00 00:00:00', 0),
(22, 'skymangotara', 'skymangotara', '', '2020-03-06 08:03:53', '', '', '', '0000-00-00 00:00:00', 0),
(23, 'ramuel', 'deluna', '', '2020-03-07 01:00:40', '', '', '', '0000-00-00 00:00:00', 0),
(31, '', '', '', '2020-03-09 08:49:56', '', '', '', '2020-03-09 01:49:56', 0),
(34, 'abc', '', '', '2020-03-09 10:27:53', '', '', '', '2020-03-09 03:27:53', 0),
(37, 'Xeniashanley', 'sniper150', '', '2020-03-09 23:36:30', 'Vladimir', 'Rivera', 'Aclopen', '2020-03-09 16:36:30', 2147483647),
(39, 'babang', 'zxcvbnmlove', '', '2020-03-10 03:51:58', 'franz bab', 'parba', 'jabajab', '2020-03-09 20:51:58', 2147483647),
(40, 'babang', '', '', '2020-03-10 03:51:58', '', '', '', '2020-03-09 20:51:58', 0),
(41, 'babang222', 'ZXCVBNMlove', '', '2020-03-10 03:52:43', 'franz bab', 'parba', 'jabajab', '2020-03-09 20:52:43', 2147483647),
(42, 'babang222', '', '', '2020-03-10 03:52:43', '', '', '', '2020-03-09 20:52:43', 0),
(43, 'test', 'test', '', '2020-03-10 05:47:56', 'test', 'test', 'test', '2020-03-09 22:47:56', 0),
(44, 'test', '', '', '2020-03-10 05:47:56', '', '', '', '2020-03-09 22:47:56', 0),
(45, 'Chloer27', 'IloveChloe143', '', '2020-03-10 11:43:04', 'Casey', 'Diaz', 'Abayan', '2020-03-10 04:43:04', 2147483647),
(46, 'Chloer27', '', '', '2020-03-10 11:43:05', '', '', '', '2020-03-10 04:43:05', 0),
(47, 'zain.naj', '123456', '', '2020-03-11 02:09:54', 'Zain ', 'Naji', 'Handal', '2020-03-10 19:09:54', 2147483647),
(48, 'zain.naj', '', '', '2020-03-11 02:09:54', '', '', '', '2020-03-10 19:09:54', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
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
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
