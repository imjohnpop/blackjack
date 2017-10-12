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
        'jack' => 11,
        'queen' => 12,
        'king' => 13,
        'ace' => 14
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
        <?php foreach($hearts as $key => $value): ?>
            <?php if(is_numeric($key)): ?>
                <div class="card" onclick="flip()">
                    <div class="front">
                        <div class="left small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/hearts.png">
                        </div>
                        <div class="main">                    
                            <img class="main_image" src="card_images/hearts.png">
                        </div>
                        <div class="right small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/hearts.png">
                        </div>
                    </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php else :?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/hearts.png">
                        </div>
                        <div class="main">
                            <img class="main_image" src="card_images/<?php faceimage($key, 'hearts');?>.png">
                        </div>
                        <div class="right small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/hearts.png">
                        </div>
                    </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
        <?php foreach($spades as $key => $value): ?>
            <?php if(is_numeric($key)): ?>
                    <div class="card">
                        <div class="front">
                            <div class="left small">
                                <p><?=$key;?></p>
                                <img src="card_images/spades.png">
                            </div>
                            <div class="main">
                                <img class="main_image" src="card_images/spades.png">
                            </div>
                            <div class="right small">
                                <p><?=$key;?></p>
                                <img src="card_images/spades.png">
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php else :?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p><?=$key;?></p>
                            <img src="card_images/spades.png">
                        </div>
                        <div class="main">
                            <img class="main_image" src="card_images/<?php faceimage($key, 'spades');?>.png">
                        </div>
                        <div class="right small">
                            <p><?=$key;?></p>
                            <img src="card_images/spades.png">
                        </div>
                        </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
        <?php foreach($clubs as $key => $value): ?>
            <?php if(is_numeric($key)): ?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p><?=$key;?></p>
                            <img src="card_images/clubs.png">
                        </div>
                        <div class="main">
                            <img class="main_image" src="card_images/clubs.png">
                        </div>
                        <div class="right small">
                            <p><?=$key;?></p>
                            <img src="card_images/clubs.png">
                        </div>
                        </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php else :?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p><?=$key;?></p>
                            <img src="card_images/clubs.png">
                        </div>
                        <div class="main">
                            <img class="main_image" src="card_images/<?php faceimage($key, 'clubs');?>.png">
                        </div>
                        <div class="right small">
                            <p><?=$key;?></p>
                            <img src="card_images/clubs.png">
                        </div>
                        </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
        <?php foreach($diamonds as $key => $value): ?>
            <?php if(is_numeric($key)): ?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/diamonds.png">
                        </div>
                        <div class="main">
                        <img class="main_image" src="card_images/diamonds.png">
                        </div>
                        <div class="right small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/diamonds.png">
                        </div>
                    </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php else :?>
                <div class="card">
                    <div class="front">
                        <div class="left small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/diamonds.png">
                        </div>
                        <div class="main">
                            <img class="main_image" src="card_images/<?php faceimage($key, 'diamonds');?>.png">
                        </div>
                        <div class="right small">
                            <p style="color: #911919;"><?=$key;?></p>
                            <img src="card_images/diamonds.png">
                        </div>
                    </div>
                    <div class="backside">
                        <img width="100%" height="100%" src="card_images/cardBack.jpg">
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        // function flip() {
        //     $('.card').addClass("flipper");
        // }

        $(".card").click(function() {
            if($(this).hasClass("flipper")) {
                $(this).removeClass("flipper")
            }
            else {
            $(this).addClass("flipper");
            }
        })
    </script>
    </body>
    </html>