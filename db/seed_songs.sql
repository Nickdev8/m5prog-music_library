USE music_library;

-- 1) Artists (INSERT IGNORE so it won’t error if they already exist)
INSERT IGNORE INTO artists (title, slug) VALUES
  ('NAUTILUS','nautilus'),
  ('AC/DC','ac-dc'),
  ('Andie','andie'),
  ('Ravyn Lenae','ravyn-lenae'),
  ('Rex Orange County','rex-orange-county'),
  ('Vanilla Ice','vanilla-ice'),
  ('The Doors','the-doors'),
  ('Danny Vera','danny-vera'),
  ('Bon Jovi','bon-jovi'),
  ('Leon Thomas','leon-thomas'),
  ('Rick Astley','rick-astley'),
  ('Bruno Mars','bruno-mars'),
  ('Placeholder Artist 1','placeholder-artist-1'),
  ('Placeholder Artist 2','placeholder-artist-2'),
  ('Placeholder Artist 3','placeholder-artist-3');

-- 2) Genres (keep slugs simple; use 'rnb' for R&B)
INSERT IGNORE INTO genres (title, slug) VALUES
  ('Rock','rock'),
  ('Pop','pop'),
  ('Electronic','electronic'),
  ('Jazz','jazz'),
  ('Hip-Hop','hip-hop'),
  ('Acoustic','acoustic'),
  ('Alternative','alternative'),
  ('R&B','rnb'),
  ('Classical','classical');

-- 3) Singles
-- Helper: a small macro-like pattern using INSERT ... SELECT and ON DUPLICATE KEY UPDATE
-- NOTE: We store only ONE primary genre per single. If a track has multiple genres,
--       we pick the FIRST listed one (matching the comments below).

-- Virtual Insanity — genres: Jazz, Electronic → take 'jazz'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Virtual Insanity', '/assets/img/albums/virtual-insanity.jpg', 'virtual-insanity'
FROM artists a JOIN genres g
WHERE a.slug='nautilus' AND g.slug='jazz'
ON DUPLICATE KEY UPDATE
  artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Thunderstruck (Live) — Rock
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Thunderstruck (Live)', '/assets/img/albums/acdc.jpg', 'thunderstruck-live'
FROM artists a JOIN genres g
WHERE a.slug='ac-dc' AND g.slug='rock'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Back In Black (Live) — Rock
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Back In Black (Live)', '/assets/img/albums/acdc.jpg', 'back-in-black-live'
FROM artists a JOIN genres g
WHERE a.slug='ac-dc' AND g.slug='rock'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Time Moves Slow — Alternative, R&B → take 'alternative'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Time Moves Slow', '/assets/img/albums/time-moves-slow.jpg', 'time-moves-slow'
FROM artists a JOIN genres g
WHERE a.slug='andie' AND g.slug='alternative'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Love Me Not — R&B, Pop → take 'rnb'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Love Me Not', '/assets/img/albums/love-me-or-not.jpg', 'love-me-not'
FROM artists a JOIN genres g
WHERE a.slug='ravyn-lenae' AND g.slug='rnb'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Jump Around — Hip-Hop
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Jump Around', '/assets/img/albums/jump-around.jpg', 'jump-around'
FROM artists a JOIN genres g
WHERE a.slug='vanilla-ice' AND g.slug='hip-hop'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- The Crystal Ship — Rock, Alternative → take 'rock'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'The Crystal Ship', '/assets/img/albums/the-crystal-ship.jpg', 'the-crystal-ship'
FROM artists a JOIN genres g
WHERE a.slug='the-doors' AND g.slug='rock'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Roller Coaster — Pop, Acoustic → take 'pop'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Roller Coaster', '/assets/img/albums/rollercoaster.jpg', 'roller-coaster'
FROM artists a JOIN genres g
WHERE a.slug='danny-vera' AND g.slug='pop'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- It's My Life (2003 Acoustic Version) — Rock, Acoustic → take 'rock'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, "It's My Life (2003 Acoustic Version)", '/assets/img/albums/its-my-life.jpg', 'its-my-life-2003-acoustic-version'
FROM artists a JOIN genres g
WHERE a.slug='bon-jovi' AND g.slug='rock'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- MUTT — R&B, Jazz → take 'rnb'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'MUTT', '/assets/img/albums/mutt.jpeg', 'mutt'
FROM artists a JOIN genres g
WHERE a.slug='leon-thomas' AND g.slug='rnb'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Never Gonna Give You Up (Pianoforte) — Pop, Acoustic → take 'pop'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Never Gonna Give You Up (Pianoforte)', '/assets/img/albums/never-gonna-give-you-up.jpg', 'never-gonna-give-you-up-pianoforte'
FROM artists a JOIN genres g
WHERE a.slug='rick-astley' AND g.slug='pop'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);

-- Die With A Smile — Pop, R&B → take 'pop'
INSERT INTO singles (artist_id, genre_id, title, image, slug)
SELECT a.id, g.id, 'Die With A Smile', '/assets/img/albums/die-with-a-smile.jpg', 'die-with-a-smile'
FROM artists a JOIN genres g
WHERE a.slug='bruno-mars' AND g.slug='pop'
ON DUPLICATE KEY UPDATE artist_id=VALUES(artist_id), genre_id=VALUES(genre_id), title=VALUES(title), image=VALUES(image);