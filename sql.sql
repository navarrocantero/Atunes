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


-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--
CREATE DATABASE atuns;

CREATE TABLE atuns.track
(
  id                   INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  size                 TEXT                NOT NULL,
  total_time           TEXT                NOT NULL,
  date_added           TEXT                NOT NULL,
  play_date            TEXT                NOT NULL,
  play_date_utc        TEXT                NOT NULL,
  persistent_id        VARCHAR(100)        NOT NULL,
  track_type           VARCHAR(100)        NOT NULL,
  file_folder_count    VARCHAR(100)        NOT NULL,
  album                TEXT                NOT NULL,
  genre                TEXT                NOT NULL,
  name                 VARCHAR(100)        NOT NULL,
  artist               TEXT                NOT NULL,
  location             TEXT                NOT NULL,
  rating               TEXT,
  track_number         TEXT,
  bpm                  TEXT,
  date_modified        TEXT,
  bit_rate             TEXT,
  sample_rate          TEXT,
  play_count           TEXT,
  skip_count           TEXT,
  skip_date            TEXT,
  rating_computed      TEXT,
  compilation          TEXT,
  artwork_count        TEXT,
  album_artist         TEXT,
  kind                 TEXT,
  library_folder_count VARCHAR(100),
  sort_album_list      TEXT
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
;

CREATE TABLE atuns.album
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name text NOT NULL,
    artist text NOT NULL,
    image text,
    album_type text
);

--
-- Dumping data for table `tracks`
--


INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost', 'track01',
    'hans', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost',
                      'track02', 'hans', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
   NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost', 'track03',
    'hans', 'c:', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost',
                      'track04', 'hans', 'c:', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
   NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost', 'track05',
    'hans', 'c:', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost',
                      'track06', 'hans', 'c:', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
   NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('2424234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost', 'track07',
    'hans', 'c:', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('242423434234234', '3423423', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'Hans zimmer live', 'ost',
                      'track08', 'hans', 'c:', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
   NULL, NULL, NULL, NULL);


INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'esto es estopa', 'pop', 'track01',
    'estopa', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '5', 'esto es estopa', 'pop', 'track02',
    'estopa', 'c:', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '1', 'esto es estopa', 'pop', 'track03',
    'estopa', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '1', 'esto es estopa', 'pop', 'track04',
    'estopa', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '1', 'esto es estopa', 'pop', 'track05',
    'estopa', 'c:', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '1', 'esto es estopa', 'pop', 'track06',
    'estopa', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO atuns.track (size, total_time, date_added, play_date, play_date_utc, persistent_id, track_type, file_folder_count, album, genre, name, artist, location, rating, track_number, bpm, date_modified, bit_rate, sample_rate, play_count, skip_count, skip_date, rating_computed, compilation, artwork_count, album_artist, kind, library_folder_count, sort_album_list)
VALUES
  ('234232', '7534523', '2014-02-20', '2010-02-12', '2010-02-20', '2323', 'mp3', '2', 'esto es estopa', 'pop', 'track07',
    'estopa', 'c:', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


 INSERT into atuns.album (name, artist, image, album_type) VALUES ("Esto es estopa","estopa","https://pbs.twimg.com/profile_images/2892128671/c556a247b8c750b6f6b4e9789d124438.jpeg","album");
 INSERT into atuns.album (name, artist, image, album_type) VALUES ("Hans zimmer live","Hans","https://c-sf.smule.com/sf/s60/arr/82/16/3943afa6-9421-4dce-8b4c-8648b3b793b1_256.jpg","album");
