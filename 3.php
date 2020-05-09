<?php

function count_vowels($strings){
    $temp = [];
    $string = $strings;
    for ($i=0; $i < strlen($string); $i++) { 
        array_push($temp, substr($string,$i,1));
    }
    
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