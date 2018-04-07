-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 12:11 AM
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
(7, 'The Deep Dark Woods', 4, 3, 'assets/images/albumArtwork/theDeepDarkWoods.jpg'),
(8, 'As I Am', 8, 5, 'assets/images/albumArtwork/asIAm.jpg'),
(9, 'The Chase', 1, 1, 'assets/images/albumArtwork/theChase.jpg'),
(10, 'Ali', 9, 2, 'assets/images/albumArtwork/ali.jpg'),
(11, 'NREM Edition', 10, 2, 'assets/images/albumArtwork/dreamJunkies.jpg'),
(12, 'Vapor', 15, 3, 'assets/images/albumArtwork/trellaVapor.jpg'),
(13, 'Miss Liberty', 12, 5, 'assets/images/albumArtwork/missLiberty.jpg'),
(14, 'Midnight Horizon', 14, 5, 'assets/images/albumArtwork/midnightHorizons.jpg'),
(15, 'Dream Away The Lonley', 11, 5, 'assets/images/albumArtwork/dreamAwayTheLonely.jpg'),
(16, 'The Reapers', 16, 1, 'assets/images/albumArtwork/perpetualParanoia.jpg');

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
(7, 'Dane Joneshill'),
(8, 'Suri'),
(9, 'Ty Brasel'),
(10, 'Dream Junkies'),
(11, 'Tell Her I Love Her'),
(12, 'Darren Garvey'),
(14, 'Narrow Skies'),
(15, 'Trella'),
(16, 'Perpetual Paranoia');

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
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `playlistName` varchar(255) NOT NULL,
  `playlistOwner` varchar(255) NOT NULL,
  `playlistCreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `playlistName`, `playlistOwner`, `playlistCreatedDate`) VALUES
(13, 'Test', 'TestTest', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `trackId` int(11) NOT NULL,
  `plsId` int(11) NOT NULL,
  `plsOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `trackId`, `plsId`, `plsOrder`) VALUES
