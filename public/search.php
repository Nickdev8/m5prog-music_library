<?php
define('PAGE_TITLE', 'Zoekresultaten');
require_once __DIR__ . '/../source/database.php';
require_once __DIR__ . '/../views/header.php';

$zoekterm = isset($_GET['searchquery']) ? trim($_GET['searchquery']) : '';
?>
<main class="container my-5">
  <h2 class="h4">Je zocht op: <code><?= htmlspecialchars($zoekterm) ?></code></h2>

  <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 mt-3">
    <?php
    if ($zoekterm !== '') {
      $sql = <<<SQL
      SELECT s.id, s.slug, s.title, s.image,
             a.title AS artist_title, a.slug AS artist_slug,
             g.title AS genre_title,  g.slug AS genre_slug
      FROM singles s
      LEFT JOIN artists a ON a.id = s.artist_id
      LEFT JOIN genres  g ON g.id = s.genre_id
      WHERE s.title LIKE ?
      ORDER BY s.title
      SQL;

      $stmt = $connection->prepare($sql);
      $param = '%' . $zoekterm . '%';
      $stmt->bind_param('s', $param);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($single = mysqli_fetch_assoc($result)) {
        include __DIR__ . '/../views/card.php';
      }
    } else {
      echo '<p class="text-muted">Typ iets in het zoekveld en verzend.</p>';
    }
    ?>
  </div>
</main>
<?php require_once __DIR__ . '/../views/footer.php'; ?>
