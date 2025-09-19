<?php
// public/index.php
// Simpele homepage met Bootstrap en een grid (album) voor demo content.
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Music Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS (CDN) -->
    <!-- zie: https://getbootstrap.com/docs/5.3/getting-started/introduction/ -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">

    <!-- Eigen stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header class="py-3 border-bottom bg-white">
        <div class="container d-flex flex-wrap align-items-center justify-content-between">
            <h1 class="h4 m-0">Music Library</h1>
            <nav class="nav gap-3">
                <a class="nav-link p-0 link-secondary" href="#">Home</a>
                <a class="nav-link p-0 link-secondary" href="#">Artists</a>
                <a class="nav-link p-0 link-secondary" href="#">Albums</a>
                <a class="btn btn-primary btn-sm" href="#">Add item</a>
            </nav>
        </div>
    </header>

    <main class="container my-5">
        <div class="album py-5 bg-light rounded-3">
            <div class="container">
                <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                    <!-- Demo cards -->
                    <?php
                    // Simpele demo data (client-side zou ook mogen, maar we houden het hier in PHP voor nu)
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
                                        <a href="#" class="btn btn-sm btn-outline-primary">View</a>
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
            ⓘ Dit is demo content. Vervang dit later door echte data uit je database.
        </div>
    </footer>

    <!-- Bootstrap JS (CDN) -->
    <!-- zie: https://getbootstrap.com/docs/5.3/getting-started/introduction/ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
</body>
</html>
