<?php

$abouts = ['材料について', 'こだわりについて', '美味しさの秘訣について'];
foreach ($abouts as $a) {
    if (isset($about) && $about == $a) {
        echo "<input type='radio' name='about' value='{$a}' checked> $a" . "<br>";
    } else {
        echo "<input type='radio' name='about' value='{$a}'> $a" . "<br>";
    }
}

?>        