(20, 17, 13, 0);

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
(1, 'Bad Habits', 2, 2, 1, '2:39', 'assets/music/Burnin_Both_Ends/bad-habits.mp3', 6, 5),
(2, 'Burnin Both Ends', 2, 2, 1, '2:17', 'assets/music/Burnin_Both_Ends/burnin-both-ends.mp3', 1, 15),
(3, 'Home', 2, 2, 1, '3:51', 'assets/music/Burnin_Both_Ends/home.mp3', 5, 8),
(4, 'I\'ve Seen Days', 2, 2, 1, '4:01', 'assets/music/Burnin_Both_Ends/ive-seen-days.mp3', 2, 10),
(5, 'Meet Me', 2, 2, 1, '2:46', 'assets/music/Burnin_Both_Ends/meet-me.mp3', 4, 28),
(6, 'The Hole You Dug', 2, 2, 1, '2:45', 'assets/music/Burnin_Both_Ends/the-hole-you-dug.mp3', 3, 8),
(7, 'Abigail Dear', 7, 5, 5, '4:40', 'assets/music/Everything_that_rises_must_Converge/abigail-dear.mp3', 2, 7),
(8, 'Billy', 7, 5, 5, '5:02', 'assets/music/Everything_that_rises_must_Converge/billy.mp3', 6, 2),
(9, 'Everything That Rises Must Converge', 7, 5, 5, '5:32', 'assets/music/Everything_that_rises_must_Converge/everything-that-rises-must-converge.mp3', 1, 4),
(10, 'First Communion', 7, 5, 5, '4:07', 'assets/music/Everything_that_rises_must_Converge/first-communion.mp3', 5, 4),
(11, 'Fragments', 7, 5, 5, '5:21', 'assets/music/Everything_that_rises_must_Converge/fragments.mp3', 7, 15),
(12, 'If I Could', 7, 5, 5, '4:05', 'assets/music/Everything_that_rises_must_Converge/if-i-could.mp3', 4, 8),
(13, 'Live A Little', 7, 5, 5, '3:57', 'assets/music/Everything_that_rises_must_Converge/live-a-little.mp3', 3, 6),
(14, 'Long Way Around', 7, 5, 5, '5:31', 'assets/music/Everything_that_rises_must_Converge/long-way-around.mp3', 10, 5),
(15, 'We Lie Together', 7, 5, 5, '5:54', 'assets/music/Everything_that_rises_must_Converge/we-lie-together.mp3', 8, 2),
(16, 'Who I Am', 7, 5, 5, '6:08', 'assets/music/Everything_that_rises_must_Converge/who-i-am.mp3', 9, 4),
(17, 'Fighter', 1, 3, 1, '2:55', 'assets/music/fighter/01_fighter.mp3', 1, 9),
(18, 'Pushover', 1, 3, 1, '3:13', 'assets/music/fighter/03_pushover.mp3', 2, 15),
(19, 'Human', 1, 3, 1, '3:34', 'assets/music/fighter/04_human.mp3', 3, 7),
(20, 'Born This Way Mix', 6, 1, 5, '4:21', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/01_born_this_way_mix_with_in_the_aye.mp3', 1, 11),
(21, 'Just Dance Mix', 6, 1, 5, '4:42', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/02_just_dance_mix_with_fergalicious.mp3', 2, 7),
(22, 'Dance In The Dark Mix', 6, 1, 5, '3:46', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/03_dance_in_the_dark_mix_with_like_a.mp3', 3, 8),
(23, 'The Edge Of Glory', 6, 1, 5, '3:54', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/04_the_edge_of_glory_mix_with_my_hum.mp3', 4, 10),
(24, 'Telephone Mix', 6, 1, 5, '4:27', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/06_telephone_mix_with_sexy__i_know.mp3', 5, 6),
(25, 'Poker Face Mix', 6, 1, 5, '3:52', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/07_poker_face_mix_with_follow_me.mp3', 6, 5),
(26, 'Bad Romance', 6, 1, 5, '6:52', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/08_bad_romance_mix_with_fired_up.mp3', 7, 11),
(27, 'Paparazzi Mix', 6, 1, 5, '3:00', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/09_paparazzi_mix_with_holla_back_gir.mp3', 8, 6),
(28, 'Alejandro Mix', 6, 1, 5, '4:47', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/10_alejandro_mix_with_the_motto.mp3', 9, 8),
(29, 'Make Her Say Mix', 6, 1, 5, '3:40', 'assets/music/lady_gaga_the_mixtape_remix_by_dj_milk/11_make_her_say_remix.mp3', 10, 2),
(31, 'Fingerprints', 3, 4, 3, '3:34', 'assets/music/Losing_Yourself/fingerprints.mp3', 3, 16),
(32, 'Losing Yourself', 3, 4, 3, '3:08', 'assets/music/Losing_Yourself/losing-yourself.mp3', 1, 34),
(33, 'Outside Looking In', 3, 4, 3, '3:24', 'assets/music/Losing_Yourself/outside-looking-in.mp3', 4, 9),
(34, 'Routine', 3, 4, 3, '3:17', 'assets/music/Losing_Yourself/routine.mp3', 5, 11),
(35, 'Sleight Of Hand', 3, 4, 3, '3:32', 'assets/music/Losing_Yourself/sleight-of-hand.mp3', 2, 33),
(36, 'Exodus', 5, 6, 4, '8:29', 'assets/music/The_Lowly_Heirs/exodus.mp3', 5, 17),
(37, 'Informal Exchange', 5, 6, 4, '10:01', 'assets/music/The_Lowly_Heirs/informal-exchange.mp3', 4, 6),
(38, 'I Will', 5, 6, 4, '5:17', 'assets/music/The_Lowly_Heirs/i-will.mp3', 6, 14),
(39, 'Love Has Won', 5, 6, 4, '7:09', 'assets/music/The_Lowly_Heirs/love-has-won.mp3', 2, 11),
(40, 'May I Run', 5, 6, 4, '5:42', 'assets/music/The_Lowly_Heirs/may-i-run.mp3', 1, 5),
(41, 'Sanctify', 5, 6, 4, '7:40', 'assets/music/The_Lowly_Heirs/sanctify.mp3', 3, 7),
(42, 'Deep Flooding Waters', 4, 7, 3, '3:49', 'assets/music/Yarrow/deep-flooding-waters.mp3', 3, 1),
(43, 'Drifting On A Summer Night', 4, 7, 3, '2:54', 'assets/music/Yarrow/drifting-on-a-summers-night.mp3', 7, 5),
(44, 'Fallen Leaves', 4, 7, 3, '4:08', 'assets/music/Yarrow/fallen-leaves.mp3', 1, 4),
(45, 'Roll Julia', 4, 7, 3, '3:03', 'assets/music/Yarrow/roll-julia.mp3', 4, 2),
(46, 'San Juan Hill', 4, 7, 3, '3:12', 'assets/music/Yarrow/san-juan-hill.mp3', 6, 3),
(47, 'Teardrops Fell', 4, 7, 3, '4:55', 'assets/music/Yarrow/teardrops-fell.mp3', 8, 6),
(48, 'The Birds Will Stop Their Singing', 4, 7, 3, '8:40', 'assets/music/Yarrow/the-birds-will-stop-their-singing.mp3', 5, 2),
(49, 'The Winter Has Passed', 4, 7, 3, '3:58', 'assets/music/Yarrow/the-winter-has-passed.mp3', 9, 8),
(50, 'Up On The Mountaintop', 4, 7, 3, '3:25', 'assets/music/Yarrow/up-on-the-mountaintop.mp3', 2, 4),
(51, 'As I Am', 8, 8, 5, '4:15', 'assets/music/AsIAm/as-i-am.mp3', 1, 1),
(52, 'Music In Our Dreams', 8, 8, 5, '4:12', 'assets/music/AsIAm/music-in-our-dreams.mp3', 2, 0),
(54, 'Earth Heaven', 8, 8, 5, '4:23', 'assets/music/AsIAm/earth-heaven.mp3', 3, 0),
(55, 'Wild Thing', 8, 8, 5, '3:41', 'assets/music/AsIAm/wild-thingmp3', 4, 0),
(56, 'Scarlet', 8, 8, 5, '5:37', 'assets/music/AsIAm/scarlet.mp3', 5, 0),
(57, 'Avalanche', 1, 9, 1, '3:11', 'assets/music/theChase/avalanche.mp3', 6, 0),
(58, 'Better Cause Of You', 1, 9, 1, '4:10', 'assets/music/theChase/better-cause-of-you.mp3', 10, 0),
(59, 'Breaking Down The Walls', 1, 9, 1, '3:39', 'assets/music/theChase/breaking-down-the-walls.mp3', 11, 0),
(60, 'Bring The Ruckus', 1, 9, 1, '3:37', 'assets/music/theChase/bring-the-ruckus.mp3', 5, 0),
(61, 'Every Time You Run', 1, 9, 1, '3:35', 'assets/music/theChase/every-time-you-run.mp3', 4, 0),
(62, 'Fire In The Kitchen', 1, 9, 1, '2:48', 'assets/music/theChase/fire-in-the-kitchen.mp3', 2, 1),
(63, 'Married In Vegas', 1, 9, 1, '4:05', 'assets/music/theChase/married-in-vegas.mp3', 7, 0),
(64, 'No Plan B', 1, 9, 1, '3:23', 'assets/music/theChase/no-plan-b.mp3', 1, 0),
(65, 'Renegade', 1, 9, 1, '3:37', 'assets/music/theChase/renegade.mp3', 8, 0),
(66, 'Supernatural', 1, 9, 1, '3:55', 'assets/music/theChase/supernatural.mp3', 3, 0),
(67, 'The Chase', 1, 9, 1, '3:05', 'assets/music/theChase/the-chase.mp3', 9, 0),
(68, 'Ali', 9, 10, 2, '3:32', 'assets/music/ali/ty-brasel-ali.mp3', 1, 5),
(69, 'Higher', 10, 11, 2, '5:13', 'assets/music/dreamJunkies/01-higher-mp3.mp3', 1, 1),
(70, 'Move', 10, 11, 2, '4:34', 'assets/music/dreamJunkies/02-move-mp3.mp3', 2, 0),
(71, 'Dreamers', 10, 11, 2, '4:00', 'assets/music/dreamJunkies/03-dreamers-mp3.mp3', 3, 0),
(72, 'Old Friends', 10, 11, 2, '4:16', 'assets/music/dreamJunkies/04-old-friends-mp3.mp3', 4, 0),
(73, 'HypocritiCOOL', 10, 11, 2, '3:43', 'assets/music/dreamJunkies/05-hypocriticool-mp3.mp3', 5, 0),
(74, '4 By 4', 10, 11, 2, '2:46', 'assets/music/dreamJunkies/06-4-by-4-mp3.mp3', 6, 0),
(75, 'Soul Rebels', 10, 11, 2, '4:50', 'assets/music/dreamJunkies/07-soul-rebels-mp3.mp3', 7, 0),
(76, 'Mandela', 10, 11, 2, '5:02', 'assets/music/dreamJunkies/08-mandela-mp3.mp3', 8, 0),
(77, 'Dream Junkies', 10, 11, 2, '4:30', 'assets/music/dreamJunkies/09-dream-junkies-mp3.mp3', 9, 0),
(78, 'Explain', 10, 11, 2, '5:08', 'assets/music/dreamJunkies/10-explain-mp3.mp3', 10, 0),
(79, 'Oceans', 10, 11, 2, '4:44', 'assets/music/dreamJunkies/11-oceans-mp3.mp3', 11, 0),
(80, 'Breathe Again', 15, 12, 3, '3:32', 'assets/music/trellaVapor/breathe-again.mp3', 2, 0),
(81, 'Crash', 15, 12, 3, '3:23', 'assets/music/trellaVapor/crash.mp3', 4, 0),
(82, 'Retreat', 15, 12, 3, '3:58', 'assets/music/trellaVapor/retreat.mp3', 3, 0),
(83, 'Salt', 15, 12, 3, '4:43', 'assets/music/trellaVapor/salt.mp3', 6, 0),
(84, 'stand Up', 15, 12, 3, '3:23', 'assets/music/trellaVapor/stand-up.mp3', 1, 0),
(85, 'Vapor', 15, 12, 3, '4:50', 'assets/music/trellaVapor/vapor.mp3', 5, 0),
(86, 'Miss Liberty', 12, 13, 5, '4:04', 'assets/music/missLiberty/miss-liberty.mp3', 1, 0),
(87, 'I Want The Wind To Carry Me', 14, 14, 5, '2:49', 'assets/music/midnightHorizons/i-want-the-wind-to-carry-me.mp3', 1, 0),
(88, 'Nightfall Embers', 14, 14, 5, '1:07', 'assets/music/midnightHorizons/nightfall-embers.mp3', 4, 0),
(89, 'Open Road', 14, 14, 5, '3:25', 'assets/music/midnightHorizons/open-road.mp3', 2, 0),
(90, 'The River', 14, 14, 5, '3:58', 'assets/music/midnightHorizons/the-river.mp3', 3, 0),
(91, 'The Reapers', 16, 16, 1, '6:25', 'assets\\music\\theReapers/the-reapers.mp3', 1, 0),
(92, 'Dream Away The Lonely', 11, 15, 5, '3:08', 'assets\\music\\dreamAwayTheLonely/dream-away-the-lonely.mp3', 1, 0),
(93, 'The Joneses', 11, 15, 5, '3:04', 'assets\\music\\dreamAwayTheLonely/the-joneses.mp3', 2, 0);

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
(5, 'TestTest', 'Test', 'Test', 'Test@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-22 00:00:00', 'assets/images/profile_pics/profile_placeholder.jpg'),
(6, 'mace.jessica', 'Jess', 'Mace', 'Mace.jessica@yahoo.com', '0c41dff16940ba2f0e85f37a55fcbbbf', '2018-03-17 00:00:00', 'assets/images/profile_pics/profile_placeholder.jpg'),
(7, 'UserNameHere', 'Test', 'Account', 'Email@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-04 00:00:00', 'assets/images/profile_pics/profile_placeholder.jpg');

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
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
