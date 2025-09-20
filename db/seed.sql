

USE music_library;


ALTER TABLE artists
  ADD COLUMN IF NOT EXISTS name   VARCHAR(255),
  ADD COLUMN IF NOT EXISTS title  VARCHAR(255),
  ADD COLUMN IF NOT EXISTS slug   VARCHAR(255),
  ADD COLUMN IF NOT EXISTS country VARCHAR(100);

ALTER TABLE genres
  ADD COLUMN IF NOT EXISTS name  VARCHAR(100),
  ADD COLUMN IF NOT EXISTS title VARCHAR(100),
  ADD COLUMN IF NOT EXISTS slug  VARCHAR(255);

ALTER TABLE singles
  ADD COLUMN IF NOT EXISTS image       VARCHAR(500),
  ADD COLUMN IF NOT EXISTS slug        VARCHAR(255),
  ADD COLUMN IF NOT EXISTS description TEXT;

ALTER TABLE artists ADD UNIQUE KEY IF NOT EXISTS uq_artists_slug (slug);
ALTER TABLE genres  ADD UNIQUE KEY IF NOT EXISTS uq_genres_slug  (slug);
ALTER TABLE singles ADD UNIQUE KEY IF NOT EXISTS uq_singles_slug (slug);

INSERT IGNORE INTO artists (name, title, country, slug) VALUES
  ('Daft Punk','Daft Punk','France','daft-punk'),
  ('Radiohead','Radiohead','UK','radiohead'),
  ('Miles Davis','Miles Davis','USA','miles-davis'),
  ('Pink Floyd','Pink Floyd','UK','pink-floyd'),
  ('Kendrick Lamar','Kendrick Lamar','USA','kendrick-lamar');

