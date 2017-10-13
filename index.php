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
        
        <div id="bank">
                <div id="red_chips"></div>
                <div id="blue_chips"></div>   
                <div id="yellow_chips"></div>
                <div id="black_chips"></div>
                <div id="pink_chips"></div>
        </div>

        <div id="player"></div>
        <div id="dealer"></div>

        <div id="moneyholder_grey"></div>
        <div id="moneyholder"></div>

        <div id="deck">
            <?php
            foreach ($main_deck as $value)
            {
                echo $value;
            }
            ?>
        </div>

        <div id="buttons">
            <button class="startgame" type="button">start game</button>
        </div>

        <div class="half-circle"></div>

        


    </div>

    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(".card").click(function() {
            $(this).toggleClass("flipper")
        })


        $('.startgame').click(function() { 
            var dealer = $('#dealer').offset();
            var player = $('#player').offset();
            var i = 0;
            interval = setInterval(function() {
                var card = $("#deck .deckcard").last();
                var card_offset = card.offset();
                ++i;
                if ( i % 2 ==0) {
                //dealer                                          
                    card.animate({
                        'top': dealer.top,
                        'left': dealer.left
                    }, 1000, function () {
                        card.detach();
                        $('#dealer').append(card);
                    });
                }
                else
                {
                //hrac
                    card.animate({
                        'top': player.top,
                        'left':player.left
                    }, 1000, function () {
                        card.detach();
                        $('#player').append(card);

                    });
                }
                if(i == 4) {
                    clearInterval(interval);
                }
            }, 500); 
        });

</script>

</body>
</html>