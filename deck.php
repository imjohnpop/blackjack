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
                return 'face-jack-heart';
            }
            if($type == 'spades') {
                return 'face-jack-spade';
            }
            if($type == 'clubs') {
                return 'face-jack-club';
            }
            if($type == 'diamonds') {
                return 'face-jack-diamond';
            }
        }
        if($key == 'Q') {
            if($type == 'hearts') {
                return 'face-queen-heart';
            }
            if($type == 'spades') {
                return 'face-queen-spade';
            }
            if($type == 'clubs') {
                return 'face-queen-club';
            }
            if($type == 'diamonds') {
                return 'face-queen-diamond';
            }
        }
        if($key == 'K') {
            if($type == 'hearts') {
                return 'face-king-heart';
            }
            if($type == 'spades') {
                return 'face-king-spade';
            }
            if($type == 'clubs') {
                return 'face-king-club';
            }
            if($type == 'diamonds') {
                return 'face-king-diamond';
            }
        }
        if($key == 'A') {
            if($type == 'hearts') {
                return 'hearts';
            }
            if($type == 'spades') {
                return 'spades';
            }
            if($type == 'clubs') {
                return 'clubs';
            }
            if($type == 'diamonds') {
                return 'diamonds';
            }
        }
    }

    $deck = [
        'hearts' => $hearts,
        'spades' => $spades,
        'clubs' => $clubs,
        'diamonds' => $diamonds,
    ];

    $main_deck = [];
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
                <?php $eot = <<<EOD
                <div class="deckcard">
                    <div class="card flipper">
                        <div class="front">
                            <div class="left small">
                                <p class="$color">$key</p>
                                <img src="card_images/$color.png">
                            </div>
EOD;

                            if(is_numeric($key)):
                            $eot .= <<<EOD
                            <div class="main">                    
                                <img class="main_image" src="card_images/$color.png">
                            </div>
EOD;
                            endif;
                            if(!is_numeric($key)): 
                            $eot .=<<<EOD
                            <div class="main">
                                <img class="main_image" src="card_images/
EOD;
                               $eot .= faceimage($key, $color) . ".png\">
                            </div>";
                            endif;
                            $eot.=<<<EOD
                            <div class="right small">
                                <p class="$color">$key</p>
                                <img src="card_images/$color.png">
                            </div>
                        </div>
                        <div class="backside">
                            <img width="100%" height="100%" src="card_images/cardBack.jpg">
                        </div>
                    </div>
                </div>
EOD;
                $main_deck[] = $eot;
                shuffle($main_deck);?>
            <?php endforeach;?>
        <?php endforeach;?>
    </div>
<?php foreach ($main_deck as $value): ?>
    <?= $value; ?>
<?php endforeach; ?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(".card").click(function() {
            $(this).toggleClass("flipper")
        });

    </script>
    </body>
    </html>