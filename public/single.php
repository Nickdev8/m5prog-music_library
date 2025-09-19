<?php
// public/single.php
require_once __DIR__ . '/../views/data.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === null || $id === false || !isset($library[$id])) {
  // Voorbeeld van beëindiging van script met bericht:
  exit('<!doctype html><meta charset="utf-8"><p style="font-family:system-ui">Item niet gevonden.</p>');
}
$item = $library[$id];

$pageTitle = 'Music Library · ' . $item['title'];
require_once __DIR__ . '/../views/header.php';
?>

<article class="col-lg-8 mx-auto">
  <h2 class="mb-3"><?= htmlspecialchars($item['title']) ?></h2>
  <p class="lead mb-1"><strong>Artist:</strong> <?= htmlspecialchars($item['artist']) ?></p>
  <p class="text-muted"><strong>Year:</strong> <?= htmlspecialchars($item['year']) ?></p>

  <hr>
  <h3 class="h5">Loop voorbeelden</h3>
  <ul class="small">
    <?php
    // while: tel tot 3
    $n = 1;
    while ($n <= 3) { echo "<li>while #{$n}</li>"; $n++; }

    // do..while: wordt minimaal 1x uitgevoerd
    $m = 0;
    do { echo "<li>do..while #{$m}</li>"; $m++; } while ($m < 1);

    // for: drie iteraties
    for ($i = 0; $i < 3; $i++) { echo "<li>for #{$i}</li>"; }

    // foreach: voorbeeld op basis van $library (alleen eerste 3)
    $count = 0;
    foreach ($library as $row) {
      if ($count === 1) { $count++; continue; } // sla één item over
      echo "<li>foreach: " . htmlspecialchars($row['title']) . "</li>";
      $count++;
      if ($count >= 3) break; // stop vroegtijdig
    }
    ?>
  </ul>
</article>

<?php require_once __DIR__ . '/../views/footer.php'; ?>
