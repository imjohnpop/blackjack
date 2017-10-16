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

    <h1 id="headline" class=”text-color”>Black Jack</h1>
    <h2 id="headline2-d" class=”text-color”>Dealer</h2>
    <h2 id="headline2-p" class=”text-color”>Player</h2>

    <div id="player"></div>
    <div id="dealer"></div>

    <div id="score_1">
        <p class=”text-color”><span>Dealer Points: </span><span id="dealer_score">0</span></p>
        <hr>
        <p class=”text-color”><span>Player Points: </span><span id="player_score">0</span></p>
    </div>
    <div id="score_2"></div>
    <div id="score_3"></div>
    <div id="score_4"></div>

    <div id="deck">
        <?php
        foreach ($main_deck as $value)
        {
            echo $value;
        }
        ?>
    </div>

    <div id="buttons2">
        <div class="hs-wrapper blue">
            <a class='hs-button blue' id="split" href="#">
                <span class='hs-border blue'>
                    <span class='hs-text blue'>
                        Split
                    </span>
                </span>
            </a>
        </div>
        <div class="hs-wrapper red">
            <a class='hs-button red' id="double" href="#">
                <span class='hs-border red'>
                    <span class='hs-text red'>
                        Double
                    </span>
                </span>
            </a>
        </div>
    </div>


    <div id="buttons">
        <div class="hs-wrapper silver">
            <a class='hs-button silver' id="reset" href="index.php">
                <span class='hs-border silver'>
                    <span class='hs-text silver'>
                        Reset Game
                    </span>
                </span>
            </a>
        </div>
        <div class="hs-wrapper green">
            <a class='hs-button green' id="hit" href="#">
                <span class='hs-border green'>
                    <span class='hs-text green'>
                        Hit
                    </span>
                </span>
            </a>
        </div>
        <div class="hs-wrapper classic">
            <a class='hs-button classic' id="stand" href="#">
                <span class='hs-border classic'>
                    <span class='hs-text classic'>
                        Stand
                    </span>
                </span>
            </a>
        </div>
    </div>


    <div class="half-circle"></div>

</div>

<div id="modalWindow">
    <div class="wrapper">
        <h3 class=”text-color”>You hit Ace!</h3>
        <p class=”text-color”>It\'s up to you how you want to count Aces on your hand...</p>
        <div id="hs-ace-buttons">
            <div class="hs-wrapper gold">
                <a class='hs-button gold' id="aceOne" href="#">
                    <span class='hs-border gold'>
                        <span class='hs-text gold'>
                            1 point
                        </span>
                    </span>
                </a>
            </div>
            <div class="hs-wrapper gold">
                <a class='hs-button gold' id="aceEleven" href="#">
                    <span class='hs-border gold'>
                        <span class='hs-text gold'>
                            11 point
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="game-overlay">
    <div class="wrapper">
        <h1 id="headline_2" class=”text-color”>Welcome!</h1>
        <div class="hs-wrapper gold">
            <a class='hs-button gold' id="deal" href="#">
                <span class='hs-border gold'>
                    <span class='hs-text gold'>
                        Deal
                    </span>
                </span>
            </a>
        </div>
    </div>
</div>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

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
    'A':0
};

var dealer_hand = 0;
var player_hand = 0;
var dealed = false;
var standed = false;
var next = false;
var dealer_score = 0;
var player_score = 0;

var dealer = $('#dealer').offset();
var player = $('#player').offset();
var deck_offset = $('#deck').offset();

var result='';


$('#headline').hide();
$('#modalWindow').hide();
function aceModal(){
    $('#modalWindow').show();
}
$('body').find('#aceOne').click(function() {
    $('body').find('#modalWindow').hide();
    var card_value = 1;
    player_score += card_value;
    $('#player_score').text(player_score);
});

$('body').find('#aceEleven').click(function() {
    $('body').find('#modalWindow').hide();
    var card_value = 11;
    player_score += card_value;
    $('#player_score').text(player_score);
    if (player_score>21) {
        check_score(dealer_score, player_score);
    }
});



$('#deal').click(function() {
    $('#game-overlay').remove();
    $('#headline').show();
    if (dealed==false) {
        dealed = true;
        var counter = 0;
        function deal() {
            var card = $("#deck .deckcard").last();
            if ( counter % 2 ==1) {
            //dealer
                if(card.find('.value').text() == 'A'){
                    if (dealer_score<11) {
                        card_value = 11;
                    }   else {
                        card_value = 1;
                    }
                } else {
                    var card_value = value[card.find('.value').text()];
                }
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
                    if (counter==1) {
                        card.find('.card').addClass('unflipped');
                    }
                    if (counter==3) {
                        next = true;
                        card.find('.card').toggleClass("flipper");
                        dealer_score += card_value;
                        $('#dealer_score').text(dealer_score);
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
                    if(card.find('.value').text() == 'A'){
                        aceModal();
                    } else {
                        var card_value = value[card.find('.value').text()];
                        player_score += card_value;
                        $('#player_score').text(player_score);
                    }
                });
            }
        } 
        deal();
    }
});


