<?php
function charFrequency($str) {
    $freq = [];
    $str = mb_strtolower((string)$str);
    $len = mb_strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $ch = mb_substr($str, $i, 1);
        if (preg_match('/[\p{L}]/u', $ch)) {
            $freq[$ch] = ($freq[$ch] ?? 0) + 1;
        }
    }
    return $freq;
}

