<?php

function count_vowels($strings){
    // split strings to array
    $temp = str_split($strings);
    
    $vocals = ["a", "i", "u", "e", "o"];
    $vowels = 0;
    foreach ($vocals as $vocal) {
        if(in_array($vocal, $temp)){
            $vowels += array_count_values($temp)["$vocal"];
        }
    }
    echo $vowels;
}

count_vowels("programmer");