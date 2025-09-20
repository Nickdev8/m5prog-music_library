<?php // views/overview.php ?>
<section class="mb-4">
  <!-- <h2 class="h4"><?= htmlspecialchars($heading ?? 'Overzicht') ?></h2> -->
</section>
<div class="album py-5 bg-light rounded-3">
  <div class="container">
    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-4">
      <?php while ($single = mysqli_fetch_assoc($result)) : ?>
        <?php include __DIR__ . '/card.php'; ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>
