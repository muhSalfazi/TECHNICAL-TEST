<?php
function countWords($input, $query) {
    $result = [];
    foreach ($query as $q) {
        $result[] = count(array_keys($input, $q));
    }
    return $result;
}
$input = ['xc', 'dz', 'bbb', 'dz'];
$query = ['bbb', 'ac', 'dz'];
print_r(countWords($input, $query));  // Output: [1, 0, 2]
