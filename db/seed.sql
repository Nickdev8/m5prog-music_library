USE `music_library`;

INSERT INTO artists (name, country) VALUES
  ('Daft Punk','France'),
  ('Radiohead','UK'),
  ('Miles Davis','USA'),
  ('Pink Floyd','UK'),
  ('Kendrick Lamar','USA');

INSERT INTO albums (artist_id, title, release_year) VALUES
  (1,'Random Access Memories',2013),
  (1,'Discovery',2001),
  (2,'In Rainbows',2007),
  (3,'Kind of Blue',1959),
  (4,'The Dark Side of the Moon',1973),
  (5,'To Pimp a Butterfly',2015);

-- Tracks voor een paar albums (track_no uniek binnen album)
INSERT INTO tracks (album_id, track_no, title, length_seconds) VALUES
  (1,1,'Give Life Back to Music',273),
  (1,2,'Instant Crush',337),
  (2,1,'One More Time',320),
  (3,1,'15 Step',236),
  (4,1,'So What',545),
  (5,1,'Speak to Me',90),
  (6,1,'Wesley’s Theory',250);

INSERT INTO genres (name) VALUES
  ('Electronic'), ('Rock'), ('Jazz'), ('Hip-Hop');

-- Koppel wat genres aan albums
INSERT INTO album_genres (album_id, genre_id) VALUES
  (1,1),(2,1),(3,2),(4,3),(5,2),(6,4);
