<article class="col-lg-8 mx-auto mt-5">
  <div class="row">
    <div class="col-md-4">
      <figure class="mb-4">
        <img class="img-fluid rounded"
             src="<?= htmlspecialchars($single['image'] ?? '/assets/img/placeholder.jpg') ?>"
             alt="<?= htmlspecialchars($single['title']) ?>">
      </figure>
    </div>
    <div class="col-md-8">
      <h2 class="mb-3"><?= htmlspecialchars($single['title']) ?></h2>
      <figcaption class="text-muted mt-2 small lead mb-4">
        <?= htmlspecialchars($single['artist_title'] ?? 'Onbekende artiest') ?>
        <?php if (!empty($single['genre_title'])): ?>
          · <?= htmlspecialchars($single['genre_title']) ?>
        <?php endif; ?>
      </figcaption>
      <?php if (!empty($single['description'])): ?>
        <div class="mt-3">
          <p><?= nl2br(htmlspecialchars($single['description'])) ?></p>
        </div>
      <?php endif; ?>
      <a class="btn btn-outline-secondary" href="/index.php">← Terug naar overzicht</a>
      <p class="mt-3 text-danger"><strong>All MetaData was genarated by ChatGPT</strong></p>
    </div>
  </div>
</article>