$('#hit').click(function() {
    if (next==true) {
        var player_score = parseInt($('#player_score').text());
        if (player_score<21) {
            var card = $("#deck .deckcard").last();
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
                if(card.find('.value').text() == 'A'){
                    aceModal();
                } else {
                    var card_value = value[card.find('.value').text()];
                    player_score += card_value;
                    $('#player_score').text(player_score);
                }
                ///////////
                if (player_score==21) { 
                    setTimeout(stand(),1000);
                } else if (player_score>21) {
                    var result = 'loose';
                    results(result);
                }
            });
        }
    }
});

$('#stand').click(function() {
    stand();
});

function stand() {
    if ( next == true && standed==false) {
        standed=true;
        var dealer_score = parseInt($('#dealer_score').text());
        var player_score = parseInt($('#player_score').text());
        if($("#dealer .unflipped").find('.value').text() == 'A'){
            if (dealer_score<11) {
                card_value = 11;
            }   else {
                card_value = 1;
            }
        } else {
            var card_value = value[$("#dealer .unflipped").find('.value').text()];
        }
        dealer_score += card_value;
        $('#dealer_score').text(dealer_score);
        $("#dealer .deckcard .unflipped").toggleClass("flipper");
        function dealer_turn() {
            if (dealer_score<=player_score && dealer_score<=21) {
                var card = $("#deck .deckcard").last();
                if(card.find('.value').text() == 'A'){
                    if (dealer_score<11) {
                        card_value = 11;
                    }   else {
                        card_value = 1;
                    }
                } else {
                    var card_value = value[card.find('.value').text()];
                }
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
                    card.find('.card').toggleClass("flipper");
                    $('#dealer').append(card);
                    dealer_score += card_value;
                    $('#dealer_score').text(dealer_score);
                    if (dealer_score<17) {
                        ///////////
                        setTimeout(dealer_turn(), 2000);
                    } else {
                        check_score(dealer_score, player_score);
                    }
                });
            } else {
                check_score(dealer_score, player_score);
            }
        }
        if (dealer_score<17) {
            setTimeout(dealer_turn(), 2000);
        } else {
            check_score(dealer_score, player_score);
        }
    }
}

function check_score(dealer_score, player_score) {
    if (dealer_score>21 && player_score<22){
        var result = 'win';
        results(result);
    }
    else if (player_score>21 && dealer_score<22){
        var result = 'loose';
        results(result);
    }
    else if (dealer_score>player_score && dealer_score<22) {
        var result = 'loose';
        results(result);
    }
    else if (player_score>dealer_score && player_score<22) {
        var result = 'win';
        results(result);
    }
    else if (dealer_score==player_score) {
        var result = 'draw';
        results(result);
    }
    else if (player_score==21 && dealer_score>21) {
        var result = 'win';
        results(result);
    }
}


function results(result){
    $('#headline').remove();
    if(result == 'win'){  
        var $result = $('<div id="game-overlay" class="won"><div class="wrapper end"><h1 class"text-color”>Winner</h1><h3 class=”text-color”>You\'ve won</h2><div class="hs-wrapper silver"><a class=\'hs-button silver\' id="reset" href="index.php"><span class=\'hs-border silver\'><span class=\'hs-text silver\'>Reset Game</span></span></a></div></div></div>');

    }else if(result == 'loose'){

        var $result = $('<div id="game-overlay" class="lost"><div class="wrapper end"><h1 class"text-color”>Game Over</h1><h3 class=”text-color”>You\'ve lost</h2><div class="hs-wrapper silver"><a class=\'hs-button silver\' id="reset" href="index.php"><span class=\'hs-border silver\'><span class=\'hs-text silver\'>Reset Game</span></span></a></div></div></div>');

    }else if(result == 'draw'){

        var $result = $('<div id="game-overlay" class="draw"><div class="wrapper end"><h1 class"text-color”>Good luck next time</h1><h3 class=”text-color”>It\'s a draw</h2><div class="hs-wrapper silver"><a class=\'hs-button silver\' id="reset" href="index.php"><span class=\'hs-border silver\'><span class=\'hs-text silver\'>Reset Game</span></span></a></div></div></div>');

    }
    setTimeout(function(){ $('body').append($result) }, 500);
}

</script>

</body>
</html>