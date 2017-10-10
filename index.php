<?php
    
    class cards
    {
        public $color = null;
        public $value = null;

        public function __construct($color, $value) {
            $this->color = $color;
            $this->value = $value;
        }

        public function __string() {

        }
    }


    $sign = [
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => 'Jack',
        12 => 'Queen',
        13 => 'King',
        14 => 'Ace'
    ];

    $value = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'Jack' => 11,
        'Queen' => 12,
        'King' => 13,
        'Ace' => 14
    ];

    for ($i=2; $i < 15; $i++) {
        $hearts[$sign[$i]] = new cards ('heart', $i);
    }
    for ($i=2; $i < 15; $i++) {
        $spades[$sign[$i]] = new cards ('spades', $i);
    }
    for ($i=2; $i < 15; $i++) {
        $clubs[$sign[$i]] = new cards ('clubs', $i);
    }
    for ($i=2; $i < 15; $i++) {
        $diamonds[$sign[$i]] = new cards ('diamonds', $i);
    }
    var_dump($hearts);