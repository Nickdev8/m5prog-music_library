<?php
// Simple sanity check page
$pdo = null;
$db_status = "not connected";
try {
    $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", getenv('DB_HOST') ?: 'mariadb', getenv('DB_NAME') ?: '');
    $pdo = new PDO($dsn, getenv('DB_USERNAME') ?: '', getenv('DB_PASSWORD') ?: '');
    $db_status = "connected";
} catch (Throwable $e) {
    $db_status = "error: " . $e->getMessage();
}
?>
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>m5prog-music_library</title>
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; margin: 2rem; }
    code { background: #f4f4f4; padding: 0.25rem 0.5rem; border-radius: 4px; }
    .ok { color: #1a7f37; }
    .warn { color: #b54708; }
    .err { color: #b42318; }
  </style>
</head>
<body>
  <h1>It works! 🎉</h1>
  <p>Dit is de <code>public/index.php</code> van je Docker omgeving.</p>
  <ul>
    <li>Nginx → PHP-FPM: <span class="ok">OK</span></li>
    <li>Database status: <span class="<?php echo strpos($db_status,'connected')!==false ? 'ok' : (strpos($db_status,'error')!==false ? 'err' : 'warn'); ?>"><?php echo htmlspecialchars($db_status, ENT_QUOTES, 'UTF-8'); ?></span></li>
  </ul>
  <p>Bewerk deze pagina of bouw je app verder uit in <code>/var/www/html</code> (lokaal: projectroot).</p>
</body>
</html>
