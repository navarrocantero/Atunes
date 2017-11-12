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
CREATE DATABASE atunes;


CREATE TABLE atunes.tracks
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    size text NOT NULL,
    total_time text NOT NULL,
    date_added text NOT NULL,
    play_date text NOT NULL,
    play_date_utc text NOT NULL,
    persistent_id varchar(100) NOT NULL,
    track_type varchar(100) NOT NULL,
    file_folder_count varchar(100) NOT NULL,
    album text NOT NULL,
    genre text NOT NULL,
    name varchar(100) NOT NULL,
    artist text NOT NULL,
    location text NOT NULL,
    rating text,
    track_number text,
    bpm text,
    date_modified text,
    bit_rate text,
    sample_rate text,
    play_count text,
    skip_count text,
    skip_date text,
    rating_computed text,
    compilation text,
    artwork_count text,
    album_artist text,
    kind text,
    library_folder_count varchar(100),
    sort_album_list text
)ENGINE=InnoDB DEFAULT CHARSET=utf8;;

--
-- Dumping data for table `tracks`
--


INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track01', 'hans', 'c:', '4', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
 ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track02', 'hans', 'c:', '4', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
 INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
 ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track03', 'hans', 'c:', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
 INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track04', 'hans', 'c:', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track05', 'hans', 'c:', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
 ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track06', 'hans', 'c:', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
 INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
 ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track07', 'hans', 'c:', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
 INSERT INTO atunes.tracks (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list) VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'bsoses', 'ost', 'track08', 'hans', 'c:', '5', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