CREATE TABLE IF NOT EXISTS albums (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT UNSIGNED NOT NULL,
  title VARCHAR(255) NOT NULL,
  release_year SMALLINT UNSIGNED,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (artist_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tracks (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  album_id INT UNSIGNED NOT NULL,
  track_no SMALLINT UNSIGNED NOT NULL,
  title VARCHAR(255) NOT NULL,
  length_seconds INT UNSIGNED,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_album_track (album_id, track_no)
) ENGINE=InnoDB;

INSERT INTO albums (artist_id, title, release_year)
SELECT a.id, t.title, t.release_year
FROM (
  SELECT 'Daft Punk' AS name, 'Random Access Memories' AS title, 2013 AS release_year UNION ALL
  SELECT 'Daft Punk','Discovery',2001 UNION ALL
  SELECT 'Radiohead','In Rainbows',2007 UNION ALL
  SELECT 'Miles Davis','Kind of Blue',1959 UNION ALL
  SELECT 'Pink Floyd','The Dark Side of the Moon',1973 UNION ALL
  SELECT 'Kendrick Lamar','To Pimp a Butterfly',2015
) t
JOIN artists a ON (a.name = t.name OR a.title = t.name)
ON DUPLICATE KEY UPDATE title=VALUES(title), release_year=VALUES(release_year);

INSERT INTO tracks (album_id, track_no, title, length_seconds)
SELECT al.id, x.track_no, x.title, x.length_seconds
FROM (
  SELECT 'Random Access Memories' AS album, 1 AS track_no, 'Give Life Back to Music' AS title, 273 AS length_seconds UNION ALL
  SELECT 'Random Access Memories', 2, 'Instant Crush', 337 UNION ALL
  SELECT 'Discovery', 1, 'One More Time', 320 UNION ALL
  SELECT 'In Rainbows', 1, '15 Step', 236 UNION ALL
  SELECT 'Kind of Blue', 1, 'So What', 545 UNION ALL
  SELECT 'The Dark Side of the Moon', 1, 'Speak to Me', 90 UNION ALL
  SELECT 'To Pimp a Butterfly', 1, 'Wesley’s Theory', 250
) x
JOIN albums al ON al.title = x.album
ON DUPLICATE KEY UPDATE title=VALUES(title), length_seconds=VALUES(length_seconds);

INSERT IGNORE INTO genres (name, title, slug) VALUES
  ('Electronic','Electronic','electronic'),
  ('Rock','Rock','rock'),
  ('Jazz','Jazz','jazz'),
  ('Hip-Hop','Hip-Hop','hip-hop');

CREATE TABLE IF NOT EXISTS album_genres (
  album_id INT UNSIGNED NOT NULL,
  genre_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (album_id, genre_id)
) ENGINE=InnoDB;

INSERT IGNORE INTO album_genres (album_id, genre_id)
SELECT al.id, g.id
FROM (
  SELECT 'Random Access Memories' AS album, 'Electronic' AS genre UNION ALL
  SELECT 'Discovery','Electronic' UNION ALL
  SELECT 'In Rainbows','Rock' UNION ALL
  SELECT 'Kind of Blue','Jazz' UNION ALL
  SELECT 'The Dark Side of the Moon','Rock' UNION ALL
  SELECT 'To Pimp a Butterfly','Hip-Hop'
) x
JOIN albums al ON al.title = x.album
JOIN genres g ON (g.title = x.genre OR g.name = x.genre);

INSERT IGNORE INTO artists (title, name, slug) VALUES
  ('NAUTILUS','NAUTILUS','nautilus'),
  ('AC/DC','AC/DC','ac-dc'),
  ('Andie','Andie','andie'),
  ('Ravyn Lenae','Ravyn Lenae','ravyn-lenae'),
  ('Rex Orange County','Rex Orange County','rex-orange-county'),
  ('Vanilla Ice','Vanilla Ice','vanilla-ice'),
  ('The Doors','The Doors','the-doors'),
  ('Danny Vera','Danny Vera','danny-vera'),
  ('Bon Jovi','Bon Jovi','bon-jovi'),
  ('Leon Thomas','Leon Thomas','leon-thomas'),
  ('Rick Astley','Rick Astley','rick-astley'),
  ('Bruno Mars','Bruno Mars','bruno-mars'),
  ('Placeholder Artist 1','Placeholder Artist 1','placeholder-artist-1');

INSERT IGNORE INTO genres (title, name, slug) VALUES
  ('Pop','Pop','pop'),
  ('Acoustic','Acoustic','acoustic'),
  ('Alternative','Alternative','alternative'),
  ('R&B','R&B','rnb'),
  ('Classical','Classical','classical');

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Virtual Insanity',
       '/assets/img/albums/virtual-insanity.jpg',
       'virtual-insanity',
       'Jazzy, future-soul groove with warm keys, slick bass lines, and a hook that sticks.'
FROM artists a JOIN genres g
WHERE (a.slug='nautilus') AND (g.slug='jazz')
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Thunderstruck (Live)',
       '/assets/img/albums/acdc.jpg',
       'thunderstruck-live',
       'High-voltage AC/DC live anthem with precision riffing and raw stadium energy.'
FROM artists a JOIN genres g
WHERE a.slug='ac-dc' AND g.slug='rock'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Back In Black (Live)',
       '/assets/img/albums/acdc.jpg',
       'back-in-black-live',
       'A punchy hard-rock classic with crunchy guitars and call-and-response vocals.'
FROM artists a JOIN genres g
WHERE a.slug='ac-dc' AND g.slug='rock'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Time Moves Slow',
       '/assets/img/albums/time-moves-slow.jpg',
       'time-moves-slow',
       'Laid-back alt-R&B track with dusty drums, roomy guitar, and intimate vocals.'
FROM artists a JOIN genres g
WHERE a.slug='andie' AND g.slug='alternative'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Love Me Not',
       '/assets/img/albums/love-me-or-not.jpg',
       'love-me-not',
       'Airy R&B with bittersweet melodies and smooth grooves, featuring Rex Orange County.'
FROM artists a JOIN genres g
WHERE a.slug='ravyn-lenae' AND g.slug='rnb'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Jump Around',
       '/assets/img/albums/jump-around.jpg',
       'jump-around',
       'Old-school hip-hop hype track with brassy stabs and bounce-heavy beats.'
FROM artists a JOIN genres g
WHERE a.slug='vanilla-ice' AND g.slug='hip-hop'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'The Crystal Ship',
       '/assets/img/albums/the-crystal-ship.jpg',
       'the-crystal-ship',
       'Dreamlike Doors ballad with reverb-drenched keys and poetic, psychedelic lyrics.'
FROM artists a JOIN genres g
WHERE a.slug='the-doors' AND g.slug='rock'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Roller Coaster',
       '/assets/img/albums/rollercoaster.jpg',
       'roller-coaster',
       'Melancholic pop ballad with Americana shimmer and widescreen storytelling.'
FROM artists a JOIN genres g
WHERE a.slug='danny-vera' AND g.slug='pop'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, "It's My Life (2003 Acoustic Version)",
       '/assets/img/albums/its-my-life.jpg',
       'its-my-life-2003-acoustic-version',
       'Stripped-down acoustic version of Bon Jovi’s hit, spotlighting raw melody and resilience.'
FROM artists a JOIN genres g
WHERE a.slug='bon-jovi' AND g.slug='rock'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'MUTT',
       '/assets/img/albums/mutt.jpeg',
       'mutt',
       'Sleek modern R&B threaded with jazzy chords, rubbery bass, and crisp drums.'
FROM artists a JOIN genres g
WHERE a.slug='leon-thomas' AND g.slug='rnb'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Never Gonna Give You Up (Pianoforte)',
       '/assets/img/albums/never-gonna-give-you-up.jpg',
       'never-gonna-give-you-up-pianoforte',
       'Piano-led reinterpretation of Rick Astley’s classic, warm sustain and nostalgia.'
FROM artists a JOIN genres g
WHERE a.slug='rick-astley' AND g.slug='pop'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);

INSERT INTO singles (artist_id, genre_id, title, image, slug, description)
SELECT a.id, g.id, 'Die With A Smile',
       '/assets/img/albums/die-with-a-smile.jpg',
       'die-with-a-smile',
       'Lush pop ballad with glossy production, soaring chorus, and retro romance.'
FROM artists a JOIN genres g
WHERE a.slug='bruno-mars' AND g.slug='pop'
ON DUPLICATE KEY UPDATE title=VALUES(title), image=VALUES(image), description=VALUES(description), artist_id=VALUES(artist_id), genre_id=VALUES(genre_id);
