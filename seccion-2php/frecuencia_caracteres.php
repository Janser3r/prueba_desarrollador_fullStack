<?php
/**
 * Calcula la frecuencia de cada letra en una cadena.
 * - Pasa todo a minúsculas para uniformidad.
 * - Solo cuenta letras (ignora espacios, números y símbolos).
 * - Devuelve un array asociativo: letra => cantidad.
 */
function frecuenciaLetras(string $texto): array {
    $frecuencias = [];
    $texto = mb_strtolower($texto);
    $longitud = mb_strlen($texto);

    for ($i = 0; $i < $longitud; $i++) {
        $car = mb_substr($texto, $i, 1);
        if (preg_match('/[a-záéíóúüñ]/u', $car)) {
            // Incrementa el contador de esa letra
            $frecuencias[$car] = ($frecuencias[$car] ?? 0) + 1;
        }
    }

    return $frecuencias;
}
