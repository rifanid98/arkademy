<?php

function biodata($name,$age){
    $address = "Kp. Sinagar RT 03/07, Ds. Cihideung Udik, Kec. Ciampea Kab. Bogor 16620";
    $hobbies = ["coding","gaming","learning"];
    $is_married = false;
    $list_school = [
        "elementary_school" => [
            "year_in" => "2005",
            "year_out" => "2011",
            "major" => null
        ],
        "middle_school" => [
            "year_in" => "2011",
            "year_out" => "2014",
            "major" => null
        ],
        "high_school" => [
            "year_in" => "2014",
            "year_out" => "2017",
            "major" => null
        ]
    ];
    $skills = [
        "html" => "beginner",
        "css" => "beginner",
        "php" => "beginner",
        "mysql" => "beginner"
    ];
    $interest_in_coding = true;

    return json_encode([
        "name" => $name,
        "age" => $age,
        "address" => $address,
        "hobbies" => $hobbies,
        "is_married" => $is_married,
        "list_school" => $list_school,
        "skills" => $skills,
        "interest_in_coding" => $interest_in_coding
    ], JSON_PRETTY_PRINT);    
}

$name = "Adnin Rifandi Sutanto Putra";
$age = 21;
echo biodata($name, $age);