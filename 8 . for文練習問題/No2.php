<?php

$colum = 4;
for ($k = 1; $k <= $colum; $k++) {
    for ($z = $colum - $k ; $z > 0; $z--) {
        echo "*";
    }
    for ($a = 1; $a <= $k; $a++) {
        echo $a;
    }
    for ($a = $k - 1; $a >= 1; $a--) {
        echo $a;
    }
    echo "\n";
}

?>