<?php
    $hotels = [
        [
            "id" => 1,
            "name" => "Grand Hotel",
            "pic" => "image/hotel.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "fax" => "54545445",
            "email" => "hotel@abv.bg",
            "description" =>"The hotel Arbor Hyde Park is quietly situated at a square of
                            Lancaster Gate, overlooking the magnificent Hyde Park.
                            The famous Oxford Street as well as Kensington Gardens,
                            Knightsbridge and Buckingham Palace are reachable on foot.
                            Thanks to the underground station Lancaster Gate near the 
                            Arbor Hyde Park, many other sights and attractions of the city are easily accessible
            ",
            "rooms" => [
                ["Rooms", "01.01 - 31.05", "01.06 - 30.09", "01.10 - 31.12"],
                ["Single room", "50", "70", "60"],
                ["Double room", "60", "80", "70"],
                ["Appartement", "100", "120", "110"],
            ],
        ],
        [
            "id" => 2,
            "name" => "Novotel",
            "pic" => "image/hotel1.jpg",
            "city" => "Plovdiv",
            "address" => "25 Pirin Str",
            "tel" => "+359 878 200 100",
            "email" => "hotel123@mail.bg",
            "description" => "The hotel Arbor Hyde Park is quietly situated at a square of
                            Lancaster Gate, overlooking the magnificent Hyde Park.",
            "rooms" => [
                ["Rooms", "01.01 - 30.06", "01.06 - 31.12"],
                ["Single room", "50", "70"],
                ["Double room", "60", "80"],
                ["Studio", "80", "100"],
                ["Appartement", "100", "120"],
            ],
        ],
        [
            "id" => 3,
            "name" => "Borovetz",
            "pic" => "image/hotel2.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "Arbor Hyde Park, many other sights and attractions of the city are easily accessible",
            "rooms" => [
                ["Rooms", "01.01 - 31.05", "01.06 - 30.09", "01.10 - 31.12"],
            ],
        ],
        [
            "id" => 4,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "16 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 5,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 6,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 7,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 8,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 9,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ],
        [
            "id" => 10,
            "name" => "Rila",
            "pic" => "image/hotel3.jpg",
            "city" => "Pamporovo",
            "address" => "15 Bulgaria Str",
            "tel" => "+359 878 150 111",
            "email" => "hotel@abv.bg",
            "description" => "",
            "rooms" => [],
        ]
    ];
    $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');
    foreach($hotels as $hotel) {
        $rooms = json_encode($hotel['rooms']);
        $mysqli->query("insert into hotels(name,pic,city,address,tel,email,description,rooms)
            values(
            '{$hotel['name']}',
            '{$hotel['pic']}',
            '{$hotel['city']}',
            '{$hotel['address']}',
            '{$hotel['tel']}',
            '{$hotel['email']}',
            '{$hotel['description']}',
            '{$rooms}'
            )");
    }    

