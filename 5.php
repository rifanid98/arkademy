<?php

function createTriangle($start, $end) {
    // kalo $end lebih besar dari $start, lanjutkan
    if ($end >= $start) {
        // cari angka genap antara angka $start sampai angka $end
        $temp = [];
        for ($i=$start; $i <= $end; $i++) { 
            if ($i%2 == 0) {
                array_push($temp, $i);
            }
        }

        /**
         * debuging
         */
        // echo 'Before reversed ';
        // var_dump($temp);
        
        // $temp = array_reverse($temp);
        // echo 'After reversed ';
        // var_dump($temp);
        // echo "<br>";
        
        // create a new array keys
        $newArrayKeys = [];
        $tempArrayKey = 0;
        // count($temp) total dari angka genap yang didapat
        for ($i=0; $i < count($temp); $i++) { 
            for ($j=0; $j < count($temp); $j++) { 
                // ambil key yang jika $i dan $j dijumlahkan, hasilnya lebih banyak dari count($temp)
                if ($i+$j >= count($temp)-1) {
                    // cek, $tempArrayKey dengan hasil jumlah $i+$j itu sama apa tidak
                    if ( $tempArrayKey != ($i+$j)) {
                        // kalo tidak sama, yowes, masukin deh ke $tempArrayKey
                        $tempArrayKey = ($i+$j);
                        // cek dulu, $tempArrayKey ini ada gak di $newArrayKeys
                        if ( !in_array(($i+$j), $newArrayKeys) ) {
                            // kalo gaada, masukin deh, jadi key baru
                            array_push($newArrayKeys, $tempArrayKey);
                        }
                    }
                }
            }
        }

        /**
         * debuging
         */
        // var_dump($newArrayKeys);
        // echo "<br>";
        
        // tadikan baru bikin keynya, sekarang isi valuenya
        // set new array with the new keys was created
        $newArrayWithNewKeys = [];
        for ($i=0; $i < count($temp); $i++) { 
            if (count($temp) > 1) {
                $newArrayWithNewKeys[$newArrayKeys[$i]] = $temp[$i];
            } else {
                // if $temp only have one element
                $newArrayWithNewKeys[] = $temp[$i];
            }
        }

        /**
         * debuging */
        // var_dump($newArrayWithNewKeys);
        // echo "<br>";
        // echo "<br>";

        // yeay, array siap untuk ditampilkan
        for ($i=0; $i < count($temp); $i++) { 
            for ($j=0; $j < count($temp); $j++) { 
                if ($i+$j < count($temp)-1) {
                    echo "   ";
                } else {
                    if (count($temp) > 1) {
                        // ternary condition, supaya lebih rapih codenya
                        echo strlen( $newArrayWithNewKeys[ ( $i+$j ) ] ) < 2 ? '  '.$newArrayWithNewKeys[ ( $i+$j ) ] : ' '.$newArrayWithNewKeys[ ( $i+$j ) ];
                    } else {
                        // if $temp only have one element
                        echo $newArrayWithNewKeys[ ( $i+$j ) ];
                    }
                }
            }
            echo "<br>";
        }
    } else {
        echo "Angka pertama harus lebih kecil dari atau sama dengan angka kedua";
    }
}

echo "<pre>";
createTriangle(2, 10);
echo "</pre>";