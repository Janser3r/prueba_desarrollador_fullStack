<?php
/**
 * Devuelve un array con la secuencia FizzBuzz del 1 al 100.
 * - Si es múltiplo de 3, devuelve "Fizz".
 * - Si es múltiplo de 5, devuelve "Buzz".
 * - Si es múltiplo de 3 y 5, devuelve "FizzBuzz".
 * - Si no cumple ninguna condición, devuelve el número.
 */
function fizzBuzz(): array {
    $resultado = [];

    for ($i = 1; $i <= 100; $i++) {
        $salida = '';

        if ($i % 3 === 0) $salida .= 'Fizz';
        if ($i % 5 === 0) $salida .= 'Buzz';

        $resultado[] = $salida !== '' ? $salida : $i;
    }

    return $resultado;
}
