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
 create database atuns
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
 create database atuns

CREATE TABLE  track
(
  id                   INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  album                TEXT                NOT NULL,
  genre                TEXT                NOT NULL,
  name                 VARCHAR(100)        NOT NULL,
  artist               TEXT                NOT NULL,
    size                 TEXT,
  location             TEXT,
  rating               TEXT,
  track_number         TEXT,
  bpm                  TEXT,
    `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE  album
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name text NOT NULL,
    artist text NOT NULL,
    image text,
    album_type text,
      `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);


--
-- Dumping data for table `tracks`
--


INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '1', '160', '5', 'Hans zimmer live', 'ost', 'track01');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '2', '110', '2', 'Hans zimmer live', 'ost', 'track02');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('123123', 'Hans', 'C:', '3', '110', '5', 'Hans zimmer live', 'ost', 'track03');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '4', '160', '2', 'Hans zimmer live', 'ost', 'track04');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '5', '110', '1', 'Hans zimmer live', 'ost', 'track05');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('123123', 'Hans', 'C:', '6', '110', '2', 'Hans zimmer live', 'ost', 'track06');



INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('12312', 'Estopa', 'C:', '1', '160', '5', 'Esto es estopa', 'pop', 'Aire');

  INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('124124', 'Estopa', 'C:', '2', '160', '4', 'Esto es estopa', 'pop', 'Barrio');

INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('124124', 'Estopa', 'C:', '3', '160', '2', 'Esto es estopa', 'pop', 'Campo');

  INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('12312', 'Estopa', 'C:', '5', '222', '3', 'Esto es estopa', 'pop', 'Sole!');


INSERT into album (name, artist, image, album_type) VALUES ("Esto es estopa","estopa","https://pbs.twimg.com/profile_images/2892128671/c556a247b8c750b6f6b4e9789d124438.jpeg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Hans zimmer live","Hans","https://c-sf.smule.com/sf/s60/arr/82/16/3943afa6-9421-4dce-8b4c-8648b3b793b1_256.jpg","album");


create table  user
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name text not null,
	email text not null,
	password text not null,
	created_at datetime not null,
	updated_at datetime not null
);