<?php // views/single.php ?>
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

  <a class="btn btn-outline-secondary" href="/">← Terug naar overzicht</a>
</article>
