<?php
/**
 * Encuentra la palabra más larga de un texto.
 * - Convierte todo a minúsculas para comparar sin distinción de mayúsculas.
 * - Usa expresión regular sencilla para extraer palabras y números.
 * - Si hay empate, devuelve la primera palabra más larga encontrada.
 */
function palabraMasLarga(string $texto): string {
    if ($texto === '') return ''; // Si está vacío, no hay nada que procesar

    // Buscar todas las palabras (incluye acentos y dígitos)
    preg_match_all('/[A-Za-zÁÉÍÓÚÜÑáéíóúüñ0-9]+/u', mb_strtolower($texto), $coincidencias);

    $mejor = '';
    foreach ($coincidencias[0] as $palabra) {
        if (mb_strlen($palabra) > mb_strlen($mejor)) {
            $mejor = $palabra;
        }
    }
    return $mejor;
}
