<?php
// Zorg dat PAGE_TITLE altijd gezet is
$pageTitle = defined('PAGE_TITLE') ? PAGE_TITLE : 'Music Library';
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
<header class="bg-dark text-white shadow-sm">
  <div class="container d-flex flex-wrap align-items-center justify-content-between py-2">
    <a href="/" class="navbar-brand text-white text-decoration-none">
      Music Library
    </a>
    <?php require_once __DIR__ . '/navigation.php'; ?>
  </div>
</header>
<main>
