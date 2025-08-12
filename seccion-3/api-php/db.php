<?php
declare(strict_types=1);

/**
 * Retorna conexión PDO.
 * Usa variables de entorno DB_DSN, DB_USER, DB_PASS.
 * Por defecto, usa SQLite `database.sqlite` en la misma carpeta.
 */
function db(): PDO {
    $dsn = getenv('DB_DSN') ?: 'sqlite:' . __DIR__ . '/database.sqlite';
    $user = getenv('DB_USER') ?: null;
    $pass = getenv('DB_PASS') ?: null;

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    return $pdo;
}
