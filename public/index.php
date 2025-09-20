<?php
// public/index.php
require_once __DIR__ . '/../source/database.php';
require_once __DIR__ . '/../views/header.php';

// 1) URL parser: haal pad (zonder querystring)
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$segments = array_values(array_filter(explode('/', $path))); // ['single','my-slug'] of []

// 2) Routing: /single/{slug} → single view; anders → overview
$isSingle = (isset($segments[0]) && $segments[0] === 'single');
$slug = $isSingle && isset($segments[1]) ? $segments[1] : null;

if ($isSingle && $slug) {
    // ---- SINGLE ----
    $pageTitle = 'Music Library · Single';
    // Prepared statement op slug
    $sql = <<<SQL
    SELECT s.*,
           a.title AS artist_title,
           g.title AS genre_title
    FROM singles s
    LEFT JOIN artists a ON a.id = s.artist_id
    LEFT JOIN genres  g ON g.id = s.genre_id
    WHERE s.slug = ?
    LIMIT 1
    SQL;

    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $single = mysqli_fetch_assoc($result);

    if (!$single) {
        http_response_code(404);
        echo '<div class="alert alert-warning">Single niet gevonden.</div>';
        require_once __DIR__ . '/../views/footer.php';
        exit;
    }

    // Toon single view (hergebruikt je bestaande markup)
    require_once __DIR__ . '/../views/single.php';
    require_once __DIR__ . '/../views/footer.php';
    exit;
}

// ---- OVERVIEW ----
$pageTitle = 'Music Library · Overzicht';

$sql = <<<SQL
SELECT s.id, s.slug, s.title, s.image,
       a.title AS artist_title,
       g.title AS genre_title
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
