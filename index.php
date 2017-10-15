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
        <p><span>Dealer Points: </span><span id="dealer_score">0</span></p>
        <hr>
        <p><span>Player Points: </span><span id="player_score">0</span></p>
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
        <button id="hit" type="button">Hit</button>
        <button id="stand" type="button">Stand</button>
    </div>

    <div class="half-circle"></div>

</div>

<div id="modalWindow">
    <div class="wrapper">
        <h3>You hit Ace!</h3>
        <p>It\'s up to you how you want to count Aces on your hand...</p>
        <div>
            <button id="aceOne" type="button">1 point</button>
            <button id="aceEleven" type="button">11 points</button>
        </div>
    </div>
</div>

<div id="game-overlay">
    <div class="wrapper">
        <h1 id="headline_2">Welcome!</h1>
        <button id="deal" type="button">Deal</button>
    </div>
</div>

<div id="winloss">
    <h4>This Session</h4>
    <p>Win/Loss</p>
    <p></p>
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

//var modal = '<div id="game-overlay" class="modalWindow"><div class="wrapper"><h3>You hit Ace!</h3><p>It\'s up to you how you want to count Aces on your hand...</p><div><button id="aceOne" type="button">1 point</button><button id="aceEleven" type="button">11 points</button></div></div></div>'


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

        var $result = $('<div id="game-overlay" class="won"><div class="wrapper end"><h1>You\'ve won :)</h1><h3>Congratulation!</h2><button id="reset" type="button"><a href="index.php">Reset Game</a></button></div></div>');

    }else if(result == 'loose'){

        var $result = $('<div id="game-overlay" class="lost"><div class="wrapper end"><h1>You\'ve lost :(</h1><h3>Game Over</h2><button id="reset" type="button"><a href="index.php">Reset Game</a></button></div></div>');

    }else if(result == 'draw'){

        var $result = $('<div id="game-overlay" class="draw"><div class="wrapper end"><h1>It\'s a draw ;)</h1><h3>Good Luck Next<br>Time</h2><button id="reset" type="button"><a href="index.php">Reset Game</a></button></div></div>');

    }
    setTimeout(function(){ $('body').append($result) }, 500);
}

</script>

</body>
</html>