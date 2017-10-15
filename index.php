<?php
    require 'deck.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="table.css">
    <title>Black Jack</title>
</head>
<body>

    <div id="table">

        <h1 id="headline">Black Jack</h1>
        
        <div id="bank">
                <div id="red_chips"></div>
                <div id="blue_chips"></div>   
                <div id="yellow_chips"></div>
                <div id="black_chips"></div>
                <div id="pink_chips"></div>
        </div>

        <div id="player"></div>
        <div id="dealer"></div>

        <div id="score_grey">
            <p><span>Dealer Score: </span><span id="dealer_score">0</span></p>
            <hr>
            <p><span>Player Score: </span><span id="player_score">0</span></p>
        </div>
        <div id="score"></div>

        <div id="deck">
            <?php
            foreach ($main_deck as $value)
            {
                echo $value;
            }
            ?>
        </div>

        <div id="buttons">
            <button id="reset" type="button"><a href="index.php">Reset Game</a></button>
            <button id="deal" type="button">Deal</button>
            <button id="hit" type="button">Hit</button>
            <button id="stand" type="button">Stand</button>
        </div>

        <div class="half-circle"></div>

        


    </div>

    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(".card").click(function() {
            $(this).toggleClass("flipper")
        });
var value = {
    '2':2,
    '3':3,
    '4':4,
    '5':5,
    '6':6,
    '7':7,
    '8':8,
    '9':9,
    '10':10,
    'J':10,
    'Q':10,
    'K':10,
    'A':1
};



var dealer_hand = 0;
var player_hand = 0;
var dealed = 0;
var dealer_score = 0;
var player_score = 0;

        $('#deal').click(function() {
            if (dealed==0) {
                var dealer = $('#dealer').offset();
                var player = $('#player').offset();
                var deck_offset = $('#deck').offset();
                var counter = 0;
                function deal() {
                    var card = $("#deck .deckcard").last();
                    var card_value = value[card.find('.value').text()];
                    var card_offset = card.offset(); 
                    debugger;
                    if ( counter % 2 ==1) {
                    //dealer  
                        if (counter==3) {dealer_score += card_value;};
                        $('#dealer_score').text(dealer_score);
                        dealer_hand++;                                        
                        card.animate({
                            'top': dealer.top-deck_offset.top,
                            'left': dealer.left-deck_offset.left+((153*0.25)*(dealer_hand-1))
                        }, 1000, function () {
                            card.detach(); 
                            card.css({
                                'top': 0,
                                'left': 0+((153*0.25)*(dealer_hand-1))
                            });
                            if (counter==3) {
                                card.find('.card').toggleClass("flipper");
                                }
                            $('#dealer').append(card);
                            counter++;
                            if(counter<4){
                                deal();
                            }
                        });
                    }
                    else
                    {
                    //hrac
                        player_score += card_value;
                        $('#player_score').text(player_score);
                        player_hand++; 
                        card.animate({
                            'top': player.top-deck_offset.top,
                            'left': player.left-deck_offset.left+((153*0.25)*(player_hand-1))
                        }, 1000, function () {
                            card.detach();
                            card.css({
                                'top': 0,
                                'left': 0+((153*0.25)*(player_hand-1))
                            });
                            card.find('.card').toggleClass("flipper");
                            $('#player').append(card);
                            counter++;
                            if(counter<4){
                                deal();
                            }
                        });
                    }
                } 
                deal();
            }
            dealed++;
        });




        

</script>

</body>
</html>