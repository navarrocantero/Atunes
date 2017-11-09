-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2017 at 03:24 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `atunes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `size` text NOT NULL,
  `total_time` text NOT NULL,
  `date_added` text NOT NULL,
  `play_date` text NOT NULL,
  `play_date_utc` text NOT NULL,
  `persistent_id` varchar(100) NOT NULL,
  `track_type` varchar(100) NOT NULL,
  `file_folder_count` varchar(100) NOT NULL,
  `album` text NOT NULL,
  `genre` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `artist` text NOT NULL,
  `location` text NOT NULL,
  `track_number` text,
  `bpm` text,
  `date_modified` text,
  `bit_rate` text,
  `sample_rate` text,
  `play_count` text,
  `skip_count` text,
  `skip_date` text,
  `rating` text,
  `rating_computed` text,
  `compilation` text,
  `artwork_count` text,
  `album_artist` text,
  `kind` text,
  `library_folder_count` varchar(100) DEFAULT NULL,
  `sort_album_list` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `size`, `total_time`, `date_added`, `play_date`, `play_date_utc`, `persistent_id`, `track_type`, `file_folder_count`, `album`, `genre`, `name`, `artist`, `location`, `track_number`, `bpm`, `date_modified`, `bit_rate`, `sample_rate`, `play_count`, `skip_count`, `skip_date`, `rating`, `rating_computed`, `compilation`, `artwork_count`, `album_artist`, `kind`, `library_folder_count`, `sort_album_list`) VALUES
(1, '234', '323', '2011', '2043', '2131', '1423434', 'mpeg', '23', 'albun', 'castle', 'castillo y albu', 'asdfsd', 'c;:', '214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, '34', NULL),
(2, '23523', '32424324', '2015', '2014', '124234', '342342', 'mp3', '3', 'bsoses', 'ost', 'track01', 'hans', 'c:', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;