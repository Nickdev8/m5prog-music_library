<?php
// views/navigation.php
$current = basename($_SERVER['SCRIPT_NAME']);
$active = fn($file) => $file === $current ? 'active' : '';
?>
<nav class="nav gap-3">
  <a class="nav-link p-0 link-secondary <?= $active('index.php') ?>" href="/index.php">Home</a>
  <a class="nav-link p-0 link-secondary <?= $active('single.php') ?>" href="/single.php">Single</a>
  <a class="nav-link p-0 link-secondary <?= $active('about.php') ?>" href="/about.php">About</a>
  <a class="btn btn-primary btn-sm" href="#">Add item</a>
</nav>
