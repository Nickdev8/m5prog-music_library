<?php
// public/index.php
$current = basename($_SERVER['SCRIPT_NAME']);
function navActive($file, $current) { return $file === $current ? 'active' : ''; }
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Music Library · Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Gecompileerde CSS uit Webpack (komt in public/dist/css/main.min.css) -->
  <link href="/dist/css/main.min.css" rel="stylesheet">
</head>
<body>
<header class="py-3 border-bottom bg-white">
  <div class="container d-flex flex-wrap align-items-center justify-content-between">
    <h1 class="h4 m-0">Music Library</h1>
    <nav class="nav gap-3">
      <a class="nav-link p-0 link-secondary <?= navActive('index.php',$current) ?>" href="/index.php">Home</a>
      <a class="nav-link p-0 link-secondary <?= navActive('single.php',$current) ?>" href="/single.php">Single</a>
      <a class="nav-link p-0 link-secondary <?= navActive('about.php',$current) ?>" href="/about.php">About</a>
      <a class="btn btn-primary btn-sm" href="#">Add item</a>
    </nav>
  </div>
</header>

<main class="container my-5">
  <div class="album py-5 bg-light rounded-3">
    <div class="container">
      <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
        <?php
          $demo = [
            ['title' => 'Random Access Memories', 'artist' => 'Daft Punk'],
            ['title' => 'In Rainbows', 'artist' => 'Radiohead'],
            ['title' => 'Discovery', 'artist' => 'Daft Punk'],
            ['title' => 'Kind of Blue', 'artist' => 'Miles Davis'],
            ['title' => 'The Dark Side of the Moon', 'artist' => 'Pink Floyd'],
            ['title' => 'To Pimp a Butterfly', 'artist' => 'Kendrick Lamar'],
          ];
          foreach ($demo as $d): ?>
          <div class="col">
            <div class="card shadow-sm h-100">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
                   role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Cover</title>
                <rect width="100%" height="100%"></rect>
                <text x="50%" y="50%" dy=".3em" text-anchor="middle" class="text-light">Album cover</text>
              </svg>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-1"><?= htmlspecialchars($d['title']) ?></h5>
                <p class="card-text text-muted mb-3"><?= htmlspecialchars($d['artist']) ?></p>
                <div class="mt-auto d-flex gap-2">
                  <a href="/single.php" class="btn btn-sm btn-outline-primary">View</a>
                  <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>

<footer class="py-4 border-top">
  <div class="container text-muted small">
    ⓘ Demo content — vervang later door echte data uit je database.
  </div>
</footer>

<!-- Gecompileerde JS uit Webpack (komt in public/dist/js/main.js) -->
<script src="/dist/js/main.js"></script>
</body>
</html>
