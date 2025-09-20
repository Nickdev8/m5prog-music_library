<?php
// Veilig de GET-parameter ophalen
if (!isset($_GET['single'])) {
    die('Geen single gevonden');
}
$single_id = filter_input(INPUT_GET, 'single', FILTER_VALIDATE_INT);
if ($single_id === null || $single_id === false) {
    die('Ongeldige single id');
}

require_once __DIR__ . '/../source/database.php';

// Eén item ophalen via prepared + bind
$query = <<<SQL
SELECT s.*,
       a.title AS artist_title,
       g.title AS genre_title
FROM singles s
LEFT JOIN artists a ON a.id = s.artist_id
LEFT JOIN genres  g ON g.id = s.genre_id
WHERE s.id = ?
SQL;

$stmt = $connection->prepare($query);
$stmt->bind_param('i', $single_id);   // i = integer
$stmt->execute();
$result = $stmt->get_result();

$single = mysqli_fetch_assoc($result);
if (!$single) {
    die('Single niet gevonden');
}

$pageTitle = 'Music Library · ' . $single['title'];
require_once __DIR__ . '/../views/header.php';
?>

<article class="col-lg-8 mx-auto">
  <h2 class="mb-3"><?= htmlspecialchars($single['title']) ?></h2>

  <figure class="mb-4">
    <img class="img-fluid rounded"
         src="<?= htmlspecialchars($single['image'] ?? '/assets/img/placeholder.jpg') ?>"
         alt="<?= htmlspecialchars($single['title']) ?>">
    <figcaption class="text-muted mt-2 small">
      <?= htmlspecialchars($single['artist_title'] ?? 'Onbekende artiest') ?>
      <?php if (!empty($single['genre_title'])): ?>
        · <?= htmlspecialchars($single['genre_title']) ?>
      <?php endif; ?>
    </figcaption>
  </figure>

  <p>Hier kun je extra metadata of beschrijving tonen.</p>
  <a class="btn btn-outline-secondary" href="/index.php">← Terug naar overzicht</a>
</article>

<?php require_once __DIR__ . '/../views/footer.php'; ?>
