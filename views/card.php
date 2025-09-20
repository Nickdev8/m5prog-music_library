<?php /** @var array $single */ ?>
<div class="col">
  <div class="card shadow-sm h-100">
    <div class="card-img">
      <img class="card-img-top"
           src="<?= htmlspecialchars($single['image'] ?? '/assets/img/placeholder.jpg') ?>"
           alt="<?= htmlspecialchars($single['title']) ?>">
    </div>
    <div class="card-body d-flex flex-column">
      <h5 class="card-title mb-1">
        <a href="/single/<?= urlencode($single['slug']) ?>">
          <?= htmlspecialchars($single['title']) ?>
        </a>
      </h5>
      <p class="card-text text-muted mb-3">
        <?php if (!empty($single['artist_title'])) : ?>
          <a href="/artist/<?= urlencode($single['artist_slug']) ?>">
            <?= htmlspecialchars($single['artist_title']) ?>
          </a>
        <?php endif; ?>
        <?php if (!empty($single['genre_title'])) : ?>
          · <a href="/genre/<?= urlencode($single['genre_slug']) ?>">
              <?= htmlspecialchars($single['genre_title']) ?>
            </a>
        <?php endif; ?>
      </p>
      <div class="mt-auto">
        <a href="/single/<?= urlencode($single['slug']) ?>" class="btn btn-sm btn-outline-secondary w-100">Bekijk</a>
      </div>
    </div>
  </div>
</div>
