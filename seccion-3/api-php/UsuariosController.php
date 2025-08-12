<?php
declare(strict_types=1);

final class UsuariosController {
    public function __construct(private PDO $db) {}

    /**
     * Devuelve usuarios registrados en los últimos 30 días.
     */
    public function recientes(): array {
        $cutoff = (new DateTimeImmutable('now'))
            ->sub(new DateInterval('P30D'))
            ->format('Y-m-d H:i:s');

        $sql = "SELECT id, nombre, email, fecha_registro
                FROM usuarios
                WHERE fecha_registro >= :cutoff
                ORDER BY fecha_registro DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':cutoff' => $cutoff]);
        $rows = $stmt->fetchAll();

        foreach ($rows as &$r) {
            $r['id'] = (int)$r['id'];
        }
        return $rows;
    }
}

