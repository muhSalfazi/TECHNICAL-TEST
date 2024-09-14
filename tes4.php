<?php
function diagonalDifference($matrix) {
    $n = count($matrix);
    $primaryDiagonal = 0;
    $secondaryDiagonal = 0;

    for ($i = 0; $i < $n; $i++) {
        $primaryDiagonal += $matrix[$i][$i];
        $secondaryDiagonal += $matrix[$i][$n - $i - 1];
    }

    return abs($primaryDiagonal - $secondaryDiagonal);
}
$matrix = [[1, 2, 0], [4, 5, 6], [7, 8, 9]];
echo diagonalDifference($matrix);  // Output: 3
