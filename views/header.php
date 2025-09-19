<?php
// views/header.php
// $pageTitle kan per pagina gezet worden vóór het includen.
if (!isset($pageTitle)) $pageTitle = 'Music Library';
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Gecompileerde CSS (Webpack/Sass) -->
  <link href="/dist/css/main.min.css" rel="stylesheet">
</head>
<body>
<header class="py-3 border-bottom bg-white">
  <div class="container d-flex flex-wrap align-items-center justify-content-between">
    <h1 class="h4 m-0">Music Library</h1>
    <?php require_once __DIR__ . '/navigation.php'; ?>
  </div>
</header>
<main class="container my-5">
