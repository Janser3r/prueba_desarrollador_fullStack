<?php
declare(strict_types=1);

/**
 * Controlador para gestionar usuarios.
 * Método principal: obtenerRecientes() -> usuarios creados en los últimos 30 días.
 */
final class UsuariosController {
    public function __construct(private PDO $db) {}

    public function obtenerRecientes(): array {
        // Calcula la fecha límite (30 días atrás)
        $umbral = (new DateTimeImmutable('now'))
                    ->sub(new DateInterval('P30D'))
                    ->format('Y-m-d H:i:s');

        $sql = "SELECT id, nombre, email, fecha_registro
                FROM usuarios
                WHERE fecha_registro >= :umbral
                ORDER BY fecha_registro DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':umbral' => $umbral]);

        $usuarios = $stmt->fetchAll();

        // Asegura que el id sea entero
        foreach ($usuarios as &$usuario) {
            $usuario['id'] = (int)$usuario['id'];
        }

        return $usuarios;
    }
}
