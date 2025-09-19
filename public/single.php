<?php
$current = basename($_SERVER['SCRIPT_NAME']);
function navActive($file, $current) { return $file === $current ? 'active' : ''; }
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Music Library · Single</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </nav>
  </div>
</header>

<main class="container my-5">
  <article class="col-lg-8 mx-auto">
    <h2 class="mb-3">Detailpagina (Single)</h2>
    <p class="lead">Hier komt straks de detailinformatie van een album/track/artist uit de database.</p>
    <hr>
    <p>Voor nu is dit statische demo-tekst zodat je de navigatie en layout kunt controleren.</p>
  </article>
</main>

<footer class="py-4 border-top">
  <div class="container text-muted small">Single page footer</div>
</footer>

<script src="/dist/js/main.js"></script>
</body>
</html>
