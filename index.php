<?php

// --------------------------------------------------------------
// Catat timer awal (untuk benchmark)
// --------------------------------------------------------------
define('RAKIT_START', microtime(true));

// --------------------------------------------------------------
// Definisikan konstanta untuk directory separator.
// --------------------------------------------------------------
define('DS', DIRECTORY_SEPARATOR);

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// --------------------------------------------------------------
// Include konstanta path milik framework.
// --------------------------------------------------------------
require __DIR__ . DS . 'paths.php';

// --------------------------------------------------------------
// Jalankan frameworknya.
// --------------------------------------------------------------
require path('system') . 'boot.php';
