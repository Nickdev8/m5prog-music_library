<?php
// public/index.php
$pageTitle = 'Music Library · Home';
require_once __DIR__ . '/../views/data.php';    // data
require_once __DIR__ . '/../views/header.php';  // <head> + <header> + <main> open
?>

<section class="mb-4">
  <h2 class="h4">Overzicht (<?= $total ?> items)</h2>
  <p class="text-muted">Voorbeeld van een <code>foreach</code>-loop die kaarten rendert.</p>
</section>

<div class="album py-5 bg-light rounded-3">
  <div class="container">
    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
      <?php foreach ($library as $i => $item): ?>
        <div class="col">
          <div class="card shadow-sm h-100">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
                 role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Cover</title>
              <rect width="100%" height="100%"></rect>
              <text x="50%" y="50%" dy=".3em" text-anchor="middle" class="text-light">
                <?= htmlspecialchars($item['year']) ?>
              </text>
            </svg>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title mb-1"><?= htmlspecialchars($item['title']) ?></h5>
              <p class="card-text text-muted mb-3"><?= htmlspecialchars($item['artist']) ?></p>
              <div class="mt-auto d-flex gap-2">
                <a href="/single.php?id=<?= $i ?>" class="btn btn-sm btn-outline-primary">View</a>
                <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../views/footer.php'; ?>
