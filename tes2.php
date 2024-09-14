<?php
function longestWord($sentence) {
    $words = explode(' ', $sentence);
    $longest = '';
    foreach ($words as $word) {
        if (strlen($word) > strlen($longest)) {
            $longest = $word;
        }
    }
    return $longest . ': ' . strlen($longest) . ' karakter';
}
echo longestWord("Saya sangat senang mengerjakan soal algoritma");
