-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2021 at 07:13 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paperback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(4, 'noob_admin', 'admin123'),
(5, 'Raihan_admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `type`, `category`, `title`, `description`, `blog_image`) VALUES
(62, 'noob_admin', 'reviews', 'phones', 'Redmi Note 7 REVIEW', 'redmi note 7 review and its good and everything.\r\nquad hd resolution, 144 hz refresh rate, curved monitor,hdr display,  dci-p3 r oshadharon design. ei feature gulo ekta gaming monitor e pawa onek gamer er kachei its like a dream comes true. erokom ekti monitor niyei amader ajker ei video. kotha bolchi Asus XG32Vqr  gaming monitor niye. Tobe ei gorgeous monitor ti kinte hole apnake gunte hobe onekgulo taka. monitor tir retail price nirdharon kora hoyeche 75000 taka. eti apnara available paben  global brand limited e. monitor ti worth it kina ebong er jabotio bishoyadi niye apnader shthe achi Ami Shifat Habib. lets Get Started. \r\n', 'thumbnailfi1.jpg'),
(63, 'noob_admin', 'reviews', 'pc', 'Best Budget Monitors', 'front e royeche 32 inch curved display with minimal bezel. lower bezel e ache asus rog logo.  Monitor  er nicher  dike ache  copper pattern er asthetic   design kora  stylish stand. r monitor er picher side er  futuristic design pattern jeta ei monitor er shthe manan shoi.  piche monitor stand e royeche rog logo . Aro  ase ekta led ring.jeta aura sync compatible . overall er design besh premium r sheta Rog lineup er standard dhore rakhe. Stand er niche royeche red color er rog r logo r projection. Box e aro duto design pattern deya hoi .ekta extra deya hoi custom design er jonno.Erokom all in out gaming look onek gamer er e pochondo. Tobe jara ektu minimal design er monitor pochondo koren tader eta ektu over the top lagtei pare. \r\n\r\n\r\n', 'cover1.jpg'),
(64, 'Raihan', 'reviews', 'pc', 'Benq Monitor Review', '10-12k bdt is a very competitive price range for monitors. This video is a thorough review of BenQ GW2283 and how it performs. For people looking for a monitor priced around 10k, this video is a must.', 'BENQ GW2283 Monitor Bangla Review  THE NEW BUDGET KING!  HS.png'),
(66, 'Shadin', 'reviews', 'pc', 'Gamdias Mechanical Keyboard Review', 'This keyboard is really good???', 'gamdiashernesp1a.png'),
(67, 'Jugal', 'rumors', 'gadgets', 'Does Apple Earphones really cost 500 buckS????', 'This will be ridiculous if it comes true. say your opinion. Yeah it really is. See it your self. Watch the MKBHD video now1111111. ', 'angry_video_gamers_668_442_s_c1.jpg'),
(69, 'Raihan_admin', 'news', 'others', 'No Scamming Please', 'Scammers gonna be banned from the site. Careful.', ''),
(71, 'Jugal', 'reviews', 'gadgets', 'Kumara K552 Mechanical Keyboard', 'Keyboard.  The Redragon K552 Mechanical Gaming Keyboard 60% Compact 87 Key Kumara Wired Cherry MX Blue Switches Equivalent is the best budget keyboard for gaming in my opinion.  Redragon makes amazing budget hardware without sacrificing build quality, and this is even more apparent with the Redragon K552 Kumara 60% mechanical keyboard.  This Redragon K552 is the absolute BEST budget 60% mechanical gaming keyboard with some of the best RGB lighting in its class.  If you have any questions about my Unboxing and Review - Redragon K552 60% Mechanical Gaming Keyboard, drop them below.  And if you enjoyed my video, Unboxing and Review - Redragon K552 60% Mechanical Gaming Keyboard, slap a like on this video!', 'mech.jpg'),
(72, 'Mithi', 'reviews', 'pc', 'Macbook Pro 2020', 'the new macbook with apple chip .. maaan mind blowing..', 'macbook.jpg'),
(74, 'TheRaihan', 'reviews', 'gadgets', 'headphone', 'nice', 'headphn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blog_id` int(255) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `blog_id`, `comment`) VALUES
(28, 'Raihan_admin', 62, '11111111'),
(29, 'Raihan_admin', 62, '12122121212122'),
(30, 'Raihan_admin', 62, 'dfsdfgsdrgfsdfgsfg'),
(31, 'noob_admin', 63, 'fgsfgsgsfgsfgd'),
(32, 'noob_admin', 63, 'rgsdfgsfgsfgsgsgfsfg'),
(33, 'Raihan_admin', 63, 'dsfgsfgsfgsgf'),
(34, 'Raihan_admin', 63, 'fdhgdfhedfghdg'),
(35, 'noob_admin', 62, 'vcbxvbxbgxvbx'),
(36, 'Raihan', 63, 'dfadfadfafda'),
(37, 'Raihan', 62, '123123123123'),
(38, 'Raihan', 62, 'fdsgsfgsfgs'),
(39, 'Raihan', 63, 'sfgsdgsdfgsg'),
(40, 'Raihan', 63, 'srfgsfgsdfgs'),
(41, 'Raihan', 64, '1'),
(42, 'Raihan', 64, '2'),
(43, 'Raihan', 64, '3'),
(44, 'Raihan', 64, 'dfasdfsa'),
(45, 'Raihan', 64, '5'),
(46, 'Raihan', 64, '6'),
(47, 'Raihan', 64, '7'),
(48, 'Raihan', 64, '8'),
(50, 'Shadin', 66, 'sadsadasda'),
(51, 'Shadin', 66, 'asdasdasd'),
(52, 'Jugal', 67, 'yeah it really is....'),
(53, 'Raihan', 67, 'sadly it is :/ '),
(54, 'Shifat', 62, '123123 good revciew\r\n'),
(55, 'Raihan_admin', 62, 'asdewq'),
(56, 'Raihan_admin', 62, 'This is a new comment'),
(57, 'Shadin', 69, 'shohomot vai\r\n'),
(58, 'Shadin', 69, 'pashe achi pashe thakbo \r\n'),
(59, 'Jugal', 69, 'chatra league detected'),
(60, 'Mithi', 71, 'joss vai'),
(61, 'Mithi', 71, 'shei hoise'),
(62, 'Jugal', 72, 'amar vallage nai'),
(63, 'TheRaihan', 71, 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blog_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `name`, `blog_id`) VALUES
(32, 'Raihan_admin', 63),
(33, 'noob_admin', 62),
(34, 'Raihan', 62),
(35, 'Raihan', 64),
(36, 'Jugal', 72);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blog_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `name`, `blog_id`) VALUES
(23, 'Raihan_admin', 62),
(24, 'Raihan_admin', 63),
(25, 'noob_admin', 62),
(26, 'Raihan', 63),
(27, 'Shifat', 64),
(30, 'Jugal', 67),
(31, 'Raihan_admin', 67),
(32, 'Shadin', 69),
(33, 'Mithi', 71);

-- --------------------------------------------------------

--
-- Table structure for table `sort`
--

CREATE TABLE `sort` (
  `id` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `dislikes` int(255) NOT NULL,
  `comments` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sort`
--

INSERT INTO `sort` (`id`, `likes`, `dislikes`, `comments`) VALUES
(62, 2, 2, 7),
(63, 3, 1, 7),
(64, 1, 1, 8),
(66, 0, 0, 2),
(67, 2, 0, 2),
(69, 1, 0, 3),
(71, 1, 0, 0),
(72, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`) VALUES
(62, 'TheRaihan', 'rayhan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'TheRaihan.jpg'),
(63, 'Shadin', 'votka@gmaim.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png'),
(64, 'Jugal', 'jugu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png'),
(66, 'Mithi', 'mithi@asd.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sort`
--
ALTER TABLE `sort`
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sort`
--
ALTER TABLE `sort`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
