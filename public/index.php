<?php
$pageTitle = 'Music Library · Home';

// DB verbinden
require_once __DIR__ . '/../source/database.php';

// Query met LEFT JOINs (toon ook artiest & genre)
$query = <<<SQL
SELECT s.id, s.title, s.image,
       a.title AS artist_title,
       g.title AS genre_title
FROM singles s
LEFT JOIN artists a ON a.id = s.artist_id
LEFT JOIN genres  g ON g.id = s.genre_id
ORDER BY s.title
SQL;

$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

require_once __DIR__ . '/../views/header.php';
?>

<section class="mb-4">
  <h2 class="h4">Overzicht</h2>
  <p class="text-muted">Data uit de database, gerenderd als kaarten.</p>
</section>

<div class="album py-5 bg-light rounded-3">
  <div class="container">
    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
      <?php while ($single = mysqli_fetch_assoc($result)) : ?>
        <?php include __DIR__ . '/../views/card.php'; ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../views/footer.php'; ?>
