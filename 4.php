<?php

function count_frasa($string, $frasa) {
    if (strlen($string) > strlen($frasa)) {
        $jumlah_frasa = 0;
        $temp_string = str_split($string);
        $temp_storage = [];
        $ending_repeat = 0;
        $i = 0;
        $j = 0;
        // ascending check
        while($i < count($temp_string)){
            // looping untuk memasukan huruf 1 per 1 ke dalam $temp_storage
            array_push($temp_storage, $temp_string[$i]);
            /**
             * debuging
             */
            // echo $i;

            // jika $temp_storage sudah diisi 4 huruf
            if (count($temp_storage) == 4) {
                // maka harus dicek . apakah huruf yang ada di $temp_storage
                // jika disusun kembali menjadi string adalah sama dengan $frasa
                if (implode("", $temp_storage) == $frasa) {
                    // jika sama, tambahkan $jumlah_frasa 1 angka
                    $jumlah_frasa += 1;
                }
                // kosongkan kembali $temp_storage
                // karna akan digunakan untuk pengecekan selanjutnya
                $temp_storage = [];
                // variable $j digunakan untuk menset ulang variable $i
                // tapi tidak dari awal, ditambah 1 angka setiap pengecekan 
                // frasa selesai
                $j++;
                $i = $j;

                /**
                 * debuging
                 */
                // echo "|";
                // echo "I : ".$i;
                // echo "|";
                // echo "J : ".$j;
                // echo '<br>';
            } else {
                $i++;
            }
            
            // jika akhir dari array dicapai, 
            if ($i == (count($temp_string)-1)) {
                // tambahkan $ending_repeat 1 angka
                $ending_repeat++;
            }
            
            // if end of array repeated 2 times, trigger descending check
            if ($ending_repeat == 2 && $i == (count($temp_string)-1)) {
                // array_push($temp_store, "Descending...");
                $i = 0;
                $j = 0;
                $temp_string = array_reverse($temp_string);
                $temp_storage = [];    
            }
        } 
       
        /**
         * debuging
         */
        // echo "<br>";
        // echo "Ditemukan : ".$jumlah_frasa . " kali.";
        // echo "<hr>";
        // var_dump($temp_store);

        echo "Ditemukan : ".$jumlah_frasa . " kali.";
    } else {
        echo "Frasa tidak boleh lebih panjang dari string";
    }
}

count_frasa("banananana", "nana");