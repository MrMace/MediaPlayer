-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 06:12 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaplayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `art` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `art`) VALUES
(1, 'Lady Gaga The Remix', 6, 5, 'assets/images/albumArtwork/ladyGagaTheRemix.jpg'),
(2, 'Burnin\' Both Ends', 2, 1, 'assets/images/albumArtwork/burninbothends.jpg'),
(3, 'Fighter', 1, 1, 'assets/images/albumArtwork/fighter.jpg'),
(4, 'Losing Yourself', 3, 3, 'assets/images/albumArtwork/losingyourself.jpg'),
(5, 'Everything That Rises Must Converge', 7, 5, 'assets/images/albumArtwork/everythingThatRisesMustConverge.jpg'),
(6, 'The Lowly Heirs EP', 5, 4, 'assets/images/albumArtwork/theLowlyHeirs.jpg'),
(7, 'The Deep Dark Woods', 4, 3, 'assets/images/albumArtwork/theDeepDarkWoods.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Manafest'),
(2, 'Douglas Balmain'),
(3, 'Pop Etc'),
(4, 'Yarrow'),
(5, 'The Lowly Heirs'),
(6, 'James DJMilk Gonzales'),
(7, 'Dane Joneshill');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Hip Hop'),
(3, 'Alternative'),
(4, 'Gospel'),
(5, 'Pop'),
(6, 'Country'),
(7, 'Jazz'),
(8, 'Folk'),
(9, 'Blues'),
(10, 'Reggae'),
(11, 'Classical'),
(12, 'Dubstep'),
(13, 'Disco'),
(14, 'Techno'),
(15, 'Funk'),
(16, 'Instrumental'),
(17, 'Soul'),
(18, 'World');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Bad Habits', 2, 2, 1, '2:39', 'assets/music/Burning_Both_Ends/bad-habits.mp3', 6, 0),
(2, 'Burnin Both Ends', 2, 2, 1, '2:17', 'assets/music/Burning_Both_Ends/burnin-both-ends.mp3', 1, 0),
(3, 'Home', 2, 2, 1, '3:51', 'assets/music/Burning_Both_Ends/home.mp3', 5, 0),
(4, 'I\'ve Seen Days', 2, 2, 1, '4:01', 'assets/music/Burning_Both_Ends/ive-seen-days.mp3', 2, 0),
(5, 'Meet Me', 2, 2, 1, '2:46', 'assets/music/Burning_Both_Ends/meet-me.mp3', 4, 0),
(6, 'The Hole You Dug', 2, 2, 1, '2:45', 'assets/music/Burning_Both_Ends/the-hole-you-dug.mp3', 3, 0),
(7, 'Abigail Dear', 7, 5, 5, '4:40', 'assets/music/Everything_that_rises_must_Converge/abigail-dear.mp3', 2, 0),
(8, 'Billy', 7, 5, 5, '5:02', 'assets/music/Everything_that_rises_must_Converge/billy.mp3', 6, 0),
(9, 'Everything That Rises Must Converge', 7, 5, 5, '5:32', 'assets/music/Everything_that_rises_must_Converge/everything-that-rises-must-converge.mp3', 1, 0),
(10, 'First Communion', 7, 5, 5, '4:07', 'assets/music/Everything_that_rises_must_Converge/first-communion.mp3', 5, 0),
(11, 'Fragments', 7, 5, 5, '5:21', 'assets/music/Everything_that_rises_must_Converge/fragments.mp3', 7, 0),
(12, 'If I Could', 7, 5, 5, '4:05', 'assets/music/Everything_that_rises_must_Converge/if-i-could.mp3', 4, 0),
(13, 'Live A Little', 7, 5, 5, '3:57', 'assets/music/Everything_that_rises_must_Converge/live-a-little.mp3', 3, 0),
(14, 'Long Way Around', 7, 5, 5, '5:31', 'assets/music/Everything_that_rises_must_Converge/long-way-around.mp3', 10, 0),
(15, 'We Lie Together', 7, 5, 5, '5:54', 'assets/music/Everything_that_rises_must_Converge/we-lie-together.mp3', 8, 0),
(16, 'Who I Am', 7, 5, 5, '6:08', 'assets/music/Everything_that_rises_must_Converge/who-i-am.mp3', 9, 0),
(17, 'Fighter', 1, 3, 1, '2:55', 'assets/music/fighter/01_fighter.mp3', 1, 0),
(18, 'Pushover', 1, 3, 1, '3:13', 'assets/music/fighter/03_pushover.mp3', 2, 0),
(19, 'Human', 1, 3, 1, '3:34', 'assets/music/fighter/04_human.mp3', 3, 0),
(20, 'Born This Way Mix', 6, 1, 5, '4:21', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/01_born_this_way_mix_with_in_the_aye.mp3', 1, 0),
(21, 'Just Dance Mix', 6, 1, 5, '4:42', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/02_just_dance_mix_with_fergalicious.mp3', 2, 0),
(22, 'Dance In The Dark Mix', 6, 1, 5, '3:46', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/03_dance_in_the_dark_mix_with_like_a.mp3', 3, 0),
(23, 'The Edge Of Glory', 6, 1, 5, '3:54', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/04_the_edge_of_glory_mix_with_my_hum.mp3', 4, 0),
(24, 'Telephone Mix', 6, 1, 5, '4:27', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/06_telephone_mix_with_sexy__i_know.mp3', 5, 0),
(25, 'Poker Face Mix', 6, 1, 5, '3:52', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/07_poker_face_mix_with_follow_me.mp3', 6, 0),
(26, 'Bad Romance', 6, 1, 5, '6:52', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/08_bad_romance_mix_with_fired_up.mp3', 7, 0),
(27, 'Paparazzi Mix', 6, 1, 5, '3:00', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/09_paparazzi_mix_with_holla_back_gir.mp3', 8, 0),
(28, 'Alejandro Mix', 6, 1, 5, '4:47', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/10_alejandro_mix_with_the_motto.mp3', 9, 0),
(29, 'Make Her Say Mix', 6, 1, 5, '3:40', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/11_make_her_say_remix.mp3', 10, 0),
(31, 'Fingerprints', 3, 4, 3, '3:34', 'assets/music/Losing_Yourself/fingerprints.mp3', 3, 0),
(32, 'Losing Yourself', 3, 4, 3, '3:08', 'assets/music/Losing_Yourself/losing-yourself.mp3', 1, 0),
(33, 'Outside Looking In', 3, 4, 3, '3:24', 'assets/music/Losing_Yourself/outside-looking-in.mp3', 4, 0),
(34, 'Routine', 3, 4, 3, '3:17', 'assets/music/Losing_Yourself/routine.mp3', 5, 0),
(35, 'Sleight Of Hand', 3, 4, 3, '3:32', 'assets/music/Losing_Yourself/sleight-of-hand.mp3', 2, 0),
(36, 'Exodus', 5, 6, 4, '8:29', 'assets/music/The_Lowly_Heirs/exodus.mp3', 5, 0),
(37, 'Informal Exchange', 5, 6, 4, '10:01', 'assets/music/The_Lowly_Heirs/informal-exchange.mp3', 4, 0),
(38, 'I Will', 5, 6, 4, '5:17', 'assets/music/The_Lowly_Heirs/i-will.mp3', 6, 0),
(39, 'Love Has Won', 5, 6, 4, '7:09', 'assets/music/The_Lowly_Heirs/love-has-won.mp3', 2, 0),
(40, 'May I Run', 5, 6, 4, '5:42', 'assets/music/The_Lowly_Heirs/may-i-run.mp3', 1, 0),
(41, 'Sanctify', 5, 6, 4, '7:40', 'assets/music/The_Lowly_Heirs/sanctify.mp3', 3, 0),
(42, 'Deep Flooding Waters', 4, 7, 3, '3:49', 'assets/music/Yarrow/deep-flooding-waters.mp3', 3, 0),
(43, 'Drifting On A Summer Night', 4, 7, 3, '2:54', 'assets/music/Yarrow/drifting-on-a-summers-night.mp3', 7, 0),
(44, 'Fallen Leaves', 4, 7, 3, '4:08', 'assets/music/Yarrow/fallen-leaves.mp3', 1, 0),
(45, 'Roll Julia', 4, 7, 3, '3:03', 'assets/music/Yarrow/roll-julia.mp3', 4, 0),
(46, 'San Juan Hill', 4, 7, 3, '3:12', 'assets/music/Yarrow/san-juan-hill.mp3', 6, 0),
(47, 'Teardrops Fell', 4, 7, 3, '4:55', 'assets/music/Yarrow/teardrops-fell.mp3', 8, 0),
(48, 'The Birds Will Stop Their Singing', 4, 7, 3, '8:40', 'assets/music/Yarrow/the-birds-will-stop-their-singing.mp3', 5, 0),
(49, 'The Winter Has Passed', 4, 7, 3, '3:58', 'assets/music/Yarrow/the-winter-has-passed.mp3', 9, 0),
(50, 'Up On The Mountaintop', 4, 7, 3, '3:25', 'assets/music/Yarrow/up-on-the-mountaintop.mp3', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstName`, `lastname`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(5, 'TestTest', 'Test', 'Test', 'Test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-01-22 00:00:00', 'assets/images/profile_pics/profile_placeholder.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
