<?php

    for ($k = 1; $k <= 9; $k++) {
        for ($z = 1; $z <= 9; $z++) {
            if ($z != 9) {
                echo $z * $k;
            } else {
                echo $z * $k . "\n";
            }
        }
    }

?>