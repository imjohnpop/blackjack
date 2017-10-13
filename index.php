<?php
    
    class cards
    {
        public $value = null;

        public function __construct($value) {
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
        11 => 'J',
        12 => 'Q',
        13 => 'K',
        14 => 'A'
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
        'J' => 10,
        'Q' => 10,
        'K' => 10,
        'A' => 1
    ];

    for ($i=2; $i < 15; $i++) {
        $hearts[$sign[$i]] = new cards ($i);
    }
    for ($i=2; $i < 15; $i++) {
        $spades[$sign[$i]] = new cards ($i);
    }
    for ($i=2; $i < 15; $i++) {
        $clubs[$sign[$i]] = new cards ($i);
    }
    for ($i=2; $i < 15; $i++) {
        $diamonds[$sign[$i]] = new cards ($i);
    }

    function faceimage($key, $type) {
        if($key == 'J') {
            if($type == 'hearts') {
                echo 'face-jack-heart';
            }
            if($type == 'spades') {
                echo 'face-jack-spade';
            }
            if($type == 'clubs') {
                echo 'face-jack-club';
            }
            if($type == 'diamonds') {
                echo 'face-jack-diamond';
            }
        }
        if($key == 'Q') {
            if($type == 'hearts') {
                echo 'face-queen-heart';
            }
            if($type == 'spades') {
                echo 'face-queen-spade';
            }
            if($type == 'clubs') {
                echo 'face-queen-club';
            }
            if($type == 'diamonds') {
                echo 'face-queen-diamond';
            }
        }
        if($key == 'K') {
            if($type == 'hearts') {
                echo 'face-king-heart';
            }
            if($type == 'spades') {
                echo 'face-king-spade';
            }
            if($type == 'clubs') {
                echo 'face-king-club';
            }
            if($type == 'diamonds') {
                echo 'face-king-diamond';
            }
        }
        if($key == 'A') {
            if($type == 'hearts') {
                echo 'hearts';
            }
            if($type == 'spades') {
                echo 'spades';
            }
            if($type == 'clubs') {
                echo 'clubs';
            }
            if($type == 'diamonds') {
                echo 'diamonds';
            }
        }
    }

    $deck = [
        'hearts' => $hearts,
        'spades' => $spades,
        'clubs' => $clubs,
        'diamonds' => $diamonds,
    ];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="card.css">
    </head>
    <body>

    <div class="deck">
        <?php foreach($deck as $color => $cards): ?>
            <?php foreach($cards as $key => $value): ?>
                <div class="deckcard">
                    <div class="card flipper">
                        <div class="front">
                            <div class="left small">
                                <p style="color: <?php if(($color == 'hearts') || ($color == 'diamonds')) {echo '#911919';};?>;"><?=$key;?></p>
                                <img src="card_images/<?= $color;?>.png">
                            </div>
                            <?php if(is_numeric($key)): ?>
                            <div class="main">                    
                                <img class="main_image" src="card_images/<?= $color;?>.png">
                            </div>
                            <?php else :?>
                            <div class="main">
                                <img class="main_image" src="card_images/<?php faceimage($key, $color);?>.png">
                            </div>
                            <?php endif;?>
                            <div class="right small">
                                <p style="color: <?php if(($color == 'hearts') || ($color == 'diamonds')) {echo '#911919';};?>;"><?=$key;?></p>
                                <img src="card_images/<?= $color;?>.png">
                            </div>
                        </div>
                        <div class="backside">
                            <img width="100%" height="100%" src="card_images/cardBack.jpg">
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endforeach;?>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(".card").click(function() {
            $(this).toggleClass("flipper")
        })

    </script>
    </body>
    </html>