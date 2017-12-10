
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- Table structure for table `track`


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

  -- Table structure for table `album`

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

  -- Table structure for table `user`

create table  user
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name text not null,
	email text not null,
	password text not null,
	created_at datetime not null,
	updated_at datetime not null
);

-- Dumping data for table `track`

INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '1', '160', '5', 'Hans zimmer live', 'ost', 'Opening Medley');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '2', '110', '2', 'Hans zimmer live', 'ost', 'Crimson Tide/160BPM');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('123123', 'Hans', 'C:', '3', '110', '5', 'Hans zimmer live', 'ost', 'Gladiator Medley');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '4', '160', '2', 'Hans zimmer live', 'ost', 'Chevaliers De Sangreal');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2424234', 'Hans', 'C:', '5', '110', '1', 'Hans zimmer live', 'ost', 'The Lion King MEdley');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('123123', 'Hans', 'C:', '6', '110', '2', 'Hans zimmer live', 'ost', 'Pirates Of The Caribbean Medley');
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


INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('3456567', 'Hans', 'C:', '1', '160', '5', 'Blade Runner 2049', 'ost', '2049');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2374567', 'Hans', 'C:', '2', '421', '5', 'Blade Runner 2049', 'ost', 'Sappes Tree');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('23456', 'Hans', 'C:', '3', '212', '5', 'Blade Runner 2049', 'ost', 'Flight to LAPD');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('4567234', 'Hans', 'C:', '4', '333', '2', 'Blade Runner 2049', 'ost', 'Summer Wind');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('5235235', 'Hans', 'C:', '5', '220', '1', 'Blade Runner 2049', 'ost', 'Rain');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2345', 'Hans', 'C:', '6', '110', '2', 'Blade Runner 2049', 'ost', 'Wallace');

INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('3456567', 'Hans', 'C:', '1', '160', '5', 'Batman V Superman', 'ost', 'Beautiful Lie');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2374567', 'Hans', 'C:', '2', '421', '5', 'Batman V Superman', 'ost', 'Their War Here');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('23456', 'Hans', 'C:', '3', '212', '5', 'Batman V Superman', 'ost', 'The Red Capes Are Coming');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('4567234', 'Hans', 'C:', '4', '333', '2', 'Batman V Superman', 'ost', 'Day of the Dead');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('5235235', 'Hans', 'C:', '5', '220', '1', 'Batman V Superman', 'ost', 'Must There Be a Superman?');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('2345', 'Hans', 'C:', '6', '110', '2', 'Batman V Superman', 'ost', 'New  Rules');


INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1233', 'Hans', 'C:', '1', '160', '5', 'Man Of Steel', 'ost', 'Look to the Stars');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('235235', 'Hans', 'C:', '2', '111', '5', 'Man Of Steel', 'ost', 'Oil Rig');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1241245', 'Hans', 'C:', '3', '123', '5', 'Man Of Steel', 'ost', 'Sent Here for a Reason');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('678345', 'Hans', 'C:', '4', '534', '5', 'Man Of Steel', 'ost', 'DNA');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('12347', 'Hans', 'C:', '5', '123', '4', 'Man Of Steel', 'ost', 'Goodbye My Son');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('564723', 'Hans', 'C:', '6', '110', '5', 'Man Of Steel', 'ost', 'If You Love These People');


INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1233', 'Hans', 'C:', '1', '160', '2', 'Inception', 'ost', 'Half Reemembered Dream');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('34523', 'Hans', 'C:', '2', '111', '4', 'Inception', 'ost', 'We Built Our Own World');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1241', 'Hans', 'C:', '3', '123', '4', 'Inception', 'ost', 'Dream is Collapsing');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('23466', 'Hans', 'C:', '4', '534', '3', 'Inception', 'ost', 'Radical Notion');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('4564523', 'Hans', 'C:', '5', '123', '3', 'Inception', 'ost', 'Old Souls');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('565634', 'Hans', 'C:', '6', '110', '5', 'Inception', 'ost', 'Mombasa');

INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1233', 'Jhon Williams', 'C:', '1', '160', '2', 'Jurassic Park', 'ost', 'Open Titles');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('34523', 'Jhon Williams', 'C:', '2', '111', '4', 'Jurassic Park', 'ost', 'Theme From Jurassic Park');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('1241', 'Jhon Williams', 'C:', '3', '123', '1', 'Jurassic Park', 'ost', 'Incident At Isla Nublar');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('23466', 'Jhon Williams', 'C:', '4', '534', '4', 'Jurassic Park', 'ost', 'Jorney To The Island');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('4564523', 'Jhon Williams', 'C:', '5', '123', '3', 'Jurassic Park', 'ost', 'The Raptor Attack');
INSERT INTO track (size,   artist, location, track_number, bpm, rating,album, genre,name)
VALUES
  ('565634', 'Jhon Williams', 'C:', '6', '110', '2', 'Jurassic Park', 'ost', 'Hatching Baby Raptor');


-- Dumping data for table `album`

INSERT into album (name, artist, image, album_type) VALUES ("Esto es estopa","Estopa","https://pbs.twimg.com/profile_images/2892128671/c556a247b8c750b6f6b4e9789d124438.jpeg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Hans zimmer live","Hans Zimmer","https://c-sf.smule.com/sf/s60/arr/82/16/3943afa6-9421-4dce-8b4c-8648b3b793b1_256.jpg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Blade Runner 2049","Hans Zimmer","http://store.ugsounds.com/images/product/h/hans-zimmer-and-benjamin-wallfisch-blade-runner-2049-soundtr-r21816-256px-256px.jpg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Batman V Superman","Hans Zimmer","https://www.junerecords.com/images/product/v/vinyl-soundtrack-hans-zimmer-and-junkie-xl-batman-vs-superma-256px-256px.jpg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Inception","Hans Zimmer","https://at-cdn-s01.audiotool.com/2012/06/24/documents/8rtXXmfMFdxjH0V3RDlIdoRufet8Vv/0/cover256x256-d5326c897e144c7dba207519a7514749.jpg","album");
INSERT into album (name, artist, image, album_type) VALUES ("Man Of Steel","Hans Zimmer","http://zplusapp.com/static/img/manofsteel-256.png","album");
INSERT into album (name, artist, image, album_type) VALUES ("Jurassic Park","Jhon Williams","http://static.wixstatic.com/media/55d151_f787c9fd93284977a83308a173e00275~mv2.jpg_256","album");



