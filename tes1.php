<?php
function reverseString($input) {
    $letters = preg_replace('/[^a-zA-Z]/', '', $input);
    $number = preg_replace('/[^0-9]/', '', $input);
    return strrev($letters) . $number;
}
echo reverseString("NEGIE1");  // Output: "EIGEN1"
