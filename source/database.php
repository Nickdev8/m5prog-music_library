<?php
require_once __DIR__ . '/config.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // duidelijke errors
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$connection->set_charset('utf8mb4');
