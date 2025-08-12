<?php
declare(strict_types=1);

require __DIR__ . '/db.php';
require __DIR__ . '/UsuariosController.php';

/**
 * Router mínimo para manejar solicitudes.
 * Por ahora solo implementa:
 *   GET /usuarios/recientes
 */

// Manejo global de errores
set_exception_handler(function(Throwable $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');

    $detalle = getenv('APP_DEBUG') ? $e->getMessage() : 'Error interno';
    echo json_encode(['ok' => false, 'error' => $detalle], JSON_UNESCAPED_UNICODE);
});

$ruta = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $ruta === '/usuarios/recientes') {
    header('Content-Type: application/json; charset=utf-8');
    $controller = new UsuariosController(db());
    echo json_encode(['ok' => true, 'data' => $controller->obtenerRecientes()], JSON_UNESCAPED_UNICODE);
    exit;
}

// Si la ruta no coincide, devuelve 404
http_response_code(404);
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['ok' => false, 'error' => 'No encontrado']);
