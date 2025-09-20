<?php
// Active class helper
$current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$old = isset($_GET['searchquery']) ? htmlspecialchars($_GET['searchquery']) : '';
?>
<nav class="nav gap-3 align-items-center">
  <a class="nav-link text-white <?= $current === '' ? 'fw-bold' : '' ?>" href="/">Home</a>
  <a class="nav-link text-white <?= $current === 'about.php' ? 'fw-bold' : '' ?>" href="/about.php">About</a>

  <form class="d-flex ms-3" role="search" action="/search.php" method="get">
    <input class="form-control form-control-sm me-2"
           type="search"
           placeholder="Search singles…"
           aria-label="Search"
           name="searchquery"
           value="<?= $old ?>">
    <button class="btn btn-sm btn-outline-light" type="submit">Search</button>
  </form>
</nav>
