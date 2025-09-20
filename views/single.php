<figcaption class="text-muted mt-2 small">
  <?php if (!empty($single['artist_title'])): ?>
    <a href="/artist/<?= urlencode($single['artist_slug']) ?>">
      <?= htmlspecialchars($single['artist_title']) ?>
    </a>
  <?php endif; ?>
  <?php if (!empty($single['genre_title'])): ?>
    · <a href="/genre/<?= urlencode($single['genre_slug']) ?>">
        <?= htmlspecialchars($single['genre_title']) ?>
      </a>
  <?php endif; ?>
</figcaption>
