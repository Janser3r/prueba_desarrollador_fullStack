<?php
function longestWord($str) {
    if (!is_string($str)) return "";
    preg_match_all('/[\p{L}\p{N}]+/u', mb_strtolower($str), $matches);
    $best = "";
    foreach ($matches[0] as $word) {
        if (mb_strlen($word) > mb_strlen($best)) {
            $best = $word;
        }
    }
    return $best;
}
