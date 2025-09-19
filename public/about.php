<?php
// public/about.php
$pageTitle = 'Music Library · About';
require_once __DIR__ . '/../views/header.php';
?>

<section class="col-lg-8 mx-auto">
  <h2 class="mb-3">Over deze site</h2>
  <p class="lead">Deze site is onderdeel van M5PROG – we bouwen een MVC-app met PHP.</p>

  <h3 class="h5 mt-4">PHP basics (strings & quotes)</h3>
  <pre class="bg-light p-3 rounded small"><?php
    $name = 'John';
    $single = 'literal text for $name';  // toont letterlijk $name
    $double = "literal text for $name";  // variabele wordt geïnterpoleerd

    echo "\$single: {$single}\n";
    echo "\$double: {$double}\n";
    echo "Escapes: I\'m not crazy!\n";
    echo "Newline\\n, tab\\t en \$-teken werken in \"double quotes\".\n";
  ?></pre>
</section>

<?php require_once __DIR__ . '/../views/footer.php'; ?>
