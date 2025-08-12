<?php
function balancedParentheses($str) {
    $count = 0;
    $len = mb_strlen((string)$str);
    for ($i = 0; $i < $len; $i++) {
        $ch = mb_substr($str, $i, 1);
        if ($ch === '(') $count++;
        elseif ($ch === ')') {
            $count--;
            if ($count < 0) return false;
        }
    }
    return $count === 0;
}

