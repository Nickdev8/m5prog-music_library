<?php
require_once __DIR__ . '/../source/database.php';
require_once __DIR__ . '/../views/header.php';

$path     = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$segments = array_values(array_filter(explode('/', $path))); // ['artist','michael-jackson'] etc.

$first = $segments[0] ?? null;
$second = $segments[1] ?? null;

// /single/{slug}
if ($first === 'single' && $second) {
  $pageTitle = 'Music Library · Single';
  $sql = <<<SQL
    SELECT s.*, a.title AS artist_title, a.slug AS artist_slug,
           g.title AS genre_title,  g.slug AS genre_slug
    FROM singles s
    LEFT JOIN artists a ON a.id = s.artist_id
    LEFT JOIN genres  g ON g.id = s.genre_id
    WHERE s.slug = ?
    LIMIT 1
  SQL;
  $stmt = $connection->prepare($sql);
  $stmt->bind_param('s', $second);
  $stmt->execute();
  $result = $stmt->get_result();
  $single = mysqli_fetch_assoc($result);

  if (!$single) { http_response_code(404); echo '<div class="container my-5 alert alert-warning">Single niet gevonden.</div>'; require_once __DIR__ . '/../views/footer.php'; exit; }
  require_once __DIR__ . '/../views/single.php';
  require_once __DIR__ . '/../views/footer.php';
  exit;
}

// /artist/{slug}
if ($first === 'artist' && $second) {
  $pageTitle = 'Music Library · Artist';
  $heading   = 'Artist singles';
  $sql = <<<SQL
    SELECT s.id, s.slug, s.title, s.image,
           a.title AS artist_title, a.slug AS artist_slug,
           g.title AS genre_title,  g.slug AS genre_slug
    FROM singles s
    JOIN artists a ON a.id = s.artist_id
    LEFT JOIN genres g ON g.id = s.genre_id
    WHERE a.slug = ?
    ORDER BY s.title
  SQL;
  $stmt = $connection->prepare($sql);
  $stmt->bind_param('s', $second);
  $stmt->execute();
  $result = $stmt->get_result();

  require_once __DIR__ . '/../views/overview.php';
  require_once __DIR__ . '/../views/footer.php';
  exit;
}

// /genre/{slug}
if ($first === 'genre' && $second) {
  $pageTitle = 'Music Library · Genre';
  $heading   = 'Genre singles';
  $sql = <<<SQL
    SELECT s.id, s.slug, s.title, s.image,
           a.title AS artist_title, a.slug AS artist_slug,
           g.title AS genre_title,  g.slug AS genre_slug
    FROM singles s
    LEFT JOIN artists a ON a.id = s.artist_id
    JOIN genres g ON g.id = s.genre_id
    WHERE g.slug = ?
    ORDER BY s.title
  SQL;
  $stmt = $connection->prepare($sql);
  $stmt->bind_param('s', $second);
  $stmt->execute();
  $result = $stmt->get_result();

  require_once __DIR__ . '/../views/overview.php';
  require_once __DIR__ . '/../views/footer.php';
  exit;
}

// default: overzicht
$pageTitle = 'Music Library · Overzicht';
$heading   = 'Overzicht';
$sql = <<<SQL
  SELECT s.id, s.slug, s.title, s.image,
         a.title AS artist_title, a.slug AS artist_slug,
         g.title AS genre_title,  g.slug AS genre_slug
  FROM singles s
  LEFT JOIN artists a ON a.id = s.artist_id
  LEFT JOIN genres  g ON g.id = s.genre_id
  ORDER BY s.title
SQL;
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

require_once __DIR__ . '/../views/overview.php';
require_once __DIR__ . '/../views/footer.php';
