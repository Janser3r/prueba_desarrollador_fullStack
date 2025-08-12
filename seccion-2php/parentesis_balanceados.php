<?php
/**
 * Comprueba si una cadena tiene paréntesis balanceados.
 * - Solo evalúa '(' y ')'.
 * - El contador nunca debe ser negativo.
 * - Al final, el contador debe quedar en 0 para que estén balanceados.
 */
function parentesisBalanceados(string $texto): bool {
    $contador = 0;
    $longitud = mb_strlen($texto);

    for ($i = 0; $i < $longitud; $i++) {
        $car = mb_substr($texto, $i, 1);

        if ($car === '(') {
            $contador++;
        } elseif ($car === ')') {
            // Si cierra más de lo que abrió, está desbalanceado
            if ($contador === 0) return false;
            $contador--;
        }
    }

    // Solo está balanceado si termina en 0
    return $contador === 0;
}
