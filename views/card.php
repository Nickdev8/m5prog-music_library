<?php /** @var array $single */ ?>
<div class="col">
  <div class="card shadow-sm h-100">
    <div class="card-img">
      <img class="card-img-top"
           src="<?= htmlspecialchars($single['image'] ?? '/assets/img/placeholder.jpg') ?>"
           alt="<?= htmlspecialchars($single['title']) ?>">
    </div>
    <div class="card-body d-flex flex-column">
      <h5 class="card-title mb-1"><?= htmlspecialchars($single['title']) ?></h5>
      <p class="card-text text-muted mb-3">
        <?= htmlspecialchars($single['artist_title'] ?? '') ?>
        <?php if (!empty($single['genre_title'])): ?>
          · <span class="badge text-bg-light"><?= htmlspecialchars($single['genre_title']) ?></span>
        <?php endif; ?>
      </p>
      <div class="mt-auto d-flex gap-2">
        <a href="/single/<?= urlencode($single['slug']) ?>"
           class="btn btn-sm btn-outline-secondary">Bekijk</a>
      </div>
    </div>
  </div>
</div>
