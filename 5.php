<?php

function createTriangle($start, $end) {
    $jumlah_angka_genap = 0;

    $temp = [];
    for ($i=1; $i <= $end; $i++) { 
        if ($i % 2 == 0) {
            $jumlah_angka_genap++;
            array_push($temp, $i);
        }
    }

    echo $jumlah_angka_genap;

    $temp2 = array_reverse($temp);
    $temp3 = [];
    $i=0;
    foreach ($temp2 as $value) {
        $temp3[$temp[$i]] = $value;
        $i++;
    }
    // var_dump($temp);
    // var_dump($temp3);
    echo "<pre>";
    for ($i=$end; $i > 1; $i--) { 
        for ($j=$end; $j > 1; $j--) { 
            if ($i%2 == 0 && $j%2 == 0) {
                if ((($i+$j)-2) > $end) {
                    echo "&nbsp;&nbsp;&nbsp;";
                } else {
                    echo strlen($temp3[(($i+$j)-2)]) < 2 ? "&nbsp;&nbsp;".$temp3[(($i+$j)-2)] : "&nbsp;&nbsp;".$temp3[(($i+$j)-2)];
                }
            }
        }
        echo "<br>";
    }
    echo "</pre>";
}

createTriangle(10, 20);