<?php
declare(strict_types=1);

require __DIR__ . '/db.php';
require __DIR__ . '/UsuariosController.php';

set_exception_handler(function(Throwable $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'ok' => false,
        'error' => 'Internal Server Error',
        'detail' => getenv('APP_DEBUG') ? $e->getMessage() : null
    ], JSON_UNESCAPED_UNICODE);
});

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $path === '/usuarios/recientes') {
    header('Content-Type: application/json; charset=utf-8');
    $controller = new UsuariosController(db());
    echo json_encode(['ok' => true, 'data' => $controller->recientes()], JSON_UNESCAPED_UNICODE);
    exit;
}

http_response_code(404);
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['ok' => false, 'error' => 'Not Found']);
