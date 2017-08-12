<?php

$albums = [
    [
        "id" => 1,
        "name" => "Suicidal Tendencies",
        "pic" => "image/STalbum1.jpg",
        "year" => "1983",
    ],
    [
        "id" => 2,
        "name" => "Join The Army",
        "pic" => "image/STalbum2.jpg",
        "year" => "1987",
    ],
    [
        "id" => 3,
        "name" => "How Will I laugh tomorrow When I Can't Even Smile Today",
        "pic" => "image/STalbum3.jpg",
        "year" => "1988",
    ],
    [
        "id" => 4,
        "name" => "Controlled By Hatred/Feel Like Shit...Deja Vu",
        "pic" => "image/STalbum4.jpg",
        "year" => "1989",
    ],
    [
        "id" => 5,
        "name" => "Lights...Camera...Revolution!",
        "pic" => "image/STalbum5.jpg",
        "year" => "1990",
    ],
    [
        "id" => 6,
        "name" => "The Art Of Rebellion",
        "pic" => "image/STalbum6.jpg",
        "year" => "1992",
    ]
    [
        "id" => 7,
        "name" => "Still Cyco After All These Years",
        "pic" => "image/STalbum7.jpg",
        "year" => "1993",
    ]
    [
        "id" => 8,
        "name" => "Suicidal For Life",
        "pic" => "image/STalbum8.jpg",
        "year" => "1994",
    ]
    [
        "id" => 9,
        "name" => "Freedumb",
        "pic" => "image/STalbum9.jpg",
        "year" => "1999",
    ]
    [
        "id" => 10,
        "name" => "Free Your Soul And Save My Mind",
        "pic" => "image/STalbum10.jpg",
        "year" => "2000",
    ]
];

header('Content-Type: application/json');
echo json_encode($albums);
