<?php
declare(strict_types=1);

/**
 * Devuelve una conexión PDO.
 * - Si no hay variables de entorno, usa SQLite por defecto.
 * - Configura el modo de error y el fetch mode.
 */
function db(): PDO {
    $dsn  = getenv('DB_DSN') ?: 'sqlite:' . __DIR__ . '/database.sqlite';
    $user = getenv('DB_USER') ?: null;
    $pass = getenv('DB_PASS') ?: null;

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lanza excepciones en errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devuelve resultados como array asociativo
        PDO::ATTR_EMULATE_PREPARES => false, // Usa consultas preparadas reales
    ]);

    return $pdo;
}
