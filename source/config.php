<?php
/**
 * Display all errors
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Parse .env (staat in projectroot)
 */
$env_path = dirname(__DIR__) . '/.env';
$env_array = is_file($env_path) ? parse_ini_file($env_path) : [];

/**
 * Constants vanuit .env (met fallbacks)
 */
define('DB_HOST',     isset($env_array['DB_HOST'])     ? $env_array['DB_HOST']     : '127.0.0.1');
define('DB_NAME',     isset($env_array['DB_NAME'])     ? $env_array['DB_NAME']     : 'music_library');
define('DB_USERNAME', isset($env_array['DB_USERNAME']) ? $env_array['DB_USERNAME'] : 'm5prog_user');
define('DB_PASSWORD', isset($env_array['DB_PASSWORD']) ? $env_array['DB_PASSWORD'] : 'wachtwoord');
